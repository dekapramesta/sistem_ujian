@extends('layouts.master')

@section('content')
    <div class="pagetitle mb-3">
        <h1>Lihat Preview Ujian</h1>
    </div><!-- End Page Title -->
    <style>
        .dropify-wrapper .dropify-message p {
            margin: 5px 0 0 0;
            font-size: 20px;
        }
    </style>

    <section class="main-ujian">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-header d-flex justify-content-between">
                                <div class="col">
                                    <h5 class="card-title-datatable">
                                        Biologi -
                                        UTS -
                                        2023 - Semester
                                        Genap </h5>
                                </div>
                                <div class="d-flex flex-row ">
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span style="font-size: 15px">10</span>
                                        <h5 style="color: #012970; font-size: 15px">Nilai</h5>
                                    </div>
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span style="font-size: 15px">10</span>
                                        <h5 style="color: #012970; font-size: 15px">Benar</h5>
                                    </div>
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span style="font-size: 15px">10</span>
                                        <h5 style="color: #012970; font-size: 15px">Salah</h5>
                                    </div>
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span style="font-size: 15px">10</span>
                                        <h5 style="color: #012970; font-size: 15px">Soal</h5>
                                    </div>

                                </div>


                            </div>
                            <div
                                class="d-flex flex-column border border-grey rounded justify-content-start py-2 px-2 ms-2 me-2">
                                <span class="fs-5 fw-semibold">Informasi</span>
                                <div class="col mt-3">

                                    <p style="font-size: 13px">Jawaban yang Benar <i class="bi bi-check-circle"
                                            style="color:green"></i></p>
                                    <p style="font-size: 13px">Jawaban yang Dipilih <i class="bi bi-pencil"
                                            style="color:blue"></i></p>
                                </div>
                            </div>



                            <div class="card-body p-3">
                                <!-- Default Card -->
                                <div class="card" style="background: cornsilk">
                                    <div class="card-header  d-flex flex-row" style="background: cornsilk">
                                        <div class="col-1 d-flex" style="width:40px">
                                            <span class="flex-fill">133</span>
                                        </div>
                                        <div class="col-11 flex-fill">
                                            <h5 class="card-title-datatable"
                                                style="font-size: 1rem ;white-space: pre-line;">Lorem ipsum dolor, sit
                                                amet consectetur adipisicing elit. Omnis error sequi aliquam impedit
                                                suscipit voluptatibus ratione iste iusto? Doloremque enim harum iusto illum,
                                                repellendus velit officia modi optio dolor voluptate.
                                            </h5>
                                            <div class="d-flex flex-col" style="height:300px">
                                                <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                                    class="card-img-top" style="width: 50%; max-width: 100%; height:auto;"
                                                    alt="...">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="col text-start py-4">
                                            {{-- Pilihan jawaban --}}
                                            <div class="d-flex flex-row mt-2 align-items-start inline">
                                                <div class="col-1" style="width: 13px">
                                                    <i class="bi bi-dot"></i>
                                                </div>
                                                <div class="col-11">
                                                    <div class="d-flex flex-row">
                                                        <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit. Fugiat
                                                            optio
                                                            odit.</p>
                                                        <div class="ms-2 col ">

                                                            <i class="bi bi-check-circle" style="color:green"></i>
                                                        </div>

                                                    </div>
                                                    <div class="col" style="height: 300px">

                                                        <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                                            class="card-img-top ms-3"
                                                            style="width: 50%; max-width: 100%; height:auto; max-height:100%"
                                                            alt="...">
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div><!-- End Default Card -->

                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
