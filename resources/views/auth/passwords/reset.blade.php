@extends('layouts.apps')

@section('contents')
    <section class="form-bg">
        <div class="container">
            <div class="fullbox" data-aos="zoom-out" data-aos-duration="1000">

                <div class="formbox">
                    <div class="login-form">
                        <h3 class="heading-title text-center">Reset Password</h3>
                        <div class="formcontentbox">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('status'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo session()->get('status'); ?></strong>
                                </div>
                            @endif
                            <form accept-charset="UTF-8" id="theform" role="form" method="POST"
                                action="{{ route('password.update') }}" autocomplete="off">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <div class="form-outline input-group">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ $_REQUEST['email'] }}"
                                            placeholder="@lang('common.personaldetails.email') *" required autocomplete="email"
                                            readonly="" />
                                        <label class="form-label">Email ID <span class="t-red"> *</span></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-outline input-group">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg input-psswd @error('password') is-invalid @enderror"
                                            name="password" required psswd-shown="false">
                                        <span class="input-group-text" toggle="#password"><i toggle="#password"
                                                class="fa fa-eye toggle-password"></i></span>
                                        <label class="form-label">New Password <span class="t-red"> *</span></label>

                                    </div>
                                    @error('password')
                                        <span class="help-block">
                                            <strong class="text text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-outline input-group">
                                        <input id="password-confirm" type="password"
                                            class="form-control  form-control-lg  space_not input-psswd"
                                            name="password_confirmation" required psswd-shown="false">
                                        <span class="input-group-text" toggle="#password-confirm"><i
                                                toggle="#password-confirm"
                                                class="fa fa-eye toggle-password-confirm"></i></span>
                                        <label class="form-label">Confirm New Password <span class="t-red"> *</span></label>

                                    </div>
                                    @error('password_confirmation')
                                        <span class="help-block">
                                            <strong class="text text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <div class="g-recaptcha" data-sitekey="{{ config('app.GOOGLE_RECAPTCHA_KEY') }}">
                                    </div>
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong
                                                class="text text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div>
                                    <h5><strong>@lang('welcome.Notes') :</strong></h5>

                                    <small class="form-text text-muted">@lang('welcome.Your password must').</small>
                                </div></br>

                                <div class="form-group text-center">
                                    <input type="submit" class="text-uppercase btn bluebtn" value="Submit">
                                </div>
                                <div class="btnsnfg">
                                    <h5>Back to? <a href="{{ url('/login') }}" class="t-blue">Sign In</a></h5>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
        $("body").addClass("innerpagebg");

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
            // alert(input.attr("type"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
