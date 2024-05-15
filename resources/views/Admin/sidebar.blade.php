<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigasi</div>
            <ul class="pcoded-item pcoded-left-item">
                {{-- <li class="pcoded-hasmenu active pcoded-trigger">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class>
                            <a href="index.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Default</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="dashboard-crm.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">CRM</span>
                            </a>
                        </li>
                        <li class>
                            <a href="dashboard-analytics.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Analytics</span>
                                <span class="pcoded-badge label label-info ">NEW</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::segment(2) == 'pengguna' ? 'active' : '' }}">
                    <a href="{{ route('admin.pengguna') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">Pengguna</span>
                    </a>
                </li>

                <li class="{{ Request::segment(2) == 'berita' ? 'active' : '' }}">
                    <a href="{{ route('admin.berita') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fas fa-newspaper"></i>
                        </span>
                        <span class="pcoded-mtext">Berita / Kegiatan</span>
                    </a>
                </li>


            </ul>

        </div>
    </div>
</nav>
