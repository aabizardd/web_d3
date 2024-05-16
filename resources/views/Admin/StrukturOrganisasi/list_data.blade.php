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
                     <th>Strukur</th>
                     <th>Asisten Deputi</th>
                     <th>Tanggal Perubahan</th>
                     <th>Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($renstra as $item)
                     <tr>
                         <td style="width: 300px">
                             <img src="{{ Storage::url($item->gambar) }}" class="card-img" alt="{{ $item->gambar }}"
                                 style="width: 100%;height: 250px;">
                         </td>
                         <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">
                             {{ asdep($item->asdep) }}
                         </td>

                         <td style="width: 20px">{{ $item->updated_at }}</td>


                         <td style="width: 10px">

                             <a href="?page=update_struktur&id={{ $item->id }}" class="btn btn-warning btn-sm">
                                 <i class="fas fa-pencil">
                                 </i> Update
                             </a>


                         </td>

                     </tr>
                 @endforeach
             </tbody>

         </table>
     </div>
 </div>
