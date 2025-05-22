<?php
/**
 * @package iPanelThemes Knowledgebase
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('kb-article-excerpt mb-5 pb-4 border-bottom shadow-sm rounded'); ?> style="background-color:#e0e1e3;">
	<header class="entry-header page-header mb-3">
		<div class="d-flex align-items-center mb-2">
			<div class="flex-grow-1">
				<h2 class="entry-title h2 mb-1 fw-bold"><a href="<?php the_permalink(); ?>" rel="bookmark" class="link-dark text-decoration-none"><?php the_title(); ?></a></h2>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta text-muted small d-flex align-items-center flex-wrap gap-3">
					<span><i class="fa-regular fa-calendar me-1"></i> <?php echo get_the_date(); ?></span>
					<span><i class="fa-regular fa-user me-1"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="text-decoration-none text-secondary"><?php the_author(); ?></a></span>
					<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
					<span><i class="fa-regular fa-comments me-1"></i> <?php comments_popup_link( __( 'Leave a comment', 'ipt_kb' ), __( '1', 'ipt_kb' ), __( '%', 'ipt_kb' ) ); ?></span>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="kb-thumb-large d-block d-sm-none mb-2">
		<a rel="bookmark" href="<?php the_permalink(); ?>" class="thumbnail"><?php the_post_thumbnail( 'ipt_kb_large', array(
			'class' => 'img',
		) ); ?></a>
	</div>
	<?php endif; ?>

	<div class="entry entry-excerpt mb-2">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-meta mt-2">
		<div class="d-flex flex-wrap align-items-center justify-content-between">
			<div class="text-muted small d-flex flex-wrap gap-3">
				<?php if ( 'post' == get_post_type() ) : ?>
					<?php $categories_list = get_the_category_list( __( ', ', 'ipt_kb' ) );
					if ( $categories_list && ipt_kb_categorized_blog() ) : ?>
					<span><i class="fa-regular fa-folder-open me-1"></i> <?php printf( __( '%1$s', 'ipt_kb' ), $categories_list ); ?></span>
					<?php endif; ?>
					<?php $tags_list = get_the_tag_list( '', __( ', ', 'ipt_kb' ) );
					if ( $tags_list ) : ?>
					<span><i class="fa-regular fa-tags me-1"></i> <?php printf( __( '%1$s', 'ipt_kb' ), $tags_list ); ?></span>
					<?php endif; ?>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'ipt_kb' ), '<span class="ms-3"><i class="fa-regular fa-pen-to-square"></i> ', '</span>' ); ?>
			</div>
			<div>
				<a rel="bookmark" href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-arrow-right me-1"></i> <?php _e( 'Read more', 'ipt_kb' ); ?></a>
			</div>
		</div>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
<div class="clearfix"></div>
