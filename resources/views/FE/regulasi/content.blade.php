<section class="background-11">
    <div class="container">
        <div class="row">
            @foreach ($regulasi as $item)
                <div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="w-100 radius-tr-secondary radius-tl-secondary" src="{{ Storage::url($item->gambar) }}"
                            alt="Featured Image" height="400px" />

                        <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <a href="news.html">
                                    <h6 data-zanim='{"delay":0}' style="font-size:15px;text-align: justify">
                                        {{ $item->judul }}
                                    </h6>
                                </a>
                            </div>
                            <div class="overflow-hidden">
                                <p class="color-7" data-zanim='{"delay":0.1}' style="font-size:13px">
                                    {{ format_date($item->tanggal) }}
                                </p>
                            </div>

                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim='{"delay":0.3}'>
                                    <a class="d-flex align-items-center" href="{{ Storage::url($item->pdf) }}"
                                        target="_blank" style="font-size:15px">Selebihnya
                                        <div class="overflow-hidden ml-2"
                                            data-zanim='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                            <span class="d-inline-block">&xrarr;</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

    <div class="col-auto mx-auto mt-4">
        {{ $regulasi->links('vendor.pagination.bootstrap-4') }}
    </div>

</section>
