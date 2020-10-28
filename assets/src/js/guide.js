

import axios from 'axios';
import $ from "jquery";
let MarkerWithLabel = require('markerwithlabel')(google.maps);

//jsondata
let guides;
//googlemap instance
let map;
//タグの数字変換Object
const tag = { 6: "shop", 14: "amuse", 5: "nature", 13: "shrine" };
//マーカーインスタンス保持
let markers = [];
let infos = [];

$(function () {

	init();
});

/**
 * 初期化
 */
function init() {

	hidePanel();
	setupPanel();
	loadJson(afterLoad);
}

/**
 * Jsonをロード
 */
function loadJson(callback) {

	const baseURL = '/wp-json/wp/v2/guide-api';
	//WP APIからデータ取得
	axios.get(baseURL)
		.then(response => {
			//ページ数取得
			let pages = response.headers["x-wp-totalpages"];
			//リクエストリスト作成
			let pageList = [];
			for (let i = 1; i <= pages; i++) {
				pageList.push(axios.get(baseURL + "?page=" + i));
			}
			//Promise all
			Promise.all(pageList).then(val =>{
				let res = [];
				for (let i = 0; i < val.length; i++) {
					//取得結果の配列
					let list = val[i].data; 
					//取得結果の配列を統合
					for (let j = 0; j < list.length; j++) {
						res.push(list[j]);
					}
				}

				//新しいJSONの構築
				let json = [];
				for (let k = 0; k < res.length; k++) {

					const result = {
						img: res[k].acf.guide_img,
						title: res[k].acf.guide_title,
						text: res[k].acf.guide_text,
						label: res[k].acf.guide_label,
						lat: res[k].acf.guide_lat,
						lng: res[k].acf.guide_long
					}

					//tagを数字から文字に直す
					const tags = res[k].tags;
					let newTagArray = [];
					for (let i = 0; i < tags.length; i++) {

						newTagArray.push(tag[tags[i]]);
					}
					result.types = newTagArray;

					json.push(result);
				}
				//格納
				guides = json;
				//完了
				callback();
			});
			
		});

}

/**
 * パネル設定
 */
function setupPanel(){

	$(".js-panel-close").on("click",function(){
		hidePanel();
	});

	$(".js-fullscreen").on("click",function(){
		hidePanel();
	});
}

/**
 * ロード後
 */
function afterLoad() {

	initMap();
	setupCBHandler();
}

/**
 * マーカー生成
 * @param {*} json 
 */
function createMakers(json) {

	//一度消す
	if (markers.length > 0) {

		for (let i = 0; i < markers.length; i++) {
			markers[i].setMap(null);
		}
		markers = [];
	}

	let bounds = new google.maps.LatLngBounds();

	//マーカー追加
	json.map(d => {

		let marker = new MarkerWithLabel({
			position: new google.maps.LatLng(d.lat, d.lng),
			draggable: false,
			raiseOnDrag: false,
			map: map,
			title: d.label,
			labelContent: d.label,
			labelAnchor: new google.maps.Point(77, 51),
			labelClass: "js-info-box",
			icon: '/wp-content/themes/yakumocafe/images/place-marker.png'
		});

		google.maps.event.addListener(marker, "click", function(event){
			
			let label = $(event.vb.target).parent()[0].title;
			setPanel(label);
		 });
		bounds.extend(marker.position);
		markers.push(marker);
	});

	if (markers.length > 0) {
		map.fitBounds(bounds);
	}
}

/*----------------------------------------
* パネル
----------------------------------------*/
function setPanel(label){
	
	let targetObject;
	for (let i = 0; i < guides.length; i++) {
		
		if(guides[i].label == label){

			targetObject = guides[i];
		}
	}

	deletePanelContent();

	$(".js-panel-img").attr("src",targetObject.img);
	$(".js-panel-title").html(targetObject.title);
	$(".js-panel-p").html(targetObject.text);
	showPanel();
}

function deletePanelContent(){

	$(".js-panel-img").attr("src","");
	$(".js-panel-title").html("");
	$(".js-panel-p").html("");
}

function showPanel(){

	$(".js-guide-panel").show();
	$(".js-fullscreen").show();
}

