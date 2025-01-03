<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Tambah Kontak KL / Badan Usaha</h5>

    </div>


    <div class="card-block">

        <form action="{{ route('admin.kontak.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group mb-4">
                        <label for="">Nama Lengkap</label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                            id="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mb-4">
                        <label for="">Jabatan</label>
                        <input class="form-control @error('jabatan') is-invalid @enderror" type="text" name="jabatan"
                            id="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}" required>

                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="">Asal Kantor</label>
                        <input class="form-control @error('asal_kantor') is-invalid @enderror" type="text"
                            name="asal_kantor" id="asal_kantor" placeholder="Asal Kantro"
                            value="{{ old('asal_kantor') }}" required>

                        @error('asal_kantor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                </div>

                <div class="col-lg-6">

                    <div class="form-group mb-4">
                        <label for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mb-4">
                        <label>Divisi</label>
                        <input class="form-control @error('divisi') is-invalid @enderror" type="text" name="divisi"
                            id="divisi" placeholder="Divisi" value="{{ old('divisi') }}" required>
                        @error('divisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mb-4">
                        <label>Nomor HP</label>
                        <input class="form-control @error('no_hp') is-invalid @enderror" type="text" name="no_hp"
                            id="no_hp" placeholder="Nomor HP" value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <button class="btn btn-primary w-100">
                Tambah Kontak
            </button>

        </form>

    </div>
</div>

@section('addScript')
@endsection
