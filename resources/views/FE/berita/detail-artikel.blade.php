@extends('FE.layout.main')
@section('content')
    <style>
        .truncate {
            height: 3.5em;
            /* Ubah sesuai kebutuhan, misalnya 3 baris */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Menampilkan maksimal 2 baris */
            -webkit-box-orient: vertical;
        }
    </style>


    <section class="background-11 ">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div data-zanim='{"delay":0}'>
                            <a class="d-inline-block color-7" href="#">
                                Admin
                            </a>,
                            &nbsp;
                            <a class="d-inline-block color-7" href="#">
                                {{ format_date($berita->tanggal) }}
                            </a>
                        </div>
                        <h4 data-zanim='{"delay":0.1}'>
                            {{ $berita->judul }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12"><img class="radius-tr-secondary radius-tl-secondary"
                                src="{{ Storage::url($berita->foto) }}" alt=""></div>
                        <div class="col-12">
                            <div class="background-white p-5 radius-secondary">
                                {!! $berita->isi !!}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 text-center ml-auto mt-5 mt-lg-0">
                    <div class="row px-2">
                        <div class="col">
                            <div class="background-white p-5 radius-secondary">
                                <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                    <img class="radius-round" data-zanim='{"delay":0}'
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6QHBEa7hHxlGdaySJWGO0yzAkoOrf_f_iQCOWv-5BxA&s"
                                        alt="" width="80">
                                    <h5 class="text-capitalize mt-3 mb-0" data-zanim='{"delay":0.1}'>
                                        Admin
                                    </h5>
                                    <p class="mb-0 mt-3" data-zanim='{"delay":0.2}'>
                                        Pengelola Konten Website Portal Deputi 3 Bidang Koordinasi Pengembangan Usaha
                                        BUMN, Riset dan Inovasi
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 px-2">
                        <div class="col">
                            <h5 class="mb-3">Artikel Terkait</h5>
                            <div class="background-white pb-7 radius-secondary">
                                <div class="owl-carousel owl-theme owl-nav-outer owl-dot-round mt-4"
                                    data-options='{"items":1}'>

                                    @foreach ($berita_terkait as $item)
                                        <div class="item">
                                            <div class="background-white pb-4 h-100 radius-secondary">
                                                <img class="w-100 radius-tr-secondary radius-tl-secondary"
                                                    src="{{ Storage::url($item->foto) }}" alt="Featured Image"
                                                    height="200">
                                                <div class="px-4 pt-4"><a href="news.html">
                                                        <h5 class="truncate">{{ $item->judul }}</h5>
                                                    </a>
                                                    <p class="color-7">
                                                        Admin
                                                    </p>
                                                    <dvi class="mt-3">
                                                        {!! limit_text(strip_tags($item->isi), 12) !!}
                                                    </dvi>
                                                    <br> <br>
                                                    <a href="{{ route('detail_artikel', $item->id) }}">
                                                        Selebihnya &xrarr;

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section>
@endsection
