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
				<button class="btn btn-primary">Lihat semua promo</button>
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
	</div>
</section>

<section id="best-seller">
	<div class="container">
		<h1 class="display-4 fw-bold mb-5 text-center">Produk Terpopuler</h1>
		<div class="row justify-content-center">
			{{-- Start : Item --}}
			<div class="col-10 col-lg-4">
				<div class="card text-primary">
					<img src="{{ asset('images/featured-coffee/1.png') }}" alt="" class="img-fluid item">
					<div class="col-8">
						<div class="p-3">
							<div class="bg-primary text-white d-inline p-3 py-2 rounded-pill">
								<span>Kopi</span>
							</div>
						</div>
						<div class="card-body">
							<h3 class="fw-bold">Kopi Sejuta Umat</h3>
							<span class="fw-bold">Rp.19K</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-10 col-lg-4 mt-5 mt-lg-0">
				<div class="card text-primary">
					<img src="{{ asset('images/featured-coffee/1.png') }}" alt="" class="img-fluid item">
					<div class="col-8">
						<div class="p-3">
							<div class="bg-primary text-white d-inline p-3 py-2 rounded-pill">
								<span>Kopi</span>
							</div>
						</div>
						<div class="card-body">
							<h3 class="fw-bold">Kopi Sejuta Umat</h3>
							<span class="fw-bold">Rp.19K</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-10 col-lg-4 mt-5 mt-lg-0">
				<div class="card text-primary">
					<img src="{{ asset('images/featured-coffee/1.png') }}" alt="" class="img-fluid item">
					<div class="col-8">
						<div class="p-3">
							<div class="bg-primary text-white d-inline p-3 py-2 rounded-pill">
								<span>Kopi</span>
							</div>
						</div>
						<div class="card-body">
							<h3 class="fw-bold">Kopi Sejuta Umat</h3>
							<span class="fw-bold">Rp.19K</span>
						</div>
					</div>
				</div>
			</div>
			{{-- End : Item --}}
		</div>
	</div>
	</div>
</section>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1 class="fw-bold">B'Coffee</h1>
				<p class="mt-3 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci iste dignissimos cumque eaque, corporis quas hic quo fuga? Cum dolore, assumenda earum ex magni est expedita. Voluptate, adipisci nulla?</p>
				<div class="d-flex gap-3">
					<div class="social-container">
						<a href="#"><i class="bi bi-facebook"></i></a>
					</div>
					<div class="social-container">
						<a href="#"><i class="bi bi-instagram"></i></a>
					</div>
					<div class="social-container">
						<a href="#"><i class="bi bi-facebook"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-8 mt-5 mt-md-0">
				<div class="px-0 px-md5">
					<h4 class="fw-bold">Our Location</h4>
					<p class="mt-3">Jl. Pakubuwono VI No.107, RT.11/RW.2, Gunung, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12120</p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0805094342977!2d106.82498632926583!3d-6.636923751361836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c912cfd7966f%3A0x57f1fe430aac22b6!2sB&#39;Coffee!5e0!3m2!1sid!2sid!4v1656672691171!5m2!1sid!2sid" style="border:0; width: 100%; height: 350px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
</footer>

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