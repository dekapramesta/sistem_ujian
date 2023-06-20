<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/admin*') ? '' : 'collapsed' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>DASHBOARD</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/th_akademik*') || request()->is('admin/jurusan*') || request()->is('admin/kelas*') || request()->is('admin/mapel*') ? '' : 'collapsed' }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>MASTER DATA</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav"
                class="nav-content collapse {{ request()->is('admin/th_akademik*') || request()->is('admin/jurusan*') || request()->is('admin/kelas*') || request()->is('admin/mapel*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.th_akademik') }}"
                        class="{{ request()->is('admin/th_akademik*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Tahun Akademik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.jurusan') }}"
                        class="{{ request()->is('admin/jurusan*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Jurusan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kelas') }}" class="{{ request()->is('admin/kelas*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.mapel') }}" class="{{ request()->is('admin/mapel*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Mapel</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/guru*') || request()->is('admin/siswa*') ? '' : 'collapsed' }}"
                data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>DATA PENGGUNA</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav"
                class="nav-content collapse {{ request()->is('admin/guru*') || request()->is('admin/siswa*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.guru') }}" class="{{ request()->is('admin/guru*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.siswa') }}" class="{{ request()->is('admin/siswa*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Siswa</span>
                    </a>
                </li>
                <li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/jadwalujian*') || request()->is('admin/add/jadwalujian*') ? '' : 'collapsed' }}"
                href="{{ route('jadwal.ujian') }}">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>SET JADWAL</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/nilai*') ? '' : 'collapsed' }}"
                href="{{ route('admin.data_nilai') }}">
                <i class="bi bi-bar-chart"></i>
                <span>DATA NILAI</span>
            </a>
        </li>
</aside><!-- End Sidebar-->
