@include('inc.homeheader')
@include('inc.homemenu')
	<article>
	<section class="innerpagecont">
			<div class="container">		
			<h2 class="heading-title text-center">CONTACT US</h2>		
			<br/>	
				<div class="formcontentbox">
					                       <form accept-charset="UTF-8" id="theform" role="form" method="POST" action="{{ url('/contactsave') }}" autocomplete="off" class="site-form form-panel">

                            @if ($message = Session::get('contactmsg'))
                    <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                    </div>
                @endif
                    <br style="clear:both">
                {{ csrf_field() }}
							<div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
									<label>Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
								                 <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="">
                                           
                                  </div>
                                       @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong class="text text-danger">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
								</div>
                                </div>
								    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email ID <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="" value="" onkeyup="ValidateEmail(this)">
                    <span id="invalidmail" class="help-block" style="display: none;">You have entered an invalid email address!</span>
               
                                    </div>
                                         @if ($errors->has('email'))
                    <span class="help-block">
                    <strong class="text text-danger">{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                                                                <input type="text" class="form-control" id="subject" name="subject"   value="{{ old('subject') }}" >
                
                                    </div>
                                        @if ($errors->has('subject'))
                <span class="help-block">
                <strong class="text text-danger">{{ $errors->first('subject') }}</strong>
                </span>
                @endif
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                                                        <input type="text" class="form-control" id="mobile" name="phone" placeholder="" value="{{ old('phone') }}" onkeyup="if (/[^0-9.]/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')">
                                  </div>
                                      @if ($errors->has('phone'))
                <span class="help-block">
                <strong class="text text-danger">{{ $errors->first('phone') }}</strong>
                </span>
                @endif
                      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message<span class="text-danger">*</span></label>
                                        <div class="input-group">
                             
                                <textarea class="form-control" type="textarea" id="message" placeholder="" style="height:150px" name="Message" >{{ old('Message') }}</textarea>
                 
                                    </div>
                                       @if ($errors->has('Message'))
                <span class="help-block">
                <strong class="text text-danger">{{ $errors->first('Message') }}</strong>
                </span>
                @endif
                                    </div>
                                </div>
                            </div>
								<div class="form-group text-center">
										<input type="submit" class="text-uppercase btn bluebtn" value="SEND MESSAGE">
								</div>
							</form>
						</div>
			</div>
		</section>
	</artticle>

@include('inc.homefooter')
<script>
	$("body").addClass("innerpagebg");
</script>
	<script>


    function ValidateEmail(inputText)
{

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
    if(inputText.value != "")
    {
        if(inputText.value.match(mailformat))
        {
            $('#invalidmail').hide();
            $('.m-btn').show();
        document.form1.text1.focus();
        return true;
        }
        else
        {
        $('#invalidmail').show();
        $('.m-btn').hide()
        document.form1.text1.focus();
        return false;
        }
    }
    else
    {
        $('#invalidmail').hide();
         $('.m-btn').show();
    }

}   

      $(function()
  {
    $('#theform').submit(function(){
      $("input[type='submit']", this)
        .val("Please Wait...")
        .attr('disabled', 'disabled');
      return true;
    });
  }); 
</script>