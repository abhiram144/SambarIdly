<?php
/**
 * The template for displaying 404 pages (not found)
 *
 *
 * @package imnews
 */
get_header(); ?>
<div class="inline-dropdown">
    <div class="row row-margin">
    	<div class="container">	
        	<div class="col-sm-12">
                <span class="title-sortnews"><b><?php esc_html_e( "Oops! That page can't be found.", "imnews" ); ?></b></span>
            </div>
        </div>    
    </div>
</div>
<div class="container">
    <div class="row main-row">
		<div class="col-sm-9">	
			<div class="news-posts">
				<div class="sideArea">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try onece again with a search?', 'imnews' ); ?></p>	
    				<?php get_search_form(); ?>
			    </div>    
            </div>
		</div>
        <?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();