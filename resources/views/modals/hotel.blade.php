@extends('layouts.modal')

@section('modal-title')
{{ isset($hotel) ? 'Update '.$hotel->name : 'Add Hotel' }}
@endsection

@section('modal-url')
{{ isset($hotel) ? url("/admin/hotels/{$hotel->id}") : url("/admin/hotels") }}
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
	<label for="name">Link</label>
	<input type="text" class="form-control" name="link" id="link" placeholder="Link" value="{{ isset($hotel) ? $hotel->link : '' }}">
</div>

<div class="form-group">
	<label class="col-form-label">Brand</label>
    <select class="form-control ajax-changer" name="brand" id="hotel-brand{{ isset($hotel) ? '-'.$hotel->id : '' }}">
@if (isset($hotel))
	@component('components.options', ['things' => $brands, 'default' => $hotel->brand->id])@endcomponent
@else
	@component('components.options', ['things' => $brands])@endcomponent
@endif
    </select>
</div>

<div class="form-group">
	<label class="col-form-label">Subbrand</label>
    <select class="form-control ajax-change" name="subbrand" data-action="subbrand" data-target="#hotel-brand{{ isset($hotel) ? '-'.$hotel->id : '' }}">
@if (isset($hotel))
	@component('components.options', ['things' => $hotel->brand->subbrands, 'default' => $hotel->subbrand->id])@endcomponent
@else
	@component('components.options', ['things' => $brands->first()->subbrands])@endcomponent
@endif
    </select>
</div>

<div class="form-group">
	<label class="col-form-label">Category</label>
    <select class="form-control ajax-change" name="category" data-action="category" data-target="#hotel-brand{{ isset($hotel) ? '-'.$hotel->id : '' }}">
@if (isset($hotel))
	@component('components.options', ['things' => $hotel->brand->categories, 'default' => $hotel->category->id])@endcomponent
@else
	@component('components.options', ['things' => $brands->first()->categories])@endcomponent
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
<button type="submit" class="btn btn-primary">{{ isset($hotel) ? 'Update' : 'Add Hotel' }}</button>
<script>
$(".ajax-change").each(function() {
	var $change = $(this);
	var target = $(this).data("target");
	var $target = $(target);

	$target.on("change", function () {
		$.ajax({
			url: '{{ url("admin/ajax/select") }}',
			data: {action: $change.data("action"), id: $target.val()},
			method: 'get',
			success: function(result){
				$change.html(result['view']);
			},
		});
	});
});
</script>
@endsection

@section('modal-hidden')
@if (isset($hotel))
@method('PUT')
@endif
@endsection