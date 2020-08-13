

import axios from 'axios';
import $ from "jquery";

//jsondata
let guides;
//googlemap instance
let map;
//タグの数字変換Object
const tag = { 6: "shop", 14: "amuse", 5: "nature", 13: "shrine" };
//マーカーインスタンス保持
let markers = [];
let infos = [];

$(function() {

	init();
});

/**
 * 初期化
 */
function init(){

	loadJson(afterLoad);
}

/**
 * Jsonをロード
 */
function loadJson(callback){

	//WP APIからデータ取得
	axios.get('/wp-json/wp/v2/guide-api')
	.then(response => {

		const res = response.data;
		//新しいJSONの構築
		let json = [];
		for (let i = 0; i < res.length; i++) {

			const result = {
				img: res[i].acf.guide_img,
				title: res[i].acf.guide_title,
				text: res[i].acf.guide_text,
				label: res[i].acf.guide_label,
				lat: res[i].acf.guide_lat,
				lng: res[i].acf.guide_long
			}

			//tagを数字から文字に直す
			const tags = res[i].tags;
			let newTagArray = [];
			for (let j = 0; j < tags.length; j++) {

				newTagArray.push(tag[tags[j]]);
			}
			result.types = newTagArray;

			json.push(result);
		}

		guides = json;
		//完了
		callback();
	});

}

/**
 * ロード後
 */
function afterLoad(){

	initMap();
	setupCBHandler();
}

/**
 * マーカー生成
 * @param {*} json 
 */
function createMakers(json){

	if(markers.length > 0){
	
		for (let i = 0; i < markers.length; i++) {
			markers[i].setMap(null);
		}
		
		for (let i = 0; i < infos.length; i++) {
			infos[i].setMap(null);
		}
		
		markers = [];
		infos = [];
	}


	for (let i = 0; i < json.length; i++) {

		let infoboxMarkerEle = `<div class="js-info-marker"></div>`;
		let infoboxElem  = `<div class="js-info-box l-flex-wcenter">${json[i].label}</div>`;

		let pos = new google.maps.LatLng({
			lat: Number(json[i].lat),
			lng: Number(json[i].lng)
		});

		//マーカー
		let infoMarkerOptions = {
			content: infoboxMarkerEle,
			pixelOffset: new google.maps.Size(0, 0),
			alignBottom: true,
			position: pos,
			boxClass: "js-info-marker",
			closeBoxURL: ''
		};

		let marker = new InfoBox(infoMarkerOptions);

		markers.push(marker);

		//インフォボックス
		let infoboxOptions = {
			content: infoboxElem,
			pixelOffset: new google.maps.Size(0,0),
			alignBottom: true,
			position: pos,
			boxClass: "js-info-box",
			closeBoxMargin: "-15px -20px 0px 0px",
			closeBoxURL: ''
		};

		let infoBox = new InfoBox(infoboxOptions);

		infos.push(infoBox);

		marker.open(map);
		infoBox.open(map);
	}

}

/*----------------------------------------
* Checkbox
----------------------------------------*/
/**
 * checkboxのハンドラ
 */
function setupCBHandler(){

	$(".p-guide-nav li input").on("change",function(e){

		checked();
	});

}

/**
 * チェックボックスオン
 */
function checked(){

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
function getCheckedArray(){

	let result = [];
	$(".p-guide-nav li input").each(function(){

		let isCheck = $(this).prop('checked');
		let target  = $(this).val();
		
		if(isCheck){
			result.push(target);
		}
	});
	return result;
}

/**
* オンになっているチェックのタグに該当する場所だけをフィルタして返す
* @param targetCbArray チェックされているタグのkey名の配列
*/
function getFilterResult(targetCbArray){

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
function resolveDuplication(filterResult){

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
function initMap(){

	const mapElement = document.getElementById('guide-map');
	map = new google.maps.Map(mapElement, {
		center: { lat: 35.6542928, lng: 139.5534647 },
		zoom: 13,
		mapTypeControl: false,
		fullscreenControl: false,
		rotateControl: false,
		scaleControl: false,
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
			  "featureType": "administrative.land_parcel",
			  "elementType": "labels.text.fill",
			  "stylers": [
				{
				  "color": "#bdbdbd"
				}
			  ]
			},
			{
			  "featureType": "landscape",
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
				  "color": "#bdbdbd"
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
				},
				{
				  "visibility": "on"
				}
			  ]
			},
			{
			  "featureType": "poi",
			  "elementType": "labels.text.fill",
			  "stylers": [
				{
				  "color": "#757575"
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
				},
				{
				  "lightness": 45
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
			  "featureType": "transit.line",
			  "elementType": "geometry.fill",
			  "stylers": [
				{
				  "color": "#d9d9d9"
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