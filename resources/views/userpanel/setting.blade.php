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
            <div class="securityinnerbox">
                <div class="panelcontentbox">
                    <h2 class="heading-box">2FA Verification</h2>
                    <div class="contentbox">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- @if (Auth::user()->twofa_status == 0)
                            <div class="alert alert-danger alert-dismissible">
                                @lang('common.profile.Please enable two verification!')
                            </div>
                        @endif --}}

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="profiletablebox">
                            <div> <img src="{{ url('userpanel/images/auth.svg') }}" class="securityiconbox"> </div>
                            <div>
                                <h4>Google Authentication</h4>
                                <h5 class="t-gray">@lang('common.profile.gogle_auth_avail')</h5>
                            </div>
                            <div class="text-right" x-data="googleTfaForm">

                                @if (auth()->user()->twofa == 'google_otp' && auth()->user()->twofa_status == 1)
                                    <a href="{{ route('diableTwoFactor') }}"
                                        onclick="return confirm('Are you sure to disable Google Authentication?')"
                                        type="button"
                                        class="btn sitebtn red-btn">@lang('common.profile.disable')</a>
                                @else
                                    <a href="#" :class="{'disabled': loading}" @click.prevent="request" class="btn sitebtn green-btn">
                                        @lang('common.profile.enable')
                                        <i x-show="loading" class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                                    </a>
                                        <template x-teleport="body">
                                            <div class="modal fade modalbgt" id="googleotp">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Google Authentication</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="notesh5 t-gray">Install google authenticator app in your mobile and scan QR Code. If you
                                                                are unable to scan the QR code, please enter this code manually into the app.</h5>
                                                                <template x-if="status && message">
                                                                    <div class="text-center text-success" x-text="message"></div>
                                                                </template>
                                                                <template x-if="!status && message && jQuery.isEmptyObject(errors)">
                                                                    <div class="text-center text-danger" x-text="message"></div>
                                                                </template>
                                                            <form class="siteformbg" x-bind="enable_google_form">
                                                                <div class="form-group text-center qrcode">
                                                                    <span><img x-bind:src="qr_code" id="QR_image"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group align-items-baseline">
                                                                        <label class="w-100">Google 2FA Secret Code</label>
                                                                        <input type="text" name="googleotp" class="form-control"
                                                                            x-model="google_secret" id="coinaddress" readonly="">
                                                                        <span class="input-group-text" id="myTooltip">Copy</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">Authentication Code</label>
                                                                    <input type="text" name="code" x-bind="form_elements.code" class="form-control form-control-lg" value=""
                                                                        required="required" />
                                                                    <template x-for="error in getErrors('code')">
                                                                        <div class="text-danger" x-text="error"></div>
                                                                    </template>
                                                                </div>
                                                                <div class="form-group text-center">
                                                                    <button :class="{'disabled': loading}"type="submit" name="submit" class="btn sitebtn">Submit <i x-show="loading" class="fa fa-spinner fa-spin" aria-hidden="true"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                @endif

                            </div>

                        </div>
                        <div class="profiletablebox optionttitle">
                            <div>
                                <h1 class="h1 text-center">(OR)</h1>
                            </div>
                        </div>
                        <div class="profiletablebox">
                            <div> <img src="{{ url('userpanel/images/email.svg') }}" class="securityiconbox"> </div>
                            <div>
                                <h4>Email Verification</h4>
                                <h5 class="t-gray">Send 2FA code via Email.</h5>
                            </div>
                            <div class="text-right" x-data="emailTfaForm">
                                @if (auth()->user()->twofa == 'email_otp' && auth()->user()->twofa_status == 1)
                                <a href="{{ route('diableTwoFactor') }}" type="button"
                                onclick="return confirm('Are you sure to disable email Verification?')"
                                class="btn sitebtn red-btn">@lang('common.profile.disable')</a>
                                @else
                                    <a :class="{'disabled': loading}" @click.prevent="request" href="#" type="button" class="btn sitebtn green-btn">
                                        @lang('common.profile.enable')
                                        <i x-show="loading" class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                                    </a>
                                    <template x-teleport="body">
                                        <div class="modal fade modalbgt" id="emailotp">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Email Code Verification</h4>
                                                        <button type="submit" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <template x-if="status && message">
                                                            <div class="text-center text-success" x-text="message"></div>
                                                        </template>
                                                        <template x-if="!status && message && jQuery.isEmptyObject(errors)">
                                                            <div class="text-center text-danger" x-text="message"></div>
                                                        </template>
                                                        <form class="siteformbg" x-bind="enable_email_form">
                                                            <div class="form-group">
                                                                <label class="">Enter your Code</label>
                                                                <input type="text" x-bind="form_elements.code" name="otp" class="form-control form-control-lg" value=""
                                                                    required="required" />
                                                                <template x-for="error in getErrors('code')">
                                                                    <div class="text-danger" x-text="error"></div>
                                                                </template>
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <button type="submit" name="submit" :class="{'disabled': loading}" class="btn sitebtn">Submit <i x-show="loading" class="fa fa-spinner fa-spin" aria-hidden="true"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panelcontentbox mt-3">
                    <h2 class="heading-box">Other Security Settings</h2>
                    <div class="contentbox">
                        <div class="profiletablebox">
                            <div> <img src="{{ url('userpanel/images/kyc.svg') }}" class="securityiconbox"> </div>
                            <div>
                                <h4>KYC Verification</h4>
                                <h5 class="t-gray">Please submit your KYC for better use and usability.</h5>
                            </div>
                            <div class="text-right">
                                @if (Auth::user()->kyc_verify == 0)
                                    <a href="{{ url('/kyc') }}"
                                        class="btn sitebtn borderbtn">@lang('common.profile.verify')</a>
                                @elseif(Auth::user()->kyc_verify == 2)
                                    <a href="{{ url('/kyc') }}"
                                        class="btn sitebtn borderbtn">@lang('common.profile.waiting')</a>
                                @elseif(Auth::user()->kyc_verify == 1)
                                    <a href="{{ url('/kyc') }}"
                                        class="btn sitebtn green-btn">@lang('common.profile.verified')</a>
                                @endif

                            </div>
                        </div>
                        <div class="profiletablebox">
                            <div> <img src="{{ url('userpanel/images/key.svg') }}" class="securityiconbox"> </div>
                            <div>
                                <h4>Change Password</h4>
                                <h5 class="t-gray">Users are required to use the login password to login our
                                    platform and conduct withdrawal transactions. Please do not disclose the login
                                    password to anyone for the prevention of the loss of your account assets.</h5>
                            </div>
                            <div class="text-right"> <a href="{{ url('changepassword') }}"
                                    class="btn sitebtn borderbtn">Change</a> </div>
                        </div>
                        <div class="profiletablebox">
                            <div> <img src="{{ url('userpanel/images/bank.svg') }}" class="securityiconbox"> </div>
                            <div>
                                <h4>Bank Details</h4>
                                <h5 class="t-gray">List of bank details</h5>
                            </div>
                            <div class="text-right"><a href="{{ url('bank') }}"
                                    class="btn sitebtn borderbtn">View</a></div>
                        </div>
                        <div class="profiletablebox">
                            <div> <img src="{{ url('userpanel/images/support.svg') }}" class="securityiconbox">
                            </div>
                            <div>
                                <h4>Support</h4>
                                <h5 class="t-gray">Create Support Ticket</h5>
                            </div>
                            <div class="text-right"> <a href="{{ url('support') }}"
                                    class="btn sitebtn borderbtn">Create</a> </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </article>
    @include('layouts.userpanel.footermenu')
