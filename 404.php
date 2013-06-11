<?php
/**
* The template for displaying 404 pages
* 
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area container">
	<div id="content" class="site-content twelve columns" role="main">
		<article id="post-0" class="post error404 not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.' , 'FCN' ); ?></h1>
			</header><!-- End header -->

			<div class="entry-content not-found">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'FCN' ); ?></p>

<section>
				<?php get_search_form(); ?>

</section>
			</div><!-- End entry content -->
		</article><!-- End article -->

	</div> <!-- End content area -->
	<div class="four columns">
		<?php get_sidebar(); ?>
	</div><!-- End four columns -->
</div> <!-- End primary content area -->

<?php get_footer(); ?>