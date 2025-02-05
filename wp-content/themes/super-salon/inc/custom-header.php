<?php
function supersalon_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'supersalon_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'f8f4f7',
		'width'                  => 2000, 
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'supersalon_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'supersalon_custom_header_setup' );

if ( ! function_exists( 'supersalon_header_style' ) ) :

function supersalon_header_style() {
	$header_text_color = get_header_textcolor();

	?>
	<style type="text/css">


		h4.site-title {
			color: <?php echo esc_attr(get_theme_mod('topheader_sitetitlecol')); ?> !important;

		}

		p.site-description {
			color: <?php echo esc_attr(get_theme_mod('topheader_taglinecol')); ?> !important;
		}



		.page .slider-area {
			background: <?php echo esc_attr(get_theme_mod('slider_bgcol')); ?>;
		}

		.hero-style .slide-title h2 {
			color: <?php echo esc_attr(get_theme_mod('slider_titlecol')); ?>;
		}

		.hero-style .slide-text p {
			color: <?php echo esc_attr(get_theme_mod('slider_descriptioncol')); ?>;
		}

		.hero-style .slide-btns ul li:first-child a.ReadMore {
			color: <?php echo esc_attr(get_theme_mod('slider_btn1textcol')); ?> !important;
		}

		.hero-style .slide-btns ul li:first-child a.ReadMore {
			background: <?php echo esc_attr(get_theme_mod('slider_btn1bgcol')); ?>;
		}

		.hero-style a.ReadMore {
			color: <?php echo esc_attr(get_theme_mod('slider_btn2textcol')); ?> !important;
		}

		.hero-style a.ReadMore {
			border-color: <?php echo esc_attr(get_theme_mod('slider_btn2bordcol')); ?>;
		}

		.hero-slider .swiper-button-prev, .hero-slider .swiper-button-next,
		.hero-slider .swiper-button-prev:before, .hero-slider .swiper-button-next:before {
			border-color: <?php echo esc_attr(get_theme_mod('slider_arrowcol')); ?>;
			color: <?php echo esc_attr(get_theme_mod('slider_arrowcol')); ?>;
		}

		.hero-slider .swiper-button-prev:hover:before, .hero-slider .swiper-button-next:hover:before {
			color: <?php echo esc_attr(get_theme_mod('slider_arrowhrvcol')); ?>;
			border-color: <?php echo esc_attr(get_theme_mod('slider_arrowhrvcol')); ?>;
		}




		
		#service-section .header-section .title {
			color: <?php echo esc_attr(get_theme_mod('Service_headingcol')); ?>;
		}

		#service-section .header-section p.text {
			color: <?php echo esc_attr(get_theme_mod('Service_subheadingcol')); ?>;
		}

		#service-section .single-service .part-1 .img-shape,
		#service-section .single-service .part-1 img {
			background: <?php echo esc_attr(get_theme_mod('Service_imgbrdcol')); ?>;
		}

		#service-section .single-service .part-1 .imageBox {
			border-color: <?php echo esc_attr(get_theme_mod('Service_imgbrdcol')); ?>;
		}

		#service-section .single-service .part-2 h3.title {
			color: <?php echo esc_attr(get_theme_mod('Service_titlecol')); ?>;
		}

		#service-section .single-service .part-2 p {
			color: <?php echo esc_attr(get_theme_mod('Service_descriptioncol')); ?>;
		}

		#service-section {
			padding-top: <?php echo esc_attr(get_theme_mod('service_top_padding')); ?>em;
			padding-bottom: <?php echo esc_attr(get_theme_mod('service_bottom_padding')); ?>em;
		}


	<?php
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		else :
	?>
		h4.site-title,
		p.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
