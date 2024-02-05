$(".orderchangebg #buyshow").click(function()
{
	  $('.orderbook').addClass("buyshow");
	  $('.orderbook').removeClass("sellshow");
	  $('.orderbook').removeClass("buysellshow");
});
$(".orderchangebg #sellshow").click(function()
{
	  $('.orderbook').addClass("sellshow");
	$('.orderbook').removeClass("buyshow");
	$('.orderbook').removeClass("buysellshow");
});
$(".orderchangebg #buysellshow").click(function()
{
	  $('.orderbook').addClass("buysellshow");
	  $('.orderbook').removeClass("buyshow");
	  $('.orderbook').removeClass("sellshow");	
});


	
function readURL(input) {
		if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
		  $('#profile').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
		}
		}

		$("#file_input_file").change(function() {
		$("#profilename").text(this.files[0].name);
		readURL(this);
});






