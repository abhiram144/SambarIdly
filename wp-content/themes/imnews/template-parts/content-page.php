<?php
/**
 * Template part for displaying page content in page.php
 *
 *
 * @package imnews
 */
the_content();
wp_link_pages( array(
	'before' => '<div class="page-links"><span class="page-links-title">' . esc_html( 'Pages:', 'imnews'.'</span>' ),
	'after'  => '</div>',
) );