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
            <li class="nav-item"><a class="nav-link"  href="{{url('tradehistroy/BTC_CLP/Buy/limit')}}">@lang('common.withdrawhistory.tradehistory')</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/deposithistory/BTC') }}"  >@lang('common.withdrawhistory.deposithistory')</a></li>					
            <li class="nav-item"><a class="nav-link active" href="{{ url('/withdrawhistory/BTC') }}">@lang('common.withdrawhistory.withdrawhistory')</a>
            </li>
              <!-- <li class="nav-item"><a class="nav-link"  href="{{ url('/orderhistory/BTC') }}">Order History</a></li> 	  -->
            </ul>
					</div>
					<div class="tab-content">
			 
					<div id="withdraw" class="tab-pane active">
          @if(session('deposit_status'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>@lang('common.Success')!</strong> {{ session('deposit_status') }}
        </div>
        @endif
					<div class="searchfrmbox">

          <form action="{{ url('/withdrawsearch/'.$coin) }}" method="get"  autocomplete="off" class="innerformbg siteformbg">
                {{ csrf_field() }}
            
							<div class="searchfrm">
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group dateinput">									
											<input type="text" class="form-control" name="fromdate" value="@if(isset($_REQUEST['fromdate'])) {{ $_REQUEST['fromdate'] }} @endif" required="" placeholder="@lang('common.withdrawhistory.startdate')" />
											<div class="input-group-append" data-toggle="datepicker3" data-target-name="fromdate">
												  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>		
									</div>		
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group dateinput">									
											<input type="text" class="form-control" name="todate"  value="@if(isset($_REQUEST['todate'])) {{ $_REQUEST['todate'] }} @endif" required="" placeholder="@lang('common.withdrawhistory.enddate')" />
											<div class="input-group-append" data-toggle="datepicker3" data-target-name="todate">
												  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>		
									</div>		
								</div>
								<div class="col-md-4 clearbtn">
								<div class="form-group">
									<a href="{{ url('/withdrawhistory/'.$coin) }}" style='color:#fff' class="btn sitebtn btn-sm">@lang('common.tradehistory.reset')</a>
									<input type="submit" class="btn sitebtn btn-sm" value="@lang('common.withdrawhistory.search')" />
								</div>
								</div>
							</div>
						</form>
						<form class="siteformbg">
							<div class="searchfrm seacrright searchfrm1">							
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" onchange="location = this.value;">
                    @foreach($commission as $details)
                <option @if($coin == $details['source']) selected="" @endif value="{{ $details['source'] }}">{{ $details['source'] }}</option>
                @endforeach
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
										<th>@lang('common.withdrawhistory.date')</th>
										<th>@lang('common.withdrawhistory.txid')</th>
										<th>@lang('common.withdrawhistory.sender')</th>
                    <th>@lang('common.withdrawhistory.receiver')</th>                 
                    <th>@lang('common.withdrawhistory.amount') ({{ $coin }})</th>
                    <th>@lang('common.withdrawhistory.adminfee')</th>
                    <th>@lang('common.withdrawhistory.status')</th>
                    <th>@lang('common.withdrawhistory.action')</th>
									</tr>
								</thead>
								<tbody>
                @if(count($crypto_transaction) > 0) 
                @foreach($crypto_transaction as $transaction) 
                @php
                        if($transaction->status == 0)
                        {
                        $status = __('common.Pending');
                        }
                        elseif($transaction->status == 1)
                        {
                        $status = __('common.Success');
                        }
                        elseif($transaction->status == 2)
                        {
                        $status = __('common.trade.');
                        }
                        else
                        {
                        $status =__('common.Pending');
                        }
                        @endphp
									<tr>
                  <td>{{ date('d-m-Y H:i:s', strtotime($transaction->created_at)) }}</td>
                  <td>{{ $transaction->txid }}</td>
                    <td>{{ $transaction->from_addr }}</td>
                    <td>{{ $transaction->to_addr }}</td>

                    <td>{{ number_format($transaction->amount, 8, '.', '') }}</td>
                    <td>{{ $transaction->adminfee }}</td>
                    <td>
                      {{ $status }}
                    </td>
                    <td><a href='{{ $url.$transaction->txid }}' target="_blank">@lang('common.View')</a></td>                       
                  </tr> 
                    @endforeach                
                  @else
                    <tr><td colspan="8"><br />@lang('common.withdrawhistory.norecordsfound')!</td></tr>
                  @endif
								</tbody>
							</table>
						</div>	
          </div>
          @if(count($crypto_transaction) > 0)

                    {!! $crypto_transaction->appends(Request::only(['fromdate'=>'fromdate', 'todate'=>'todate']))->render() !!} 

                @endif
 
				</div>		
			</div>	
			</div>
			</div>
    </div> 
 
</article>	 
  @include('layouts.userpanel.footermenu') 
</div>
@include('layouts.userpanel.footer')
 