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
			<section class="p-section">
				<div class="u-i-center">
					<h2 class="c-h__article p-h__article">今月のおすすめ</h2>
				</div>
				<!--コンテンツ-->
				<div class="p-content-monthly">

					<!--コンテンツ-->
					<ul id="js-content-monthly" class="p-content-monthly__lists u-center">
					<?php
						$args = array(
							'post_type'      => 'recommend',
							'posts_per_page' => 3,
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) :
							$loop->the_post();
							get_template_part( 'template-parts/loop', 'top-recommend' );
						endwhile;
						?>
					</ul>


					<!--装飾要素-->
					<div class="p-content-monthly__left-cloud">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top-menu-cloud-l.png' ); ?>" class="c-res-img">
					</div>
					<div class="p-content-monthly__right-cloud">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top-menu-cloud-r.png' ); ?>" class="c-res-img">
					</div>


					<!--リンク-->
					<div class="p-content-monthly__button u-center u-mb5">
						<a href="/menu" class="c-button__alt1 p-button__alt1">
							MENU
						</a>
					</div>
				</div>

			</section>

			<!--EVENT&TOPICS-->
			<section class="p-section">

				<div class="u-i-center">
					<h2 class="c-h__article p-h__article__ls0">EVENT&TOPICS</h2>
				</div>

				<!--コンテンツ-->
				<div class="p-content-event u-center">
					<ul class="p-content-event__list l-flex-r">

						<?php
						$args = array(
							'post_type'      => 'event',
							'posts_per_page' => 3,
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) :
							$loop->the_post();
							get_template_part( 'template-parts/loop', 'top-event' );
						endwhile;
						?>
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

					<?php
						$args = array(
							'post_type'      => 'info',
							'posts_per_page' => 5,
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) :
							$loop->the_post();
							get_template_part( 'template-parts/loop', 'top-info' );
						endwhile;
						?>
					</ul>
				</div>

			</section>

			<!--ACCESS-->
			<section>
				<div id="access" class="p-content-access js-access">

					<div class="p-content-access__info u-center l-flex">
						<h2 class="c-h__article">ACCESS</h2>
						<span class="p-content-access__shopname">YAKUMO CAFE</span>
						<span class="p-content-access__address">
							<address>東京都調布市八雲台1-2-3 京王線調布駅から徒歩3分</address>
							<a href="tel:042-000-000">TEL:042-000-000</a>
						</span>
					</div>
					<div id="map" class="p-content-access__map u-ishadow">

					</div>
				</div>
			</section>
		</article>
	</main>

	<?php get_sidebar(); ?>

	<?php get_footer('home'); ?>
