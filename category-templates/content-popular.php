<?php
/**
 * @package iPanelThemes Knowledgebase
 */
?>

<a rel="bookmark" class="list-group-item kb-list-date kb-post-list d-flex justify-content-between align-items-center" href="<?php the_permalink(); ?>">
	<div>
		<h3><i class="fa fa-file"></i> <?php the_title(); ?></h3>
	</div>
	<span class="badge bg-primary rounded-pill"><?php echo get_post_meta( $post->ID, 'ipt_kb_like_article', true ); ?></span>
</a>
