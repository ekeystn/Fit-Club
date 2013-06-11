<?php
/**
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'FCN' ), the_title_attribute( 'echo=0' ) ) ) ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta">
		<?php FCN_posted_on(); ?>
	</div> <!-- End entry meta -->
<?php endif; ?>

	</header> <!-- End header -->

	<?php if ( is_search() ) : //only display exceprts for search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div> <!-- End entry summary -->
<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Read More', 'FCN' ) ); ?>
	<?php wp_link_pages(array ( 'before' => '<div class="page-links">' . __( 'Pages:', 'FCN' ), 'after' => '</div>' ) ); ?>
	</div> <!-- End entry content -->
<?php endif; ?>

<footer class="entry-meta">
<?php if ( 'post' == get_post_type() ) : //Hide category and tag text for page on search ?>
<?php
	/* translators: used between list items, the is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'FCN' ) );
	if( $categories_list && FCN_categorized_blog() ) :
		?>
	<span class="cat-links">
		<?php printf( __( 'Posted in %1$s', 'FCN' ), $categories_list ); ?>
	</span>
	<?php endif; //End if categories ?>
<?php // endif; //End if $tags_list ?>
<?php endif; // End if 'post' = get_post_type() ?>

<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'FCN'), __( '1 Comment', 'FCN'), __( '% Comments', 'FCN' ) ); ?></span>
<?php endif; ?>

<?php edit_post_link( __( 'Edit', 'FCN'), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>

</footer> <!-- End entry meta footer -->
</article> <!-- End post <?php the_ID(); ?> -->