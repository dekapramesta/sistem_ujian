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
                                            <h5 class="card-title-datatable">{{ $sl->soal }}</h5>
                                            <div>
                                                <button data-bs-toggle="modal" data-bs-target="#edit{{ $sl->id }}"
                                                    type="button" class="btn btn-primary">Edit Soal /
                                                    Jawaban</button>
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <h6>Pilihan Jawaban :</h6>
                                            @foreach ($jawaban as $no => $jwb)
                                                @if ($jwb->id_soals == $sl->id)
                                                    <h6>{{ $jwb->jawaban }}
                                                        {{ $jwb->status == 1 ? '(Jawaban Benar)' : '' }}
                                                    </h6>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><!-- End Default Card -->

                                    <div class="modal" id="edit{{ $sl->id }}" tabindex="-1">
                                        <form action="{{ route('guru.update_soal', $sl->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Soal/Jawaban</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="soaltext" class="form-label">Soal Text</label>
                                                                <textarea class="form-control" name="soaltext" id="soaltext" style="height: 100px;">{{ $sl->soal }}</textarea>
                                                            </div>
                                                            <div class="col-12 mb-3">
                                                                <label for="soalgambar" class="form-label">Soal
                                                                    Gambar</label>
                                                                <input type="file" id="input-file-now-custom-1"
                                                                    class="dropify form-control" name="soalgambar"
                                                                    data-default-file="{{ asset('assets/img/logo.png') }}" />
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-7">
                                                                    <label for="jawaban" class="form-label">Jawaban</label>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <label for="jawabanbenar"
                                                                        class="form-label d-flex justify-content-center">Jawaban
                                                                        Benar</label>
                                                                </div>
                                                            </div>
                                                            @foreach ($jawaban as $jwb)
                                                                @if ($jwb->id_soals == $sl->id)
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-7">
                                                                            <input type="text"
                                                                                name="jawaban[{{ $jwb->id }}]"
                                                                                class="form-control"
                                                                                value="{{ $jwb->jawaban }}">
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <div
                                                                                class="form-check d-flex justify-content-center">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="status"
                                                                                    value="{{ $jwb->id }}"
                                                                                    {{ $jwb->status == 1 ? 'checked' : '' }}>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
