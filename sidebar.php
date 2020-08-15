<?php
/**
 * The sidebar containing the main widget area
 *
 * @package yakumocafe
 */

?>

	<!--aside-->
	<aside id="js-aside" class="<?php
	if ( is_front_page() ) {
		echo 'p-aside-wrapper__top';
	} else {
		echo 'p-aside-wrapper';
	}
	?>
	">
		<div class="p-aside">
			<nav class="p-aside-nav">
				<ul>
					<li>
						<a href="/reserve" class="p-aside-nav__info">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/aside-reserve.png' ); ?>" alt="ご予約はこちら" class="c-res-img">
						</a>
					</li>

					<li>
						<a href="" target="_blank" class="p-aside-nav__sns">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/aside-twitter.png' ); ?>" alt="Twitter" target="_blank" class="c-res-img">
						</a>
					</li>

					<li>
						<a href="" target="_blank" class="p-aside-nav__sns">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/aside-facebook.png' ); ?>" alt="Facebook" class="c-res-img">
						</a>
					</li>
					<li>
						<a href="" target="_blank" class="p-aside-nav__sns">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/aside-instagram.png' ); ?>" alt="Instagram" class="c-res-img">
						</a>
					</li>
					<li>
						<a href="" target="_blank" class="p-aside-nav__sns">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/aside-line.png' ); ?>" alt="Line" class="c-res-img">
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</aside>
