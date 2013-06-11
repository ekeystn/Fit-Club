<?php
/**
* The sidebar containing the main widget areas
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

	<aside id="search" class="widget widget_search">
		<h1 class="widget-title"><?php _e( 'Search', 'FCN' ); ?></h1>
		<?php get_search_form(); ?>
	</aside>
	<aside id="archives" class="widget">
		<h1 class="widget-title"><?php _e( 'Archives', 'FCN' ); ?></h1>
		<ul class="custom-list sidebar">
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</aside>
<?php endif; // end sidebar widget area ?>
</div> <!-- End secondary widget area -->
		<div id="tertiary" class="widget-area" role="suplementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div> <!-- End tertiary widget area -->