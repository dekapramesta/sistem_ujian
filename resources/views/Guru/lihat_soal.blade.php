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
                                <h5 style="color: #012970;">Jumlah Soal : {{ $soal->total() }}</h5>


                            </div>

                            <div class="card-body p-3">
                                @foreach ($soal as $sl)
                                    <!-- Default Card -->
                                    <div class="card" style="background: cornsilk">
                                        <div class="card-header  d-flex justify-content-between"
                                            style="background: cornsilk">
                                            <div>
                                                <h5 class="card-title-datatable" style="font-size: 1rem">{{ $sl->soal }}
                                                </h5>
                                                @if ($sl->soal_gambar != null && $sl->soal_gambar != 1)
                                                    <div class="row" style="flex:0 0 auto">
                                                        <div class="col-3"></div>
                                                        <div class="col-6">
                                                            <input type="file" class="dropify " disabled="disabled"
                                                                name="disabled_gambar_soal" id="input-file-now-disabled-2"
                                                                data-default-file="{{ asset('img/soal/' . $sl->soal_gambar) }}" />
                                                        </div>
                                                        <div class="col-3"></div>
                                                    </div>
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
                                                        <div class="row justify-content-between mb-3">
                                                            <div class="col-5">
                                                                <input type="file" class="dropify" disabled="disabled"
                                                                    id="input-file-now-disabled-2"
                                                                    data-default-file="{{ asset('img/jawabans/' . $jwb->jawaban_gambar) }}" />
                                                            </div>
                                                            <div class="col-3">
                                                                <h6 class="w-100">
                                                                    {{ $jwb->status == 1 ? '(Jawaban Benar)' : '' }}</h6>
                                                            </div>
                                                            <div class="col-4"></div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><!-- End Default Card -->
                                @endforeach
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        @if ($soal->previousPageUrl())
                                            <li class="page-item">
                                                <a class="page-link" href={{ $soal->previousPageUrl() }}>
                                                    Previous
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                    Previous
                                                </a>
                                            </li>
                                        @endif

                                        @foreach ($soal->getUrlRange(1, $soal->lastPage()) as $page => $url)
                                            <li class="page-item{{ $page == $soal->currentPage() ? ' active' : '' }}"><a
                                                    class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        @if ($soal->nextPageUrl())
                                            <li class="page-item"><a class="page-link"
                                                    href={{ $soal->nextPageUrl() }}>Next</a></li>
                                        @else
                                        @endif
                                    </ul>
                                </nav>
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
