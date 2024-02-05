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
                    <h2 class="heading-box">M-PESA Withdraw</h2>

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
                        @if(session()->has('bank_success_response'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>@lang('common.Success')!</strong> {{ session()->get('bank_success_response') }}
						</div>
						@endif


                        <div class="">
                            <form id="msform" class="siteformbg" method="POST"
                                action="{{ route('tinywithdrawvalidation') }}" autocomplete="off">
                                @csrf

                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name<span class="t-red"> *</span></label>
                                                <input type="text" class="form-control" name="Name">
                                                @if ($errors->has('Name'))
                                                    <span class="help-block">
                                                        <strong
                                                            class="text text-danger">{{ $errors->first('Name') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Amount<span class="t-red"> *</span></label>
                                                <input type="text" class="form-control" name="Amount">
                                                <a href="#" data-toggle="modal" data-target="#tinypesahelp">Help <i class="fa fa-question-circle"></i></a></li>
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
                                                <a href="#" data-toggle="modal" data-target="#tinypesamobilehelp">Help <i class="fa fa-question-circle"></i></a></li>
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
                             <h2 class="fs-title text-right mb-4"><img
                                            src="{{ url('userpanel/images/tinypesa.png') }}" width="75" height="75">
                                    </h2>
                                    @if (count($bankdetail) == 0)
                                    {{-- <a href="{{ url('withdraw/KES') }}" >ADD BANK</a> --}}
                                    <a href="" class="btn sitebtn borderbtn" id="create_record" data-toggle="modal" data-target="#addbank">ADD BANK</a><br><br>
                                    {{-- <div class="alert alert-danger">
                                        <p style="font-size: 15px;">@lang('common.Please fill your bank details in profile')!<a href="{{ url('/bank') }}"
                                                style="font-size: 15px;"><u> @lang('common.Click Here')</u></a>
                                        </p>
                                    </div> --}}
                                @endif
                            <a href="{{ url('withdraw/KES') }}" >BANK DETAILS</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </article>
<div class="modal fade modalbgt" id="tinypesahelp">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">mPESA Description</h4>
                <button type="submit" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
					{{$description->mpisa_description_withdraw}}	
				</div>               
            </div>
        </div>
    </div>

</div>

<div class="modal fade modalbgt" id="tinypesamobilehelp">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">mPESA Description</h4>
                <button type="submit" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
					{{$description->mpisa_mobile_description_withdraw}}	
				</div>               
            </div>
        </div>
    </div>

</div>
    @include('layouts.userpanel.footermenu')
</div>
@include('layouts.userpanel.footer')

<div class="modal fade modalbgt" id="addbank">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Bank</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
        <form class="siteformbg" id="bank_form" autocomplete="off">
                      @csrf					
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>@lang('common.addbankdetails.bankname')</label>
                          <input type="text" name="bank_name" id="bank_name" class="form-control" required></div>
                                  <span class="text-danger" id="error_bank_name"></span>
                              </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Account No</label>
                                          <input type="text" name="account_no" id="account_no" class="form-control" required/></div>
                                  <span class="text-danger" id="error_account_no"></span>
                              </div>
                          </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Swift Code</label>
                                          <input type="text" name="swift_code" id="swift_code" class="form-control" required/> </div>
                                          <span class="text-danger" id="error_swift_code"></span>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Bank Nationlity</label>
                                          <select name="countrydata" id="countrydata" class="form-control" required>
                                                      @if($user->country != '')
                                                      <option value="">Select your country</option> 
                                                      @foreach($country as $countrys)
                                                      <option @if($countrys->id == $user->country ) selected @endif>{{ $countrys->name }}</option> 
                                                      @endforeach  
                                                      @else
                                                      @php
                                                          $defaultcountry=old('country'); 
                                                      if($defaultcountry == '')
                                                      $defaultcountry='230';   
                                                      @endphp
                                                      <option value="">Select your country</option> 
                                                      @foreach($country as $countrys)
                                                      <option @if($countrys->id == $defaultcountry) selected @endif>{{ $countrys->name }}</option> 
                                                      @endforeach   
                                                      @endif 
                                                        </select>
                                      </div>
                                      <span class="text-danger" id="error_countrydata"></span>
                                  </div>
                              </div>
                              <div class="form-group mt-2 text-center">
                                  <input type="hidden" id="hidden_id" name="hidden_id"/>
                                  <input type="button" class="btn sitebtn" id="action_button" value="Add Bank" onclick="BankDetail();" />
                          </form>
        </div>     
      </div>
    </div>
  </div>

<script>
    $(document).ready(function(){

$('#create_record').click(function(){
 document.getElementById("bank_form").reset();
 $('.modal-title').text("Add Bank");
 $('#action_button').val("Add Bank");
 $('.text-danger').html('');
});

$('#edit').click(function(){
 $('.modal-title').text("Update Bank");
    $('#action_button').val("Update Bank");
});

$('#delete').click(function(){
 $('#myModalLabel').text("Delete Bank");
});

});

$(document).on('click', '#edit', function(){
 var id = $(this).attr('data-id');
 $.ajax({
  url:"bankDetail/"+id,
  method:'get',
  dataType:"json",
  success:function(html){
   $('#addbank').modal('toggle');
   $('#bank_name').val(html.bank.bank_name);
   $('#account_no').val(html.bank.account_no);
   $('#swift_code').val(html.bank.swift_code);
   $('#countrydata').val(html.bank.countrydata);
   $('#hidden_id').val(html.bank.id);
   $('.modal-title').text("Update Bank");
   $('#action_button').val("Update");
   $('.text-danger').html('');
  }
 })
});

</script>

<script>

function BankDetail() {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
type: "post",
url: "{{ url('addupdateBank') }}",
dataType: "json",
data: $('#bank_form').serialize(),
success: function(data) {

 if (data.status == 'success') {
        $('.loader').hide();
        // window.location.href = "{{url('bank')}}";
        window.location.href = "{{url('/tinypesawithdraw')}}";


    } else {
        $('.loader').hide();
        if (data.msg.bank_name != '' && data.msg.bank_name != undefined)
            $('#error_bank_name').html(data.msg.bank_name);
        else
            $('#error_bank_name').html('');
            
        if (data.msg.account_no != '' && data.msg.account_no != undefined)
            $('#error_account_no').html(data.msg.account_no);
        else
            $('#error_account_no').html('');

        if (data.msg.swift_code != '' && data.msg.swift_code != undefined)
            $('#error_swift_code').html(data.msg.swift_code);
        else
            $('#error_swift_code').html('');


        if (data.msg.countrydata != '' && data.msg.countrydata != undefined)
            $('#error_countrydata').html(data.msg.countrydata);
        else
            $('#error_countrydata').html('');

    }
}
});
return false;

}
</script>
