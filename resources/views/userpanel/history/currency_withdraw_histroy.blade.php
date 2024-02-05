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
            <li class="nav-item"><a class="nav-link"  href="{{url('tradehistroy/BTC_CLP/Buy/limit')}}" >Trade History</a></li> 
						<li class="nav-item"><a class="nav-link" href="{{ url('/deposithistory/BTC') }}" >Deposit History</a></li>					
            <li class="nav-item"><a class="nav-link active" href="{{ url('/withdrawhistory/BTC') }}">Withdraw History</a>
            </li>	 
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
											<input type="text" class="form-control" name="todate"  value="@if(isset($_REQUEST['todate'])) {{ $_REQUEST['todate'] }} @endif" required="" placeholder="End Date" />
											<div class="input-group-append" data-toggle="datepicker3" data-target-name="todate">
												  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</div>
										</div>		
									</div>		
								</div>
								<div class="col-md-4 clearbtn">
								<div class="form-group">
									<a href="{{ url('/withdrawhistory/'.$coin) }}" class="btn sitebtn btn-sm" style='color:#fff'>@lang('common.tradehistory.reset')</a>
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
										<th>Date</th>
										<th>Request Amount</th>
										<th>Fee</th>
                    <th>Sent Amount</th>
                    <th>Bank Name</th>
                    <th>Account No</th>
                    <th>Status</th>
                    <th>Action</th>
									</tr>
								</thead>
								<tbody>
                @forelse($transactions as $transaction)
									<tr>
                  <td>{{ date('d-m-Y H:i:s', strtotime($transaction['created_at'])) }}</td>
					        <td>{{ display_format($transaction['totalamount'], 2) }}</td>
                  <td>{{ display_format($transaction['fee'], 2) }}</td>
                  <td>{{ display_format($transaction['amount'], 2) }}</td>
                  <td>{{ $transaction['bank_name'] ? $transaction['bank_name'] :'-' }}</td>							<td>{{ $transaction['account_no'] ? $transaction['account_no'] :'-' }}</td>	
                  <td>
                                  @if($transaction['status'] == 0)
                                  <span style="color:#f6ad0f; font-weight:bold">@lang('common.Waiting for admin confirmation')!</span>
                                  @elseif($transaction['status'] == 2)
                                  <span style="color:#f15744; font-weight:bold">@lang('common.Rejected by admin')!</span>
                                  @elseif($transaction['status'] == 3)
                                  <span style="color:#f15744; font-weight:bold">@lang('common.Cancelled by You')!</span>
                                  @else 
                                  <span style="color:#4ff144; font-weight:bold">@lang('common.withdrawhistory.Amount Sent')!</span>
                                  @endif
                                </td>
                        <td>
                          @if($transaction['status']==0)
                          <form method="post" id="cancel_withdraw_form">
                            {{ csrf_field() }}
                            <a href="#" onclick="cancel_withdraw_currency('{{ $transaction['id'] }}')" class="btn btn-sm btn-primary">@lang('common.Cancel')</a>
                          </form>
                          @else
                          ---
                          @endif
                        </td>
                  </tr> 
                  @empty
                          <tr><td colspan="9">@lang('common.withdrawhistory.norecordsfound')!</td></tr>
                   @endforelse
								</tbody>
							</table>
						</div>	
          </div>
          @if(count($transactions) > 0)

{!! $transactions->appends(Request::only(['fromdate'=>'fromdate', 'todate'=>'todate']))->render() !!} 

@endif
 
				</div>		
			</div>	
			</div>
			</div>
    </div>
    
   <div id="myModal" class="modal fade modalbgt" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
 
        <h4 class="modal-title">@lang('common.Cancel')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" autocomplete="off" action="{{ url('delete_withdraw_request') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div id="success_response">
            <p class="content t-black">@lang('common.Are you sure you want to cancel this withdraw')</p>
          </div>
        </div>
        <div class="modal-footer" id="model_footer_form">
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" name="deposit_id" id="buyer_id">
               <input type="hidden" name="currency" id="currency" value="{{ $coin }}">

              <button type="submit" class="btn btn-sm btn-primary">@lang('common.Yes')</button>
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">@lang('common.No')</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</article>	 
@include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer') 
<script>
  function cancel_withdraw_currency(buy_id)
{
    $("#myModal").modal("show");
    $('#buyer_id').val(buy_id);
}
</script>