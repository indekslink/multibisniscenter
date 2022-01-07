@extends('layout.main')

@section('title','Users')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
            @forelse($users as $user)
            <div class="col-6 col-lg-4">
                <div class="card {{$user->is_active ? 'card-primary' : 'card-danger'}} card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/images/user.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Kode Referal</b> <a class="float-right">{{$user->latestReferral->code}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Bonus</b> <a class="float-right">0%</a>
                            </li>
                            <li class="list-group-item">
                                <b>Referal Terpakai</b> <a class="float-right">2 Kali</a>
                            </li>
                        </ul>

                        <a href="#" class="btn  {{$user->is_active ? 'btn-outline-primary' : 'btn-outline-danger'}} btn-sm btn-block"><b>Detail</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            @empty
            <div class="text-cneter">
                Data masih kosong !!!
            </div>
            @endforelse
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection