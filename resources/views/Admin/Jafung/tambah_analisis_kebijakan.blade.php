<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Tambah Analisis Kebijakan</h5>

    </div>


    <div class="card-block">

        <form action="{{ route('admin.analis_kebijakan') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">



                <div class="col-lg-4">

                    <img src="https://st4.depositphotos.com/17828278/24401/v/450/depositphotos_244011872-stock-illustration-image-vector-symbol-missing-available.jpg"
                        alt="" width="100%" height="350" id="preview_img" class="mb-4"
                        style="border-radius: 10px">

                </div>

                <div class="col-lg-8">

                    <div class="form-group mb-3">
                        <label for="">Foto Cover</label>
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar"
                            id="gambar" placeholder="gambar" accept="image/png, image/gif, image/jpeg" required>

                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Judul</label>
                        <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul"
                            id="judul" placeholder="Judul" value="{{ old('judul') }}" required>

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Tanggal</label>
                        <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal"
                            id="tanggal" placeholder="tanggal" required>

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">File PDF</label>
                        <input class="form-control @error('pdf') is-invalid @enderror" type="file" name="pdf"
                            id="pdf" placeholder="pdf" accept="application/pdf,application/vnd.ms-excel" required>

                        @error('pdf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>




                </div>
            </div>

            <button class="btn btn-primary w-100">
                Tambah Analisis Kebijakan
            </button>

        </form>

    </div>
</div>

@section('addScript')
    <script>
        $(document).ready(function() {
            $('#gambar').on('change', function() {
                var input = this;
                var maxFileSize = 5 * 1024 * 1024; // Batas maksimum adalah 5MB (dalam byte).

                if (input.files && input.files[0]) {
                    var fileSize = input.files[0].size;

                    if (fileSize > maxFileSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ukuran gambar terlalu besar',
                            text: 'Maksimum 5MB diizinkan.',
                        });

                        // Reset input file
                        $(this).val('');
                    } else {
                        var input = this;
                        var previewImg = $('#preview_img');

                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                // Mengatur atribut src dari elemen img untuk menampilkan gambar yang dipilih
                                previewImg.attr('src', e.target.result);
                            };

                            // Membaca gambar yang dipilih sebagai URL data
                            reader.readAsDataURL(input.files[0]);
                        } else {
                            // Menghapus gambar yang ada di preview jika tidak ada gambar yang dipilih
                            previewImg.attr('src', '');
                        }
                    }
                }

            });
        });
    </script>
@endsection
