@extends('layouts.master')


@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item ">Set Jadwal Ujian</li>
                <li class="breadcrumb-item active">Tambah</li>
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
                                <h5 class="card-title">Tambah Jadwal Ujian</h5>


                            </div>

                            <div class="card-body p-3">
                                <form>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Jenis Ujian</label>
                                        <select id="select_jenisujian" class="select2-js w-100" name="state">
                                            <option value="UTS">UTS</option>
                                            <option value="UAS">UAS</option>
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Jenjang</label>
                                        <select id="select" class="select2-js w-100" name="state">
                                            <option value="10">Kelas 10</option>
                                            <option value="10">Kelas 11</option>
                                            <option value="10">Kelas 12</option>
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                                        <select id="tahun_akademik" class="select2-js w-100" name="state">
                                            @foreach ($tahun_akademik as $thk)
                                                <option value={{ $thk->id }}>
                                                    {{ $thk->th_akademik . ' ' . $thk->nama_semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                        <select id="selectmapel" class="select2-js w-100" name="state">
                                            <option disabled selected hidden>Pilih Mata Pelajaran</option>
                                            @foreach ($mapel as $mpl)
                                                <option value={{ $mpl->id }}>{{ $mpl->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row mb-2">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" id="tanggal_ujian" class="form-control w-70">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row mb-2">
                                        <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                                        <div class="col-sm-10">
                                            <input type="time" id="jam_ujian" class="form-control w-70">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row mb-2">
                                        <label for="inputTime" class="col-sm-2 col-form-label">Waktu Ujian</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="waktu_ujian" class="form-control w-70">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Kelas & Siswa</label>
                                        <div class="col">

                                            <input type="text" class="form-control " style="height:85% ;" id="val_sw_kls"
                                                value="Kosong" disabled>
                                        </div>
                                        <div class="col ms-2">

                                            <button type="button" disabled class="btn btn-secondary btn-sm"
                                                id="btn_md_kls">Pilih
                                                Kelas dan Siswa</button>
                                        </div>


                                    </div>


                                </form>
                                <div class="row mb-3 mt-2">
                                    <label class="col-sm-2 col-form-label">Submit Button</label>
                                    <div class="col-sm-10">
                                        <button onclick="postUjian()" type="submit" class="btn btn-primary">Submit
                                            Form</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->

                {{-- Modal --}}

                <div class="modal fade bd-example-modal-lg" id="modalks" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="card">
                                <div class="card-header d-flex justify-content-center">
                                    <h3 class="fs-4">Tambah Kelas dan Siswa</h3>
                                </div>
                                <div class="card-body pt-3">
                                    <ul class="nav nav-tabs nav-tabs-bordered">

                                        <li class="nav-item">
                                            <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#kelas-overview">Kelas</button>
                                        </li>

                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#siswa-overview">Siswa</button>
                                        </li>


                                    </ul>
                                    <!-- Bordered Tabs -->
                                    <div class="tab-content pt-2">
                                        <div class="tab-pane fade show active " id="kelas-overview">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="row">
                                                <div class="col-8">
                                                    <select class="select2-js-mdl w-100" style="width: 100%;"
                                                        id="selectkls" name="kelas" multiple="">

                                                    </select>
                                                </div>
                                                <div class="col-4 d-flex justify-content-center ">
                                                    <button id="tambahkls" type="button"
                                                        class="btn btn-secondary btn-sm d-flex align-items-center justify-content-center "
                                                        style="height:90% ; width: 80%">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="siswa-overview">

                                            <div class="d-flex flex-column">
                                                <label class="col-sm-2 col-form-label">Siswa</label>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <select class="select2-js-mdl w-100" id="selectsw"
                                                            style="width: 100%;" name="siswa" multiple="">

                                                        </select>
                                                    </div>
                                                    <div class="col-4 d-flex justify-content-center ">
                                                        <button id="tambahsw" type="button"
                                                            class="btn btn-secondary btn-sm d-flex align-items-center justify-content-center "
                                                            style="height:90% ; width: 80%">Tambah</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="d-flex flex-column px-2">
                                        <label class="col-form-label fw-bold">Kelas yang mengikuti ujian</label>
                                        <div class="row"
                                            style=" overflow-y: auto;max-height: 100px; border: 1px solid grey">
                                            <table class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nama Kelas</th>
                                                        <th scope="col" class="text-center">Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="table-kelas">
                                                    {{-- <tr>
                                                        <td>Kelas 10 Ipa 1</td>
                                                        <td class="text-center"><button
                                                                class="btn btn-danger btn-sm">Hapus</button>
                                                        </td>

                                                    </tr> --}}

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column px-2">
                                        <label class="col-form-label fw-bold">Siswa yang mengikuti ujian</label>
                                        <div class="row"
                                            style=" overflow-y: auto;max-height: 100px; border: 1px solid grey">
                                            <table class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nama Siswa</th>
                                                        <th scope="col" class="text-center">Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="table-siswa">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <button type="button" id="submit_kls_sw"
                                        class="btn btn-primary btn-md w-50">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <script>
        let kelasFinal = [];
        let siswaFinal = [];
        let result = [];
        let siswaCount = 0;

        $(document).ready(function() {
            $('.select2-js').select2();

            let kelas = [];
            let siswa = [];


            $('#selectmapel').change(function() {
                let idMapel = $(this).val()
                resetOption("selectkls")
                resetOption("selectsw")
                getKelasMapel(idMapel)
                getSiswaMapel(idMapel)
                $('#btn_md_kls').prop("disabled", false);
            })
            $("#btn_md_kls").click(function() {
                console.log("first")
                $('.select2-js-mdl').select2({
                    dropdownParent: $('#modalks')
                });
                $('#modalks').appendTo("body").modal('show');
                $('#tambahkls').click(function() {
                    kelas = ($('#selectkls').val())
                    console.log('addkls', kelas)
                    getKelas(kelas)
                    // console.log('kelas', kelasFinal)
                    // mappingKelaas(data)


                })
                $('#tambahsw').click(function() {
                    siswa = ($('#selectsw').val())
                    getSiswa(siswa)
                })
            });
            $('#table-kelas').on('click', '#hapuskls', function() {
                let index = parseInt($(this).data('index'))
                console.log('index', index)
                result.map((val, id) => {
                    // console.log(val.id)
                    if (val.id === index) {
                        result.splice(id, 1)
                        console.log("delete " + val.id)
                    }
                })
                removeElement($(this).data('target'));
                $('#table-siswa').html('')
                mappingSiswa(result)


                console.log('array kelas', kelasFinal)

            })
            $('#table-siswa').on('click', '#hapussw', function() {
                let index = parseInt($(this).data('index'))
                result.map((val, id) => {
                    // console.log(val.id)
                    val.siswa.map((sw, swid) => {
                        if (sw.id === index) {
                            result[id].siswa.splice(swid, 1)
                            if (result[id].siswa.length === 0) {
                                result.splice(id, 1);

                            }
                        }
                    })

                })
                $('#table-kelas').html('')
                $('#table-siswa').html('')
                mappingKelaas(result)
                mappingSiswa(result)
                console.log(result)

            })

            $('#submit_kls_sw').on('click', function() {
                // console.log('siswa array', result)
                result.map((rs) => {
                    rs.siswa.map((sw) => {
                        siswaCount += 1
                    })
                })
                $("#modalks").modal('hide');
                $('#val_sw_kls').val("Total Kelas : " + result.length + ", Total Siswa : " + siswaCount)

            })

        });

        function removeElement(element) {
            $('#' + element).remove()
        }

        function mappingKelaas(datas) {
            datas.map((dt) => {
                kelasFinal.push(dt.id)
                $('#table-kelas').append(`
             <tr id="rowkls${dt.id}">
                  <td>${dt.nama_kelas}</td>
                         <td class="text-center">
                            <button class="btn btn-danger btn-sm" id="hapuskls" data-index="${dt.id}" data-target="rowkls${dt.id}">Hapus</button>
                   </td>
            </tr>
            `)
            })

        }

        function mappingSiswa(datas) {
            datas.map((dt) => {
                dt.siswa.map((sw) => {
                    siswaFinal.push(sw.id)
                    $('#table-siswa').append(`
                 <tr id="rowsw${sw.id}">
                      <td>${sw.nama}</td>
                             <td class="text-center">
                                <button class="btn btn-danger btn-sm" id="hapussw" data-index="${sw.id}" data-target="rowsw${sw.nama}">Hapus</button>
                       </td>
                </tr>
                `)
                })
            })

        }



        function getSiswa(siswa) {
            $.ajax({
                type: "POST",
                url: "{{ route('api.getsiswa') }}",
                data: {
                    id: siswa
                },
                dataType: 'json',
                success: function(res) {
                    res.map((rs) => {
                        result.push(rs)
                    })
                    mappingKelaas(res)
                    mappingSiswa(res)

                }
            });
        }

        function getKelas(kelas) {
            $.ajax({
                type: "POST",
                url: "{{ route('api.getkelas') }}",
                data: {
                    id: kelas
                },
                dataType: 'json',
                success: function(res) {
                    res.map((rs) => {
                        result.push(rs)
                    })
                    mappingKelaas(res)
                    mappingSiswa(res)
                    console.log(result)

                }
            });
        }

        function getKelasMapel(id) {
            let result;
            $.ajax({
                type: "POST",
                url: "{{ route('api.getkelasmapel') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    mappingSelectKelas(res)
                }
            });
        }

        function getSiswaMapel(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('api.getsiswamapel') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    mappingSelectSiswa(res)
                }
            });
        }

        function resetOption(id) {
            $(`#${id}`).html(``)

        }

        function mappingSelectKelas(datas) {
            console.log('selectkls', datas)
            datas.map((dt) => {
                $('#selectkls').append(`<option value=${dt.id_kelas}>${dt.kelas.nama_kelas}</option>`)
            })
        }

        function mappingSelectSiswa(datas) {
            datas.map((dt) => {
                dt.kelas.siswa.map((sw) => {
                    $('#selectsw').append(`<option value=${sw.id}>${sw.nama}</option>`)
                })
            })
        }

        function checkMap(data) {
            result.map((val, id) => {
                data.map((dt, dtid) => {})
            })
        }

        function postUjian() {

            let data = {
                jenis_ujian: $('#select_jenisujian').val(),
                tanggal_ujian: $('#tanggal_ujian').val() + ' ' + $('#jam_ujian').val(),
                waktu_ujian: $('#waktu_ujian').val(),
                id_th_akademiks: $('#tahun_akademik').val(),
                status: 0,
                id_mapels: $('#selectmapel').val(),
                data: result
            }
            $.ajax({
                type: "POST",
                url: "{{ route('api.postujian') }}",
                data: data,
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                }
            });

            $(document).ajaxStop(function() {
                window.location.href = "{{ route('jadwal.ujian') }}";
            });
        }
    </script>
@endsection
