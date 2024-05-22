<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Tambah Kontak KL / Badan Usaha</h5>

    </div>


    <div class="card-block">

        <form action="{{ route('admin.pengguna') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group mb-4">
                        <label for="">Nama Lengkap</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>

                        @error('name')
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





                </div>
            </div>

            <button class="btn btn-primary w-100">
                Tambah Pengguna
            </button>

        </form>

    </div>
</div>

@section('addScript')
@endsection
