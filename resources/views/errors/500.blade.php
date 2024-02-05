<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404 Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{ url('/assets/css/customusers.css') }}" />
</head>
<body class="pagefound">
	<div id="notfound">
		<div class="notfound">
			<img class="errorpage-p" src="{{ url('/images/ex-404.svg') }}" />
			<h1 class="vbig-f text-uppercase">Page not found</h1>
			<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
			
			<div><a href="{{ url('/') }}"><img class="logo-p" src="{{ url('/images/logo.png') }}" /></a></div>
			<br/>
			<a href="{{ url('/') }}">Go To Homepage</a>
		</div>
	</div>
</body>
</html>