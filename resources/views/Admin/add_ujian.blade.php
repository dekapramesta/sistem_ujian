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
                                            <option value="Pre-Test">Pre-Test</option>
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <label class="col-sm-2 col-form-label">Jenjang</label>
                                        <select id="kelas" id="selectKelas" class="select2-js w-100" name="state">
                                            @foreach ($jenjang as $jjg)
                                                <option value="{{ $jjg->id }}">{{ $jjg->nama_jenjang }}</option>
                                            @endforeach
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
                                        <label for="inputTime" class="col-sm-2 col-form-label">Waktu Ujian</label>
                                        <div class="d-flex row-sm-10 align-items-center">
                                            <input type="number" id="waktu_ujian" class="form-control">
                                            <span class="fs-6 ms-2">Menit</span>
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

                                            <button type="button" disabled class="btn btn-secondary btn-sm"
                                                id="btn_md_kls">Pilih
                                                Kelas dan Siswa</button>
                                        </div>


                                    </div>


                                </form>
                                <div class="row mb-3 mt-2">
                                    <label class="col-sm-2 col-form-label">Submit Button</label>
                                    <div class="col-sm-10">
                                        <button type="button" id="submit_ujian" class="btn btn-primary">Submit
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
                            <div class="loader-wrapper" id="loader-1"
                                style=" position: fixed;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);  background-color: rgba(128, 128, 128, 0.5);">
                                <div id="loader"></div>
                            </div>

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
                                                <div class="col">
                                                    <select class="select2-js-mdl w-100" style="width: 100%;"
                                                        id="selectkls" name="kelas" multiple="">

                                                    </select>
                                                    <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                                    <div class="col">
                                                        <input type="date" id="tgl_ujian_kls"
                                                            class="form-control w-70">
                                                    </div>
                                                    <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                                                    <div class="col">
                                                        <input type="time" id="jam_ujian_kls"
                                                            class="form-control w-70">
                                                    </div>
                                                    <button id="tambahkls" type="button"
                                                        class="btn btn-secondary btn-sm d-flex align-items-center justify-content-center mt-2 w-100">Tambah</button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="siswa-overview">

                                            <div class="d-flex flex-column">
                                                <label class="col-sm-2 col-form-label">Siswa</label>
                                                <div class="row">
                                                    <div class="col">
                                                        <select class="select2-js-mdl w-100" id="selectsw"
                                                            style="width: 100%;" name="siswa" multiple="">

                                                        </select>
                                                        <label for="inputDate"
                                                            class="col-sm-2 col-form-label">Date</label>
                                                        <div class="col">
                                                            <input type="date" id="tgl_ujian_sw"
                                                                class="form-control w-70">
                                                        </div>
                                                        <label for="inputTime"
                                                            class="col-sm-2 col-form-label">Time</label>
                                                        <div class="col">
                                                            <input type="time" id="jam_ujian_sw"
                                                                class="form-control w-70">
                                                        </div>
                                                    </div>
                                                    <button id="tambahsw" type="button"
                                                        class="btn btn-secondary mt-2 btn-sm d-flex align-items-center justify-content-center w-100">Tambah</button>

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
                                                        <th scope="col">Tanggal Dan Jam</th>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // flatpickr("#waktu_ujian", {
        //     enableTime: true,
        //     noCalendar: true,
        //     dateFormat: "H:i:S",
        //     time_24hr: true,
        // });
        const loaders = document.getElementsByClassName('loader-wrapper');
        let kelasFinal = [];
        let siswaFinal = [];
        var result = [];
        let tempDeleteKls = []
        let tempDeleteSw = []

        $(document).ready(function() {
            $('.select2-js').select2();

            let kelas = [];
            let siswa = [];
            $('#waktu_ujian').on('keyup', function() {
                if ($('#selectmapel').val()) {
                    $('#btn_md_kls').prop("disabled", false);
                }

            })


            $('#selectmapel').change(function() {
                let idMapel = $(this).val()
                resetOption("selectkls")
                resetOption("selectsw")
                getKelasMapel(idMapel)
                getSiswaMapel(idMapel)

                if ($('#waktu_ujian').val()) {
                    $('#btn_md_kls').prop("disabled", false);

                }
            })
            $("#btn_md_kls").click(function() {
                console.log("first")
                $('.select2-js-mdl').select2({
                    dropdownParent: $('#modalks')
                });
                $('#modalks').appendTo("body").modal('show');
                $('#tambahkls').click(async function() {
                    kelas = ($('#selectkls').val())

                    if ($('#jam_ujian_kls').val().length === 0) {
                        swal("Mohon Maaf", "Jam Kosong", "error");

                    } else if ($('#tgl_ujian_kls').val().length === 0) {
                        swal("Mohon Maaf", "Tanggal Kosong", "error");

                    } else if (kelas.length === 0) {
                        swal("Mohon Maaf", "Kelas Kosong", "error");

                    } else {
                        loaders[0].style.display = "inherit";
                        console.log('addkls', kelas)
                        await getKelas(kelas)
                        loaders[0].style.display = "none";

                        $('#selectkls').val('').trigger('change');
                    }

                })
                $('#tambahsw').click(async function() {
                    siswa = ($('#selectsw').val())

                    if ($('#jam_ujian_sw').val().length === 0) {
                        swal("Mohon Maaf", "Jam Kosong", "error");

                    } else if ($('#tgl_ujian_sw').val().length === 0) {
                        swal("Mohon Maaf", "Tanggal Kosong", "error");

                    } else if (siswa.length === 0) {
                        swal("Mohon Maaf", "Kelas Kosong", "error");

                    } else {
                        loaders[0].style.display = "inherit";

                        console.log('id_sw', siswa)
                        let data = await getOneSiswa(siswa)
                        console.log("first", data)
                        data.map((dt) => {
                            if (result.length === 0) {
                                dt.kelas.tgl_ujian = $('#tgl_ujian_sw').val()
                                dt.kelas.jam_ujian = $('#jam_ujian_sw').val()
                                result.push(dt.kelas)
                            } else {
                                result.map((rs) => {
                                    kelasFinal.push(rs.id)
                                })
                                if (!kelasFinal.includes(dt.kelas.id)) {

                                    dt.kelas.tgl_ujian = $('#tgl_ujian_sw').val()
                                    dt.kelas.jam_ujian = $('#jam_ujian_sw').val()
                                    result.push(dt.kelas)
                                    kelasFinal.push(dt.kelas.id)
                                }
                            }

                        })

                        data.map((dt_sw) => {
                            delete dt_sw.kelas
                            result.map((rs_sw, id_rs) => {
                                if (dt_sw.id_kelas === rs_sw.id) {
                                    if (rs_sw.siswa === undefined) {
                                        swal("Informasi",
                                            "Tanggal dan Jam Kelas Ini Mengikuti Data yg Di Input Pertama Kali",
                                            "info");
                                        result[id_rs]['siswa'] = []
                                        result[id_rs].siswa.push(dt_sw)
                                        siswaFinal.push(dt_sw.id)

                                    } else {
                                        swal("Informasi",
                                            "Tanggal dan Jam Kelas Ini Mengikuti Data yg Di Input Pertama Kali",
                                            "info");
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
                        loaders[0].style.display = "none";
                        $('#selectsw').val('').trigger('change');
                    }


                })
            });
            $('#table-kelas').on('click', '#hapuskls', async function() {
                let index = parseInt($(this).data('index'))
                console.log('index', index)
                console.log(result)
                if ($(this).is(':checked')) {
                    let onekls = await getOneKelas(index)
                    console.log("onekls", onekls[0])
                    onekls[0].tgl_ujian = $('#tgl_ujian_kls').val()
                    onekls[0].jam_ujian = $('#jam_ujian_kls').val()
                    delete onekls[0].siswa
                    result.push(onekls[0])
                    let findKelas = result.findIndex((item) => parseInt(item.id) === onekls[0].id)
                    result[findKelas].siswa = []
                    // let indeDel = null;
                    let indeDel = [];

                    console.log(tempDeleteSw)
                    tempDeleteSw.map((sw, ind) => {
                        console.log('oiii')
                        console.log(sw)
                        if (parseInt(sw.id_kelas) === parseInt(onekls[0].id)) {
                            console.log('masukk')
                            indeDel.push(parseInt(ind - 1))

                            result[findKelas].siswa.push(sw)
                        }


                    })
                    indeDel.map((del) => {
                        tempDeleteSw.splice(del, 1)
                    })

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
                            val.siswa.map((psd) => {
                                tempDeleteSw.push(psd)
                            })
                            result.splice(id, 1)

                            console.log("delete " + val.id)
                        }

                    })
                    console.log("delete sw", tempDeleteSw)

                }

                console.log('hasil', result)



                console.log('array kelas', kelasFinal)

            })
            $('#table-siswa').on('click', '#hapussw', async function() {

                let index = parseInt($(this).data('index'))
                if ($(this).is(':checked')) {
                    let onesw = await getOneSiswa([index])
                    // onesw[0].tgl_ujian = $('#tgl_ujian_sw').val()
                    // onesw[0].jam_ujian = $('#jam_ujian_sw').val()
                    console.log('siswa cuyyy', onesw[0].id_kelas)
                    let findKelasInDelete = tempDeleteKls.findIndex((dtk) => parseInt(dtk.id) ===
                        parseInt(onesw[0].id_kelas))
                    console.log('testing cy', tempDeleteKls[0])
                    console.log('array habis backup', tempDeleteKls[findKelasInDelete])

                    if (findKelasInDelete !== undefined) {
                        result.push(tempDeleteKls[findKelasInDelete])
                        tempDeleteKls.splice(findKelasInDelete, 1)
                        checkKelasPar(onesw[0].id_kelas)
                        console.log('backup', result)
                    }
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
                                tempDeleteSw.push(result[id].siswa[swid])
                                result[id].siswa.splice(swid, 1)
                                if (result[id].siswa.length === 0) {
                                    tempDeleteKls.push(result[id])
                                    result.splice(id, 1);
                                    removeKelasFinal(val.id)
                                    console.log("kleas", kelasFinal)
                                    uncheckKelasPar(val.id)

                                }
                            }
                        })

                    })
                }

                console.log(result)
                console.log('kelas delete', tempDeleteKls)
                console.log('siswa delete', tempDeleteSw)

            })

            $('#submit_kls_sw').on('click', function() {
                // console.log('siswa array', result)
                let siswaCount = 0;

                result.map((rs) => {
                    rs.siswa.map((sw) => {
                        siswaCount += 1
                    })
                })
                $("#modalks").modal('hide');
                $('#val_sw_kls').val("Total Kelas : " + result.length + ", Total Siswa : " + siswaCount)

            })
            $('#submit_ujian').on('click', async function() {
                // console.log('siswa array', result)
                console.log(result)
                let data = {
                    jenis_ujian: $('#select_jenisujian').val(),
                    waktu_ujian: $('#waktu_ujian').val(),
                    id_th_akademiks: $('#tahun_akademik').val(),
                    kelas: $('#kelas').val(),
                    status: 0,
                    id_mapels: $('#selectmapel').val(),
                    jumlah_soal: $('#jumlah_soal').val(),
                    data: result
                }

                try {
                    console.log(data)

                    await $.ajax({
                        type: "POST",
                        url: "{{ route('api.postujian') }}",
                        data: data,
                        dataType: 'json',
                        success: function(res) {
                            console.log(res)
                            $(document).ajaxStop(function() {
                                window.location.href =
                                    "{{ route('jadwal.ujian') }}";
                            });
                        }
                    });



                } catch (error) {
                    console.log('erro lu', error)

                }

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

        function uncheckKelasPar(id_kelas) {
            console.log('id_kelas', id_kelas)
            let $table = $('#table-kelas');

            let $checkboxes = $table.find(`input[type="checkbox"][data-index="${id_kelas}"]`);

            $checkboxes.prop('checked', false);
        }

        function checkKelasPar(id_kelas) {
            console.log('id_kelas', id_kelas)
            let $table = $('#table-kelas');

            let $checkboxes = $table.find(`input[type="checkbox"][data-index="${id_kelas}"]`);

            $checkboxes.prop('checked', true);
        }

        function removeElement(element) {
            $('#' + element).remove()
        }

        function mappingKelaas(datas) {
            console.log('ambil menit', $('#waktu_ujian').val())
            datas.map((dt) => {
                let tgl_start = new Date(dt.tgl_ujian + ' ' + dt.jam_ujian)
                let options = {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    timeZone: 'Asia/Jakarta'
                };
                let formattedDate = tgl_start.toLocaleString('id-ID', options);
                let endDate = new Date(tgl_start.getTime() + parseInt($('#waktu_ujian').val() * 60000))
                    .toLocaleString('id-ID', options);

                kelasFinal.push(dt.id)
                $('#table-kelas').append(`
             <tr id="rowkls${dt.id}">
                  <td>${dt.jurusan.nama_jurusan +' - '+ dt.nama_kelas }</td>
                  <td>${ formattedDate + ' - ' + endDate}</td>
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
                dt.siswa.map((sw) => {
                    siswaFinal.push(sw.id)
                    $('#table-siswa').append(`
                 <tr id="rowsw${sw.id}">
                      <td>${sw.nama}</td>
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
                    console.log('kelaslur', res)
                    let mappinObj = [];
                    res.map((rs) => {
                        let foundKelas = result.find(item => item.id === rs.id)
                        if (foundKelas === undefined) {
                            rs.jam_ujian = $('#jam_ujian_kls').val()
                            rs.tgl_ujian = $('#tgl_ujian_kls').val()
                            result.push(rs)
                            mappinObj.push(rs)
                        }
                        console.log('golekkelas', foundKelas)

                    })
                    mappingKelaas(mappinObj)
                    mappingSiswa(mappinObj)
                    // $('#table-kelas').html('')
                    // $('#table-siswa').html('')

                    console.log(result)

                }
            });
        }

        function getKelasMapel(id) {
            let kelas = $('#kelas').val()
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
            let kelas = $('#kelas').val()

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

        // async function postUjian() {

        //     try {

        //         console.log('kene cok', result);

        //         let postData = await result
        //         await $.ajax({
        //             type: "POST",
        //             url: "{{ route('api.postujian') }}",
        //             data: {
        //                 jenis_ujian: $('#select_jenisujian').val(),
        //                 tanggal_ujian: $('#tanggal_ujian').val() + ' ' + $('#jam_ujian').val(),
        //                 waktu_ujian: $('#waktu_ujian').val(),
        //                 id_th_akademiks: $('#tahun_akademik').val(),
        //                 kelas: $('#kelas').val(),
        //                 status: 0,
        //                 id_mapels: $('#selectmapel').val(),
        //                 jumlah_soal: $('#jumlah_soal').val(),
        //                 data: [postData]
        //             },
        //             dataType: 'json',
        //             success: function(res) {
        //                 console.log(res)
        //             }
        //         });
        //     } catch (error) {
        //         console.log('erro lu', error)

        //     }

        //     // $(document).ajaxStop(function() {
        //     //     window.location.href = "{{ route('jadwal.ujian') }}";
        //     // });
        // }
    </script>
@endsection
