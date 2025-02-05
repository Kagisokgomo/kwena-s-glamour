<?php
/**
 * Cosmetics Salon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cosmetics Salon
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Cosmetics_Salon_Loader.php' );

$Cosmetics_Salon_Loader = new \WPTRT\Autoload\Cosmetics_Salon_Loader();

$Cosmetics_Salon_Loader->cosmetics_salon_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Cosmetics_Salon_Loader->cosmetics_salon_register();

if ( ! function_exists( 'cosmetics_salon_setup' ) ) :

	function cosmetics_salon_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'cosmetics-salon', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('cosmetics-salon-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','cosmetics-salon' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'cosmetics_salon_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 100,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_cosmetics_salon_dismissable_notice', 'cosmetics_salon_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'cosmetics_salon_setup' );


function cosmetics_salon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cosmetics_salon_content_width', 1170 );
}
add_action( 'after_setup_theme', 'cosmetics_salon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cosmetics_salon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cosmetics-salon' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'cosmetics-salon' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'cosmetics-salon' ),
		'id'            => 'cosmetics-salon-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'cosmetics-salon' ),
		'id'            => 'cosmetics-salon-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'cosmetics-salon' ),
		'id'            => 'cosmetics-salon-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'cosmetics_salon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cosmetics_salon_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'manrope',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'cormorant',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'cosmetics-salon-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'cosmetics-salon-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'cosmetics-salon-style',$cosmetics_salon_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('cosmetics-salon-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cosmetics_salon_scripts' );

/**
 * Enqueue Preloader.
 */
function cosmetics_salon_preloader() {

	$cosmetics_salon_theme_color_css = '';
	$cosmetics_salon_preloader_bg_color = get_theme_mod('cosmetics_salon_preloader_bg_color');
	$cosmetics_salon_preloader_dot_1_color = get_theme_mod('cosmetics_salon_preloader_dot_1_color');
	$cosmetics_salon_preloader_dot_2_color = get_theme_mod('cosmetics_salon_preloader_dot_2_color');
	$cosmetics_salon_logo_max_height = get_theme_mod('cosmetics_salon_logo_max_height');
	$cosmetics_salon_scroll_bg_color = get_theme_mod('cosmetics_salon_scroll_bg_color');
	$cosmetics_salon_scroll_color = get_theme_mod('cosmetics_salon_scroll_color');
	$cosmetics_salon_scroll_font_size = get_theme_mod('cosmetics_salon_scroll_font_size');
	$cosmetics_salon_scroll_border_radius = get_theme_mod('cosmetics_salon_scroll_border_radius');

  	if(get_theme_mod('cosmetics_salon_logo_max_height') == '') {
		$cosmetics_salon_logo_max_height = '100';
	}

	if(get_theme_mod('cosmetics_salon_preloader_bg_color') == '') {
		$cosmetics_salon_preloader_bg_color = '#F9A392';
	}
	if(get_theme_mod('cosmetics_salon_preloader_dot_1_color') == '') {
		$cosmetics_salon_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('cosmetics_salon_preloader_dot_2_color') == '') {
		$cosmetics_salon_preloader_dot_2_color = '#222222';
	}
	$cosmetics_salon_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($cosmetics_salon_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($cosmetics_salon_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($cosmetics_salon_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($cosmetics_salon_preloader_dot_2_color).';
		  }
		}
		a#button{
			background-color: '.esc_attr($cosmetics_salon_scroll_bg_color).';
			color: '.esc_attr($cosmetics_salon_scroll_color).' !important;
			font-size: '.esc_attr($cosmetics_salon_scroll_font_size).'px;
			border-radius: '.esc_attr($cosmetics_salon_scroll_border_radius).'%;
		}
	';
    wp_add_inline_style( 'cosmetics-salon-style',$cosmetics_salon_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'cosmetics_salon_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/* TGM. */
require get_parent_theme_file_path( '/inc/tgm.php' );


function cosmetics_salon_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*dropdown page sanitization*/
function cosmetics_salon_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function cosmetics_salon_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function cosmetics_salon_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function cosmetics_salon_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function cosmetics_salon_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'cosmetics_salon_loop_columns');
if (!function_exists('cosmetics_salon_loop_columns')) {
	function cosmetics_salon_loop_columns() {
		$columns = get_theme_mod( 'cosmetics_salon_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'cosmetics_salon_shop_per_page', 9 );
function cosmetics_salon_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'cosmetics_salon_product_per_page', 9 );
	return $cols;
}

function cosmetics_salon_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer' );
    $wp_customize->remove_control( 'pro_version_footer' );

}
add_action( 'customize_register', 'cosmetics_salon_remove_customize_register', 11 );

/**
 * Get CSS
 */

function cosmetics_salon_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','cosmetics_salon',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('cosmetics_salon_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'cosmetics_salon_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_cosmetics-salon-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'cosmetics-salon-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'cosmetics_salon_getpage_css' );

