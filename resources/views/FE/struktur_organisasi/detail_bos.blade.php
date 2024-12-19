@extends('FE.layout.main')
@section('content')
    <section style="margin-top: -120px; height: 450px">
        <div>
            <div class="background-holder overlay"
                style="background-image: url({{ asset('/') }}template/assets/images/bg-core.png);background-position: center bottom;">
            </div>
            <!--/.background-holder-->
            <div class="container">
                <div class="row pt-6" data-inertia='{"weight":1.5}'>
                    <div class="col-md-8 px-md-0 color-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <h1 class="color-white fs-4 fs-md-5 mb-0 zopacity" data-zanim='{"delay":0}'>
                                Struktur Organisasi
                            </h1>
                            <div class="nav zopacity" aria-label="breadcrumb" role="navigation" data-zanim='{"delay":0.1}'>
                                <ol class="breadcrumb fs-1 pl-0 fw-700">
                                    <li class="breadcrumb-item">
                                        <a class="color-white" href="{{ route('struktur_organisasi') }}">Struktur
                                            Organisasi</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Detail {{ ucwords(Request::segment(3)) }}
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
                        style="background-image: url({{ asset('storage/' . $bagian->foto_pegawai) }})"></div>
                    <!--/.background-holder-->
                </div>
                <div
                    class="col-lg-8 px-5 py-6 my-lg-0 background-white radius-tr-lg-secondary radius-br-secondary radius-bl-secondary radius-bl-lg-0">
                    <div class="d-flex align-items-center h-100">
                        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <h3>
                                {{ $bagian->nama_pegawai }}
                            </h3>

                            <h5>{{ $bagian->jabatan }}</h5>
                            <p class="my-1 mt-3" data-zanim='{"delay":0.1}' style="text-align: justify; font-size: 14px">

                                {!! $bagian->tentang !!}

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!--/.row-->
        </div>
        <!--/.container-->
    </section>

    <section class="background-11" style="margin-top: -100px">
        <div class="container">

            <center>
                <h3>Daftar Pegawai</h3>
            </center>
            <div class="row no-gutters">

                @foreach ($pegawainya as $item)
                    <div class="col-lg-3" style="margin-top: 80px">
                        <center>
                            <a href="" class="hover-img" style="position: relative; display: inline-block;">
                                <img src="{{ asset('storage/' . $item->foto_pegawai) }}" alt="" width="250"
                                    height="250" style="border: solid 5px #03435F; border-radius: 10px; z-index: 1;">
                                <div class="info bg-warning p-2"
                                    style="width: 100%; border-radius: 10px; position: absolute; top: 180px; left: 50%; transform: translateX(-50%); z-index: 2;">
                                    <h5>{{ $item->nama_pegawai }}</h5>
                                    <h6 style="font-size: 12px">{{ $item->jabatan }}</h6>
                                </div>
                            </a>

                        </center>

                    </div>
                @endforeach

            </div>

        </div>
        <!--/.container-->
    </section>
@endsection
