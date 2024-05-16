@extends('Admin.layout')

@section('addStyle')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}files/assets/pages/data-table/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />
@endsection

@section('content')
    <div class="pcoded-content">



        <div class="page-header card">
            <div class="row align-items-end">


                <div class="col-lg-8">
                    <div class="page-header-title">



                        <i style="background-color: white">
                            <img src="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png" alt=""
                                srcset="" width="40">
                        </i>
                        <div class="d-inline">

                            <h5>Lihat Profil Deputi</h5>
                            <span>
                                Lihat data profil Deputi 3 anda di sini.
                            </span>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb breadcrumb-title breadcrumb-padding">
                            <li class="breadcrumb-item">
                                <a href="">
                                    <img src="{{ asset('/') }}template/assets/logo/d3-logo-only-white.png"
                                        width="20">
                                </a> /

                            </li>
                            &nbsp;
                            <li class="breadcrumb-items">
                                <a href="{{ route('admin.profil_deputi') }}">Profil Deputi</a>
                            </li>





                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Data Profil Deputi</h5>

                            </div>




                            <div class="card-block">

                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form action="{{ route('admin.profil_deputi') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-4">

                                            @php
                                                $gambar = '';
                                                if (is_null($profil->foto)) {
                                                    $gambar =
                                                        'https://st4.depositphotos.com/17828278/24401/v/450/depositphotos_244011872-stock-illustration-image-vector-symbol-missing-available.jpg';
                                                } else {
                                                    $gambar = Storage::url($profil->foto);
                                                }
                                            @endphp

                                            <img src="{{ $gambar }}" alt="" width="100%" height="500"
                                                id="preview_img" class="mb-4" style="border-radius: 10px">

                                            <div class="form-group mb-3">
                                                <label for="">Foto Deputi</label>
                                                <input class="form-control @error('foto') is-invalid @enderror"
                                                    type="file" name="foto" id="foto" placeholder="Foto"
                                                    accept="image/png, image/gif, image/jpeg">

                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>




                                        </div>

                                        <div class="col-lg-8">

                                            <div class="form-group mb-4">
                                                <textarea name="isi" id="isi">{!! $profil->isi !!}</textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <button class="btn btn-primary w-100">
                                        Update Profil Deputi
                                    </button>

                                </form>


                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addScript')
    <script src="{{ asset('/') }}files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="{{ asset('/') }}files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>

    <script src="{{ asset('/') }}files/assets/pages/data-table/js/data-table-custom.js"></script>


@section('addScript')
    <script src="https://cdn.tiny.cloud/1/9nf544vakjr5ojrlp1lawpnd13s2xks8hk05c3xnu0t67qhq/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 600,

        });

        // tinymce.activeEditor.setContent("Isi yang ingin Anda masukkan ke dalam TinyMCE");
    </script>

    <script>
        $(document).ready(function() {
            $('#foto').on('change', function() {
                var input = this;
                var maxFileSize = 5 * 1024 * 1024; // Batas maksimum adalah 5MB (dalam byte).

                if (input.files && input.files[0]) {
                    var fileSize = input.files[0].size;

                    if (fileSize > maxFileSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ukuran gambar terlalu besar',
                            text: 'Maksimum 5MB diizinkan.',
                        });

                        // Reset input file
                        $(this).val('');
                    } else {
                        var input = this;
                        var previewImg = $('#preview_img');

                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                // Mengatur atribut src dari elemen img untuk menampilkan gambar yang dipilih
                                previewImg.attr('src', e.target.result);
                            };

                            // Membaca gambar yang dipilih sebagai URL data
                            reader.readAsDataURL(input.files[0]);
                        } else {
                            // Menghapus gambar yang ada di preview jika tidak ada gambar yang dipilih
                            previewImg.attr('src', '');
                        }
                    }
                }

            });
        });
    </script>
@endsection

@endsection
