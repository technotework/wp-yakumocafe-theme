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
			<section>
				<div class="u-i-center">
					<h3 class="c-h__article p-h__article">ごあいさつ</h3>
				</div>
				
				<?php
					while ( have_posts() ) :
						the_post();

						
						the_content();
				
						

					endwhile; // End of the loop.
					?>


			</section>

		</article>
	</main>

<?php
get_sidebar();
get_footer();
