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



                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

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
                                <h5 class="card-title">Hasil Ujian <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">#2457</a></th>
                                            <td>Brandon Jacob</td>
                                            <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                            <td>$64</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2147</a></th>
                                            <td>Bridie Kessler</td>
                                            <td><a href="#" class="text-primary">Blanditiis dolor omnis
                                                    similique</a></td>
                                            <td>$47</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2049</a></th>
                                            <td>Ashleigh Langosh</td>
                                            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                            <td>$147</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Angus Grady</td>
                                            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                            <td>$67</td>
                                            <td><span class="badge bg-danger">Rejected</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Raheem Lehner</td>
                                            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                            <td>$165</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
