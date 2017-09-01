<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HitMag
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title arc-page-title">', '</h1>' );
					if ( ! is_author() ) { the_archive_description( '<div class="archive-description">', '</div>' ); }
				?>
			</header><!-- .page-header -->

			<?php

			$archive_content_layout = get_option( 'archive_content_layout', 'th-grid-2' );
			echo '<div class="posts-wrap ' . esc_attr( $archive_content_layout ) . '">';

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

			echo '</div><!-- .posts-wrap -->';

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();