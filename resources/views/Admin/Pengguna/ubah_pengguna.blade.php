<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Ubah Pengguna Aplikasi</h5>

    </div>


    <div class="card-block">

        <form action="{{ route('admin.ubah_pengguna', $pg->id) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group mb-4">
                        <label for="">Nama Lengkap</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" placeholder="Nama Lengkap" value="{{ $pg->name }}" required>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role"
                            required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="1" {{ $pg->role == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $pg->role == 2 ? 'selected' : '' }}>PIC Asdep</option>
                            <!-- Tambahkan opsi lain jika diperlukan -->
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div id="add_asdep">

                    </div>


                </div>

                <div class="col-lg-6">

                    <div class="form-group mb-4">
                        <label for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" placeholder="Email" value="{{ $pg->email }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                            name="password" id="password" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <span class="text-danger" style="font-size: 12px">
                            *Isi password jika ingin diubah
                        </span>
                    </div>



                </div>
            </div>

            <button class="btn btn-primary w-100">
                Ubah Pengguna
            </button>

        </form>

    </div>
</div>

@section('addScript')
    <script>
        $(document).ready(function() {
            $("#role").change(function() {

                id_role = $('#role').val()
                // alert(id_role)

                if (id_role == 2) {

                    var input_old_img = `<div class="form-group mb-4">
                        <label for="asdep">Asdep</label>
                        <select class="form-control @error('asdep') is-invalid @enderror" name="asdep" id="asdep"
                            required>
                            <option value="" disabled selected>Pilih Asdep</option>
                            <option value="1" {{ $pg->asdep == '1' ? 'selected' : '' }}>Asdep 1</option>
                            <option value="2" {{ $pg->asdep == '2' ? 'selected' : '' }}>Asdep 2</option>
                            <option value="3" {{ $pg->asdep == '3' ? 'selected' : '' }}>Asdep 3</option>
                            <option value="4" {{ $pg->asdep == '4' ? 'selected' : '' }}>Asdep 4</option>
                            <option value="5" {{ $pg->asdep == '5' ? 'selected' : '' }}>Asdep 5</option>
                            <!-- Tambahkan opsi lain jika diperlukan -->
                        </select>
                        @error('asdep')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> `

                    $("#add_asdep").empty().append(input_old_img);


                } else {
                    $("#add_asdep").empty()
                }


            });
        });
    </script>

    <script>
        $(document).ready(function() {


            id_role = $('#role').val()
            // alert(id_role)

            if (id_role == 2) {

                var input_old_img = `<div class="form-group mb-4">
                    <label for="asdep">Asdep</label>
                    <select class="form-control @error('asdep') is-invalid @enderror" name="asdep" id="asdep"
                        required>
                        <option value="" disabled selected>Pilih Asdep</option>
                        <option value="1" {{ $pg->asdep == '1' ? 'selected' : '' }}>Asdep 1</option>
                        <option value="2" {{ $pg->asdep == '2' ? 'selected' : '' }}>Asdep 2</option>
                        <option value="3" {{ $pg->asdep == '3' ? 'selected' : '' }}>Asdep 3</option>
                        <option value="4" {{ $pg->asdep == '4' ? 'selected' : '' }}>Asdep 4</option>
                        <option value="5" {{ $pg->asdep == '5' ? 'selected' : '' }}>Asdep 5</option>
                        <!-- Tambahkan opsi lain jika diperlukan -->
                    </select>
                    @error('asdep')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> `

                $("#add_asdep").empty().append(input_old_img);


            } else {
                $("#add_asdep").empty()
            }


        });
    </script>
@endsection
