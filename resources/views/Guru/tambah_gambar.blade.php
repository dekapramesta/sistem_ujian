@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Gambar Soal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Bank Soal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <style>
        .dropify-wrapper .dropify-message p {
            margin: 5px 0 0 0;
            font-size: 20px;
        }
    </style>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-header d-flex justify-content-between">
                                @php
                                    $jml_soal = [];
                                @endphp
                                @foreach ($soal as $sl)
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
                                @endforeach
                                <h5 class="card-title-datatable">
                                    {{ $header_ujians->jadwal_ujian->mapel->nama_mapel }} -
                                    {{ $header_ujians->jadwal_ujian->jenis_ujian }} -
                                    {{ $header_ujians->jadwal_ujian->th_akademiks->th_akademik }} - Semester
                                    {{ $header_ujians->jadwal_ujian->th_akademiks->nama_semester }}</h5>
                                <h5 style="color: #012970;">Jumlah Soal Gambar : {{ count(array_unique($jml_soal)) }}</h5>


                            </div>

                            <div class="card-body p-3">
                                @php
                                    $tambah_gambar = [];
                                @endphp
                                @foreach ($soal as $sl)
                                    @foreach ($jawaban as $jwb)
                                        @if ($jwb->id_soals == $sl->id)
                                            @if ($jwb->jawaban_gambar == 1)
                                                @php
                                                    array_push($tambah_gambar, $jwb->id_soals);
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($sl->soal_gambar == 1 || in_array($sl->id, $tambah_gambar))
                                        <!-- Default Card -->
                                        <div class="card" style="background: cornsilk">
                                            <div class="card-header  d-flex justify-content-between"
                                                style="background: cornsilk">
                                                <div>
                                                    <h5 class="card-title-datatable">{{ $sl->soal }}</h5>
                                                    @if ($sl->soal_gambar != null && $sl->soal_gambar != 1)
                                                        <img src="{{ asset('img/soal/' . $sl->soal_gambar) }}"
                                                            alt="description of myimage" style="width:250px; height:300px">
                                                    @endif
                                                </div>
                                                <div>
                                                    <form action="{{ route('guru.selesai_upload_gambar', $sl->id) }}"
                                                        method="post" enctype="multipart/form-data"
                                                        id="selesai_upload_gambar{{ $sl->id }}">
                                                        @csrf
                                                        <button type="b" class="btn btn-info">Selesai Upload
                                                            Gambar</button>
                                                    </form>
                                                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $sl->id }}"
                                                        type="button" class="btn btn-primary">Upload Gambar
                                                        Soal/Jawaban</button>
                                                </div>
                                            </div>
                                            <div class="card-body p-3">
                                                <h6>Pilihan Jawaban :</h6>
                                                @foreach ($jawaban as $no => $jwb)
                                                    @if ($jwb->id_soals == $sl->id)
                                                        <h6>- {{ $jwb->jawaban }}
                                                            @if ($jwb->jawaban_gambar != null && $jwb->jawaban_gambar != 1)
                                                            @else
                                                                {{ $jwb->status == 1 ? '(Jawaban Benar)' : '' }}
                                                            @endif
                                                        </h6>
                                                        @if ($jwb->jawaban_gambar != null && $jwb->jawaban_gambar != 1)
                                                            <img src="{{ asset('img/jawabans/' . $jwb->jawaban_gambar) }}"
                                                                alt="description of myimage"
                                                                style="width:250px; height:300px">
                                                            {{ $jwb->status == 1 ? '(Jawaban Benar)' : '' }}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div><!-- End Default Card -->

                                        <div class="modal" id="edit{{ $sl->id }}" tabindex="-1">
                                            <form action="{{ route('guru.update_soal', $sl->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Upload Gambar Soal/Jawaban</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <label for="soaltext" class="form-label">Soal
                                                                        Text</label>
                                                                    <textarea class="form-control" name="soaltext" id="soaltext" style="height: 100px;">{{ $sl->soal }}</textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="soalgambar" class="form-label">Soal
                                                                        Gambar</label>
                                                                    <input type="file" class="dropify form-control"
                                                                        name="soalgambar"
                                                                        id="soalgambar{{ $sl->id }}"
                                                                        @if ($sl->soal_gambar != null && $sl->soal_gambar != 1) data-default-file="{{ asset('img/soal/' . $sl->soal_gambar) }}" @endif />
                                                                </div>
                                                                @if ($sl->soal_gambar != null && $sl->soal_gambar != 1)
                                                                    <div class="col-12 d-grid gap-2 mb-3">
                                                                        <button type="button" class="btn btn-danger"
                                                                            id="btn_hapus_gambar_soal{{ $sl->id }}"
                                                                            onclick="hapus_gambar_soal_{{ $sl->id }}('{{ $sl->soal_gambar }}')">Hapus
                                                                            Gambar</button>
                                                                    </div>
                                                                @endif
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-7">
                                                                        <label for="jawaban"
                                                                            class="form-label">Jawaban</label>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <label for="jawabanbenar"
                                                                            class="form-label d-flex justify-content-center">Jawaban
                                                                            Benar</label>
                                                                    </div>
                                                                </div>
                                                                @foreach ($jawaban as $jwb)
                                                                    @if ($jwb->id_soals == $sl->id)
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-7">
                                                                                <input type="text"
                                                                                    name="jawaban[{{ $jwb->id }}]"
                                                                                    class="form-control mb-2"
                                                                                    value="{{ $jwb->jawaban }}">
                                                                                <input type="file"
                                                                                    id="jawabangambar{{ $jwb->id }}"
                                                                                    class="dropify form-control"
                                                                                    name="jawabangambar[{{ $jwb->id }}]"
                                                                                    @if ($jwb->jawaban_gambar != null && $jwb->jawaban_gambar != 1) data-default-file="{{ asset('img/jawabans/' . $jwb->jawaban_gambar) }}" @endif />
                                                                                @if ($jwb->jawaban_gambar != null && $jwb->jawaban_gambar != 1)
                                                                                    <div class="d-grid gap-2 mt-1">
                                                                                        <button type="button"
                                                                                            class="btn btn-danger"
                                                                                            id="btn_hapus_gambar_jawaban{{ $jwb->id }}"
                                                                                            onclick="hapus_gambar_jawaban_{{ $jwb->id }}('{{ $jwb->jawaban_gambar }}')">Hapus
                                                                                            Gambar</button>
                                                                                    </div>
                                                                                @endif
                                                                            </div>

                                                                            <div class="col-sm-5">
                                                                                <div
                                                                                    class="form-check d-flex justify-content-center">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="status"
                                                                                        value="{{ $jwb->id }}"
                                                                                        {{ $jwb->status == 1 ? 'checked' : '' }}>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
    <script>
        $('.dropify').dropify();
    </script>
    @foreach ($soal as $sl)
        @if ($sl->soal_gambar == 1 || in_array($sl->id, $tambah_gambar))
            <script type="text/javascript">
                document.getElementById('selesai_upload_gambar{{ $sl->id }}').addEventListener('submit', function(evt) {
                    evt.preventDefault();
                    Swal.fire({
                        title: 'Yakin ingin menyelesaikan upload gambar?',
                        text: "Cek terlebih dahulu sebelum menyelesaikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Selesai',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#selesai_upload_gambar{{ $sl->id }}').submit()

                        }
                    })

                })
            </script>
            <script type="text/javascript">
                function hapus_gambar_soal_{{ $sl->id }}(soal_gambar) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    Swal.fire({
                        title: 'Yakin ingin menghapus gambar?',
                        text: "Anda tidak akan dapat mengembalikanya!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('guru.delete_soal_gambar') }}",
                                data: {
                                    soal_gambar: soal_gambar
                                },
                                dataType: 'json',
                                success: function(res) {
                                    $("#soalgambar{{ $sl->id }}").next(".dropify-clear").trigger(
                                        "click");
                                    Swal.fire(
                                        'Deleted!',
                                        'Gambar Telah Dihapus!',
                                        'success'
                                    )
                                    document.getElementById("btn_hapus_gambar_soal{{ $sl->id }}")
                                        .remove();

                                }
                            });
                        }
                    })
                }
            </script>
            @foreach ($jawaban as $jwb)
                @if ($jwb->id_soals == $sl->id)
                    <script type="text/javascript">
                        function hapus_gambar_jawaban_{{ $jwb->id }}(jawaban_gambar) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            Swal.fire({
                                title: 'Yakin ingin menghapus gambar?',
                                text: "Anda tidak akan dapat mengembalikanya!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Hapus',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        type: "POST",
                                        url: "{{ route('guru.delete_jawaban_gambar') }}",
                                        data: {
                                            jawaban_gambar: jawaban_gambar
                                        },
                                        dataType: 'json',
                                        success: function(res) {
                                            $("#jawabangambar{{ $jwb->id }}").next(".dropify-clear").trigger(
                                                "click");
                                            Swal.fire(
                                                'Deleted!',
                                                'Gambar Telah Dihapus!',
                                                'success'
                                            )
                                            document.getElementById("btn_hapus_gambar_jawaban{{ $jwb->id }}")
                                                .remove();

                                        }
                                    });
                                }
                            })
                        }
                    </script>
                @endif
            @endforeach
        @endif
    @endforeach
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
