@include('layouts.userpanel.header')

<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
    <div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
			<ul class="list-unstyled components">
                <li><a href="{{ route('profile') }}"><img src="{{ asset('images/profile1.svg') }}"/><div>Profile</div></a></li>
				<li><a href="{{ route('setting') }}" class="active"><img src="{{ asset('images/security1.svg') }}"/><div>Security</div></a></li>
				<li><a href="{{ route('support') }}"><img src="{{ asset('images/support1.svg') }}"/><div>Support</div></a></li>
				<li><a href="{{ route('bank') }}"><img src="{{ asset('images/bank1.svg') }}"/><div>Bank</div></a></li>
				<li><a href="{{ route('accountactivity') }}"><img src="{{ asset('images/account1.svg') }}"/><div>Account Activity</div></a></li>
			</ul>	
	</div>
	<article class="gridparentbox">	

<div class="container sitecontainer">
	<div class="topboxparentbg">	
	<div class="centerbox mx-auto depostboxbg">	
		<div class="panelcontentbox">			
			<h2 class="heading-box text-center mb-3 pb-3">ADD</h2>	
			<div class="contentbox">	
            <form method="post" class="siteformbg" autocomplete="off">
                <div class="form-group">
                <label class="">Old Password</label>
                        <input type="text" class="form-control form-control-lg" value="">                        
                </div>  
                <div class="form-group">
                <label class="">New Password</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" value="">
                        <span class="input-group-text"><i class="fa fa-eye"></i></span>
                    </div>
                </div>    
                <div class="form-group">
                <label class="">Confirm Password</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" value="">
                        <span class="input-group-text"><i class="fa fa-eye"></i></span>
                    </div>
                </div>                                        	
                    <div class="text-center">
                        <button type="submit" class="text-uppercase btn btn-primary sitebtn">Submit</button>
                    </div>
              </form>
			</div>	
		</div>	
		
	</div>
	
	</div>
	</div>
	</article>
	
@include('layouts.userpanel.footermenu')
</div>

@include('layouts.userpanel.footer')
