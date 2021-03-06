<?php
/**
 * Barebones functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Barebones
 */

if ( ! function_exists( 'barebones_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function barebones_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Barebones, use a find and replace
	 * to change 'barebones' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'barebones', get_template_directory() . '/languages' );

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

	add_image_size( 'post-thumb-index', 600, 600, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'barebones' ),
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
	add_theme_support( 'custom-background', apply_filters( 'barebones_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'barebones_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function barebones_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'barebones_content_width', 640 );
}
add_action( 'after_setup_theme', 'barebones_content_width', 0 );


function post_cover_image($size = '') {
	$url = get_the_post_thumbnail_url(null, $size);
	$cover_style = 'background: url('.$url.') no-repeat center center;';
	$cover_style.= '-webkit-background-size: cover;';
	$cover_style.= '-moz-background-size: cover;';
	$cover_style.= '-o-background-size: cover;';
	$cover_style.= 'background-size: cover;';
	echo $cover_style;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function barebones_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'barebones' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'barebones' ),
		'before_widget' => '<section id="%1$s" class="widget element is-quarter %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'barebones_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function barebones_scripts() {
	wp_enqueue_style( 'barebones-style', get_stylesheet_uri() );
	wp_enqueue_style('barebones-google-fonts', barebones_fonts_url(), array(), null);

	wp_enqueue_script( 'barebones-navigation', get_template_directory_uri() . '/library/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'barebones-skip-link-focus-fix', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'barebones_scripts' );

/**
 * Rest Api
 */
require get_template_directory() . '/library/inc/wp-rest.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/library/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/customizer/customizer.php';
require get_template_directory() . '/library/customizer/google-fonts/google-fonts.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/inc/jetpack.php';
