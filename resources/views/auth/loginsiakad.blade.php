<html>

<head>
    <meta charset="UTF-8">
    <title>CBT SMAN 1 Kawedanan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description"
        content="siAkad Cloud solusi terbaik Perguruan Tinggi. Langsung Bisa Digunakan, Tidak Ribet dan Pelaporan Beres.">
    <meta name="keywords" content="">
    <meta name="author" content="siAkad Cloud">
    <!-- font Awesome -->
    <link href="https://assets.siakadcloud.com/assets/v1/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link href="https://assets.siakadcloud.com/assets/v1/css/customs/login-v2.css?210422" rel="stylesheet"
        type="text/css">
    <link rel="icon" type="img/png" href="{{  asset('assets/img/smasaka.png') }}"
        sizes="16x16">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
                  <script src="https://assets.siakadcloud.com/assets/v1/js/external/html5shiv.js"></script>
          <script src="https://assets.siakadcloud.com/assets/v1/js/external/respond.min.js"></script>
          <![endif]-->

    <style type="text/css">
        .login-page .form-box .univ-identity-box {
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), img src="{{  asset('assets/img/sma.jpg') }}", bottom;
            background-size: cover;
        }

        @media (min-width: 768px) {
            .login-page .form-box .univ-identity-box {
                border-radius: 10px 0 0 10px;
            }
        }
    </style>
    <style type="text/css">
        html,
        body {
            background: #f2f2f2 url('https://assets.siakadcloud.com/assets/v1/img/pattern/pat_04.png') repeat !important;
        }

        .password {
            position: relative;
        }

        .showbtn {
            cursor: pointer;
            overflow: hidden;
            right: 15px;
            position: absolute;
            top: 10px;
            cursor: pointer;
        }

        .login-page .form-box .form-login img.logo {
            max-width: 90%;
        }

        .login-page .form-box {
            border-radius: 10px;
            box-shadow: 0 0 35px 0 rgb(154 161 171 / 20%);
        }

        .btn {
            border-radius: .3rem;
        }

        .btn-login {
            font-size: 1.1rem;
        }
    </style>
    <style type="text/css">
        .icon-input,
        a,
        .text-brand {
            color: #00954a;
        }

        .btn-primary,
        .alert-primary,
        .label-primary,
        body>header .user-menu .dropdown-menu>.user-header {
            background-color: #00954a;
        }

        body>header .user-menu .dropdown-menu:after {
            border-color: #00954a;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary.focus {
            background-color: #00753a;
        }

        a:hover,
        a:focus,
        a :active,
        a :focus {
            color: #00753a;
        }

        .btn-primary:hover {
            border-color: #00753a;
        }
    </style>
</head>

<body class="login-page" style="">
    <div class="container">
        <div class="row">
            <div class="form-box col-md-8 col-sm-10 col-xs-12">
                <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 univ-identity-box">
                    <div class="univ-text">
                        <h4 class="welcome text-light">Selamat Datang</h4>
                        <div class="clearfix"></div>
                        <h2 class="no-margin text-light">Computer Based Test</h2>
                        <h3 class="no-margin"><b>SMA Negeri 1 Kawedanan</b></h3>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 form-login" align="center">
                    <img src="{{  asset('assets/img/smasaka.png') }}" class="logo">
                    <b>
                        <h4 class="text-grey text-light text-center" style="margin-top: 30px; margin-bottom: 15px;">
                            Masuk dengan akun Anda</h4>
                    </b>
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif


                    <form method="POST" action="{{ route('login.action') }}">
                        @csrf
                        <div class="form-group">
                            <i class="fa fa-user icon-input"></i> <input type="email" name="email" id="email"
                                class="form-control input-line" placeholder="Masukkan Akun Pengguna" required="true">
                        </div>
                        <div class="form-group" style="margin-bottom: -5px;">
                            <div class="password">
                                <i style="margin-left:-20px;" class="fa fa-key icon-input"></i>
                                <input type="password" id="password" name="password" class="form-control input-line"
                                    placeholder="Masukkan Kata Sandi" required="true">
                                <span id="iconshow" name="iconshow" onclick="showPass()"
                                    class=" showbtn fa fa-eye-slash"></span>
                            </div>
                        </div>
                        <a style="font-size: 11px; padding: 0px 0px 25px 0px;" href="/gate/lupapw"
                            class="text-center pull-right">Lupa kata sandi?</a>
                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-flat btn-primary btn-block btn-login">Masuk</button>
                        </div>
                        {{-- <input type="hidden" name="_token" value="M040sjQ2SjEwNzMxS0pMTkw0STY0tjC0MDVPNLEwTLIAAA=="> --}}
                    </form>
                    <div style="margin-top: 30px;">
                        <small>
                            <span class="text-center text-muted">Powered By</span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery 2.0.2 -->
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-9GSZKDCXHL&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="https://assets.siakadcloud.com/assets/v1/js/external/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://assets.siakadcloud.com/assets/v1/js/bootstrap.min.js" type="text/javascript"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-91361426-5"></script>

    <script type="text/javascript">
        function showPass() {
            if (document.getElementById("password").type == 'password') {
                document.getElementById("password").type = 'text';
                document.getElementById("iconshow").classList.remove('fa-eye-slash');
                document.getElementById("iconshow").classList.add('fa-eye');
            } else {
                document.getElementById("password").type = 'password';
                document.getElementById("iconshow").classList.remove('fa-eye');
                document.getElementById("iconshow").classList.add('fa-eye-slash');
            }
        }
    </script>
</body>

</html>
