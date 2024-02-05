@include('layouts.userpanel.header')
<div class="pagecontent gridpagecontent innerpagegrid">
	@include('layouts.userpanel.headermenu')
	<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
		<ul class="list-unstyled components">
			<li><a href="{{ route('profile') }}" class="active"><img src="{{ url('userpanel/images/profile1.svg') }}" />
					<div>Profile</div>
				</a></li>
			<li><a href="{{ route('setting') }}"><img src="{{ url('userpanel/images/security1.svg') }}" />
					<div>Security</div>
				</a></li>
			<li><a href="{{ route('support') }}"><img src="{{ url('userpanel/images/support1.svg') }}" />
					<div>Support</div>
				</a></li>
			<li><a href="{{ route('bank') }}"><img src="{{ url('userpanel/images/bank1.svg') }}" />
					<div>Bank</div>
				</a></li>
			<li><a href="{{ route('accountactivity') }}"><img src="{{ url('userpanel/images/account1.svg') }}" />
					<div>Account Activity</div>
				</a></li>
		</ul>
	</div>

	<article class="gridparentbox">
		<div class="container sitecontainer profilepageb">
			<div class="panelcontentbox">
				<h2 class="heading-box">Profile Details</h2>
				<div class="contentpanel">
					@if (session('error'))
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							{{ session('error') }}
						</div>
					@endif

					@if (session('profilestatus'))
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							{{ session()->get('profilestatus') }}
						</div>
					@endif
					<div class="profilebox">
						<div class="profilepic">
							@if (Auth::user()->profileimg != '')
								<form class="innerformbg siteformbg" method="POST" action="{{ url('deleteprofileimg') }}" style="text-align: end"
									enctype="multipart/form-data" autocomplete="off" id="theform">
									{{ csrf_field() }}
									<div class="controls controlcolsebtn">
										<button type="submit" id="save_btn" class="btn btn-danger btn-xs controlcolsebtn"
											style='cursor:pointer'>X</button>
									</div>
								</form>
							@endif
							<img
								src="
								@if (isset($profile)) 
									@if ($profile->profileimg != '') 
									{{ url($profile->profileimg) }} 
									@else 
									{{ url('userpanel/images/profile1.svg') }} 
									@endif
								@else 
								{{ url('userpanel/images/profile1.svg') }} 
								@endif
								"
								id="doc3">

						</div>
						<div class="form-group">
							<form class="innerformbg siteformbg" method="POST" action="{{ url('updateprofileimg') }}"
								enctype="multipart/form-data" autocomplete="off" id="theform">
								{{ csrf_field() }}
								@if ($errors->has('profile_upload_id'))
									<span class="help-block">
										<strong class='text-danger'>{{ $errors->first('profile_upload_id') }}</strong>
									</span>
								@endif
								<div class="controls">
									<label for="profile_input_file" class="custom-file-upload"><i class="fa fa-cloud-upload"></i>
										@lang('common.personaldetails.uploadimage')</label>
									<input id="profile_input_file" name="profile_upload_id" class="profile_upload_id" type="file"
										style="display:none;">
									<label id="file-name3" class="custm-f"></label>
									<button type="submit" id="save_btn" class="btn sitebtn btn-sm">@lang('common.personaldetails.submit')</button>
								</div>
							</form>
							<span class="desc">(Upload your image like jpg,jpeg,png,svg,gif (MAX: 12 MB))</span>
						</div>
					</div>
					<div class="profiledatainfo">
						<h4 class="h4">Name : {{ $user->name }}</h4>
						<h4 class="h4">Email : {{ $user->email }}
							<span class="verifytext">Verified</span>
						</h4>
					</div>

					<hr />

					<div class="profiledatainfo">
						<form class="innerformbg siteformbg" action="{{ route('userprofile') }}" method="POST" id="theform">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Name <span class="t-red"> *</span></label>
										<input required="" name="full_name" class="form-control allletterwithspace" type="text"
											value="{{ $user->name }}">
									</div>
									@if ($errors->has('full_name'))
										<span class="help-block">
											<strong class="text text-danger">{{ $errors->first('full_name') }}</strong>
										</span>
									@endif
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>@lang('common.personaldetails.phone') <span class="t-red"> *</span></label>
										<input required="" name="phone" class="form-control" type="text" autocomplete="off"
											value="@if (isset($profile) && $user->phone_no != null){{ $user->phone_no }} @endif"
											onkeyup="if (/[^0-9-+]/g.test(this.value)) this.value = this.value.replace(/[^0-9-+]/g,'')">
									</div>
									@if ($errors->has('phone'))
										<span class="help-block">
											<strong class="text text-danger">{{ $errors->first('phone') }}</strong>
										</span>
									@endif
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>@lang('common.personaldetails.country') <span class="t-red"> *</span></label>
										<select name="country" class="form-control">
												<option value="">Select your country</option>
												@foreach ($country as $countrys)
													<option value="{{ $countrys->id }}" @if ($countrys->id == $user->country) selected @endif>
														{{ $countrys->name }}</option>
												@endforeach
										</select>
									</div>
									@if ($errors->has('country'))
										<span class="help-block">
											<strong class="text text-danger">{{ $errors->first('country') }}</strong>
										</span>
									@endif
								</div>

							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>@lang('common.personaldetails.address') <span class="t-red"> *</span></label>
										<textarea name="address" rows="5" class="form-control">@if(isset($profile) && $profile->address != null) {{ $profile->address }} @endif</textarea>
									</div>
									@if ($errors->has('address'))
										<span class="help-block">
											<strong class="text text-danger">{{ $errors->first('address') }}</strong>
										</span>
									@endif
								</div>

								<div class="col-md-12 text-center">
									<div class="form-group"> <button type="submit" class="btn sitebtn">@lang('common.personaldetails.submit')</button> </div>
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

<script>
	function readURLvalida_profile(input) {
		var limit_size = 12*1024;
		var photo_size = Math.round((input.files[0].size / 1024));
		if (photo_size > limit_size) {
			alert('Image size larger than 12 MB');
		} else {
			if (input.files && input.files[0]) {
				$("#file-name1").text(input.files[0].name);
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#doc3').attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
	}

	$(".profile_upload_id").change(function() {
		var limit_size = 12*1024;
		var photo_size = Math.round((this.files[0].size / 1024));
		if (photo_size > limit_size) {
			$("#save_btn").attr('disabled', true);
			$('.profile_upload_id').val("");
			alert('Image Size Larger than 12 MB');
			$("#file-name3").text('');
		} else {
			$(".profile_upload_id").text(this.files[0].name);
			$("#save_btn").attr('disabled', false);
			var file = document.getElementById('profile_input_file').value;
			var ext = file.split('.').pop();
			switch (ext) {
				case 'jpg':
				case 'JPG':
				case 'Jpg':
				case 'jpeg':
				case 'JPEG':
				case 'Jpeg':
				case 'png':
				case 'PNG':
				case 'Png':
				case 'GIF':
				case 'gif':
				case 'Gif':
				case 'svg':
				case 'SVG':
				case 'Svg':
					readURLvalida_profile(this);
					break;
				default:
					alert('Upload your profile like jpg, png & jpeg');
					$("#file-name3").text('');
					break;
			}
		}
	});
</script>
