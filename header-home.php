<?php
/**
 * The header for top
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
	<!--header-->
	<header class="p-top-header js-top-header">

		<!--logo-->
		<h1 class="p-top-header__logo">
			<div class="p-top-header__logo-img">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top_logo.gif' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="c-res-img">
			</div>
		</h1>
		<!--badge-->
		<div class="p-top-header__badge">
			<a href="/guide"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/chofu_badge.png' ); ?>" alt="CHOFU GUIDE" class="c-res-img"></a>
		</div>

		<!--mainImage-->
		<div class="p-top-header-main">

			<svg class="p-top-header-main__mask" height="0" width="0">

				<clipPath id="mask" clipPathUnits="objectBoundingBox">
					<path transform="scale(0.00075975,0.001532)"
						d=" M0,0V558.07S71,647,198.35,647c157.12,0,224.83-101.42,224.83-101.42S471.47,603,555.58,603C623.32,603,666,547.57,666,547.57S708.68,603,776.42,603c84.11,0,132.4-57.45,132.4-57.45S976.53,647,1133.65,647C1261,647,1332,558.07,1332,558.07V0Z" />
				</clipPath>

			</svg>

			<svg class="p-top-header-main__image">
				<image xlink:href="<?php echo esc_url( get_template_directory_uri() . '/images/top_main.jpg' ); ?>" width="100%" height="100%" clip-path="url(#mask)" />
			</svg>

		</div>

		<!--seo copy here-->
		<div class="p-top-header__copyline">
		</div>

		<!--装飾要素-->
		<div class="p-top-header__onepoint">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top_cloud_deco.gif' ); ?>" class="c-res-img">
		</div>
		<!--nav-->
		<nav class="p-top-header-nav">
			<?php
				$args = array(

					'menu'       => 'top',
					'menu_class' => 'p-top-header-nav__list l-flex-center',
					'container'  => false,
				);
				wp_nav_menu( $args );
				?>
		</nav>
	</header>
