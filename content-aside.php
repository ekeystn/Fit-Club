<?php
/**
* The template for displaying posts in the aside post format
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'FCN' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
	</header> <!-- End entry header -->

	<?php if (is_search() ) : //only display excerpts for searches ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div> <!-- End entry summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __('Continue reading <span class="meta-nav">&rarr;</span>', 'FCN' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'FCN'), 'after' => '</div>' ) ); ?>
	</div> <!-- End entry content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'FCN' ), the_title_attribute( 'echo=0' )) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
		<?php if ( ! post_password_required() && (comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'FCN' ), __( '1 Comment', 'FCN' ), __( '% Comments', 'FCN' ) ); ?></span>
	<?php endif; ?>

	<?php edit_post_link( __( 'Edit', 'FCN'), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>

	</footer> <!-- End entry meta footer -->
</article> <!-- End post-<?php the_ID(); ?> -->