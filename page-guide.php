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
				<ul class="p-guide-nav">
					<li class="p-guide-nav__item">
						<label for="shop">
							<input type="checkbox" id="shop" value="shop" />
							ショップ
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="amuse">
							<input type="checkbox" id="amuse" value="amuse" />
							アミューズメント
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="nature">
							<input type="checkbox" id="nature" value="nature" />
							公園と自然
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="shrine">
							<input type="checkbox" id="shrine" value="shrine" />
							神社仏閣
						</label>
					</li>
				</ul>
			</nav>
			<div id="guide-map"></div>
			<!--パネル-->
			<div class="js-guide-panel p-guide-panel l-flex">
				<figure class="p-guide-panel__img">
					<img alt="getPanelInfo.title" class="js-panel-img c-res-img" />
				</figure>
				<div class="p-guide-panel__content">
					<section>
						<h3 class="js-panel-title"></h3>
						<p class="js-panel-p"></p>
					</section>
				</div>
				<div class="p-guide_panel__close js-panel-close">x</div>
			</div>
		</div>
	</article>
</main>

<?php
get_footer();
