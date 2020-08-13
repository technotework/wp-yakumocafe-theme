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
			<template v-if="isPanelShow">
				<div id="p-guide-panel" class="l-flex">
					<figure>
						<img :src="getPanelInfo.img" :alt="getPanelInfo.title" class="c-res-img" />
					</figure>
					<div>
						<section>
							<h3>{{getPanelInfo.title}}</h3>
						</section>
						<p>
							{{getPanelInfo.text}}
						</p>
					</div>
					<div class="p-guide_panel__close"></div>
				</div>
			</template>
			
			
		</div>
	</article>
</main>

<?php
get_footer();
