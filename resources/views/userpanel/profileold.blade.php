@include('layouts.userpanel.header')
	<div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
		<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
    <li><a href="{{ route('profile') }}"  class="active"><img src="{{url('userpanel/images/profile1.svg')}}"/><div>Profile</div></a></li>
        <li><a href="{{ route('setting') }}"><img src="{{url('userpanel/images/security1.svg')}}"/><div>Security</div></a></li>
        <li><a href="{{ route('support') }}"><img src="{{url('userpanel/images/support1.svg')}}"/><div>Support</div></a></li>
        <li><a href="{{ route('bank') }}"><img src="{{url('userpanel/images/bank1.svg')}}"/><div>Bank</div></a></li>
        <li><a href="{{ route('accountactivity') }}"><img src="{{url('userpanel/images/account1.svg')}}"/><div>Account Activity</div></a></li>
			</ul>		
	</div>
		
			<article class="gridparentbox">			
				<div class="container sitecontainer profilepageb">
					<div class="panelcontentbox">
						<h2 class="heading-box">Profile Details</h2>
						<div class="contentpanel">
								<div class="profilebox">
                                    <div class="profilepic"> 
										<img src="{{url('userpanel/images/profile1.svg')}}" id="profile">									
									</div>
									<div class="form-group">   
									<div class="controls">
										<label for="profile_input_file" class="custom-file-upload"><i class="fa fa-cloud-upload"></i> Upload Image</label>
										<input id="profile_input_file" name="profile" type="file" style="display:none;" required>
										<label id="file-name3" class="custm-f"></label>
										<button type="submit" id="save_btn" class="btn sitebtn btn-sm">Submit</button>
													</div>
									<span class="desc">(Upload your image like jpg,jpeg,png (MAX: 1MB))</span>
									</div>
									</div>
								<div class="profiledatainfo">
									<h4 class="h4">Username : john</h4>
									<h4 class="h4">Email : john@mailinator.com 
									<span class="verifytext">Verified</span></h4>
									</div>

									<hr/>
								
								<div class="profiledatainfo">
									<form class="siteformbg">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" required> </div>
											</div>																			
											<div class="col-md-4">
												<div class="form-group">
													<label>Phone</label>
													<input type="text" class="form-control" required> </div>
											</div>		
											<div class="col-md-4">
												<div class="form-group">
													<label>Country</label>
													<select class="form-control">
														<option>India</option>
													</select>
												</div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<textarea class="form-control" rows="5" required></textarea>
												</div>
											</div>									
											<div class="col-md-12 text-center">
												<div class="form-group"> <button type="submit" href="#" class="btn sitebtn">Submit</button> </div>
											</div>
										</div>
									</form>
								</div>
								</div>
								</div>
								</div>
			</article>
@include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')