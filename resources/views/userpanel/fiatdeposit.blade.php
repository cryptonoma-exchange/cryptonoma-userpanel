@include('layouts.userpanel.header')
<div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')
	@include('layouts.userpanel.leftsidemenu')
	<article class="gridparentbox">
		<div class="innerpagecontent" style="margin-top: 20px;">
			<div class="container">
				<h2 class="h2">{{ $currency }} @lang('common.fiatdeposit.Deposit')</h2>
				<hr class="x-line-center">
			</div>
		</div>

		<div class="container sitecontainer">
			<div class="row">
				<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
					<div class="panelcontentbox">
						<div class="contentpanel">
							@if (session('error'))
								<div class="alert alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
											aria-hidden="true">&times;</span></button><strong>@lang('common.fiatdeposit.Failed')!</strong> {{ session('error') }}
								</div>
							@endif
							@if (session('success'))
								<div class="alert alert-success" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
											aria-hidden="true">&times;</span></button><strong>@lang('common.fiatdeposit.Success')!</strong> {{ session('success') }}
								</div>
							@endif
							@if (session()->has('successtrade'))
								<div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>{{ session('successtrade') }}</strong>
								</div>
							@endif

							@if (empty($admin_account))
								<div class="alert alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
											aria-hidden="true">&times;</span></button><strong>@lang('common.sign.bankdetails')!</strong> {{ session('success') }}
								</div>
							@endif

							<form method="post" class="innerformbg siteformbg" autocomplete="off">
								{{ csrf_field() }}
								{{-- <input type="hidden" name="paymenttype" value="wirepayment"> --}}
								<input type="hidden" name="paymenttype" value="Mpesa">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-label">@lang('common.fiatdeposit.Select Crypto/Currency') <span class="text text-danger">*</span></label>
											<select class="form-control" onchange="location.href=this.value">
												@foreach ($coindetails as $coindetail)
													<option value='{{ url('deposit/' . $coindetail->source) }}'
														@if ($coindetail->source == $currency) selected @endif)>{{ $coindetail->source }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="form-label">@lang('common.Deposit_type') <span class="text text-danger">*</span></label>
											<select class="form-control" name="paymenttype" id="paymenttype" autocomplete="off">
												@if (!empty($admin_account))
													<option id="mpesa" value="Mpesa" @if(old("paymenttype") == "Mpesa") selected @endif> Mpesa</option>
													<option id="wire" value="wirepayment" @if(old("paymenttype") == "wirepayment") selected @endif>@lang('common.fiatdeposit.Wire payment')</option>
												@endif
											</select>
										</div>
									</div>
								</div>
							</form>

							@if (!empty($admin_account))
								<form method="post" id="usd_deposit_form" class="innerformbg siteformbg" action="{{ url('/uploadProof') }}"
									enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}
									<input type="hidden" name="paymenttype" value="wirepayment">

									<div class="form-group banknotes">
										<label class="form-label">@lang('common.fiatdeposit.Company Bank Details') <span class="text text-danger">*</span></label>
										<p class="content">@php echo $admin_account; @endphp</p>
									</div>

									<div class="form-group">
										<label class="form-label">@lang('common.Depositamount') ({{ $currency }}) <span
												class="text text-danger">*</span></label>
										<input type="hidden" name="currency" value="{{ $currency }}">
										<input type="text" name="amount" id="amount" class="form-control allownumericwithdecimal"
											required="required">
										@if ($errors->has('amount'))
											<span class="help-block">
												<strong class="text text-danger">{{ $errors->first('amount') }}</strong>
											</span>
										@endif
									</div>

									<div class="">
										<label class="form-label">@lang('common.fiatdeposit.Upload your deposit proof')<span class="text text-danger">*</span></label>
										<div class="inputGroupContainer kycupload">
											<div class="">
												<img id="doc3" />
											</div>
											<div class="">
												<label for="file_input_files" class="custom-file-upload cutomupload">
													<i class="fa fa-cloud-upload"></i> @lang('common.fiatdeposit.Upload')
												</label>
												<input id="file_input_files" name="proof" type="file" style="display:none;">
											</div>

											<span class="desc">@lang('common.personaldetails.uploadyourimage')</span>

											<label id="file-name3"></label>

											@if ($errors->has('proof'))
												<div>
													<span class="help-block">
														<strong class="text text-danger">{{ $errors->first('proof') }}</strong>
													</span>
												</div>
											@endif
										</div>
									</div><br>
									<div class="notestitle text-center pt-0">
										<p><span class="t-gray">Minimum Deposit </span> : <span>{{ display_format($current_coin->min_deposit,$current_coin->decimal) }}<span class="text-uppercase"> {{$currency}}</span></span></p>
									</div>
									<div class="text-center">
										<button type="submit" class="btn sitebtn" id="fiat_deposit">@lang('common.fiatdeposit.Submit') </button>
									</div>

									<div class="notessub mt-40">
										<h5 class="t-gray fntbld">@lang('common.fiatdeposit.Tips')</h5>
										<p class="t-gray">@lang('common.fiatdeposit.Coins will be deposited after Admin confirmations')</p>
										<p class="t-gray">@lang('common.fiatdeposit.You can check your previous deposit in') <a href="{{ route("deposithistories",["coin" => $currency]) }}" target='_blank'
												class="tblue"><u>@lang('common.fiatdeposit.Deposit History')</u></a></p>
									</div>

								</form>
							@endif

							<div class="" id="mpesadeposit">
								<form id="msform" class="siteformbg" method="POST" action="{{ route('tinypesavalidation') }}"
									autocomplete="off">
									@csrf
									<input type="hidden" name="paymenttype" value="Mpesa">

									<div class="form-card">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Amount<span class="t-red"> *</span></label>

													<input type="text" class="form-control" name="Amount">
													<a href="#" data-toggle="modal" data-target="#tinypesahelp">Help <i
															class="fa fa-question-circle"></i></a></li>

													@if ($errors->has('Amount'))
														<span class="help-block">
															<strong class="text text-danger">{{ $errors->first('Amount') }}</strong>
														</span>
													@endif

												</div>
											</div>

											{{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#yourModal"></li> --}}

											<div class="col-md-6">
												<div class="form-group">
													<label>Phone Number<span class="t-red"> *</span></label>
													<input type="text" class="form-control" name="PhoneNumber">
													<a href="#" data-toggle="modal" data-target="#tinypesamobilehelp">Help <i
															class="fa fa-question-circle"></i></a></li>

													@if ($errors->has('PhoneNumber'))
														<span class="help-block">
															<strong class="text text-danger">{{ $errors->first('PhoneNumber') }}</strong>
														</span>
													@endif
												</div>
											</div>
										</div>
									</div>
									<div class="notestitle text-center pt-0">
										<p><span class="t-gray">Minimum Deposit </span> : <span>{{ display_format($current_coin->min_deposit,$current_coin->decimal) }}<span class="text-uppercase"> {{$currency}}</span></span></p>
									</div>
									<div class="text-center mt-2">
										<input type="submit" id="mpesa" name="submit" class="next action-button sitebtn" value="Submit">
									</div>
								</form>

								<div class="notessub mt-40">
									<div class="row">
										<div class="col-12 col-sm-9">
											<h5 class="t-gray fntbld">@lang('common.fiatdeposit.Tips')</h5>
											<p class="t-gray">@lang('common.fiatdeposit.fiat-tips')</p>
											<p class="t-gray">@lang('common.fiatdeposit.You can check your previous deposit in') <a href="{{ route("deposithistories",["coin" => $currency]) }}" target='_blank'
													class="tblue"><u>@lang('common.fiatdeposit.Deposit History')</u></a></p>
										</div>
										<div class="col-12 col-sm-3">
											<img src="{{ url('userpanel/images/tinypesa.png') }}" width="75" height="75">
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="bckbtn text-center">
						<a href="{{ url('wallet') }}" class="btn sitebtn btn-sm"><i class="fa fa-arrow-left"></i>
							@lang('common.fiatdeposit.Back')</a>
					</div>
				</div>
			</div>
		</div>
	</article>
	@include('layouts.userpanel.footermenu')
</div>

<div class="modal fade modalbgt" id="tinypesahelp">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">mPESA Description</h4>
				<button type="submit" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					{{ $description->mpisa_description }}
				</div>
			</div>
		</div>
	</div>

</div>

<div class="modal fade modalbgt" id="tinypesamobilehelp">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">mPESA Description</h4>
				<button type="submit" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					{{ $description->mpisa_mobile_description }}
				</div>
			</div>
		</div>
	</div>

</div>

@include('layouts.userpanel.footer')

<script>
	// $(document).ready(function() {
	// 	changeData();

	// 	$("#fiat_deposit").click(function() {
	// 		var amount = $('#amount').val();
	// 		if (amount != "" || amount > 0)
	// 			$('#fiat_deposit').hide();
	// 	});
	// 	$("#paypalfiat_deposit").click(function(){
	// 	var amount =$('#paypalamount').val();
	// 	if(amount !="" || amount > 0)
	// 	$('#paypalfiat_deposit').hide();
	// 	});

	// 	$(function() {
	// 		$('#stripe_deposit_form').submit(function() {
	// 			$("input[type='submit']")
	// 				.val("Please Wait...")
	// 				.attr('disabled', 'disabled');
	// 			return true;
	// 		});
	// 	});



	// $("#paymenttype").change(function() {
	// 	var type = $("#paymenttype :selected").attr('value');
	// 	if (type == 'paypal') {
	// 		$('#stripe_deposit_form').hide();
	// 		$('#usd_deposit_form').hide();
	// 		$('#paypal_deposit_form').show();
	// 	}
	// 	if (type == 'stripe') {
	// 		$('#usd_deposit_form').hide();
	// 		$('#stripe_deposit_form').show();
	// 		$('#paypal_deposit_form').hide();
	// 	}
	// 	if (type == 'wirepayment') {
	// 		$('#usd_deposit_form').show();
	// 		$('#stripe_deposit_form').hide();
	// 		$('#paypal_deposit_form').hide();
	// 	}

	// });

	//});

	$("#file_input_files").change(function() {
		var limit_size = 2097152;
		var photo_size = this.files[0].size;
		if (photo_size > limit_size) {
			$("#fiat_deposit").attr('disabled', true);
			$('#file_input_files').val('');
			alert('Image Size Larger than 2MB');
		} else {
			$("#file_input_files").text(this.files[0].name);
			$("#fiat_deposit").attr('disabled', false);

			var file = document.getElementById('file_input_files').value;
			var ext = file.split('.').pop();
			switch (ext) {
				case 'jpg':
				case 'JPG':
				case 'Jpg':
				case 'jpeg':
				case 'JPEG':
				case 'Jpeg':
				case 'png':
				case 'PNG':
				case 'Png':
					readURL6(this);
					break;
				default:
					alert('Upload your profile like jpg, jepg, png');
					break;
			}
		}
	});

	function readURL6(input) {
		var limit_size = 2097152;
		var photo_size = input.files[0].size;
		if (photo_size > limit_size) {
			alert('Image size larger than 2MB');
		} else {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#doc3').attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
	}

	// function changeData() {

	// 	var type = $("#paymenttype :selected").attr('value');
	// 	// if (type == 'paypal') {
	// 	// 	$('#stripe_deposit_form').hide();
	// 	// 	$('#usd_deposit_form').hide();
	// 	// }
	// 	// if (type == 'stripe') {
	// 	// 	$('#usd_deposit_form').hide();
	// 	// 	$('#stripe_deposit_form').show();
	// 	// }
	// 	// if (type == 'wirepayment') {
	// 	// 	$('#mpesadeposit').hide();
	// 	// 	$('#usd_deposit_form').show();
	// 	// }
	// 	if(type == 'Mpesa'){
	// 		$('#usd_deposit_form').hide();
	// 		$('#mpesadeposit').show();

	// 	}
	// 	if(type == 'wirepayment'){
	// 		$('#mpesadeposit').hide();
	// 	}
	// }

	$(document).ready(function() {
		$('#usd_deposit_form').hide();
		$('#mpesadeposit').show();
		$("#paymenttype").change(function() {
			var type = $("#paymenttype :selected").attr('value');


			if (type == 'Mpesa') {
				$('#usd_deposit_form').hide();
				$('#mpesadeposit').show();

			}
			if (type == 'wirepayment') {
				$('#mpesadeposit').hide();
				$('#usd_deposit_form').show();
			}

		}).trigger("change");
	});
</script>

@if (session()->has('help_code') && session('help_code'))
	<script>
		$(function() {
			// alert('show');
			$("#tinypesahelp").modal('toggle');
		});
	</script>
@endif
<style>
	.custom-file-upload {
		padding: 7px 13px;
		border-radius: 4px !important;
		margin-top: 4px;
		font-weight: 400;
		color: #00000078;
		cursor: pointer;
		text-align: center;
		//background: #9a828217;
	}
</style>
