
@php
 
$dashboard='dashboard';
$wallet='wallet';


@endphp
<section class="headermenu">
<nav class="navbar navbar-expand-md navbar-dark headbg">
				<div class="container">				
				<a class="navbar-brand" href="{{url('/')}}"><img src="{{ url('userpanel/images/logo.svg') }}" class="logo" /></a>
				<li class="mobiletoggle"><button type="button" id="sidebarCollapse" class="btn sidebtntoggle"><img src="{{ url('userpanel/images/menuicon.svg') }}"/></button>
					</li>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>						
					  </button>
					  <div class="collapse navbar-collapse" id="collapsibleNavbar">	
					 	<ul class="navbar-nav mr-auto">	
							<li class="nav-item"><a class="nav-link" href="{{url('dashboard')}}">Dashboard</a></li>		 
							<li class="nav-item"><a class="nav-link" href="{{url('trade')}}">Trade</a></li>		 
							<li class="nav-item"><a class="nav-link" href="{{url($wallet)}}">Wallet</a></li>
								<li class="nav-item"><a class="nav-link" href="{{url('referralsystem')}}">Referral</a></li>	
							<li class="nav-item"><a class="nav-link" href="{{url('tradehistroy/BTC_USDC/Buy/limit')}}" >@lang('common.menu.History')</a></li> 

							<li class="nav-item"><a class="nav-link" href="{{url('support')}}">Support</a></li>	

						</ul>
						<ul class="navbar-nav ml-auto">		

							@php					 
							$userticket_count = \App\Models\Supportchat::where([['uid', '=', Auth::user()->id], ['user_status', '=', '0']])->count();
							@endphp
						
						<li class="nav-item"><a class="nav-link" href="{{url('support')}}"><i class="fa fa-bell"></i>
						@if($userticket_count !== 0)<div class="countlisticon">{{$userticket_count}}</div>@endif</a></li>							
						<li class="dropdown usermenu">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
								<span class="photopic"><img src="@if(isset(Auth::user()->profileimg)) @if(Auth::user()->profileimg!='') {{ url(Auth::user()->profileimg) }} @else {{url('userpanel/images/profile.png')}} @endif @else {{url('userpanel/images/profile.png')}} @endif"  /></span></a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{url('dashboard')}}">{{Auth::user()->name}} <i class="fa fa-angle-right"></i></a>
								<a class="dropdown-item" href="{{url('kyc')}}">KYC Verification</a>
								<a class="dropdown-item" href="{{url('profile')}}">Profile</a>
								<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>

							</div>
						</li>  												
						</ul>														
					  </div> 
				</div>		  
			</nav>
			
			
</section>