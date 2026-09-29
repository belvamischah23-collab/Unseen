<?php
/* Add to Dashboard main menu */
function vw_kids_dashboard_menu() {
    add_menu_page(
        esc_html__( 'VW Kids', 'vw-kids' ), // Page title
        esc_html__( 'VW Kids', 'vw-kids' ), // Menu title
        'manage_options',                            // Capability
        'vw_kids_guide',                        // Menu slug
        'vw_kids_mostrar_guide',                // Callback
        get_template_directory_uri() . '/inc/getstart/images/menu-icon.svg', // Image icon
        59                                           // Position
    );
}
add_action( 'admin_menu', 'vw_kids_dashboard_menu' );

// Add a Custom CSS file to WP Admin Area
function vw_kids_admin_theme_style() {
   wp_enqueue_style('vw-kids-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-kids-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');

   // Admin notice code START
	wp_register_script('vw-kids-notice', esc_url(get_template_directory_uri()) . '/inc/getstart/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('vw-kids-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'vw_kids_admin_theme_style');

//guidline for about theme
function vw_kids_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$vw_kids_theme = wp_get_theme( 'vw-kids' );
?>

<div class="wrapper-info">
	<div class="tab-sec">
    	
    	<div class="tab">
    		<button class="tablinks" onclick="vw_kids_open_tab(event, 'theme_offer')"><?php esc_html_e( 'Demo Import', 'vw-kids' ); ?></button>
			<button class="tablinks" onclick="vw_kids_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-kids' ); ?></button>
			<button class="tablinks" onclick="vw_kids_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-kids' ); ?></button>
  			<button class="tablinks" onclick="vw_kids_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free VS Premium', 'vw-kids' ); ?></button>
  			<button class="tablinks" onclick="vw_kids_open_tab(event, 'get_bundle')"><?php esc_html_e( 'WP Theme Bundle', 'vw-kids' ); ?></button>
		</div>

		<?php 
			$vw_kids_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_kids_plugin_custom_css ='display: block';
			}
		?>

		<div id="theme_offer" class="tabcontent open">
			<div class="demo-content">
				<div class="demo-text">
					<?php 
					/* Get Started. */ 
					require get_parent_theme_file_path( '/inc/getstart/demo-content.php' );
				 	?>
				</div>
				
			 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" class="resp-img" />
			</div> 	
		</div>
		<div id="lite_theme" class="tabcontent">
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_kids_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'VW  Kids', 'vw-kids' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Introducing VW Kids, a vibrant and dynamic WordPress theme tailored for everything related to children, from kindergartens to babysitters and educational centers. This versatile theme is perfect for the childcare industry, including preschools, play schools, and daycare facilities, and also caters to businesses focusing on kids\' toys, clothing, and accessories, making it an excellent fit for children’s boutiques and toy stores. VW Kids is not limited to schools and childcare services; it also serves bloggers offering parenting insights, baby shower ideas, and tips for moms. With a rich array of features, the theme supports various services such as baby food cooking classes, cloth diaper services, and after-school activity clubs. Its responsive design and extensive customization options ensure a great appearance on any device, while its SEO-friendly attributes, diverse typography, and grid layout enhance user experience without sacrificing speed. Whether you need a blog layout for your motherhood insights or a platform to showcase child-related services, VW Kids has you covered. With eye-catching colors and beautiful fonts, it captures visitors\' attention from the outset. The theme also includes social media icons for easy promotion and strategically placed call-to-action buttons to boost user engagement. Fully compatible with the latest WordPress version, VW Kids is built with clean, bug-free code to guarantee high quality and optimal performance.','vw-kids'); ?></p>
				<div class="lite-info">
					<div class="col-left-inner">
				  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-kids' ); ?></h4>
						<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-kids' ); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_KIDS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-kids' ); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Theme Customizer', 'vw-kids'); ?></h4>
						<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-kids'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-kids'); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-kids'); ?></h4>
						<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-kids'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_KIDS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-kids'); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Reviews & Testimonials', 'vw-kids'); ?></h4>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-kids'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_KIDS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-kids'); ?></a>
						</div>

						<div class="link-customizer">
							<h4><?php esc_html_e( 'Link to customizer', 'vw-kids' ); ?></h4>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-kids'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_kids_top_bar') ); ?>" target="_blank"><?php esc_html_e('Header','vw-kids'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_kids_slider_section') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-kids'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_kids_top_charts_section') ); ?>" target="_blank"><?php esc_html_e('Top Charts Section','vw-kids'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_kids_right_sidebar_section') ); ?>" target="_blank"><?php esc_html_e('Right Sidebar Section','vw-kids'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-kids'); ?></a>
									</div>
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_kids_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-kids'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_kids_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-kids'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-kids'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_kids_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-kids'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
					<div class="col-right-inner">
						<h4 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-kids'); ?></h4>
						<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-kids'); ?></p>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-kids'); ?></span><?php esc_html_e(' Go to ','vw-kids'); ?>
						  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-kids'); ?></b></p>
	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-kids'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-kids'); ?></span><?php esc_html_e(' Go to ','vw-kids'); ?>
						  	<b><?php esc_html_e(' Settings >> Reading ','vw-kids'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-kids'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-kids'); ?> <a class="doc-links" href="<?php echo esc_url( VW_KIDS_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-kids'); ?></a></p>
				  	</div>

				</div>
			  	
			</div>
		</div>

		<div id="theme_pro" class="tabcontent">		  	
			<div class="pro-info">
				<div class="col-left-pro">
					<h3><?php esc_html_e( 'Premium Theme Information', 'vw-kids' ); ?></h3>
					<hr class="h3hr">
			    	<p><?php esc_html_e('Designing a kids website is not a kids play. It should be bright, intuitive, fresh, colourful and interesting to see, perfectly reflecting the enthusiasm of the audience it is made for. All these and many more things are offered by our premium quality kids WordPress theme that makes it the best match for the diverse niches in kids business. It can be used as a kids health blog, nanny and babysitter portfolio and as a website for kindergartens, day care centres, play schools, art and craft schools, sports centres, baby clothing, skin care and food products selling eCommerce store, toy shop, play station and all the kids website. This kids WordPress theme has a variety of layouts to alter the placement of website components according to your wish. It has simple backend interface which is very easy to understand so you can set the website even if you do not have any coding knowledge.','vw-kids'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_KIDS_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'vw-kids'); ?></a>
						<a href="<?php echo esc_url( VW_KIDS_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'vw-kids'); ?></a>
						<a href="<?php echo esc_url( VW_KIDS_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'vw-kids'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/pro-theme.jpg" alt="" class="pro-img" />		    	
			    </div>
			</div>		    
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-kids' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th> <?php esc_html_e('Features', 'vw-kids'); ?></th>
								<th><?php esc_html_e('Free Themes', 'vw-kids'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-kids'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Banner Settings', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-kids'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-kids'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'vw-kids'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-kids'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-kids'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-kids'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-kids'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-kids'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vw-kids'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template / Support Templates', 'vw-kids'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-kids'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-kids'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-kids'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-kids'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Left/Right Sidebar)', 'vw-kids'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Video Gallery', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('VW  Kids ', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Detail Services', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('About Business Page', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Team Member Page', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Project Description Page', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support Page', 'vw-kids'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_KIDS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-kids'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">	
			<div class="bundle-info">
				<div class="col-left-pro">
			   		<h3><?php esc_html_e( 'WP Theme Bundle', 'vw-kids' ); ?></h3>
			   		<hr class="h3hr">
			    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 500+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','vw-kids'); ?></p>
			    	<div class="feature">
			    		<h4><?php esc_html_e( 'Features:', 'vw-kids' ); ?></h4>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('500+ Premium Themes & 5+ Plugins.', 'vw-kids'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Seamless Integration.', 'vw-kids'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Customization Flexibility.', 'vw-kids'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Regular Updates.', 'vw-kids'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Dedicated Support.', 'vw-kids'); ?></p>
			    	</div>
			    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $119!', 'vw-kids'); ?></p>
			    	<div class="pro-links">
						<a href="<?php echo esc_url( VW_KIDS_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank" class="bundle-buy"><?php esc_html_e('Get Bundle', 'vw-kids'); ?></a>
						<a href="<?php echo esc_url( VW_KIDS_THEME_BUNDLE_DOC ); ?>" target="_blank" class="bundle-doc"><?php esc_html_e('Documentation', 'vw-kids'); ?></a>
					</div>
			   	</div>
			   	<div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.jpg" alt="" />
			   	</div>
			</div>	  	
		   			    
		</div>
	</div>
	<div class="coupen-code-section">
		<div class="sshot-section">
			<div class="sshot-inner">
				<h2><?php esc_html_e( 'Welcome To VW  Kids,', 'vw-kids' ); ?>  </h2>
				<div class="on-pro">
					<span class="version"><?php esc_html_e( 'Version', 'vw-kids' ); ?>: <?php echo esc_html($vw_kids_theme['Version']);?></span>
					<span class="coupon-code"><?php esc_html_e('Get 20% Of On Pro Theme-Use Code: ','vw-kids'); ?><span class="code-highlight"><?php esc_html_e('VWPRO20','vw-kids'); ?></span>
				</div>
		    	<p><?php esc_html_e('All Our Wordpress Themes Are Modern, Minimalist, 100% Responsive, Seo-Friendly,Feature-Rich, And Multipurpose That Best Suit Designers, Bloggers And Other Professionals Who Are Working In The Creative Fields.','vw-kids'); ?></p>
		    	<div class="btn-section">
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_KIDS_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'vw-kids'); ?></a>
						<a href="<?php echo esc_url( VW_KIDS_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'vw-kids'); ?></a>
						<a href="<?php echo esc_url( VW_KIDS_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'vw-kids'); ?></a>
						
					</div>
			    	
			    </div>
			</div>
	    	<div class="bundle-banner">
	    		<div class="bundle-img">
	    			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle-notice.png" alt="" />
	    		</div>
	    		<div class="bundle-text">
		  			<h2><?php esc_html_e('WP THEME BUNDLE','vw-kids'); ?></h2>
					<h4><?php esc_html_e('Get Access to 500+ Premium WordPress Themes At Just $119','vw-kids'); ?></h4>
					<div class="bundle-button">
			  			<a href="<?php echo esc_url( 'https://www.vwthemes.com/discount/FREEBREF?redirect=/products/wp-theme-bundle'); ?>" target="_blank"><?php esc_html_e('Get 20% OFF On Bundle', 'vw-kids'); ?></a>
			  		</div>
		  		</div>		  		
	    	</div>
	    </div>
	    <div class="coupen-section">
	    	<div class="logo-section">
			  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		  	</div>
		  	<div class="logo-right">	
		  		<div class="logo-text">
		  			<h2><?php esc_html_e('GET PRO','vw-kids'); ?></h2>
					<h4><?php esc_html_e('20% Off','vw-kids'); ?></h4>
		  		</div>						
			</div>
	    </div>
	</div>
      
</div>
<?php } ?>