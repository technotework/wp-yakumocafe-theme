<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package yakumocafe
 */

get_header();
?>

<main class="p-main">
		<article>
			<!--notfound-->
			<section class="p-section__second">

				<div class="p-notfound">
					<h3 class="p-notfound__img">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/notfound.png' ); ?>" alt="お探しのページは見つかりませんでした。" class="c-res-img">
					</h3>
					<p class="p-notfound__text c-para">
						お探しのページは見つかりませんでした。<br>
						公開が終了したかアドレスが<br>
						間違っている可能性があります。
					</p>
				</div>


			</section>
		</article>
	</main>

<?php
get_sidebar();
get_footer();
