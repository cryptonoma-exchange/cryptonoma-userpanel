@include('layouts.userpanel.header')
	<div class="pagecontent gridpagecontent tradepage chartactive">
@include('layouts.userpanel.headermenu')
			<article class="gridparentbox tradecontentbox buyorderformactive">
				<div class="marketlistsidemenu">
					<ul class="marketlistt">
						<li>
							<div id="sidebarmarketlistCollapse"><i class="fa fa-arrow-left"></i></div>
							<div class="text-center">BTC/KES</div>
						</li>
					</ul>
				</div>
				<div class="container sitecontainer">
					<div class="mobilegrid tabs-nav">
						<li class="orderlist"><a href="#tab-1">Chart</a></li>
						<li class="orderlist"><a href="#tab-2">Open Orders</a></li>
						<li class="orderlist"><a href="#tab-3">Trade History</a></li>
					</div>
					<div class="buyselltabbg buyselltopbox">
						<ul class="nav nav-tabs orderfrmtab buyselltab" role="tablist">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#buy">Buy</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sell">Sell</a></li>
						</ul>
					</div>
					<div class="grid-box">
					<div class="livepricelist">
								<div class="livepricemobile">
									<ul class="livepricenavbg">
										<li><a class="livepricet dropdown-toggle" data-toggle="dropdown"><img src="{{ url('images/color/btc.svg') }}" class="coinlisticon"><span>BTC/KES</span></a>
												<div class="dropdown-menu dropdown-large panelcontentbox">
												<div class="marketlist">
													<h2 class="heading-box">Markets</h2>
													<div id="closemarketicon" class="closeiconlist"><i class="fa fa-arrow-right"></i></div>
													<div class="seacrhbox">
														<form class="siteformbg">
															<div class="form-group">
																<div class="input-group">
																	<input class="form-control" placeholder="Search coin name">
																	<div class="input-group-append"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
																</div>
															</div>
														</form>
													</div>
													<div class="table-responsive" data-simplebar>
														<table class="table sitetable">
															<thead>
																<tr>
																	<th>Pair</th>
																	<th>Price</th>
																	<th>24h change</th>
																	<th>24 volume</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><img src="{{ url('images/color/btc.svg') }}" class="coinlisticon">BTC/KES</td>
																	<td>256.36259548</td>
																	<td><span class="t-green">2.20% <i class="fa fa-arrow-up"></i></span></td>
																	<td>6.36259548</td>
																</tr>
																<tr>
																	<td><img src="{{ url('images/color/eth.svg') }}" class="coinlisticon">ETH/KES</td>
																	<td>256.36259548</td>
																	<td><span class="t-red">2.20% <i class="fa fa-arrow-down"></i></span></td>
																	<td>6.36259548</td>
																</tr>
																<tr>
																	<td><img src="{{ url('images/color/ltc.svg') }}" class="coinlisticon">LTC/KES</td>
																	<td>256.36259548</td>
																	<td><span class="t-green">2.20% <i class="fa fa-arrow-up"></i></span></td>
																	<td>6.36259548</td>
																</tr>
																<tr>
																	<td><img src="{{ url('images/color/xrp.svg') }}" class="coinlisticon">XRP/KES</td>
																	<td>256.36259548</td>
																	<td><span class="t-green">2.20% <i class="fa fa-arrow-up"></i></span></td>
																	<td>6.36259548</td>
																</tr>
																<tr>
																	<td><img src="{{ url('images/color/bch.svg') }}" class="coinlisticon">BCH/KES</td>
																	<td>256.36259548</td>
																	<td><span class="t-green">2.20% <i class="fa fa-arrow-up"></i></span></td>
																	<td>6.36259548</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
										</div>
										</li>
										<li><a class="livepricet">Last Price<span class="t-green livechangeprice"><div class="kesprice">256.236589</div><div class="usdprice">$3.256</div></span></a></li>
										<li><a class="livepricet">24H change<span class="t-green">0.236589</span></a></li>
										<li><a class="livepricet">24H high<span>0.236589</span></a></li>
										<li><a class="livepricet">24H low<span>0.236589</span></a></li>
										<li><a class="livepricet">24H volume<span>0.236589 KES</span></a></li>
										<li class="pricechangebox">
										<a class="livepricet">
												<form class="siteformbg">
													<select class="form-control" id="priceslect">
														<option class="option-1">KES</option>
														<option class="option-2">USD</option>
													</select>
												</form>
											</a>
										</li>
								</ul>
							</div>
						</div>

							<div class="walletbalance">
							<h2 class="heading-box">Assets</h2>
							<table class="table sitetable">
							<thead>
								<tr>
									<th>Coin</th>
									<th class="text-right">Available</th>
								</tr>
							</thead>
								<tbody>
									<tr>
									<td>BTC</td>
									<td class="text-right">23.6589</td>
								</tr>
								<tr class="hrline">
								<td colspan="2" class="text-center"><a href="#" class="btn viewbtn green-btn mr-2">Deposit</a><a href="#" class="btn viewbtn red-btn">Withdraw</a></td>
							</tr>
								<tr>
									<td>KES</td>
									<td class="text-right">23.6589</td>
								</tr>								
								<tr class="hrline">
								<td colspan="2" class="text-center"><a href="#" class="btn viewbtn green-btn mr-2">Deposit</a><a href="#" class="btn viewbtn red-btn">Withdraw</a></td>
							</tr>
							</tbody></table>
						</div>
					<div class="chart">
								<ul class="nav nav-tabs tabbanner charttabbg" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tradechart">Trading view</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#marketdepth">Depth</a>
									</li>
								</ul>							
							<div class="tab-content contentbox">
								<div id="tradechart" class="tab-pane tradechartlist active">
									<div class="tradingview-widget-container">
										<div id="tradingview_49396"></div>
										<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>										
										<script type="text/javascript">
										new TradingView.widget({
											autosize: !0,
											fullscreen: !0,
											symbol: "Binance:BTCUSD",
											interval: "5",
											timezone: "UTC",
											toolbar_bg: "#fff",
											theme: "Light",
											style: "1",
											locale: "en",
											toolbar_bg: "#f1f3f6",
											enable_publishing: !1,
											allow_symbol_change: !1,
											container_id: "tradingview_49396",
											withdateranges: !0,
											hide_side_toolbar: !1,
											hide_legend: !0
										});
										</script>
									</div>
								</div>
								<div id="marketdepth" class="marketchart tab-pane">
								<div id="chartdiv"></div>
								<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
								<script src="https://www.amcharts.com/lib/3/serial.js"></script>
								<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
								<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
								<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all">
								<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
							</div>
									</div>
									</div>
						
						<div class="orderbook buysellshow">
							<h2 class="heading-box">Order Book</h2>
							<div class="tabrightbox">
								<ul class="nav nav-tabs tabbanner charttabbg orderchangebg">
									<li class="nav-item"><a class="nav-link" id="buysellshow"><img src="{{ url('images/chart1.svg') }}"/></a></li><li class="nav-item"><a class="nav-link" id="buyshow"><img src="{{ url('images/chart2.svg') }}"/></a></li><li class="nav-item"><a class="nav-link" id="sellshow"><img src="{{ url('images/chart3.svg') }}"/></a></li>
							</ul>
									</div>
							<div class="orderbookscroll">
								<div class="table-responsive sitescroll" data-simplebar>
									<table class="table sitetable">
										<thead>
											<tr>
												<th>Price(KES)</th>
												<th>Amount(BTC)</th>
												<th>Total(KES)</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="sellboxorder" id="sellorderbox">
									<div class="table-responsive sitescroll" id="sellpagescroll">
										<div class="sellboxtablebg">
											<table class="table sitetable">
												<thead>
													<tr>
														<th>Price(KES)</th>
														<th>Amount(BTC)</th>
														<th>Total(KES)</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><span class="t-red">0.005198759560</span></td>
														<td>0.005198759560</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.25639</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.005198759560</span></td>
														<td>0.005198759560</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.25639</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.005198759560</span></td>
														<td>0.005198759560</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.25639</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.005198759560</span></td>
														<td>0.005198759560</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.25639</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.005198759560</span></td>
														<td>0.005198759560</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.25639</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.005198759560</span></td>
														<td>0.005198759560</td>
														<td>0.005198759560</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00520674897</span></td>
														<td>0.25639</td>
														<td>0.25639</td>
													</tr>
													<tr>
														<td><span class="t-red">0.00525</span></td>
														<td>0.25639</td>
														<td>0.005198759560</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="livepricebox" id="livepricebox">
									<table class="table sitetable">
										<thead>
											<tr>
												<th><span class="t-green">0.256</span></th>
												<th>0.001%</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="buyboxorder" id="buyorderbox">
									<div class="table-responsive sitescroll" data-simplebar>
										<table class="table sitetable">
											<thead>
												<tr>
													<th>Price(KES)</th>
													<th>Amount(BTC)</th>
													<th>Total(KES)</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.02563</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
												<tr>
													<td><span class="t-green">0.00525</span></td>
													<td>0.25639</td>
													<td>0.25639</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="orderform">
						<h2 class="heading-box">Order Form</h2>
							<ul class="ruleslist">
								<li><a><i class="fa fa-info-circle" aria-hidden="true"></i> Trading Rules<div class="none rulesnotes"><table class="table sitetable"><tbody><tr><td>Minimum Trade Amount :</td><td>0.000001 BTC</td></tr><tr><td>Min Price Movement :</td><td>0.000001 KES</td></tr><tr><td>Minimum Order Size :</td><td>0.000001 KES</td></tr><tr><td>Maximum Market Order Amount :</td><td>0.000001 BTC</td></tr></tbody></table></div></a></li>
							</ul>
							<div class="orderformbg">
								<div class="orderformbg1">
									<div class="buyselltabbg"><ul class="nav nav-tabs orderfrmtab buyselltab" role="tablist"><li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#buy">Buy</a></li><li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sell">Sell</a></li></ul></div>
									<div class="clostbuytab"><a href="#"><i class="fa fa-times"></i></a></div>
									<div class="tab-content">
										<div id="buy" class="tab-pane active">
										<ul class="nav nav-tabs orderfrmtab limitabbg" role="tablist"><li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#limit">Limit</a></li><li class="nav-item"><a class="nav-link" data-toggle="tab" href="#market">Market</a></li></ul>
											<div class="tab-content">
												<div id="limit" class="tab-pane active">
													<div class="buyorderform">
														<div class="balancewlt">
															<h6 class="h6"><img src="{{ url('images/wallet.svg') }}">0.00000000 KES</h6></div>
														<form class="siteformbg">
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Price</span></div>
																	<input class="form-control" placeholder="Price">
																	<div class="input-group-append"><span class="input-group-text">KES</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Amount</span></div>
																	<input class="form-control" placeholder="Amount">
																	<div class="input-group-append"><span class="input-group-text">BTC</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Total</span></div>
																	<input class="form-control" placeholder="Total">
																	<div class="input-group-append"><span class="input-group-text">KES</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="control-value-box stoplimtboxt">
																	<div>limitcount</div>
																	<div>
																		<div class="row link-div">
																			<div class="col activelimit" onclick="calculateBuyAmount(&quot;25&quot;)">25%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;50&quot;)">50%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;75&quot;)">75%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;100&quot;)">100%</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="errormsgbox"></div>
															<div>
																<input type="submit" name="" class="btn btn-block sitebtn green-btn" value="Buy">
															</div>
														</form>
													</div>
												</div>
												<div id="market" class="tab-pane">
													<div class="buyorderform">
														<div class="balancewlt">
															<h6 class="h6"><img src="{{ url('images/wallet.svg') }}">0.00000000 KES</h6></div>
														<form class="siteformbg">
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Price</span></div>
																	<input class="form-control" placeholder="Price">
																	<div class="input-group-append"><span class="input-group-text">KES</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Amount</span></div>
																	<input class="form-control" placeholder="Amount">
																	<div class="input-group-append"><span class="input-group-text">BTC</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="control-value-box stoplimtboxt">
																	<div>limitcount</div>
																	<div>
																		<div class="row link-div">
																			<div class="col activelimit" onclick="calculateBuyAmount(&quot;25&quot;)">25%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;50&quot;)">50%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;75&quot;)">75%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;100&quot;)">100%</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="errormsgbox"></div>
															<div>
																<input type="submit" name="" class="btn btn-block sitebtn green-btn" value="Buy">
															</div>
														</form>
													</div>											
												</div>
											</div>
										</div>
										<div id="sell" class="tab-pane">
										<ul class="nav nav-tabs orderfrmtab limitabbg" role="tablist"><li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#limit1">Limit</a></li><li class="nav-item"><a class="nav-link" data-toggle="tab" href="#market1">Market</a></li></ul>										
											<div class="tab-content">
												<div id="limit1" class="tab-pane active">
													<div class="buyorderform">
														<div class="balancewlt">
															<h6 class="h6"><img src="{{ url('images/wallet.svg') }}">0.00000000 KES</h6></div>
														<form class="siteformbg">
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Price</span></div>
																	<input class="form-control" placeholder="Price">
																	<div class="input-group-append"><span class="input-group-text">KES</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Amount</span></div>
																	<input class="form-control" placeholder="Amount">
																	<div class="input-group-append"><span class="input-group-text">BTC</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Total</span></div>
																	<input class="form-control" placeholder="Total">
																	<div class="input-group-append"><span class="input-group-text">KES</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="control-value-box stoplimtboxt">
																	<div>limitcount</div>
																	<div>
																		<div class="row link-div">
																			<div class="col activelimit" onclick="calculateBuyAmount(&quot;25&quot;)">25%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;50&quot;)">50%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;75&quot;)">75%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;100&quot;)">100%</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="errormsgbox"></div>
															<div>
																<input type="submit" name="" class="btn btn-block sitebtn red-btn" value="Sell">
															</div>
														</form>
													</div>
												</div>
												<div id="market1" class="tab-pane">
													<div class="buyorderform">
														<div class="balancewlt">
															<h6 class="h6"><img src="{{ url('images/wallet.svg') }}">0.00000000 KES</h6></div>
														<form class="siteformbg">
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Price</span></div>
																	<input class="form-control" placeholder="Price">
																	<div class="input-group-append"><span class="input-group-text">KES</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-prepend"><span class="input-group-text">Amount</span></div>
																	<input class="form-control" placeholder="Amount">
																	<div class="input-group-append"><span class="input-group-text">BTC</span></div>
																</div>
															</div>
															<div class="form-group">
																<div class="control-value-box stoplimtboxt">
																	<div>limitcount</div>
																	<div>
																		<div class="row link-div">
																			<div class="col activelimit" onclick="calculateBuyAmount(&quot;25&quot;)">25%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;50&quot;)">50%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;75&quot;)">75%</div>
																			<div class="col" onclick="calculateBuyAmount(&quot;100&quot;)">100%</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="errormsgbox"></div>
															<div>
																<input type="submit" name="" class="btn btn-block sitebtn red-btn" value="Sell">
															</div>
														</form>
													</div>											
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tradehistory">
							<h2 class="heading-box">Trade History</h2>
							<div class="table-responsive sitescroll" data-simplebar>
								<table class="table sitetable table-responsive-stack" id="table1">
									<thead>
										<tr>
											<th>Price(KES)</th>
											<th>Amount(BTC)</th>
											<th>Total(KES)</th>
											<th>Date & Time</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-green">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
										<tr>
											<td><span class="t-red">0.36985936</span></td>
											<td>0.25639</td>
											<td>0.25639</td>
											<td>11-12-19,07:16:16</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="openorder">
							<div class="innerpagetab historytab">
								<ul class="nav nav-tabs tabbanner" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#openorder">Open Orders</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#orderhistory">My Order History</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tradehistory">My Trade History</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div id="openorder" class="tab-pane active">
									<h2 class="heading-box">Open Orders</h2>
									<div class="table-responsive sitescroll" data-simplebar>
										<table class="table sitetable table-responsive-stack" id="table2">
											<thead>
												<tr>
													<th>Order type</th>
													<th>Date & Time</th>
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
													<td>BTC/KES</td>
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
													<td>BTC/KES</td>
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
													<td>BTC/KES</td>
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
													<td>BTC/KES</td>
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
													<td>BTC/KES</td>
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
								<div id="orderhistory" class="tab-pane">
									<h2 class="heading-box">Order History</h2>
									<div class="table-responsive sitescroll" data-simplebar>
										<table class="table sitetable table-responsive-stack" id="table3">
											<thead>
												<tr>
													<th>Order type</th>
													<th>Date & Time</th>
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
													<td>BTC/KES</td>
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
													<td>BTC/KES</td>
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
													<td>BTC/KES</td>
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
								<div id="tradehistory" class="tab-pane">
									<h2 class="heading-box">Trade History</h2>
									<div class="table-responsive sitescroll" data-simplebar>
										<table class="table sitetable table-responsive-stack" id="table4">
											<thead>
												<tr>
													<th>Date</th>
													<th>Pair</th>
													<th>Type</th>
													<th>Amount</th>
													<th>Staus</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Confirm</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-red">Sell</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Confirm</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-red">Sell</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Confirm</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-red">Sell</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Confirm</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-red">Sell</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Confirm</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-red">Sell</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Confirm</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-red">Sell</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-green">Buy</span></td>
													<td>2563971</td>
													<td>Confirm</td>
												</tr>
												<tr>
													<td>18/02/2020, 05:05:00</td>
													<td>BTC/USD</td>
													<td><span class="t-red">Sell</span></td>
													<td>2563971</td>
													<td>Wating</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
