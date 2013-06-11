<?php
/**
* Template Name: Email Registration
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area page-default container">
		<div id="content" class="site-content sixteen columns" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

	<?php endwhile; //end of loop ?>
	<?php
		if ( !is_user_logged_in() ) {
			get_template_part( 'content', 'emailform' );
		}
	?>
	</div><!-- End main content area -->
</div><!-- End primary content area -->
<?php get_footer(); ?>