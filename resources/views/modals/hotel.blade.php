@extends('layouts.modal')

@section('modal-title')
{{ isset($hotel) ? 'Update '.$hotel->name : 'Add Hotel' }}
@endsection

@section('modal-url')
{{ isset($hotel) ? url("/hotels/{$hotel->id}") : url("/hotels") }}
@endsection

@section('modal-body')
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ isset($hotel) ? $hotel->name : '' }}">
</div>
<div class="form-group">
	<label for="name">Address</label>
	<input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ isset($hotel) ? $hotel->address : '' }}">
</div>

<div class="form-group">
	<label class="col-form-label">Brand</label>
    <select class="form-control" name="brand">
@foreach ($brands as $brand)
		<option value="{{ $brand->id }}"{{ isset($hotel) && $hotel->brand->id === $brand->id ? ' selected="selected"' : '' }}>{{ $brand->name }}</option>
@endforeach
    </select>
</div>

<div class="form-group">
	<label class="col-form-label">Subbrand</label>
    <select class="form-control" name="subbrand">
@if (isset($hotel))
	@foreach ($hotel->brand->subbrands as $subbrand)
		<option value="{{ $subbrand->id }}"{{ isset($hotel) && $hotel->subbrand->id === $subbrand->id ? ' selected="selected"' : '' }}>{{ $subbrand->name }}</option>
	@endforeach
@endif
    </select>
</div>

<div class="form-group">
	<label class="col-form-label">Category</label>
    <select class="form-control" name="category">
@if (isset($hotel))
	@foreach ($hotel->brand->categories as $category)
		<option value="{{ $category->id }}"{{ isset($hotel) && $hotel->category->id === $category->id ? ' selected="selected"' : '' }}>{{ $category->name }}{{ !!$category->points ? " (".$category->points." ".$category->brand->points_name.")" : "" }}</option>
	@endforeach
@endif
    </select>
</div>

<div class="form-group">
	<label for="name">Latitude</label>
	<input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="{{ isset($hotel) ? $hotel->latitude : '' }}">
</div>

<div class="form-group">
	<label for="name">Longitude</label>
	<input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="{{ isset($hotel) ? $hotel->longitude : '' }}">
</div>
@endsection

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">{{ isset($hotel) ? 'Update' : 'Add Subbrand' }}</button>
@endsection

@section('modal-hidden')
@if (isset($hotel))
@method('PUT')
@endif
@endsection