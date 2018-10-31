<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<title>@yield('title')</title>
	<meta name="description" content="Awardomatic is the most comprehensive hotel mapping tool for hotel awards. Use Awardomatic to find a free hotel for your next travel plans.">
    @yield('head')
</head>
<body>
@yield('body')
</body>
@yield('afterBody')
</html>