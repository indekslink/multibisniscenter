@extends('layout.auth')

@section('title','Daftar')

@section('content')
<div class="card">
    <div class="card-body login-card-body rounded-pill">
        <p class="login-box-msg">Silahkan lengkapi field yang tersedia</p>

        <form action="{{route('postRegister')}}" method="post" onsubmit="disabledSubmit('button.submit-register')">
            @csrf
            <div class="input-group mb-3">
                <input autofocus type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{old('nama_lengkap') ?? ''}}" placeholder="Nama Lengkap">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('nama_lengkap')
                <small class="text-danger d-block w-100">{{ $message }}</small>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="text" name="username" value="{{old('username') ?? ''}}" class="form-control  @error('username') is-invalid @enderror" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-id-card-alt"></span>
                    </div>
                </div>
                @error('username')
                <small class="text-danger d-block w-100">{{ $message }}</small>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="text" name="no_telepon" value="{{old('no_telepon') ?? ''}}" class="form-control  @error('no_telepon') is-invalid @enderror" placeholder="No Telepon">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-tty"></span>
                    </div>
                </div>
                @error('no_telepon')
                <small class="text-danger d-block w-100">{{ $message }}</small>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" value="{{old('password') ?? ''}}" class="form-control toggle-password  @error('password') is-invalid @enderror" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user-lock"></span>
                    </div>
                </div>
                @error('password')
                <small class="text-danger d-block w-100">{{ $message }}</small>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control toggle-password" placeholder="Konfirmasi Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user-lock"></span>
                    </div>
                </div>
            </div>
            <div class="icheck-primary mb-3">
                <input type="checkbox" id="toggle-password">
                <label for="toggle-password" class="font-weight-normal">
                    Tampilkan Password
                </label>
            </div>
            <div class="form-group mb-3">
                <label for="code">Punya Kode Referal ?</label>
                <input autocomplete="off" type="text" name="kode_referal" value="{{old('kode_referal') ?? ''}}" class="form-control  @error('kode_referal') is-invalid @enderror" placeholder="Masukkan Disini">
                @error('kode_referal')
                <small class="text-danger d-block w-100">{{ $message }}</small>
                @enderror
            </div>




            <!-- /.social-auth-links -->

            <p class="mb-3">
                <button type="submit" class="btn submit-register btn-primary btn-block">Daftar</button>
            </p>
        </form>
        <p class="mb-0 text-center ">
            Sudah punya akun ? <a href="{{route('login')}}" class="text-dark text-decoration-underline"> Masuk Sekarang</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection


@section('script')
<script>
    const togglePassword = document.getElementById('toggle-password')
    const targetInput = document.querySelectorAll('.toggle-password')
    const labelTogglePassword = document.querySelector('label[for="toggle-password"]')
    togglePassword.addEventListener('change', function(e) {
        const isChecked = e.target.checked;
        targetInput.forEach(input => {
            if (isChecked) {
                input.setAttribute('type', 'text');
                labelTogglePassword.innerHTML = 'Sembuyikan Password'
            } else {

                input.setAttribute('type', 'password');
                labelTogglePassword.innerHTML = 'Tampilkan Password'
            }
        })
    })
</script>
@endsection