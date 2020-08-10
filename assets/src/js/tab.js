import $ from "jquery";

$(function() {

	init();
});

/**
 * 初期化
 */
function init(){
	
	setClick();
	hideContent();
	//初期表示
	showContent("drink");
}

/**
 * tab click handler
 */
function setClick(){

	$(".js-tabitem").on("click",function(){

		const $this = $(this);
		let key = $this.attr("data-tab-group");
		clickTab(key);
	})

}

/**
 * タブがクリックされた
 */
function clickTab(key){

	//一時的にすべてのコンテンツを消す
	hideContent();
	//タブのcurrentをリセット
	delAllCurrent();

	//タブのcurrentを設定
	setCurrent(key);
	//コンテンツを表示
	showContent(key);
}

/**
 * すべてのコンテンツを隠す
 */
function hideContent(){

	$(".js-tab-content").hide();
}

/**
 * 指定されたkeyのコンテンツを表示
 * @param {*} key 
 */
function showContent(key){

	$('[data-tab-content-group="' + key +'"]').show();
}

/**
 * すべてのTabからCurrentをはずす
 */
function delAllCurrent(){

	$(".is-tab-current").removeClass("is-tab-current");
}

/**
 * TabにCurrentをあたえる
 * @param {*} key 
 */
function setCurrent(key){

	$('[data-tab-group="' + key +'"]').addClass("is-tab-current");
}
