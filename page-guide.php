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
							<input type="checkbox" id="shop" v-model="cb.shop" />
							ショップ
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="amuse">
							<input type="checkbox" id="amuse" v-model="cb.amuse" />
							アミューズメント
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="nature">
							<input type="checkbox" id="nature" v-model="cb.nature" />
							公園と自然
						</label>
					</li>
					<li class="p-guide-nav__item">
						<label for="shrine">
							<input type="checkbox" id="shrine" v-model="cb.nature" />
							神社仏閣
						</label>
					</li>
				</ul>
			</nav>

			<!--パネル-->
			<template v-if="isPanelShow">
				<div id="p-guide-panel" class="l-flex">
					<figure>
						<img :src="place.img" :alt="place.title" class="c-res-img" />
					</figure>
					<div>
						<section>
							<h3>{{place.title}}</h3>
						</section>
						<p>
							{{place.text}}
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
