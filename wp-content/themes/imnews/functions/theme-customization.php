<?php
/**
* Customization options
**/
function imnews_customize_register( $wp_customize ) {
    require get_template_directory() . '/functions/customize-control-class.php';
    $wp_customize->add_panel(
    'footer',
    array(
        'title' => esc_html__( 'Footer', 'imnews' ),
        'description' => esc_html__('Footer options','imnews'),
    ) );
    $wp_customize->add_section( 'footer_widget_area' , array(
        'title'       => esc_html__( 'Footer Widget Area', 'imnews' ),
        'capability'     => 'edit_theme_options',
        'panel' => 'footer'
    ) );
    $wp_customize->add_setting(
        'hide_footer_widget_bar',
        array(
            'default' => '0',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control(
        'hide_footer_widget_bar',
        array(
            'section' => 'footer_widget_area',                
            'label'   => esc_html__('Hide Widget Area','imnews'),
            'type'    => 'select',
            'choices'        => array(
                "1"   => esc_html__( "Show", 'imnews' ),
                "0"   => esc_html__( "Hide", 'imnews' ),
            ),
        )
    );
    $wp_customize->add_setting(
        'footer_widget_style',
        array(
            'default' => '3',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control(
        'footer_widget_style',
        array(
            'section' => 'footer_widget_area',                
            'label'   => esc_html__('Select Widget Area','imnews'),
            'type'    => 'select',
            'choices'        => array(
                "6"   => esc_html__( "2 column", 'imnews' ),
                "4"   => esc_html__( "3 column", 'imnews' ),
                "3"   => esc_html__( "4 column", 'imnews' )
            ),
        )
    );
    $wp_customize->add_setting('footer_copyrights', array(
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('footer_copyrights', array(
        'label'   => esc_html__('Footer Copy Rights','imnews'),
        'section' => 'footer_widget_area',
        'type'    => 'textarea',
    ));
    $wp_customize->add_section(
        'imnews_footer_widget_layout',
        array(
            'title' => esc_html__('Footer Widget Layout','imnews'),
            'priority' => 107,
            'description' => esc_html__('Choose one of five layout style.', 'imnews'),
           
        )
    );
    $wp_customize->add_setting(
        'theme_color',
        array(
            'default' => '#ffa92c',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'theme_color',
        array(
            'label'      => __('Theme Color ', 'imnews'),
            'section' => 'colors',
            'priority' => 10
        )
      )
    );
    $wp_customize->add_setting(
      'secondary_color',
      array(
          'default' => '#4D4D4D',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_color',
        array(
            'label'      => esc_html__('Secondary Color', 'imnews'),
            'section' => 'colors',
            'priority' => 11
        )
      )
    );
/*---------------Blog Page Settings-----------------*/
    $wp_customize->add_panel(
    'blogpage_setting',
    array(
        'title' => esc_html__( 'Blog Page Settings', 'imnews' ),
        'description' => esc_html__('Blog Page options','imnews'),
    )
    );
    $wp_customize->add_section( 'section_2' , array(
        'title'       => esc_html__( 'Section 2', 'imnews' ),
        'capability'     => 'edit_theme_options',
        'panel' => 'blogpage_setting'
    ) );
    $wp_customize->add_setting(
        'hide_related_post',
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control(
        'hide_related_post',
        array(
            'section' => 'section_2',                
            'label'   => esc_html__('Hide Section 2','imnews'),
            'type'    => 'select',
            'choices'        => array(
                "1"   => esc_html__( "Show", 'imnews' ),
                "0"   => esc_html__( "Hide", 'imnews' ),
            ),
        )
    );
    $wp_customize->add_setting( 'category_section_2', array(
        'default' => array(),
        'sanitize_callback' => 'imnews_array_validation'
    ) );
 
    $wp_customize->add_control(
        new Imnews_Customize_Control_Multiple_Select(
            $wp_customize,
            'category_section_2',
            array(
                'settings' => 'category_section_2',
                'label'    => esc_html__('Category','imnews'),
                'section'  => 'section_2', // Enter the name of your own section
                'type'     => 'multiple-select', // The $type in our class
                'choices'  => imnews_get_category_list_options() // Your choices
            )
        )
    );
    $wp_customize->add_setting( 'number_posts_sec2', array(
        'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'default' => 3,
    ) );

    $wp_customize->add_control( 'number_posts_sec2', array(
      'type' => 'number',
      'section' => 'section_2', // Add a default or your own section
      'label' => esc_html__( 'Total number of Posts', 'imnews' ),
      'description' => esc_html__( 'This is a custom number.', 'imnews' ),
    ) );
    $wp_customize->add_section( 'section_3' , array(
        'title'       => esc_html__( 'Section 3', 'imnews' ),
        'capability'     => 'edit_theme_options',
        'panel' => 'blogpage_setting'
    ) );
    $wp_customize->add_setting(
        'hide_similar_post',
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 20,
        )
    );
    $wp_customize->add_control(
        'hide_similar_post',
        array(
            'section' => 'section_3',                
            'label'   => esc_html__('Hide Section 3','imnews'),
            'type'    => 'select',
            'choices'        => array(
                "1"   => esc_html__( "Show", 'imnews' ),
                "0"   => esc_html__( "Hide", 'imnews' ),
            ),
        )
    );
    $wp_customize->add_setting( 'category_section_3', array(
        'default' => array(),
        'sanitize_callback' => 'imnews_array_validation'
    ) );
 
    $wp_customize->add_control(
        new Imnews_Customize_Control_Multiple_Select(
            $wp_customize,
            'category_section_3',
            array(
                'settings' => 'category_section_3',
                'label'    => esc_html__('Category','imnews'),
                'section'  => 'section_3', // Enter the name of your own section
                'type'     => 'multiple-select', // The $type in our class
                'choices'  => imnews_get_category_list_options() // Your choices
            )
        )
    );
    $wp_customize->add_setting( 'number_posts_sec3', array(
        'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      'default' => 2,
    ) );

    $wp_customize->add_control( 'number_posts_sec3', array(
      'type' => 'number',
      'section' => 'section_3', // Add a default or your own section
      'label' => esc_html__( 'Total number of Posts', 'imnews' ),
      'description' => esc_html__( 'This is a custom number.', 'imnews' ),
    ) );
    /*---------------End Blog Page Settings-----------------*/
}
add_action( 'customize_register', 'imnews_customize_register' );

add_action('wp_head','imnews_custom_css',900);
function imnews_custom_css(){ ?>
<style type="text/css">
.inline-dropdown,.comment .comment-reply-link{background-color: <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>}
.search-box-input .search-button,caption{background-color: <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>}
.side-area-post .side-area-heading,.side-area-post table{border-color:  <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>; color: <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
.side-area-post .side-area-heading::after{background:<?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
.current{background:<?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
.next, .prev{color:<?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
.sidenews-post-image img,.tagcloud a:hover,.othernews-post-image img,.relatednews-post-image img,.similar-post-image img{background:<?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
.side-area-post ul li a:hover,cite,a{color:<?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
.side-area-post ul li.recentcomments a:hover{color: <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}    
.like-article h4{border-bottom: 1px solid <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>; color: <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
#menubar .nav > li > a:hover{color:<?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
#menubar#main-nav ul ul li:hover > a, #main-nav ul ul li a:hover{color: <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
.next, .prev{border:1px solid <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
#top .navbar-toggle .icon-bar,.comment-form .submit,.current, .page-numbers:hover, .next:hover, .prev:hover{background:<?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>; }
#menubar .nav > li > a,#menubar ul ul li a,#menubar .navbar-brand{ color: <?php echo esc_attr(get_theme_mod('secondary_color','#4D4D4D')); ?>; }
.comment .comment-metadata a,.othernews-post-title a,.relatednews-post-details .relatednews-post-title a,.similar-post-details .similar-post-title a,.news-title a,.comment-metadata > a,.comment-edit-link,.comment-reply-link,.logged-in-as > a,.ttl_tagline{ color: <?php echo esc_attr(get_theme_mod('secondary_color','#4D4D4D')); ?>; }
.comment .comment-metadata a:hover,.othernews-post-title a:hover,.relatednews-post-title a:hover,.footer-copyrights a:hover,.similar-post-title a:hover,.sidenews-post-heading > a:hover,.news-title a:hover,.comment-metadata > a:hover,.comment-edit-link:hover,.comment-reply-link:hover,.logged-in-as > a:hover,a:focus, a:hover{color: <?php echo esc_attr(get_theme_mod('theme_color','#ffa92c')); ?>;}
<?php $imnews_header_text = get_theme_mod('header_text'); ?>
</style>
<?php 
}
function imnews_array_validation( $numeric ) {
    return array_map( 'absint', $numeric );
} ?>