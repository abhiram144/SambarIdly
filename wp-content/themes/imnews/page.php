<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
<div class="container">
    <div class="row main-row">
		<div class="col-sm-9">	
			<div class="news-posts">	
			<?php if(have_posts()): 
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile;
				endif; ?>
			</div>	
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>	
<?php get_footer();