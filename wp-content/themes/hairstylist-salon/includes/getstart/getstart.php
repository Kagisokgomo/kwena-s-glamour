<?php
//about theme info
add_action( 'admin_menu', 'hairstylist_salon_gettingstarted' );
function hairstylist_salon_gettingstarted() {
	add_theme_page( esc_html__('Hairstylist Salon', 'hairstylist-salon'), esc_html__('Hairstylist Salon', 'hairstylist-salon'), 'edit_theme_options', 'hairstylist_salon_about', 'hairstylist_salon_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function hairstylist_salon_admin_theme_style() {
	wp_enqueue_style('hairstylist-salon-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('hairstylist-salon-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'hairstylist_salon_admin_theme_style');

// Changelog
if ( ! defined( 'HAIRSTYLIST_SALON_CHANGELOG_URL' ) ) {
    define( 'HAIRSTYLIST_SALON_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function hairstylist_salon_changelog_screen() {	
	global $wp_filesystem;
	$changelog_file = apply_filters( 'hairstylist_salon_changelog_file', HAIRSTYLIST_SALON_CHANGELOG_URL );
	if ( $changelog_file && is_readable( $changelog_file ) ) {
		WP_Filesystem();
		$changelog = $wp_filesystem->get_contents( $changelog_file );
		$changelog_list = hairstylist_salon_parse_changelog( $changelog );
		echo wp_kses_post( $changelog_list );
	}
}

function hairstylist_salon_parse_changelog( $content ) {
	$content = explode ( '== ', $content );
	$changelog_isolated = '';
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}
	$changelog_array = explode( '= ', $changelog_isolated );
	unset( $changelog_array[0] );
	$changelog = '<div class="changelog">';
	foreach ( $changelog_array as $value) {
		$value = preg_replace( '/\n+/', '</span><span>', $value );
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div><hr>';
		$changelog .= str_replace( '<span></span>', '', $value );
	}
	$changelog .= '</div>';
	return wp_kses_post( $changelog );
}

//guidline for about theme
function hairstylist_salon_mostrar_guide() { 
	//custom function about theme customizer
	$hairstylist_salon_return = add_query_arg( array()) ;
	$hairstylist_salon_theme = wp_get_theme( 'hairstylist-salon' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Hairstylist Salon', 'hairstylist-salon' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'hairstylist-salon' ); ?>: <?php echo esc_html($hairstylist_salon_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="hairstylist_salon_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'hairstylist-salon' ); ?></button>
				<button class="tablinks" onclick="hairstylist_salon_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'hairstylist-salon' ); ?></button>
				<button class="tablinks" onclick="hairstylist_salon_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'hairstylist-salon' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$plugin_ins = Hairstylist_Salon_Plugin_Activation_WPElemento_Importer::get_instance();
					$hairstylist_salon_actions = $plugin_ins->recommended_actions;
					?>
					<div class="hairstylist-salon-recommended-plugins ">
							<div class="hairstylist-salon-action-list">
								<?php if ($hairstylist_salon_actions): foreach ($hairstylist_salon_actions as $key => $hairstylist_salon_actionValue): ?>
										<div class="hairstylist-salon-action" id="<?php echo esc_attr($hairstylist_salon_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($hairstylist_salon_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($hairstylist_salon_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($hairstylist_salon_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'hairstylist-salon'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'hairstylist-salon'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'hairstylist-salon'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'hairstylist-salon'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'hairstylist-salon'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'hairstylist-salon'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'hairstylist-salon'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'hairstylist-salon'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( HAIRSTYLIST_SALON_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'hairstylist-salon'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'hairstylist-salon'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'hairstylist-salon'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( HAIRSTYLIST_SALON_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'hairstylist-salon'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'hairstylist-salon'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'hairstylist-salon'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( HAIRSTYLIST_SALON_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'hairstylist-salon'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'hairstylist-salon' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','hairstylist-salon'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','hairstylist-salon'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','hairstylist-salon'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','hairstylist-salon'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php hairstylist_salon_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'hairstylist-salon'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Hairstylist Salon WordPress Theme', 'hairstylist-salon'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( HAIRSTYLIST_SALON_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'hairstylist-salon'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( HAIRSTYLIST_SALON_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'hairstylist-salon'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( HAIRSTYLIST_SALON_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'hairstylist-salon'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'hairstylist-salon'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'hairstylist-salon' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'hairstylist-salon' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'hairstylist-salon' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'hairstylist-salon' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'hairstylist-salon' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'hairstylist-salon' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'hairstylist-salon'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( HAIRSTYLIST_SALON_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'hairstylist-salon'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'hairstylist-salon' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>