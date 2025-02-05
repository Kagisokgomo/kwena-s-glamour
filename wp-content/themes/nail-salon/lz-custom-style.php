<?php 

	$nail_salon_custom_style = '';

	// Logo Size
	$nail_salon_logo_top_padding = get_theme_mod('nail_salon_logo_top_padding');
	$nail_salon_logo_bottom_padding = get_theme_mod('nail_salon_logo_bottom_padding');
	$nail_salon_logo_left_padding = get_theme_mod('nail_salon_logo_left_padding');
	$nail_salon_logo_right_padding = get_theme_mod('nail_salon_logo_right_padding');

	if( $nail_salon_logo_top_padding != '' || $nail_salon_logo_bottom_padding != '' || $nail_salon_logo_left_padding != '' || $nail_salon_logo_right_padding != ''){
		$nail_salon_custom_style .=' .logo {';
			$nail_salon_custom_style .=' padding-top: '.esc_attr($nail_salon_logo_top_padding).'px; padding-bottom: '.esc_attr($nail_salon_logo_bottom_padding).'px; padding-left: '.esc_attr($nail_salon_logo_left_padding).'px; padding-right: '.esc_attr($nail_salon_logo_right_padding).'px;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_logo_size = get_theme_mod('nail_salon_logo_size');
	if( $nail_salon_logo_size != '' ) {
		if($nail_salon_logo_size >= 0 && $nail_salon_logo_size <= 100) {
			$calculated_width = $nail_salon_logo_size * 3.5;
			$nail_salon_custom_style .= ' .custom-logo-link img {';
			$nail_salon_custom_style .= ' width: ' . esc_attr($calculated_width) . 'px;';
			$nail_salon_custom_style .= ' }';
		}
	}

	// Site Title Font Size
	$nail_salon_site_title_font_size = get_theme_mod('nail_salon_site_title_font_size');
	if( $nail_salon_site_title_font_size != ''){
		$nail_salon_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$nail_salon_custom_style .=' font-size: '.esc_attr($nail_salon_site_title_font_size).'px;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_site_title_color = get_theme_mod('nail_salon_site_title_color');
	if ( $nail_salon_site_title_color != '') {
		$nail_salon_custom_style .=' .logo h1.site-title a, .logo p.site-title a {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_site_title_color).';';
		$nail_salon_custom_style .=' }';
	}

	// Site Tagline Font Size
	$nail_salon_site_tagline_font_size = get_theme_mod('nail_salon_site_tagline_font_size');
	if( $nail_salon_site_tagline_font_size != ''){
		$nail_salon_custom_style .=' .logo p.site-description {';
			$nail_salon_custom_style .=' font-size: '.esc_attr($nail_salon_site_tagline_font_size).'px;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_site_tagline_color = get_theme_mod('nail_salon_site_tagline_color');
	if ( $nail_salon_site_tagline_color != '') {
		$nail_salon_custom_style .=' .logo p.site-description {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_site_tagline_color).';';
		$nail_salon_custom_style .=' }';
	}

	//layout width
	$nail_salon_boxfull_width = get_theme_mod('nail_salon_boxfull_width');
	if ($nail_salon_boxfull_width !== '') {
		switch ($nail_salon_boxfull_width) {
			case 'container':
				$nail_salon_custom_style .= ' body, #header, .bottom-header {
					max-width: 1140px;
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'container-fluid':
				$nail_salon_custom_style .= ' body, #header, .bottom-header { 
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'none':
				// No specific width specified, so no additional style needed.
				break;
			default:
				// Handle unexpected values.
				break;
		}
	}

	//Menu animation
	$nail_salon_dropdown_anim = get_theme_mod('nail_salon_dropdown_anim');

	if ( $nail_salon_dropdown_anim != '') {
		$nail_salon_custom_style .=' .nav-menu ul ul {';
			$nail_salon_custom_style .=' animation:'.esc_attr($nail_salon_dropdown_anim).' 1s ease;';
		$nail_salon_custom_style .=' }';
	}

	// Header Image
	$header_image_url = nail_salon_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$nail_salon_custom_style .=' #inner-pages-header {';
			$nail_salon_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; ';
		$nail_salon_custom_style .=' }';
	} else {
		$nail_salon_custom_style .=' #inner-pages-header {';
			$nail_salon_custom_style .=' background: linear-gradient(0deg,#ccc,#0a0607 80%) no-repeat; ';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_menu_color = get_theme_mod('nail_salon_menu_color');
	if ( $nail_salon_menu_color != '') {
		$nail_salon_custom_style .=' .nav-menu ul li a {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_menu_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_menuhvr_color = get_theme_mod('nail_salon_menuhvr_color');
	if ( $nail_salon_menuhvr_color != '') {
		$nail_salon_custom_style .=' .nav-menu ul li a:hover {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_menuhvr_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_hdrbtn_color = get_theme_mod('nail_salon_hdrbtn_color');
	$nail_salon_hdrbtnbg_color = get_theme_mod('nail_salon_hdrbtnbg_color');
	if ( $nail_salon_hdrbtn_color != '') {
		$nail_salon_custom_style .=' .contact-btn a {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_hdrbtn_color).'; background-color:'.esc_attr($nail_salon_hdrbtnbg_color).';';
		$nail_salon_custom_style .=' }';
	}

	//slider color
	$nail_salon_slider_hide_show = get_theme_mod('nail_salon_slider_hide_show',false);
	if( $nail_salon_slider_hide_show == true){
		$nail_salon_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$nail_salon_custom_style .=' display:none;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_slider_font_size = get_theme_mod('nail_salon_slider_font_size');
	if( $nail_salon_slider_font_size != ''){
		$nail_salon_custom_style .=' #slider h2 {';
			$nail_salon_custom_style .=' font-size: '.esc_attr($nail_salon_slider_font_size).'px;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_slider_text_font_size = get_theme_mod('nail_salon_slider_text_font_size');
	if( $nail_salon_slider_text_font_size != ''){
		$nail_salon_custom_style .=' #slider p {';
			$nail_salon_custom_style .=' font-size: '.esc_attr($nail_salon_slider_text_font_size).'px;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_slider_title_color = get_theme_mod('nail_salon_slider_title_color');
	if ( $nail_salon_slider_title_color != '') {
		$nail_salon_custom_style .=' #slider h2 a {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_slider_title_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_slider_text_color = get_theme_mod('nail_salon_slider_text_color');
	if ( $nail_salon_slider_text_color != '') {
		$nail_salon_custom_style .=' #slider p {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_slider_text_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_slider_btn_color = get_theme_mod('nail_salon_slider_btn_color');
	$nail_salon_slider_btnbg_color = get_theme_mod('nail_salon_slider_btnbg_color');
	if ( $nail_salon_slider_btn_color != '') {
		$nail_salon_custom_style .=' #slider a.read-btn {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_slider_btn_color).'; background-color:'.esc_attr($nail_salon_slider_btnbg_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_slider_btnbg_color = get_theme_mod('nail_salon_slider_btnbg_color');
	$nail_salon_slider_btnbgbg_color = get_theme_mod('nail_salon_slider_btnbgbg_color');
	if ( $nail_salon_slider_btnbg_color != '') {
		$nail_salon_custom_style .=' #slider a.read-btn:hover {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_slider_btnbg_color).'; background-color:'.esc_attr($nail_salon_slider_btnbgbg_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_slider_np_color = get_theme_mod('nail_salon_slider_np_color');
	if ( $nail_salon_slider_np_color != '') {
		$nail_salon_custom_style .=' #slider .carousel-control-prev-icon i, #slider .carousel-control-next-icon i {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_slider_np_color).';';
		$nail_salon_custom_style .=' }';
	}

	//About us color
	$nail_salon_about_title_color = get_theme_mod('nail_salon_about_title_color');
	if ( $nail_salon_about_title_color != '') {
		$nail_salon_custom_style .=' #about-section h4 {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_about_title_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_about_text_color = get_theme_mod('nail_salon_about_text_color');
	if ( $nail_salon_about_text_color != '') {
		$nail_salon_custom_style .=' #about-section p {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_about_text_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_about_btn_color = get_theme_mod('nail_salon_about_btn_color');
	$nail_salon_about_btnbg_color = get_theme_mod('nail_salon_about_btnbg_color');
	if ( $nail_salon_about_btn_color != '') {
		$nail_salon_custom_style .=' .about-btn a {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_about_btn_color).'; background-color:'.esc_attr($nail_salon_about_btnbg_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_about_btnhvr_color = get_theme_mod('nail_salon_about_btnhvr_color');
	$nail_salon_about_btnhvrbg_color = get_theme_mod('nail_salon_about_btnhvrbg_color');
	if ( $nail_salon_about_btnhvr_color != '') {
		$nail_salon_custom_style .=' .about-btn a:hover {';
			$nail_salon_custom_style .=' color:'.esc_attr($nail_salon_about_btnhvr_color).'; background-color:'.esc_attr($nail_salon_about_btnhvrbg_color).';';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_about_btnbdr_color = get_theme_mod('nail_salon_about_btnbdr_color');
	if ( $nail_salon_about_btnbdr_color != '') {
		$nail_salon_custom_style .=' .about-btn a:before,.about-btn a:after {';
			$nail_salon_custom_style .=' border-color:'.esc_attr($nail_salon_about_btnbdr_color).';';
		$nail_salon_custom_style .=' }';
	}

	//service css
	$nail_salon_service_icon_size = get_theme_mod('nail_salon_service_icon_size');
	if( $nail_salon_service_icon_size != ''){
		$nail_salon_custom_style .=' #service-section .service-box i {';
			$nail_salon_custom_style .=' font-size: '.esc_attr($nail_salon_service_icon_size).'px;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_service_title_font_size = get_theme_mod('nail_salon_service_title_font_size');
	if( $nail_salon_service_title_font_size != ''){
		$nail_salon_custom_style .=' #service-section .service-box h3 {';
			$nail_salon_custom_style .=' font-size: '.esc_attr($nail_salon_service_title_font_size).'px;';
		$nail_salon_custom_style .=' }';
	}

	$nail_salon_service_text_font_size = get_theme_mod('nail_salon_service_text_font_size');
	if( $nail_salon_service_text_font_size != ''){
		$nail_salon_custom_style .=' #service-section .service-box p {';
			$nail_salon_custom_style .=' font-size: '.esc_attr($nail_salon_service_text_font_size).'px;';
		$nail_salon_custom_style .=' }';
	}