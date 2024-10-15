 <div class="card-block">

     @if (Session::has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ Session::get('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif

     <form action="{{ route('admin.tambah_divisi') }}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="row">
             <div class="col-12">

                 <div class="form-group mb-3">
                     <label for="">Nama Divisi</label>
                     <input class="form-control" type="text" name="nama_divisi" id="nama_divisi" required>
                 </div>

                 <div class="form-group mb-3">
                     <label for="">Nama Kepala Divisi</label>
                     <input class="form-control" type="text" name="kepala_divisi" id="kepala_divisi" required>
                 </div>





             </div>
         </div>

         <button class="btn btn-primary w-100">
             Tambah Divisi
         </button>

     </form>

 </div>

 @section('addScript')
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
