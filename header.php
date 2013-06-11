<?php 
/**
* Theme Header
*
* Displays all of the <head> section and everything up to the main div
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?><!DOCTYPE html>
<!-- [if IE 8]>
	<html id="ie8" <?php language_attributes(); ?>>
	<![endif] -->
<!--[if ! (IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<! [endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php
	//print the title based on what is being viewed
	global $page, $paged;

	wp_title( '|', true, 'right' );

	//add the blog name
	bloginfo( 'name' );

	//ad the blog description for the home page
	$site_description = get_bloginfo( 'description', 'display' );
	if( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	//add a page number if necessary
	if( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'FCN' ), max( $paged, $page ) );
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- [if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<! [endif] -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site wrap">
	<header id="masthead" class="site-header" role="banner">
		<?php //if ( is_user_logged_in() ) { ?>
		<!--<div id="login-welcome" class="login-welcome">
			<p><span class="mobile-break">Welcome!</span> <span class="mobile-break">You're Logged In</span> </p>
		</div> -->
		<?php //} ?>
		<div class="container">
			<?php 
			if ( has_nav_menu( 'primary' ) ) { ?>
				<div class="six columns"> 
			<?php } else { ?>
				<div class="sixteen columns text-center" id="site-logos">
			<?php }?>
			
				<?php 
				$header_logo_image = get_theme_mod( 'FCN_header_logo' );
				if ( ! empty( $header_logo_image ) ) { ?>
				<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img id="image-logo" src="<?php echo $header_logo_image; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
			<?php } ?>
			 	<h1 class="site-title text-logo remove-bottom" id="text-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
				<h2 id="tagline" class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></h2>
	</div><!-- End six or sixteen columns -->
		<?php if ( has_nav_menu( 'primary' ) ) { ?>
		<div class="ten columns">
			<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text remove-bottom"><?php _e('Menu', 'FCN'); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', '_s' ); ?>"><?php _e( 'Skip to content', 'FCN' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?> 
		</nav> <!-- End navigation -->
	</div><!-- End ten columns -->
		<?php } ?>
	</div><!-- End container -->
	</header> <!-- End header -->
	<div id="main" class="site-main sticky-footer-row expand">