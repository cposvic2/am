@extends('layouts.admin')

@section('title')
Hotel Details - {{ $hotel->name }}
@endsection

@section('head')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAkJsq7Ax0jlg8FVJrMYDUaNsmOJi0_wTo"></script>
@endsection

@section('content')
<h1>Update {{ $hotel->name }}</h1>
<form method="post" action="{{ url("/admin/hotels/{$hotel->id}") }}">
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

	<div class="form-row">
		<div class="form-group col-md-4">
			<label class="col-form-label">Brand</label>
		    <select class="form-control ajax-changer" id="search-hotel" name="brand" id="brand">
		    	@component('components.options', ['things' => $brands, 'default' => $hotel->brand->id])@endcomponent
		    </select>
		</div>
		<div class="form-group col-md-4">
			<label class="col-form-label">Subbrand</label>
		    <select class="form-control ajax-change" name="subbrand" id="subbrand" data-action="subbrand" data-target="#search-hotel">
		    	@component('components.options', ['things' => $hotel->brand->subbrands, 'default' => $hotel->subbrand->id])@endcomponent
		    </select>
		</div>
		<div class="form-group col-md-4">
			<label class="col-form-label">Category</label>
		    <select class="form-control ajax-change" name="category" id="category" data-action="category" data-target="#search-hotel">
		    	@component('components.options', ['things' => $hotel->brand->categories, 'default' => $hotel->category->id])@endcomponent
		    </select>
		</div>
	</div>
	<div class="form-group form-check">
		<input type="checkbox" class="form-check-input" name="display" id="display" {{ isset($hotel) && $hotel->display ? 'checked="checked"' : '' }} />
		<label class="form-check-label" for="display">Display on site</label>
		<small id="displayHelp" class="form-text text-muted">All hotels will be displayed if they have a proper brand/subbrand/category/coordinates. Unchecking this box will always keep a hotel hidden.</small>
	</div>
	<h2>Location</h2>
	<div style="height: 400px;" class="mb-3" id="hotelMap"></div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="name">Latitude</label>
			<input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="{{ isset($hotel) ? $hotel->latitude : '' }}">
		</div>
		<div class="form-group col-md-6">
			<label for="name">Longitude</label>
			<input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="{{ isset($hotel) ? $hotel->longitude : '' }}">
		</div>
	</div>
	<button type="" class="btn btn-danger">Delete</button>
	<button type="submit" class="btn btn-primary">Update</button>
@csrf
@method('PUT')
</form>
@endsection

@section('afterBody')
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
var hotel = {
	lat: {{ $hotel->latitude }},
	lng: {{ $hotel->longitude }},
};

$(document).ready(function(){
	var ReportMapOptions = {
		disableDefaultUI: true,
		mapTypeControl: true,
		zoomControl: true,
		zoomControlOptions: {
    		style:google.maps.ZoomControlStyle.SMALL,
		},
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	ReportMap = new google.maps.Map(document.getElementById('hotelMap'), ReportMapOptions);
	var bounds = new google.maps.LatLngBounds();

	var reportmarkerpoint = new google.maps.LatLng(hotel["lat"],hotel["lng"]);
	ReportMarker = new google.maps.Marker({
		position: reportmarkerpoint,
		map: ReportMap,
		draggable: true,
	});
	google.maps.event.addListener(ReportMarker, "dragend", function(event) {
		$('input#latitude').val( event.latLng.lat() );
		$('input#longitude').val( event.latLng.lng() );
	}); 
	ReportMap.setCenter(reportmarkerpoint);
	ReportMap.setZoom(16);
});
</script>
@endsection