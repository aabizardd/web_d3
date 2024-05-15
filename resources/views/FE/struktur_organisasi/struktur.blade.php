@php

    $gambar = 'struktur_organisasi_deputi3.png';

    if (isset($_GET['asdep'])) {
        // $gambar = $_GET['asdep'];
        if ($_GET['asdep'] == 1) {
            $keterangans = 'Asisten Deputi Minyak dan Gas, Pertambangan, dan Petrokimia / Sekretaris Deputi';
            $gambar = 'struktur_asdep1.png';
        } elseif ($_GET['asdep'] == 2) {
            $keterangans = 'Asisten Deputi Agro, Farmasi, dan Pariwisata';
            $gambar = 'struktur_asdep2.png';
        } elseif ($_GET['asdep'] == 3) {
            $keterangans = 'Asisten Deputi Jasa Keuangan dan Industri Informasi';
            $gambar = 'struktur_asdep3.png';
        } elseif ($_GET['asdep'] == 4) {
            $keterangans = 'Asisten Deputi Utilitas dan Industri Manufaktur';
            $gambar = 'struktur_asdep4.png';
        } else {
            $keterangans = 'Asisten Deputi Niaga dan Transportasi';
            $gambar = 'struktur_asdep5.png';
        }
    }

@endphp
<section class="background-106">
    <div class="container">
        <div class="row mb-6">
            <div class="col">
                <h3 class="text-center fs-2 fs-lg-3">
                    Struktur <span style="color: #e9b700">Organisasi</span>
                </h3>
                @if (isset($_GET['asdep']))
                    <h5 class="text-center mt-2">{{ $keterangans }}</h5>
                @endif


                <hr class="short"
                    data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                    data-zanim-trigger="scroll" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <img src="{{ asset('/') }}template/assets/images/{{ $gambar }}" class="img-fluid"
                    alt="" srcset="" style="border-radius: 30px" />
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>
