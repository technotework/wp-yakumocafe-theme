<?php
/**
 * The template for displaying event single posts
 *
 * @package yakumocafe
 */

?>
<section class="p-section__second">

<div class="u-i-center">
<time datetime="<?php the_time( 'Y/m/d' ); ?>" class="p-h__timestamp "></time>
	<h3 class="c-h__article p-h__article"><?php the_title(); ?></h3>
</div>

<div class="p-both-indent u-center">
	<!--コンテンツ-->
	<section class="p-content-event-detail">
		<div class="p-content-event-detail__mainimage u-ishadow">
			<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>" class="c-res-img">
		</div>
		<section>

			<?php the_content(); ?>
		</section>

	</section>

</div>
</section>
