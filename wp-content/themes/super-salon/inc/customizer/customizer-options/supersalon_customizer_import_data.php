<?php
class supersalon_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof supersalon_import_dummy_data ) ) {
			self::$instance = new supersalon_import_dummy_data;
			self::$instance->supersalon_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function supersalon_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'supersalon_import_customize_scripts' ), 0 );

	}
	
	

	public function supersalon_import_customize_scripts() {

	wp_enqueue_script( 'supersalon-import-customizer-js', SUPERSALON_PARENT_INC_URI . '/customizer/customizer-notify/js/supersalon-import-customizer-options.js', array( 'customize-controls' ) );
	}
}

$supersalon_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
supersalon_import_dummy_data::init( apply_filters( 'supersalon_import_customizer', $supersalon_import_customizers ) );