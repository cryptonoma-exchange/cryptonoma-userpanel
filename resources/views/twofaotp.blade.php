 @include('layouts.userpanel.header')
 <style>
    body .innerpagegrid .gridparentbox {
        padding-bottom: 40px;
        padding-top: 82px;
        padding-left: 9px;
        padding-right: 9px;
    }
 </style>
 <div class="pagecontent gridpagecontent innerpagegrid">
     @include('layouts.userpanel.headermenu')
     <article class="gridparentbox">
         <div class="innerpagecontent">
             <div class="container">
                 <h2 class="h2">
                    @if ($user->twofa == "email_otp")
                    Email Verification
                    @else
                    Google Authentication
                    @endif
                 </h2>
                 <hr class="x-line-center">
             </div>
         </div>
         <div class="container sitecontainer">
             <div class="row">
                 <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
                     <div class="panelcontentbox">
                         <div class="contentpanel">
                             <form role="form" class="innerformbg siteformbg" action="{{ route('validate_twofaotp') }}" method="POST">
                                 @csrf
                                 @if (session('error'))
                                     <div class="alert alert-danger">
                                         {{ session('error') }}
                                     </div>
                                 @endif
                                 @if (session('success'))
                                     <div class="alert alert-success">
                                         {{ session('success') }}
                                     </div>
                                 @endif
                                 <div class="form-group">
                                     <label class="form-label">
                                        @if ($user->twofa == "email_otp")
                                        VERIFICATION CODE
                                        @else
                                        AUTHENTICATION CODE
                                        @endif
                                        <span class="text text-danger">*</span>
                                    </label>
                                     <input type="text" name="code" class="form-control" required="">
                                     @if ($errors->has('code'))
                                         <span class="help-block">
                                             <strong class="text-danger">{{ $errors->first('code') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                                 <div class="text-center">
                                     <input type="submit" name="submit" class="btn btn-sm yellow-btn mr-1"
                                         value="Submit" />
                                 </div>
                                 @if ($user->twofa == "email_otp")
                                     <div class="text-right">
                                         <a href="{{ url('/resendcode') }}" type="button"><u>Resend Code</u></a>
                                     </div>
                                 @endif
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </article>
 </div>
@include('layouts.userpanel.footermenu')
 </div>
@include('layouts.userpanel.footer')
 </body>
 </html>