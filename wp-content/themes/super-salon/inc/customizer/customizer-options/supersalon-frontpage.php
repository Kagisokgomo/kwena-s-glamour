<?php
function supersalon_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
			'supersalon_frontpage_sections', array(
				'priority' => 32,
				'title' => esc_html__( 'Frontpage Sections', 'super-salon' ),
			)
		);
	

	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'super-salon' ),
			'priority' => 13,
			'panel' => 'supersalon_frontpage_sections',
		)
	);
	

	$wp_customize->add_setting('supersalon_top_slider_tabs', array(
		'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new supersalon_Tab_Control($wp_customize, 'supersalon_top_slider_tabs', array(
		'section' => 'slider_setting',
		'priority' => 1,
		'buttons' => array(
		array(
			'name' => esc_html__('General', 'super-salon'),
			'icon' => 'dashicons dashicons-welcome-write-blog',
			'fields' => array(
				'slider1',
				'slider2',
				'slider3',
				'slider4',
				'slider5',
				'slider6'
			),
			'active' => true,
		),
		array(
			'name' => esc_html__('Style', 'super-salon'),
			'icon' => 'dashicons dashicons-art',
			'fields' => array(
				'slider_bgcol',
				'slider_titlecol',
				'slider_descriptioncol',
				'slider_btn1textcol',
				'slider_btn1bgcol',
				'slider_btn2textcol',
				'slider_btn2bordcol',
				'slider_arrowcol',
				'slider_arrowhrvcol'

			),
		),
		array(
		  'name' => esc_html__('Layout', 'super-salon'),
		  'icon' => 'dashicons dashicons-layout',
		  'fields' => array(
			  'slider_section_width',
		  ),
	   	)
		),
	)));


	// Slider 1
	$wp_customize->add_setting( 
    	'slider1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'slider1',
		array(
		    'label'   		=> __('Slider 1','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		



	// Slider 2
	$wp_customize->add_setting(
    	'slider2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'slider2',
		array(
		    'label'   		=> __('Slider 2','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 3
	$wp_customize->add_setting(
    	'slider3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider3',
		array(
		    'label'   		=> __('Slider 3','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 4
	$wp_customize->add_setting(
    	'slider4',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider4',
		array(
		    'label'   		=> __('Slider 4','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);



	// Slider 5
	$wp_customize->add_setting(
    	'slider5',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'slider5',
		array(
		    'label'   		=> __('Slider 5','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);


	// slider bg Color
	$sliderbgcol = esc_html__('#ff6a6c', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_bgcol',
    	array(
			'default' => $sliderbgcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_bgcol',
		array(
		    'label'   		=> __('BG Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider title Color
	$slidertitlecol = esc_html__('#fffcff', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_titlecol',
    	array(
			'default' => $slidertitlecol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_titlecol',
		array(
		    'label'   		=> __('Title Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider description Color
	$sliderdescriptioncol = esc_html__('#ecccce', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_descriptioncol',
    	array(
			'default' => $sliderdescriptioncol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_descriptioncol',
		array(
		    'label'   		=> __('Description Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider description Color
	$sliderdescriptioncol = esc_html__('#ecccce', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_descriptioncol',
    	array(
			'default' => $sliderdescriptioncol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_descriptioncol',
		array(
		    'label'   		=> __('Description Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btn1text Color
	$sliderbtn1textcol = esc_html__('#424242', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_btn1textcol',
    	array(
			'default' => $sliderbtn1textcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_btn1textcol',
		array(
		    'label'   		=> __('Button 1 Text Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btn1bg Color
	$sliderbtn1bgcol = esc_html__('#fff', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_btn1bgcol',
    	array(
			'default' => $sliderbtn1bgcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_btn1bgcol',
		array(
		    'label'   		=> __('Button 1 BG Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btn2text Color
	$sliderbtn2textcol = esc_html__('#fff', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_btn2textcol',
    	array(
			'default' => $sliderbtn2textcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_btn2textcol',
		array(
		    'label'   		=> __('Button 2 Text Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btn2bord Color
	$sliderbtn2bordcol = esc_html__('#fff', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_btn2bordcol',
    	array(
			'default' => $sliderbtn2bordcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_btn2bordcol',
		array(
		    'label'   		=> __('Button 2 Border Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider arrow Color
	$sliderarrowcol = esc_html__('#fff', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_arrowcol',
    	array(
			'default' => $sliderarrowcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_arrowcol',
		array(
		    'label'   		=> __('Arrows Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider arrowhrv Color
	$sliderarrowhrvcol = esc_html__('#000', 'super-salon' );
	$wp_customize->add_setting(
    	'slider_arrowhrvcol',
    	array(
			'default' => $sliderarrowhrvcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider_arrowhrvcol',
		array(
		    'label'   		=> __('Arrows Hover Color','super-salon'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// layout setting
	$wp_customize->add_setting('slider_section_width',array(
		'default' => 'Full Width',
		'sanitize_callback' => 'supersalon_sanitize_choices',
	));
	$wp_customize->add_control('slider_section_width',array(
		'type' => 'select',
		'label' => __('Section Width','super-salon'),
		'choices' => array (
			'Box Width' => __('Box Width','super-salon'),
			'Full Width' => __('Full Width','super-salon')
		),
		'section' => 'slider_setting',
	));
	


	/*=========================================
	Service Section
	=========================================*/
	$wp_customize->add_section(
		'Service_setting', array(
			'title' => esc_html__( 'Service Section', 'super-salon' ),
			'priority' => 14,
			'panel' => 'supersalon_frontpage_sections',
		)
	);

	$wp_customize->add_setting('supersalon_top_Service_tabs', array(
		'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new supersalon_Tab_Control($wp_customize, 'supersalon_top_Service_tabs', array(
		'section' => 'Service_setting',
		'priority' => 1,
		'buttons' => array(
		array(
			'name' => esc_html__('General', 'super-salon'),
			'icon' => 'dashicons dashicons-welcome-write-blog',
			'fields' => array(
				'Service1',
				'Service2',
				'Service3',
				'Service4',
				'Service5',
				'Service6'
			),
			'active' => true,
		),
		array(
			'name' => esc_html__('Style', 'super-salon'),
			'icon' => 'dashicons dashicons-art',
			'fields' => array(
				'Service_headingcol',
				'Service_subheadingcol',
				'Service_imgbrdcol',
				'Service_titlecol',
				'Service_descriptioncol'
			),
		),
		array(
		  'name' => esc_html__('Layout', 'super-salon'),
		  'icon' => 'dashicons dashicons-layout',
		  'fields' => array(
			  'Service_section_width',
			  'service_padding',
			  'service_top_padding',
			  'service_bottom_padding'
		  ),
	   	)
		),
	)));


	// Service 1
	$wp_customize->add_setting( 
    	'Service1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'Service1',
		array(
		    'label'   		=> __('Service 1','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		



	// Service 2
	$wp_customize->add_setting(
    	'Service2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'Service2',
		array(
		    'label'   		=> __('Service 2','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Service 3
	$wp_customize->add_setting(
    	'Service3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'Service3',
		array(
		    'label'   		=> __('Service 3','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Service 4
	$wp_customize->add_setting(
    	'Service4',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'Service4',
		array(
		    'label'   		=> __('Service 4','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);



	// Service 5
	$wp_customize->add_setting(
    	'Service5',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'Service5',
		array(
		    'label'   		=> __('Service 5','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);


	// Service 6
	$wp_customize->add_setting(
    	'Service6',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'Service6',
		array(
		    'label'   		=> __('Service 6','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);
	

	//style

	// Service heading Color
	$Serviceheadingcol = esc_html__('#000', 'super-salon' );
	$wp_customize->add_setting(
    	'Service_headingcol',
    	array(
			'default' => $Serviceheadingcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'Service_headingcol',
		array(
		    'label'   		=> __('Heading Color','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// Service subheading Color
	$Servicesubheadingcol = esc_html__('#888888', 'super-salon' );
	$wp_customize->add_setting(
    	'Service_subheadingcol',
    	array(
			'default' => $Servicesubheadingcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'Service_subheadingcol',
		array(
		    'label'   		=> __('Sub Heading Color','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);
	
	// Service imgbrd Color
	$Serviceimgbrdcol = esc_html__('#ff6a6c', 'super-salon' );
	$wp_customize->add_setting(
    	'Service_imgbrdcol',
    	array(
			'default' => $Serviceimgbrdcol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'Service_imgbrdcol',
		array(
		    'label'   		=> __('Image Border Color','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// Service title Color
	$Servicetitlecol = esc_html__('#060606', 'super-salon' );
	$wp_customize->add_setting(
    	'Service_titlecol',
    	array(
			'default' => $Servicetitlecol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'Service_titlecol',
		array(
		    'label'   		=> __('Title Color','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// Service description Color
	$Servicedescriptioncol = esc_html__('#888888', 'super-salon' );
	$wp_customize->add_setting(
    	'Service_descriptioncol',
    	array(
			'default' => $Servicedescriptioncol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'Service_descriptioncol',
		array(
		    'label'   		=> __('Description Color','super-salon'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// layout setting
	$wp_customize->add_setting('Service_section_width',array(
		'default' => 'Box Width',
		'sanitize_callback' => 'supersalon_sanitize_choices',
	));
	$wp_customize->add_control('Service_section_width',array(
		'type' => 'select',
		'label' => __('Section Width','super-salon'),
		'choices' => array (
			'Box Width' => __('Box Width','super-salon'),
			'Full Width' => __('Full Width','super-salon')
		),
		'section' => 'Service_setting',
	));



// service section padding 
	$wp_customize->add_setting('service_padding',array(
		'sanitize_callback'   => 'esc_html'
	)); 
	$wp_customize->add_control('service_padding',array(
		'label' => __('Section Padding','super-salon'),
		'section' => 'Service_setting'
	));

	$wp_customize->add_setting('service_top_padding',array(
		'default' => '4',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('service_top_padding',array(
		'type' => 'number',
		'label' => __('Top','super-salon'),
		'section' => 'Service_setting',
	));

	$wp_customize->add_setting('service_bottom_padding',array(
		'default' => '4',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('service_bottom_padding',array(
		'type' => 'number',
		'label' => __('Bottom','super-salon'),
		'section' => 'Service_setting',
	));


}

add_action( 'customize_register', 'supersalon_blog_setting' );

// service selective refresh
function supersalon_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'supersalon_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'supersalon_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'supersalon_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'supersalon_blog_section_partials' );

// blog_title
function supersalon_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function supersalon_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function supersalon_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}