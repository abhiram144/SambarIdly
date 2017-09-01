<?php
/**
 * imnews functions and definitions
 *
 * 
 * @package imnews
 */
if ( ! function_exists( 'imnews_setup' ) ) :
	function imnews_setup() {
		load_theme_textdomain( 'imnews', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary' => esc_html__( 'Top Menu', 'imnews' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'imnews' ),
		) );
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'custom-logo', array(
	        'height'      => 30,
	        'width'       => 160,
	        'flex-height' => true,
	        'header-text' => array( 'navbar-brand','ttl_tagline' ), 
	    ) );
		add_theme_support( 'custom-background', apply_filters( 'imnews_custom_background_args', array(
			'default-color' => '#ffffff',
		) ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_image_size( 'imnews-related-thumbnail', 260, 160, true );
	    add_image_size( 'imnews-single-thumbnail', 820, 420, true );
	    add_image_size( 'imnews-thumbnail-image', 260, 165, true );
	    add_image_size( 'imnews-similar-thumbnail', 400, 300, true );
	}
	add_action( 'after_setup_theme', 'imnews_setup' );
endif;
function imnews_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'imnews_content_width', 960 );
}
add_action( 'after_setup_theme', 'imnews_content_width', 0 );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 *
 *
 * @return an ellipsis.
 */
function imnews_custom_excerpt_length_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
    return ' &hellip; ';
}
add_filter( 'excerpt_more', 'imnews_custom_excerpt_length_more' );
/**
 * Change excerpt length.
 *
 *
 * @return word length.
 */
function imnews_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
    return 50;
}
add_filter( 'excerpt_length', 'imnews_excerpt_length', 999 );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function imnews_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'imnews_pingback_header' );
//Additional Menu
add_action('admin_menu', 'nikosa_add_page');
function nikosa_add_page() {
  add_theme_page(__('IMNewsPro Features', 'imnews'), __('IMNewsPro Features', 'imnews'), 'edit_theme_options', 'imnewspro-features','imnewspro_page');
}

function imnewspro_page(){ ?>
<div class="">
  <a href="<?php echo esc_url('https://vaultthemes.com/wordpress-themes/imnews-pro/'); ?>" target="_blank" title="imnewspro Page">
    <img src ="<?php echo esc_url(get_template_directory_uri().'/images/featured-imnews.png') ?>" width="98%" height="auto" />
  </a>
</div>
<?php
}

require get_template_directory() . '/functions/theme-default-setup.php';
require get_template_directory() . '/functions/widget.php';
require get_template_directory() . '/functions/enqueue-files.php';
require get_template_directory() . '/functions/breadcrumbs.php'; 
require get_template_directory() . '/functions/theme-customization.php';