<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
        'type'        => 'slider',
        'settings'    => 'hairstylist_salon_logo_resizer',
        'label'       => __( 'Logo Size', 'hairstylist-salon' ),
        'section'     => 'title_tagline',
        'default'     => 150,
        'choices'     => [
            'min'   => 50,
            'max'   => 300,
            'step'  => 1,
        ],
    ] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'hairstylist_salon_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'hairstylist-salon' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'hairstylist-salon' ),
			'off' => esc_html__( 'Disable', 'hairstylist-salon' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'hairstylist_salon_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'hairstylist-salon' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'hairstylist-salon' ),
			'off' => esc_html__( 'Disable', 'hairstylist-salon' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_site_tittle_transform_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Text Transform', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'hairstylist_salon_site_tittle_transform',
		'section'     => 'title_tagline',
		'default'     => 'none',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'hairstylist-salon' ),
			'uppercase' => esc_html__( 'Uppercase', 'hairstylist-salon' ),
			'lowercase' => esc_html__( 'Lowercase', 'hairstylist-salon' ),
			'capitalize' => esc_html__( 'Capitalize', 'hairstylist-salon' ),
		],
		'output' => array(
			array(
				'element'  => array( '.logo a'),
				'property' => ' text-transform',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_logo_settings_premium_features',
		'section'     => 'title_tagline',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Unlock More Features in the Premium Version!', 'hairstylist-salon' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customizable Text Logo', 'hairstylist-salon' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Enhanced Typography Options', 'hairstylist-salon' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Priority Support', 'hairstylist-salon' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'hairstylist-salon' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/salon-wordpress-theme', 'hairstylist-salon' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'hairstylist-salon' ) .'</a></div>',
	) );

	// Theme color

	Kirki::add_section( 'hairstylist_salon_theme_color_setting', array(
		'title'    => __( 'Color Option', 'hairstylist-salon' ),
		'priority' => 10,
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_theme_color',
		'label'       => __( 'Theme color', 'hairstylist-salon'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_theme_color_setting',
		'type'        => 'color',
		'default'     => '#CF814D',
	) );

	// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'hairstylist_salon_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'hairstylist-salon' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'hairstylist_salon_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_h1_typography_heading',
		'section'     => 'hairstylist_salon_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'hairstylist_salon_h1_typography_font',
		'section'   =>  'hairstylist_salon_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Delicious Handrawn',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  array('.header-image-box h1'),
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'hairstylist_salon_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_h2_typography_heading',
		'section'     => 'hairstylist_salon_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'hairstylist_salon_h2_typography_font',
		'section'   =>  'hairstylist_salon_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Josefin Sans', sans-serif",
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'hairstylist_salon_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_h3_typography_heading',
		'section'     => 'hairstylist_salon_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'hairstylist_salon_h3_typography_font',
		'section'   =>  'hairstylist_salon_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Josefin Sans', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'hairstylist_salon_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_h4_typography_heading',
		'section'     => 'hairstylist_salon_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'hairstylist_salon_h4_typography_font',
		'section'   =>  'hairstylist_salon_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Josefin Sans', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'hairstylist_salon_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_h5_typography_heading',
		'section'     => 'hairstylist_salon_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'hairstylist_salon_h5_typography_font',
		'section'   =>  'hairstylist_salon_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Josefin Sans', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'hairstylist_salon_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_h6_typography_heading',
		'section'     => 'hairstylist_salon_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'hairstylist_salon_h6_typography_font',
		'section'   =>  'hairstylist_salon_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Josefin Sans', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'hairstylist_salon_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_body_typography_heading',
		'section'     => 'hairstylist_salon_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'hairstylist_salon_body_typography_font',
		'section'   =>  'hairstylist_salon_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Poppins', sans-serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) ); 

	// Theme Options Panel
	Kirki::add_panel( 'hairstylist_salon_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'hairstylist-salon' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'hairstylist_salon_section_header',array(
		'title' => esc_html__( 'Header Settings', 'hairstylist-salon' ),
		'description'    => esc_html__( 'Here you can add header information.', 'hairstylist-salon' ),
		'panel' => 'hairstylist_salon_theme_options_panel',
		'tabs'  => [
			'header' => [
				'label' => esc_html__( 'Header', 'hairstylist-salon' ),
			],
			'menu'  => [
				'label' => esc_html__( 'Menu', 'hairstylist-salon' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'hairstylist_salon_menu_size_heading',
		'section'     => 'hairstylist_salon_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_menu_size',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'hairstylist-salon' ),
		'type'        => 'text',
		'tab'      => 'menu',
		'section'     => 'hairstylist_salon_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'hairstylist_salon_menu_text_transform_heading',
		'section'     => 'hairstylist_salon_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'menu',
		'settings'    => 'hairstylist_salon_menu_text_transform',
		'section'     => 'hairstylist_salon_section_header',
		'default'     => 'capitalize',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'hairstylist-salon' ),
			'uppercase' => esc_html__( 'Uppercase', 'hairstylist-salon' ),
			'lowercase' => esc_html__( 'Lowercase', 'hairstylist-salon' ),
			'capitalize' => esc_html__( 'Capitalize', 'hairstylist-salon' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'hairstylist_salon_enable_button_heading',
		'section'     => 'hairstylist_salon_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    => esc_html__( 'Button Text', 'hairstylist-salon' ),
		'settings' => 'hairstylist_salon_header_button_text',
		'section'  => 'hairstylist_salon_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Button Link', 'hairstylist-salon' ),
		'settings' => 'hairstylist_salon_header_button_url',
		'section'  => 'hairstylist_salon_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'hairstylist_salon_search_enable',
		'label'       => esc_html__( 'Enable/Disable Search', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_section_header',
		'default'     => 'on',
		'tab'      => 'header',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'hairstylist-salon' ),
			'off' => esc_html__( 'Disable', 'hairstylist-salon' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'hairstylist_salon_logo_settings_premium_features_header',
		'section'     => 'hairstylist_salon_section_header',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Enhance your header design now!', 'hairstylist-salon' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customize your header background color', 'hairstylist-salon' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Adjust icon and text font sizes', 'hairstylist-salon' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Explore enhanced typography options', 'hairstylist-salon' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'hairstylist-salon' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/salon-wordpress-theme', 'hairstylist-salon' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'hairstylist-salon' ) .'</a></div>',
	) );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'hairstylist_salon_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'hairstylist-salon' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'hairstylist-salon' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'hairstylist_salon_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'hairstylist-salon' ),
		'settings'    => 'hairstylist_salon_shop_page_layout',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'hairstylist-salon' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'hairstylist-salon' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'hairstylist_salon_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'hairstylist-salon' ),
		'settings'    => 'hairstylist_salon_products_per_row',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'hairstylist-salon' ),
		'settings'    => 'hairstylist_salon_products_per_page',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'hairstylist_salon_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'hairstylist-salon' ),
		'settings'    => 'hairstylist_salon_single_product_sidebar_layout',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'hairstylist-salon' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'hairstylist-salon' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'hairstylist_salon_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_products_button_border_radius_heading',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'hairstylist_salon_products_button_border_radius',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_sale_badge_position_heading',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'hairstylist_salon_sale_badge_position',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'hairstylist-salon' ),
			'left' => esc_html__( 'Left', 'hairstylist-salon' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_products_sale_font_size_heading',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'hairstylist_salon_products_sale_font_size',
		'section'     => 'hairstylist_salon_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'hairstylist_salon_additional_setting',array(
		'title' => esc_html__( 'Additional Settings', 'hairstylist-salon' ),
		'panel' => 'hairstylist_salon_theme_options_panel',
		'tabs'  => [
			'general' => [
				'label' => esc_html__( 'General', 'hairstylist-salon' ),
			],
			'header-image'  => [
				'label' => esc_html__( 'Header Image', 'hairstylist-salon' ),
			],
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'hairstylist_salon_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '0',
		'tab'      => 'general',
		'priority'    => 10,
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_scroll_alignment_heading',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Position', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio-buttonset',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_scroll_alignment',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => 'right',
		'choices'     => [
			'left' => esc_html__( 'left', 'hairstylist-salon' ),
			'center' => esc_html__( 'center', 'hairstylist-salon' ),
			'right' => esc_html__( 'right', 'hairstylist-salon' ),
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_scroller_border_radius_heading',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Border Radius', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'slider',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_scroller_border_radius',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '3',
		'choices'     => [
			'min'  => 0,
			'max'  => 25,
			'step' => 1,
		],
		'output' => array(
			array(
				'element'  => '.scroll-up a',
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_cursor_outline_heading',
		'section'     => 'hairstylist_salon_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dot Cursor', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_cursor_outline',
		'label'       => esc_html__( 'Enable or Disable Dot Cursor', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_single_page_layout_heading',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'hairstylist_salon_single_page_layout',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'hairstylist-salon' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'hairstylist-salon' ),
			'One Column' => esc_html__( 'One Column', 'hairstylist-salon' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'hairstylist_salon_header_background_attachment_heading',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'header-image',
		'settings'    => 'hairstylist_salon_header_background_attachment',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'hairstylist-salon' ),
			'fixed' => esc_html__( 'Fixed', 'hairstylist-salon' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'hairstylist_salon_header_image_height_heading',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image height', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_header_image_height',
		'label'       => __( 'Image Height', 'hairstylist-salon' ),
		'description'    => esc_html__( 'Enter a value in pixels. Example:500px', 'hairstylist-salon' ),
		'type'        => 'text',
		'tab'      => 'header-image',
		'default'    => [
			'desktop' => '550px',
			'tablet'  => '350px',
			'mobile'  => '200px',
		],
		'responsive' => true,
		'section'     => 'hairstylist_salon_additional_setting',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.header-image-box'),
				'property' => 'height',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'hairstylist_salon_header_overlay_heading',
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_header_overlay_setting',
		'label'       => __( 'Overlay Color', 'hairstylist-salon' ),
		'type'        => 'color',
		'tab'      => 'header-image',
		'section'     => 'hairstylist_salon_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000066',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'hairstylist_salon_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'hairstylist_salon_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'hairstylist_salon_blog_post',array(
		'title' => esc_html__( 'Post Settings', 'hairstylist-salon' ),
		'description'    => esc_html__( 'Here you can add post information.', 'hairstylist-salon' ),
		'panel' => 'hairstylist_salon_theme_options_panel',
		'tabs'  => [
			'blog-post' => [
				'label' => esc_html__( 'Blog Post', 'hairstylist-salon' ),
			],
			'single-post'  => [
				'label' => esc_html__( 'Single Post', 'hairstylist-salon' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_post_layout_heading',
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_post_layout',
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'hairstylist-salon' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'hairstylist-salon' ),
			'One Column' => esc_html__( 'One Column', 'hairstylist-salon' ),
			'Three Columns' => esc_html__( 'Three Columns', 'hairstylist-salon' ),
			'Four Columns' => esc_html__( 'Four Columns', 'hairstylist-salon' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_length_setting_heading',
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'tab'      => 'blog-post',
		'settings'    => 'hairstylist_salon_length_setting',
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'hairstylist_salon_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'hairstylist_salon_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'hairstylist_salon_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'hairstylist-salon' ),
		'settings'    => 'hairstylist_salon_single_post_tag',
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'hairstylist-salon' ),
		'settings'    => 'hairstylist_salon_single_post_category',
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'hairstylist_salon_post_comment_show_hide',
		'label'       => esc_html__( 'Show / Hide Comment Box', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'hairstylist_salon_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'hairstylist_salon_single_post_radius',
		'section'     => 'hairstylist_salon_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'hairstylist-salon' ),
		'type'        => 'text',
		'tab'      => 'single-post',
		'section'     => 'hairstylist_salon_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// No Results Page Settings

	Kirki::add_section( 'hairstylist_salon_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_page_not_found_title_heading',
		'section'     => 'hairstylist_salon_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'hairstylist_salon_page_not_found_title',
		'section'  => 'hairstylist_salon_no_result_section',
		'default'  => esc_html__('404 Error!', 'hairstylist-salon'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_page_not_found_text_heading',
		'section'     => 'hairstylist_salon_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'hairstylist_salon_page_not_found_text',
		'section'  => 'hairstylist_salon_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'hairstylist-salon'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'hairstylist_salon_page_not_found_line_break',
		'section'  => 'hairstylist_salon_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_no_results_title_heading',
		'section'     => 'hairstylist_salon_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'hairstylist_salon_no_results_title',
		'section'  => 'hairstylist_salon_no_result_section',
		'default'  => esc_html__('Nothing Found', 'hairstylist-salon'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_no_results_content_heading',
		'section'     => 'hairstylist_salon_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'hairstylist_salon_no_results_content',
		'section'  => 'hairstylist_salon_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hairstylist-salon'),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'hairstylist_salon_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'hairstylist-salon' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'hairstylist-salon' ),
        'panel'    => 'hairstylist_salon_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_show_footer_widget_heading',
		'section'     => 'hairstylist_salon_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'hairstylist_salon_show_footer_widget',
		'label'       => esc_html__( 'Footer Widget', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'hairstylist_salon_show_footer_copyright',
		'label'       => esc_html__( 'Footer Copyright', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_footer_text_heading',
		'section'     => 'hairstylist_salon_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'hairstylist_salon_footer_text',
		'section'  => 'hairstylist_salon_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_footer_enable_heading',
		'section'     => 'hairstylist_salon_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'hairstylist_salon_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'hairstylist-salon' ),
			'off' => esc_html__( 'Disable', 'hairstylist-salon' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_footer_background_widget_heading',
		'section'     => 'hairstylist_salon_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'hairstylist_salon_footer_background_widget',
		'type'        => 'background',
		'section'     => 'hairstylist_salon_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18,18,18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_footer_widget_alignment_heading',
		'section'     => 'hairstylist_salon_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Alignment', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'hairstylist_salon_footer_widget_alignment',
		'section'     => 'hairstylist_salon_footer_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'hairstylist-salon' ),
			'right' => esc_html__( 'right', 'hairstylist-salon' ),
			'left' => esc_html__( 'left', 'hairstylist-salon' ),
		],
		'output' => array(
			array(
				'element'  => '.footer-area',
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_footer_copright_color_heading',
		'section'     => 'hairstylist_salon_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_footer_section',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_footer_copright_text_color_heading',
		'section'     => 'hairstylist_salon_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_logo_settings_premium_features_footer',
		'section'     => 'hairstylist_salon_footer_section',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Elevate your footer with premium features:', 'hairstylist-salon' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Tailor your footer layout', 'hairstylist-salon' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Integrate an email subscription form', 'hairstylist-salon' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Personalize social media icons', 'hairstylist-salon' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'hairstylist-salon' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/salon-wordpress-theme', 'hairstylist-salon' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'hairstylist-salon' ) .'</a></div>',
	) );
	
	// Footer Social Icons Section

	Kirki::add_section( 'hairstylist_salon_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'hairstylist-salon' ),
		'panel'    => 'hairstylist_salon_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_footer_social_icon_hide_heading',
		'section'     => 'hairstylist_salon_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'hairstylist_salon_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'hairstylist_salon_enable_footer_socail_link_align_heading',
		'section'     => 'hairstylist_salon_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'hairstylist-salon' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'hairstylist_salon_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'hairstylist-salon' ),
		'section'     => 'hairstylist_salon_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'hairstylist-salon' ),
			'right' => esc_html__( 'right', 'hairstylist-salon' ),
			'left' => esc_html__( 'left', 'hairstylist-salon' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'hairstylist_salon_enable_footer_socail_link',
		'section'     => 'hairstylist_salon_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'hairstylist-salon' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'hairstylist_salon_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'hairstylist-salon' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'hairstylist-salon' ),
		'settings'     => 'hairstylist_salon_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'hairstylist-salon' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'hairstylist-salon' ). ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'hairstylist-salon' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'hairstylist-salon' ),
				'description' => esc_html__( 'Add the social icon url here.', 'hairstylist-salon' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

}
