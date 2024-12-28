@include('member/includes/header')

<div class="main-content mt-5">
    <div class="container mt-5">
        <h2 class="mb-4">Errors</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</div>
@include('member/includes/footer')
