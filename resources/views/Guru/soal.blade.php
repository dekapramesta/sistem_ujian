@extends('layouts.master')

@section('content')
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
                  <th scope="col">Mapel</th>
                  <th scope="col">Soal</th>
                  <th scope="col">Pilihan a</th>
                  <th scope="col">Pilihan gambar a</th>
                  <th scope="col">Pilihan b</th>
                  <th scope="col">Pilihan gambar b</th>
                  <th scope="col">Pilihan c</th>
                  <th scope="col">Pilihan gambar c</th>
                  <th scope="col">Pilihan d</th>
                  <th scope="col">Pilihan gambar d</th>
                  <th scope="col">Pilihan e</th>
                  <th scope="col">Pilihan gambar e</th>
                  <th scope="col">Jawaban</th>
                  <th colspan="2" scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($soals as $no => $soal)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $soal->mapel->mapel.' '.$soal->mapel->nama_mapel }}</td>
                        <td>{{ $soal->soal }}</td>
                        <td>{{ $soal->jawaban_a }}</td>
                        <td>{{ $soal->jawaban_gambar_a }}</td>
                        <td>{{ $soal->jawaban_b }}</td>
                        <td>{{ $soal->jawaban_gambar_b }}</td>
                        <td>{{ $soal->jawaban_c }}</td>
                        <td>{{ $soal->jawaban_gambar_c }}</td>
                        <td>{{ $soal->jawaban_d }}</td>
                        <td>{{ $soal->jawaban_gambar_d }}</td>
                        <td>{{ $soal->jawaban_e }}</td>
                        <td>{{ $soal->jawaban_gambar_e }}</td>
                        <td>{{ $soal->jawaban }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $soal->identitas }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#delete{{ $soal->identitas }}">Delete</button>
                        </td>
                    </tr>
                    <div class="modal" id="edit{{ $soal->identitas }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Jadwal Ujjian</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.ujian.edit', $soal->identitas) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <p><label>Kelas :
                                        <select name="id_kelas">
                                            @foreach ( $kelass as $kelas )
                                                @if($kelas->id_jurusan == $soal->kelas->id_jurusan)
                                                    @if($kelas->id == $soal->id_kelas)
                                                        <option value="{{ $kelas->id }}" selected>{{ $soal->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                                    @else
                                                        <option value="{{ $kelas->id }}">{{ $soal->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p>
                                    <p><label>Semester :
                                        <select name="id_th_akademik">
                                            @foreach ( $th_akademiks as $th_akademik )
                                                @if($th_akademik->id == $soal->id_th_akademik)
                                                    <option value="{{ $th_akademik->id }}" selected>{{ $th_akademik->nama_semester }}</option>
                                                @else
                                                    <option value="{{ $th_akademik->id }}" selected>{{ $th_akademik->nama_semester }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </label></p>
                                    <p><label>Jmlh Soal :<input type="text" class="form-control" name="jum_soal" value="{{ $soal->jum_soal }}"></label></p>
                                    <p><label>Acak Soal :<input type="text" class="form-control" name="acak_soal" value="{{ $soal->acak_soal }}"></label></p>
                                    <p><label>Tgl Ujian:<input type="text" class="form-control" name="tgl_ujian" value="{{ $soal->tgl_ujian }}"></label></p>
                                    <p><label>Jam Ujian:<input type="text" class="form-control" name="jam_ujian" value="{{ $soal->jam_ujian }}"></label></p>
                                    <p><label>Status:<input type="text" class="form-control" name="_status_ujian" value="{{ $soal->status_ujian }}"></label></p>
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

                      <div class="modal" id="delete{{ $soal->identitas }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.ujian.delete', $soal->identitas) }}">
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
                            @if($kelas->id_jurusan == $soal->kelas->id_jurusan)
                                @if($kelas->id == $soal->id_kelas)
                                    <option value="{{ $kelas->id }}" selected>{{ $soal->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                @else
                                    <option value="{{ $kelas->id }}">{{ $soal->kelas->jurusan->nama_jurusan.' '.$kelas->nama_kelas }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </label></p>
                <p><label>Semester :
                    <select name="id_th_akademik">
                        @foreach ( $th_akademiks as $th_akademiks )
                            @if($th_akademik->id == $soal->id_th_akademik)
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
@endsection
