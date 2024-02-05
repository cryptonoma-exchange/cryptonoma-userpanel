@include('layouts.userpanel.header')
    <div class="pagecontent gridpagecontent innerpagegrid">
@include('layouts.userpanel.headermenu')
@include('layouts.userpanel.leftsidemenu')
<style>
    .percentageBtn.active{
        background: #367AFF!important;
        color: #fff !important;
    }
</style>
        <article class="gridparentbox">
            <div class="innerpagecontent">
                <div class="container">
                    <h2 class="h2">{{$coin->source}} @lang('common.wallet.withdraw')</h2>
                    <hr class="x-line-center">
                </div>
            </div>

            <div class="container sitecontainer">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
                        <div class="panelcontentbox">
                            <div class="contentpanel">
                                @if ($coin->type != "fiat")
                                <div class="alert alert-info"><i class="fa fa-info-circle"></i>@lang('common.withdraw.You_can_withdraw')</div>
                                @endif

                                <br />

                                <form class="innerformbg siteformbg" method="post" id="theform" autocomplete="off">
                                    @csrf
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ session('error') }}
                                    </div>
                                    @endif
                           					 
								<div class="form-group">
									<label class="form-label">@lang('common.withdraw.Select Crypto/Currency')  <span class="text text-danger">*</span></label>
									<select class="form-control" onchange="location.href=this.value">
										@foreach($coins as $coindetail)
										<option value ='{{url('withdraw/'.$coindetail->source)}}'  @if($coindetail->source == $coin->source) selected @endif)>{{$coindetail->source}}</option>
										@endforeach
									</select>
                                </div>

                                @if (count($networks))
                                <div class="form-group">
									<label class="form-label">Network  <span class="text text-danger">*</span></label>
									<select class="form-control" name="network">
                                        <option value="" >Select Network</option>
										@foreach($networks as $network)
										<option value ='{{$network}}'>{{$network}}</option>
										@endforeach
									</select>
                                    @if ($errors->has('network'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('network') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                @endif
                                
                                @if ($coin->type != "fiat")
                                    <div class="form-group">
                                        <label class="form-label">@lang('common.withdraw.Withdraw Address')  <span class="text text-danger">*</span></label>
                                        <input type="text" name="to_address" value="{{ old("to_address") }}" class="form-control" id="withdraw_address" onkeyup="if (/[^a-zA-Z0-9]/g.test(this.value)) this.value = this.value.replace(/[^a-zA-Z0-9]/g,'')" placeholder="Enter withdraw address" />
                                        @if ($errors->has('to_address'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('to_address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    @if ($coin->need_memo)
                                    <div class="form-group">
                                        <label class="form-label">Memo </label>
                                        <input type="text" name="memo" value="{{ old("memo") }}" class="form-control" id="memo" placeholder="Enter Memo" />
                                        @if ($errors->has('memo'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('memo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                                @endif

                                @if ($coin->type == "fiat")
                                <div class="form-group">
									<label class="form-label">Withdraw Type  <span class="text text-danger">*</span></label>
									<select class="form-control" name="payment_type" id="paymenttype" autocomplete="off">
                                        <option id="mpesa" value="tinypesa" @if(old("payment_type") == "tinypesa") selected @endif>Mpesa</option>
                                        <option id="wire" value="wirepayment" @if(old("payment_type") == "wirepayment") selected @endif>Wire Payment</option>
                                    </select>
                                    @if ($errors->has('payment_type'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('payment_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group" data-payment_type='wirepayment'>
                                    <label class="form-label">@lang('common.withdraw.Select Bank Name') <span
                                            class="text text-danger">*</span></label>
                                    <select class="form-control" name="bank_id" id="bankname">
                                        <option value="">@lang('common.Select Bank')</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" @if(old("bank_id") == $bank->id) selected @endif data-account_no="{{ $bank->account_no }}">{{ $bank->bank_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('bank_id'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('bank_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group" data-payment_type='wirepayment'>
                                    <label class="form-label">@lang('common.withdraw.Account No') <span
                                            class="text text-danger">*</span></label>
                                    <input required="required" class="form-control" type="text" name="account_no"
                                        id="accountno"
                                        onkeyup="if (/[^0-9a-zA_Z]/g.test(this.value)) this.value = this.value.replace(/[^0-9a-zA-Z]/g,'')"
                                        readonly="">
                                    @if ($errors->has('account_no'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('account_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group" data-payment_type='tinypesa'>
                                    <label>Name <span class="t-red"> *</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group" data-payment_type='tinypesa'>
                                    <label>Phone Number <span class="t-red"> *</span></label>
                                    <input type="text" class="form-control" name="phone" value="{{ old("phone") }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                @endif
                                    <div class="form-group">
                                        <label class="form-label">@lang('common.withdraw.Withdraw Amount')  <span class="text text-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control allownumericwithdecimal" value="{{ old("amount") }}" id="crypto_withdraw_amount" onkeyup='calculatedynamicfee();' type="number" name="amount" step="0.0001" min="0" max="10000000000" placeholder="Enter withdraw amount" /> 
                                            <div class="input-group-append"><span class="input-group-text"> {{$coin->source}}</span>
                                            </div>
                                        </div>
                                        @if ($errors->has('amount'))
                                            <span class="help-block text-danger">
                                                <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    @if (!empty(auth()->user()->twofa))
                                    <div class="form-group">
                                        <label class="form-label">
                                            @if (auth()->user()->twofa == "email_otp")
                                            Verification Code
                                            @else
                                            Authentication Code
                                            @endif
                                             <span class="text text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input class="form-control allownumericwithdecimal" onkeyup='calculatedynamicfee();' type="text" name="otp" placeholder="@if (auth()->user()->twofa == "email_otp") Enter Verification Code @else Enter Authentication Code @endif" /> 
                                            @if (auth()->user()->twofa == "email_otp")
                                            <div class="input-group-append"><button type="button" class="btn sitebtn send_verification_btn">Send</button></div>
                                            @endif
                                        </div>
                                        @if ($errors->has('otp'))
                                            <span class="help-block text-danger">
                                                <strong class="text-danger">{{ $errors->first('otp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    @endif
                                    
                                    <div class="form-group">
                                        <div class="control-value-box stoplimtboxt">
                                            <div>@lang('common.withdraw.Limit Count') </div>
                                            <div>
                                                <div class="row link-div">
                                                    <div class="col percentageBtn" id='25'>25%</div>
                                                    <div class="col percentageBtn" id='50'>50%</div>
                                                    <div class="col percentageBtn" id='75'>75%</div>
                                                    <div class="col percentageBtn" id='100'>100%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="notestitle text-center">
                                        @if ($coin->withdraw)
                                        <p><span class="t-gray">Minimum Withdraw </span> : <span>{{ number_format($coin->min_withdraw, $coin->decimal, '.', '') }}<span class="text-uppercase"> {{ $coin->source }}</span></span></p>
                                        @endif
                                        <p><span class="t-gray">@lang('common.withdraw.Available Spot Balance') </span> : <span>{{ number_format($balance, $coin->decimal, '.', '') }}<span class="text-uppercase"> {{ $coin->source }}</span></span></p>
                                        <p><span class="t-gray">@lang('common.withdraw.Withdraw Fee') </span> : <span id="w_com">{{ number_format(0, $coin->decimal, '.', '') }} </span> <span class="text-uppercase"> {{ $coin->source }} ( {{$coin->withdraw}}) %</span></p>
                                        <p><span class="t-gray">@lang('common.withdraw.Total Withdraw') </span> : <span id="withdraw_total">{{ number_format(0, $coin->decimal, '.', '') }}</span> <span class="text-uppercase">{{ $coin->source }}</span></p>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <input type="submit" class="withdraw_submit btn sitebtn btn-xs btn-block" value="@lang('common.withdraw.Submit')">
                                        </div>
                                    </div>

                                    @if ($coin->need_memo)
									<p class="text text-danger mb-0">Note: If a memo is required and you forget to include it, or you include an incorrect memo, the funds may be lost.</p>
									@endif

                                    <div class="row notessub mt-3">
										<div class="col-12 col-sm-9">
											<h5 class="t-gray fntbld">Tips</h5>
											<p class="t-gray">Currency withdraw will be available for use after Admin confirmation</p>
                                            <p class="t-gray">@lang('common.withdraw.You can check your previous withdraw in')   <a href="{{ route("withdrawhistories",["coin" => $coin->source]) }}"  target= '_blank'  class="tblue"><u>@lang('common.withdraw.Withdraw History') </u></a></p>										
                                        </div>
                                        @if ($coin->type == "fiat")
                                        <div class="col-12 col-sm-3" data-payment_type='tinypesa'>
											<img src="https://cryptonoma.com/userpanel/images/tinypesa.png" width="75" height="75">
										</div>
                                        @endif
									</div>

                                    {{-- <div class="notessub mt-40">
                                        <h5 class="t-gray fntbld">@lang('common.withdraw.Tips') </h5>
                                        <p class="t-gray">@lang('common.withdraw.You can check your previous withdraw in')   <a href="{{url('withdrawhistories/All')}}"  target= '_blank'  class="tblue"><u>@lang('common.withdraw.Withdraw History') </u></a></p>
                                    </div> --}}
                                </form>
                            </div>
                        </div>

                        <div class="bckbtn text-center">
                            <a href="{{ url('/wallet') }}" class="btn sitebtn btn-sm"><i class="fa fa-arrow-left"></i> @lang('common.withdraw.Back') </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
@include('layouts.userpanel.footermenu')
    </div>
@include('layouts.userpanel.footer')
    <script>
        var coin_decimal = @json($coin->decimal);
        $(function(){
            $("#paymenttype").on("change",function(){
                var paymentType = $(this).find(":selected").val();
                $("[data-payment_type]").hide();
                if(paymentType == "tinypesa"){
                    $("[data-payment_type='tinypesa']").show();
                } else if(paymentType == "wirepayment"){
                    $("[data-payment_type='wirepayment']").show();
                }
            }).trigger("change");

            $("#bankname").on("change",function(){
                var account_no = $(this).find(":selected").attr("data-account_no");
                $("#accountno").val(account_no);
            }).trigger("change");
            $(".withdraw_submit").on("click",function(event){
                $(event.target).addClass("disabled");
            });
            $(".send_verification_btn").on("click",function(event){
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $(event.target).addClass("disabled");
                $.ajax({
                    method: "POST",
                    url: @json(route("send_verification_code")),
                    data: {  _token: csrf_token }
                }).always(function() {
                    $(event.target).removeClass("disabled");
                    toastr.success('Mail sent successfully. Check your email inbox/spam folder for verification code.')
                });
            });
        });
    function calculatedynamicfee(){
        var amount   = parseFloat($('#crypto_withdraw_amount').val());
        var adminfee = parseFloat(amount) * parseFloat({{ ncDiv($coin->withdraw,100) }});
        var total    = parseFloat(amount) - parseFloat(adminfee).toFixed(coin_decimal);       
        if(total > 0){
            $('#w_com').html(adminfee.toFixed(coin_decimal));
            $('#withdraw_total').html(total.toFixed(coin_decimal));
        } else {
            $('#w_com').html('0.00000000');
            $('#withdraw_total').html('0.00000000');
        }
    }

    $(".percentageBtn").on("click",function(){
        var percentage = $(this).attr("id");
        $(".percentageBtn").removeClass("active");
        $(this).addClass('active');
        var balance   = parseFloat({{ number_format($balance, $coin->decimal, '.', '') }}) ;
        var fillamount = parseFloat((parseFloat(balance) * parseFloat(percentage)/100).toFixed(coin_decimal));
        $('#crypto_withdraw_amount').val(fillamount);
        calculatedynamicfee(); 
    });

    function calculatewithdraw(id,pthis){
        
    }
    
</script>