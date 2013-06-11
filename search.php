<?php
/**
* The template for displaying Search Results pages
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<section id="primary" class="content-area search container">
	<div id="content" class="site-content twelve columns" role="main">
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'FCN' ), '<span>' . get_search_query() . '</span>'); ?></h1>
		</header><!-- End header -->
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'search' ); ?>

	<?php endwhile; ?>

<?php FCN_content_nav( 'nav-below' ); ?>

<?php else : ?>
	<?php get_template_part( 'no-results', 'search' ); ?>

<?php endif; ?>

	</div><!-- End content -->
</section><!-- End primary section -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>