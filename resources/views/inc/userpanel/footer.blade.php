<script src="{{url('userpanel/js/jquery.min.js')}}"></script>
<script src="{{url('userpanel/js/popper.min.js')}}"></script>
<script src="{{url('userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{url('userpanel/js/simplebar.js')}}"></script>
<script src="{{url('userpanel/js/datepicker.min.js')}}"></script>
<script src="{{url('userpanel/js/bootstrap-slider.js')}}"></script>
<script src="{{url('userpanel/js/custom.js')}}"></script>

<script>

$(document).ready(function()
{
  $(".loader").show();
  setTimeout(function (){
    $('.loader').hide();
    }, 10000);
});

    $(window).scroll(function() 
{    
  var scroll = $(window).scrollTop();  
  if (scroll >= 100) {
    $(".headbg").addClass("darkHeader");
  } 
  else
  {
    $(".headbg").removeClass("darkHeader");
  }
}); 

$(function(){
    $("#sellpagescroll tbody").each(function(elem,index){
      var arr = $.makeArray($("tr",this).detach());
      arr.reverse();
        $(this).append(arr);
    });
});
$('.limitabbg li:first-child a').click(function() 
{
   $("body").removeClass("expandhistoryscroll");
});
$('.limitabbg li:nth-child(2) a').click(function() 
{
    $("body").removeClass("expandhistoryscroll");
});


$( document ).ready(function() {
$(function(){
   var current = location.pathname;
   $('.leftsidemenu ul li a').each(function(){
       var $this = $(this);  
       if(current.indexOf($this.attr('href')) !== -1){      
        $(this).closest('a').addClass('active');
       }else{
        $(this).closest('a').removeClass('active');
     }
   })
})
  }); 


$('.headbg .navbar-toggler').click(function()
{
    $(".sidebar").removeClass('active');
  /*new */  $(".marketlist").removeClass('active');
});
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('.sidebar').toggleClass('active');
        $('body').toggleClass('pagewrapperbox');
        $(".headbg .collapse").removeClass("show");
    });
});

/*new */
$(".buyselltab>li:first-child").click(function()
{
    $(".orderform").addClass("buyorderformactive");
    $(".orderform").removeClass("sellorderformactive");
});
$(".buyselltab>li:nth-child(2)").click(function()
{
    $(".orderform").addClass("sellorderformactive");
    $(".orderform").removeClass("buyorderformactive");
});
$('#sidebarmarketlistCollapse').click(function()
{
    $(".marketlist").addClass('active');
});
$('#closemarketicon').click(function()
{
    $(".marketlist").removeClass('active');
});

$('[data-toggle=datepicker1]').each(function() {
  var target = $(this).data('target-name');
  var t = $('input[name=' + target + ']');
  t.datepicker({
    format: 'dd-mm-yyyy',
    endDate: '-18y',
    autoclose: true
  });
  $(this).on("click", function() {
    t.datepicker("show");
  });
});
$('[data-toggle=datepicker2]').each(function() {
  var target = $(this).data('target-name');
  var t = $('input[name=' + target + ']');
  t.datepicker({
    format: 'dd-mm-yyyy',
    startDate: '-0d',
    autoclose: true
  });
  $(this).on("click", function() {
    t.datepicker("show");
  });
});
$('[data-toggle=datepicker3]').each(function() {
  var target = $(this).data('target-name');
  var t = $('input[name=' + target + ']');
  t.datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
  });
  $(this).on("click", function() {
    t.datepicker("show");
  });
});

$(".back_upload_id").change(function() {
    var limit_size = 2097152;
    var photo_size = this.files[0].size;
    if(photo_size > limit_size){
        $("#kycbtn").attr('disabled',true);
        $('.back_upload_id').val('');
        alert('Image Size Larger than 2MB');
        $('#doc2').attr('src', "{{ url('assets/images/back.svg') }}");
        $("#file-name2").text('');
    }
    else
    { 
        $(".back_upload_id").text(this.files[0].name);
        $("#kycbtn").attr('disabled',false);
        
        var file = document.getElementById('file-upload2').value;
        var ext = file.split('.').pop();
        switch(ext) {
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
                $('#doc2').attr('src', "{{ url('assets/images/back.svg') }}");
                 $("#file-name2").text('');
              break;
        }
    }
});

