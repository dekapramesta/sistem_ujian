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

                                <h5 class="card-title-datatable-small">Filter Nilai Ujian SMAN 1 Kawedanan</h5>

                            </div>

                            <div class="card-body p-3">
                                <form method="POST" action="{{ route('admin.hasil_cari') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" style="font-size: 15px">Pilih Mata
                                            Pelajaran</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" id="id_mapel"
                                                name="id_mapel">
                                                <option selected disabled value="reset">Pilih Mata Pelajaran</option>
                                                @foreach ($mapel as $mpl)
                                                    <option value="{{ $mpl->id }}">
                                                        {{ $mpl->nama_mapel }} - Jurusan {{ $mpl->jurusan->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_mapel'))
                                                <span class="text-danger">Ujian Harus Dipilih</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" style="font-size: 15px">Pilih Jenjang</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example" id="id_jenjang"
                                                name="id_jenjang">
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
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" style="font-size: 15px">Pilih Ujian</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Default select example"
                                                id="id_header_ujian" name="id_header_ujian">
                                                <option selected disabled value="reset">Pilih Ujian</option>
                                            </select>
                                            @if ($errors->has('id_header_ujian'))
                                                <span class="text-danger">Ujian Harus Dipilih</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12 d-flex flex-row-reverse">
                                            <button disabled id="btn_submit" type="button"
                                                class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>

                    <div class="col-xxl-12 col-xl-12" id="hasil_cari">
                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>

    <script>
        $(document).ready(function() {
            let val_idmapel
            let val_idjenjang
            let val_idheaderujian
            $("#id_mapel").change(function() {
                resetOption("id_header_ujian")
                val_idmapel = $(this).val();
                val_idheaderujian = null
                getUjian(val_idmapel)
                if (val_idheaderujian === null) {
                    $('#btn_submit').prop("disabled", true);
                }
            });

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

            $('#id_header_ujian').change(function() {
                val_idheaderujian = $(this).val()
                if (val_idheaderujian !== null) {
                    $('#btn_submit').prop("disabled", false);
                } else {
                    $('#btn_submit').prop("disabled", true);
                }

            })

            function getUjian(id) {
                let result;
                $.ajax({
                    type: "POST",
                    url: "{{ route('api.getujian') }}",
                    data: {
                        id: id,
                        id_jenjang: val_idjenjang
                    },
                    dataType: 'json',
                    success: function(res) {
                        mappingSelectUjian(res)
                        if (res.length === 0) {
                            $('#id_header_ujian').append(
                                `<option selected disabled>Ujian Kosong</option>`
                            )
                        }
                    }
                });
            }

            function mappingSelectUjian(datas) {
                datas.map((dt) => {
                    $('#id_header_ujian').append(
                        `<option value=${dt.id}> ${dt.jadwal_ujian.jenis_ujian} ${dt.jadwal_ujian.th_akademiks.th_akademik} - ${dt.jadwal_ujian.th_akademiks.nama_semester}</option>`
                    )
                })
            }

            function resetOption(id) {
                $(`#${id}`).html(`<option selected disabled>Pilih Ujian</option>`)

            }

            window.addEventListener('pageshow', function(event) {
                let inputMapel = document.getElementById('id_mapel');
                let inputJenjang = document.getElementById('id_jenjang');
                let inputHeaderUjian = document.getElementById('id_header_ujian');
                inputMapel.value = 'reset';
                inputJenjang.value = 'reset';
                inputHeaderUjian.value = 'reset';
            });

            $('#btn_submit').click(async function() {
                $('#hasil_cari').html(``)
                let mapel = await ajaxHasilMapel(val_idmapel)
                let ujian = await ajaxHasilHeader(val_idheaderujian)
                let detailUjians = await ajaxHasilDetail(val_idheaderujian)
                let nilais = await ajaxHasilNilai(val_idheaderujian)
                let ujian_id = ujian.id
                $('#hasil_cari').append(
                    `<div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h6 class="card-title-datatable-small">Data Nilai ${mapel.nama_mapel} ${ujian.jadwal_ujian.jenis_ujian} Kelas ${ujian.jenjang.nama_jenjang} ${ujian.jadwal_ujian.th_akademiks.th_akademik} - Semester ${ujian.jadwal_ujian.th_akademiks.nama_semester}</h6>
                        <a href="{{ route('admin.nilai_export', '') }}/${ujian_id}">
                            <button type="button" class="btn btn-info">Export Nilai</button>
                        </a>
                    </div>
                    <div class="card-body pt-3">

                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            ${detailUjians.map((dtluj, index) => `
                                    <li class="nav-item">
                                        <button class="nav-link ${index === 0 ? 'active' : ''}" data-bs-toggle="tab" data-bs-target="#${dtluj.kelas.jurusan.nama_jurusan}-${dtluj.kelas.nama_kelas}">
                                            ${dtluj.kelas.jurusan.nama_jurusan} - ${dtluj.kelas.nama_kelas}
                                        </button>
                                    </li>
                                `).join('')}

                        </ul>
                        <div class="tab-content pt-2">

                            ${detailUjians.map((dtluj, index) => `
                                    <div class="tab-pane fade ${index === 0 ? 'show active' : ''} profile-overview pt-2" id="${dtluj.kelas.jurusan.nama_jurusan}-${dtluj.kelas.nama_kelas}">
                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIS</th>
                                                    <th>Jawaban Benar</th>
                                                    <th>Jawaban Salah</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ${nilais
                                                    .filter(nli => nli.siswa.id_kelas === dtluj.id_kelas)
                                                    .map((nli, index) => `
                                                    <tr>
                                                        <th scope="row">${index + 1}</th>
                                                        <td>${nli.siswa.nama}</td>
                                                        <td>${nli.siswa.nis}</td>
                                                        <td>${nli.jumlah_benar}</td>
                                                        <td>${nli.jumlah_salah}</td>
                                                        <td>${nli.nilai}</td>
                                                    </tr>
                                                `)
                                                    .join('')}
                                            </tbody>
                                        </table>
                                    </div>
                                `).join('')}

                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>`
                )
            })


            function ajaxHasilDetail(val_idheaderujian) {

                return $.ajax({
                    type: "POST",
                    url: "{{ route('api.get_detailujian') }}",
                    data: {
                        id_header: val_idheaderujian
                    },
                    dataType: 'json',
                    success: function(res) {
                        // console.log("ajax hasil detail", res)
                        // hasilRes.push(res)
                    }
                });
            }

            function ajaxHasilMapel(val_idmapel) {

                // console.log("ajax hasil detail awal", val_idmapel)
                return $.ajax({
                    type: "POST",
                    url: "{{ route('api.get_mapelhasil') }}",
                    data: {
                        id_mapel: val_idmapel
                    },
                    dataType: 'json',
                    success: function(res) {
                        // console.log("ajax hasil mapel", res)
                        // hasilRes.push(res)
                    }
                });
            }

            function ajaxHasilHeader(val_idheaderujian) {

                return $.ajax({
                    type: "POST",
                    url: "{{ route('api.get_headerhasil') }}",
                    data: {
                        id_header_ujian: val_idheaderujian
                    },
                    dataType: 'json',
                    success: function(res) {
                        // console.log("ajax hasil header", res)
                        // hasilRes.push(res)
                    }
                });
            }

            function ajaxHasilNilai(val_idheaderujian) {

                return $.ajax({
                    type: "POST",
                    url: "{{ route('api.get_nilaihasil') }}",
                    data: {
                        id_header_ujian: val_idheaderujian
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log("ajax hasil nilai", res)
                        // hasilRes.push(res)
                    }
                });
            }

        });
    </script>
@endsection
