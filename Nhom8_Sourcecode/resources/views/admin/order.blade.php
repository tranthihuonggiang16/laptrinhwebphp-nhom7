
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
            <h2 class="mb-4">Quản lý đơn hàng</h2>
        
            <!-- Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($status_order as $index => $item)
                    @if ($index==0)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-{{$item->id}}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{$item->id}}" type="button" role="tab" aria-controls="tab-{{$item->id}}" aria-selected="true">
                            {{$item->nameStatus}}
                        </button>
                    </li>
                    @else
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-{{$item->id}}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{$item->id}}" type="button" role="tab" aria-controls="tab-{{$item->id}}" aria-selected="false">
                            {{$item->nameStatus}}
                        </button>
                    </li>
                    @endif
                @endforeach
            </ul>
        
            <!-- Tab Content -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Tab 1 -->

                @foreach ($status_order as $index => $item)
                @if ($index==0)
                <div class="tab-pane fade show active" id="tab-{{$item->id}}" role="tabpanel" aria-labelledby="tab-{{$item->id}}-tab">
                    <h4> {{$item->nameStatus}}</h4>
                        @csrf
                    <table class="table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Khách Hàng</th>
                                <th>Ngày Mua</th>
                                <th>Tổng Đơn</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Mã giảm giá được áp dụng</th>
                        <th>Số tiền được giảm</th>
                                <th>Chuyển trạng thái</th>
                                <th>Lưu</th>
                                <th>Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item1)
                            @if ($item1->status==$item->id)
                    <form action="/admin/order/{{$item1->id}}" method="POST">
                        @csrf
                            <tr>
                                <td>{{$item1->id}}</td>
                                <td>{{$item1->name}}</td>
                                <td>{{$item1->dateOrder}}</td>
                                <td>{{$item1->totalOrder}}</td>
                                <td>{{$item1->nameMethod}}</td>
                                <td>{{$item1->nameStatus}}</td>
                                @if ($item1->nameVoucher)
                        <td>{{$item1->nameVoucher}}</td>
                            @else
                        <td>Không có</td>
                        @endif
                        @if ($item1->discount)
                        <td>{{$item1->discount}}</td>
                            @else
                        <td>Không có</td>
                        @endif
                                <td>
                                    <select class="form-control" name="status" id="">
                                        @foreach ($status_order as $item2)
                                        @if ($item2->id > $item1->status)
                                        <option value="{{$item2->id}}">{{$item2->nameStatus}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary mt-2">Lưu</button>
                                </td>
                                <td>
                                    <a href="/admin/order/{{$item1->id}}">xem</a>
                                </td>
                            </tr>
                </form>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="tab-pane fade show" id="tab-{{$item->id}}" role="tabpanel" aria-labelledby="tab-{{$item->id}}-tab">
                    <h4> {{$item->nameStatus}}</h4>
                        @csrf
                    <table class="table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Khách Hàng</th>
                                <th>Ngày Mua</th>
                                <th>Tổng Đơn</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Mã giảm giá được áp dụng</th>
                        <th>Số tiền được giảm</th>
                                <th>Chuyển trạng thái</th>
                                <th>Lưu</th>
                                <th>Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item1)
                            @if ($item1->status==$item->id)
                            <form action="/admin/order/{{$item1->id}}" method="POST">
                                @csrf
                                <tr>
                                    <td>{{$item1->id}}</td>
                                    <td>{{$item1->name}}</td>
                                    <td>{{$item1->dateOrder}}</td>
                                    <td>{{$item1->totalOrder}}</td>
                                    <td>{{$item1->nameMethod}}</td>
                                    <td>{{$item1->nameStatus}}</td>
                                    @if ($item1->nameVoucher)
                        <td>{{$item1->nameVoucher}}</td>
                            @else
                        <td>Không có</td>
                        @endif
                        @if ($item1->discount)
                        <td>{{$item1->discount}}</td>
                            @else
                        <td>Không có</td>
                        @endif
                                    <td>
                                        <select class="form-control" name="status" id="">
                                            @foreach ($status_order as $item2)
                                            @if ($item2->id > $item1->status)
                                            <option value="{{$item2->id}}">{{$item2->nameStatus}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary mt-2">Lưu</button>
                                    </td>
                                    <td>
                                        <a href="/admin/order/{{$item1->id}}">xem</a>
                                    </td>
                                </tr>
                    </form>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
    @include('admin/includes/footer')
  
