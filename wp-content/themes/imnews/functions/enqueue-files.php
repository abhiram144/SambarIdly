<?php
/*
 * Enqueue css and js files
 */
function imnews_enqueue() {
	/*----------------------css-----------------------*/
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome'.$suffix.'.css',true,'4.7.0' );	
	wp_enqueue_style( 'stellarnav', get_template_directory_uri().'/css/stellarnav.css',true,'1.1' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap'.$suffix.'.css',true,'3.3.7');
	wp_enqueue_style( 'imnews-default', get_template_directory_uri().'/css/default.css',true,'' );
	wp_enqueue_style( 'imnews-style', get_stylesheet_uri() );
	/*----------------------end css-----------------------*/
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap'.$suffix.'.js', array(), '', true );
	wp_enqueue_script( 'stellarnav', get_template_directory_uri() . '/js/stellarnav.js', array(), '', true );
	wp_enqueue_script( 'imnews-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'imnews_enqueue' );