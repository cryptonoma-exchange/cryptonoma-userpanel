@include('layouts.userpanel.header')
	<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
		<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
                <li><a href="{{ route('wallet') }}" class="active"><img src="{{ asset('images/wallet1.svg') }}"/><div>Spot Wallet</div></a></li>
				<li><a href="{{ route('openorder') }}"><img src="{{ asset('images/orderhistory.svg') }}"/><div>Open Orders</div></a></li>
				<li><a href="{{ route('orderhistory') }}"><img src="{{ asset('images/order.svg') }}"/><div>Order History</div></a></li>
				<li><a href="{{ route('deposithistory') }}"><img src="{{ asset('images/deposit.svg') }}"/><div>Deposit History</div></a></li>
				<li><a href="{{ route('withdrawhistory') }}"><img src="{{ asset('images/withdraw1.svg') }}"/><div>Withdraw History</div></a></li>
			</ul>	
	</div>

			<article class="gridparentbox">				
				<div class="container sitecontainer">
					<div class="row">
						<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
							<div class="panelcontentbox">
								<h2 class="heading-box text-center">BTC Deposit</h2>
								<div class="contentpanel">
									<form class="siteformbg">
										<div class="form-group">
										<label>BTC Wallet Address </label>
										<div class="input-group">
											<input class="form-control" value="sffg5357GFSDHGHshsdg5377" id="coinaddress" readonly>
											<div class="input-group-append cpybtn" onclick="myCopyFunc()"><span class="input-group-text" id="myTooltip">Copy</span></div>
										</div>
</div>
										<div class="form-group text-center">
                                        <img src="{{ asset('images/qrcode.png') }}">
</div>
<div class="form-group text-center">
                                        <div class="notestitle">
                                            <p><span class="t-gray">Minimum Deposit Limit</span> : 0.00060000 BTC</p>
                                            <p><span class="t-gray">Deposit Fee</span> : 0.00050000 BTC</p>
                                        </div>                                        
                                        <p class="text text-danger">Note : Deposit may take from a few minutes to over 30 minutes.</p>	
</div>
									</form>
									
								</div>
							</div>
							<div class="bckbtn text-center">
                                <a href="#" class="btn sitebtn btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
						</div>
					</div>
				</div>
			</article>
@include('layouts.userpanel.footermenu')
	</div>
@include('layouts.userpanel.footer')