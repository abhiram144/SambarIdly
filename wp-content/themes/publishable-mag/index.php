<?php
/**
 * The main template file.
 *
 * Used to display the homepage when home.php doesn't exist.
 */
?>
<?php get_header(); ?>
	<div id="page" class="home-page">
		<div id="content" class="article">
			<?php if ( have_posts() ) :
				$publishable_lite_full_posts = get_theme_mod('publishable_lite_full_posts');
				while ( have_posts() ) : the_post();
					publishable_lite_archive_post();
				endwhile;
				publishable_lite_post_navigation();
			endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
		</div>
		<?php get_footer(); ?>
