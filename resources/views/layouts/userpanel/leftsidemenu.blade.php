<div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
  <ul class="list-unstyled components">
      <li><a href="{{ route('wallet') }}" class="@if(request()->route()->named('wallet') || request()->route()->named('walletdeposits') || request()->route()->named('walletwithdraw')) active @endif"><img
                  src="{{ url('userpanel/images/wallet1.svg') }}" />
              <div>Spot Wallet</div>
          </a></li>
      <li><a href="{{ route('openorders') }}" class="@if(request()->route()->named('openorders')) active @endif"/><img
              src="{{ url('userpanel/images/orderhistory.svg') }}" />
          <div>Open Orders</div></a>
      </li>
      <li><a href="{{ route('orderhistory') }}" class="@if(request()->route()->named('orderhistory')) active @endif"><img
                  src="{{ url('userpanel/images/order.svg') }}" />
              <div>Order History</div>
          </a></li>
      <li><a href="{{ route('deposithistories') }}" class="@if(request()->route()->named('deposithistories')) active @endif"><img src="{{ url('userpanel/images/deposit.svg') }}" />
              <div>Deposit History</div>
          </a></li>
      <li><a href="{{ route('withdrawhistories') }}" class="@if(request()->route()->named('withdrawhistories')) active @endif"><img
                  src="{{ url('userpanel/images/withdraw1.svg') }}" />
              <div>Withdraw History</div>
          </a></li>
  </ul>
</div>