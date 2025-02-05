<?php

  $hairstylist_salon_theme_custom_setting_css = '';

	// Global Color
	$hairstylist_salon_theme_color = get_theme_mod('hairstylist_salon_theme_color', '#CF814D');

	$hairstylist_salon_theme_custom_setting_css .=':root {';
		$hairstylist_salon_theme_custom_setting_css .='--primary-theme-color: '.esc_attr($hairstylist_salon_theme_color ).'!important;';
	$hairstylist_salon_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$hairstylist_salon_scroll_alignment = get_theme_mod('hairstylist_salon_scroll_alignment', 'right');

    if($hairstylist_salon_scroll_alignment == 'right'){
        $hairstylist_salon_theme_custom_setting_css .='.scroll-up{';
            $hairstylist_salon_theme_custom_setting_css .='right: 30px;!important;';
			$hairstylist_salon_theme_custom_setting_css .='left: auto;!important;';
        $hairstylist_salon_theme_custom_setting_css .='}';
    }else if($hairstylist_salon_scroll_alignment == 'center'){
        $hairstylist_salon_theme_custom_setting_css .='.scroll-up{';
            $hairstylist_salon_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
        $hairstylist_salon_theme_custom_setting_css .='}';
    }else if($hairstylist_salon_scroll_alignment == 'left'){
        $hairstylist_salon_theme_custom_setting_css .='.scroll-up{';
            $hairstylist_salon_theme_custom_setting_css .='left: 30px;!important;';
			$hairstylist_salon_theme_custom_setting_css .='right: auto;!important;';
        $hairstylist_salon_theme_custom_setting_css .='}';
    }