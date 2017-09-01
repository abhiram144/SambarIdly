<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 *
 * @package imnews
 */
?>
<div class="inline-dropdown">
	
    	<div class="container">	
    		<div class="row row-margin">
        	<div class="col-sm-12">
        		<span class="title-sortnews"><b><?php esc_html_e( 'Nothing Found', 'imnews' ); ?></b></span>
        	</div>
    	</div>
    </div>
</div>
<div class="container">
    <div class="row main-row">
	    <div class="col-sm-9">    
	        <div class="news-posts">
				<div class="page-content">
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
						<p><?php printf( wp_kses_post( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'imnews' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
					<?php elseif ( is_search() ) : ?>
							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'imnews' ); ?></p>
						<?php get_search_form();
						else : ?>
							<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'imnews' ); ?></p>
						<?php get_search_form();
					endif; ?>
				</div>
			</div>
		</div>
		<?php get_sidebar(); ?>	
	</div>
</div>