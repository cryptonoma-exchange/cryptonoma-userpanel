@include('layouts.userpanel.header')
<div class="pagecontent gridpagecontent innerpagegrid">
    @include('layouts.userpanel.headermenu')
    @include('layouts.userpanel.leftsidemenu')

    <article class="gridparentbox">
        <div class="container sitecontainer">
            @if (session('error'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('error') }}
            </div>
            @endif
            <div class="panelcontentbox wlletboxt">
                <h2 class="heading-box">Spot Wallet </h2>
                <div class="contentboxspace">
                    <div class="tablebox">
                        <div class="balanceshowt wlletpwdbg">
                            <div>
                                <h5 class="t-gray">
                                    Estimated Value <span class="showpassbg" id="fa fa-eye"><i class="fa fa-eye" id="i"></i></span> 
                                    <span class="showpassbg2" id="fa fa-eye-slash"><i class="fa fa-eye-slash i_slash"></i></span>
                                </h5>
                                <span id="kesusdval" style="display: none">
                                    <input type="radio" id="kes" name="totalval" value="kes" checked="checked">
                                    <label for="kes">KES</label>
                                    <input type="radio" id="usd" name="totalval" value="usd">
                                    <label for="usd">USD</label><br>
                                    <h4 class="usdval">{{ $balanceInUsd }} USD</h4>
                                    <h4 class="kesval"> {{ $balanceInKes }} KES</h4>
                                </span>
                                <span class="i_slash" style="display: none">XXXXXXXXXXXX</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive sitescroll" data-simplebar>
                <table class="table sitetable table-responsive-stack" id="table1">
                        <thead>
                            <tr>
                                <th>Coin</th>
                                <th>Name</th>
                                <th>Balance</th>
                                <th>Escrow</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coins as $coin)
                                <tr>
                                    <td class="coinnamesearch"><img
                                        src="{{ url('userpanel/images/color/' . strtolower($coin->source) . '.svg') }}"
                                        class="coinlisticon">{{ $coin->source }}</td>

                                    <td class="coinnamesearch1">{{ $coin->coinname }}</td>
                                    <td>
                                        <span style="display:none;" class="dval">
                                            <span>{{ $coin->wallet_balance }} {{$coin->source}}</span>
                                            <br/>
                                            <span class="usdval" style="display:none;">{{ $coin->wallet_balance_in_usd }} USD</span>
                                            <span class="kesval" style="display:none;">{{ $coin->wallet_balance_in_kes }} KES</span>
                                        </span>
                                        <span class="i_slash" style="display: none">XXXXXXXXXXXX</span>
                                    </td>
                                    <td><span style="display:none;" class="dval">{{ $coin->escrow_balance }} {{$coin->source}}</span><span class="i_slash" style="display: none">XXXXXXXXXXXX</span></td>
                                    <td>
                                        <a href="{{ url('deposit/' . $coin->source) }}"
                                            class="btn btn-sm green-btn mr-1">@lang('common.wallet.deposit')</a>
                                        <a href="{{ url('withdraw/' . $coin->source) }}"
                                            class="btn btn-sm red-btn">@lang('common.wallet.withdraw')</a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
    @include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')



<script>
    $(document).ready(function() {
        var activeSystemClass = $('.list-group-item.active');
        $('#system-search').keyup(function() {
            var that = this;
            var tableBody = $('.table-list-search tbody');
            var tableRowsClass = $('.table-list-search tbody tr').find("td").eq(2);
            $('.search-sf').remove();
            tableRowsClass.each(function(i, val) {
                var rowText = $(val).text().toLowerCase();
                var inputText = $(that).val().toLowerCase();
                if (inputText != '') {
                    $('.search-query-sf').remove();
                } else {
                    $('.search-query-sf').remove();
                }
                if (rowText.indexOf(inputText) == -1) {
                    tableRowsClass.eq(i).parent().hide();
                } else {
                    $('.search-sf').remove();
                    tableRowsClass.eq(i).parent().show();
                }
            });
            if (tableRowsClass.children(':visible').length == 0) {
                tableBody.append(
                    '<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>'
                );
            }
        });

    });
</script>
<script>
    $(document).ready(function() {

        $(".kesval").show();

        $("#usdval").hide();
        $("#i").hide();
        $(".i_slash").show();

        $("#i").click(function() {
            $("#kesusdval").toggle();
            $("#i").hide();
            $(".i_slash").show();
            $('.dval').hide();
        });

        $(".i_slash").click(function() {
            $("#kesusdval").toggle();
            $(".i_slash").hide();
            $("#i").show();
            $('.dval').show();
        });
    });
</script>

<script>
    $(document).ready(function() {

        $("input[name=totalval]").change(function() {
            if ($("#kes").is(':checked')) {
                $(".kesval").show();
                $(".usdval").hide();
            } else if ($("#usd").is(':checked')) {
                $(".kesval").hide();
                $(".usdval").show();
            }
        });
    });
</script>
