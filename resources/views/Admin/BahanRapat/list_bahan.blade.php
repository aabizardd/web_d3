<style>
    .hover-effect {
        transition: transform 0.3s ease-in-out;
    }
</style>

<div class="card">
    <div class="card-header">

        @if (isset($_GET['tahun']) && !isset($_GET['bulan']))
            <a class="btn btn-danger" href="{{ Request::url() }}?asdep={{ $_GET['asdep'] }}">
                <span class="fas fa-arrow-left"></span>
            </a>
            &nbsp;
        @elseif (isset($_GET['bulan']) && isset($_GET['tahun']))
            <a class="btn btn-danger" href="{{ Request::url() }}?asdep={{ $_GET['asdep'] }}&tahun={{ $_GET['tahun'] }}">
                <span class="fas fa-arrow-left"></span>
            </a>
            &nbsp;
        @endif


        <h5>Folder Bahan Rapat Asdep {{ $_GET['asdep'] }}</h5>

    </div>




    <div class="card-block">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="row">

            @if (isset($_GET['tahun']) && !isset($_GET['bulan']))
                @foreach ($bulan as $item)
                    <a class="col-lg-2 mb-3"
                        href="{{ Request::url() }}?asdep={{ $_GET['asdep'] }}&tahun={{ $_GET['tahun'] }}&bulan={{ $item->bulan }}">
                        <div class="d-flex justify-content-start align-items-center"
                            style="height: 40px; width: 100%; border-radius: 5px;background-color: #eaeaea;padding-left: 1rem;font-weight: bold">
                            {{ bulanIndonesia($item->bulan) }}
                        </div>
                    </a>
                @endforeach
            @elseif (isset($_GET['bulan']) && isset($_GET['tahun']))
                {{-- <h3>asd</h3> --}}

                <div class="dt-responsive table-responsive">
                    <table id="order-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Nama Rapat</th>
                                <th>Tanggal Rapat</th>
                                <th>Jam Rapat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rapat as $item)
                                @php
                                    $tgl = format_datetime($item->tanggal_rapat);
                                @endphp
                                <tr>
                                    <td>{{ $item->nama_rapat }}</td>
                                    <td>{{ $tgl['tanggal'] }}</td>
                                    <td>{{ $tgl['waktu'] }}</td>
                                    <td width=10>

                                        <a href="{{ route('admin.detail_bahan', $item->id) }}"
                                            class="btn btn-info btn-sm">
                                            <span class="fas fa-file-powerpoint"></span>
                                            Detail Bahan
                                        </a>

                                        @if ($_GET['asdep'] == auth()->user()->asdep || auth()->user()->role == 1)
                                            <a href="{{ route('admin.delete_rapat', $item->id) }}"
                                                class="btn btn-danger btn-sm">
                                                <span class="fas fa-trash"></span>
                                                Hapus
                                            </a>
                                        @endif



                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            @else
                @foreach ($tahun as $item)
                    <a class="col-lg-2 mb-3"
                        href="{{ Request::url() }}?asdep={{ $_GET['asdep'] }}&tahun={{ $item->tahun }}">
                        <div class="d-flex justify-content-start align-items-center"
                            style="height: 40px; width: 100%; border-radius: 5px;background-color: #eaeaea;padding-left: 1rem;font-weight: bold">
                            {{ $item->tahun }}
                        </div>
                    </a>
                @endforeach
            @endif



        </div>

    </div>
</div>
