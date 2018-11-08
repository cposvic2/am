@extends('layouts.admin')

@section('title')
Brands
@endsection

@section('head')
@endsection

@section('content')
<h1>Brands</h1>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>Brand</th>
				<th>Subbrands</th>
				<th>Categories</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
@foreach ($brands as $brand)
			<tr>
				<td>{{ $brand->name }}</td>
				<td><a role="button" class="btn btn-secondary" href="{{ url("/admin/brands/{$brand->id}/subbrands/") }}">Subbrands</a></td>
				<td><a role="button" class="btn btn-secondary" href="{{ url("/admin/brands/{$brand->id}/categories/") }}">Categories</a></td>
				<td><button type="button" class="btn btn-secondary brand-modal-btn" data-target="#brandUpdateModal" data-brand="{{ $brand->id }}">Edit</button></td>
			</tr>
@endforeach
		</tbody>
	</table>
</div>

<div class="modal fade" id="brandUpdateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>
@endsection

@section('afterBody')
<script type="text/javascript">
	
$('.brand-modal-btn').on("click", function () {
	var $button = $(this);
	var modal = $button.data('target');
	var $modal = $(modal);
	var brand = $button.data('brand');

   $.ajax({
		url: '{{ url("/admin/brands") }}/'+brand+"/edit",
		method: 'get',
		success: function(result){
			$modal.find('.modal-content').html(result['view']);
			$modal.modal('show');
		},
	});

});

</script>
@endsection