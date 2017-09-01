<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package publishable Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function publishable_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'publishable_lite_body_classes' );



add_action( 'admin_menu', 'publishable_mag_register_backend' );
function publishable_mag_register_backend() {
	add_theme_page( __('Publishable Magazine', 'publishable-mag'), __('Publishable Magazine', 'publishable-mag'), 'edit_theme_options', 'about-publishable_mag.php', 'publishable_mag_backend');
}

function publishable_mag_backend(){ ?>
<div class="theme-info-wrapper">
	<div class="theme-info-inner">
		<div class="theme-info-left">
			<div class="theme-info-left-inner">
				<h2>Plugin or WordPress issues?</h2>
				<p>
					If you are experiencing issues with plugins, please contact the plugin author. If you are experiencing issues with WordPress functionality then please visit the <a href="https://wordpress.org/support/" target="_blank">WordPress Support Forum</a>.
				</p>
				<h2>Theme issues?</h2>
				<p>
					If you are having theme related problems then please contact us through our <a href="http://admirablethemes.com/contact/" target="_blank">contact form</a>, which can be found at <a href="http://admirablethemes.com/contact/" target="_blank">http://admirablethemes.com/contact/</a>
				</p>	

				<h2>Need more help?</h2>
				<ul>
					<li><a href="http://admirablethemes.com/publishable-magazine/" target="_blank">Publishable Magazine Premium</a></li>
					<li><a href="http://admirablethemes.com/contact/" target="_blank">Contact AdmirableThemes</a></li>
					<li><a href="https://wordpress.org/support/" target="_blank">WordPress Support Forum</a></li>
				</ul>
			</div>
		</div>
		<div class="theme-info-right">
			<a href="http://admirablethemes.com/publishable-magazine/" target="_blank" style="display:block;">
				<img src="http://admirablethemes.com/pictures/publishable-mag-info.png">
			</a>
		</div>
	</div>
</div>
<?php }

