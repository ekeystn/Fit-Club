<?php 
/**
*
* Template Name: Page with Widget Sidebar
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area twotemplate container">
		<div id="content" class="site-content twelve columns" role="main">
<!-- 
	Fill in the loop with the code inside content.php by default. But first check the 
	post format for this post - then search the theme files for a post-format-specific 
	template (i.e. content-aside.php or content-quote.php). If you find one, load that 
	template for this post instead. Otherwhise load content.php.
-->

<?php if ( have_posts() ) : ?>
	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

	<?php
	/**
	* Include the post-format-specific template for the content.
	* If you want to overload t his in a child theme, then include a file
	* called content-_php (where _ is the post format name) that will be used instead.
	*/
get_template_part( 'content', get_post_format() );
?>
<?php endwhile; ?>
<?php FCN_content_nav( 'nav-below' ); ?>
<?php else : ?>
	<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>
			</div> <!-- End content area -->
				<div class="four columns">
	<?php get_sidebar(); ?>
</div><!-- End four columns -->
		</div> <!-- End primary area-->


<?php get_footer(); ?>