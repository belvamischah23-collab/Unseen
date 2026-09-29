<?php
/**
 * VW Kids functions and definitions
 *
 * @package VW Kids
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Breadcrumb Begin */
function vw_kids_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'vw_kids_setup' ) ) :
 
function vw_kids_setup() {

	$GLOBALS['content_width'] = apply_filters( 'vw_kids_content_width', 640 );
	
	load_theme_textdomain( 'vw-kids', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
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
	add_image_size('vw-kids-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vw-kids' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	//selective refresh for sidebar and widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_kids_font_url() ) );
	
	}
	endif;

add_action( 'after_setup_theme', 'vw_kids_setup' );

// Notice after Theme Activation
add_action('admin_notices', 'vw_kids_activation_notice');

function vw_kids_activation_notice() {
	// Hide permanently if dismissed
    if ( get_option('vw_kids_admin_notice') == 1 ) {
        return;
    }
    // Hide ONLY on Get Started page
    if ( isset($_GET['page']) && $_GET['page'] === 'vw_kids_guide' ) {
        return;
    } {
		echo '<div id="vw-kids-welcome-notice"  class="notice notice-success is-dismissible welcome-notice">';
		echo '<div class="notice-row">';
			echo '<div class="notice-text">';
				echo '<p class="welcome-text1">'. esc_html__( '🎉 Welcome to VW Themes,', 'vw-kids' ) .'</p>';
				echo '<p class="welcome-text2">'. esc_html__( 'You are now using the VW Kids, a beautifully designed theme to kickstart your website.', 'vw-kids' ) .'</p>';
				echo '<p class="welcome-text3">'. esc_html__( 'To help you get started quickly, use the options below:', 'vw-kids' ) .'</p>';
				echo '<span class="import-btn"><a href="'. esc_url( admin_url( 'admin.php?page=vw_kids_guide' ) ) .'" class="button button-primary">'. esc_html__( 'IMPORT DEMO', 'vw-kids' ) .'</a></span>';
				echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-kids-pro/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-kids' ) .'</a></span>';
				echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/kids-wordpress-theme' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE TO PRO', 'vw-kids' ) .'</a></span>';
				echo '<span class="bundle-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/wp-theme-bundle' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'BUNDLE OF 500+ THEMES', 'vw-kids' ) .'</a></span>';
			echo '</div>';
			echo '<div class="notice-img1">';
				echo '<img src="' . esc_url( get_template_directory_uri() . '/inc/getstart/images/arrow-notice.png' ) . '" width="180" alt="' . esc_attr__( 'VW Kids', 'vw-kids' ) . '" />';
			echo '</div>';
			echo '<div class="notice-img2">';
				echo '<img src="' . esc_url( get_template_directory_uri() . '/inc/getstart/images/bundle-notice.png' ) . '" width="180" alt="' . esc_attr__( 'VW Kids', 'vw-kids' ) . '" />';
			echo '</div>';	
		echo '</div>';	
	echo '</div>';
}
}
//Add bundle image in customizer 
	add_action('customize_controls_print_footer_scripts', function () {
	?>
	<script>
		jQuery(document).ready(function($){
		var vw_kids_banner = `
			<div class="vw-bundle-banner" style="padding:10px 12px;">
			<a href="https://www.vwthemes.com/products/wp-theme-bundle" target="_blank">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/getstart/images/bundle-img.png' ); ?>"style="width:100%; border-radius:4px;">
            </a>
			</div>`;
		$ ('.customize-pane-parent').prepend(vw_kids_banner);
		});
	</script>
	<?php
	});

/* Theme Widgets Setup */

