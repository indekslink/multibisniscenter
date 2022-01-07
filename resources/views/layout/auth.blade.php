<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MBC | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('style')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="/images/logo.png" alt="" class="img-fluid d-block w-50 mx-auto">
            <a href="#"><b>MBC</b> Multi Bisnis Center</a>
        </div>
        <!-- /.login-logo -->
        @yield('content')
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendor/dist/js/adminlte.min.js"></script>
    <script src="/js/script.js"></script>
    @yield('script')
</body>

</html>