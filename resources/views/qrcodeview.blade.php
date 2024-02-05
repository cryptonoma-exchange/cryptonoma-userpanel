	@include('layouts.userpanel.header')

	<div class="pagecontent gridpagecontent innerpagegrid">
		@include('layouts.userpanel.headermenu')
		<article class="gridparentbox">
			<div class="innerpagecontent">
				<div class="container">
					<h2 class="h2">@lang('common.2faverification.googleverification')</h2>
					<hr class="x-line-center">
				</div>
			</div>
			<div class="container sitecontainer">
				<div class="row">
					<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
						<div class="panelcontentbox">
							<div class="contentpanel">
								<form role="form" class="siteformbg" action="{{ route('verifyotp2') }}" method="POST">
									{{ csrf_field() }}
									@if (session('error'))
										<div class="alert alert-danger">
											{{ session('error') }}
										</div>
									@endif
									<div class="form-group">
										<label>@lang('common.2faverification.Google 2FA SecretCode')</label>
										<div class="input-group">
											<input class="form-control" value="{{ $secret }}" id="coinaddress" readonly>
											<div class="input-group-append cpybtn"><span class="input-group-text" id="myTooltip">@lang('common.2faverification.Copy')</span>
											</div>
										</div>
									</div>
									<div class="form-group mb-0 text-center">
										<img src="{{ $image }}">
									</div>
									<div class="form-group">
										<label class="form-label">@lang('common.2faverification.EnterCode')<span class="text text-danger">*</span></label>
										<input type="text" name="otp" class="form-control" required="">
										@if ($errors->has('otp'))
											<span class="help-block">
												<strong>{{ $errors->first('otp') }}</strong>
											</span>
										@endif
									</div>

									<div class="text-center">
										<input type="submit" name="submit" class="btn btn-sm yellow-btn mr-1" value="@lang('common.2faverification.Submit')" />
									</div>
									<div class="bckbtn text-center">
										<a href="{{ url('profile') }}" class="btn sitebtn btn-sm"><i class="fa fa-arrow-left"></i>Back To Profile</a>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
	<footer class="footerbox">
		<section class="footer-gray-bg fnt-reg">
			<div class="container">
				<p class="ftext">Copyright © 2021 Cryptonoma. All rights reserved.</p>
			</div>
		</section>
	</footer>
	</body>

	</html>
