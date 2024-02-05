<section class="headermenu">
<nav class="navbar navbar-expand-md navbar-dark headbg">
				<div class="container">				
				<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo.svg') }}" class="logo" /></a>
				
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>						
					  </button>
					  <div class="collapse navbar-collapse" id="collapsibleNavbar">	
					 	<ul class="navbar-nav mr-auto">	
						 <li class="nav-item"><a class="nav-link" href="{{ route('exchange') }}">Exchange</a></li>
						 	<li class="nav-item"><a class="nav-link" href="{{url('market')}}">Markets</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Wallet</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Settings</a></li>
						</ul>
						<ul class="navbar-nav ml-auto">	

							<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>	
				<li class="nav-item"><a class="nav-link btn sitebtn" href="{{ url('/register') }}">Register</a></li>	
					<!-- 	<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Support</a></li>
						<li class="nav-item notify"><a class="nav-link" href="#"><i class="fa fa-bell"></i><div class="countlisticon">20</div></a></li>
						<li class="dropdown usermenu">
							<a class="nav-link"><span class="photopic"><img src="{{ url('images/profile.svg')}}" /></span> User Name</a>	
						</li> --> 

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