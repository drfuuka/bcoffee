@extends('layouts.index')

@section('title', 'Promo')

@section('content')
<section id="promo-detail">
	<div class="container">
		<h1 class="text-center fw-bold">Promo Minggu Ini</h1>
		<div class="row mt-5">
			@foreach ($promo as $item)
				<div class="col-md-3 mt-3">
					<div class="img-container rounded">
						<img src="{{ asset('storage/'.$item['foto']) }}" alt="" class="img-fluid">
					</div>
					<div class="mt-3 text-center">
						<h4 class="fw-bold">{{$item['judul_promo']}}</h4>
						<p>{{$item['keterangan']}}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endsection