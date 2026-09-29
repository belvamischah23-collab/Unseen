<?php
/**
 *  VW Kids Store: Block Patterns
 *
 * @package  VW Kids Store
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-kids-store',
		array( 'label' => __( 'VW Kids Store', 'vw-kids-store' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-kids-store/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:cover {\"customOverlayColor\":\"#ffe6e6\",\"isDark\":false,\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-100 has-background-dim\" style=\"background-color:#ffe6e6\"></span><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"full\",\"className\":\"mx-lg-4 px-lg-4 m-0\"} -->\n<div class=\"wp-block-columns alignfull mx-lg-4 px-lg-4 m-0\"><!-- wp:column {\"width\":\"22.22%\",\"backgroundColor\":\"white\",\"className\":\"banner-section1\"} -->\n<div class=\"wp-block-column banner-section1 has-white-background-color has-background\" style=\"flex-basis:22.22%\"><!-- wp:heading {\"level\":5,\"style\":{\"color\":{\"background\":\"#ffc85b\"}}} -->\n<h5 class=\"wp-block-heading has-background\" style=\"background-color:#ffc85b\">ALL CATEGORIES</h5>\n<!-- /wp:heading -->\n\n<!-- wp:woocommerce/product-categories {\"className\":\"banner-section1-shop-categories\"} /-->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"77.77%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:77.77%\"><!-- wp:cover {\"url\":\"" . get_theme_file_uri() . "/inc/block-patterns/images/banner.png\",\"id\":2161,\"dimRatio\":0,\"className\":\"banner-section2\"} -->\n<div class=\"wp-block-cover banner-section2\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-2161\" alt=\"\" src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"banner-section-main-class px-lg-5\"} -->\n<div class=\"wp-block-columns banner-section-main-class px-lg-5\"><!-- wp:column {\"width\":\"66.66%\",\"className\":\"baner-section3\"} -->\n<div class=\"wp-block-column baner-section3\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"50px\"}},\"textColor\":\"white\"} -->\n<h1 class=\"wp-block-heading has-text-align-left has-white-color has-text-color\" style=\"font-size:50px\">THE TREE PET RABIT</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"textColor\":\"white\"} -->\n<p class=\"has-text-align-left has-white-color has-text-color\">Make Play time a blast with our finest toys and gamessimply     dummy text of the    printing and typesetting industry. Lorem Ipsum when an unknown printer took a galley of type and scrambled.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"typography\":{\"fontSize\":\"18px\"}},\"className\":\"banner-section2-button is-style-fill\"} -->\n<div class=\"wp-block-button has-custom-font-size banner-section2-button is-style-fill\" style=\"font-size:18px\"><a class=\"wp-block-button__link wp-element-button\">SHOP NOW</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\",\"className\":\"baner-section4\"} -->\n<div class=\"wp-block-column baner-section4\" style=\"flex-basis:33.33%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-kids-store/category-section',
		array(
			'title'      => __( 'category-section', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:group {\"className\":\"category-section py-5\"} -->\n<div class=\"wp-block-group category-section py-5\"><!-- wp:columns {\"className\":\"category-section \"} -->\n<div class=\"wp-block-columns category-section\"><!-- wp:column {\"className\":\"category-section1\"} -->\n<div class=\"wp-block-column category-section1\"><!-- wp:image {\"align\":\"center\",\"id\":2209,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category1.png\" alt=\"\" class=\"wp-image-2209\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"white\"} -->\n<h3 class=\"has-text-align-center has-white-color has-text-color\">STUFFED TOYS</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"category-section2 text-center\"} -->\n<div class=\"wp-block-column category-section2 text-center\"><!-- wp:image {\"align\":\"center\",\"id\":2210,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category2.png\" alt=\"\" class=\"wp-image-2210\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"white\"} -->\n<h3 class=\"has-text-align-center has-white-color has-text-color\">LEARNING TOYS</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"category-section3\"} -->\n<div class=\"wp-block-column category-section3\"><!-- wp:image {\"align\":\"center\",\"id\":2211,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category3.png\" alt=\"\" class=\"wp-image-2211\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"white\"} -->\n<h3 class=\"has-text-align-center has-white-color has-text-color\">CHEWABLE TOYS</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
register_block_pattern(
	'vw-kids-store/blindbox-promo-banner',
	array(
		'title'      => __( 'Blind Box Promo Banner', 'vw-kids-store' ),
		'categories' => array( 'vw-kids-store' ),
		'content'    => "<!-- wp:cover {\"customOverlayColor\":\"#12265a\",\"isDark\":true,\"align\":\"full\",\"className\":\"vwks-blindbox-banner\"} -->
<div class=\"wp-block-cover alignfull is-dark vwks-blindbox-banner\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-100 has-background-dim\" style=\"background-color:#12265a\"></span><div class=\"wp-block-cover__inner-container\">
 
<!-- wp:heading {\"textAlign\":\"center\",\"level\":2,\"style\":{\"typography\":{\"fontSize\":\"42px\"}},\"textColor\":\"white\"} -->
<h2 class=\"wp-block-heading has-text-align-center has-white-color has-text-color\" style=\"font-size:42px\">🎁 MISTERI BLIND BOX SUDAH DATANG!</h2>
<!-- /wp:heading -->
 
<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"white\"} -->
<p class=\"has-text-align-center has-white-color has-text-color\">Pilih satu box, dan temukan item spesial yang menanti di dalamnya — dari Common sampai yang paling langka, Secret Item!</p>
<!-- /wp:paragraph -->
 
<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"typography\":{\"fontSize\":\"18px\"}},\"className\":\"is-style-fill\"} -->
<div class=\"wp-block-button has-custom-font-size is-style-fill\" style=\"font-size:18px\"><a class=\"wp-block-button__link wp-element-button\" href=\"" . esc_url( home_url( '/mainkan-blind-box/' ) ) . "\">MAINKAN SEKARANG</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
 
</div></div>
<!-- /wp:cover -->",
	)
);

	register_block_pattern(
		'vw-kids-store/video-photo-section',
		array(
			'title'      => __( 'Homepage Video & Foto', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:group {\"className\":\"vwks-video-photo-section py-5\"} -->
<div class=\"wp-block-group vwks-video-photo-section py-5\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":2,\"style\":{\"color\":{\"text\":\"#12265a\"}}} -->
<h2 class=\"wp-block-heading has-text-align-center\" style=\"color:#12265a\">Lihat Toko Kami Lebih Dekat</h2>
<!-- /wp:heading -->

<!-- wp:columns {\"align\":\"wide\"} -->
<div class=\"wp-block-columns alignwide\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:embed {\"url\":\"https://youtu.be/f3z3KhkzHfo\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"large\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/banner.png\" alt=\"Ganti dengan foto produk atau toko kamu\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->",
		)
	);

	$vwks_catalog_item = "<!-- wp:group {\"className\":\"vwks-catalog-item\"} -->
<div class=\"wp-block-group vwks-catalog-item\"><!-- wp:image {\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category1.png\" alt=\"Ganti dengan foto produk kamu\"/></figure>
<!-- /wp:image -->

<!-- wp:heading {\"level\":4} -->
<h4 class=\"wp-block-heading\">Nama Produk</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {\"className\":\"vwks-catalog-price\"} -->
<p class=\"vwks-catalog-price\">Rp 000.000</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

";

	register_block_pattern(
		'vw-kids-store/catalog-grid-template',
		array(
			'title'      => __( 'Katalog Produk — Template Grid', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:group {\"className\":\"vwks-catalog-template py-4\"} -->
<div class=\"wp-block-group vwks-catalog-template py-4\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":2,\"style\":{\"color\":{\"text\":\"#12265a\"}}} -->
<h2 class=\"wp-block-heading has-text-align-center\" style=\"color:#12265a\">Katalog Produk</h2>
<!-- /wp:heading -->

<!-- wp:columns {\"align\":\"wide\"} -->
<div class=\"wp-block-columns alignwide\">
<!-- wp:column -->
<div class=\"wp-block-column\">" . $vwks_catalog_item . $vwks_catalog_item . "</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class=\"wp-block-column\">" . $vwks_catalog_item . $vwks_catalog_item . "</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class=\"wp-block-column\">" . $vwks_catalog_item . $vwks_catalog_item . "</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class=\"wp-block-column\">" . $vwks_catalog_item . $vwks_catalog_item . "</div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->",
		)
	);

	register_block_pattern(
		'vw-kids-store/product-detail-template',
		array(
			'title'      => __( 'Halaman Produk — Template (ala Pop Mart)', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:group {\"className\":\"vwks-product-detail-template py-4\"} -->
<div class=\"wp-block-group vwks-product-detail-template py-4\"><!-- wp:paragraph {\"className\":\"woocommerce-breadcrumb\"} -->
<p class=\"woocommerce-breadcrumb\">Beranda / Kategori / Nama Produk</p>
<!-- /wp:paragraph -->

<!-- wp:columns {\"align\":\"wide\"} -->
<div class=\"wp-block-columns alignwide\"><!-- wp:column {\"width\":\"45%\",\"className\":\"vwks-product-gallery\"} -->
<div class=\"wp-block-column vwks-product-gallery\" style=\"flex-basis:45%\"><!-- wp:image {\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"vwks-product-gallery-main\"} -->
<figure class=\"wp-block-image size-large vwks-product-gallery-main\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category1.png\" alt=\"Ganti dengan foto utama produk\"/></figure>
<!-- /wp:image -->

<!-- wp:columns {\"className\":\"vwks-product-gallery-thumbs\"} -->
<div class=\"wp-block-columns vwks-product-gallery-thumbs\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"thumbnail\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-thumbnail\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category1.png\" alt=\"Foto produk tampak 1\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"thumbnail\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-thumbnail\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category2.png\" alt=\"Foto produk tampak 2\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"thumbnail\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-thumbnail\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category3.png\" alt=\"Foto produk tampak 3\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"thumbnail\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-thumbnail\"><img src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category1.png\" alt=\"Foto produk tampak 4\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {\"width\":\"55%\",\"className\":\"vwks-product-info\"} -->
<div class=\"wp-block-column vwks-product-info\" style=\"flex-basis:55%\"><!-- wp:paragraph {\"className\":\"vwks-shipping-banner\"} -->
<p class=\"vwks-shipping-banner\">⚡ LOCAL EXPRESS — Estimasi pengiriman 2-3 hari.</p>
<!-- /wp:paragraph -->

<!-- wp:group {\"className\":\"vwks-product-top-row\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"space-between\"}} -->
<div class=\"wp-block-group vwks-product-top-row\"><!-- wp:paragraph {\"className\":\"vwks-product-badge\"} -->
<p class=\"vwks-product-badge\">POPULER</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {\"className\":\"vwks-product-icons\"} -->
<p class=\"vwks-product-icons\"><span>🔗</span><span>♡</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {\"level\":1} -->
<h1 class=\"wp-block-heading\">Nama Produk</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {\"className\":\"vwks-product-price\"} -->
<p class=\"vwks-product-price\">Rp 000.000</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {\"className\":\"vwks-product-quantity\"} -->
<p class=\"vwks-product-quantity\"><strong>Jumlah:</strong> 1</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"className\":\"vwks-product-buttons\"} -->
<div class=\"wp-block-buttons vwks-product-buttons\"><!-- wp:button {\"width\":100,\"className\":\"is-style-fill\"} -->
<div class=\"wp-block-button has-custom-width wp-block-button__width-100 is-style-fill\"><a class=\"wp-block-button__link wp-element-button\">TAMBAH KE KERANJANG</a></div>
<!-- /wp:button -->

<!-- wp:button {\"width\":100,\"className\":\"is-style-outline\"} -->
<div class=\"wp-block-button has-custom-width wp-block-button__width-100 is-style-outline\"><a class=\"wp-block-button__link wp-element-button\">BERITAHU SAAT MULAI</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:heading {\"level\":4} -->
<h4 class=\"wp-block-heading\">Detail</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Merek: Ganti nama brand<br>Ukuran Produk: Ganti ukuran<br>Bahan: Ganti bahan</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"level\":4} -->
<h4 class=\"wp-block-heading\">Pengiriman &amp; Layanan Purnajual</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Tulis info pengiriman &amp; garansi produk di sini.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->",
		)
	);

	register_block_pattern(
		'vw-kids-store/homepage-lengkap',
		array(
			'title'      => __( 'Homepage Lengkap — Insert Semua Section', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:pattern {\"slug\":\"vw-kids-store/hero-image-banner\"} /-->

<!-- wp:pattern {\"slug\":\"vw-kids-store/hero-video-banner\"} /-->

<!-- wp:pattern {\"slug\":\"vw-kids-store/blindbox-promo-banner\"} /-->

<!-- wp:pattern {\"slug\":\"vw-kids-store/catalog-grid-template\"} /-->",
		)
	);

	register_block_pattern(
		'vw-kids-store/hero-image-banner',
		array(
			'title'      => __( 'Hero Banner Produk (Gambar) — ala Uniqlo', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . get_theme_file_uri() . "/inc/block-patterns/images/category1.png\",\"dimRatio\":30,\"minHeight\":560,\"minHeightUnit\":\"px\",\"contentPosition\":\"center left\",\"align\":\"full\",\"className\":\"vwks-hero-image\"} -->
<div class=\"wp-block-cover alignfull vwks-hero-image\" style=\"min-height:560px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-30 has-background-dim\"></span><img class=\"wp-block-cover__image-background\" alt=\"\" src=\"" . get_theme_file_uri() . "/inc/block-patterns/images/category1.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\">

<!-- wp:paragraph {\"className\":\"vwks-hero-badge\"} -->
<p class=\"vwks-hero-badge\">LIMITED OFFER</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"level\":1,\"textColor\":\"white\",\"style\":{\"typography\":{\"fontSize\":\"40px\"}}} -->
<h1 class=\"wp-block-heading has-white-color has-text-color\" style=\"font-size:40px\">Nama Produk Unggulan</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {\"textColor\":\"white\",\"style\":{\"typography\":{\"fontSize\":\"16px\"}}} -->
<p class=\"has-white-color has-text-color\" style=\"font-size:16px;max-width:480px\">Deskripsi singkat produk unggulan kamu di sini — bahan, keunggulan, atau alasan kenapa produk ini spesial.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {\"className\":\"vwks-hero-price\"} -->
<p class=\"vwks-hero-price\">Rp199.000 <span class=\"vwks-hero-price-old\">Rp299.000</span></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-fill\"} -->
<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link wp-element-button\" href=\"#\">Belanja Sekarang</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div></div>
<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-kids-store/hero-video-banner',
		array(
			'title'      => __( 'Hero Banner Video — ala Uniqlo', 'vw-kids-store' ),
			'categories' => array( 'vw-kids-store' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"className\":\"vwks-hero-video\"} -->
<div class=\"wp-block-group alignfull vwks-hero-video\">
<!-- wp:html -->
<div class=\"vwks-hero-video-bg\"><iframe src=\"https://www.youtube.com/embed/f3z3KhkzHfo?autoplay=1&mute=1&loop=1&playlist=f3z3KhkzHfo&controls=0&showinfo=0&modestbranding=1&rel=0\" title=\"Video Koleksi\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>
<!-- /wp:html -->

<div class=\"vwks-hero-video-overlay\">
<!-- wp:heading {\"level\":2,\"textColor\":\"white\",\"style\":{\"typography\":{\"fontSize\":\"32px\"}}} -->
<h2 class=\"wp-block-heading has-white-color has-text-color\" style=\"font-size:32px\">Koleksi Terbaru</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"textColor\":\"white\"} -->
<p class=\"has-white-color has-text-color\">Deskripsi singkat koleksi terbaru — tersedia sekarang di toko kami.</p>
<!-- /wp:paragraph -->
</div>
</div>
<!-- /wp:group -->",
		)
	);
}