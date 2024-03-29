<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aktivasi Akun</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/smasaka.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        html,
        body {
            background: #f2f2f2 url("{{ asset('assets/img/bg neww.avif') }}") repeat !important;
            background-size: 20% auto !important;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('assets/img/smasaka.png') }}" alt="">
                                    <span class="d-none d-lg-block">SMAN 1 Kawedanan</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">AKTIVASI AKUN GURU</h5>
                                        <p class="text-center small">Aktivasi akun dan ganti password anda</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{ route('guru.aktivasi_guru') }}"
                                        method="POST" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="col-12 text-center">
                                            <h5>Nama : {{ $guru->nama }}</h5>
                                            <h5>NIP: {{ $guru->nip }}</h5>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password Baru</label>
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control"
                                                    id="password" required>
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    <i class="ri-eye-close-line" id="show-2"
                                                        onclick="myFunctionNewPass()" style="cursor : pointer"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback">Password baru wajib diisi</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Konfirmasi Password
                                                Baru</label>
                                            <div class="input-group">
                                                <input type="password" name="konfirmasi_password" class="form-control"
                                                    id="konfirmasi_password" required>
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    <i class="ri-eye-close-line" id="show-3"
                                                        onclick="myFunctionRePass()" style="cursor : pointer"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback">Konfirmasi password
                                                baru wajib diisi!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="no_telp" class="form-label">No. Telp</label>
                                            <div class="input-group">
                                                <input type="number" name="no_telp" class="form-control"
                                                    id="no_telp" required>
                                            </div>
                                            <div class="invalid-feedback">Nomor Telepon baru wajib diisi</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" style="background-color: #82cd47;"
                                                type="submit">Aktivasi</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        function myFunctionNewPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("show-2").className = "ri-eye-line";
            } else {
                x.type = "password";
                document.getElementById("show-2").className = "ri-eye-close-line";
            }
        }

        function myFunctionRePass() {
            var x = document.getElementById("konfirmasi_password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("show-3").className = "ri-eye-line";
            } else {
                x.type = "password";
                document.getElementById("show-3").className = "ri-eye-close-line";
            }
        }
    </script>

</body>

</html>
