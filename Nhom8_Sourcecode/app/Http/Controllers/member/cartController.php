<?php

namespace App\Http\Controllers\member;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cartController
{
    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $product_color = DB::table('product_color')->where('id', $request->input('color_id'))->first();

        if ($product && $product_color->quantity > 0) {
            $cart = DB::table('carts')
                ->where('user_id', Auth::user()->id)
                ->where('product_id', $id)
                ->where('color_id', $product_color->id)
                ->first();

            if ($cart) {
                $newQuantity = $cart->quantity + 1;
                if ($newQuantity <= $product_color->quantity) {
                    DB::table('carts')->where('id', $cart->id)->update([
                        'quantity' => $newQuantity,
                        'total' => $newQuantity * $product->price,
                    ]);
                } else {
                    return back()->with('fail', 'Số lượng sản phẩm tồn kho không đủ, vui lòng chọn lại!');
                }
            } else {
                DB::table('carts')->insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                    'color_id' => $product_color->id,
                    'quantity' => 1,
                    'total' => $product->price,
                ]);
            }
            return back()->with('success', 'Thêm vào giỏ hàng thành công!');
        }
        return back()->with('fail', 'Sản phẩm không khả dụng!');
    }

    // Cập nhật số lượng trong giỏ hàng
    public function updateCartQuantity(Request $request, $id)
    {
        $newQuantity = $request->quantity;
        $jsonResp = array(
            'status' => 'fail'
        );

        if ($newQuantity < 1) {
            $jsonResp['errMsg'] = 'Số lượng phải lớn hơn hoặc bằng 1!';
            return json_encode($jsonResp);
        }

        $cartItem = DB::table('carts')
            ->where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($cartItem) {
            $product = DB::table('products')->where('id', $cartItem->product_id)->first();
            $product_color = DB::table('product_color')->where('id', $cartItem->color_id)->first();

            if ($newQuantity > $product_color->quantity) {
                $jsonResp['errMsg'] = 'Số lượng sản phẩm tồn kho không đủ, vui lòng chọn lại!';
                return json_encode($jsonResp);
            }

            DB::table('carts')->where('id', $id)->update([
                'quantity' => $newQuantity,
                'total' => $newQuantity * $product->price,
            ]);

            $jsonResp['status'] = 'success';
            return json_encode($jsonResp);
        }

        $jsonResp['errMsg'] = 'Sản phẩm không tồn tại trong giỏ hàng!';
        return json_encode($jsonResp);
    }

    public function updateSelectedItems(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);
        $cartItems = Cart::whereIn('id', $selectedItems)->get();

        $total = $cartItems->reduce(function ($carry, $item) {
            return $carry + ($item->quantity * $item->price);
        }, 0);

        return response()->json(['success' => true, 'total' => $total]);
    }
    // Xóa sản phẩm khỏi giỏ hàng
    public function delCartItem($id)
    {
        DB::table('carts')->where('id', $id)->where('user_id', Auth::user()->id)->delete();
        return back()->with('success', 'Xóa sản phẩm thành công!');
    }

    // trang xác nhận thanh toán
    public function paymentConfirm(Request $request)
    {
        // trả về lỗi nếu không có sản phẩm được chọn trong cart
        if(!isset($request->itemSelected) || empty($request->itemSelected)) {
            return redirect('errors')->withErrors(['msg' => 'Không có sản phẩm được chọn.']);
        }

        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('product_color', 'carts.color_id', '=', 'product_color.id')
            ->where('carts.user_id', $user->id)
            ->select(
                'products.nameProduct as product_name',
                'carts.quantity',
                'carts.total',
                'carts.id as cart_id'
            )
            ->get();
        
        // lấy sản phẩm đã chọn trong cart
        $cartItems = $cartItems->filter(function ($item) use ($request) {
            return  in_array($item->cart_id, $request->itemSelected);
        });

        $totals = $cartItems->reduce(function ($carry, $item) {
            return $carry + $item->total;
        }, 0);

        $paymentMethods = DB::table('method')->get(); // Lấy danh sách phương thức thanh toán

        return view("member.payment-confirm", [
            'user' => $user,
            'cartItems' => $cartItems,
            'paymentMethods' => $paymentMethods,
            'totals' => $totals
        ]);
    }

    // Thanh toán
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $paymentMethodId = $request->payment_method ?? '';
        $cartItemIds = $request->cartItemId ?? [];
        $voucherId = $request->voucherId ?? '';

        if (!$paymentMethodId) {
            return redirect('errors')->withErrors(['msg' => 'Phương thức thanh toán không hợp lệ!']);
        }
        if(empty($cartItemIds)) {
            return redirect('errors')->withErrors(['msg' => 'chưa chọn sản phẩm!']);
        }

        $cart = DB::table('carts')
            ->where('user_id', Auth::user()->id)
            ->whereIn('id', $cartItemIds)
            ->get();

        if($cart->isEmpty()) {
            return redirect('errors')->withErrors(['msg' => 'sản phẩm đã chọn không hợp lệ!']);
        }

        if($voucherId != ''){
            $voucher = DB::table('vouchers')
            ->where('id','=', $voucherId)
            ->where('delVoucher', 0)
            ->select('*')
            ->first();
    
            if(empty($voucher)) {
                return redirect('errors')->withErrors(['msg' => 'Đặt hàng không thành công vì mã khuyến mại không khả dụng!']);
            }
            $discount = $voucher->discount;
        }else{
            $discount = 0;
        }
        
        $totalPrice = 0;
        // kiểm tra số lượng sản phẩm trong kho với số lượng sản phẩm đặt hàng
        $check = true;
        foreach ($cart as $key => $value) {
            $product_color = DB::table('product_color')
                ->join('products', 'product_color.product_id', '=', 'products.id')
                ->where('product_color.delColor', 0)
                ->where('product_color.id', $value->color_id)
                ->where('products.delProduct', 0)
                ->select(
                    'product_color.quantity',
                )
                ->first();

            if($value->quantity <= $product_color->quantity) {
                $totalPrice += $value->total;
            } else {
                $check = false;
            }
        }

        if($check) {
            $totalPrice = ($totalPrice - $discount) > 0 ? ($totalPrice - $discount) : 0;
            // tạo order
            $order_id = DB::table('orders')->insertGetId([
                'user_id' => Auth::user()->id,
                'totalOrder' => $totalPrice,
                'status' => 1,
                'methodPay' => $paymentMethodId,
                'voucherId' => $voucher->id ?? null,
                'dateOrder' => now(),
            ]);
    
            foreach ($cart as $key => $value) {
                // tạo order detail
                DB::table('order_details')->insert([
                    'order_id' => $order_id,
                    'product_id' => $value->product_id,
                    'color_id' => $value->color_id,
                    'quantity' => $value->quantity,
                    'total' => $value->total,
                ]);

                // update số lượng sản phẩm còn lại trong kho
                DB::table('product_color')
                    ->where('id', $value->color_id)
                    ->update([
                        'quantity' => DB::raw('quantity - '.$value->quantity.''),
                    ]);

                // xóa cart item đã order
                DB::table('carts')
                    ->where('user_id', Auth::user()->id)
                    ->where('id', $value->id)
                    ->delete();
            }
    
            return redirect('/cart')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect('errors')->withErrors(['msg' => 'Đặt hàng không thành công vì có sản phẩm không đủ số lượng!']);
        }
    }

    public function applyCoupon(Request $request)
    {
        $coupon = Voucher::where('nameVoucher', $request->coupon_code)
            ->where('delVoucher', 0)->first();

        $jsonResp = array(
            'status' => 'error'
        );
        if (!$coupon) {
            $jsonResp['errMsg'] = 'Mã giảm giá không hợp lệ!';
            return json_encode($jsonResp);
        }

        $jsonResp['status'] = 'success';
        $jsonResp['voucherId'] = $coupon->id ?? '';
        $jsonResp['discount'] = $coupon->discount ?? 0;
        return json_encode($jsonResp);
    }

}
