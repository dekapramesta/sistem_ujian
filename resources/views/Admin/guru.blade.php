@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item active">Data Guru</li>
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
                                <h5 class="card-title">Data Guru</h5>
                                <div class="container">
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                                        data-bs-target="#tambah">Tambah +</button>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Nama Guru</th>
                                                <th scope="col">NIP</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gurus as $no => $guru)
                                                <tr>
                                                    <th scope="row">{{ ++$no }}</th>
                                                    <td>{{ $guru->nama }}</td>
                                                    <td>{{ $guru->nip }}</td>
                                                    <td>
                                                        @php
                                                            $tanggal = substr($guru->tanggal_lahir, 8, 2);
                                                            $bulan = substr($guru->tanggal_lahir, 5, 2);
                                                            $tahun = substr($guru->tanggal_lahir, 0, 4);
                                                        @endphp
                                                        {{ $tanggal . '-' . $bulan . '-' . $tahun }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit{{ $guru->nip }}">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $guru->nip }}">Delete</button>
                                                    </td>
                                                </tr>
                                                <div class="modal" id="edit{{ $guru->nip }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data Guru</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.guru.edit', $guru->nip) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="d-flex row px-3">
                                                                        <input type="text" hidden
                                                                            value="{{ $guru->id }}" name="id_guru">
                                                                        <label>Nama Guru :</label><input type="text"
                                                                            class="form-control" name="nama"
                                                                            value="{{ $guru->nama }}">
                                                                        <label class="mt-2">NIP :</label><input
                                                                            type="text" class="form-control"
                                                                            name="nip" value="{{ $guru->nip }}">

                                                                        <label class="mt-2">Tanggal Lahir: </label>
                                                                        <input type="date" class="form-control"
                                                                            name="tanggal_lahir"
                                                                            value="{{ $guru->tanggal_lahir }}">
                                                                        <label class="col-sm-2 mt-2 col-form-label">Kelas
                                                                            :</label>
                                                                        <select class="form-select" name="kelas">

                                                                            @foreach ($kelas as $kls)
                                                                                @if (!empty($guru->mst_mapel_guru_kelas))
                                                                                    @php
                                                                                        $id = 1;
                                                                                    @endphp
                                                                                    @foreach ($guru->mst_mapel_guru_kelas as $mst)
                                                                                        @php
                                                                                            $id = $mst->id_kelas;
                                                                                        @endphp
                                                                                    @endforeach
                                                                                    @if ($id != null)
                                                                                        @if ($kls->id === $id)
                                                                                            <option selected
                                                                                                value="{{ $kls->id }}">
                                                                                                {{ $kls->jenjang->nama_jenjang . ' ' . $kls->jurusan->nama_jurusan . ' ' . $kls->nama_kelas }}
                                                                                            </option>
                                                                                        @else
                                                                                            <option
                                                                                                value="{{ $kls->id }}">
                                                                                                {{ $kls->jenjang->nama_jenjang . ' ' . $kls->jurusan->nama_jurusan . ' ' . $kls->nama_kelas }}
                                                                                            </option>
                                                                                        @endif
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach

                                                                        </select>
                                                                        <label
                                                                            class="col-sm-2 mt-2 col-form-label">Mapel</label>
                                                                        <select class="form-select" name="mapel">
                                                                            @foreach ($mapel as $mpl)
                                                                                @if (!empty($guru->mst_mapel_guru_kelas))
                                                                                    @php
                                                                                        $id;
                                                                                    @endphp
                                                                                    @foreach ($guru->mst_mapel_guru_kelas as $mst)
                                                                                        @php
                                                                                            $id = $mst->id_mapels;
                                                                                        @endphp
                                                                                    @endforeach
                                                                                    @if ($mpl->id === $id)
                                                                                        <option selected
                                                                                            value="{{ $mpl->id }}">
                                                                                            {{ $mpl->nama_mapel }}
                                                                                        </option>
                                                                                    @else
                                                                                        <option
                                                                                            value="{{ $mpl->id }}">
                                                                                            {{ $mpl->nama_mapel }}
                                                                                        </option>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach


                                                                        </select>
                                                                    </div>
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

                                                <div class="modal" id="delete{{ $guru->nip }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.guru.delete', $guru->nip) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-body">
                                                                    Apakah Anda Yakin Ingin Mengahapus??
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
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
                                <h5 class="modal-title">Input Data Guru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.guru.create') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="d-flex row px-3">


                                        <label>Nama Guru :</label><input type="text" class="form-control"
                                            name="nama">

                                        <label class="mt-2">NIP : </label><input type="text" class="form-control"
                                            name="nip">
                                        <label class="mt-2">Tanggal :</label>
                                        <input type="date" class="form-control" name="tanggal_lahir">

                                        <label class="col-sm-2 mt-2 col-form-label">Kelas :</label>
                                        <select class="form-select" name="kelas">
                                            <option disabled hidden selected>Select an option</option>
                                            @foreach ($kelas as $kls)
                                                <option value="{{ $kls->id }}">
                                                    {{ $kls->jenjang->nama_jenjang . ' ' . $kls->jurusan->nama_jurusan . ' ' . $kls->nama_kelas }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <label class="col-sm-2 mt-2 col-form-label">Mapel</label>
                                        <select class="form-select" name="mapel">
                                            <option disabled hidden selected>Select an option</option>
                                            @foreach ($mapel as $mpl)
                                                <option value="{{ $mpl->id }}">{{ $mpl->nama_mapel }}</option>
                                            @endforeach

                                        </select>
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
