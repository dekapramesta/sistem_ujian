@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Data Nilai</li>
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

                                <h5 class="card-title-datatable-small">Filter Nilai Ujian {{ $nama_mapel->nama_mapel }}</h5>

                            </div>

                            <div class="card-body p-3">
                                <form method="POST" action="{{ route('guru.hasil_cari', $id_mapels) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Pilih Jenjang</label>
                                        <div class="col-sm-9">
                                            <select class="select2-js w-100" aria-label="Default select example"
                                                id="id_jenjang" name="id_jenjang">
                                                <option selected disabled value="reset">Pilih Jenjang</option>
                                                @foreach ($jenjang as $jjg)
                                                    <option value="{{ $jjg->id }}">
                                                        Kelas {{ $jjg->nama_jenjang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_jenjang'))
                                                <span class="text-danger">Ujian Harus Dipilih</span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Pilih Ujian</label>
                                        <div class="col-sm-9">
                                            <select class="select2-js w-100" aria-label="Default select example"
                                                name="id_header_ujian">
                                                <option selected disabled>Pilih Ujian</option>
                                                @foreach ($header_ujians as $hdruj)
                                                    @if ($hdruj->status != 8)
                                                        @if ($hdruj->jadwal_ujian->id_mapels == $id_mapels)
                                                            <option value="{{ $hdruj->id }}">
                                                                {{ $hdruj->jadwal_ujian->jenis_ujian }} Kelas
                                                                {{ $hdruj->jenjang->nama_jenjang }}
                                                                {{ $hdruj->jadwal_ujian->th_akademiks->th_akademik }} -
                                                                Semester
                                                                {{ $hdruj->jadwal_ujian->th_akademiks->nama_semester }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_header_ujian'))
                                                <span class="text-danger">Ujian Harus Dipilih</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12 d-flex flex-row-reverse">
                                            <button id="btn_submit" type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
    <script>
        $('.select2-js').select2();
    </script>
    {{-- <script>
        $(document).ready(function() {
            let val_idmapel = {{ $id_mapels }}
            let val_idjenjang
            let val_idheaderujian

            $('#id_jenjang').change(function() {
                var resetjenjang = document.getElementById("id_jenjang");
                if (val_idmapel === undefined) {
                    swal("Mapel Kosong", "Pilih Mapel Terlebih Dahulu", "error");
                    resetjenjang.value = "reset"
                } else {
                    resetOption("id_header_ujian")
                    val_idheaderujian = null
                    val_idjenjang = $(this).val()
                    getUjian(val_idmapel)
                }
                if (val_idheaderujian === null) {
                    $('#btn_submit').prop("disabled", true);
                }
            })
        });
    </script> --}}
@endsection
