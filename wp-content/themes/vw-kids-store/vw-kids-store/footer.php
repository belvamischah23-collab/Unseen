<?php
/**
 * Footer khusus VW Kids Store — override penuh footer.php tema induk.
 * Struktur proper untuk e-commerce: About, Quick Links, Customer Service, Newsletter, Copyright bar.
 *
 * @package VW Kids Store
 */
?>
	<footer role="contentinfo" class="vwks-footer">
		<div class="vwks-footer-main">
			<div class="container">
				<div class="row vwks-footer-columns">

					<div class="col-lg-3 col-md-6 col-xs-12 vwks-footer-col">
						<h3 class="widget-title"><?php bloginfo( 'name' ); ?></h3>
						<p class="vwks-footer-about">Temukan koleksi figure &amp; mainan koleksi favoritmu, lengkap dengan pengalaman belanja Blind Box yang seru.</p>
						<div class="vwks-footer-social">
							<a href="#" aria-label="Instagram">IG</a>
							<a href="#" aria-label="TikTok">TT</a>
							<a href="#" aria-label="Facebook">FB</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-xs-12 vwks-footer-col">
						<h3 class="widget-title">Belanja</h3>
						<ul>
							<li><a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/katalog-produk/' ) ); ?>">Katalog Produk</a></li>
							<li><a href="<?php echo esc_url( home_url( '/blindbox/' ) ); ?>">Blind Box</a></li>
							<li><a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'cart' ) : home_url( '/keranjang/' ) ); ?>">Keranjang</a></li>
							<li><a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ); ?>">Akun Saya</a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-md-6 col-xs-12 vwks-footer-col">
						<h3 class="widget-title">Layanan Pelanggan</h3>
						<ul>
							<li><a href="#">Cara Belanja</a></li>
							<li><a href="#">Pengiriman &amp; Pengembalian</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Hubungi Kami</a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-md-6 col-xs-12 vwks-footer-col">
						<h3 class="widget-title">Newsletter</h3>
						<p class="vwks-footer-about">Dapetin info produk baru &amp; promo blind box duluan.</p>
						<form class="vwks-newsletter-form" onsubmit="return false;">
							<input type="email" placeholder="Email kamu" required />
							<button type="submit">Kirim</button>
						</form>
					</div>

				</div>
			</div>
		</div>

		<div class="vwks-footer-bottom">
			<div class="container">
				<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
				<div class="vwks-footer-payments">
					<span>COD</span><span>Transfer Bank</span><span>QRIS</span>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>

	</body>
</html>