@include('layouts.userpanel.footermenu')
	</div>
@include('layouts.userpanel.footer')
<script>
		$("body").addClass("tradepagebg");
		</script>
		<script>
		function balloon(t, l) {
			var o;
			return o = "asks" == l.id ? "Ask: <strong>" + formatNumber(t.dataContext.value, l.chart, 4) + "</strong><br />Total volume: <strong>" + formatNumber(t.dataContext.askstotalvolume, l.chart, 4) + "</strong><br />Volume: <strong>" + formatNumber(t.dataContext.asksvolume, l.chart, 4) + "</strong>" : "Bid: <strong>" + formatNumber(t.dataContext.value, l.chart, 4) + "</strong><br />Total volume: <strong>" + formatNumber(t.dataContext.bidstotalvolume, l.chart, 4) + "</strong><br />Volume: <strong>" + formatNumber(t.dataContext.bidsvolume, l.chart, 4) + "</strong>"
		}

		function formatNumber(t, l, o) {
			return AmCharts.formatNumber(t, {
				precision: o ? o : l.precision,
				decimalSeparator: l.decimalSeparator,
				thousandsSeparator: l.thousandsSeparator
			})
		}
		var chart = AmCharts.makeChart("chartdiv", {
			type: "serial",
			theme: "dark",
			dataLoader: {
				url: "https://poloniex.com/public?command=returnOrderBook&currencyPair=BTC_ETH&depth=50",
				format: "json",
				reload: 30,
				postProcess: function(t) {
					function l(t, l, a) {
						for(var e = 0; e < t.length; e++) t[e] = {
							value: Number(t[e][0]),
							volume: Number(t[e][1])
						};
						if(t.sort(function(t, l) {
								return t.value > l.value ? 1 : t.value < l.value ? -1 : 0
							}), a)
							for(var e = t.length - 1; e >= 0; e--) {
								e < t.length - 1 ? t[e].totalvolume = t[e + 1].totalvolume + t[e].volume : t[e].totalvolume = t[e].volume;
								var u = {};
								u.value = t[e].value, u[l + "volume"] = t[e].volume, u[l + "totalvolume"] = t[e].totalvolume, o.unshift(u)
							} else
								for(var e = 0; e < t.length; e++) {
									e > 0 ? t[e].totalvolume = t[e - 1].totalvolume + t[e].volume : t[e].totalvolume = t[e].volume;
									var u = {};
									u.value = t[e].value, u[l + "volume"] = t[e].volume, u[l + "totalvolume"] = t[e].totalvolume, o.push(u)
								}
					}
					var o = [];
					return l(t.bids, "bids", !0), l(t.asks, "asks", !1), o
				}
			},
			graphs: [{
				id: "bids",
				fillAlphas: .1,
				lineAlpha: 1,
				lineThickness: 2,
				lineColor: "#0f0",
				type: "step",
				valueField: "bidstotalvolume",
				balloonFunction: balloon
			}, {
				id: "asks",
				fillAlphas: .1,
				lineAlpha: 1,
				lineThickness: 2,
				lineColor: "#f00",
				type: "step",
				valueField: "askstotalvolume",
				balloonFunction: balloon
			}, {
				lineAlpha: 0,
				fillAlphas: .2,
				lineColor: "#000",
				type: "column",
				clustered: !1,
				valueField: "bidsvolume",
				showBalloon: !1
			}, {
				lineAlpha: 0,
				fillAlphas: .2,
				lineColor: "#000",
				type: "column",
				clustered: !1,
				valueField: "asksvolume",
				showBalloon: !1
			}],
			categoryField: "value",
			chartCursor: {},
			balloon: {
				textAlign: "left"
			},
			valueAxes: [{
				title: "Volume"
			}],
			categoryAxis: {
				title: "Price (BTC/ETH)",
				minHorizontalGap: 100,
				startOnAxis: !0,
				showFirstLabel: !1,
				showLastLabel: !1
			},
			"export": {
				enabled: !0
			}
		});
		</script>