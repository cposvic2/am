<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
    @yield('headerScripts')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/costdivide.css') }}" rel="stylesheet">
    @yield('stylesheets')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="{{ url("/") }}">CostDivide</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item{{ ( Request::path() == 'about' ? " active" : "") }}">
				<a class="nav-link" href="{{ url("/about") }}">About</a>
			</li>
			<li class="nav-item{{ ( Request::path() == 'faq' ? " active" : "") }}">
				<a class="nav-link" href="{{ url("/faq") }}">FAQ</a>
			</li>
@yield('navbar')
		</ul>
<!--		<form class="form-inline my-2 my-lg-0">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Create a form</button>
		</form>
-->
	</div>
</nav>

	<div id="content">
@yield('content')
	</div>
	<footer>
		<div class="container py-3">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="{{ url("/faq") }}">FAQ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url("/about") }}">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url("/privacy") }}">Privacy</a>
				</li>
			</ul>
			<p>Copyright &copy; {{ now()->year }} Cost Divide</p>
		</div>
	</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('footerScripts')
</html>