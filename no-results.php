<?php
/**
* The template part for displaying a message that no posts are found
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'FCN' ); ?></h1>
	</header><!-- End entry header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'FCN' ), admin_url( 'post-new.php' ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'FCN' ); ?></p>
	<?php get_search_form(); ?>

<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'FCN' ); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>
	</div><!-- End entry content -->
</article><!-- End article -->