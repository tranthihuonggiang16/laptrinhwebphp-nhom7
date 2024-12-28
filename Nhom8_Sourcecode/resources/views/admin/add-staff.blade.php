@include('admin/includes/header')
<style>
</style>

<div class="main-content mt-5">
    <div class="container mt-5">
        <h2 class="mb-4">Thêm nhân viên</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('admin/staff/register-staff') }}" method="post">
            @csrf
            <label for="Thêm nhân viên"> Thêm nhân viên: </label>
            <input class="form-control w-75 mt-2" type="text" placeholder="Tên nhân viên" name="name" required/>
            <input class="form-control w-75 mt-2" type="email" placeholder="Email nhân viên" name="email" required/>
            <input class="form-control w-75 mt-2" maxlength="10" type="text" placeholder="Số điện thoại" name="phone" required/>
            <input class="form-control w-75 mt-2" type="text" placeholder="Địa chỉ" name="address" required/>
            <input class="form-control w-75 mt-2" minlength="8" type="password" placeholder="Mật khẩu" name="password" required/>
            <button class="btn btn-primary mb-5 mt-2" type="submit">Thêm</button>
        </form>
    </div>
</div>
@include('admin/includes/footer')
