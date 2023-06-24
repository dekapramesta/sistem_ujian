@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item active">Data Siswa</li>
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
                                <h5 class="card-title">Data Siswa</h5>
                                <div class="container">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#tambah" style="margin-bottom: 20px">Tambah +</button>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Jenjang</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">NIS</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th colspan='2' scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswas as $no => $siswa)
                                                <tr>
                                                    <th scope="row">{{ ++$no }}</th>
                                                    <td>{{ $siswa->kelas->jenjang->nama_jenjang }}</td>
                                                    <td>{{ $siswa->kelas->jurusan->nama_jurusan . ' ' . $siswa->kelas->nama_kelas }}
                                                    </td>
                                                    <td>{{ $siswa->nama }}</td>
                                                    <td>{{ $siswa->nis }}</td>
                                                    <td>
                                                        @php
                                                            $tanggal = substr($siswa->tanggal_lahir, 8, 2);
                                                            $bulan = substr($siswa->tanggal_lahir, 5, 2);
                                                            $tahun = substr($siswa->tanggal_lahir, 0, 4);
                                                        @endphp
                                                        {{ $tanggal . '-' . $bulan . '-' . $tahun }}</td>
                                                    <td>
                                                        <div class="flex-row text-center">
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#edit{{ $siswa->nis }}"><i
                                                                    class="bi bi-pencil-square me-2  small-icon"></i>Edit</button>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete{{ $siswa->nis }}"><i
                                                                    class="bi bi-trash3-fill me-2  small-icon"></i>Hapus</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal" id="edit{{ $siswa->nis }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data Siswa</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.siswa.edit', $siswa->nis) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <input type="text" name="id_user" hidden
                                                                        value="{{ $siswa->id_user }}">
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-4 col-form-label">Kelas
                                                                            :</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select" name="id_kelas_edit"
                                                                                aria-label="Default select example">
                                                                                <option selected disabled>Pilih Kelas
                                                                                </option>

                                                                                @foreach ($classes as $class)
                                                                                    @if ($class->id_jurusan == $siswa->kelas->id_jurusan)
                                                                                        <option value="{{ $class->id }}"
                                                                                            {{ $siswa->id_kelas == $class->id ? 'selected' : '' }}>
                                                                                            {{ $class->jenjang->nama_jenjang . ' ' . $class->jurusan->nama_jurusan . ' ' . $class->nama_kelas }}
                                                                                        </option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                            @error('id_kelas_edit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-4 col-form-label">Nama Siswa
                                                                            :</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                name="nama_edit"
                                                                                value="{{ $siswa->nama }}">
                                                                            @error('nama_edit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-4 col-form-label">NIS
                                                                            :</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                name="nis_edit"
                                                                                value="{{ $siswa->nis }}">
                                                                            @error('nis_edit')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="inputDate"
                                                                            class="col-sm-4 col-form-label">Tanggal Lahir
                                                                            :</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="date" name="tanggal_lahir_edit"
                                                                                class="form-control"
                                                                                value="{{ $siswa->tanggal_lahir }}">
                                                                            @error('tanggal_lahir_edit')
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

                                                <div class="modal" id="delete{{ $siswa->nis }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.siswa.delete', $siswa->nis) }}">
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
                                <h5 class="modal-title">Input Nama Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.siswa.create') }}">
                                @csrf
                                <div class="modal-body">
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-4 pt-0">Jurusan :</legend>
                                        <div class="col-sm-8">
                                            @foreach ($jurusans as $jurusan)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="nama_jurusan"
                                                        value="{{ $jurusan->nama_jurusan }}">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        {{ $jurusan->nama_jurusan }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @error('nama_jurusan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </fieldset>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Kelas
                                            :</label>
                                        <div class="col-sm-8 col-kelas first">
                                            <select class="first form-select" name="fisrt" id="first"
                                                aria-label="Default select example">
                                                <option selected disabled>Jurusan Belum Dipilih
                                                </option>
                                            </select>
                                        </div>
                                        @foreach ($jurusans as $jurusan)
                                            <div class="col-sm-8 col-kelas {{ $jurusan->nama_jurusan }}">
                                                <select class="{{ $jurusan->nama_jurusan }} form-select"
                                                    name="{{ $jurusan->nama_jurusan }}"
                                                    id="{{ $jurusan->nama_jurusan }}" style="display: none;"
                                                    aria-label="Default select example">
                                                    <option selected disabled>Pilih Kelas
                                                    </option>
                                                    @foreach ($classes as $class)
                                                        @if ($class->jurusan->id == $jurusan->id)
                                                            <option value="{{ $class->id }}">
                                                                {{ $class->jenjang->nama_jenjang . ' ' . $class->jurusan->nama_jurusan . ' ' . $class->nama_kelas }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('{{ $jurusan->nama_jurusan }}')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">Nama Siswa
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama"
                                                value="{{ old('nama') }}">
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label">NIS
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nis"
                                                value="{{ old('nis') }}">
                                            @error('nis')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-4 col-form-label">Tanggal Lahir :</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="tanggal_lahir" class="form-control"
                                                value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
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
                    const modal = new bootstrap.Modal(document.getElementById('edit{{ session('nis') }}'));
                    modal.show();
                });
            </script>
        @endif
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var target = $("." + inputValue);
                $(".form-select").not(target).hide();
                $(".col-kelas").not(target).hide();
                $(target).show();
            });
            if (inputValue === 'first') {
                $('.col-first').hide();
            } else {
                $('.col-first').show();
            }
        });
    </script>
@endsection
