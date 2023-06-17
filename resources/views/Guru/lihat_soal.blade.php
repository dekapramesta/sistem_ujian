@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Lihat Soal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Bank Soal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <style>
        .dropify-wrapper .dropify-message p {
            margin: 5px 0 0 0;
            font-size: 20px;
        }
    </style>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-header d-flex justify-content-between">

                                <h5 class="card-title-datatable">
                                    {{ $header_ujians->jadwal_ujian->mapel->nama_mapel }} -
                                    {{ $header_ujians->jadwal_ujian->jenis_ujian }} -
                                    {{ $header_ujians->jadwal_ujian->th_akademiks->th_akademik }} - Semester
                                    {{ $header_ujians->jadwal_ujian->th_akademiks->nama_semester }}</h5>
                                <h5 style="color: #012970;">Jumlah Soal : {{ count($soal) }}</h5>


                            </div>

                            <div class="card-body p-3">
                                @foreach ($soal as $sl)
                                    <!-- Default Card -->
                                    <div class="card" style="background: cornsilk">
                                        <div class="card-header  d-flex justify-content-between"
                                            style="background: cornsilk">
                                            <div>
                                                <h5 class="card-title-datatable" style="font-size: 1rem">{{ $sl->soal }}</h5>
                                                @if ($sl->soal_gambar != null && $sl->soal_gambar != 1)
                                                    <input type="file" class="dropify " disabled="disabled"
                                                        name="disabled_gambar_soal" id="input-file-now-disabled-2"
                                                        data-default-file="{{ asset('img/soal/' . $sl->soal_gambar) }}" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <h6>Pilihan Jawaban :</h6>
                                            @foreach ($jawaban as $no => $jwb)
                                                @if ($jwb->id_soals == $sl->id)
                                                    <h6>- {{ $jwb->jawaban }}
                                                        @if ($jwb->jawaban_gambar != null && $jwb->jawaban_gambar != 1)
                                                        @else
                                                            {{ $jwb->status == 1 ? '(Jawaban Benar)' : '' }}
                                                        @endif
                                                    </h6>
                                                    @if ($jwb->jawaban_gambar != null && $jwb->jawaban_gambar != 1)
                                                        <div class=" d-flex justify-content-between">
                                                            <div class="d-flex">
                                                                <input type="file" class="dropify w-25"
                                                                    disabled="disabled" id="input-file-now-disabled-2"
                                                                    data-default-file="{{ asset('img/jawabans/' . $jwb->jawaban_gambar) }}" />
                                                                <h6 class="w-100">
                                                                    {{ $jwb->status == 1 ? '(Jawaban Benar)' : '' }}</h6>
                                                            </div>
                                                            <div></div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><!-- End Default Card -->
                                @endforeach

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
