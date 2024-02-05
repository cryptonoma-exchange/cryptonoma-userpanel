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
							<li class="nav-item dashboardicont"><a class="nav-link" href="{{url('dashboard')}}"><img src="{{ url('userpanel/images/menuicon.svg') }}"/></a></li>				  
							<li class="nav-item"><a class="nav-link" href="#"  >@lang('common.menu.Trade')</a></li>	
							

							<li class="nav-item"><a class="nav-link" href="#">@lang('common.menu.Wallet')</a></li>
							
						
							<li class="nav-item"><a class="nav-link" href="#" >@lang('common.menu.History')</a></li>
						

						

						</ul>


						<ul class="navbar-nav ml-auto">	
						@php					 
							$userticket_count = \App\Models\Supportchat::where([['uid', '=', Auth::user()->id], ['user_status', '=', '0']])->count();
							@endphp

			

						<!-- <li class="nav-item flagicont"><a href="{{ url('/setlocale/en') }}" class="nav-link {{Session::get('locale')=='en'?'highlight':''}}" title="English"><img src="{{ url('userpanel/images/english.svg') }}" /></a></li>
						<li class="nav-item flagicont"><a href="{{ url('/setlocale/sp') }}" class="nav-link {{Session::get('locale')=='sp'?'highlight':''}}" title="Spanish"><img src="{{ url('userpanel/images/spanish.svg') }}" /></a></li>  -->

						<!-- <li class="nav-item"><a class="nav-link" href="{{url('support')}}"><i class="fa fa-bell"></i><div class="countlisticon">{{$userticket_count}}</div></a></li>			 -->	
					
						<li class="dropdown usermenu">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
								<span class="photopic"><img src="@if(isset(Auth::user()->profileimg)) @if(Auth::user()->profileimg!='') {{ url(Auth::user()->profileimg) }} @else {{url('userpanel/images/profile.png')}} @endif @else {{url('userpanel/images/profile.png')}} @endif"  /></span></a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{url('profile')}}"  >{{Auth::user()->name}} <i class="fa fa-angle-right"></i></a>
									<a href="{{ route('logout') }}"   onclick="event.preventDefault();   document.getElementById('logout-form').submit();" class="dropdown-item"
									>@lang('common.menu.Logout') <i class="fa fa-sign-out"></i></a> 								
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
									</form> 
							</div>	
							</li>  	 
								@php
								if(empty(Session::get('mode'))){
								Session::put('mode', 'nightmode');
								}
							@endphp
							<!-- @if(Session::get('mode')=='daymode')
							<li><a href="{{ url('/setmode/nightmode') }}"><i class="fa fa-moon-o modeicon" id="nightmode" aria-hidden="true"></i></a></li>            
							@else
							<li><a href="{{ url('/setmode/daymode') }}"><i class="fa fa-sun-o modeicon activemode" id="daymode" aria-hidden="true"></i></a></li>
							@endif   -->
							</ul>														
					  </div> 
				</div>		  
			</nav> 
			@if(!isset($active))
			<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
				<ul class="list-unstyled components">
					<li><a  class="active" href="#"><i class="fa fa-dashboard"></i><div>@lang('common.menu.Dashboard')</div></a></li>
					<li><a href="{{url('/profile')}}" ><i class="fa fa-user"></i><div>@lang('common.menu.Profile')</div></a></li>
					<li><a href="#"><i class="fa fa-id-card"></i><div>@lang('common.menu.KYC Verification')</div></a></li>
					<li><a href="#" ><i class="fa fa-ticket"></i><div>@lang('common.menu.Support Ticket')</div></a></li>
					
					<li><a href="#" ><i class="fa fa-bank"></i><div>@lang('common.menu.UserBank Detail')</div></a></li>
			

				</ul>	
			</div>
			@endif
</section>