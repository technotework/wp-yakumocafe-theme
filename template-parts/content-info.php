<?php
/**
 * The template for displaying info single posts
 *
 * @package yakumocafe
 */

?>
<section class="p-section__second">

<div class="u-i-center">
	<time datetime="<?php the_time( 'Y/m/d' ); ?>" class="p-h__timestamp "><?php the_time( 'Y/m/d' ); ?></time>
	<h3 class="c-h__article p-h__article"><?php the_title(); ?></h3>
</div>
<!--コンテンツ-->
<div class="p-both-indent u-center">
	<section>
	<?php the_content(); ?>
	</section>
</div>
</section>