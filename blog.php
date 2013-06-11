<?php 
/**
*
* Template Name: Blog
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area index container">
		<div id="content" class="site-content" role="main">

	<?php
	$temp = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query($args);
	$wp_query->query('posts_per_page=4');
	while ($wp_query->have_posts()) : $wp_query->the_post();
	?>
	<?php
	/**
	* Include the post-format-specific template for the content.
	* If you want to overload t his in a child theme, then include a file
	* called content-_php (where _ is the post format name) that will be used instead.
	*/
get_template_part( 'content', get_post_format() );
?>
<?php endwhile; ?>

<?php FCN_page_navigation() ?>

<?php //$wp_query = null; $wp_query = $temp; 
	wp_reset_postdata();
?>
			</div> <!-- End site content area -->
		</div> <!-- End primary content area -->

<?php get_footer(); ?>