</div>
<script>
    function emailTfaForm(){
        return {
            errors: {},
            status: false,
            loading: false,
            message: "",
            url: @json(route("enableTfa")),
            form: {
                _token: @json(csrf_token()),
                code : '',
                type : "email_otp"
            },
            form_elements: {
                code: {
                    ['x-model']: "form.code",
                }
            },
            enable_email_form: {
                ['@submit.prevent'] : 'enable'
            },
            getErrors(name) {
                var errors = this.errors;
                if (errors.hasOwnProperty(name)) {
                    return errors[name];
                } else {
                    return [];
                }
            },
            enable(){
                this.errors = {};
                this.status = false;
                this.message = "";
                this.loading = true;
                axios({
                    method: 'POST',
                    url: this.url,
                    data: this.form
                }).then((response) => {
                    var data = response.data;
                    this.status = data.success;
                    if (!data.success) {
                        this.message = data.message;
                        this.errors = data.data;
                    } else {
                        this.form.code = "";
                        $("#emailotp").modal("hide");
                        window.location.reload();
                    }
                }).catch(() => {
                    this.status = false;
                    this.message = "Some thing went wrong. Try again later!";
                }).then(() => {
                    this.loading = false;
                });
            },
            request(){
                this.loading = true;
                axios({
                    method: 'POST',
                    url: @json(route("initializeTfa")),
                    data: {
                        type : "email_otp",
                        _token: @json(csrf_token()),
                    }
                }).then((response) => {
                    var data = response.data;
                    if (!data.success) {
                        toastr.error(data.message);
                    } else {
                        toastr.success(data.message);
                        $("#emailotp").modal("show");
                    }
                }).catch(() => {
                    toastr.error("Some thing went wrong. Try again later!");
                }).then(() => {
                    this.loading = false;
                });
            }
        };
    }
    function googleTfaForm(){
        return {
            errors: {},
            status: false,
            loading: false,
            message: "",
            url: @json(route("enableTfa")),
            qr_code: "",
            google_secret: "",
            form: {
                _token: @json(csrf_token()),
                code : '',
                type : "google_otp"
            },
            form_elements: {
                code: {
                    ['x-model']: "form.code",
                }
            },
            enable_google_form: {
                ['@submit.prevent'] : 'enable'
            },
            getErrors(name) {
                var errors = this.errors;
                if (errors.hasOwnProperty(name)) {
                    return errors[name];
                } else {
                    return [];
                }
            },
            enable(){
                this.errors = {};
                this.status = false;
                this.message = "";
                this.loading = true;
                axios({
                    method: 'POST',
                    url: this.url,
                    data: this.form
                }).then((response) => {
                    var data = response.data;
                    this.status = data.success;
                    if (!data.success) {
                        this.message = data.message;
                        this.errors = data.data;
                    } else {
                        this.form.code = "";
                        $("#googleotp").modal("hide");
                        window.location.reload();
                    }
                }).catch(() => {
                    this.status = false;
                    this.message = "Some thing went wrong. Try again later!";
                }).then(() => {
                    this.loading = false;
                });
            },
            request(){
                this.loading = true;
                axios({
                    method: 'POST',
                    url: @json(route("initializeTfa")),
                    data: {
                        type : "google_otp",
                        _token: @json(csrf_token()),
                    }
                }).then((response) => {
                    var data = response.data;
                    if (!data.success) {
                        toastr.error(data.message);
                    } else {
                        this.qr_code = data.data.qr_code;
                        this.google_secret = data.data.google_secret
                        $("#googleotp").modal("show");
                    }
                }).catch(() => {
                    toastr.error("Some thing went wrong. Try again later!");
                }).then(() => {
                    this.loading = false;
                });
            }
        };
    }
</script>
<script>
    $(function(){
        document.getElementById("myTooltip").addEventListener("click", copy_password);
    });

    function copy_password() {
        var copyText = document.getElementById("coinaddress");
        var textArea = document.createElement("textarea");
        textArea.value = copyText.value;
        document.body.appendChild(textArea);
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied!";

        textArea.select();
        document.execCommand("Copy");
        textArea.remove();

        setTimeout(function() {
            var tooltip = document.getElementById("myTooltip");

            tooltip.innerHTML = "COPY";
            //console.log(tooltip.innerHTML);
        }, 2000);
    }
</script>
@include('layouts.userpanel.footer')
