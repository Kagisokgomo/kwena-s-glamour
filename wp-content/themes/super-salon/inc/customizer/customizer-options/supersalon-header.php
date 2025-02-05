<?php
function supersalon_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'super-salon'),
		) 
	);

	
	/*=========================================
	Super Salon Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','super-salon'),
			'panel'  		=> 'header_section',
		)
    );

	
    // top header Site Title Color
	$topheadersitetitlecol = esc_html__('#fff', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_sitetitlecol',
    	array(
			'default' => $topheadersitetitlecol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'topheader_sitetitlecol',
		array(
		    'label'   		=> __('Site Title Color','super-salon'),
		    'section'		=> 'title_tagline',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	


	// top header Tagline Color
	$topheadertaglinecol = esc_html__('#fff', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_taglinecol',
    	array(
			'default' => $topheadertaglinecol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'topheader_taglinecol',
		array(
		    'label'   		=> __('Tagline Color','super-salon'),
		    'section'		=> 'title_tagline',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','super-salon'),
			'panel'  		=> 'header_section',
		)
    );		
	

	/*=========================================
	Super Salon Top header
	=========================================*/
	$wp_customize->add_section(
        'top_header',
        array(
        	'priority'      => 5,
            'title' 		=> __('Top Header','super-salon'),
			'panel'  		=> 'header_section',
		)
    );	


	$wp_customize->add_setting('supersalon_reset_header_settings',array(
	  'sanitize_callback'   => 'sanitize_text_field'
	));
	$wp_customize->add_control(new supersalon_Reset_Custom_Control($wp_customize, 'super_salon_reset_header_settings',array(
	  'type' => 'reset_control',
	   'priority' => 1,
	  'label' => __('Reset Header Settings', 'super-salon'),
	  'description' => 'super_salon_header_reset_settings',
	  'section' => 'top_header'
	)));



    $wp_customize->add_setting('supersalon_top_header_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new supersalon_Tab_Control($wp_customize, 'supersalon_top_header_tabs', array(
	   'section' => 'top_header',
	   'priority' => 1,
	   'buttons' => array(
	      array(
     		'name' => esc_html__('General', 'super-salon'),
 			'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
				'hide_show_sticky',
            	'topheader',
            	'topheader_phn',
            	'topheader_email'

            ),
            'active' => true,
         ),
	      array(
            'name' => esc_html__('Style', 'super-salon'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
            	'topheader_phnicon',
            	'topheader_mailicon',
            	'topheader_icon1',
				'topheader_icon1link',
            	'topheader_icon2',
				'topheader_icon2link',
            	'topheader_icon3',
				'topheader_icon3link',
            	'topheader_icon4',
				'topheader_icon4link'


            ),
         )
	    
    	),
	)));


	// sticky header
	$wp_customize->add_setting( 'hide_show_sticky',array(
        'default' => false,
        'sanitize_callback' => 'supersalon_switch_sanitization'
   	) );
   	$wp_customize->add_control( new supersalon_Toggle_Switch_Custom_Control( $wp_customize, 'hide_show_sticky',array(
        'label' => __( 'Show Sticky Header','super-salon' ),
        'section' => 'top_header'
   	)));

	
	// topheader txt
	$topheadertxt = esc_html__('Our clients are always comletely satisfied with our services', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader',
    	array(
			'default' => $topheadertxt,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'topheader',
		array(
		    'label'   		=> __('Title','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);		




	
	// topheader Phone Number
	$topheaderphn = esc_html__('+386 40 111 5555', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_phn',
    	array(
			'default' => $topheaderphn,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'topheader_phn',
		array(
		    'label'   		=> __('Phone Number','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);		


	// topheader phone number icon
	$topheaderphnicon = esc_html__('fa fa-phone', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_phnicon',
    	array(
			'default' => $topheaderphnicon,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'topheader_phnicon',
		array(
		    'label'   		=> __('Phone Number Icon','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);		




	// topheader Email
	$topheaderphn = esc_html__('info@yourdomain.com', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_email',
    	array(
			'default' => $topheaderphn,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 7,
		)
	);	

	$wp_customize->add_control( 
		'topheader_email',
		array(
		    'label'   		=> __('Email','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);		


	// topheader mail icon
	$topheadermailicon = esc_html__('fa fa-envelope-o', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_mailicon',
    	array(
			'default' => $topheadermailicon,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 8,
		)
	);	

	$wp_customize->add_control( 
		'topheader_mailicon',
		array(
		    'label'   		=> __('Mail Icon','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);	



	// topheader icon 1
	$topheadericon1 = esc_html__('fa fa-facebook', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon1',
    	array(
			'default' => $topheadericon1,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 10,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon1',
		array(
		    'label'   		=> __('Icon 1','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);	
	
	// topheader icon 1 link
	$topheadericon1link = esc_html__('#', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon1link',
    	array(
			'default' => $topheadericon1link,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 10,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon1link',
		array(
		    'label'   		=> __('Icon 1 Link','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);	


	// topheader icon 2
	$topheadericon2 = esc_html__('fa fa-instagram', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon2',
    	array(
			'default' => $topheadericon2,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 11,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon2',
		array(
		    'label'   		=> __('Icon 2','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);		

	// topheader icon 2 link
	$topheadericon2link = esc_html__('#', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon2link',
    	array(
			'default' => $topheadericon2link,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 10,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon2link',
		array(
		    'label'   		=> __('Icon 2 Link','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);	



	// topheader icon 3
	$topheadericon3 = esc_html__('fa fa-twitter', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon3',
    	array(
			'default' => $topheadericon3,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 12,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon3',
		array(
		    'label'   		=> __('Icon 3','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);		


	// topheader icon 3 link
	$topheadericon3link = esc_html__('#', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon3link',
    	array(
			'default' => $topheadericon3link,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 10,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon3link',
		array(
		    'label'   		=> __('Icon 3 Link','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);	



	// topheader icon 4
	$topheadericon4 = esc_html__('fa fa-google-plus', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon4',
    	array(
			'default' => $topheadericon4,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 13,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon4',
		array(
		    'label'   		=> __('Icon 4','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);		

	// topheader icon 4 link
	$topheadericon4link = esc_html__('#', 'super-salon' );
	$wp_customize->add_setting(
    	'topheader_icon4link',
    	array(
			'default' => $topheadericon4link,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 10,
		)
	);	

	$wp_customize->add_control( 
		'topheader_icon4link',
		array(
		    'label'   		=> __('Icon 4 Link','super-salon'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);	



	$wp_customize->register_control_type('supersalon_Tab_Control');
	$wp_customize->register_panel_type( 'supersalon_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'supersalon_WP_Customize_Section' );


}
add_action( 'customize_register', 'supersalon_header_settings' );





if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class supersalon_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'supersalon_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class supersalon_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'supersalon_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}


