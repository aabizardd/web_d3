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
                        <li class="{{ Request::segment(3) == 'artikel' ? 'active' : '' }}">
                            <a href="{{ route('admin.artikel') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Artikel</span>
                            </a>
                        </li>
                        <li class="{{ Request::segment(3) == 'analis_kebijakan' ? 'active' : '' }}">
                            <a href="{{ route('admin.analis_kebijakan') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Analis Kebijakan</span>

                            </a>
                        </li>

                        <li class="{{ Request::segment(3) == 'pustaka' ? 'active' : '' }}">
                            <a href="{{ route('admin.pustaka') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Pustaka</span>

                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pcoded-hasmenu {{ Request::segment(2) == 'aboutd3' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <img src="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" alt=""
                                width="20">
                        </span>
                        <span class="pcoded-mtext">Tentang Deputi 3</span>
                    </a>
                    <ul class="pcoded-submenu">

                        <li class="{{ Request::segment(3) == 'renstra' ? 'active' : '' }}">
                            <a href="{{ route('admin.renstra') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Renstra</span>
                            </a>
                        </li>

                        <li class="{{ Request::segment(3) == 'profil_deputi' ? 'active' : '' }}">
                            <a href="{{ route('admin.artikel') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Profil Deputi</span>
                            </a>
                        </li>



                    </ul>
                </li>


            </ul>

        </div>
    </div>
</nav>
