<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (request()->is('guru/mapel') || request()->is('guru/mapel/*'))
            <li class="nav-item">
                <a class="nav-link {{ request()->is('guru/mapel') || request()->is('guru/mapel/*') ? '' : 'collapsed' }}"
                    href="{{ route('guru.mapel') }}">
                    <i class="bi bi-grid"></i>
                    <span>Pilih MAPEL</span>
                </a>
            </li>
        @endif

        @if (request()->is('guru/dashboard') ||
                request()->is('guru/dashboard/*') ||
                request()->is('guru/bank_soal') ||
                request()->is('guru/bank_soal/*') ||
                request()->is('guru/data_nilai') ||
                request()->is('guru/data_nilai/*'))
            <li class="nav-item">
                <a class="nav-link {{ request()->is('guru/dashboard') || request()->is('guru/dashboard/*') ? '' : 'collapsed' }}"
                    href="{{ route('guru.dashboard', $id_mapels) }}">
                    <i class="bi bi-grid"></i>
                    <span>DASHBOARD</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->is('guru/bank_soal') || request()->is('guru/bank_soal/*') ? '' : 'collapsed' }}"
                    href="{{ route('guru.bank_soal', $id_mapels) }}">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>BANK SOAL</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('guru/data_nilai') || request()->is('guru/data_nilai/*') ? '' : 'collapsed' }}"
                    href="{{ route('guru.data_nilai', $id_mapels) }}">
                    <i class="bi bi-bar-chart"></i>
                    <span>DATA NILAI</span>
                </a>
            </li>
        @endif



</aside><!-- End Sidebar-->
