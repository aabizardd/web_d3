<div class="card-block">

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.ubah_divisi', $sok->id) }}" method="POST">
        @csrf


        <div class="row">
            <div class="col-12">

                <div class="form-group mb-3">
                    <label for="">Nama Divisi</label>
                    <input class="form-control" type="text" name="nama_divisi" id="nama_divisi"
                        value="{{ $sok->nama_divisi }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="">Nama Kepala Divisi</label>
                    <input class="form-control" type="text" name="kepala_divisi" id="kepala_divisi"
                        value="{{ $sok->kepala_divisi }}" required>
                </div>





            </div>
        </div>

        <button class="btn btn-primary w-100">
            Ubah Divisi
        </button>

    </form>

</div>
