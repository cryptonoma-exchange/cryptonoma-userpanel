@include('layouts.userpanel.header')

	<div class="pagecontent gridpagecontent innerpagegrid">
		<section class="innerpagecontent">
			<div class="container sitecontainer">       
				<div class="innerpageboxsect securitybox">
					<div class="col-lg-8 col-md-10 col-sm-10 col-xs-12 center-content">
						<div class="title-header text-center">@lang('common.2FA Verification')<hr class="x-line"></div>
						<h4 class="subt text-center">@lang('common.2FA Verificationtxt')</h4>
						<h4 class="subt-1 text-center">@lang('common.2FA Verificationtxtcode') </h4>
						@if (session('error'))
								<div class="alert alert-danger">
									{{ session('error') }}
								</div>
								@endif
								@if (session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
								@endif
						<div class="security-table">
							<div class="col-md-4 text-center col-sm-4 col-xs-12 kyc-box">
								<div class="grey-box">
									<h1 class="h1"><i class="fa fa-mobile mobileicon" aria-hidden="true"></i></h1>
									<h3 class="h3">@lang('common.Smart Phone App')</h3>
									<h3 class="h4">@lang('common.Smart Phone Apptxt')</h3>


								<div class="text-center form-group mt-20">
								@if($user_details->twofa == NULL || $user_details->twofa_status == 0)
								<a href="{{ url('/enabletwofa').'/'.\Crypt::encrypt('google')}}" class="btn def-btn">@lang('common.Enable')</a>
								@else
								@if($user_details->google2fa_verify == 1 && $user_details->twofa == 'google_otp' )
									<a href="{{ route('diableTwoFactor')}}" type="button" class="btn def-btn">@lang('common.Disable')</a>
								@else
									<a href="{{ url('/enabletwofa').'/'.\Crypt::encrypt('google')}}" class="btn def-btn">@lang('common.Enable')</a>
								@endif
								@endif
							</div>

								</div>
							</div>
						<div class="col-md-2 text-center col-sm-4 col-xs-12">
                            <div class="grey-box">
                              <h3>(OR)</h3>
                            </div>
                          </div>

                        <div class="col-md-4 text-center col-sm-4 col-xs-12 kyc-box">
                             <div class="grey-box">
							  <h1><i class="fa fa-envelope" aria-hidden="true"></i>
                                </h1>
                             	<h3 class="h3">@lang('common.2faverification.Email Verification')</h3>                               
                                <!--<h4 class="subt text-center">@lang('common.Email_Verification')</h4>!-->
                                <h5 class="para">@lang('common.2faverification.Send 2FA code via Email')</h5>
                                <div class="text-center form-group mt-20">
                        

                                @if($user_details->twofa == NULL || $user_details->twofa_status == 0)
								  <a href="{{ url('/enabletwofa').'/'.\Crypt::encrypt('email')}}" type="button"  class="btn def-btn">@lang('common.2faverification.enable')</a>
								@else
									@if($user_details->twofa_status == 1 && $user_details->twofa =='email_otp')
									 	<a href="{{ route('diableTwoFactor')}}" type="button"  class="btn def-btn">@lang('common.2faverification.disable')</a>
									@else
									 	<a href="{{ url('/enabletwofa').'/'.\Crypt::encrypt('email')}}" type="button"  class="btn def-btn">@lang('common.2faverification.enable')</a>
									@endif
								@endif
                               </div>
                              </div>
                          </div> 
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</article>
@include('inc.footer')