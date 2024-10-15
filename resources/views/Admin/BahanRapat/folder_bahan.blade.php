@section('addStyle')
    <style>
        .hover-effect {
            transition: transform 0.3s ease-in-out;
        }
    </style>
@endsection


<div class="row">

    <div class="col-7 col-lg-7 col-sm-12">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Folder Bahan Rapat</h5>

            </div>




            <div class="card-block">

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                {{-- <input type="text" id="search" class="form-control mb-3" placeholder="Cari File"> --}}

                <div class="row px-4">
                    @foreach ($folder as $item)
                        <a class="col-6 col-lg-4 col-sm-6" href="?asdep={{ $item->id }}">
                            <div class="mt-4 text-center hover-effect pt-4 pb-2" style="background-image: url('');"
                                onmouseover="this.style.transform='scale(1.1)'; this.style.borderRadius='20px'; this.style.backgroundSize='cover'; this.style.color='white'; this.style.backgroundImage='url({{ $item->bg_img }})';"
                                onmouseout="this.style.transform='none';this.style.backgroundImage='none';this.style.color='black'">
                                <img src="{{ asset('template/assets/logo/folder.png') }}" alt="" width="70">
                                <p class="mt-2" style="font-weight: bold;font-size: 12px">{{ $item->nama_folder }}</p>

                            </div>
                        </a>
                    @endforeach
                </div>


            </div>

        </div>
    </div>

    <div class="col-5 col-lg-5 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Cari Bahan Rapat (Shortcut)</h5>
                <p style="color: red"><sup>*</sup>Pilih bahan </p>
                {{-- <a class="btn btn-primary" href="?page=tambah_berita">
            <i class="fas fa-plus"></i>
            Berita Baru
        </a> --}}
            </div>




            <div class="card-block">

                <input type="text" id="search" class="form-control mb-3" placeholder="Cari File">

                <div class="row" id="tambahan-data">

                </div>

            </div>

        </div>
    </div>

</div>




@section('addScript')
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "{{ route('admin.search') }}",
                        method: "GET",
                        data: {
                            search: query
                        },
                        success: function(data) {
                            if (data.length == 0) {
                                $('#tambahan-data').html(
                                    '<img src="{{ asset('template/assets/images/no-data-found.png') }}" style="width: 100%;height: 350px"/> <p style="font-weight: bold;font-size: 15px;text-align: center;margin-top:10px">File Tidak Ditemukan!</p>'
                                );
                            } else {
                                $('#tambahan-data').html('');
                                $.each(data, function(key, item) {
                                    // console.log(item.file)
                                    if (item.file == null) {
                                        // console.log('ok')
                                        $('#tambahan-data').append(
                                            `<li>
                                            <a href ='` + item.link +
                                            `' style = 'font-size: 12px' target='__blank'>` +
                                            item.nama_file + ` (Link)</a></li>`);
                                    }

                                    if (item.link == null) {
                                        // console.log('ok')
                                        var link = item.file;
                                        var newUrl = link.replace('public/',
                                            '/storage/');
                                        console.log(newUrl)
                                        // alert(penyimpanan)
                                        $('#tambahan-data').append(
                                            `<li>
                                            <a href ='` + newUrl +
                                            `' style = 'font-size: 12px' download>` +
                                            item.nama_file + ` (File)</a></li>`);
                                    }

                                });
                            }
                        }
                    });
                } else {
                    $('#tambahan-data').html('');
                }
            });
        });
    </script>
@endsection
