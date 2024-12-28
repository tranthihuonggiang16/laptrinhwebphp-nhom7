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

<div class="main-content mt-5">
    <div class="container mt-5">
        <h2 class="mb-4">Danh sách nhân viên</h2>

        @if(\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ \Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Form tìm kiếm -->
        <form method="GET" action="{{ url('/admin/staff') }}" class="mb-3">
            <div class="input-group w-50">
                <input type="text" name="search" class="form-control" placeholder="Nhập tên nhân viên..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Thông báo không tìm thấy -->
        @if ($notFound)
        <div class="alert alert-danger text-center">
            Không tìm thấy nhân viên với từ khóa "{{ request('search') }}"
        </div>
        @endif

        <button class="btn btn-primary mb-3 mt-2" onclick="window.location='{{ url("admin/staff/add") }}'">Thêm nhân viên</button>

        <table class="table table-bordered table-striped table-custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Nhân Viên</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Đăng Ký</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_all as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        @if ($item->delUser == 1)
                            <a href="{{ url('/admin/staff/restore/' . $item->id) }}" class="btn btn-success">Mở Khóa</a>
                        @else
                            <a href="{{ url('/admin/staff/lock/' . $item->id) }}"
                               class="btn btn-danger"
                               onclick="return confirm('Bạn có chắc chắn muốn khóa nhân viên này không?')">
                               Khóa
                            </a>
                        @endif
                        <a href="{{ url('/admin/staff/edit/' . $item->id) }}" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/includes/footer')
