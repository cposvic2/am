@extends('layouts.modal')

@section('modal-title')
{{ isset($subbrand) ? 'Update '.$subbrand->name : 'Add Subbrand' }}
@endsection

@section('modal-url')
{{ isset($subbrand) ? url("/admin/brands/{$subbrand->brand->id}/subbrands/{$subbrand->id}") : url("/admin/brands/{$brand->id}/subbrands") }}
@endsection

@section('modal-body')
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ isset($subbrand) ? $subbrand->name : '' }}">
</div>
<div class="form-group">
	<label for="name">Order Number</label>
	<input type="text" class="form-control" name="order" id="order" placeholder="Order number" value="{{ isset($subbrand) ? $subbrand->order : '' }}">
</div>
@endsection

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">{{ isset($subbrand) ? 'Update' : 'Add Subbrand' }}</button>
@endsection

@section('modal-hidden')
@if (isset($subbrand))
@method('PUT')
@endif
@endsection