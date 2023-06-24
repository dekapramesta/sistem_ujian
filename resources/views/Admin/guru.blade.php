@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Data Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item active">Data Guru</li>
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
                                <h5 class="card-title">Data Guru</h5>
                                <div class="container">
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                                        data-bs-target="#tambah">Tambah +</button>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Nama Guru</th>
                                                <th scope="col">NIP</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gurus as $no => $guru)
                                                <tr>
                                                    <th scope="row">{{ ++$no }}</th>
                                                    <td>{{ $guru->nama }}</td>
                                                    <td>{{ $guru->nip }}</td>
                                                    <td>
                                                        @php
                                                            $tanggal = substr($guru->tanggal_lahir, 8, 2);
                                                            $bulan = substr($guru->tanggal_lahir, 5, 2);
                                                            $tahun = substr($guru->tanggal_lahir, 0, 4);
                                                        @endphp
                                                        {{ $tanggal . '-' . $bulan . '-' . $tahun }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info"
                                                            onclick="editGuru('{{ $guru }}')">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $guru->nip }}">Delete</button>
                                                    </td>
                                                </tr>


                                                <div class="modal" id="delete{{ $guru->nip }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.guru.delete', $guru->nip) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-body">
                                                                    Apakah Anda Yakin Ingin Mengahapus??
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <input class="btn btn-danger" type="submit"
                                                                        value="Hapus">
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
                                <h5 class="modal-title">Input Data Guru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="tambah_guru">
                                @csrf
                                <div class="modal-body">
                                    <div class="d-flex row px-3">


                                        <label>Nama Guru :</label><input required type="text" class="form-control"
                                            name="nama">

                                        <label class="mt-2">NIP : </label><input type="text" class="form-control"
                                            name="nip">
                                        <label class="mt-2">Tanggal :</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                        <div class="card rounded mt-3">
                                            <div class="card-body">
                                                <h5 class="card-title">Kelas Dan Mapel</h5>
                                                <div class="col mt-2" id="dynamic-form-container">

                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary btn-sm mt-2" id="add-option">Tambah
                                            Mapel Kelas</button>



                                    </div>

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
            <div class="modal" id="edit_guru" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Guru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="edit_guru_form">
                            @csrf
                            <div class="modal-body">
                                <div class="d-flex row px-3">
                                    <input type="text" hidden value="" id="id_guru" name="id_guru">
                                    <label>Nama Guru :</label><input type="text" id="nama_edit" class="form-control"
                                        name="nama" value="" required>
                                    <label class="mt-2">NIP :</label><input id="nip_edit" type="text"
                                        class="form-control" name="nip" value="" required>

                                    <label class="mt-2">Tanggal Lahir: </label>
                                    <input type="date" class="form-control" required id="tgl_edit"
                                        name="tanggal_lahir" value="">
                                    <div class="card rounded mt-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Kelas Dan Mapel</h5>
                                            <div class="col mt-2" id="dynamic-form-container-edit">

                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary btn-sm mt-2" id="edit-option">Tambah
                                        Mapel Kelas</button>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" value="Save changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <script>
        var kelas = JSON.parse('<?php echo $kelas; ?>');
        var mapel = JSON.parse('<?php echo $mapel; ?>');
        var indexEdit = 0;
        $(document).ready(function() {
            var container = $("#dynamic-form-container");
            var index = 0;


            console.log(kelas)
            $("#add-option").click(function() {

                container.append(
                    `<div class="mt-2 d-flex flex-row justify-content-between" id='row-select${index}'></div>`
                )
                var select = $('<select id="pilihkelas" class="form-control"></select>').attr(
                        'name', 'kelas[]')
                    .attr('class',
                        'form-select').attr('style', 'width:10rem').prop('required', true);;
                var select2 = $('<select class="form-control ms-2" required></select>').attr('name',
                        'mapel[]')
                    .attr('class',
                        'form-select ms-3').attr('style', 'width:10rem').prop('required', true);;



                var optionDisableKls = $('<option value="" disabled hidden selected ></option>').text(
                    'Pilih Kelas');
                var optionDisableMpl = $('<option value="" disabled hidden selected ></option>').text(
                    'Pilih Maple');
                // var optionDisableMpl = $('<option></option>').attr('value').text('Option 2');

                select.append(optionDisableKls);
                kelas.map((kls) => {
                    select.append($('<option></option>').attr('value', kls.id).text(kls.jenjang
                        .nama_jenjang +
                        ' ' + kls.jurusan.nama_jurusan + ' ' + kls.nama_kelas));

                })
                select2.append(optionDisableMpl);
                mapel.map((mpl) => {
                    select2.append($('<option></option>').attr('value', mpl.id).text(mpl
                        .nama_mapel + ' - ' + mpl.jurusan.nama_jurusan));
                })
                // select2.append(option4);


                var removeButton = $('<button></button>').attr('type', 'button').attr('class',
                    'btn btn-danger btn-sm ms-3').text('Remove');
                removeButton.click(function() {
                    $(this).parent().remove();
                });

                $(`#row-select${index}`).append(select);
                $(`#row-select${index}`).append(select2);
                $(`#row-select${index}`).append(removeButton);
                index += 1
            });
            $("#edit-option").click(function() {
                console.log(indexEdit)
                var containerEdit = $("#dynamic-form-container-edit");
                containerEdit.append(
                    `<div class="mt-2 d-flex flex-row justify-content-between" id='row-selectedit${indexEdit}'></div>`
                )
                var select = $('<select id="pilihkelasedit" class="form-control"></select>').attr('name',
                        'kelas[]')
                    .attr('class',
                        'form-select').attr('style', 'width:10rem').prop('required', true);;
                var select2 = $('<select class="form-control ms-2"></select>').attr('name',
                        'mapel[]')
                    .attr('class',
                        'form-select ms-3').attr('style', 'width:10rem').prop('required', true);;



                var optionDisableKls = $('<option value="" disabled hidden selected ></option>').text(
                    'Pilih Kelas');
                var optionDisableMpl = $('<option value="" disabled hidden selected ></option>').text(
                    'Pilih Maple');
                // var optionDisableMpl = $('<option></option>').attr('value').text('Option 2');

                select.append(optionDisableKls);
                kelas.map((kls) => {
                    select.append($('<option></option>').attr('value', kls.id).text(kls.jenjang
                        .nama_jenjang +
                        ' ' + kls.jurusan.nama_jurusan + ' ' + kls.nama_kelas));

                })
                select2.append(optionDisableMpl);
                mapel.map((mpl) => {
                    select2.append($('<option></option>').attr('value', mpl.id).text(mpl
                        .nama_mapel + ' - ' + mpl.jurusan.nama_jurusan));
                })
                // select2.append(option4);


                var removeButton = $('<button></button>').attr('type', 'button').attr('class',
                    'btn btn-danger btn-sm ms-3').text('Remove');
                removeButton.click(function() {
                    $(this).parent().remove();
                });

                $(`#row-selectedit${indexEdit}`).append(select);
                $(`#row-selectedit${indexEdit}`).append(select2);
                $(`#row-selectedit${indexEdit}`).append(removeButton);
                indexEdit += 1
            });

            $("#tambah_guru").submit(function(event) {
                event.preventDefault();
                let elementExists = document.getElementById("pilihkelas") !== null;
                if (!elementExists) return swal("Mohon Maaf", "Tambah Kelas dan Mapel Belum ada", "error");


                var formData = $(this).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.guru.create') }}",
                    data: formData,
                    dataType: 'json',
                    success: function(res) {
                        console.log(res)
                        swal("Detail", res.result.join(', '), "info").then((result) => {
                            if (result) {
                                location.reload();
                            }
                        });

                        setTimeout(function() {

                            location.reload();
                        }, 5000);

                    }
                });
                // Optional: Display form data
            });


            $("#edit_guru_form").submit(function(event) {
                event.preventDefault();
                let elementExists = document.getElementById("pilihkelasedit") !== null;

                if (!elementExists) return swal("Mohon Maaf", "Tambah Kelas dan Mapel Belum ada", "error");

                let formDataEdit = $(this).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.guru.edit') }}",
                    data: formDataEdit,
                    dataType: 'json',
                    success: function(res) {
                        console.log(res)
                        swal("Detail", res.result.join(', '), "info").then((result) => {
                            if (result) {
                                location.reload();
                            }
                        });

                        // setTimeout(function() {
                        //     location.reload();
                        // }, 5000);

                    }
                });
                // Optional: Display form data
            });


        });

        function editGuru(data) {
            var containerEdit = $("#dynamic-form-container-edit");
            containerEdit.html('')


            let datas = JSON.parse(data)
            $('#id_guru').val(datas.id)
            $('#nama_edit').val(datas.nama)
            $('#nip_edit').val(datas.nip)
            $('#tgl_edit').val(datas.tanggal_lahir)
            console.log(datas)
            $('#edit_guru').modal('show');
            datas.mst_mapel_guru_kelas.map((dt) => {

                containerEdit.append(
                    `<div class="mt-2 d-flex flex-row justify-content-between" id='row-selectedit${indexEdit}'></div>`
                )
                let select = $('<select class="form-control"></select>').attr('name', 'kelas[]')
                    .attr('class',
                        'form-select').attr('style', 'width:10rem');
                let select2 = $('<select class="form-control ms-2"></select>').attr('name',
                        'mapel[]')
                    .attr('class',
                        'form-select ms-3').attr('style', 'width:10rem');



                let optionDisableKls = $('<option disabled hidden selected ></option>').text('Pilih Kelas');
                let optionDisableMpl = $('<option disabled hidden selected ></option>').text('Pilih Maple');
                // let optionDisableMpl = $('<option></option>').attr('value').text('Option 2');

                select.append(optionDisableKls);
                kelas.map((kls) => {
                    if (parseInt(kls.id) === parseInt(dt.id_kelas)) {
                        select.append($('<option selected></option>').attr('value', kls
                            .id).text(
                            kls
                            .jenjang.nama_jenjang +
                            ' ' + kls.jurusan.nama_jurusan + ' ' + kls
                            .nama_kelas));
                    } else {
                        select.append($('<option></option>').attr('value', kls.id).text(
                            kls
                            .jenjang
                            .nama_jenjang +
                            ' ' + kls.jurusan.nama_jurusan + ' ' + kls
                            .nama_kelas));
                    }


                })
                select2.append(optionDisableMpl);
                mapel.map((mpl) => {
                    if (parseInt(mpl.id) === parseInt(dt.id_mapels)) {

                        select2.append($('<option selected></option>').attr('value', mpl.id)
                            .text(mpl
                                .nama_mapel + ' - ' + mpl.jurusan.nama_jurusan));
                    } else {
                        select2.append($('<option></option>').attr('value', mpl.id).text(mpl
                            .nama_mapel + ' - ' + mpl.jurusan.nama_jurusan));

                    }
                })
                // select2.append(option4);
                let removeButton = $('<button></button>').attr('type', 'button').attr('class',
                    'btn btn-danger btn-sm ms-3').text('Remove');
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                $(`#row-selectedit${indexEdit}`).append(`<input hidden name="mst_id[]" value="${dt.id}"></input>`);
                $(`#row-selectedit${indexEdit}`).append(select);
                $(`#row-selectedit${indexEdit}`).append(select2);
                $(`#row-selectedit${indexEdit}`).append(removeButton);
                indexEdit += 1


            })

        }
    </script>
@endsection
