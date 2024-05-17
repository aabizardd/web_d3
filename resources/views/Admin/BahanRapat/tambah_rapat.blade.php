<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Tambah Informasi Rapat</h5>

    </div>


    <div class="card-block">

        <form action="{{ route('admin.bahan_rapat') }}" method="POST">
            @csrf

            <div class="row">



                <div class="col-lg-6">

                    <img src="https://indooffice.co.id/wp-content/uploads/2023/05/Mengoptimalkan-Ruang-Rapat-untuk-Meningkatkan-Efektivitas-Rapat-Bisnis.png"
                        alt="" width="100%" height="350" id="preview_img" class="mb-4"
                        style="border-radius: 10px">

                </div>

                <div class="col-lg-6">



                    <div class="form-group mb-3">
                        <label for="">Nama Rapat</label>
                        <input class="form-control @error('nama_rapat') is-invalid @enderror" type="text"
                            name="nama_rapat" id="nama_rapat" placeholder="Nama Rapat" value="{{ old('nama_rapat') }}"
                            required>

                        <i class="text-danger" style="font-size: 12px">*Contoh: Rapat BBM 191/2014 Lanjutan</i>

                        @error('nama_rapat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Tanggal Rapat</label>
                        <input class="form-control @error('tanggal_rapat') is-invalid @enderror" type="datetime-local"
                            name="tanggal_rapat" id="tanggal_rapat" placeholder="Tanggal Rapat"
                            value="{{ old('tanggal_rapat') }}" required>



                        @error('tanggal_rapat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if (auth()->user()->asdep != 0)
                        <div class="form-group mb-3">
                            <label for="">Folder</label>
                            <input class="form-control" type="text" value="{{ asdep(auth()->user()->asdep) }}"
                                disabled required>

                            @error('id_folder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <input type="hidden" value="{{ auth()->user()->asdep }}" name="id_folder">
                    @else
                        <div class="form-group mb-3">
                            <label for="">Folder</label>
                            {{-- <input class="form-control @error('tanggal_rapat') is-invalid @enderror"
                                type="datetime-local" name="tanggal_rapat" id="tanggal_rapat" placeholder="Folder"
                                value="{{ old('tanggal_rapat') }}" required> --}}
                            <select name="id_folder" id="id_folder"
                                class="form-select @error('id_folder') is-invalid @enderror" required>
                                <option value="" selected disabled>---Pilih Folder---</option>
                                @foreach ($folder as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama_folder }}
                                    </option>
                                @endforeach

                            </select>

                            @error('id_folder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif






                </div>
            </div>

            <button class="btn btn-primary w-100">
                Tambah Informasi Rapat
            </button>

        </form>

    </div>
</div>

@section('addScript')
@endsection
