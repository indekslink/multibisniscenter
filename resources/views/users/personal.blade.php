@extends('layout.main')

@section('title','Profil '.$user->name)

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profil {{$user->name}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>

                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if(session('success'))
            <div class="col-12 ">
                <div class="alert alert-success" role="alert">
                    {{session("success")}}
                </div>
            </div>
            @endif
            <div class="col-12">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{avatar('/images/',$user->avatar)}}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}}</h3>



                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Kode Referal</b> <a class="float-right">{{$user->latestReferral->code}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Bonus</b> <a class="float-right">{{$user->referal_using()->count() * 15}}%</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Referal Terpakai</b> <a class="float-right">{{$user->referal_using()->count() > 0 ? $user->referal_using()->count() . ' Kali' : 0}}</a>
                                    </li>
                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-7">
                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tentang Saya</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                <p class="text-muted">
                                    {{$user->alamat ?? 'Belum Diisi'}}
                                </p>

                                <hr>
                                <strong><i class="fas fa-tty mr-1"></i> No Telepon</strong>

                                <p class="text-muted">
                                    {{$user->no_telepon}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-genderless mr-1"></i> Jenis Kelamin</strong>

                                <p class="text-muted">
                                    @if($user->jenis_kelamin == 'L')
                                    Laki-Laki
                                    @elseif($user->jenis_kelamin == 'P')
                                    Perempuan
                                    @else
                                    Belum Diisi
                                    @endif
                                </p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i> Akun Dibuat</strong>

                                <p class="text-muted">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">

                            <li class="nav-item"><a class="nav-link {{$errors->first('username')|| $errors->first('password') ? '' : 'active'}}" href="#settings" data-toggle="tab">Ubah Profil</a></li>
                            <li class="nav-item"><a class="nav-link {{$errors->first('username')|| $errors->first('password') ? 'active' : ''}}" href="#autentikasi" data-toggle="tab">Ubah Autentikasi</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->

                            <div class="tab-pane {{$errors->first('username')|| $errors->first('password') ? '' : 'active'}}" id="settings">
                                <form enctype="multipart/form-data" onsubmit="disabledSubmit('button.submit-ubah-profil')" class="form-horizontal" method="post" action="{{ route('users.update',$user->username) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="inputName" value="{{old('name') ?? $user->name}}">
                                            @error('nama_lengkap')
                                            <div class="text-danger">
                                                <small>{{$message}}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputHp" class="col-sm-2 col-form-label">No Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="inputHp" value="{{old('no_telepon') ?? $user->no_telepon}}">
                                            @error('no_telepon')
                                            <div class="text-danger">
                                                <small>{{$message}}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputGender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select id="inputGender" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="" {{$user->jenis_kelamin == null ? 'selected' : ''}}>Belum Diisi</option>
                                                <option value="L" {{$user->jenis_kelamin && $user->jenis_kelamin == 'L' || old('jenis_kelamin') == 'L' ? 'selected' : ''}}>Laki-Laki</option>
                                                <option value="P" {{$user->jenis_kelamin && $user->jenis_kelamin == 'P' || old('jenis_kelamin') == 'P' ? 'selected' : ''}}>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                            <div class="text-danger">
                                                <small>{{$message}}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="inputAlamat">{{old('alamat') ?? $user->alamat}}</textarea>
                                            @error('alamat')
                                            <div class="text-danger">
                                                <small>{{$message}}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                        <div class="col-sm-10">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <img src="{{avatar('/images/',$user->avatar)}}" alt="" class="preview-avatar img-fluid img-thumbnail rounded-circle">
                                                </div>
                                                <div class="col-8">
                                                    <input class="with-preview" data-target="img.preview-avatar" type="file" accept=".jpg, .jpeg, .png" name="avatar" id="avatar">
                                                    @error('avatar')
                                                    <div class="text-danger">
                                                        <small>{{$message}}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success submit-ubah-profil">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane {{$errors->first('username')|| $errors->first('password') ? 'active' : ''}}" id="autentikasi">
                                <form onsubmit="disabledSubmit('button.submit-ubah-autentikasi')" class="form-horizontal" method="post" action="{{ route('users.update.autentikasi',$user->username) }}">
                                    @csrf

                                    @method("PUT")

                                    <div class="form-group row">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="inputUsername" value="{{old('username') ?? $user->username}}">
                                            @error('username')
                                            <div class="text-danger">
                                                <small>{{$message}}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password Baru</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control toggle-password @error('password') is-invalid @enderror" name="password" id="inputPassword">
                                            @error('password')
                                            <div class="text-danger">
                                                <small>{{$message}}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPasswordBaru" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control toggle-password" name="password_confirmation" id="inputPasswordBaru">
                                            <div class="icheck-primary mt-3">
                                                <input type="checkbox" id="toggle-password">
                                                <label for="toggle-password" class="font-weight-normal">
                                                    Tampilkan Password
                                                </label>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <small class="d-block mb-2"><sup><b>*</b></sup>Jika Anda mengganti Username atau Password, maka Anda akan diarahkan untuk <strong>Login</strong> kembali</small>
                                            <small class="d-block "><sup><b>*</b></sup>Abaikan <b>field password</b> jika Anda tidak ingin mengubahnya</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success submit-ubah-autentikasi">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
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