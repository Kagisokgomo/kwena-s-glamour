<?php
/**
 * Nail Salon: Customizer
 *
 * @subpackage Nail Salon
 * @since 1.0
 */

use WPTRT\Customize\Section\Nail_Salon_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Nail_Salon_Button::class );

	$manager->add_section(
		new Nail_Salon_Button( $manager, 'nail_salon_pro', [
			'title' => __( 'Nail Salon Pro', 'nail-salon' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'nail-salon' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/nail-salon-wordpress-theme/', 'nail-salon')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'nail-salon-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'nail-salon-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function nail_salon_customize_register( $wp_customize ) {

	$wp_customize->add_setting('nail_salon_logo_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_logo_size',array(
		'type' => 'range',
		'description' => __('Logo Size (0-100%)','nail-salon'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('nail_salon_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('nail_salon_logo_padding',array(
		'label' => __('Logo Margin','nail-salon'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('nail_salon_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','nail-salon'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('nail_salon_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','nail-salon'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('nail_salon_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','nail-salon'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('nail_salon_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
 	));
 	$wp_customize->add_control('nail_salon_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','nail-salon'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('nail_salon_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'nail_salon_sanitize_checkbox'
	));
	$wp_customize->add_control('nail_salon_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','nail-salon'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('nail_salon_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','nail-salon'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting( 'nail_salonr_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salonr_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('nail_salon_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'nail_salon_sanitize_checkbox'
	));
	$wp_customize->add_control('nail_salon_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','nail-salon'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('nail_salon_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','nail-salon'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting( 'nail_salonr_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salonr_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'nail_salon_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'nail-salon' ),
		'description' => __( 'Description of what this panel does.', 'nail-salon' ),
	) );

	$wp_customize->add_section( 'nail_salon_theme_options_section', array(
    	'title'      => __( 'General Settings', 'nail-salon' ),
		'priority'   => 30,
		'panel' => 'nail_salon_panel_id'
	) );

	$wp_customize->add_setting('nail_salon_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'nail_salon_sanitize_choices'
	));
	$wp_customize->add_control('nail_salon_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','nail-salon'),
		'section' => 'nail_salon_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','nail-salon'),
		   'Right Sidebar' => __('Right Sidebar','nail-salon'),
		   'One Column' => __('One Column','nail-salon'),
		   'Grid Layout' => __('Grid Layout','nail-salon')
		),
	));

	$wp_customize->add_setting('nail_salon_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'nail_salon_sanitize_choices'
	));
	$wp_customize->add_control('nail_salon_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','nail-salon'),
        'section' => 'nail_salon_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','nail-salon'),
            'Right Sidebar' => __('Right Sidebar','nail-salon'),
            'One Column' => __('One Column','nail-salon')
        ),
	));

	$wp_customize->add_setting('nail_salon_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'nail_salon_sanitize_choices'
	));
	$wp_customize->add_control('nail_salon_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','nail-salon'),
        'section' => 'nail_salon_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','nail-salon'),
            'Right Sidebar' => __('Right Sidebar','nail-salon'),
            'One Column' => __('One Column','nail-salon')
        ),
	));

	$wp_customize->add_setting('nail_salon_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'nail_salon_sanitize_choices'
	));
	$wp_customize->add_control('nail_salon_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','nail-salon'),
        'section' => 'nail_salon_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','nail-salon'),
            'Right Sidebar' => __('Right Sidebar','nail-salon'),
            'One Column' => __('One Column','nail-salon'),
            'Grid Layout' => __('Grid Layout','nail-salon')
        ),
	));

	$wp_customize->add_setting( 'nail_salon_boxfull_width', array(
		'default'           => '',
		'sanitize_callback' => 'nail_salon_sanitize_choices'
	));
	
	$wp_customize->add_control( 'nail_salon_boxfull_width', array(
		'label'    => __( 'Section Width', 'nail-salon' ),
		'section'  => 'nail_salon_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'container'  => __('Box Width', 'nail-salon'),
			'container-fluid' => __('Full Width', 'nail-salon'),
			'none' => __('None', 'nail-salon')
		),
	));

	$wp_customize->add_setting( 'nail_salon_dropdown_anim', array(
		'default'           => 'None',
		'sanitize_callback' => 'nail_salon_sanitize_choices'
	));
	$wp_customize->add_control( 'nail_salon_dropdown_anim', array(
		'label'    => __( 'Menu Dropdown Animations', 'nail-salon' ),
		'section'  => 'nail_salon_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInUp'  => __('bounceInUp', 'nail-salon'),
			'fadeInUp' => __('fadeInUp', 'nail-salon'),
			'zoomIn'    => __('zoomIn', 'nail-salon'),
			'None'    => __('None', 'nail-salon')
		),
	));

	//Header
	$wp_customize->add_section( 'nail_salon_header_section' , array(
    	'title'    => __( 'Header', 'nail-salon' ),
		'priority' => null,
		'panel' => 'nail_salon_panel_id'
	) );

	$wp_customize->add_setting('nail_salon_button_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nail_salon_button_text',array(
	   	'type' => 'url',
	   	'label' => __('Add Button Text','nail-salon'),
	   	'section' => 'nail_salon_header_section',
	));

	$wp_customize->add_setting('nail_salon_button_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('nail_salon_button_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Button URL','nail-salon'),
	   	'section' => 'nail_salon_header_section',
	));

	$wp_customize->add_setting( 'nail_salon_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_menu_color', array(
		'label' => 'Menu Color',
		'section' => 'nail_salon_header_section',
	)));

	$wp_customize->add_setting( 'nail_salon_menuhvr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_menuhvr_color', array(
		'label' => 'Menu Hover Color',
		'section' => 'nail_salon_header_section',
	)));

	$wp_customize->add_setting( 'nail_salon_hdrbtn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_hdrbtn_color', array(
		'label' => 'Button Text Color',
		'section' => 'nail_salon_header_section',
	)));

	$wp_customize->add_setting( 'nail_salon_hdrbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_hdrbtnbg_color', array(
		'label' => 'Button Background Color',
		'section' => 'nail_salon_header_section',
	)));

	//home page slider
	$wp_customize->add_section( 'nail_salon_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'nail-salon' ),
		'priority' => null,
		'panel' => 'nail_salon_panel_id'
	) );

	$wp_customize->add_setting('nail_salon_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'nail_salon_sanitize_checkbox'
	));
	$wp_customize->add_control('nail_salon_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','nail-salon'),
	   	'section' => 'nail_salon_slider_section',
	));

	$wp_customize->add_setting( 'nail_salon_slider_effect', array(
		'default'           => '',
		'sanitize_callback' => 'nail_salon_sanitize_choices'
	));
	$wp_customize->add_control( 'nail_salon_slider_effect', array(
		'label'    => __( 'Onload Transactions Effects', 'nail-salon' ),
		'section'  => 'nail_salon_slider_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInLeft'  => __('bounceInLeft', 'nail-salon'),
			'bounceInRight' => __('bounceInRight', 'nail-salon'),
			'bounceInUp'    => __('bounceInUp', 'nail-salon'),
			'bounceInDown'    => __('bounceInDown', 'nail-salon'),
			'zoomIn'  => __('zoomIn', 'nail-salon'),
			'zoomOut' => __('zoomOut', 'nail-salon'),
			'fadeInDown'    => __('fadeInDown', 'nail-salon'),
			'fadeInUp'    => __('fadeInUp', 'nail-salon'),
			'fadeInLeft'  => __('fadeInLeft', 'nail-salon'),
			'fadeInRight' => __('fadeInRight', 'nail-salon'),
			'flip-up'    => __('flip-up', 'nail-salon'),
			'none'    => __('none', 'nail-salon')
		),
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'nail_salon_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'nail_salon_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'nail_salon_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'nail-salon' ),
			'description'=> __('Image size (350px x 350px)','nail-salon'),
			'section' => 'nail_salon_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('nail_salon_slider_excerpt_length',array(
		'default' => '20',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','nail-salon'),
		'section' => 'nail_salon_slider_section',
	));

	$wp_customize->add_setting('nail_salon_slider_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_slider_font_size',array(
		'type' => 'number',
		'label' => __('Title Font Size','nail-salon'),
		'section' => 'nail_salon_slider_section',
	));

	$wp_customize->add_setting('nail_salon_slider_text_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_slider_text_font_size',array(
		'type' => 'number',
		'label' => __('Text Font Size','nail-salon'),
		'section' => 'nail_salon_slider_section',
	));

	$wp_customize->add_setting( 'nail_salon_slider_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_slider_title_color', array(
		'label' => 'Title Color',
		'section' => 'nail_salon_slider_section',
	)));

	$wp_customize->add_setting( 'nail_salon_slider_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_slider_text_color', array(
		'label' => 'Text Color',
		'section' => 'nail_salon_slider_section',
	)));

	$wp_customize->add_setting( 'nail_salon_slider_btn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_slider_btn_color', array(
		'label' => 'Button Text Color',
		'section' => 'nail_salon_slider_section',
	)));

	$wp_customize->add_setting( 'nail_salon_slider_btnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_slider_btnbg_color', array(
		'label' => 'Button Background Color',
		'section' => 'nail_salon_slider_section',
	)));

	$wp_customize->add_setting( 'nail_salon_slider_btnhvr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_slider_btnhvr_color', array(
		'label' => 'Button Text Color',
		'section' => 'nail_salon_slider_section',
	)));

	$wp_customize->add_setting( 'nail_salon_slider_btnhvrbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_slider_btnhvrbg_color', array(
		'label' => 'Button Background Color',
		'section' => 'nail_salon_slider_section',
	)));

	$wp_customize->add_setting( 'nail_salon_slider_np_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_slider_np_color', array(
		'label' => 'Pre/Next Arrow Color',
		'section' => 'nail_salon_slider_section',
	)));

	//Features Section
	$wp_customize->add_section('nail_salon_service_section',array(
		'title'	=> __('Services Section','nail-salon'),
		'description'=> __('Note : This section will appear below the slider.','nail-salon'),
		'panel' => 'nail_salon_panel_id',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst1[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('nail_salon_service_category',array(
		'default' => 'select',
		'sanitize_callback' => 'nail_salon_sanitize_choices',
	));
	$wp_customize->add_control('nail_salon_service_category',array(
		'type' => 'select',
		'choices' => $cat_pst1,
		'label' => __('Select Category To Display Post','nail-salon'),
		'section' => 'nail_salon_service_section',
	));

	$wp_customize->add_setting('nail_salon_service_number',array(
		'default'	=> '4',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('nail_salon_service_number',array(
		'label'	=> __('Number Of Posts To Show In A Category','nail-salon'),
		'section' => 'nail_salon_service_section',
		'type'	  => 'number'
	));

	$nail_salon_service_number = get_theme_mod('nail_salon_service_number', 4);
	for ($i=1; $i <= $nail_salon_service_number; $i++) { 
	   	$wp_customize->add_setting('nail_salon_service_icon' . $i, array(
	      	'default' => 'fas fa-hand-paper',
	      	'sanitize_callback' => 'sanitize_text_field'
	   	));
	   	$wp_customize->add_control(new Nail_Salon_Fontawesome_Icon_Chooser($wp_customize, 'nail_salon_service_icon' . $i, array(
	      	'section' => 'nail_salon_service_section',
	      	'type' => 'icon',
	      	'label' => esc_html__('Service Icon ', 'nail-salon') . $i
	  	)));
	}

	$wp_customize->add_setting('nail_salon_service_icon_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_service_icon_size',array(
		'type' => 'number',
		'label' => __('Icon Size','nail-salon'),
		'section' => 'nail_salon_service_section',
	));

	$wp_customize->add_setting('nail_salon_service_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_service_title_font_size',array(
		'type' => 'number',
		'label' => __('Title Font Size','nail-salon'),
		'section' => 'nail_salon_service_section',
	));

	$wp_customize->add_setting('nail_salon_service_text_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'nail_salon_sanitize_float'
	));
	$wp_customize->add_control('nail_salon_service_text_font_size',array(
		'type' => 'number',
		'label' => __('Text Font Size','nail-salon'),
		'section' => 'nail_salon_service_section',
	));

	//About Section
	$wp_customize->add_section('nail_salon_about_section',array(
		'title'	=> __('About Section','nail-salon'),
		'description'=> __('Note : This section will appear below the service.','nail-salon'),
		'panel' => 'nail_salon_panel_id',
	));

    $wp_customize->add_setting('nail_salon_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('nail_salon_section_title',array(
		'label'	=> __('Section Title','nail-salon'),
		'section' => 'nail_salon_about_section',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'nail_salon_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'nail_salon_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'nail_salon_about_page', array(
		'label' => __('Select About Page', 'nail-salon' ),
		'section' => 'nail_salon_about_section',
		'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting('nail_salon_noof_list',array(
		'default' => 2,
		'sanitize_callback' => 'nail_salon_sanitize_float',
	));
	$wp_customize->add_control('nail_salon_noof_list',array(
		'type'    => 'number',
		'label' => __('No. of list','nail-salon'),
		'section' => 'nail_salon_about_section',
	));

	$nail_salon_noof_list = get_theme_mod('nail_salon_noof_list',2);
	for ( $count = 1; $count <= $nail_salon_noof_list; $count++ ) {
		$wp_customize->add_setting( 'nail_salon_about_list_text' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'nail_salon_about_list_text' . $count, array(
			'label' => __( 'About list text', 'nail-salon' ).$count,
			'section' => 'nail_salon_about_section',
			'type'    => 'text'
		) );
	}

	$wp_customize->add_setting('nail_salon_about_button_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nail_salon_about_button_text',array(
	   	'type' => 'url',
	   	'label' => __('Add Button Text','nail-salon'),
	   	'section' => 'nail_salon_about_section',
	));

	$wp_customize->add_setting('nail_salon_about_button_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('nail_salon_about_button_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Button URL','nail-salon'),
	   	'section' => 'nail_salon_about_section',
	));

	$wp_customize->add_setting( 'nail_salon_about_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_about_title_color', array(
		'label' => 'Title Color',
		'section' => 'nail_salon_about_section',
	)));

	$wp_customize->add_setting( 'nail_salon_about_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_about_text_color', array(
		'label' => 'Text Color',
		'section' => 'nail_salon_about_section',
	)));

	$wp_customize->add_setting( 'nail_salon_about_btn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_about_btn_color', array(
		'label' => 'Button Text Color',
		'section' => 'nail_salon_about_section',
	)));

	$wp_customize->add_setting( 'nail_salon_about_btnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_about_btnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'nail_salon_about_section',
	)));

	$wp_customize->add_setting( 'nail_salon_about_btnhvr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_about_btnhvr_color', array(
		'label' => 'Button Hover Text Color',
		'section' => 'nail_salon_about_section',
	)));

	$wp_customize->add_setting( 'nail_salon_about_btnhvrbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_about_btnhvrbg_color', array(
		'label' => 'Button Hover Bg Color',
		'section' => 'nail_salon_about_section',
	)));

	$wp_customize->add_setting( 'nail_salon_about_btnbdr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nail_salon_about_btnbdr_color', array(
		'label' => 'Button Border Color',
		'section' => 'nail_salon_about_section',
	)));

	//Footer
    $wp_customize->add_section( 'nail_salon_footer', array(
    	'title'  => __( 'Footer Setting', 'nail-salon' ),
		'priority' => null,
		'panel' => 'nail_salon_panel_id'
	) );

	$wp_customize->add_setting('nail_salon_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'nail_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control('nail_salon_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','nail-salon'),
       'section' => 'nail_salon_footer'
    ));

    $wp_customize->add_setting('nail_salon_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('nail_salon_footer_copy',array(
		'label'	=> __('Copyright Text','nail-salon'),
		'section' => 'nail_salon_footer',
		'setting' => 'nail_salon_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'nail_salon_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'nail_salon_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'nail_salon_customize_register' );

function nail_salon_customize_partial_blogname() {
	bloginfo( 'name' );
}

function nail_salon_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class Nail_Salon_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="nail-salon-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="nail-salon-icon-list clearfix">
	                <?php
	                $nail_salon_font_awesome_icon_array = nail_salon_font_awesome_icon_array();
	                foreach ($nail_salon_font_awesome_icon_array as $nail_salon_font_awesome_icon) {
	                   $icon_class = $this->value() == $nail_salon_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($nail_salon_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function nail_salon_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'nail_salon_customizer_script' );