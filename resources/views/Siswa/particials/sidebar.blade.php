<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('guru/dashboard') || request()->is('guru/dashboard/*') ? '' : 'collapsed' }}"
                href="{{ route('guru.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>DASHBOARD</span>
            </a>
        </li><!-- End Dashboard Nav -->



</aside><!-- End Sidebar-->
