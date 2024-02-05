@php
$active='trade';
@endphp
@include('inc.homepage.header')
<div class="pagecontent gridpagecontent tradepage">	
  @include('inc.homepage.headermenu') 
	<article class="gridparentbox tradecontentbox"> 

		<div class="marketlistsidemenu">
			<ul class="marketlistt">
				<li><div id="sidebarmarketlistCollapse"><i class="fa fa-arrow-left"></i></div><div class="text-center">{{$coinone }}/{{$cointwo }}</div></li>
			</ul>
		</div>

		<div class="container sitecontainer">
			<div class="grid-box">	
				<div class="livepricelist">
					<div class="livepricemobile">
						<ul class="livepricenavbg">	
						<li><a class="livepricet coinlisttable">
							<img src="{{ url('userpanel/images/color/'.strtolower($coinone).'.svg') }}" class="coinlisticon" />
							<div>{{$coinone }}/{{$cointwo }}<span>{{$coinone_name}}</span></div></a>
						</li>
						<li><a class="livepricet">Last price<span class="t-red orderprice">0.236589</span></a></li>
						<li><a class="livepricet">24H change<span class="t-green" id='hoursexchange'>0.236589</span></a></li>
						<li><a class="livepricet">24H high<span class="orderprice">0.236589</span></a></li>
						<li><a class="livepricet">24H low<span class="orderprice">0.236589</span></a></li>
						<li><a class="livepricet" >24H volume<span id='hoursvoume'>0.236589 USDT</span></a></li>
						</ul>	
					</div>
				</div>			
			<div class="marketlist">
				<div id="closemarketicon" class="closeiconlist"><i class="fa fa-arrow-right"></i></div>

					<h2 class="heading-box">Markets</h2>
									

					<div class="seacrhbox">
						<form class="siteformbg">
							<div class="form-group">										
								<div class="input-group">	
									<input type="text" class="form-control" placeholder="Search coin name">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fa fa-search"></i></span>
									</div>
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
							<tbody id="livemarket">  


								@foreach ($marketpairs as $key => $value)
								@foreach($value as $keys)
								<tr class=" {{ ($coinone == $keys && $cointwo == $key)?'activerow':''}}" 
								onclick="window.location='{{ url('/trades/'.$keys.'_'.$key )}}'" style="cursor: pointer;">
									<td><img src="{{ url('userpanel/images/color/'.strtolower($keys).'.svg') }}" class="coinlisticon">{{ $keys }}/{{ $key }}</td>
									<td>{{ display_format($last[$key][$keys]) }}</td>
									<td><span class="t-green">{{ $change_percentage[$key][$keys] }} % <i class="fa fa-arrow-up"></i></span></td>
									<td>{{ display_format($volume[$key][$keys]) }}</td>
								</tr>
								@endforeach
								@endforeach 
 
							</tbody>
						</table>
					</div>			

			
				</div>
				<div class="chart">
				<h2 class="heading-box">Chart</h2>
					<div class="tabrightbox">
						<ul class="nav nav-tabs tabbanner charttabbg" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tradechart">
									<span class="chartshow"><img src="{{ url('userpanel/images/tradechart.png') }}" /></span>
									<span class="charthide"><img src="{{ url('userpanel/images/tradechart1.png') }}" /></span>
								</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#marketdepth">
								<span class="chartshow"><img src="{{ url('userpanel/images/marketdepth.png') }}" /></span>
								<span class="charthide"><img src="{{ url('userpanel/images/marketdepth1.png') }}" /></span>
							</a>
							</li>					
						</ul>
					</div>
					<div class="tab-content contentbox">
						<div id="tradechart" class="tab-pane active tradechartlist">
						<div class="tradingview-widget-container">
 								<div id="tradingview_49396" class="tradechartlist" ></div>
 								<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
								<script type="text/javascript" src="{{ url('/js/charting-library/charting_library.min.js') }}"></script>
								<script type="text/javascript" src="{{ url('/js/datafeeds/udf/dist/polyfills.js') }}"></script>
								<script type="text/javascript" src="{{ url('/js/datafeeds/udf/dist/bundle.js') }}"></script>
								
								<script type="text/javascript">
								 TradingView.onready(function()
									{
										var widget = window.tvWidget = new TradingView.widget({									
											datafeed: new Datafeeds.UDFCompatibleDatafeed("{{ url('/history') }}"),
											library_path: "{{ url('/js/charting-library') }}/", 
											autosize: true,
											fullscreen: !0,
											symbol: '{{ $coinone.'/'.$cointwo }}',
											interval: "5",
											timezone: "UTC",
											theme: "Dark",
											style: "1",
											locale: "en",
											enable_publishing: !1,
											allow_symbol_change: !1,
											container_id: "tradingview_49396",
											charts_storage_url: 'http://saveload.tradingview.com',
											charts_storage_api_version: "1.1",
											drawings_access: { type: 'black', tools: [ { name: "Regression Trend" } ] },
											disabled_features: ["use_localstorage_for_settings"],
											enabled_features: ["study_templates"],
											withdateranges: !0,
											hide_side_toolbar: !1,
											hide_legend: !0  ,
											overrides: {
											"paneProperties.background": "#202123",
											"paneProperties.vertGridProperties.color": "#38393c",
											"paneProperties.horzGridProperties.color": "#38393c",
											"symbolWatermarkProperties.transparency": 90,
											"scalesProperties.textColor": "#fff",
											}
										});
									});
									function getParameterByName(name) {
										name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
										var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
										results = regex.exec(location.search);
										return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
									}

 									// // new TradingView.widget({
 									// 	autosize: !0,
 									// 	fullscreen: !0,
 									// 	symbol: "Binance:BTCUSDT",
 									// 	interval: "5",
 									// 	timezone: "UTC",
 									// 	toolbar_bg: "#fff",
 									// 	theme: "Light",
 									// 	style: "1",
 									// 	locale: "en",
 									// 	toolbar_bg: "#f1f3f6",
 									// 	enable_publishing: !1,
 									// 	allow_symbol_change: !1,
 									// 	container_id: "tradingview_49396",
 									// 	withdateranges: !0,
 									// 	hide_side_toolbar: !1,
 									// 	hide_legend: !0
 									// // });
 								</script>
 							</div>
						</div>
						<div id="marketdepth" class="tab-pane marketchart">	
							<div id="chartdiv" class=""></div>
								<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
								<script src="https://www.amcharts.com/lib/3/serial.js"></script>
								<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
								<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
								<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
								<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
							
					</div>
					</div>
				</div>
				<div class="orderbook buysellshow">
					<h2 class="heading-box">
					<div class="tabrightbox">						
						<ul class="nav nav-tabs tabbanner charttabbg orderchangebg">
							<li class="nav-item"><a class="nav-link" id="buysellshow"><img src="{{ url('userpanel/images/chart1.svg') }}"></a></li>
							<li class="nav-item"><a class="nav-link" id="buyshow"><img src="{{ url('userpanel/images/chart2.svg') }}"></a></li>					
							<li class="nav-item"><a class="nav-link" id="sellshow"><img src="{{ url('userpanel/images/chart3.svg') }}"></a></li>					
						</ul>
					</div>
					<div class="formrightbox">
						<div class="form-group">    
							<label>Groups</label>    
							<select class="form-control">
								<option value="0">0 decimals</option>
								<option value="1">1 decimals</option>
								<option value="2">2 decimals</option>
							</select>
						</div>
					</div>
					</h2>
					<div class="orderbookscroll">	
						<div class="table-responsive sitescroll" data-simplebar>
								<table class="table sitetable">	
									<thead>
										<tr>
											<th>Price ({{ $cointwo }})</th>
											<th class="text-right">Amount ({{ $coinone }})</th>
											<th class="text-right">Total ({{ $cointwo }})</th>
										</tr>
									</thead>
								</table>
						</div>
					<div class="sellboxorder" >
						<div class="table-responsive sitescroll"  id="sellpagescroll">
								<div class="sellboxtablebg">
								<table class="table sitetable">	
									<thead>
										<tr>
											<th>Price ({{ $cointwo }})</th>
											<th class="text-right">Amount ({{ $coinone }})</th>
											<th class="text-right">Total ({{ $cointwo }})</th>
										</tr>
									</thead>
									<tbody class="" id="sellOrderBook">
									@forelse($selltrades as $selltrade)
										@php
										$price = display_format($selltrade->price);
										$remaining = display_format($selltrade->remaining);
										@endphp 
										<tr onclick="sellRow('{{ $price }}','{{ $remaining }}');">
											<td><span class="t-red">{{ display_format($selltrade->price,$cointwo_decimal) }}</span></td>
											<td class="text-right">{{ display_format($selltrade->remaining,$coinone_decimal) }}</td>	 
											<td class="text-right">{{ ncMul($selltrade->price,$selltrade->remaining,$cointwo_decimal)}}</td>	
										</tr>
										@empty
										<tr>
										<td class="text-center" colspan=3>@lang('common.trade.norecordsfound')</td>
										</tr>
										@endforelse  
									</tbody>										
								</table>									
					</div>		
						</div>	
						</div>	
						<div class="livepricebox" id="livepricebox"> 							
							<table class="table sitetable">	
								<thead>  
									<tr>
										<th><span class="t-red">{{ display_format($last[$cointwo][$coinone], $cointwo_decimal) }}</span></th>
										<th class="text-right"><span id="orderpercent">{{ display_format($change_percentage[$cointwo][$coinone], 2) }}</span> %</th>	
										<th class="text-right"><a href="buysellhistory.php">More</a><i class="fa fa-signal"></i></th>		
									</tr>
								</thead>
							</table>
						</div>
						<div class="buyboxorder"  > 
						<div class="table-responsive sitescroll" data-simplebar>
								<table class="table sitetable">
									<thead>
									<tr>
									    <th>Price ({{ $cointwo }})</th>
										<th class="text-right">Amount ({{ $coinone }})</th>
										<th class="text-right">Total ({{ $cointwo }})</th>
									</tr>
								</thead>
								<tbody id="buyOrderBook"> 

									@forelse($buytrades as $buytrade)
									@php
									$bprice  = $buytrade->price;
									$bquantity  = $buytrade->remaining;
									@endphp 
									<tr onclick="buyRow('{{ display_format($bprice) }}','{{ display_format($bquantity) }}');">
										<td><span class="t-green">{{ display_format($buytrade->price,$cointwo_decimal) }}</span></td>
										<td class="text-right">{{ display_format($buytrade->remaining,$coinone_decimal) }}</td>	 									
										<td class="text-right">{{ ncMul($buytrade->price,$buytrade->remaining,$cointwo_decimal)}}</td>	
									</tr>
									@empty
									<tr>
									<td class="text-center" colspan=3>@lang('common.trade.norecordsfound')</td>
									</tr>
									@endforelse   
									</tbody>										
								</table>									
							</div>					
						</div>	
				</div>
			</div>
				
			<div class="orderform">
			
			<ul class="ruleslist">
					<li><a><i class="fa fa-info-circle" aria-hidden="true"></i> Trading Rules
						<div class="none rulesnotes">
							<table class="table sitetable">
								<tbody>
									<tr>
										<td>Minimum Trade Amount : </td>
										<td>0.000001 BTC</td>
									</tr>
									<tr>
										<td>Min Price Movement : </td>
										<td>0.000001 USDT</td>
									</tr>
									<tr>
										<td>Minimum Order Size : </td>
										<td>0.000001 USDT</td>
									</tr>
									<tr>
										<td>Maximum Market Order Amount : </td>
										<td>0.000001 BTC</td>
									</tr>																	
								</tbody>
							</table>
						</div>
					</a>
					</li>
					</ul>

				<div class="orderformbg">
				<!--new!-->
					<div class="buyselltabbg">
						<ul class="nav nav-tabs orderfrmtab buyselltab" role="tablist">
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#buy">Buy</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sell">Sell</a></li>	
						</ul>
					</div>
					<!--new!-->

					<ul class="nav nav-tabs orderfrmtab limitabbg" role="tablist">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#limit"><img  src="{{ url('userpanel/images/limit.svg') }}"/>Limit</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#market"><img src="{{ url('userpanel/images/market.svg') }}"/>Market</a></li>	
														
						</ul>	
					</div>

				
				
				<div class="tab-content">
				<input type="hidden" placeholder="" class="input-xlarge" id="pairvalue"   value="{{$pair}}" >
						<div id="limit" class="tab-pane active">
								<div class="orderformbg1">	
										<div class="buyorderform">	
										<h2 class="heading-box">Buy {{ $coinone }}</h2>
										<div class="balancewlt">
										<h6 class="h6"><img src="{{ url('userpanel/images/wallet.svg') }}"/> <span id="coinTwobalance">@if(isset($balance[$cointwo]['balance'])){{ display_format($balance[$cointwo]['balance'],$cointwo_decimal) }}@else{{ display_format(0, $cointwo_decimal) }}@endif</span> {{ $cointwo }}</h6>
										</div> 
											<form class="siteformbg" id="buylimit" >
											{{ csrf_field() }}
											<div id="buystatus" style="display:none"></div>
													<div id="buylimitmsg" class="text-center" style="color: red;">
													</div>
												<div class="form-group">	
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Price</span>
														</div>
														<input id="buyprice" type="number" placeholder="" onkeypress="return AvoidSpace(event)" class="form-control" name="buyprice" step="0.000001" min="0" max="100000000"  value="{{ $last[$cointwo][$coinone] }}" placeholder="Price">	 
														<div class="input-group-append">
														  <span class="input-group-text">{{ $cointwo }}</span>
														  @if ($errors->has('buyprice'))
																<span class="help-block">
																	<strong style="color: red;">{{ $errors->first('buyprice') }}</strong>
																</span>
															@endif
														</div>
													  </div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Amount</span>
														</div>
														<input id="buyvolume" type="number" placeholder=""  onkeypress="return AvoidSpace(event)" class="form-control" name="buyvolume" step="0.000001" min="0" max="100000000" placeholder="Amount">		<div class="input-group-append">
														  <span class="input-group-text">{{ $coinone }}</span>
														  @if ($errors->has('buyvolume'))
																	<span class="help-block">
																		<strong style="color: red;">{{ $errors->first('buyvolume') }}</strong>
																	</span>
														  @endif
														</div>
													  </div>
												</div>	
												<input type="hidden" placeholder="" class="input-xlarge" id="buypair" name="buypair" value="{{ $pair }}" />								
												<div class="form-group">											
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Total</span>
														</div>
														<input type="text" placeholder="" class="form-control" onkeypress="return AvoidSpace(event)" id="buytotal" name="buytotal" placeholder="Total" readonly="">  
														<div class="input-group-append">
														  <span class="input-group-text">{{ $cointwo }}</span>
														</div>
													  </div>
												</div>
												<div class="form-group">
													<div class="control-value-box stoplimtboxt">  
													<div>limitcount</div>
													<div><div class="row link-div">
														<div class="col buypercnt activelimit" onclick="Fillbuyvolume(25)">25%</div>
														<div class="col buypercnt" onclick="Fillbuyvolume('50')">50%</div>
														<div class="col buypercnt" onclick="Fillbuyvolume('75')">75%</div>
													    <div class="col buypercnt" onclick="Fillbuyvolume('100')">100%</div>
													</div>
													</div>
													</div>
												</div> 
												 <div class="form-group fee-formbox">	
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Fee</span>
														</div>
														<span class="feeamt"><span id="buyfees">{{display_format(0, $cointwo_decimal)}}</span> {{ $cointwo }}</span>
													  </div>
												</div> 
													<div class="errormsgbox"></div>																								
												<div class="text-center">
												<a href='{{url('/login')}}'><input   name="" class="btn btn-sm yellow-btn mr-1" value="Login" /></a>
												</div>
											</form>
										</div>

										<div class="sellorderform">		
										<h2 class="heading-box">Sell {{ $coinone }}</h2>
										<div class="balancewlt">
										<h6 class="h6"><img src="{{ url('userpanel/images/wallet.svg') }}"/><span id="coinOnebalance">@if(isset($balance[$coinone]['balance']))
								{{ display_format($balance[$coinone]['balance'],$coinone_decimal) }} 
								@else
								0.00000000 
								@endif</span> {{ $coinone }}</h6>
										</div> 
										   <form class="siteformbg" id="sellimit">
										   <div id="sellstatus" style="display:none"></div>
		                                  <div id="selllimitmsg" class="text-center" style="color: red;"></div>
											{{ csrf_field() }}
										 
												<div class="form-group">											
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Price</span>
														</div>
														<input type="number" placeholder=""  onkeypress="return AvoidSpace(event)" class="form-control" id="sellprice" name="sellprice" required="required" step="0.0001" min="0" max="1000000" value="{{ $last[$cointwo][$coinone] }}" placeholder="Price">  
														<div class="input-group-append">
														  <span class="input-group-text">{{ $cointwo }}</span>
														  @if ($errors->has('sellprice'))
															<span class="help-block">
																<strong style="color: red;">{{ $errors->first('sellprice') }}</strong>
															</span>
														  @endif
														</div>
													  </div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Amount</span>
														</div>
														<input type="number" placeholder="" onkeypress="return AvoidSpace(event)" class="form-control" id="sellvolume" name="sellvolume"  required="required" step="0.0001" min="0" max="1000000" placeholder="Amount"> 
														<div class="input-group-append">
														  <span class="input-group-text">{{ $coinone }}</span>
														  @if ($errors->has('sellvolume'))
															<span class="help-block">
																<strong style="color: red;">{{ $errors->first('sellvolume') }}</strong>
															</span>
														  @endif
														</div>
													  </div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Total</span>
														</div>
														<input type="text" placeholder="" onkeypress="return AvoidSpace(event)" class="form-control" id="selltotal" name="selltotal" readonly="" onkeyup="if (/[^0-9.]/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')" >

														<div class="input-group-append">
														  <span class="input-group-text">{{ $cointwo }}</span>
														</div>
													  </div>
												</div>
												<div class="form-group">
													<div class="control-value-box stoplimtboxt">  
													<div>limitcount</div>
													<div><div class="row link-div">
														<div class="col sellpercnt activelimit" onclick="Fillsellvolume('25')">25%</div>
														<div class="col sellpercnt" onclick="Fillsellvolume('50')">50%</div>
														<div class="col sellpercnt" onclick="Fillsellvolume('75')">75%</div>
														<div class="col sellpercnt" onclick="Fillsellvolume('100')">100%</div>
													</div>
													</div>
													</div>
												</div>
												<div class="form-group fee-formbox">	
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Fee</span>
														</div>
														<span class="feeamt"><span id="sellfees">{{ display_format(0, $coinone_decimal) }}</span> {{ $coinone }}</span>
													  </div>
												</div>
												 <div class="errormsgbox"> </div> 
												 <input type="hidden" placeholder="" class="input-xlarge" id="sellpair" name="sellpair" value="{{$pair}}" >
											
												<div class="text-center">
												<a href='{{url('/login')}}'><input   name="" class="btn btn-sm yellow-btn mr-1" value="Login" /></a>
												</div>
											</form> 	

										</div>
									</div>
								</div>

							<div id="market" class="tab-pane">
								<div class="orderformbg1">	
										<div class="buyorderform">
										<h2 class="heading-box">Buy {{ $coinone }}</h2>
										<div class="balancewlt">
										<h6 class="h6"><img src="{{ url('userpanel/images/wallet.svg') }}"/><span id='coinTwobalance_market'>@if(isset($balance[$cointwo]['balance'])){{ display_format($balance[$cointwo]['balance'],$cointwo_decimal) }}@else{{ display_format(0,$cointwo_decimal) }}@endif </span> {{ $cointwo }}</h6>
										</div> 
											<form id="buymarket" class="siteformbg">
											{{ csrf_field() }}
											<div id="buymarketstatus" style="display:none"></div>
			                                   	<div id="buymarketmsg"> </div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Price</span>
														</div>
														<input type="text" placeholder="" onkeypress="return AvoidSpace(event)" class="form-control" value="Market Price" disabled="">
														<div class="input-group-append">
														<span class="input-group-text">{{ $cointwo }}</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Amount</span>
														</div>
														<input type="number" placeholder="" class="form-control" id="buymarketvolume" name="buymarketvolume" onkeyup="if (/[^0-9.]/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')" placeholder="Amount" required step="0.0001" min="0" max="1000000"> 
														<div class="input-group-append">
														<span class="input-group-text">{{ $coinone }}</span>
														</div>
													</div>
												</div>	
												<input type="hidden" placeholder="" class="input-xlarge" id="buypair" name="buypair" value="{{ $pair }}" >

												<div class="form-group">
													<div class="control-value-box stoplimtboxt">  
													<div>limitcount</div>
													<div><div class="row link-div">
														<div class="col buymarpercnt activelimit" onclick="Fillmarketbuyvolume('25')">25%</div>
														<div class="col buymarpercnt" onclick="Fillmarketbuyvolume('50')">50%</div>
														<div class="col buymarpercnt" onclick="Fillmarketbuyvolume('75')">75%</div>
														<div class="col buymarpercnt" onclick="Fillmarketbuyvolume('100')">100%</div>
													</div>
													</div>
													</div>
												</div>
												<div class="form-group fee-formbox">	
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Fee</span>
														</div>
														<span class="feeamt"><span id="marketbuyfees">{{ display_format(0, $cointwo_decimal) }}</span> {{ $cointwo }}</span>
													  </div>
												</div>

												<div class="errormsgbox"> </div>
												<div class="text-center">
												<a href='{{url('/login')}}'><input   name="" class="btn btn-sm yellow-btn mr-1" value="Login" /></a>
												</div>
											</form>
										</div>
								<div class="sellorderform">
								<h2 class="heading-box">Sell {{ $coinone }}</h2>
										<div class="balancewlt">
										<h6 class="h6"><img src="{{ url('userpanel/images/wallet.svg') }}"/><span id='coinOnebalance_market'>@if(isset($balance[$coinone]['balance'])){{ display_format($balance[$coinone]['balance'],$coinone_decimal) }}  
								@else
								0.00000000 
								@endif
								</span> {{ $coinone }}</h6>
										</div> 
									<form class="siteformbg"  id="sellmarket">
									{{ csrf_field() }}
									<div id="sellmarketstatus" style="display:none"></div>
		                             <div id="sellmarketmsg"></div>
										<div class="form-group">											
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Price</span>
												</div>
												<input type="text" placeholder="" onkeypress="return AvoidSpace(event)" class="form-control" value="Market Price" disabled="" placeholder='price'>
												<div class="input-group-append">
												  <span class="input-group-text">{{ $cointwo }}</span>
												</div>
											  </div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Amount</span>
												</div>
											
												<input type="number" placeholder="" onkeypress="return AvoidSpace(event)" class="form-control" id="sellmarketvolume" name="sellmarketvolume" onkeyup="if (/[^0-9.]/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')" required step="0.0001" min="0" max="1000000">
												<div class="input-group-append">
												  <span class="input-group-text">{{ $coinone }}</span>
												</div>
											  </div>
										</div>	
										<input type="hidden" placeholder="" class="input-xlarge" id="sellpair" name="sellpair" value="{{$pair}}" >

										<div class="form-group">
													<div class="control-value-box stoplimtboxt">  
													<div>limitcount</div>
													<div><div class="row link-div">
														<div class="col sellmarpercnt activelimit" onclick="Fillmarketsellvolume('25')">25%</div>
														<div class="col sellmarpercnt" onclick="Fillmarketsellvolume('50')">50%</div>
														<div class="col sellmarpercnt" onclick="Fillmarketsellvolume('75')">75%</div>
														<div class="col sellmarpercnt" onclick="Fillmarketsellvolume('100')">100%</div>
													</div>
													</div>
													</div>
												</div>
												<div class="form-group fee-formbox">	
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">Fee</span>
														</div>
														<span class="feeamt"><span id="marketsellfees">{{ display_format(0, $coinone_decimal) }}</span> {{ $coinone }}</span>
													  </div>
												</div>
												<div class="errormsgbox"> </div>
										<div class="text-center">
										<a href='{{url('/login')}}'><input   name="" class="btn btn-sm yellow-btn mr-1" value="Login" /></a>
										</div>
									</form>
								</div>
							</div>
						</div>

						
			</div>
			</div>
						
				<div class="tradehistory">
				<h2 class="heading-box">Trade History</h2>
					<div class="table-responsive sitescroll" data-simplebar>
						<table class="table sitetable">	
							<thead>
								<tr>
									<th>Price ({{ $cointwo }})</th>
									<th>Amount ({{ $coinone }})</th>
									<th>Total ({{ $cointwo }})</th>
									<th>Date & Time</th>	
								</tr>
							</thead>
							<tbody id='tradeHistory'>

							@forelse($completetrades as $completedtrade)
								<tr>
								@if($completedtrade->type == 'Buy')
									<td><span class="t-green">{{ display_format($completedtrade->price,$cointwo_decimal) }}</span></td>		
								@elseif($completedtrade->type == 'Sell')
								<td><span class="t-red">{{ display_format($completedtrade->price,$cointwo_decimal) }}</span></td>	
								@endif 
									<td>{{ display_format($completedtrade->volume,$coinone_decimal) }}</td>
									<td>{{ ncMul($completedtrade->price,$completedtrade->volume,$cointwo_decimal) }}</td>
									<td>{{ date('d-m-y,H:i:s',strtotime($completedtrade->created_at)) }}</td>
								</tr>
								@empty
								<tr>
								<td colspan=4>@lang('common.trade.norecordsfound')</td>
								</tr>
								@endforelse
							 
							</tbody>
						</table>
					</div>	
				</div>

		<div class="openorder">
				<div class="innerpagetab historytab">				
						<ul class="nav nav-tabs tabbanner" role="tablist">
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#open">Open Orders</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#orders">My Order History</a></li>
							<!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tradehistory">My Trade History</a></li> -->
						</ul>
					</div>

			<div class="tab-content">
				<div id="open" class="tab-pane active">
					<div class="table-responsive sitescroll" data-simplebar>
					@if(session('cancelsuccess'))
      <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ session('cancelsuccess') }}</strong>
      </div>                  
      @endif
      @if(session('cancelerror'))
      <div class="alert alert-warning alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ session('cancelerror') }}</strong>
      </div>
      @endif
						<table class="table sitetable">	
							<thead>
								<tr>
									<th>Order type</th>
									<th>Date & Time</th>
									<th>Order</th>							 
									<th>Pair</th>	
									<th>Price</th>
									<th>Amount</th>										
									<th>Remaining</th>	
									<th>Trade Fee</th>	
									<th>Total</th>	
									<th>Status</th>	
									<th>Cancel</th>
								</tr>
							</thead>
							<tbody id="myopenorders">

							@forelse($myopenorder as $myorders)
								@php
									$cancelled = 0.0000; 
									$remaining = $myorders['remaining'];
									if($myorders['status'] == 2){
									$remaining = 0.0000 ;
								}
								if($myorders['trade'] == '1')
								{
									$myototal1 = ncMul($myorders['price'], $myorders['volume'], 8);
									$myototal = ncAdd($myototal1,$myorders['fees'],8);
								}
								else
								{
									$myototal = ncMul($myorders['price'], $myorders['volume'], 8); 
								}
								@endphp
								<tr>
									<td>	@if($myorders['order_type'] == '1')
									@lang('common.Limit type')
									@else
									@lang('common.Market type')
									@endif</td>
									<td>{{ date('d-m-y,H:i:s',strtotime($myorders['created_at'])) }}</td>
									
									@if($myorders['trade'] == '1')
									<td><span class="t-green">Buy</span></td>
									@else
									<td><span class="t-red">Sell</span></td>
									@endif 
									<td>{{ $coinone.'/'.$cointwo }}</td>

									@if($myorders['trade'] == '1')
									<td><span class="t-green">{{ display_format($myorders['price'],$cointwo_decimal) }}</span></td>
									@else
									<td><span class="t-red">{{ display_format($myorders['price'],$cointwo_decimal) }}</span></td>
									@endif 
									<td>{{ display_format($myorders['volume'],$coinone_decimal) }}</td>
									<td>{{ display_format($myorders['remaining'],$cointwo_decimal) }}</td>
									<td>{{ display_format($myorders['fees'],$cointwo_decimal) }}</td>
									<td>{{ display_format($myototal,$cointwo_decimal) }}</td>
									<td>
										@if($myorders['status'] == 0 ) @lang('common.Pending') @elseif($myorders['status'] == 100 ) @lang('common.Cancelled') @else @lang('common.Completed')  @endif
									</td>
									@if($myorders['trade'] == '1')
									<td >
										<a href="{{ url('/tradecancelbuyorder/'.\Crypt::encrypt($myorders['id']).'/'.$myorders['pair']) }}" class="btn sitebtn viewbtn">Cancel</a>
									</td>
									@else
									<td>
										<a href="{{ url('/tradecancelsellorder/'.\Crypt::encrypt($myorders['id']).'/'.$myorders['pair']) }}" class="btn sitebtn viewbtn">Cancel</a>
									</td>
									@endif  
								</tr>		
								@empty
								<tr>	
									<td colspan='11'>@lang('common.trade.norecordsfound') </div>
									</tr>	
								@endforelse
							</tbody>
						</table>
					</div>					
				</div>
				<div id="orders" class="tab-pane">
				<div class="table-responsive sitescroll" data-simplebar>
							<table class="table sitetable">
								<thead>
									<tr>
										<th>Order type</th>
										<th>Date</th>
										<th>Order</th>
										<th>Pair</th>
										<th>Price</th>
										<th>Amount</th>
										<th>Remaining</th>
										<th>Total</th>
										<th>Trade Fee</th>
										<th>Status</th>  
									</tr>
								</thead>
								<tbody id="myallorders">
								@forelse($myallorder as $myorders)
								@php

								$cancelled = 0.0000; 
								$remaining = $myorders['remaining'];

								if($myorders['trade'] == '1')
								{
									$myototal1 = ncMul($myorders['price'], $myorders['volume'], 8);
									$myototal = ncAdd($myototal1,$myorders['fees'],8);
								}
								else
								{
									$myototal1 = ncMul($myorders['price'], $myorders['volume'], 8);
									$myototal = $myototal1;
								}
								@endphp
									<tr>
									<td>
										@if($myorders['order_type'] == '1')
											@lang('common.Limit type')
										@else
											@lang('common.Market type')
										@endif
									</td>
									<td>{{ date('d-m-y,H:i:s',strtotime($myorders['created_at'])) }}</td>

									@if($myorders['trade'] == '1')
									<td><span class="t-green">@lang('common.BUY')</span></td>
									@else
									<td><span class="t-red">@lang('common.SELL')</span></td>
									@endif
									<td>{{ $coinone.'/'.$cointwo }}</td>
									@if($myorders['trade'] == '1')
									<td>
										@if($myorders['order_type'] == '1')
										<span class="t-green">{{ display_format($myorders['price'],$cointwo_decimal) }}</span>
										@else
										@lang('common.Market price')
										@endif
									</td>
									@else
									<td>
										@if($myorders['order_type'] == '1')
										<span class="t-red">{{ display_format($myorders['price'],$cointwo_decimal) }}</span>
										@else
										@lang('common.Market price')
										@endif
									</td>
									@endif
									<td>{{ display_format($myorders['volume'],$coinone_decimal) }}</td>
									<td>{{ display_format($remaining,$cointwo_decimal) }}</td>
									<td>
										@if($myorders['order_type'] == '1')
										{{ display_format($myototal,$cointwo_decimal) }}
										@else
										{{ display_format($myorders['value'],$cointwo_decimal) }}
										@endif
									</td>
									<td>{{ display_format($myorders['fees'],$cointwo_decimal) }}</td>
                                    <td>
										@if($myorders['status'] == 0 ) @lang('common.Pending') @elseif($myorders['status'] == 3 ) @lang('common.Cancelled') @else @lang('common.Completed')  @endif
									</td>
									</tr>
								@empty
								<tr>
									<td class="text-center" colspan=10>@lang('common.trade.norecordsfound')</td>
							    </tr>
								@endforelse   
								</tbody>
							</table>
						</div>						
				</div>
			</div>
		</div>
		</div>
	</div>
