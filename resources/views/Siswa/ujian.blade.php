<!-- End Page Title -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CBT - SMAN 1 KAWEDANAN</title>
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
            <div class="d-flex flex-row justify-content-between px-3">
                <div class="col-8 px-3">
                    <div class="card w-full">
                        <div class="card-body">
                            <h5 class="card-title" id="header_ujian"></h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="kelas_siswa"></h6>
                            <hr>
                            {{-- Soal --}}
                            <p class="text-muted"><span>Soal <span id="no_soal_now"></span> Dari <span
                                        id="no_soal_last"></span></span>
                            </p>
                            <div class="d-flex flex-row justify-content-start">
                                <div class="col-1 d-flex" style="width: 45px">
                                    <p class="me-4 flex-fill" id="no_soal">1.</p>
                                </div>
                                <div class="col-11">
                                    <p class="card-text" style='white-space: pre-line;' id="soal"></p>
                                    <div class="col text-start" style="height: 300px" id="gambar-soal"
                                        style="flex:0 0 auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card w-full">
                        <div class="card-body">
                            <div class="col text-start py-4" id="jawaban_place">

                            </div>
                            <div class="d-flex justify-content-between" id="button_next_prev">
                                <div id="btn_sebelumnya">
                                    {{-- <button id='getsoal' class="btn btn-outline-secondary btn-sm px-3 mt-2 ms-2"
                                        data-value="${dt.id}" data-index="${id}">Sebelumnya</button> --}}
                                </div>
                                <div id="btn_selanjutnya">
                                    {{-- <button id='getsoal' class="btn btn-outline-secondary btn-sm px-3 mt-2 ms-2"
                                        data-value="${dt.id}" data-index="${id}">Selanjutnya</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-4 ms-4">
                    <div class="card w-full">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between inline align-items-center">
                                <h5 class="card-title">Waktu <span id="waktu_ujian"></span></h5>
                                <div class="col text-end">
                                    <form action="{{ route('ujian.selesai') }}" method="post" id="submitujian">
                                        @csrf
                                        <input hidden type="text" value="{{ Request::segment(3) }}"
                                            name="headerujian" id="">
                                        <button type="b" class="btn btn-danger btn-sm ">Selesai</button>
                                    </form>
                                </div>
                            </div>
                            <div class="container border border-grey rounded text-center align-items-center ">

                                <h6 class="fs-5 text-black mt-3" id="demo"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card w-full">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <h5 class="card-title">Soal</h5>
                            </div>
                            <div class="container border border-grey rounded justify-content-start py-2 px-2"
                                id="soal_button">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script type="text/javascript">
        $(document).ready(async function() {
            let id_soal; //membuat variable id_soal
            let total_soal;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //csrf
                }
            });
            await $.ajax({ // memanggil button nomer soal
                type: "POST",
                url: "{{ route('ujian.getTemp') }}",
                data: {
                    id: '<?php echo Request::segment(3); ?>'
                },
                dataType: 'json',
                success: function(res) {
                    id_soal = res.data[0].id //menambah value id_soal
                    total_soal = res.data.length
                    console.log(res)
                    res.data.map((dt, id) => {
                        id++
                        if (dt.id_jawaban === null) {

                            $('#soal_button').append(
                                `<button id='getsoal' class="btn btn-outline-secondary btn-sm px-3 mt-2 ms-2" style="width: 50px;" data-value="${dt.id}" data-index="${id}">${id}</button>`
                            )
                        } else {
                            $('#soal_button').append(
                                `<button id='getsoal' class="btn btn-primary btn-sm px-3 mt-2 ms-2" style="width: 50px;" data-value="${dt.id}" data-index="${id}">${id}</button>`
                            )

                        }

                    })
                    $('#identitas').html(res.siswa.nama + ' (' + res.siswa.nis + ')');
                    $('#no_soal_last').html(res.data.length);
                    $('#header_ujian').html('Ujian : ' + res.ujian.jadwal_ujian.mapel
                        .nama_mapel + ' - Kelas ' + res.ujian.jenjang.nama_jenjang +
                        ' - ' + res.ujian.jadwal_ujian.jenis_ujian + ' - ' + res.ujian
                        .jadwal_ujian.th_akademiks.th_akademik + ' - Semester ' + res.ujian
                        .jadwal_ujian
                        .th_akademiks.nama_semester);
                    $('#kelas_siswa').html('Kelas ' + res.siswa.kelas.jenjang.nama_jenjang + ' ' +
                        res
                        .siswa.kelas.jurusan.nama_jurusan + ' ' + res.siswa.kelas.nama_kelas);
                }
            });
            await $.ajax({ // memanggil waktu countdown ujian
                type: "POST",
                url: "{{ route('ujian.getTime') }}",
                data: {
                    id: '<?php echo Request::segment(3); ?>'
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    var countDownDate = new Date(res.end_time).getTime();

                    // Update the count down every 1 second
                    var x = setInterval(function() {

                        // Get today's date and time
                        var now = new Date().getTime();

                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 *
                            60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 *
                            60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Output the result in an element with id="demo"
                        document.getElementById("demo").innerHTML = hours +
                            " Jam " +
                            minutes + " Menit " + seconds + " Detik ";

                        // If the count down is over, write some text
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("demo").innerHTML = "Selesai";
                            $('#submitujian').submit()

                        }
                    }, 1000);
                    $('#waktu_ujian').html('(' + res.waktu_ujian + ' Menit)');
                }
            });

            $('#soal_button').on('click', '#getsoal', handleClick);
            $('#btn_selanjutnya').on('click', '#getsoal', handleClick);
            $('#btn_sebelumnya').on('click', '#getsoal', handleClick);

            function handleClick() {
                $('#no_soal').html($(this).data('index'));
                $('#no_soal_now').html($(this).data('index'));

                if ($(this).data('index') === 1) {
                    $('#btn_sebelumnya').html('');
                    $('#btn_selanjutnya').html(
                        `<button id='getsoal' class="btn btn-outline-primary btn-sm px-3 mt-2 ms-2" data-value="${$(this).data('value') + 1}" data-index="${$(this).data('index') + 1}">Selanjutnya</button>`
                    );
                } else if ($(this).data('index') === total_soal) {
                    $('#btn_selanjutnya').html('');
                    $('#btn_sebelumnya').html(
                        `<button id='getsoal' class="btn btn-outline-primary btn-sm px-3 mt-2 ms-2" data-value="${$(this).data('value') - 1}" data-index="${$(this).data('index') - 1}">Sebelumnya</button>`
                    );
                } else {
                    $('#btn_sebelumnya').html(
                        `<button id='getsoal' class="btn btn-outline-primary btn-sm px-3 mt-2 ms-2" data-value="${$(this).data('value') - 1}" data-index="${$(this).data('index') - 1}">Sebelumnya</button>`
                    );
                    $('#btn_selanjutnya').html(
                        `<button id='getsoal' class="btn btn-outline-primary btn-sm px-3 mt-2 ms-2" data-value="${$(this).data('value') + 1}" data-index="${$(this).data('index') + 1}">Selanjutnya</button>`
                    );
                }

                getSoal($(this).data('value'));
            }

            getSoal(id_soal)
            $('#no_soal').html('1.')
            $('#no_soal_now').html('1')
            $('#btn_selanjutnya').html(
                `<button id='getsoal' class="btn btn-outline-primary btn-sm px-3 mt-2 ms-2" data-value = "${id_soal + 1}" data-index = "2" >Selanjutnya</button>`
            )
        })
        document.getElementById('submitujian').addEventListener('submit', function(
            evt) { // ketika siswa menekan tombol selesai
            evt.preventDefault();
            swal({
                    title: "Ingin Mengakhiri Ujian?",
                    text: "Silahkan cek Ujian sebelum diahiri!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((isEnd) => {
                    if (isEnd) {
                        $('#submitujian').submit()
                    }
                });

        })




        function getSoal(id) { // untuk menampilkan soal
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
                    console.log('jwb', res.data.soal.jawaban)
                    let imageSoal = ``;
                    if (res.data.soal.soal_gambar === null) {

                    } else if (parseInt(res.data.soal.soal_gambar) === 1) {

                    } else {
                        imageSoal = `<img src="{{ asset('img/soal/${res.data.soal.soal_gambar}') }}"
                                    class="card-img-top" style="width: 50%; max-width: 100%; height:auto; max-height:100%"
                                    alt="...">`

                    }
                    $('#jawaban_place').html(``)
                    $('#soal').html(res.data.soal.soal)
                    $('#gambar-soal').html(imageSoal)
                    if (!$('#gambar-soal').find('img').length) {
                        $('#gambar-soal').removeAttr('style');
                    }
                    let arr_soal = []
                    arr_soal.push(res.data.soal.jawaban)
                    let data_jawaban = arr_soal[0]
                    for (let i = data_jawaban.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [data_jawaban[i], data_jawaban[j]] = [data_jawaban[j], data_jawaban[i]];
                    }
                    data_jawaban.map((dt, index) => {


                        console.log('gmb', dt.jawaban)
                        if (res.data.id_jawaban && (parseInt(res.data.id_jawaban) === parseInt(
                                dt
                                .id))) {
                            let imageTrue = ``
                            if (dt.jawaban_gambar === null) {

                            } else if (parseInt(dt.jawaban_gambar) === 1) {

                            } else {

                                imageTrue = `<div class="col text-start mb-5" style="height: 300px"  style="flex:0 0 auto"">
                                            <img src="{{ asset('img/jawabans/${dt.jawaban_gambar}') }}"
                                                class="card-img-top ms-2"
                                                style="width: 50%; max-width: 100%; height:auto; max-height:100%" alt="...">
                                        </div>`;

                            }


                            // if (dt.jawaban_gambar === null && dt.jawaban_gambar !== 1) {
                            //     imageTrue = dt.jawaban_gambar
                            // }
                            console.log('oiasa', imageTrue)

                            $('#jawaban_place').append(
                                `
                            <div class="form-check ms-2 d-flex" style="padding-left:0">
                                <div class="" style="width:flex:0 0 auto">
                                        <input class="form-check-input ms-4" style="float:none" onclick="postJawab('${id}','${dt.id}')" type="radio" name="jawaban"
                                            id="flexRadioDefault1" checked>
                                            </div>
                                            <div class="col text-start">
                                            <p style="white-space: pre-line;" class="ms-2">${dt.jawaban}</p>
                                            <div class="" style="flex:0 0 auto">
                                        ${imageTrue}
                                        </div>
                                            </div>


                                        </div>

                                `)
                        } else {
                            let imageTrue = ``;
                            if (dt.jawaban_gambar === null) {

                            } else if (parseInt(dt.jawaban_gambar) === 1) {

                            } else {

                                imageTrue = `<div class="col text-start mb-5" style="height: 300px" style="flex:0 0 auto">
                                            <img src="{{ asset('img/jawabans/${dt.jawaban_gambar}') }}"
                                                class="card-img-top ms-2"
                                                style="width: 50%; max-width: 100%; height:auto; max-height:100%" alt="...">
                                        </div>`;

                            }

                            console.log('oiasa', imageTrue)

                            $('#jawaban_place').append(`
                                                     <div class="form-check ms-2 d-flex" style="padding-left:0" >
                                                            <div class="" style="flex:0 0 auto">
                                                                <input class="form-check-input ms-4" style="float:none" onclick="postJawab('${id}','${dt.id}')" type="radio" name="jawaban"
                                                                    id="flexRadioDefault1" >
                                                            </div>
                                                                    <div class="col text-start">
                                                                        <p style="white-space: pre-line;" class="ms-2">${dt.jawaban}</p>
                                                                        <div class="" style="flex:0 0 auto">
                                    ${imageTrue}
                                    </div>
                                                                    </div>

                                                                  </div>

                                                           `)

                        }

                    })
                    var button_soal = $(`button[data-value="${id}"]`);
                    if (button_soal.hasClass('btn-primary')) {

                    } else {
                        $(`button[data-value="${id}"]`).removeClass('btn-outline-secondary').addClass(
                            'btn-secondary');
                    }

                    var buttons_bukan_soal = $('button[data-value]');
                    buttons_bukan_soal.filter(function() {
                        return $(this).data('value') !== id && $(this).hasClass(
                            'btn-secondary');
                    }).removeClass('btn-secondary').addClass('btn-outline-secondary');

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
                    console.log(id_temp)
                    document.querySelector(`[data-value="${id_temp}"]`).className =
                        "btn btn-primary btn-sm px-3 mt-2 ms-2";

                }
            });
        }
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
