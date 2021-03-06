<?php
/**
 * Pummel functions and definitions
 *
 * @package Pummel
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'bpl_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bpl_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on brandon, use a find and replace
	 * to change 'pummel' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pummel', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pummel' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bpl_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bpl_setup
add_action( 'after_setup_theme', 'bpl_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bpl_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'pummel' ),
		'id'            => 'sidebar-1',
		'description'   => __('Display Widgets in the Sidebar', 'pummel'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bpl_widgets_init' );


function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' =>  $name ,	 
		'id' => $id, 
		'description' =>  $description ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

}



create_widget( __('Front Middle Top Left', 'pummel'), 'front-top-middle-left', __('Displays on the left side of the frontpage top middle row', 'pummel') );
create_widget( __('Front Middle Top Center', 'pummel'), 'front-top-middle-center', __('Displays on the center of the frontpage top middle row', 'pummel') );
create_widget( __('Front Middle Top Right', 'pummel'), 'front-top-middle-right', __('Displays on the right side of the frontpage top middle row', 'pummel') );

create_widget( __('Front Middle Bottom Left', 'pummel'), 'front-bottom-middle-left', __('Displays on the left side bottom of the frontpage bottom middle row', 'pummel') );
create_widget( __('Front Middle Bottom Center', 'pummel'), 'front-bottom-middle-center', __('Displays on the center bottom of the frontpage bottom middle row', 'pummel') );
create_widget( __('Front Middle Bottom Right', 'pummel'), 'front-bottom-middle-right', __('Displays on the right side bottom of the frontpage bottom middle row', 'pummel') );

create_widget( __('Front Third Left', 'pummel'), 'front-third-left', __('Displays on the left side of the frontpage bottom row', 'pummel') );
create_widget( __('Front Third Right', 'pummel'), 'front-third-right',__('Displays on the right side of the frontpage bottom row', 'pummel') );

create_widget( __('Footer Left', 'pummel'), 'footer-left',  __('Displays on the left of the Footer', 'pummel') );
create_widget( __('Footer Center', 'pummel'), 'footer-center', __('Displays in the center of the Footer', 'pummel') );
create_widget( __('Footer Right', 'pummel'), 'footer-right', __('Displays on the right of the Footer', 'pummel') );


/**
 * Enqueue scripts and styles.
 */
function bpl_scripts() {
	
	wp_enqueue_style('bpl_bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );
	
	wp_enqueue_style('bpl_animate_css', get_template_directory_uri() . '/css/animations.css' );
	
	wp_enqueue_style('bpl_font_awesome_css', get_template_directory_uri() . '/font-awesome/css/font-awesome.css' );
	
	wp_enqueue_style('bpl_googlefont_css', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,800|Playfair+Display:400,700,900');
	 
	wp_enqueue_style( 'bpl_style', get_stylesheet_uri() );
	

	global $wp_scripts;
	
	wp_register_script( 'bpl_html5_shiv', get_template_directory_uri() . '/js/html5shiv.js', '', '', false);
    
    wp_register_script( 'bpl_respond_js', get_template_directory_uri() . '/js/respond.src.js', '', '', false);
    
    $wp_scripts->add_data( 'bpl_html5_shiv', 'conditional', 'lt IE 9');
    $wp_scripts->add_data( 'bpl_respond_js', 'conditional', 'lt IE 9');
    
    wp_enqueue_script( 'bpl_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', true);
    
    wp_enqueue_script( 'bpl_animate_js', get_template_directory_uri() . '/js/css3-animate-it.js', array('jquery'), '', true);
    
    wp_enqueue_script( 'bpl_theme-js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bpl_bootstrap_js'), '', true);

	wp_enqueue_script( 'bpl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bpl_scripts' );

/** 
* editor style
**/
function bpl_add_editor_styles() {
    add_editor_style( array( get_template_directory_uri() . '/css/bootstrap.css' ,'editor-style.css' ) );
}
add_action( 'admin_init', 'bpl_add_editor_styles' );



/**
 * Add breadcrumbs functionality to your WordPress theme 
 *
 * Once you have included the function in your functions.php file
 * you can then place the following anywhere in your theme templates
 * if(function_exists('mine_breadcrumbs')) mine_breadcrumbs();
 *
 * 
 */
function bpl_breadcrumbs() {
	if(!is_front_page()) {
		echo '<nav class="breadcrumb">';
		echo '<a href="'.home_url('/').'">'.__('Home', 'pummel').'</a>';
		if (is_home() || is_single() || is_archive()){
			
			if ( 'posts' != get_option( 'show_on_front' ) ) {
			
			echo '<span class="divider"> / </span><a href="'.home_url('/blog').'">'.__('Blog', 'pummel').'</a>';
			
			}
			
			if (is_single()) {
				echo ' <span class="divider">/</span> ';
				the_title();
			}
			
			if (is_archive()) {
				echo ' <span class="divider">/</span> ';
					if ( is_category() ) {
						single_cat_title();

					}
					
					if ( is_tag() ) 
						single_tag_title();

					}
					
					if ( is_author() ) {
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						*/
						the_post();
						printf( __( 'Author: %s', 'pummel' ), '<span class="vcard">' . get_the_author() . '</span>' );
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();
					}
					
					if ( is_day() ) {
						printf( __( 'Day: %s', 'pummel' ), '<span>' . get_the_date() . '</span>' );
					}

					if ( is_month() ) {
						printf( __( 'Month: %s', 'pummel' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
					}

					if ( is_year() ) {
						printf( __( 'Year: %s', 'pummel' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
					}

					if ( is_tax( 'post_format', 'post-format-aside' ) ) {
							_e( 'Asides', 'pummel' );
					}
					
					if ( is_tax( 'post_format', 'post-format-image' ) ) {
						_e( 'Images', 'pummel');
					}

					if ( is_tax( 'post_format', 'post-format-video' ) ) {
						_e( 'Videos', 'pummel' );
					}

					if ( is_tax( 'post_format', 'post-format-quote' ) ) {
						_e( 'Quotes', 'pummel' );
					}

					if ( is_tax( 'post_format', 'post-format-link' ) ) {
						_e( 'Links', 'pummel' );
					}

					

		
		} elseif (is_page()) {
			echo ' <span class="divider">/</span> ';
			echo the_title();
		}
		echo '</nav>';
	}
}









// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
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

