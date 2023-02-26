@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Bank Soal</h1>
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

                                <h5 class="card-title">Bank Soal</h5>
                                <div>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#tambah">+ Tambah</button>
                                    <a href="#"><button type="button" class="btn btn-primary">Download
                                            Template</button></a>
                                </div>

                            </div>

                            <div class="card-body p-3">

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>MAPEL</th>
                                            <th>Jumlah Soal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $a =0;
                                        @endphp
                                        @foreach ($soal as $sl)
                                        <tr>
                                            <th scope="row">{{ ++$a }}</th>
                                            <td>{{ $sl->mst_mapel_guru_kelas->mapel->nama_mapel }}</td>
                                            <td>{{ count($sl->detail_soal)}}</td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit1">Edit</button>
                                                <button type="button" class="btn btn-info">Detail</button>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#delete1">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <div class="modal" id="edit1" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Jadwal Ujian</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <p><label>Kelas :
                                                                    <select name="id_kelas">
                                                                        {{-- @foreach ($kelass as $kelas)
                                                                            @if ($kelas->id_jurusan == $soal->kelas->id_jurusan)
                                                                                @if ($kelas->id == $soal->id_kelas)
                                                                                    <option value="{{ $kelas->id }}"
                                                                                        selected>
                                                                                        {{ $soal->kelas->jurusan->nama_jurusan . ' ' . $kelas->nama_kelas }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $kelas->id }}">
                                                                                        {{ $soal->kelas->jurusan->nama_jurusan . ' ' . $kelas->nama_kelas }}
                                                                                    </option>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach --}}
                                                                    </select>
                                                                </label></p>
                                                            <p><label>Semester :
                                                                    <select name="id_th_akademik">
                                                                        <option value="" selected>

                                                                        </option>
                                                                        <option value="" selected>

                                                                        </option>
                                                                    </select>
                                                                </label></p>
                                                            <p><label>Jmlh Soal :<input type="text" class="form-control"
                                                                        name="jum_soal" value=""></label></p>
                                                            <p><label>Acak Soal :<input type="tet" class="form-control"
                                                                        name="acak_soal" value=""></label></p>
                                                            <p><label>Tgl Ujian:<input type="text" class="form-control"
                                                                        name="tgl_ujian" value=""></label></p>
                                                            <p><label>Jam Ujian:<input type="text" class="form-control"
                                                                        name="jam_ujian" value=""></label></p>
                                                            <p><label>Status:<input type="text" class="form-control"
                                                                        name="_status_ujian" value=""></label></p>
                                                            </label></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <input class="btn btn-primary" type="submit"
                                                                value="Save changes">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal" id="delete1" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Ingin Mengahapus??
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <input class="btn btn-danger" type="submit" value="Hapus">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->

                {{-- Modal --}}
                <div class="modal" id="tambah" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Soal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('soal.create') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Mapel</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="mapel" aria-label="Default select example">
                                                <option selected disabled>Pilih Mata Pelajaran</option>
                                                @foreach ($mst as $mst )
                                                <option value="{{ $mst->mapel->id }}">{{ $mst->mapel->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jenjang</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="jenjang" aria-label="Default select example">
                                                <option selected disabled>Pilih Jenjang</option>
                                                {{-- @foreach ($mst as $mst_jenjang )
                                                <option value="{{ $mst_jenjang->mapel->id }}">Kelas {{ $mst->mapel->nama_mapel }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Soal (Format
                                            Excel)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="formFile" name="file">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Status Ujian</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="status_ujian" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary" type="submit" value="Save changes">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
