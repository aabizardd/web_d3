<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigasi</div>
            <ul class="pcoded-item pcoded-left-item">

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
                            <i class="far fa-newspaper"></i>
                        </span>
                        <span class="pcoded-mtext">Berita / Kegiatan</span>
                    </a>
                </li>
                {{-- active pcoded-trigger --}}
                <li class="pcoded-hasmenu {{ Request::segment(2) == 'jafung' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="far fa-comment"></i></span>
                        <span class="pcoded-mtext">Forum Jafung</span>
                    </a>
                    <ul class="pcoded-submenu">

                        <li class="{{ Request::segment(3) == 'regulasi' ? 'active' : '' }}">
                            <a href="{{ route('admin.regulasi') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Regulasi</span>
                            </a>
                        </li>
                        <li class="">
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
                </li>


            </ul>

        </div>
    </div>
</nav>
