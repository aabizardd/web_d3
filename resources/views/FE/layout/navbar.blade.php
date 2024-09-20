<div class="znav-white znav-container sticky-top navbar-elixir" id="znav-container">
    <div class="container-fluid px-5">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand overflow-hidden pr-3" href="index-2.html"><img
                    src="{{ asset('/') }}template/assets/logo/logo_d3.png" alt="" width="250" /></a><button
                class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger hamburger--emphatic">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav fs-0 fw-700">
                    <li>
                        <a href="/">Beranda</a>
                    </li>
                    <li>
                        <a href="JavaScript:void(0)">Tentang D3</a>
                        <ul class="dropdown fs--1">
                            <li><a href="{{ route('tugas') }}">Tugas dan Fungsi</a></li>
                            <li><a href="{{ route('renstra') }}">Renstra</a></li>
                            <li><a href="{{ route('profil_deputi') }}">Profil Deputi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="JavaScript:void(0)">Struktur Organisasi</a>
                        <ul class="dropdown fs--1">
                            <li>
                                <a href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a>
                            </li>
                            <li><a href="{{ route('struktur_organisasi') }}?asdep=1">Asisten Deputi Minyan dan Gas,
                                    Pertambangan, dan Petrokimia /
                                    Sekretaris Deputi</a></li>

                            <li><a href="{{ route('struktur_organisasi') }}?asdep=2">Asisten Deputi Agro,
                                    Farmasi, dan Pariwisata</a></li>

                            <li><a href="{{ route('struktur_organisasi') }}?asdep=3">Asisten Deputi Jasa Keuangan dan
                                    Industri Informasi</a></li>

                            <li><a href="{{ route('struktur_organisasi') }}?asdep=4">Asisten Deputi Utilitas dan
                                    Industri Manufaktur
                                </a></li>

                            <li><a href="{{ route('struktur_organisasi') }}?asdep=5">Asisten Deputi Niaga dan
                                    Transportasi
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('berita') }}">Berita</a>
                    </li>

                    <li>
                        <a href="JavaScript:void(0)">Publikasi</a>
                        <ul class="dropdown fs--1">
                            <li><a href="{{ route('analisis_kebijakan') }}">Analisis Kebijakan</a></li>
                            <li><a href="{{ route('regulasi') }}">Regulasi</a></li>
                            {{-- <li><a href="{{ route('artikel') }}">Artikel</a></li> --}}
                            <li><a href="{{ route('pustaka') }}">Pustaka</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="d-block mr-md-9" href="#footer">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
