@section('title', 'Daftar')

@extends('admin.auth.layouts.index')

@section('content')
<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card overflow-hidden">
        <div class="bg-secondary bg-soft">
            <div class="row">
                <div class="col-7">
                    <div class="text-secondary p-4">
                        <h5 class="text-secondary">Welcome Back !</h5>
                        <p>Sign in to continue to Skote.</p>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src="{{ asset('admin/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="auth-logo">
                <a href="/" class="auth-logo-dark">
                    <div class="avatar-md profile-user-wid mb-4">
                        <span class="avatar-title rounded-circle" style="background-color: #efedde;">
                            <img src="{{ asset('images/logo/main.png') }}" alt="" class="rounded-circle" height="34">
                        </span>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <form method="POST" action="{{ route('admin.register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama pengguna" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan nama pengguna" name="username" value="{{ old('username') }}" autocomplete="username" required autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="row">

                            <div class="col-6">
                                <label for="password" class="form-label">
                                    Kata Sandi
                                </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Masukkan kata sandi" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="password-confirm" class="form-label">
                                    Konfirmasi Kata Sandi
                                </label>
                                
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi kata sandi" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-secondary waves-effect waves-light" type="submit">Daftar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="mt-5 text-center">

        <div>
            <p>© 2022 BCoffee. Crafted with <i class="mdi mdi-heart text-danger"></i> by Fuuka</p>
        </div>
    </div>

</div>
@endsection
