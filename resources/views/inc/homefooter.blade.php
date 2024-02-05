<footer class="footerbottombg">
<section class="footer-gray-bg fnt-reg">
		<div class="container">		
			<div class="row">			
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="footlistbg">
					<ul class="foot-list">
					<li><a href="{{url('/aboutus')}}">About</a></li>
						<li><a href="{{url('/announcement')}}">Announcements</a></li>
						<li><a href="{{url('/listingstatus')}}">Listing Status</a></li>
						<li><a href="{{url('/listingapp')}}">Listing Application</a></li>
						
                         <li><a href="{{url('/privacy')}}">Privacy Policy</a></li>
                         <li><a href="{{url('/aml')}}">AML</a></li>
                         <li><a href="{{url('/terms')}}">Terms of Use</a></li>
						 <li><a href="{{url('/faq')}}">FAQ</a></li>
						 <li><a href="{{url('/contact')}}">Contact</a></li>
						 
					</ul>
				</div> 	
				
				<div class="social-bg">
						<ul class="sociallist">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-telegram"></i></a></li>
						</ul>
					</div>
		</div>
		</div>
		<p class="ftext">Copyright © Cryptonoma {{date('Y')}}.<br/> All Rights Reserved.</p>
		</div>
</section>
</footer>

<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/popper.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/mdb.min.js')}}"></script>
<script src="{{url('js/simplebar.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>
<script type="text/javascript" src="{{url('js/endlessRiver.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
$('.closeiconbtn').click(function()
{
    $(".headbg .collapse").removeClass('show');
});
</script>

	<script>
	$(document).ready(function() {
	$(".myUl").endlessRiver()
	});

	$(function()
	{
	$('#theform').submit(function(){
	  $("input[type='submit']", this)
	    .val("Please Wait...")
	    .attr('disabled', 'disabled');
	  return true;
	});
	}); 

	
function check_referral(data_url)
{
    var formData = $('#theform').serialize();
    $.ajax({
        type: "post",
        url: data_url,
        dataType: "json",
        data: formData,
        success: function(data){
            if(data.status == 'success')
            {
                $('#login_btn').attr('disabled', false);
                $('#showReferralUser').html(data.msg);
            }
            else
            {
                $('#login_btn').attr('disabled', true);
                $('#showReferralUser').html(data.msg);
            }
        }
    });
    return false;
}
	</script>
</body>
</html>