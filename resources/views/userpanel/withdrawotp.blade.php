@include('layouts.userpanel.header')
 <div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')	 
			<article class="gridparentbox">
				<div class="innerpagecontent">
					<div class="container">
						<h2 class="h2">{{ $twofatype }} Verification</h2>
						<hr class="x-line-center">
					</div>
				</div>
				<div class="container sitecontainer">
					<div class="row">
						<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
							<div class="panelcontentbox">
								<div class="contentpanel">
								<form  class="siteformbg"  method="post" action="{{ url('/validateotp') }}">
								{{ csrf_field() }} 

								@if (session('faild'))
								<div class="alert alert-danger">
									{{ session('faild') }}
								</div>
								@endif	
								
										<div class="form-group">
											<label class="form-label">@lang('common.wallet.EnterCode')<span class="text text-danger">*</span></label>
											<input id="otp" type="number"  class="form-control" name="otp" value="{{ old('otp') }}" required autofocus>
											@if ($errors->has('otp'))
									<span class="help-block">
										<strong class="text text-danger">{{ $errors->first('otp') }}</strong>
									</span>
									@endif
										</div>
										<div class="text-center">
									<input type="submit" name="@lang('common.personaldetails.submit')" class="btn btn-sm yellow-btn mr-1" value="Submit" />
								</div>  
									 
									 
									 
									</form>
                              
								</div>
							</div> 
                             
						</div>
					</div>
				</div>
			</article>
			<footer class="footerbox">
				<section class="footer-gray-bg fnt-reg">
					<div class="container">
									<p class="ftext">Copyright © 2022 Cryptonoma. All rights reserved.</p>
					</div>
				</section>
			</footer>	
	</div>
	
		 
	 