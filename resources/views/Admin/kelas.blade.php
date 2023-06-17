@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Data Kelas</li>
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
                                <h5 class="card-title">Kelas</h5>
                                <div class="container">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#tambah" style="margin-bottom: 20px">Tambah +</button>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Jenjang</th>
                                                <th scope="col">Nama Kelas</th>
                                                <th colspan="2" scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelas as $no => $kelas)
                                                <tr>
                                                    <th scope="row">{{ ++$no }}</th>
                                                    <td>{{ $kelas->jenjang->nama_jenjang }}</td>
                                                    <td>{{ $kelas->jurusan->nama_jurusan . ' ' . $kelas->nama_kelas }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm text-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit{{ $kelas->identitas }}"
                                                            style="width:70px"><i class="bi bi-pencil-square"
                                                                style="font-size: 10pt"></i>
                                                            Edit</button>
                                                        <button class="btn btn-danger btn-sm text-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $kelas->identitas }}"
                                                            style="width:90px"><i class="bi bi-trash3-fill"
                                                                style="font-size: 10pt"></i>
                                                            Hapus</button>
                                                        <button
                                                            onclick="openModal({{ $kelas->siswa }},{{ $kelas->id }},'{{ $kelas->jenjang->nama_jenjang }} {{ $kelas->jurusan->nama_jurusan }} {{ $kelas->nama_kelas }}')"
                                                            class="btn btn-secondary btn-sm text-center"><i
                                                                class="bi bi-person" style="font-size: 10pt"></i>
                                                            Update Siswa</button>
                                                    </td>
                                                    {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $kelas->identitas }}">Edit</button>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#delete{{ $kelas->identitas }}">Delete</button>
                        </td> --}}
                                                </tr>
                                                <div class="modal" id="edit{{ $kelas->identitas }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Kelas</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.kelas.edit', $kelas->identitas) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-3 col-form-label">Jenjang
                                                                            :</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-select"
                                                                                name="id_jenjang_edit"
                                                                                aria-label="Default select example">
                                                                                <option selected disabled>Pilih Jenjang
                                                                                </option>
                                                                                @foreach ($jenjangs as $jenjang)
                                                                                    <option value="{{ $jenjang->id }}"
                                                                                        {{ $kelas->id_jenjang == $jenjang->id ? 'selected' : '' }}>
                                                                                        {{ $jenjang->nama_jenjang }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('id_jenjang_edit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-3 col-form-label">Jurusan
                                                                            :</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-select"
                                                                                name="id_jurusan_edit"
                                                                                aria-label="Default select example">
                                                                                <option selected disabled>Pilih Jurusan
                                                                                </option>
                                                                                @foreach ($jurusans as $jurusan)
                                                                                    <option value="{{ $jurusan->id }}"
                                                                                        {{ $kelas->id_jurusan == $jurusan->id ? 'selected' : '' }}>
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
                                                                        <label class="col-sm-3 col-form-label">Nama Kelas
                                                                            :</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                name="nama_kelas_edit"
                                                                                value="{{ $kelas->nama_kelas }}">
                                                                            @error('nama_kelas_edit')
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

                                                <div class="modal" id="delete{{ $kelas->identitas }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.kelas.delete', $kelas->identitas) }}">
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
                                <h5 class="modal-title">Input Kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.kelas.create') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Jenjang :</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="id_jenjang"
                                                aria-label="Default select example">
                                                <option selected disabled>Pilih Jenjang</option>
                                                @foreach ($jenjangs as $jenjang)
                                                    <option value="{{ $jenjang->id }}"
                                                        {{ old('id_jenjang') == $jenjang->id ? 'selected' : '' }}>
                                                        {{ $jenjang->nama_jenjang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_jenjang')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Jurusan :</label>
                                        <div class="col-sm-9">
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
                                        <label class="col-sm-3 col-form-label">Nama Kelas :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_kelas"
                                                value="{{ old('nama_kelas') }}">
                                            @error('nama_kelas')
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
                <div class="modal" id="modalnaik" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Siswa Kelas <span id="nama_kelas">10 ipa 1</span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.updatenaik') }}">

                                @csrf
                                <div class="modal-body">

                                    <div class="col">
                                        <input hidden id="id_kelas" name="kelas" type="text" required>
                                        <label for="">Siswa</label>
                                        <select class="select2-js-mdl w-100" id="selectsw" style="width: 100%;"
                                            name="siswa[]" multiple="" required>
                                            @foreach ($siswa as $sw)
                                                <option value="{{ $sw->id }}">{{ $sw->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <div class="container border border-dark mt-3 rounded rounded-md"
                                            style="overflow:auto ">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">NIS</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-siswa">



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        function openModal(data, id, kelas) {
            $('#table-siswa').html('')
            $('#nama_kelas').html(kelas)
            $('#id_kelas').val(id)
            data.map((dt, ind) => {
                ind++
                $('#table-siswa').append(` <tr>
                                                <th scope="row">${ind}</th>
                                                <td>${dt.nama}</td>
                                                <td>${dt.nis}</td>
                                            </tr>`)
            })
            $('.select2-js-mdl').select2({
                dropdownParent: $('#modalnaik')
            });
            $('#modalnaik').appendTo("body").modal('show');

        }
    </script>

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
