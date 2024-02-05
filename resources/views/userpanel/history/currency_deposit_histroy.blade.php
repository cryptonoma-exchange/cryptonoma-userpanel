 

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
							<li class="nav-item"><a class="nav-link"  href="{{url('tradehistroy/BTC_USDC/Buy/limit')}}">Trade History</a></li>
							<li class="nav-item"><a class="nav-link active" href="{{ url('/deposithistory/BTC') }}" >Deposit History</a></li>					
							<li class="nav-item"><a class="nav-link"   href="{{ url('/withdrawhistory/BTC') }}">Withdraw History</a></li>		
		 			
			
						</ul>
					</div>
					<div class="tab-content">
					 
					
					<div id="deposit" class="tab-pane active">
					<div class="searchfrmbox">

          <form action="{{ url('/depositsearch/'.$coin) }}" method="get"  autocomplete="off" class="innerformbg siteformbg">
                {{ csrf_field() }}
							<div class="searchfrm">
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group dateinput">									
											<input type="text" class="form-control" name="fromdate" value="@if(isset($_REQUEST['fromdate'])) {{ $_REQUEST['fromdate'] }} @endif" required="" placeholder="Start Date" />
											<div class="input-group-append" data-toggle="datepicker3" data-target-name="fromdate">
												  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>		
									</div>		
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group dateinput">									
											<input type="text" class="form-control" name="todate" value="@if(isset($_REQUEST['todate'])) {{ $_REQUEST['todate'] }} @endif" required="" placeholder="End Date" />
											<div class="input-group-append" data-toggle="datepicker3" data-target-name="todate">
												  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>		
									</div>		
								</div>
								<div class="col-md-4 clearbtn">
								<div class="form-group"> 
									<a href="{{ url('/deposithistory/'.$coin) }}" class="btn sitebtn btn-sm" style='color:#fff'>@lang('common.tradehistory.reset')</a>
									<input type="submit" class="btn sitebtn btn-sm" value="Search" />
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
                    <th>Date & Time</th>
                    <th>Txn Id</th>     
                    <th>Deposit Type</th>                 
										<th>Amount ({{ $coin }})</th>
										<th>Credit amount </th>
										<th>Upload proof</th>				 
										<th>Status</th>
									</tr>
                </thead>
              
								<tbody>
                @php
             $i = 1 ;
             if(isset($_GET['page'])){
             $page = $_GET['page'];
             $limit = 15;
             $i = (($limit * $page) - $limit)+1;
           }else{
           $i =1;
         }
         @endphp
         @forelse($transaction as $transactions)
									<tr>
                  <td>{{ date('d-m-Y H:i:s', strtotime($transactions->created_at)) }}</td>
                  <td>{{ $transactions->txid ? $transactions->txid :'-' }}</td>
		              <td>{{ $transactions->paymenttype }}</td>
                  <td>{{ number_format($transactions->amount, 2, '.', '') }}</td>
                  <td>{{ number_format($transactions->credit_amount, 2, '.', '') }}</td>
                  <td>
                     @if($transactions->paymenttype == 'wirepayment')
                     <a href='{{ $transactions->proof }}' target="_blank" class="proff-textt">@lang('common.Click to view your proof')</a>
                      @else
                      -
                       @endif
                  </td>		
                  <td>
                                @if($transactions->status == 0) @lang('common.Waiting for admin confirmation')
                                @elseif($transactions->status == 2) @lang('common.Rejected by admin')
                                @elseif($transactions->status == 3) @lang('common.Cancelled by user')
                                @else @lang('common.Approved by admin') @endif
                              </td>				
                  </tr> 
                  @php $i ++; @endphp
        @empty
        <tr><td colspan="9">No records found!</td></tr>
        @endforelse
                  				
								</tbody>
							</table>
            </div>		
            @if(count($transaction) > 0)
  {!! $transaction->appends(Request::only(['fromdate'=>'fromdate', 'todate'=>'todate']))->render() !!} 
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
