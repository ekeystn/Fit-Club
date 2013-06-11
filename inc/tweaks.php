<?php
/**
* Custom functions that act independently of the theme templates
*
* Eventually, some of the functionality here could be replace by core features
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

/**
* Get wp_nav_menu() fallbackm wp_page_menu(), to show a home link
*
* @since Fit Club Network 1.0
*/
function FCN_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'FCN_page_menu_args' );

/**
* Add custom classes to the array of body classes
*
* @since Fit Club Network 1.0
*/
function FCN_body_classes ( $classes ) {
	//adds a class of group-blog to blogs with more than 1 publishd author
	if( is_multi_author() ) {
		$classes[] = 'group_blog';
	}
	return $classes;
}
add_filter ( 'body_class', 'FCN_body_classes' );

/**
*Filter in a link to a content ID attribute for the next/previous image links on image attachment pages 
*
*@since Fit Club Network 1.0
*/
function FCN_enchanced_image_navigation ( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty ( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';
	return $url;
}
add_filter('attachment_link', 'FCN_enchanced_image_navigation', 10, 2 );



