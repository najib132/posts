<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Koncrate</title>
	<link rel="stylesheet" href="{{ asset('css/bulma.css') }}">

	@yield('stylesheet')

</head>
<body>


@include('partials.menu')
@yield('content')
@yield('javascript')
	
</body>
</html>