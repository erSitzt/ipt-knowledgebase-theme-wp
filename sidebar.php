<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package iPanelThemes Knowledgebase
 */
?>
	<div id="secondary" class="widget-area col-md-4">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( is_active_sidebar( is_singular( 'post' ) || is_category() ? 'sidebar-1' : 'sidebar-4' ) ) : ?>
			<?php dynamic_sidebar( is_singular( 'post' ) || is_category() ? 'sidebar-1' : 'sidebar-4' ); ?>
		<?php else : ?>
			<!-- Modern fallback widgets -->
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
		<?php endif; ?>
	</div><!-- #secondary -->
