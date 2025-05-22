<?php
/**
 * @package iPanelThemes Knowledgebase
 */
global $ipt_theme_op_settings;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5 pb-4 border-bottom'); ?>>
	<header class="entry-header page-header mb-3">
		<h1 class="entry-title mb-2 h3"><?php the_title(); ?></h1>

		<div class="entry-meta text-muted small d-flex align-items-center gap-3 mb-2">
			<?php ipt_kb_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php if ( isset( $ipt_theme_op_settings['ads'] ) && '' != trim( $ipt_theme_op_settings['ads']['below_title'] ) ) : ?>
	<div class="title-advertisement">
		<?php echo trim( $ipt_theme_op_settings['ads']['below_title'] ); ?>
	</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => __( '<p class="pagination-p">Pages:</p>', 'ipt_kb' ) . '<ul class="pagination">',
				'after'  => '</ul><div class="clearfix"></div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta text-muted bg-light p-3 rounded small mt-3">
		<?php
			$category_list = get_the_category_list( __( ', ', 'ipt_kb' ) );
			$tag_list = get_the_tag_list( '', __( ', ', 'ipt_kb' ) );
			if ( ! ipt_kb_categorized_blog() ) {
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged <i class="fa-regular fa-tags"></i> %2$s. <br />Bookmark the <i class="fa-regular fa-bookmark"></i> <a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				} else {
					$meta_text = __( 'Bookmark the <i class="fa-regular fa-bookmark"></i> <a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				}
			} else {
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in <i class="fa-regular fa-folder-open"></i> %1$s and tagged <i class="fa-regular fa-tags"></i> %2$s. <br />Bookmark the <i class="fa-regular fa-bookmark"></i> <a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				} else {
					$meta_text = __( 'This entry was posted in <i class="fa-regular fa-folder-open"></i> %1$s. <br />Bookmark the <i class="fa-regular fa-bookmark"></i> <a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				}
			}
			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>
		<?php edit_post_link( __( 'Edit', 'ipt_kb' ), '<span class="edit-link ms-3"><i class="fa-regular fa-pen-to-square"></i> ', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
