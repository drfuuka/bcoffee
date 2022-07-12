@extends('layouts.index')

@section('title', 'Home')

@section('content')

<section id="header">
	<div id="carousel-header" class="carousel slide carousel-fade" data-bs-ride="false">
		<div class="carousel-indicators">
		  <button type="button" data-bs-target="#carousel-header" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		  <button type="button" data-bs-target="#carousel-header" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  <button type="button" data-bs-target="#carousel-header" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img src="{{ asset('images/header/1.jpg') }}" class="d-block w-100" alt="...">
			<div class="carousel-caption">
			  <h5>Biarkan dirimu menikmati yang terbaik!</h5>
			  <h1 class="display-2 fw-bold">Rasakan kenikmatan secangkir <br> kopi yang sempurna</h1>
			  <button class="btn btn-outline-light mt-3 d-none d-md-block mx-auto">Tentang Kami</button>
			  <button class="btn btn-sm btn-outline-light mt-3 d-block d-md-none mx-auto">Tentang Kami</button>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="{{ asset('images/header/2.jpg') }}" class="d-block w-100" alt="...">
			<div class="carousel-caption">
			  <h5>Biarkan dirimu menikmati yang terbaik!</h5>
			  <h1 class="display-2 fw-bold">Rasakan kenikmatan secangkir <br> yang sempurna</h1>
			  <button class="btn btn-outline-light mt-3 d-none d-md-block mx-auto">Tentang Kami</button>
			  <button class="btn btn-sm btn-outline-light mt-3 d-block d-md-none mx-auto">Tentang Kami</button>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="{{ asset('images/header/3.jpg') }}" class="d-block w-100" alt="...">
			<div class="carousel-caption">
			  <h5>Biarkan dirimu menikmati yang terbaik!</h5>
			  <h1 class="display-2 fw-bold">Rasakan kenikmatan secangkir <br> yang sempurna</h1>
			  <button class="btn btn-outline-light mt-3 d-none d-md-block mx-auto">Tentang Kami</button>
			  <button class="btn btn-sm btn-outline-light mt-3 d-block d-md-none mx-auto">Tentang Kami</button>
			</div>
		  </div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carousel-header" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carousel-header" data-bs-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Next</span>
		</button>
	</div>
</section>

<section id="promo">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 align-self-center">
				<h3 class="fw-bold">Promo Mingguan!</h3>
				<p>Baru! Minuman Klepon Series untuk menemani aktivitas kamu.</p>
				<a href="{{ route('promo') }}" class="btn btn-primary">Lihat semua promo</a>
			</div>
			<div class="col-md-6 align-self-center mt-5 mt-md-0">
				<div class="row justify-content-center">
					<div class="col-6">
						<div class="promo-container">
							<img src="{{ asset('images/promo-featured/1.jpg') }}" alt="" class="img-fluid">
						</div>
					</div>
					<div class="col-6">
						<div class="promo-container">
							<img src="{{ asset('images/promo-featured/2.jpg') }}" alt="" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="featured">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-4 align-self-center">
				<h1 class="display-4 fw-bold mb-5">Kita adalah <br> manusia dan <br> kopi</h1>
				<p>Jika kamu selalu memikirkan tentang cangkir selanjutnya, lengkapi dengan Kopi terbaik BCoffee. Produk kopi kami terjamin 100% natural dari pembenihan sampai dengan proses menuju biji kopi terbaik.</p>
			</div>
			<div class="col-sm-6 col-lg-4 align-self-center mt-5">
				<div class="img-container owl-carousel owl-theme">
					<img src="{{ asset('images/featured-coffee/1.png') }}" alt="" class="img-fluid item">
					<img src="{{ asset('images/featured-coffee/1.png') }}" alt="" class="img-fluid item">
					<img src="{{ asset('images/featured-coffee/1.png') }}" alt="" class="img-fluid item">
				</div>
			</div>
			<div class="col-sm-6 col-lg-4 align-self-center">
				<div class="d-flex flex-column gap-3 gap-md-5">
					{{-- Start : Item --}}
					<div class="d-flex gap-3 justify-content-start ms-0 ms-md-5">
						<div class="icon-container">
							<i class="bi bi-hand-thumbs-up"></i>
						</div>
						<div class="align-self-center">
							<h5 class="fw-bold">Blend Original</h5>
							<p class="text-warning">Lorem ipsum sir dolor amet</p>
						</div>
					</div>
					<div class="d-flex gap-3 justify-content-start ms-0 ms-md-5">
						<div class="icon-container">
							<i class="bi bi-hand-thumbs-up"></i>
						</div>
						<div class="align-self-center">
							<h5 class="fw-bold">Blend Original</h5>
							<p class="text-warning">Lorem ipsum sir dolor amet</p>
						</div>
					</div>
					<div class="d-flex gap-3 justify-content-start ms-0 ms-md-5">
						<div class="icon-container">
							<i class="bi bi-hand-thumbs-up"></i>
						</div>
						<div class="align-self-center">
							<h3 class="fw-bold">Santai & Nikmati!</h3>
						</div>
					</div>
					{{-- End : Item --}}
				</div>
			</div>
		</div>
	</div>
</section>

<section id="best-seller">
	<div class="container">
		<h1 class="display-4 fw-bold mb-5 text-center">Produk Terpopuler</h1>
		<div class="row justify-content-center">
			{{-- Start : Item --}}
			@foreach ($bestSeller as $item)
				<div class="col-10 col-lg-4 d-flex">
					<div class="card text-primary w-100">
						<img src="{{ asset('storage/'.$item['foto']) }}" alt="" class="img-fluid">
						<div class="col-8">
							<div class="p-3">
								<div class="bg-primary text-white d-inline p-3 py-2 rounded-pill">
									<span>{{ $item['jenis'] }}</span>
								</div>
							</div>
							<div class="card-body">
								<h5 class="fw-bold">{{ $item['nama_produk'] }}</h5>
								<span class="fw-bold">Rp.{{ $item['harga'] }}</span>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	</div>
</section>

<script>
	$(document).ready(function(){
		$('.owl-carousel').owlCarousel({
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			autoplaySpeed: 1000,
			loop:true,
			margin:500,
			items:1,
			dots:false
		})
	});
</script>
@endsection