</article>
		
@include('inc.homepage.footermenu') 
</div>	
@include('inc.homepage.footer')	
<script>
$("body").addClass("tradepagebg");
</script>

<script>
var chart = AmCharts.makeChart("chartdiv", {
"type": "serial",
"theme": "dark",
"data": {
		"_token": "{{ csrf_token() }}",
		"marketpair": $('#marketpair').val()

	},
"dataLoader": {
"url": "{{ url('marketdepthchart/'.$pair)}}",
"type": "POST",
"format": "json",
"reload": 30,
"postProcess": function(data) {

// Function to process (sort and calculate cummulative volume)
function processData(list, type, desc) {

// Convert to data points
for(var i = 0; i < list.length; i++) {
list[i] = {
value: Number(list[i][0]),
volume: Number(list[i][1]),
}
}

// Sort list just in case
list.sort(function(a, b) {
if (a.value > b.value) {
return 1;
}
else if (a.value < b.value) {
return -1;
}
else {
return 0;
}
});

// Calculate cummulative volume
if (desc) {
for(var i = list.length - 1; i >= 0; i--) {
if (i < (list.length - 1)) {
list[i].totalvolume = list[i+1].totalvolume + list[i].volume;
}
else {
list[i].totalvolume = list[i].volume;
}
var dp = {};
dp["value"] = list[i].value;
dp[type + "volume"] = list[i].volume;
dp[type + "totalvolume"] = list[i].totalvolume;
res.unshift(dp);
}
}
else {
for(var i = 0; i < list.length; i++) {
if (i > 0) {
list[i].totalvolume = list[i-1].totalvolume + list[i].volume;
}
else {
list[i].totalvolume = list[i].volume;
}
var dp = {};
dp["value"] = list[i].value;
dp[type + "volume"] = list[i].volume;
dp[type + "totalvolume"] = list[i].totalvolume;
res.push(dp);
}
}
}
// Init
var res = [];
processData(data.bids, "bids", true);
processData(data.asks, "asks", false);
//console.log(res);
return res;
}
},
"graphs": [{
"id": "bids",
"fillAlphas": 0.1,
"lineAlpha": 1,
"lineThickness": 2,
"lineColor": "#0f0",
"type": "step",
"valueField": "bidstotalvolume",
"balloonFunction": balloon
}, {
"id": "asks",
"fillAlphas": 0.1,
"lineAlpha": 1,
"lineThickness": 2,
"lineColor": "#f00",
"type": "step",
"valueField": "askstotalvolume",
"balloonFunction": balloon
}, {
"lineAlpha": 0,
"fillAlphas": 0.2,
"lineColor": "#000",
"type": "column",
"clustered": false,
"valueField": "bidsvolume",
"showBalloon": false
}, {
"lineAlpha": 0,
"fillAlphas": 0.2,
"lineColor": "#000",
"type": "column",
"clustered": false,
"valueField": "asksvolume",
"showBalloon": false
}],
"categoryField": "value",
"chartCursor": {},
"balloon": {
"textAlign": "left"
},
"valueAxes": [{
"title": "Volume"
}],
"categoryAxis": {
"title": "Price ({{ $coinone }}{{ '/' }}{{ $cointwo }})",
"minHorizontalGap": 100,
"startOnAxis": true,
"showFirstLabel": false,
"showLastLabel": false
},
"export": {
"enabled": true
}
});

