<?php
/**
 * The template for displaying all single posts
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
<div class="container">
    <div class="row main-row">
        <div class="col-sm-9">
			<div class="news-posts" id="single-blog">	
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content','single' );
				endwhile; ?>
			</div>	
		</div>
	</div>
	<?php get_sidebar(); ?>
	</div>
</div>	
<?php get_footer();