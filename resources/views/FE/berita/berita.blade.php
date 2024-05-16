<style>
    .truncate {
        height: 2.4em;
        /* Ubah sesuai kebutuhan, misalnya 3 baris */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* Menampilkan maksimal 2 baris */
        -webkit-box-orient: vertical;
    }
</style>


<section class="background-11">
    <div class="container">
        <div class="row">
            @foreach ($berita as $item)
                <div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0 mb-3">
                    <div class="background-white pb-4 h-100 radius-secondary">
                        <img class="w-100 radius-tr-secondary radius-tl-secondary" src="{{ Storage::url($item->foto) }}"
                            alt="Featured Image" height="250px" />

                        <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <a href="{{ route('detail_berita', [$item->id, slugify($item->judul)]) }}">
                                    <h5 class="truncate" data-zanim='{"delay":0}'>
                                        {{ $item->judul }}
                                    </h5>
                                </a>
                            </div>

                            <div class="overflow-hidden">
                                <p class="color-7" data-zanim='{"delay":0.1}'>
                                    {{ format_date($item->tanggal) }} <b>|</b>
                                    <span class="fa fa-eye">&nbsp;</span>{{ $item->dilihat }}
                                </p>
                            </div>
                            <div class="overflow-hidden">
                                <p data-zanim='{"delay":0.2}' style="text-align: justify">
                                    {!! limit_text(strip_tags($item->isi), 12) !!}
                                </p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim='{"delay":0.3}'>
                                    <a class="d-flex align-items-center"
                                        href="{{ route('detail_berita', [$item->id, slugify($item->judul)]) }}">Selebihnya
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


        {{ $berita->links('vendor.pagination.bootstrap-4') }}

    </div>
</section>
