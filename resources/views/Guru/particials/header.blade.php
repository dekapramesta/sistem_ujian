<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/smasaka.png') }}" alt="">
            <span class="d-none d-lg-block">SMAN 1 KAWEDANAN</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    @php
        use Illuminate\Support\Facades\Auth;
        use App\Models\HeaderUjian;
        use App\Models\Guru;
        $user_notif = Auth::user();
        $guru_notif = Guru::where('id_user', $user_notif->id)->first();
        $notif = HeaderUjian::where('id_gurus', $guru_notif->id)
            ->where('status', '!=', '8')
            ->where('status', '!=', '1')
            ->get();
    @endphp
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number" id="jumlah_notif">{{ count($notif) }}</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="width: 400px"
                    id="notif">
                    <li class="dropdown-header">
                        Memiliki {{ count($notif) }} Notifikasi
                    </li>
                    @foreach ($notif as $notf)
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>{{ $notf->jadwal_ujian->mapel->nama_mapel }} -
                                    {{ $notf->jadwal_ujian->jenis_ujian }} -
                                    {{ 'Kelas ' . $notf->jenjang->nama_jenjang }}</h4>
                                <p>Silahkan Upload Soal dan Konfirmasi Ujian</p>
                            </div>
                        </li>
                    @endforeach



                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @php
                        // use App\Models\Guru;
                        $user_header = Auth::user();
                        $guru_header = Guru::where('id_user', $user_header->id)->first();
                    @endphp
                    @if ($guru_header->foto_profil)
                        <img src="{{ asset('img/user/' . $guru_header->foto_profil) }}" alt="Profile"
                            class="rounded-circle">
                    @else
                        <img src="{{ asset('/img/user/default.png') }}" alt="Profile" class="rounded-circle">
                    @endif
                    {{-- <span class="d-none d-md-block dropdown-toggle ps-2">{{ Str::ucfirst(Auth::user()->name) }}</span> --}}
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>

                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Str::before($guru_header->nama, ' ') }}</h6>
                        <h6></h6>
                        <span>Guru</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @if (!request()->is('guru/mapel*'))
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('guru.mapel') }}">
                                <i class="bi bi-bookmarks"></i>
                                <span>Pilih Mata Pelajaran</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endif

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('guru.profil') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
