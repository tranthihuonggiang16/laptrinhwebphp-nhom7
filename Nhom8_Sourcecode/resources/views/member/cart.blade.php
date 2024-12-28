@include('member/includes/header')
<style>
    body.payment-page {
        background-color: #e0f7fa !important;
        font-family: Arial, sans-serif !important;
    }

    .cart-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .cart-header {
        font-weight: bold;
        color: #007bff;
    }

    .btn-custom {
        background-color: #007bff;
        color: #ffffff;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .total-amount {
        font-size: 1.2rem;
        font-weight: bold;
        color: #28a745;
    }

    #errorContainer {
        display: none;
    }
</style>

<body>
<div class="container">
    <div class="cart-container">
        <h2 class="text-center mb-4">Giỏ Hàng</h2>

        <!-- Thông báo -->
        @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif
        <div class="alert alert-danger text-center" id="errorContainer"></div>

        <!-- Bảng Giỏ Hàng -->
        @if (count($cart) > 0)
            <form action="/payment/confirm" method="post" id="cartPayment">
                @csrf
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="cart-header">
                        <th>Chọn</th>
                        <th>#</th>
                        <th>Mã Sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Tên Sản phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $grandTotal = 0; // Biến tính tổng tiền của giỏ hàng
                    @endphp

                    @foreach ($cart as $index => $item)
                        @php
                            // Tính tổng tiền của từng sản phẩm
                            $itemTotal = $item->quantity * $item->price;
                            $grandTotal += $itemTotal; // Cộng dồn vào tổng tiền
                        @endphp
                        <tr class="cart-item">
                            <td>
                                <input type="checkbox" class="select-item" name="itemSelected[]" data-total="{{ $itemTotal }}" value="{{ $item->id }}">
                            </td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->codeProduct }}</td>
                            <td><img src="{{ $item->mainImage }}" width="80"></td>
                            <td>{{ $item->nameProduct }}</td>
                            <td>
                                {{ number_format($item->price) }} VNĐ
                                <input type="hidden" class="price-item" value="{{ $item->price }}">
                            </td>
                            <td>
                                <!-- cập nhật số lượng -->
                                <input type="number" name="quantity" id="quantityCart{{ $item->id }}" value="{{ $item->quantity }}" min="1"
                                    class="form-control text-center w-50 mx-auto quantity-cart">
                                <button type="button" class="btn btn-sm btn-primary mt-1" onclick="cartUpdate('{{ $item->id }}')">Cập nhật</button>
                            </td>
                            <td class="total-price-item">{{ number_format($itemTotal) }} VNĐ</td>
                            <td>
                                <a href="/cart/{{ $item->id }}" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="d-flex flex-column justify-content-end align-items-center mt-4">
                    <div class="mt-3 p-3 border rounded bg-light">
                        <h4 class="mb-3">Chi tiết thanh toán</h4>
                        <div class="d-flex justify-content-between">
                            <span>Tổng tiền đã chọn:</span>
                            <span class="fw-bold text-danger" id="selected-total">0 VNĐ</span>
                        </div>
                        <hr>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg mt-2">Thanh Toán</button>
                </div>
            </form>
        @else
            <h4 class="text-center text-danger">Giỏ hàng của bạn đang trống!</h4>
        @endif
    </div>
</div>
@include('member/includes/footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#cartPayment').on("submit", function(e) {
            e.preventDefault();
            if($('.select-item:checked').length > 0) {
                this.submit();
            } else {
                confirm("Bạn phải chọn ít nhất một sản phẩm.")
            }
        })
    });

    function cartUpdate(cartId) {
        $.ajax({
            'url' : '/cart/update/'+cartId,
            'type' : 'POST',
            headers: {
                'X-CSRF-TOKEN': $('#cartPayment input[name="_token"]').val()
            },
            'data' : {
                'quantity': $('#quantityCart'+cartId).val()
            },
            'success' : function(data) {
                var obj = JSON.parse(data);
                if(obj['status'] === 'success') {
                    $('.cart-item').each(function(i, item) {
                        var price = $(this).find('.price-item').val();
                        var quantity = $(this).find('.quantity-cart').val();
                        var total = price*quantity;
                        $(this).find('.total-price-item').text(formatNumber(price*quantity, 0) + ' VNĐ');
                        $(this).find('.select-item').attr('data-total', total);
                    });
                    var sum = 0;
                    $('.select-item').each(function(i, item) {
                        if (item.checked) {
                            sum += parseInt(item.getAttribute('data-total'));
                        }
                    });
                    $('#selected-total').text(formatNumber(sum, 0) + ' ₫');
                    alert('update số lượng sản phẩm thành công!');
                } else {
                    $('#errorContainer').text(obj['errMsg']).show();
                }
            },
            'error' : function(request,error)
            {
                alert("Request: "+JSON.stringify(error));
            }
        });
    }

    function formatNumber(number, decimals = 2) {
        return number
            .toFixed(decimals)
            .replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.select-item');
        const totalDisplay = document.getElementById('selected-total');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                let total = 0;

                checkboxes.forEach(item => {
                    if (item.checked) {
                        total += parseInt(item.getAttribute('data-total'));
                    }
                });

                totalDisplay.textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total);
            });
        });
    });
</script>
</body>
