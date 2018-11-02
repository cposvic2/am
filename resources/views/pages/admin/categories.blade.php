@extends('layouts.admin')

@section('title')
Hotels
@endsection

@section('head')
@endsection

@section('content')
<h1>{{ $categories->first()->brand->name }} Categories</h1>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>Category</th>
				<th>Order Number</th>
				<th>Points</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
@foreach ($categories as $category)
			<tr>
				<td>{{ $category->name }}</td>
				<td>{{ $category->order }}</td>
				<td>{{ $category->points }}</td>
				<td><button type="button" class="btn btn-secondary category-modal-btn" data-target="#categoryUpdateModal" data-category="{{ $category->id }}">Edit</button></td>
			</tr>
@endforeach
		</tbody>
	</table>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
@component('modals.category', ['brand' => $brand])@endcomponent
		</div>
	</div>
</div>

<div class="modal fade" id="categoryUpdateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>
@endsection

@section('afterBody')
<script type="text/javascript">
	
$('.category-modal-btn').on("click", function () {
	var $button = $(this);
	var modal = $button.data('target');
	var $modal = $(modal);
	var category = $button.data('category');

   $.ajax({
		url: '{{ url("/admin/brands/{$category->brand->id}") }}/categories/'+category+"/edit",
		method: 'get',
		success: function(result){
			$modal.find('.modal-content').html(result['view']);
			$modal.modal('show');
		},
	});

});

</script>
@endsection