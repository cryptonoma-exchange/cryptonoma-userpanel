@include('inc.homeheader')
@include('inc.homemenu') 
<article>
	<section class="innerpagecont listingformbox">
		<div class="container">
			<h2 class="heading-title text-center">Listing Application</h2>
			<div class="row">
			<div class="col-md-10 mx-auto text-center">
				<p class="content">As a US-based cryptocurrency exchange with licenses issued by State Government and U.S. Department of Treasury, Atlantis Exchange is the easiest to use and securest cryptocurrency exchange that provides global users with the latest-developed secure platform to trade cryptocurrencies. Any cryptocurrency with 100,000+ global holders are welcome to apply for listing on Atlantis Exchange. The Listing Application must be completed by a senior member of the project's core team with the following information:</p>
			</div>
			</div>
			<br>
			<div class="login-form">
			<div class="formcontentbox">
		<form action="{{url('/listingappsave')}}" method="post" autocomplete="off" class="">




                              @if ($message = Session::get('contactmsg'))
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
          </div>
        @endif

        @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
          </div>
        @endif	
           @csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<div class="form-outline">
								<input class="form-control form-control-lg" name="name">
								<label class="form-label">Name of the issuer *</label>
							</div>

														@if ($errors->has('name'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('name') }}</strong>
					</span>
					@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="email">
								<label class="form-label">Email *</label>
							</div>

																@if ($errors->has('email'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('email') }}</strong>
					</span>
					@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="coinname">
								<label class="form-label">Coin Name *</label>
							</div>

																		@if ($errors->has('coinname'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('coinname') }}</strong>
					</span>
					@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="coinshortname">
								<label class="form-label">Coin short name *</label>
							</div>

				    @if ($errors->has('coinshortname'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('coinshortname') }}</strong>
					</span>
					@endif
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="totalsupply">
								<label class="form-label">Total Supply *</label>
							</div>

							@if ($errors->has('totalsupply'))
								<span class="help-block">
									<strong style="color:red">{{ $errors->first('totalsupply') }}</strong>
								</span>
							@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="circulation">
								<label class="form-label">Current Circulations *</label>
							</div>

				    @if ($errors->has('circulation'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('circulation') }}</strong>
					</span>
					@endif
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="website">
								<label class="form-label">Website *</label>
							</div>


				    @if ($errors->has('website'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('website') }}</strong>
					</span>
					@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="githubsource">
								<label class="form-label">Gitub Source *</label>
							</div>

							    @if ($errors->has('githubsource'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('githubsource') }}</strong>
					</span>
					@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="contractaddress">
								<label class="form-label">Contract address (For BEP-20, ERC-20 and TRC-20 tokens) *</label>
							</div>
									    @if ($errors->has('contractaddress'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('contractaddress') }}</strong>
					</span>
					@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="blockexplorer">
								<label class="form-label">Block Explorer *</label>
							</div>

											    @if ($errors->has('blockexplorer'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('blockexplorer') }}</strong>
					</span>
					@endif
							</div>
						</div>
					</div>
								<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="cointype">
								<label class="form-label">Coin Type *</label>
							</div>
													    @if ($errors->has('cointype'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('cointype') }}</strong>
					</span>
					@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="telegram">
								<label class="form-label">Telegram *</label>
							</div>
															    @if ($errors->has('telegram'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('telegram') }}</strong>
					</span>
					@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="twitter">
								<label class="form-label">Twitter *</label>
							</div>
																	    @if ($errors->has('twitter'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('twitter') }}</strong>
					</span>
					@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-outline">
								<input class="form-control form-control-lg" name="facebook">
								<label class="form-label">Facebook *</label>
							</div>
																			    @if ($errors->has('facebook'))
					<span class="help-block">
					<strong style="color:red">{{ $errors->first('facebook') }}</strong>
					</span>
					@endif
							</div>
						</div>
					</div>

					<div class="row">
<div class="col-md-12">
<div class="form-group">
<div class="form-outline">
<textarea class="form-control form-control-lg" name="message" rows="6"></textarea>
<label class="form-label">Message </label>
</div>
</div>
</div>
</div>
					<div class="form-group text-center">
						<input type="submit" class="text-uppercase btn bluebtn" value="Submit">
					</div>
				</form>
				<p class="text-center">If you have any questions, please feel free to send an email to: listing@atlantiscex.com</p>
			</div>
			</div>
		</div>
	</section>
</article>
	@include('inc.homefooter')

<script>
$("body").addClass("innerpagebg");
</script>
	