$(".tax_upload_id").change(function() {
    var limit_size = 2097152;
    var photo_size = this.files[0].size;
    if(photo_size > limit_size){
        $("#kycbtn").attr('disabled',true);
        $('.tax_upload_id').val('');
        alert('Image Size Larger than 2MB');
        $('#doc3').attr('src', "{{ url('assets/images/back.svg') }}");
        $("#file-name3").text('');
    }
    else
    { 
        $(".tax_upload_id").text(this.files[0].name);
        $("#kycbtn").attr('disabled',false);
        
        var file = document.getElementById('file-upload3').value;
        var ext = file.split('.').pop();
        switch(ext) {
              case 'jpg':
              case 'JPG':
              case 'Jpg':
              case 'jpeg':
              case 'JPEG':
              case 'Jpeg':
              case 'png':
              case 'PNG':
              case 'Png':
              readURLSelfievalida(this);
              break;
              default:
                alert('Upload your profile like jpg,png & jpeg');
                $('#doc3').attr('src', "{{ url('assets/images/back.svg') }}");
                 $("#file-name3").text('');
              break;
        }
    }
});

$(".btax_upload_id").change(function() {
    var limit_size = 2097152;
    var photo_size = this.files[0].size;
    if(photo_size > limit_size){
        $("#kycbtn").attr('disabled',true);
        $('.btax_upload_id').val('');
        alert('Image Size Larger than 2MB');
        $('#doc4').attr('src', "{{ url('assets/images/back.svg') }}");
        $("#file-name4").text('');
    }
    else
    { 
        $(".btax_upload_id").text(this.files[0].name);
        $("#kycbtn").attr('disabled',false);
        
        var file = document.getElementById('file-upload3').value;
        var ext = file.split('.').pop();
        switch(ext) {
              case 'jpg':
              case 'JPG':
              case 'Jpg':
              case 'jpeg':
              case 'JPEG':
              case 'Jpeg':
              case 'png':
              case 'PNG':
              case 'Png':
              busreadURLSelfievalida(this);
              break;
              default:
                alert('Upload your profile like jpg,png & jpeg');
                $('#doc3').attr('src', "{{ url('assets/images/back.svg') }}");
                 $("#file-name3").text('');
              break;
        }
    }
});



