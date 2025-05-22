<?php
/**
 * @package iPanelThemes Knowledgebase
 */
?>

<a rel="bookmark" class="list-group-item kb-list-date kb-post-list d-flex justify-content-between align-items-center" href="<?php the_permalink(); ?>">
	<?php
	// We would not want to show the date if the post order plugin is active
	// As the order would not be just according to the date
	// The plugin is most likely override it.
	?>
	<div>
		<h3><i class="fa fa-file"></i> <?php the_title(); ?></h3>
	</div>
	<span class="badge bg-primary rounded-pill"><?php echo get_the_date(); ?></span>
</a>
