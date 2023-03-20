@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Pilih MAPEL</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Pilih MAPEL</li>
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
                            <div class="card-body">
                                <h5 class="card-title">MAPEL <span>| {{ $guru->nama }}</span></h5>
                                <div class="row">
                                    @foreach ($mapel as $mpl)
                                        <div class="col-lg-4">
                                            <a href="{{ route('guru.dashboard', $mpl->id_mapels) }}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $mpl->mapel->nama_mapel }}</h5>
                                                        {{-- {{ $mpl->id_mapels }} --}}
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($mapel_all as $key => $mpl_all)
                                                            @if ($mpl->id_mapels == $mpl_all->id_mapels && $guru->id == $mpl_all->id_gurus)
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <h6 class="fs-6 fw-normal"> Kelas yang diampu : {{ $i }}
                                                        </h6>
                                                    </div>
                                                </div><!-- End Default Card -->
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
