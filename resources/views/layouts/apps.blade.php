<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cryptonoma</title>	
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
	{{-- <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" /> --}}
	<link href="{{ asset('userpanel/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/aos.css') }}">	 
	<link rel="stylesheet" href="{{ asset('css/home.css') }}">	 	 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<header class="headermenu">
		<nav class="navbar navbar-expand-md navbar-dark headbg">
			<div class="container">				  
					<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.svg') }}" class="logo" /></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>                   
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">			
					<ul class="navbar-nav ms-auto">		
					<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ url('/exchange') }}">Exchange</a></li>	
						<li class="nav-item"><a class="nav-link" href="{{ url('/market') }}">Markets</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/faq') }}">FAQ</a></li>	
					 	 
						  @if (Auth::user())
						  <li class="nav-item dropdown">
				<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">My Account</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="{{url('/home')}}">@lang('common.menu.Dashboard')</a>
				<a href="{{ route('logout') }}"   onclick="event.preventDefault();   document.getElementById('logout-form').submit();" class="dropdown-item"
									>@lang('common.menu.Logout') <i class="fa fa-sign-out"></i></a> 								
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
									</form> 			
				</div>
				</li>
				@else
				<li class="nav-item"><a class="nav-link btn sitebtn me-2" href="{{ url('/login') }}">Login</a></li>	
				<li class="nav-item"><a class="nav-link btn sitebtn" href="{{ url('/register') }}">Register</a></li>
				@endif
				  </div> 
			</div>		  
		</nav>
</header>

    @yield('contents')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/simplebar.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/endlessRiver.js') }}"></script>
<script>
$(window).scroll(function() 
{    
	var scroll = $(window).scrollTop();	 
	if (scroll >= 100) {
		$(".headbg").addClass("darkHeader");
	}	
	else
	{
		$(".headbg").removeClass("darkHeader");
	}
}); 
AOS.init();
</script>
<script>
$(document).ready(function(){
     $(".myUl").endlessRiver();
});
 </script>
</body>
</html>

<script>
		$("body").addClass("innerpagebg");
		</script>