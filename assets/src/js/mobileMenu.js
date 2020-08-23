import $ from "jquery";

$(function() {

	init();
});

function init(){
	$(".js-mobile-nav-fullscreen").on("click",function(){
		
		toggle();
	});

	
	$(".js-mobile-nav-btn").on("click",function(){
		
		toggle();
	});

}

function toggle(){

	$(".js-mobile-nav").slideToggle(500,function(){

		if($(this).is(':visible')){

			$(".c-fullscreen").show();
		}else{
			$(".c-fullscreen").hide();
		}
	});
}