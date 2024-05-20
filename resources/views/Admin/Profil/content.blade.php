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



                        <i class="feather icon-user bg-c-blue"></i>
                        <div class="d-inline">

                            <h5>Profil Pengguna </h5>
                            <span>
                                Kelola profil akun anda di sini.
                            </span>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb breadcrumb-title breadcrumb-padding">
                            <li class="breadcrumb-item">
                                <a href=""><i class="feather icon-user"></i>
                                </a> /

                            </li>
                            &nbsp;
                            <li class="breadcrumb-items">
                                <a href="{{ route('admin.profil') }}">Kelola Profil</a>
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

                        {{-- <button class="btn btn-danger mb-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button> --}}

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Kelola Profil Pengguna</h5>

                            </div>


                            <div class="card-block">

                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form action="{{ route('admin.update_profil', get_user()->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-5">

                                            <img src="{{ get_user_picture() }}" alt="" width="100%" height="350"
                                                id="preview_img" class="mb-4" style="border-radius: 10px">

                                            <div class="form-group mb-3">
                                                <label for="">Foto Cover</label>
                                                <input id="foto"
                                                    class="form-control @error('foto') is-invalid @enderror" type="file"
                                                    name="foto" id="foto" placeholder="Foto"
                                                    accept="image/png, image/gif, image/jpeg">

                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                        </div>

                                        <div class="col-lg-7">
                                            <div class="form-group mb-4">
                                                <label for="">Nama Lengkap</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    type="text" name="name" id="name" placeholder="Nama Lengkap"
                                                    value="{{ get_user()->name }}" required>

                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="role">Role</label>
                                                <input class="form-control @error('role') is-invalid @enderror"
                                                    type="text" name="role" id="role" placeholder="Nama Lengkap"
                                                    value="{{ role_info(get_user()->role) }}" required disabled>
                                                @error('role')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" name="email" id="email" placeholder="Email"
                                                    value="{{ get_user()->email }}" required>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="password">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" name="password" id="password" placeholder="Password">

                                                <i style="font-size: 12px;color:red">*Isi Password Jika Ingin diganti</i>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>



                                        </div>
                                    </div>

                                    <button class="btn btn-primary w-100">
                                        Perbarui Profil
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
