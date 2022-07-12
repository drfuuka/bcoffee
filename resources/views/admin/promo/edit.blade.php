@extends('admin.layouts.index')

@section('title', 'Ubah Data Promo')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Promo</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.promo.index') }}">Promo</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="">
                        <h4 class="card-title">Ubah Promo</h4>
                        <p class="card-title-desc">
                            Ubah data promo pada BCoffee.
                        </p>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-light" href="{{ route('admin.promo.index') }}"><i class="bx bx-arrow-back"></i> Kembali</a>
                    </div>
                </div>

                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('admin.promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="row">
                                <div class="col-lg-5">
                                    <label for="judul-promo">Judul Promo</label>
                                    <input type="text" class="form-control" placeholder="Masukkan judul promo" name="judul_promo" id="judul-promo" value="{{ $promo->judul_promo }}">
                                    @error('judul_promo')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-7 mt-3 mt-lg-0">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan keterangan" name="keterangan" id="keterangan" value="{{ $promo->keterangan }}">
                                    @error('keterangan')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <label for="foto">Foto</label>
                                    <div class="d-flex gap-3">
                                        <div class="rounded overflow-hidden" style="width: 39px">
                                            <a href="{{ asset('storage/'.$promo->foto) }}" target="_blank">
                                                <img src="{{ asset('storage/'.$promo->foto) }}" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                        <small class="text-center">Current Image</small>
                                        <div class="w-100">
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto">
                                            <small>Ukuran Maksimal 7.5Mb, pastikan rasio foto 1:1</small>
                                        </div>
                                    </div>
                                    @error('foto')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <label for="tampilkan">Tampilkan</label>
                                    <select name="tampilkan" id="" class="form-select @error('tampilkan') is-invalid @enderror">
                                        <option value="1" {{ $promo->tampilkan == 1 ? 'selected' : '' }}>Ya</option>
                                        <option value="2" {{ $promo->tampilkan == 2 ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                    @error('tampilkan')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="d-flex mt-3">
                                <button class="btn btn-primary ms-auto" type="submit">Simpan</button>
                            </div>
    
                        </div>
                    </div>
                </form>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
