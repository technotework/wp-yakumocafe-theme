<?php
/**
 * The template for displaying menu single posts
 *
 * @package yakumocafe
 */

?>
<li class="p-content-menulist-item" id="<?php echo esc_html( $kind->name ); ?>">
	<section class="l-flex">
		<figure class="p-content-menulist-item__fig u-ishadow">
			<img src="
			<?php
					echo esc_html( get_field( 'menu_img' ) );
			?>
				" alt="
				<?php
				echo esc_html( get_field( 'menu_title' ) );
				?>
			" class="c-res-img">
		</figure>
		<div class="p-content-menulist-item__description">
			<h4 class="p-h__content1 c-h__content1">
				<?php
					echo esc_html( get_field( 'menu_title' ) );
				?>
			</h4>
			<p class="c-para">
				<?php
					echo esc_html( get_field( 'menu_text' ) );
				?>
				<br />
				<?php
					echo esc_html( get_field( 'menu_price' ) . ' yen' );
				?>
			</p>
		</div>
	</section>
</li>
