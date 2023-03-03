<?php
/**
 * _displayfly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _displayfly
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _displayfly_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on _displayfly, use a find and replace
		* to change '_displayfly' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( '_displayfly', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', '_displayfly' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'_displayfly_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', '_displayfly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _displayfly_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_displayfly_content_width', 640 );
}
add_action( 'after_setup_theme', '_displayfly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _displayfly_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_displayfly' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_displayfly' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', '_displayfly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _displayfly_scripts() {
	wp_enqueue_style( '_displayfly-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( '_displayfly-style', 'rtl', 'replace' );

	wp_enqueue_script( '_displayfly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_displayfly_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// class to create custom post type Portfolio and its taxanomies

class designfly_Portfolio{

    function __construct(){
	   add_action( 'init', array($this,'custom_post_type_Portfolio'));
	   add_action( 'init', array($this,'create_portfoliocategory_tax'));
	   add_action( 'init', array($this,'create_portfoliotag_tax'));
	}
	// Register custom post type "Portfolio"
	public function custom_post_type_Portfolio() {

		$labels = array(
			'name'               => 'Portfolio',
			'singular_name'      => 'Portfolio',
			'add_new'            => 'Add Portfolio',
			'add_new_item'       => 'Add New Portfolio',
			'edit_item'          => 'Edit Portfolio',
			'new_item'           => 'New Portfolio',
			'all_items'          => 'All Portfolios',
			'view_item'          => 'View Portfolio',
			'search_items'       => 'Search Portfolios',
			'not_found'          => 'No Portfolios Found',
			'not_found_in_trash' => 'No Portfolios Found in Trash',
			'menu_name'          => 'Portfolio',
		);

		$args = array(
			'labels'            => $labels,
			'menu_icon'         => 'dashicons-images-alt',
			'public'            => true,
			'publicly_querable' => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'Portfolio' ),
			'capability_type'   => 'post',
			'has_archive'       => true,
			'hieracrchical'     => false,
			'menu_position'     => null,
			'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		);

		register_post_type( 'Portfolio', $args,5);
	}

	// register a custom taxonomy portfolio category
	public function create_portfoliocategory_tax() {

		$labels = array(
			'name'              => _x( 'portfolio categories', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'portfolio category', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search portfolio categories', 'textdomain' ),
			'all_items'         => __( 'All portfolio categories', 'textdomain' ),
			'parent_item'       => __( 'Parent portfolio category', 'textdomain' ),
			'parent_item_colon' => __( 'Parent portfolio category:', 'textdomain' ),
			'edit_item'         => __( 'Edit portfolio category', 'textdomain' ),
			'update_item'       => __( 'Update portfolio category', 'textdomain' ),
			'add_new_item'      => __( 'Add New portfolio category', 'textdomain' ),
			'new_item_name'     => __( 'New portfolio category Name', 'textdomain' ),
			'menu_name'         => __( 'portfolio category', 'textdomain' ),
		);
		$args = array(
			'labels' => $labels,
			'description' => __( 'this taxonomy will display the portfolio category', 'textdomain' ),
			'hierarchical' => true,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_quick_edit' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
		);
		register_taxonomy( 'portfoliocategory', array("portfolio"), $args );	
	}

	//register a custom taxonomy tag
	function create_portfoliotag_tax() {

		$labels = array(
			'name'              => _x( 'portfolio tags', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'portfolio tag', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search portfolio tags', 'textdomain' ),
			'all_items'         => __( 'All portfolio tags', 'textdomain' ),
			'parent_item'       => __( 'Parent portfolio tag', 'textdomain' ),
			'parent_item_colon' => __( 'Parent portfolio tag:', 'textdomain' ),
			'edit_item'         => __( 'Edit portfolio tag', 'textdomain' ),
			'update_item'       => __( 'Update portfolio tag', 'textdomain' ),
			'add_new_item'      => __( 'Add New portfolio tag', 'textdomain' ),
			'new_item_name'     => __( 'New portfolio tag Name', 'textdomain' ),
			'menu_name'         => __( 'portfolio tag', 'textdomain' ),
		);
		$args = array(
			'labels' => $labels,
			'description' => __( 'this taxonomy will display the portfolio tag', 'textdomain' ),
			'hierarchical' => false,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_quick_edit' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
		);
		register_taxonomy( 'portfoliotag', array('portfolio'), $args );
	
	}
}

$createcpt = new designfly_Portfolio();

