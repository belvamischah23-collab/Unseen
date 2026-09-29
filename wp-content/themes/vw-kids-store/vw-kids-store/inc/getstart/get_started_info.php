<?php

add_action( 'admin_menu', 'vw_kids_store_gettingstarted' );
function vw_kids_store_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'vw-kids-store'), esc_html__('Theme Demo Import', 'vw-kids-store'), 'edit_theme_options', 'vw-kids-store-guide-page', 'vw_kids_store_guide');   
}

function vw_kids_store_admin_theme_style() {
   wp_enqueue_style('vw-kids-store-custom-admin-style', esc_url(get_stylesheet_directory_uri()) . '/inc/getstart/get_started_info.css');
   wp_enqueue_script('vw-kids-store-tab', esc_url( get_stylesheet_directory_uri() ) . '/inc/getstart/js/get_started_tab.js');

   // Admin notice code START
	wp_register_script('vw-kids-store-notice', esc_url(get_stylesheet_directory_uri()) . '/inc/getstart/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('vw-kids-store-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'vw_kids_store_admin_theme_style');

	// Notice after Theme Activation
	add_action('admin_notices', 'vw_kids_store_activation_notice');
	
	function vw_kids_store_activation_notice() {
	    // Hide permanently if dismissed
	    if ( get_option('vw_kids_store_admin_notice') == 1 ) {
	        return;
	    }
	    // Hide ONLY on Get Started page
	    if ( isset($_GET['page']) && $_GET['page'] === 'vw-kids-store-guide-page' ) {
	        return;
	    }?>     
	        <div id="vw-kids-store-welcome-notice" class="notice notice-success is-dismissible getting_started activation-notice">
		<div class="notice-info">
			<div class="notice-image">
				<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
			</div>
			<div class="notice-content">
				<h2><?php esc_html_e( 'Thanks For Installing VW Kids Store, You Rock!', 'vw-kids-store' ) ?> </h2>
				<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional charity website. Please Click on the link below to know the theme setup information.', 'vw-kids-store' ) ?></p>
				<div style="display: grid;">
					<a class="button notice-btn" href="<?php echo esc_url( admin_url( 'themes.php?page=vw-kids-store-guide-page' )); ?>"><?php esc_html_e( 'Get Started', 'vw-kids-store' ) ?></a>
					<a class="button notice-btn" target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_LIVE_DEMO ); ?>"><?php esc_html_e('Pro Demo', 'vw-kids-store') ?></a>
					<a  class="button notice-btn" target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_BUY_NOW ); ?>"><?php esc_html_e('Upgrade To Pro', 'vw-kids-store') ?></a>
					<a  class="button notice-btn" target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_FREE_THEME_DOC ); ?>"><?php esc_html_e('Free Doc', 'vw-kids-store') ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
//Hook (VERY IMPORTANT)
add_action('admin_notices', 'vw_kids_store_activation_notice');

// Admin notice code START
add_action('wp_ajax_vw_kids_store_dismiss_notice', 'vw_kids_store_dismiss_notice');
function vw_kids_store_dismiss_notice() {
	update_option('vw_kids_store_admin_notice', 1);
	wp_die();
}

//After Switch theme function
add_action('after_switch_theme', 'vw_kids_store_getstart_setup_options');
function vw_kids_store_getstart_setup_options () {
	delete_option('vw_kids_store_admin_notice');
}
// Admin notice code END

/**
 * Theme Info Page
 */
