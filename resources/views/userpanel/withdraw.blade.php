@include('layouts.userpanel.header')
	<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
		<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
				<li><a href="{{ route('wallet') }}" class="active"><img src="{{url('userpanel/images/wallet1.svg') }}"/><div>Spot Wallet</div></a></li>
				<li><a href="{{ route('openorder') }}"><img src="{{url('userpanel/images/orderhistory.svg') }}"/><div>Open Orders</div></a></li>
				<li><a href="{{ route('orderhistory') }}"><img src="{{url('userpanel/images/order.svg') }}"/><div>Order History</div></a></li>
				<li><a href="{{ route('deposithistory') }}"><img src="{{url('userpanel/images/deposit.svg') }}"/><div>Deposit History</div></a></li>
				<li><a href="{{ route('withdrawhistory') }}"><img src="{{url('userpanel/images/withdraw1.svg') }}"/><div>Withdraw History</div></a></li>
			</ul>
	</div>
			<article class="gridparentbox">			
				<div class="container sitecontainer">
					<div class="row">
					<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
							<div class="panelcontentbox">
								<h2 class="heading-box text-center">BTC Withdraw</h2>
								<div class="contentpanel">
									<form method="post" class="siteformbg" autocomplete="off">	
										<div class="form-group">
											<label class="form-label">Withdraw Address <span class="text text-danger">*</span></label>
											<input name="address" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="form-label">Withdraw Amount <span class="text text-danger">*</span></label>
											<div class="input-group">
												<input required class="form-control" name="amount">		<div class="input-group-append"><span class="input-group-text">BTC</span>
											</div>
										</div>
										</div>
										
                                        <div class="notestitle text-center">
                                            <p><span class="t-gray">Available Balance</span> : <span>0.00000000 <span class="text-uppercase">BTC</span></span></p>
                                            <p><span class="t-gray">Withdraw Fee</span> : <span>0.0005 <span class="text-uppercase">BTC</span></p>
                                            <p><span class="t-gray">Total Withdraw</span> : <span id="">0.00000000</span> <span class="text-uppercase">BTC</span></p>
										</div>
										<div class="form-group">
											<div class="text-center">
												<button type="button" class="btn sitebtn btn-xs">Submit</button>
											</div>
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