function balloon(item, graph) {
var txt;
if (graph.id == "asks") {
txt = "Ask: <strong>" + formatNumber(item.dataContext.value, graph.chart, 4) + "</strong><br />"
+ "Total volume: <strong>" + formatNumber(item.dataContext.askstotalvolume, graph.chart, 4) + "</strong><br />"
+ "Volume: <strong>" + formatNumber(item.dataContext.asksvolume, graph.chart, 4) + "</strong>";
}
else {
txt = "Bid: <strong>" + formatNumber(item.dataContext.value, graph.chart, 4) + "</strong><br />"
+ "Total volume: <strong>" + formatNumber(item.dataContext.bidstotalvolume, graph.chart, 4) + "</strong><br />"
+ "Volume: <strong>" + formatNumber(item.dataContext.bidsvolume, graph.chart, 4) + "</strong>";
}
return txt;
}

function formatNumber(val, chart, precision) {
return AmCharts.formatNumber(
val, 
{
precision: precision ? precision : chart.precision, 
decimalSeparator: chart.decimalSeparator,
thousandsSeparator: chart.thousandsSeparator
}
);
}
</script>
<script language="javascript" type="text/javascript" >
/*$("#limitbuypercentage li").click(function() {

var coinTwobalance  =  $('#coinTwobalance_input').val();
var findpercentage = $(this).attr('id');
var find100per = parseFloat(findpercentage) / 100; 
var perprice       =  parseFloat(find100per) * parseFloat(coinTwobalance);
var liveprice = parseFloat($('#buyprice').val());	

var percentage = parseFloat({{ $buy_trade_contwo }}) ;
var pricefind = findincludingfee(perprice,percentage);	

var findvolume =  parseFloat(pricefind) / parseFloat(liveprice);
document.getElementById('buyprice').value = liveprice.toFixed(8);
document.getElementById('buyvolume').value = findvolume.toFixed(8);
document.getElementById('buymarketvolume').value = findvolume.toFixed(8);
buycal();

});

/*	$("#limitsellpercentage li").click(function() {
var coinonebalance  =  $('#coinonebalance_input').val();		
var exchangePercentage = $(this).attr('id');
var find100per = parseFloat(exchangePercentage) / 100; 
var perprice       =  parseFloat(find100per) * parseFloat(coinonebalance);
var liveprice = parseFloat($('#sellprice').val());
var percentage = parseFloat({{ $sell_trade_coinone }}) ;
var volume = findincludingfee(perprice,percentage);
document.getElementById('sellprice').value = liveprice.toFixed(8);
document.getElementById('sellvolume').value = volume.toFixed(8);
document.getElementById('sellmarketvolume').value = volume.toFixed(8);
sellcal();

});
*/

