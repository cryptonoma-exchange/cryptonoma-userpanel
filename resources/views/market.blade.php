@include('layouts.header')
@include('layouts.menu')

<article class="innerpagecontent">
	<section class="gray-bg">
		<div class="container sitecontainer">
			<h3 class="heading-title text-center pb-2">Markets</h3>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="marketpriceflex">

						@foreach ($pairs->take(4) as $pair)
						<div class="panelcontentbox">
							<div class="marketpricebox">
								<div class="mrkpricetable">
									<div>
										<h5 class="h5"><a href="{{ 'trades/'.$pair->coinone.'_'.$pair->cointwo }}"><img
																src="{{ url('userpanel/images/color/' . strtolower($pair->coinone) . '.svg') }}"
																class="coinlisticon">{{ $pair->coinone }}/{{ $pair->cointwo }}</a></h5>
										<h4 class="h4 t-green"><span
												class="smllspan last_price_{{ $pair->coinone }}{{ $pair->cointwo_binance }}">{{ display_format($pair->last_price, 2) }}</span>
										</h4>
									</div>
									<div>
										<img src="{{ url('images/chart2.png') }}" />
									</div>
								</div>
								<hr>
								<h6 class="h6">24h change : <span
										class="t-green smllspan price_change_{{ $pair->coinone }}{{ $pair->cointwo_binance }}">{{ $pair->exchange_percentage }}
										%</span><br />
									24h volume : <span class="quote_{{ $pair->coinone }}{{ $pair->cointwo_binance }}">0</span>
								</h6>
							</div>
						</div>
					@endforeach

					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="panelcontentbox">
						<div class="innerpagetab marketd">
							<ul class="nav nav-tabs tabbanner" role="tablist">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#usdtpair">USDT Markets</a></li>
							</ul>
						</div>
						<div class="tab-content innertable">
							<div id="usdtpair" class="tab-pane active">
								<div class="table-responsive sitescroll" data-simplebar>
									<table class="table sitetable">
										<thead class="marketprice">
											<tr>
												<th>Pair</th>
												<th>Coin</th>
												<th>Last Price</th>
												<th>24h Change</th>
												<th>24h High</th>
												<th>24h Low</th>
												<th hidden>Market Cap</th>
												<th>24h Volume</th>
											</tr>
										</thead>
										<tbody id="table_market">
											@foreach ($pairs as $pair)
												<tr>
													<td><a href="{{ 'trades/'.$pair->coinone.'_'.$pair->cointwo }}"><img
																src="{{ url('userpanel/images/color/' . strtolower($pair->coinone) . '.svg') }}"
																class="coinlisticon">{{ $pair->coinone }}/{{$pair->cointwo}}</td>
													<td>{{ $pair->coinonedetails->coinname }}</td>
													<td><span class="t-green last_price_{{ $pair->coinone }}{{$pair->cointwo_binance}}">0</span></td>
													<td><span class="t-green price_change_{{ $pair->coinone }}{{$pair->cointwo_binance}}">0</span></td>
													<td><span class="high_price{{ $pair->coinone }}{{$pair->cointwo_binance}}">0</span></td>
													<td><span class="low_price{{ $pair->coinone }}{{$pair->cointwo_binance}}">0</span></td>
													<td><span class="quote_{{ $pair->coinone }}{{$pair->cointwo_binance}}">0</span></td>
												</tr>
											@endforeach

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</article>

@include('layouts.footer')
<script>
	$("body").addClass("innerback");
