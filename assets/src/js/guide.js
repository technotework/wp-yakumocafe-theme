import axios from 'axios';

let app = new Vue({
	el: '#app',
	data: {
		cb: {shop: true, amuse: false, nature: false, shrine: false},
		place: {img: '', title: '', text: ''},
		isPanelShow: true,
		guides:[]
	},
	created:function(){

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
					lng: res[i].acf.guide_long,
					types: res[i].tags
				}
				json.push(result);
			}
			this.guides = json;
		});

	},
	computed: {
		check:function(){

			console.log(this.cb);
		}

	},
	methods: {
		//filterFunctions
		getFilterFunctions:(key)=>{


		}

	}

});
