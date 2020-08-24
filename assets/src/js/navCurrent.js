import $ from "jquery";

$(function() {

	init();
});

function init(){

	const targets = {
		about: $("#menu-item-174"),
		menu: $("#menu-item-185"),
		event: $("#menu-item-184"),
		reserve: $("#menu-item-175")
	}

	const path = location.pathname;
	let $nav = null;

	if(path.match(/^\/about/)){

		$nav = targets.about;

	}else if(path.match(/^\/menu/)){

		$nav = targets.menu;

	}else if(path.match(/^\/event/)){

		$nav = targets.event;

	}else if(path.match(/^\/reserve/) || path.match(/^\/booking-form/) || path.match(/^\/booking-thanks/)){

		$nav = targets.reserve;
	}

	if($nav){

		$nav.addClass("p-header-nav__list--is-current ");
	}
}