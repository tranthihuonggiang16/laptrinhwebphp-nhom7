
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
            <h2 class="mb-4">Danh sách voucher</h2>

            <label for="">Thêm voucher:</label>
            <form action="" method="post">
                @csrf
            <input class="form-control mb-2 mt-2 w-25" type="text" value="" placeholder="Mã voucher" required name="nameVoucher"/>
            <input class="form-control mb-2 mt-2 w-25" type="number" min="1000" value="" placeholder="Số tiền được giảm" required name="discount"/>
            <button class="btn btn-primary mb-5" type="submit">Thêm</button>
            </form>

            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã Voucher</th>
                        <th>Số tiền giảm</th>
                        <th>Lưu</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voucher_all as $index => $item)
                    <form action="/admin/voucher/{{$item->id}}" method="post">
                        @csrf
                    <tr>
                        <td>{{++$index}}</td>
                        <td><input class="form-control" type="text" value="{{$item->nameVoucher}}" name="nameVoucher" required></td>
                        <td><input class="form-control" type="number"  min="1000" value="{{$item->discount}}" name="discount" required></td>
                        <td><button class="btn btn-primary" type="submit">Lưu</button></td>
                        @if ($item->delVoucher==1)
                        <td><a href="/admin/voucher/restore/{{$item->id}}" class="btn btn-success">Khôi Phục</a></td>
                        @else
                        <td><a href="/admin/voucher/lock/{{$item->id}}" class="btn btn-danger">Xóa</a></td>
                        @endif
                    </tr>
                </form>
                    @endforeach
                </tbody>
            </table>
    </div>
    @include('admin/includes/footer')

