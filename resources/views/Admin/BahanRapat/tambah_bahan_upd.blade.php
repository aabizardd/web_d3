<div class="card">



    <div class="card-header d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">
            <a href="{{ route('admin.detail_bahan', $rapat->id) }}">
                <span class="fas fa-arrow-left btn btn-danger"></span>
            </a>

            <h5 style="margin-left: 20px;margin-top: 7px;">Tambah Bahan Rapat</h5>
        </div>




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

                <form action="{{ route('admin.store_bahan', $rapat->id_folder) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="text" name="id_rapat" value="{{ $rapat->id }}" hidden>

                    <div class="form-group mb-3">
                        <label for="">Upload File</label>
                        <input class="form-control @error('file') is-invalid @enderror" type="file" name="file"
                            id="file" placeholder="Nama File" value="{{ old('file') }}" required>

                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Nama File</label>
                        <input class="form-control @error('nama_file') is-invalid @enderror" type="text"
                            name="nama_file" id="nama_file" placeholder="Nama File" value="{{ old('nama_file') }}"
                            required>

                        <i class="text-danger" style="font-size: 12px">*Contoh: Bahan Rapat BBM
                            191/2014
                            Lanjutan</i>

                        @error('nama_file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Keperluan</label>
                        <input class="form-control @error('keperluan') is-invalid @enderror" type="text"
                            name="keperluan" id="keperluan" placeholder="Keperluan" value="{{ old('keperluan') }}"
                            required>

                        <i class="text-danger" style="font-size: 12px">*Tuliskan singkat saja. Contoh: Bahan Rapat</i>

                        @error('keperluan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Catatan</label>
                        {{-- <input class="form-control @error('keperluan') is-invalid @enderror" type="text"
                            name="keperluan" id="keperluan" placeholder="Keperluan" value="{{ old('keperluan') }}"
                            required> --}}

                        <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="10"
                            placeholder="Tidak harus diisi, jika ingin diisi silahkan tuliskan sesuatu. Contoh: Bahan rapat deputi 3 Asdep 1 Tentang.....">{{ old('catatan') }}</textarea>


                        @error('keperluan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 mt-4">Tambah File</button>

                </form>

            </div>


        </div>




    </div>
</div>
