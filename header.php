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
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/common/images/icons/favicon.ico">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header class="p-header">

		<div class="p-header__container">
			<!--greenline-->
			<div class="p-header__contents u-center">

				<h1 class="p-header__logo">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/top_logo.gif' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="c-res-img">
				</h1>

				<div class="p-header__badge">
					<a href=""><img src="<?php echo esc_url( get_template_directory_uri() . '/images/chofu_badge.png' ); ?>" alt="CHOFU GUIDE" class="c-res-img"></a>
				</div>

				<!--nav-->
				<nav class="p-header-nav">
					<ul class="p-header-nav__list l-flex-vcenter">
						<li>
							<a href="">HOME</a>
						</li>
						<li class="--current">
							<a href="">ABOUT</a>
						</li>
						<li>
							<a href="">MENU</a>
						</li>
						<li>
							<a href="">EVENT&amp;TOPICS</a>
						</li>
						<li>
							<a href="">ACCESS</a>
						</li>
						<li>
							<a href="">RESERVE</a>
						</li>
					</ul>
				</nav>

			</div>
		</div>

		<!--タイトル-->
		<div class="p-header-title u-center">
			<h2 class="p-h__page c-h__page u-center">ABOUT</h2>
		</div>

		<!--ぱんくず-->
		<div class="p-header-pan u-center">
			<ul class="l-flex-vcenter">
				<li><a href="">HOME</a></li>
				<li><a href="">ABOUT</a></li>
			</ul>
		</div>
	</header>
