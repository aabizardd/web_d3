<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 02:49:35 GMT -->

<head>
    <title>Admin Web Deputi 3</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    {{-- Icon --}}

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" />
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" />
    <link rel="mask-icon" href="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" color="#5bbad5" />

    {{-- ---- --}}

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('/') }}files/assets/pages/waves/css/waves.min.css" type="text/css"
        media="all">

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}files/assets/icon/feather/css/feather.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('/') }}files/bower_components/chartist/css/chartist.css" type="text/css"
        media="all">

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}files/assets/css/widget.css">

    @yield('addStyle')
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('Admin.navbar')



            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('Admin.sidebar')

                    @yield('content')

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="{{ asset('/') }}files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ asset('/') }}files/assets/pages/waves/js/waves.min.js"></script>

    <script type="text/javascript"
        src="{{ asset('/') }}files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="{{ asset('/') }}files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/chart/float/curvedLines.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>

    <script src="{{ asset('/') }}files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/widget/amchart/light.js"></script>

    <script
        src="{{ asset('/') }}{{ asset('/') }}{{ asset('/') }}developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{ asset('/') }}files/assets/pages/google-maps/gmaps.js"></script>

    <script src="{{ asset('/') }}files/assets/js/pcoded.min.js"></script>
    <script src="{{ asset('/') }}files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}files/assets/pages/dashboard/crm-dashboard.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}files/assets/js/script.min.js"></script>

    @yield('addScript')
</body>

<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 02:49:37 GMT -->

</html>
