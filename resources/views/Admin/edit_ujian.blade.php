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
                                        <input type="text" id="select_jenisujian" disabled
                                            class="form-control w-70 mb-2">

                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Jenjang</label>
                                        <input type="text" id="selectKelas" disabled class="form-control w-70 mb-2">
                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                                        <input type="text" id="tahun_akademik" disabled class="form-control w-70 mb-2">

                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                        <input type="text" id="selectmapel" disabled class="form-control w-70 mb-2">


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
                                    <div class="d-flex flex-row mb-2">
                                        <label for="inputTime" class="col-sm-2 col-form-label">Jumlah Soal</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="jumlah_soal" class="form-control w-70">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Kelas & Siswa</label>
                                        <div class="col">

                                            <input type="text" class="form-control " style="height:85% ;" id="val_sw_kls"
                                                value="Kosong" disabled>
                                        </div>
                                        <div class="col ms-2">

                                            <button type="button" class="btn btn-secondary btn-sm" id="btn_md_kls">Pilih
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
                                            style=" overflow-y: auto;max-height: 500px; border: 1px solid grey">
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
                                            style=" overflow-y: auto;max-height: 500px; border: 1px solid grey">
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
        var KelasId;
        var id_mapel
        let kelasFinal = [];
        let siswaFinal = [];
        var jenis_ujian;
        let result = [];
        let siswaCount = 0;
        var idJadwal;
        var id_tahunakademik;

        $(document).ready(function() {
            $('.select2-js').select2();

            let kelas = [];
            let siswa = [];
            $.ajax({
                type: "POST",
                url: "{{ route('api.editujian') }}",
                data: {
                    id: '<?php echo Request::segment(4); ?>'
                },
                dataType: 'json',
                success: function(res) {

                    id_tahunakademik = res.data.id_th_akademiks
                    jenis_ujian = res.data.jenis_ujian
                    idJadwal = res.data.id
                    console.log(res.data.headerujian[0].detailujian[0].tanggal_ujian)
                    let dateUjian = res.data.headerujian[0].detailujian[0].tanggal_ujian
                    let dateSplit = dateUjian.split(' ')
                    $('#tahun_akademik').val(res.data.th_akademiks.th_akademik + '-' + res.data
                        .th_akademiks.nama_semester)
                    $('#select_jenisujian').val(res.data.jenis_ujian)
                    $('#tanggal_ujian').val(dateSplit[0])
                    $('#jam_ujian').val(dateSplit[1])
                    $('#waktu_ujian').val(res.data.headerujian[0].detailujian[0].waktu_ujian)
                    $('#jumlah_soal').val(res.data.headerujian[0].jumlah_soal)
                    let jenjang;
                    if (res.data.headerujian[0].id_jenjangs === 1) {
                        jenjang = 10
                    } else if (res.data.headerujian[0].id_jenjangs === 2) {
                        jenjang = 11
                    } else if (res.data.headerujian[0].id_jenjangs === 3) {
                        jenjang = 12
                    }
                    $('#selectKelas').val(jenjang)
                    $('#selectmapel').val(res.data.mapel.nama_mapel)
                    result.push(...res.result)
                    console.log(result)
                    mappingKelaas(result)
                    mappingSiswa(result)
                    console.log("first", res.data.id_mapels)
                    id_mapel = res.data.id_mapels
                    KelasId = res.data.id_jenjangs
                    // $('#tanggal_ujian').val(res.data.headerujian[0].detailujian[0].tanggal_ujian)
                    console.log('hsl', res)
                    result.map((rs) => {
                        rs.siswa.map((sw) => {
                            siswaCount += 1
                        })
                    })
                    $('#val_sw_kls').val("Total Kelas : " + result.length + ", Total Siswa : " +
                        siswaCount)





                }
            });


            $('#selectmapel').change(function() {
                let idMapel = $(this).val()
                resetOption("selectkls")
                resetOption("selectsw")
                getKelasMapel(idMapel)
                getSiswaMapel(idMapel)
                $('#btn_md_kls').prop("disabled", false);
            })
            $("#btn_md_kls").click(function() {
                console.log('id_mpl', id_mapel)
                getKelasMapel(id_mapel)
                getSiswaMapel(id_mapel)
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
                $('#tambahsw').click(async function() {
                    siswa = ($('#selectsw').val())
                    console.log('id_sw', siswa)
                    let data = await getOneSiswa(siswa)
                    console.log("first", data)
                    data.map((dt) => {
                        if (result.length === 0) {
                            result.push(dt.kelas)
                        } else {
                            result.map((rs) => {
                                kelasFinal.push(rs.id)
                            })
                            if (!kelasFinal.includes(dt.kelas.id)) {
                                result.push(dt.kelas)
                                kelasFinal.push(dt.kelas.id)
                            }
                        }

                    })

                    data.map((dt_sw) => {
                        result.map((rs_sw, id_rs) => {
                            if (dt_sw.kelas.id === rs_sw.id) {
                                if (rs_sw.siswa === undefined) {
                                    result[id_rs]['siswa'] = []
                                    result[id_rs].siswa.push(dt_sw)
                                    siswaFinal.push(dt_sw.id)
                                } else {
                                    if (!siswaFinal.includes(dt_sw.id)) {
                                        siswaFinal.push(dt_sw.id)
                                        result[id_rs].siswa.push(dt_sw)
                                    }
                                }
                            }
                        })
                    })
                    $('#table-kelas').html('')
                    $('#table-siswa').html('')
                    mappingKelaas(result)
                    mappingSiswa(result)
                    console.log("hasil oi", result)
                    console.log("kelasfinal", kelasFinal)

                })
            });
            $('#table-kelas').on('click', '#hapuskls', async function() {
                let index = parseInt($(this).data('index'))
                console.log('index', index)
                console.log(result)
                if ($(this).is(':checked')) {
                    let onekls = await getOneKelas(index)
                    console.log("onekls", onekls[0])
                    result.push(onekls[0])

                    $(this).prop('checked', true);
                    checkKelas(onekls[0].id)

                } else {
                    let onekls = await getOneKelas(index)
                    console.log('onekelas', onekls)
                    $(this).prop('checked', false);
                    // console.log(index)
                    removeKelasFinal(index)
                    console.log("kleas", kelasFinal)
                    uncheckKelas(onekls[0].id)
                    result.map((val, id) => {
                        // console.log(val.id)
                        if (val.id === index) {
                            result.splice(id, 1)
                            console.log("delete " + val.id)
                        }
                    })
                }

                console.log('hasil', result)
                // removeElement($(this).data('target'));


                console.log('array kelas', kelasFinal)

            })
            $('#table-siswa').on('click', '#hapussw', async function() {
                let index = parseInt($(this).data('index'))
                if ($(this).is(':checked')) {
                    let onesw = await getOneSiswa([index])
                    console.log('siswa', onesw)
                    result.map((val, id) => {
                        if (val.id === onesw[0].id_kelas) {
                            result[id].siswa.push(onesw[0])

                        }


                    })
                    // result.push(getOneSiswa(index))

                    $(this).prop('checked', true);

                } else {
                    $(this).prop('checked', false);
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
                }

                console.log(result)

            })

            $('#submit_kls_sw').on('click', function() {
                // console.log('siswa array', result)
                siswaCount = 0;
                result.map((rs) => {
                    rs.siswa.map((sw) => {
                        siswaCount += 1
                    })
                })
                $("#modalks").modal('hide');
                $('#val_sw_kls').val("Total Kelas : " + result.length + ", Total Siswa : " + siswaCount)

            })

        });

        function removeKelasFinal(id) {
            kelasFinal.forEach((kls, kls_id) => {
                if (parseInt(kls) === parseInt(id)) {
                    kelasFinal.splice(kls_id, 1)
                }
            })
            console.log("kelas final rmv", kelasFinal)
        }


        function uncheckKelas(id_kelas) {
            console.log('id_kelas', id_kelas)
            let $table = $('#table-siswa');

            let $checkboxes = $table.find(`input[type="checkbox"][data-kelas="${id_kelas}"]`);

            $checkboxes.prop('checked', false);
        }

        function checkKelas(id_kelas) {
            console.log('id_kelas', id_kelas)
            let $table = $('#table-siswa');

            let $checkboxes = $table.find(`input[type="checkbox"][data-kelas="${id_kelas}"]`);

            $checkboxes.prop('checked', true);
        }

        function removeElement(element) {
            $('#' + element).remove()
        }

        function mappingKelaas(datas) {
            datas.map((dt) => {
                kelasFinal.push(dt.id)
                $('#table-kelas').append(`
             <tr id="rowkls${dt.id}">
                  <td>${dt.jurusan?.nama_jurusan +' - '+ dt.nama_kelas }</td>
                         <td class="text-center">
                           <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" id="hapuskls" data-index="${dt.id}" data-target="rowkls${dt.id}" checked/>
                            </div>
                   </td>
            </tr>
            `)
            })

        }

        function mappingSiswa(datas) {
            datas.map((dt) => {
                dt.siswa?.map((sw) => {
                    siswaFinal.push(sw?.id)
                    $('#table-siswa').append(`
                 <tr id="rowsw${sw?.id}">
                      <td>${sw?.nama}</td>
                             <td class="">
                                <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" id="hapussw" data-index="${sw.id}" data-kelas="${sw.id_kelas}" data-target="rowsw${sw.nama}" checked/>
                                </div>
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

        function ajaxSiswa(siswa) {
            console.log('id siswa', siswa)

            return $.ajax({
                type: "POST",
                url: "{{ route('api.siswaget') }}",
                data: {
                    id: siswa
                },
                dataType: 'json',
                success: function(res) {
                    console.log("siswa id", res)
                    // hasilRes.push(res)
                }
            });
        }
        async function getOneSiswa(siswa) {
            const data = await ajaxSiswa(siswa);
            return data
        }

        function ajaxKelas(kelas) {
            return $.ajax({
                type: "POST",
                url: "{{ route('api.getkelas') }}",
                data: {
                    id: [kelas]
                },
                dataType: 'json',
                success: function(res) {

                }
            });
        }

        async function getOneKelas(kelas) {
            const data = await ajaxKelas(kelas);
            return data
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
                    console.log(res)

                    res.map((rs) => {
                        if (!kelasFinal.includes(rs.id)) {
                            result.push(rs)
                            kelasFinal.push(rs.id)
                        }
                    })
                    // $('#table-kelas').html('')
                    // $('#table-siswa').html('')
                    mappingKelaas(res)
                    mappingSiswa(res)
                    console.log(result)

                }
            });
        }

        function getKelasMapel(id) {
            let kelas = KelasId
            let result;
            $.ajax({
                type: "POST",
                url: "{{ route('api.getkelasmapel') }}",
                data: {
                    id: id,
                    kelas: kelas
                },
                dataType: 'json',
                success: function(res) {
                    mappingSelectKelas(res)
                }
            });
        }

        function getSiswaMapel(id) {
            let kelas = KelasId

            $.ajax({
                type: "POST",
                url: "{{ route('api.getsiswamapel') }}",
                data: {
                    id: id,
                    kelas: kelas

                },
                dataType: 'json',
                success: function(res) {
                    mappingSelectSiswa(res)
                    console.log('hasilsiswa', res)
                }
            });
        }

        function resetOption(id) {
            $(`#${id}`).html(``)

        }

        function mappingSelectKelas(datas) {
            console.log('selectkls', datas)
            datas.map((dt) => {
                $('#selectkls').append(
                    `<option value=${dt.id_kelas}> ${dt.kelas.jurusan.nama_jurusan} - ${dt.kelas.nama_kelas}</option>`
                )
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
            console.log("result", result)

            let data = {
                id_jadwal: idJadwal,
                jenis_ujian: jenis_ujian,
                tanggal_ujian: $('#tanggal_ujian').val() + ' ' + $('#jam_ujian').val(),
                waktu_ujian: $('#waktu_ujian').val(),
                id_th_akademiks: id_tahunakademik,
                kelas: KelasId,
                status: 0,
                id_mapels: id_mapel,
                jumlah_soal: $('#jumlah_soal').val(),
                data: result
            }
            $.ajax({
                type: "POST",
                url: "{{ route('api.ujianEdPost') }}",
                data: data,
                dataType: 'json',
                success: function(res) {
                    console.log('id_jadwal', idJadwal)
                    console.log(res)
                }
            });

            $(document).ajaxStop(function() {
                window.location.href = "{{ route('jadwal.ujian') }}";
            });
        }
    </script>
@endsection
