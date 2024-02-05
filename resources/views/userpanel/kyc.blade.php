@include('layouts.userpanel.header')

<div class="pagecontent gridpagecontent innerpagegrid">
    @include('layouts.userpanel.headermenu')
    <div class="leftsidemenu sidebar" id="sidebar" data-simplebar>
        <ul class="list-unstyled components">
            <li><a href="{{ route('profile') }}"><img src="{{ url('userpanel/images/profile1.svg') }}" />
                    <div>Profile</div>
                </a></li>
            <li><a href="{{ route('setting') }}"><img src="{{ url('userpanel/images/security1.svg') }}" />
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
        <div class="container sitecontainer">
            <div class="kyccenterbox">
                <div class="panelcontentbox">
                    <h2 class="heading-box">KYC Verification</h2>
                    <div class="contentbox">
                        <div class="kycboxleft">
                            @if (session('kycstatus'))
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert"
                                        aria-label="close">&times;</a>
                                    {{ session('kycstatus') }}
                                </div>
                            @endif

                            @if (session('kycerror'))
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert"
                                        aria-label="close">&times;</a>
                                    {{ session('kycerror') }}
                                </div>
                            @endif
                            <div class="mlmwizardform">
                                <form id="msform" class="siteformbg" method="POST"
                                    action="{{ route('uploadkyc') }}" enctype="multipart/form-data"
                                    autocomplete="off">
                                    @csrf
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong>Level 1</strong></li>
                                        <li id="personal"><strong>Level 2</strong></li>
                                    </ul>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Personal Information</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name<span class="t-red"> *</span></label>
                                                        <input type="text" class="form-control" name="first_name"
                                                            value="@if (isset($Kycstatus->fname)){{ $Kycstatus->fname }}@else{{ old('first_name') }}@endif">
                                                        @if ($errors->has('first_name'))
                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('first_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name<span class="t-red"> *</span></label>
                                                        <input type="text" class="form-control" name="last_name"
                                                            value="@if (isset($Kycstatus->lname)){{ $Kycstatus->lname }}@else{{ old('last_name') }}@endif">
                                                        @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth<span class="t-red">
                                                                *</span></label>
                                                        <div class="input-group dateinput">
                                                            <input type="text" class="form-control" name="dob"
                                                                value="@if (isset($Kycstatus->dob)){{ $Kycstatus->dob }}@else{{ old('dob') }}@endif">
                                                            <div class="input-group-append" data-toggle="datepicker1"
                                                                data-target-name="dob">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('dob'))
                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('dob') }}</strong>
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City<span class="t-red"> *</span></label>
                                                        <input type="text" class="form-control" name="city"
                                                            value="@if (isset($Kycstatus->city)){{ $Kycstatus->city }}@else{{ old('city') }}@endif">
                                                        @if ($errors->has('city'))
                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('city') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address<span class="t-red"> *</span></label>
                                                        <textarea name='address' class="form-control" rows="4">@if(isset($Kycstatus->address)){{ $Kycstatus->address }}@else{{ old('address') }}@endif</textarea>
                                                        @if ($errors->has('address'))
                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="button" name="next" class="next action-button sitebtn"
                                            value="Next">
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">ID Proof Details</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ID document type<span class="t-red">
                                                                *</span></label>
                                                        <select class="form-control" name="id_type" id="id_type">
                                                            <option value="">Select ID Type</option>
                                                            <option value="Passport"
                                                                {{ isset($Kycstatus->id_type) && $Kycstatus->id_type == 'Passport' || old("id_type") == "Passport" ? 'selected' : '' }}>
                                                                Passport</option>
                                                            <option value="National ID" id="nat"
                                                                {{ isset($Kycstatus->id_type) && $Kycstatus->id_type == 'National ID' || old("id_type") == "National ID" ? 'selected' : '' }}>
                                                                National ID</option>
                                                            <option value="Driving Licence"
                                                                {{ isset($Kycstatus->id_type) && $Kycstatus->id_type == 'Driving Licence' || old("id_type") == "Driving Licence" ? 'selected' : '' }}>
                                                                Driver's Licence</option>
                                                        </select>
                                                        @if ($errors->has('id_type'))
                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('id_type') }}</strong>
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ID document number<span class="t-red">
                                                                *</span></label>
                                                        <input type="text" class="form-control" name="id_number"
                                                            placeholder="Enter ID Document Number"
                                                            value="@if (isset($Kycstatus->id_number)){{ $Kycstatus->id_number }}@else{{ old('id_number') }}@endif">
                                                        @if ($errors->has('id_number'))
                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('id_number') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">


                                                <div class="col-md-6">
                                                    <div class="form-group kycupload">
                                                        <label>Proof of address <span
                                                                class="t-red">*</span></label>
                                                        <br><img id="doc4" src="@if (isset($Kycstatus->proofpaper)){{ $Kycstatus->proofpaper }}@else{{ asset('images/back.svg') }}@endif"
                                                            class="img-responsive">
                                                        <br>
                                                        <label for="file-upload3"
                                                            class="custom-file-upload customupload">Upload
                                                            here..</label>
                                                        <input id="file-upload3" name="proof_upload_id"
                                                            class="proof_upload_id" type="file" style="display:none">
                                                        <div>
                                                            <label id="file-name3" class="customupload3"></label>
                                                        </div>
                                                        <div>
                                                            @if ($errors->has('proof_upload_id'))
                                                                <span class="help-block">
                                                                    <strong
                                                                        class="text text-danger">{{ $errors->first('proof_upload_id') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6" id="exp">
                                                    <div class="form-group">
                                                        <label>Expiry Date <span class="t-red">
                                                                *</span></label>
                                                        <div class="input-group dateinput">
                                                            <input type="text" class="form-control" name="id_exp"
                                                                value="@if (isset($Kycstatus->id_exp)){{ $Kycstatus->id_exp }}@else{{ old('id_exp') }}@endif">
                                                            <div class="input-group-append" data-toggle="datepicker2"
                                                                data-target-name="id_exp">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('id_exp'))

                                                            <span class="help-block">
                                                                <strong
                                                                    class="text text-danger">{{ $errors->first('id_exp') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group kycupload">
                                                        <label>ID Front Document<span
                                                                class="t-red">*</span></label>
                                                        <br><img id="doc2" src="@if (isset($Kycstatus->front_img)){{ $Kycstatus->front_img }}@else{{ asset('images/front.svg') }}@endif"
                                                            class="img-responsive">
                                                        <br>
                                                        <label for="file-upload1"
                                                            class="custom-file-upload customupload">Upload
                                                            here..</label>
                                                        <input id="file-upload1" name="front_upload_id"
                                                            class="front_upload_id" type="file" style="display:none">
                                                        <div>
                                                            <label id="file-name1" class="customupload1"></label>
                                                        </div>
                                                        <div>
                                                            @if ($errors->has('front_upload_id'))
                                                                <span class="help-block">
                                                                    <strong
                                                                        class="text text-danger">{{ $errors->first('front_upload_id') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group kycupload">
                                                        <label>ID Back Document <span
                                                                class="t-red">*</span></label>
                                                        <br><img id="doc3" src="@if (isset($Kycstatus->back_img)){{ $Kycstatus->back_img }}@else{{ asset('images/back.svg') }}@endif"
                                                            class="img-responsive">
                                                        <br>
                                                        <label for="file-upload2"
                                                            class="custom-file-upload customupload">Upload
                                                            here..</label>
                                                        <input id="file-upload2" name="back_upload_id"
                                                            class="back_upload_id" type="file" style="display:none">
                                                        <div>
                                                            <label id="file-name2" class="customupload2"></label>
                                                        </div>
                                                        <div>
                                                            @if ($errors->has('back_upload_id'))
                                                                <span class="help-block">
                                                                    <strong
                                                                        class="text text-danger">{{ $errors->first('back_upload_id') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="previous"
                                            class="previous action-button-previous sitebtn" value="Previous">
                                        @if (!isset($Kycstatus->fname))
                                            <input type="submit" id="kycbtn" name="next"
                                                class="next action-button sitebtn" value="Submit">
                                        @endif
                                    </fieldset>
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

<script>
    $(document).ready(function() {
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        $(".next").click(function() {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });
        $(".previous").click(function() {
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });
        $('.radio-group .radio').click(function() {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });
        $(".submit").click(function() {
            return false;
        })
    });

    $(".front_upload_id").change(function() {
        var limit_size = 2097152;
        var photo_size = this.files[0].size;
        if (photo_size > limit_size) {
            $("#kycbtn").attr('disabled', true);
            $('.front_upload_id').val("");
            alert('Image Size Larger than 2MB');
            $('#doc2').attr('src', "{{ url('/images/front.svg') }}");
            $("#file-name1").text('');
        } else {
            $(".front_upload_id").text(this.files[0].name);
            $("#kycbtn").attr('disabled', false);
            var file = document.getElementById('file-upload1').value;
            var ext = file.split('.').pop();
            switch (ext) {
                case 'jpg':
                case 'JPG':
                case 'Jpg':
                case 'jpeg':
                case 'JPEG':
                case 'Jpeg':
                case 'png':
                case 'PNG':
                case 'Png':
                    readURLvalida(this);
                    break;
                default:
                    alert('Upload your profile like jpg, png & jpeg');
                    $('#doc2').attr('src', "{{ url('/images/front.svg') }}");
                    $("#file-name1").text('');
                    break;
            }
        }
    });



    $(".back_upload_id").change(function() {
        var limit_size = 2097152;
        var photo_size = this.files[0].size;
        if (photo_size > limit_size) {
            $("#kycbtn").attr('disabled', true);
            $('.back_upload_id').val('');
            alert('Image Size Larger than 2MB');
            $('#doc3').attr('src', "{{ url('/images/back.svg') }}");
            $("#file-name2").text('');
        } else {
            $(".back_upload_id").text(this.files[0].name);
            $("#kycbtn").attr('disabled', false);

            var file = document.getElementById('file-upload2').value;
            var ext = file.split('.').pop();
            switch (ext) {
                case 'jpg':
                case 'JPG':
                case 'Jpg':
                case 'jpeg':
                case 'JPEG':
                case 'Jpeg':
                case 'png':
                case 'PNG':
                case 'Png':
                    readURLvalida_back(this);
                    break;
                default:
                    alert('Upload your profile like jpg,png & jpeg');
                    $('#doc3').attr('src', "{{ url('/images/back.svg') }}");
                    $("#file-name2").text('');
                    break;
            }
        }
    });



    $(".proof_upload_id").change(function() {
        var limit_size = 2097152;
        var photo_size = this.files[0].size;
        if (photo_size > limit_size) {
            $("#kycbtn").attr('disabled', true);
            $('.proof_upload_id').val('');
            alert('Image Size Larger than 2MB');
            $('#doc4').attr('src', "{{ url('/images/back.svg') }}");
            $("#file-name3").text('');
        } else {
            $(".proof_upload_id").text(this.files[0].name);
            $("#kycbtn").attr('disabled', false);

            var file = document.getElementById('file-upload3').value;
            var ext = file.split('.').pop();
            switch (ext) {
                case 'jpg':
                case 'JPG':
                case 'Jpg':
                case 'jpeg':
                case 'JPEG':
                case 'Jpeg':
                case 'png':
                case 'PNG':
                case 'Png':
                    readURLvalida_proof(this);
                    break;
                default:
                    alert('Upload your profile like jpg,png & jpeg');
                    $('#doc4').attr('src', "{{ url('/images/back.svg') }}");
                    $("#file-name3").text('');
                    break;
            }
        }
    });

    function readURLvalida(input) {
        var limit_size = 2097152;
        var photo_size = input.files[0].size;
        if (photo_size > limit_size) {
            alert('Image size larger than 2MB');
        } else {
            if (input.files && input.files[0]) {
                $("#file-name1").text(input.files[0].name);
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#doc2').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }


    function readURLvalida_back(input) {
        var limit_size = 2097152;
        var photo_size = input.files[0].size;
        if (photo_size > limit_size) {
            alert('Image size larger than 2MB');
        } else {
            if (input.files && input.files[0]) {
                $("#file-name2").text(input.files[0].name);
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#doc3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    function readURLvalida_proof(input) {
        var limit_size = 2097152;
        var photo_size = input.files[0].size;
        if (photo_size > limit_size) {
            alert('Image size larger than 2MB');
        } else {
            if (input.files && input.files[0]) {
                $("#file-name3").text(input.files[0].name);
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#doc4').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
</script>

<script>
    $('#id_type').change(function() {
        if (($(this).val() == "Passport") || ($(this).val() == "Driving Licence") || ($(this).val() ==
                "s"))
            $('#exp').show();
        else
            $('#exp').hide();
    }).trigger("change");
</script>
