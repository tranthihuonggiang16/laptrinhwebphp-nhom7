<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('Trangchinh/logo.png') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('Trangchinh/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font1|Font2|Font3&display=swap">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
    <link href="{{ asset('Trangchinh/css/style.css') }}" rel="stylesheet">

    <title>Trang chu</title>

</head>

<body>
<!--Header 1-->
<header>
    <div id="logo">
        <a href="index.html"><img src="{{ asset('Trangchinh/logo1.png')}}" alt="Your Logo" class="VENUS"></a>
    </div>

    <form action="/search" method="post">
        @csrf
        <div class="input-group" id="search-box">

            <input type="text" class="form-control" name="searchText" id="search-input"
                   placeholder="Tìm kiếm sản phẩm bạn yêu thích">
            <div class="input-group-append">
                <button class="btn btn-outline-light" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <div id="login-link">
        <a class="nav-link" href="/auth">
            <img src="{{ asset('Trangchinh/images/user.svg') }}">
        </a>

        @if (Auth::check())
            <a class="nav-link text-white">Hello, {{ Auth::user()->name }}</a>

            <a class="nav-link text-white" href="{{ route('changePasswordForm') }}">Đổi mật khẩu</a>

            <a class="nav-link text-white" href="/logout">Đăng xuất</a>
        @else
            <a class="nav-link text-white" href="/auth">Đăng nhập</a>
        @endif

        <a class="nav-link" href="/cart">
            <img src="{{ asset('Trangchinh/images/cart.svg') }}">
        </a>
    </div>

</header>
<!--End Header 1-->

<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md nagvbar-dark b-dark" arial-label="Furni navigation bar">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav me-auto mb-2 mb-md-0">
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">Trang chủ</a>
    </li>
    <li>
    <div class="dropdown {{ request()->is('product') || request()->is('product/*') ? 'active' : '' }}">
        <a class="nav-link" href="/product">Sản phẩm</a>
        <div class="dropdown-content">
            @if (isset($category_all))
                @foreach ($category_all as $item)
                    <a href="/category/{{$item->id}}">{{$item->nameCategory}}</a>
                @endforeach
            @endif
        </div>
    </div>
</li>
    <li class="{{ request()->is('about') ? 'active' : '' }}">
        <a class="nav-link" href="/about">Giới thiệu</a>
    </li>
    <li class="{{ request()->is('sale') ? 'active' : '' }}">
        <a class="nav-link" href="/sale">Khuyến mãi</a>
    </li>
    <li>
        <div class="dropdown {{ request()->is('blog*') ? 'active' : '' }}">
            <a class="nav-link">Blog</a>
            <div class="dropdown-content">
                <a href="/tintucveVENUS">Tin tức về VENUS</a>
                <a href="/goctuvan">Góc tư vấn</a>
                <a href="/benhvemat">Bệnh về mắt</a>
                <a href="/kienthucchung">Kiến thức chung</a>
            </div>
        </div>
    </li>
    @if (Auth::check())
        <li class="{{ request()->is('order') ? 'active' : '' }}">
            <a class="nav-link" href="/order">Lịch sử đơn hàng</a>
        </li>
    @endif
</ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li>
                    <p class="nav-link">|</p>
                </li>
                <li>
                    <p class="nav-link">Hotline: </p>
                </li>
                <li><a class="nav-link" href="#">0962642642</a></li>

            </ul>
        </div>
    </div>
</nav>


<!-- Slideshow container -->


<!--END Slideshow container -->

<!--CRO-BT-->
<div class="BT">
    <div class="cro-buttons">
        <a href="https://www.facebook.com/matkinhvenus1101" class="facebook" target="_blank"><img
                src="{{ asset('Trangchinh/images/facebook.jpg')}}" alt="Facebook"></a>
        <a href="https://www.tiktok.com/@kinhmatVENUS" class="tiktok" target="_blank"><img
                src="{{ asset('Trangchinh/images/tiktok.png')}}" alt="TikTok"></a>
        <a href="https://www.instagram.com/kinhmat.venus/" class="instagram" target="_blank"><img
                src="{{ asset('Trangchinh/images/ig.png')}}" alt="Instagram"></a>
    </div>
</div>
<!--CRO-BT-->
