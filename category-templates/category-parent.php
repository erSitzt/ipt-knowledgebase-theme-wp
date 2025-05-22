<?php
/**
 * @package iPanelThemes Knowledgebase
 */
global $term_meta, $cat, $cat_id, $sub_categories;
$pcat_totals = ipt_kb_total_cat_post_count( $cat_id );
?>
	<header class="kb-parent-category-header row">
		<div class="col-sm-4 col-md-3 col-lg-2 kb-pcat-icon d-none d-sm-block">
			<?php if ( isset( $term_meta['image_url'] ) && '' != $term_meta['image_url'] ) : ?>
			<p class="text-center">
				<img class="img-thumbnail rounded-circle" src="<?php echo esc_attr( $term_meta['image_url'] ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" />
			</p>
			<?php endif; ?>
			<div class="caption">
			<?php if ( isset( $term_meta['support_forum'] ) && '' != $term_meta['support_forum'] ) : ?>
				<p class="text-center"><a class="btn btn-secondary btn-block" href="<?php echo esc_url( $term_meta['support_forum'] ); ?>">
					<i class="fa-solid fa-life-ring"></i> <?php _e( 'Get Support', 'ipt_kb' ); ?>
				</a></p>
			<?php endif; ?>
			</div>
		</div>
		<div class="col-sm-8 col-md-9 col-lg-10">
			<h1 class="page-title">
				<span class="float-end badge bg-info rounded-pill"><?php printf( _n( '%d article', '%d articles', $pcat_totals, 'ipt_kb' ), $pcat_totals ); ?></span>
				<?php single_cat_title(); ?>
			</h1>
			<div class="kb-pcat-icon d-block d-sm-none">
				<?php if ( isset( $term_meta['image_url'] ) && '' != $term_meta['image_url'] ) : ?>
				<p class="text-center">
					<img class="img-thumbnail rounded-circle" src="<?php echo esc_attr( $term_meta['image_url'] ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" />
				</p>
				<?php endif; ?>
				<div class="caption">
				<?php if ( isset( $term_meta['support_forum'] ) && '' != $term_meta['support_forum'] ) : ?>
					<p class="text-center"><a class="btn btn-secondary btn-block" href="<?php echo esc_url( $term_meta['support_forum'] ); ?>">
						<i class="fa-solid fa-life-ring"></i> <?php _e( 'Get Support', 'ipt_kb' ); ?>
					</a></p>
				<?php endif; ?>
				</div>
			</div>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description alert alert-secondary small">%s</div>', $term_description );
				endif;
			?>
		</div>
		<div class="clearfix"></div>
	</header><!-- .page-header -->

	<div class="row kb-cat-parent-row">
		<?php /* Start the subcategory loop */ ?>
		<?php $cat_iterator = 0; foreach ( $sub_categories as $scat ) : ?>
		<?php $sterm_meta = get_option( 'ipt_kb_category_meta_' . $scat->term_id, array() ); ?>
		<?php $sterm_link = esc_url( get_category_link( $scat ) ); ?>
		<?php $scat_totals = ipt_kb_total_cat_post_count( $scat->term_id ); ?>
		<?php $scat_posts = new WP_Query( array(
			'cat' => $scat->term_id,
			'posts_per_page' => get_option( 'posts_per_page', 5 ),
		) ); ?>
		<div class="col-md-6 kb-subcat">
			<div class="row g-0">
				<div class="col-md-3 col-sm-2 d-none d-sm-block kb-subcat-icon">
					<p class="text-center">
						<a href="<?php echo $sterm_link; ?>" class="thumbnail text-decoration-none">
							<?php if ( isset( $sterm_meta['icon_class'] ) && '' != $sterm_meta['icon_class'] ) : ?>
							<i class="fa <?php echo esc_attr( $sterm_meta['icon_class'] ); ?>"></i>
							<?php else : ?>
							<i class="fa-solid fa-book"></i>
							<?php endif; ?>
						</a>
					</p>
				</div>
				<div class="col-md-9 col-sm-10 col-xs-12">
					<h2 class="knowledgebase-title"><a data-bs-placement="bottom" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo esc_attr( wpautop( $scat->description ) ); ?>" title="<?php echo esc_attr( sprintf( __( '%1$s / %2$s', 'ipt_kb' ), $cat->name, $scat->name ) ); ?>" href="#" class="btn btn-secondary btn-sm text-muted ipt-kb-popover"><i class="fa-solid fa-align-left"></i></a> <?php echo $scat->name; ?></h2>
					<div class="ipt-kb-popover-target d-none" id="kb-homepage-popover-<?php echo $scat->term_id; ?>">
						<?php echo wpautop( $scat->description ); ?>
						<p class="text-end">
							<?php if ( isset( $term_meta['support_forum'] ) && '' != $term_meta['support_forum'] ) : ?>
							<a class="btn btn-secondary" href="<?php echo esc_url( $term_meta['support_forum'] ); ?>">
								<i class="fa-solid fa-life-ring"></i> <?php _e( 'Get support', 'ipt_kb' ); ?>
							</a>
							<?php endif; ?>
							<a href="<?php echo $sterm_link; ?>" class="btn btn-info">
								<i class="fa-solid fa-link"></i> <?php _e( 'Browse all', 'ipt_kb' ); ?>
							</a>
						</p>
					</div>

					<div class="d-block d-sm-none kb-subcat-icon">
						<p class="text-center">
							<a href="<?php echo $sterm_link; ?>" class="thumbnail text-decoration-none">
								<?php if ( isset( $sterm_meta['icon_class'] ) && '' != $sterm_meta['icon_class'] ) : ?>
								<i class="fa <?php echo esc_attr( $sterm_meta['icon_class'] ); ?>"></i>
								<?php else : ?>
								<i class="fa-solid fa-book"></i>
								<?php endif; ?>
							</a>
						</p>
					</div>
					<ul class="list-unstyled kb-subcat-articles">
					<?php if ( $scat_posts->have_posts() ) : while ( $scat_posts->have_posts() ) : $scat_posts->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><i class="fa-regular fa-file-lines"></i> <?php the_title(); ?></a></li>
					<?php endwhile; wp_reset_postdata(); else : ?>
						<li><?php _e( 'No articles to show', 'ipt_kb' ); ?></li>
					<?php endif; ?>
					</ul>
					<p class="text-end"><a class="btn btn-outline-secondary btn-sm" href="<?php echo $sterm_link; ?>"><?php printf( __( 'View all %d <i class="fa-solid fa-arrow-right-long"></i>', 'ipt_kb' ), $scat_totals ); ?></a></p>
				</div>
			</div>
		</div>
		<?php $cat_iterator++; if ( $cat_iterator % 2 == 0 ) echo '<div class="clearfix d-none d-md-block"></div>'; ?>
		<?php endforeach; ?>
	</div><!-- .kb-cat-parent-row -->

