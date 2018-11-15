@extends('layouts.base')

@section('_title')
@yield('bsTitle')
@endsection

@section('_head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    @yield('bsHead')
@endsection

@section('_body')
	@yield('bsNavigation')
	<div id="content" class="container py-3">
	@if (Session::has('success'))
    	<div class="alert alert-success alert-dismissible fade show" role="alert">
    		{{ Session::get('success') }}
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
    	</div>
	@endif
	@if ($errors->any())
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<p>Your information was not submitted for the following reasons:</p>
		    <ul>
		        @foreach ($errors->all() as $error)
		            <li>{{ $error }}</li>
		        @endforeach
		    </ul>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	@yield('bsContent')
	</div>
@endsection

@section('_afterBody')
<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.js') }}"></script>
	@yield('bsAfterBody')
@endsection