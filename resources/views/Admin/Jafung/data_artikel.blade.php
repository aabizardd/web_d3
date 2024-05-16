<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Data Artikel</h5>
        <a class="btn btn-primary" href="?page=tambah_artikel">
            <i class="fas fa-plus"></i>
            Artikel Baru
        </a>
    </div>




    <div class="card-block">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="dt-responsive table-responsive">
            <table id="order-table" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Foto Cover</th>
                        <th>Judul</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikel as $item)
                        <tr>
                            <td style="width: 300px">
                                <img src="{{ Storage::url($item->foto) }}" class="card-img" alt="{{ $item->foto }}"
                                    style="width: 100%;height: 250px;">
                            </td>
                            <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">{{ $item->judul }}
                            </td>


                            <td style="width: 20px">
                                {{ $item->tanggal }}

                            </td>

                            <td style="width: 10px">
                                <a href="?page=ubah_artikel&id={{ $item->id }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil"></i> Edit
                                </a>

                                <a href="{{ route('admin.hapus_artikel', $item->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
