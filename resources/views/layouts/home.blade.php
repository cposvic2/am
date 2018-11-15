@extends('layouts.base')

@section('_title')
	@yield('title')
@endsection

@section('_head')
    <meta name="description" content="Awardomatic is the most comprehensive hotel mapping tool for hotel awards. Use Awardomatic to find a free hotel for your next travel plans.">
    @yield('head')
@endsection

@section('_body')
	@yield('body')
@endsection

@section('_afterBody')
	@yield('afterBody')
@endsection