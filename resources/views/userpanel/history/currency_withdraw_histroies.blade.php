@include('layouts.userpanel.header')
<div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')
	@include('layouts.userpanel.leftsidemenu')
	<style>
		.disable{
			pointer-events: none;
		}
	</style>
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

								<li class="nav-item"><a class="nav-link active" href="{{ url('/withdrawhistories') }}">Withdraw History</a>
								</li>
							</ul>
						</div>
						<div class="tab-content">

							<div id="withdraw" class="tab-pane active">
								@if (session('success'))
									<div class="alert alert-success" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
												aria-hidden="true">&times;</span></button><strong>@lang('common.Success')!</strong>
										{{ session('success') }}
									</div>
								@endif
                @if (session('error'))
									<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
												aria-hidden="true">&times;</span></button><strong>@lang('common.Failed')!</strong>
										{{ session('error') }}
									</div>
								@endif
								<div class="searchfrmbox">

									<form method="get" autocomplete="off" style="width: auto !important"
										class="innerformbg siteformbg">
										<div class="searchfrm">
											<div class="col-md-4">
												<div class="form-group">
													<div class="input-group dateinput">
														<input type="text" class="form-control custom_datepicker3" name="fromdate"
															value="{{ request("fromdate") }}"
															placeholder="Start Date" />
														<div class="input-group-append custom_datepicker3_btn">
															<span class="input-group-text"><i class="fa fa-calendar"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="input-group dateinput">
														<input type="text" class="form-control custom_datepicker3" name="todate"
															value="{{ request("todate") }}"
															placeholder="End Date" />
														<div class="input-group-append custom_datepicker3_btn">
															<span class="input-group-text"><i class="fa fa-calendar"></i></span>
														</div>
													</div>
												</div>
											</div>
                      <div class="col-md-4">
												<div class="form-group">
													<select class="form-control" name="coin">
														<option value="">All</option>
														@foreach ($coins as $coin_details)
															<option @if (request('coin') == $coin_details['source']) selected="" @endif value="{{ $coin_details['source'] }}">
																{{ $coin_details['source'] }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-4 clearbtn">
												<div class="form-group">
                          <input type="submit" class="btn sitebtn btn-sm" value="Search" />
													<a href="{{ url('/withdrawhistories') }}" class="btn sitebtn btn-sm"
														style='color:#fff'>@lang('common.tradehistory.reset')</a>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="table-responsive sitescroll" data-simplebar>
									<table class="table sitetable table-responsive-stack" id="table1">
										<thead>
											<tr>
												<th>Date</th>
                        <th>Coin / Currency</th>
                        <th>Network</th>
                        <th>Withdraw Type</th>
                        <th>Txn Id</th>
												<th>Sender</th>
												<th>Receiver</th>
												<th>Memo</th>
												<th>Request Amount</th>
												<th>Fee</th>
												<th>Sent Amount</th>
												<th>Bank Name</th>
												<th>Account No</th>
												<th style="min-width: 250px">Reason</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@forelse($transactions as $transaction)
												<tr>
													<td>{{ date('d-m-Y H:i:s', strtotime($transaction['created_at'])) }}</td>
                          <td>{{ $transaction["currency"] }}</td>
                          <td>{{ $transaction["network"] ? $transaction["network"] : "-" }}</td>
                          <td>{{ $transaction["paymenttype"] ? $transaction["paymenttype"] : "-" }}</td>
                          <td>{{ $transaction["txid"] ? $transaction["txid"] : "-" }}</td>
                          <td>{{ $transaction["from_addr"] }}</td>
                          <td>{{ $transaction["to_addr"] }}</td>
													<td>{{ $transaction['memo'] ? $transaction['memo'] : '-' }}</td>
													<td>{{ $transaction['totalamount'] }}</td>
													<td>{{ $transaction['fee'] }}</td>
													<td>{{ $transaction['amount'] }}</td>
													<td>{{ $transaction['bank_name'] ? $transaction['bank_name'] : '-' }}</td>
													<td>{{ $transaction['account_no'] ? $transaction['account_no'] : '-' }}</td>
													<td style="white-space: normal">{{ $transaction['remark'] ? $transaction['remark'] : "-" }}</td>
													<td>
														@if ($transaction['status'] == 0)
															<span style="color:#f6ad0f; font-weight:bold">Waiting for admin confirmation!</span>
														@elseif($transaction['status'] == 2)
															<span style="color:#f15744; font-weight:bold">Rejected by admin!</span>
														@elseif($transaction['status'] == 3)
															<span style="color:#f15744; font-weight:bold">Cancelled by You!</span>
														@else
															<span style="color:#4ff144; font-weight:bold">Amount Sent!</span>
														@endif
													</td>
													<td>
														@if ($transaction['status'] == 0 && $transaction['paymenttype'] != "tinypesa")
															<form method="post" id="cancel_withdraw_form">
																{{ csrf_field() }}
																<a href="#" onclick="cancel_withdraw_currency(@json($transaction['id']),'{{ $transaction['currency'] }}')"
																	class="btn btn-sm btn-primary">@lang('common.Cancel')</a>
															</form>
														@else
															-
														@endif
													</td>
												</tr>
											@empty
												<tr>
													<td colspan="9">@lang('common.withdrawhistory.norecordsfound')!</td>
												</tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
								{{  $transactions->links()  }}
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="cancel_withdraw_modal" class="modal fade modalbgt" role="dialog">
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
									<input type="hidden" name="id" id="withdraw_id">
									<input type="hidden" name="currency" id="withdraw_currency" value="">
									<button type="submit" class="cancel_btn btn btn-sm btn-primary">@lang('common.Yes')</button>
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
	function cancel_withdraw_currency(id,currency) {
		$("#cancel_withdraw_modal").modal("show");
		$('#withdraw_id').val(id);
		$('#withdraw_currency').val(currency);
	}
	$(function(){
		$(".cancel_btn").on("click",function(){
			$(this).addClass("disable");
		});
	});
</script>
