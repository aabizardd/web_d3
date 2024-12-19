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


        <style>
            .hover-img:hover {
                transform: translateY(-10px);
                /* Geser ke atas saat di-hover */
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
                /* Tambahkan bayangan saat di-hover */
            }
        </style>


        <div class="row">
            <div class="col-12">
                <center>
                    <a href="{{ route('struktur_organisasi', ['atasan' => 'deputi']) }}" class="hover-img"
                        style="position: relative; display: inline-block;">
                        <img src="{{ asset('storage/' . $deputi->foto_pegawai) }}" alt="" width="400"
                            height="400" style="border: solid 8px #03435F; border-radius: 15px; z-index: 1;">
                        <div class="info bg-warning p-2"
                            style="width: 450px; border-radius: 10px; position: absolute; top: 350px; left: 50%; transform: translateX(-50%); z-index: 2;">
                            <h4>{{ $deputi->nama_pegawai }}</h4>
                            <h6 style="font-size: 15px">{{ $deputi->jabatan }}</h6>
                        </div>
                    </a>
                </center>
            </div>

            <div class="col-12" style="margin-top: 150px">
                <center>
                    <a href="{{ route('struktur_organisasi', ['atasan' => 'sesdep']) }}" class="hover-img"
                        style="position: relative; display: inline-block;">
                        <img src="{{ asset('storage/' . $sesdep->foto_pegawai) }}" alt="" width="250"
                            height="250" style="border: solid 5px #03435F; border-radius: 10px; z-index: 1;">
                        <div class="info bg-warning p-2"
                            style="width: 350px; border-radius: 10px; position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 2;">
                            <h5>{{ $sesdep->nama_pegawai }}</h5>
                            <h6>{{ $sesdep->jabatan }}</h6>
                        </div>
                    </a>
                </center>
            </div>

            <div class="row">
                @php
                    $no = 1;
                @endphp
                @foreach ($asdep as $item)
                    <div class="col-lg-4" style="margin-top: 80px">
                        <center>

                            <a href="{{ route('struktur_organisasi', ['atasan' => 'asdep' . $no++]) }}"
                                class="hover-img" style="position: relative; display: inline-block;">
                                <img src="{{ asset('storage/' . $item->foto_pegawai) }}" alt="" width="250"
                                    height="250" style="border: solid 5px #03435F; border-radius: 10px; z-index: 1;">
                                <div class="info bg-warning p-2"
                                    style="width: 350px; border-radius: 10px; position: absolute; top: 180px; left: 50%; transform: translateX(-50%); z-index: 2;">
                                    <h5>{{ $item->nama_pegawai }}</h5>
                                    <h6 style="font-size: 12px">{{ $item->jabatan }}</h6>
                                </div>
                            </a>

                        </center>
                    </div>
                @endforeach
            </div>




        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>
