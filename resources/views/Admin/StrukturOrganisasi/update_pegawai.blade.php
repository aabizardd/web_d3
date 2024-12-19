 <div class="card-block">

     @if (Session::has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ Session::get('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif


     <div class="row">
         <div class="col-12">
             <form action="{{ route('admin.pegawai.update', $_GET['id']) }}" method="POST"
                 enctype="multipart/form-data">
                 @csrf

                 <div class="row">
                     <div class="col-12">

                         <div class="row">
                             <div class="col-lg-6">
                                 <div id="preview_foto">
                                     <img id="img_preview" src="{{ asset('storage/' . $pegawai->foto_pegawai) }}"
                                         alt="Preview Foto Pegawai" style="width: 100%;height: 300px;">
                                 </div>

                                 <div class="form-group mb-3 mt-3">
                                     <label for="">Foto Pegawai</label>
                                     <input class="form-control" type="file" name="foto_pegawai" id="foto_pegawai"
                                         accept="image/*">
                                 </div>

                                 <div class="form-group mb-3">
                                     <label for="">Nama Pegawai</label>
                                     <input class="form-control" type="text" name="nama_pegawai" id="nama_pegawai"
                                         value="{{ $pegawai->nama_pegawai }}" required>
                                 </div>

                                 <div class="form-group mb-3">
                                     <label for="">Golongan</label>
                                     <input class="form-control" type="text" name="golongan" id="golongan"
                                         value="{{ $pegawai->golongan }}" required>
                                 </div>
                             </div>
                             <div class="col-lg-6">


                                 <div class="form-group mb-3">
                                     <label for="">Jabatan</label>
                                     <input class="form-control" type="text" name="jabatan" id="jabatan"
                                         value="{{ $pegawai->jabatan }}" required>

                                 </div>

                                 <input type="text" name="id_divisi" value="" hidden>


                                 <div class="form-group mb-3">
                                     <label for="">Tentang</label>
                                     <textarea class="form-control" name="tentang" id="tentang" cols="30" rows="20">{{ $pegawai->tentang }}</textarea>
                                     {{-- <input class="form-control" type="text" name="jabatan" id="jabatan" required> --}}

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <button class="btn btn-primary w-100">
                     Update Pegawai
                 </button>

             </form>
         </div>

     </div>




 </div>






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
     document.getElementById('foto_pegawai').addEventListener('change', function(event) {
         const file = event.target.files[0]; // Ambil file yang dipilih
         const preview = document.getElementById('img_preview'); // Elemen gambar untuk preview

         if (file) {
             const reader = new FileReader(); // Gunakan FileReader untuk membaca file

             reader.onload = function(e) {
                 preview.src = e.target.result; // Setel src dari elemen gambar dengan hasil FileReader
                 preview.style.display = 'block'; // Tampilkan elemen gambar
             };

             reader.readAsDataURL(file); // Membaca file sebagai URL data base64
         } else {
             preview.src = ''; // Hapus src jika tidak ada file
             preview.style.display = 'none'; // Sembunyikan elemen gambar jika tidak ada file
         }
     });
 </script>
