@include('layouts.userpanel.header')
<div class="pagecontent gridpagecontent innerpagegrid">
    @include('layouts.userpanel.headermenu')
    @include('layouts.userpanel.leftsidemenu')
    <article class="gridparentbox">
        <div class="innerpagecontent">
            <div class="container">
                <h2 class="h2">{{ $currency }} @lang('common.wallet.Withdraw')</h2>
                <hr class="x-line-center">
            </div>
        </div>
        <div class="container sitecontainer">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto centerbox">
                    <div class="panelcontentbox">
                        <div class="contentpanel">
                            @if (count($bankdetail) == 0)
                                <div class="alert alert-danger">
                                    <p style="font-size: 15px;">@lang('common.Please fill your bank details in profile')!<a href="{{ url('/bank') }}"
                                            style="font-size: 15px;"><u> @lang('common.Click Here')</u></a>
                                    </p>
                                </div>
                            @endif

                            <form method="post" action="{{ url('fiatsendWithdrawRequest') }}" id="theform"
                                class="innerformbg siteformbg" autocomplete="off">

                                {{ csrf_field() }}
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert"
                                            aria-label="close">&times;</a>
                                        {{ session('success') }}
                                    </div>
                                    @endif @if (session('fail'))
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">&times;</a>
                                            {{ session('fail') }}
                                        </div>
                                    @endif
                                    <div class="alert alert-success alert-dismissible msg-box"> @lang('common.Your Wallet Balance')<span
                                            class="h4 btc-v"> {{ display_format($balance, 2, '.', '') }}
                                            {{ $currency }}</span>
                                    </div>

                                    <div class="form-group">

                                        <label class="form-label">@lang('common.withdraw.Select Crypto/Currency') <span
                                                class="text text-danger">*</span></label> <a
                                            href="{{ url('tinypesawithdraw') }}"
                                            class="btn btn-sm green-btn mr-1">MPesa</a>
                                        <select class="form-control" onchange="location.href=this.value">
                                            @foreach ($coindetails as $coindetail)
                                                <option value='{{ url('withdraw/' . $coindetail->source) }}'
                                                    @if ($coindetail->source == $currency) selected @endif)>
                                                    {{ $coindetail->source }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">@lang('common.withdraw.Select Bank Name') <span
                                                class="text text-danger">*</span></label>
                                        <select class="form-control" name="bank_name" id="bankname">
                                            <option value="">@lang('common.Select Bank')</option>
                                            @if (count($bankdetail) > 0)
                                                @foreach ($bankdetail as $bank_details)
                                                    <option value="{{ $bank_details->id }}">
                                                        {{ $bank_details->bank_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('bank_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bank_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">@lang('common.withdraw.Account No')<span
                                                class="text text-danger">*</span></label>

                                        <input required="required" class="form-control" type="text" name="account_no"
                                            id="accountno"
                                            onkeyup="if (/[^0-9a-zA_Z]/g.test(this.value)) this.value = this.value.replace(/[^0-9a-zA-Z]/g,'')"
                                            readonly="">
                                        @if ($errors->has('account_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('account_no') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">@lang('common.withdraw.Withdraw Amount')<span
                                                class="text text-danger">*</span></label>
                                        <input required="required" class="form-control allownumericwithdecimal"
                                            id="withdraw_amount" type="text" name="amount">
                                        @if ($errors->has('amount'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <input type="hidden" id="coin" name="coin" value="{{ $currency }}">
                                    <input type="hidden" name="withdraw_admin_fee" id="withdraw_admin_fee"
                                        value="{{ $commission }}" />
                                    <input type="hidden" name="withdraw_commission" id="withdraw_commission"
                                        value="{{ $withdraw_com }}" />
                                    <input type="hidden" id="net_fee" value="{{ $netfee }}" />

                                    <p class="content">@lang('common.withdraw.Withdraw Commission') ( {{ $commission }}% )
                                        <span class="violet-t">
                                            <span id="fees"></span>{{ $currency }}</span>
                                    </p>
                                    <div id='total_withdraw_fee'></div>

                                    @if (count($bankdetail) > 0)
                                        <div class="text-center">
                                            <input type="submit" class="btn sitebtn" id="fiat_deposit"
                                                value="@lang('common.withdraw.Submit')">
                                        </div>
                                    @endif

                            </form>

                            <div class="notessub mt-40">
                                <h5 class="t-gray fntbld">@lang('common.withdraw.Tips')</h5>
                                <p class="t-gray">@lang('common.withdraw.You can check your previous Withdraw in') <a
                                        href="{{ url('withdrawhistory/' . $currency) }}" target='_blank'
                                        class="tblue"><u>@lang('common.Withdraw History') </u></a></p>
                            </div>

                        </div>
                    </div>

                    <div class="bckbtn text-center">
                        <a href="{{ url('wallet') }}" class="btn sitebtn btn-sm"><i class="fa fa-arrow-left"></i>
                            @lang('common.withdraw.Back') </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
    @include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')

<script>
    $("body").addClass("inner-page");
</script>
<script type="text/javascript">
    $('#withdraw_amount').on('keyup', function() {
        var withdraw_amount = $("#withdraw_amount").val();
        var pair = $("#coin").val();
        var withdraw_commission = $('#withdraw_commission').val();
        var withdraw_admin_fee = $('#withdraw_admin_fee').val();
        var net_fee = $('#net_fee').val();
        var total = '';


        if (withdraw_amount != 0 && withdraw_amount) {

            if (withdraw_admin_fee > 0) {
                withdraw_fee = withdraw_amount * withdraw_commission;

            } else {
                withdraw_fee = 0;
            }

            total = parseFloat(withdraw_amount) - parseFloat(withdraw_fee);
            if (pair == 'KES') {
                if (isNaN(total)) {
                    $('#total_withdraw_fee').html("Withdraw Fee: 0.00 " + pair +
                        " <br /> Transferred Amount: 0.00 " + pair);
                    $('#total_withdraw_amount').val("0.00");
                    $('#total_withdraw_fees').val("0.00");
                } else {

                    total = parseFloat(total).toFixed(2);
                    withdraw_fee = parseFloat(withdraw_fee).toFixed(2);
                    $('#total_withdraw_fee').html("Withdraw Fee: " + withdraw_fee + " " + pair +
                        " <br /> Transferred Amount: " + total + " " + pair);
                    $('#total_withdraw_amount').val(total);
                    $('#total_withdraw_fees').val(withdraw_fee);
                }
            } else {
                if (isNaN(total)) {
                    $('#total_withdraw_fee').html("Withdraw Fee: 0.00 " + pair +
                        " <br /> Transferred Amount: 0.00 " + pair);
                    $('#total_withdraw_amount').val("0.00");
                    $('#total_withdraw_fees').val("0.00");
                } else {

                    total = parseFloat(total).toFixed(2);
                    withdraw_fee = parseFloat(withdraw_fee).toFixed(2);
                    $('#total_withdraw_fee').html("Withdraw Fee: " + withdraw_fee + " " + pair +
                        " <br /> Transferred Amount: " + total + " " + pair);
                    $('#total_withdraw_amount').val(total);
                    $('#total_withdraw_fees').val(withdraw_fee);
                }
            }
        }

    });
    $('#withdraw_amount').on('change', function() {
        var withdraw_amount = $("#withdraw_amount").val();
        var pair = $("#coin").val();
        var withdraw_commission = $('#withdraw_commission').val();
        var withdraw_admin_fee = $('#withdraw_admin_fee').val();
        var net_fee = $('#net_fee').val();
        var total = '';


        if (withdraw_amount != 0 && withdraw_amount) {

            if (withdraw_admin_fee > 0) {
                withdraw_fee = withdraw_amount * withdraw_commission;

            } else {
                withdraw_fee = 0;
            }

            total = parseFloat(withdraw_amount) - parseFloat(withdraw_fee);
            if (pair == 'KES') {
                if (isNaN(total)) {
                    $('#total_withdraw_fee').html("Withdraw Fee: 0.00 " + pair +
                        " <br /> Transferred Amount: 0.00 " + pair);
                    $('#total_withdraw_amount').val("0.00");
                    $('#total_withdraw_fees').val("0.00");
                } else {

                    total = parseFloat(total).toFixed(2);
                    withdraw_fee = parseFloat(withdraw_fee).toFixed(2);
                    $('#total_withdraw_fee').html("Withdraw Fee: " + withdraw_fee + " " + pair +
                        " <br /> Transferred Amount: " + total + " " + pair);
                    $('#total_withdraw_amount').val(total);
                    $('#total_withdraw_fees').val(withdraw_fee);
                }
            } else {
                if (isNaN(total)) {
                    $('#total_withdraw_fee').html("Withdraw Fee: 0.00 " + pair +
                        " <br /> Transferred Amount: 0.00 " + pair);
                    $('#total_withdraw_amount').val("0.00");
                    $('#total_withdraw_fees').val("0.00");
                } else {

                    total = parseFloat(total).toFixed(2);
                    withdraw_fee = parseFloat(withdraw_fee).toFixed(2);
                    $('#total_withdraw_fee').html("Withdraw Fee: " + withdraw_fee + " " + pair +
                        " <br /> Transferred Amount: " + total + " " + pair);
                    $('#total_withdraw_amount').val(total);
                    $('#total_withdraw_fees').val(withdraw_fee);
                }
            }
        }

    });
</script>
<script>
    $('#bankname').on('change', function(e) {
        var bank_name = $('#bankname').val();
        $.ajax({
            url: '{{ url('bankdropdown') }}',
            data: {
                bank_name: bank_name
            },
            dataType: "json",
            success: function(data) {
                if (data.account_number) {
                    $('#accountno').val(data.account_number);

                } else {
                    $('#accountno').val('');
                }
            }
        });

    });
</script>
