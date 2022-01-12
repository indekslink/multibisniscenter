@extends('layout.main')

@section('title','Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row ">
            <div class="col-12">
                <!-- small box -->
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cogs"></i></span>

                    <div class="info-box-content">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>

                                <span class="info-box-text">
                                    <h3>Kode Referal</h3>
                                </span>
                                <span class="info-box-number">
                                    <h2 class="target-kode">{{auth()->user()->latestReferral->code}}</h2>

                                </span>
                            </div>
                            <button class="btn-sm btn btn-outline-info" onclick="copyToClipboard('.target-kode','Kode Referal Berhasil di salin')">Salin Kode Referal</button>
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class=" col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{\App\Models\User::where('username','!=',auth()->user()->username)->where('is_active','1')->count()}}</h3>

                        <p>User Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{route('users.index',['status'=>'active'])}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=" col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{\App\Models\User::where('username','!=',auth()->user()->username)->where('is_active','0')->count()}}</h3>

                        <p>User Tidak Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <a href="{{route('users.index',['status'=>'inactive'])}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection