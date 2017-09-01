<?php
/**
 * The template for displaying archive pages.
 *
 * Used for displaying archive-type pages. These views can be further customized by
 * creating a separate template for each one.
 *
 * - author.php (Author archive)
 * - category.php (Category archive)
 * - date.php (Date archive)
 * - tag.php (Tag archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php get_header(); ?>

<div id="page" class="home-page">
	<div id="content" class="article">
		<h1 class="postsby">
			<span><?php the_archive_title(); ?></span>
		</h1>	
		<?php if ( have_posts() ) :
			$publishable_lite_full_posts = get_theme_mod('publishable_lite_full_posts');
			while ( have_posts() ) : the_post();
				publishable_lite_archive_post();
			endwhile;
			publishable_lite_post_navigation();
		endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>