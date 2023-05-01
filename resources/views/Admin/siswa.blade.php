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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah +</button>
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
                        <td>{{ $siswa->kelas->jenjang->nama_jenjang}}</td>
                        <td>{{ $siswa->kelas->jurusan->nama_jurusan.' '.$siswa->kelas->nama_kelas}}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>
                            @php
                                $tanggal = substr($siswa->tanggal_lahir,8,2);
                                $bulan = substr($siswa->tanggal_lahir,5,2);
                                $tahun = substr($siswa->tanggal_lahir,0,4);
                            @endphp
                            {{  $tanggal.'-'.$bulan.'-'.$tahun }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $siswa->nis }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#delete{{ $siswa->nis }}">Delete</button>
                        </td>
                    </tr>
                    <div class="modal" id="edit{{ $siswa->nis }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Data Siswa</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.siswa.edit', $siswa->nis) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    {{-- <p><label>Jenjang :
                                        <select name="id_jenjang">
                                            @foreach ( $jenjangs as $jenjang )
                                                @if($jenjang->id == $siswa->id_jenjang)
                                                    <option value="{{ $jenjang->id }}" selected>{{ $jenjang->nama_jenjang }}</option>
                                                @else
                                                    <option value="{{ $jenjang->id }}">{{ $jenjang->nama_jenjang }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p> --}}
                                    <p><label>Kelas :
                                        <select name="id_kelas">
                                            @foreach ( $classes as $class )
                                                @if($class->id_jurusan == $siswa->kelas->id_jurusan)
                                                    @if($class->id == $siswa->id_kelas)
                                                        <option value="{{ $class->id }}" selected>{{ $class->jenjang->nama_jenjang.' '.$class->jurusan->nama_jurusan.' '.$class->nama_kelas }}</option>
                                                    @else
                                                        <option value="{{ $class->id }}">{{ $class->jenjang->nama_jenjang.' '.$class->jurusan->nama_jurusan.' '.$class->nama_kelas }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p>
                                    <p><label>Nama Siswa :<input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}"></label></p>
                                    <p><label>NIS :<input type="text" class="form-control" name="nis" value="{{ $siswa->nis }}"></label></p>
                                    <fieldset>
                                        <p><label>Tanggal Lahir:
                                        <input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}"></label></p>
                                    </fieldset>
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

                      <div class="modal" id="delete{{ $siswa->nis }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.siswa.delete', $siswa->nis) }}">
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
          <h5 class="modal-title">Input Nama Siswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('admin.siswa.create') }}">
            @csrf
            <div class="modal-body">
                {{-- <p><label>Jenjang :
                    <select name="id_jenjang">
                        @foreach ( $jenjangs as $jenjang )
                            @if($jenjang->id == $siswa->id_jenjang)
                                <option value="{{ $jenjang->id }}" selected>{{ $jenjang->nama_jenjang }}</option>
                            @else
                                <option value="{{ $jenjang->id }}">{{ $jenjang->nama_jenjang }}</option>
                            @endif
                        @endforeach
                    </select>
                </label></p> --}}
                <p><label>Jurusan :
                    <div>
                        @foreach ( $jurusans as $jurusan )
                            <label><input type="radio" class="mx-1" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">{{ $jurusan->nama_jurusan }}</label>
                        @endforeach
                    </div>

                </label></p>
                <p><label>Kelas :
                    @foreach ( $jurusans as $jurusan )
                        <select class="{{ $jurusan->nama_jurusan }} select" name="{{ $jurusan->nama_jurusan }}" id="{{ $jurusan->nama_jurusan }}" style="display: none;">
                            @foreach ( $classes as $class )
                                @if($class->jurusan->id == $jurusan->id)
                                    <option value="{{ $class->id }}">{{ $class->jenjang->nama_jenjang.' '.$class->jurusan->nama_jurusan.' '.$class->nama_kelas }}</option>
                                @endif
                            @endforeach
                        </select>
                    @endforeach
                </label></p>
                <script type="text/javascript">
                    $(document).ready(function () {
                      $('input[type="radio"]').click(function () {
                        var inputValue = $(this).attr("value");
                        var target = $("." + inputValue);
                        $(".select").not(target).hide();
                        $(target).show();
                      });
                    });
                  </script>
                <p><label>Nama Siswa :<input type="text" class="form-control" name="nama"></label></p>
                <p><label>NIS :<input type="text" class="form-control" name="nis"></label></p>
                <fieldset>
                    <p><label>Tanggal Lahir:
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
