<?php
/**
 * The header
 *
 *  @package yakumocafe
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<?php get_template_part( 'template-parts/header-meta' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="pagetop">
<?php wp_body_open(); ?>
	<header class="p-header js-header">

		<div class="p-header__container">
			<!--greenline-->
			<div class="p-header__contents u-center">
				<a href="/">
					<h1 class="p-header__logo">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/second-logo.gif' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="c-res-img">
					</h1>
				</a>

				<div class="p-header__badge">
					<a href="/guide"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/chofu_badge.png' ); ?>" alt="CHOFU GUIDE" class="c-res-img"></a>
				</div>

				<!--nav-->
				<nav class="p-header-nav">
					<?php
					$args = array(

						'menu'       => 'second',
						'menu_class' => 'p-header-nav__list l-flex-vcenter',
						'container'  => false,
					);
					wp_nav_menu( $args );
					?>
				</nav>

			</div>
		</div>

		<!--タイトル-->
		<div class="p-header-title u-center">
			<h2 class="p-h__page c-h__page u-center">
			<?php
			if ( is_page() ) {

				$h2_page_title = get_post_field( 'post_name', get_post() );

				if ( 'booking-form' === $h2_page_title || 'booking-thanks' === $h2_page_title ) {

					$h2_page_title = 'reserve';
				}
				echo esc_html( strtoupper( $h2_page_title ) );
			} elseif ( is_404() ) {

				echo 'NOT FOUND';

			} else {

				echo esc_html( get_post_type_object( get_post_type() )->label );
			}
			?>
			</h2>
		</div>

		<!--ぱんくず-->
		<div class="p-header-pan u-center">
			<ul class="l-flex-vcenter">
				<li><a href="/">HOME</a></li>
				<li><a href="
				<?php
				if ( is_page() ) {
					$pan_directory = get_post_field( 'post_name', get_post() );

					if ( 'booking-form' === $pan_directory ) {
						$pan_directory = 'reserve';
					}

					echo esc_html( '/' . $pan_directory );
				} elseif ( is_404() ) {

					echo '/';

				} else {
					echo esc_html( '/' . get_post_type_object( get_post_type() )->name );
				}
				?>
				">	
				<?php
				if ( is_page() ) {
					$h2_page_title = get_post_field( 'post_name', get_post() );

					if ( 'booking-form' === $h2_page_title || 'booking-thanks' === $h2_page_title ) {

						$h2_page_title = 'reserve';
					}
					echo esc_html( strtoupper( $h2_page_title ) );
				} elseif ( is_404() ) {

					echo 'NOT FOUND';

				} else {
					echo esc_html( get_post_type_object( get_post_type() )->label );
				}
				?>
				</a></li>
				<?php if ( is_single() ) : ?>
					<li><a href="<?php echo esc_url( get_permalink() ); ?>">Article</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</header>
