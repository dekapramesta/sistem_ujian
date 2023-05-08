<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
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
                    <h5 class="card-title text-center pb-0 fs-4">Computer Based Test</h5>
                    <p class="text-center small">Reset Password</p>
                  </div>

                  <form method="POST" action="{{ route('login.password.save') }}" class="row g-3 needs-validation" novalidate >
                    @csrf
                    <div class="col-12">
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group has-validation">
                            <input type="password" name="password" class="form-control" id="password" required>
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="ri-eye-close-line" id="show" onclick="myFunction()" style=" cursor : pointer"></i>
                            </span>
                            </div>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                        <div>
                            <label for="password" class="form-label">Ulangi Password</label>
                            <div class="input-group has-validation">
                            <input type="password" name="password2" class="form-control" id="password2" required>
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="ri-eye-close-line" id="show2" onclick="myFunction2()" style=" cursor : pointer"></i>
                            </span>
                            </div>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Simpan</button>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      document.getElementById("show").className = "ri-eye-line";
      } else {
        x.type = "password";
      document.getElementById("show").className = "ri-eye-close-line";
      }
    }

    function myFunction2() {
      var x = document.getElementById("password2");
      if (x.type === "password") {
        x.type = "text";
      document.getElementById("show2").className = "ri-eye-line";
      } else {
        x.type = "password";
      document.getElementById("show2").className = "ri-eye-close-line";
      }
    }
    </script>

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

</body>

</html>