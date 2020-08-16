<?php
/**
 * Top page info loop
 *
 *  @package yakumocafe
 */

?>
<li class="p-content-eventlist-item">
	<section class="l-flex-nw">
			<figure class="p-content-eventlist-item__fig">
				<a href="<?php the_permalink(); ?>">
					<img src="
						<?php
							echo esc_url( get_field( 'event_thumb' ) );
						?>
							" alt="" class="c-res-img">
				</a>
			</figure>

			<div class="p-content-eventlist-item__description">
				<h4 class="p-h__content1 c-h__content1">
				<a href="<?php the_permalink(); ?>">
					<?php
						the_title();
					?>
				</a>
				</h4>
				<p class="c-para">
				<?php
					echo esc_html( get_field( 'event_lead' ) );
				?>
				</p>
			</div>
	</section>
</li>
