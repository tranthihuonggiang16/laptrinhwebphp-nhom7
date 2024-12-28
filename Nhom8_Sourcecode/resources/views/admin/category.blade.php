
@include('admin/includes/header')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
    </div>
@endif
<style>
    .alert {
    font-size: 16px; /* Tăng kích thước chữ */
    padding: 10px 20px; /* Tăng khoảng cách */
    border-radius: 8px; /* Bo góc lớn hơn */
    margin: 0 auto;
    width: 60%; /* Tăng chiều rộng */
    position: absolute;
    top: 80px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Tăng bóng */
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #f8d7da; /* Màu nền đỏ nhạt */
    color: #721c24; /* Màu chữ */
}

    .alert .btn-close {
    background: none; /* Loại bỏ nền */
    border: none; /* Loại bỏ viền */
    font-size: 18px; /* Kích thước nút X */
    cursor: pointer; /* Con trỏ dạng nút bấm */
    padding: 0; /* Loại bỏ padding thừa */
    margin-left: 10px; /* Khoảng cách giữa nút X và nội dung */
    line-height: 1; /* Đảm bảo căn chỉnh vừa vặn */
    color: #721c24; /* Màu chữ của nút X */
}

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
            <h2 class="mb-4">Danh sách danh mục</h2>

            <label for="">Thêm danh mục:</label>
            <form action="" method="post">
                @csrf
            <input class="form-control mb-2 mt-2 w-25" type="text" value="" placeholder="Tên danh mục" required name="nameCategory"/>
            <button class="btn btn-primary mb-5" type="submit">Thêm</button>
            </form>

            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Danh Mục</th>
                        <th>Lưu</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category_all as $index => $item)
                    <form action="/admin/category/{{$item->id}}" method="post">
                        @csrf
                    <tr>
                        <td>{{++$index}}</td>
                        <td><input class="form-control" type="text" value="{{$item->nameCategory}}" name="nameCategory" required></td>
                        <td><button class="btn btn-primary" type="submit">Lưu</button></td>
                        @if ($item->delCategory==1)
                        <td><a href="/admin/category/restore/{{$item->id}}" class="btn btn-success">Khôi Phục</a></td>
                        @else
                        <td> <a href="/admin/category/lock/{{$item->id}}"  
                        class="btn btn-danger" 
                        onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');">Xóa</a></td>
                        @endif
                    </tr>
                </form>
                    @endforeach
                </tbody>
            </table>
    </div>
    @include('admin/includes/footer')
  