function vw_kids_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'vw-kids' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-kids' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vw-kids' ),
		'description'   => __( 'Appears on page sidebar', 'vw-kids' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'vw-kids' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-kids' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'vw-kids' ),
		'description'   => __( 'Appears on footer 1', 'vw-kids' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'vw-kids' ),
		'description'   => __( 'Appears on footer 2', 'vw-kids' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'vw-kids' ),
		'description'   => __( 'Appears on footer 3', 'vw-kids' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'vw-kids' ),
		'description'   => __( 'Appears on footer 4', 'vw-kids' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'vw-kids' ),
		'description'   => __( 'Appears on shop page', 'vw-kids' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'vw-kids' ),
		'description'   => __( 'Appears on single product page', 'vw-kids' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'vw-kids' ),
		'description'   => __( 'Appears on right side footer', 'vw-kids' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );  
}
add_action( 'widgets_init', 'vw_kids_widgets_init' );

/* Theme Font URL */
function vw_kids_font_url() {
	// Sebelumnya di sini ada daftar ~150 font Google Fonts yang di-load SEKALIGUS
	// di SETIAP halaman (termasuk checkout), padahal desain tema cuma pakai 2 font
	// di bawah ini (dicek langsung dari style.css). Request raksasa itu yang bikin
	// loading lama / gagal (403) tiap buka halaman, termasuk pas checkout.
	$font_family   = array(
	 	'Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400',
	 	'Caveat Brush',
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = vw_kids_wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/* Theme enqueue scripts */
function vw_kids_scripts() {
	wp_enqueue_style( 'vw-kids-font', vw_kids_font_url(), array() );
	wp_enqueue_style( 'vw-kids-block-style', get_theme_file_uri('/assets/css/blocks.css') );
	wp_enqueue_style( 'vw-kids-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'vw-kids-basic-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/inline-style.php' );
	wp_add_inline_style( 'vw-kids-basic-style',$vw_kids_custom_css );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'vw-kids-custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );

	if (get_theme_mod('vw_kids_animation', true) == true){
		wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery') );
		wp_enqueue_style( 'animate-css', get_template_directory_uri().'/assets/css/animate.css' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Enqueue the Dashicons script */
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'vw_kids_scripts' );

/**
 * Enqueue block editor style
 */
function vw_kids_block_editor_styles() {
	wp_enqueue_style( 'vw-kids-font', vw_kids_font_url(), array() );
    wp_enqueue_style( 'vw-kids-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'vw_kids_block_editor_styles' );

function vw_kids_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
function vw_kids_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function vw_kids_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function vw_kids_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function vw_kids_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/* Excerpt Limit Begin */
function vw_kids_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}



// Change number or products per row to 3
add_filter('loop_shop_columns', 'vw_kids_loop_columns');
	if (!function_exists('vw_kids_loop_columns')) {
	function vw_kids_loop_columns() {
		return get_theme_mod( 'vw_kids_products_per_row', '3' ); 
		// 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'vw_kids_products_per_page' );
function vw_kids_products_per_page( $cols ) {
  	return  get_theme_mod( 'vw_kids_products_per_page',9);
}

function vw_kids_logo_title_hide_show(){
	if(get_theme_mod('vw_kids_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function vw_kids_tagline_hide_show(){
	if(get_theme_mod('vw_kids_tagline_hide_show',0) == '1' ) {
		return true;
	}
	return false;
}

//Active Callback
function vw_kids_default_slider(){
	if(get_theme_mod('vw_kids_slider_type', 'Default slider') == 'Default slider' ) {
		return true;
	}
	return false;
}

function vw_kids_advance_slider(){
	if(get_theme_mod('vw_kids_slider_type', 'Default slider') == 'Advance slider' ) {
		return true;
	}
	return false;
}

function vw_kids_blog_post_featured_image_dimension(){
	if(get_theme_mod('vw_kids_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
} 


	// edit

if (!function_exists('vw_kids_blog_edit_link')) :

    function vw_kids_blog_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'vw-kids'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    }
endif;


/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

function vw_kids_init_setup() {
	/* Custom template tags for this theme. */
	require get_template_directory() . '/inc/template-tags.php';

	/* Customizer additions. */
	require get_template_directory() . '/inc/customizer.php';

	/* Customizer additions. */
	require get_template_directory() . '/inc/themes-widgets/social-icon.php';

	/* Customizer additions. */
	require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

	/* Customizer additions. */
	require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';

	/* Typography */
	require get_template_directory() . '/inc/typography/ctypo.php';

	/* Plugin Activation */
	require get_template_directory() . '/inc/getstart/plugin-activation.php';

	/* Implement the About theme page */
	require get_template_directory() . '/inc/getstart/getstart.php';

	/* Block Pattern */
	require get_template_directory() . '/inc/block-patterns/block-patterns.php';

	/* TGM Plugin Activation */
	require get_template_directory() . '/inc/tgm/tgm.php';

	/* Webfonts */
	require get_template_directory() . '/inc/wptt-webfont-loader.php';

	define('VW_KIDS_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-vw-kids/','vw-kids'));
	define('VW_KIDS_SUPPORT',__('https://wordpress.org/support/theme/vw-kids/','vw-kids'));
	define('VW_KIDS_REVIEW',__('https://wordpress.org/support/theme/vw-kids/reviews','vw-kids'));
	define('VW_KIDS_BUY_NOW',__('https://www.vwthemes.com/products/kids-wordpress-theme','vw-kids'));
	define('VW_KIDS_LIVE_DEMO',__('https://www.vwthemes.net/vw-kids-pro/','vw-kids'));
	define('VW_KIDS_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/vw-kids-pro/','vw-kids'));
	define('VW_KIDS_FAQ',__('https://www.vwthemes.com/faqs/','vw-kids'));
	define('VW_KIDS_CONTACT',__('https://www.vwthemes.com/contact/','vw-kids'));
	define('VW_KIDS_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-kids'));
	define('VW_KIDS_CREDIT',__('https://www.vwthemes.com/products/free-kids-wordpress-theme','vw-kids'));
	define('VW_KIDS_THEME_BUNDLE_BUY_NOW',__('https://www.vwthemes.com/products/wp-theme-bundle','vw-kids'));
	define('VW_KIDS_THEME_BUNDLE_DOC',__('https://preview.vwthemesdemo.com/docs/theme-bundle/','vw-kids'));

	if ( ! function_exists( 'vw_kids_credit' ) ) {
		function vw_kids_credit(){
			echo "<a href=".esc_url(VW_KIDS_CREDIT)." target='_blank'>".esc_html__('Kids WordPress Theme','vw-kids')."</a>";
		}
	}

	if ( ! defined( 'VW_KIDS_GO_PRO' ) ) {
		define( 'VW_KIDS_GO_PRO', 'https://www.vwthemes.com/products/kids-wordpress-theme');
	}

	if ( ! defined( 'VW_KIDS_GETSTARTED_URL' ) ) {
		define( 'VW_KIDS_GETSTARTED_URL', 'themes.php?page=vw_kids_guide');
	}
}
add_action( 'after_setup_theme', 'vw_kids_init_setup' );		

// Admin notice code START
add_action('wp_ajax_vw_kids_dismiss_notice', 'vw_kids_dismiss_notice');
function vw_kids_dismiss_notice() {
    update_option('vw_kids_admin_notice', 1);
    wp_die();
}

// Customizer popup AJAX handler
add_action('wp_ajax_vw_kids_customizer_popup_shown', 'vw_kids_customizer_popup_shown');
function vw_kids_customizer_popup_shown() {
    check_ajax_referer('vw_kids_customizer_popup_nonce', 'nonce');
    update_option('vw_kids_customizer_popup_shown', '1');
    wp_die();
}

//After Switch theme function
add_action('after_switch_theme', 'vw_kids_getstart_setup_options');
function vw_kids_getstart_setup_options () {
    delete_option('vw_kids_admin_notice');
    delete_option('vw_kids_customizer_popup_shown'); // Reset customizer popup
}
// Admin notice code END

// Clear popup option when switching away from this theme
add_action('switch_theme', 'vw_kids_cleanup_on_theme_switch');
function vw_kids_cleanup_on_theme_switch() {
    delete_option('vw_kids_customizer_popup_shown');
}

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
