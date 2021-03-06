@extends('layouts.bootstrap')

@section('bsTitle')
Login
@endsection

@section('bsHead')
    @yield('head')
@endsection

@section('bsContent')
<form class="form-signin" data-bitwarden-watching="1">
	<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
	<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	<p class="mt-5 mb-3 text-muted">© 2017-2018</p>
</form>
@endsection

@section('bsAfterBody')
@endsection