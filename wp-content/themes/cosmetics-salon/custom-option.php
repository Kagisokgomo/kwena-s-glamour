<?php

    $cosmetics_salon_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $cosmetics_salon_scroll_position = get_theme_mod( 'cosmetics_salon_scroll_top_position','Right');
    if($cosmetics_salon_scroll_position == 'Right'){
        $cosmetics_salon_theme_css .='#button{';
            $cosmetics_salon_theme_css .='right: 20px;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_scroll_position == 'Left'){
        $cosmetics_salon_theme_css .='#button{';
            $cosmetics_salon_theme_css .='left: 20px;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_scroll_position == 'Center'){
        $cosmetics_salon_theme_css .='#button{';
            $cosmetics_salon_theme_css .='right: 50%;left: 50%;';
        $cosmetics_salon_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $cosmetics_salon_single_post_page_image_box_shadow = get_theme_mod('cosmetics_salon_single_post_page_image_box_shadow',0);
    if($cosmetics_salon_single_post_page_image_box_shadow != false){
        $cosmetics_salon_theme_css .='.single-post .entry-header img{';
            $cosmetics_salon_theme_css .='box-shadow: '.esc_attr($cosmetics_salon_single_post_page_image_box_shadow).'px '.esc_attr($cosmetics_salon_single_post_page_image_box_shadow).'px '.esc_attr($cosmetics_salon_single_post_page_image_box_shadow).'px #cccccc;';
        $cosmetics_salon_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $cosmetics_salon_single_post_page_image_border_radius = get_theme_mod('cosmetics_salon_single_post_page_image_border_radius', 0);
    if($cosmetics_salon_single_post_page_image_border_radius != false){
        $cosmetics_salon_theme_css .='.single-post .entry-header img{';
            $cosmetics_salon_theme_css .='border-radius: '.esc_attr($cosmetics_salon_single_post_page_image_border_radius).'px;';
        $cosmetics_salon_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $cosmetics_salon_footer_bg_image = get_theme_mod('cosmetics_salon_footer_bg_image');
    if($cosmetics_salon_footer_bg_image != false){
        $cosmetics_salon_theme_css .='#colophon{';
            $cosmetics_salon_theme_css .='background: url('.esc_attr($cosmetics_salon_footer_bg_image).')!important;';
        $cosmetics_salon_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $cosmetics_salon_footer_bg_image_position = get_theme_mod( 'cosmetics_salon_footer_bg_image_position','scroll');
    if($cosmetics_salon_footer_bg_image_position == 'fixed'){
        $cosmetics_salon_theme_css .='#colophon{';
            $cosmetics_salon_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $cosmetics_salon_theme_css .='}';
    }elseif ($cosmetics_salon_footer_bg_image_position == 'scroll'){
        $cosmetics_salon_theme_css .='#colophon{';
            $cosmetics_salon_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $cosmetics_salon_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $cosmetics_salon_footer_widget_heading_alignment = get_theme_mod( 'cosmetics_salon_footer_widget_heading_alignment','Left');
    if($cosmetics_salon_footer_widget_heading_alignment == 'Left'){
        $cosmetics_salon_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $cosmetics_salon_theme_css .='text-align: left;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_footer_widget_heading_alignment == 'Center'){
        $cosmetics_salon_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $cosmetics_salon_theme_css .='text-align: center;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_footer_widget_heading_alignment == 'Right'){
        $cosmetics_salon_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $cosmetics_salon_theme_css .='text-align: right;';
        $cosmetics_salon_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $cosmetics_salon_footer_widget_content_alignment = get_theme_mod( 'cosmetics_salon_footer_widget_content_alignment','Left');
    if($cosmetics_salon_footer_widget_content_alignment == 'Left'){
        $cosmetics_salon_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $cosmetics_salon_theme_css .='text-align: left;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_footer_widget_content_alignment == 'Center'){
        $cosmetics_salon_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $cosmetics_salon_theme_css .='text-align: center;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_footer_widget_content_alignment == 'Right'){
        $cosmetics_salon_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $cosmetics_salon_theme_css .='text-align: right;';
        $cosmetics_salon_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $cosmetics_salon_copyright_content_alignment = get_theme_mod( 'cosmetics_salon_copyright_content_alignment','Center');
    if($cosmetics_salon_copyright_content_alignment == 'Left'){
        $cosmetics_salon_theme_css .='.footer-menu-left{';
        $cosmetics_salon_theme_css .='text-align: left;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_copyright_content_alignment == 'Center'){
        $cosmetics_salon_theme_css .='.footer-menu-left{';
            $cosmetics_salon_theme_css .='text-align: center;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_copyright_content_alignment == 'Right'){
        $cosmetics_salon_theme_css .='.footer-menu-left{';
            $cosmetics_salon_theme_css .='text-align: right;';
        $cosmetics_salon_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $cosmetics_salon_width_option = get_theme_mod( 'cosmetics_salon_width_option','Full Width');
    if($cosmetics_salon_width_option == 'Boxed Width'){
        $cosmetics_salon_theme_css .='body{';
            $cosmetics_salon_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $cosmetics_salon_theme_css .='}';
        $cosmetics_salon_theme_css .='.scrollup i{';
            $cosmetics_salon_theme_css .='right: 100px;';
        $cosmetics_salon_theme_css .='}';
        $cosmetics_salon_theme_css .='.page-template-custom-home-page .home-page-header{';
            $cosmetics_salon_theme_css .='padding: 0px 40px 0 10px;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_width_option == 'Wide Width'){
        $cosmetics_salon_theme_css .='body{';
            $cosmetics_salon_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $cosmetics_salon_theme_css .='}';
        $cosmetics_salon_theme_css .='.scrollup i{';
            $cosmetics_salon_theme_css .='right: 30px;';
        $cosmetics_salon_theme_css .='}';
    }else if($cosmetics_salon_width_option == 'Full Width'){
        $cosmetics_salon_theme_css .='body{';
            $cosmetics_salon_theme_css .='max-width: 100%;';
        $cosmetics_salon_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $cosmetics_salon_nav_menu = get_theme_mod( 'cosmetics_salon_nav_menu_text_transform','Uppercase');
    if($cosmetics_salon_nav_menu == 'Capitalize'){
        $cosmetics_salon_theme_css .='.main-navigation .menu > li > a{';
            $cosmetics_salon_theme_css .='text-transform:Capitalize;';
        $cosmetics_salon_theme_css .='}';
    }
    if($cosmetics_salon_nav_menu == 'Lowercase'){
        $cosmetics_salon_theme_css .='.main-navigation .menu > li > a{';
            $cosmetics_salon_theme_css .='text-transform:Lowercase;';
        $cosmetics_salon_theme_css .='}';
    }
    if($cosmetics_salon_nav_menu == 'Uppercase'){
        $cosmetics_salon_theme_css .='.main-navigation .menu > li > a{';
            $cosmetics_salon_theme_css .='text-transform:Uppercase;';
        $cosmetics_salon_theme_css .='}';
    }

    $cosmetics_salon_menu_font_size = get_theme_mod( 'cosmetics_salon_menu_font_size');
    if($cosmetics_salon_menu_font_size != ''){
        $cosmetics_salon_theme_css .='.main-navigation .menu > li > a{';
            $cosmetics_salon_theme_css .='font-size: '.esc_attr($cosmetics_salon_menu_font_size).'px;';
        $cosmetics_salon_theme_css .='}';
    }

    $cosmetics_salon_nav_menu_font_weight = get_theme_mod( 'cosmetics_salon_nav_menu_font_weight',500);
    if($cosmetics_salon_menu_font_size != ''){
        $cosmetics_salon_theme_css .='.main-navigation .menu > li > a{';
            $cosmetics_salon_theme_css .='font-weight: '.esc_attr($cosmetics_salon_nav_menu_font_weight).';';
        $cosmetics_salon_theme_css .='}';
    }


    /*-------------------- Global Color -------------------*/

    $cosmetics_salon_global_color = get_theme_mod('cosmetics_salon_global_color');

    if($cosmetics_salon_global_color != false){
        $cosmetics_salon_theme_css .='#button, .head-btn a, span.cart-value, .search-form-main input.search-submit, #top-slider .slide-btn a, span.cart-btn a, .sidebar input[type="submit"], .sidebar button[type="submit"], a.btn-text, span.onsale, .pro-button a, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .main-navigation .sub-menu, .main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, .comment-respond input#submit, #colophon, .sidebar h5, .sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover{';
            $cosmetics_salon_theme_css .='background-color: '.esc_attr($cosmetics_salon_global_color).';';
        $cosmetics_salon_theme_css .='}';
    }

    if($cosmetics_salon_global_color != false){
        $cosmetics_salon_theme_css .='.navbar-brand a, .navbar-brand p,  #about-us .heading h3.main_heading, #site-navigation .menu ul li a:hover, .article-box h3 a, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .main-navigation .menu > li > a:hover, .widget a:hover, .widget a:focus, .sidebar ul li a:hover{';
            $cosmetics_salon_theme_css .='color: '.esc_attr($cosmetics_salon_global_color).';';
        $cosmetics_salon_theme_css .='}';
    }

    if($cosmetics_salon_global_color != false){
        $cosmetics_salon_theme_css .='.postcat-name{';
            $cosmetics_salon_theme_css .='color: '.esc_attr($cosmetics_salon_global_color).' !important;';
        $cosmetics_salon_theme_css .='}';
    }

    if($cosmetics_salon_global_color != false){
        $cosmetics_salon_theme_css .='.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover{';
            $cosmetics_salon_theme_css .='border-color: '.esc_attr($cosmetics_salon_global_color).' !important;';
        $cosmetics_salon_theme_css .='}';
    }

    if($cosmetics_salon_global_color != false){
        $cosmetics_salon_theme_css .='.woocommerce-message, .woocommerce-info, .header-search-wrapper .search-form-main{';
            $cosmetics_salon_theme_css .='border-top-color: '.esc_attr($cosmetics_salon_global_color).';';
        $cosmetics_salon_theme_css .='}';
    }

    if($cosmetics_salon_global_color != false){
        $cosmetics_salon_theme_css .='.header-search-wrapper .search-form-main:before{';
            $cosmetics_salon_theme_css .='border-bottom-color: '.esc_attr($cosmetics_salon_global_color).';';
        $cosmetics_salon_theme_css .='}';
    }

    if($cosmetics_salon_global_color != false){
        $cosmetics_salon_theme_css .='#top-slider button.owl-dot.active{';
            $cosmetics_salon_theme_css .='border-right-color: '.esc_attr($cosmetics_salon_global_color).';';
        $cosmetics_salon_theme_css .='}';
    }

    /*---------------- Logo CSS ----------------------*/
    $cosmetics_salon_logo_title_font_size = get_theme_mod( 'cosmetics_salon_logo_title_font_size');
    $cosmetics_salon_logo_tagline_font_size = get_theme_mod( 'cosmetics_salon_logo_tagline_font_size');
    if( $cosmetics_salon_logo_title_font_size != '') {
        $cosmetics_salon_theme_css .='#masthead .navbar-brand a{';
            $cosmetics_salon_theme_css .='font-size: '. $cosmetics_salon_logo_title_font_size. 'px;';
        $cosmetics_salon_theme_css .='}';
    }
    if( $cosmetics_salon_logo_tagline_font_size != '') {
        $cosmetics_salon_theme_css .='#masthead .navbar-brand p{';
            $cosmetics_salon_theme_css .='font-size: '. $cosmetics_salon_logo_tagline_font_size. 'px;';
        $cosmetics_salon_theme_css .='}';
    }

    /*------------------ Slider CSS -------------------*/

    $cosmetics_salon_slider_content_layout = get_theme_mod( 'cosmetics_salon_slider_content_layout','Left');
    if($cosmetics_salon_slider_content_layout == 'Left'){
        $cosmetics_salon_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $cosmetics_salon_theme_css .='text-align : left;';
        $cosmetics_salon_theme_css .='}';
    }
    if($cosmetics_salon_slider_content_layout == 'Center'){
        $cosmetics_salon_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $cosmetics_salon_theme_css .='text-align : center;';
        $cosmetics_salon_theme_css .='}';
        $cosmetics_salon_theme_css .='.slider-inner-box{';
            $cosmetics_salon_theme_css .='right : 50%;';
        $cosmetics_salon_theme_css .='}';
    }
    if($cosmetics_salon_slider_content_layout == 'Right'){
        $cosmetics_salon_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $cosmetics_salon_theme_css .='text-align : right;';
        $cosmetics_salon_theme_css .='}';
        $cosmetics_salon_theme_css .='.slider-inner-box{';
            $cosmetics_salon_theme_css .='right : 50%;';
        $cosmetics_salon_theme_css .='}';
    }