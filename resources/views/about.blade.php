@extends('layouts.index')

@section('title', 'About')

@section('content')
<section class="mt-5">
	<div class="container">
		<style>
			img {
				max-width: 100%;
				height: auto !important;
			}
		</style>
		@foreach ($about as $item)
			{!! $item['description'] !!}
		@endforeach
	</div>
</section>
@endsection