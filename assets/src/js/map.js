google.maps.event.addDomListener(window, 'load', initMap);

let map;
function initMap() {

	/**
	 * map初期化
	 */
	map = new google.maps.Map(document.getElementById('map'), {
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
	 */
	let marker = new google.maps.Marker({
		map: map,
		position: { lat: 35.6542928, lng: 139.5534647 },
		icon: '/wp-content/themes/yakumocafe/images/marker.png'
	});

}
