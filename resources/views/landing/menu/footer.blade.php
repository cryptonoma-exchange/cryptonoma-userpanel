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
				<img src="images/logo.svg" class="flogo"/>
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

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="js/simplebar.js"></script>
<script src="js/aos.js"></script>
<script src="js/endlessRiver.js"></script>
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