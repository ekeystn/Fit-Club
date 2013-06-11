<?php
/**
* The template for displaying image attachments.
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header();
?>

<div id="primary" class="content-area image-attachment container">
	<div id="content" class="site-content twelve columns" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-meta">
					<?php
                                $metadata = wp_get_attachment_metadata();
                                printf( __( 'Published <span class="entry-date"><time class="entry-date" datetime="%1$s" pubdate>%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%7$s</a>', 'FCN' ),
                                    esc_attr( get_the_date( 'c' ) ),
                                    esc_html( get_the_date() ),
                                    wp_get_attachment_url(),
                                    $metadata['width'],
                                    $metadata['height'],
                                    get_permalink( $post->post_parent ),
                                    get_the_title( $post->post_parent )
                                );
                            ?>
                            <?php edit_post_link( __( 'Edit', 'FCN' ), '<span class="sep"> | </span> <span class="edit-link">', '</span>'); ?>
				</div><!-- End entry meta -->

				<nav id="image-navigation" class="site-navigation">
					<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'FCN' ) ); ?></span>
					<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'FCN' ) ); ?></span>
				</nav><!-- End image navigation -->
			</header><!-- End entry header -->

			<div class="entry-content">

				<div class="entry-attachment">
					<div class="attachment">
						<?php 
						/**
						* Grab the IDs of all the image attachments in a gallery so you can get the URL of the next adjacent image in the gallery,
						* or the first image (if you're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
						*/
						$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post-type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
						foreach ( $attachments as $k => $attachment ) {
							if ( $attachment->ID == $post->ID )
								break;
						}
						$k++;
						// if there is more than 1 attachment in a gallery
						if (count( $attachments ) > 1 ) {
							if( isset( $attachments[ $k ] ) )
								//get the URL of the next image attachment
								$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
							else
								//or get the URL of the first image attachment
								$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
						} else {
							//or, if there's only 1 image, get the URL of the image 
							$next_attachment_url = wp_get_attachment_url();
						}
						?>
						<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
						$attachment_size = apply_filters( 'FCN_attachment_size', array( 1200, 1200 ) ); //Filterable image size
						echo wp_get_attachment_image( $post->IDm, $attachment_size);
						?></a>
					</div><!-- End attachment -->

					<?php if( ! empty( $post->post_excerpt ) ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div><!-- End entry caption -->
				<?php endif; ?>
				</div><!-- End entry attachment -->

				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div clas="page-links">' . __( 'Pages:', 'FCN'), 'after' => '</div>' ) ); ?>
			</div><!-- End entry content -->

<footer class="entry-meta">
	<?php if ( comments_open() && pings_open() ) : //Comments and trackbacks open ?>
		<?php printf( __( '<a class="comment-link" href="#respond" title="Post a Comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'FCN' ), get_trackback_url() ); ?>
	<?php elseif ( ! comments_open() && pings_open() ) : // only trackbacks open ?>
		<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'FCN' ), get_trackback_url() ); ?>
	<?php elseif ( comments_open() && ! pings_open() ) : // only comments are open ?>
		<?php _e( 'Trackbacks are closed, but you can <a class="commnets-link" href="#respond" title="Post a comment">post a comment</a>.', 'FCN' ); ?>
	<?php elseif (! comments_open() && ! pings_open() ) : // comments and trackbacks closed ?>
		<?php _e( 'Both comments and trackbacks are currently closed.', 'FCN' ); ?>
	<?php endif; ?>
	<?php edit_post_link( __( 'Edit', 'FCN' ), '<span class="edit-link">', '</span>' ); ?>	
</footer><!-- End entry meta footer -->
</article> <!-- End article -->

<?php comments_template(); ?>

<?php endwhile; //end of the loop ?>

	</div><!-- End main content -->
	<div class="four columns">
		<?php get_sidebar(); ?>
	</div><!-- End four columns -->
</div><!-- End primary image attachment -->
<?php
get_footer(); ?>