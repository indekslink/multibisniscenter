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
            <div class="col-12">
                <form method="get" action="{{route('users.index')}}" id="form-filter">

                    <div class="form-group">
                        <label>Filter status User</label>
                        <select name="status" class="form-control filter-user">
                            <option value="all" {{!request()->query('status')  ? 'selected': '' }}>Semua</option>
                            <option value="active" {{request()->query('status') == 'active' ? 'selected': '' }}>Aktif</option>
                            <option value="inactive" {{request()->query('status') == 'inactive' ? 'selected': '' }}>Tidak Aktif</option>

                        </select>
                    </div>
                </form>
            </div>
            @if(session('success'))
            <div class="col-12 ">
                <div class="alert alert-success" role="alert">
                    {{session("success")}}
                </div>
            </div>
            @endif

            @forelse($users as $user)
            @if($user->is_active)
            <div class="col-6 col-lg-4">
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/images/user.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">Registrasi pada : {{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Status</b> <a class="float-right text-success">Aktif</a>
                            </li>


                        </ul>

                        <a href="{{route('users.show',$user->username)}}" class="btn  btn-outline-info  btn-sm btn-block">Detail</a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            @else
            <div class="col-6 col-lg-4">
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/images/user.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">Registrasi pada : {{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Status</b> <a class="float-right text-danger">Belum Aktif</a>
                            </li>

                        </ul>
                        <div class="row">
                            <div class="col-6">

                                <a href="{{route('users.show',$user->username)}}" class="btn  btn-outline-info  btn-sm btn-block">Detail</a>
                            </div>
                            <div class="col-6">
                                <!-- Button trigger modal upload foto -->
                                <button type="button" data-username="{{base64_encode($user->username)}}" class="btn btn-success btn-sm btn-block button-activate">
                                    Aktifkan
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            @endif
            @empty
            <div class="text-cneter">
                Data masih kosong !!!
            </div>
            @endforelse
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalUploadFoto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalUploadFotoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalUploadFotoLabel">Upload bukti transfer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" onsubmit="disabledSubmit('button.submit-upload-file')">
                            @csrf

                            <div class="mb-4 row text-center">
                                <div class=" col-6">

                                    <label for="uploadFile">Pilih file</label>
                                </div>
                                <div class=" col-6">

                                    <input type="file" required accept=".jpg,.jpeg,.png" name="foto" id="uploadFile">
                                </div>
                            </div>
                            <button class="btn btn-primary float-right btn-block submit-upload-file">Simpan</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('script')
<script>
    const buttonActivate = document.querySelector('button.button-activate');
    if (buttonActivate) {

        buttonActivate.addEventListener('click', function(e) {
            let route = `{{route('users.activate','username')}}`
            const username = atob(e.target.getAttribute('data-username'));
            route = route.replace('username', username);
            $('#modalUploadFoto form').attr('action', route)
            $('#modalUploadFoto').modal('show')
        })
    }

    $('select.filter-user').on('change', function() {


        $('form#form-filter').submit();

    })
</script>
@endsection