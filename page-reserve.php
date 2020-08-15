<?php
/**
 * The template for About Page
 *
 * @package yakumocafe
 */

get_header();
?>
<!--main-->
<main class="p-main">
	<article>
		<!--ごあいさつ-->
		<section>
			<div class="u-i-center">
				<h3 class="c-h__article p-h__article">ご予約</h3>
			</div>
			<!--コンテンツ-->
			<div class="p-full u-center ">


				<?php
				if ( ! isset( $_GET['ymd'] ) ) :
					?>
				<!--tel reserve-->	
				<!--パラメータつきの時は出さない-->
				<div class="reserve-tel">
					<section>
						<h4 class="c-h__content2 p-h__content2">お電話でのご予約</h4>
						<p class="c-para">
							お電話でのご予約をご希望の場合は下記電話番号までおかけください。
						</p>

						<div class="reserve-tel__info l-flex-vcenter u-center">
							<span class="reserve-tel__info-label">お電話でのご予約</span>
							<span class="reserve-tel__info-number"><a href="tel:042000000">042 - 000 - 000</a></span>
						</div>
					</section>
				</div>
					<?php
						endif;
				?>

				<!--web reserve-->
				<div class="reserve-web">
					<section>
						<h4 class="c-h__content2 p-h__content2">Webからのご予約</h4>
						<p class="c-para">
							Webからのご予約をご希望の場合は以下のカレンダーからご希望の日時をご選択の上、ご連絡先を入力してください。<br />
							都合によりご予約が承れない場合、お電話でご連絡いたします。
						</p>

						<div class="reserve-web__system">
							<?php echo do_shortcode( '[monthly_calendar id="211" class="reserve-web__calendar" type="dev"]' ); ?>
						</div>
					</section>
				</div>

				
			</div>
		</section>

	</article>
</main>

<?php
get_sidebar();
get_footer();
