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
				<td><a role="button" class="btn btn-secondary" href="{{ url("/admin/brands/{$brand->id}") }}">Edit</a></td>
			</tr>
@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('afterBody')
@endsection