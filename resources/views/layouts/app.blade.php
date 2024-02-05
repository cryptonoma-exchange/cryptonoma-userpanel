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

	<div>
		@yield('content')
	</div>

	<footer class="footerbottombg">
		<section class="footer-gray-bg fnt-reg">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
						<h3 class="h3">Menu</h3>
						<ul class="foot-list">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('/exchange') }}">Exchange</a></li>
							<li><a href="#">Markets</a></li>
							<li><a href="{{ url('/faq') }}">FAQ</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
						<h3 class="h3">More Links</h3>
						<ul class="foot-list">
							<li><a href="{{ url('/register') }}">Register</a></li>
							<li><a href="{{ url('/login') }}">Login</a></li>
							<li><a href="{{ url('/terms') }}">Terms and Conditions</a></li>
							<li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
						<h3 class="h3">Newsletter</h3>

						<span id="form_result"></span>

						<div class="subscibe">
							<form method="post" id="subscribe_site" autocomplete="off" class="subscibefrm">
								@csrf
								<div class="form-group">
									<input type="email" class="form-control" style="color:#FFFFFF;" placeholder="Enter your email address"
										name="email" required="">
									<button id="save-data" class="btn btn-default" type="submit">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-12 listrightbox footlistbg">
						<img src="{{ asset('images/logo.svg') }}" class="flogo" />
						<p class="ftext">Copyright © Cryptonoma {{date('Y')}}. All Rights Reserved</p>
						<div class="social-bg">
							<ul class="sociallist">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>

					</div>
				</div>
		</section>
	</footer>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/mdb.min.js') }}"></script>
	<script src="{{ asset('js/simplebar.js') }}"></script>
	<script src="{{ asset('js/aos.js') }}"></script>
	<script src="{{ asset('js/endlessRiver.js') }}"></script>
	<script>
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			if (scroll >= 100) {
				$(".headbg").addClass("darkHeader");
			} else {
				$(".headbg").removeClass("darkHeader");
			}
		});
		AOS.init();
	</script>
	<script>
		$(document).ready(function() {

			$('#subscribe_site').on('submit', function(event) {
				event.preventDefault();

				/* Submit form data using ajax*/
				$.ajax({
					url: "{{ url('subscribe') }}",
					method: 'post',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					dataType: "json",
					success: function(response) {
						var status = response.success ? "success" : "danger";
						var html = '';
						html = '<div class="alert alert-' + status + '">' + response.message +
							'</div>';
						$('#form_result').html(html);
						document.getElementById("subscribe_site").reset();
					}
				});
			});

			$(".myUl").endlessRiver();
		});
	</script>
</body>

</html>
