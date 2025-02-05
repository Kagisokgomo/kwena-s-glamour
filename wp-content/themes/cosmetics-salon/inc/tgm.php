<?php

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function cosmetics_salon_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Magnify – Suggestive Search', 'cosmetics-salon' ),
			'slug'             => 'magnify-suggestive-search',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'cosmetics_salon_register_recommended_plugins' );