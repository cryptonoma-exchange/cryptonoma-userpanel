

@include('layouts.userpanel.header')


<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
<ul class="list-unstyled components">
<li><a href="{{ route('wallet') }}" ><img src="{{ asset('images/wallet1.svg') }}"/><div>Spot Wallet</div></a></li>
<li><a href="{{ url('openorders') }}"/><img src="{{ asset('images/orderhistory.svg') }}"/><div>Open Orders</div></a></li>
<li><a href="{{ url('orderhistory') }}"><img src="{{ asset('images/order.svg') }}"/><div>Order History</div></a></li>
<li><a href="{{ url('/deposithistories') }}" class="active"><img src="{{ asset('images/deposit.svg') }}"/><div>Deposit History</div></a></li>
<li><a href="{{ url('/withdrawhistories') }}"><img src="{{ asset('images/withdraw1.svg') }}"/><div>Withdraw History</div></a></li>
</ul>
</div>
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

							<li class="nav-item"><a class="nav-link active"   href="{{ url('/deposithistories') }}">@lang('common.deposithistory.deposithistory')</a></li>

              	  <!-- <li class="nav-item"><a class="nav-link"  href="{{ url('/orderhistory/BTC') }}">Order History</a></li> 	  -->
						</ul>
					</div>
					<div class="tab-content">


					<div id="deposit" class="tab-pane active">
					<div class="searchfrmbox">

          <form action="{{ url('/depositsearches/'.$coin) }}" method="get"  autocomplete="off" class="innerformbg siteformbg">
                {{ csrf_field() }}
							<div class="searchfrm">
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group dateinput">
											<input type="text" class="form-control" name="fromdate" value="@if(isset($_REQUEST['fromdate'])) {{ $_REQUEST['fromdate'] }} @endif" required="" placeholder="@lang('common.deposithistory.startdate')" />
											<div class="input-group-append" data-toggle="datepicker3" data-target-name="fromdate">
												  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group dateinput">
											<input type="text" class="form-control" name="todate" value="@if(isset($_REQUEST['todate'])) {{ $_REQUEST['todate'] }} @endif" required="" placeholder="@lang('common.deposithistory.enddate')" />
											<div class="input-group-append" data-toggle="datepicker3" data-target-name="todate">
												  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 clearbtn">
								<div class="form-group">
									<a href="{{ url('/deposithistories/'.$coin) }}" class="btn sitebtn btn-sm" style='color:#fff'>@lang('common.tradehistory.reset')</a>
									<input type="submit" class="btn sitebtn btn-sm" value="@lang('common.deposithistory.search')" />
								</div>
								</div>
							</div>
						</form>
						<form class="siteformbg">
							<div class="searchfrm seacrright searchfrm1">
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" onchange="location = this.value;">
											<option  selected=""  value="All">All</option>
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
					<table class="table sitetable table-responsive-stack" id="table1">
								<thead>
									<tr>
                    <th>@lang('common.deposithistory.date')</th>
                    <th>@lang('common.deposithistory.txid')</th>
                    <th>@lang('common.deposithistory.sender')</th>
                    <th>@lang('common.deposithistory.receiver')</th>
										<th>@lang('common.deposithistory.amount') ({{ $coin }})</th>
										<th>@lang('common.deposithistory.fee')</th>
										<th>@lang('common.deposithistory.total')</th>
										<th style="min-width: 250px">Reason</th>			 
										<th>@lang('common.deposithistory.status')</th>
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
										<td>{{ $transactions->txid }}</td>
										<td>{{ $transactions->from_addr }}</td>
										<td>{{ $transactions->to_addr }}</td>
                    <td>{{ $transactions->amount }}</td>
                    <td>{{ $transactions->adminfee }}</td>
                    <td>{{ $transactions->totalamount}}</td>
									  <td style="white-space: normal">{{ $transactions->remark }}</td>
                    <td>
                    @if($transactions->from_addr  == 'admindeposit')
                    Success
                    @else
                    @if($transactions->status == 0)
                    Waiting for admin approval
                    @elseif($transactions->status == 1)
                    Approved
                    @elseif($transactions->status == 2)
                    Rejected
                    @else
                    Admin reject user request
                    @endif
                    @endif
                  </td>
                  </tr>
                  @php $i ++; @endphp
        @empty
        <tr><td colspan="9">@lang('common.deposithistory.norecordsfound')!</td></tr>
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
