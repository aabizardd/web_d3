 <div class="card-block">

     @if (Session::has('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ Session::get('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif


     <div class="dt-responsive table-responsive">
         <table id="order-table" class="table table-striped table-bordered nowrap">
             <thead>
                 <tr>
                     <th>Foto</th>
                     <th>Nama Pegawai</th>
                     <th>Golongan</th>
                     <th>Jabatan</th>
                     <th>Aksi</th>
                 </tr>

             </thead>
             <tbody>
                 @foreach ($list_pegawai as $item)
                     <tr>
                         <td>
                             @if ($item->foto_pegawai)
                                 <img src="{{ asset('storage/' . $item->foto_pegawai) }}" alt="Foto Pegawai"
                                     width="400" height="250">
                             @else
                                 Tidak Ada Foto
                             @endif
                         </td>
                         <td>{{ $item->nama_pegawai }}</td>
                         <td>{{ $item->golongan }}</td>
                         <td>{{ $item->jabatan }}</td>
                         <td>
                             <a href="?page=update_pegawai&id={{ $item->id }}"
                                 class="btn btn-sm btn-info w-100">Update</a> <br>
                             <form
                                 action="{{ route('admin.pegawai.hapus', ['id' => $item->id, 'asdep' => $_GET['id']]) }}"
                                 method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="mt-2 btn btn-sm btn-danger w-100"
                                     onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                             </form>
                             <br>
                         </td>
                     </tr>
                 @endforeach
             </tbody>

         </table>
     </div>


 </div>
