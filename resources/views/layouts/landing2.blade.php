<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Cryptonoma</title>	
<link rel="icon" type="image/png" sizes="32x32" href="{{url('userpanel/images/favicon.png')}}">
<link rel="stylesheet" href="{{url('userpanel/css/bootstrap.min.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{url('userpanel/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{url('userpanel/css/datepicker.min.css')}}">	 
<link rel="stylesheet" href="{{url('userpanel/css/user_new.css?v=1.0.2')}}">
<link rel="stylesheet" href="{{ url('css/userpanel/toastr.min.css') }}">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

@yield('content')

</body>

<script src="{{url('userpanel/js/jquery.min.js')}}"></script>
<script src="{{url('userpanel/js/popper.min.js')}}"></script>
<script src="{{url('userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{url('userpanel/js/simplebar.js')}}"></script>
<script src="{{url('userpanel/js/datepicker.min.js')}}"></script>
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

$("#sellpagescroll").animate({ scrollTop: 20000000 }, "slow");
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


// $('.headbg .navbar-toggler').click(function()
// {
//     $(".sidebar").removeClass('active');
//   /*new */  $(".marketlist").removeClass('active');
// });
// $(document).ready(function () {
//     $('#sidebarCollapse').on('click', function () {
//         $('.sidebar').toggleClass('active');
//         $('body').toggleClass('pagewrapperbox');
//         $(".headbg .collapse").removeClass("show");
//     });
// });

/*new */


$(function() {
  $("#sidebarmarketlistCollapse").on("click", function(e) {
    $(".marketlist").addClass("active");
	$(".overlay").addClass("activemob");
	e.stopPropagation();	
  });
  $(document).on("click", function(e) {
    if (!$('.marketlist').is(e.target) && $('.marketlist').has(e.target).length === 0) {
     $(".marketlist").removeClass("active");
	 $(".overlay").removeClass("activemob");
    }
  });
});

$('#closemarketicon').click(function()
{
    $(".marketlist").removeClass('active');
	$(".overlay").removeClass('activemob');
});


	
$('[data-toggle=datepicker1]').each(function() {
	var target = $(this).data('target-name');
	var t = $('input[name=' + target + ']');
	t.datepicker({
		format: 'yy-mm-dd',
		endDate: '-1d',
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
		format: 'yy-mm-dd',
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
		format: 'yy-mm-dd',
		autoclose: true
	});
	$(this).on("click", function() {
		t.datepicker("show");
	});
});
</script>


<script>
	$(document).ready(function () {
  $('input[name="intervaltype"]').click(function () {
      $(this).tab('show');
      $(this).removeClass('active');
  });
})

$(document).ready(function() {
	function t() {
		$(window).width() < 767 ? $(".table-responsive-stack").each(function(t) {
			$(this).find(".table-responsive-stack-thead").show(), $(this).find("thead").hide()
		}) : $(".table-responsive-stack").each(function(t) {
			$(this).find(".table-responsive-stack-thead").hide(), $(this).find("thead").show()
		})
	}
	$(".table-responsive-stack").each(function(t) {
		var e = $(this).attr("id");
		$(this).find("th").each(function(t) {
			$("#" + e + " td:nth-child(" + (t + 1) + ")").prepend('<span class="table-responsive-stack-thead">' + $(this).text() + " : </span> "), $(".table-responsive-stack-thead").hide()
		})
	}), $(".table-responsive-stack").each(function() {
		var t = $(this).find("th").length,
			e = 100 / t + "%";
		$(this).find("th, td").css("flex-basis", e)
	}), t(), window.onresize = function(e) {
		t()
	}
});
$(".mobilegrid>li:first-child").click(function()
	{
		$(".tradepage").addClass("chartactive");
		$(".tradepage").removeClass("openorderactive");
		$(".tradepage").removeClass("tradeactive");
	});
	$(".mobilegrid>li:nth-child(2)").click(function()
	{
		$(".tradepage").removeClass("chartactive");
		$(".tradepage").addClass("openorderactive");
		$(".tradepage").removeClass("tradeactive");
	});
	$(".mobilegrid>li:nth-child(3)").click(function()
	{
		$(".tradepage").removeClass("chartactive");
		$(".tradepage").removeClass("openorderactive");
		$(".tradepage").addClass("tradeactive");
	});
	$(".clostbuytab a").click(function()
	{
		$(".tradepage").removeClass("buyorderformactive1");
		$(".tradepage").removeClass("sellorderformactive1");
	});
    $(".buyselltab>li:first-child").click(function()
{
	$(".tradepage").addClass("buyorderformactive1");
	$(".tradepage").removeClass("sellorderformactive1");
});
$(".buyselltab>li:nth-child(2)").click(function()
{
	$(".tradepage").addClass("sellorderformactive1");
	$(".tradepage").removeClass("buyorderformactive1");
});
$(".buyboxorder tr>td:first-child").click(function()
{
	$(".tradepage").addClass("buyorderformactive1");
	$(".tradepage").removeClass("sellorderformactive1");
});
$(".sellboxorder tr>td:first-child").click(function()
{
	$(".tradepage").addClass("sellorderformactive1");
	$(".tradepage").removeClass("buyorderformactive1");
});
</script>

{{ Session::get('error_code')}}

@if(!empty(\Session::get('error_code')) && \Session::get('error_code') == 5)
<script>
$(function()
{
$("#auth").modal('show');
});

$("#btnauthClosePopup").click(function ()
{
$("#auth").modal("hide");
});

$("button[data-dismiss=modal]").click(function()
{
$("#auth").modal('hide');
});

</script>
@endif


{{ Session::get('email_code')}}

@if(!empty(\Session::get('email_code')) && \Session::get('email_code') == 6)
<script>
$(function()
{
$("#emailotp").modal('show');
});

$("#btnauthClosePopup").click(function ()
{
$("#emailotp").modal("hide");
});

$("button[data-dismiss=modal]").click(function()
{
$("#emailotp").modal('hide');
});

</script>
@endif

@if(!empty($error_code) && $error_code == 5)
<script>
  $(function()
  {
     // alert('show');
     $("#auth").modal('toggle');
  });

  </script>
@endif




@if(!empty($email_code) && $email_code == 6)
<script>
  $(function()
  {
     // alert('show');
     $("#emailotp").modal('toggle');
  });

  </script>
@endif


<script>
document.getElementById("myTooltip").addEventListener("click", copy_password);
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

	setTimeout(function(){  var tooltip = document.getElementById("myTooltip");
		tooltip.innerHTML = "COPY";}, 2000);
}
</script>


  
</html>


