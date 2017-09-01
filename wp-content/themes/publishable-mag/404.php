<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package publishable Lite
 */

get_header(); ?>

<div id="page" class="single">
	<article id="content" class="article page">
		<div class="single_post">
		<header>
			<h1 class="title"><?php _e('Error 404 Not Found', 'publishable-mag' ); ?></h1>
		</header>
		<div class="post-content">
			<p><?php _e('Oops! We couldn\'t find this Page.', 'publishable-mag' ); ?></p>
			<p><?php _e('Please check your URL or use the search form below.', 'publishable-mag' ); ?></p>
			<?php get_search_form();?>
		</div><!--.post-content--><!--#error404 .post-->
	</div>
	</article>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>