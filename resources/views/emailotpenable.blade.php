@include('inc.header')
<header class="innerheader">
  @include('inc.menu')
</header>   

<article>


  <div class="pagecontent">
    <section class="innerpagecontent">
      <div class="container sitecontainer">    
        <div class="innerpageboxsect">
          <div class="col-md-5 col-sm-8 col-xs-12 center-content">
            <div class="centerwhitebox">
              <div class="title-header text-center">Email Otp<hr class="x-line"></div>
              

          <form class="
          mui-form" method="post" action="{{ url('/2faverification/emailotpverify') }}">
            {{ csrf_field() }}
              @if (session('faild'))
                            <div class="alert alert-danger">
                                {{ session('faild') }}
                            </div>
                        @endif
            <div class="mui-textfield">
              <input id="otp" type="number" class="form-control" name="otp" value="{{ old('otp') }}" required autofocus>
                      @if ($errors->has('otp'))
                          <span class="help-block">
                              <strong>{{ $errors->first('otp') }}</strong>
                          </span>
                      @endif
              <p>Enter 6 Digit Code </p>
            </div>

            <div align="center">
              <div class="btntext">
                <button type="submit" class="btn site-btn btn-gray mt-20 text-uppercase fnt-bold">Submit</button>
              </div>
            </div>
            <div class="mui-textfield btntexts">
              
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  </section>
</div>
</article>
@include('inc.homefooter')

