<section class="background-105">
    <div class="container">
        <div class="row mb-6">
            <div class="col">
                <h3 class="text-center fs-2 fs-lg-3">
                    Rencana <span style="color: #e9b700">Strategi</span>
                </h3>
                <hr class="short"
                    data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
                    data-zanim-trigger="scroll" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    @foreach ($renstra as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card" style="background-color: #3d4c6f;height: 450px;border-radius: 10px;">
                                <img src="{{ Storage::url($item->gambar) }}" class="card-img-top" alt="..."
                                    style="height: 100%; border-radius: 10px" />
                                <div class="card-body pos-absolute"
                                    style="bottom: 0;background-color: white;width: 100%;opacity: 90%;">
                                    <a href="{{ Storage::url($item->pdf) }}" target="_blank">
                                        <p class="card-title" style="color: #3d4c6f">
                                            {{ $item->judul }}
                                        </p>
                                    </a>
                                    <a href="{{ Storage::url($item->pdf) }}" target="_blank"
                                        class="btn btn-info w-100">Lihat Detail
                                        Renstra</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>
