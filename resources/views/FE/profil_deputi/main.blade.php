@extends('FE.layout.main')
@section('content')
    <section style="margin-top: -120px; height: 450px">
        <div>
            <div class="background-holder overlay"
                style="background-image: url({{ asset('/') }}template/assets/images/bg-core.png); background-position: center bottom;">
            </div>
            <!--/.background-holder-->
            <div class="container">
                <div class="row pt-6" data-inertia='{"weight":1.5}'>
                    <div class="col-md-8 px-md-0 color-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <h1 class="color-white fs-4 fs-md-5 mb-0 zopacity" data-zanim='{"delay":0}'>
                                Profil Deputi
                            </h1>
                            <div class="nav zopacity" aria-label="breadcrumb" role="navigation" data-zanim='{"delay":0.1}'>
                                <ol class="breadcrumb fs-1 pl-0 fw-700">
                                    <li class="breadcrumb-item">
                                        <a class="color-white" href="#">Tentang D3</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Profil Deputi
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>

    <section class="background-11">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4 py-3 py-lg-0" style="min-height: 400px; background-position: top">
                    <div class="background-holder radius-tl-secondary radius-bl-lg-secondary radius-tr-secondary radius-tr-lg-0"
                        style="background-image: url({{ Storage::url($profil->foto) }})"></div>
                    <!--/.background-holder-->
                </div>
                <div
                    class="col-lg-8 px-5 py-6 my-lg-0 background-white radius-tr-lg-secondary radius-br-secondary radius-bl-secondary radius-bl-lg-0">
                    <div class="d-flex align-items-center h-100">
                        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <h5>
                                Deputi Bidang Koordinasi Pengembangan Usaha Badan Usaha
                                Milik Negara, Riset, dan Inovasi
                            </h5>
                            <p class="my-1" data-zanim='{"delay":0.1}' style="text-align: justify; font-size: 14px">
                                {!! $profil->isi !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!--/.row-->
        </div>
        <!--/.container-->
    </section>


    <section class="background-102">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center fs-2 fs-lg-3">Struktur Organisasi </h3>
                    <hr class="short"
                        data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                        data-zanim-trigger="scroll" />
                </div>
            </div>

            <div class="row mt-lg-6">





            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
@endsection
