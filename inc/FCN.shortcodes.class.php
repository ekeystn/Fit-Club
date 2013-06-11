<?php
/**
* Shortcodes
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

class FCN_shortcodes {
	function __construct() {
		add_shortcode('login_link', array( $this, 'login_links_sc' ) );
		add_shortcode('register_link', array( $this, 'registration_link_sc' ) );
		add_shortcode('youtube_embed', array($this, 'FCN_youtube_shortcode') );
		add_shortcode('link_button', array($this, 'link_button_sc') );
		add_shortcode('display_posts', array($this, 'display_posts_sc') );

		add_filter('mce_external_plugins', array($this, 'add_youtube_button'));
		add_filter('mce_buttons', array($this, 'register_youtube_button'));
		add_filter('mce_external_plugins', array($this, 'add_link_button') );
		add_filter('mce_buttons', array($this, 'register_link_button') );
		add_filter('mce_external_plugins', array($this, 'add_display_posts'));
		add_filter('mce_buttons', array($this, 'register_display_posts'));

	}

	//Login links to display for unregistered users or users who are not logged in
	//Used in the permissions message displayed via the Members plugin
	function login_links_sc( $atts, $content = null ) {
		extract(shortcode_atts(array(
		"login_url" => site_url('/wp-login.php'),
		"link_text" => 'login',
		), $atts ));
		return '<a href="' . esc_url($login_url) . '" title="Login" class="login-links">' . esc_attr($link_text) . '</a>';
	}
	function registration_link_sc ($atts, $content = null ) {
		extract(shortcode_atts(array(
			"registration_url" => site_url('/registration'),
			"registration_text" => 'register',
			), $atts ));
		return '<a href="' . esc_url($registration_url) . '" title="Registration" class="login-links">' . esc_attr($registration_text) . '</a>';
	}

	//display posts for aweber form.
	//adjusted plugin from:
	/**
	* Plugin Name: Display Posts Shortcode
 	* Plugin URI: http://www.billerickson.net/shortcode-to-display-posts/
 	* Description: Display a listing of posts using the [display-posts] shortcode
 	* Version: 2.3
 	* Author: Bill Erickson
 	* Author URI: http://www.billerickson.net
 	* @package Display Posts
 	* @version 2.2
 	* @author Bill Erickson <bill@billerickson.net>
 	* @copyright Copyright (c) 2011, Bill Erickson
 	* @link http://www.billerickson.net/shortcode-to-display-posts/
 	* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
	*/
function display_posts_sc($atts){
	$original_atts  = $atts;
	$atts = shortcode_atts( array(
		'include_content' => true,
		'orderby' => 'date',
		'post_type' => 'FCN_aweber',
		), $atts);

$include_content = (bool)$atts['include_content'];
$orderby = sanitize_key( $atts['orderby']);
$post_type = sanitize_text_field( $atts['post_type']);

//query
$args = array(
	'orderby' => $orderby,
	'post_type' => explode(',', $post_type ),
	'posts_per_page' => 1,
	'post_status' => 'publish'
	);


$listing = new WP_Query( apply_filters('display_posts_sc_args', $args, $original_atts ) );
if( ! $listing->have_posts() )
	return;

$inner = '';
while( $listing->have_posts() ) : $listing->the_post(); global $post;
$content = '';
if ($include_content)
	$content = apply_filters( 'the_content', get_the_content() );
$class = array('listing-item');
$class = apply_filters('display_posts_sc_args_post_class', $class, $post, $listing);
$output = '<fieldset id="aweber-form" class="' . implode(' ', $class ) .'">' .$content. '<legend>Register</legend>';
$inner .= apply_filters('display_posts_sc_output', $output, $original_atts, $content, $class);
endwhile; wp_reset_postdata();
$return = $inner;
return $return;
}
function add_display_posts($plugin_array) {
	$plugin_array['display_posts_sc'] = get_template_directory_uri() . '/inc/js/displayposts-plugin.js';
	return $plugin_array;
}
function register_display_posts($button) {
	array_push($button, 'display_posts');
	return $button;
}
	//<a> tag styled as button
	function link_button_sc( $atts, $content = null) {
		extract(shortcode_atts(array(
			'link_url' => '',
			'button_text' => 'Your Text',
			), $atts ));
		return '<a class="link-button" href="' . esc_url($link_url) . '" title="' . esc_attr($button_text) . '">' . esc_attr($button_text) . '</a>';
	}

function add_link_button($plugin_array) {
	$plugin_array['link_button_sc'] = get_template_directory_uri() . '/inc/js/linkbutton-plugin.js';
	return $plugin_array;
}
function register_link_button($button) {
	array_push($button, 'link_button');
	return $button;
}
	//Youtube iframe Embed Shortcode
function FCN_youtube_shortcode($atts, $content = null) {
	$li = '<li><div class="flex-video widescreen center-margin"><div class="flex-video widescreen center-margin"><iframe class="youtube-iframe-embed"';
	$endli = ' frameborder="0" allowfullscreen></iframe></div></li>';
	extract(shortcode_atts(array(
			"width" => '640',
			"height" => '360',
			"video1" => '',
			"video2" => '',
			"video3" => '',
			"video4" => '',
		), $atts));
	$single_up	= '<div class="flex-video widescreen center-margin"><iframe class="youtube-iframe-embed" width="'.esc_attr($width).'" height="'.esc_attr($height).'" src="http://www.youtube.com/embed/'.esc_attr($video1).'" frameborder="0" allowfullscreen></iframe></div>';
	$one_up		= $li.'width="'.esc_attr($width).'" height="'.esc_attr($height).'" src="http://www.youtube.com/embed/'.esc_attr($video1).'"'.$endli;
	$two_up		= $li.'width="'.esc_attr($width).'" height="'.esc_attr($height).'" src="http://www.youtube.com/embed/'.esc_attr($video2).'"'.$endli;
	$three_up	= $li.'width="'.esc_attr($width).'" height="'.esc_attr($height).'" src="http://www.youtube.com/embed/'.esc_attr($video3).'"'.$endli;
	$four_up	= $li.'width="'.esc_attr($width).'" height="'.esc_attr($height).'" src="http://www.youtube.com/embed/'.esc_attr($video4).'"'.$endli;
	$videolist = '';

	if ($video1 != '' &&  $video2 == '' && $video3 == '' && $video4 == '') { 
		$videolist.= $single_up; 
	} else {
		$videolist.= $one_up;
	}
	if ($video2 != '') { $videolist .= $two_up;}
	if ($video3 != '') { $videolist .= $three_up;}
	if ($video4 != '') { $videolist .= $four_up;}

	return '<ul class="block-grid four-up mobile-two-up add-bottom">'.$videolist.'</ul>';
}

function add_youtube_button( $plugin_array ) {
	$plugin_array['youtube_iframe_embed_sc'] = get_template_directory_uri() . '/inc/js/youtube-iframe-plugin.js';
	return $plugin_array;
}
function register_youtube_button($button) {
	array_push($button, 'youtube_embed');
	return $button;
}
}

$FCN_shortcodes = new FCN_shortcodes();