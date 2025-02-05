<?php
/**
 * Add custom settings and controls to the WordPress Customizer
 */


//---------------------Code to add the Upgrade to Pro button in the Customizer----------

function glam_hair_salon_customize_register_btn( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    get_template_part('inc/customizer-button/upsell-section');

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'glam_hair_salon_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'glam_hair_salon_customize_partial_blogdescription',
        ) );
    }

    $wp_customize->register_section_type( 'glam_hair_salon_Customize_Upsell_Section' );

    // Register section.
    $wp_customize->add_section(
        new glam_hair_salon_Customize_Upsell_Section(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Glam Pro', 'glam-hair-salon' ),
                'pro_text' => esc_html__( 'Upgrade To Pro', 'glam-hair-salon' ),
                'pro_url'  => 'https://cawpthemes.com/glam-hair-salon-premium-wordpress-theme/',
                'priority' => 1,
            )
        )
    );
}
add_action( 'customize_register', 'glam_hair_salon_customize_register_btn' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function glam_hair_salon_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function glam_hair_salon_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function glam_hair_salon_customize_preview_js() {
    wp_enqueue_script( 'glam-hair-salon-customizer', get_template_directory_uri() . '/inc/customizer-button/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'glam_hair_salon_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function glam_hair_salon_customizer_control_scripts() {

    wp_enqueue_style( 'glam-hair-salon-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.css', '', '1.0.0' );

    wp_enqueue_script( 'glam-hair-salon-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'glam_hair_salon_customizer_control_scripts', 0 );


//---------------------Code to add the Upgrade to Pro button in the Customizer End----------


//------------------Theme Information--------------------


function glam_hair_salon_customize_register( $wp_customize ) {


      // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'glam_hair_salon_site_identity_color', array(
    'default' => '#c59d5f',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'glam_hair_salon_site_identity_color', array(
    'label' => __( 'Site Identity Color', 'glam-hair-salon' ),
    'section' => 'title_tagline',
    'settings' => 'glam_hair_salon_site_identity_color',
  ) ) );


  // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'glam_hair_salon_site_identity_tagline_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'glam_hair_salon_site_identity_tagline_color', array(
    'label' => __( 'Tagline Color', 'glam-hair-salon' ),
    'section' => 'title_tagline',
    'settings' => 'glam_hair_salon_site_identity_tagline_color',
  ) ) );

//------------------Site Identity Ends---------------------

  
  // Add a custom setting for the primary color
  $wp_customize->add_setting( 'glam_hair_salon_primary_color', array(
    'default' => '#0073aa',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'glam_hair_salon_primary_color', array(
    'label' => __( 'Primary Color', 'glam-hair-salon' ),
    'section' => 'colors',
    'settings' => 'glam_hair_salon_primary_color',
  ) ) );

  //-----------------------------------Home Front Page-------------------------------

  $wp_customize->add_panel( 'glam_hair_salon_panel', array(
    'title'    => __( 'Front Page Settings', 'glam-hair-salon' ),
    'priority' => 100,
  ) );


  //-------------------------------------Banner Image Section--------------

      $wp_customize->add_section( 'glam_hair_salon_section_banner', array(
        'title'    => __( 'Home First Section', 'glam-hair-salon' ),
        'priority' => 8,
        'panel'    => 'glam_hair_salon_panel',
    ) );


  //-----------------Enable Option banner-------------

  $wp_customize->add_setting('glam_hair_salon_section_banner',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glam_hair_salon_sanitize_choices'
  ));
  $wp_customize->add_control('glam_hair_salon_section_banner',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glam-hair-salon'),
        'section' => 'glam_hair_salon_section_banner',
        'choices' => array(
            'Enable' => __('Enable', 'glam-hair-salon'),
            'Disable' => __('Disable', 'glam-hair-salon')
  )));

  $wp_customize->add_setting('glam_hair_salon_section_bannerimage_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'glam_hair_salon_section_bannerimage_section',array(
    'label' => __('Section Background Image','glam-hair-salon'),
    'description' => __('Dimention 1600 * 800','glam-hair-salon'),
    'section' => 'glam_hair_salon_section_banner',
    'settings' => 'glam_hair_salon_section_bannerimage_section'
  )));

    $wp_customize->add_setting('glam_hair_salon_section_bannerimage_section_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_section_bannerimage_section_title',array(
      'label' => __('Banner Title','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner',
      'setting' => 'glam_hair_salon_section_bannerimage_section_title',
      'type'    => 'text'
    )
  ); 

      $wp_customize->add_setting('glam_hair_salon_section_bannerimage_section_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_section_bannerimage_section_text',array(
      'label' => __('Banner Text','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner',
      'setting' => 'glam_hair_salon_section_bannerimage_section_text',
      'type'    => 'textarea'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_banner_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_banner_btn_text',array(
      'label' => __('Button Text','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner',
      'setting' => 'glam_hair_salon_banner_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('glam_hair_salon_banner_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_banner_btn_text_url',array(
      'label' => __('Button URL','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner',
      'setting' => 'glam_hair_salon_banner_btn_text_url',
      'type'    => 'text'
    )
  );


  //----------------------------------Features Section----------------------------



    $wp_customize->add_section( 'glam_hair_salon_features', array(
        'title'    => __( 'Features Section', 'glam-hair-salon' ),
        'priority' => 10,
        'panel'    => 'glam_hair_salon_panel',
    ) );

  //-----------------Enable Option Section about-------------

  $wp_customize->add_setting('glam_hair_salon_features_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glam_hair_salon_sanitize_choices'
  ));
  $wp_customize->add_control('glam_hair_salon_features_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glam-hair-salon'),
        'section' => 'glam_hair_salon_features',
        'choices' => array(
            'Enable' => __('Enable', 'glam-hair-salon'),
            'Disable' => __('Disable', 'glam-hair-salon')
  )));

    //--------------Features Box 1-----------------------

    $wp_customize->add_setting('glam_hair_salon_feature_name1',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_name1',array(
      'label' => __('Feature Title 1','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_name1',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_feature_title_second1',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_title_second1',array(
      'label' => __('Feature Sub Title 1','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_title_second1',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_feature_para1',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_para1',array(
      'label' => __('Feature Text 1','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_para1',
      'type'    => 'text'
    )
  ); 


    $wp_customize->add_setting('glam_hair_salon_feature_link_title1',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_link_title1',array(
      'label' => __('Link Text 1','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_link_title1',
      'type'    => 'text'
    )
  ); 

    $wp_customize->add_setting('glam_hair_salon_feature_link1',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_link1',array(
      'label' => __('Link 1','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_link1',
      'type'    => 'text'
    )
  );


    //--------------Features Box 2-----------------------

    $wp_customize->add_setting('glam_hair_salon_feature_name2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_name2',array(
      'label' => __('Feature Title 2','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_name2',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_feature_title_second2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_title_second2',array(
      'label' => __('Feature Sub Title 2','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_title_second1',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_feature_para2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_para2',array(
      'label' => __('Feature Text 2','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_para2',
      'type'    => 'text'
    )
  ); 


    $wp_customize->add_setting('glam_hair_salon_feature_link_title2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_link_title2',array(
      'label' => __('Link Text 2','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_link_title2',
      'type'    => 'text'
    )
  ); 

    $wp_customize->add_setting('glam_hair_salon_feature_link2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_link2',array(
      'label' => __('Link 2','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_link1',
      'type'    => 'text'
    )
  );

    //--------------Features Box 3-----------------------

    $wp_customize->add_setting('glam_hair_salon_feature_name3',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_name3',array(
      'label' => __('Feature Title 3','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_name3',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_feature_title_second3',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_title_second3',array(
      'label' => __('Feature Sub Title 3','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_title_second1',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_feature_para3',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_para3',array(
      'label' => __('Feature Text 3','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_para3',
      'type'    => 'text'
    )
  ); 


    $wp_customize->add_setting('glam_hair_salon_feature_link_title3',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_link_title3',array(
      'label' => __('Link Text 3','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_link_title3',
      'type'    => 'text'
    )
  ); 

    $wp_customize->add_setting('glam_hair_salon_feature_link3',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_feature_link3',array(
      'label' => __('Link 3','glam-hair-salon'),
      'section' => 'glam_hair_salon_features',
      'setting' => 'glam_hair_salon_feature_link3',
      'type'    => 'text'
    )
  );

  //-----------------------Banner 2 Image Section--------------

      $wp_customize->add_section( 'glam_hair_salon_section_banner2', array(
        'title'    => __( 'Banner Section', 'glam-hair-salon' ),
        'priority' => 10,
        'panel'    => 'glam_hair_salon_panel',
    ) );


  //-----------------Enable Option banner-------------

  $wp_customize->add_setting('glam_hair_salon_section_enable_banner2',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glam_hair_salon_sanitize_choices'
  ));
  $wp_customize->add_control('glam_hair_salon_section_enable_banner2',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glam-hair-salon'),
        'section' => 'glam_hair_salon_section_banner2',
        'choices' => array(
            'Enable' => __('Enable', 'glam-hair-salon'),
            'Disable' => __('Disable', 'glam-hair-salon')
  )));

  $wp_customize->add_setting('glam_hair_salon_section_bannerimage_section2',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'glam_hair_salon_section_bannerimage_section2',array(
    'label' => __('Section Background Image','glam-hair-salon'),
    'description' => __('Dimention 1600 * 800','glam-hair-salon'),
    'section' => 'glam_hair_salon_section_banner2',
    'settings' => 'glam_hair_salon_section_bannerimage_section2'
  )));

    $wp_customize->add_setting('glam_hair_salon_section_bannerimage_section_title2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_section_bannerimage_section_title2',array(
      'label' => __('Banner Title','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner2',
      'setting' => 'glam_hair_salon_section_bannerimage_section_title2',
      'type'    => 'text'
    )
  ); 

      $wp_customize->add_setting('glam_hair_salon_section_bannerimage_section_text2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_section_bannerimage_section_text2',array(
      'label' => __('Banner Text','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner2',
      'setting' => 'glam_hair_salon_section_bannerimage_section_text2',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_banner_btn_text2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_banner_btn_text2',array(
      'label' => __('Button Text','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner2',
      'setting' => 'glam_hair_salon_banner_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('glam_hair_salon_banner_btn_text_url2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_banner_btn_text_url2',array(
      'label' => __('Button URL','glam-hair-salon'),
      'section' => 'glam_hair_salon_section_banner2',
      'setting' => 'glam_hair_salon_banner_btn_text_url2',
      'type'    => 'text'
    )
  );

  //----------------------------------About Section----------------------------

    $wp_customize->add_section( 'glam_hair_salon_about', array(
        'title'    => __( 'About Section', 'glam-hair-salon' ),
        'priority' => 10,
        'panel'    => 'glam_hair_salon_panel',
    ) );

  //-----------------Enable Option Section about-------------

  $wp_customize->add_setting('glam_hair_salon_about_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glam_hair_salon_sanitize_choices'
  ));
  $wp_customize->add_control('glam_hair_salon_about_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glam-hair-salon'),
        'section' => 'glam_hair_salon_about',
        'choices' => array(
            'Enable' => __('Enable', 'glam-hair-salon'),
            'Disable' => __('Disable', 'glam-hair-salon')
  )));

    //--------------About Title-----------------------

    $wp_customize->add_setting('glam_hair_salon_about_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_about_title',array(
      'label' => __('Section Title','glam-hair-salon'),
      'section' => 'glam_hair_salon_about',
      'setting' => 'glam_hair_salon_about_title',
      'type'    => 'text'
    )
  ); 


  //-----------------------------About Image-----------

  $wp_customize->add_setting('glam_hair_salon_aboutimage1_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'glam_hair_salon_aboutimage1_section',array(
    'label' => __('About Side Image','glam-hair-salon'),
    'description' => __('Dimention 500 * 500','glam-hair-salon'),
    'section' => 'glam_hair_salon_about',
    'settings' => 'glam_hair_salon_aboutimage1_section'
  )));

  $wp_customize->add_setting('glam_hair_salon_aboutimage2_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'glam_hair_salon_aboutimage2_section',array(
    'label' => __('About Side Image 2','glam-hair-salon'),
    'description' => __('Dimention 500 * 500','glam-hair-salon'),
    'section' => 'glam_hair_salon_about',
    'settings' => 'glam_hair_salon_aboutimage2_section'
  )));


    $wp_customize->add_setting('glam_hair_salon_about_name',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_about_name',array(
      'label' => __('Main Heading','glam-hair-salon'),
      'section' => 'glam_hair_salon_about',
      'setting' => 'glam_hair_salon_about_name',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('glam_hair_salon_about_title_second',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_about_title_second',array(
      'label' => __('Paragraph 1','glam-hair-salon'),
      'section' => 'glam_hair_salon_about',
      'setting' => 'glam_hair_salon_about_title_second',
      'type'    => 'textarea'
    )
  );


    $wp_customize->add_setting('glam_hair_salon_about_para',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_about_para',array(
      'label' => __('Paragraph 2','glam-hair-salon'),
      'section' => 'glam_hair_salon_about',
      'setting' => 'glam_hair_salon_about_para',
      'type'    => 'textarea'
    )
  );

    $wp_customize->add_setting('glam_hair_salon_about_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_about_btn_text',array(
      'label' => __('Button Text','glam-hair-salon'),
      'section' => 'glam_hair_salon_about',
      'setting' => 'glam_hair_salon_about_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('glam_hair_salon_about_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_about_btn_text_url',array(
      'label' => __('Button URL','glam-hair-salon'),
      'section' => 'glam_hair_salon_about',
      'setting' => 'glam_hair_salon_about_btn_text_url',
      'type'    => 'text'
    )
  );

  //------------Section One (Featured Post)---------------------

  $wp_customize->add_section( 'glam_hair_salon_section1', array(
        'title'    => __( 'Latest Post', 'glam-hair-salon' ),
        'priority' => 10,
        'panel'    => 'glam_hair_salon_panel',
    ) );


  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('glam_hair_salon_section1_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'glam_hair_salon_sanitize_choices'
  ));
  $wp_customize->add_control('glam_hair_salon_section1_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'glam-hair-salon'),
        'section' => 'glam_hair_salon_section1',
        'choices' => array(
            'Enable' => __('Enable', 'glam-hair-salon'),
            'Disable' => __('Disable', 'glam-hair-salon')
  )));

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('glam_hair_salon_section1_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('glam_hair_salon_section1_title',array(
      'label' => __('Section Title','glam-hair-salon'),
      'section' => 'glam_hair_salon_section1',
      'setting' => 'glam_hair_salon_section1_title',
      'type'    => 'text'
    )
  ); 

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('glam_hair_salon_section1_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('glam_hair_salon_section1_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post','glam-hair-salon'),
    'section' => 'glam_hair_salon_section1',
    'sanitize_callback' => 'sanitize_text_field',
  ));



    $wp_customize->add_setting('glam_hair_salon_section1_category_number_of_posts_setting',array(
    'default' => '8',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('glam_hair_salon_section1_category_number_of_posts_setting',array(
    'label' => __('Number of Posts','glam-hair-salon'),
    'section' => 'glam_hair_salon_section1',
    'setting' => 'glam_hair_salon_section1_category_number_of_posts_setting',
    'type'    => 'number'
  )); 

  //-------------------------Footer Settings------------------------------


    $wp_customize->add_section( 'glam_hair_salon_footer', array(
        'title'    => __( 'Footer Settings', 'glam-hair-salon' ),
        'priority' => 10,
        'panel'    => 'glam_hair_salon_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'glam_hair_salon_footer_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'glam_hair_salon_footer_text', array(
    'label' => __( 'Footer Text', 'glam-hair-salon' ),
    'section' => 'glam_hair_salon_footer',
    'type' => 'text',
  ) );


//--------------------------------------General Settings------------------------------------------

  $wp_customize->add_section( 'glam_hair_salon_general', array(
        'title'    => __( 'General Settings', 'glam-hair-salon' ),
        'panel'    => 'glam_hair_salon_panel',
    ) );

    $wp_customize->add_setting( 'glam_hair_salon_post_meta_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'glam_hair_salon_post_meta_toggle_switch_control', array(
        'label'    => __( 'Display Time/Author', 'glam-hair-salon' ),
        'section'  => 'glam_hair_salon_general',
        'settings' => 'glam_hair_salon_post_meta_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'glam_hair_salon_post_readdmore_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'glam_hair_salon_post_readdmore_toggle_switch_control', array(
        'label'    => __( 'Display Read More Link', 'glam-hair-salon' ),
        'section'  => 'glam_hair_salon_general',
        'settings' => 'glam_hair_salon_post_readdmore_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );


}
add_action( 'customize_register', 'glam_hair_salon_customize_register' );



