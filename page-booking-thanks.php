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
					<h3 class="c-h__article p-h__article">ご予約</h3>
				</div>

				<div class="p-reserve-thanks">
					<p class="p-para">
					ご予約を承りました。ありがとうございました。<br>
					後ほど確認のご連絡をお送りいたします。</p>

					<a href="/" class="p-button__primary c-button__primary">
						HOME
					</a>
				<?php
					while ( have_posts() ) :
						the_post();

						
						the_content();
				
						

					endwhile; // End of the loop.
					?>
				</div>

			</section>

		</article>
	</main>

<?php
get_footer();
