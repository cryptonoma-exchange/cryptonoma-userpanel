@include('layouts.header')
@include('layouts.liveprice')
@include('layouts.menu')
		<section class="homebannerbg">
			<div class="container">
				<div class="row table-content">
				@foreach($data as $trade)
						@foreach($trade['cms'] as $cms)
					<div class="col-lg-6 col-md-6 col-sm-12 col-12 leftbannercontent">
						<h1 class="h1">{{ $cms['homebanner'] }}<br/><span class="text-uppercase">{{ $cms['homebanner_title'] }}</span></h1>
						<div class="banner-btn"> <a href="{{ url('/register')}}" class="btn bluebtn">Get Started</a> </div>
						@endforeach
					
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
						<img src="{{ url('images/trade1.svg') }}"/>
					</div>
				</div>
			</div>
		</section>

			 

		<article>	
			<section class="stepbg">
				<div class="container">
					<div class="row" data-aos="fade-up"data-aos-duration="1200">
						<div class="col-lg-8 col-md-10 col-12 mx-auto">
								<h2 class="heading-title text-center mb-2">Features</h2>
								<p class="content text-center">{{ $featurestext }} </p>
							</div>
						</div>
								<div class="stepsboxb">
								@foreach($trade['features'] as $features)
										<div class="total">
												<div class="howitbox"> <img src="{{ url('images/'.$features['image'].'') }}"> </div>
												<h4>{{ $features['heading'] }}</h4>
												<p class="content">{{ $features['desc'] }}</p>
										</div>
										@endforeach
									</div>
					</div>
					
			</section>
			<section class="exhangecount">
				<div class="container">
					<div class="d-flex justify-content-center">
						{{-- <div class="exchangeicon">
							<h5>600+</h5>
							<p>Trusted Offers</p>
						</div>
						<div class="exchangeicon">
							<h5>800+</h5>
							<p>Total Users</p>
						</div>
						<div class="exchangeicon">
							<h5>1000+</h5>
							<p>Bitcoins Traded</p>
						</div> --}}
						{{-- <div class="exchangeicon">
							<h5>{{ $cms->statisticsone_number }}</h5>
							<p>{{ $cms->statisticsone_data }}</p>
						</div>
						<div class="exchangeicon">
							<h5>{{ $cms->statisticstwo_number }}+</h5>
							<p>{{ $cms->statisticstwo_data }}</p>
						</div>
						<div class="exchangeicon">
							<h5>{{ $cms->statisticsthree_number }}</h5>
							<p>{{ $cms->statisticsthree_data }}</p>
						</div> --}}
						<div class="exchangeicon">
							<h5>{{ $cms['statisticsone_number'] }}</h5>
							<p>{{ $cms['statisticsone_data'] }}</p>
						</div>
						<div class="exchangeicon">
							<h5>{{ $cms['statisticstwo_number'] }}</h5>
							<p>{{ $cms['statisticstwo_data'] }}</p>
						</div>
						<div class="exchangeicon">
							<h5>{{ $cms['statisticsthree_number'] }}</h5>
							<p>{{ $cms['statisticsthree_data'] }}</p>
						</div>
					</div>
				</div>
			</section>
			<section class="chooseusbanner">
				<div class="container">
					<div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 mx-auto text-center">
						<h2 class="heading-title mb-2">How it works</h2> 
					</div>
				</div>
					<div class="chooseusflex" data-aos="fade-up" data-aos-duration="1200">
					@foreach($trade['Howitwork'] as $Howitwork)
						<div class="chooseusboxt">
							<div class="choosefbox">
							<div class="subimg"> <img src="{{ url('images/'.$Howitwork['image'].'') }}"> </div>
							<h4 class="h4 pt-4">{{ $Howitwork['title'] }}</h4>
							<p class="content">{{ $Howitwork['desc'] }}</p>
						</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>		
		
			<section class="mobileapp">
				<div class="container">
					<div class="row table-content">
							<div class="col-md-6" data-aos="fade-up" data-aos-duration="1200">
								<div class="mobileappicon">
								<img src="{{ url('images/mobileapp.png') }}"> 
								</div>
							</div>
							@foreach($trade['cms'] as $cms)
							<div class="col-md-6" data-aos="fade-up" data-aos-duration="1200">
								<h2 class="heading-title pb-3 t-white">Download Mobile Application</h2>
								<p class="content t-white">{{ $cms['mobileappdescription'] }}</p>
								<div class="playstoreicon">
								<a href="https://play.google.com/store/apps/details?id=com.app.Cryptonoma" target="_blank"><img src="{{ url('images/appicon1.svg') }}"></a>
									<a href="#"><img src="{{ url('images/appicon2.svg') }}"></a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endforeach
			</div></section>
		</article>
