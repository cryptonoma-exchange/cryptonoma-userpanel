@include('layouts.userpanel.header')
	<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
		<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
		<li><a href="{{ route('wallet') }}"><img src="{{url('userpanel/images/wallet1.svg') }}"/><div>Spot Wallet</div></a></li>
				<li><a href="{{ route('openorder') }}"><img src="{{url('userpanel/images/orderhistory.svg') }}"/><div>Open Orders</div></a></li>
				<li><a href="{{ route('orderhistory') }}"><img src="{{url('userpanel/images/order.svg') }}"/><div>Order History</div></a></li>
				<li><a href="{{ route('deposithistory') }}"><img src="{{url('userpanel/images/deposit.svg') }}"/><div>Deposit History</div></a></li>
				<li><a href="{{ route('withdrawhistory') }}" class="active"><img src="{{url('userpanel/images/withdraw1.svg') }}"/><div>Withdraw History</div></a></li>
			</ul>	
	</div>

	<article class="gridparentbox">		
		<div class="container sitecontainer">		
		<div class="panelcontentbox">	
            <h2 class="heading-box">Withdraw History</h2>
					<div class="contentboxspace">
                    <div class="table-responsive sitescroll" data-simplebar>
                    <table class="table sitetable table-responsive-stack" id="table1">
								<thead>
									<tr>
										<th>Date</th>
										<th>Amount</th>
										<th>Fee</th>
										<th>Total</th>
										<th>Staus</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>
									<tr>
										<td>18/02/2020, 05:05:00</td>
										<td>2563971</td>
										<td>0.1</td>
										<td>2563971</td>
										<td>Confirm</td>										
									</tr>									
								</tbody>
							</table>
				</div>
		</div>
	</article>
@include('layouts.userpanel.footermenu')
	</div>
@include('layouts.userpanel.footer')
