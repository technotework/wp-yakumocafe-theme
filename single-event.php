<?php
/**
 * The template for displaying event single posts
 *
 * @package yakumocafe
 */

get_header();
?>

	<!--main-->
	<main class="p-main">
		<article class="p-main__article">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'event' );
				?>
					<nav>
						<ul class="p-paging u-center l-flex-both-vcenter">
							<li class="p-paging__back  l-flex-vcenter">
								<?php
									$next_post = twpp_get_adjacent_post_url( false );
								if ( $next_post ) :
									?>
									<a href="<?php echo esc_url( $next_post ); ?>">Back</a>
								<?php endif; ?>
							</li>
							<li class="p-paging__next l-flex-vcenter">
							<?php
									$prev_post = twpp_get_adjacent_post_url( true );
							if ( $prev_post ) :
								?>
								<a href="<?php echo esc_url( $prev_post ); ?>">Next</a>
								<?php endif; ?>
							</li>
						</ul>
					</nav>
				<?php
			endwhile;
			?>
		</article>
	</main>



<?php
get_sidebar();
get_footer();
