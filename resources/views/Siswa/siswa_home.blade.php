@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- Customers Card -->
                    <div class="col-xxl-12 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                {{-- <h5 class="card-title">ADMINISTRATOR <span>| {{ Auth::user()->name }}</span></h5> --}}
                                <h5 class="card-title">Siswa <span>|</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Selamat datang di CBT SMAN 1 Kawedanan</h6>
                                        <span class="text-danger small pt-1 fw-bold"></span> <span
                                            class="text-muted small pt-2 ps-1">{{ now() }}</span>

                                        {{-- <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span> <span class="text-muted small pt-2 ps-1">{{ now() }}</span> --}}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <div class="col">
                        <div class="row justify-content-start">
                            @foreach ($ujian as $ujn)
                                @if ($ujn->detailujian->headerujian->status == 1)
                                    <div class="card ms-2 me-2" style="width: 22rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $ujn->detailujian->headerujian->jadwal_ujian->mapel->nama_mapel }}</h5>
                                            <span
                                                class="card-text fs-5">{{ $ujn->detailujian->headerujian->jadwal_ujian->jenis_ujian . ' ' . $ujn->detailujian->headerujian->jadwal_ujian->th_akademiks->th_akademik . ' - ' . $ujn->detailujian->headerujian->jadwal_ujian->th_akademiks->nama_semester }}</span>
                                            <p class="card-text mt-2" style="font-size:13px;">Tanggal Dan Jam Ujian :
                                                {{ $ujn->detailujian->tanggal_ujian }}</p>

                                            @if ($ujn->status == 0)
                                                @if ($ujn->detailujian->tanggal_ujian <= now())
                                                    <a href="{{ route('siswa.ujian', $ujn->detailujian->id_headerujian) }}"
                                                        class="btn btn-primary">Ujian</a>
                                                @else
                                                    <button class="btn btn-secondary">Belum Mulai</button>
                                                @endif
                                            @else
                                                @foreach ($nilai as $nl)
                                                    @if ($ujn->detailujian->id_headerujian == $nl->id_ujian)
                                                        <span class="fs-3">Ujian Selesai</span>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                    <!-- Recent Sales -->
                    <!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
    <script></script>
@endsection
