@extends('layouts.apps')

@section('contents')
<section class="form-bg">
			<div class="container">			
				<div class="row formbox">	
					<div class="col-md-6 col-sm-6 col-xs-12">					
						<div class="leftboxcolorb login-form">
						
					
						<div class="formcontentbox">
		 @if ($message = Session::get('error'))
						<div class="alert alert-danger alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button> 
							<strong>{{ $message }}</strong>
						</div>
						@endif


						@if ($message = Session::get('status'))
						<div class="alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button> 
							<strong><?php echo session()->get('status');?></strong>
						</div>
						@endif
						<form accept-charset="UTF-8" id="theform" role="form" method="POST"  action="{{ route('login') }}" autocomplete="off" >
           @csrf
			<div class="btnsnfg">
								 <a href="{{ url('login') }}" class="btn bluebtn btn-block">Sign In</a>
								
							</div>
						</form>
					</div>
				</div>
			
		</div>
        </div>

	</div>
</section>
<script>
	$("body").addClass("innerpagebg");

			$(".toggle-password").click(function() {

		

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));


 //alert(input.attr("type"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
@endsection