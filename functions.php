<?php
/**
 * indvatx functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package indvatx
 */

if ( ! function_exists( 'indvatx_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function indvatx_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on indvatx, use a find and replace
	 * to change 'indvatx' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'indvatx', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'indvatx' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'indvatx_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'indvatx_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function indvatx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'indvatx_content_width', 640 );
}
add_action( 'after_setup_theme', 'indvatx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function indvatx_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'indvatx' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'indvatx' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebars(4,
		array('name'=>'Footer %d',
		'id' => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',)

	);

}
add_action( 'widgets_init', 'indvatx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function indvatx_scripts() {
	wp_enqueue_style( 'indvatx-style', get_stylesheet_uri() );

	wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js', array('jquery'), null, false);
	wp_enqueue_script( 'indvatx-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true );
	wp_enqueue_script( 'indvatx-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'indvatx_scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true );

	// Font Awesome icons
	wp_enqueue_script( 'indvatx-font-awesome', 'https://use.fontawesome.com/2d04c7b284.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'indvatx_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Advanced Custom Fields Setup
 */
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58179ee5530cb',
	'title' => 'Carousel',
	'fields' => array (
		array (
			'key' => 'field_58179f08bf136',
			'label' => 'Carousel Image Group',
			'name' => 'carousel_image_group',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'row',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_58179f3ebf137',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'large',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_58179f75bf138',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

// Remove inline width from Image Captions
// Unfortunately, this code also removes the <figure> and <figcaption> tags so I went ahead an used jQuery as a quick fix

// add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
// add_shortcode('caption', 'fixed_img_caption_shortcode');
//
// function fixed_img_caption_shortcode($attr, $content = null) {
//     // New-style shortcode with the caption inside the shortcode with the link and image tags.
//     if ( ! isset( $attr['caption'] ) ) {
//         if ( preg_match( '#((?:<a &\#91;^>]+>\s*)?<img &\#91;^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
//             $content = $matches[1];
//             $attr['caption'] = trim( $matches[2] );
//         }
//     }
//
//     // Allow plugins/themes to override the default caption template.
//     $output = apply_filters('img_caption_shortcode', '', $attr, $content);
//     if ( $output != '' )
//         return $output;
//
//     extract(shortcode_atts(array(
//         'id'    => '',
//         'align' => 'alignnone',
//         'width' => '',
//         'caption' => ''
//     ), $attr));
//
//     if ( 1 > (int) $width || empty($caption) )
//         return $content;
//
//     if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
//
//     return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px">'
//     . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
// }
