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
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
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
                                        <b>Bonus</b> <a class="float-right">0%</a>
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

                                <p class="text-muted">{{$user->jenis_kelamin ?? 'Belum Diisi'}}</p>
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
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Ubah Profil</a></li>
                            <li class="nav-item"><a class="nav-link" href="#autentikasi" data-toggle="tab">Ubah Autentikasi</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-danger">
                                            10 Feb. 2014
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-info"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                            <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            3 Jan. 2014
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="inputName" value="{{old('name') ?? $user->name}}">
                                        </div>
                                        @error('name')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputHp" class="col-sm-2 col-form-label">No Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="inputHp" value="{{old('no_telepon') ?? $user->no_telepon}}">
                                        </div>
                                        @error('no_telepon')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputGender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select id="inputGender" name="jenis_kelamim" class="form-control">
                                                <option value="" {{$user->jenis_kelamin == null ? 'selected' : ''}}>Belum Diisi</option>
                                                <option value="L" {{$user->jenis_kelamin && $user->jenis_kelamin == 'L' ? 'selected' : ''}}>Laki-Laki</option>
                                                <option value="P" {{$user->jenis_kelamin && $user->jenis_kelamin == 'L' ? 'selected' : ''}}>Perempuan</option>
                                            </select>
                                        </div>
                                        @error('jenis_kelamin')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="inputAlamat">{{old('alamat') ?? $user->alamat}}</textarea>
                                        </div>
                                        @error('alamat')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="autentikasi">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="inputUsername" value="{{old('username') ?? $user->username}}">
                                        </div>
                                        @error('username')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>



                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div><sup><b>*</b></sup>Jika Anda mengganti Username atau Password, maka Anda akan diarahkan untuk <strong>Login</strong> kembali</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
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