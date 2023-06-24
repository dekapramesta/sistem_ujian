@extends('layouts.master')

@section('content')
    <div class="d-flex flex-row justify-content-between pagetitle mb-3">
        <h1>Lihat Preview Ujian</h1>
        <a href="{{ route('siswa.dashboard') }}">Back To Dashboard</a>
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
                                        @php
                                            $information = $siswa->nilai->first()->headerujian->jadwal_ujian;
                                        @endphp
                                        {{ $information->mapel->nama_mapel }} -
                                        {{ $information->jenis_ujian }} -
                                        {{ $information->th_akademiks->th_akademik }} -
                                        {{ $information->th_akademiks->nama_semester }} </h5>
                                </div>
                                <div class="d-flex flex-row ">
                                    @php
                                        $information_nilai = $siswa->nilai->first();
                                    @endphp
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span style="font-size: 15px">{{ $information_nilai->nilai }}</span>
                                        <h5 style="color: #012970; font-size: 15px">Nilai</h5>
                                    </div>
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span style="font-size: 15px">{{ $information_nilai->jumlah_benar }}</span>
                                        <h5 style="color: #012970; font-size: 15px">Benar</h5>
                                    </div>
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span style="font-size: 15px">{{ $information_nilai->jumlah_salah }}</span>
                                        <h5 style="color: #012970; font-size: 15px">Salah</h5>
                                    </div>
                                    <div class="ms-2 container border border-gray rounded px-3 py-1 text-center">
                                        <span
                                            style="font-size: 15px">{{ $information_nilai->headerujian->jumlah_soal }}</span>
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


                            @php
                                $temp = $siswa->temp;
                                $no = 1;
                            @endphp
                            @foreach ($temp as $tmp)
                                <div class="card-body p-3">
                                    <!-- Default Card -->
                                    <div class="card" style="background: cornsilk">
                                        <div class="card-header  d-flex flex-row" style="background: cornsilk">
                                            <div class="col-1 d-flex" style="width:40px">
                                                <span class="flex-fill">{{ $no++ }}</span>
                                            </div>
                                            <div class="col-11 flex-fill">
                                                <h5 class="card-title-datatable"
                                                    style="font-size: 1rem ;white-space: pre-line;">{{ $tmp->soal->soal }}
                                                </h5>
                                                @if ($tmp->soal->soal_gambar != null)
                                                    <div class="d-flex flex-col" style="height:300px">
                                                        <img src="{{ asset('img/soal/' . $tmp->soal->soal_gambar) }}"
                                                            class="card-img-top"
                                                            style="width: 50%; max-width: 100%; height:auto;"
                                                            alt="...">
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <div class="col text-start py-4">
                                                {{-- Pilihan jawaban --}}
                                                @foreach ($tmp->soal->jawaban as $jwb)
                                                    <div class="d-flex flex-row mt-2 align-items-start inline">
                                                        <div class="col-1" style="width: 13px">
                                                        </div>
                                                        <div class="col-1" style="width: 13px">
                                                            <i class="bi bi-dot"></i>
                                                        </div>
                                                        <div class="col-11">
                                                            <div class="d-flex flex-row">
                                                                <p class="ms-2">{{ $jwb->jawaban }}</p>
                                                                <div class="ms-2 col ">
                                                                    @if ($jwb->status == true)
                                                                        <i class="bi bi-check-circle"
                                                                            style="color:green"></i>
                                                                    @endif
                                                                    @if ($jwb->id == $tmp->id_jawaban)
                                                                        <i class="bi bi-pencil" style="color:blue"></i>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            @if ($jwb->jawaban_gambar != null)
                                                                <div class="col" style="height: 300px">

                                                                    <img class="card-img-top ms-3"
                                                                        src="{{ asset('img/jawabans/' . $jwb->jawaban_gambar) }}"
                                                                        style="width: 50%; max-width: 100%; height:auto; max-height:100%"
                                                                        alt="...">
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div><!-- End Default Card -->

                                </div>
                            @endforeach
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
