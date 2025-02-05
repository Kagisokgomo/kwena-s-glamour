<?php
/**
 * @package Classic Cosmetics
 * Setup the WordPress core custom header feature.
 *
 * @uses classic_cosmetics_header_style()
 */
function classic_cosmetics_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'classic_cosmetics_custom_header_args', array(		
		'default-text-color'     => 'fff',
		'width'                  => 2000,
		'height'                 => 280,
		'wp-head-callback'       => 'classic_cosmetics_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'classic_cosmetics_custom_header_setup' );

if ( ! function_exists( 'classic_cosmetics_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see classic_cosmetics_custom_header_setup().
 */
function classic_cosmetics_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
			background-position: center top; background-size:cover !important;
		}
	<?php endif; ?>	

	.header .site-title a {
		color: <?php echo esc_attr(get_theme_mod('classic_cosmetics_sitetitle_color')); ?>;
	}

	.header .site-description {
		color: <?php echo esc_attr(get_theme_mod('classic_cosmetics_siteTagline_color')); ?>;
	}

	.header {
		background: <?php echo esc_attr(get_theme_mod('classic_cosmetics_headerbg_color')); ?> !important;
	}

	.header-top {
		background: <?php echo esc_attr(get_theme_mod('classic_cosmetics_topheaderbg_color')); ?> !important;
	}

	.copywrap, .copywrap p, .copywrap p a{
		color: <?php echo esc_attr(get_theme_mod('classic_cosmetics_footercoypright_color')); ?> !important;
	}
	#footer h3 {
		color: <?php echo esc_attr(get_theme_mod('classic_cosmetics_footertitle_color')); ?> !important;

	}
	#footer p {
		color: <?php echo esc_attr(get_theme_mod('classic_cosmetics_footerdescription_color')); ?>;
	}
	#footer ul li a {
		color: <?php echo esc_attr(get_theme_mod('classic_cosmetics_footerlist_color')); ?>;

	}
	#footer {
		background-color: <?php echo esc_attr(get_theme_mod('classic_cosmetics_footerbg_color')); ?>;
	}

	</style>
	<?php
}
endif;