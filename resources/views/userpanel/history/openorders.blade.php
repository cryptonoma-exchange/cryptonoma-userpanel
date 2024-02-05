@include('layouts.userpanel.header')
<style>
	.cancel_btn{
		padding: 0.3rem 0.5rem;
    font-size: 0.8rem;
	}
</style>
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
								<li class="nav-item"><a class="nav-link active"
										href="{{ url('orderhistory/') }}">Open Orders</a>
								</li>
							</ul>
						</div>

						<div class="tab-content">
							<div id="trade" class="tab-pane active">
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

								<div class="searchfrmbox">
									<form method="get" autocomplete="off" class="innerformbg siteformbg" style="width: 100% !important">
										<div class="searchfrm">
											<div class="col-md-3">
												<div class="form-group">
													<div class="input-group dateinput">
														<input type="text" class="form-control custom_datepicker3" name="fromdate"
															value="{{ request("fromdate") }}"
															placeholder="@lang('common.tradehistory.startdate') (YYYY-MM-DD)">
														<div class="input-group-append custom_datepicker3_btn">
															<span class="input-group-text"><i class="fa fa-calendar"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="input-group dateinput">
														<input type="text" class="form-control custom_datepicker3" name="todate"
															value="{{ request("todate") }}"
															placeholder="@lang('common.tradehistory.enddate') (YYYY-MM-DD)">
														<div class="input-group-append custom_datepicker3_btn">
															<span class="input-group-text"><i class="fa fa-calendar"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control" name="pair">
														<option value="">All pairs</option>
														@foreach ($pairs as $pair)
															<option value="{{ $pair->id }}" @if ($pair->id == request("pair")) selected="" @endif>
																{{ $pair->coinone . '_' . $pair->cointwo }}
															</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control" name="side">
														<option value="">All sides</option>
														<option @if(request("side") == 'buy') selected @endif value="buy">
															@lang('common.tradehistory.buy')
														</option>
														<option @if(request("side") == 'sell') selected @endif value="sell">
															@lang('common.tradehistory.sell')
														</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control" name="order_type">
														<option value="">All types</option>
														<option @if (request("order_type") == 1) selected="" @endif value="1">@lang('common.tradehistory.limit')</option>
														<option @if (request("order_type") == 2) selected="" @endif value="2">@lang('common.tradehistory.market')</option>
													</select>
												</div>
											</div>
											<div class="col-md-3 clearbtn">
												<div class="form-group">
													<button type="submit" class="btn sitebtn btn-sm">@lang('common.tradehistory.search')</button>
													<a
														href="{{ url('orderhistory') }}"
														style='color:#fff' class="btn sitebtn btn-sm">
														@lang('common.tradehistory.reset')</a>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="table-responsive sitescroll" data-simplebar>
									<table class="table sitetable table-responsive-stack" id="table1">
										<thead>
											<tr>
												<th>@lang('common.trade.datetime')</th>
												<th>Pair</th>
												<th>Side</th>
												<th>Type</th>
												<th>@lang('common.tradehistory.price')</th>
												<th>@lang('common.tradehistory.amount')</th>
												<th>@lang('common.tradehistory.remaining') </th>
												<th>Total</th>
												<th>@lang('common.tradehistory.tradefee')</th>
												<th>@lang('common.tradehistory.status')</th>
												<th>@lang('common.tradehistory.action')</th>
											</tr>
										</thead>
										<tbody>
												@forelse ($orders as $order)
													<tr>
														<td>{{ $order->created_at }}</td>
														<td>{{ $order->pair_string }}</td>
														<td>{{ $order->type }}</td>
														<td>{{ $order->order_type_string }}</td>
														<td>{{ $order->original_price }}</td>
														<td>{{ $order->volume }}</td>
														<td>{{ $order->remaining }}</td>
														<td>{{ $order->value }}</td>
														<td>{{ $order->fees }}</td>
														<td>{{ $order->status_string }}</td>
														<td>
																<a href="{{ route('cancel_order',['trade_type' => $order->type,'id' => \Crypt::encrypt($order->id) ]) }}"
																		class="btn btn-primary m-t-9 cancel_btn"> @lang('common.tradehistory.Cancel Trade')</a>
														</td>
													</tr>
												@empty
												<tr>
													<td colspan="15"> @lang('common.tradehistory.norecordsfound')</td>
												</tr>
												@endforelse
										</tbody>
									</table>
								</div>
									{{ $orders->links() }}
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
