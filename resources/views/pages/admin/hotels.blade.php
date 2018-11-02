@extends('layouts.admin')

@section('title')
Hotels
@endsection

@section('head')
@endsection

@section('content')
<h1>Hotels</h1>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>Hotel</th>
				<th>Address</th>
				<th>Brand</th>
				<th>Subbrand</th>
				<th>Category</th>
				<th>Points</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
@foreach ($hotels as $hotel)
			<tr>
				<td>{{ $hotel->name }}</td>
				<td>{{ $hotel->address }}</td>
				<td>{{ $hotel->brand->name }}</td>
				<td>{{ $hotel->subbrand->name }}</td>
				<td>{{ $hotel->category->name }}</td>
				<td>{{ $hotel->category->points }}</td>
				<td><button type="button" class="btn btn-secondary hotel-modal-btn" data-target="#hotelUpdateModal" data-hotel="{{ $hotel->id }}">Edit</button></td>
			</tr>
@endforeach
		</tbody>
	</table>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHotelModal">Add Hotel</button>
<button type="button" class="btn btn-primary" id="regenerate-hotels" >Regenerate Hotel List</button>

<div class="modal fade" id="addHotelModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
@component('modals.hotel', ['brands' => $brands])@endcomponent
		</div>
	</div>
</div>

<div class="modal fade" id="hotelUpdateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>
@endsection

@section('afterBody')
<script type="text/javascript">
	
$('.hotel-modal-btn').on("click", function () {
	var $button = $(this);
	var modal = $button.data('target');
	var $modal = $(modal);
	var hotel = $button.data('hotel');

   $.ajax({
		url: '{{ url("/admin/hotels") }}/'+hotel+"/edit",
		method: 'get',
		success: function(result){
			$modal.find('.modal-content').html(result['view']);
			$modal.modal('show');
		},
	});

});

</script>
@endsection