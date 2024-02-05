
<div class="livepricebg">

	<div class="charts-price">
		<div class="container">
				@if($cms['homepage_liveprice_view'] == 1)
			<ul class="charts myUl">
			@foreach($tradeorder as $trade)
			
				<li>
					<div class="live-table">
						<div class="livecoinig"><img src="{{ url('userpanel/images/color/'.strtolower($trade->coinone).'.svg') }}"></div>
						<div>
							<h2 class="h2">{{ $trade->coinone }}/{{ "USD" }}</h2></div>
						<div>
							<h2 class="h2"><span class="vluetxt last_price_{{$trade->coinone}}USDT ">0.00000</span><span class="vluetxt price_change_{{$trade->coinone}}USDT t-green">(0.00%)</span></h2></div>
					</div>
				</li>
				@endforeach
			
			</ul>
			@endif
		</div>
	</div>
	
</div>


