@extends('layouts.modal')

@section('modal-title')
{{ isset($category) ? 'Update '.$category->name : 'Add Category' }}
@endsection

@section('modal-url')
{{ isset($category) ? url("/admin/brands/{$category->brand->id}/categories/{$category->id}") : url("/admin/brands/{$brand->id}/categories") }}
@endsection

@section('modal-body')
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ isset($category) ? $category->name : '' }}">
</div>
<div class="form-group">
	<label for="name">Order Number</label>
	<input type="text" class="form-control" name="order" id="order" placeholder="Order number" value="{{ isset($category) ? $category->order : '' }}">
</div>
<div class="form-group">
	<label for="name">Points</label>
	<input type="text" class="form-control" name="points" id="points" placeholder="Points" value="{{ isset($category) ? $category->points : '' }}">
</div>
@endsection

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Add Category' }}</button>
@endsection

@section('modal-hidden')
@if (isset($category))
@method('PUT')
@endif
@endsection