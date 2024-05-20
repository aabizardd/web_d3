@extends('Admin.layout')

@section('addStyle')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}files/assets/pages/data-table/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />

    <style>
        .floating-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;

            /* Warna ikon */
            /* padding: 50px; */
            border-radius: 50%;

        }
    </style>
@endsection

@section('content')
    <div class="pcoded-content">



        <div class="page-header card">
            <div class="row align-items-end">


                <div class="col-lg-8">
                    <div class="page-header-title">



                        <i class="far fa-file-powerpoint bg-c-blue"></i>
                        <div class="d-inline">


                            @if (!isset($_GET['page']))
                                <h5>Detail Bahan Rapat</h5>
                                <span>
                                    Lihat Detail Bahan Rapat Deputi 3 di sini.
                                </span>
                            @elseif (isset($_GET['page']))
                                @if ($_GET['page'] == 'tambah_bahan')
                                    <h5>Tambah Bahan Rapat </h5>
                                    <span>
                                        Tambah bahan rapat
                                    </span>
                                @endif
                            @endif






                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb breadcrumb-title breadcrumb-padding">
                            <li class="breadcrumb-item">
                                <a href=""><i class="far fa-file-powerpoint"></i>
                                </a> /

                            </li>
                            &nbsp;
                            <li class="breadcrumb-items">
                                <a href="{{ route('admin.bahan_rapat') }}">Folder Bahan Rapat</a>
                            </li>


                            {{-- @if (!isset($_GET['asdep']))
                            @else
                                @if ($_GET['asdep'])
                                    &nbsp;/&nbsp;
                                    <li class="breadcrumb-items">
                                        <a href="">Daftar Bahan</a>
                                    </li>
                                @endif
                            @endif --}}

                            @if (!isset($_GET['page']))
                                &nbsp;/&nbsp;...&nbsp;/&nbsp;
                                <li class="breadcrumb-items">
                                    <a href="">Detail Bahan Rapat</a>
                                </li>
                            @else
                                @if ($_GET['page'] == 'tambah_bahan')
                                    &nbsp;/&nbsp;...&nbsp;/&nbsp;
                                    <li class="breadcrumb-items">
                                        <a href="">Tambah Bahan Rapat</a>
                                    </li>
                                @endif
                            @endif



                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">


                        @if (!isset($_GET['page']))
                            @include('Admin.BahanRapat.detail_bahan_upd')
                        @else
                            @if ($_GET['page'] == 'tambah_bahan')
                                @include('Admin.BahanRapat.tambah_bahan_upd')
                            @endif
                        @endif





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
@endsection
