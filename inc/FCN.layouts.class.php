<?php
/**
* Custom page layouts
*
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

class FCN_layouts {
	function __construct() {
		add_filter( 'default_content', array($this, 'two_column_editor_content'));
		add_editor_style( 'editor-styles.css');
	}

	function two_column_editor_content( $content ) {
		global $current_screen;
		if ( $current_screen->post_type == 'page') {
			$content = '
				<div class="container">
				<div class="nine columns">

				Main content

				&nbsp;

				</div>

				<aside class="six columns offset-by-one">
				<div class="page-side-bar">
				Right Side Bar

				&nbsp;
				</div>
				</aside>
				</div>
			';
			return $content;
		}

	}

}

$FCN_layouts = new FCN_layouts();