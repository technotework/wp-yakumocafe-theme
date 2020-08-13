
import axios from 'axios';

Vue.config.devtools = true;

//Vue
let app = new Vue({
	el: '#app',
	data: {
		cb: { shop: true, amuse: false, nature: false, shrine: false },
		tag: { 6: "shop", 14: "amuse", 5: "nature", 13: "shrine" },
		isPanelShow: true,
		guides: [],
		map: null,
		markers: []
	},
	/**===========================
	 * created
	===========================*/
	mounted: function () {
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

						newTagArray.push(this.tag[tags[j]]);
					}
					result.types = newTagArray;

					json.push(result);
				}
				this.guides = json;
				//地図初期化
				this.initMap();
			});

	},
	/**===========================
	 * computed
	===========================*/
	computed: {
		mark: function () {

			//オンになっているチェックのタグカテゴリで絞り込みます
			//オンになっているチェックの配列
			let targetCbArray = this.getCheckedArray(this.cb);
			//それぞれのキーでフィルタしたものを配列にいれる
			let filterResult = this.getFilterResult(targetCbArray);
			//重複を解決
			let result = this.resolveDuplication(filterResult);

			//
			console.log(result);
			this.createMakers(result);

			return result;
		},
		getPanelInfo: function () {

			let result;
			if (this.mark.length == 0) {

				result = { img: "", title: "", label: "", lat: 0, lng: 0 };
			}
			else {

				result = this.mark[0];
			}

			return result;
		}

	},
	/**===========================
	 * methods
	===========================*/
	methods: {
		/*----------------------------------------
		 * JSONフィルタ関連
		----------------------------------------*/
		/**
		 * オンになっているチェックの配列
		 */
		getCheckedArray: function (cb) {

			let targetCbArray = [];
			for (const key in cb) {
				if (this.cb.hasOwnProperty(key)) {

					if (this.cb[key] == true) {
						targetCbArray.push(key);
					}
				}
			}

			return targetCbArray;
		},
		/**
		 * オンになっているチェックのタグに該当する場所だけをフィルタして返す
		 * @param targetCbArray チェックされているタグのkey名の配列
		 */
		getFilterResult: function (targetCbArray) {

			let filterResult = [];
			for (let i = 0; i < targetCbArray.length; i++) {

				const key = targetCbArray[i];
				//チェックされたものに該当しているタグをもっているかどうか
				let filter = this.guides.filter(item => {
					return item.types.includes(key)
				});

				filterResult.push(filter);
			}
			return filterResult;
		},
		/**
		 * 配列の重複を解決
		 * @param filterResult オンになっているチェックのタグに該当する場所が入っている配列
		 */
		resolveDuplication: function (filterResult) {

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
		},
		/*----------------------------------------
		 * Map関連
		----------------------------------------*/
		/**
		 * マーカー生成
		 * @param {*} json 
		 */
		createMakers:function(json){

			//一度消す
			if(this.markers.length > 0){

				for (let i = 0; i < this.markers.length; i++) {
					this.markers[i].setMap(null);
				}

				this.markers = [];
			}

			//マーカー追加
			for (let i = 0; i < json.length; i++) {
			
				let marker = new google.maps.Marker({
					map: this.map,
					position: new google.maps.LatLng({
						lat: parseFloat(json[i].lat),
						lng: parseFloat(json[i].lng)
					})
				});

				let infoWindow =  new google.maps.InfoWindow({
					content: `<div class="guide__info">${json[i].label}</div>`
			 	});
				infoWindow.open(this.map, marker);

				this.markers.push(marker);
			}


		},
		/**
		 * 初期化
		 */
		initMap: function () {
			const mapElement = document.getElementById('guide-map');
			this.map = new google.maps.Map(mapElement, {
				center: { lat: 35.6542928, lng: 139.5534647 },
				zoom: 13,
				mapTypeControl: false,
				fullscreenControl: false,
				rotateControl: false,
				scaleControl: false,
				styles: [
					{
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#f5f5f5'
							}
						]
					},
					{
						'elementType': 'labels.icon',
						'stylers': [
							{
								'visibility': 'off'
							}
						]
					},
					{
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#616161'
							}
						]
					},
					{
						'elementType': 'labels.text.stroke',
						'stylers': [
							{
								'color': '#f5f5f5'
							}
						]
					},
					{
						'featureType': 'administrative',
						'stylers': [
							{
								'visibility': 'off'
							}
						]
					},
					{
						'featureType': 'administrative.land_parcel',
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#bdbdbd'
							}
						]
					},
					{
						'featureType': 'poi',
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#eeeeee'
							}
						]
					},
					{
						'featureType': 'poi',
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#757575'
							}
						]
					},
					{
						'featureType': 'poi.park',
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#e5e5e5'
							}
						]
					},
					{
						'featureType': 'poi.park',
						'elementType': 'geometry.fill',
						'stylers': [
							{
								'color': '#a4eb7b'
							},
							{
								'lightness': 45
							}
						]
					},
					{
						'featureType': 'poi.park',
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#9e9e9e'
							}
						]
					},
					{
						'featureType': 'road',
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#ffffff'
							}
						]
					},
					{
						'featureType': 'road',
						'elementType': 'geometry.fill',
						'stylers': [
							{
								'visibility': 'off'
							}
						]
					},
					{
						'featureType': 'road',
						'elementType': 'labels',
						'stylers': [
							{
								'visibility': 'off'
							}
						]
					},
					{
						'featureType': 'road.arterial',
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#757575'
							}
						]
					},
					{
						'featureType': 'road.highway',
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#dadada'
							}
						]
					},
					{
						'featureType': 'road.highway',
						'elementType': 'geometry.fill',
						'stylers': [
							{
								'visibility': 'off'
							}
						]
					},
					{
						'featureType': 'road.highway',
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#616161'
							}
						]
					},
					{
						'featureType': 'road.local',
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#9e9e9e'
							}
						]
					},
					{
						'featureType': 'transit.line',
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#e5e5e5'
							}
						]
					},
					{
						'featureType': 'transit.line',
						'elementType': 'geometry.fill',
						'stylers': [
							{
								'color': '#d9d9d9'
							}
						]
					},
					{
						'featureType': 'transit.station',
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#eeeeee'
							}
						]
					},
					{
						'featureType': 'transit.station.rail',
						'elementType': 'geometry.fill',
						'stylers': [
							{
								'lightness': 55
							}
						]
					},
					{
						'featureType': 'transit.station.rail',
						'elementType': 'labels.icon',
						'stylers': [
							{
								'saturation': -5
							},
							{
								'lightness': 10
							},
							{
								'visibility': 'simplified'
							}
						]
					},
					{
						'featureType': 'water',
						'elementType': 'geometry',
						'stylers': [
							{
								'color': '#c9c9c9'
							}
						]
					},
					{
						'featureType': 'water',
						'elementType': 'geometry.fill',
						'stylers': [
							{
								'color': '#8de3e1'
							}
						]
					},
					{
						'featureType': 'water',
						'elementType': 'labels.text.fill',
						'stylers': [
							{
								'color': '#9e9e9e'
							}
						]
					}
				]
			});

			/**
			 * マーカー設定
			 
			let marker = new google.maps.Marker({
				map: map,
				position: { lat: 35.6542928, lng: 139.5534647 },
				icon: '/wp-content/themes/yakumocafe/images/marker.png'
			});
			*/


		}



	}

});
