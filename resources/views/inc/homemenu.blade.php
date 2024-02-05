
<header class="headermenu">
	@if (Auth::user())
		<nav class="navbar navbar-expand-md navbar-dark headbg menuhightlight">
			<div class="container">				  
					<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo.svg') }}" class="logo" /></a>
					 
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>                   
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">
				  <ul class="navbar-nav justify-center mx-auto d-flex">				 
				  <li class="nav-item"><a class="nav-link" href="{{url('/market')}}">Market</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/trade')}}">Trade</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/crypto')}}">Crypto Lending</a></li>	
						<li class="nav-item"><a class="nav-link" href="{{url('/credit')}}">Credit Card</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/wallet')}}">Wallet</a></li>	
						<li class="nav-item"><a class="nav-link" href="{{url('/referralsystem')}}">Referral</a></li>	
					</ul>	

								<ul class="d-flex navbar-nav w-auto two-btns">

				<li class="nav-item dropdown">
				<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">My Account</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="{{url('dashboard')}}">@lang('common.menu.Dashboard')</a>
				<a href="{{ route('logout') }}"   onclick="event.preventDefault();   document.getElementById('logout-form').submit();" class="dropdown-item"
									>@lang('common.menu.Logout') <i class="fa fa-sign-out"></i></a> 								
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
									</form> 			
				</div>
				</li>
					<ul class="navbar-nav">		
					
					 



						<li class="nav-item dropdown langmenu flagicont">
						<a aria-expanded="false" data-toggle="dropdown" href="#" class="nav-link dropdown-toggle"><img src="{{ url('images/us.svg') }}">US</a>
							<ul class="dropdown-menu">
							<li><a class="dropdown-item" href=""><img src="images/cn.svg">CN</a></li>
								<li><a class="dropdown-item" href=""><img src="images/sp.svg">SP</a></li>
								<li><a class="dropdown-item" href=""><img src="images/fr.svg">FR</a></li>
								<li><a class="dropdown-item" href=""><img src="images/pt.svg">PT</a></li>
								<li><a class="dropdown-item" href=""><img src="images/ru.svg">RU</a></li>
								<li><a class="dropdown-item" href=""><img src="images/jp.svg">JP</a></li>
								<li><a class="dropdown-item" href=""><img src="images/kr.svg">KR</a></li>
								<li><a class="dropdown-item" href=""><img src="images/ae.svg">AE</a></li>



									</ul>
									</li>
				  </div> 
			</div>		  
		</nav>



@else

			<nav class="navbar navbar-expand-md navbar-dark headbg menuhightlight">
			<div class="container">				  
					<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo.svg') }}" class="logo" /></a>
					 
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>                   
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">
				  <ul class="navbar-nav justify-center mx-auto d-flex">				 
				  <li class="nav-item"><a class="nav-link" href="{{url('/market')}}">Market</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Trade</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/crypto')}}">Crypto Lending</a></li>	
						<li class="nav-item"><a class="nav-link" href="{{url('/credit')}}">Credit Card</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/wallet')}}">Wallet</a></li>	
						<li class="nav-item"><a class="nav-link" href="{{url('/referralsystem')}}">Referral</a></li>	
					</ul>	
					<ul class="navbar-nav">		
					
					 	 <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>	
					 	 <li class="nav-item"><a class="nav-link bluebtn" href="{{url('/register')}}">Register</a></li>
						<li class="nav-item dropdown langmenu flagicont">
						<a aria-expanded="false" data-toggle="dropdown" href="#" class="nav-link dropdown-toggle"><img src="{{ url('images/us.svg') }}">US</a>
							<ul class="dropdown-menu">
							<li><a class="dropdown-item" href=""><img src="images/cn.svg">CN</a></li>
								<li><a class="dropdown-item" href=""><img src="images/sp.svg">SP</a></li>
								<li><a class="dropdown-item" href=""><img src="images/fr.svg">FR</a></li>
								<li><a class="dropdown-item" href=""><img src="images/pt.svg">PT</a></li>
								<li><a class="dropdown-item" href=""><img src="images/ru.svg">RU</a></li>
								<li><a class="dropdown-item" href=""><img src="images/jp.svg">JP</a></li>
								<li><a class="dropdown-item" href=""><img src="images/kr.svg">KR</a></li>
								<li><a class="dropdown-item" href=""><img src="images/ae.svg">AE</a></li>



									</ul>
									</li>
				  </div> 
			</div>		  
		</nav>
			@endif
</header>