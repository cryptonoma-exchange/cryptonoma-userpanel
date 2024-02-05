<section class="headermenu">
<nav class="navbar navbar-expand-md navbar-dark headbg">
				<div class="container">				
				<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.svg') }}" class="logo" /></a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>						
					  </button>
					  <div class="collapse navbar-collapse" id="collapsibleNavbar">	
					 	<ul class="navbar-nav mr-auto">	
						 <li class="nav-item"><a class="nav-link" href="index.php">Exchange</a></li>
						 	<li class="nav-item"><a class="nav-link" href="#">Markets</a></li>
							<li class="nav-item"><a class="nav-link" href="wallet.php">Wallet</a></li>
							<li class="nav-item"><a class="nav-link" href="setting.php">Settings</a></li>
						</ul>


						@php					 
							$userticket_count = \App\Models\Supportchat::where([['uid', '=', Auth::user()->id], ['user_status', '=', '0']])->count();
							@endphp
						<ul class="navbar-nav ml-auto">		
						<li class="nav-item"><a class="nav-link" href="support.php">Support</a></li>
						<li class="nav-item notify"><a class="nav-link" href="#"><i class="fa fa-bell"></i>	@if($userticket_count !== 0)<div class="countlisticon">{{$userticket_count}}</div>@endif</a></li>							
						<li class="dropdown usermenu">
							<a href="profile.php" class="nav-link"><span class="photopic"><img src="{{ asset('images/profile.svg') }}" /></span> User Name</a>	
						</li>  													
						</ul>														
					  </div> 
				</div>		  
			</nav>
			
</section>