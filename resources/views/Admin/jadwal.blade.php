@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Set Jadwal Ujian</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Set Jadwal Ujian</li>
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

                                <h5 class="card-title-datatable">Set Jadwal</h5>
                                <div>
                                    <a href="{{ route('add.ujian') }}" class="btn btn-success me-3">+ Tambah</a>

                                </div>

                            </div>

                            <div class="card-body p-3">

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Guru Penanggung Jawab</th>
                                            <th>Mapel</th>
                                            <th>Jenjang</th>
                                            <th>Soal Ujian</th>
                                            <th>Tahun Akademik</th>
                                            <th>Jenis Ujian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>@php
                                        $no = 1;
                                    @endphp
                                        @foreach ($header as $hdr)
                                            @if ($hdr->status != 8)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $hdr->guru->nama }}</td>
                                                    <td>{{ $hdr->jadwal_ujian->mapel->nama_mapel }}</td>
                                                    <td>{{ 'Kelas ' . $hdr->jenjang->nama_jenjang }}</td>
                                                    <td>{{ $hdr->jumlah_soal }}</td>
                                                    <td>{{ $hdr->jadwal_ujian->th_akademiks->th_akademik . ' ' . $hdr->jadwal_ujian->th_akademiks->nama_semester }}
                                                    </td>
                                                    <td>{{ $hdr->jadwal_ujian->jenis_ujian }}</td>
                                                    <td>
                                                        <div class="flex-row text-center">
                                                            <button onclick="showDetail({{ $hdr }})"
                                                                class="btn btn-primary btn-sm text-start  flex-row"><i
                                                                    class="bi bi-pencil-square me-2"></i>Detail</button>
                                                            <a class="btn btn-success btn-sm text-start flex-row"
                                                                href="{{ route('edit.ujian', ['id' => $hdr->id]) }}"><i
                                                                    class="bi bi-pencil-square me-2  small-icon"></i>
                                                                Edit</a>
                                                            <a href="{{ route('delete.ujian', ['id' => $hdr->id]) }}"
                                                                class=" ms-2 btn btn-danger btn-sm text-start flex-row"><i
                                                                    class="bi bi-trash3-fill me-2  small-icon"></i>
                                                                Hapus</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->

                {{-- Modal --}}

            </div>
            <div class="modal" id="detail" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Ujian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <label for="">Guru Penanggung Jawab</label>
                                <input type="text" class="form-control" name="" id="guru_detail" disabled>
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <label for="">Mata Pelajaran</label>

                                <input type="text" class="form-control" name="" id="mapel_detail" disabled>
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <label for="">Jenjang</label>
                                <input type="text" class="form-control" name="" id="jenjang_detail" disabled>
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <label for="">Jenis Ujian</label>

                                <input type="text" class="form-control" name="" id="jn_ujian_detail" disabled>
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <label for="">Jumlah Soal</label>
                                <input type="text" class="form-control" name="" id="jumlah_soal_detail" disabled>
                            </div>
                            <div class="d-flex flex-column mt-2">
                                <label for="">Status</label>
                                <input type="text" class="form-control" name="" id="status" disabled>
                            </div>

                            <!-- Class list -->
                            <!-- Class list -->
                            <!-- Class list -->
                            <!-- Class list -->
                            <div class="d-flex flex-column mt-2">
                                <label for="">Kelas dan Siswa</label>
                                <select id="classList" class="form-select" onchange="showStudents(this.value)">
                                    <option value="">Select a class</option>

                                </select>

                                <!-- Student list -->
                                <div class="list-group mt-3" id="studentList" style="height: 200px; overflow: auto;">
                                    <!-- Student list for the selected class will be displayed here -->
                                </div>
                            </div>






                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        var peserta = [];

        function showStudents(className) {
            var studentListContainer = $('#studentList');

            // Clear the existing student list
            studentListContainer.empty();

            // Simulate an AJAX request to fetch the student list for the selected class
            // Replace this with your actual AJAX request to fetch the student data from the server
            var students = [];

            // if (className === "class1") {
            //     students = ["Student 1", "Student 2", "Student 3"];
            // } else if (className === "class2") {
            //     students = ["Student 4", "Student 5", "Student 6"];
            // }
            const data_peserta = peserta.find(ps => parseInt(ps.id_kelas) === parseInt(className))

            data_peserta.pesertaujian.map((dts) => {
                students.push(dts.siswa.nama)
            })
            // Generate the student list dynamically
            students.forEach(function(student) {
                var listItem = $('<a>', {
                    href: '#',
                    class: 'list-group-item',
                    text: student
                });
                studentListContainer.append(listItem);
            });
        }

        function showDetail(data) {
            console.log(data)
            $('#studentList').html('')
            let pesertaujian = []
            data.detailujian.map((dtl) => {
                pesertaujian.push(dtl)
            })
            peserta = pesertaujian
            console.log(peserta)
            $('#classList').html(`                                    <option value="">Select a class</option>
`)
            const modal = new bootstrap.Modal(document.getElementById('detail'));
            $('#guru_detail').val(data.guru.nama)
            $('#mapel_detail').val(data.jadwal_ujian.mapel.nama_mapel)
            $('#jenjang_detail').val(data.jenjang.nama_jenjang)
            $('#jn_ujian_detail').val(data.jadwal_ujian.jenis_ujian)
            $('#jumlah_soal_detail').val(data.jumlah_soal)
            $('#status').val(data.status == 1 ? 'Telah Di Verifikasi' : 'Belum Di Verifikasi')
            data.detailujian.map((dt) => {
                $('#classList').append(` <option value='${dt.id_kelas}'>${dt.kelas.jenjang.nama_jenjang+' '+dt.kelas.jurusan.nama_jurusan+' '+dt.kelas.nama_kelas}</option>
`)
            })
            modal.show();
        }
    </script>
@endsection
