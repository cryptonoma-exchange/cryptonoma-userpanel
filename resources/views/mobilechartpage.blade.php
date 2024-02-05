<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	{{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
</head>

<body style="height: 100vh">
	<div id="tradingview_49396" style="height: 100vh"></div>
	<script src="{{url('userpanel/js/jquery.min.js')}}"></script>

	<script>
		$(function() {
			new TradingView.widget({
				"autosize": true,
				"fullscreen": true,
				"symbol": "Binance:{{ $pair->coinone_binance }}{{ $pair->cointwo_binance }}",
				"interval": "5",
				"timezone": "UTC",
				//"toolbar_bg" : "#fff",
				"theme": "dark",
				"style": "1",
				"locale": "en",
				"toolbar_bg": "#162d54",
				"enable_publishing": false,
				"allow_symbol_change": false,
				"container_id": "tradingview_49396",
				"withdateranges": true,
				"hide_side_toolbar": false,
				"hide_legend": true,
				'overrides': {
					"paneProperties.background": "#0f2444",
					"paneProperties.vertGridProperties.color": "#162d54",
					"paneProperties.horzGridProperties.color": "#162d54",
					"symbolWatermarkProperties.transparency": 90,
					"scalesProperties.textColor": "#fff",
				}
			});
		});
	</script>
</body>

</html>
