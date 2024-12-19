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
                     <th>Nama Divisi</th>
                     <th>Kepala Divisi</th>
                     <th>Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($divisi as $item)
                     <tr>

                         <td>
                             {{ $item->nama_divisi }}
                         </td>

                         <td>
                             {{ $item->kepala_divisi }}
                         </td>

                         <td style="width: 10px">

                             <a href="?page=update_divisi&id={{ $item->id }}" class="btn btn-warning btn-sm">
                                 <i class="fas fa-pencil">
                                 </i> Update
                             </a>

                             <a href="?page=list_pegawai&id={{ $item->id }}" class="btn btn-info btn-sm">
                                 <i class="fas fa-info">
                                 </i> Detail
                             </a>

                             <a href="{{ route('admin.delete_divisi', $item->id) }}" class="btn btn-danger btn-sm">
                                 <i class="fas fa-trash">
                                 </i> Delete
                             </a>


                         </td>

                     </tr>
                 @endforeach
             </tbody>

         </table>
     </div>
 </div>
