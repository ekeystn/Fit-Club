<?php
/**
* Template Name: Quick Start Training
*
* Template for 7 Day Quick Start Training section
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area page-default container">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

	<?php endwhile; //end of loop ?>
	<?php 
	if ( has_nav_menu( 'training' ) && is_user_logged_in() ) {
		wp_nav_menu( array( 
			'theme_location' => 'training',
			'menu_class' => 'child-page-list',

			) );
	}
	 ?>
	</div><!-- End main content area -->
</div><!-- End primary content area -->
<?php get_footer(); ?>