<?php
/**
 * @package iPanelThemes Knowledgebase
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'kb-article-excerpt mb-5 pb-4 border-bottom' ); ?>>
	<header class="entry-header page-header mb-3">
		<h2 class="entry-title h4 mb-2"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta text-muted small d-flex align-items-center gap-3 mb-2">
			<?php ipt_kb_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="clearfix"></div>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="float-start kb-thumb-medium d-none d-sm-block me-3 mb-2">
		<a rel="bookmark" href="<?php the_permalink(); ?>" class="thumbnail"><?php the_post_thumbnail( 'ipt_kb_medium', array(
			'class' => 'img-thumbnail rounded',
		) ); ?></a>
	</div>
	<div class="kb-thumb-large d-block d-sm-none mb-2">
		<a rel="bookmark" href="<?php the_permalink(); ?>" class="thumbnail"><?php the_post_thumbnail( 'ipt_kb_large', array(
			'class' => 'img',
		) ); ?></a>
	</div>
	<?php endif; ?>

	<div class="entry entry-excerpt">
		<?php the_excerpt(); ?>
	</div>

	<div class="clearfix"></div>
	<footer class="entry-meta mt-2">
		<p class="d-block d-sm-none mb-2">
			<a rel="bookmark" href="<?php the_permalink(); ?>" class="btn btn-primary btn-block"><i class="fa-solid fa-arrow-right"></i> <?php _e( 'Read more', 'ipt_kb' ); ?></a>
		</p>
		<p class="float-end d-none d-sm-block mb-0">
			<a rel="bookmark" href="<?php the_permalink(); ?>" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i> <?php _e( 'Read more', 'ipt_kb' ); ?></a>
		</p>
		<p class="text-muted d-none d-sm-block meta-data small mt-2">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					$categories_list = get_the_category_list( __( ', ', 'ipt_kb' ) );
					if ( $categories_list && ipt_kb_categorized_blog() ) :
				?>
				<span class="cat-links me-3">
					<i class="fa-regular fa-folder-open"></i>&nbsp;<?php printf( __( 'Posted in %1$s', 'ipt_kb' ), $categories_list ); ?>
				</span>
				<?php endif; ?>

				<?php
					$tags_list = get_the_tag_list( '', __( ', ', 'ipt_kb' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links me-3">
					<i class="fa-regular fa-tags"></i> <?php printf( __( 'Tagged %1$s', 'ipt_kb' ), $tags_list ); ?>
				</span>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link me-3"><i class="fa-regular fa-comments"></i>&nbsp;<?php comments_popup_link( __( 'Leave a comment', 'ipt_kb' ), __( '1 Comment', 'ipt_kb' ), __( '% Comments', 'ipt_kb' ) ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'ipt_kb' ), '<span class="ms-3"><i class="fa-regular fa-pen-to-square"></i> ', '</span>' ); ?>
		</p>
		<div class="clearfix"></div>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
<div class="clearfix"></div>
