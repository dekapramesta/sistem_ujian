@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Edit Soal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Bank Soal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-header d-flex justify-content-between">

                                <h5 class="card-title-datatable">
                                    {{ $detail_ujian->mst_mapel_guru_kelas->mapel->nama_mapel }} -
                                    {{ $detail_ujian->jadwal_ujian->jenis_ujian }} -
                                    {{ $detail_ujian->jadwal_ujian->th_akademiks->th_akademik }} - Semester
                                    {{ $detail_ujian->jadwal_ujian->th_akademiks->nama_semester }}</h5>

                            </div>

                            <div class="card-body p-3">
                                @foreach ($soal as $sl)
                                    <!-- Default Card -->
                                    <div class="card">
                                        <div class="card-header  d-flex justify-content-between">
                                            <h5 class="card-title-datatable">{{ $sl->soal }}</h5>
                                            <div>
                                                <a href="{{ asset('assets/template_soal/template_soal.csv') }}"><button
                                                        type="button" class="btn btn-primary">Edit Soal /
                                                        Jawaban</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <h6>Pilihan Jawaban :</h6>
                                            @foreach ($jawaban as $no => $jwb)
                                                @if ($jwb->id_soals == $sl->id)
                                                    <h6>{{ $jwb->jawaban }}</h6>
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
@endsection
