@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Set Jadwal Ujian</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Set Jadwal Ujian</li>
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

                                <h5 class="card-title-datatable">Set Jadwal</h5>
                                <div>
                                    <a href="{{ route('add.ujian') }}" class="btn btn-success me-3">+ Tambah</a>

                                </div>

                            </div>

                            <div class="card-body p-3">

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mapel</th>
                                            <th>Jenjang</th>
                                            <th>Tahun Akademik</th>
                                            <th>Jenis Ujian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>@php
                                        $no = 1;
                                    @endphp
                                        @foreach ($header as $hdr)
                                            @if ($hdr->status != 8)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $hdr->jadwal_ujian->mapel->nama_mapel }}</td>
                                                    <td>{{ 'Kelas ' . $hdr->jenjang->nama_jenjang }}</td>
                                                    <td>{{ $hdr->jadwal_ujian->th_akademiks->th_akademik . ' ' . $hdr->jadwal_ujian->th_akademiks->nama_semester }}
                                                    </td>
                                                    <td>{{ $hdr->jadwal_ujian->jenis_ujian }}</td>
                                                    <td>
                                                        <div class="col text-center">
                                                            <a class="btn btn-success btn-sm text-center"
                                                                href="{{ route('edit.ujian', ['id' => $hdr->id]) }}"
                                                                style="width:70px"><i class="bi bi-pencil-square"
                                                                    style="font-size: 10pt"></i>
                                                                Edit</a>
                                                            <a href="{{ route('delete.ujian', ['id' => $hdr->id]) }}"
                                                                class="btn btn-danger btn-sm text-center"
                                                                style="width:90px"><i class="bi bi-trash3-fill"
                                                                    style="font-size: 10pt"></i>
                                                                Hapus</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->

                {{-- Modal --}}

            </div>
    </section>
@endsection
