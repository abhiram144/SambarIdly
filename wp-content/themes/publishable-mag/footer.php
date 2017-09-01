<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package publishable Lite
 */

?>
	<footer id="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' ) ) { ?>
	    	<div class="container">
	    	    <div class="footer-widgets">
		    		<div class="footer-widget">
			    		<?php if ( is_active_sidebar( 'footer-first' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-first' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget">
						<?php if ( is_active_sidebar( 'footer-second' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-second' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget last">
						<?php if ( is_active_sidebar( 'footer-third' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-third' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php }
		publishable_lite_copyrights_credit(); ?>
	</footer><!-- #site-footer -->
<?php wp_footer(); ?>

</body>
</html>
