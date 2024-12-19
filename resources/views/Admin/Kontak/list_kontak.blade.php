<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Data List Kontak KL / Badan Usaha</h5>
        <a class="btn btn-primary" href="?page=tambah_kontak">
            <i class="fas fa-plus"></i>
            Kontak Baru
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
                        <th>Nama</th>
                        <th>Nomor WA</th>
                        <th>Email</th>
                        <th>Asal Kantor</th>
                        <th>Divisi</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kontak as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <a href="https://api.whatsapp.com/send?phone={{ '62' . substr($item->no_hp, 1) }}"
                                    target="_blank">
                                    {{ $item->no_hp }}
                                </a>

                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->asal_kantor }}</td>
                            <td>{{ $item->divisi }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>
                                <a href="?page=ubah_kontak&id={{ $item->id }}"
                                    class="btn btn-warning btn-sm w-100 mb-2">
                                    <i class="fas fa-pencil"></i> Edit
                                </a>

                                <form action="{{ route('admin.kontak.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100"><i
                                            class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                {{-- 081386397855 --}}

            </table>
        </div>
    </div>
</div>
