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
									<li class="nav-item"><a class="nav-link active" href="{{ url('/deposithistories') }}">Deposit History</a></li>
								</ul>
							</div>
							<div class="tab-content">

								<div id="deposit" class="tab-pane active">
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
													<a href="{{ url('/deposithistories') }}" class="btn sitebtn btn-sm"
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
													<th>Date & Time</th>
													<th>Coin / Currency</th>
													<th>Txn Id</th>
													<th>Deposit Type</th>
													<th>Amount</th>
													<th>Fee</th>
													<th>Credit amount </th>
													<th>Upload proof</th>
													<th style="min-width: 250px">Reason</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@forelse($transactions as $transaction)
													<tr>
														<td>{{ date('d-m-Y H:i:s', strtotime($transaction->created_at)) }}</td>
														<td>{{ $transaction->currency }}</td>
														<td>{{ $transaction->txid ? $transaction->txid : '-' }}</td>
														<td>{{ $transaction->paymenttype ? $transaction->paymenttype : "-" }}</td>
														<td>{{ $transaction->amount }}</td>
														<td>{{ $transaction->fee }}</td>
														<td>{{ $transaction->credit_amount ? $transaction->credit_amount : $transaction->amount }}</td>
														<td>
															@if ($transaction->paymenttype == 'wirepayment')
																<a href='{{ $transaction->proof }}' target="_blank" class="proff-textt">@lang('common.Click to view your proof')</a>
															@else
																-
															@endif
														</td>
														<td style="white-space: normal">{{ $transaction->remark ? $transaction->remark : "-" }}</td>
														<td>
															@if ($transaction->paymenttype == 'tinypesa')
																@if ($transaction->status == 0)
																	Pending
																@elseif($transaction->status == 2)
																	Failed
																@elseif($transaction->status == 3)
																Cancelled by You!
																@else
																	Success
																@endif
															@else
																@if ($transaction->status == 0)
																	Waiting for admin confirmation
																@elseif($transaction->status == 2)
																	Rejected by admin
																@elseif($transaction->status == 3)
																Cancelled by You!
																@else
																	Approved by admin
																@endif
															@endif
														</td>
													</tr>
												@empty
													<tr>
														<td colspan="9">No records found!</td>
													</tr>
												@endforelse

											</tbody>
										</table>
									</div>
									{{  $transactions->links()  }}
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
