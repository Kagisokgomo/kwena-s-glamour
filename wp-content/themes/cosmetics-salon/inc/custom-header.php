<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Cosmetics Salon
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses cosmetics_salon_header_style()
 */
function cosmetics_salon_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cosmetics_salon_custom_header_args', array(
		'header-text'            => false,
		'width'                  => 1600,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'cosmetics_salon_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'cosmetics_salon_custom_header_setup' );

if ( ! function_exists( 'cosmetics_salon_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see cosmetics_salon_custom_header_setup().
	 */
	function cosmetics_salon_header_style() {
		$header_text_color = get_header_textcolor(); ?>

		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.socialmedia {
					background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
					background-position: center top !important;
				    background-size: cover !important;
				}
			<?php endif; ?>
		</style>
		
		<?php
	}
endif;