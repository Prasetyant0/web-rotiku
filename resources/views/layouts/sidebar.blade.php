<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/dashboard">
            <span class="align-middle">StoreAdministrator</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.dataroti.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dataroti.index') }}">
                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Data Roti</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.pesanan.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.pesanan.index') }}">
                    <i class="align-middle" data-feather="message-circle"></i> <span class="align-middle">Pesanan</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.kategori.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.kategori.index') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Data Kategori</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