$('#buyvolume , #buyprice').on('keyup', function(){
	buycal();
});

$('#sellvolume, #sellprice').on('keyup', function(){
	sellcal();
});
$('#buyvolume , #buyprice').on('change', function(){
	buycal();
});

$('#sellvolume, #sellprice').on('change', function(){
	sellcal();
});


function findincludingfee(amount,percentage){		
	var amttax = parseFloat(amount) + parseFloat(percentage);
	var rateint = parseFloat(amount) / parseFloat(amttax);
	var CommissionValue = parseFloat(rateint) * parseFloat(percentage);
	var SpendAmount = parseFloat(amount) - parseFloat(CommissionValue);
	return SpendAmount;
}


function sellcal() {
	var sellprice = parseFloat($('#sellprice').val());
	var sellvolume = parseFloat($('#sellvolume').val());
	var selltotal = parseFloat(sellprice) * parseFloat(sellvolume);
	selltotal = selltotal.toFixed(8);
	var sellfee    = parseFloat(selltotal) * parseFloat({{ $commissionone }});		
	selltotal = parseFloat(selltotal);
	var fee    = parseFloat(sellvolume) * parseFloat({{ $commissionone }});

	if(sellprice > 0 &&  sellvolume > 0)
	{
		if(selltotal > 0){
			sellfees = fee.toFixed(9);
			document.getElementById('selltotal').value = toFixed(selltotal,{{ $cointwo_decimal }});
			$('#sellfees').html(sellfees.slice(0,-1));
		} else {
			$('#sellfees').html(toFixed(0,{{ $coinone_decimal }}));
			document.getElementById('selltotal').value = toFixed(0,{{ $cointwo_decimal }});
		}
	}
	else
	{
		$('#selltotal').val('');
	}
}

