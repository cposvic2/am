@extends('layouts.admin')

@section('title')
Hotels
@endsection

@section('head')
@endsection

@section('content')
<h1>Overview</h1>
<a role="button" class="btn btn-primary" href="{{ url("/admin/brands") }}">Brands</a>
<a role="button" class="btn btn-primary" href="{{ url("/admin/hotels") }}">Hotels</a>
@endsection

@section('afterBody')
@endsection