<!DOCTYPE html>
<html lang="en-US">
<!-- Mirrored from prium.github.io/elixir/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 06:10:42 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--  -->
    <!--    Document Title-->
    <!-- =============================================-->
    <title>
        Deputi 3 - Deputi Bidang Koordinasi Pengembangan Usaha BUMN, Riset dan
        Inovasi
    </title>
    <!--  -->
    <!--    Favicons-->
    <!--    =============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/') }}template/assets/logo/logo-only.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}template/assets/logo/logo-only.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}template/assets/logo/logo-only.png" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}template/assets/logo/logo-only.png" />
    <link rel="mask-icon" href="{{ asset('/') }}template/assets/logo/logo-only.png" color="#5bbad5" />
    <meta name="msapplication-TileImage"
        content="{{ asset('/') }}template/assets/images/favicons/mstile-150x150.png" />
    <meta name="theme-color" content="#ffffff" />
    <!--  -->
    <!--    Stylesheets-->
    <!--    =============================================-->
    <!-- Default stylesheets-->
    <link href="{{ asset('/') }}template/assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Template specific stylesheets-->
    <link href="{{ asset('/') }}template/assets/lib/loaders.css/loaders.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:300,400,600,700,800"
        rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/lib/iconsmind/iconsmind.css" rel="stylesheet" />
    <link href="../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/lib/hamburgers/dist/hamburgers.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link
        href="{{ asset('/') }}template/assets/lib/owl.carousel/dist/{{ asset('/') }}template/assets/owl.carousel.min.css"
        rel="stylesheet" />
    <link
        href="{{ asset('/') }}template/assets/lib/owl.carousel/dist/{{ asset('/') }}template/assets/owl.theme.default.min.css"
        rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/lib/remodal/dist/remodal.css" rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/lib/remodal/dist/remodal-default-theme.css" rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/lib/flexslider/flexslider.css" rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/lib/lightbox2/dist/css/lightbox.css" rel="stylesheet" />
    <!-- Main stylesheet and color file-->
    <link href="{{ asset('/') }}template/assets/css/style.css" rel="stylesheet" />
    <link href="{{ asset('/') }}template/assets/css/custom.css" rel="stylesheet" />

    @yield('addStyle')

</head>

<body data-spy="scroll" data-target=".inner-link" data-offset="60">
    <main>
        <div class="loading" id="preloader">
            <div class="loader h-100 d-flex align-items-center justify-content-center">
                <div class="line-scale">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        @include('FE.layout.navbar')

        @yield('content')


        @include('FE.layout.footer')
    </main>
    <!--  --><!--    JavaScripts--><!--    =============================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>


    <script src="{{ asset('/') }}template/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/gsap/src/minified/TweenMax.min.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/CustomEase.min.js"></script>
    <script src="{{ asset('/') }}template/assets/js/config.js"></script>
    <script src="{{ asset('/') }}template/assets/js/zanimation.js"></script>
    <script src="{{ asset('/') }}template/assets/js/inertia.js"></script>
    <!-- Hotjar Tracking Code for http://markup.themewagon.com/tryelixir-->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj =
                h.hj ||
                function() {
                    (h.hj.q = h.hj.q || []).push(arguments);
                };
            h._hjSettings = {
                hjid: 710415,
                hjsv: 6
            };
            a = o.getElementsByTagName("head")[0];
            r = o.createElement("script");
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, "https://static.hotjar.com/c/hotjar-", ".js?sv=");
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-76729372-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-76729372-5");
    </script>
    <script src="{{ asset('/') }}template/assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/remodal/dist/remodal.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/lightbox2/dist/js/lightbox.js"></script>
    <script src="{{ asset('/') }}template/assets/lib/flexslider/jquery.flexslider-min.js"></script>
    <script src="{{ asset('/') }}template/assets/js/core.js"></script>
    <script src="{{ asset('/') }}template/assets/js/main.js"></script>

    @yield('addScript')
</body>


</html>
