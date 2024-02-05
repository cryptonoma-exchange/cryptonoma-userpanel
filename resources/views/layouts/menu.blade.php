<header class="headermenu">
		<nav class="navbar navbar-expand-md navbar-dark headbg">
			<div class="container">				  
					<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.svg') }}" class="logo" /></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>                   
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">			
					<ul class="navbar-nav ms-auto">		
					<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
					{{-- @if (Auth::user())
					<li class="nav-item"><a class="nav-link" href="{{ url('/exchange') }}">Exchange</a></li>	
					@else
					<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Exchange</a></li>	
					@endif	 --}}
					<li class="nav-item"><a class="nav-link" href="{{ url('/exchange') }}">Exchange</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/market') }}">Markets</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/faq') }}">FAQ</a></li>
						@auth
						<li class="nav-item"><a class="nav-link" href="{{ url('/wallet') }}">Wallet</a></li>
						@endauth
						@guest
						<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Wallet</a></li>
						@endguest
							
						@if (Auth::user())
						  <li class="nav-item dropdown">	
				<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">My Account</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{url('/setting')}}">@lang('common.menu.Dashboard')</a>
				<a href="{{ route('logout') }}"   onclick="event.preventDefault();   document.getElementById('logout-form').submit();" class="dropdown-item"
									>@lang('common.menu.Logout') <i class="fa fa-sign-out"></i></a> 								
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
									</form> 			
				</div>
				</li>
				@else
				<li class="nav-item"><a class="nav-link btn sitebtn me-2" href="{{ url('/login') }}">Login</a></li>	
				<li class="nav-item"><a class="nav-link btn sitebtn" href="{{ url('/register') }}">Register</a></li>
				@endif


				

				@php
								if(empty(Session::get('mode'))){
								Session::put('mode','nightmode');
								}
							@endphp

						 {{-- <li class="modebg">
							@if(Session::get('mode')=='daymode')
							<li class="d-flex"><a href="{{ url('/setmode/nightmode') }}"><i class="fa fa-moon-o modeicon" id="nightmode" aria-hidden="true"></i></a></li>            
							@else
							<li  class="d-flex"><a href="{{ url('/setmode/daymode') }}"><i class="fa fa-sun-o modeicon activemode" id="daymode" aria-hidden="true"></i></a></li>
							@endif  
                            </li> --}}
					</ul>
				  </div> 
			</div>		  
		</nav>
</header>