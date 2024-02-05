@extends('layouts.apps')

@section('contents')
    <section class="form-bg">
        <div class="container">

            <div class="fullbox" data-aos="zoom-out" data-aos-duration="1000">
                <div class="formbox">
                    <div class="login-form">
                        <h3 class="heading-title text-center">Sign Up</h3>
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
                                action="{{ route('register') }}" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <div class="form-outline">
                                        <input type="text" name="name" class="form-control form-control-lg" required>
                                        <label class="form-label">Name <span class="t-red"> *</span></label>

                                    </div>
                                    @error('name')
                                        <span class="help-block">
                                            <strong class="text text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-outline">
                                        <input type="text" name="email" class="form-control form-control-lg" required>
                                        <label class="form-label">Email ID <span class="t-red"> *</span></label>

                                    </div>
                                    @error('email')
                                        <span class="help-block">
                                            <strong class="text text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-outline input-group">
                                        <input id="password" type="password"
                                            class="form-control  form-control-lg  space_not input-psswd @error('password') is-invalid @enderror"
                                            name="password" required psswd-shown="false">
                                        <span class="input-group-text" toggle="#password"><i toggle="#password"
                                                class="fa fa-eye toggle-password"></i></span>
                                        <label class="form-label">Password <span class="t-red"> *</span></label>

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
                                            name="confirmation_password" required psswd-shown="false">
                                        <span class="input-group-text" toggle="#password-confirm"><i
                                                toggle="#password-confirm"
                                                class="fa fa-eye toggle-password-confirm"></i></span>
                                        <label class="form-label">Confirm Password <span class="t-red"> *</span></label>

                                    </div>
                                    @error('confirmation_password')
                                        <span class="help-block">
                                            <strong class="text text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div id="referral"
                                    class="form-group {{ $errors->has('referral_id') ? ' has-error' : '' }}">
                                    <div class="form-group mb-4">
                                        <div class="form-outline">
                                            <input class="form-control form-control-lg allletterwithnumber" type="text"
                                                name="referral_id"
                                                value="@if (isset($referral_id)) {{ $referral_id }} @endif"
                                                id="referral_id"
                                                @if (!isset($referral_id)) onkeyup="check_referral('{{ url('/checkReferral') }}')" @endif
                                                @if (isset($referral_id)) readonly @endif>

                                            <label class="form-label">Referral ID (Optional) </label>

                                        </div>
                                        @error('referral_id')
                                            <span class="help-block">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                        @enderror
                                        <span id="showReferralUser">
                                            @if (isset($sponsor_name))
                                                {!! $sponsor_name !!}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <div class="g-recaptcha" data-sitekey="{{ config('app.GOOGLE_RECAPTCHA_KEY') }}"></div>
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

                                <div class="d-flex justify-content-center">
                                    <div class="form-check mb-3 mb-md-0">
                                        <input class="form-check-input" name="check" type="checkbox">

                                        <label class="form-check-label" for="registerCheck">I agree <a class="t-blue"
                                                href="{{ url('/terms') }}">terms and conditions <span class="t-red"> *</span></a></label>
                                    </div>

                                </div>
                                @if ($errors->has('check'))
                                    <span class="help-block">
                                        <strong class="text text-danger">{{ $errors->first('check') }}</strong>
                                    </span>
                                @endif

                                <div class="form-group text-center">
                                    <input type="submit" class="text-uppercase btn bluebtn" value="Sign Up">
                                </div>
                                <div class="btnsnfg">
                                    <h5>Do you have an account? <a href="{{ url('/login') }}" class="t-blue">Sign In</a>
                                    </h5>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
        $("#referral").hide();

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));


            //alert(input.attr("type"));
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
