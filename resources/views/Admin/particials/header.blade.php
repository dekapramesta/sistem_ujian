<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/smasaka.png') }}" alt="">
            <span class="d-none d-lg-block">SMAN 1 KAWEDANAN</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @php
                        use App\Models\Admin;
                        $user_header = Auth::user();
                        $admin_header = Admin::where('id_user', $user_header->id)->first();
                    @endphp
                    @if ($admin_header->foto_profil)
                        <img src="{{ asset('img/user/' . $admin_header->foto_profil) }}" alt="Profile"
                            class="rounded-circle">
                    @else
                        <img src="{{ asset('/img/user/default.png') }}" alt="Profile" class="rounded-circle">
                    @endif
                    {{-- <span class="d-none d-md-block dropdown-toggle ps-2">{{ Str::ucfirst(Auth::user()->name) }}</span> --}}
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>

                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        {{-- <h6>{{ Str::ucfirst(Auth::user()->name) }}</h6> --}}
                        <h6></h6>
                        <span>Administrator</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @if (request()->is('admin/profil*'))
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profil') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endif

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
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
