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
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/common/images/icons/favicon.ico">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="pagetop">
<?php wp_body_open(); ?>
	<header class="p-header">

		<div class="p-header__container">
			<!--greenline-->
			<div class="p-header__contents u-center">
				<a href="/">
					<h1 class="p-header__logo">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top_logo.gif' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="c-res-img">
					</h1>
				</a>

				<div class="p-header__badge">
					<a href="/guide"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/chofu_badge.png' ); ?>" alt="CHOFU GUIDE" class="c-res-img"></a>
				</div>
			</div>
		</div>

	</header>
