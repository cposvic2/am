@extends('layouts.bootstrap')

@section('bsTitle')
@yield('title')
@endsection

@section('bsHead')
    @yield('head')
@endsection

@section('bsNavigation')
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="{{ url("/") }}">Awardomatic Admin Panel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item{{ ( Request::path() == 'admin/hotels' ? " active" : "") }}">
					<a class="nav-link" href="{{ url("admin/hotels") }}">Hotels</a>
				</li>
				<li class="nav-item{{ ( Request::path() == 'admin/brands' ? " active" : "") }}">
					<a class="nav-link" href="{{ url("admin/brands") }}">Brands</a>
				</li>
				<li class="nav-item{{ ( Request::path() == 'admin/requests' ? " active" : "") }}">
					<a class="nav-link" href="{{ url("admin/requests") }}">Requests</a>
				</li>
			</ul>
		</div>
	</nav>
@endsection

@section('bsContent')
@yield('content')
@endsection

@section('bsAfterBody')
@yield('afterBody')
@endsection