function vw_kids_store_guide() {

	// Theme info
	$vw_kids_store_return = add_query_arg( array()) ;
	$vw_kids_store_theme = wp_get_theme( 'vw-kids-store' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
		    <div>
                <h2 class="tgmpa-notice-warning"></h2>
            </div>
		</div>
		<div class="tab-sec">
			<div class="tab">
				<button role="tab" class="tablinks home" onclick="vw_kids_store_openCity(event, 'bwp_getstart')"><?php esc_html_e( 'Theme Demo Import', 'vw-kids-store' ); ?></button>
				<button role="tab" class="tablinks" onclick="vw_kids_store_openCity(event, 'bwp_setup')"><?php esc_html_e( 'Free Theme Information', 'vw-kids-store' ); ?></button>
				<button role="tab" class="tablinks" onclick="vw_kids_store_openCity(event, 'bwp_premium_info')"><?php esc_html_e( 'Premium Theme Information', 'vw-kids-store' ); ?></button>
				<a class="tablinks tablinks-demo" role="tab" href="<?php echo esc_url( VW_KIDS_STORE_LIVE_DEMO ); ?>" target="_blank">
					<?php esc_html_e( 'Live Demo', 'vw-kids-store' ); ?>
				</a>
				<a class="tablinks tablinks-pro" role="tab" href="<?php echo esc_url( VW_KIDS_STORE_BUY_NOW ); ?>" target="_blank">
					<?php esc_html_e( 'Buy Pro', 'vw-kids-store' ); ?>
				</a>
			</div>
			<div  id="bwp_getstart" class="tabcontent open">
				<div class="row">
					<div class="col-md-5 intro">
						<div class="pad-box">
							<h2><?php esc_html_e( 'Welcome to VW Kids Store ', 'vw-kids-store' ); ?>
							<span><?php esc_html_e( 'Version: ', 'vw-kids-store' ); ?><?php echo esc_html($vw_kids_store_theme['Version']);?></span>
							</h2>
							<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'vw-kids-store' ); ?>
							</span>
							<div class="powered-by">
								<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'vw-kids-store' ); ?></strong></p>
								<p>
									<img class="logo" src="<?php echo esc_url(get_theme_file_uri() . '/inc/getstart/images/theme-logo.png'); ?>"/>
								</p>
								<div class="demo-content">
									<?php
										/* Demo Import */
										require get_theme_file_path( '/inc/getstart/demo-content.php' );
									?>
								</div>

								<div id="demo-import-loader">
									<img src="<?php echo esc_url(get_theme_file_uri() . '/inc/getstart/images/spinner.gif'); ?>" alt="<?php echo esc_attr( 'Loading...', 'vw-kids-store'); ?>" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="install-plugins">
							<img src="<?php echo esc_url(get_theme_file_uri() . '/inc/getstart/images/responsive.png'); ?>" alt="<?php echo esc_attr( 'responsive-image', 'vw-kids-store'); ?>" />
						</div>
					</div>
				</div>
				<div class="dashboard__blocks">
					<div class="row">
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Get Support','vw-kids-store'); ?></h3>
							<ol>
								<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','vw-kids-store'); ?></a></li>
								<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','vw-kids-store'); ?></a></li>
							</ol>
						</div>
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Getting Started','vw-kids-store'); ?></h3>
							<ol>
								<li><?php esc_html_e( 'Start','vw-kids-store'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-kids-store'); ?></a> <?php esc_html_e( 'your website.','vw-kids-store'); ?> </li>
							</ol>
						</div>
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Help Docs','vw-kids-store'); ?></h3>
							<ol>
								<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','vw-kids-store'); ?></a></li>
								<li><a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','vw-kids-store'); ?></a></li>
							</ol>
						</div>
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Buy Premium','vw-kids-store'); ?></h3>
							<ol>
								<a href="<?php echo esc_url( VW_KIDS_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-kids-store'); ?></a>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div  id="bwp_setup" class="tabcontent">
				<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1) Setup VW Kids Store Theme', 'vw-kids-store' ); ?></h2>
				<div class="row">
					<div class="theme-instruction-block col-md-7">
						<div class="pad-box">
							<p><?php esc_html_e( 'The VW Kids Store is a free WordPress theme specifically designed for kids and baby shops, encompassing everything from children\'s clothing and nursery items to baby gear and kids toys. Ideal for playgroups, daycare centers, and playhouses, it offers a sophisticated yet colorful design that embodies a minimalistic approach. Developed by a WordPress expert, it features a clean layout that showcases every detail with clarity, ensuring images of your products are crystal clear thanks to its retina-ready design. This user-friendly theme accommodates everyone, regardless of coding experience, with a responsive layout that guarantees an excellent viewing experience on all devices, including smartphones. To enhance your site\'s professional look, you can easily add a custom logo, and you\'ll find plenty of personalization options for colors, fonts, and typography. The theme includes a Call to Action Button for improved interactivity while boasting secure, optimized codes that result in a lightweight design for faster page loads. With SEO-friendly coding, you\'ll see higher search engine rankings, ultimately driving more traffic to your online store. Explore the demo here: https://demos.buywptemplates.com/kids-store/.', 'vw-kids-store' ); ?><p><br>
							<ol>
								<li><?php esc_html_e( 'Start','vw-kids-store'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-kids-store'); ?></a> <?php esc_html_e( 'your website.','vw-kids-store'); ?> </li>
								<li><?php esc_html_e( 'VW Kids Store','vw-kids-store'); ?> <a target="_blank" href="<?php echo esc_url( VW_KIDS_STORE_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Documentation','vw-kids-store'); ?></a> </li>
							</ol>
						</div>
				</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_theme_file_uri() . '/inc/getstart/images/screenshot.png'); ?>"/>
              	</div> 
              	</div>
            </div>
			</div>
			<div class="col-md-12 text-block tabcontent"  id="bwp_premium_info">
				<h2 class="dashboard-install-title"><?php esc_html_e( '2) Premium Theme Information.','vw-kids-store'); ?></h2>
				<div class="row">
					<div class="col-md-7">
						<img src="<?php echo esc_url(get_theme_file_uri() . '/inc/getstart/images/responsive1.png'); ?>" alt="<?php echo esc_attr( 'responsive-image', 'vw-kids-store'); ?>">
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','vw-kids-store'); ?></h3>
							<p class="pad-box-p"><?php esc_html_e( 'Creating a website with children and kids in mind isn’t that easy. But with Toy Store WordPress Theme, designing a kids’ related website becomes a breeze. It is created with keeping children and young audiences in focus that love colorful and playful designs and give attention to the things that look good. This theme is not only visually appea	max-width: 20%;ling but also comes with useful business options that you can run your kids’ store smoothly online. WP Toy Store WordPress Theme shows quality images through an amazing full-screen slider that is designed retina-ready for displaying a wonderful slideshow. Smartly placed Call To Action Buttons (CTA) will make the overall website interactive and guides the visitors to take the next course of action thus improving conversions also. There isn’t any need to start from scratch even if you have zero coding knowledge as this theme offers you demo data that you can import in a single click and start your online journey within minutes.', 'vw-kids-store' ); ?><p>
						</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Features','vw-kids-store'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Car listing Shortcode with category','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Car listing Shortcode','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Multiple image feature for each property with slider.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Brand Listing Section','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Car Brand(categories) Option','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Car Tags(categories) Option','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Testimonial listing.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Testimonial shortcode.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Social icons widget.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Latest post with the image widget.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Live customize editor for the About US section.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Font Awesome integrated.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Advanced Color options and color pallets.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( '100+ Font Family Options.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Enable-Disable options on All sections.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Sticky post & Comment threads.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Left and Right Sidebar.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Customizable Home Page.','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Footer Widgets & Editor style','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Gallery & Banner functionality','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Multiple inner page templates','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Full-width Template','vw-kids-store'); ?></li>
									<li><?php esc_html_e( 'Custom Menu, Colors Editor','vw-kids-store'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php }?>