@extends('layout.auth')

@section('title','Login')

@section('content')
<div class="card">
    <div class="card-body login-card-body rounded-pill">
        <p class="login-box-msg">Silahkan masuk untuk memulai sesi anda</p>

        @error('credentials')
        <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        <form action="{{route('postLogin')}}" method="post" onsubmit="disabledSubmit('button.submit-login')">
            @csrf
            <div class="input-group mb-3">
                <input autofocus type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-id-card-alt"></span>
                    </div>
                </div>

                @error("username")
                <div class="text-danger w-100">
                    <small>{{$message}}</small>
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user-lock"></span>
                    </div>
                </div>
                @error("password")
                <div class="text-danger w-100">
                    <small>{{$message}}</small>
                </div>
                @enderror
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-6">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            Ingat Saya
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <!-- <div class="col-6 text-right">
                    <a href="" class="text-dark">Lupa Password ?</a>

                </div> -->
                <!-- /.col -->
            </div>



            <!-- /.social-auth-links -->

            <p class="mb-3">
                <button type="submit" class="btn btn-primary btn-block submit-login">Masuk</button>
            </p>
        </form>
        <p class="mb-0 text-center ">
            Belum punya akun ? <a href="{{route('register')}}" class="text-dark text-decoration-underline"> Daftar Sekarang</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection