@extends('admin.layouts.index')

@section('title', 'Ubah Data Produk')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Produk</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.produk.index') }}">Produk</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        <h4 class="card-title">Ubah Produk <b class="text-primary">{{ $produk['nama_produk'] }}</b></h4>
                        <p class="card-title-desc">
                            Ubah data produk pada BCoffee.
                        </p>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-light" href="{{ route('admin.produk.index') }}"><i class="bx bx-arrow-back"></i> Kembali</a>
                    </div>
                </div>

                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('admin.produk.update', $produk['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="row">
                                <div class="col-lg-7">
                                    <label for="nama-produk">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Masukkan nama produk" name="nama_produk" id="nama-produk" value="{{ $produk['nama_produk'] }}">
                                    @error('nama_produk')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 mt-3 mt-lg-0">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan harga" name="harga" id="harga" value="{{ $produk['harga'] }}">
                                    @error('harga')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-2 mt-3 mt-lg-0">
                                    <label for="tampilkan">Tampilkan</label>
                                    <select name="tampilkan" id="" class="form-select @error('tampilkan') is-invalid @enderror">
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    @error('tampilkan')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-7 mt-3">
                                    <label for="jenis">Pilih Jenis</label>
                                    <select name="jenis" class="form-select" id="jenis">
                                        <option value="" selected disabled>Pilih data</option>
                                        @foreach ($jenisProduk as $item)
                                            <option value="{{ $item['jenis'] }}" {{ $item['jenis'] == $produk['jenis'] ? 'selected' : '' }}>{{ $item['jenis'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-5 mt-3">
                                    <label for="foto">Foto</label>
                                    <div class="d-flex gap-3">
                                        <div class="rounded overflow-hidden" style="width: 39px">
                                            <a href="{{ asset('storage/'.$produk['foto']) }}" target="_blank">
                                                <img src="{{ asset('storage/'.$produk['foto']) }}" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                        <small class="text-center">Current Image</small>
                                        <div class="w-100">
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto">
                                            <small>Ukuran Maksimal 7.5Mb, pastikan foto tidak memiliki background.</small>
                                        </div>
                                    </div>
                                    @error('foto')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="d-flex mt-3">
                                <button class="btn btn-primary ms-auto" type="submit">Ubah</button>
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
