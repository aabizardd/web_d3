<div class="card">



    <div class="card-header d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">
            <a
                href="{{ route('admin.bahan_rapat') }}?asdep={{ $rapat->id_folder }}&tahun={{ get_date('Y', $rapat->tanggal_rapat) }}&bulan={{ get_date('m', $rapat->tanggal_rapat) }}">
                <span class="fas fa-arrow-left btn btn-danger"></span>
            </a>

            <h5 style="margin-left: 20px;margin-top: 7px;">Detail Bahan Rapat</h5>
        </div>

        @if ($rapat->id_folder == get_user()->asdep || get_user()->role == 1)
            <div class="">
                <a class="btn btn-primary" href="?page=tambah_bahan">
                    <i class="fas fa-plus"></i>
                    Tambah File Rapat
                </a>
            </div>
        @endif



    </div>


    {{-- <h5>Folder Bahan Rapat Asdep {{ $_GET['asdep'] }}</h5> --}}






    <div class="card-block">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">

                <form action="{{ route('admin.update_rapat', $rapat->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="">Nama Rapat</label>
                        <input class="form-control @error('nama_rapat') is-invalid @enderror" type="text"
                            name="nama_rapat" id="nama_rapat" placeholder="Nama Rapat" value="{{ $rapat->nama_rapat }}"
                            required <?= $rapat->id_folder == get_user()->asdep ? '' : 'readonly' ?>>

                        <i class="text-danger" style="font-size: 12px">*Contoh: Rapat BBM
                            191/2014
                            Lanjutan</i>

                        @error('nama_rapat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Tanggal Rapat</label>
                        <input class="form-control @error('tanggal_rapat') is-invalid @enderror" type="datetime-local"
                            name="tanggal_rapat" id="tanggal_rapat" placeholder="Tanggal Rapat"
                            value="{{ $rapat->tanggal_rapat }}" required
                            <?= $rapat->id_folder == get_user()->asdep ? '' : 'readonly' ?>>



                        @error('tanggal_rapat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if (auth()->user()->asdep != 0)
                        <div class="form-group mb-3">
                            <label for="">Folder</label>
                            <input class="form-control" type="text" value="{{ asdep(auth()->user()->asdep) }}"
                                disabled required>

                            @error('id_folder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <input type="hidden" value="{{ auth()->user()->asdep }}" name="id_folder">
                    @else
                        <div class="form-group mb-3">
                            <label for="">Folder</label>

                            <select name="id_folder" id="id_folder"
                                class="form-select @error('id_folder') is-invalid @enderror" required>
                                <option value="" disabled>---Pilih Folder---</option>
                                @foreach ($folder as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $rapat->id_folder ? 'selected' : '' }}>
                                        {{ $item->nama_folder }}
                                    </option>
                                @endforeach

                            </select>

                            @error('id_folder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif

                    @if ($rapat->id_folder == get_user()->asdep || get_user()->role == 1)
                        <button class="btn btn-primary w-100 mt-4">Perbarui Informasi Rapat</button>
                    @endif

                </form>

            </div>

            <div class="col-lg-12 mt-5">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <div class="d-flex align-items-center">

                        <h5>List Bahan Rapat</h5>
                    </div>




                </div>

                @if ($file->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Judul Bahan</th>
                            <th>Keperluan</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($file as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_file }}</td>
                                    <td>{{ $item->keperluan }}</td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ Storage::url($item->file) }}" class="btn btn-warning btn-sm"
                                                download>
                                                <span class="fas fa-download"></span> Unduh
                                            </a>
                                        @else
                                            <a href="{{ $item->link }}" class="btn btn-info btn-sm" target="__blank">
                                                <span class="fas fa-link"></span> Buka Tautan
                                            </a>
                                        @endif

                                        @if ($rapat->id_folder == get_user()->asdep || get_user()->role == 1)
                                            <a href="{{ route('admin.hapus_bahan', $item->id) }}"
                                                class="btn btn-danger btn-sm">
                                                <span class="fas fa-trash"></span> Hapus
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="mt-5">

                        <center>

                            <img src="{{ asset('template/assets/images/no-data-found.png') }}" alt=""
                                srcset="" width="450">
                            <p style="font-weight: bold;margin-top: 10px">Belum Ada Data!</p>
                        </center>
                    </div>
                @endif



            </div>
        </div>




    </div>
</div>
