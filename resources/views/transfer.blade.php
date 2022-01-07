<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MBC | Transfer Investasi Pertama Anda</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo text-capitalize">
            <a href="/vendor/index2.html"><b>Hai</b> {{auth()->user()->name}}</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">Selamat Datang</div>


        <!-- /.lockscreen-item -->
        <div class="help-block text-center mb-2">
            Aktivasi akun Anda dengan melakukan Investasi pertama Anda pada rekening di bawah ini.
        </div>
        <ul class="list-group mb-2">
            <li class="list-group-item bg-transparent d-flex align-items-center justify-content-between ">
                <h3>BCA</h3>
                <div class="text-right">
                    <h6 class="mb-1">
                        H.Muqoddas,SH
                    </h6>
                    <h4>0181937750</h4>
                </div>

            </li>
            <li class="list-group-item bg-transparent d-flex align-items-center justify-content-between ">
                <h3>BANK <br> MANDIRI</h3>
                <div class="text-right">
                    <h6 class="mb-1">
                        KOPERASI INDONESIA
                    </h6>
                    <h4>141 05 99992005</h4>
                    <div class="mb-4"></div>
                    <h6 class="mb-1">
                        PT. MULTI BISNIS GROUP
                    </h6>
                    <h4>141 00 99112005</h4>
                </div>

            </li>

        </ul>
        <div class=" text-center mb-2">
            Sudah transfer ? Silahkan kirim bukti transfer pada nomor di bawah ini.
        </div>
        <div class="mb-5">
            <a href="https://api.whatsapp.com/send?phone=6281259832005&text=Perkenalkan,%20Saya%20{{auth()->user()->name}}%20mau%20mengonfirmasi%20bukti%20transfer%20investasi%20pertama%20Saya" target="_blank" class="btn btn-lg btn-outline btn-success d-block w-100"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
        <div class="text-center display-4 mb-2">
            FAQ
        </div>
        <div class="accordion mb-2 " id="accordionExample">
            <div class="card bg-transparent">
                <div class="card-header py-1 px-2" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-dark btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Pertanyaan 1
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero, fugit?
                    </div>
                </div>
            </div>
            <div class="card bg-transparent">
                <div class="card-header py-1 px-2" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-dark btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Pertanyaan 2
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, delectus?
                    </div>
                </div>
            </div>
            <div class="card bg-transparent">
                <div class="card-header py-1 px-2" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-dark btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Pertanyaan 3
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, delectus?
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2014-2019 <b><a href="http://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
        All rights reserved
    </div>
    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>