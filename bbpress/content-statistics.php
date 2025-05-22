<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Get the statistics
$stats = bbp_get_statistics(); ?>

<ul class="list-group">
	<?php do_action( 'bbp_before_statistics' ); ?>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><?php _e( 'Registered Users', 'bbpress' ); ?></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['user_count'] ); ?></span></li>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><?php _e( 'Forums', 'bbpress' ); ?></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['forum_count'] ); ?></span></li>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><?php _e( 'Topics', 'bbpress' ); ?></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['topic_count'] ); ?></span></li>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><?php _e( 'Replies', 'bbpress' ); ?></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['reply_count'] ); ?></span></li>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><?php _e( 'Topic Tags', 'bbpress' ); ?></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['topic_tag_count'] ); ?></span></li>
	<?php if ( !empty( $stats['empty_topic_tag_count'] ) ) : ?>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><?php _e( 'Empty Topic Tags', 'bbpress' ); ?></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></span></li>
	<?php endif; ?>
	<?php if ( !empty( $stats['topic_count_hidden'] ) ) : ?>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><abbr title="<?php echo esc_attr( $stats['hidden_topic_title'] ); ?>"><?php _e( 'Hidden Topics', 'bbpress' ); ?></abbr></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['topic_count_hidden'] ); ?></span></li>
	<?php endif; ?>
	<?php if ( !empty( $stats['reply_count_hidden'] ) ) : ?>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span><abbr title="<?php echo esc_attr( $stats['hidden_reply_title'] ); ?>"><?php _e( 'Hidden Replies', 'bbpress' ); ?></abbr></span><span class="badge bg-primary rounded-pill"><?php echo esc_html( $stats['reply_count_hidden'] ); ?></span></li>
	<?php endif; ?>
	<?php do_action( 'bbp_after_statistics' ); ?>
</ul>

<?php unset( $stats );
