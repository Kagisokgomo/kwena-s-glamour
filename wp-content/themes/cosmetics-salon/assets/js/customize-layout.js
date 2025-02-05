(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-cosmetics_salon_options-';
		
		// Label
		function cosmetics_salon_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'cosmetics_salon_global_color' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'cosmetics_salon_scroll_hide' || id === 'cosmetics_salon_preloader_hide' || id === 'cosmetics_salon_sticky_header' || id === 'cosmetics_salon_products_per_row' || id === 'cosmetics_salon_width_option')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'cosmetics_salon_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'cosmetics_salon_social_icon_setting' || id === 'cosmetics_salon_facebook_icon' || id === 'cosmetics_salon_twitter_icon' || id === 'cosmetics_salon_intagram_icon'|| id === 'cosmetics_salon_linkedin_icon'|| id === 'cosmetics_salon_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'cosmetics_salon_topbar_phone_text' || id === 'cosmetics_salon_header_search_setting' || id === 'cosmetics_salon_header_button_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Slider

			if ( id === 'cosmetics_salon_top_slider_page1' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Product

			if ( id === 'cosmetics_salon_product_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'cosmetics_salon_footer_bg_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'cosmetics_salon_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'cosmetics_salon_single_post_page_image_border_radius' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-cosmetics_salon_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		cosmetics_salon_customizer_label( 'custom_logo', 'Logo Setup' );
		cosmetics_salon_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		cosmetics_salon_customizer_label( 'cosmetics_salon_global_color', 'Global Color' );

		// General Setting
		cosmetics_salon_customizer_label( 'cosmetics_salon_preloader_hide', 'Preloader' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_scroll_hide', 'Scroll To Top' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_products_per_row', 'woocommerce Setting' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_width_option', 'Site Width Layouts' );

		// Colors
		cosmetics_salon_customizer_label( 'cosmetics_salon_theme_color', 'Theme Color' );
		cosmetics_salon_customizer_label( 'background_color', 'Colors' );
		cosmetics_salon_customizer_label( 'background_image', 'Image' );

		//Header Image
		cosmetics_salon_customizer_label( 'header_image', 'Header Image' );

		// Social Icon
		cosmetics_salon_customizer_label( 'cosmetics_salon_social_icon_setting', 'Social Icon' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_facebook_icon', 'Facebook' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_twitter_icon', 'Twitter' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_intagram_icon', 'Intagram' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_linkedin_icon', 'Linkedin' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_pintrest_icon', 'Pintrest' );

		// Header
		cosmetics_salon_customizer_label( 'cosmetics_salon_topbar_phone_text', 'Phone Number' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_header_search_setting', 'Search Icon' );
		cosmetics_salon_customizer_label( 'cosmetics_salon_header_button_text', 'Header Button' );

		//Slider
		cosmetics_salon_customizer_label( 'cosmetics_salon_top_slider_page1', 'Slider' );

		//Product
		cosmetics_salon_customizer_label( 'cosmetics_salon_product_section_setting', 'Product Option' );

		//Footer
		cosmetics_salon_customizer_label( 'cosmetics_salon_footer_bg_image', 'Footer' );
	
		// Post Setting
		cosmetics_salon_customizer_label( 'cosmetics_salon_post_page_title', 'Post Setting' );

		//Single Post Setting
		cosmetics_salon_customizer_label( 'cosmetics_salon_single_post_page_image_border_radius', 'Single Post Setting' );

	});

})( jQuery );
