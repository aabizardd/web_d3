@extends('Admin.Auth.layout')
@section('content')
    <section class="login-block">
        <div class="container-fluid">

            <img src="{{ asset('/') }}template/assets/logo/ekon-logo.png" alt="logo.png" width="180" class="d-flex m-2">

            <div class="row">
                <div class="col-sm-12">



                    <form action="{{ route('login') }}" class="md-float-material form-material" method="POST">
                        @csrf
                        <div class="text-center">

                            <img src="{{ asset('/') }}template/assets/logo/logo-white.png" alt="logo.png" width="300">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign In</h3>
                                    </div>
                                </div>

                                <p class="text-muted text-center p-b-5">Masuk dengan menggunakan akun anda yang terdaftar
                                </p>


                                @if ($errors->any())
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                    <span class="form-bar"></span>
                                    <label class="form-label float-label">Email</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    <span class="form-bar"></span>
                                    <label class="form-label float-label">Password</label>

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror


                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button type="submit"
                                                class="btn btn-primary btn-md waves-effect text-center m-b-20">LOGIN</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

        </div>

    </section>
@endsection