function buycal(){
	var buyprice = parseFloat($('#buyprice').val());
	var buyvolume = parseFloat($('#buyvolume').val());
	var buytotal = parseFloat(buyprice) * parseFloat(buyvolume);
	buytotal = buytotal.toFixed(8);
	var buyfee    = parseFloat(buytotal) * parseFloat({{ $commissiontwo }});	

	if(buyprice > 0 &&  buyvolume > 0)
	{
		buytotal = parseFloat(buytotal) + parseFloat(buyfee);
		var points    = parseFloat({{ $cointwo_decimal }}) + 1;
		buytotal = toFixed(buytotal,{{ $cointwo_decimal }});

		
		buyfee = toFixed(buyfee,{{ $cointwo_decimal }});
		if(buytotal > 0){
			document.getElementById('buytotal').value = buytotal;
			$('#buyfees').html(buyfee);
			$('#buytotal').html(buytotal);
		} else {
			$('#buyfees').html(toFixed(0,{{ $cointwo_decimal }}));
			document.getElementById('buytotal').value = toFixed(0,{{ $cointwo_decimal }});
		}
	}
	else
	{
		$('#buytotal').val('');
	}
}




function toFixed(num, fixed) {
	var re = new RegExp('^-?\\d+(?:\.\\d{0,' + (fixed || -1) + '})?');
	return num.toString().match(re)[0];
}

