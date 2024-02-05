@include('inc.header')
<header class="innerheader">
	@include('inc.menu')
</header>   

<article>

	<div class="pagecontent">
		<section class="innerpagecontent">
			<div class="container sitecontainer">    
				<div class="innerpageboxsect">
					<div class="col-md-5 col-sm-8 col-xs-12 center-content">
						<div class="centerwhitebox">
							<div class="title-header text-center">@lang('common.2faverification.googleverification')<hr class="x-line"></div>					

							<form role="form" class="innerformbg" action="{{ url('/2faverification/googe2faverifyotp') }}" method="POST">
								{{ csrf_field() }}

							@if (session('error'))
							<div class="alert alert-danger">
							{{ session('error') }}
							</div>
							@endif
								<div class="form-group">
									<label>@lang('common.2faverification.entercode')</label>
									<input type="text" name="otp" class="form-control"  required="">
									@if ($errors->has('otp'))
									<span class="help-block">
									<strong>{{ $errors->first('otp') }}</strong>
									</span>
									@endif

									
								</div>
								<div class="text-center">
									<input type="submit" name="submit" class="blue-btn" value="@lang('common.Submit')" />
								</div>  
							</br>      
							</form>  
							 

						</div>

					</div>
				</div>
			</div>
		</section>
	</div>


</article>

@include('inc.footer')