function hidePanel(){

	$(".js-guide-panel").hide();
	$(".js-fullscreen").hide();
	deletePanelContent();
}

/*----------------------------------------
* Checkbox
----------------------------------------*/
/**
 * checkboxのハンドラ
 */
function setupCBHandler() {

	$(".p-guide-nav li input#nature").prop("checked",true);
	setCheckStyle($(".p-guide-nav li input#nature"));

	$(".p-guide-nav li input").on("change", function (e) {

		setCheckStyle($(this));

		checked();
	});

	checked();
}

function setCheckStyle($target){

	let ck = $target.prop('checked');
	if(ck){
		$target.parent().addClass("checked");
	}else{

		$target.parent().removeClass("checked");
	}
}

/**
 * チェックボックスオン
 */
function checked() {

	//オンになっているチェックのタグカテゴリで絞り込みます
	//オンになっているチェックの配列
	let targetCbArray = getCheckedArray();
	//それぞれのキーでフィルタしたものを配列にいれる
	let filterResult = getFilterResult(targetCbArray);
	//重複を解決
	//フィルタされたJSONができる
	let result = resolveDuplication(filterResult);

	//フィルタ結果に基きマーカーを作る
	createMakers(result);
}

/*----------------------------------------
* JSONフィルタ関連
----------------------------------------*/
/**
 * オンになっているチェックの配列
 */
function getCheckedArray() {

	let result = [];
	$(".p-guide-nav li input").each(function () {

		let isCheck = $(this).prop('checked');
		let target = $(this).val();

		if (isCheck) {
			result.push(target);
		}
	});
	return result;
}

/**
* オンになっているチェックのタグに該当する場所だけをフィルタして返す
* @param targetCbArray チェックされているタグのkey名の配列
*/
function getFilterResult(targetCbArray) {

	let filterResult = [];
	for (let i = 0; i < targetCbArray.length; i++) {

		const key = targetCbArray[i];
		//チェックされたものに該当しているタグをもっているかどうか
		let filter = guides.filter(item => {
			return item.types.includes(key)
		});

		filterResult.push(filter);
	}
	return filterResult;
}

/**
* 配列の重複を解決
* @param filterResult オンになっているチェックのタグに該当する場所が入っている配列
*/
function resolveDuplication(filterResult) {

	let allArray = [];
	for (let j = 0; j < filterResult.length; j++) {

		const target = filterResult[j];

		for (let k = 0; k < target.length; k++) {
			allArray.push(target[k]);
		}
	}

	//重複削除
	let result = allArray.filter(function (x, i, self) {
		return self.indexOf(x) === i;
	});

	return result;
}

/*----------------------------------------
* map
----------------------------------------*/
/**
 * マップ初期化
 */
function initMap() {

	const mapElement = document.getElementById('guide-map');
	map = new google.maps.Map(mapElement, {
		center: { lat: 35.6542928, lng: 139.5534647 },
		zoom: 16,
		mapTypeControl: false,
		fullscreenControl: false,
		rotateControl: false,
		scaleControl: false,
		clickableIcons: false,
		styles: [
			{
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#f5f5f5"
					}
				]
			},
			{
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#616161"
					}
				]
			},
			{
				"elementType": "labels.text.stroke",
				"stylers": [
					{
						"color": "#f5f5f5"
					}
				]
			},
			{
				"featureType": "administrative",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative.land_parcel",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#bdbdbd"
					}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "poi",
				"stylers": [
					{
						"color": "#e0e3de"
					},
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#eeeeee"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#e8e8e8"
					},
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "labels.text",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.attraction",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#404040"
					},
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#e5e5e5"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#a4eb7b"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#9e9e9e"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#ffffff"
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#757575"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#dadada"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#616161"
					}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#9e9e9e"
					}
				]
			},
			{
				"featureType": "transit.line",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#e5e5e5"
					}
				]
			},
			{
				"featureType": "transit.station",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#eeeeee"
					}
				]
			},
			{
				"featureType": "transit.station.rail",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "transit.station.rail",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#c9c9c9"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#8de3e1"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#9e9e9e"
					}
				]
			}
		]
	});
}