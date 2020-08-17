<?php
/**
 * The header for guide
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
	<header class="p-guide-header">

		<div class="p-guide-header__container">
			<!--greenline-->
			<div class="p-guide-header__contents u-center">
				<div class="p-guide-header__copy">調布のまちの珈琲店 YAKUMO CAFEによる調布タウンガイド</div>
				<a href="/">
					<h1 class="p-guide-header__logo">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/guide_logo.gif' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="c-res-img">
					</h1>
				</a>

				<div class="p-guide-header__badge">
					<a href="/guide">
					<h2>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/chofu_badge.png' ); ?>" alt="CHOFU GUIDE" class="c-res-img">
					</h2>	
				</a>
				</div>
			</div>
		</div>

	</header>
