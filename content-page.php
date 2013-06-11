<?php
/**
* The template for displaying page content in page.php
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>
	<header class="entry-header">
		
				<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- End entry header -->
	<div class="entry-content">
		

		<?php the_content(); ?>		
		<?php edit_post_link( __( 'Edit', 'FCN' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- End entry content -->
</article><!-- End article -->