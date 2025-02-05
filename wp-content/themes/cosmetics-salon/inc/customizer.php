<?php
/**
 * Cosmetics Salon Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Cosmetics Salon
 */

if ( ! defined( 'COSMETICS_SALON_URL' ) ) {
    define( 'COSMETICS_SALON_URL', esc_url( 'https://www.themagnifico.net/products/cosmetics-wordpress-theme/', 'cosmetics-salon') );
}
if ( ! defined( 'COSMETICS_SALON_TEXT' ) ) {
    define( 'COSMETICS_SALON_TEXT', __( 'Cosmetics Salon Pro','cosmetics-salon' ));
}
if ( ! defined( 'COSMETICS_SALON_BUY_TEXT' ) ) {
    define( 'COSMETICS_SALON_BUY_TEXT', __( 'Buy Cosmetics Salon Pro','cosmetics-salon' ));
}

use WPTRT\Customize\Section\Cosmetics_Salon_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Cosmetics_Salon_Button::class );

    $manager->add_section(
        new Cosmetics_Salon_Button( $manager, 'cosmetics_salon_pro', [
            'title'       => esc_html( COSMETICS_SALON_TEXT,'cosmetics-salon' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'cosmetics-salon' ),
            'button_url'  => esc_url( COSMETICS_SALON_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'cosmetics-salon-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'cosmetics-salon-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cosmetics_salon_customize_register($wp_customize){

    // Pro Version
    class Cosmetics_Salon_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( COSMETICS_SALON_BUY_TEXT,'cosmetics-salon' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Cosmetics_Salon_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('cosmetics_salon_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'cosmetics-salon' ),
        'section'        => 'title_tagline',
        'settings'       => 'cosmetics_salon_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetics_salon_logo_title_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'cosmetics_salon_sanitize_number_absint'
    ));
    $wp_customize->add_control('cosmetics_salon_logo_title_font_size',array(
        'label' => esc_html__('Title Font Size','cosmetics-salon'),
        'section' => 'title_tagline',
        'type'    => 'number'
    ));

    $wp_customize->add_setting('cosmetics_salon_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'cosmetics-salon' ),
        'section'        => 'title_tagline',
        'settings'       => 'cosmetics_salon_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetics_salon_logo_tagline_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'cosmetics_salon_sanitize_number_absint'
    ));
    $wp_customize->add_control('cosmetics_salon_logo_tagline_font_size',array(
        'label' => esc_html__('Tagline Font Size','cosmetics-salon'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    //Logo
    $wp_customize->add_setting('cosmetics_salon_logo_max_height',array(
        'default'   => '80',
        'sanitize_callback' => 'cosmetics_salon_sanitize_number_absint'
    ));
    $wp_customize->add_control('cosmetics_salon_logo_max_height',array(
        'label' => esc_html__('Logo Width','cosmetics-salon'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Global Color Settings
     $wp_customize->add_section('cosmetics_salon_global_color_settings',array(
        'title' => esc_html__('Global Color Settings','cosmetics-salon'),
        'priority'   => 28,
    ));

     $wp_customize->add_setting( 'cosmetics_salon_global_color', array(
        'default' => '#F9A392',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetics_salon_global_color', array(
        'description' => __('Change the global color of the theme in one click.', 'cosmetics-salon'),
        'section' => 'cosmetics_salon_global_color_settings',
        'settings' => 'cosmetics_salon_global_color',
    )));

    // General Settings
     $wp_customize->add_section('cosmetics_salon_general_settings',array(
        'title' => esc_html__('General Settings','cosmetics-salon'),
        'priority'   => 30,
    ));

     $wp_customize->add_setting('cosmetics_salon_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_width_option',array(
        'type' => 'select',
        'section' => 'cosmetics_salon_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','cosmetics-salon'),
            'Wide Width' => __('Wide Width','cosmetics-salon'),
            'Boxed Width' => __('Boxed Width','cosmetics-salon')
        ),
    ) );

    $wp_customize->add_setting('cosmetics_salon_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'cosmetics-salon' ),
        'section'        => 'cosmetics_salon_general_settings',
        'settings'       => 'cosmetics_salon_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'cosmetics_salon_preloader_bg_color', array(
        'default' => '#F9A392',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetics_salon_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','cosmetics-salon'),
        'section' => 'cosmetics_salon_general_settings',
        'settings' => 'cosmetics_salon_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'cosmetics_salon_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetics_salon_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','cosmetics-salon'),
        'section' => 'cosmetics_salon_general_settings',
        'settings' => 'cosmetics_salon_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'cosmetics_salon_preloader_dot_2_color', array(
        'default' => '#222222',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetics_salon_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','cosmetics-salon'),
        'section' => 'cosmetics_salon_general_settings',
        'settings' => 'cosmetics_salon_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('cosmetics_salon_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'cosmetics-salon' ),
        'section'        => 'cosmetics_salon_general_settings',
        'settings'       => 'cosmetics_salon_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetics_salon_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_scroll_top_position',array(
        'type' => 'radio',
        'label'  => __( 'Scroll To Top Position', 'cosmetics-salon' ),
        'section' => 'cosmetics_salon_general_settings',
        'choices' => array(
            'Right' => __('Right','cosmetics-salon'),
            'Left' => __('Left','cosmetics-salon'),
            'Center' => __('Center','cosmetics-salon')
        ),
    ) );

    $wp_customize->add_setting( 'cosmetics_salon_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetics_salon_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','cosmetics-salon'),
        'section' => 'cosmetics_salon_general_settings',
        'settings' => 'cosmetics_salon_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'cosmetics_salon_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetics_salon_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','cosmetics-salon'),
        'section' => 'cosmetics_salon_general_settings',
        'settings' => 'cosmetics_salon_scroll_color'
    )));

    $wp_customize->add_setting('cosmetics_salon_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','cosmetics-salon'),
        'description' => __('Put in px','cosmetics-salon'),
        'section'   => 'cosmetics_salon_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('cosmetics_salon_scroll_border_radius',array(
        'default'   => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_scroll_border_radius',array(
        'label' => __('Scroll Top Border Radius','cosmetics-salon'),
        'description' => __('Put in %','cosmetics-salon'),
        'section'   => 'cosmetics_salon_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting( 'cosmetics_salon_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'cosmetics_salon_sanitize_select',
    ) );

    $wp_customize->add_control('cosmetics_salon_products_per_row', array(
       'label' => __( 'Product per row', 'cosmetics-salon' ),
       'section'  => 'cosmetics_salon_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('cosmetics_salon_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_product_per_page',array(
        'label' => __('Product per page','cosmetics-salon'),
        'section'   => 'cosmetics_salon_general_settings',
        'type'      => 'number'
    ));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('cosmetics_salon_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'cosmetics-salon' ),
        'section'        => 'cosmetics_salon_general_settings',
        'settings'       => 'cosmetics_salon_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetics_salon_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','cosmetics-salon'),
        'section' => 'cosmetics_salon_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cosmetics-salon'),
            'Right Sidebar' => __('Right Sidebar','cosmetics-salon'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('cosmetics_salon_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'cosmetics-salon' ),
        'section'        => 'cosmetics_salon_general_settings',
        'settings'       => 'cosmetics_salon_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetics_salon_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','cosmetics-salon'),
        'section' => 'cosmetics_salon_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cosmetics-salon'),
            'Right Sidebar' => __('Right Sidebar','cosmetics-salon'),
        ),
    ) );

    //Top Header
    $wp_customize->add_section('cosmetics_salon_top_header',array(
        'title' => esc_html__('Header Option','cosmetics-salon')
    ));

    $wp_customize->add_setting('cosmetics_salon_header_search_setting', array(
        'default' => 0,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_header_search_setting',array(
        'label'          => __( 'Show Header Search Icon', 'cosmetics-salon' ),
        'section'        => 'cosmetics_salon_top_header',
        'settings'       => 'cosmetics_salon_header_search_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetics_salon_topbar_phone_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_topbar_phone_text',array(
        'label' => esc_html__('Phone Number','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_header',
        'setting' => 'cosmetics_salon_topbar_phone_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_header_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_header_button_text',array(
        'label' => __('Button Text','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_header',
        'setting' => 'cosmetics_salon_header_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_header_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_header_button_url',array(
        'label' => __('Button Url','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_header',
        'setting' => 'cosmetics_salon_header_button_url',
        'type'  => 'url'
    ));

    //Menu Settings
    $wp_customize->add_section('cosmetics_salon_menu_settings',array(
        'title' => esc_html__('Menus Settings','cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','cosmetics-salon'),
        'section' => 'cosmetics_salon_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('cosmetics_salon_nav_menu_text_transform',array(
        'default'=> 'Uppercase',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','cosmetics-salon'),
        'choices' => array(
            'Uppercase' => __('Uppercase','cosmetics-salon'),
            'Capitalize' => __('Capitalize','cosmetics-salon'),
            'Lowercase' => __('Lowercase','cosmetics-salon'),
        ),
        'section'=> 'cosmetics_salon_menu_settings',
    ));

    $wp_customize->add_setting('cosmetics_salon_nav_menu_font_weight',array(
        'default'=> '500',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','cosmetics-salon'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'cosmetics_salon_menu_settings',
    ));

    //Slider
    $wp_customize->add_section('cosmetics_salon_top_slider',array(
        'title' => esc_html__('Slider Settings','cosmetics-salon'),
    ));

    for ( $cosmetics_salon_count = 1; $cosmetics_salon_count <= 3; $cosmetics_salon_count++ ) {

        $wp_customize->add_setting( 'cosmetics_salon_top_slider_page' . $cosmetics_salon_count, array(
            'default'           => '',
            'sanitize_callback' => 'cosmetics_salon_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'cosmetics_salon_top_slider_page' . $cosmetics_salon_count, array(
            'label'    => __( 'Select Slide Page', 'cosmetics-salon' ),
            'section'  => 'cosmetics_salon_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('cosmetics_salon_slider_content_layout',array(
        'default'=> 'Left',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_slider_content_layout',array(
        'type' => 'radio',
        'label' => esc_html__('Slider Content Layout','cosmetics-salon'),
        'choices' => array(
            'Left' => __('Left','cosmetics-salon'),
            'Center' => __('Center','cosmetics-salon'),
            'Right' => __('Right','cosmetics-salon'),
        ),
        'section'=> 'cosmetics_salon_top_slider',
    ));

    $wp_customize->add_setting('cosmetics_salon_slider_excerpt_length',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_number_range',
        'default'  => 20,
    ));
    $wp_customize->add_control('cosmetics_salon_slider_excerpt_length',array(
        'label'       => esc_html__('Slider Excerpt Length', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_top_slider',
        'type'        => 'range',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 50,
        ),
    ));

    $wp_customize->add_setting('cosmetics_salon_social_icon_setting', array(
        'default' => 0,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_social_icon_setting',array(
        'label'          => __( 'Enable Disable Social Icon', 'cosmetics-salon' ),
        'section'        => 'cosmetics_salon_top_slider',
        'settings'       => 'cosmetics_salon_social_icon_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetics_salon_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_facebook_icon',array(
        'label' => esc_html__('Facebook Text','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_facebook_icon',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('cosmetics_salon_facebook_url',array(
        'label' => esc_html__('Facebook Link','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('cosmetics_salon_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_twitter_icon',array(
        'label' => esc_html__('Twitter Text','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_twitter_icon',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('cosmetics_salon_twitter_url',array(
        'label' => esc_html__('Twitter Link','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('cosmetics_salon_intagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_intagram_icon',array(
        'label' => esc_html__('Intagram Text','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_intagram_icon',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('cosmetics_salon_intagram_url',array(
        'label' => esc_html__('Intagram Link','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('cosmetics_salon_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_linkedin_icon',array(
        'label' => esc_html__('Linkedin Text','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_linkedin_icon',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('cosmetics_salon_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('cosmetics_salon_pintrest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_pintrest_icon',array(
        'label' => esc_html__('Pinterest Text','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_pintrest_icon',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('cosmetics_salon_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','cosmetics-salon'),
        'section' => 'cosmetics_salon_top_slider',
        'setting' => 'cosmetics_salon_pintrest_url',
        'type'  => 'url'
    ));

    // Product
    $wp_customize->add_section('cosmetics_salon_product_section',array(
        'title' => esc_html__('Product Option','cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_product_section_setting', array(
        'default' => 0,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetics_salon_product_section_setting',array(
        'label'          => __( 'Enable Disable Product', 'cosmetics-salon' ),
        'section'        => 'cosmetics_salon_product_section',
        'settings'       => 'cosmetics_salon_product_section_setting',
        'type'           => 'checkbox',
    )));
    
    $wp_customize->add_setting('cosmetics_salon_product_section_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_product_section_heading',array(
        'label' => esc_html__('Title','cosmetics-salon'),
        'section' => 'cosmetics_salon_product_section',
        'setting' => 'cosmetics_salon_product_section_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetics_salon_product_section_sub_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetics_salon_product_section_sub_heading',array(
        'label' => esc_html__('Sub Title','cosmetics-salon'),
        'section' => 'cosmetics_salon_product_section',
        'setting' => 'cosmetics_salon_product_section_sub_heading',
        'type'  => 'text'
    ));

    if(class_exists('woocommerce')){

        $wp_customize->add_setting('cosmetics_salon_home_product_per_page',array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('cosmetics_salon_home_product_per_page',array(
            'label' => esc_html__('No Of Products','cosmetics-salon'),
            'section' => 'cosmetics_salon_product_section',
            'setting' => 'cosmetics_salon_home_product_per_page',
            'type'  => 'number'
        ));
        
        $cosmetics_salon_args = array(
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
        $categories = get_categories( $cosmetics_salon_args );
        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        $wp_customize->add_setting('cosmetics_salon_home_product',array(
            'sanitize_callback' => 'cosmetics_salon_sanitize_select',
        ));
        $wp_customize->add_control('cosmetics_salon_home_product',array(
            'type'    => 'select',
            'choices' => $cats,
            'label' => __('Select Product Category','cosmetics-salon'),
            'section' => 'cosmetics_salon_product_section',
        ));
    }

    // Post Settings
     $wp_customize->add_section('cosmetics_salon_post_settings',array(
        'title' => esc_html__('Post Settings','cosmetics-salon'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('cosmetics_salon_post_page_title',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cosmetics_salon_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_post_page_meta',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cosmetics_salon_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_post_page_thumb',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cosmetics_salon_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_post_page_content',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cosmetics_salon_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_post_page_excerpt_length',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('cosmetics_salon_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('cosmetics_salon_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('cosmetics_salon_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_post_page_pagination',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cosmetics_salon_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'cosmetics-salon'),
    ));

    $wp_customize->add_setting( 'cosmetics_salon_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'cosmetics_salon_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'cosmetics_salon_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','cosmetics-salon' ),
        'section'     => 'cosmetics_salon_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'cosmetics_salon_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'cosmetics_salon_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'cosmetics_salon_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','cosmetics-salon' ),
        'section'     => 'cosmetics_salon_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('cosmetics_salon_single_post_page_content',array(
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('cosmetics_salon_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'cosmetics-salon'),
        'section'     => 'cosmetics_salon_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'cosmetics-salon'),
    ));
    
    // Footer
    $wp_customize->add_section('cosmetics_salon_site_footer_section', array(
        'title' => esc_html__('Footer', 'cosmetics-salon'),
    ));

    $wp_customize->add_setting('cosmetics_salon_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'cosmetics_salon_footer_bg_image',array(
        'label' => __('Footer Background Image','cosmetics-salon'),
        'section' => 'cosmetics_salon_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('cosmetics_salon_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','cosmetics-salon'),
        'choices' => array(
            'fixed' => __('fixed','cosmetics-salon'),
            'scroll' => __('scroll','cosmetics-salon'),
        ),
        'section'=> 'cosmetics_salon_site_footer_section',
    ));

    $wp_customize->add_setting('cosmetics_salon_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','cosmetics-salon'),
        'section' => 'cosmetics_salon_site_footer_section',
        'choices' => array(
            'Left' => __('Left','cosmetics-salon'),
            'Center' => __('Center','cosmetics-salon'),
            'Right' => __('Right','cosmetics-salon')
        ),
    ) );

     $wp_customize->add_setting('cosmetics_salon_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','cosmetics-salon'),
        'section' => 'cosmetics_salon_site_footer_section',
        'choices' => array(
            'Left' => __('Left','cosmetics-salon'),
            'Center' => __('Center','cosmetics-salon'),
            'Right' => __('Right','cosmetics-salon')
        ),
    ) );

    $wp_customize->add_setting('cosmetics_salon_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'cosmetics_salon_sanitize_checkbox'
    ));
    $wp_customize->add_control('cosmetics_salon_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','cosmetics-salon'),
        'section' => 'cosmetics_salon_site_footer_section',
    ));

    $wp_customize->add_setting('cosmetics_salon_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cosmetics_salon_footer_text_setting', array(
        'label' => __('Replace the footer text', 'cosmetics-salon'),
        'section' => 'cosmetics_salon_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cosmetics_salon_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'cosmetics_salon_sanitize_choices'
    ));
    $wp_customize->add_control('cosmetics_salon_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','cosmetics-salon'),
        'section' => 'cosmetics_salon_site_footer_section',
        'choices' => array(
            'Left' => __('Left','cosmetics-salon'),
            'Center' => __('Center','cosmetics-salon'),
            'Right' => __('Right','cosmetics-salon')
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer', array(
        'sanitize_callback' => 'Cosmetics_Salon_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cosmetics_Salon_Customize_Pro_Version ( $wp_customize,'pro_version_footer', array(
        'section'     => 'cosmetics_salon_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cosmetics-salon' ),
        'description' => esc_url( COSMETICS_SALON_URL ),
        'priority'    => 100
    )));

}
add_action('customize_register', 'cosmetics_salon_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cosmetics_salon_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cosmetics_salon_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cosmetics_salon_customize_preview_js(){
    wp_enqueue_script('cosmetics-salon-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'cosmetics_salon_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function cosmetics_salon_panels_js() {
    wp_enqueue_style( 'cosmetics-salon-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'cosmetics-salon-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'cosmetics_salon_panels_js' );