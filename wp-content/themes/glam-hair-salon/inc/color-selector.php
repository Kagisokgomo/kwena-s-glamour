<?php


//-----------------------------Site Identity Color----------------

	$glam_hair_salon_site_identity_color = get_theme_mod('glam_hair_salon_site_identity_color');
	$glam_hair_salon_site_identity_tagline_color = get_theme_mod('glam_hair_salon_site_identity_tagline_color');

	


//=====================Whole CSS===================================


	$custom_css ='.display_only h1 a,.display_only p{';
	
	$custom_css .='}';





//==============Main Setting Section===========================================


// ----------------Site Identity Color--------------------

	if($glam_hair_salon_site_identity_color != false){
		$custom_css .='.display_only h1 a{';
			if($glam_hair_salon_site_identity_color != false)
		    	$custom_css .='color: '.esc_html($glam_hair_salon_site_identity_color).'!important;';
		$custom_css .='}';
	}

	if($glam_hair_salon_site_identity_tagline_color != false){
		$custom_css .='.display_only p{';
			if($glam_hair_salon_site_identity_tagline_color != false)
		    	$custom_css .='color: '.esc_html($glam_hair_salon_site_identity_tagline_color).'!important;';
		$custom_css .='}';
	}



?>