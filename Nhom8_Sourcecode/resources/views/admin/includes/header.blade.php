<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
        padding-top: 20px;
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom, #f0f8ff, #ffffff);
        color: #333;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .navbar {
        margin-bottom: 20px;
        background-color:rgb(130, 163, 198);
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }
    .navbar:hover {
        background-color:rgb(242, 244, 245);
    }
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: #f8f9fa;
        padding-top: 50px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
        transition: background-color 0.3s ease;
    }
    .sidebar:hover {
        background-color:rgb(247, 247, 248);
    }
    .sidebar a {
        display: block;
        padding: 12px;
        margin: 5px 10px;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .sidebar a:hover {
        background-color:rgb(151, 189, 229);
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .main-content {
        margin-left: 250px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .main-content h1 {
        color:rgb(138, 179, 223);
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/admin/category">Quản lý danh mục</a>
        <a href="/admin/product">Quản lý sản phẩm</a>
        <a href="/admin/user">Quản lý khách hàng</a>
        <a href="/admin/staff">Quản lý nhân viên</a>
        <a href="/admin/order">Quản lý đơn hàng</a>
        <a href="/admin/voucher">Quản lý mã khuyến mại</a>
        <a href="/logout">Đăng xuất</a>
    </div>