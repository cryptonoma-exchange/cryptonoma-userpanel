@extends('layouts.apps')

@section('contents')
    <section class="form-bg">
        <div class="container">
            <div class="fullbox" data-aos="zoom-out" data-aos-duration="1000">

                <div class="formbox">
                    <div class="login-form">
                        <h3 class="heading-title text-center">Forgot Password</h3>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="formcontentbox">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-outline input-group">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" aria-describedby="emailHelp" required="">
                                        <label class="form-label">Email ID <span class="t-red"> *</span></label>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="text text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
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

                                <div class="form-group text-center">
                                    <input type="submit" class="text-uppercase btn bluebtn"
                                        value="Send Password Reset Link">
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
    </script>
@endsection
