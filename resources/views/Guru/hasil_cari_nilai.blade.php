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
                                <form action="">
                                    <div class="row mb-5">
                                        <label class="col-sm-3 col-form-label" style="font-size: 15px">Pilih Ujian</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example"
                                                name="id_header_ujian">
                                                <option selected disabled>Pilih Ujian</option>
                                                @foreach ($header_ujians as $hdruj)
                                                    @if ($hdruj->jadwal_ujian->id_mapels == $id_mapels)
                                                        <option value="{{ $hdruj->id }}">
                                                            {{ $hdruj->jadwal_ujian->jenis_ujian }}
                                                            {{ $hdruj->jadwal_ujian->th_akademiks->th_akademik }} - Semester
                                                            {{ $hdruj->jadwal_ujian->th_akademiks->nama_semester }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            {{-- @if ($errors->has('id_header_ujian'))
                                                <span class="text-danger">Ujian Harus Dipilih</span>
                                            @endif --}}
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

                    <div class="col-xxl-12 col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h6 class="card-title-datatable-small">Data Nilai {{ $nama_mapel->nama_mapel }}
                                    {{ $ujian->jadwal_ujian->jenis_ujian }}
                                    {{ $ujian->jadwal_ujian->th_akademiks->th_akademik }} - Semester
                                    {{ $ujian->jadwal_ujian->th_akademiks->nama_semester }} </h6>
                            </div>
                            <div class="card-body pt-3">

                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    @foreach ($detail_ujians as $dtluj)
                                        <li class="nav-item">
                                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                                data-bs-target="#{{ $dtluj->kelas->jurusan->nama_jurusan }}-{{ $dtluj->kelas->nama_kelas }}">{{ $dtluj->kelas->jurusan->nama_jurusan }}
                                                -
                                                {{ $dtluj->kelas->nama_kelas }}</button>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content pt-2">
                                    @foreach ($detail_ujians as $dtluj)
                                        <div class="tab-pane fade {{ $loop->first ? 'show' : '' }} {{ $loop->first ? 'active' : '' }} profile-overview pt-2"
                                            id="{{ $dtluj->kelas->jurusan->nama_jurusan }}-{{ $dtluj->kelas->nama_kelas }}">


                                            <table class="table table-borderless datatable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>NIS</th>
                                                        <th>Jawaban Benar</th>
                                                        <th>Jawaban Salah</th>
                                                        <th>Nilai</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $a = 0;
                                                    @endphp
                                                    @foreach ($nilais as $nli)
                                                        @if ($nli->siswa->id_kelas == $dtluj->id_kelas)
                                                            <tr>
                                                                <th scope="row">{{ ++$a }}</th>
                                                                <td>{{ $nli->siswa->nama }}</td>
                                                                <td>{{ $nli->siswa->nis }}</td>
                                                                <td>{{ $nli->jumlah_benar }}</td>
                                                                <td>{{ $nli->jumlah_salah }}</td>
                                                                <td>{{ $nli->nilai }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>


                                        </div>
                                    @endforeach

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
@endsection
