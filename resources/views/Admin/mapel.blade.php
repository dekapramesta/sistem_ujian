@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Mata Pelajaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Data Mata Pelajaran</li>
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

                            <div class="card-body">
                                <h5 class="card-title">Mata Pelajaran</h5>
                                <div class="container">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#tambah" style="margin-bottom: 20px">Tambah +</button>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Jurusan</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th colspan="2" scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mapels as $no => $mapel)
                                                <tr>
                                                    <th scope="row">{{ ++$no }}</th>
                                                    <td>{{ $mapel->jurusan->nama_jurusan }}</td>
                                                    <td>{{ $mapel->nama_mapel }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm text-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit{{ $mapel->identitas }}"
                                                            style="width:70px"><i class="bi bi-pencil-square"
                                                                style="font-size: 10pt"></i>
                                                            Edit</button>
                                                        <button class="btn btn-danger btn-sm text-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $mapel->identitas }}"
                                                            style="width:90px"><i class="bi bi-trash3-fill"
                                                                style="font-size: 10pt"></i>
                                                            Hapus</button>
                                                    </td>
                                                    {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $mapel->identitas }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#delete{{ $mapel->identitas }}">Delete</button> --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                <div class="modal" id="edit{{ $mapel->identitas }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data Mata Pelajaran</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.mapel.edit', $mapel->identitas) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-4 col-form-label">Jurusan
                                                                            :</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select"
                                                                                name="id_jurusan_edit"
                                                                                aria-label="Default select example">
                                                                                <option selected disabled>Pilih Jurusan
                                                                                </option>
                                                                                @foreach ($jurusans as $jurusan)
                                                                                    <option value="{{ $jurusan->id }}"
                                                                                        {{ $mapel->id_jurusan == $jurusan->id ? 'selected' : '' }}>
                                                                                        {{ $jurusan->nama_jurusan }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('id_jurusan_edit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-4 col-form-label">Nama Mapel
                                                                            :</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                name="nama_mapel_edit"
                                                                                value="{{ $mapel->nama_mapel }}">
                                                                            @error('nama_mapel_edit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <input class="btn btn-primary" type="submit"
                                                                        value="Simpan">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal" id="delete{{ $mapel->identitas }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.mapel.delete', $mapel->identitas) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-body">
                                                                    Apakah Anda Yakin Ingin Mengahapus??
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <input class="btn btn-danger" type="submit"
                                                                        value="Hapus">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->

                {{-- Modal --}}
                <div class="modal" id="tambah" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Input Mata Pelajaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.mapel.create') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Jurusan :</label>
                                        <div class="col-sm-8">
                                            <select class="form-select" name="id_jurusan"
                                                aria-label="Default select example">
                                                <option selected disabled>Pilih Jurusan</option>
                                                @foreach ($jurusans as $jurusan)
                                                    <option value="{{ $jurusan->id }}"
                                                        {{ old('id_jurusan') == $jurusan->id ? 'selected' : '' }}>
                                                        {{ $jurusan->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_jurusan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Nama Mapel :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama_mapel"
                                                value="{{ old('nama_mapel') }}">
                                            @error('nama_mapel')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <input class="btn btn-primary" type="submit" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    @if ($errors->any())
        @if (session('modal') === 'create')
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    const modal = new bootstrap.Modal(document.getElementById('tambah'));
                    modal.show();
                });
            </script>
        @elseif (session('modal') === 'edit')
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    const modal = new bootstrap.Modal(document.getElementById('edit{{ session('identitas') }}'));
                    modal.show();
                });
            </script>
        @endif
    @endif
@endsection
