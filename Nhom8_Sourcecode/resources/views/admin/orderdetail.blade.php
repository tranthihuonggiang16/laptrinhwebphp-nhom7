
@include('admin/includes/header')
<style>
    .table-custom {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        margin: 20px 0;
        background: linear-gradient(to bottom, #ffffff, #f7faff);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .table-custom th, .table-custom td {
        text-align: center;
        padding: 15px 20px;
        font-size: 14px;
        color: #333;
    }
    .table-custom th {
        background-color: #5dade2; /* Màu xanh biển nhạt */
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        border-bottom: 2px solid #4a90e2;
    }
    .table-custom tbody tr {
        transition: all 0.2s ease-in-out;
    }
    .table-custom tbody tr:nth-child(even) {
        background-color: #f8faff; /* Màu xen kẽ nhạt */
    }
    .table-custom tbody tr:hover {
        background-color: #eaf5ff;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .table-custom tbody td {
        border-bottom: 1px solid #ddd;
    }
    .table-custom tbody td:first-child {
        font-weight: bold;
        color: #007bff;
    }
    .table-custom tfoot {
        background-color: #f1f5f9;
        font-weight: bold;
        color: #555;
        text-align: right;
    }
    .table-custom tfoot td {
        padding: 10px 20px;
        border-top: 2px solid #ddd;
    }
    /* Nút trong bảng */
    .btn {
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-save {
        background-color: #3498db; /* Màu xanh biển */
        color: white;
    }
    .btn-save:hover {
        background-color: #2980b9;
    }
    .btn-delete {
        background-color: #e74c3c; /* Màu đỏ */
        color: white;
    }
    .btn-delete:hover {
        background-color: #c0392b;
    }
    .btn-restore {
        background-color: #2ecc71; /* Màu xanh lá */
        color: white;
    }
    .btn-restore:hover {
        background-color: #27ae60;
    }
    /* Responsive cho di động */
    @media (max-width: 768px) {
        .table-custom th, .table-custom td {
            font-size: 12px;
            padding: 10px;
        }
        .btn {
            padding: 6px 10px;
            font-size: 12px;
        }
    }
</style>
    <!-- Main Content -->
    <div class="main-content mt-5">
        <div class="container mt-5">
            <h2 class="mb-4">Chi tiết đơn hàng số {{$id}}</h2>
            
            <table class="table">
                <thead>
                    <tr class="cart-header">
                        <th class="" scope="col">#</th>
                        <th class="" scope="col">Mã Sản phẩm</th>
                        <th class="col-2" scope="col">Ảnh Sản phẩm</th>
                        <th class="" scope="col">Tên Sản phẩm</th>
                        <th class="" scope="col">Đơn Giá</th>
                        <th class="" scope="col">Màu</th>
                        <th class="" scope="col">Số Lượng</th>
                        <th class="" scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($order_details as $index => $item)
            <tr>
                <th scope="row">{{++$index}}</th>
                <td>{{$item->codeProduct}}</td>
                <td><img src="{{$item->mainImage}}" width="100%" alt="" srcset=""></td>
                <td>{{$item->nameProduct}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->nameColor}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->total}} VNĐ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
    @include('admin/includes/footer')
  
