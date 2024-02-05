@extends('layouts.apps')

@section('contents')
    <section class="form-bg">
        <div class="container">
            <div class="fullbox" data-aos="zoom-out" data-aos-duration="1000">
                <div class="formbox">
                    <div class="login-form">
                        <h3 class="heading-title text-center">Delete Account</h3>
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
                                action="{{ route('delete_account') }}" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <div class="form-outline">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" aria-describedby="emailHelp"
                                            required="">
                                        <label class="form-label">Email ID <span class="t-red"> *</span></label>

                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="text text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
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

                                <div class="form-group text-center">
                                    <input type="submit" class="text-uppercase btn bluebtn" value="Submit">
                                </div>
                                <div class="btnsnfg">
                                    <h5>Don't have an account? <a href="{{ url('/register') }}" class="t-blue">Sign Up</a>
                                    </h5>
                                    <h5><a href="{{ url('/password/reset') }}" class="t-blue">Forgot Password?</a>
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
        $("body").addClass("innerpagebg");

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
    </script>
@endsection
