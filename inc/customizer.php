<?php
/**
 * indvatx Theme Customizer.
 *
 * @package indvatx
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

// remove_theme_mods(); // ##########  Remove in production

function indvatx_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'indvatx_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function indvatx_customize_preview_js() {
	wp_enqueue_script( 'indvatx_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'indvatx_customize_preview_js' );


// ##############  Shea's Code #####################


add_filter( 'customize_loaded_components', 'wpdocs_remove_panels' );

// ############## Custom CSS ##################

function custom_css_customize_register( $wp_customize ) {

	// Add a Social Media section.
	$wp_customize->add_section( 'custom_css' , array(
	  'title' => __( 'Custom CSS', 'indvatx' ),
	  'priority' => 0,
	) );

	$wp_customize->add_setting( 'css_area', array(
		'type' => 'theme_mod',
		'default' => "div#page header.site-header .site-branding .site-title
{
	font-family: Oswald, sans-serif;
	font-size: 60px;
	font-weight: normal;
	padding: 14px 0;
	letter-spacing: 0px;
}
div#page header.site-header .site-branding .site-description {
    margin: 0;
		font-family: 'Open Sans', sans-serif;
		font-size: 14px;
		font-weight: normal;
    padding-left: 80px;
    margin-top: -15px;
		letter-spacing: 0px;
}",
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'css_area', array(
  'label' => __( 'CSS' ),
  'type' => 'textarea',
  'section' => 'custom_css',
	) );

}

add_action( 'customize_register', 'custom_css_customize_register' );


// ############## Social Media Links ##################

function social_media_customize_register( $wp_customize ) {

	// Add a Social Media section.
	$wp_customize->add_section( 'social_media' , array(
	  'title' => __( 'Social Media', 'indvatx' ),
		'description' => __( 'Add Links to Social Media' ),
	  'priority' => 90, // Before Navigation.
	) );

	// Facebook

	$wp_customize->add_setting( 'fb_link', array(
		'type' => 'theme_mod',
		'default' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fb_link', array(
  'label' => __( 'Facebook' ),
  'type' => 'text',
  'section' => 'social_media',
	) );

	// Twitter

	$wp_customize->add_setting( 'twitter_link', array(
		'type' => 'theme_mod',
		'default' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'twitter_link', array(
  'label' => __( 'Twitter' ),
  'type' => 'text',
  'section' => 'social_media',
	) );

	// Instagram

	$wp_customize->add_setting( 'instagram_link', array(
		'type' => 'theme_mod',
		'default' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'instagram_link', array(
  'label' => __( 'Instagram' ),
  'type' => 'text',
  'section' => 'social_media',
	) );

	// YouTube

	$wp_customize->add_setting( 'yt_link', array(
		'type' => 'theme_mod',
		'default' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'yt_link', array(
	'label' => __( 'YouTube' ),
	'type' => 'text',
	'section' => 'social_media',
	) );

}

add_action( 'customize_register', 'social_media_customize_register' );


function theme_colors_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'accent_color', array(
		'type' => 'theme_mod',
	  'default' => '#1e73be',
	  'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent_color',
			array(
				'label'      => __( 'Accent Color', 'indvatx' ),
				'section'    => 'colors',
				'settings'   => 'accent_color',
		) )
	);

	$wp_customize->add_setting( 'footer_color', array(
		'type' => 'theme_mod',
		'default' => '#CCCCCC',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_color',
			array(
				'label'      => __( 'Footer Color', 'indvatx' ),
				'section'    => 'colors',
				'settings'   => 'footer_color',
		) )
	);
}

add_action( 'customize_register', 'theme_colors_customize_register' );

function my_custom_css_output() {
  echo '<style type="text/css" id="custom-theme-css">.main-navigation .current-menu-item>a, .main-navigation .current_page_ancestor>a, .main-navigation .current_page_item>a, .main-navigation .current_page_parent>a, .main-navigation ul.nav-menu>li.focus>a, .main-navigation ul.nav-menu>li:focus>a, .main-navigation ul.nav-menu>li:hover>a, .main-navigation ul.nav-menu>li>a:focus, .main-navigation ul.nav-menu>li>a:hover, .main-navigation ul.nav-menu>li>ul.children li.focus>a, .main-navigation ul.nav-menu>li>ul.children li:hover>a, .main-navigation ul.nav-menu>li>ul.sub-menu li.focus>a, .main-navigation ul.nav-menu>li>ul.sub-menu li:hover>a { background: ' .
  get_theme_mod( 'accent_color', '#1e73be' ) . ';}
	a { color: ' .
  get_theme_mod( 'accent_color', '#1e73be' ) . ';}
	div#page footer#colophon { background-color: ' .
  get_theme_mod( 'footer_color', '#CCC' ) . ';} ' .
  get_theme_mod( 'css_area', '' ) . '
	</style>';

}

add_action( 'wp_head', 'my_custom_css_output');
