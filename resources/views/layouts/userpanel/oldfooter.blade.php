<script src="{{ url('js/userpanel/jquery.min.js') }}"></script>
<script src="{{ url('js/userpanel/popper.min.js') }}"></script>
<script src="{{ url('js/userpanel/bootstrap.min.js') }}"></script>
<script src="{{ url('js/userpanel/simplebar.js') }}"></script>
<script src="{{ url('js/userpanel/datepicker.min.js') }}"></script>
<script src="{{ url('js/userpanel/custom.js') }}"></script>

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
startDate: '+1d',
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

var Mode="{{Session::get('mode')}}";  
    if(Mode == 'nightmode'){  
      
       $(".tradechartlist iframe").contents().find("body").addClass("nightmode");
      $("#nightmode").addClass("activemode");
      // $("#daymode").removeClass("activemode");
      $("body").removeClass("daymode");
      $("body").addClass("nightmode");
      $("#nightmode").hide();
      $("#daymode").show();
      
    }else{
      
       $(".tradechartlist iframe").contents().find("body").removeClass("nightmode");
      $("#daymode").addClass("activemode");
      $("#nightmode").removeClass("activemode");
      $("body").removeClass("nightmode");
      $("body").addClass("daymode");
      $("#daymode").hide();
      $("#nightmode").show();
    }  

// $("#nightmode").click(function()
// {
//     $("#nightmode").addClass("activemode")
//     $("#daymode").removeClass("activemode")
//     $("body").addClass("nightmode")
// });

// $("#daymode").click(function()
// {
//     $("#daymode").addClass("activemode")
//     $("#nightmode").removeClass("activemode")
//     $("body").removeClass("nightmode")
// });
var prevVal;
$("#priceslect").on("change",function(){
  var val = $(this).find('option:selected').val();
  $(".livechangeprice").removeClass(`priceb-${prevVal}`).addClass(`priceb-${val}`);
  prevVal = val;
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
  $("#nightmode").addClass("activemode");
$("#daymode").removeClass("activemode");
$("body").addClass("nightmode");
$(".tradechartlist iframe").contents().find("body").addClass("nightmode");

  }else{
    $(".tradechartlist iframe").contents().find("body").removeClass("nightmode");
  }  
  }, 1/100);
</script>

{{-- <script>
	$(document).on("change","select",function(){
	  $("option[value=" + this.value + "]", this)
	  .attr("selected", true).siblings()
	  .removeAttr("selected")
	});
	
	</script> --}}
	

</body>  
</html>