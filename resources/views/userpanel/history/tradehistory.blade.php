@include('layouts.userpanel.header')

<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
@include('layouts.userpanel.leftsidemenu')
<article class="gridparentbox">
	<div class="innerpagecontent">
          <div class="container">
            <h2 class="h2">History</h2>
            <hr class="x-line-center">
          </div>
        </div>
	<div class="container sitecontainer">
			<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="panelcontentbox">
					<div class="innerpagetab historytab">				
          <ul class="nav nav-tabs tabbanner" role="tablist">
            <li class="nav-item"><a class="nav-link active"   href="{{ url('tradehistroy/'.$market[0].'_'.$market[1].'/'.$selectedtype.'/'.$selectedordertype) }}">@lang('common.tradehistory.tradehistory')</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/deposithistory/BTC') }}" s>@lang('common.tradehistory.deposithistory')</a></li>					
            <li class="nav-item"><a class="nav-link" href="{{ url('/withdrawhistory/BTC') }}">@lang('common.tradehistory.withdrawhistory')</a>
            </li>	
              <!-- <li class="nav-item"><a class="nav-link"  href="{{ url('/orderhistory/BTC') }}">Order History</a></li>   -->
            </ul>
					</div>

					<div class="tab-content">
						<div id="trade" class="tab-pane active">
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


						<div class="searchfrmbox">
            <form action="{{ url('tradesearch/'.$market[0].'_'.$market[1].'/'.$selectedtype.'/'.$selectedordertype) }}" method="get"  autocomplete="off" class="innerformbg siteformbg">
                  {{ csrf_field() }}
              <div class="searchfrm">
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="input-group dateinput">                 
                        <input type="text" class="form-control" name="fromdate" value="@if(isset($_REQUEST['fromdate'])) {{ $_REQUEST['fromdate'] }} @endif" required="" placeholder="@lang('common.tradehistory.startdate') (YYYY-MM-DD)">
                        <div class="input-group-append" data-toggle="datepicker3" data-target-name="fromdate">
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                      </div>
			</div>    
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group dateinput">                 
                          <input type="text" class="form-control" name="todate" value="@if(isset($_REQUEST['todate'])) {{ $_REQUEST['todate'] }} @endif" required=""placeholder="@lang('common.tradehistory.enddate') (YYYY-MM-DD)">
                          <div class="input-group-append" data-toggle="datepicker3" data-target-name="todate">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                        </div> 
                        </div>    
                      </div> 
                      <div class="col-md-3 clearbtn">
                        <div class="form-group">                        
                          <button type="submit" class="btn sitebtn btn-sm">@lang('common.tradehistory.search')</button>
                          <a href="{{ url('tradehistroy/'.$market[0].'_'.$market[1].'/'.$selectedtype.'/'.$selectedordertype) }}" style='color:#fff' class="btn sitebtn btn-sm">
                          @lang('common.tradehistory.reset')</a>
                        </div>
                      </div>
                    </div>
                  </form>
                  <form class="siteformbg">
                    <div class="searchfrm searchfrm1">             
                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control" onchange="location = this.value;">
                          @if(isset($pairs))
                    <option value="{{ url('tradehistroy/'.$market[0].'_'.$market[1].'/'.$selectedtype.'/'.$selectedordertype) }}">{{ $coinone."-".$cointwo }}</option>
                    @foreach($pairs as $coinones)
                    @php $coin = $coinones->coinone.'_'.$coinones->cointwo; 
                    $current = $coinone.'_'.$cointwo; @endphp

                    @if($coin != $current)
                    <option value="{{ url('tradehistroy/'.$coinones->coinone.'_'.$coinones->cointwo.'/'.$selectedtype.'/'.$selectedordertype) }}">{{ $coinones->coinone."-".$coinones->cointwo }}</option>
                    @endif

                    @endforeach
                    @endif
                         </select> 
                        </div>      
                      </div>        
                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control" onchange="location = this.value;"> 
                   <option @if($selectedtype == "Buy") selected="" @endif  value="{{ url('tradehistroy/'.$coinone.'_'.$cointwo.'/Buy'.'/'.$selectedordertype) }}">@lang('common.tradehistory.buy')</option>
                  <option @if($selectedtype == "Sell") selected="" @endif  value="{{ url('tradehistroy/'.$coinone.'_'.$cointwo.'/Sell'.'/'.$selectedordertype) }}">@lang('common.tradehistory.sell')</option>
                            </select> 
                        </div>      
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                        <select class="form-control" onchange="location = this.value;">
                  <option @if($selectedordertype == "limit") selected="" @endif value="limit">@lang('common.tradehistory.limit')</option>
              <!--     <option @if($selectedordertype == "market") selected="" @endif  value="market">@lang('common.tradehistory.market')</option> -->
                
                  </select>
                        </div>      
                      </div>

                    </div>
                  </form>
                  </div>
						<div class="table-responsive sitescroll" data-simplebar>
							<table class="table sitetable">
								<thead>
									<tr>
                    <th>@lang('common.trade.datetime')</th>
                  {{-- 
                    <!-- <th>Pair ({{ $market[1] }})</th>
                    <th>Type</th> -->
                    --}}
										<th>@lang('common.tradehistory.price') ({{ $market[1] }})</th>
                    <th>@lang('common.tradehistory.amount') ({{ $market[0] }})</th>
										<th>@lang('common.tradehistory.remaining') ({{ $market[0] }})</th>
                    <th>@lang('common.tradehistory.Cancelled') ({{ $market[0] }})</th>
                    <th>@lang('common.tradehistory.totalprice')({{ $market[1] }}) </th>
                    <th>@lang('common.tradehistory.tradefee') @if($selectedtype =="Buy" && $selectedordertype == "limit")({{ $market[1] }})@elseif($selectedtype =="Sell" && $selectedordertype == "limit")({{ $market[0]}})@endif</th>
                    <th>@lang('common.tradehistory.status')</th>
                    <th>@lang('common.tradehistory.action')</th>
									</tr>
								</thead>
								<tbody>
                @if(count($myorders) > 0)
                @foreach($myorders as $results)

