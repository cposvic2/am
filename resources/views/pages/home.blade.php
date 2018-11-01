@extends('layouts.app')

@section('title')
Awardomatic
@endsection

@section('head')
	<link rel="stylesheet" href="{{ asset('css/home.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/absolution.css') }}" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAkJsq7Ax0jlg8FVJrMYDUaNsmOJi0_wTo"></script>
	<script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ asset('js/jquery.cookie.js') }}"></script>
	<script src="{{ asset('js/brand.js') }}"></script>
	<script src="{{ asset('js/subbrand.js') }}"></script>
	<script src="{{ asset('js/category.js') }}"></script>
	<script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('body')
	<div id="nav-bar"><i class="menu-expand fa fa-bars"></i><div class="nav-bar-logo"></div></div>
	<div id="map-canvas"></div>
	<div id="points-slider">
		<p><b>Points:</b> <span id="amount" style="color: #f6931f; font-weight: bold;">0 - 100000 points</span></p>
		<div class="slider-container"><div id="slider-range"></div></div>
		<input type="hidden" id="rangelow" name="rangelow" value="0">
		<input type="hidden" id="rangehigh" name="rangehigh" value="100000">
		<br>
	</div>
	<div id="hotel-brand">
		<h2>Hotel Brands</h2>
	@foreach ($brands as $brand)
		<div class="brand brand-{{ $brand->id }}">
			<div class="brand-header">
				<input type="checkbox" class="check-brand" name="brand" id="brand-{{ $brand->id }}" value="{{ $brand->id }}" data-brand="{{ $brand->id }}" checked="checked" />
				<div class="brand-label">
					<label for="brand-{{ $brand->id }}">{{ $brand->name }}</label><i class="new-expand fa fa-plus-circle"></i>
				</div>
			</div>
			<div class="suboptions">
				<div class="suboption-section suboption-categories">
					<div class="suboption-input"><input type="checkbox" name="all-selector" id="brand-{{ $brand->id }}-cat-all" checked="checked" /><label for="brand-{{ $brand->id }}-cat-all">All categories</label></div>
		@foreach ($brand->categories as $category)
					<div class="suboption-input"><input type="checkbox" class="check-category" name="{{ $brand->id }}-category" id="{{ $brand->id }}-cat-{{ $category->id }}" data-brand="{{ $brand->id }}" data-category="{{ $category->id }}" data-points="{{ $category->points }}" value="{{ $category->id }}" checked="checked" /><label for="{{ $brand->id }}-cat-{{ $category->id }}">{{ $category->name }}</label></div>
		@endforeach
				</div>
				<div class="suboption-section suboption-brands">
					<div class="suboption-input"><input type="checkbox" name="all-selector" id="brand-{{ $brand->id }}-subbrand-all" checked="checked" /><label for="brand-{{ $brand->id }}-subbrand-all">All {{ $brand->name }} brands</label></div>
		@foreach ($brand->subbrands as $subbrand)
					<div class="suboption-input"><input type="checkbox" class="check-subbrand" name="{{ $brand->id }}-brand" id="{{ $brand->id }}-subbrand-{{ $subbrand->id }}" data-brand="{{ $brand->id }}" data-subbrand="{{ $subbrand->id }}" value="{{ $subbrand->id }}" checked="checked" /><label for="{{ $brand->id }}-subbrand-{{ $subbrand->id }}">{{ $subbrand->name }}</label></div>
		@endforeach
				</div>
			</div>
		</div>
	@endforeach
	</div>
	<div id="search">
		<input type="text" name="search"  placeholder="Search locations">
	</div>
	<div id="logo"></div>
</body>
@endsection

@section('afterBody')
<script src="{{ asset('js/maps.js') }}"></script>
@endsection