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
                                    @endif</p>
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

            <!-- /.col -->
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection