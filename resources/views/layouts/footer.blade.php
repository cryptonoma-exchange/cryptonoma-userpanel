<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/mdb.min.js') }}"></script>
<script src="{{ url('js/simplebar.js') }}"></script>
<script src="{{ url('js/aos.js') }}"></script>
<script src="{{ url('js/endlessRiver.js') }}"></script>
<script src="{{ url('js/userpanel/custom.js') }}"></script>
<script src="{{ url('js/userpanel/toastr.min.js') }}"></script>
<footer class="footerbottombg">
	<section class="footer-gray-bg fnt-reg">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
					<h3 class="h3">Menu</h3>
					<ul class="foot-list">
						<li><a href="{{ url('/') }}">Home</a></li>
						@if (Auth::user())
							<li><a href="{{ url('/trade') }}">Exchange</a></li>
						@else
							<li><a href="{{ url('/exchange') }}">Exchange</a></li>
						@endif
						<li><a href="{{ url('/market') }}">Markets</a></li>
						<li><a href="{{ url('/faq') }}">FAQ</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-12 footlistbg">
					<h3 class="h3">More Links</h3>
					<ul class="foot-list">
						@if (Auth::user())
							<li><a href="{{ url('/setting') }}">Register</a></li>
							<li><a href="{{ url('/setting') }}">Login</a></li>
						@else
							<li><a href="{{ url('/register') }}">Register</a></li>
							<li><a href="{{ url('/login') }}">Login</a></li>
						@endif

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
					<img src="{{ url('images/logo.svg') }}" class="flogo" />
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

<script>
	$(function() {
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	});
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
					html = '<div class="alert alert-'+status+'">' + response.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
					$('#form_result').html(html);
					document.getElementById("subscribe_site").reset();
				}
			});
		});

		$(".myUl").endlessRiver();
	});
</script>

<script>
	$(document).ready(function() {

		$("#daymode").click(function() {

			$("#daymode").addClass("activemode");
			$("#nightmode").removeClass("activemode");
			$("body").removeClass("nightmode");
			$(".tradechartlist iframe").contents().find("body").removeClass("nightmode");
		});
		$("#nightmode").click(function() {

			$("#nightmode").addClass("activemode");
			$("#daymode").removeClass("activemode");
			$("body").addClass("nightmode");
			$(".tradechartlist iframe").contents().find("body").addClass("nightmode");
		})
	});

	var timesRun = 0;
	var interval = setInterval(function() {
		timesRun += 1;

		if (timesRun === 400) {
			clearInterval(interval);
		}
		var Mode = "{{ Session::get('mode') }}";
		if (Mode == 'nightmode') {

			$("#nightmode").addClass("activemode");
			$("#daymode").removeClass("activemode");
			$("body").addClass("nightmode");
			$(".tradechartlist iframe").contents().find("body").addClass("nightmode");

		} else {
			$(".tradechartlist iframe").contents().find("body").removeClass("nightmode");
		}
	}, 1 / 100);
</script>
<script>
	function exportTasks(_this) {
		let _url = $(_this).data('href');

		window.location.href = _url;

		//alert( window.location.href);
	}
</script>

</body>

</html>
