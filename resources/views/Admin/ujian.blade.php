@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Set Jadwal</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Set Jadwal</li>
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
            <h5 class="card-title">Jadwal Penilaian Sumatif</h5>
            <div class="container">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah +</button>
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Thn Akademik</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jml Soal</th>
                  <th scope="col">Acak Soal</th>
                  <th scope="col">Tgl Ujian</th>
                  <th scope="col">Jam Ujian</th>
                  <th scope="col">Status Ujian</th>
                  <th colspan="2" scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ujians as $no => $ujian)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $ujian->th_akademik->th_akademik.' '.$ujian->th_akademik->nama_semester }}</td>
                        <td>{{ $ujian->kelas->jurusan->jenjang.' '.$ujian->kelas->jurusan->nama_jurusan.' '.$ujian->kelas->nama_kelas}}</td>
                        <td>{{ $ujian->jum_soal }}</td>
                        <td>{{ $ujian->acak_soal }}</td>
                        <td>{{ $ujian->tgl_ujian }}</td>
                        <td>{{ $ujian->jam_ujian }}</td>
                        <td>{{ $ujian->status_ujian }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $ujian->identitas }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#delete{{ $ujian->identitas }}">Delete</button>
                        </td>
                    </tr>
                    <div class="modal" id="edit{{ $ujian->identitas }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Jadwal Ujjian</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.ujian.edit', $ujian->identitas) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <p><label>Kelas :
                                        <select name="id_kelas">
                                            @foreach ( $kelass as $kelas )
                                                @if($kelas->id_jurusan == $ujian->kelas->id_jurusan)
                                                    @if($kelas->id == $ujian->id_kelas)
                                                        <option value="{{ $kelas->id }}" selected>{{ $ujian->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                                    @else
                                                        <option value="{{ $kelas->id }}">{{ $ujian->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p>
                                    <p><label>Semester :
                                        <select name="id_th_akademik">
                                            @foreach ( $th_akademiks as $th_akademik )
                                                @if($th_akademik->id == $ujian->id_th_akademik)
                                                    <option value="{{ $th_akademik->id }}" selected>{{ $th_akademik->nama_semester }}</option>
                                                @else
                                                    <option value="{{ $th_akademik->id }}" selected>{{ $th_akademik->nama_semester }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p>
                                    <p><label>Jmlh Soal :<input type="text" class="form-control" name="jum_soal" value="{{ $ujian->jum_soal }}"></label></p>
                                    <p><label>Acak Soal :<input type="text" class="form-control" name="acak_soal" value="{{ $ujian->acak_soal }}"></label></p>
                                    <p><label>Tgl Ujian:<input type="text" class="form-control" name="tgl_ujian" value="{{ $ujian->tgl_ujian }}"></label></p>
                                    <p><label>Jam Ujian:<input type="text" class="form-control" name="jam_ujian" value="{{ $ujian->jam_ujian }}"></label></p>
                                    <p><label>Status:<input type="text" class="form-control" name="_status_ujian" value="{{ $ujian->status_ujian }}"></label></p>
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

                      <div class="modal" id="delete{{ $ujian->identitas }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.ujian.delete', $ujian->identitas) }}">
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
          <h5 class="modal-title">Input Jadwal Penilaian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('admin.ujian.create') }}">
            @csrf
            <div class="modal-body">
                <p><label>Kelas :
                    <select name="id_kelas">
                        @foreach ( $kelass as $kelas )
                            @if($kelas->id_jurusan == $ujian->kelas->id_jurusan)
                                @if($kelas->id == $ujian->id_kelas)
                                    <option value="{{ $kelas->id }}" selected>{{ $ujian->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                @else
                                    <option value="{{ $kelas->id }}">{{ $ujian->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </label></p>
                <p><label>Semester :
                    <select name="id_th_akademik">
                        @foreach ( $th_akademiks as $th_akademiks )
                            @if($th_akademik->id == $ujian->id_th_akademik)
                                <option value="{{ $th_akademik->id }}" selected>{{ $th_akademik->nama_semester }}</option>
                            @else
                                <option value="{{ $th_akademik->id }}" selected>{{ $th_akademik->nama_semester }}</option>
                            @endif
                        @endforeach
                    </select>
                </label></p>
                <p><label>Jmlh Soal :<input type="text" class="form-control" name="jum_soal"></label></p>
                <p><label>Acak Soal :<input type="text" class="form-control" name="acak_soal"></label></p>
                <p><label>Tgl Ujian:<input type="text" class="form-control" name="tgl_ujian"></label></p>
                <p><label>Jam Ujian:<input type="text" class="form-control" name="jam_ujian"></label></p>
                <p><label>Status:<input type="text" class="form-control" name="_status_ujian"></label></p>
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
</div>
</section>
@endsection
