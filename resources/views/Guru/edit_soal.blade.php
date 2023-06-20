@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Edit Soal</h1>
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

                                <h5 class="card-title-datatable">
                                    {{ $header_ujians->jadwal_ujian->mapel->nama_mapel }} -
                                    {{ $header_ujians->jadwal_ujian->jenis_ujian }} -
                                    {{ $header_ujians->jadwal_ujian->th_akademiks->th_akademik }} - Semester
                                    {{ $header_ujians->jadwal_ujian->th_akademiks->nama_semester }}</h5>
                                <h5 style="color: #012970;">Jumlah Soal : {{ $soal->total() }}</h5>


                            </div>

                            <div class="card-body p-3">
                                @foreach ($soal as $sl)
                                    <!-- Default Card -->
                                    <div class="card" style="background: cornsilk">
                                        <div class="card-header  d-flex justify-content-between"
                                            style="background: cornsilk">
                                            <div>
                                                <h5 class="card-title-datatable" style="font-size: 1rem">
                                                    {{ $sl->soal }}
                                                </h5>
                                                @if ($sl->soal_gambar != null && $sl->soal_gambar != 1)
                                                    <input type="file" class="dropify " disabled="disabled"
                                                        name="disabled_gambar_soal" id="input-file-now-disabled-2"
                                                        data-default-file="{{ asset('img/soal/' . $sl->soal_gambar) }}" />
                                                @endif
                                            </div>
                                            <div>
                                                <button data-bs-toggle="modal" data-bs-target="#edit{{ $sl->id }}"
                                                    type="button" class="btn btn-primary">Edit Soal /
                                                    Jawaban</button>
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
                                                        <div class=" d-flex justify-content-between">
                                                            <div class="d-flex">
                                                                <input type="file" class="dropify w-25"
                                                                    disabled="disabled" id="input-file-now-disabled-2"
                                                                    data-default-file="{{ asset('img/jawabans/' . $jwb->jawaban_gambar) }}" />
                                                                <h6 class="w-100">
                                                                    {{ $jwb->status == 1 ? '(Jawaban Benar)' : '' }}</h6>
                                                            </div>
                                                            <div></div>
                                                        </div>
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
                                                        <h5 class="modal-title">Edit Soal/Jawaban</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="soaltext" class="form-label">Soal Text</label>
                                                                <textarea class="form-control" name="soaltext" id="soaltext" style="height: 100px;">{{ $sl->soal }}</textarea>
                                                            </div>
                                                            <div class="col-12 mb-3">
                                                                <label for="soalgambar" class="form-label">Soal
                                                                    Gambar</label>
                                                                <input type="file" class="dropify form-control"
                                                                    name="soalgambar" id="soalgambar{{ $sl->id }}"
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
                                                                    <label for="jawaban" class="form-label">Jawaban</label>
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
                                @endforeach
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        @if ($soal->previousPageUrl())
                                            <li class="page-item">
                                                <a class="page-link" href={{ $soal->previousPageUrl() }}>
                                                    Previous
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                    Previous
                                                </a>
                                            </li>
                                        @endif

                                        @foreach ($soal->getUrlRange(1, $soal->lastPage()) as $page => $url)
                                            <li class="page-item{{ $page == $soal->currentPage() ? ' active' : '' }}"><a
                                                    class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        @if ($soal->nextPageUrl())
                                            <li class="page-item"><a class="page-link"
                                                    href={{ $soal->nextPageUrl() }}>Next</a></li>
                                        @else
                                        @endif
                                    </ul>
                                </nav>
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
    @endforeach
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
