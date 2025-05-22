<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package iPanelThemes Knowledgebase
 */
global $ipt_theme_op_settings;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<?php echo $ipt_theme_op_settings['integration']['header']; ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-expand-lg navbar-light bg-light main-navigation" role="navigation" id="site_navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>">
					<?php if ( get_header_image() ) : ?>
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					<?php else : ?>
					<?php bloginfo( 'name' ); ?>
					<?php endif; // End header image check. ?>
				</a>
				
				<!-- Add navbar toggler -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBBPress" aria-controls="navbarBBPress" aria-expanded="false" aria-label="<?php _e( 'Toggle navigation', 'ipt_mst' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbarBBPress">
					<?php
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 4,
						'container'         => '',
						'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0',
						'fallback_cb'       => 'IPT_Bootstrap_Walker_Nav_Menu::fallback',
						'walker'            => new IPT_Bootstrap_Walker_Nav_Menu())
					);
					?>

				<!-- Dynamic Login Buttons -->
				<?php ipt_kb_navbar_login(); ?>
				<!-- /.navbar-dynamic -->

				<!-- Search bar -->
				<?php ipt_kb_navbar_search(); ?>
				<!-- /.navbar-form -->
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">

	<?php bbp_breadcrumb( array(
		// HTML
		'before'          => '<ol id="breadcrumbs" class="breadcrumb">',
		'after'           => '</ol>',

		// Separator
		'sep'             => ' ',
		'pad_sep'         => 0,
		'sep_before'      => '',
		'sep_after'       => '',

		// Crumbs
		'crumb_before'    => '<li>',
		'crumb_after'     => '</li>',

		// Current
		'current_before'  => '<span class="text-muted">',
		'current_after'   => '</span>',
	) ); ?>
