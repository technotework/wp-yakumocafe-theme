<?php
/**
 * Top page recommend loop
 *
 *  @package yakumocafe
 */

?>

<li class="p-content-monthly__container">
	<figure class="p-content-monthly__fig">
		<div class="u-ishadow p-content-monthly__image">
			<img src="
			<?php
			echo esc_url( get_field( 'rec_img' ) );
			?>
			"
				alt="" class="c-res-img">
		</div>
		<figcaption class="p-content-monthly__text c-caption u-center">
			<?php
				echo esc_html( get_field( 'rec_caption' ) );
			?>
		</figcaption>
	</figure>
	<div class="p-content-monthly__badge">
	<?php
		echo esc_html( get_field( 'rec_month' ) );
	?>
	</div>
</li>
