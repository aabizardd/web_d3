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
                    {{-- @foreach ($pengguna as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>

                            <td>
                                @if ($item->role == 1)
                                    <span class="badge badge-success">Admin</span>
                                @else
                                    <span class="badge badge-primary">PIC Asdep</span>
                                @endif
                            </td>

                            <td>
                                @if ($item->role == 1)
                                @else
                                    <span class="badge badge-warning">
                                        Asisten Deputi {{ $item->asdep }}
                                    </span>
                                @endif


                            </td>

                            <td>
                                <a href="?page=ubah_pengguna&id={{ $item->id }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil"></i> Edit
                                </a>

                                <a href="{{ route('admin.hapus_pengguna', $item->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>

            </table>
        </div>
    </div>
</div>
