@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Data Jurusan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active">Data Jurusan</li>
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
            <h5 class="card-title">Jurusan</h5>
            <div class="container">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah +</button>
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">Nomor</th>
                  <th scope="col">Nama Jurusan</th>
                  <th colspan="2" scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jurusans as $no => $jurusan)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $jurusan->nama_jurusan }}</td>
                        <td>
                            <div class="col text-center">
                                <button class="btn btn-primary btn-sm text-center" data-bs-toggle="modal" data-bs-target="#edit{{ $jurusan->identitas }}"
                                    style="width:70px"><i class="bi bi-pencil-square" style="font-size: 10pt"></i>
                                    Edit</button>
                                <button class="btn btn-danger btn-sm text-center" data-bs-toggle="modal" data-bs-target="#delete{{ $jurusan->identitas }}"
                                    style="width:90px"><i class="bi bi-trash3-fill" style="font-size: 10pt"></i>
                                    Hapus</button>
                            </div>
                            {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $jurusan->identitas }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#delete{{ $jurusan->identitas }}">Delete</button> --}}
                        </td>
                    </tr>
                    <div class="modal" id="edit{{ $jurusan->identitas }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Jurusan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.jurusan.edit', $jurusan->identitas) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                  <p><label>Nama Jurusan :<input type="text" class="form-control" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}"></label></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary" type="submit" value="Save changes">
                                </div>
                             </form>
                          </div>
                        </div>
                      </div>

                      <div class="modal" id="delete{{ $jurusan->identitas }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.jurusan.delete', $jurusan->identitas) }}">
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
          <h5 class="modal-title">Input Jurusan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('admin.jurusan.create') }}">
            @csrf
            <div class="modal-body">
              <p><label>Nama Jurusan :<input type="text" class="form-control" name="nama_jurusan"></label></p>
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
