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
		<article>
			<!--ごあいさつ-->
			<section>
				<div class="u-i-center">
					<h3 class="c-h__article p-h__article">ご予約</h3>
				</div>

				<!--コンテンツ-->
				<div class="p-full u-center ">

					<div class="reserve-form">
						<?php
						while ( have_posts() ) :
							the_post();

							the_content();

							endwhile; // End of the loop.
						?>
					</div>
				</div>

			</section>

		</article>
	</main>

<?php
get_sidebar();
get_footer();
