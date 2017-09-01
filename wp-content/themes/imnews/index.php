<?php
/**
 * The main template file
 */
get_header();
$imnews_blog_page = get_option( 'page_for_posts' ); ?>
<div class="inline-dropdown">
		<div class="container">
				<div class="row row-margin">
            <div class="col-sm-12">
            	<?php if(!empty($imnews_blog_page) ): ?>
            		<span class="title-sortnews"><b><?php echo get_the_title($imnews_blog_page); ?></b></span>
            	<?php else: ?>
                	<span class="title-sortnews"><b><?php esc_html_e('Blog','imnews'); ?></b></span>
                <?php endif; ?>
            </div>
    	</div>
    </div>
</div>
<?php get_template_part( 'content' );  get_footer(); 