if ( ! defined( 'COSMETICS_SALON_CONTACT_SUPPORT' ) ) {
define('COSMETICS_SALON_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/cosmetics-salon/','cosmetics-salon'));
}
if ( ! defined( 'COSMETICS_SALON_REVIEW' ) ) {
define('COSMETICS_SALON_REVIEW',__('https://wordpress.org/support/theme/cosmetics-salon/reviews/','cosmetics-salon'));
}
if ( ! defined( 'COSMETICS_SALON_LIVE_DEMO' ) ) {
define('COSMETICS_SALON_LIVE_DEMO',__('https://demo.themagnifico.net/cosmetics-salon/','cosmetics-salon'));
}
if ( ! defined( 'COSMETICS_SALON_GET_PREMIUM_PRO' ) ) {
define('COSMETICS_SALON_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/cosmetics-wordpress-theme/','cosmetics-salon'));
}
if ( ! defined( 'COSMETICS_SALON_PRO_DOC' ) ) {
define('COSMETICS_SALON_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/cosmetics-salon-pro-doc/','cosmetics-salon'));
}
if ( ! defined( 'COSMETICS_SALON_FREE_DOC' ) ) {
define('COSMETICS_SALON_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/cosmetics-salon-free-doc/','cosmetics-salon'));
}

add_action('admin_menu', 'cosmetics_salon_themepage');
function cosmetics_salon_themepage(){

	$cosmetics_salon_theme_test = wp_get_theme();

	$cosmetics_salon_theme_info = add_theme_page( __('Theme Options','cosmetics-salon'), __(' Theme Options','cosmetics-salon'), 'manage_options', 'cosmetics-salon-info.php', 'cosmetics_salon_info_page' );
}

function cosmetics_salon_info_page() {
	$cosmetics_salon_theme_user = wp_get_current_user();
	$cosmetics_salon_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap cosmetics-salon-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','cosmetics-salon'); ?><?php echo esc_html( $cosmetics_salon_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "cosmetics-salon"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Cosmetics Salon , feel free to contact us for any support regarding our theme.", "cosmetics-salon"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( COSMETICS_SALON_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "cosmetics-salon"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "cosmetics-salon"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "cosmetics-salon"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( COSMETICS_SALON_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "cosmetics-salon"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "cosmetics-salon"); ?></h3>
						<p><?php esc_html_e("If You love Cosmetics Salon theme then we would appreciate your review about our theme.", "cosmetics-salon"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( COSMETICS_SALON_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "cosmetics-salon"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "cosmetics-salon"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "cosmetics-salon"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( COSMETICS_SALON_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("FREE DOCUMENTATION", "cosmetics-salon"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","cosmetics-salon"); ?></h2>
		<div class="cosmetics-salon-button-container">
			<a target="_blank" href="<?php echo esc_url( COSMETICS_SALON_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "cosmetics-salon"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( COSMETICS_SALON_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "cosmetics-salon"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "cosmetics-salon"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "cosmetics-salon"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "cosmetics-salon"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "cosmetics-salon"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "cosmetics-salon"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "cosmetics-salon"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "cosmetics-salon"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="cosmetics-salon-button-container">
			<a target="_blank" href="<?php echo esc_url( COSMETICS_SALON_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "cosmetics-salon"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function cosmetics_salon_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'cosmetics_salon_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
add_action( 'wp_ajax_cosmetics_salon_dismissed_notice_handler', 'cosmetics_salon_ajax_notice_handler' );

function cosmetics_salon_deprecated_hook_admin_notice() {

    $cosmetics_salon_dismissed = get_user_meta(get_current_user_id(), 'cosmetics_salon_dismissable_notice', true);
    if ( !$cosmetics_salon_dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'cosmetics-salon'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'cosmetics-salon'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=cosmetics-salon-info.php' )); ?>"><?php esc_html_e( 'Get started', 'cosmetics-salon' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( COSMETICS_SALON_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'cosmetics-salon' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( COSMETICS_SALON_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'cosmetics-salon' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'cosmetics_salon_deprecated_hook_admin_notice' );

function cosmetics_salon_switch_theme() {
    delete_user_meta(get_current_user_id(), 'cosmetics_salon_dismissable_notice');
}
add_action('after_switch_theme', 'cosmetics_salon_switch_theme');
function cosmetics_salon_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'cosmetics_salon_dismissable_notice', true);
    die();
}