@php 
$cancelled = 0.0000; 
$remaining = $results->remaining; 
@endphp

									<tr>
                  <td>{{ date('Y-m-d H:i:s', strtotime($results->created_at)) }}</td>
                    {{--<!-- <td>{{ $market[0] }}/{{ $market[1] }}</td>
                      
                    <td><span class="{{$selectedordertype == 'Buy'?t-green :t-red  }}">$selectedordertype</span></td> -->
                    --}}

                  @if($results->order_type == 1)
                  <td>{{ number_format($results->price, 8, '.', '') }}</td>
                  @else
                  <td>Market price</td>
                  @endif
                  <td>{{ number_format($results->volume, 8, '.', '') }}</td>
                  <td>{{ number_format($remaining, 8, '.', '') }}</td>
                  <td>{{ number_format($cancelled, 8, '.', '') }}</td>
                  @if($results->order_type == 1)
                  <td>{{ number_format($results->value, 8, '.', '') }}</td>
                  @else
                   <td>-</td>
                  @endif
                  <td>{{ number_format($results->fees, 8, '.', '') }}</td>
                  <td>@if($results->status == 0 ) @lang('common.tradehistory.Pending') @elseif($results->status == 3 ) @lang('common.tradehistory.Cancelled') @else @lang('common.tradehistory.Completed')  @endif</td>
                  <td>
                  @if($results->status == 0)
                  @if($selectedtype == 'Buy')
                    <a href="{{ url('/tradecancelbuyorder/'.\Crypt::encrypt($results->id).'/'.$results->pair) }}" class="btn btn-primary btn-xs m-t-9"> @lang('common.tradehistory.Cancel Trade')</a>
                    @elseif($selectedtype == 'Sell')
                     <a href="{{ url('/tradecancelsellorder/'.\Crypt::encrypt($results->id).'/'.$results->pair ) }}" class="btn btn-primary btn-xs m-t-9"> @lang('common.tradehistory.Cancel Trade')</a>




                    @endif
                  @else 
                  ---
                  @endif
                  </td>								
                  </tr> 
                  @endforeach
                  @else
                  <tr>
                  <td colspan="15"> @lang('common.tradehistory.norecordsfound')</td>
                  </tr>
                  @endif
								</tbody>
							</table>
            </div>		
            @if(count($myorders) > 0)
                            {!! $myorders->appends(Request::only(['fromdate'=>'fromdate', 'todate'=>'todate']))->render() !!} 
                    @endif				
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
