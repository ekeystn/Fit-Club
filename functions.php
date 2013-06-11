<?php
/**
* Fit Club Network functions and definitions
*
*@package Fit Club Network
*@since Fit Club Network 1.0
*/

//max width of content
if ( ! isset( $content_width ) )
	$content_width = 654; /* pixels */

//numbered page navigation
function FCN_page_navigation() {
	global $wp_query;
	$paged = get_query_var( 'paged' );
	$big = 999999999; //unlikely integer

	$pagination = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'mid_size' => 4,
		'end_size' => 2,
		'prev_next' => true,
		'prev_text' => '...',
		'next_text' => 'Next',
		'type' => 'list',
		'total' => $wp_query->max_num_pages,
		));

	if (FCN_show_page_nav()) { ?>
		<nav class="pagination-pages"> <?php
		echo $pagination;
		?>
		</nav>
		<?php
	}
}

//Check if more than one page to display numbered navigation
function FCN_show_page_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/*
* Custom Metaboxes and Fields for WordPress
* Version**: 0.9.2
* Requires at least**: 3.3
* Tested up to**: 3.5
* License**: GPLv2
* @package  Metaboxes
* @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
* @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
*/
add_filter( 'cmb_render_imag_select_page', 'imag_render_imag_select_page', 10, 2 );
function imag_render_imag_select_page( $page, $meta ) {
	wp_dropdown_pages( array(
		'show_option_none' => '&#8212; Select &#8212;',
		'hierarchial' => 1,
		'orderby' => 'ASC',
		'post_type' => 'page',
		'name' => $page['id'],
		'post_status' => 'publish',
		'selected' => $meta,
		) );
}

function FCN_custom_metaboxes ( $meta_boxes ) {
	$prefix = '_cmb_'; //prefix for all fields
	$meta_boxes[] = array(
		'id' => 'text_block',
		'title' => 'Text Block',
		'pages' => array( 'home_block' ), //post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, //show field names on the left
		'fields' => array(
			array(
				'name' => 'Text block heading',
				'id' => $prefix . 'FCN_heading',
				'type' => 'text_small',
				),
			array(
				'name' => 'Text block text',
				'id' => $prefix . 'FCN_wysiwyg',
				'type' => 'wysiwyg',
				'options' => array(
					'wpautop' => true,
					'media_button' => false,
					),
				),
		array(
			'name' => 'Link Text',
			'id' => $prefix . 'FCN_linktext',
			'type' => 'text_small',
			),
		array(
			'name' => 'Linked Page',
			'id' => $prefix . 'FCN_pagelink',
			'type' => 'imag_select_page',

			),
			),
		);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'FCN_custom_metaboxes' );

// initialize metabox class
add_action( 'init', 'FCN_initialize_cmb_metaboxes', 9999 );
function FCN_initialize_cmb_metaboxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'lib/custom-metaboxes/init.php' );
	}
}

include('inc/FCN.themecustomizer.class.php');
include('inc/FCN.settings.class.php');
include('inc/FCN.posttypes.class.php');
include('inc/FCN.shortcodes.class.php');
include('inc/FCN.layouts.class.php');







