<?php
/**
 * The main template file
 *
 * @package yakumocafe
 */

	get_header( 'home' );
?>
	<!--main-->
	<main class="p-main">
		<article class="p-main__article">
			<!--今月のおすすめ-->
			<section>
				<div class="u-i-center">
					<h2 class="c-h__article p-h__article">今月のおすすめ</h2>
				</div>
				<!--コンテンツ-->
				<div class="p-content-monthly">

					<!--コンテンツ-->
					<ul class="js-content-monthly">
						<li class="p-content-monthly__container u-center">
							<figure class="p-content-monthly__image">
								<img src="https://kinarino.k-img.com/system/press_images/001/518/826/46292da44cbdc27a0c937a9f63069efb5597ed5d.jpg?1572153103"
									alt="" class="c-res-img">
								<figcaption class="p-content-monthly__text c-caption u-center">
									もじもじもじもじもじもじもじもじもじもじもじもじもじもじもじもじ
								</figcaption>
							</figure>

							<div class="p-content-monthly__badge">
								July
							</div>


						</li>
					</ul>

					<!--nav-->
					<nav>
						<div class="p-content-monthly__back">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top-menu-back.gif' ); ?>" class="c-res-img">
						</div>
						<div class="p-content-monthly__next">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top-menu-next.gif' ); ?>" class="c-res-img">
						</div>
					</nav>

					<!--装飾要素-->
					<div class="p-content-monthly__left-cloud">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top-menu-cloud-l.png' ); ?>" class="c-res-img">
					</div>
					<div class="p-content-monthly__right-cloud">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top-menu-cloud-r.png' ); ?>" class="c-res-img">
					</div>


					<!--リンク-->
					<div class="p-content-monthly__button u-center">
						<a class="c-button__alt1 p-button__alt1">
							MENU
						</a>
					</div>
				</div>

			</section>

			<!--EVENT&TOPICS-->
			<section>

				<div class="u-i-center">
					<h2 class="c-h__article p-h__article">EVENT&TOPICS</h2>
				</div>

				<!--コンテンツ-->
				<div class="p-content-event u-center">
					<ul class="p-content-event__list l-flex">
						<li class="p-content-event__listitem">
							<a href="">
								<figure>

									<div class="p-content-event__image"
										style="background-image:url(https://www.anicom-sompo.co.jp/nekonoshiori/wp-content/uploads/2020/05/3453_10-740x524.jpg)">
									</div>

									<figcaption class="p-content-event__text c-caption">
										もじもじもじもじもじもじもじもじ<br />もじもじもじもじもじもじ
									</figcaption>
								</figure>
							</a>
						</li>
						<li class="p-content-event__listitem">
							<a href="">
								<figure>

									<div class="p-content-event__image"
										style="background-image:url(https://www.anicom-sompo.co.jp/nekonoshiori/wp-content/uploads/2020/05/3453_10-740x524.jpg)">
									</div>

									<figcaption class="p-content-event__text c-caption">
										もじもじもじもじもじもじもじもじ<br />もじもじもじもじもじもじ
									</figcaption>
								</figure>
							</a>
						</li>
						<li class="p-content-event__listitem">
							<a href="">
								<figure>

									<div class="p-content-event__image"
										style="background-image:url(https://www.anicom-sompo.co.jp/nekonoshiori/wp-content/uploads/2020/05/3453_10-740x524.jpg)">
									</div>

									<figcaption class="p-content-event__text c-caption">
										もじもじもじもじもじもじもじもじ<br />もじもじもじもじもじもじ
									</figcaption>
								</figure>
							</a>
						</li>
					</ul>
				</div>
			</section>

			<!--INFO-->
			<section class="p-content-info-wrapper">
				<div class="u-i-center">
					<h2 class="c-h__article p-h__article">INFO</h2>
				</div>

				<!--コンテンツ-->
				<div class="p-content-info u-center">
					<ul class="p-content-info__list">
						<li class="p-content-info__listitem l-flex">

							<span class="p-content-info__date l-flex-vcenter"><a href="">2020/07/07</a></span>
							<span class="p-content-info__content l-flex-vcenter"><a
									href="">今月の定休日は10、20、30日です</a></span>

						</li>
						<li class="p-content-info__listitem l-flex">

							<span class="p-content-info__date l-flex-vcenter"><a href="">2020/07/07</a></span>
							<span class="p-content-info__content l-flex-vcenter"><a
									href="">今月の定休日は10、20、30日です</a></span>

						</li>
						<li class="p-content-info__listitem l-flex">

							<span class="p-content-info__date l-flex-vcenter"><a href="">2020/07/07</a></span>
							<span class="p-content-info__content l-flex-vcenter"><a
									href="">今月の定休日は10、20、30日です</a></span>

						</li>
						<li class="p-content-info__listitem l-flex">

							<span class="p-content-info__date l-flex-vcenter"><a href="">2020/07/07</a></span>
							<span class="p-content-info__content l-flex-vcenter"><a
									href="">今月の定休日は10、20、30日です</a></span>

						</li>
						<li class="p-content-info__listitem l-flex">

							<span class="p-content-info__date l-flex-vcenter"><a href="">2020/07/07</a></span>
							<span class="p-content-info__content l-flex-vcenter"><a
									href="">今月の定休日は10、20、30日です</a></span>

						</li>
					</ul>
				</div>

			</section>

			<!--ACCESS-->
			<section>
				<div class="p-content-access">

					<div class="p-content-access__info u-center l-flex">
						<h2 class="c-h__article">ACCESS</h2>
						<span class="p-content-access__shopname">YAKUMO CAFE</span>
						<span class="p-content-access__address">
							<address>東京都調布市八雲台1-2-3 京王線調布駅から徒歩3分</address>
							<a href="tel:042-000-000">TEL:042-000-000</a>
						</span>
					</div>
					<div class="p-content-access__map">

					</div>
				</div>
			</section>
		</article>
	</main>

	<?php get_sidebar(); ?>

	<?php get_footer(); ?>
