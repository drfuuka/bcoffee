@section('title', 'Login')

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
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan nama pengguna" name="username" value="{{ old('username') }}">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="input-group auth-pass-inputgroup">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi">
                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-secondary waves-effect waves-light" type="submit">Log In</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="mt-5 text-center">

        <div>
            <p>© <script>
                    document.write(new Date().getFullYear())
                </script> BCoffee. Crafted with <i class="mdi mdi-heart text-danger"></i> by Fuuka</p>
        </div>
    </div>

</div>
@endsection
