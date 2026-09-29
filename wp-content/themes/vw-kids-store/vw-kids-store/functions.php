<?php
	if ( ! function_exists( 'vw_kids_store_setup' ) ) :

	function vw_kids_store_setup() {
		$GLOBALS['content_width'] = apply_filters( 'vw_kids_store_content_width', 640 );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-background', array(
			'default-color' => 'f1f1f1'
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', vw_kids_font_url() ) );

		// Theme Activation Notice
		global $pagenow;

		// if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		// 	add_action('admin_notices', 'vw_kids_store_activation_notice');
		// }
	}
	endif;

	add_action( 'after_setup_theme', 'vw_kids_store_setup' );

	add_action( 'wp_enqueue_scripts', 'vw_kids_store_enqueue_styles' );
	function vw_kids_store_enqueue_styles() {
    	$parent_style = 'vw-kids-basic-style'; // Style handle of parent theme.
    	
		wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'vw-kids-store-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vw-kids-store-style',$vw_kids_custom_css );
		require get_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vw-kids-store-style',$vw_kids_custom_css );
		wp_enqueue_style( 'vw-kids-store-block-style', get_theme_file_uri('/assets/css/blocks.css') );
		wp_enqueue_style( 'vw-kids-store-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
		wp_enqueue_style( 'owl.carousel-style', get_theme_file_uri().'/assets/css/owl.carousel.css' );
		wp_enqueue_script( 'owl.carousel-js', get_theme_file_uri(). '/assets/js/owl.carousel.js', array('jquery') ,'',true);
		wp_enqueue_script( 'custom-scripts', get_theme_file_uri() . '/assets/js/custom.js', array('jquery'),'' ,true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
			
	add_action( 'init', 'vw_kids_store_remove_parent_function');
	function vw_kids_store_remove_parent_function() {
		remove_action( 'admin_notices', 'vw_kids_activation_notice' );
		remove_action( 'admin_menu', 'vw_kids_gettingstarted' );
		remove_action( 'admin_menu', 'vw_kids_dashboard_menu' );
	}

	function vw_kids_store_customize_register() {
		global $wp_customize;
		$wp_customize->remove_section( 'vw_kids_upgrade_pro_link' );
		$wp_customize->remove_section( 'vw_kids_get_started_link' );

		$wp_customize->remove_setting( 'vw_kids_slider_image_overlay' );
		$wp_customize->remove_control( 'vw_kids_slider_image_overlay' );
		$wp_customize->remove_setting( 'vw_kids_slider_image_overlay_color' );
		$wp_customize->remove_control( 'vw_kids_slider_image_overlay_color' );

	}
	add_action( 'customize_register', 'vw_kids_store_customize_register', 11 );

	

	/**
	 * Enqueue block editor style
	 */
	function vw_kids_store_block_editor_styles() {
	    wp_enqueue_style( 'vw-kids-store-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'vw_kids_store_block_editor_styles' );

	function vw_kids_store_sanitize_choices( $input, $setting ) {
	    global $wp_customize; 
	    $control = $wp_customize->get_control( $setting->id ); 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}

	function vw_kids_store_sanitize_dropdown_pages( $page_id, $setting ) {
	  	$page_id = absint( $page_id );
	  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	/* Theme Widgets Setup */

	function vw_kids_store_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Footer Navigation 1', 'vw-kids-store' ),
			'description'   => __( 'Appears on footer 1', 'vw-kids-store' ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 2', 'vw-kids-store' ),
			'description'   => __( 'Appears on footer 2', 'vw-kids-store' ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 3', 'vw-kids-store' ),
			'description'   => __( 'Appears on footer 3', 'vw-kids-store' ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 4', 'vw-kids-store' ),
			'description'   => __( 'Appears on footer 4', 'vw-kids-store' ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'vw_kids_store_widgets_init' );

// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );


class VW_Kids_Store_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'vw-kids-store';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class VW_Kids_Store_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'VW_Kids_Store_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new VW_Kids_Store_Customize_Section_Pro( $manager, 'vw_kids_store_upgrade_pro_link',
		array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW KIDS STORE PRO', 'vw-kids-store' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-kids-store' ),
			'pro_url'  => esc_url('https://www.buywptemplates.com/products/toy-store-wordpress-theme'),
		)));

		// Register sections.
		$manager->add_section(new VW_Kids_Store_Customize_Section_Pro($manager,'vw_kids_store2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-kids-store' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-kids-store' ),
			'pro_url'  => esc_url('https://demos.buywptemplates.com/demo/docs/free-kids-store/'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'vw-kids-store-customize-controls', get_stylesheet_directory_uri() . '/assets/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'vw-kids-store-customize-controls', get_stylesheet_directory_uri() . '/assets/css/customize-controls-child.css' );
	}
}
VW_Kids_Store_Customize::get_instance();

function vw_kids_store_init_setup() {
	/* getstart */
	require get_theme_file_path('/inc/getstart/get_started_info.php');

	/* TGM */
	require get_theme_file_path('/inc/tgm/tgm.php');

	/* Block Pattern */
	require get_theme_file_path('/inc/block-patterns/block-patterns.php');

	define('VW_KIDS_STORE_FREE_THEME_DOC',__('https://demos.buywptemplates.com/demo/docs/free-kids-store/','vw-kids-store'));
	define('VW_KIDS_STORE_SUPPORT',__('https://WordPress.org/support/theme/vw-kids-store/','vw-kids-store'));
	define('VW_KIDS_STORE_PRO_SUPPORT',__('https://www.buywptemplates.com/pages/community','vw-kids-store'));
	define('VW_KIDS_STORE_REVIEW',__('https://WordPress.org/support/theme/vw-kids-store/reviews','vw-kids-store'));
	define('VW_KIDS_STORE_BUY_NOW',__('https://www.buywptemplates.com/products/toy-store-wordpress-theme','vw-kids-store'));
	define('VW_KIDS_STORE_LIVE_DEMO',__('https://demos.buywptemplates.com/kids-store/','vw-kids-store'));
	define('VW_KIDS_STORE_PRO_DOC',__('https://demos.buywptemplates.com/demo/docs/kids-store-pro/','vw-kids-store'));
	define('VW_KIDS_STORE_FAQ',__('https://www.vwthemes.com/faqs/','vw-kids-store'));
	define('VW_KIDS_STORE_CONTACT',__('https://www.vwthemes.com/contact/','vw-kids-store'));
	define('VW_KIDS_STORE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-kids-store'));
	define('VW_KIDS_STORE_CREDIT',__('https://www.buywptemplates.com/products/free-kids-store-wordpress-theme','vw-kids-store'));

	define('VW_KIDS_STORE_FREE_SUPPORT',__('https://WordPress.org/support/theme/vw-kids-store/', 'vw-kids-store'));
	

	if ( ! function_exists( 'vw_kids_store_credit' ) ) {
		function vw_kids_store_credit(){
			echo "<a href=".esc_url(VW_KIDS_STORE_CREDIT)." target='_blank'>". esc_html__('Kids Store WordPress Theme','vw-kids-store') ."</a>";
		}
	}

	if ( ! defined( 'VW_KIDS_GO_PRO' ) ) {
		define( 'VW_KIDS_GO_PRO', 'https://www.buywptemplates.com/products/toy-store-wordpress-theme');
	}

	if ( ! defined( 'VW_KIDS_GETSTARTED_URL' ) ) {
	define( 'VW_KIDS_GETSTARTED_URL', 'themes.php?page=vw_kids_store_guide');
	}
}
add_action( 'after_setup_theme', 'vw_kids_store_init_setup' );

function vw_kids_store_my_child_customizer_remove_banner() {

	wp_add_inline_style(
		'customize-controls',
		'.vw-bundle-banner{display:none !important;}'
	);

	wp_add_inline_script(
		'customize-controls',
		"
		jQuery(function($){
			$('.vw-bundle-banner').remove();
		});
		"
	);
}
add_action( 'customize_controls_enqueue_scripts', 'vw_kids_store_my_child_customizer_remove_banner', 999 );

// 1. Enqueue CSS tambahan (enhancements.css)
function vwks_enqueue_ui_enhancements() {
    wp_enqueue_style(
        'vwks-ui-enhancements',
        get_stylesheet_directory_uri() . '/assets/css/enhancements.css',
        array(),
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'vwks_enqueue_ui_enhancements' );
 
// 2. Tambahkan tombol floating "Coba Blind Box" di semua halaman
function vwks_blindbox_floating_button() {
    // Ganti URL di bawah sesuai slug halaman blind box game kamu
    $blindbox_url = home_url( '/mainkan-blind-box/' );
    echo '<a href="' . esc_url( $blindbox_url ) . '" class="vwks-blindbox-float">Coba Blind Box</a>';
}
add_action( 'wp_footer', 'vwks_blindbox_floating_button' );
 
// ==========================================================================
// REVISI TAMBAHAN — Headliner otomatis di tiap halaman
// ==========================================================================
function vwks_page_headliner_script() {
	$title = '';
	if ( is_front_page() || is_home() ) {
		return; // homepage tidak pakai headliner text sama sekali
	} elseif ( function_exists( 'is_cart' ) && is_cart() ) {
		return; // headliner tidak ditampilkan di cart, cukup lewat icon di kanan atas
	} elseif ( function_exists( 'is_checkout' ) && is_checkout() ) {
		return; // checkout digabung dengan cart, jadi ikut aturan yang sama
	} elseif ( function_exists( 'is_shop' ) && is_shop() ) {
		return; // headliner dihapus di halaman shop/katalog
	} elseif ( function_exists( 'is_product' ) && is_product() ) {
		return; // halaman single produk tidak pakai headliner, cukup tampil normal di katalog
	} elseif ( is_search() ) {
		$title = 'Hasil Pencarian: ' . get_search_query();
	} elseif ( is_archive() ) {
		$title = get_the_archive_title();
	} elseif ( is_singular() ) {
		$title = get_the_title();
	}

	if ( empty( $title ) ) {
		return;
	}
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function () {
		var headliner = document.createElement('div');
		headliner.className = 'vwks-headliner';
		headliner.innerHTML = '<h1><?php echo esc_js( $title ); ?></h1>';

		// Cari container dengan urutan prioritas yang benar (satu-satu, bukan digabung koma)
		var selectors = ['#content', '.site-content', '#primary', 'main', '#main'];
		var target = null;
		for (var i = 0; i < selectors.length; i++) {
			var el = document.querySelector(selectors[i]);
			if (el) { target = el; break; }
		}

		if (target && target.parentNode) {
			target.parentNode.insertBefore(headliner, target);
		} else {
			document.body.insertBefore(headliner, document.body.firstChild);
		}
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'vwks_page_headliner_script' );

// ==========================================================================
// REVISI TAMBAHAN 4 — Dropdown Produk (sesuai nama), buat di Katalog
// ==========================================================================
function vwks_product_dropdown_shortcode() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return '<p>WooCommerce belum aktif.</p>';
	}

	$products = wc_get_products(
		array(
			'status'  => 'publish',
			'limit'   => -1,
			'orderby' => 'title',
			'order'   => 'ASC',
		)
	);

	if ( empty( $products ) ) {
		return '<p>Belum ada produk yang ditambahkan.</p>';
	}

	$html  = '<div class="vwks-product-dropdown-wrapper">';
	$html .= '<select class="vwks-product-dropdown" onchange="if(this.value){window.location.href=this.value;}">';
	$html .= '<option value="">Pilih Produk (A-Z)...</option>';
	foreach ( $products as $product ) {
		$html .= '<option value="' . esc_url( get_permalink( $product->get_id() ) ) . '">' . esc_html( $product->get_name() ) . '</option>';
	}
	$html .= '</select></div>';

	return $html;
}
add_shortcode( 'produk_dropdown', 'vwks_product_dropdown_shortcode' );

// ==========================================================================
// REVISI TAMBAHAN 5 — Hapus tab "Downloads" di My Account
// ==========================================================================
function vwks_remove_myaccount_downloads_tab( $items ) {
	unset( $items['downloads'] );
	return $items;
}
add_filter( 'woocommerce_account_menu_items', 'vwks_remove_myaccount_downloads_tab' );

// ==========================================================================
// REVISI TAMBAHAN 6 — Footer: sembunyikan Archives, ganti Categories jadi link Katalog
// ==========================================================================

// Sembunyikan widget Archives & Categories khusus di sidebar footer-2 dan footer-4,
// apapun yang ditambahkan manual lewat Appearance > Widgets tidak akan tampil lagi.
function vwks_hide_footer_default_widgets( $instance, $widget, $args ) {
	if ( in_array( $args['id'], array( 'footer-2', 'footer-4' ), true ) ) {
		if ( isset( $widget->id_base ) && in_array( $widget->id_base, array( 'archives', 'categories' ), true ) ) {
			return false; // widget ini tidak akan dirender
		}
	}
	return $instance;
}
add_filter( 'widget_display_callback', 'vwks_hide_footer_default_widgets', 10, 3 );

// Tambahkan link "Katalog Produk" otomatis di footer-4, menggantikan posisi Categories
function vwks_add_katalog_link_to_footer( $index ) {
	if ( 'footer-4' === $index ) {
		$katalog_page = get_page_by_path( 'katalog-produk' );
		$katalog_url  = $katalog_page ? get_permalink( $katalog_page ) : home_url( '/katalog-produk/' );
		echo '<div class="widget vwks-katalog-footer-link"><h2 class="widget-title">Katalog</h2><ul><li><a href="' . esc_url( $katalog_url ) . '">Katalog Produk</a></li></ul></div>';
	}
}
add_action( 'dynamic_sidebar_after', 'vwks_add_katalog_link_to_footer' );

// ==========================================================================
// REVISI TAMBAHAN 7 — Auto-setup Homepage (bikin Page "Beranda" & jadikan front page)
// ==========================================================================
function vwks_setup_homepage_once() {
	if ( get_option( 'vwks_homepage_setup_done' ) ) {
		return;
	}

	$existing = get_page_by_path( 'beranda' );

	if ( $existing ) {
		$page_id = $existing->ID;
	} else {
		$page_id = wp_insert_post( array(
			'post_title'   => 'Beranda',
			'post_name'    => 'beranda',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '<!-- wp:pattern {"slug":"vw-kids-store/homepage-lengkap"} /-->',
		) );
	}

	if ( $page_id && ! is_wp_error( $page_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page_id );
	}

	update_option( 'vwks_homepage_setup_done', 1 );
}
add_action( 'admin_init', 'vwks_setup_homepage_once' );

// ==========================================================================
// REVISI TAMBAHAN 8 — Mega Menu Hover di Navbar (ala Pop Mart)
// Otomatis nempel ke menu item yang linknya mengarah ke halaman Shop/Katalog
// ==========================================================================
function vwks_mega_menu_script() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$products = wc_get_products( array(
		'status'  => 'publish',
		'limit'   => 6,
		'orderby' => 'date',
		'order'   => 'DESC',
	) );

	if ( empty( $products ) ) {
		return;
	}

	$items = array();
	foreach ( $products as $product ) {
		$image_id  = $product->get_image_id();
		$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : wc_placeholder_img_src();
		$items[] = array(
			'name'  => $product->get_name(),
			'image' => $image_url,
			'url'   => get_permalink( $product->get_id() ),
		);
	}

	$shop_url    = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : '';
	$katalog_pg  = get_page_by_path( 'katalog-produk' );
	$katalog_url = $katalog_pg ? get_permalink( $katalog_pg ) : '';
	$items_json  = wp_json_encode( $items );
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function () {
		var items = <?php echo $items_json; ?>;
		var shopUrl = <?php echo wp_json_encode( $shop_url ); ?>;
		var katalogUrl = <?php echo wp_json_encode( $katalog_url ); ?>;

		// Cari <a> di menu navigasi yang mengarah ke halaman Shop/Katalog
		var navLinks = document.querySelectorAll('nav a, .main-navigation a, #site-navigation a, .menu a');
		var targetLink = null;
		navLinks.forEach(function (a) {
			if (targetLink) return;
			var href = a.getAttribute('href') || '';
			var text = (a.textContent || '').toLowerCase();
			if ((shopUrl && href.indexOf(shopUrl) !== -1) ||
				(katalogUrl && href.indexOf(katalogUrl) !== -1) ||
				text.indexOf('katalog') !== -1 || text.indexOf('shop') !== -1 || text.indexOf('produk') !== -1) {
				targetLink = a;
			}
		});

		if (!targetLink) return;

		var parentLi = targetLink.closest('li');
		if (!parentLi) return;

		parentLi.classList.add('vwks-has-megamenu');
		parentLi.style.position = 'relative';

		var flyout = document.createElement('div');
		flyout.className = 'vwks-megamenu';

		var row = document.createElement('div');
		row.className = 'vwks-megamenu-row';

		items.forEach(function (item) {
			var link = document.createElement('a');
			link.href = item.url;
			link.className = 'vwks-megamenu-item';

			var img = document.createElement('img');
			img.src = item.image;
			img.alt = item.name;

			var name = document.createElement('span');
			name.textContent = item.name;

			link.appendChild(img);
			link.appendChild(name);
			row.appendChild(link);
		});

		flyout.appendChild(row);
		parentLi.appendChild(flyout);
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'vwks_mega_menu_script' );

// ==========================================================================
// REVISI TAMBAHAN 9 — Ganti nama situs jadi "Unseen"
// ==========================================================================
function vwks_set_site_title_once() {
	if ( get_option( 'vwks_site_title_set' ) ) {
		return;
	}
	update_option( 'blogname', 'Unseen' );
	update_option( 'vwks_site_title_set', 1 );
}
add_action( 'admin_init', 'vwks_set_site_title_once' );
