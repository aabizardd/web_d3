<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Data Berita / Kegiatan</h5>
        <a class="btn btn-primary" href="?page=tambah_berita">
            <i class="fas fa-plus"></i>
            Berita Baru
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
                        <th>Penulis</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_berita as $item)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($item->foto) }}" class="card-img" alt="{{ $item->foto }}"
                                    style="width: 250px;height: 250px;">
                            </td>
                            <td>{{ $item->judul }}</td>

                            <td>{{ $item->user->name }}</td>

                            <td>
                                {{ $item->tanggal }}

                            </td>

                            <td>
                                <a href="?page=ubah_berita&id={{ $item->id }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil"></i> Edit
                                </a>

                                <a href="{{ route('admin.hapus_berita', $item->id) }}" class="btn btn-danger btn-sm">
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
