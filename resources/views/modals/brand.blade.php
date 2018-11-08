@extends('layouts.modal')

@section('modal-title')
{{ isset($brand) ? 'Update '.$brand->name : 'Add Brand' }}
@endsection

@section('modal-url')
{{ isset($brand) ? url("/admin/brands/{$brand->id}") : url("/admin/brands") }}
@endsection

@section('modal-body')
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ isset($brand) ? $brand->name : '' }}">
</div>
<div class="form-group">
	<label for="name">Order Number</label>
	<input type="text" class="form-control" name="order" id="order" placeholder="Order number" value="{{ isset($brand) ? $brand->order : '' }}">
</div>
@endsection

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">{{ isset($brand) ? 'Update' : 'Add Brand' }}</button>
@endsection

@section('modal-hidden')
@if (isset($brand))
@method('PUT')
@endif
@endsection