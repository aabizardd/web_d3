<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Ubah Berita / Kegiatan</h5>

    </div>


    <div class="card-block">

        <form action="{{ route('admin.update_berita', $bt->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-lg-4">

                    <img src="{{ Storage::url($bt->foto) }}" alt="" width="100%" height="250" id="preview_img"
                        class="mb-4" style="border-radius: 10px">

                    <div class="form-group mb-3">
                        <label for="">Foto Cover</label>
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto"
                            id="foto" placeholder="Foto" accept="image/png, image/gif, image/jpeg">

                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Judul</label>
                        <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul"
                            id="judul" placeholder="Judul" value="{{ $bt->judul }}" required>

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Tanggal</label>
                        <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal"
                            id="tanggal" placeholder="Tanggal" value="{{ $bt->tanggal }}" required>

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>

                <div class="col-lg-8">

                    <div class="form-group mb-4">
                        <label>Isi Berita</label>
                        <textarea name="isi" id="isi">{!! $bt->isi !!}</textarea>
                    </div>





                </div>
            </div>

            <button class="btn btn-primary w-100">
                Ubah Berita
            </button>

        </form>

    </div>
</div>

@section('addScript')
    <script src="https://cdn.tiny.cloud/1/9nf544vakjr5ojrlp1lawpnd13s2xks8hk05c3xnu0t67qhq/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 600,

        });

        // tinymce.activeEditor.setContent("Isi yang ingin Anda masukkan ke dalam TinyMCE");
    </script>

    <script>
        $(document).ready(function() {
            $('#foto').on('change', function() {
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
