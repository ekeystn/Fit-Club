<?php
/**
* Template Name: Single Column
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area single-column container">
		<div id="content" class="site-content sixteen columns" role="main">

		<?php while ( have_posts() ) : the_post(); ?>


		<?php get_template_part( 'content', 'page' ); ?>

		<?php comments_template( '', true ); ?>
		

	<?php endwhile; //end of loop ?>
	</div><!-- End main content area -->
</div><!-- End primary content area -->
<?php get_footer(); ?>