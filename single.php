<?php
/**
* The template for displaying all single posts
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area single container">
	<div id="content" class="site-content twelve columns" role="main">

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', 'single' ); ?>

	<?php
		// if comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() )
		comments_template( '', true );
	?>
<?php endwhile //end of the loop ?>

	</div><!-- End content -->
	<div class="four columns">
		<?php get_sidebar(); ?>
	</div><!-- End four columns -->
</div><!-- End primary ccontent area -->

<?php get_footer(); ?>