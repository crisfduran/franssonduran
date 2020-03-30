<?php
/**
 * franssonduran functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package franssonduran
 */

if ( ! function_exists( 'franssonduran_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function franssonduran_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on franssonduran, use a find and replace
	 * to change 'franssonduran' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'franssonduran', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'franssonduran' ),
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
}
endif;
add_action( 'after_setup_theme', 'franssonduran_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function franssonduran_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'franssonduran_content_width', 640 );
}
add_action( 'after_setup_theme', 'franssonduran_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function franssonduran_scripts() {
    // Enqueue Google Fonts: Open Sans & PT Serif
    wp_enqueue_style("adding-google-fonts", all_google_fonts());

	wp_enqueue_style( 'franssonduran-style', get_stylesheet_uri() );

	wp_enqueue_script( 'franssonduran-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	wp_localize_script('franssonduran-navigation','humescoresScreenReaderText', array(
	    'expand' => __( 'Expand child menu', 'franssonduran'),
        'collapse' => __( 'Collapse child menu', 'franssonduran'),
    ));

	wp_enqueue_script( 'franssonduran-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'franssonduran_scripts' );


function all_google_fonts() {

    $fonts = array(

        "Open+Sans:400",
        "PT+Serif:400"

    );

    $fonts_collection = add_query_arg(array(

        "family"=>urlencode(implode("|",$fonts)),

        "subset"=>"latin"

    ),'https://fonts.googleapis.com/css');

    return $fonts_collection;
}

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
