@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Bank Soal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Bank Soal</li>
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
                            <div class="card-header d-flex justify-content-between">

                                <h5 class="card-title-datatable">Bank Soal</h5>
                                <div>
                                    <a href="{{ asset('assets/template_soal/template_soal.xlsx') }}"><button type="button"
                                            class="btn btn-primary">Download
                                            Template</button></a>
                                </div>

                            </div>

                            <div class="card-body p-3">

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>MAPEL</th>
                                            <th>Jenis Ujian</th>
                                            <th>Jenjang</th>
                                            <th>Tahun Akademik</th>
                                            <th>Semester</th>
                                            <th>Jumlah Soal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $a = 0;
                                        @endphp
                                        @foreach ($header_ujians as $hdruj)
                                            @if ($hdruj->status != 8)
                                                @if ($hdruj->jadwal_ujian->id_mapels == $id_mapels)
                                                    @php
                                                        $jml_soal = [];
                                                    @endphp
                                                    @foreach ($soal as $sl)
                                                        @if ($sl->id_headerujian == $hdruj->id)
                                                            @foreach ($jawaban as $jwb)
                                                                @if ($jwb->id_soals == $sl->id)
                                                                    @if ($jwb->jawaban_gambar == 1)
                                                                        @php
                                                                            array_push($jml_soal, $jwb->id_soals);
                                                                        @endphp
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            @if ($sl->soal_gambar == 1)
                                                                @php
                                                                    array_push($jml_soal, $sl->id);
                                                                @endphp
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    <tr>
                                                        <th scope="row">{{ ++$a }}</th>
                                                        <td>{{ $hdruj->jadwal_ujian->mapel->nama_mapel }}</td>
                                                        <td>{{ $hdruj->jadwal_ujian->jenis_ujian }}</td>
                                                        <td>Kelas {{ $hdruj->jenjang->nama_jenjang }}</td>
                                                        <td>{{ $hdruj->jadwal_ujian->th_akademiks->th_akademik }}</td>
                                                        <td>{{ $hdruj->jadwal_ujian->th_akademiks->nama_semester }}</td>
                                                        <td>{{ count($hdruj->soal) }}</td>
                                                        <td>
                                                            <div class="flex-row text-center">
                                                                <a type="button"
                                                                    class="btn btn-sm btn-secondary text-start flex-row"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#detail{{ $hdruj->id }}"><i
                                                                        class="bi bi-info-circle me-2"></i>Detail</a>
                                                                @if (count($hdruj->soal) > 0)
                                                                    @if ($hdruj->status == 0)
                                                                        @if ($jml_soal == null)
                                                                            <a
                                                                                href="{{ route('guru.edit_soal', ['id_mapels' => $id_mapels, 'id_header_ujians' => $hdruj->id]) }}">
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-primary"><i
                                                                                        class="bi bi-pencil-square me-2  small-icon"></i>Edit
                                                                                    Soal</button>
                                                                            </a>
                                                                        @else
                                                                            <a
                                                                                href="{{ route('guru.tambah_gambar', ['id_mapels' => $id_mapels, 'id_header_ujians' => $hdruj->id]) }}">
                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-success"><i
                                                                                        class="bi bi-plus-lg me-2 "></i>
                                                                                    Gambar</button>
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        <a
                                                                            href="{{ route('guru.lihat_soal', ['id_mapels' => $id_mapels, 'id_header_ujians' => $hdruj->id]) }}">
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-primary"><i
                                                                                    class="bi bi-journals me-2"></i>Lihat
                                                                                soal</button>
                                                                        </a>
                                                                    @endif

                                                                    <a href="{{ route('soal.export', $hdruj->id) }}">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-info"><i
                                                                                class="bi bi-upload me-2"></i>Export
                                                                            Soal</button>
                                                                    </a>
                                                                    @if ($hdruj->status == 0)
                                                                        <button type="button" class="btn btn-sm btn-danger"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete{{ $hdruj->id }}"><i
                                                                                class="bi bi-trash3-fill me-2"></i>Delete
                                                                            Soal</button>
                                                                    @endif
                                                                @endif
                                                                @if (count($hdruj->soal) == 0)
                                                                    <a type="button" class="btn btn-sm btn-success"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#tambah{{ $hdruj->id }}"><i
                                                                            class="bi bi-plus-lg me-2  small-icon"></i>
                                                                        Tambah Soal</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    {{-- Modal --}}
                                                    <div class="modal" id="tambah{{ $hdruj->id }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Tambah Soal</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('soal.create', ['id_header_ujians' => $hdruj->id, 'id_mapels' => $id_mapels]) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-3">
                                                                                <label for="inputNumber"
                                                                                    class="col-form-label">Soal
                                                                                    (Format
                                                                                    Excel)
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-sm-9">
                                                                                <input class="form-control" type="file"
                                                                                    id="formFile" name="file">
                                                                                @error('file')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <input class="btn btn-primary" type="submit"
                                                                            value="Upload">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal" id="detail{{ $hdruj->id }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail Jadwal Ujian dan Soal
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-5">
                                                                            <h6>MAPEL</h6>
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <h6>{{ $hdruj->jadwal_ujian->mapel->nama_mapel }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-5">
                                                                            <h6>Jenis Ujian</h6>
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <h6>{{ $hdruj->jadwal_ujian->jenis_ujian }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-5">
                                                                            <h6>Jenjang</h6>
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <h6>Kelas {{ $hdruj->jenjang->nama_jenjang }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-5">
                                                                            <h6>Tahun Akademik</h6>
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <h6>{{ $hdruj->jadwal_ujian->th_akademiks->th_akademik }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-5">
                                                                            <h6>Semester</h6>
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <h6>{{ $hdruj->jadwal_ujian->th_akademiks->nama_semester }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-5">
                                                                            <h6>Jumlah Soal Yang Harus Diupload</h6>
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <h6>{{ $hdruj->jumlah_soal }}</h6>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Default Card -->
                                                                    <div class="card" style="background: cornsilk">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Jadwal Ujian</h5>
                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-3">
                                                                                    <h6><strong>Kelas</strong></h6>
                                                                                </div>
                                                                                <div class="col-sm-5">
                                                                                    <h6><strong>Tanggal Ujian</strong></h6>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <h6><strong>Waktu Ujian</strong></h6>
                                                                                </div>
                                                                                @foreach ($detail_ujian as $dtl_uj)
                                                                                    @if ($hdruj->id == $dtl_uj->id_headerujian)
                                                                                        <div class="col-sm-3">
                                                                                            <h6>{{ $dtl_uj->kelas->jurusan->nama_jurusan }}
                                                                                                -
                                                                                                {{ $dtl_uj->kelas->nama_kelas }}
                                                                                            </h6>
                                                                                        </div>
                                                                                        <div class="col-sm-5">
                                                                                            <h6>{{ $dtl_uj->tanggal_ujian }}
                                                                                            </h6>
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <h6>{{ $dtl_uj->waktu_ujian }}
                                                                                                Menit</h6>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach

                                                                            </div>
                                                                        </div>
                                                                    </div><!-- End Default Card -->
                                                                    {{-- <div class="row mb-3">
                                                                <label for="inputText" class="col-sm-2 col-form-label">Status Ujian</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="status_ujian" class="form-control">
                                                                </div>
                                                            </div> --}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    @if (count($hdruj->soal) > 0 && $hdruj->status == 0)
                                                                        <button type="button" class="btn btn-primary"
                                                                            id="btn_konfirmasi_ujian{{ $hdruj->id }}"
                                                                            onclick="konfirmasi_ujian_{{ $hdruj->id }}('{{ $hdruj->id }}')">Konfirmasi
                                                                            Ujian</button>
                                                                    @endif
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal" id="delete{{ $hdruj->id }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('guru.delete_soal', $hdruj->id) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="modal-body">
                                                                        Apakah Anda Yakin Ingin Mengahapus??
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button class="btn btn-danger"
                                                                            type="submit">Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
@endsection
@foreach ($header_ujians as $hdruj)
    @if ($hdruj->jadwal_ujian->id_mapels == $id_mapels)
        <script type="text/javascript">
            function konfirmasi_ujian_{{ $hdruj->id }}(id_headerujian) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                Swal.fire({
                    title: 'Yakin ingin mengkonfirmasi ujian?',
                    text: "Anda tidak akan dapat mengedit dan menghapus soal setelah ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Konfirmasi',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('guru.konfirmasi_ujian') }}",
                            data: {
                                id_headerujian: id_headerujian
                            },
                            dataType: 'json',
                            success: function(res) {
                                // console.log(res);
                                location.reload();
                                Swal.fire(
                                    'Terkonfirmasi!',
                                    'Ujian Telah Dikonfirmasi!',
                                    'success'
                                )
                                document.getElementById("btn_konfirmasi_ujian{{ $hdruj->id }}")
                                    .remove();

                            }
                        });
                    }
                })
            }
        </script>
    @endif
    @if ($errors->any())
        @if (session('modal') === 'tambah')
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    const modal = new bootstrap.Modal(document.getElementById('tambah{{ session('id_header_ujians') }}'));
                    modal.show();
                });
            </script>
        @endif
    @endif
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
