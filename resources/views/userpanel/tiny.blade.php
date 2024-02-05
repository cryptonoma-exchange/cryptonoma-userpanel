@include('layouts.userpanel.header')

<div class="pagecontent gridpagecontent innerpagegrid">
    @include('layouts.userpanel.headermenu')



    <div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
        <ul class="list-unstyled components">
            <li><a href="{{ route('profile') }}"><img src="{{ url('userpanel/images/profile1.svg') }}" />
                    <div>Profile</div>
                </a></li>
            <li><a href="{{ route('setting') }}" class="active"><img
                        src="{{ url('userpanel/images/security1.svg') }}" />
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
        <div class="container sitecontainer profilepagebg">
            <div class="kyccenterbox">
                <div class="panelcontentbox">
                    <div class= "contentbox">
                    <h2 class="heading-box">MPESA-PESA</h2>

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif


                        <div class="">
                            <form id="msform" class="siteformbg" method="POST"
                                action="{{ route('tinypesavalidation') }}" autocomplete="off">
                                @csrf

                                <div class="form-card">
                                    <h2 class="fs-title text-center mb-4"><img
                                            src="{{ url('userpanel/images/tinypesa.png') }}" width="150" height="150">
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Amount<span class="t-red"> *</span></label>

                                                <input type="text" class="form-control" name="Amount">
                                                <a href="/tinypesahelp">Help <i class="fa fa-question-circle"></i></a>

                                                @if ($errors->has('Amount'))
                                                    <span class="help-block">
                                                        <strong
                                                            class="text text-danger">{{ $errors->first('Amount') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number<span class="t-red"> *</span></label>
                                                <input type="text" class="form-control" name="PhoneNumber">
                                                <a href="/tinypesahelp">Help <i class="fa fa-question-circle"></i></a></li>

                                                @if ($errors->has('PhoneNumber'))
                                                    <span class="help-block">
                                                        <strong
                                                            class="text text-danger">{{ $errors->first('PhoneNumber') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <input type="submit" id="mpesa" name="submit" class="next action-button sitebtn"
                                        value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </article>

    @include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')
