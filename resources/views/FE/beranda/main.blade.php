@extends('FE.layout.main')

@section('addMeta')
    {{-- <title>{{ $berita->judul }}</title> --}}

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Portal Website Deputi 3 Kementerian Bidang Perekonomian" />
    <meta property="og:description"
        content="(Deputi III) mempunyai tugas menyelenggarakan koordinasi dan sinkronisasi perumusan, penetapan, dan pelaksanaan serta pengendalian pelaksanaan kebijakan Kementerian atau Lembaga yang terkait dengan isu di bidang pengembangan usaha badan usaha milik negara, riset, dan inovasi." />
    <meta property="og:image" content="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="beranda" />
@endsection


@section('content')
    @include('FE.beranda.banner')
    @include('FE.beranda.tentang_kami')
    @include('FE.beranda.dokumentasi')
    @include('FE.beranda.berita')
@endsection
