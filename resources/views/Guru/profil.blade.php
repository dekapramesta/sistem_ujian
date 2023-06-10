@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <style>
        .dropify-wrapper .dropify-message p {
            margin: 5px 0 0 0;
            font-size: 20px;
        }
    </style>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        @if ($guru->foto_profil)
                            <img src="{{ asset('img/user/' . $guru->foto_profil) }}" alt="Profile" class="rounded-circle">
                        @else
                            <img src="{{ asset('/img/user/default.png') }}" alt="Profile" class="rounded-circle">
                        @endif
                        <h2>{{ $guru->nama }}</h2>
                        <h3>NIP. {{ $guru->nip }}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item ">
                                <button
                                    class="nav-link {{ session('ubah_password') == 'profile-change-password' ? '' : 'active' }}"
                                    data-bs-toggle="tab" data-bs-target="#profile-overview">Detail
                                    Profil</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profil</button>
                            </li>

                            <li class="nav-item ">
                                <button
                                    class="nav-link {{ session('ubah_password') == 'profile-change-password' ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah
                                    Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade {{ session('ubah_password') == 'profile-change-password' ? '' : 'show active' }} profile-overview"
                                id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label "></div>
                                    <div class="col-lg-9 col-md-8"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8">{{ $guru->nama }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">NIP</div>
                                    <div class="col-lg-9 col-md-8">{{ $guru->nip }}</div>
                                </div>
                                @php
                                    $formattedDate = strftime('%d %B %Y', strtotime($guru->tanggal_lahir));
                                @endphp
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                    <div class="col-lg-9 col-md-8">{{ $formattedDate }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No Telepon</div>
                                    <div class="col-lg-9 col-md-8">{{ $guru->no_telp }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $guru->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('guru.edit_profil') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="foto_profil" class="col-md-4 col-lg-3 col-form-label">Foto
                                            Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" class="dropify form-control" name="foto_profil"
                                                id="foto_profil{{ $guru->id }}"
                                                @if ($guru->foto_profil != null) data-default-file="{{ asset('/img/user/' . $guru->foto_profil) }}" @endif />
                                        </div>
                                    </div>
                                    @if ($guru->foto_profil != null)
                                        <div class="row mb-3">
                                            <label for="foto_profil" class="col-md-4 col-lg-3 col-form-label"></label>
                                            <div class="col-md-8 col-lg-9 d-grid gap-2 mb-3">
                                                <button type="button" class="btn btn-danger"
                                                    id="btn_hapus_foto_profil{{ $guru->id }}"
                                                    onclick="hapus_foto_profil_{{ $guru->id }}('{{ $guru->foto_profil }}')">Hapus
                                                    Foto
                                                    Profil</button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row mb-3">
                                        <label for="no_telp" class="col-md-4 col-lg-3 col-form-label">No Telepon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="no_telp" type="text" class="form-control" id="no_telp"
                                                value="{{ $guru->no_telp }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="email"
                                                value="{{ $guru->email }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade {{ session('ubah_password') == 'profile-change-password' ? 'show active' : '' }} pt-3"
                                id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('guru.edit_password') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password
                                            Sekarang</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="input-group">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    <i class="ri-eye-close-line" id="show-1"
                                                        onclick="myFunctionPass()" style="cursor : pointer"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password
                                            Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="input-group">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    <i class="ri-eye-close-line" id="show-2"
                                                        onclick="myFunctionNewPass()" style="cursor : pointer"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                            Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="input-group">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    <i class="ri-eye-close-line" id="show-3"
                                                        onclick="myFunctionRePass()" style="cursor : pointer"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>
        $('.dropify').dropify({
            showRemove: false,
        });
    </script>
    <script>
        function myFunctionPass() {
            var x = document.getElementById("currentPassword");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("show-1").className = "ri-eye-line";
            } else {
                x.type = "password";
                document.getElementById("show-1").className = "ri-eye-close-line";
            }
        }
    </script>
    <script>
        function myFunctionNewPass() {
            var x = document.getElementById("newPassword");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("show-2").className = "ri-eye-line";
            } else {
                x.type = "password";
                document.getElementById("show-2").className = "ri-eye-close-line";
            }
        }
    </script>
    <script>
        function myFunctionRePass() {
            var x = document.getElementById("renewPassword");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("show-3").className = "ri-eye-line";
            } else {
                x.type = "password";
                document.getElementById("show-3").className = "ri-eye-close-line";
            }
        }
    </script>
    <script type="text/javascript">
        function hapus_foto_profil_{{ $guru->id }}(foto_profil) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Swal.fire({
                title: 'Yakin ingin menghapus foto profil?',
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
                        url: "{{ route('guru.delete_foto_profil') }}",
                        data: {
                            foto_profil: foto_profil
                        },
                        dataType: 'json',
                        success: function(res) {
                            $("#foto_profil{{ $guru->id }}").next(".dropify-clear").trigger(
                                "click");
                            Swal.fire(
                                'Deleted!',
                                'Foto Profil Telah Dihapus!',
                                'success'
                            )
                            document.getElementById("btn_hapus_foto_profil{{ $guru->id }}")
                                .remove();
                            location.reload();

                        }
                    });
                }
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
