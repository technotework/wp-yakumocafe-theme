<?php
/**
 * The template for About Page
 *
 * @package yakumocafe
 */

get_header( 'guide' );
?>
<!--main-->
<main class="p-main">
	<article class="p-content-about">
		<div id="app">

			<!--ナビ-->
			<nav>
				<ul class="p-guide-nav l-flex">
					<li class="p-guide-nav__item">
						<label for="nature">
							<input type="checkbox" name="nature" id="nature" value="nature" />
							公園と自然
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="shrine">
							<input type="checkbox" name="shrine" id="shrine" value="shrine" />
							神社仏閣
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="shop">
							<input type="checkbox" name="shop" id="shop" value="shop" />
							ショップ
						</label>
					</li>
					<li class="p-guide-nav__item">
					<label for="amuse">
							<input type="checkbox" name="amuse" id="amuse" value="amuse" />
							アミューズメント
						</label>
					</li>
				</ul>
			</nav>
			<div id="guide-map"></div>
			<!--パネル-->
			<div class="js-guide-panel p-guide-panel">
				<div class="p-guide-panel__container  l-flex-nw u-center">
					<figure class="p-guide-panel__img">
						<img alt="getPanelInfo.title" class="js-panel-img c-res-img" />
					</figure>
					<div class="p-guide-panel__content">
						<section>
							<h3 class="js-panel-title p-h__content1 c-h__content1"></h3>
							<p class="js-panel-p c-para"></p>
						</section>
					</div>
					<div class="p-guide-panel__close js-panel-close">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/guide-close.png' ); ?>" alt="close" class="c-res-img">
					</div>
					<div class="p-guide-panel__cloud">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/guide-cloud.png' ); ?>" alt="" class="c-res-img">
					</div>
				</div>
			</div>
		</div>
	</article>
	<div class="c-fullscreen p-fullscreen js-fullscreen"></div>
</main>

<?php
get_footer();
