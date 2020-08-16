<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yakumocafe
 */

get_header();
?>

	<!--main-->
	<main class="p-main">
		<article class="p-main__article">
			<!--イベント&トピックスー-->
			<section class="p-section__second">
				<div class="u-i-center">
					<h3 class="c-h__article p-h__article__ls0">EVENT&amp;TOPICS</h3>
				</div>

				<!--コンテンツ-->
				<div class="p-side-indent u-center">
					<ul class="p-content-eventlist">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :

								the_post();
								get_template_part( 'template-parts/loop', 'event' );
							endwhile;
							endif;
						?>

					</ul>
				</div>
			</section>
		</article>
		<!--ページング-->
		<nav>
			<ul class="p-paging u-center l-flex-both-vcenter">
				<li class="p-paging__back  l-flex-vcenter">
					<?php
						$next_post = get_next_posts_link();
					if ( $next_post ) :
						?>
						<a href="<?php echo esc_url( get_next_posts_page_link() ); ?>">Back</a>
					<?php endif; ?>
				</li>
				<li class="p-paging__next l-flex-vcenter">
				<?php
						$prev_post = get_previous_posts_link();
				if ( $prev_post ) :
					?>
					<a href="<?php echo esc_url( get_previous_posts_page_link() ); ?>">Next</a>
					<?php endif; ?>
				</li>
			</ul>
		</nav>
	</main>

<?php
get_sidebar();
get_footer();
