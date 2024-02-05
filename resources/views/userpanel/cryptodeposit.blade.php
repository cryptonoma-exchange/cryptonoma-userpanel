@include('layouts.userpanel.header')
<div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')
	@include('layouts.userpanel.leftsidemenu')
	<article class="gridparentbox">
		<div class="innerpagecontent">
			<div class="container">
				<h2 class="h2">{{ $coinname }} @lang('common.deposit.Deposit')</h2>
				<hr class="x-line-center">
			</div>
		</div>
		<div class="container sitecontainer">
			<div class="row">
				<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
					<div class="panelcontentbox">
						<div class="contentpanel">
							<form class="siteformbg">
								<div class="form-group">
									<label class="form-label">@lang('common.deposit.Select Crypto/Currency') <span class="text text-danger">*</span></label>
									<select class="form-control" onchange="location.href=this.value">
										@foreach ($Activecoindetails as $coindetail)
											<option value='{{ url('deposit/' . $coindetail->source) }}'
												@if ($coindetail->source == $coin) selected @endif)>{{ $coindetail->source }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label>{{ $coin }} @lang('common.deposit.Wallet Address') <span class="light-green text-capitalize">( @lang('common.deposit.Acceptable Network') :
											{{ implode(", ",$networks) }} ) </span></label>
									<div class="input-group">
										<input class="form-control" value="{{ $address }}" id="coinaddress" readonly>
										<div class="input-group-append cpybtn" onclick="myCopyFunc()"><span class="input-group-text"
												id="myTooltip">@lang('common.deposit.Copy')</span></div>
									</div>
								</div>
								@if ($current_coin->need_memo)
								<div class="form-group">
									<label>Memo</label>
									<div class="input-group">
										<input class="form-control" value="{{ $payment_id }}" id="memo" readonly>
										<div class="input-group-append cpybtn" onclick="myCopyFunc()"><span class="input-group-text"
												id="paymentTag">@lang('common.deposit.Copy')</span></div>
									</div>
								</div>
								@endif
								<div class="text-center">
									<img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ $address }}">
									<div class="notestitle">
										<p><span class="t-gray">@lang('common.deposit.Minimum Deposit Limit')</span> : {{ $coindetails->min_deposit ? $coindetails->min_deposit : 0  }} {{ $coin }}</p>
										<p><span class="t-gray">Deposit Fee</span> : 0 {{ $coin }}</p>
									</div>
									<p class="text text-danger mb-0">@lang('common.deposit.Deposit may take from a few minutes to over 30 minutes')</p>
									@if ($coindetails->need_memo)
									<p class="text text-danger mb-0">Memo is required. If you forget to include it, or you include an incorrect memo, the funds may be lost.</p>
									@endif
								</div>
							</form>
							<div class="notessub mt-40">
								<h5 class="t-gray fntbld">Tips</h5>
								<p class="t-gray">@lang('common.deposit.Coins will be dep') <span class="text-info"><b>{{ $coin }},</b></span>and any other
									asset deposit will not be recovered.</p>
								<p class="t-gray">@lang('common.deposit.Coins will be deposited afternewdata')</p>
								<p class="t-gray">@lang('common.deposit.Coins will be deposited after') <span class="text-info"><b>1 </b></span>network confirmation/s.</p>
								<p class="t-gray">@lang('common.deposit.You can check your previous deposit in') <a href="{{ route('deposithistories',["coin" => $coin]) }}" target='_blank'
										class="tblue"><u>@lang('common.deposit.Deposit History') </u></a></p>
							</div>
						</div>
					</div>
					<div class="bckbtn text-center">
						<a href="{{ url('wallet') }}" class="btn sitebtn btn-sm"><i class="fa fa-arrow-left"></i> @lang('common.deposit.Back')</a>
					</div>
				</div>
			</div>
		</div>
	</article>
	@include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')
<script>
	document.getElementById("myTooltip").addEventListener("click", copy_password);

	function copy_password() {
		var copyText = document.getElementById("coinaddress");
		var textArea = document.createElement("textarea");
		textArea.value = copyText.value;
		document.body.appendChild(textArea);
		var tooltip = document.getElementById("myTooltip");
		tooltip.innerHTML = "Copied!";

		textArea.select();
		document.execCommand("Copy");
		textArea.remove();

		setTimeout(function() {
			var tooltip = document.getElementById("myTooltip");
			tooltip.innerHTML = "COPY";
		}, 2000);
	}

	$(function(){
		$("#paymentTag").on("click",function(){
			var copyText = document.getElementById("memo");
			var textArea = document.createElement("textarea");
			textArea.value = copyText.value;
			document.body.appendChild(textArea);
			var tooltip = document.getElementById("paymentTag");
			tooltip.innerHTML = "Copied!";

			textArea.select();
			document.execCommand("Copy");
			textArea.remove();

			setTimeout(function() {
				var tooltip = document.getElementById("paymentTag");
				tooltip.innerHTML = "COPY";
			}, 2000);
		});
	});
</script>
