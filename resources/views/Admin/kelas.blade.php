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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah +</button>
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
                        <td>{{ $kelas->jenjang->nama_jenjang}}</td>
                        <td>{{ $kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm text-center" data-bs-toggle="modal" data-bs-target="#edit{{ $kelas->identitas }}"
                                style="width:70px"><i class="bi bi-pencil-square" style="font-size: 10pt"></i>
                                Edit</button>
                            <button class="btn btn-danger btn-sm text-center" data-bs-toggle="modal" data-bs-target="#delete{{ $kelas->identitas }}"
                                style="width:90px"><i class="bi bi-trash3-fill" style="font-size: 10pt"></i>
                                Hapus</button>
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
                              <h5 class="modal-title">Input Kelas</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.kelas.edit', $kelas->identitas) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <p><label>Jenjang :
                                        <select name="id_jenjang">
                                            @foreach ( $jenjangs as $jenjang )
                                                @if($jenjang->id == $kelas->id_jenjang)
                                                    <option value="{{ $jenjang->id }}" selected>{{ $jenjang->nama_jenjang }}</option>
                                                @else
                                                    <option value="{{ $jenjang->id }}">{{ $jenjang->nama_jenjang }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p>
                                    <p><label>Jurusan :
                                        <select name="id_jurusan">
                                            @foreach ( $jurusans as $jurusan )
                                                @if($jurusan->id == $kelas->id_jurusan)
                                                    <option value="{{ $jurusan->id }}" selected>{{ $jurusan->nama_jurusan }}</option>
                                                @else
                                                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p>
                                    <p><label>Nama Kelas :<input type="text" class="form-control" name="nama_kelas" value="{{ $kelas->nama_kelas }}"></label></p>
                                </label></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary" type="submit" value="Save changes">
                                </div>
                             </form>
                          </div>
                        </div>
                      </div>

                      <div class="modal" id="delete{{ $kelas->identitas }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.kelas.delete', $kelas->identitas) }}">
                                @csrf
                                @method('delete')
                                <div class="modal-body">
                                    Apakah Anda Yakin Ingin Mengahapus??
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
          <h5 class="modal-title">Input Mata Pelajaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('admin.kelas.create') }}">
            @csrf
            <div class="modal-body">
                <p><label>Jenjang :
                    <select name="id_jenjang">
                        @foreach ( $jenjangs as $jenjang )
                        <option value="{{ $jenjang->id }}">{{ $jenjang->nama_jenjang }}</option>
                        @endforeach
                    </select>
                </label></p>
                <p><label>Jurusan :
                    <select name="id_jurusan">
                        @foreach ( $jurusans as $jurusan )
                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </label></p>
                <p><label>Nama Kelas :<input type="text" class="form-control" name="nama_kelas"></label></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" value="Save changes">
            </div>
         </form>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
