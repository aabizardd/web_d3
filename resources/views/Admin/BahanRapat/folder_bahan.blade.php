<style>
    .hover-effect {
        transition: transform 0.3s ease-in-out;
    }
</style>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Folder Bahan Rapat</h5>
        {{-- <a class="btn btn-primary" href="?page=tambah_berita">
            <i class="fas fa-plus"></i>
            Berita Baru
        </a> --}}
    </div>




    <div class="card-block">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="row px-3">
            @foreach ($folder as $item)
                <a class="col-lg-3" href="?asdep={{ $item->id }}">
                    <div class="mt-4 text-center hover-effect pt-4 pb-2" style="background-image: url('');"
                        onmouseover="this.style.transform='scale(1.1)'; this.style.borderRadius='20px'; this.style.backgroundSize='cover'; this.style.color='white'; this.style.backgroundImage='url({{ $item->bg_img }})';"
                        onmouseout="this.style.transform='none';this.style.backgroundImage='none';this.style.color='black'">
                        <img src="{{ asset('template/assets/logo/folder.png') }}" alt="" width="120">
                        <p class="mt-2" style="font-weight: bold;font-size: 12px">{{ $item->nama_folder }}</p>

                    </div>
                </a>
            @endforeach
        </div>

    </div>
</div>
