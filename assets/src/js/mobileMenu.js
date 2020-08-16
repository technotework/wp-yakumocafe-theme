import $ from "jquery";

$(function() {

	init();
});

function init(){

	$(".js-mobile-nav-btn").on("click",function(){
		
		$(".js-mobile-nav").slideToggle();
	});
}