<?php
/**
 * The template for displaying taxonomy pages
 *
 * @package yakumocafe
 */

get_header();
?>

	<!--main-->
	<main class="p-main">
		<article class="p-main__article">
			<!--メニュー-->
			<section class="p-section__second">
				<div class="u-i-center">
					<h3 class="c-h__article p-h__article">GRAND MENU</h3>
				</div>

				<!--コンテンツ-->
				<div class="p-full u-center ">
					<!--tab-->
					<nav class="p-tab u-center">

						<ul class="js-tab l-flex-center">

							<li class="js-tabitem p-tab__item is-tab-current" data-tab-group="drink">
								DRINK
							</li>

							<li class="js-tabitem p-tab__item" data-tab-group="food">
								FOOD
							</li>

							<li class="js-tabitem p-tab__item" data-tab-group="sweets">
								SWEETS
							</li>

						</ul>

					</nav>

					<!--tabcontent-->
					<div>
					<?php
						$kinds = get_terms( array( 'taxonomy' => 'kind' ) );
					if ( ! empty( $kinds ) ) :
						?>
						<?php foreach ( $kinds as $kind ) : ?>
						<!--drink-->
						<div class="js-tab-content" data-tab-content-group="<?php echo esc_html( strtolower( $kind->name ) ); ?>">
							<ul class="l-flex-both" id="<?php echo esc_html( strtolower( $kind->name ) ); ?>">

								<?php
								$args              = array(
									'post_type'      => 'menu',
									'posts_per_page' => -1,
									'order'          => 'ASC',
								);
								$taxquerysp        = array( 'relation' => 'AND' );
								$taxquerysp[]      = array(
									'taxonomy' => 'kind',
									'terms'    => $kind->slug,
									'field'    => 'slug',
								);
								$args['tax_query'] = $taxquerysp;

								$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
										$the_query->the_post();
										get_template_part( 'template-parts/content', 'menu' );
									endwhile;
								endif;
								?>
							</ul>
						</div>
						<?php endforeach; ?>
					<?php endif; ?>
					</div>

					<span class="p-content-menu__caption">
						※価格は全て税込です
					</span>
				</div>
			</section>
		</article>
	</main>

<?php
get_sidebar();
get_footer();
