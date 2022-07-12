@extends('layouts.index')

@section('title', 'Promo')

@section('content')
<section id="menu-detail">
	<div class="container">
		<h1 class="text-center fw-bold">BCoffee Menu</h1>
		<div class="p-5 pb-0 mb-5">
			<div class="d-flex p-3 rounded" style="background: #2f2620;">
				<span class="mb-0">Kategori Menu</span>
				<div class="d-flex gap-4 ms-auto align-self-center" id="categories-container">
					<button class="btn btn-sm fw-bold shadow-lg text-white" id="all" style="background: #3f3834" onclick="anu('all')">Semua</button>
					@foreach ($jenis as $item)
						<button class="btn btn-sm shadow-lg text-white" id="{{$item->jenis}}" style="background: #3f3834" onclick="anu('{{$item->jenis}}')">{{$item->jenis}}</button>
					@endforeach
				</div>
			</div>
		</div>
		<div class="row" id="content">
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$("#all").trigger('click');
	});

	$("#categories-container button").on("click", function() {
		var val = $(this).attr("id");
		$("#categories-container button").removeClass('btn-secondary fw-bold');
		$(this).addClass('btn-secondary fw-bold');
		$.ajax({
			url: '{!! url()->current() !!}',
			type: 'post',
			dataType : 'html',
			data: {
				"_token": "{{ csrf_token() }}",
				'jenis' : val
			},
			beforeSend : function() {
				$("#content").slideUp();
			},
			success : function(data) {
				$("#content").html(data);
			},
			complete : function() {
				$("#content").slideDown();
			}
		});
	});
	
</script>
@endsection