<?php
/**
* Theme Customizer Settings
* @package Fit Club Network
* @since Fit Club Network 1.0
*/

class FCN_customize {
	function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );
		add_action( 'wp_head', array( $this, 'header_output' ) );
		add_action( 'wp_footer', array( $this, 'analytics_script' ) );
		add_action( 'customize_preview_init', array( $this, 'live_preview' ) );
	}

	public static function register ($wp_customize) {
		//colors
		$colors = array();
		$colors[] = array(
		'slug' => 'article_header_color',
		'default' => '#2D7294',
		'label' => __( 'Article Heading Text Color', 'FCN' )
			);
		$colors[] = array(
		'slug' => 'content_text_color',
		'default' => '#666',
		'label' => __( 'Content Text Color', 'FCN' )
		);
		$colors[] = array(
		'slug' => 'content_link_color',
		'default' => '#32789C',
		'label' => __( 'Content Link Color', 'FCN' )
		);
		$colors[] = array(
		'slug' => 'logo_text_color',
		'default' => '#fff',
		'label' => __( 'Logo Text Color', 'FCN' )
		);
		$colors[] = array(
		'slug' => 'tagline_text_color',
		'default' => '#265A75',
		'label' => __( 'Tagline Text Color', 'FCN' )
		);
		$colors[] = array(
		'slug' => 'header_footer_background_color',
		'default' => '#4BABD3',
		'label' => __('Header and Footer Background Color', 'FCN')
		);
		$colors[] = array(
		'slug' => 'header_footer_border_color',
		'default' => '#32789C',
		'label' => __('Header and Footer Border Color', 'FCN' )
		);
		$colors[] = array(
		'slug' => 'header_footer_link_color',
		'default' => '#fff',
		'label' => __('Header and Footer Link Color', 'FCN' )
		);
		$colors[] = array(
		'slug' => 'menu_active_background_color',
		'default' => '#265A75',
		'label' => __('Menu Active Link Background Color', 'FCN')
		);
		$colors[] = array(
			'slug' => 'side_bar_heading_color',
			'default' => '#1D475C',
			'label' => __('Sidebar Heading Color', 'FCN')
			);
		foreach( $colors as $color ) {
		//settings
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
				)
			);
		//controls
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'],
				array(
					'label' => $color['label'],
					'section' => 'colors',
					'settings' => $color['slug']
					)
				)
			);
		}

		//add content section
		$wp_customize->add_section( 'FCN_content', array(
			'title' => __( 'Content', 'FCN'),
		) );

		//Pivacy policy link
		$wp_customize->add_setting( 'FCN_privacy_link', array( 
			'default' => null, 
			'sanitize_callback' => 'FCN_sanitize_text',
		) );
		$wp_customize->add_control( 'FCN_privacy_link', array(
			'label' => __('Privacy Policy Page Link', 'FCN'),
			'section' => 'FCN_content',
			'settings' => 'FCN_privacy_link',
		) );

		//Custom logo 
		$wp_customize->add_setting( 'FCN_header_logo', array(
			'default' => '',
			));
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'FCN_header_logo',
				array(
					'label' => __('Header Logo Image', 'FCN'),
					'section' => 'title_tagline',
					'settings' => 'FCN_header_logo',
					)
				)
			);
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		//Hide title and tag_line
		$wp_customize->add_setting('FCN_hide_header_text', array(
			'type' => 'option',
			'sanitize_callback' => 'FCN_header_checkbox',
			));
		$wp_customize->add_control( 'FCN_hide_header_text', array(
			'label' => __('Hide header and tagline text', 'FCN'),
			'type' => 'checkbox',
			'section' => 'title_tagline',
			'settings' => 'FCN_hide_header_text',
			));

		//Login form
		$wp_customize->add_section( 'FCN_login_form', array(
			'title' => __('Login Form', 'FCN'),
			));
		$wp_customize->add_setting( 'FCN_login_image', array(
			'default' => null,
		));
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'FCN_login_image', 
				array(
					'label' => __('Login Logo Image', 'FCN' ),
					'section' => 'FCN_login_form',
					'settings' => 'FCN_login_image',
				)
			)
		);

		//Contact info
		$wp_customize->add_section( 'FCN_contact', array(
			'title' => __('Contact Information', 'FCN' ),
		));
		$wp_customize->add_setting( 'FCN_phone', array( 
			'default' => null,
			'sanitize_callback' => 'FCN_sanitize_text'
		 ) );
		$wp_customize->add_control( 'FCN_phone', array(
			'label' => __('Telephone number', 'FCN'),
			'section' => 'FCN_contact',
			'settings' => 'FCN_phone',
		));
		$wp_customize->add_setting( 'FCN_email', array( 
			'default' => null,
			'sanitize_callback' => 'FCN_sanitize_text'
		 ) );
		$wp_customize->add_control( 'FCN_email', array(
			'label' => __('Email Address', 'FCN'),
			'section' => 'FCN_contact',
			'settings' => 'FCN_email',
		)); 
		$wp_customize->add_setting( 'FCN_address', array(
			'default' => null,
			'sanitize_callback' => 'FCN_sanitize_text',
		) );
		$wp_customize->add_control( 'FCN_address', array(
			'label' => __('Address', 'FCN'),
			'section' => 'FCN_contact',
			'settings' => 'FCN_address',
			'type' => 'text',
		) );

		//Google Analytics script
		$wp_customize->add_section(
			'FCN_analytics', array(
				'title' => __( 'Google Analytics', 'FCN' ),
			)
		);
		$wp_customize->add_setting( 
			'FCN_analytics_account', array(
			'default' => '',
			'sanitize_callback' => 'FCN_sanitize_text',
		) );
		$wp_customize->add_control(
		'FCN_analytics_account', array(
			'type' => 'text',
			'label' => __('Google Analytics ID (Ex. UA-XXXXXX-X)', 'FCN' ),
			'settings' => 'FCN_analytics_account',
			'section' => 'FCN_analytics',
		) );

			//helper function to sanitize input text in the theme customizer
	function FCN_sanitize_text( $input ) {
    	return wp_kses_post( force_balance_tags( $input ) );
	}

	//helper function to sanitize checkboxes in the theme customizer
	function FCN_sanitize_checkbox( $input ) {
    	if ( $input == 1 ) {
        	return 1;
    	} else {
        	return '';
    	}
	}
	function FCN_header_checkbox ( $input ) {
		if ( $input == 0 ) {
			return 'block';
		} else {
			return 'none';
		}
	}
	}

	//Generate CSS styles and syntax to insert into page header based on selections in theme customizer 
	public static function header_output() {
		?>
		<!-- Customizer CSS -->
		<style type="text/css">
			#text-logo, #tagline { display: <?php echo get_theme_mod('FCN_hide_header_text'); ?>}
			<?php self::generate_css('.site-footer .site-info a, .site-footer .site-info, .site-header, .site-header a', 'color', 'header_footer_link_color' ); ?>
			<?php self::generate_css('body.login div#login h1 a', 'background-image', 'header_image'); ?>
			<?php self::generate_css('.site-main', 'color', 'content_text_color'); ?>
			<?php self::generate_css('.site-main a, .site-main a:visited', 'color', 'content_link_color'); ?>
			<?php self::generate_css('.site-title #logo', 'color', 'logo_text_color'); ?>
			<?php self::generate_css('#tagline', 'color', 'tagline_text_color'); ?>
			<?php self::generate_css('.site-content h1, .site-content h2, .site-content h3, .site-content h4, .site-content h5, .site-content h6, .site-content h1 a, .site-content h2 a, .site-content h3 a, .site-content h4 a, .site-content h5 a, .site-content h6 a, .entry-meta', 'color', 'article_header_color' ); ?>
			<?php self::generate_css('.site-header, .site-footer', 'background-color', 'header_footer_background_color'); ?>
			<?php self::generate_css('.site-header, .site-footer', 'border-color', 'header_footer_border_color'); ?>
			.site-content .page-side-bar h1, .site-content .page-side-bar h2, .site-content .page-side-bar h3, .site-content .page-side-bar h4, .site-content .page-side-bar h5, .site-content .page-side-bar h6 { color: <?php echo get_theme_mod('side_bar_heading_color'); ?>;}
		</style>
		<!-- End Customizer CSS -->
		<?php
	}

	//load script to enable a live preview in the theme customizer
	public static function live_preview() {
		wp_enqueue_script(
			'FCN_themecustomizer',
			get_template_directory_uri().'/js/theme-customizer.js',
				array('jquery', 'customize-preview'),
				'',
				true
			);
	}

	//Assemble CSS rules based on selections in theme customizer
	public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
		$return = '';
		$mod = get_option($mod_name);
		if (! empty( $mod ) )
		{
			$return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix.$mod.$postfix
				);
			if ($echo){
				echo $return;
			}
		}
		return $return;
	}

	//Generate google analytics script if the account ID is listed in the theme customizer
	public static function analytics_script() {
		$id = get_theme_mod( 'FCN_analytics_account' );

		$script = "<script type=\"text/javascript\">
			var _gaq = _gaq || [];
			var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
			_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
			_gaq.push(['_setAccount', '$id']);
			_gaq.push(['_trackPageview']);
			(function() {
    		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  			})(); </script>";
	
		if (get_theme_mod( 'FCN_analytics_account' ) != '' ) 
		{
			echo $script;
		}
	}



}

$FCN_customize = new FCN_customize();