const { readyException, ajaxSetup } = require("jquery");

$(window).on("load", () => {
	init();
});

function init() {

	//値がリロードするごとに変動するので遅延実行した
	setTimeout(setup, 800);

	$(window).resize(function () {

		setup();
	})
}

function setup() {

	//階層判定
	const isTop = $(".home").length;
	const isAbout = $(".page-id-163").length;
	const wh = $("html").height();
	let h;

	if (isTop) {

		//初期位置の設定
		let topHeaderHeight = $(".js-top-header").height();
		$("#js-aside").css("top", topHeaderHeight);

		//長さの設定
		h = wh - (topHeaderHeight + $(".js-footer").height() + $(".js-access").height());

	} else {

		//初期位置の設定
		let headerHeight = $(".js-header").height() + 28;
		$("#js-aside").css("top", headerHeight);

		if (isAbout) {

			//長さの設定
			h = wh - (headerHeight + $(".js-footer").height() + $(".js-about-chofu").height() + 180);

		} else {

			h = wh - (headerHeight + $(".js-footer").height() + 180);
		}

	}

	$("#js-aside").height(h);
	if ($("#js-aside").css("opacity") == 0) {

		$("#js-aside").css(
			{
				marginLeft: -46
			});

		$("#js-aside").animate({
			marginLeft: 0,
			opacity: 1
		}, 100);
	}
}