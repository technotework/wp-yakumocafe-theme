<?php
/**
 * The template for About Page
 *
 * @package yakumocafe
 */

get_header();
?>
	<!--main-->
	<main class="p-main">
		<article class="p-content-about">
			<!--ごあいさつ-->
			<section class="p-section__second">
				<div class="u-i-center">
					<h3 class="c-h__article p-h__article">ごあいさつ</h3>
				</div>

				<!--コンテンツ-->
				<div class="p-content-greet u-center l-flex-nw">

					<div class="p-content-greet__profile">
						<figure class="p-content-greet__image">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/about-staff.jpg' ); ?>" alt="店主 藤崎香" class="c-res-img">
						</figure>
						<!--装飾要素-->
						<div class="p-content-greet__left-cloud">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/about-cloud1.png' ); ?>" alt="" class="c-res-img">
						</div>

						<div class="p-content-greet__right-cloud">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/about-cloud2.png' ); ?>" alt="" class="c-res-img">
						</div>
					</div>

					<p class="p-content-greet__text c-para">
						YAKUMO CAFEにようこそいらっしゃいました。<br />
						調布市八雲台に2015年に開店して以来、たくさんのお客様においでいただきました。<br />
						5周年を迎え、感謝の気持ちでいっぱいです。本当にありがとうございます。<br /><br />

						これからも、「調布のまちの珈琲店」として、皆様の憩いの場、そして、調布を活気付けるイベントスポットでありたいと思っています。<br />
						また、調布に観光でいらっしゃった皆様にも、この街の魅力をお伝えできれば幸いです。<br class="pc" />
						ぜひ、街巡りの拠点としてご利用ください。<br /><br />

						今日もおいしい珈琲をご用意しておまちしております。<br /><br />

						<span class="p-content-greet__signature">店主 <span
								class="p-content-greet__name">藤咲　香</span></span>
					</p>
				</div>
			</section>

			<!--こだわり-->
			<section class="p-section__second">
				<div class="u-i-center">
					<h3 class="c-h__article p-h__article">私たちのこだわり</h3>
				</div>

				<!--コンテンツ-->
				<div class="p-content-commit u-center l-flex-nw">

					<p class="p-content-commit__text c-para">
						当店のこだわりは、選び抜いた豆と熟練の職人による、自家焙煎珈琲です。<br />
						1日のはじまりに、楽しいお昼ご飯とともに、夜のほっとするひとときに、一杯の珈琲に魔法をこめておとどけします。<br /><br />

						フードやスイーツも、調布市を中心とした多摩の地産地消の野菜や果物、乳製品にこだわりました。市内の農家の皆様とも連携し、地元の味を月替りでご紹介しています。<br /><br />

						ぜひ、YAKUMO CAFEで、武蔵野の四季のうつりかわりを味わってください。
					</p>

					<div class="p-content-commit__product">
						<figure class="p-content-commit__image">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/about-coffe.jpg' ); ?>" alt="調布ブレンド" class="c-res-img">
						</figure>
					</div>
				</div>
			</section>

			<!--調布のまちとともに-->
			<section>
				<div class="u-i-center">
					<h3 class="c-h__article p-h__article">調布のまちとともに</h3>
				</div>
				<!--コンテンツ-->
				<div class="p-content-with-chofu">
					<p class="p-content-with-chofu__text c-para u-center">
						南に多摩川、東に野川、北に武蔵野の自然をたたえ、街の中心部には、古くからの神社仏閣がいまも息づく調布。そんな調布のまちとともに、私たち YAKUMO
						CAFEも、あなたの心の安らぎの一部になりたいと思っています。
					</p>

					<div class="p-content-with-chofu__img js-about-chofu">
						<!--bg-->
					</div>
				</div>
			</section>

		</article>
	</main>

<?php
get_sidebar();
get_footer();
