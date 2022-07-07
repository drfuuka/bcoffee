@extends('admin.layouts.index')

@section('title', 'Tambah Data Produk')

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
                    <li class="breadcrumb-item active">Tambah</li>
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
                        <h4 class="card-title">Tambah Produk</h4>
                        <p class="card-title-desc">
                            Tambah data produk pada BCoffee.
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

                <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="nama-produk">Nama Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama produk" name="nama_produk" id="nama-produk" value="{{ old('nama_produk') }}">
                                    @error('nama_produk')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mt-3 mt-lg-0">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" placeholder="Masukkan harga" name="harga" id="harga" value="{{ old('harga') }}">
                                    @error('harga')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <label for="jenis">Pilih Jenis</label>
                                    <select name="jenis" id="jenis" class="form-select">
                                        <option selected disabled>Pilih jenis</option>
                                        @foreach ($jenisProduk as $item)
                                            <option value="{{ $item['jenis'] }}">{{ $item['jenis'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                    @error('foto')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="populer">Jadikan Produk Populer?</label>
                                    <select name="populer" id="populer" class="form-select @error('populer') is-invalid @enderror">
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    @error('populer')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3" id="populer-order-container">
                                    <label for="populer-order">Pilih Urutan Tampilan Populer</label>
                                    <select name="populer_order" id="populer-order" class="form-select @error('populer_order') is-invalid @enderror">
                                        <option selected disabled>Pilih Urutan</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    @error('populer_order')
                                        <span class="text-danger mt-2 mb-2">{{ $message }}</span>
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
@section('scripts')
    <script>
        $("select#populer").on('change', function() {
            if($(this).val() == 1) {
                $("#populer-order-container").show();
                $("#populer-order-container select").val('1');
            } else if ($(this).val() == 2) {
                $("#populer-order-container").hide();
                $("#populer-order-container select").val('');
            }
        });
    </script>
@endsection
