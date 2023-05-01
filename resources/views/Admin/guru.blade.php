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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah +</button>
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
                            $tanggal = substr($guru->tanggal_lahir,8,2);
                            $bulan = substr($guru->tanggal_lahir,5,2);
                            $tahun = substr($guru->tanggal_lahir,0,4);
                        @endphp
                        {{  $tanggal.'-'.$bulan.'-'.$tahun }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $guru->nip }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#delete{{ $guru->nip }}">Delete</button>
                        </td>
                    </tr>
                    <div class="modal" id="edit{{ $guru->nip }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Data Guru</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.guru.edit', $guru->nip) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <p><label>Nama Guru :<input type="text" class="form-control" name="nama" value="{{ $guru->nama }}"></label></p>
                                    <p><label>NIP :<input type="text" class="form-control" name="nip" value="{{ $guru->nip }}"></label></p>
                                    <fieldset>
                                        <p><label>Tanggal Lahir:
                                        <input type="date" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}"></label></p>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input class="btn btn-primary" type="submit" value="Save changes">
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <div class="modal" id="delete{{ $guru->nip }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.guru.delete', $guru->nip) }}">
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
          <h5 class="modal-title">Input Data Guru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('admin.guru.create') }}">
            @csrf
            <div class="modal-body">
                <p><label>Nama Guru :<input type="text" class="form-control" name="nama"></label></p>
                <p><label>NIP :<input type="text" class="form-control" name="nip"></label></p>
                <fieldset>
                    <p><label>Tanggal :
                    <input type="date" name="tanggal_lahir"></label></p>
                </fieldset>
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
