<?php
/**
 * publishable Theme Customizer.
 *
 * @package publishable Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function publishable_lite_customize_register( $wp_customize ) {

	/*---------------------
	* Theme Options
	----------------------*/
    $wp_customize->add_panel( 'panel_id', array(
        'priority'       => 121,
        'capability'     => 'edit_theme_options',
        'title'          => __('Theme Design Options', 'publishable-mag'),
        'description'    => __('Theme Design Options', 'publishable-mag'),
    ) ); 


    /***************************************************/
    /*****                 Info                    ****/
    /**************************************************/
    $wp_customize->add_section(
        'publishable_new',
        array(
            'title' => __('Help & Contact', 'publishable-mag'),
            'priority' => 0,
            'description' => __('
                               <p>
                                    <strong>Plugin or WordPress issues?</strong><br>
                                    If you are experiencing issues with plugins, please contact the plugin author. If you are experiencing issues with WordPress functionality then please visit the <a href="https://wordpress.org/support/" target="_blank">WordPress Support Forum</a>.
                                </p>
                                <p>
                                <strong>Theme issues?</strong><br>
                                    If you are having theme related problems then please contact us through our <a href="http://admirablethemes.com/contact/" target="_blank">contact form</a>, which can be found at <a href="http://admirablethemes.com/contact/" target="_blank">http://admirablethemes.com/contact/</a>
                                </p>
                                <p>
                                    <br>
                                    <a href="http://admirablethemes.com/publishable-magazine/" target="_blank" style="display:block;">
                                    <img src="http://admirablethemes.com/pictures/publishable-mag-info.png">
                                    </a>
                                </p>
                ', 'publishable-mag') 
            )
        );  
    $wp_customize->add_setting('publishable_options[info]', array(
        'sanitize_callback' => 'publishable_no_sanitize',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pro_section', array(
        'section' => 'publishable_new',
        'settings' => 'publishable_options[info]',
        'type' => 'textarea',
        'priority' => 109
        ) )
    );   

    $wp_customize->add_section(
        'publishable_mag_prem',
        array(
            'title' => __('Publishable Mag Premium', 'publishable-mag'),
            'priority' => 9999,
            'description' => __('
                                       <a href="http://admirablethemes.com/publishable-magazine/" target="_blank" style="display:block;">
                                    <img src="http://admirablethemes.com/pictures/publishable-mag-info.png">
                                    </a>
                ', 'publishable-mag') 
            )
        );  
    $wp_customize->add_setting('publishable_mag_prem[info]', array(
        'sanitize_callback' => 'publishable_mag_no_sanitize',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'premium_section', array(
        'section' => 'publishable_mag_prem',
        'settings' => 'publishable_mag_prem[info]',
        'type' => 'textarea',
        'priority' => 109
        ) )
    );   
 


function publishable_mag_customizer_stylesheet() {
    wp_enqueue_style( 'publishable_mag-customizer-css', get_template_directory_uri().'/css/css-customizer.css', NULL, NULL, 'all' );
}



    /***************************************************/
    /*****                 Layout                 ****/
    /**************************************************/
    $wp_customize->add_section( 'publishable_lite_styling_settings', array(
        'title'      => __('All Blog Posts Settings','publishable-mag'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',
    ) );


    $wp_customize->add_section( 'publishable_lite_general_layout', array(
        'title'      => __('General Layout','publishable-mag'),
        'priority'   => 1,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );
  

    $wp_customize->add_setting('publishable_lite_layout', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'default'           => 'cslayout',
    ));
    $wp_customize->add_control('publishable_lite_layout', array(
        'settings' => 'publishable_lite_layout',
        'label'    => __('Sidebar Position', 'publishable-mag'),
        'section'  => 'publishable_lite_general_layoutno',
        'type'     => 'radio',
        'choices'  => array(
            'cslayout' => __('Right Sidebar','publishable-mag'),
            'sclayout' => __('Left Sidebar','publishable-mag'),
        ),
    ));

    //Color Scheme
    $wp_customize->add_setting( 'top_header_background_color', array(
        'default'           => '#181818',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_header_background_color', array(
        'label'       => __( 'Header Background Color', 'publishable-mag' ),
        'description' => __( 'Applied to header background.', 'publishable-mag' ),
        'section'     => 'colours',
        'settings'    => 'top_header_background_color',
        ) ) );
    $wp_customize->add_setting( 'publishable_lite_color_scheme', array(
        'default'           => '#c69c6d',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'publishable_lite_color_scheme', array(
        'label'    => __('Primary Color Scheme','publishable-mag'),
        'section'  => 'colours',
        'settings' => 'publishable_lite_color_scheme',
    )) );
    $wp_customize->add_setting( 'publishable_lite_color_scheme2', array(
        'default'           => '#1b1b1b',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'publishable_lite_color_scheme2', array(
        'label'    => __('Secondary Color Scheme','publishable-mag'),
        'section'  => 'colors',
        'settings' => 'publishable_lite_color_scheme2',
    )) );

    //Full posts
    $wp_customize->add_setting('publishable_lite_full_posts', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'default'           => '0',
    ));
    $wp_customize->add_control('publishable_lite_full_posts', array(
        'settings' => 'publishable_lite_full_posts',
        'label'    => __('Posts on Homepage', 'publishable-mag'),
        'section'  => 'publishable_lite_styling_settings',
        'type'     => 'radio',
        'choices'  => array(
            '0' => __('Excerpts','publishable-mag'),
            '1' => __('Full Posts','publishable-mag'),
        ),
    ));

    /***************************************************/
    /*****               Colors                ****/
    /**************************************************/
    $wp_customize->add_section( 'colors', array(
        'title'      => __('Colors','publishable-mag'),
        'priority'   => 1,
        'capability' => 'edit_theme_options',
    ) );
  

    /***************************************************/
    /*****               Header                ****/
    /**************************************************/
    $wp_customize->add_section( 'publishable_lite_header_settings', array(
        'title'      => __('Header','publishable-mag'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );
  
   /***************************************************/
    /*****               pagination                ****/
    /**************************************************/
    $wp_customize->add_section( 'publishable_lite_pagination_settings', array(
        'title'      => __('Pagination Type','publishable-mag'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );

    $wp_customize->add_setting( 'publishable_lite_pagination_type', array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'publishable_lite_pagination_type',
            array(
                'label'     => __('Pagination Type', 'publishable-mag'),
                'section'   => 'publishable_lite_general_layoutno',
                'settings'  => 'publishable_lite_pagination_type',
                'type'      => 'radio',
                'choices'  => array(
                    '0'   => __('Next/Previous', 'publishable-mag'),
                    '1'  => __('Numbered', 'publishable-mag'),
                ),
                'transport' => 'refresh',
            )
        )
    );


    /***************************************************/
    /*****               Footer                     ****/
    /**************************************************/
    $wp_customize->add_section( 'publishable_lite_footer_settings', array(
        'title'      => __('Footer','publishable-mag'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );

    $wp_customize->add_setting('publishable_lite_copyright_text', array(
        'default'           => 'Copyright 2017 - Powered By WordPress & AdmirableThemes',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
    )); 
    $wp_customize->add_control('publishable_lite_copyright_text', array(
        'label'    => __('Copyright Text', 'publishable-mag'),
        'description' => __('You can write your copyright own text or leave it blank.','publishable-mag'),
        'section'  => 'publishable_lite_footer_settingsno',
        'settings' => 'publishable_lite_copyright_text',
        'type'     => 'textarea',
    ));

     //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_section( 'publishable_single_settings', array(
        'title'      => __('Single Post Settings','publishable-mag'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );

    //Breadcrumb
    $wp_customize->add_setting('publishable_lite_single_breadcrumb_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('publishable_lite_single_breadcrumb_section', array(
        'label'    => __('Breadcrumb Section', 'publishable-mag'),
        'section'  => 'publishable_single_settingsno',
        'settings' => 'publishable_lite_single_breadcrumb_section',
        'type'     => 'radio',
        'choices'  => array(
            '0' => __('OFF', 'publishable-mag'),
            '1' => __('ON', 'publishable-mag'),
        ),
    ));

    //Tags
    $wp_customize->add_setting('publishable_lite_single_tags_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('publishable_lite_single_tags_section', array(
        'label'    => __('Tags Section', 'publishable-mag'),
        'section'  => 'publishable_single_settingsno',
        'settings' => 'publishable_lite_single_tags_section',
        'type'     => 'radio',
        'choices'  => array(
            '0' => __('OFF', 'publishable-mag'),
            '1' => __('ON', 'publishable-mag'),
        ),
    ));

    //Related Posts
    $wp_customize->add_setting('publishable_lite_relatedposts_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('publishable_lite_relatedposts_section', array(
        'label'    => __('Related Posts Section', 'publishable-mag'),
        'section'  => 'publishable_single_settingsno',
        'settings' => 'publishable_lite_relatedposts_section',
        'type'     => 'radio',
        'choices'  => array(
            '0' => __('OFF', 'publishable-mag'),
            '1' => __('ON', 'publishable-mag'),
        ),
    ));

    //Author Box
    $wp_customize->add_setting('publishable_lite_authorbox_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('publishable_lite_authorbox_section', array(
        'label'    => __('Author box Section', 'publishable-mag'),
        'section'  => 'publishable_single_settingsno',
        'settings' => 'publishable_lite_authorbox_section',
        'type'     => 'radio',
        'choices'  => array(
            '0' => __('OFF', 'publishable-mag'),
            '1' => __('ON', 'publishable-mag'),
        ),
    ));

    $wp_customize->get_setting( 'blogname' )->transport                              = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport                       = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport                      = 'postMessage';
}
add_action( 'customize_register', 'publishable_lite_customize_register' );

if(! function_exists('publishable_mag_color_output' ) ):
/**
* Set the header background color 
*/
function publishable_mag_color_output(){

    ?>

    <style type="text/css">
   #site-header { background-color: <?php echo esc_attr(get_theme_mod( 'top_header_background_color')); ?>; }

    </style>
    <?php }
    add_action( 'wp_head', 'publishable_mag_color_output' );
    endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function publishable_lite_customize_preview_js() {
	wp_enqueue_script( 'publishable_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'publishable_lite_customize_preview_js' );
