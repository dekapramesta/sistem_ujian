<!-- End Page Title -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<body>
    @include('particials.header-ujian')

    <main class="main-ujian" id="main-ujian">


        <section class="section py-3">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Customers Card -->
                    <div class="col-12">
                        <div class="card info-card customers-card">

                            <div class="card-header">
                                Kerjakan Soal Berikut
                            </div>
                            <div class="card-body">
                                {{-- <h5 class="card-title">ADMINISTRATOR <span>| {{ Auth::user()->name }}</span></h5> --}}
                                <div class="d-flex align-items-center py-4">
                                    <p class="me-4" id="no_soal"></p>
                                    <p id="soal"></p>
                                    {{-- <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span> <span class="text-muted small pt-2 ps-1">{{ now() }}</span> --}}
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End Customers Card -->
                    <div class="col">
                        <div class="col-12">
                            <div class="card info-card customers-card px-2 py-2" id="jawaban_place">


                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="col-12">
                        <div class="card info-card customers-card">

                            <div class="card-header">
                                <div class="row d-flex align-items-center">
                                    <div class="col">Jumlah Soal
                                    </div>
                                    <div class="col text-end">
                                        <form action="{{ route('ujian.selesai') }}" method="post">
                                            @csrf
                                            <input hidden type="text" value="{{ Request::segment(3) }}"
                                                name="headerujian" id="">
                                            <button type="submit" class="btn btn-danger btn-sm ">Selesai</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-2" id="soal_button">



                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Recent Sales -->
            <!-- End Recent Sales -->

            <!-- End Left side columns -->
        </section>


    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('ujian.getTemp') }}",
                data: {
                    id: '<?php echo Request::segment(3); ?>'
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    res.data.map((dt, id) => {
                        id++
                        $('#soal_button').append(
                            `<button id='getsoal' class="btn btn-outline-secondary mt-2 ms-2" data-value="${dt.id}" data-index="${id}" >${id}</button>`
                        )
                    })
                }
            });
            $('#soal_button').on('click', '#getsoal', function() {
                $('#no_soal').html(`${$(this).data('index')}`)
                getSoal($(this).data('value'))

            })
        })

        function getSoal(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('ujian.getSoal') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    $('#jawaban_place').html(``)
                    $('#soal').html(res.data.soal.soal)
                    res.data.soal.jawaban.map((dt, index) => {
                        if (res.data.id_jawaban && (parseInt(res.data.id_jawaban) === parseInt(dt
                                .id))) {

                            $('#jawaban_place').append(`
                             <div class="form-check" >
                                        <input class="form-check-input" onclick="postJawab('${id}','${dt.id}')" type="radio" name="jawaban"
                                            id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <p>${dt.jawaban}</p>
                                        </label>
                                          </div>
                                   `)
                        } else {

                            $('#jawaban_place').append(`
                                                         <div class="form-check" >
                                                                    <input class="form-check-input" onclick="postJawab('${id}','${dt.id}')" type="radio" name="jawaban"
                                                                        id="flexRadioDefault1" >
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        <p>${dt.jawaban}</p>
                                                                    </label>
                                                                      </div>
                                                               `)

                        }

                    })
                }
            });
        }

        function postJawab(id_temp, id_jawaban) {
            console.log(id_temp, id_jawaban)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('ujian.postjawaban') }}",
                data: {
                    id_temp: id_temp,
                    id_jawaban: id_jawaban
                },
                dataType: 'json',
                success: function(res) {


                }
            });
        }
        getSoal(1)
    </script>
</body>

{{-- @include('particials.footer') --}}



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
{{-- <script src="{{ asset('assets/js/full_screen.js') }}"></script> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (session()->has('error'))
    ;
    <script>
        swal("Mohon Maaf", "{{ session('error') }}", "error");
    </script>
@endif

@if (session()->has('success'))
    ;
    <script>
        swal("Berhasil", "{{ session('success') }}", "success");
    </script>
@endif
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>

</html>
