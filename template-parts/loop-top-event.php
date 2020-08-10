<?php
/**
 * Top page event loop
 *
 *  @package yakumocafe
 */

?>
<li class="p-content-event__listitem">
	<a href="<?php the_permalink(); ?>">
		<figure>

			<div class="p-content-event__image u-ishadow"
				style="background-image:url(
					<?php
					echo esc_url( get_field( 'event_thumb' ) );
					?>
				)">
			</div>

			<figcaption class="p-content-event__text c-caption">
			<?php
					echo esc_html( get_field( 'event_lead' ) );
			?>
			</figcaption>
		</figure>
	</a>
</li>
