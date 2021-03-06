<?php
/**
 * brandon Theme Customizer
 *
 * @package Pummel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bpl_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add center title Setting
	$wp_customize->add_setting(
		'bpl_title_center',
		array(
			'default' 			=> 0,
			'transport' 		=> 'postMessage',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_title_center',
			array(
			    'label' 	=> __( 'Center Title and Tagline', 'pummel' ),
			    'section' 	=> 'title_tagline',
			    'settings'	=> 'bpl_title_center',
			    'type'  	=> 'checkbox',
			)
		)
	);

	//header color
	$wp_customize->add_setting(
        'bpl_header_color',
        array(
          'default'          	=> '#3F51B5',
          'transport'         	=> 'postMessage',
          'sanitize_callback'	=> 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_header_color',
			array(
				'label'      		=> __( 'Header Color', 'pummel' ),
				'section'    		=> 'colors',
				'settings'   		=> 'bpl_header_color',
				'wp-head-callback' 	=> 'bpl_customizer_output',
			)
		)
	);

	//header menu and social icon text color
	$wp_customize->add_setting(
        'bpl_header_menu_color',
        array(
            'default'       	=> '#e0e0e0',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_header_menu_color',
			array(
				'label'      		=> __( 'Menu and Social Icon Color', 'pummel' ),
				'section'   		=> 'colors',
				'settings'   		=> 'bpl_header_menu_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);

	//link color
	$wp_customize->add_setting(
        'bpl_link_color',
        array(
          'default'           => '#3F51B5',
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_link_color',
			array(
				'label'      		=> __( 'Link Color', 'pummel' ),
				'section'    		=> 'colors',
				'settings'   		=> 'bpl_link_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);

	//link visited color
	$wp_customize->add_setting(
        'bpl_link_visited_color',
        array(
            'default'          	=> '#7986CB',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_link_visited_color',
			array(
				'label'      		=> __( 'Visited Link Color', 'pummel' ),
				'description'      	=> __( '(may not show on preview)', 'pummel' ),
				'section'    		=> 'colors',
				'settings'  	 	=> 'bpl_link_visited_color',
				'wp-head-callback' 	=> 'bpl_customizer_output',
			)
		)
	);


	//Frontpage middle widget background color
	$wp_customize->add_setting(
        'bpl_frontpage_middle_widgets_background_color',
        array(
            'default'           => '#3F51B5',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_middle_widgets_background_color',
			array(
				'label'      		=> __( 'Background Color', 'pummel' ),
				'section'    		=> 'frontpage_middle',
				'settings'   		=> 'bpl_frontpage_middle_widgets_background_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);

	//Frontpage middle widget text color
	$wp_customize->add_setting(
        'bpl_frontpage_middle_widgets_text_color',
        array(
            'default'           => '#C5CAE9',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_middle_widgets_text_color',
			array(
				'label'     		=>  __( 'Text and Link Color', 'pummel' ),
				'section'		    => 'frontpage_middle',
				'settings'     	    => 'bpl_frontpage_middle_widgets_text_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);

	//Comment Accent color
	$wp_customize->add_setting(
        'bpl_comment_accent_color',
        array(
            'default'           => '#3F51B5',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_comment_accent_color',
			array(
				'label'     		 => __( 'Comment Accent Color', 'pummel' ),
				'section'   		 => 'colors',
				'settings'  		 => 'bpl_comment_accent_color',
				'wp-head-callback'   => 'bpl_customizer_output',
			)
		)
	);

	//Footer widget Accent color
	$wp_customize->add_setting(
        'bpl_footer_widget_accent_color',
        array(
            'default'           => '#3F51B5',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_footer_widget_accent_color',
			array(
				'label'     		 => __( 'Footer Widget Accent Color', 'pummel' ),
				'section'   		 => 'colors',
				'settings'  		 => 'bpl_footer_widget_accent_color',
				'wp-head-callback'   => 'bpl_customizer_output',
			)
		)
	);

	//Body Text Color
	$wp_customize->add_setting(
        'bpl_body_text_color',
        array(
            'default'           => '#404040',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_body_text_color',
			array(
				'label' 			 => __( 'Body Text Color', 'pummel' ),
				'section'   		 => 'colors',
				'settings'  		 => 'bpl_body_text_color',
				'wp-head-callback'   => 'bpl_customizer_output',
			)
		)
	);



	// Add Social Media Section
	$wp_customize->add_section( 'social-media' , array(
	    'title'		  => __( 'Social Media', 'pummel' ),
	    'description' => __( 'Enter the URL to your account for each service, for the icon to appear in the header.', 'pummel' )
		)
	);


	// Add Display Social Links in Header Setting
	$wp_customize->add_setting(
		'bpl_display_social_header',
		array(
			'default' 			=> 0,
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_display_social_header',
			array(
			    'label' 	=> __( 'Display Social Links in Header', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'bpl_display_social_header',
			    'type'  	=> 'checkbox',
			)
		)
	);

	// Add Display Social Links in Footer Setting
	$wp_customize->add_setting(
		'bpl_display_social_footer',
		array(
			'default' 			=> 0,
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_display_social_footer',
			array(
			    'label'			=> __( 'Display Social Links in Footer', 'pummel' ),
			    'section' 		=> 'social-media',
			    'settings' 		=> 'bpl_display_social_footer',
			    'type'  		=> 'checkbox',
			)
		)
	);


	// Add Twitter Setting
	$wp_customize->add_setting(
		'twitter' ,
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'twitter',
			array(
			    'label' 	=> __( 'Twitter', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'twitter',
			)
		)
	);

	// Add Google Plus Setting
	$wp_customize->add_setting(
		'google_plus',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'google_plus',
			array(
			    'label' 	=> __( 'Google Plus', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'google_plus',
			)
		)
	);

	// Add Facebook Setting
	$wp_customize->add_setting(
		'facebook' ,
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook',
			array(
			    'label' 	=> __( 'Facebook', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'facebook',
			)
		)
	);

	// Add Github Setting
	$wp_customize->add_setting(
		'github' ,
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'github',
			array(
		    	'label'		=> __( 'Github', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'github',
			)
		)
	);

	// Add LinkedIn Setting
	$wp_customize->add_setting(
		'linkedin' ,
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'linkedin',
			array(
			    'label' 	=> __( 'Linkedin', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings'	=> 'linkedin',
			)
		)
	);

	// Add Instagram Setting
	$wp_customize->add_setting(
		'instagram' ,
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram',
			array(
			    'label' 	=> __( 'Instagram', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'instagram',
			)
		)
	);

	// Add Pinterest Setting
	$wp_customize->add_setting(
		'pinterest' ,
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'pinterest',
			array(
			    'label' 	=> __( 'Pinterest', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'pinterest',
			)
		)
	);
	
	// Add rss Setting
	$wp_customize->add_setting(
		'rss' ,
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rss',
			array(
			    'label' 	=> __( 'RSS', 'pummel' ),
			    'section' 	=> 'social-media',
			    'settings' 	=> 'rss',
			)
		)
	);

	// Add Custom CSS Textfield
    $wp_customize->add_section(
	  	'custom_css_field' ,
	  	array(
		    'title' => __('Custom CSS','pummel'),
	    )
    );
    $wp_customize->add_setting(
        'bpl_custom_css',
        array(
            'sanitize_callback' => 'bpl_sanitize_textarea'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'         	=> __( 'Add Custom CSS Here', 'pummel' ),
                'section'        	=> 'custom_css_field',
                'settings'      	=> 'bpl_custom_css',
                'type'           	=> 'textarea',
                'wp-head-callback' 	=> 'bpl_customizer_output'
            )
        )
   );

   	// Add Front page middle header Text
    $wp_customize->add_section(
    	'frontpage_middle' ,
    	array(
    		'title'  => __('Front Page Middle','pummel'),
		 )
    );
    $wp_customize->add_setting(
        'bpl_frontpage_middle_header',
        array(
      		'default'       	=> 'There Be Widgets Below',
	        'sanitize_callback' => 'bpl_sanitize_text',
	        'transport'         => 'postMessage'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_middle_header',
            array(
                'label'          => __( 'Add Header Text Here', 'pummel' ),
                'section'        => 'frontpage_middle',
                'settings'       => 'bpl_frontpage_middle_header',
                'type'           => 'text'
            )
        )
   );

   	// Add Display header image below menu Setting
	$wp_customize->add_setting(
		'bpl_display_image_below_menu',
		array(
			'default' 			=> 0,
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_display_image_below_menu',
			array(
			    'label' 	=> __( 'Display Header Image Below Menu', 'pummel' ),
			    'section' 	=> 'header_image',
			    'settings' 	=> 'bpl_display_image_below_menu',
			    'type'  	=> 'checkbox',
			    'priority' 	=> 2,
			)
		)
	);



	// Section for frontpage background image
	$wp_customize->add_section(
		'frontpage_background' ,
		array(
			'title'  => __('Front Page Background Image','pummel'),
		)
	);


	// Setting for frontpage background image
	$wp_customize->add_setting(
		'bpl_frontpage_background_image',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'bpl_frontpage_background_image',
           array(
                'label'      		=> __( 'Upload an image for the Front Page Background', 'pummel' ),
                'section'    		=> 'frontpage_background',
      			'settings'   		=> 'bpl_frontpage_background_image',
                'context'			=> 'frontpage_background',
            	'wp-head-callback' 	=> 'bpl_customizer_output'
            )
        )
    );

   // Setting for frontpage background image repeat
   	$wp_customize->add_setting(
		'bpl_frontpage_background_repeat',
		array(
			'default' 			=> 'repeat',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport' 		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_background_repeat',
            array(
                'label'      		=> __( 'Background Repeat', 'pummel' ),
                'section'    		=> 'frontpage_background',
                'settings'   		=> 'bpl_frontpage_background_repeat',
                'wp-head-callback'  => 'bpl_customizer_output',
                'type'       		=> 'radio',
			    'choices'    		=> array(
					'no-repeat'  => __('No Repeat', 'pummel'),
					'repeat'	 => __('Tile', 'pummel'),
					'repeat-y'   => __('Tile Horizontally', 'pummel'),
					'repeat-x'	 => __('Tile Vertically', 'pummel'),

				 ),
            )
        )
    );


   // Setting for frontpage background image position X
   	$wp_customize->add_setting(
		'bpl_frontpage_background_position_x',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Control(
           $wp_customize,
           'bpl_frontpage_background_position_x',
            array(
                'label'    			=> __( 'Background Position X', 'pummel' ),
                'section'  			=> 'frontpage_background',
                'settings' 			=> 'bpl_frontpage_background_position_x',
                'wp-head-callback'	=> 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  		=> array(
				 	 'left'   	=> __('Left', 'pummel'),
					 'center' 	=> __('Center', 'pummel'),
					 'right'	=> __('Right', 'pummel'),

				),
            )
        )
    );

   // Setting for frontpage background image position Y
   	$wp_customize->add_setting(
		'bpl_frontpage_background_position_y',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_background_position_y',
            array(
                'label'    			=> __( 'Background Position Y', 'pummel' ),
                'section'  			=> 'frontpage_background',
                'settings' 			=> 'bpl_frontpage_background_position_y',
                'wp-head-callback'  => 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  			=> array(
					'top'		=> __('Top', 'pummel'),
					'center' 	=> __('Center', 'pummel'),
					'bottom'	=> __('Bottom', 'pummel'),

				),
            )
        )
    );

   // Setting for frontpage background image attachment
   	$wp_customize->add_setting(
		'bpl_frontpage_background_attachment',
		array(
			'default' 			=> 'fixed',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport' 		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_background_attachment',
            array(
                'label'    			=> __( 'Background Attachment', 'pummel' ),
                'section'  			=> 'frontpage_background',
                'settings' 			=> 'bpl_frontpage_background_attachment',
                'wp-head-callback' 	=> 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  			=> array(
					'scroll' => __('Scroll', 'pummel'),
					'fixed'  => __('Fixed', 'pummel'),

				),
            )
        )
    );

   	// Setting for frontpage background image cover
	$wp_customize->add_setting(
		'bpl_frontpage_background_cover',
		array(
			'default' 			=> 'auto',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_frontpage_background_cover',
			array(
			    'label' 			=> __( 'Fit Entire Image Within Page', 'pummel' ),
			    'description' 		=> __( '(background-size: cover)', 'pummel' ),
			    'section' 			=> 'frontpage_background',
			    'settings' 			=> 'bpl_frontpage_background_cover',
			    'wp-head-callback' 	=> 'bpl_customizer_output',
			    'type'     			=> 'radio',
			    'choices'  			=> array(
						'cover' => __('Yes', 'pummel'),
						'auto'  => __('No', 'pummel'),

					),
			)
		)
	);

//////////////////////////////////////////////////////////
//frontpage Featured Image /////////////////////////////////////////

	// Add Front page top section
    $wp_customize->add_section(
    	'frontpage_top_image' ,
    	array(
    		'title'  => __('Front Page Featured Image','pummel'),
    		'description'  => __('Located Below Header','pummel'),
		 )
    );

	//frontpage top background image
	$wp_customize->add_setting(
		'bpl_frontpage_top_image',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'bpl_frontpage_top_image',
           array(
                'label'      		=> __( 'Upload An Image', 'pummel' ),
                'section'    		=> 'frontpage_top_image',
      			'settings'   		=> 'bpl_frontpage_top_image',
                'context'			=> 'frontpage_top_image',
            	'wp-head-callback' 	=> 'bpl_customizer_output'
            )
        )
    );

	 // Setting for frontpage top background image position X
   	$wp_customize->add_setting(
		'bpl_frontpage_top_position_x',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Control(
           $wp_customize,
           'bpl_frontpage_top_position_x',
            array(
                'label'    			=> __( 'Background Position X', 'pummel' ),
                'section'  			=> 'frontpage_top_image',
                'settings' 			=> 'bpl_frontpage_top_position_x',
                'wp-head-callback'	=> 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  		=> array(
				 	 'left'   	=> __('Left', 'pummel'),
					 'center' 	=> __('Center', 'pummel'),
					 'right'	=> __('Right', 'pummel'),

				),
            )
        )
    );

   // Setting for frontpage top background image position Y
   	$wp_customize->add_setting(
		'bpl_frontpage_top_position_y',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_top_position_y',
            array(
                'label'    			=> __( 'Background Position Y', 'pummel' ),
                'section'  			=> 'frontpage_top_image',
                'settings' 			=> 'bpl_frontpage_top_position_y',
                'wp-head-callback'  => 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  			=> array(
					'top'		=> __('Top', 'pummel'),
					'center' 	=> __('Center', 'pummel'),
					'bottom'	=> __('Bottom', 'pummel'),

				),
            )
        )
    );

	//height
	$wp_customize->add_setting(
        'bpl_frontpage_top_image_height',
        array(
      		'default'       	=> '500',
	        'sanitize_callback' => 'bpl_sanitize_text',
	        'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'bpl_frontpage_top_image_height',
	        array(
	            'label'          => __( 'Image Height', 'pummel' ),
            	'description'    =>	__( 'May have to adjust image height to display correctly across differing screen sizes.', 'pummel' ),
	            'section'        => 'frontpage_top_image',
	            'settings'       => 'bpl_frontpage_top_image_height',
	            'type'           => 'text'
	        )
	    )
	);

	//height below 500px media query
	$wp_customize->add_setting(
        'bpl_frontpage_top_image_height_below_500',
        array(
      		'default'       	=> '300',
	        'sanitize_callback' => 'bpl_sanitize_text'
		)
	);
	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'bpl_frontpage_top_image_height_below_500',
	        array(
	            'label'          => __( 'Image Height For Smaller Devices', 'pummel' ),
            	'description'    =>	__( 'Set height for when screen size is under 500px', 'pummel' ),
	            'section'        => 'frontpage_top_image',
	            'settings'       => 'bpl_frontpage_top_image_height_below_500',
	            'type'           => 'text'
	        )
	    )
	);





//////////////////////////////////////////////////////////
////frontpage top section////////////////////////////////

	// Add Front page top section
    $wp_customize->add_section(
    	'frontpage_top' ,
    	array(
    		'title'  => __('Front Page Top','pummel'),
		 )
    );

	//Frontpage Top background color
	$wp_customize->add_setting(
        'bpl_frontpage_top_background_color',
        array(
            'default'           => '#FFF',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_top_background_color',
			array(
				'label'      		=> __( 'Background Color', 'pummel' ),
				'section'    		=> 'frontpage_top',
				'settings'   		=> 'bpl_frontpage_top_background_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);

	//Frontpage Top text color
	$wp_customize->add_setting(
        'bpl_frontpage_top_text_color',
        array(
            'default'           => '#404040',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_top_text_color',
			array(
				'label'      		=> __( 'Text Color', 'pummel' ),
				'section'    		=> 'frontpage_top',
				'settings'   		=> 'bpl_frontpage_top_text_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);

	//Front page top text background color
	$wp_customize->add_setting(
        'bpl_frontpage_top_text_background_color',
        array(
            'default'           => '#e0e0e0',
        	'sanitize_callback' => 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_top_text_background_color',
			array(
				'label'      		=> __( 'Text Background Color', 'pummel' ),
				'section'    		=> 'frontpage_top',
				'settings'   		=> 'bpl_frontpage_top_text_background_color',
				'wp-head-callback'	=> 'bpl_customizer_output',
			)
		)
	);

	// Display text background
	$wp_customize->add_setting(
		'bpl_show_front_top_text_background',
		array(
			'default' 			=> 0,
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_show_front_top_text_background',
			array(
			    'label' 	=> __( 'Show Text Background', 'pummel' ),
			    'section' 	=> 'frontpage_top',
			    'settings' 	=> 'bpl_show_front_top_text_background',
			    'type'  	=> 'checkbox',
			)
		)
	);

	//Front page text background opacity
	$wp_customize->add_setting(
        'bpl_frontpage_top_text_background_opacity',
        array(
            'default'           => '.8',
            'sanitize_callback' => 'bpl_sanitize_text'
        )
    );

	$wp_customize->add_control(
		'bpl_frontpage_top_text_background_opacity',
		array(
		    'type'        		=> 'range',
		    'section'     		=> 'frontpage_top',
		    'label'       		=>  __( 'Text Background Opacity', 'pummel' ),
		    'wp-head-callback' 	=> 'bpl_customizer_output',
		    'input_attrs' 		=> array(
		        'min'   => .0,
		        'max'   => 1,
		        'step'  => .1,
		    ),
		)

	);

	//frontpage top background image
	$wp_customize->add_setting(
		'bpl_frontpage_top_background_image',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'bpl_frontpage_top_background_image',
           array(
                'label'      		=> __( 'Upload an image for the Front Page Top Background', 'pummel' ),
                'section'    		=> 'frontpage_top',
      			'settings'   		=> 'bpl_frontpage_top_background_image',
                'context'			=> 'frontpage_top_background',
            	'wp-head-callback' 	=> 'bpl_customizer_output'
            )
        )
    );

   // Setting for frontpage top background image repeat
   	$wp_customize->add_setting(
		'bpl_frontpage_top_background_repeat',
		array(
			'default' 			=> 'repeat',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport' 		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_top_background_repeat',
            array(
                'label'      		=> __( 'Background Repeat', 'pummel' ),
                'section'    		=> 'frontpage_top',
                'settings'   		=> 'bpl_frontpage_top_background_repeat',
                'wp-head-callback'  => 'bpl_customizer_output',
                'type'       		=> 'radio',
			    'choices'    		=> array(
					'no-repeat'  => __('No Repeat', 'pummel'),
					'repeat'	 => __('Tile', 'pummel'),
					'repeat-y'   => __('Tile Horizontally', 'pummel'),
					'repeat-x'	 => __('Tile Vertically', 'pummel'),

				 ),
            )
        )
    );


   // Setting for frontpage top background image position X
   	$wp_customize->add_setting(
		'bpl_frontpage_top_background_position_x',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Control(
           $wp_customize,
           'bpl_frontpage_top_background_position_x',
            array(
                'label'    			=> __( 'Background Position X', 'pummel' ),
                'section'  			=> 'frontpage_top',
                'settings' 			=> 'bpl_frontpage_top_background_position_x',
                'wp-head-callback'	=> 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  		=> array(
				 	 'left'   	=> __('Left', 'pummel'),
					 'center' 	=> __('Center', 'pummel'),
					 'right'	=> __('Right', 'pummel'),

				),
            )
        )
    );

   // Setting for frontpage top background image position Y
   	$wp_customize->add_setting(
		'bpl_frontpage_top_background_position_y',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_top_background_position_y',
            array(
                'label'    			=> __( 'Background Position Y', 'pummel' ),
                'section'  			=> 'frontpage_top',
                'settings' 			=> 'bpl_frontpage_top_background_position_y',
                'wp-head-callback'  => 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  			=> array(
					'top'		=> __('Top', 'pummel'),
					'center' 	=> __('Center', 'pummel'),
					'bottom'	=> __('Bottom', 'pummel'),

				),
            )
        )
    );

    // Setting for frontpage top background image attachment
   	$wp_customize->add_setting(
		'bpl_frontpage_top_background_attachment',
		array(
			'default' 			=> 'scroll',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport' 		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_background_attachment',
            array(
                'label'    			=> __( 'Background Attachment', 'pummel' ),
                'section'  			=> 'frontpage_top',
                'settings' 			=> 'bpl_frontpage_top_background_attachment',
                'wp-head-callback' 	=> 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  			=> array(
					'scroll' => __('Scroll', 'pummel'),
					'fixed'  => __('Fixed', 'pummel'),

				),
            )
        )
    );


   	// Setting for frontpage top background image cover
	$wp_customize->add_setting(
		'bpl_frontpage_top_background_cover',
		array(
			'default' 			=> 'auto',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_frontpage_top_background_cover',
			array(
			    'label' 			=> __( 'Fit Entire Image Within Top Div', 'pummel' ),
			    'description' 		=> __( '(background-size: cover)', 'pummel' ),
			    'section' 			=> 'frontpage_top',
			    'settings' 			=> 'bpl_frontpage_top_background_cover',
			    'wp-head-callback' 	=> 'bpl_customizer_output',
			    'type'     			=> 'radio',
			    'choices'  			=> array(
						'cover' => __('Yes', 'pummel'),
						'auto'  => __('No', 'pummel'),

					),
			)
		)
	);


/////////////////////////////////////////////////////////////////////
////////////////////front page bottom section///////////////////////

	// Add Front page bottom section
    $wp_customize->add_section(
    	'frontpage_bottom' ,
    	array(
    		'title'  => __('Front Page Bottom','pummel'),
		 )
    );

	//Frontpage bottom background color
	$wp_customize->add_setting(
        'bpl_frontpage_bottom_background_color',
        array(
            'default'           => '#FFF',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_bottom_background_color',
			array(
				'label'      		=> __( 'Background Color', 'pummel' ),
				'section'    		=> 'frontpage_bottom',
				'settings'   		=> 'bpl_frontpage_bottom_background_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);

	//Frontpage Bottom text color
	$wp_customize->add_setting(
        'bpl_frontpage_bottom_text_color',
        array(
            'default'           => '#404040',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_bottom_text_color',
			array(
				'label'      		=> __( 'Text Color', 'pummel' ),
				'section'    		=> 'frontpage_bottom',
				'settings'   		=> 'bpl_frontpage_bottom_text_color',
				'wp-head-callback'  => 'bpl_customizer_output',
			)
		)
	);


	//Front page bottom text background color
	$wp_customize->add_setting(
        'bpl_frontpage_bottom_text_background_color',
        array(
            'default'           => '#e0e0e0',
        	'sanitize_callback' => 'sanitize_hex_color'
       )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bpl_frontpage_bottom_text_background_color',
			array(
				'label'      		=> __( 'Text Background Color', 'pummel' ),
				'section'    		=> 'frontpage_bottom',
				'settings'   		=> 'bpl_frontpage_bottom_text_background_color',
				'wp-head-callback'	=> 'bpl_customizer_output',
			)
		)
	);

	// Display text background
	$wp_customize->add_setting(
		'bpl_show_front_bottom_text_background',
		array(
			'default' 			=> 0,
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_show_front_bottom_text_background',
			array(
			    'label' 	=> __( 'Show Text Background', 'pummel' ),
			    'section' 	=> 'frontpage_bottom',
			    'settings' 	=> 'bpl_show_front_bottom_text_background',
			    'type'  	=> 'checkbox',
			)
		)
	);

	//Front page bottom text background opacity
	$wp_customize->add_setting(
        'bpl_frontpage_bottom_text_background_opacity',
        array(
            'default'           => '.8',
            'sanitize_callback' => 'bpl_sanitize_text'
        )
    );

	$wp_customize->add_control(
		'bpl_frontpage_bottom_text_background_opacity',
		array(
		    'type'        		=> 'range',
		    'section'     		=> 'frontpage_bottom',
		    'label'       		=>  __( 'Text Background Opacity', 'pummel' ),
		    'wp-head-callback' 	=> 'bpl_customizer_output',
		    'input_attrs' 		=> array(
		        'min'   => 0,
		        'max'   => 1,
		        'step'  => .1,
		    ),
		)

	);

	//frontpage bottom background image
	$wp_customize->add_setting(
		'bpl_frontpage_bottom_background_image',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'bpl_frontpage_bottom_background_image',
           array(
                'label'      		=> __( 'Upload an image for the Front Page Top Background', 'pummel' ),
                'section'    		=> 'frontpage_bottom',
      			'settings'   		=> 'bpl_frontpage_bottom_background_image',
                'context'			=> 'frontpage_bottom_background',
            	'wp-head-callback' 	=> 'bpl_customizer_output'
            )
        )
    );

   // Setting for frontpage bottom background image repeat
   	$wp_customize->add_setting(
		'bpl_frontpage_bottom_background_repeat',
		array(
			'default' 			=> 'repeat',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport' 		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_bottom_background_repeat',
            array(
                'label'      		=> __( 'Background Repeat', 'pummel' ),
                'section'    		=> 'frontpage_bottom',
                'settings'   		=> 'bpl_frontpage_bottom_background_repeat',
                'wp-head-callback'  => 'bpl_customizer_output',
                'type'       		=> 'radio',
			    'choices'    		=> array(
					'no-repeat'  => __('No Repeat', 'pummel'),
					'repeat'	 => __('Tile', 'pummel'),
					'repeat-y'   => __('Tile Horizontally', 'pummel'),
					'repeat-x'	 => __('Tile Vertically', 'pummel'),

				 ),
            )
        )
    );


   // Setting for frontpage top background image position X
   	$wp_customize->add_setting(
		'bpl_frontpage_bottom_background_position_x',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
       new WP_Customize_Control(
           $wp_customize,
           'bpl_frontpage_bottom_background_position_x',
            array(
                'label'    			=> __( 'Background Position X', 'pummel' ),
                'section'  			=> 'frontpage_bottom',
                'settings' 			=> 'bpl_frontpage_bottom_background_position_x',
                'wp-head-callback'	=> 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  		=> array(
				 	 'left'   	=> __('Left', 'pummel'),
					 'center' 	=> __('Center', 'pummel'),
					 'right'	=> __('Right', 'pummel'),

				),
            )
        )
    );

   // Setting for frontpage bottom background image position Y
   	$wp_customize->add_setting(
		'bpl_frontpage_bottom_background_position_y',
		array(
			'default' => 'center',
			'sanitize_callback' => 'bpl_sanitize_text'
		)
	);

	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_bottom_background_position_y',
            array(
                'label'    			=> __( 'Background Position Y', 'pummel' ),
                'section'  			=> 'frontpage_bottom',
                'settings' 			=> 'bpl_frontpage_bottom_background_position_y',
                'wp-head-callback'  => 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  			=> array(
					'top'		=> __('Top', 'pummel'),
					'center' 	=> __('Center', 'pummel'),
					'bottom'	=> __('Bottom', 'pummel'),

				),
            )
        )
    );

    // Setting for frontpage bottom background image attachment
   	$wp_customize->add_setting(
		'bpl_frontpage_bottom_background_attachment',
		array(
			'default' 			=> 'scroll',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport' 		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_frontpage_bottom_background_attachment',
            array(
                'label'    			=> __( 'Background Attachment', 'pummel' ),
                'section'  			=> 'frontpage_bottom',
                'settings' 			=> 'bpl_frontpage_bottom_background_attachment',
                'wp-head-callback' 	=> 'bpl_customizer_output',
                'type'     			=> 'radio',
			    'choices'  			=> array(
					'scroll' => __('Scroll', 'pummel'),
					'fixed'  => __('Fixed', 'pummel'),

				),
            )
        )
    );



   	// Setting for frontpage bottom background image cover
	$wp_customize->add_setting(
		'bpl_frontpage_bottom_background_cover',
		array(
			'default' 			=> 'auto',
			'sanitize_callback' => 'bpl_sanitize_text',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bpl_frontpage_bottom_background_cover',
			array(
			    'label' 			=> __( 'Fit Entire Image Within Bottom Div', 'pummel' ),
			    'description' 		=> __( '(background-size: cover)', 'pummel' ),
			    'section' 			=> 'frontpage_bottom',
			    'settings' 			=> 'bpl_frontpage_bottom_background_cover',
			    'wp-head-callback' 	=> 'bpl_customizer_output',
			    'type'     			=> 'radio',
			    'choices'  			=> array(
						'cover' => __('Yes', 'pummel'),
						'auto'  => __('No', 'pummel'),

					),
			)
		)
	);
	
	// Add footer copyright
    $wp_customize->add_section(
    	'copyright' ,
    	array(
    		'title'  => __('Footer Copyright','pummel'),
		 )
    );
    $wp_customize->add_setting(
        'bpl_copyright',
        array(
      		'default'       	=> '',
	        'sanitize_callback' => 'bpl_sanitize_text'
	       
      )
	);
	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_copyright',
            array(
                'label'          => __( 'Add Name', 'pummel' ),
                'section'        => 'copyright',
                'settings'       => 'bpl_copyright',
                'type'           => 'text'
            )
		)
	);


	
	// Add full post or excerpt
    $wp_customize->add_section(
	  	'post_display_length' ,
	  	array(
		    'title' => __('Full or Excerpt Posts','pummel'),
	    )
    );
    $wp_customize->add_setting(
        'bpl_post_length',
        array(
            'default'       	=> 'excerpt',
	        'sanitize_callback' => 'bpl_sanitize_text'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bpl_post_length',
            array(
                'label'         	=> __( 'Choose to display full post or excerpt on posts page', 'pummel' ),
                'section'        	=> 'post_display_length',
                'settings'      	=> 'bpl_post_length',
                'type'           	=> 'radio',
                'choices'  			=> array(
						'full' => __('Full Post', 'pummel'),
						'excerpt'  => __('Excerpt', 'pummel'),

					)
            )
        )
   );







/////////////////////////////////////////////////////////////////////

    // Create custom panels
	$wp_customize->add_panel( 'frontpage_options', array(
		'priority' 			=> 60,
		'theme_supports' 	=> '',
		'title' 			=> __( 'Front Page Options', 'pummel' ),
		'description' 		=> __( 'Style Options for Static Front Page', 'pummel' ),
		)
	);
	

	$wp_customize->get_section( 'background_image' )->title = 'Site Background Image';

	// Assign sections to panels
  	$wp_customize->get_section('frontpage_middle')->panel = 'frontpage_options';
  	$wp_customize->get_section('frontpage_background')->panel = 'frontpage_options';
  	$wp_customize->get_section('frontpage_top')->panel = 'frontpage_options';
  	$wp_customize->get_section('frontpage_bottom')->panel = 'frontpage_options';
  	$wp_customize->get_section('frontpage_top_image')->panel = 'frontpage_options';

	//section priority
	$wp_customize->get_section('frontpage_top_image')->priority = 5;
	$wp_customize->get_section('frontpage_middle')->priority = 20;
  	$wp_customize->get_section('frontpage_background')->priority = 40;
  	$wp_customize->get_section('frontpage_top')->priority = 10;
  	$wp_customize->get_section('frontpage_bottom')->priority = 30;

	$wp_customize->get_section( 'title_tagline' )->priority = 10;
	$wp_customize->get_section( 'social-media' )->priority = 20;
	$wp_customize->get_section( 'header_image' )->priority = 30;
	$wp_customize->get_section( 'background_image' )->priority = 40;
	$wp_customize->get_section( 'colors' )->priority = 50;
	$wp_customize->get_section( 'copyright' )->priority = 60;
	$wp_customize->get_section( 'static_front_page' )->priority = 300;
	$wp_customize->get_section( 'post_display_length' )->priority = 290;

	//control priority
	$wp_customize->get_control( 'bpl_header_color' )->priority = 10;
	$wp_customize->get_control( 'header_textcolor' )->priority = 20;
	$wp_customize->get_control( 'bpl_header_menu_color' )->priority = 30;
	$wp_customize->get_control( 'background_color' )->priority = 40;
	$wp_customize->get_control( 'bpl_body_text_color' )	->priority = 50;
	$wp_customize->get_control( 'bpl_link_color' )	->priority = 60;
	$wp_customize->get_control( 'bpl_link_visited_color' )	->priority = 70;
	$wp_customize->get_control( 'bpl_frontpage_middle_widgets_background_color' )->priority = 80;
	$wp_customize->get_control( 'bpl_frontpage_middle_widgets_text_color' )->priority = 90;
	$wp_customize->get_control( 'bpl_comment_accent_color' )->priority = 100;
	$wp_customize->get_control( 'bpl_footer_widget_accent_color' )->priority = 110;
	$wp_customize->get_control( 'bpl_footer_widget_accent_color' )->priority = 120;


}
add_action( 'customize_register', 'bpl_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bpl_customize_preview_js() {
	wp_enqueue_script( 'bpl_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bpl_customize_preview_js' );

// Sanitize text
function bpl_sanitize_text( $text ) {

    return sanitize_text_field( $text );
}

// Sanitize textarea
function bpl_sanitize_textarea( $text ) {

    return esc_textarea( $text );
}


function bpl_customizer_output() {
    ?>

    <style type="text/css">

    .navbar-default,
    .navbar-default .navbar-brand {
	  color: <?php echo esc_html(get_theme_mod('bpl_header_menu_color', '#e0e0e0')); ?>;
	}

	.navbar-default .navbar-toggle .icon-bar {
		background-color: <?php echo esc_html(get_theme_mod( 'bpl_header_menu_color', '#e0e0e0')); ?>;
	}

    .site-header,
    .dropdown-menu {
	    background-color: <?php echo esc_html(get_theme_mod('bpl_header_color', '#3F51B5')); ?>;
    }

  	a {
	    color: <?php echo esc_html(get_theme_mod('bpl_link_color', '#3F51B5')); ?>;
	}

	a:visited {
	    color: <?php echo esc_html(get_theme_mod('bpl_link_visited_color', '#7986CB')); ?>;
	}

	.site-content {
		color: <?php echo esc_html(get_theme_mod('bpl_body_text_color', '#404040')); ?>;
	}

   	.media-body-wrap {
        border-left: 2px solid <?php echo esc_html(get_theme_mod('bpl_comment_accent_color', '#3F51B5')); ?>;
        border-bottom: 2px solid <?php echo esc_html(get_theme_mod('bpl_comment_accent_color', '#3F51B5')); ?>;
	}

 	.site-footer .widget {
	   border-left: 2px solid <?php echo esc_html(get_theme_mod('bpl_footer_widget_accent_color', '#3F51B5')); ?>;
	   border-bottom: 2px solid <?php echo esc_html(get_theme_mod('bpl_footer_widget_accent_color', '#3F51B5')); ?>;
	}

	.frontpage-middle-widgets {
		background-color: <?php echo esc_html(get_theme_mod('bpl_frontpage_middle_widgets_background_color', '#3F51B5')); ?>;
	}

	.frontpage-middle-widgets,
	.frontpage-middle-widgets a {
		color: <?php echo esc_html(get_theme_mod('bpl_frontpage_middle_widgets_text_color', '#C5CAE9')); ?>;
	}

	<?php if( get_theme_mod( 'bpl_frontpage_top_image') != "" ): ?>
		#frontpage-img {
				background-image: url(<?php echo esc_url(get_theme_mod( 'bpl_frontpage_top_image' )); ?>);
				background-position: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_position_y', 'center' )); ?> <?php echo get_theme_mod( 'bpl_frontpage_top_position_x', 'center' ); ?>;
				height: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_image_height', '500' )) . 'px'; ?>;
				background-size: cover;
		}

		@media screen and (max-width: 500px) {
			#frontpage-img {
	   			height: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_image_height_below_500', '300' ) ). 'px'; ?>;
			}
		}

	<?php endif; ?>

	.frontpage-container {
		color: <?php echo esc_html(get_theme_mod('bpl_frontpage_top_text_color', '#404040')); ?>;

		<?php if(get_theme_mod('bpl_show_front_top_text_background') != 0): ?>

			background-color: <?php echo esc_html(get_theme_mod('bpl_frontpage_top_text_background_color', '#e0e0e0')); ?>;
			background-color: <?php echo bpl_hex2rgba(esc_html(get_theme_mod('bpl_frontpage_top_text_background_color', '#e0e0e0')), esc_html(get_theme_mod('bpl_frontpage_top_text_background_opacity', '.8') )); ?>;
			border-radius: 5px;

		<?php endif; ?>
	}

	.frontpage-third {
		color: <?php echo esc_html(get_theme_mod('bpl_frontpage_bottom_text_color', '#404040')); ?>;

		<?php if(get_theme_mod('bpl_show_front_bottom_text_background') != 0): ?>

			background-color: <?php echo esc_html(get_theme_mod('bpl_frontpage_bottom_text_background_color', '#e0e0e0')); ?>;
			background-color: <?php echo bpl_hex2rgba(esc_html(get_theme_mod('bpl_frontpage_bottom_text_background_color', '#e0e0e0')), esc_html(get_theme_mod('bpl_frontpage_bottom_text_background_opacity', '.8') )); ?>;
			border-radius: 5px;

		<?php endif; ?>
	}

	#frontpage-bkg {
		background-color: <?php echo esc_html(get_theme_mod('bpl_frontpage_top_background_color', '#FFF')); ?>;
		<?php if( get_theme_mod( 'bpl_frontpage_top_background_image') != "" ): ?>
			background-image: url(<?php echo esc_url(get_theme_mod( 'bpl_frontpage_top_background_image' )); ?>);
			background-repeat: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_background_repeat', 'repeat' )); ?>;
			background-position: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_background_position_y', 'center' )); ?> <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_background_position_x', 'center' )); ?>;
			background-size: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_background_cover', 'auto' )); ?>;
			background-attachment: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_top_background_attachment', 'scroll' )); ?>;
		<?php endif; ?>
	}

	.frontpage-third-widgets {
		background-color: <?php echo esc_html(get_theme_mod('bpl_frontpage_bottom_background_color', '#FFF')); ?>;
		<?php if( get_theme_mod( 'bpl_frontpage_bottom_background_image') != "" ): ?>
			background-image: url(<?php echo esc_url(get_theme_mod( 'bpl_frontpage_bottom_background_image' )); ?>);
			background-repeat: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_bottom_background_repeat', 'repeat' )); ?>;
			background-position: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_bottom_background_position_y', 'center' )); ?> <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_bottom_background_position_x', 'center' )); ?>;
			background-size: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_bottom_background_cover', 'auto' )); ?>;
			background-attachment: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_bottom_background_attachment', 'scroll' )); ?>;
		<?php endif; ?>
	}

	<?php if( get_theme_mod( 'bpl_frontpage_background_image') != "" ): ?>
		#frontpage-bkg {
			background-color: transparent;
		}

		.frontpage-third-widgets {
	     	background-color: transparent;
		 }

		.front-page-background {
			background: url(<?php echo esc_url(get_theme_mod( 'bpl_frontpage_background_image' )); ?>);
			background-repeat: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_background_repeat', 'repeat' )); ?>;
			background-position: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_background_position_y', 'center' )); ?> <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_background_position_x', 'center' )); ?>;
			background-attachment: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_background_attachment', 'fixed' )); ?>;
			background-size: <?php echo sanitize_text_field(get_theme_mod( 'bpl_frontpage_background_cover', 'auto' )); ?>;
		}

    <?php endif; ?>

	<?php if( get_theme_mod('bpl_custom_css') != '' ) {
        echo wp_strip_all_tags( get_theme_mod('bpl_custom_css') );
  	} ?>

    </style>

    <?php
}

add_action( 'wp_head', 'bpl_customizer_output');
