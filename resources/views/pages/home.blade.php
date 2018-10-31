@extends('layouts.app')

@section('title')
Awardomatic
@endsection

@section('head')
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/absolution.css') }}" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAkJsq7Ax0jlg8FVJrMYDUaNsmOJi0_wTo"></script>
	<script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ asset('js/jquery.cookie.js') }}"></script>
	<script src="{{ asset('js/functions.js') }}"></script>
@endsection

@section('body')
Content
@endsection