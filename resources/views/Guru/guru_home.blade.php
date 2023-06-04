@extends('layouts.master')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
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
                                <h5 class="card-title">Guru <span>| {{ $guru->nama }}</span></h5>

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

                    <div class="col-xxl-12 col-xl-12">
                        <div class="card">
                            <div class="card-body pt-3">
                                <h6 class="card-title-datatable-small">Kelas yang Diampu <span>| Mata Pelajaran :
                                        {{ $nama_mapel->nama_mapel }}</span></h6>
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#kelas10">Kelas
                                            10</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kelas11">Kelas
                                            11</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kelas12">Kelas
                                            12</button>
                                    </li>

                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview pt-2" id="kelas10">


                                        <div class="row">
                                            <ul class="list-group list-group-flush">
                                                @php
                                                    $kls10 = 0;
                                                @endphp
                                                @foreach ($mst as $mst_10)
                                                    @if ($mst_10->kelas->jenjang->nama_jenjang == 10)
                                                        @php
                                                            $kls10++;
                                                        @endphp
                                                        <li class="list-group-item">
                                                            {{ $mst_10->kelas->jurusan->nama_jurusan }}
                                                            -
                                                            {{ $mst_10->kelas->nama_kelas }}</li>
                                                    @endif
                                                @endforeach
                                                @if ($kls10 == 0)
                                                    <li class="list-group-item">
                                                        Tidak ada Kelas yang diampu</li>
                                                @endif
                                            </ul>
                                        </div>


                                    </div>

                                    <div class="tab-pane fade profile-edit" id="kelas11">

                                        <h5 class="card-title-datatable-small">MIPA</h5>
                                        <div class="row">
                                            <ul class="list-group list-group-flush">
                                                @php
                                                    $kls11_mipa = 0;
                                                @endphp
                                                @foreach ($mst as $mst_mipa_11)
                                                    @if ($mst_mipa_11->kelas->jenjang->nama_jenjang == 11)
                                                        @if ($mst_mipa_11->kelas->jurusan->nama_jurusan == 'MIPA')
                                                            @php
                                                                $kls11_mipa++;
                                                            @endphp
                                                            <li class="list-group-item">
                                                                {{ $mst_mipa_11->kelas->jurusan->nama_jurusan }}
                                                                -
                                                                {{ $mst_mipa_11->kelas->nama_kelas }}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if ($kls11_mipa == 0)
                                                    <li class="list-group-item">
                                                        Tidak ada Kelas yang diampu</li>
                                                @endif
                                            </ul>
                                        </div>

                                        <h5 class="card-title-datatable-small">IPS</h5>

                                        <div class="row">
                                            <ul class="list-group list-group-flush">
                                                @php
                                                    $kls11_ips = 0;
                                                @endphp
                                                @foreach ($mst as $mst_ips_11)
                                                    @if ($mst_ips_11->kelas->jenjang->nama_jenjang == 11)
                                                        @if ($mst_ips_11->kelas->jurusan->nama_jurusan == 'IPS')
                                                            @php
                                                                $kls11_ips++;
                                                            @endphp
                                                            <li class="list-group-item">
                                                                {{ $mst_ips_11->kelas->jurusan->nama_jurusan }}
                                                                -
                                                                {{ $mst_ips_11->kelas->nama_kelas }}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if ($kls11_ips == 0)
                                                    <li class="list-group-item">
                                                        Tidak ada Kelas yang diampu</li>
                                                @endif
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade " id="kelas12">

                                        <h5 class="card-title-datatable-small">MIPA</h5>
                                        <div class="row">
                                            <ul class="list-group list-group-flush">
                                                @php
                                                    $kls12_mipa = 0;
                                                @endphp
                                                @foreach ($mst as $mst_mipa_12)
                                                    @if ($mst_mipa_12->kelas->jenjang->nama_jenjang == 12)
                                                        @if ($mst_mipa_12->kelas->jurusan->nama_jurusan == 'MIPA')
                                                            @php
                                                                $kls12_mipa++;
                                                            @endphp
                                                            <li class="list-group-item">
                                                                {{ $mst_mipa_12->kelas->jurusan->nama_jurusan }}
                                                                -
                                                                {{ $mst_mipa_12->kelas->nama_kelas }}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if ($kls12_mipa == 0)
                                                    <li class="list-group-item">
                                                        Tidak ada Kelas yang diampu</li>
                                                @endif
                                            </ul>
                                        </div>

                                        <h5 class="card-title-datatable-small">IPS</h5>

                                        <div class="row">
                                            <ul class="list-group list-group-flush">
                                                @php
                                                    $kls12_ips = 0;
                                                @endphp
                                                @foreach ($mst as $mst_ips_12)
                                                    @if ($mst_ips_12->kelas->jenjang->nama_jenjang == 12)
                                                        @if ($mst_ips_12->kelas->jurusan->nama_jurusan == 'IPS')
                                                            @php
                                                                $kls12_ips++;
                                                            @endphp
                                                            <li class="list-group-item">
                                                                {{ $mst_ips_12->kelas->jurusan->nama_jurusan }}
                                                                -
                                                                {{ $mst_ips_12->kelas->nama_kelas }}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if ($kls12_ips == 0)
                                                    <li class="list-group-item">
                                                        Tidak ada Kelas yang diampu</li>
                                                @endif
                                            </ul>
                                        </div>

                                    </div>

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Monitoring <span>| Berlangsung Hari Ini</span></h5>

                                <div class="splide" role="group" aria-label="Splide Basic HTML Example">
                                    <div class="splide__track ">
                                        <ul class="splide__list">
                                            @foreach ($ujian as $ujn)
                                                <li class="splide__slide px-2 py-2">
                                                    <div class="card">
                                                        <button onclick="ShowMonitoring({{ $ujn->id }})"
                                                            class="btn btn-white w-100">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">
                                                                    {{ $ujn->jadwal_ujian->mapel->nama_mapel }}</h5>
                                                                <p class="card-text">Jenjang :
                                                                    {{ $ujn->jadwal_ujian->jenjang->nama_jenjang }}</p>
                                                                <p class="card-text">
                                                                    {{ $ujn->detailujian[0]->tanggal_ujian }}
                                                                    @php
                                                                        $currentDate = Carbon::now();
                                                                        $ujianDate = Carbon::parse($ujn->detailujian[0]->tanggal_ujian);
                                                                    @endphp

                                                                    @if (
                                                                        $ujn->detailujian[0]->tanggal_ujian <= Carbon::now() &&
                                                                            $ujianDate->addMinutes($ujn->detailujian[0]->waktu_ujian) >= Carbon::now())
                                                                        {{ 'Berlangsung' }}
                                                                    @elseif(
                                                                        $ujn->detailujian[0]->tanggal_ujian <= Carbon::now() &&
                                                                            $ujianDate->addMinutes($ujn->detailujian[0]->waktu_ujian) <= Carbon::now())
                                                                        {{ 'Selesai' }}
                                                                    @elseif($ujn->detailujian[0]->tanggal_ujian >= Carbon::now())
                                                                        {{ 'Belum Mulai' }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </li>
                                            @endforeach
                                            {{-- <li class="splide__slide">
                                            <div class="card" style="width: 18rem;">
                                                <button href="#" class="btn btn-white w-100">
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title">Biologi 2</h5>
                                                        <p class="card-text">21-05-2023 15:00</p>
                                                    </div>
                                                </button>
                                            </div>
                                        </li>
                                        <li class="splide__slide">
                                            <div class="card" style="width: 18rem;">
                                                <button href="#" class="btn btn-white w-100">
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title">Biologi 3</h5>
                                                        <p class="card-text">21-05-2023 15:00</p>
                                                    </div>
                                                </button>
                                            </div>
                                        </li>
                                    </ul> --}}
                                    </div>

                                </div>
                                <div class="col py-3 text-center" id="title_mapel">


                                </div>
                                <table class="table table-borderless datatable">

                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Kelas</th>
                                            <th colspan="3" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_ujian">


                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </div>



                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection

<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
" rel="stylesheet">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var splide = new Splide('.splide', {
            type: 'loop',
            padding: '5rem',
        });

        splide.mount();
    });
    let IntervalUjian;

    function IntervalSet(id) {
        IntervalUjian = setInterval(() => {
            getMonitor(id)
        }, 5000);
    }

    function ShowMonitoring(id) {
        clearInterval(IntervalUjian);
        getMonitor(id);
        IntervalSet(id);
    }

    function getMonitor(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ route('admin.moniotring') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                console.log(res)

                $('#table_ujian').html('')
                $('#title_mapel').html(
                    `<span class="badge bg-success w-100 fs-6">${res.jadwal_ujian.mapel.nama_mapel}</span>`
                )
                res.detailujian.map((dt) => {
                    dt.pesertaujian.map((ps) => {
                        $('#table_ujian').append(` <tr>
                                            <th scope="row"><a href="#">${ps.siswa.nama}</a></th>
                                            <td>${dt.kelas.jenjang.nama_jenjang}-${dt.kelas.jurusan.nama_jurusan}-${dt.kelas.nama_kelas}</td>
                                            <td>${checkStatus(ps.status)}</td>
                                        </tr>`)
                    })
                })

            }
        });
    }

    function checkStatus(sts) {
        if (parseInt(sts) === 0) {
            return "<span class='badge bg-danger'>Belum Masuk</span>"
        } else if (parseInt(sts) === 1) {
            return "<span class='badge bg-success'>Selesai</span>"
        } else if (parseInt(sts) === 7) {
            return "<span class='badge bg-info'>Sedang Mengerjakan</span>"

        }
    }
</script>
