@include('member/includes/header')
<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        <li>Error message...</li>
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endif
</div>
    <style>
        body {
            background-color: #e0f7fa; /* Xanh da trời nhạt */
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; /* Màu trắng */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff; /* Xanh da trời đậm */
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Xanh đậm hơn khi hover */
        }
        .form-switch a {
            color: #007bff;
            text-decoration: none;
        }
        .form-switch a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="container">
        <div id="login-form" class="form-container">
            <h3 class="text-center mb-4">Đăng Nhập</h3>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input required name="email" type="email" class="form-control" id="email" placeholder="Nhập email của bạn">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input required name="password" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                </div>
                <button type="submit" class="btn btn-custom w-100">Đăng Nhập</button>
            </form>
            <div class="text-center mt-3 form-switch">
                <small>Bạn chưa có tài khoản? <a href="#" onclick="toggleForms(event, 'register-form')">Đăng ký ngay</a></small>
            </div>
        </div>

        <div id="register-form" class="form-container d-none">
            <h3 class="text-center mb-4">Đăng Ký</h3>
            <form action="/register" method="POST" >
                @csrf
                <div class="mb-3">
                    <label for="fullname" class="form-label">Họ và tên</label>
                    <input required name="name" type="text" class="form-control" id="fullname" placeholder="Nhập họ và tên">
                </div>
                <div class="mb-3">
                    <label for="email-register" class="form-label">Email</label>
                    <input required name="email" type="email" class="form-control" id="email-register" placeholder="Nhập email của bạn">
                </div>
                <div class="mb-3">
                    <label for="email-register" class="form-label">Số điện thoại</label>
                    <input required name="phone" type="text" maxlength="10" class="form-control" id="email-register" placeholder="Nhập số điện thoại của bạn">
                </div>
                <div class="mb-3">
                    <label for="email-register" class="form-label">Địa chỉ</label>
                    <input required name="address" type="text" class="form-control" id="email-register" placeholder="Nhập địa chỉ của bạn">
                </div>
                <div class="mb-3">
                    <label for="password-register" class="form-label">Mật khẩu</label>
                    <input required name="password" minlength="8" type="password" class="form-control" id="password-register" placeholder="Tạo mật khẩu">
                </div>
                <button type="submit" class="btn btn-custom w-100">Đăng Ký</button>
            </form>
            <div class="text-center mt-3 form-switch">
                <small>Bạn đã có tài khoản? <a href="#" onclick="toggleForms(event, 'login-form')">Đăng nhập ngay</a></small>
            </div>
        </div>
    </div>

    <script>
        function toggleForms(event, formId) {
            event.preventDefault();
            document.getElementById('login-form').classList.add('d-none');
            document.getElementById('register-form').classList.add('d-none');
            document.getElementById(formId).classList.remove('d-none');
        }
    </script>
    <script>
    document.addEventListener('click', function (event) {
        if (event.target.matches('.btn-close')) {
            const alert = event.target.closest('.alert');
            if (alert) {
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 150); // Xóa phần tử sau khi hiệu ứng kết thúc
            }
        }
    });
</script>
<!-- Thêm Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-sr5FvNFY5APFbwLb4ur3bzgUBFzt5NXokcbf1lm8XjxmfSIunxOXMZtuWtD4z2kz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-g1F12nK8Fk6FqT75hH2uj0CHea7qTUPRFZGzPZ6vNLsNJiuPLoTCHEIAnrAt3eoM" crossorigin="anonymous"></script>
@include('member/includes/footer')
