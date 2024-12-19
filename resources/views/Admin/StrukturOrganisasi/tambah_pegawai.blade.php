 <div class="card-block">

     @if (Session::has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ Session::get('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif


     <div class="row">
         <div class="col-12">
             <form action="{{ route('admin.pegawai.tambah') }}" method="POST" enctype="multipart/form-data">
                 @csrf

                 <div class="row">
                     <div class="col-12">

                         <div class="row">
                             <div class="col-lg-6">
                                 <div id="preview_foto">
                                     <img id="img_preview" src="" alt="Preview Foto Pegawai"
                                         style="width: 100%;height: 300px; display: none;">
                                 </div>

                                 <div class="form-group mb-3 mt-3">
                                     <label for="">Foto Pegawai</label>
                                     <input class="form-control" type="file" name="foto_pegawai" id="nama_divisi"
                                         accept="image/*" required>
                                 </div>

                                 <div class="form-group mb-3">
                                     <label for="">Nama Pegawai</label>
                                     <input class="form-control" type="text" name="nama_pegawai" id="nama_pegawai"
                                         required>
                                 </div>

                                 <div class="form-group mb-3">
                                     <label for="">Golongan</label>
                                     <input class="form-control" type="text" name="golongan" id="golongan" required>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="form-group mb-3">
                                     <label for="">Jabatan</label>
                                     <input class="form-control" type="text" name="jabatan" id="jabatan" required>

                                 </div>

                                 <input type="text" name="id_divisi" value="{{ $_GET['asdep'] }}" hidden>


                                 <div class="form-group mb-3">
                                     <label for="">Tentang</label>
                                     <textarea class="form-control" name="tentang" id="tentang" cols="30" rows="10"></textarea>
                                     {{-- <input class="form-control" type="text" name="jabatan" id="jabatan" required> --}}

                                 </div>
                             </div>
                         </div>









                     </div>
                 </div>

                 <button class="btn btn-primary w-100">
                     Tambah Pegawai
                 </button>

             </form>
         </div>


         {{-- <div class="col-lg-6">

             <form id="form_pendidikan" action="" method="POST">
                 @csrf

                 <div class="row">
                     <div class="col-12">
                         <div class="form-group mb-3 mt-3">
                             <label for="">Nama Universitas</label>
                             <input class="form-control" type="text" name="nama_universitas" id="nama_universitas"
                                 placeholder="Contoh: Universitas Indonesia">
                         </div>

                         <div class="form-g`roup mb-3">
                             <label for="">Jurusan</label>
                             <input class="form-control" type="text" name="jurusan" id="jurusan"
                                 placeholder="Contoh: Hukum">
                         </div>

                         <div class="form-group mb-3">
                             <label for="">Tahun Lulus</label>
                             <input class="form-control" type="number" name="tahun_lulus" id="tahun_lulus"
                                 placeholder="2002">
                         </div>
                     </div>
                 </div>

                 <button class="btn btn-primary w-100" type="button" id="tambah_pendidikan">
                     Tambah Pendidikan
                 </button>
             </form>

             <table class="table table-striped table-bordered nowrap mt-3" id="table_pendidikan">
                 <thead>
                     <tr>
                         <th>Universitas</th>
                         <th>Jurusan</th>
                         <th>Tahun Lulus</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody id="body_pendidikan">
                     <!-- Data akan ditambahkan di sini -->
                 </tbody>
             </table>

         </div> --}}
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
     document.getElementById('nama_divisi').addEventListener('change', function(event) {
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



     //   document.addEventListener('DOMContentLoaded', function() {
     //       loadPendidikanFromCache();

     //       document.getElementById('tambah_pendidikan').addEventListener('click', function() {
     //           let namaUniversitas = document.getElementById('nama_universitas').value;
     //           let jurusan = document.getElementById('jurusan').value;
     //           let tahunLulus = document.getElementById('tahun_lulus').value;

     //           if (namaUniversitas && jurusan && tahunLulus) {
     //               addPendidikanToTable(namaUniversitas, jurusan, tahunLulus);
     //               savePendidikanToCache(namaUniversitas, jurusan, tahunLulus);
     //               clearForm();
     //           }
     //       });
     //   });

     //   function addPendidikanToTable(universitas, jurusan, tahun) {
     //       let tbody = document.getElementById('body_pendidikan');
     //       let row = tbody.insertRow();

     //       row.innerHTML = `
    //         <td>${universitas}</td>
    //         <td>${jurusan}</td>
    //         <td>${tahun}</td>
    //         <td><button class="btn btn-danger" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>
    //     `;
     //   }

     //   function savePendidikanToCache(universitas, jurusan, tahun) {
     //       let pendidikanList = JSON.parse(localStorage.getItem('pendidikanList')) || [];
     //       pendidikanList.push({
     //           universitas,
     //           jurusan,
     //           tahun
     //       });
     //       localStorage.setItem('pendidikanList', JSON.stringify(pendidikanList));
     //   }

     //   function loadPendidikanFromCache() {
     //       let pendidikanList = JSON.parse(localStorage.getItem('pendidikanList')) || [];
     //       pendidikanList.forEach(pendidikan => {
     //           addPendidikanToTable(pendidikan.universitas, pendidikan.jurusan, pendidikan.tahun);
     //       });
     //   }

     //   function deleteRow(button) {
     //       let row = button.parentElement.parentElement;
     //       let index = Array.from(row.parentElement.children).indexOf(row);
     //       row.remove();

     //       let pendidikanList = JSON.parse(localStorage.getItem('pendidikanList')) || [];
     //       pendidikanList.splice(index, 1);
     //       localStorage.setItem('pendidikanList', JSON.stringify(pendidikanList));
     //   }

     //   function clearForm() {
     //       document.getElementById('nama_universitas').value = '';
     //       document.getElementById('jurusan').value = '';
     //       document.getElementById('tahun_lulus').value = '';
     //   }
 </script>
