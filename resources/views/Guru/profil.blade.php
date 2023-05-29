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
                                                id="foto_profil"
                                                @if ($guru->foto_profil != null) data-default-file="{{ asset('/img/user/' . $guru->foto_profil) }}" @endif />
                                        </div>
                                    </div>

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
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password
                                            Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                            Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
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
        $('.dropify').dropify();
    </script>
@endsection
