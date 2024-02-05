@include('layouts.userpanel.header')
	<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
		<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
		<li><a href="{{ route('wallet') }}"><img src="{{url('userpanel/images/wallet1.svg') }}"/><div>Spot Wallet</div></a></li>
				<li><a href="{{ route('openorder') }}"><img src="{{url('userpanel/images/orderhistory.svg') }}"/><div>Open Orders</div></a></li>
				<li><a href="{{ route('orderhistory') }}" class="active"><img src="{{url('userpanel/images/order.svg') }}"/><div>Order History</div></a></li>
				<li><a href="{{ route('deposithistory') }}"><img src="{{url('userpanel/images/deposit.svg') }}"/><div>Deposit History</div></a></li>
				<li><a href="{{ route('withdrawhistory') }}"><img src="{{url('userpanel/images/withdraw1.svg') }}"/><div>Withdraw History</div></a></li>
			</ul>
	</div>

	<article class="gridparentbox">		
		<div class="container sitecontainer">		
		<div class="panelcontentbox">	
            <h2 class="heading-box">Order History</h2>
					<div class="contentboxspace">
                    <div class="table-responsive sitescroll" data-simplebar>
				<table class="table sitetable table-responsive-stack" id="table1">	
							<thead>
								<tr>
									<th>Order type</th>
									<th>Date &amp; Time</th>
									<th>Order</th>
									<th>Pair</th>	
									<th>Amount</th>	
									<th>Price</th>	
									<th>Remaining</th>	
									<th>Trade Fee</th>	
									<th>Total</th>	
									<th>Status</th>	
									<th>Cancel</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-green">Buy</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
								<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-green">Buy</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-green">Buy</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-green">Buy</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-red">Sell</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-red">Sell</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-red">Sell</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-red">Sell</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-green">Buy</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-green">Buy</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
								<tr>
									<td>Limit</td>
									<td>11-12-2020,07:16:16</td>
									<td><span class="t-green">Buy</span></td>
									<td>BTC/USDT</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>0.25639</td>
									<td>Completed</td>
									<td><a href="#" class="btn sitebtn viewbtn">Cancel</a></td>
								</tr>
							</tbody>
						</table>
				</div>
		</div>
	</article>
@include('layouts.userpanel.footermenu')
	</div>
@include('layouts.userpanel.footer')
