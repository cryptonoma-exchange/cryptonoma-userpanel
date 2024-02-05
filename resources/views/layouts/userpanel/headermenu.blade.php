<section class="headermenu">
<nav class="navbar navbar-expand-md navbar-dark headbg">
				<div class="container">				
				<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.svg') }}" class="logo" /></a>
				<li class="mobiletoggle"><button type="button" id="sidebarCollapse" class="btn sidebtntoggle"><img src="{{ asset('images/menu.svg') }}"></button>
					</li>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>						
					  </button>
					  <div class="collapse navbar-collapse" id="collapsibleNavbar">	
					 	<ul class="navbar-nav mr-auto">	
			
						 	<li class="nav-item"><a class="nav-link" href="{{ route('trade') }}">Trade</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('market') }}">Markets</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('wallet') }}">Wallet</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('setting') }}">Settings</a></li>
						</ul>
						<ul class="navbar-nav ml-auto">	
							@auth														
						@php
$userticket_count = \App\Models\Supportchat::where([['uid', '=', Auth::user()->id], ['user_status', '=', '0']])->count();
@endphp	
@endauth

@guest
	@php
		$userticket_count = 0;
	@endphp
@endguest
						<li class="nav-item"><a class="nav-link" href="{{ route('support') }}">Support</a></li>
						<li class="nav-item notify"><a class="nav-link" href="{{ route('support') }}"><i class="fa fa-bell"></i>
							@if($userticket_count !== 0)<div class="countlisticon">{{$userticket_count}}</div>@endif</a></li>
						<li class="dropdown usermenu">
							<a href="{{ route('profile') }}" class="nav-link dropdown-toggle" data-toggle="dropdown">
								<span class="photopic"><img src="@if(isset(Auth::user()->profileimg)) @if(Auth::user()->profileimg!='') {{ url(Auth::user()->profileimg) }}
								 @else {{asset('images/profile.svg')}}
								 @endif @else {{asset('images/profile.svg')}} @endif" /></span> @auth{{Auth::user()->name}}@endauth</a>	
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{url('kyc')}}">KYC Verification</a>
<a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                               @auth
								<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
								@endauth
                                 
								@guest
								<a class="dropdown-item" href="{{ route('login') }}">Login</a>
								@endguest


							</div>
						</li> 
@php
								if(empty(Session::get('mode'))){
								Session::put('mode', 'daymode');
								
								}
							@endphp	
							
							<li style="margin-left: 10px;" class="modebg">
							@if(Session::get('mode')=='daymode')
							<li><a href="{{ url('/setmode/nightmode') }}"><i class="fa fa-moon-o modeicon" id="nightmode" aria-hidden="true"></i></a></li>            
							@else
							<li><a href="{{ url('/setmode/daymode') }}"><i class="fa fa-sun-o modeicon activemode" id="daymode" aria-hidden="true"></i></a></li>
							@endif  
                            </li>					
						</ul>														
					  </div> 
				</div>		  
			</nav>
			
</section>