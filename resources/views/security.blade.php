@include('inc.header')
<header class="innerheader">
  @include('inc.menu')
</header>   



<article>

<div class="pagecontent">
    <section class="innerpagecontent">
    <div class="container site-container">
  <div class="row justify-content-md-center">
  <div class="col-md-8 center-content">



   
  <div class="page-title-section">
   @lang('common.security')
  </div>


  <div class="content-section pad-t-0">

  <div class="small-title small row">
  @lang('common.2Factortxt') 
  </div>
  <div class="div-content enable">

    @if($user->email_verify == 1)
        @php
        $style = "green-box";
        $text = "Verified";
        $icon = "fa-check";
        @endphp
        @else
        @php
        $style = "red-box";
        $text = "Not Verified";
        $icon = "fa-times";
        @endphp
    @endif


      <div class="divider-box">
      <div class="icon"><img src="{{ url('images/email.svg') }}"></div>
      <div class="name-t">@lang('common.Email Authentication')
       <div class="text-capitalize"><small>@lang('common.EmailAuthtxt')</small></div>
      </div>
      @if($user->email_verify == 1)
      <div class="status-info">
        <input type="button&quot;" value="{{ $text }}" class="btn def-btn m-btn" readonly="">
      </div>
      @endif
      </div>

        @if($user->twofa != NULL && $user->twofa_status == 1)          
          @php
            $style = "grey-box";
            $text = "Verified";
            $icon = "fa-check";
            $link = "#";
            $text_color = "t-green";
          @endphp
        @else
          @php
            $style = "red-box";
            $text = "Not Verified";
            $icon = "fa-times";
            $link = "2faverification";
            $text_color = "t-red";
          @endphp
        @endif

      <div class="divider-box">
      <div class="icon"><img src="{{ url('images/google-auth.svg') }}"></div>
      <div class="name-t">@lang('common.2faverification')
      <div class="text-capitalize"><small>@lang('common.GoogleAuthtxt')</small></div>
      </div>
      <div class="status-info">
      @if($user->twofa == NULL)
       <a href="{{ url($link) }}" class="btn def-btn m-btn">{{ $text }}</a>
      @else
      <input type="button&quot;" value="{{ $text }}" class="btn def-btn m-btn" readonly="">
      @endif
      </div>
      </div>

        @php $remark = ""; @endphp
        @if($user->kyc_verify == 1)
        @php
        $style = "grey-box";
        $text = "Verified";
        $icon = "fa-check";
        $link = "#";
        $text_color = "t-green";
        $remark  = '';
        @endphp
        @elseif($user->kyc_verify == 2)
        @php
        $style = "blue-box";
        $text = "Kyc Waiting";
        $icon = "fa-check";
        $link = "#";
        $text_color = "t-red";
        $remark  = '';
        @endphp
        @else 
        @php
        $style = "red-box";
        $text = "Not Verified";
        $icon = "fa-times";
        $link = "sumsubkyc";
        $text_color = "t-red";
        $remark  = '';
        @endphp
        @endif
        @if(is_object($kyc_data) && $kyc_data->status == 2)
        @php
        $style = "blue-box";
        $text = "Admin Rejected";
        $icon = "fa-times";
        $link = "sumsubkyc";
        $text_color = "t-red";
        $remark  = $kyc_data->remark;
        @endphp
        @endif


      <div class="divider-box">
      <div class="icon"><img src="{{ url('images/mobile1.svg') }}"></div>
      <div class="name-t">@lang('common.ID Verification')
       <div class="text-capitalize"><small>@lang('common.IDVeritxt')</small></div></div>
      <div class="status-info statusinfotag">
        <div class="tagtnotes">
        @if(is_object($kyc_data) && $kyc_data->status == 2)
        
		<a href="{{ url($link) }}" class="btn def-btn m-btn">{{ $text }}</a>
        <div class="tagtitle"><i class="fa fa-bell" aria-hidden="true"></i>
        <div class="titleshowbox">		
       <p>{{ $remark }}</p>
        </div>      
        </div>
      
        @else
        <a href="{{ url($link) }}" class="btn def-btn m-btn">{{ $text }}</a>

        @endif
		</div>


      </div>
      </div>
      @if($user->twofa != NULL)
    @if($kyc_enable == 0)
    <div class="skipbg">
    <a href="{{ url('/profile') }}" class="skipbtn">@lang('common.Skip Kyc')</a>
    </div>
    @endif
    @endif

     
     
      </div>
  
  
  </div>
  </div>
  </div>
  </div>
    </div>
    </section>
</div>


</article>

@include('inc.footer')
