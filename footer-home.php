<?php
/**
 * The template for displaying the footer
 *
 * @package yakumocafe
 */

?>

<!--footer-->
<footer class="p-footer js-footer">
	<div class="p-footer__container">


		<div class="p-footer__content-group u-center l-flex-center">
			<div class="js-pagetop p-footer__pagetop">
				<a href="#pagetop">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/pagetop.gif' ); ?>"
						alt="pagetop" class="c-res-img"></a>
			</div>

			<nav class="p-footer-nav c-footerNav">

				<?php
					$args = array(

						'menu'       => 'footer',
						'menu_class' => 'p-footer-nav__list',
						'container'  => false,
					);
					wp_nav_menu( $args );
					?>

				<div class="p-footer-nav__chofu-alt l-flex-vcenter">
					<a href="/guide">
						CHOFU GUIDE
					</a>
					<div class="p-footer-nav__chofu-logo">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-citylogo.png' ); ?>"
							alt="CHOFU GUIDE" class="c-res-img">
					</div>
				</div>

			</nav>

			<div class="p-footer-nav__logo">
				<a href="/">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-logo.png' ); ?>"
						alt="YAKUMO CAFE" class="c-res-img">
				</a>
			</div>

			<div class="p-footer-nav__place">
				<div class="p-footer-nav__chofu l-flex-vcenter">
					<a href="/guide">
						CHOFU GUIDE
					</a>
					<div class="p-footer-nav__chofu-logo">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-citylogo.png' ); ?>"
							alt="CHOFU GUIDE" class="c-res-img">
					</div>
				</div>
				<div class="p-footer-nav__address">
					182-0015<br />
					東京都調布市八雲台1-2-3<br />
					<a href="tel:042-000-000">TEL:042-000-000</a>
				</div>
			</div>
		</div>

		<small class="p-footer__copy u-center">&copy; 2020 YAKUMO CAFE</small>
	</div>
</footer>

<!--AdobeFont-->
<script>
(function(d) {
	var config = {
			kitId: 'qdv7kse',
			scriptTimeout: 3000,
			async: true
		},
		h = d.documentElement,
		t = setTimeout(function() {
			h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
		}, config.scriptTimeout),
		tk = d.createElement("script"),
		f = false,
		s = d.getElementsByTagName("script")[0],
		a;
	h.className += " wf-loading";
	tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
	tk.async = true;
	tk.onload = tk.onreadystatechange = function() {
		a = this.readyState;
		if (f || a && a != "complete" && a != "loaded") return;
		f = true;
		clearTimeout(t);
		try {
			Typekit.load(config)
		} catch (e) {}
	};
	s.parentNode.insertBefore(tk, s)
})(document);
</script>
<?php wp_footer(); ?>

<!--moble menu-->
<div class="p-mobile-nav-wrapper">
	<div class="p-mobile-nav-container">
		<div class="p-mobile-nav-container__btn js-mobile-nav-btn">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/mini-nav.png' ); ?>" class="c-res-img"
				alt="ナビ">
		</div>

		<!--nav-->
		<nav class="p-mobile-nav js-mobile-nav">
			<?php
				$args = array(

					'menu'       => 'top_mobile',
					'menu_class' => 'p-mobile-nav__list',
					'container'  => false,
				);
				wp_nav_menu( $args );
				?>
		</nav>
	</div>
	<div class="c-fullscreen p-mobile-nav__full js-mobile-nav-fullscreen"></div>
</div>
<!--/moble menu-->
</body>

</html>