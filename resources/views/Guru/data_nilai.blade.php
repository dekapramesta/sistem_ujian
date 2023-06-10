@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Data Nilai</li>
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

                                <h5 class="card-title-datatable-small">Filter Nilai Ujian {{ $nama_mapel->nama_mapel }}</h5>

                            </div>

                            <div class="card-body p-3">
                                <form method="POST" action="{{ route('guru.hasil_cari', $id_mapels) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-5">
                                        <label class="col-sm-3 col-form-label" style="font-size: 15px">Pilih Ujian</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example"
                                                name="id_header_ujian">
                                                <option selected disabled>Pilih Ujian</option>
                                                @foreach ($header_ujians as $hdruj)
                                                    @if ($hdruj->jadwal_ujian->id_mapels == $id_mapels)
                                                        <option value="{{ $hdruj->id }}">
                                                            {{ $hdruj->jadwal_ujian->jenis_ujian }} Kelas
                                                            {{ $hdruj->jenjang->nama_jenjang }}
                                                            {{ $hdruj->jadwal_ujian->th_akademiks->th_akademik }} - Semester
                                                            {{ $hdruj->jadwal_ujian->th_akademiks->nama_semester }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_header_ujian'))
                                                <span class="text-danger">Ujian Harus Dipilih</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12 d-flex flex-row-reverse">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
@endsection