function sellRow(price,volume)
{

	document.getElementById("buyprice").value = price;
	document.getElementById("buyvolume").value = volume;
	document.getElementById("buymarketvolume").value = volume;

	$('.green-bg').addClass('active');
	$('#buy').addClass('active in');
	$('#buy-limit-order').addClass('active in');
	$('#buy-market-order').removeClass('active in');

	$('.red-bg').removeClass('active');
	$('#sell').removeClass('active in');

	buycal();
	document.getElementById("sellprice").value = price;


}
function buyRow(price,volume)
{

	document.getElementById("sellprice").value = price;
	document.getElementById("sellvolume").value =volume;
	document.getElementById("sellmarketvolume").value = volume;
	$('.green-bg').removeClass('active');
	$('#buy').removeClass('active in');

	$('.red-bg').addClass('active');
	$('#sell').addClass('active in');
	$('#sell-limit-order').addClass('active in');
	$('#sell-market-order').removeClass('active in');
	sellcal();
	document.getElementById("buyprice").value = price;


}
</script>
<script>

	$(function() {
		$('#buyprice, #sellprice').on('input', function() {
			var decimal = $('#cointwo_decimal').val();
			this.value = this.value
.replace(/[^\d.]/g, '')             // numbers and decimals only
.replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
.replace(/(\.[\d]{8})./g, '$1');   // not more than 4 digits after decimal
if(this.value == '0.0000' || this.value == '.0000'){
	this.value = '0.000';
}
});

		$('#buyvolume, #sellvolume').on('input', function() {
			this.value = this.value
.replace(/[^\d.]/g, '')             // numbers and decimals only
.replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
.replace(/(\.[\d]{8})./g, '$1');   // not more than 4 digits after decimal
if(this.value == '0.0000' || this.value == '.0000'){
	this.value = '0.000';
}
});


		$('#buymarketvolume').on('input', function() {
			this.value = this.value
.replace(/[^\d.]/g, '')             // numbers and decimals only
.replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
.replace(/(\.[\d]{8})./g, '$1');   // not more than 4 digits after decimal
if(this.value == '0.0000' || this.value == '.0000'){
	this.value = '0.000';
}
});


	 $('#sellmarketvolume').on('input', function() {
			this.value = this.value
.replace(/[^\d.]/g, '')             // numbers and decimals only
.replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
.replace(/(\.[\d]{8})./g, '$1');   // not more than 4 digits after decimal
if(this.value == '0.0000' || this.value == '.0000'){
	this.value = '0.000';
}
});

	});



 
	$(document).ready(function(){ 
	//var websocket = new WebSocket("ws://localhost.com:9090");  
var websocket = new WebSocket("wss://demozab.com:8568");  
websocket.onopen = function(event) {
console.log('websocket');
	var messageJSON = {
		market: "{{ $coinone }}_{{ $cointwo }}",
		_token: ""
	};
	websocket.send(JSON.stringify(messageJSON));
}
websocket.onmessage = function(event) {
	var Data = JSON.parse(event.data);
	if(Data.coinone == "{{ $coinone }}" && Data.cointwo == "{{ $cointwo }}")
	{

		if (typeof Data === 'string') {
			Data = JSON.parse(Data);
			$('#buyOrderBook').html(Data.buy);
			$('#sellOrderBook').html(Data.sell);
			$('#tradeHistory').html(Data.completedtrade);
			$('#livemarket').html(Data.Liveprice);
			$('#currentprice1').html(Data.currentprice);
			$('#hoursvoume').html(Data.hoursvoume);
			$('#hoursexchange').html(Data.hoursexchange);

		}
		if(Data.buy){
			$('#buyOrderBook').html(Data.buy);
		}
		if(Data.sell){
			$('#sellOrderBook').html(Data.sell);
		}
		if(Data.completedtrade){
			$('#tradeHistory').html(Data.completedtrade);
		}
		if(Data.Liveprice){
			$('#livemarket').html(Data.Liveprice);
		}					

		if(Data.currentprice){
			$('#currentprice1').html(Data.currentprice);
			$('.orderprice').html(Data.currentprice);
		}
		if(Data.hoursvoume){
			$('#hoursvoume').html(Data.hoursvoume);
		}
		if(Data.hoursexchange){
			$('#hoursexchange').html(Data.hoursexchange);
			$('#orderpercent').html(Data.hoursexchange);
		}

	 

	}
};

websocket.onerror = function(event){
	console.log("Problem due to some Error");
};
websocket.onclose = function(event){
	console.log("Connection Closed");
};
 
 

$.fn.serializeObject = function() {
	var o = Object.create(null),
	elementMapper = function(element) {
		element.name = $.camelCase(element.name);
		return element;
	},
	appendToResult = function(i, element) {
		var node = o[element.name];

		if ('undefined' != typeof node && node !== null) {
			o[element.name] = node.push ? node.push(element.value) : [node, element.value];
		} else {
			o[element.name] = element.value;
		}
	};

	$.each($.map(this.serializeArray(), elementMapper), appendToResult);
	return o;
};

});
 

function AvoidSpace(event) {
		var k = event ? event.which : window.event.keyCode;
		if (k == 32) return false;
	}	

</script>

