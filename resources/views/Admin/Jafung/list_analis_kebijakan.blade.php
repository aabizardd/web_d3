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



                        <i class="far fa-comment bg-c-blue"></i>
                        <div class="d-inline">

                            @if (!isset($_GET['page']))
                                <h5>Lihat Analisis Kebijakan</h5>
                                <span>
                                    Lihat data analisis kebijakan Deputi 3 anda di sini.
                                </span>
                            @else
                                @if ($_GET['page'] == 'tambah_analisis_kebijakan')
                                    <h5>Tambah Analisis Kebijakan</h5>
                                    <span>
                                        Tambah data analisis kebijakan Deputi 3 anda di sini.
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
                                <a href=""><i class="far fa-comment"></i>
                                </a> /

                            </li>
                            &nbsp;
                            <li class="breadcrumb-items">
                                <a href="{{ route('admin.regulasi') }}">List Analisis Kebijakan</a>
                            </li>

                            @if (!isset($_GET['page']))
                            @else
                                @if ($_GET['page'] == 'tambah_regulasi')
                                    &nbsp;/&nbsp;
                                    <li class="breadcrumb-items">
                                        <a href="">Tambah Analisis Kebijakan</a>
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

                        {{-- <button class="btn btn-danger mb-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button> --}}

                        @if (!isset($_GET['page']))
                            @include('Admin.Jafung.data_analis_kebijakan')
                        @else
                            @if ($_GET['page'] == 'tambah_analisis_kebijakan')
                                @include('Admin.Jafung.tambah_analisis_kebijakan')
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
