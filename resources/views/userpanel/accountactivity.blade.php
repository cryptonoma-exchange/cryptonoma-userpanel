@include('layouts.userpanel.header')

<div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')
	<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
			<li><a href="{{ route('profile') }}"><img src="{{ url('userpanel/images/profile1.svg') }}" />
					<div>Profile</div>
				</a></li>
			<li><a href="{{ route('setting') }}"><img src="{{ url('userpanel/images/security1.svg') }}" />
					<div>Security</div>
				</a></li>
			<li><a href="{{ route('support') }}"><img src="{{ url('userpanel/images/support1.svg') }}" />
					<div>Support</div>
				</a></li>
			<li><a href="{{ route('bank') }}"><img src="{{ url('userpanel/images/bank1.svg') }}" />
					<div>Bank</div>
				</a></li>
			<li><a href="{{ route('accountactivity') }}" class="active"><img src="{{ url('userpanel/images/account1.svg') }}" />
					<div>Account Activity</div>
				</a></li>
		</ul>
	</div>

	<article class="gridparentbox">
		<div class="container sitecontainer">
			<div class="panelcontentbox mt-3">
				<h2 class="heading-box">Account Activity</h2>
				<div class="table-responsive sitescroll" data-simplebar>
					<table class="table sitetable table-responsive-stack" id="table1">
						<thead>
							<tr>
								<th>Date & Time</th>
								<th>IP Address</th>
								<th>Location</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($userlogindata as $detail)
								<tr>
									<td>{{ $detail->created_at }}</td>
									<td>{{ $detail->login_ip }}</td>
									<td>{{ $detail->location }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
					{{ $userlogindata->links() }}
				</div>
			</div>
		</div>
	</article>
	@include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')