</script>
<script type="text/javascript">
	$(document).ready(function(){
	
		$("#search_market").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#table_market tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	
		var conn = new WebSocket("wss://stream.binance.com:9443/ws");
		conn.onopen = function(evt) {
	
		var cpair = '';	
	
		// send Subscribe/Unsubscribe messages here (see below)
		var array_dta = [];

		//	 @if(!empty($Binancepair))
		array_dta.push(cpair+"@depth"+updateDepth+"@1000ms");
		array_dta.push(cpair+"@aggTrade");
		 //@endif
	 
		 @foreach ($pairs as $key => $value)
		 @if($value->type == 0 || $value->type == 1 || $value->type == 2)
		 @if($value->type == 3) 
			var bpair = '{{strtolower($value->coinone.$value->cointwo)}}';
		var bpair = '{{strtolower($value->coinone."USDT")}}';
		 @else
			var bpair = '{{strtolower($value->coinone.$value->cointwo)}}';
		var bpair = '{{strtolower($value->coinone."USDT")}}';
		 @endif
			 array_dta1 = [bpair+"@ticker"];
			 array_dta1.forEach(function (item) {
				 array_dta.push(item);
			 })       
		@endif
		@endforeach
	
		 
			 var messageJSON = {
				 "method": "SUBSCRIBE",
				 "params": array_dta,
				 "id": 1
			 };
			 conn.send(JSON.stringify(messageJSON));
			 }
	
	
			 conn.onmessage = function(evt) {
			if(evt.data) {
				 var get_data = JSON.parse(evt.data);
				 var cprice=1;
					
				 if((typeof get_data['e'] == "24hrTicker") || (get_data['e'] != null)) {
					var symbol = get_data['s'];
					 var last_price = get_data['c']; //*@json(1/$kes_to_usdt);
					 var high_price = get_data['h'];
					 var low_price = get_data['l'];
					 var price_change = get_data['P'];
					 var quote = get_data['q'];
	
					 var convertsymbol=get_data['s'];
	
					 var tradepairs_decimal=  @json($coindecimals);
				var Coin_two_decimal=tradepairs_decimal[convertsymbol].cointwo_decimal;
				 var conv = 1;
					 var is_data = "t-red";
					 if(price_change > 0) { is_data = "t-green";  }
	
				 if((typeof last_price != 'undefined')) {
						 if (symbol.endsWith('USDT')) {
							 $('.last_price_'+symbol).html('$ '+parseFloat(last_price).toFixed(Coin_two_decimal));
	
						 } 				  
						 $('.liveprice'+symbol).html(parseFloat(last_price).toFixed(Coin_two_decimal));  
						 $('.high_price'+symbol).html(parseFloat(high_price).toFixed(Coin_two_decimal)*conv); 
						 $('.low_price'+symbol).html(parseFloat(low_price).toFixed(Coin_two_decimal)*conv); 
					 }
	
	
					 if((typeof quote != 'undefined') && (typeof last_price != 'undefined')) {
					 $('.quote_'+symbol).html(parseFloat(quote).toFixed(2));
					 }
	
					 if((typeof price_change != 'undefined') && (typeof last_price != 'undefined')) {
					price_change = price_change * 1;
					price_change = parseFloat(price_change).toFixed(2);
					$24Hclass = "t-red"; $arrow = "down";
					if(price_change >0 || price_change == 0) {
						 $24Hclass = "t-green";
						$arrow = "up";
					 }
					 if(price_change <0) {
						 $24Hclass = "t-red";
						$arrow = "down";
					 }
					 if (symbol.endsWith('USDT')) {
						// $('.last_price_'+symbol).html('<span class="'+$24Hclass+''+' '+'last_price_'+symbol+'">'+'$  '+(parseFloat(last_price).toFixed(Coin_two_decimal)*conv)+'</span>'); 
	
						$('.last_price_'+symbol).html('<span class="'+$24Hclass+''+' '+'last_price_'+symbol+'">'+'$  '+(parseFloat(last_price).toFixed(Coin_two_decimal))+'</span>'); 
	
	
						 
	
						 }
					 $('.price_change_'+symbol).html('<span class="'+$24Hclass+'">'+price_change+' % <i class="fa fa-arrow-'+$arrow+'"></i></span>');
					$('.livepercent'+symbol).html('<span class="'+is_data+'">'+price_change+' %</span>'); 
		 
				}
	
			 }
			}
		 
		 }
	
	});
	 </script>