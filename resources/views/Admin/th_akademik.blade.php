@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Tahun Akademik</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Tahun Akademik</li>
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
                                <h5 class="card-title">Tahun Akademik</h5>
                                <div class="container">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#tambah" style="margin-bottom: 20px">Tambah +</button>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Tahun Akademik</th>
                                                <th scope="col">Semester</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($th_akademiks as $no => $th_akademik)
                                                <tr>
                                                    <th scope="row">{{ ++$no }}</th>
                                                    <td>{{ $th_akademik->th_akademik }}</td>
                                                    <td>{{ $th_akademik->nama_semester }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm text-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit{{ $th_akademik->identitas }}"
                                                            style="width:70px"><i class="bi bi-pencil-square"
                                                                style="font-size: 10pt"></i>
                                                            Edit</button>
                                                        <button class="btn btn-danger btn-sm text-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $th_akademik->identitas }}"
                                                            style="width:90px"><i class="bi bi-trash3-fill"
                                                                style="font-size: 10pt"></i>
                                                            Hapus</button>
                                </div>
                                </td>
                                </tr>
                                <div class="modal" id="edit{{ $th_akademik->identitas }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Tahun Akademik</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('admin.th_akademik.edit', $th_akademik->identitas) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label class="col-sm-4 col-form-label">Tahun Akademik :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                name="th_akademik_edit"
                                                                value="{{ $th_akademik->th_akademik }}">
                                                            @error('th_akademik_edit')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-4 col-form-label">Nama Semester :</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-select" name="nama_semester_edit"
                                                                aria-label="Default select example">
                                                                @if ($th_akademik->nama_semester == 'Ganjil')
                                                                    <option value="Ganjil" selected>Ganjil</option>
                                                                    <option value="Genap">Genap</option>
                                                                @else
                                                                    <option value="Ganjil">Ganjil</option>
                                                                    <option value="Genap" selected>Genap</option>
                                                                @endif
                                                            </select>
                                                            @error('nama_semester_edit')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <input class="btn btn-primary" type="submit" value="Simpan">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="delete{{ $th_akademik->identitas }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('admin.th_akademik.delete', $th_akademik->identitas) }}">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Ingin Mengahapus??
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <input class="btn btn-danger" type="submit" value="Hapus">
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
                            <h5 class="modal-title">Input Data Tahun Akademik</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('admin.th_akademik.create') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label">Tahun Akademik :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="th_akademik"
                                            value="{{ old('th_akademik') }}">
                                        @error('th_akademik')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label">Nama Semester :</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" name="nama_semester"
                                            aria-label="Default select example">
                                            <option selected disabled>Pilih Semester</option>
                                            <option value="Ganjil"
                                                {{ old('nama_semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                            <option value="Genap"
                                                {{ old('nama_semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                                        </select>
                                        @error('nama_semester')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
