@extends('admin.layouts.index')

@section('title', 'Ubah Data Jenis Produk')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Jenis Produk</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.master.jenis-produk.index') }}">Jenis Produk</a></li>
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
                        <h4 class="card-title">Ubah Jenis Produk <b class="text-primary">{{ $jenisProduk->jenis }}</b></h4>
                        <p class="card-title-desc">
                            Ubah data jenis produk pada BCoffee.
                        </p>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-light" href="{{ route('admin.master.jenis-produk.index') }}"><i class="bx bx-arrow-back"></i> Kembali</a>
                    </div>
                </div>

                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('admin.master.jenis-produk.update', $jenisProduk->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="jenis">Nama Jenis Produk</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" placeholder="Masukkan nama jenis produk" name="jenis" id="jenis" value="{{ $jenisProduk->jenis }}">
                                    @error('jenis')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mt-3 mt-lg-0">
                                    <label for="tampilkan">Tampilkan</label>
                                    <select name="tampilkan" id="" class="form-select @error('tampilkan') is-invalid @enderror">
                                        <option value="1" {{ $jenisProduk->tampilkan == 1 ? 'selected' : '' }}>Ya</option>
                                        <option value="2" {{ $jenisProduk->tampilkan == 2 ? 'selected' : '' }}>Tidak</option>
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
