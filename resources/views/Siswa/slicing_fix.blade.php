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
            <div class="d-flex flex-row justify-content-between px-5">
                <div class="col-8 px-3">
                    <div class="card w-full">
                        <div class="card-body">
                            <h5 class="card-title">Ujian : UAS BIOLOGI</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Kelas 10 IPA 2</h6>
                            <hr>
                            {{-- Soal --}}
                            <p class="text-muted"><span>Soal <span>1</span> Dari <span>20</span></span></p>
                            <div class="d-flex justify-content-start">
                                <p class="me-4 " id="no_soal">1.</p>
                                <p class="card-text" style='white-space: pre-line;' id="soal">Lorem ipsum, dolor
                                    sit
                                    amet
                                    consectetur
                                    adipisicing elit. Officiis
                                    exercitationem eos nulla molestias perferendis dolores laudantium harum, tempore
                                    iure in
                                    est.
                                    Cupiditate facilis nam accusamus inventore nobis, voluptatum modi labore?</p>
                            </div>
                            <div class="d-flex justify-content-center" id="gambar-soal">
                                <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                    class="card-img-top" style="width: 50%; max-width: 100%; height:auto;"
                                    alt="...">
                            </div>
                            {{-- <div class="col text-start">

                        </div> --}}
                            {{-- Container jawaban --}}
                            <div class="col text-start py-4" id="jawaban_place">
                                {{-- Pilihan jawaban --}}
                                <div class="d-flex flex-row mt-2 align-items-start inline">
                                    <div class="col-1" style="width: 13px">
                                        <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                            style="width: 15px">
                                    </div>
                                    <div class="col-11">
                                        <div class="d-flex flex-row">
                                            <label for="radioButton" class="ms-3">A. </label>
                                            <p style="white-space: pre-line;" class="ms-2">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit.
                                                Fugiat
                                                optio
                                                odit.</p>
                                        </div>
                                        <div class="d-flex justify-content-center ms-4 style="flex:0 0 auto">
                                            <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                                class="card-img-top ms-3"
                                                style="width: 50%; max-width: 100%; height:auto;" alt="...">
                                        </div>

                                    </div>
                                </div>
                                {{-- Pilihan jawaban --}}
                                <div class="d-flex flex-row mt-2 align-items-start inline">
                                    <div class="col-1" style="width: 13px">
                                        <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                            style="width: 15px">
                                    </div>
                                    <div class="col-11">
                                        <div class="d-flex flex-row">
                                            <label for="radioButton" class="ms-3">A. </label>
                                            <p style="white-space: pre-line;" class="ms-2">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit.
                                                Fugiat
                                                optio
                                                odit.</p>
                                        </div>
                                        <div class="d-flex justify-content-center ms-4 style="flex:0 0 auto">
                                            <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                                class="card-img-top ms-3"
                                                style="width: 50%; max-width: 100%; height:auto;" alt="...">
                                        </div>

                                    </div>
                                </div>
                                {{-- Pilihan jawaban --}}
                                <div class="d-flex flex-row mt-2 align-items-start inline">
                                    <div class="col-1" style="width: 13px">
                                        <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                            style="width: 15px">
                                    </div>
                                    <div class="col-11">
                                        <div class="d-flex flex-row">
                                            <label for="radioButton" class="ms-3">A. </label>
                                            <p style="white-space: pre-line;" class="ms-2">Lorem ipsum dolor sit
                                                amet consectetur adipisicing elit.
                                                Fugiat
                                                optio
                                                odit.</p>
                                        </div>
                                        <div class="d-flex justify-content-center ms-4 style="flex:0 0 auto">
                                            <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                                class="card-img-top ms-3"
                                                style="width: 50%; max-width: 100%; height:auto;" alt="...">
                                        </div>


                                    </div>
                                </div>
                                {{-- Pilihan jawaban --}}
                                <div class="d-flex flex-row mt-2 align-items-start inline">
                                    <div class="col-1" style="width: 13px">
                                        <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                            style="width: 15px">
                                    </div>
                                    <div class="col-11">
                                        <div class="d-flex flex-row">
                                            <label for="radioButton" class="ms-3">A. </label>
                                            <p style="white-space: pre-line;" class="ms-2">Lorem ipsum dolor sit
                                                amet consectetur adipisicing elit.
                                                Fugiat
                                                optio
                                                odit.</p>
                                        </div>
                                        <div class="d-flex justify-content-center ms-4 style="flex:0 0 auto">
                                            <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                                class="card-img-top ms-3"
                                                style="width: 50%; max-width: 100%; height:auto;" alt="...">
                                        </div>

                                    </div>
                                </div>
                                {{-- Pilihan jawaban --}}
                                <div class="d-flex flex-row mt-2 align-items-start inline">
                                    <div class="col-1" style="width: 13px">
                                        <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                            style="width: 15px">
                                    </div>
                                    <div class="col-11">
                                        <div class="d-flex flex-row">
                                            <label for="radioButton" class="ms-3">A. </label>
                                            <p style="white-space: pre-line;" class="ms-2">Lorem ipsum dolor sit
                                                amet consectetur adipisicing elit.
                                                Fugiat
                                                optio
                                                odit.</p>
                                        </div>
                                        <div class="d-flex justify-content-center ms-4 style="flex:0 0 auto">
                                            <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                                class="card-img-top ms-3"
                                                style="width: 50%; max-width: 100%; height:auto;" alt="...">
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-4 ms-4">
                    <div class="card w-full">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between inline align-items-center">
                                <h5 class="card-title">Waktu <span>{{ '(30 Menit)' }}</span></h5>
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

                                <h6 class="fs-5 text-black mt-3" id="demo">00:17:00</h6>
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
                                <button class="btn btn-outline-secondary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                                <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript">
        $(document).ready(async function() {
            let id_soal; //membuat variable id_soal
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
                    console.log(res)
                    res.data.map((dt, id) => {
                        id++
                        if (dt.id_jawaban === null) {

                            $('#soal_button').append(
                                `<button id='getsoal' class="btn btn-outline-secondary  btn-sm px-3 mt-2 ms-2" data-value="${dt.id}" data-index="${id}">${id}</button>`
                            )
                        } else {
                            $('#soal_button').append(
                                `<button id='getsoal' class="btn btn-primary btn-sm px-3 mt-2 ms-2" data-value="${dt.id}" data-index="${id}">${id}</button>`
                            )

                        }
                    })
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
                }
            });



            $('#soal_button').on('click', '#getsoal', function() {
                $('#no_soal').html(`${$(this).data('index')}`)
                getSoal($(this).data('value'))

            })
            getSoal(id_soal)
            $('#no_soal').html('1')
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
                                    class="card-img-top" style="width: 50%; max-width: 100%; height:auto;"
                                    alt="...">`

                    }
                    $('#jawaban_place').html(``)
                    $('#soal').html(res.data.soal.soal)
                    $('#gambar-soal').html(imageSoal)
                    let arr_soal = []
                    arr_soal.push(res.data.soal.jawaban)
                    let data_jawaban = arr_soal[0]
                    for (let i = data_jawaban.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [data_jawaban[i], data_jawaban[j]] = [data_jawaban[j], data_jawaban[i]];
                    }
                    data_jawaban.map((dt, index) => {


                        console.log('gmb', dt.jawaban)
                        if (res.data.id_jawaban && (parseInt(res.data.id_jawaban) === parseInt(dt
                                .id))) {
                            let imageTrue = ``
                            if (dt.jawaban_gambar === null) {

                            } else if (parseInt(dt.jawaban_gambar) === 1) {

                            } else {

                                imageTrue = `<div class="d-flex justify-content-center ms-4 style="flex:0 0 auto">
                                            <img src="{{ asset('img/jawabans/${dt.jawaban_gambar}') }}"
                                                class="card-img-top ms-3"
                                                style="width: 50%; max-width: 100%; height:auto;" alt="...">
                                        </div>`;

                            }


                            // if (dt.jawaban_gambar === null && dt.jawaban_gambar !== 1) {
                            //     imageTrue = dt.jawaban_gambar
                            // }
                            console.log('oiasa', imageTrue)

                            $('#jawaban_place').append(`
                         <div class="form-check ms-4 d-flex" style="padding-left:0">
                            <div class="" style="width:flex:0 0 auto">
                                    <input class="form-check-input ms-4" style="float:none" onclick="postJawab('${id}','${dt.id}')" type="radio" name="jawaban"
                                        id="flexRadioDefault1" checked>
                                        </div>
                                        <div>
                                        <p style="white-space: pre-line;" class="ms-2">${dt.jawaban}</p>
                                        </div>


                                      </div>
                                      <div class="d-flex justify-content-center ms-4 style="flex:0 0 auto">
                                    ${imageTrue}
                                    </div>
                               `)
                        } else {
                            let imageTrue = ``;
                            if (dt.jawaban_gambar === null) {

                            } else if (parseInt(dt.jawaban_gambar) === 1) {

                            } else {

                                imageTrue = `<div class="d-block justify-content-center">
                                                                                        <img src="{{ asset('img/jawabans/${dt.jawaban_gambar}') }}"
                                                                                            alt="description of myimage" style="width:250px; height:300px">
                                                                                    </div>`;

                            }

                            console.log('oiasa', imageTrue)

                            $('#jawaban_place').append(`
                                                     <div class="form-check ms-4 d-flex" style="padding-left:0" >
                                                            <div class="" style="flex:0 0 auto">
                                                                <input class="form-check-input ms-4" style="float:none" onclick="postJawab('${id}','${dt.id}')" type="radio" name="jawaban"
                                                                    id="flexRadioDefault1" >
                                                            </div>
                                                                    <div>
                                                                        <p style="white-space: pre-line;" class="ms-2">${dt.jawaban}</p>
                                                                    </div>

                                                                  </div>
                                                                  <div class="d-flex justify-content-center ms-4" style="flex:0 0 auto">
                                    ${imageTrue}
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
                    console.log(id_temp)
                    document.querySelector(`[data-value="${id_temp}"]`).className =
                        "btn btn-secondary mt-2 ms-2";

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
