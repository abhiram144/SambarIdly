<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package imnews
 */
get_header(); ?>        	
<div class="inline-dropdown">
	<div class="container">	
    	<div class="row">
            <div class="col-sm-12">
                <div class="path-category">
                    <?php echo imnews_custom_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>    
</div>
<?php get_template_part( 'template-parts/content' );
get_footer();