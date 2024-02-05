<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Cryptonoma</title>	
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
	{{-- <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" /> --}}
	<link href="{{ asset('userpanel/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/aos.css')}}">	 
	<link rel="stylesheet" href="{{asset('css/home.css')}}">	 	 
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  @yield('content')

  <header class="headermenu">
		<nav class="navbar navbar-expand-md navbar-dark headbg">
			<div class="container">				  
					<a class="navbar-brand" href="index.php"><img src="{{asset('images/logo.svg')}}" class="logo" /></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>                   
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">			
					<ul class="navbar-nav ms-auto">		
					<li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Exchange</a></li>	
						<li class="nav-item"><a class="nav-link" href="#">Markets</a></li>
						<li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>	
					 	 <li class="nav-item"><a class="nav-link btn sitebtn me-2" href="signin.php">Login</a></li>	
					 	 <li class="nav-item"><a class="nav-link btn sitebtn" href="signup.php">Register</a></li>
				  </div> 
			</div>		  
		</nav>
</header>
  <body>




  	<footer class="footerbottombg">
<section class="footer-gray-bg fnt-reg">
		<div class="container">		
		<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
					<h3 class="h3">Menu</h3>
					<ul class="foot-list">
						<li><a href="#">Home</a></li>
						<li><a href="#">Exchange</a></li>
						<li><a href="#">Markets</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
					<h3 class="h3">More Links</h3>
					<ul class="foot-list">
					<li><a href="#">Register</a></li>
						<li><a href="#">Login</a></li>
						<li><a href="privacy.php">Terms and Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
					</ul>
				</div>							
				<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
					<h3 class="h3">Newsletter</h3>
					<div class="subscibe">
						<form action="#" method="post" autocomplete="off" class="subscibefrm">
							<div class="form-group">
									<input type="email" class="form-control" placeholder="Enter your email address" name="email_subscribe" required="">
										<button class="btn btn-default" type="submit">Subscribe</button>
								</div>
						</form>	
						</div>				
				</div>         
		     	<div class="col-lg-3 col-md-3 col-sm-6 col-12 listrightbox footlistbg">
				<img src="{{asset('images/logo.svg')}}" class="flogo"/>
				 <p class="ftext">Copyright © Cryptonoma {{date('Y')}}. All Rights Reserved</p>	
					<div class="social-bg">
						<ul class="sociallist">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>	
			
				</div>
			</div>
	</section>
</footer>


</body>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/mdb.min.js')}}"></script>
<script src="{{asset('js/simplebar.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/endlessRiver.js')}}"></script>
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

 </html>