function readURLvalida_back(input) {
    var limit_size = 2097152;
    var photo_size = input.files[0].size;
    if(photo_size > limit_size){
      alert('Image size larger than 2MB');
  }
  else
  {
    if (input.files && input.files[0]) {
      $("#file-name2").text(input.files[0].name);
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#doc2').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
}



$(".front_upload_id").change(function() {
    var limit_size = 2097152;
    var photo_size = this.files[0].size;
    if(photo_size > limit_size){
      $("#kycbtn").attr('disabled',true);
      $('.front_upload_id').val("");
      alert('Image Size Larger than 2MB');
      $('#doc1').attr('src', "{{ url('assets/images/front.svg') }}");
      $("#file-name1").text('');
    }
    else
    { 
      $(".front_upload_id").text(this.files[0].name);
      $("#kycbtn").attr('disabled',false);        
      var file = document.getElementById('file-upload1').value;
      var ext = file.split('.').pop();
      switch(ext) {
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
        $('#doc1').attr('src', "{{ url('assets/images/front.svg') }}");
        $("#file-name1").text('');
        break;
      }
    }
});


function readURLvalida(input) {
  var limit_size = 2097152;
  var photo_size = input.files[0].size;
  if(photo_size > limit_size){
    alert('Image size larger than 2MB');
  }else{
    if (input.files && input.files[0]) {
      $("#file-name1").text(input.files[0].name);
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#doc1').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
}





// $(".selfie_upload_id").change(function() {
//     var limit_size = 2097152;
//     var photo_size = this.files[0].size;
//     if(photo_size > limit_size){
//       $("#kycbtn").attr('disabled',true);
//       $('.selfie_upload_id').val("");
//       alert('Image Size Larger than 2MB');
//       $('#doc3').attr('src', "{{ url('assets/images/front.svg') }}");
//       $("#file-name3").text('');
//     }
//     else
//     { 
//       $(".selfie_upload_id").text(this.files[0].name);
//       $("#kycbtn").attr('disabled',false);        
//       var file = document.getElementById('file-upload3').value;
//       var ext = file.split('.').pop();
//       switch(ext) {
//         case 'jpg':
//         case 'JPG':
//         case 'Jpg':
//         case 'jpeg':
//         case 'JPEG':
//         case 'Jpeg':
//         case 'png':
//         case 'PNG':
//         case 'Png':
//         readURLSelfievalida(this);
//         break;
//         default:
//         alert('Upload your profile like jpg, png & jpeg');
//         $('#doc3').attr('src', "{{ url('assets/images/front.svg') }}");
//         $("#file-name3").text('');
//         break;
//       }
//     }
// });


function readURLSelfievalida(input) {
  var limit_size = 2097152;
  var photo_size = input.files[0].size;
  if(photo_size > limit_size){
    alert('Image size larger than 2MB');
  }else{
    if (input.files && input.files[0]) {
      $("#file-name3").text(input.files[0].name);
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#doc3').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
}

function busreadURLSelfievalida(input) {
  var limit_size = 2097152;
  var photo_size = input.files[0].size;
  if(photo_size > limit_size){
    alert('Image size larger than 2MB');
  }else{
    if (input.files && input.files[0]) {
      $("#file-name4").text(input.files[0].name);
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#doc4').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
}


$(".address_upload_id").change(function() {
    var limit_size = 2097152;
    var photo_size = this.files[0].size;
    if(photo_size > limit_size){
      $("#kycbtn").attr('disabled',true);
      $('.address_upload_id').val("");
      alert('Image Size Larger than 2MB');
      $('#doc4').attr('src', "{{ url('assets/images/front.svg') }}");
      $("#file-name4").text('');
    }
    else
    { 
      $(".address_upload_id").text(this.files[0].name);
      $("#kycbtn").attr('disabled',false);        
      var file = document.getElementById('file-upload4').value;
      var ext = file.split('.').pop();
      switch(ext) {
        case 'jpg':
        case 'JPG':
        case 'Jpg':
        case 'jpeg':
        case 'JPEG':
        case 'Jpeg':
        case 'png':
        case 'PNG':
        case 'Png':
        readURLAddressvalida(this);
        break;
        default:
        alert('Upload your profile like jpg, png & jpeg');
        $('#doc4').attr('src', "{{ url('assets/images/front.svg') }}");
        $("#file-name4").text('');
        break;
      }
    }
});


function readURLAddressvalida(input) {
  var limit_size = 2097152;
  var photo_size = input.files[0].size;
  if(photo_size > limit_size){
    alert('Image size larger than 2MB');
  }else{
    if (input.files && input.files[0]) {
      $("#file-name4").text(input.files[0].name);
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#doc4').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
}


function readURLvalida_profile(input) {
  var limit_size = 2097152;
  var photo_size = input.files[0].size;
  if(photo_size > limit_size){
    alert('Image size larger than 2MB');
  }else{
    if (input.files && input.files[0]) {
      $("#file-name1").text(input.files[0].name);
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#doc3').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
}




$(".profile_upload_id").change(function() {
    var limit_size = 2097152;
    var photo_size = this.files[0].size;
    if(photo_size > limit_size){
      $("#save_btn").attr('disabled',true);
      $('.profile_upload_id').val("");
      alert('Image Size Larger than 2MB');
      $('#doc3').attr('src', "{{ url('assets/images/front.svg') }}");
      $("#file-name3").text('');
    }
    else
    { 
      $(".profile_upload_id").text(this.files[0].name);
      $("#save_btn").attr('disabled',false);        
      var file = document.getElementById('profile_input_file').value;
      var ext = file.split('.').pop();
      switch(ext) {
        case 'jpg':
        case 'JPG':
        case 'Jpg':
        case 'jpeg':
        case 'JPEG':
        case 'Jpeg':
        case 'png':
        case 'PNG':
        case 'Png':
        readURLvalida_profile(this);
        break;
        default:
        alert('Upload your profile like jpg, png & jpeg');
        $('#doc3').attr('src', "{{ url('assets/images/front.svg') }}");
        $("#file-name3").text('');
        break;
      }
    }
}); 
 
$(document).ready(function() { 

$("#daymode").click(function() {
$("#daymode").addClass("activemode");
$("#nightmode").removeClass("activemode");
$("body").removeClass("nightmode");
$(".tradechartlist iframe").contents().find("body").removeClass("nightmode");
});
$("#nightmode").click(function()
{
$("#nightmode").addClass("activemode");
$("#daymode").removeClass("activemode");
$("body").addClass("nightmode");
$(".tradechartlist iframe").contents().find("body").addClass("nightmode");
})
}); 

var timesRun = 0;
var interval =setInterval(function(){  
  timesRun += 1;
 
  if(timesRun === 400){
        clearInterval(interval);
    }
  var Mode="{{Session::get('mode')}}";  
  if(Mode == 'nightmode'){
    $(".tradechartlist iframe").contents().find("body").addClass("nightmode");
  }else{
    $(".tradechartlist iframe").contents().find("body").removeClass("nightmode");
  }  
  }, 1/100);


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

<script>
  $(document).ready(function() {
    $(".tradechartlist iframe").contents().find("body .layout__area--left").removeClass("js-hidden");

    $("#daymode").click(function() {
      $("#daymode").addClass("activemode");
      $("#nightmode").removeClass("activemode");
      $("body").removeClass("nightmode");
      $(".tradechartlist iframe").contents().find("body").removeClass("nightmode");
    });
    $("#nightmode").click(function() 
    {
      $("#nightmode").addClass("activemode");
      $("#daymode").removeClass("activemode");
      $("body").addClass("nightmode");
      $(".tradechartlist iframe").contents().find("body").addClass("nightmode");
    })
  });
</script>

</body>  
</html>

