<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Intemporel
 * @author Deepak Bansal
 * @link http://db.fyi
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */

				?>

				<?php
					while ( have_posts() ) : the_post();

						if( 1 > $wp_query->current_post ):
							get_template_part( 'template-parts/content-poster', get_post_format() );
						else :
							break;
						endif;

					endwhile;
				?>

				<?php
					$wp_query->current_post = 0;

					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;
				?>


			<?php
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous Page', 'intemporel' ),
					'next_text'          => __( 'Next Page', 'intemporel' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'intemporel' ) . ' </span>',
				) );
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
