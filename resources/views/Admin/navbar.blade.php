<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid" src="{{ asset('/') }}template/assets/logo/logo-white.png" alt="Theme-Logo"
                    width="180" style="margin-top: -13px" />
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu icon-toggle-right"></i>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-text search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-text search-btn">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                        <i class="full-screen feather icon-maximize"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">

                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ get_user_picture() }}" class="img-radius" alt="User-Profile-Image"
                                style="width: 40px; height: 40px;">
                            <span>
                                {{ auth()->user()->name }}
                            </span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">

                            <li>
                                <a href="{{ route('admin.profil') }}">
                                    <i class="feather icon-user"></i> Profile
                                </a>
                            </li>

                            <li>
                                <a href="auth-lock-screen.html">
                                    <i class="feather icon-lock"></i> Lock Screen
                                </a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                    @csrf

                                    <div id="logout" onclick="document.getElementById('logout-form').submit();">
                                        <i class="feather icon-log-out"></i> Logout
                                    </div>

                                </form>

                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
