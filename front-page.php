<?php 
/**
*
* Template Name: Front Page
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

get_header(); ?>

<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
				<!-- Slider -->
			<div class="row remove-bottom">
				<?php //slider_slider(); ?>
				<?php echo do_shortcode( '[slider_slider]' ); ?>
			</div><!-- End slider row -->
						<!-- Custom post text blocks -->
				<section class="row text-blocks">
					<div class="container">
					<ul class="block-grid mobile-one-up four-up">
					<?php
					/* 
					 * Create a new query object for post type 'custom_post' and loop
					 */
					$blocks = array( 'post_type' => 'home_block', 'posts_per_page' => 4 );
					$loop = new WP_Query( $blocks );
					while ($loop->have_posts() ) : $loop->the_post(); ?>
					<?php global $post;
					$FCN_heading = esc_attr( get_post_meta( $post->ID, '_cmb_FCN_heading', true ) ); 
					$FCN_textblock = wpautop( esc_attr( get_post_meta( $post->ID, '_cmb_FCN_wysiwyg', true ) ) );
					$FCN_link = esc_attr( get_post_meta( $post->ID, '_cmb_FCN_linktext', true ) );	
					$FCN_url = esc_url(get_post_meta( $post->ID, '_cmb_FCN_linkurl', true ) );
					$FCN_page = get_page_link( get_post_meta( $post->ID, '_cmb_FCN_pagelink', true ) );
									
					?>
					<li>
						<article class="block-content table">
						<h2 class="table-row">
						<span class="table-cell valign-middle">
						<a href="<?php echo esc_url($FCN_page); ?>">
							<?php echo $FCN_heading; ?></a></span></h2>
						<?php if (has_post_thumbnail() ) : ?>
						<figure>
							<?php the_post_thumbnail( 'frontpage-thumb' ); ?>
						</figure>
					<?php endif; ?>
							<?php echo $FCN_textblock; ?>
							<a class="block-link" href="<?php echo esc_url($FCN_page); ?>"><?php echo esc_attr($FCN_link); ?></a>
						</article> <!-- End block content -->
					</li><!-- End list item -->

				<?php endwhile; ?>
				</ul><!-- End block grid -->
			</div><!-- End Container -->
				</section><!-- End text blocks -->
</div> <!-- End content area -->
					</div> <!-- End primary area-->


<?php get_footer(); ?>
