@php
$active='trade';

$Currentprice=1;
$binance_coinone=strtolower($coinone_binance);
$binance_cointwo=strtolower($cointwo_binance);

$binance=false;
if($type == 'binance'){
    $binance=true;
}
@endphp

@include('layouts.userpanel.header')
<script>
    var trade_pair_type = @json($trdepair->type);
</script>
<div class="pagecontent gridpagecontent tradepage chartactive">
    @include('layouts.userpanel.headermenu')
    <article class="gridparentbox tradecontentbox">
        <div class="marketlistsidemenu">
            <ul class="marketlistt">
                <li>
                    <div id="sidebarmarketlistCollapse"><i class="fa fa-arrow-left"></i></div>
                    <div class="text-center">{{ $coinone }}/{{ $cointwo }}</div>
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
                    <li class="nav-item"><a id="buyy" class="nav-link" data-toggle="tab" href="#buy">Buy</a></li>
                    <li class="nav-item"><a id="selll" class="nav-link" data-toggle="tab" href="#sell">Sell</a></li>
                </ul>
            </div>
            <div class="grid-box">
                <div class="livepricelist">
                    <div class="livepricemobile">
                        <ul class="livepricenavbg">
                            <li><a class="livepricet dropdown-toggle" data-toggle="dropdown"><img
                                        src="{{ url('userpanel/images/color/' . strtolower($coinone) . '.svg') }}"
                                        class="coinlisticon"><span>{{ $coinone }}/{{ $cointwo }}</span></a>
                                <div class="dropdown-menu dropdown-large panelcontentbox">
                                    <div class="marketlist">
                                        <h2 class="heading-box">Markets</h2>
                                        <div id="closemarketicon" class="closeiconlist"><i
                                                class="fa fa-arrow-right"></i></div>
                                        @foreach ($marketpairs as $key => $value)
                                            <div id="{{ strtolower($key) }}"
                                                class="tab-pane {{ $key == $cointwo ? 'active' : '' }}">
                                                <form class="siteformbg">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input class="form-control" placeholder="Search coin name"
                                                                id="searchtextbox">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
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
                                                        @foreach ($value as $keys)
                                                            <tr class=" {{ $coinone == $keys && $cointwo == $key ? 'activerow' : '' }}"
                                                                onclick="window.location='{{ url('/exchange/' . $keys . '_' . $key) }}'"
                                                                style="cursor: pointer;">
                                                                <td><img src="{{ url('userpanel/images/color/' . strtolower($keys) . '.svg') }}"
                                                                        class="coinlisticon">{{ $keys }}/{{ $key }}
                                                                </td>
                                                                <td><span class="t-red last_price_{{$keys}}{{'USDT'}}_{{$tradetype[$key][$keys]}}">{{ display_format($last[$key][$keys]) }}</span></td>
                                                                <td><span class="t-green price_change_{{$keys}}{{'USDT'}}_{{$tradetype[$key][$keys]}}">{{ $change_percentage[$key][$keys] }}
                                                                        % <i class="fa fa-arrow-up"></i></span></td>
                                                                <td><span class="quote_{{$keys}}{{'USDT'}}_{{$tradetype[$key][$keys]}}">{{ display_format($volume[$key][$keys]) }}</span></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li><a class="livepricet">Last Price<span class="t-red livechangeprice last_price_{{$coinone}}{{'USDT'}}_{{$single_pairtype}}"
                                        id="currentprice1">
                                        <div class="kesprice">{{ display_format($last[$key][$keys]) }}</div>
                                        <!-- <div class="usdprice">$3.256</div> -->
                                    </span></a></li>
                            <li><a class="livepricet" >24H change<span 
                                        class="t-green price_change_{{$coinone}}{{'USDT'}}_{{$single_pairtype}}" id="hoursexchange">{{ $change_percentage[$key][$keys] }}</span></a></li>
                            <li><a class="livepricet">24H high<span class="high_price{{$coinone}}{{'USDT'}}_{{$single_pairtype}}" id="currentprice3">0</span></a></li>
                            <li><a class="livepricet">24H low<span class="low_price{{$coinone}}{{'USDT'}}_{{$single_pairtype}}" id="currentprice2">0</span></a></li>
                            <li><a class="livepricet">24H volume<span class="quote_{{$coinone}}{{'USDT'}}_{{$single_pairtype}}" id="hoursvoume">{{ display_format($volume[$key][$keys]) }}</span></a></li>
                            {{-- <li class="pricechangebox">
                                <a class="livepricet"> --}}
                                    {{-- <form class="siteformbg">
                                        <select class="form-control" id="priceslect">
                                            <option class="option-1">KES</option> --}}
                                            {{-- <option class="option-2">USD</option> --}}
                                        {{-- </select>
                                    </form> --}}
                                {{-- </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                @php
                    $decimal = $coins[0]['decimal'];
                    if (isset($balance[$coinone]['balance']) && $balance[$coinone]['balance'] > 0) {
                        $avilone = display_format($balance[$coinone]['balance'], $decimal);
                    } else {
                        $avilone = display_format('0', $decimal);
                    }
                    if (isset($balance[$cointwo]['balance']) && $balance[$cointwo]['balance'] > 0) {
                        $aviltwo = display_format($balance[$cointwo]['balance'], $decimal);
                    } else {
                        $aviltwo = display_format('0', $decimal);
                    }
                @endphp
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
                                <td>{{ $coinone }}</td>
                                <td class="text-right">
                                    @if (isset($balance[$coinone]['balance']))
                                        {{ display_format($balance[$coinone]['balance'], $coinone_decimal) }}
                                    @else
                                        {{ display_format(0, $coinone_decimal) }}
                                    @endif
                                </td>
                            </tr>
                            <tr class="hrline">
                                <td colspan="2" class="text-center"><a href="{{ url('deposit/' . $coinone) }}"
                                        class="btn viewbtn green-btn mr-2">Deposit</a><a
                                        href="{{ url('withdraw/' . $coinone) }}"
                                        class="btn viewbtn red-btn">Withdraw</a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cointwo }}</td>
                                <td class="text-right">
                                    @if (isset($balance[$cointwo]['balance']))
                                        {{ display_format($balance[$cointwo]['balance'], $cointwo_decimal) }}
                                    @else
                                        {{ display_format(0, $cointwo_decimal) }}
                                    @endif
                                </td>
                            </tr>
                            <tr class="hrline">
                                <td colspan="2" class="text-center"><a href="{{ url('deposit/' . $cointwo) }}"
                                        class="btn viewbtn green-btn mr-2">Deposit</a><a
                                        href="{{ url('withdraw/' . $cointwo) }}"
                                        class="btn viewbtn red-btn">Withdraw</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>             
                <div class="chart">
                    {{-- @if($cde==3)
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $msgg }}</strong>
                    </div>
                @endif --}}
                    <ul class="nav nav-tabs tabbanner charttabbg" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tradechart">Trading view</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#marketdepth">Depth</a>
                        </li>
                    </ul>
                    <div class="tab-content contentbox">
                          {{-- <div id="tradechart" class="tab-pane tradechartlist active">
                            <div class="tradingview-widget-container">
                                <div id="tradingview_49396"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                <script type="text/javascript" src="{{ url('/js/charting-library/charting_library.min.js') }}"></script>
                                <script type="text/javascript" src="{{ url('/js/datafeeds/udf/dist/polyfills.js') }}"></script>
                                <script type="text/javascript" src="{{ url('/js/datafeeds/udf/dist/bundle.js') }}"></script>
                                <script type="text/javascript">

                                    function getParameterByName(name) {
                                        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                                        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                                            results = regex.exec(location.search);
                                        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
                                    }

                                    TradingView.onready(function() {
                                        var Mode = "{{ Session::get('mode') }}";
                                        if (Mode == 'nightmode') {
                                            theme = "Dark";
                                        } else {
                                            theme = "Light";
                                        }
                                        var widget = window.tvWidget = new TradingView.widget({
                                            autosize: true,
                                            fullscreen: !0,
                                            // symbol: '{{ $coinone . '/' . $cointwo }}',
                                            // symbol: "{{$coinone.'/USDT'}}"
                                            // symbol: '{{ $coinone.'/'."USDT" }}',
                                             symbol: "Binance:BTCUSD",
                                            interval: 'D',
                                            timezone: "UTC",
                                            toolbar_bg: "#fff",
                                            theme: theme,
                                            style: "1",
                                            library_path: "{{ url('/js/charting-library') }}/",
                                            drawings_access: {
                                                type: 'black',
                                                tools: [{
                                                    name: "Regression Trend"
                                                }]
                                            },
                                            locale: getParameterByName('lang') || "en",
                                            toolbar_bg: "#f1f3f6",
                                            enable_publishing: false,
                                            allow_symbol_change: true,
                                            container_id: "tradingview_49396",
                                            withdateranges: !0,
                                            hide_side_toolbar: false,
                                            hide_legend: !0,
                                            user_id: 'public_user_id',
                                            client_id: 'tradingview.com',
                                            charts_storage_url: 'https://saveload.tradingview.com',
                                            charts_storage_api_version: "1.1",
                                            timezone: 'UTC'
                                        });
                                    });


                                    // new TradingView.widget({
										// 	autosize: !0,
										// 	fullscreen: !0,
										// 	symbol: "Binance:BTCUSD",
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
										// });

                                   
                                </script>
                            </div>
                        </div>  --}}


                    						
                        {{-- <div class="tab-content contentbox">
                            <div id="tradechart" class="tab-pane tradechartlist active">
                                <div class="tradingview-widget-container">
                                    <div id="tradingview_49396"></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>										
                                    <script type="text/javascript">
                                    new TradingView.widget({
                                        autosize: !0,
                                        fullscreen: !0,
                                        symbol: "{{ $coinone.'/USDT'}}", 
                                        interval: "5",
                                        timezone: "UTC",
                                        toolbar_bg: "#fff",
                                        // theme: "Light",
                                       // theme: "Dark",
                                    //    var Mode = "{{ Session::get('mode') }}";
                                    @if(Session::get('mode')=='nightmode')
                                            theme: "Dark",
                                    @else
                                            theme: "Light",
                                    @endif    
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
                                </div> --}}
                                

                    {{-- originaltradechart --}}

                        <div id="tradechart" class="tab-pane active tradechartlist ">
                            @php 
                            $coinpair="USDT";
                            @endphp
									<div class="tradingview-widget-container">
										<div id="tradingview_49396" class="tradechartlist"></div>
										<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>										
										<!-- <script type="text/javascript" src="{{ url('/js/charting-library/charting_library.min.js') }}"></script>
                                        <script type="text/javascript" src="{{ url('/js/datafeeds/udf/dist/polyfills.js') }}"></script>
		                                <script type="text/javascript" src="{{ url('/js/datafeeds/udf/dist/bundle.js') }}"></script>


                                        <script type="text/javascript" src="{{ asset('/js/charting-library/charting_library.min.js') }}"></script>
                                        <script type="text/javascript" src="{{ asset('/js/datafeeds/udf/dist/polyfills.js') }}"></script>
		                                <script type="text/javascript" src="{{ asset('/js/datafeeds/udf/dist/bundle.js') }}"></script> -->
                                        <script type="text/javascript">
									new TradingView.widget(
                                    {
                                        "autosize": true,
                                        "fullscreen": true,
                                        "symbol": "Binance:{{$coinone }}{{$coinpair }}",
                                        "interval": "5",
                                        "timezone": "UTC",
                                        //"toolbar_bg" : "#fff",
                                        @if(Session::get('mode')=='nightmode')
                                        "theme": "dark",
                                        @else
                                        "theme": "light",
                                        @endif
                                        "style": "1",
                                        "locale": "en",
                                        "toolbar_bg": "#162d54",
                                        "enable_publishing": false,
                                        "allow_symbol_change": false,
                                        "container_id": "tradingview_49396",
                                        "withdateranges": true,
                                        "hide_side_toolbar": false,
                                        "hide_legend": true,
                                        @if(Session::get('mode')=='nightmode')
                                        'overrides': {
                                            "paneProperties.background": "#0f2444",
                                            "paneProperties.vertGridProperties.color": "#162d54",
                                            "paneProperties.horzGridProperties.color": "#162d54",
                                            "symbolWatermarkProperties.transparency": 90,
                                            "scalesProperties.textColor": "#fff",
                                        }
                                        @else
                                        'overrides': {
                                            "paneProperties.background": "#fff",
                                            "paneProperties.vertGridProperties.color": "#ccc",
                                            "paneProperties.horzGridProperties.color": "#ccc",
                                            "symbolWatermarkProperties.transparency": 90,
                                            "scalesProperties.textColor": "#fff",
                                        }
                                        @endif
                                    }); 
                            </script>
                            </div>
                        </div>

                        <div id="marketdepth" class="marketchart tab-pane">
                            <div id="chartdiv" class=""></div>
                            <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
                            <script src="https://www.amcharts.com/lib/3/serial.js"></script>
                            <script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
                            <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
                            <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css"
                                type="text/css" media="all">
                            <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
                        </div>
                    </div>
                </div>

                <div class="orderbook buysellshow">
                    <h2 class="heading-box">Order Book</h2>
                    <div class="tabrightbox">
                        <ul class="nav nav-tabs tabbanner charttabbg orderchangebg">
                            <li class="nav-item"><a class="nav-link" id="buysellshow"><img
                                        src="{{ url('images/chart1.svg') }}" /></a></li>
                            <li class="nav-item"><a class="nav-link" id="buyshow"><img
                                        src="{{ url('images/chart2.svg') }}" /></a></li>
                            <li class="nav-item"><a class="nav-link" id="sellshow"><img
                                        src="{{ url('images/chart3.svg') }}" /></a></li>
                        </ul>
                    </div>
                    <div class="">
                        <div class="table-responsive sitescroll" data-simplebar>
                            <table class="table sitetable">
                                <thead>
                                    <tr>
                                        <th>Price({{ 'USD' }})</th>
                                        <th>Amount({{ $coinone }})</th>
                                        <th>Total({{ 'USD' }})</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="sellboxorder" id="sellorderbox">
                            <div class="table-responsive sitescroll" data-simplebar>
                                <table class="table sitetable">
                                    <thead>
                                        <tr>
                                            <th>Price({{ $cointwo }})</th>
                                            <th>Amount({{ $coinone }})</th>
                                            <th>Total({{ $cointwo }})</th>
                                        </tr>
                                    </thead>
                                    <tbody class="" id="sellOrderBook">
                                        @forelse($selltrades as $selltrade)
                                            @php
                                                $price = display_format($selltrade->price);
                                                $remaining = display_format($selltrade->remaining);
                                            @endphp
                                            <tr onclick="sellRow('{{ $price }}','{{ $remaining }}');">
                                                <td><span
                                                        class="t-red">{{ display_format($selltrade->price, $cointwo_decimal) }}</span><span
                                                        class="redbg ordervolumebg" style="width:30%;"></span></td>
                                                <td class="text-right">
                                                    {{ display_format($selltrade->remaining, $coinone_decimal) }}
                                                </td>
                                                <td class="text-right">
                                                    {{ ncMul($selltrade->price, $selltrade->remaining, $cointwo_decimal) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan=3>
                                                    @lang('common.trade.norecordsfound')</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="livepricebox" id="livepricebox">
                            <table class="table sitetable">
                                <thead>
                                    <th><span
                                            class="t-green liveprice{{$coinone}}{{'USDT'}}" id="tradeliveprice">{{ display_format($last[$cointwo][$coinone], $cointwo_decimal) }}</span>
                                           
                                    </th>
                                   @php
                                       $ok='USDT';
                                   @endphp 
                                     {{-- <th class="text-right" id="orderpercent">
                                        <span>{{ display_format($change_percentage[$cointwo][$coinone], 2) }}</span>
                                        %
                                    </th> --}}
                                    <th class="text-right" id="orderpercent">
                                    <span 
                                        class="t-green price_change_{{$coinone}}{{'USDT'}}_{{$single_pairtype}}" id="hoursexchange">{{ $change_percentage[$key][$keys] }}</span>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="buyboxorder" id="buyorderbox">
                            <div class="table-responsive sitescroll" data-simplebar>
                                <table class="table sitetable">
                                    <thead>
                                        <tr>
                                            <th>Price({{ $cointwo }})</th>
                                            <th>Amount({{ $coinone }})</th>
                                            <th>Total({{ $cointwo }})</th>
                                        </tr>
                                    </thead>
                                    <tbody id="buyOrderBook">
                                        @forelse($buytrades as $buytrade)
                                            @php
                                                $bprice = $buytrade->price;
                                                $bquantity = $buytrade->remaining;
                                            @endphp
                                            <tr
                                                onclick="buyRow('{{ display_format($bprice) }}','{{ display_format($bquantity) }}');">

                                                <td><span class="greenbg ordervolumebg" style="width:30%;"></span>
                                                    <span
                                                        class="t-green">{{ display_format($buytrade->price, $cointwo_decimal) }}</span>
                                                </td>

                                                <td class="text-right">
                                                    {{ display_format($buytrade->remaining, $coinone_decimal) }}</td>
                                                <td class="text-right">
                                                    {{ ncMul($buytrade->price, $buytrade->remaining, $cointwo_decimal) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan=3>
                                                    @lang('common.trade.norecordsfound')</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="orderform">
                    <h2 class="heading-box">Order Form</h2>
                    <ul class="ruleslist">
                        <li><a><i class="fa fa-info-circle" aria-hidden="true"></i> Trading Rules<div
                                    class="none rulesnotes">
                                    <table class="table sitetable">
                                        <tbody>
                                            <tr>
                                                <td>Minimum Trade Amount :</td>
                                                <td>0.000001 {{ $coinone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Min Price Movement :</td>
                                                <td>0.000001 {{ $cointwo }}</td>
                                            </tr>
                                            <tr>
                                                <td>Minimum Order Size :</td>
                                                <td>0.000001 {{ $cointwo }}</td>
                                            </tr>
                                            <tr>
                                                <td>Maximum Market Order Amount :</td>
                                                <td>0.000001 {{ $coinone }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div></a></li>
                    </ul>
                    <div class="orderformbg">
                        <div class="orderformbg1">
                            <div class="buyselltabbg">
                                <ul class="nav nav-tabs orderfrmtab buyselltab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#buy">Buy</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                            href="#sell">Sell</a></li>
                                </ul>
                            </div>
                            <div class="clostbuytab"><a href="#"><i class="fa fa-times"></i></a></div>
                            <div class="tab-content">
                                <div id="buy" class="tab-pane active">
                                    <ul class="nav nav-tabs orderfrmtab limitabbg" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                href="#limit">Limit</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="#market">Market</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <input type="hidden" placeholder="" class="input-xlarge" id="pairvalue"
                                            value="{{ $pair }}">
                                        <div id="limit" class="tab-pane active">
                                            <div class="buyorderform">
                                                <div class="balancewlt">
                                                    <h6 class="h6"><img
                                                            src="{{ url('images/wallet.svg') }}"><span
                                                            class="coinTwobalance">
                                                            @if (isset($balance[$cointwo]['balance']))
                                                            {{ display_format($balance[$cointwo]['balance'], $cointwo_decimal) }} 
                                                            @else
                                                            {{ display_format(0, $cointwo_decimal) }} {{ $cointwo }}
                                                            @endif</span> <span>{{ $cointwo }}</span>
                                                            @if ((isset($balance[$cointwo]['balance'])) && $balance[$cointwo]['balance'] <= 0)
                                                            <a href="{{ url('deposit/KES') }}">Deposit</a>
                                                            @endif
                                                        </h6>                                                        
                                                </div>
                                                <form class="siteformbg" id="buylimit">
                                                    {{ csrf_field() }}
                                                    <div id="buystatus" style="display:none"></div>
                                                    <div id="buylimitmsg" class="text-center" style="color: red;">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Price</span></div>
                                                            <input id="buyprice" type="text" placeholder=""
                                                                onkeypress="return AvoidSpace(event)"
                                                                class="form-control" name="buyprice" step="0.000001"
                                                                min="0" max="100000000"
                                                                value="{{ $last[$cointwo][$coinone] * $valusd }}"
                                                                placeholder="Price">
                                                            <div class="input-group-append">
                                                                {{-- <span
                                                                    class="input-group-text">{{ $cointwo }}</span> --}}
                                                                    <span
                                                                    class="input-group-text">{{ "USD" }}</span>
                                                                @if ($errors->has('buyprice'))
                                                                    <span class="help-block">
                                                                        <strong
                                                                            style="color: red;">{{ $errors->first('buyprice') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Amount</span></div>
                                                            <input id="buyvolume" type="text" placeholder=""
                                                                onkeypress="return AvoidSpace(event)"
                                                                class="form-control" name="buyvolume" step="0.000001"
                                                                min="0" max="100000000" placeholder="Amount">
                                                            <div class="input-group-append">
                                                                <span
                                                                    class="input-group-text">{{ $coinone }}</span>
                                                                @if ($errors->has('buyvolume'))
                                                                    <span class="help-block">
                                                                        <strong
                                                                            style="color: red;">{{ $errors->first('buyvolume') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" placeholder="" class="input-xlarge"
                                                        id="buypair" name="buypair" value="{{ $pair }}" />

                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Total</span></div>
                                                            <input type="text" placeholder="" class="form-control"
                                                                onkeypress="return AvoidSpace(event)" id="buytotal"
                                                                name="buytotal" placeholder="Total" >
                                                            <div class="input-group-append">
                                                                {{-- <span
                                                                    class="input-group-text">{{ $cointwo }}</span> --}}
                                                                    <span
                                                                    class="input-group-text">{{ "USD" }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <div class="control-value-box stoplimtboxt">
                                                            <div>limitcount</div>
                                                            <div>
                                                                <div class="row link-div">
                                                                    <div class="col buypercnt activelimit"
                                                                        onclick="Fillbuyvolume('25')">25%</div>
                                                                    <div class="col buypercnt"
                                                                        onclick="Fillbuyvolume('50')">50%</div>
                                                                    <div class="col buypercnt"
                                                                        onclick="Fillbuyvolume('75')">75%</div>
                                                                    <div class="col buypercnt"
                                                                        onclick="Fillbuyvolume('100')">100%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    style="margin-top:-8px;">@lang('common.trade.fee')</span>
                                                            </div>
                                                            <div>
                                                                <span class="feeamt"><span
                                                                        id="buyfees">{{ display_format(0, $cointwo_decimal) }}</span>
                                                                    {{ "USD" }}</span>
                                                            </div>
                                                            </div>
                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend"><span
                                                                                    class="input-group-text">Total (KES)</span></div>
                                                                            <input type="text" placeholder="" class="form-control"
                                                                                onkeypress="return AvoidSpace(event)" id="buytotalkes"
                                                                                name="buytotalkes" placeholder="Total" disabled>
                                                                            <div class="input-group-append">
                                                                                {{-- <span
                                                                                    class="input-group-text">{{ $cointwo }}</span> --}}
                                                                                    <span
                                                                                    class="input-group-text">{{ $cointwo }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                        
                                                    <div class="errormsgbox"></div>
                                                    <div>
                                                            <input type="button" id="" name=""
                                                                onclick="location.href='{{ url('/login') }}';"
                                                                class="btn btn-block sitebtn green-btn"
                                                                value="Login" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="market" class="tab-pane">
                                            <div class="buyorderform">
                                                <div class="balancewlt">
                                                    <h6 class="h6"><img
                                                            src="{{ url('images/wallet.svg') }}"><span
                                                            id='coinTwobalance_market'>
                                                            @if (isset($balance[$cointwo]['balance']))
                                                            {{ display_format($balance[$cointwo]['balance'], $cointwo_decimal) }}
                                                            @else
                                                            {{ display_format(0, $cointwo_decimal) }}
                                                            @endif </span>
                                                        {{ $cointwo }}
                                                        @if ((isset($balance[$cointwo]['balance'])) && $balance[$cointwo]['balance'] <= 0)
                                                            <a href="{{ url('deposit/KES') }}">Deposit</a>
                                                        @endif
                                                    </h6>
                                                </div>
                                                <form id="buymarket" class="siteformbg">
                                                    {{ csrf_field() }}
                                                    <div id="buymarketstatus" style="display:none"></div>
                                                    <div id="buymarketmsg"> </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Price</span></div>
                                                            <input type="text" placeholder=""
                                                                onkeypress="return AvoidSpace(event)"
                                                                class="form-control currentMarketPrice" value=""
                                                                disabled="">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text">{{ 'USD' }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Amount</span></div>
                                                            <input type="text" placeholder="" class="form-control"
                                                                id="buymarketvolume" name="buymarketvolume"
                                                                onkeyup="if (/[^0-9.]/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,''); Fillmarketbuyvolume();"                                                                
                                                                placeholder="Amount" required step="0.0001" min="0"
                                                                max="1000000">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text">{{ $coinone }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input hidden id="buymarketprice" type="text" placeholder=""
                                                    onkeypress="return AvoidSpace(event)"
                                                    class="form-control" name="buymarketprice" step="0.000001"
                                                    min="0" max="100000000"  
                                                    value="{{ $last[$cointwo][$coinone] * $valusd }}"
                                                    placeholder="Price">
                                                    <input hidden type="text" placeholder="" class="form-control"
                                                    onkeypress="return AvoidSpace(event)" id="buymarkettotal"
                                                    name="buymarkettotal" placeholder="Total" >

                                                    <input type="hidden" placeholder="" class="input-xlarge"
                                                        id="buypair" name="buypair" value="{{ $pair }}">

                                                    <div class="form-group">
                                                        <div class="control-value-box stoplimtboxt">
                                                            <div>limitcount</div>
                                                            <div>
                                                                <div class="row link-div">
                                                                    <div class="col buymarpercnt activelimit"
                                                                        onclick="Fillmarketbuyvolume('25')">25%</div>
                                                                    <div class="col buymarpercnt"
                                                                        onclick="Fillmarketbuyvolume('50')">50%</div>
                                                                    <div class="col buymarpercnt"
                                                                        onclick="Fillmarketbuyvolume('75')">75%</div>
                                                                    <div class="col buymarpercnt"
                                                                        onclick="Fillmarketbuyvolume('100')">100%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    style="margin-top:-8px;">@lang('common.trade.fee')</span>
                                                            </div>
                                                            {{-- <div><span class="feeamt"><span
                                                                        id="marketbuyfees">{{ display_format(0, $cointwo_decimal) }}</span>
                                                                    {{ "USD" }}</span></div> --}}
                                                                    <div><span class="feeamt"><span
                                                                        id="buymarketfees">{{ display_format(0, $cointwo_decimal) }}</span>
                                                                    {{ "USD" }}</span></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Estimated</span></div>
                                                            <input type="text" placeholder="" class="form-control"
                                                                onkeypress="return AvoidSpace(event)" id="buytotalmarketkes"
                                                                name="buytotalmarketkes" placeholder="Total" >
                                                            <div class="input-group-append">
                                                                {{-- <span
                                                                    class="input-group-text">{{ $cointwo }}</span> --}}
                                                                    <span
                                                                    class="input-group-text">{{ $cointwo }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="errormsgbox"></div>
                                                    <div>
                                                            <input type="button" id="" name=""
                                                                onclick="location.href='{{ url('/login') }}';"
                                                                class="btn btn-block sitebtn green-btn"
                                                                value="Login" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="sell" class="tab-pane">
                                    <ul class="nav nav-tabs orderfrmtab limitabbg" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                href="#limit1">Limit</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="#market1">Market</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="limit1" class="tab-pane active">
                                            <div class="sellorderform">
                                                <div class="balancewlt">
                                                    <h6 class="h6"><img
                                                            src="{{ url('images/wallet.svg') }}"><span
                                                            class="coinOnebalance">
                                                            @if (isset($balance[$coinone]['balance']))
                                                                {{ display_format($balance[$coinone]['balance'], $coinone_decimal) }}
                                                            @else
                                                                0.00000000
                                                            @endif
                                                        </span> {{ $coinone }}</h6>
                                                </div>
                                                <form class="siteformbg" id="sellimit">
                                                    <div id="sellstatus" style="display:none"></div>
                                                    <div id="selllimitmsg" class="text-center" style="color: red;">
                                                    </div>
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Price</span></div>
                                                            <input type="text" placeholder=""
                                                                onkeypress="return AvoidSpace(event)"
                                                                class="form-control" id="sellprice" name="sellprice"
                                                                required="required" step="0.0001" min="0" max="1000000"
                                                                value="{{ $last[$cointwo][$coinone] }}"
                                                                placeholder="Price">
                                                            <div class="input-group-append">
                                                                {{-- <span
                                                                    class="input-group-text">{{ $cointwo }}</span> --}}
                                                                    <span
                                                                    class="input-group-text">{{ "USD" }}</span>
                                                                @if ($errors->has('sellprice'))
                                                                    <span class="help-block">
                                                                        <strong
                                                                            style="color: red;">{{ $errors->first('sellprice') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Amount</span></div>
                                                            <input type="text" placeholder=""
                                                                onkeypress="return AvoidSpace(event)"
                                                                class="form-control" id="sellvolume"
                                                                name="sellvolume" required="required" step="0.0001"
                                                                min="0" max="1000000" placeholder="Amount">
                                                            <div class="input-group-append">
                                                                <span
                                                                    class="input-group-text">{{ $coinone }}</span>
                                                                @if ($errors->has('sellvolume'))
                                                                    <span class="help-block">
                                                                        <strong
                                                                            style="color: red;">{{ $errors->first('sellvolume') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Total</span></div>
                                                            <input type="text" placeholder=""
                                                                onkeypress="return AvoidSpace(event)"
                                                                class="form-control" id="selltotal" name="selltotal"
                                                                onkeyup="if (/[^0-9.]/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')">

                                                                {{-- <input type="text" placeholder="" class="form-control"
                                                                onkeypress="return AvoidSpace(event)" id="buytotal"
                                                                name="buytotal" placeholder="Total" > --}}
                                                            <div class="input-group-append">
                                                                {{-- <span
                                                                    class="input-group-text">{{ $cointwo }}</span> --}}
                                                                    <span
                                                                    class="input-group-text">{{ "USD" }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" placeholder="" class="input-xlarge"
                                                        id="sellpair" name="sellpair" value="{{ $pair }}">

                                                     <div class="form-group">
                                                        <div class="control-value-box stoplimtboxt">
                                                            <div>limitcount</div>
                                                            <div>
                                                                <div class="row link-div">
                                                                    <div class="col sellpercnt activelimit"
                                                                        onclick="Fillsellvolume('25')">25%</div>
                                                                    <div class="col sellpercnt"
                                                                        onclick="Fillsellvolume('50')">50%</div>
                                                                    <div class="col sellpercnt"
                                                                        onclick="Fillsellvolume('75')">75%</div>
                                                                    <div class="col sellpercnt"
                                                                        onclick="Fillsellvolume('100')">100%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    style="margin-top:-8px;">@lang('common.trade.fee')</span>
                                                            </div>
                                                            <div><span class="feeamt"><span
                                                                        id="sellfees">{{ display_format(0, $cointwo_decimal) }}</span>
                                                                    {{ $coinone }}</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Total (KES)</span></div>
                                                            <input type="text" placeholder="" class="form-control"
                                                                onkeypress="return AvoidSpace(event)" id="selltotalkes" disabled
                                                                name="selltotalkes" placeholder="Total" >
                                                            <div class="input-group-append">
                                                                    <span class="input-group-text">{{ $cointwo }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="errormsgbox"></div>
                                                    <div>
                                                            <input type="button" id="" name=""
                                                                onclick="location.href='{{ url('/login') }}';"
                                                                class="btn btn-block sitebtn red-btn"
                                                                value="Login" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="market1" class="tab-pane">
                                            <div class="sellorderform">
                                                <div class="balancewlt">
                                                    <h6 class="h6"><img
                                                            src="{{ url('images/wallet.svg') }}"><span
                                                            id='coinOnebalance_market'>
                                                            @if (isset($balance[$coinone]['balance']))
                                                                {{ display_format($balance[$coinone]['balance'], $coinone_decimal) }}
                                                            @else
                                                                0.00000000
                                                            @endif
                                                        </span> {{ $coinone }}</h6>
                                                </div>
                                                <form class="siteformbg" id="sellmarket">
                                                    {{ csrf_field() }}
                                                    <div id="sellmarketstatus" style="display:none"></div>
                                                    <div id="sellmarketmsg"></div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Price</span></div>
                                                            <input type="text" placeholder=""
                                                                onkeypress="return AvoidSpace(event)"
                                                                class="form-control currentMarketPrice" value="" disabled=""
                                                               >
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text">USD</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Amount</span></div>
                                                            <input type="text" placeholder=""                                                                
                                                                class="form-control" id="sellmarketvolume"
                                                                name="sellmarketvolume"
                                                                onkeyup="if (/[^0-9.]/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,''); Fillmarketsellvolume();"
                                                                required step="0.0001" min="0" max="1000000">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text">{{ $coinone }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input hidden id="sellmarketprice" type="text" placeholder=""
                                                    onkeypress="return AvoidSpace(event)"
                                                    class="form-control" name="sellmarketprice" step="0.000001"
                                                    min="0" max="100000000" 
                                                    value="{{ $last[$cointwo][$coinone] * $valusd }}"
                                                    placeholder="Price">

                                                    <input hidden type="text" placeholder="" class="form-control"
                                                    onkeypress="return AvoidSpace(event)" id="sellmarkettotal"
                                                    name="sellmarkettotal" placeholder="Total" >

                                                    <input type="hidden" placeholder="" class="input-xlarge"
                                                        id="sellpair" name="sellpair" value="{{ $pair }}">

                                                    <div class="form-group">
                                                        <div class="control-value-box stoplimtboxt">
                                                            <div>limitcount</div>
                                                            <div>
                                                                <div class="row link-div">
                                                                    <div class="col sellmarpercnt activelimit"
                                                                        onclick="Fillmarketsellvolume('25')">25%</div>
                                                                    <div class="col sellmarpercnt"
                                                                        onclick="Fillmarketsellvolume('50')">50%</div>
                                                                    <div class="col sellmarpercnt"
                                                                        onclick="Fillmarketsellvolume('75')">75%</div>
                                                                    <div class="col sellmarpercnt"
                                                                        onclick="Fillmarketsellvolume('100')">100%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    style="margin-top:-8px;">@lang('common.trade.fee')</span>
                                                            </div>
                                                            {{-- <div><span class="feeamt"><span
                                                                        id="marketsellfees">{{ display_format(0, $cointwo_decimal) }}</span>
                                                                    {{ $coinone }}</span></div> --}}
                                                                    <div><span class="feeamt"><span
                                                                        id="sellmarketfees">{{ display_format(0, $cointwo_decimal) }}</span>
                                                                    {{ $coinone }}</span></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">Estimated</span></div>
                                                            <input type="text" placeholder="" class="form-control"
                                                                onkeypress="return AvoidSpace(event)" id="selltotalmarketkes"
                                                                name="selltotalmarketkes" placeholder="Total" >
                                                            <div class="input-group-append">
                                                                {{-- <span
                                                                    class="input-group-text">{{ $cointwo }}</span> --}}
                                                                    <span
                                                                    class="input-group-text">{{ $cointwo }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="errormsgbox"></div>
                                                    <div>
                                                            <input type="button" id="" name=""
                                                                onclick="location.href='{{ url('/login') }}';"
                                                                class="btn btn-block sitebtn red-btn"
                                                                value="Login" />
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
                        <table class="table sitetable">
                            <thead>
                                <tr>
                                    <th>Price({{ 'USD' }})</th>
                                    <th>Amount({{ $coinone }})</th>
                                    <th>Total({{ 'USD' }})</th>
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                            <tbody class="table-body" id='tradeHistory'>
                                @forelse($completetrades as $completedtrade)
                                    <tr>
                                        @if ($completedtrade->type == 'Buy')
                                            <td><span
                                                    class="t-green">{{ display_format($completedtrade->price, $cointwo_decimal) }}</span>
                                            </td>
                                        @elseif($completedtrade->type == 'Sell')
                                            <td><span
                                                    class="t-red">{{ display_format($completedtrade->price, $cointwo_decimal) }}</span>
                                            </td>
                                        @endif
                                        <td>{{ display_format($completedtrade->volume, $coinone_decimal) }}</td>
                                        <td>{{ ncMul($completedtrade->price, $completedtrade->volume, $cointwo_decimal) }}
                                        </td>
                                        <td>{{ date('d-m-y,H:i:s', strtotime($completedtrade->created_at)) }}</td>
                                    </tr>
                                @empty
                                    {{-- <tr>
                                        <td colspan=4>@lang('common.trade.norecordsfound') !</td>
                                    </tr> --}}
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="openorder">
                    <div class="innerpagetab historytab">
                        <ul class="nav nav-tabs tabbanner" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                    href="#openorder">Open Orders</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                    href="#orderhistory">My Order History</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="openorder" class="tab-pane active">
                            <h2 class="heading-box">Open Orders</h2>
                            <div class="table-responsive sitescroll" data-simplebar>
                                @if (session('cancelsuccess'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ session('cancelsuccess') }}</strong>
                                    </div>
                                @endif
                                @if (session('cancelerror'))
                                    <div class="alert alert-warning alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ session('cancelerror') }}</strong>
                                    </div>
                                @endif
                                <table class="table sitetable table-responsive-stack" id="table1">
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

                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="orderhistory" class="tab-pane">
                        <h2 class="heading-box">Order History</h2>
                        <div class="table-responsive sitescroll" data-simplebar>
                            <table class="table sitetable table-responsive-stack" id="table2">
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
                                    </tr>
                                </thead>
                                <tbody id="myallorders">
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
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "dark",
        "data": {
            "_token": "{{ csrf_token() }}",
            "marketpair": $('#marketpair').val()

        },
        "dataLoader": {
            "url": "{{ url('marketdepthchart/' . $pair) }}",
            "type": "POST",
            "format": "json",
            "reload": 30,
            "postProcess": function(data) {

                // Function to process (sort and calculate cummulative volume)
                function processData(list, type, desc) {

                    // Convert to data points
                    for (var i = 0; i < list.length; i++) {
                        list[i] = {
                            value: Number(list[i][0]),
                            volume: Number(list[i][1]),
                        }
                    }

                    // Sort list just in case
                    list.sort(function(a, b) {
                        if (a.value > b.value) {
                            return 1;
                        } else if (a.value < b.value) {
                            return -1;
                        } else {
                            return 0;
                        }
                    });

                    // Calculate cummulative volume
                    if (desc) {
                        for (var i = list.length - 1; i >= 0; i--) {
                            if (i < (list.length - 1)) {
                                list[i].totalvolume = list[i + 1].totalvolume + list[i].volume;
                            } else {
                                list[i].totalvolume = list[i].volume;
                            }
                            var dp = {};
                            dp["value"] = list[i].value;
                            dp[type + "volume"] = list[i].volume;
                            dp[type + "totalvolume"] = list[i].totalvolume;
                            res.unshift(dp);
                        }
                    } else {
                        for (var i = 0; i < list.length; i++) {
                            if (i > 0) {
                                list[i].totalvolume = list[i - 1].totalvolume + list[i].volume;
                            } else {
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
            txt = "Ask: <strong>" + formatNumber(item.dataContext.value, graph.chart, 4) + "</strong><br />" +
                "Total volume: <strong>" + formatNumber(item.dataContext.askstotalvolume, graph.chart, 4) +
                "</strong><br />" +
                "Volume: <strong>" + formatNumber(item.dataContext.asksvolume, graph.chart, 4) + "</strong>";
        } else {
            txt = "Bid: <strong>" + formatNumber(item.dataContext.value, graph.chart, 4) + "</strong><br />" +
                "Total volume: <strong>" + formatNumber(item.dataContext.bidstotalvolume, graph.chart, 4) +
                "</strong><br />" +
                "Volume: <strong>" + formatNumber(item.dataContext.bidsvolume, graph.chart, 4) + "</strong>";
        }
        return txt;
    }

    function formatNumber(val, chart, precision) {
        return AmCharts.formatNumber(
            val, {
                precision: precision ? precision : chart.precision,
                decimalSeparator: chart.decimalSeparator,
                thousandsSeparator: chart.thousandsSeparator
            }
        );
    }
</script>


<script language="javascript" type="text/javascript">

    function open_orders(orders){
        var html = "";
        if(orders.length){
            orders.forEach(function(order){
                html = html + `
                <tr>
                    <td>
                        ${order.order_type_string}
                    </td>
                    <td>${order.created_at}</td>
                    <td>
                        ${
                            (order.type == 'buy') ?
                                "<span class='t-green'>@lang('common.trade.buy')</span>"
                            :
                                "<span class='t-red'>@lang('common.trade.sell')</span>"
                        }
                    </td>
                    <td>${ order.pair_string }</td>
                    <td>${ order.original_price }</td>
                    <td>${ order.volume }</td>
                    <td>${ order.remaining }</td>
                    <td>${ order.fees }</td>
                    <td>${ order.value }</td>
                    <td>${ order.status_string }</td>
                    <td>
                        <a href="${  order.cancel_link }" class="btn sitebtn viewbtn">
                            @lang('common.trade.cancel')
                        </a>
                    </td>
                </tr>
                `;
            });
        } else {
            html = `
            <tr>
                <td colspan='12' class='text-center'>@lang('common.trade.norecordsfound') !</td>
            </tr>
            `;
        }
        return html;
    }

    function order_history(orders){
        var html = "";
        if(orders.length){
            orders.forEach(function(order){
                html = html + `
                <tr>
                    <td>
                        ${order.order_type_string}
                    </td>
                    <td>${order.created_at}</td>
                    <td>
                        ${
                            (order.type == 'buy') ?
                                "<span class='t-green'>@lang('common.trade.buy')</span>"
                            :
                                "<span class='t-red'>@lang('common.trade.sell')</span>"
                        }
                    </td>
                    <td>${ order.pair_string }</td>
                    <td>${ order.original_price }</td>
                    <td>${ order.volume }</td>
                    <td>${ order.remaining }</td>
                    <td>${ order.fees }</td>
                    <td>${ order.value }</td>
                    <td>${ order.status_string }</td>
                </tr>
                `;
            });
        } else {
            html = `
            <tr>
                <td colspan='12' class='text-center'>@lang('common.trade.norecordsfound') !</td>
            </tr>
            `;
        }
        return html;
    }

    $(function(){
        $('#myopenorders').html(open_orders(@json($myopenorder)));
        $('#myallorders').html(order_history(@json($myallorder)));
    });
    $('#buyvolume , #buyprice').on('keyup', function() {
        buycal();
    });

    $('#sellvolume, #sellprice').on('keyup', function() {
        sellcal();
    });
    $('#buyvolume , #buyprice').on('change', function() {
        buycal();
    });

    $('#sellvolume, #sellprice').on('change', function() {
        sellcal();
    });

    $('#buytotal , #buyprice').on('keyup', function() {
        buytotalcal();
    });
    $('#buytotal , #buyprice').on('change', function() {
        buytotalcal();
    });


    $('#selltotal , #sellprice').on('keyup', function() {
        selltotalcal();
    });
    $('#selltotal , #sellprice').on('change', function() {
        selltotalcal();
    });



    function findincludingfee(amount, percentage) {
        var amttax = parseFloat(amount) + parseFloat(percentage);
        var rateint = parseFloat(amount) / parseFloat(amttax);
        var CommissionValue = parseFloat(rateint) * parseFloat(percentage);
        var SpendAmount = parseFloat(amount) - parseFloat(CommissionValue);
        return SpendAmount;
    }


    function sellcal() {
        
        var convpr = @json($valusd);
        var sellprice = parseFloat($('#sellprice').val());
        var sellvolume = parseFloat($('#sellvolume').val());
        var selltotal = parseFloat(sellprice) * parseFloat(sellvolume);
        var sellfee = parseFloat(sellvolume) * parseFloat({{ $commissionone }});

        var selltotalkes =  selltotal * parseFloat(convpr);

        if (sellprice > 0 && sellvolume > 0) {
            if (selltotal > 0) {
                $('#selltotal').val(toFixed(selltotal, {{ $cointwo_decimal }}));
                $('#selltotalkes').val(toFixed(selltotalkes, {{ $cointwo_decimal }}));
                $('#sellfees').html(toFixed(sellfee, {{ $cointwo_decimal }}));
            } else {
                $('#sellfees').html(toFixed(0, {{ $coinone_decimal }}));
                $('#selltotal').val(toFixed(0, {{ $cointwo_decimal }}));
                $('#selltotalkes').val(toFixed(0, {{ $cointwo_decimal }}));
            }
        } else {
            $('#selltotal').val('');
            $('#selltotalkes').val('');
        }

        var sellmarketprice = parseFloat($('#sellmarketprice').val());
        var sellmarketvolume = parseFloat($('#sellmarketvolume').val());
        var sellmarkettotal = parseFloat(sellmarketprice) * parseFloat(sellmarketvolume);

        var selltotalmarketkes =  sellmarkettotal * parseFloat(convpr);

        var feemarket = parseFloat(sellmarketvolume) * parseFloat({{ $commissionone }});

        if (sellmarketprice > 0 && sellmarketvolume > 0) {
            if (sellmarkettotal > 0) {
                $("#selltotalmarketkes").val(toFixed(selltotalmarketkes, {{ $cointwo_decimal }}));
                $('#sellmarketfees').html(toFixed(feemarket,{{ $cointwo_decimal }}));
            } else {
                $("#selltotalmarketkes").val(toFixed(0, {{ $cointwo_decimal }}));
                $('#sellmarketfees').html(toFixed(0, {{ $coinone_decimal }}));
            }
        } else {
            $('#sellmarkettotal').val('');
            $('#selltotalmarketkes').val('');
        }
    }

    function selltotalcal() {
        var convpr = @json($valusd);
        var sellprice = parseFloat($('#sellprice').val());
        var selltotal = parseFloat($('#selltotal').val());
        var selltotalkes =  selltotal * parseFloat(convpr);
        var sellvolume = parseFloat(selltotal)/parseFloat(sellprice);
        var sellfee = parseFloat(sellvolume) * parseFloat({{ $commissionone }});
        if (sellprice > 0 && selltotal > 0) {
            if (sellvolume > 0) {
                $("#sellvolume").val(toFixed(sellvolume, {{ $coinone_decimal }}));
                $("#selltotalkes").val(toFixed(selltotalkes, {{ $cointwo_decimal }}));
                $('#sellfees').html(toFixed(sellfee, {{ $coinone_decimal }}));
            } else {
                $("#sellvolume").val(toFixed(0, {{ $coinone_decimal }}));
                $("#selltotalkes").val(toFixed(0, {{ $cointwo_decimal }}));
                $('#sellfees').html(toFixed(0, {{ $coinone_decimal }}));
            }
        } else {
            $('#selltotal').val('');
            $('#selltotalkes').val('');
        }
    }

    function buycal() {
       var convpr = @json($valusd);
        var buyprice = parseFloat($('#buyprice').val());
        var buyvolume = parseFloat($('#buyvolume').val());
        var buytotal = parseFloat(buyprice) * parseFloat(buyvolume);
        var buyfee = parseFloat(buytotal) * parseFloat({{ $commissiontwo }});
        if (buyprice > 0 && buyvolume > 0) {
            buytotal = parseFloat(buytotal);
            var buytotalkes =  parseFloat(buytotal+buyfee) * parseFloat(convpr);
            if (buytotal > 0) {
                $('#buyfees').html(toFixed(buyfee,{{ $cointwo_decimal }}));
                $('#buytotal').val(toFixed(buytotal,{{ $cointwo_decimal }}));
                $('#buytotalkes').val(toFixed(buytotalkes,{{ $cointwo_decimal }}));
            } else {
                $('#buyfees').html(toFixed(0, {{ $cointwo_decimal }}));
                $('#buytotal').val(toFixed(0, {{ $cointwo_decimal }}));
                $('#buytotalkes').val(toFixed(0, {{ $cointwo_decimal }}));
            }
        } else {
            $('#buyfees').html(toFixed(0, {{ $cointwo_decimal }}));
            $('#buytotal').val('');
            $('#buytotalkes').val('');
        }

        var buymarketprice = parseFloat($('#buymarketprice').val());
        var buymarketvolume = parseFloat($('#buymarketvolume').val());
        var buymarkettotal = parseFloat(buymarketprice) * parseFloat(buymarketvolume);
        var buymarketfee = parseFloat(buymarkettotal) * parseFloat({{ $commissiontwo }});
        if (buymarketprice > 0 && buymarketvolume > 0) {
            buymarkettotal = parseFloat(buymarkettotal) + parseFloat(buymarketfee);
            var buytotalmarketkes =  parseFloat(buymarkettotal) * parseFloat(convpr);
            if (buymarkettotal > 0) {
                $('#buymarketfees').html(toFixed(buymarketfee, {{ $cointwo_decimal }}));
                $('#buytotalmarketkes').val(toFixed(buytotalmarketkes, {{ $cointwo_decimal }}));
            } else {
                $('#buymarketfees').html(toFixed(0, {{ $cointwo_decimal }}));
                $('#buytotalmarketkes').val(toFixed(0, {{ $cointwo_decimal }}));
            }
        } else {
            $('#buymarkettotal').val('');
            $('#buytotalmarketkes').val('');
        }
    }

    function buytotalcal() {
       var convpr = @json($valusd);
       var buytotal = parseFloat($('#buytotal').val());
        var buyprice = parseFloat($('#buyprice').val());
        var buyfee = parseFloat(buytotal) * parseFloat({{ $commissiontwo }});
        var buyvolume = parseFloat(buytotal)/parseFloat(buyprice);
        if (buyprice > 0 && buytotal > 0) {
            var buytotalkes =  parseFloat(buytotal + buyfee) * parseFloat(convpr);
            if (buyvolume > 0) {
                $('#buyfees').html(toFixed(buyfee, {{ $cointwo_decimal }}));
                $('#buyvolume').val(toFixed(buyvolume,{{$coinone_decimal}}));
                $('#buytotalkes').val(toFixed(buytotalkes, {{ $cointwo_decimal }}));
            } else {
                $('#buyfees').html(toFixed(0, {{ $cointwo_decimal }}));
                $('#buytotal').val(toFixed(0, {{ $cointwo_decimal }}));
                $('#buytotalkes').val(toFixed(0, {{ $cointwo_decimal }}));
            }
        } else {
            $('#buytotal').val('');
            $('#buytotalkes').val('');
        }
    }

    function toFixed(num, fixed) {
        return parseFloat(num).toFixed(fixed);
    }

    function sellRow(price, volume) {

        document.getElementById("buyprice").value = price;
        document.getElementById("buyvolume").value = volume;
        document.getElementById("buymarketvolume").value = volume;
        document.getElementById("buymarketprice").value = price;

         $('.green-bg').addClass('active');
         $('#buy').addClass('active in');
        
         $('.red-bg').removeClass('active');
         $('#sell').removeClass('active in');

        $('#buy-limit-order').addClass('active in');
        $('#buy-market-order').removeClass('active in');

        // $('.red-bg').removeClass('active');
        // $('#sell').removeClass('active in');

        buycal();
        document.getElementById("sellprice").value = price;


    }

    function buyRow(price, volume) {

        document.getElementById("sellprice").value = price;
        document.getElementById("sellvolume").value = volume;
        document.getElementById("sellmarketvolume").value = volume;
        document.getElementById("sellmarketprice").value = price;

         $('.red-bg').addClass('active');
         $('#sell').addClass('active in');

         $('.green-bg').removeClass('active');
         $('#buy').removeClass('active in');

        // $('.red-bg').addClass('active');
        // $('#sell').addClass('active in');
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
                .replace(/[^\d.]/g, '') // numbers and decimals only
                .replace(/(\..*)\./g, '$1') // decimal can't exist more than once
                .replace(/(\.[\d]{8})./g, '$1'); // not more than 4 digits after decimal
            if (this.value == '0.0000' || this.value == '.0000') {
                this.value = '0.000';
            }
        });

        $('#buyvolume, #sellvolume').on('input', function() {
            this.value = this.value
                .replace(/[^\d.]/g, '') // numbers and decimals only
                .replace(/(\..*)\./g, '$1') // decimal can't exist more than once
                .replace(/(\.[\d]{8})./g, '$1'); // not more than 4 digits after decimal
            if (this.value == '0.0000' || this.value == '.0000') {
                this.value = '0.000';
            }
        });

    });


    



    $(document).ready(function() {
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

    $('#buymarketvolume').on('change', function() {
        Fillmarketbuyvolume();
    });
    $('#sellmarketvolume').on('change', function() {
        Fillmarketsellvolume();
    });
    $(function() {
        $(".buypercnt").on("click", function() {
            $(".buypercnt").removeClass("activelimit"); // remove active class from all
            $(this).addClass("activelimit"); // add active class to clicked element        
        });
    });

    $(function() {
        $(".sellpercnt").on("click", function() {
            $(".sellpercnt").removeClass("activelimit"); // remove active class from all
            $(this).addClass("activelimit"); // add active class to clicked element        
        });
    });

    $(function() {
        $(".buymarpercnt").on("click", function() {
            $(".buymarpercnt").removeClass("activelimit"); // remove active class from all
            $(this).addClass("activelimit"); // add active class to clicked element        
        });
    });

    $(function() {
        $(".sellmarpercnt").on("click", function() {
            $(".sellmarpercnt").removeClass("activelimit"); // remove active class from all
            $(this).addClass("activelimit"); // add active class to clicked element        
        });
    });


    function Fillbuyvolume(id) {
        var valusd = @json($valusd); // This is what I have updated   valusd  
        var pairvalue = document.getElementById('pairvalue').value;
        var price = document.getElementById('buyprice').value;
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: '{{ route('fillbuyvolume') }}', // This is what I have updated   
            data: {
                "_token": "{{ csrf_token() }}",
                "pair": pairvalue,
                "percentage": id,
                "price": price
            }
        }).done(function(request) {
            $('.loader').hide();
            if (request.success == true) {
                $("#buyvolume").val(parseFloat(request.buyingvalue *valusd).toFixed(@json($coinone_decimal)));
                $("#buytotal").val(parseFloat(request.totalvalue *valusd).toFixed(@json($cointwo_decimal)));
                $("#buytotalkes").val(parseFloat(request.totalvalue).toFixed(@json($cointwo_decimal)));
                $('#buyfees').html(parseFloat(request.buyingfee).toFixed(@json($cointwo_decimal)));
            } else {
                $('#buylimitmsg').html(request.message);
            }
        });
        
    }

    function Fillsellvolume(id) {
        var valusd = @json($valusd); 
        var pairvalue = document.getElementById('pairvalue').value;
         var price = document.getElementById('buyprice').value;
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: '{{ route('fillsellvolume') }}', // This is what I have updated        
            data: {
                "_token": "{{ csrf_token() }}",
                "pair": pairvalue,
                "percentage": id,
                "price": price
            }
        }).done(function(request) {
            $('.loader').hide();
            if (request.success == true) {
                $("#sellvolume").val(parseFloat(request.sellingvalue *valusd).toFixed(@json($coinone_decimal)));
                $("#selltotal").val(parseFloat(request.totalvalue *valusd).toFixed(@json($cointwo_decimal)));
                $("#selltotalkes").val(parseFloat(request.totalvalue).toFixed(@json($cointwo_decimal))); //updated
                $('#sellfees').html(parseFloat(request.sellingfee).toFixed(@json($cointwo_decimal)));
            } else {
                $('#selllimitmsg').html(request.message);
            }
        });
    }


    function Fillmarketbuyvolume(id) {
        var pairvalue = document.getElementById('pairvalue').value;
        var marketvolume = document.getElementById('buymarketvolume').value;
        var price = $(".currentMarketPrice").val();
        if( (id == undefined || id == '') && (marketvolume == "" || marketvolume == 0 || !marketvolume)){
            return;
        }
        if (id == undefined || id == '') {
            id = '';
        }
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: '{{ route('fillmarketbuyvolume') }}', // This is what I have updated       
            data: {
                "_token": "{{ csrf_token() }}",
                "buymarketvolume": marketvolume,
                "pair": pairvalue,
                "percentage": id,
                "price": price
            }
        }).done(function(request) {
            $('.loader').hide();
            if (request.success == true) {
               // if (id != '') {
                    $("#buytotalmarketkes").val(toFixed(request.buyingvalue,{{ $cointwo_decimal }}));
              //  }
              if(id){
                $("#buymarketvolume").val(toFixed(request.buyingamount,{{ $coinone_decimal }}));
              }
                $('#buymarketfees').html(toFixed(request.buyingfee,{{ $cointwo_decimal }}));
            } else {
                $('#buymarketmsg').html(request.message);
            }
        });
    }

    function Fillmarketsellvolume(id) {
        var pairvalue = document.getElementById('pairvalue').value;
        var marketvolume = document.getElementById('sellmarketvolume').value;
        var price = $(".currentMarketPrice").val();
        if((id == undefined || id == '') && (marketvolume == "" || marketvolume == 0 || !marketvolume)){
            return;
        }
        if (id == undefined || id == '') {
            id = '';
        }
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: '{{ route('fillmarketsellvolume') }}', // This is what I have updated      
            data: {
                "_token": "{{ csrf_token() }}",
                "sellmarketvolume": marketvolume,
                "pair": pairvalue,
                "percentage": id,
                "price": price
            }
        }).done(function(request) {
            $('.loader').hide();
            if (request.success == true) {
                // if (id != '') {
                    $("#selltotalmarketkes").val(toFixed(request.sellingvalue,{{ $cointwo_decimal }}));
                // }
                if(id){
                    $("#sellmarketvolume").val(toFixed(request.sellingamount,{{ $coinone_decimal }}));
                }
                $('#sellmarketfees').html(toFixed(request.sellingfee,{{ $cointwo_decimal }}));
            } else {
                $('#sellmarketmsg').html(request.message);
            }
        });
    }

    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }

    $("#searchtextbox").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#livemarket tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>




<!-- //binance socket

//websocket -->


  <script type="text/javascript">

function sortKeys(obj, desc){
  var keys = Object.keys(obj);
  keys.sort((a, b) => { var d = +a - +b; return desc? -d : d; });
  var res = {};
  keys.forEach(i => res[i] = obj[i]);
  return res;
}
function financial(val, limit=2){
  return Number.parseFloat(val).toFixed(limit);
} 



var depthSocketBuffer;
var depthSocketBufferB = {};
var depthSocketBufferA = {};
var depthSocketBufferId;
var lastEventUpdateId;
var depth;
var orderbook;
var depthprice={{$con_price}};
var buydepthprice=1;
var selldepthprice=1;
var k= true; 
var ordered = {};
var newU = false;


function depthhistroy(){
      $.ajax({url:"{{ url('ajaxDepthorderbookjson')}}/{{ $coinone}}/{{'usdt'}}", type:"GET", async:false,dataType: "json", cache:false, success:function(result)
      {
        depthSocketBuffer=result;
depthSocketBufferId=depthSocketBuffer.lastUpdateId;  
      $.each(depthSocketBuffer.bids, function(k, v){
        listprice=parseFloat(parseFloat(v[0]) * parseFloat(depthprice)).toFixed(8);
        depthSocketBufferB[listprice] = parseFloat(v[1]);
      });
      $.each(depthSocketBuffer.asks, function(k, v){
        listprice=parseFloat(parseFloat(v[0]) * parseFloat(depthprice)).toFixed(8);
        depthSocketBufferA[listprice] = parseFloat(v[1]);
      });
      }});
}

@if($binance == true)
    $(document).ready(function(){
     
    //   var websocket = new WebSocket("wss://stream.binance.com:9443/ws/{{ $binance_coinone.$binance_cointwo }}@depth@500ms");  
     var websocket = new WebSocket("wss://stream.binance.com:9443/ws/{{ $binance_coinone.'usdt' }}@depth@1000ms");  
  //  var websocket = new WebSocket("wss://stream.binance.com:9443/ws/{{ $binance_coinone.$binance_cointwo }}@depth@1000ms"); 
  
        websocket.onopen = function(event) {
          var messageJSON = {
              "method": "SUBSCRIBE",
              "params": [
                "{{ $binance_coinone.'usdt' }}@aggTrade",
                "{{ $binance_coinone.'usdt' }}@depth"
              ],
              "id": 1
            };
            // depthhistroy();
          websocket.send(JSON.stringify(messageJSON));
        }
        websocket.onmessage = function(event) {
          var Data = JSON.parse(event.data);
    
          if(Data.e == 'depthUpdate'){


let id = depthSocketBufferId;
let bufferB = depthSocketBufferB;
let bufferA = depthSocketBufferA;
let obj = JSON.parse(event.data);
let U = obj.U;
let u = obj.u;
let b = obj.b;
let a = obj.a;
let bR = '';
let aR = '';
let newB = {};
let newA = {};
var largesellvolume=0,largebuyvolume=0;

let updateDepthCache = function(){
  $.each(b, function(k, v){
    listprice=parseFloat(parseFloat(v[0]) * parseFloat(depthprice)).toFixed(8);
    if(v[1] === '0.00000000') delete bufferB[listprice];
    else bufferB[listprice] = parseFloat(v[1]);
  });   
  $.each(a, function(k, v){
    listprice=parseFloat(parseFloat(v[0]) * parseFloat(depthprice)).toFixed(8);
    if(v[1] === '0.00000000') delete bufferA[listprice];
    else bufferA[listprice] = parseFloat(v[1]);
  });
}
if(u){
  if(u <= id){}else{
    if(!newU && U <= id + 1 && u >= id + 1){
      updateDepthCache();
      newU = u;
    }else{
      newU = newU + 1;
      updateDepthCache();
    }
  }
}else updateDepthCache();
bufferB = sortKeys(bufferB, false);
bufferA = sortKeys(bufferA, false); 


depthSocketBufferA=bufferA;
depthSocketBufferB=bufferB;
// var res = depthSocketBufferB.map(function(v) {
//   console.log(Object.depthSocketBufferB(v).length); 
// });
 



// if(k == true ){
     var i=0;
    //  var j=0;
    $.each(depthSocketBufferB, function(k, v){ 
        if(Object.keys(depthSocketBufferB).length >50){
      if(i < 50 ){
        delete depthSocketBufferB[k];
      }          
      i=i+1;
      }
       });
    
        var j=1;
      $.each(depthSocketBufferA, function(k, v){
      if(j > 50 )
         delete depthSocketBufferA[k]; 
         j=j+1;
        });
//  k=false;
// }



$.each(depthSocketBufferA, function(k, v){      
 if(v > 0)
    {  
        if(largesellvolume < parseFloat(v)){
            largesellvolume=parseFloat(v);
        }

    }
});


$.each(depthSocketBufferB, function(k, v){      
 if(v > 0)
    {  
        if(largebuyvolume < parseFloat(v)){
            largebuyvolume=parseFloat(v);
        }

    }
});

$.each(depthSocketBufferB, function(k, v){

    var buy_width=parseFloat(v)*100/largebuyvolume;
                        var width_buy=Math.ceil(buy_width);
                        
                        if(width_buy<=3 ) {   // energy meter binance based to show length
                            width_buy=3;
                        }else if(width_buy<=5 ) {
                            width_buy=5;
                        }else if(width_buy<=7 ) {
                            width_buy=7;
                        } 
                

  let bSum = parseFloat(k) * parseFloat(v); 
//   bR = '<tr><td>'+k+'</td><td>'+v+'</td><td>'+financial(bSum)+'</td></tr>' + bR;
  bR =  '<tr  onclick="javascript:buyRow('+k+','+v+');" ><td><span class="t-green">'+parseFloat(k).toFixed({{ $cointwo_decimal}})+'</span></td><td  class="text-right">'+parseFloat(v).toFixed({{ $coinone_decimal}})+'</td><td class="text-right">'+financial(bSum,{{$cointwo_decimal}})+'<span class="greenbg ordervolumebg" style="width:'+width_buy+'%;"></span></td></tr>' + bR;
});
$.each(depthSocketBufferA, function(k, v){  
    

        var sell_width=parseFloat(v)*100/largesellvolume; 
        var width_sell=Math.ceil(sell_width);               
        if(width_sell<=3 ) {   // energy meter binance based to show length
            width_sell=3;
        }else if(width_sell<=5 ) {
            width_sell=5;
        }else if(width_sell<=7 ) {
            width_sell=7;
        }  
 

   let aSum = parseFloat(k) * parseFloat(v);
  //aR = aR + '<tr><td>'+k+'</td><td>'+v+'</td><td>'+financial(aSum)+'</td></tr>';
  aR = aR + '<tr  onclick="javascript:sellRow('+k+','+v+');" ><td><span class="t-red">'+parseFloat(k).toFixed({{ $cointwo_decimal}})+'</span></td><td class="text-right">'+parseFloat(v).toFixed({{ $coinone_decimal}})+'</td><td class="text-right">'+financial(aSum,{{$cointwo_decimal}})+'<span class="redbg ordervolumebg" style="width:'+width_sell+'%;"></span></td></tr>'; 
});

 
$("#buyOrderBook").html(bR);
$("#sellOrderBook").html(aR);

// $("#buyOrderBook tr").slice(50).remove();
// $("#sellOrderBook tr").slice(50).remove();  



if(aR != '')
                {

                    $("#sellpagescroll tbody").each(function(elem,index){
            var arr = $.makeArray($("tr",this).detach());
            arr.reverse();
            $(this).append(arr);
            });

                }
        }
          
            // if(Data.e == 'depthUpdate'){
            //  if(Data.b){
            //      var buy_order_data = '';
            //      var total_buy_volume=0;
            //      var largebuyvolume=0;
     
            //      if((typeof Data['b'] != "undefined" || Data['b'] != null)){
            //          for(var k = 0; k < Data['b'].length; k++){
            //              var item_buy = Data['b'][k];
            //              if(item_buy[1] > 0)
            //                  {
            //                  if(largebuyvolume < parseFloat(item_buy[1])){
            //                      largebuyvolume=parseFloat(item_buy[1]);
            //                  }
            //                  total_buy_volume=parseFloat(total_buy_volume)+parseFloat(item_buy[1]);
            //                }
            //              }
            //          }   

            //          total_buy_volume=parseFloat(total_buy_volume);
                         
                         


            //      if((typeof Data['b'] != "undefined" || Data['b'] != null)){
            //          for(var i = 0; i < Data['b'].length; i++){
                            
            //              var item = Data['b'][i];
            //              if(item[1] > 0)
            //                  {
            //              var buy_tot = item[0] * item[1];
            //              buy_tot = buy_tot.toFixed({{ $cointwo_decimal}});
            //              // var buy_width=parseFloat(item[1])*100/total_buy_volume;
            //              var buy_width=parseFloat(item[1])*100/largebuyvolume;
            //              var width_buy=Math.ceil(buy_width);
                         
            //              if(parseInt(width_buy)<=3 ) {   // energy meter binance based to show length
            //                  width_buy=3;
            //              }else if(parseInt(width_buy)<=5 ) {
            //                  width_buy=5;
            //              }else if(parseInt(width_buy)<=7 ) {
            //                  width_buy=7;
            //              } 
                            

            //              // var width_buy=parseFloat(parseFloat(buy_width)).toFixed(0); 

            //              buy_order_data += '<tr onclick="buyRow('+parseFloat(item[0]).toFixed({{$cointwo_decimal}})+','+parseFloat(item[1]).toFixed({{$coinone_decimal}})+');"><td><span class="t-green">'+parseFloat(item[0]).toFixed({{ $cointwo_decimal}})+'</span></td><td class="text-right">'+parseFloat(item[1]).toFixed({{$coinone_decimal}})+'</td><td class="text-right">'+buy_tot+'<span class="greenbg ordervolumebg" style="width:'+width_buy+'%;"></span></td></tr>'; 


            //              // buy_order_data += '<div class="div-tr" onclick="buyRow('+parseFloat(item[0]).toFixed(8)+','+parseFloat(item[1]).toFixed(8)+');" ><div>'+parseFloat(item[0]).toFixed(8)+'</div><div class="buy-price-green">'+parseFloat(item[1]).toFixed(8)+'</div><div>'+buy_tot+'</div></div>'; 
            //                  }
            //          }
            //          if(buy_order_data != '')
            //             {
            //               $('#buyOrderBook').html(buy_order_data);
            //             }
            //      }
            //  }


            //  var total_sell_volume=0;
            //  var largesellvolume = 0;
            //  if((typeof Data['a'] != "undefined" || Data['a'] != null)){
            //          for(var s = 0; s < Data['a'].length; s++){
            //              var item_buy = Data['a'][s];
            //              if(item_buy[1] > 0)
            //                  {
            //                  // largesellvolume=parseFloat(item_buy[1]);
            //                  if(largesellvolume < parseFloat(item_buy[1])){
            //                      largesellvolume=parseFloat(item_buy[1]);
            //                  }

            //              total_sell_volume=parseFloat(total_sell_volume)+parseFloat(item_buy[1]);
            //                }
            //              }
            //          }   

            //          total_sell_volume=parseFloat(total_sell_volume);

            //  if((typeof Data['a'] != "undefined" || Data['a'] != null)){
            //     var sell_order_data = '';
            //     for(var i = 0; i < Data['a'].length; i++){
            //       var item = Data['a'][i];
            //       if(item[1] > 0)
            //       {
            //         var sell_tot = item[0] * item[1];
            //      sell_tot = sell_tot.toFixed({{ $cointwo_decimal }});
            //      var sell_width=parseFloat(item[1])*100/largesellvolume;
            //      var width_sell=Math.ceil(sell_width);
                 
            //      if(width_sell<=3 ) {   // energy meter binance based to show length
            //          width_sell=3;
            //      }else if(width_sell<=5 ) {
            //          width_sell=5;
            //       }else if(width_sell<=7 ) {
            //          width_sell=7;
            //       } 
                     
            //      sell_order_data += '<tr onclick="sellRow('+parseFloat(item[0]).toFixed({{$cointwo_decimal}})+','+parseFloat(item[1]).toFixed({{$coinone_decimal}})+');"><td><span class="t-red">'+parseFloat(item[0]).toFixed({{ $cointwo_decimal}})+'</span></td><td class="text-right">'+parseFloat(item[1]).toFixed({{ $coinone_decimal}})+'</td><td class="text-right">'+sell_tot+'<span class="redbg ordervolumebg" style="width:'+width_sell+'%;"></span></td></tr>';  
            //       }
            //     }

              

                // if(sell_order_data != '')
                // {
                //   $('#sellOrderBook').html(sell_order_data);
                // //   $("#sellpagescroll").animate({ scrollTop: 20000000 }, "slow");
                //   $(function(){
                //     $("#sellpagescroll tbody").each(function(elem,index){
                //       var arr = $.makeArray($("tr",this).detach());
                //       arr.reverse();
                //       $(this).append(arr);
                //     });
                //   });
                // }
            //   }            
            // }
                     
            

            if((typeof Data['e'] == "aggTrade") || (Data['e'] != null))
              {
                if(Data['e'] == "aggTrade")
                {
                // alert($("#historyall_trade").children().length);
                  var com_order_data = '';
                  $('#myTableRow').remove();

                 
 
                 //   $('#test').html("<div class='loader_smt'></div>");
                  //  $('#historyall_trade').css('display', 'none');
                    var date_ob = new Date(Data['T']);
                  // s=s.toLocaleString('en-US', { hour: 'numeric', hour12: true })

                  // year as 4 digits (YYYY)
                  var year = date_ob.getFullYear();

                  // month as 2 digits (MM)
                  var month = ("0" + (date_ob.getMonth() + 1)).slice(-2);

                  // date as 2 digits (DD)
                  var date = ("0" + date_ob.getDate()).slice(-2);

                  // hours as 2 digits (hh)
                  var hours = ("0" + date_ob.getHours()).slice(-2);

                  // minutes as 2 digits (mm)
                  var minutes = ("0" + date_ob.getMinutes()).slice(-2);

                  // seconds as 2 digits (ss)
                  var seconds = ("0" + date_ob.getSeconds()).slice(-2);
                  

                  // date & time as YYYY-MM-DD hh:mm:ss format: 
                  var s=year + "-" + month + "-" + date + "," + hours + ":" + minutes + ":" + seconds;
 
                  // s = (date_ob.toLocaleTimeString());

                    var is_data = "t-red";
                    var arrow="down";

                    if(Data['m']) { is_data = "t-green"; arrow="up"; }
                    Data['p']= Data['p']*{{$con_price}};
                   var total= parseFloat(Data['p']) * parseFloat(Data['q']);
                   var symbols=Data['s'];
                   

                    com_order_data = ('<tr class="tr-div"  ><td><span class="'+is_data+'">'+parseFloat(Data['p']).toFixed({{ $cointwo_decimal}})+'</span></td><td>'+parseFloat(Data['q']).toFixed({{ $coinone_decimal}})+'</td> <td>'+total.toFixed({{ $cointwo_decimal}})+'</td> <td>'+s+'</td></tr>');
                    $('#tradeHistory').prepend(com_order_data); 
                     
                        
                var historylength=$("#tradeHistory").children().length;
                $('#tradeHistory').find(".tr-div").slice(100, historylength).remove(); 


                }
              }



             
        };

       websocket.onerror = function(event){
          console.log("Problem due to some Error");
        };
        websocket.onclose = function(event){
          console.log("Connection Closed");
        };
      });
      @endif
    </script>


<!-- //2websocket -->


    @php
        $liqcoinone = strtolower($coinone); 
        $liqcointwo = strtolower('USDT'); 
        $liqpair = $liqcoinone.'USDT'; 
        $splitcointwo=explode('-','USDT');
        $orgpair = $coinone.'USDT'; 
    @endphp 
    <script type="text/javascript"> 
$(document).ready(function(){
    var conn = new WebSocket("wss://stream.binance.com:9443/ws");
    conn.onopen = function(evt) {
        var cpair = '{{$orgpair}}';
        // send Subscribe/Unsubscribe messages here (see below)
         var array_dta = [];
        //   @if(!empty($Binancepair))
            array_dta.push(cpair+"@depth"+updateDepth+"@1000ms");
            array_dta.push(cpair+"@aggTrade");
        //@endif
     

     var conv = '{{$trdepair->conv_price}}';
        var messageJSON = {
            "method": "SUBSCRIBE",
            "params": @json($binance_pairs_ticker),
            "id": 1
        };
        conn.send(JSON.stringify(messageJSON));
    }
     
    var conv = '{{$trdepair->conv_price}}';

    conn.onmessage = function(evt) {
        if(evt.data) {
            var currentpair = '{{$orgpair}}';
            var get_data = JSON.parse(evt.data);
            
             if((typeof get_data['e'] == "24hrTicker") || (get_data['e'] != null)) {
                var last_price = get_data['c'] * @json($valusd);
                var high_price = get_data['h'];
                var low_price = get_data['l'];
                var price_change = get_data['P'];
                var quote = parseFloat(get_data['q']).toFixed(2);
                var symbol = get_data['s']; 
                var convertsymbol=get_data['s'];
                convertsymbol=symbol.replace("USDT",'KES');
                //convertsymbol=symbol.replace("KES","USDT");
                // symbol=symbol.replace("KES","USDT");

                var tradepairs_decimal=  @json($coindecimals); 
                //var multiplier_price=tradepairs_decimal[symbol].multiplier_price;
                //var Coin_two_decimal=tradepairs_decimal[symbol].cointwo_decimal; 
                //  var Coin_one_decimal=tradepairs_decimal[symbol].coinone_decimal; 
                var is_data = "red-t";
                if(price_change > 0) { 
                    is_data = "green-t";  
                }

                if((typeof last_price != 'undefined')) {
                    $('.last_price_'+symbol+"_1").html(parseFloat(last_price).toFixed(2));
                    $('.high_price'+symbol+"_1").html(parseFloat(high_price).toFixed(2)); 
                    $('.low_price'+symbol+"_1").html(parseFloat(low_price).toFixed(2));
                    $('.last_price_'+symbol+"_2").html(parseFloat(last_price* conv).toFixed(2));
                    $('.high_price'+symbol+"_2").html(parseFloat(high_price* conv).toFixed(2)); 
                    $('.low_price'+symbol+"_2").html(parseFloat(low_price* conv).toFixed(2));

                }

                if((typeof quote != 'undefined') && (typeof last_price != 'undefined')) { 
                    //  $('.quote_'+symbol).html(quote);
                    $('.quote_'+symbol+'_1').html(quote);
                    $('.quote_'+symbol+'_2').html(quote);
                }
                    // last_price = get_data['c']* conv;

                if((typeof price_change != 'undefined') && (typeof last_price != 'undefined')) {
                    price_change = price_change * 1;
                    price_change = price_change.toFixed(2);
                    var class24h = "t-red"; var arrow = "down";

                    if(price_change >0) {
                        $24Hclass = "t-green";
                        $arrow = "up";
                    }
                    if(price_change <0) {
                        $24Hclass = "t-red";
                        $arrow = "down";
                    }
                    var livePrice = parseFloat(last_price* conv).toFixed(2);

                    if(@json($coinone_binance.$cointwo_binance) == symbol){
                        $(".currentMarketPrice").val(livePrice);
                        $("#buymarketvolume,#sellmarketvolume").trigger("change");
                    }
                    
                    $('.last_price_'+symbol).html('<span class="'+$24Hclass+''+' '+'last_price_'+symbol+'">'+livePrice+'</span>');

                    $('.price_change_'+symbol).html('<span class="'+$24Hclass+' '+is_data+'">'+price_change+'% <i class="fa fa-arrow-'+$arrow+'"></span>');
                    $('.livepercent'+symbol).html('<span class="'+is_data+'">'+price_change+' </span>');  
                    
                    $('.price_change_'+symbol).html('<span class="'+$24Hclass+' '+is_data+'">'+price_change+'% <i class="fa fa-arrow-'+$arrow+'"></span>');
                    $('.livepercent'+symbol).html('<span class="'+is_data+'">'+price_change+' </span>');

                    $('.price_change_'+symbol+'_1').html('<span class="'+$24Hclass+' '+is_data+'">'+price_change+'% <i class="fa fa-arrow-'+$arrow+'"></span>');
                    $('.livepercent'+symbol).html('<span class="'+is_data+'">'+price_change+' </span>'); 
                    $('.price_change_'+symbol+'_2').html('<span class="'+$24Hclass+' '+is_data+'">'+price_change+'% <i class="fa fa-arrow-'+$arrow+'"></span>');
                    $('.livepercent'+symbol).html('<span class="'+is_data+'">'+price_change+' </span>'); 
            
                    @if($binance== true)
                        if(symbol=="{{ $coinone }}{{'USDT'}}"){
                            $('#tradeliveprice').html('<span class="'+$24Hclass+' '+'liveprice'+symbol+'">'+parseFloat(last_price).toFixed(2)+' <i class="fa fa-arrow-'+$arrow+'"></i></span>');
                        }

                        if(symbol=="{{ $coinone }}{{'USDT'}}"){
                            $('#tradeliveprice').html('<span class="'+$24Hclass+' '+'liveprice'+symbol+'">'+parseFloat(last_price* conv).toFixed(2)+' <i class="fa fa-arrow-'+$arrow+'"></i></span>');
                        }
                    @endif
                }
            }
        }
     
     }

});
 
 
function changeBuymarket(){
    $("#alert_error").css("display", "none");
ChangePercentage();
removlimit();
}


function changeSellmarket(){
    $("#alert_error").css("display", "none");
    ChangePercentage();
    removlimit();
}


function ChangePercentage(){

    $("#hidden_buylimit_100per").val(0);
    $("#hidden_selllimit_100per").val(0);
    $("#hidden_buymarket_100per").val(0);
    $("#hidden_sellmarket_100per").val(0);

}

function removlimit(){

    $(".buypercnt").removeClass("activelimit");
    $(".sellpercnt").removeClass("activelimit");
    $(".buymarpercnt").removeClass("activelimit");
    $(".sellmarpercnt").removeClass("activelimit");
}

function Hidepopup(){

    $('#confirmbox').modal('hide');
    
}

</script>

<script type='text/javascript'>
     
     function cancel_buytrade(cancel_id,pair)
   {    
       $("#hidden_buycancel_id").val(cancel_id);
       $("#hidden_buypair_id").val(pair);
   }
       
     function cancel_selltrade(cancel_id,pair)
   {
       $("#hidden_sellcancel_id").val(cancel_id);
       $("#hidden_sellpair_id").val(pair);
   
   }
   </script>

    {{-- <script>

 $(document).ready(function(){
   $("#buyprice").keypress(function(){
     $("span").text(i += 1);
   });
 });
 </script> --}}

