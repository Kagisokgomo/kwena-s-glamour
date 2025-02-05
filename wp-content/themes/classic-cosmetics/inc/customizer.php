<?php
/**
 * Classic Cosmetics Theme Customizer
 *
 * @package Classic Cosmetics
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_cosmetics_customize_register( $wp_customize ) {

	function classic_cosmetics_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	function classic_cosmetics_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );
		
		// If the input is an absolute integer, return it; otherwise, return the default
		return ( $number ? $number : $setting->default );
	}

	function classic_cosmetics_sanitize_select( $input, $setting ){
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);
        //get the list of possible select options
        $choices = $setting->manager->get_control( $setting->id )->choices;
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }


	wp_enqueue_style('classic-cosmetics-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Logo
    $wp_customize->add_setting('classic_cosmetics_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_cosmetics_sanitize_integer'
	));
	$wp_customize->add_control(new Classic_Cosmetics_Slider_Custom_Control( $wp_customize, 'classic_cosmetics_logo_width',array(
		'label'	=> esc_html__('Logo Width','classic-cosmetics'),
		'section'=> 'title_tagline',
		'settings'=>'classic_cosmetics_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting('classic_cosmetics_title_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_cosmetics_title_enable', array(
	   'settings' => 'classic_cosmetics_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-cosmetics'),
	   'type'      => 'checkbox'
	));

	// site title color 
	$wp_customize->add_setting('classic_cosmetics_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_sitetitle_color', array(
	   'settings' => 'classic_cosmetics_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_cosmetics_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_cosmetics_tagline_enable', array(
	   'settings' => 'classic_cosmetics_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-cosmetics'),
	   'type'      => 'checkbox'
	));

	// site Tagline color
	$wp_customize->add_setting('classic_cosmetics_siteTagline_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_siteTagline_color', array(
	   'settings' => 'classic_cosmetics_siteTagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

	// woocommerce section
	$wp_customize->add_section('classic_cosmetics_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'classic-cosmetics'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('classic_cosmetics_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_cosmetics_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_cosmetics_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','classic-cosmetics'),
		'section' => 'classic_cosmetics_woocommerce_page_settings',
	));

    // shop page sidebar alignment
    $wp_customize->add_setting('classic_cosmetics_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_cosmetics_sanitize_choices',
	));
	$wp_customize->add_control('classic_cosmetics_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'classic-cosmetics'),
		'section'        => 'classic_cosmetics_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-cosmetics'),
			'Right Sidebar' => __('Right Sidebar', 'classic-cosmetics'),
		),
	));

	$wp_customize->add_setting('classic_cosmetics_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'classic_cosmetics_sanitize_choices'
	 ));
	 $wp_customize->add_control('classic_cosmetics_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','classic-cosmetics'),
		'choices' => array(
			 'Yes' => __('Yes','classic-cosmetics'),
			 'No' => __('No','classic-cosmetics'),
		 ),
		'section' => 'classic_cosmetics_woocommerce_page_settings',
	 ));

	$wp_customize->add_setting( 'classic_cosmetics_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_cosmetics_sanitize_checkbox'
    ) );
    $wp_customize->add_control('classic_cosmetics_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','classic-cosmetics'),
		'section' => 'classic_cosmetics_woocommerce_page_settings'
    ));

	// single product page sidebar alignment
    $wp_customize->add_setting('classic_cosmetics_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_cosmetics_sanitize_choices',
	));
	$wp_customize->add_control('classic_cosmetics_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'classic-cosmetics'),
		'section'        => 'classic_cosmetics_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-cosmetics'),
			'Right Sidebar' => __('Right Sidebar', 'classic-cosmetics'),
		),
	));

	$wp_customize->add_setting('classic_cosmetics_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_cosmetics_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_cosmetics_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','classic-cosmetics'),
		'section' => 'classic_cosmetics_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'classic_cosmetics_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_cosmetics_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Cosmetics_Slider_Custom_Control( $wp_customize, 'classic_cosmetics_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Product Img Border Radius','classic-cosmetics'),
		'section'=> 'classic_cosmetics_woocommerce_page_settings',
		'settings'=>'classic_cosmetics_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	
   // Add a setting for number of products per row
   $wp_customize->add_setting('classic_cosmetics_products_per_row', array(
		'default'   => '3',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_cosmetics_sanitize_integer'
	));
	$wp_customize->add_control('classic_cosmetics_products_per_row', array(
		'label'    => __('Products Per Row', 'classic-cosmetics'),
		'section'  => 'classic_cosmetics_woocommerce_page_settings',
		'settings' => 'classic_cosmetics_products_per_row',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	));

	// Add a setting for the number of products per page
	$wp_customize->add_setting('classic_cosmetics_products_per_page', array(
		'default'   => '9',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_cosmetics_sanitize_integer'
	));
	$wp_customize->add_control('classic_cosmetics_products_per_page', array(
		'label'    => __('Products Per Page', 'classic-cosmetics'),
		'section'  => 'classic_cosmetics_woocommerce_page_settings',
		'settings' => 'classic_cosmetics_products_per_page',
		'type'     => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('classic_cosmetics_product_sale_position',array(
		'default' => 'Left',
		'sanitize_callback' => 'classic_cosmetics_sanitize_choices'
	));
	$wp_customize->add_control('classic_cosmetics_product_sale_position',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','classic-cosmetics'),
		'section' => 'classic_cosmetics_woocommerce_page_settings',
		'choices' => array(
			'Left' => __('Left','classic-cosmetics'),
			'Right' => __('Right','classic-cosmetics'),
		),
	) );

	//Theme Options
	$wp_customize->add_panel( 'classic_cosmetics_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-cosmetics' ),
	) );
	
	//Site Layout Section
	$wp_customize->add_section('classic_cosmetics_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section','classic-cosmetics'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','classic-cosmetics'),
		'priority'	=> 1,
		'panel' => 'classic_cosmetics_panel_area',
	));		

	$wp_customize->add_setting('classic_cosmetics_preloader',array(
		'default' => false,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'classic_cosmetics_preloader', array(
	   'section'   => 'classic_cosmetics_site_layoutsec',
	   'label'	=> __('Check to show preloader','classic-cosmetics'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_cosmetics_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_cosmetics_preloader_bg_image',array(
        'section' => 'classic_cosmetics_site_layoutsec',
		'label' => __('Preloader Background Image','classic-cosmetics'),
	)));

	$wp_customize->add_setting( 'classic_cosmetics_theme_page_breadcrumb',array(
		'default' => false,
        'sanitize_callback'	=> 'classic_cosmetics_sanitize_checkbox',
	) );
	 $wp_customize->add_control('classic_cosmetics_theme_page_breadcrumb',array(
       'section' => 'classic_cosmetics_site_layoutsec',
	   'label' => __( 'Check To Enable Theme Page Breadcrumb','classic-cosmetics' ),
	   'type' => 'checkbox'
    ));		
	
	$wp_customize->add_setting('classic_cosmetics_box_layout',array(
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'classic_cosmetics_box_layout', array(
	   'section'   => 'classic_cosmetics_site_layoutsec',
	   'label'	=> __('Check to Box Layout','classic-cosmetics'),
	   'type'      => 'checkbox'
 	));

    // Add Settings and Controls for Page Layout
    $wp_customize->add_setting('classic_cosmetics_sidebar_page_layout',array(
		'default' => 'right',
	 	'sanitize_callback' => 'classic_cosmetics_sanitize_choices'
	));
	$wp_customize->add_control('classic_cosmetics_sidebar_page_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Page Sidebar Position', 'classic-cosmetics'),
		'section' => 'classic_cosmetics_site_layoutsec',
		'choices' => array(
			'full' => __('Full','classic-cosmetics'),
			'left' => __('Left','classic-cosmetics'),
			'right' => __('Right','classic-cosmetics'),
	),
	));			

	$wp_customize->add_setting( 'classic_cosmetics_site_layout_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_site_layout_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_site_layoutsec'
	));

   //Global Color
	$wp_customize->add_section('classic_cosmetics_global_color', array(
		'title'    => __('Manage Global Color Section', 'classic-cosmetics'),
		'panel'    => 'classic_cosmetics_panel_area',
	));

	$wp_customize->add_setting('classic_cosmetics_first_color', array(
		'default'           => '#673c35',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_cosmetics_first_color', array(
		'label'    => __('Theme Color', 'classic-cosmetics'),
		'section'  => 'classic_cosmetics_global_color',
		'settings' => 'classic_cosmetics_first_color',
	)));	

	$wp_customize->add_setting( 'classic_cosmetics_site_global_color_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_site_global_color_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_global_color'
	)); 

 	// Header Section
	$wp_customize->add_section('classic_cosmetics_header_section', array(
        'title' => __('Manage Header Section', 'classic-cosmetics'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','classic-cosmetics'),
        'priority' => null,
		'panel' => 'classic_cosmetics_panel_area',
 	));	

	$wp_customize->add_setting('classic_cosmetics_top_bar',array(
		'default' => true,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'classic_cosmetics_top_bar', array(
	   'section'   => 'classic_cosmetics_header_section',
	   'label'	=> __('Check to show Top Bar','classic-cosmetics'),
	   'type'      => 'checkbox'
 	)); 

 	$wp_customize->add_setting('classic_cosmetics_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_cosmetics_stickyheader', array(
	   'section'   => 'classic_cosmetics_header_section',
	   'label'	=> __('Check To Show Sticky Header','classic-cosmetics'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_cosmetics_offer_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_offer_text', array(
	   'settings' => 'classic_cosmetics_offer_text',
	   'section'   => 'classic_cosmetics_header_section',
	   'label' => __('Add Offer Text', 'classic-cosmetics'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_cosmetics_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'classic_cosmetics_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_phone_number', array(
	   'settings' => 'classic_cosmetics_phone_number',
	   'section'   => 'classic_cosmetics_header_section',
	   'label' => __('Add Phone Number', 'classic-cosmetics'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_cosmetics_product_category_number',array(
		'default' => '',
		'sanitize_callback' => 'classic_cosmetics_sanitize_number_absint',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_product_category_number', array(
	   'settings' => 'classic_cosmetics_product_category_number',
	   'section'   => 'classic_cosmetics_header_section',
	   'label' => __('Add Category Limit', 'classic-cosmetics'),
	   'type'      => 'number'
	));

	// header bg color
	$wp_customize->add_setting('classic_cosmetics_headerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_headerbg_color', array(
	   'settings' => 'classic_cosmetics_headerbg_color',
	   'section'   => 'classic_cosmetics_header_section',
	   'label' => __('Header BG Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'classic_cosmetics_header_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_header_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_header_section'
	));	

	// Social media Section
	$wp_customize->add_section('classic_cosmetics_social_media_section', array(
        'title' => __('Manage Social media Section', 'classic-cosmetics'),
		'description' => __('<p class="sec-title">Manage Social media Section</p>','classic-cosmetics'),
        'priority' => null,
		'panel' => 'classic_cosmetics_panel_area',
 	));

	$wp_customize->add_setting('classic_cosmetics_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_fb_link', array(
	   'settings' => 'classic_cosmetics_fb_link',
	   'section'   => 'classic_cosmetics_social_media_section',
	   'label' => __('Facebook Link', 'classic-cosmetics'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_cosmetics_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_insta_link', array(
	   'settings' => 'classic_cosmetics_insta_link',
	   'section'   => 'classic_cosmetics_social_media_section',
	   'label' => __('Instagram Link', 'classic-cosmetics'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_cosmetics_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_twitt_link', array(
	   'settings' => 'classic_cosmetics_twitt_link',
	   'section'   => 'classic_cosmetics_social_media_section',
	   'label' => __('Twitter Link', 'classic-cosmetics'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_cosmetics_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_youtube_link', array(
	   'settings' => 'classic_cosmetics_youtube_link',
	   'section'   => 'classic_cosmetics_social_media_section',
	   'label' => __('Youtube Link', 'classic-cosmetics'),
	   'type'      => 'url'
	));

	// top header bg color
	$wp_customize->add_setting('classic_cosmetics_topheaderbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_topheaderbg_color', array(
	   'settings' => 'classic_cosmetics_topheaderbg_color',
	   'section'   => 'classic_cosmetics_social_media_section',
	   'label' => __('BG Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'classic_cosmetics_social_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_social_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_social_media_section'
	));	

	// Home Category Dropdown Section
	$wp_customize->add_section('classic_cosmetics_one_cols_section',array(
		'title'	=> __('Manage Slider Section','classic-cosmetics'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 600).','classic-cosmetics'),
		'priority'	=> null,
		'panel' => 'classic_cosmetics_panel_area'
	));	

	//Hide Section
	$wp_customize->add_setting('classic_cosmetics_hide_categorysec',array(
		'default' => true,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	$wp_customize->add_control( 'classic_cosmetics_hide_categorysec', array(
	   'settings' => 'classic_cosmetics_hide_categorysec',
	   'section'   => 'classic_cosmetics_one_cols_section',
	   'label'     => __('Check To Enable This Section','classic-cosmetics'),
	   'type'      => 'checkbox'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'classic_cosmetics_slidersection', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Cosmetics_Category_Dropdown_Custom_Control( $wp_customize, 'classic_cosmetics_slidersection', array(
		'section' => 'classic_cosmetics_one_cols_section',
	   'label' => __('Select Category to display Slider', 'classic-cosmetics'),
		'settings'   => 'classic_cosmetics_slidersection',
	) ) );

	$wp_customize->add_setting('classic_cosmetics_slider_top_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_slider_top_text',array(
		'label'	=> esc_html__('Add Top Slider Text','classic-cosmetics'),
		'section'=> 'classic_cosmetics_one_cols_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('classic_cosmetics_button_text',array(
		'default' => 'Browse More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_button_text', array(
	   'settings' => 'classic_cosmetics_button_text',
	   'section'   => 'classic_cosmetics_one_cols_section',
	   'label' => __('Add Button Text', 'classic-cosmetics'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_cosmetics_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('classic_cosmetics_button_link_slider',array(
        'label' => esc_html__('Add Button Link','classic-cosmetics'),
        'section'=> 'classic_cosmetics_one_cols_section',
        'type'=> 'url'
    ));

    //Slider height
    $wp_customize->add_setting('classic_cosmetics_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('classic_cosmetics_slider_img_height',array(
        'label' => __('Slider Image Height','classic-cosmetics'),
        'description'   => __('Add the slider image height here (eg. 600px)','classic-cosmetics'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'classic-cosmetics' ),
        ),
        'section'=> 'classic_cosmetics_one_cols_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'classic_cosmetics_slider_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_slider_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_one_cols_section'
	));

	// Hot Products Category Section
	$wp_customize->add_section('classic_cosmetics_two_cols_section',array(
		'title'	=> __('Manage Trending Products Section','classic-cosmetics'),
		'description' => __('<p class="sec-title">Manage Trending Products Section</p>','classic-cosmetics'),
		'priority'	=> null,
		'panel' => 'classic_cosmetics_panel_area'
	));

	//Hide Section
	$wp_customize->add_setting('classic_cosmetics_product_selling',array(
		'default' => true,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_product_selling', array(
	   'settings' => 'classic_cosmetics_product_selling',
	   'section'   => 'classic_cosmetics_two_cols_section',
	   'label'     => __('Check To Enable This Section','classic-cosmetics'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_cosmetics_product_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_product_title', array(
	   'settings' => 'classic_cosmetics_product_title',
	   'section'   => 'classic_cosmetics_two_cols_section',
	   'label' => __('Add Section Title', 'classic-cosmetics'),
	   'type'      => 'text'
	));
	
	$args = array(
       	'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$categories = get_categories($args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('classic_cosmetics_hot_products_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'classic_cosmetics_sanitize_select',
	));
	$wp_customize->add_control('classic_cosmetics_hot_products_cat',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','classic-cosmetics'),
		'section' => 'classic_cosmetics_two_cols_section',
	));

	$wp_customize->add_setting( 'classic_cosmetics_second_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_second_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_two_cols_section'
	));

	//Blog post
	$wp_customize->add_section('classic_cosmetics_blog_post_settings',array(
        'title' => __('Manage Post Section', 'classic-cosmetics'),
        'priority' => null,
        'panel' => 'classic_cosmetics_panel_area'
    ) );	

	$wp_customize->add_setting('classic_cosmetics_metafields_date', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_cosmetics_metafields_date', array(
	    'settings' => 'classic_cosmetics_metafields_date', 
	    'section'   => 'classic_cosmetics_blog_post_settings',
	    'label'     => __('Check to Enable Date', 'classic-cosmetics'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('classic_cosmetics_metafields_comments', array(
		'default' => true,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	
	$wp_customize->add_control('classic_cosmetics_metafields_comments', array(
		'settings' => 'classic_cosmetics_metafields_comments',
		'section'  => 'classic_cosmetics_blog_post_settings',
		'label'    => __('Check to Enable Comments', 'classic-cosmetics'),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('classic_cosmetics_metafields_author', array(
		'default' => true,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_cosmetics_metafields_author', array(
		'settings' => 'classic_cosmetics_metafields_author',
		'section'  => 'classic_cosmetics_blog_post_settings',
		'label'    => __('Check to Enable Author', 'classic-cosmetics'),
		'type'     => 'checkbox',
	));		

	$wp_customize->add_setting('classic_cosmetics_metafields_time', array(
		'default' => true,
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_cosmetics_metafields_time', array(
		'settings' => 'classic_cosmetics_metafields_time',
		'section'  => 'classic_cosmetics_blog_post_settings',
		'label'    => __('Check to Enable Time', 'classic-cosmetics'),
		'type'     => 'checkbox',
	));	

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('classic_cosmetics_sidebar_post_layout',array(
		'default' => 'right',
		'sanitize_callback' => 'classic_cosmetics_sanitize_choices'
	));
	$wp_customize->add_control('classic_cosmetics_sidebar_post_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Post Sidebar Position', 'classic-cosmetics'),
		'description'   => __('This option work for blog page, archive page and search page.', 'classic-cosmetics'),
		'section' => 'classic_cosmetics_blog_post_settings',
		'choices' => array(
			'full' => __('Full','classic-cosmetics'),
			'left' => __('Left','classic-cosmetics'),
			'right' => __('Right','classic-cosmetics'),
			'three-column' => __('Three Columns','classic-cosmetics'),
			'four-column' => __('Four Columns','classic-cosmetics'),
			'grid' => __('Grid Layout','classic-cosmetics')
     ),
	) );

	$wp_customize->add_setting('classic_cosmetics_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'classic_cosmetics_sanitize_choices'
	));
	$wp_customize->add_control('classic_cosmetics_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','classic-cosmetics'),
        'section' => 'classic_cosmetics_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','classic-cosmetics'),
            'Excerpt Content' => __('Excerpt Content','classic-cosmetics'),
            'Full Content' => __('Full Content','classic-cosmetics'),
        ),
	) );

	$wp_customize->add_setting('classic_cosmetics_blog_post_thumb',array(
        'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('classic_cosmetics_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'classic-cosmetics'),
        'section'     => 'classic_cosmetics_blog_post_settings',
    ));

    $wp_customize->add_setting( 'classic_cosmetics_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_cosmetics_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Cosmetics_Slider_Custom_Control( $wp_customize, 'classic_cosmetics_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','classic-cosmetics'),
		'section'=> 'classic_cosmetics_blog_post_settings',
		'settings'=>'classic_cosmetics_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting( 'classic_cosmetics_post_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_post_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_blog_post_settings'
	));	

	//Single Post Settings
	$wp_customize->add_section('classic_cosmetics_single_post_settings',array(
		'title' => __('Manage Single Post Section', 'classic-cosmetics'),
		'priority' => null,
		'panel' => 'classic_cosmetics_panel_area'
	));

	$wp_customize->add_setting( 'classic_cosmetics_single_page_breadcrumb',array(
		'default' => true,
        'sanitize_callback'	=> 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_cosmetics_single_page_breadcrumb',array(
       'section' => 'classic_cosmetics_single_post_settings',
	   'label' => __( 'Check To Enable Breadcrumb','classic-cosmetics' ),
	   'type' => 'checkbox'
    ));	

	$wp_customize->add_setting('classic_cosmetics_sidebar_single_post_layout',array(
    	'default' => 'right',
    	 'sanitize_callback' => 'classic_cosmetics_sanitize_choices'
	));
	$wp_customize->add_control('classic_cosmetics_sidebar_single_post_layout',array(
   		'type' => 'radio',
    	'label'     => __('Single post sidebar layout', 'classic-cosmetics'),
     	'section' => 'classic_cosmetics_single_post_settings',
     	'choices' => array(
			'full' => __('Full','classic-cosmetics'),
			'left' => __('Left','classic-cosmetics'),
			'right' => __('Right','classic-cosmetics'),
     ),
	));

	$wp_customize->add_setting( 'classic_cosmetics_single_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_single_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_single_post_settings'
	)); 

	// Footer Section 
	$wp_customize->add_section('classic_cosmetics_footer', array(
		'title'	=> __('Mange Footer Section','classic-cosmetics'),
        'description' => __('<p class="sec-title">Manage Footer Section</p>','classic-cosmetics'),
		'priority'	=> null,
		'panel' => 'classic_cosmetics_panel_area',
	));

	$wp_customize->add_setting('classic_cosmetics_footer_widget', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_cosmetics_footer_widget', array(
	    'settings' => 'classic_cosmetics_footer_widget', // Corrected setting name
	    'section'   => 'classic_cosmetics_footer',
	    'label'     => __('Check to Enable Footer Widget', 'classic-cosmetics'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('classic_cosmetics_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_cosmetics_footer_bg_image',array(
        'label' => __('Footer Background Image','classic-cosmetics'),
        'section' => 'classic_cosmetics_footer',
    )));

	$wp_customize->add_setting('classic_cosmetics_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'classic_cosmetics_copyright_line', array(
	   'section' 	=> 'classic_cosmetics_footer',
	   'label'	 	=> __('Copyright Line','classic-cosmetics'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('classic_cosmetics_copyright_link',array(
    	'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_cosmetics_copyright_link', array(
	   'section' 	=> 'classic_cosmetics_footer',
	   'label'	 	=> __('Copyright Link','classic-cosmetics'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer bg color
	$wp_customize->add_setting('classic_cosmetics_footer_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_cosmetics_footer_bg_color', array(
        'label'    => __('Footer BG Color', 'classic-cosmetics'),
        'section'  => 'classic_cosmetics_footer',
    )));

	//  footer coypright color
	$wp_customize->add_setting('classic_cosmetics_footer_bg_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_cosmetics_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_footer_bg_color', array(
		'settings' => 'classic_cosmetics_footer_bg_color',
		'section'   => 'classic_cosmetics_footer',
		'label' => __('BG Color', 'classic-cosmetics'),
		'type'      => 'color'
	));

	//  footer coypright color
	$wp_customize->add_setting('classic_cosmetics_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_cosmetics_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_footercoypright_color', array(
	   'settings' => 'classic_cosmetics_footercoypright_color',
	   'section'   => 'classic_cosmetics_footer',
	   'label' => __('Coypright Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('classic_cosmetics_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_cosmetics_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_footertitle_color', array(
	   'settings' => 'classic_cosmetics_footertitle_color',
	   'section'   => 'classic_cosmetics_footer',
	   'label' => __('Title Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('classic_cosmetics_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_cosmetics_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_footerdescription_color', array(
	   'settings' => 'classic_cosmetics_footerdescription_color',
	   'section'   => 'classic_cosmetics_footer',
	   'label' => __('Description Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('classic_cosmetics_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_cosmetics_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_cosmetics_footerlist_color', array(
	   'settings' => 'classic_cosmetics_footerlist_color',
	   'section'   => 'classic_cosmetics_footer',
	   'label' => __('List Color', 'classic-cosmetics'),
	   'type'      => 'color'
	));

    $wp_customize->add_setting('classic_cosmetics_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'classic_cosmetics_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'classic-cosmetics' ),
        'section'        => 'classic_cosmetics_footer',
        'settings'       => 'classic_cosmetics_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('classic_cosmetics_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'classic_cosmetics_sanitize_choices'
    ));
    $wp_customize->add_control('classic_cosmetics_scroll_position',array(
        'type' => 'radio',
        'section' => 'classic_cosmetics_footer',
        'label'	 	=> __('Scroll To Top Positions','classic-cosmetics'),
        'choices' => array(
            'Right' => __('Right','classic-cosmetics'),
            'Left' => __('Left','classic-cosmetics'),
            'Center' => __('Center','classic-cosmetics')
        ),
    ) );

	$wp_customize->add_setting('classic_cosmetics_footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'classic_cosmetics_sanitize_choices',
	));
	$wp_customize->add_control('classic_cosmetics_footer_widget_areas',array(
		'type'        => 'radio',
		'section' => 'classic_cosmetics_footer',
		'label'       => __('Footer widget area', 'classic-cosmetics'),
		'choices' => array(
		   '1'     => __('One', 'classic-cosmetics'),
		   '2'     => __('Two', 'classic-cosmetics'),
		   '3'     => __('Three', 'classic-cosmetics'),
		   '4'     => __('Four', 'classic-cosmetics')
		),
	));

    $wp_customize->add_setting( 'classic_cosmetics_footer_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_cosmetics_footer_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(CLASSIC_COSMETICS_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_cosmetics_footer'
	));	

    // Google Fonts
    $wp_customize->add_section( 'classic_cosmetics_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'classic-cosmetics' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Jockey One:' => 'Jockey One',
		'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i:' => 'Montserrat',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'classic_cosmetics_headings_fonts', array(
		'sanitize_callback' => 'classic_cosmetics_sanitize_fonts',
	));
	$wp_customize->add_control( 'classic_cosmetics_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'classic-cosmetics'),
		'section' => 'classic_cosmetics_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'classic_cosmetics_body_fonts', array(
		'sanitize_callback' => 'classic_cosmetics_sanitize_fonts'
	));
	$wp_customize->add_control( 'classic_cosmetics_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'classic-cosmetics' ),
		'section' => 'classic_cosmetics_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting('classic_cosmetics_woocommerce_sidebar_shop',array(
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_cosmetics_woocommerce_sidebar_shop', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from shop page.','classic-cosmetics'),
	   'label'	=> __('Shop Page Sidebar layout','classic-cosmetics'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_cosmetics_woocommerce_sidebar_product',array(
		'sanitize_callback' => 'classic_cosmetics_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_cosmetics_woocommerce_sidebar_product', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from product page.','classic-cosmetics'),
	   'label'	=> __('Product Page Sidebar layout','classic-cosmetics'),
	   'type'      => 'checkbox'
 	));
}
add_action( 'customize_register', 'classic_cosmetics_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_cosmetics_customize_preview_js() {
	wp_enqueue_script( 'classic_cosmetics_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_cosmetics_customize_preview_js' );