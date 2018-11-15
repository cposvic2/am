@extends('layouts.admin')

@section('title')
Hotels
@endsection

@section('head')
@endsection

@section('content')
<h1>Hotels</h1>
<div class="pb-3">
	<p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#searchForm" aria-expanded="false" aria-controls="searchForm">Show Search</button></p>
	<div class="collapse" id="searchForm">
		<form action="{{ url("/admin/hotels") }}" method="get">
			<div class="form-group">
				<label for="name">Search</label>
				<input type="text" class="form-control" name="search" id="search" placeholder="Search" value="">
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label class="col-form-label">Brand</label>
				    <select class="form-control ajax-changer" id="search-hotel" name="brand" id="brand">
				    	@component('components.options', ['things' => $brands])@endcomponent
				    </select>
				</div>
				<div class="form-group col-md-4">
					<label class="col-form-label">Subbrand</label>
				    <select class="form-control ajax-change" name="subbrand" id="subbrand" data-action="subbrand" data-target="#search-hotel">
				    	@component('components.options', ['things' => $brands->first()->subbrands])@endcomponent
				    </select>
				</div>
				<div class="form-group col-md-4">
					<label class="col-form-label">Category</label>
				    <select class="form-control ajax-change" name="category" id="category" data-action="category" data-target="#search-hotel">
				    	@component('components.options', ['things' => $brands->first()->categories])@endcomponent
				    </select>
				</div>
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" name="nolatlng" id="nolatlng" />
				<label class="form-check-label" for="nolatlng">Only show hotels missing coordinates</label>
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" name="nobrand" id="nobrand" />
				<label class="form-check-label" for="nobrand">Only show hotels missing a valid brand/subbrand/category</label>
			</div>
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
	</div>
</div>
<p>Showing {{ $hotels->firstItem() }}-{{ $hotels->lastItem() }} of {{ $hotels->total() }} hotels:</p>
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
				<td><a href="{{ url("/admin/hotels/{$hotel->id}/edit") }}" role="button" class="btn btn-secondary hotel-modal-btn">Edit</a></td>
			</tr>
@endforeach
		</tbody>
	</table>
</div>
{{ $hotels->links() }}

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHotelModal">Add Hotel</button>
<a role="button" class="btn btn-primary" id="regenerate-hotels" href="{{ url("/admin/regenerate") }}">Regenerate Hotel List</a>

<div class="modal fade" id="addHotelModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
@component('modals.hotel', ['brands' => $brands])@endcomponent
		</div>
	</div>
</div>
@endsection

@section('afterBody')
@endsection