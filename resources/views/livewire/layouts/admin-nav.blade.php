<ul class="menu-inner py-1">
    <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
        <a href="/home" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="home">Beranda</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is(['admin/participants','admin/participants/*']) ? 'active' : '' }}">
        <a href="{{ route('participants.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="home">Peserta</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is(['admin/reports']) ? 'active' : '' }}">
        <a href="{{ route('reports.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="home">Laporan</div>
        </a>
    </li>
</ul>
