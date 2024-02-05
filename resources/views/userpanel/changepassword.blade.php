@include('layouts.userpanel.header')

<div class="pagecontent gridpagecontent innerpagegrid">

    @include('layouts.userpanel.headermenu')
    <div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
        <ul class="list-unstyled components">
            <li><a href="{{ route('profile') }}"><img src="{{ url('images/profile1.svg') }}" />
                    <div>Profile</div>
                </a></li>
            <li><a href="{{ route('setting') }}" class="active"><img
                        src="{{ url('images/security1.svg') }}" />
                    <div>Security</div>
                </a></li>
            <li><a href="{{ route('support') }}"><img src="{{ url('images/support1.svg') }}" />
                    <div>Support</div>
                </a></li>
            <li><a href="{{ route('bank') }}"><img src="{{ url('images/bank1.svg') }}" />
                    <div>Bank</div>
                </a></li>
            <li><a href="{{ route('accountactivity') }}"><img src="{{ url('images/account1.svg') }}" />
                    <div>Account Activity</div>
                </a></li>
        </ul>
    </div>
    <article class="gridparentbox">

        <div class="container sitecontainer">
            <div class="topboxparentbg">
                <div class="centerbox mx-auto depostboxbg">
                    <div class="panelcontentbox">
                        <h2 class="heading-box text-center mb-3 pb-3">Change Password</h2>

                        <div class="contentbox">
                            <form accept-charset="UTF-8" method="post" action="{{ url('updatePassword') }}"
                                class="siteformbg" autocomplete="off">
                                @csrf
                                @if (session()->has('passwordnotupdated'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button><strong>@lang('common.Failed')!</strong>
                                        {{ session()->get('passwordnotupdated') }}
                                    </div>
                                @endif

                                @if (session()->has('passwordupdated'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button><strong>@lang('common.Success')!</strong>
                                        {{ session()->get('passwordupdated') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="">Current Password  <span class="t-red"> *</span></label>
                                    <div class="input-group">
                                        <input id="password-old" type="password"
                                            class="form-control  form-control-lg  space_not input-psswd"
                                            name="current_password" required psswd-shown="false">
                                        <span class="input-group-text" toggle="#password-old"><i toggle="#password-old"
                                                class="fa fa-eye toggle-password-old"></i></span>
                                    </div>
                                    @if ($errors->has('current_password'))
                                        <span class="help-block">
                                            <strong
                                                class="text text-danger">{{ $errors->first('current_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="">New Password  <span class="t-red"> *</span></label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg input-psswd @error('password') is-invalid @enderror"
                                            name="new_password" required psswd-shown="false">
                                        <span class="input-group-text" toggle="#password"><i toggle="#password"
                                                class="fa fa-eye toggle-password"></i></span>
                                    </div>
                                    @if ($errors->has('new_password'))
                                        <span class="help-block">
                                            <strong
                                                class="text text-danger">{{ $errors->first('new_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="">Confirm New Password  <span class="t-red"> *</span></label>
                                    <div class="input-group">
                                        <input id="password-confirm" type="password"
                                            class="form-control  form-control-lg  space_not input-psswd"
                                            name="confirm_password" required psswd-shown="false">
                                        <span class="input-group-text" toggle="#password-confirm"><i
                                                toggle="#password-confirm"
                                                class="fa fa-eye toggle-password-confirm"></i></span>
                                    </div>
                                    @if ($errors->has('confirm_password'))
                                        <span class="help-block">
                                            <strong
                                                class="text text-danger">{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div>
                                    <h5><strong>@lang('welcome.Notes') :</strong></h5>

                                    <small class="form-text text-muted">@lang('welcome.Your password must').</small>
                                </div></br>

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

<script>
    $(".toggle-password-old").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".toggle-password-confirm").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
