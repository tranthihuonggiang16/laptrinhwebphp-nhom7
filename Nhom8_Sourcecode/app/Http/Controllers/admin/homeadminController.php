<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class homeadminController
{
    
    public function index()
    {
        return view("admin.index");
    }
    
    public function category()
    {
        $category_all = DB::table('categories')
                ->select('*')
                ->get();
        return view("admin.category",compact('category_all'));
    }

    public function voucher()
    {
        $voucher_all = DB::table('vouchers')
                ->select('*')
                ->get();
        return view("admin.voucher",compact('voucher_all'));
    }

    public function product()
    {
        $product_all = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.nameCategory')
                ->get();
        return view("admin.product",compact('product_all'));
    }

    public function staff(Request $request)
    {
        $search = $request->input('search');
        $user_all = User::where('role_id', 2)
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%");
            })
            ->get();

        $notFound = $search && $user_all->isEmpty();

        return view('admin.staff', compact('user_all', 'search', 'notFound'));
    }

    public function errors()
    {
        return view('admin.errors');
    }

}
