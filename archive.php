<?php
/**
* The template for displaying archive pages
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<section id="primary" class="content-area archive container">
	<div id="content" class="site-content twelve columns" role="main">
			<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				if ( is_category() ) {
					printf( __( 'Category Archives: %s', 'FCN' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				} elseif ( is_author() ) {
			// Queue the first post so you know what author you're dealing with 
					the_post();
					printf( __( 'Author Archives: %s', 'FCN' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
			// since we called the_post above, you have to rewind the loop back to the beginning so that the loop can run proprely, in full
					rewind_posts();
				} elseif ( is_day() ) {
					printf( __( 'Daily Archives: %s', 'FCN' ), '<span>' . get_the_date() . '</span>' );
				} elseif ( is_month() ) {
					printf( __( 'Monthly Archives: %s', 'FCN' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
				} elseif ( is_year() ) {
					printf( __( 'Yearly Archives: %s', 'FCN' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
				} else {
					_e( 'Archives', 'FCN' );
				}
				?>
			</h1><!-- End page title -->
			<?php
			if ( is_category() ) {
	//show option category description
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
			} elseif ( is_tag() ) {
	//show option tag description
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
			}
			?>
		</header><!-- End header -->
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php
	/* Include the Post-Format-specific template for the content. If you want to overload it in a child theme
	* then include a file called content-___.php (where ___ is the Post Format name) that will be used instead
	*/
	get_template_part( 'content', get_post_format() );
	?>

<?php endwhile; ?>

<?php FCN_content_nav( 'nav-below' ); ?>

<?php else : ?>
	<?php get_template_part( 'no-results', 'archive' ); ?>

<?php endif; ?>

</div><!-- End main content -->
<div class="four columns">
<?php get_sidebar(); ?>
</div><!--End four columns -->
</section><!-- End primary section -->
<?php get_footer(); ?>