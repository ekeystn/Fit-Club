<?php
/**
* Custom Post Types
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

class FCN_post_types {
	function __construct() {
		add_action( 'init', array( $this, 'aweber_post' ) );
		add_action( 'init', array( $this, 'textblocks' ) );
	}

	//Aweber Email Registration Form
	function aweber_post() {
		register_post_type('FCN_aweber',
			array(
				'labels' => array(
					'name' => __('AWeber Form', 'FCN' ),
					'singular_name' => 'AWeber Form',
					'add_new' => 'Add New',
					'add_new_items' => 'Add New Form',
					'edit' => 'Edit',
					'edit_item' => 'Edit Form',
					'new_item' => 'New Form',
					'view' => 'View',
					'view_item' => 'View Form',
					'search_items' => 'Search AWeber Forms',
    				'not_found' => 'No Forms Found',
    				'not_found_in_trash' => 'No Forms Found in Trash'
				),
				'public' => true,
				'menu_position' => 14,
				'supports' => array( 'title', 'editor' ),
				'taxonomies' => array( '' ),
				'menu_icon' => get_template_directory_uri() . '/images/form-icon.png' ,
				'has_archive' => true,
				'rewrite' => array( 'slug' => 'form' ),
				)
			);
	}
	//front page text blocks
	function textblocks() {
		register_post_type( 'home_block',
		array(
			'labels' => array(
				'name' => 'Home Text Blocks',
				'singular_name' => 'Text Block',
				'add_new' => 'Add New',
				'add_new_itmes' => 'Add New Text Block',
				'edit' => 'Edit',
				'edit_item' => 'Edit Text Block',
				'new_item' => 'New Text Block',
				'view' => 'View',
				'view_item' => 'View Text Block',
				'search_items' => 'Search Text Blocks',
				'not_found' => 'No Text Blocks Found',
				'not_found_in_trash' => 'Not Text Blocks Found In Trash'
				),
			'public' => true,
			'menu_position' => 13,
			'supports' => array( 'title', 'thumbnail' ),
			'menu_icon' => get_template_directory_uri() . '/images/new-post.png',
			'has_archive' => true
			)
		);
	}
}

$FCN_post_types = new FCN_post_types();