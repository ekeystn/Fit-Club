<?php
/**
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php FCN_posted_on(); ?>
		</div><!-- End entry meta -->
	</header> <!-- End entry header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'FCN' ), 'after' => '</div>' ) ); ?>
	</div><!-- End entry content -->

<footer class="entry-meta">
	<?php
	/* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', 'FCN' ) );

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', ', ' );

	if( ! FCN_categorized_blog() ) {
		// this blog only has 1 category so we just need to worry about tags in the meta text
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>', 'FCN' );
		} else {
			$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'FCN' );
		}
	} else {
		// but if blog has lots of categories, display them here
		if( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'FCN' );
		} else {
			$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'FCN' );
		}
	} //end check for categories in this blog

	printf(
		$meta_text,
		$category_list,
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0')
		);
		?>

		<?php edit_post_link( __( 'Edit', 'FCN' ), '<span class="edit-link">', '</span>' ); ?>

</footer><!-- End footer -->

</article> <!-- End article -->