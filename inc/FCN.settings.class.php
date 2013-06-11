<?php
/**
* Settings
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

class FCN_settings {
	function __construct() {
		//add_filter( 'excerpt_length', array( $this, 'excerpts_length', 999 ) );
		//add_filter( 'excerpt_more', array( $this, 'excerpts_more' ) );
		add_filter( 'gettext', array( $this, 'remove_password_text' ) );

		add_action( 'login_enqueue_scripts', array( $this, 'logo_login' ) );
		add_action( 'after_setup_theme', array( $this, 'FCN_setup' ) );
		add_action( 'widgets_init', array( $this, 'widgets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	// limit excerpt length
	function excerpts_length( $length ) {
		return 20;
	}

	// truncated exceprt link text
	function excerpts_more( $more ) {
		return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">Read More</a>';
	}

	//remove option for subscribers/uers to reset password from login page
	function remove_password_text( $text ) {
		if ( $text == 'Lost your password?' ) {
			$text = '';
		}
		return $text;
	}

	//use custom logo on login page
	function logo_login() {
		$login_logo = get_theme_mod('FCN_login_image');
		?>
		<style type="text/css">
			body.login div#login h1 a {
			background-image: url('<?php echo $login_logo; ?>');
			}
		</style>
		<?php		
	}

	//register widgetized area and update sidebar with default widgets
	function widgets() {
		register_sidebar( array(
			'name' => __( 'Primary Widget Area', 'FCN' ),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		) );

		register_sidebar( array( 
			'name' => __( 'Secondary Widget Area', 'FCN' ),
			'id' => 'sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget_title">',
			'after_widget' => '</h1>',
		) );
	}

	//load main scripts and styles
	function scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		}

		if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202');
		}
	}


	//setsup theme and registers support for various wordpress features
	//hooks into the after_setup_theme hook
		function FCN_setup() {
			if( ! function_exists( 'FCN_setup' ) ) :
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'FCN', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for the Aside Post Format
	 */
	add_theme_support( 'post-formats', array( 'aside' ) );

	/**
	* Enable support for post thumnails
	*/
	add_theme_support( 'post-thumbnails' );

	/** 
	* Add new thumbnail size for text-block images
	*/
	add_image_size( 'frontpage-thumb', 190, 9999 );

	

	/**
	 * This theme uses wp_nav_menu() in two locations
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'FCN' ),
		'training' => __( 'Training Day Menu', 'FCN' ),
	) );
	endif;

}

}

$FCN_settings = new FCN_settings();