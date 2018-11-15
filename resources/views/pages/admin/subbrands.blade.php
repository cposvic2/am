@extends('layouts.admin')

@section('title')
Subbrands
@endsection

@section('head')
@endsection

@section('content')
<h1>{{ $subbrands->first()->brand->name }} Subbrands</h1>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>Subbrand</th>
				<th>Order Number</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
@foreach ($subbrands as $subbrand)
			<tr>
				<td>{{ $subbrand->name }}</td>
				<td>{{ $subbrand->order }}</td>
				<td><button type="button" class="btn btn-secondary subbrand-modal-btn" data-target="#subbrandUpdateModal" data-subbrand="{{ $subbrand->id }}">Edit</button></td>
			</tr>
@endforeach
		</tbody>
	</table>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubbrandModal">Add Subbrand</button>

<div class="modal fade" id="addSubbrandModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
@component('modals.subbrand', ['brand' => $brand])@endcomponent
		</div>
	</div>
</div>

<div class="modal fade" id="subbrandUpdateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>
@endsection

@section('afterBody')
<script type="text/javascript">
	
$('.subbrand-modal-btn').on("click", function () {
	var $button = $(this);
	var modal = $button.data('target');
	var $modal = $(modal);
	var subbrand = $button.data('subbrand');

   $.ajax({
		url: '{{ url("/admin/brands/{$subbrand->brand->id}") }}/subbrands/'+subbrand+"/edit",
		method: 'get',
		success: function(result){
			$modal.find('.modal-content').html(result['view']);
			$modal.modal('show');
		},
	});

});

</script>
@endsection