@include('layouts.footer')
@php
$coinone="BTC"; $cointwo="USDT";
$orgpair = $coinone.$cointwo; 
@endphp

<script type="text/javascript">


$(document).ready(function(){
 
var conn = new WebSocket("wss://stream.binance.com:9443/ws");
   conn.onopen = function(evt) {

		@php
			$send_params = collect($tradeorder)->pluck("coinone")->map(function($item){
				return strtolower($item)."usdt@ticker";
			});
		@endphp
		var array_dta = @json($send_params);
 
		 var messageJSON = {
		   "method": "SUBSCRIBE",
		   "params": array_dta,
		   "id": 1
		 };
		 conn.send(JSON.stringify(messageJSON));
	   }
	   conn.onmessage = function(evt) {
		if(evt.data) {
			var currentpair = '{{$orgpair}}';
		   var get_data = JSON.parse(evt.data);
		    
			 if((typeof get_data['e'] == "24hrTicker") || (get_data['e'] != null)) {
			   var last_price = get_data['c'];
			   var high_price = get_data['h'];
			   var low_price = get_data['l'];
			   var price_change = get_data['P'];
			   var quote = get_data['q'];
			   var symbol = get_data['s'];
 		       var tradepairs_decimal=  <?php echo json_encode($coindecimals); ?>;
			// var multiplier_price="0.0089";
			  
			   var is_data = "t-red";
			   if(price_change > 0) { is_data = "t-green";  }

		   if((typeof last_price != 'undefined')) {
			   	if (symbol.endsWith('USDT')) {
					    $('.last_price_'+symbol).html('$ '+parseFloat(last_price).toFixed(2)); 
				   }				  
				   $('.liveprice'+symbol).html(parseFloat(last_price));  
				   $('.high_price'+symbol).html(parseFloat(high_price)); 
				   $('.low_price'+symbol).html(parseFloat(low_price)); 
			   }


			//    if(symbol == currentpair){
			// 	$('.orderprice').html(last_price); 
			//    }

			   if((typeof quote != 'undefined') && (typeof last_price != 'undefined')) {
				 $('.quote_'+symbol).html(parseFloat(quote));
			   }

			   if((typeof price_change != 'undefined') && (typeof last_price != 'undefined')) {
				price_change = price_change * 1;
				price_change = parseFloat(price_change).toFixed(2);
				$24Hclass = "red"; $arrow = "down";
				if(price_change >0 || price_change == 0) {
				 	$24Hclass = "t-green";
					$arrow = "up";
				 }
				 if(price_change <0) {
				 	$24Hclass = "t-red";
					$arrow = "down";
				 }
				 if (symbol.endsWith('USDT')) {
					// $('.last_price_'+symbol).html('<span class="vlue txtlast_price_'+symbol+'">'+'$  '+parseFloat(last_price*multiplier_price).toFixed(2)+'</span>');
					$('.last_price_'+symbol).html('<span class="vlue txtlast_price_'+symbol+'">'+'$  '+parseFloat(last_price).toFixed(2)+'</span>');
					if(symbol=="XRPUSDT"){
						// $('.last_price_'+symbol*multiplier_price).html('<span class="last_price_'+symbol+'">'+'$  '+parseFloat(last_price).toFixed(4)+'</span>');
						$('.last_price_'+symbol).html('<span class="last_price_'+symbol+'">'+'$  '+parseFloat(last_price).toFixed(4)+'</span>');
					} 
				   }
				   var convertsymbol=get_data['s'];
			   if (symbol.endsWith('USDT')) {
				 convertsymbol=symbol.replace("USDT","KES");
			   }

			   var tradepairs_decimal=  <?php echo json_encode($coindecimals); ?>;

			var Coin_two_decimal=tradepairs_decimal[convertsymbol].cointwo_decimal;
		
				$('.price_change_'+symbol).html('<span class="'+$24Hclass+' '+'price_change_'+symbol+'">'+price_change+' % <i class="fa fa-arrow-'+$arrow+'"></i></span>');
				$('.livepercent'+symbol).html('<span class="'+is_data+'">'+price_change+' %</span>'); 	 
			}
	   }
		}
	 }

});
</script>


