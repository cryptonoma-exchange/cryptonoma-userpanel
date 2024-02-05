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
					<li class="nav-item active"><a class="nav-link" href="{{url('/exchange')}}">@lang('common.menu.Exchange')</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('/#aboutus')}}">@lang('common.menu.About')</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('/#features')}}">@lang('common.menu.Features')</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('/#howit')}}">@lang('common.menu.How It Works')</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('/#faq')}}">@lang('common.menu.FAQ')</a></li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link btn btn-blue mr-2" href="{{url('/login')}}">@lang('common.menu.Sign in')</a></li>
					<li class="nav-item"><a class="nav-link btn btn-green" href="{{url('/register')}}">@lang('common.menu.Sign Up')</a></li>
				</ul>		
					@php
							if(empty(Session::get('mode'))){
							Session::put('mode', 'nightmode');
							}
						@endphp				
					  </div> 
				</div>		  
			</nav>
		 

</section>