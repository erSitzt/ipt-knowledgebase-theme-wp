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
 * @package iPanelThemes Knowledgebase
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-md-8">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php ipt_kb_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<aside id="secondary" class="widget-area col-md-4 d-print-none">
			<div class="card mb-4 shadow-sm">
				<div class="card-header bg-primary text-white d-flex align-items-center">
					<i class="fa-solid fa-magnifying-glass me-2"></i> <span class="fw-bold">Search</span>
				</div>
				<div class="card-body">
					<?php get_search_form(); ?>
				</div>
			</div>
			<div class="card mb-4 shadow-sm">
				<div class="card-header bg-success text-white d-flex align-items-center">
					<i class="fa-solid fa-list me-2"></i> <span class="fw-bold">Categories</span>
				</div>
				<div class="card-body">
					<?php wp_list_categories(array('title_li' => '')); ?>
				</div>
			</div>
			<div class="card mb-4 shadow-sm">
				<div class="card-header bg-warning text-dark d-flex align-items-center">
					<i class="fa-solid fa-tags me-2"></i> <span class="fw-bold">Tags</span>
				</div>
				<div class="card-body">
					<?php wp_tag_cloud(); ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</aside>
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
