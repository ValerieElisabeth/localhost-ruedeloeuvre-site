<?php
/**
 * shopstar functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shopstar
 */
define( 'SHOPSTAR_THEME_VERSION' , '10.0.27' );
define( 'SHOPSTAR_UPDATE_URL' , 'https://updates.outtheboxthemes.com' );

if ( ! function_exists( 'shopstar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shopstar_setup() {
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,600,600italic,700,700italic' );
	add_editor_style( $font_url );
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800' );
	add_editor_style( $font_url );
	
	add_editor_style('editor-style.css');
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on shopstar, use a find and replace
	 * to change 'shopstar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'shopstar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	*
	* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'shopstar_blog_img_side', 352, 230, get_theme_mod( 'shopstar-blog-crop-featured-image', true ) );
		add_image_size( 'shopstar_blog_img_top', 1100, 440, get_theme_mod( 'shopstar-blog-crop-featured-image', true ) );
	}
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'shopstar' ),
		'footer' => __( 'Footer Menu', 'shopstar' )
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
	
	/*
	 * Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	if ( function_exists( 'has_custom_logo' ) ) {
		add_theme_support( 'custom-logo' );
	}
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
		'default-image' => get_template_directory_uri() . '/library/images/headers/default.jpg',
		'width'         => 1680,
		'height'        => 600,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
	) );	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shopstar_custom_background_args', array(
		'default-color' => 'FFFFFF',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );

	if ( get_theme_mod( 'shopstar-woocommerce-product-image-zoom', true ) ) {	
		add_theme_support( 'wc-product-gallery-zoom' );
	}
	
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
}
endif; // shopstar_setup
add_action( 'after_setup_theme', 'shopstar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shopstar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shopstar_content_width', 640 );
}
add_action( 'after_setup_theme', 'shopstar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopstar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'shopstar' ),
		'id'            => 'sidebar-1',
		'description'   => 'This sidebar will appear on the Blog or any page that uses either the Default or Left Primary Sidebar templates.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'shopstar' ),
		'id'            => 'secondary-sidebar',
		'description'   => 'This sidebar will appear on any page that uses either the Left Secondary Sidebar or Right Secondary Sidebar templates.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'shopstar' ),
		'id'            => 'shop-sidebar',
		'description'   => 'This sidebar will appear on your WooCommerce pages.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer', 'shopstar' ),
		'id' => 'footer',
		'description' => ''
	));
}
add_action( 'widgets_init', 'shopstar_widgets_init' );

function shopstar_set_variables() {}
add_action('init', 'shopstar_set_variables', 10);

// function shopstar_toggle_woocommerce_breadcrumbs() {
// 	// Disable the WooCommerce breadcrumbs
// 	if ( !get_theme_mod( 'shopstar-woocommerce-breadcrumbs', customizer_library_get_default( 'shopstar-woocommerce-breadcrumbs' ) ) ) {
// 		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
// 	}
// }
// add_action('init', 'shopstar_toggle_woocommerce_breadcrumbs');

/**
 * Enqueue scripts and styles.
 */
function shopstar_scripts() {
	wp_enqueue_style( 'shopstar-site-title-font-default', '//fonts.googleapis.com/css?family=Prata:400', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_style( 'shopstar-body-font-default', '//fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,600,600italic,700,700italic', array(), SHOPSTAR_THEME_VERSION );
	wp_enqueue_style( 'shopstar-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800', array(), SHOPSTAR_THEME_VERSION );

	if ( get_theme_mod( 'shopstar-header-layout', customizer_library_get_default( 'shopstar-header-layout' ) ) == 'shopstar-header-layout-centered' ) {
		wp_enqueue_style( 'shopstar-header-centered', get_template_directory_uri().'/library/css/header-centered.css', array(), SHOPSTAR_THEME_VERSION );
	} else {
		wp_enqueue_style( 'shopstar-header-left-aligned', get_template_directory_uri().'/library/css/header-left-aligned.css', array(), SHOPSTAR_THEME_VERSION );
	}
	
	wp_enqueue_style( 'shopstar-font-awesome', get_template_directory_uri().'/library/fonts/font-awesome/css/font-awesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'shopstar-style', get_stylesheet_uri() );
	
	if ( shopstar_is_woocommerce_activated() ) {
		wp_enqueue_style( 'shopstar-woocommerce-custom', get_template_directory_uri().'/library/css/woocommerce-custom.css', array(), SHOPSTAR_THEME_VERSION );
	}
	
	wp_enqueue_script( 'shopstar-navigation-js', get_template_directory_uri() . '/library/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'shopstar-caroufredsel-js', get_template_directory_uri() . '/library/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_script( 'shopstar-touchswipe-js', get_template_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	
	if ( get_theme_mod( 'shopstar-mobile-fitvids', customizer_library_get_default( 'shopstar-mobile-fitvids' ) ) ) {
		wp_enqueue_script( 'shopstar-fitvids-js', get_template_directory_uri() . '/library/js/jquery.fitvids.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	}
	
	if ( get_theme_mod( 'shopstar-blog-layout' ) == 'blog-post-masonry-grid-layout' ) {
		// Include our own Masonry and Imagesloaded libraries as the WordPress versions aren't the latest versions
		wp_enqueue_script( 'shopstar-masonry-js', get_template_directory_uri() . '/library/js/jquery.masonry.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
		wp_enqueue_script( 'shopstar-imagesloaded-js', get_template_directory_uri() . '/library/js/imagesloaded.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	}
	
	if ( get_theme_mod( 'shopstar-header-sticky', customizer_library_get_default( 'shopstar-header-sticky' ) ) ) {
		wp_enqueue_script( 'shopstar-waypoints-js', get_template_directory_uri() . '/library/js/waypoints.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
		wp_enqueue_script( 'shopstar-waypoints-sticky-js', get_template_directory_uri() . '/library/js/waypoints-sticky.min.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	}
	
	wp_enqueue_script( 'shopstar-custom-js', get_template_directory_uri() . '/library/js/custom.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	
	wp_enqueue_script( 'shopstar-skip-link-focus-fix-js', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shopstar_scripts' );

function shopstar_admin_scripts( $hook ) {
	wp_enqueue_style( 'shopstar-admin', get_template_directory_uri().'/library/css/admin.css', array(), SHOPSTAR_THEME_VERSION );
    wp_enqueue_script( 'shopstar-admin-js', get_template_directory_uri() . '/library/js/admin.js', SHOPSTAR_THEME_VERSION, true );
    
    $slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
    
    if ( $slider_categories && $slider_type == 'shopstar-slider-default' ) {
    	$slider_categories = implode(',', $slider_categories );
    } else {
    	$slider_categories = '';
    }
    
    $variables = array(
    	'sliderCategories' => $slider_categories
    );
    
    wp_localize_script( 'shopstar-admin-js', 'variables', $variables );
}
add_action( 'admin_enqueue_scripts', 'shopstar_admin_scripts' );

// Recommended plugins installer
require_once get_template_directory() . '/library/includes/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/includes/jetpack.php';

// Helper library for the theme customizer.
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/customizer/mods.php';

/**
 * Premium Upgrade Page
 */
include get_template_directory() . '/premium/premium.php';

/**
 * Enqueue shopstar custom customizer styling.
 */
function shopstar_load_customizer_script() {
	wp_enqueue_script( 'shopstar-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), SHOPSTAR_THEME_VERSION, true );
	wp_enqueue_style( 'shopstar-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css', array(), SHOPSTAR_THEME_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'shopstar_load_customizer_script' );

function shopstar_subtext( $atts, $content=null ) {

	$return_str .= "<div class='subtext'>" .$content. "</div>";

	return $return_str;
}

function shopstar_button( $atts, $content=null ) {

	extract( shortcode_atts( array(
		'url' => ''
	), $atts ) );

	$return_str .= "<a href='" .$url. "' class='button'>" .$content. "</a>";

	return $return_str;
}

function shopstar_register_shortcodes(){
	add_shortcode('subtext', 'shopstar_subtext');
	add_shortcode('button', 'shopstar_button');
}

/* register shortcodes */
add_action( 'init', 'shopstar_register_shortcodes');

if ( ! function_exists( 'shopstar_load_dynamic_css' ) ) :
	/**
	 * Add CSS for mobile menu breakpoint
	 */
	function shopstar_load_dynamic_css() {
		$site_branding_padding_top 	   = floatVal( get_theme_mod( 'site_branding_padding_top', customizer_library_get_default( 'site_branding_padding_top' ) ) );
		$site_branding_padding_bottom  = floatVal( get_theme_mod( 'site_branding_padding_bottom', customizer_library_get_default( 'site_branding_padding_bottom' ) ) );
		$shopstar_slider_has_min_width = get_theme_mod( 'shopstar-slider-has-min-width', customizer_library_get_default( 'shopstar-slider-has-min-width' ) );
		$shopstar_slider_min_width 	   = floatVal( get_theme_mod( 'shopstar-slider-min-width', customizer_library_get_default( 'shopstar-slider-min-width' ) ) );
		$mobile_logo_breakpoint 	   = floatVal( get_theme_mod( 'shopstar-mobile-logo-breakpoint', customizer_library_get_default( 'shopstar-mobile-logo-breakpoint' ) ) );
		
		// Activate the mobile menu when on a mobile device
		if ( wp_is_mobile() ) {
			$mobile_menu_breakpoint = 10000000;
		} else if ( true ) {
			$mobile_menu_breakpoint = floatVal( get_theme_mod( 'shopstar-mobile-menu-breakpoint', customizer_library_get_default( 'shopstar-mobile-menu-breakpoint' ) ) );
		}
		
		require get_template_directory() . '/library/includes/dynamic-css.php';
		
	}
endif;
add_action( 'wp_head', 'shopstar_load_dynamic_css' );

// Function to check that it's not a single post or the category, tag or author page
if ( ! function_exists( 'shopstar_not_secondary_blog_page' ) ) :
	function shopstar_not_secondary_blog_page() {
		return ( !is_single() && !is_category() && !is_tag() && !is_author() );
	}
endif;

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'shopstar_is_woocommerce_activated' ) ) :
	function shopstar_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}
endif; // shopstar_is_woocommerce_activated

if ( shopstar_is_woocommerce_activated() ) {
	require get_template_directory() . '/library/includes/woocommerce-inc.php';
}

// Add CSS class to body by filter
function shopstar_add_body_class( $classes ) {
	
	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}
	
	if ( get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'shopstar-shop-full-width';
	}
	
	if ( !get_theme_mod( 'shopstar-woocommerce-breadcrumbs', customizer_library_get_default( 'shopstar-woocommerce-breadcrumbs' ) ) ) {
		$classes[] = 'shopstar-shop-no-breadcrumbs';
	}
	
	if ( shopstar_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

	if ( ( is_home() || is_archive() ) && !$is_woocommerce && get_theme_mod( 'shopstar-blog-full-width-archive', customizer_library_get_default( 'shopstar-blog-full-width-archive' ) ) ) {
		$classes[] = 'full-width';
	} else if ( is_single() && !$is_woocommerce && get_theme_mod( 'shopstar-blog-full-width-single', customizer_library_get_default( 'shopstar-blog-full-width-single' ) ) ) {
		$classes[] = 'full-width';
	} else if ( is_search() && get_theme_mod( 'shopstar-search-results-full-width', customizer_library_get_default( 'shopstar-search-results-full-width' ) ) ) {
		$classes[] = 'full-width';
	} else if ( $is_woocommerce && !is_active_sidebar( 'shop-sidebar' ) ) {
		$classes[] = 'full-width';
	}
	
// 	if ( !get_theme_mod( 'shopstar-layout-display-page-titles', customizer_library_get_default( 'shopstar-layout-display-page-titles' ) ) ) {
// 		$classes[] = 'no-page-titles';	
// 	}
	
// 	if ( ( is_home() || is_archive() || is_search() ) && !get_theme_mod( 'shopstar-layout-display-post-titles', customizer_library_get_default( 'shopstar-layout-display-post-titles' ) ) ) {
// 		$classes[] = 'post-archive-no-post-titles';	
// 	}

// 	if ( is_single() && !get_theme_mod( 'shopstar-layout-display-post-titles', customizer_library_get_default( 'shopstar-layout-display-post-titles' ) ) ) {
// 		$classes[] = 'post-single-no-post-titles';	
// 	}
	
	return $classes;
}
add_filter( 'body_class', 'shopstar_add_body_class' );

// Set the number or products per row
if (!function_exists('shopstar_loop_shop_columns')) {

	function shopstar_loop_shop_columns() {
		if ( get_theme_mod( 'shopstar-layout-woocommerce-shop-full-width', customizer_library_get_default( 'shopstar-layout-woocommerce-shop-full-width' ) ) || ! is_active_sidebar( 'shop-sidebar' ) ) {
			return 4;
		} else {
			return 3;
		}
	}
	
}
add_filter('loop_shop_columns', 'shopstar_loop_shop_columns');

if (!function_exists('shopstar_woocommerce_product_thumbnails_columns')) {
	function shopstar_woocommerce_product_thumbnails_columns() {
		return 3;
	}
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'shopstar_woocommerce_product_thumbnails_columns' );

// Set the title prefixes of the archive pages
function shopstar_get_the_archive_title( $title ) {
    if ( is_category() && !get_theme_mod( 'shopstar-blog-display-category-page-title-prefix', customizer_library_get_default( 'shopstar-blog-display-category-page-title-prefix' ) ) ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() && !get_theme_mod( 'shopstar-blog-display-tag-page-title-prefix', customizer_library_get_default( 'shopstar-blog-display-tag-page-title-prefix' ) ) ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">Posts by ' . get_the_author() . '</span>' ;
	}
	
    return $title;
}
add_filter( 'get_the_archive_title', 'shopstar_get_the_archive_title');

function shopstar_excerpt_length( $length ) {
	return get_theme_mod( 'shopstar-blog-excerpt-length', customizer_library_get_default( 'shopstar-blog-excerpt-length' ) );
}
add_filter( 'excerpt_length', 'shopstar_excerpt_length', 999 );

function shopstar_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . wp_kses_post( get_theme_mod( 'shopstar-blog-read-more-text', customizer_library_get_default( 'shopstar-blog-read-more-text' ) ), 'shopstar' ) . '</a>';
}
add_filter( 'excerpt_more', 'shopstar_excerpt_more' );

// Set the site logo URL
function shopstar_custom_logo_url( $html ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	
	$logo_link_content = '';
	
	//if ( get_theme_mod( 'shopstar-logo-link-content', customizer_library_get_default( 'shopstar-logo-link-content' ) ) == "" ) {
		$logo_link_content = home_url( '/' );
	//} else {
	//	$logo_link_content = get_permalink( get_theme_mod( 'shopstar-logo-link-content' ) );
	//}	
	
	$html = sprintf( '<a href="%1$s" class="custom-logo-link %2$s" title="%3$s" rel="home" itemprop="url">%4$s</a>',
				esc_url( $logo_link_content ),
				( get_theme_mod( 'shopstar-mobile-logo' ) ? 'hide-for-mobile' : '' ),
				esc_attr( get_bloginfo( 'name', 'display' ) ),
	        	wp_get_attachment_image( $custom_logo_id, 'full', false, array(
	            	'class' => 'custom-logo',
	        		'alt' => esc_attr( get_bloginfo( 'name' ) )
				) )
	    	);

	return $html;    
}
add_filter( 'get_custom_logo', 'shopstar_custom_logo_url' );

/**
 * Adjust is_home query if shopstar-slider-categories is set
 */
function shopstar_set_blog_queries( $query ) {

	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
	
		$is_front_page = ( $query->get('page_id') == get_option('page_on_front') || is_front_page() );
	
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			if ( !is_admin() && !$is_front_page  && $query->get('id') != 'slider' || !is_admin() && $is_front_page && $query->get('id') != 'slider' ){
				$query->set( 'category__not_in', $slider_categories );
			}
		}
	}

}
add_action( 'pre_get_posts', 'shopstar_set_blog_queries' );

function shopstar_filter_recent_posts_widget_parameters( $params ) {
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_categories;
		}
	}
	
	return $params;
}
add_filter('widget_posts_args','shopstar_filter_recent_posts_widget_parameters');

/**
 * Adjust the widget categories query if shopstar-slider-categories is set
*/
function shopstar_set_widget_categories_args($args){
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_args', 'shopstar_set_widget_categories_args');

function shopstar_set_widget_categories_dropdown_arg($args){
	$slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
	
	if ( $slider_categories != '' && $slider_type == 'shopstar-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_dropdown_args', 'shopstar_set_widget_categories_dropdown_arg');

function shopstar_create_slider_link_content_field(){
 	global $post;
 	$custom_fields = get_post_custom($post->ID);
 	
 	$slider_link_content;
 	
 	// Get the slider link content field
 	if ( isset( $custom_fields["slider_link_content"][0] ) ) {
 		$slider_link_content = $custom_fields["slider_link_content"][0];
 	}
	
 	// Create the slider link content field
	$dropdown = '<select name="slider_link_content">';
	$dropdown .= '<option value="">Not linked</option>';
	$dropdown .= '<option value="custom" ';
	
	if ( $slider_link_content == 'custom' ) {
		$dropdown .= 'selected';
	}
	
	$dropdown .= '>Custom Link</option>';
	$dropdown .= '<optgroup label="Pages">';
	
	// Get all published pages
	$published_pages = get_pages();
	foreach ($published_pages as $published_page) {
		$dropdown .= '<option value="' .$published_page->ID. '" ';
		if ( $published_page->ID == intval( $slider_link_content ) ) $dropdown .= 'selected';
		$dropdown .= '>' .$published_page->post_title. '</option>';
	}
	// Prevent weirdness
	wp_reset_postdata();
	
	$dropdown .= '</optgroup>';
	$dropdown .= '<optgroup label="Posts">';

	// Get all published posts
	$published_posts = get_posts( array( 'posts_per_page'   => -1 ) );
	foreach ($published_posts as $published_post) {
		$dropdown .= '<option value="' .$published_post->ID. '" ';
		if ( $published_post->ID == intval( $slider_link_content ) ) $dropdown .= 'selected';		
		$dropdown .= '>' .$published_post->post_title. '</option>';
	}

	// Prevent weirdness
	wp_reset_postdata();

	$dropdown .= '</optgroup>';
	$dropdown .= '</select>';
	echo $dropdown;
	
 	$slider_link_custom = '';
 	
 	// Get the custom slider link field
 	if ( isset( $custom_fields["slider_link_custom"][0] ) ) {
 		$slider_link_custom = $custom_fields["slider_link_custom"][0];
 	}
	
 	// Create the custom slider link field
	echo '<div id="slider_link_custom" class="section">';
	echo '<label>Custom Link URL</label>';
	echo '<input type="text" name="slider_link_custom" class="" value="'. esc_html($slider_link_custom) .'" />';
	echo '</div>';

 	$slider_link_target = 'same';
 	
 	// Get the slider link target field
 	if ( isset( $custom_fields["slider_link_target"][0] ) ) {
 		$slider_link_target = $custom_fields["slider_link_target"][0];
 	}
	
 	// Create the slider link target field
	echo '<div id="slider_link_target" class="section">';
	echo '<label>Open link in</label>';
	
	$dropdown = '<select name="slider_link_target">';
	$dropdown .= '<option value="same"';
	if ( $slider_link_target == 'same' ) $dropdown .= 'selected';
	$dropdown .= '>Same Window</option>';
	$dropdown .= '<option value="new"';
	if ( $slider_link_target == 'new' ) $dropdown .= 'selected';
	$dropdown .= '>New Window</option>';
	$dropdown .= '</select>';
	echo $dropdown;
	
	echo '</div>';
}

function shopstar_create_slider_shortcode_field(){
 	global $post;
 	$custom_fields = get_post_custom($post->ID);
 	$slider_shortcode = $custom_fields["slider_shortcode"][0];
	
	echo '<input type="text" name="slider_shortcode" value="'. esc_html($slider_shortcode) .'" />';
}

function shopstar_create_featured_image_text_field(){
 	global $post;
 	$custom_fields = get_post_custom($post->ID);
 	$featured_image_text = $custom_fields["featured_image_text"][0];
 	
 	echo '<textarea name="featured_image_text" style="height: 150px; min-width: 255px; max-width: 100%;">'. esc_html($featured_image_text) .'</textarea>';
 	echo '<i>'. esc_html( __( 'Use <h2></h2> tags around heading text and <p></p> tags around body text.', 'shopstar' ) ) .'</i>';
}

function shopstar_create_header_image_field( $post ){
	global $content_width, $_wp_additional_image_sizes;
	
	$image_id = get_post_meta( $post->ID, 'header_image_id', true );
	$old_content_width = $content_width;
	$content_width = 254;
	
	if ( $image_id && get_post( $image_id ) ) {
		if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
			$thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
		} else {
			$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
		}
		
		if ( ! empty( $thumbnail_html ) ) {
			$content = $thumbnail_html;
			$content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_header_image_button" >' . esc_html__( 'Remove header image', 'shopstar' ) . '</a></p>';
			$content .= '<input type="hidden" id="upload_header_image" name="header_image" value="' . esc_attr( $image_id ) . '" />';
		}
		
		$content_width = $old_content_width;

	} else {
		$content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
		$content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set header image', 'shopstar' ) . '" href="javascript:;" id="upload_header_image_button" class="set-header-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'shopstar' ) . '" data-uploader_button_text="' . esc_attr__( 'Set header image', 'shopstar' ) . '">' . esc_html__( 'Set header image', 'shopstar' ) . '</a></p>';
		$content .= '<input type="hidden" id="upload_header_image" name="header_image" value="" />';

	}
	
	echo $content;	
}

function shopstar_create_header_image_text_field(){
 	global $post;
 	$custom_fields = get_post_custom($post->ID);
 	$header_image_text = $custom_fields["header_image_text"][0];
 	
 	echo '<textarea name="header_image_text" style="height: 150px; min-width: 255px; max-width: 100%;">'. esc_html($header_image_text) .'</textarea>';
 	echo '<i>'. esc_html( __( 'Use <h2></h2> tags around heading text and <p></p> tags around body text.', 'shopstar' ) ) .'</i>';
}

function shopstar_add_meta_boxes(){
	add_meta_box('slider_link_content_container', __( 'Content to link to', 'shopstar' ), 'shopstar_create_slider_link_content_field', array('post'), 'side', 'low');	
	add_meta_box('slider_shortcode_container', __( 'Slider Shortcode', 'shopstar' ), 'shopstar_create_slider_shortcode_field', array('post','page'), 'side', 'low');
	add_meta_box('featured_image_text_container', __( 'Featured Image Text', 'shopstar' ), 'shopstar_create_featured_image_text_field', array('page'), 'side', 'low');
	add_meta_box('header_image_container', __( 'Header Image', 'shopstar' ), 'shopstar_create_header_image_field', array('post'), 'side', 'low');
	add_meta_box('header_image_text_container', __( 'Header Image Text', 'shopstar' ), 'shopstar_create_header_image_text_field', array('post'), 'side', 'low');
}
add_action('admin_init', 'shopstar_add_meta_boxes');

function shopstar_create_add_taxonomy_header_image_field( $term ) {
	global $content_width, $_wp_additional_image_sizes;
	
	$old_content_width = $content_width;
	$content_width = 254;

 	ob_start();
	?>
	
	<div class="form-field" id="header_image_container">
		<label for="term_meta[header_image_id]"><?php echo __( 'Header Image', 'shopstar' ); ?></label>
		<?php
		echo '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
		echo '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set header image', 'shopstar' ) . '" href="javascript:;" id="upload_header_image_button" class="set-header-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'shopstar' ) . '" data-uploader_button_text="' . esc_attr__( 'Set header image', 'shopstar' ) . '">' . esc_html__( 'Set header image', 'shopstar' ) . '</a></p>';
		echo '<input type="hidden" id="upload_header_image" name="term_meta[header_image_id]" value="" />';
		?>
		<p class="description"><?php echo __( 'Choose the header image to display when viewing the archive page of this category', 'shopstar' ); ?></p>
		<?php wp_nonce_field ( 'update_term_meta', 'term_meta_nonce' ); ?>
	</div>
	
	<?php
 	ob_end_flush();
}

function shopstar_create_edit_taxonomy_header_image_field( $term ){
	global $content_width, $_wp_additional_image_sizes;
	
	$term_meta = get_option( "taxonomy_$term->term_id" );
	
	$image_id = intval( $term_meta['header_image_id'] ) ? intval( $term_meta['header_image_id'] ) : 0;
	
	$old_content_width = $content_width;
	$content_width = 254;
	
	ob_start();
	?>
	<tr class="form-field" id="header_image_container">
	<th scope="row" valign="top"><label for="term_meta[header_image_id]"><?php echo __( 'Header Image', 'shopstar' ); ?></label></th>
		<td>	
			<?php
			if ( $image_id && get_post( $image_id ) ) {
				if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
					$thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
				} else {
					$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
				}
				
				if ( ! empty( $thumbnail_html ) ) {
					$content = $thumbnail_html;
					$content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_header_image_button" >' . esc_html__( 'Remove header image', 'shopstar' ) . '</a></p>';
					$content .= '<input type="hidden" id="upload_header_image" name="term_meta[header_image_id]" value="' . esc_attr( $image_id ) . '" />';
				}
				
				$content_width = $old_content_width;
		
			} else {
				$content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
				$content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set header image', 'shopstar' ) . '" href="javascript:;" id="upload_header_image_button" class="set-header-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'shopstar' ) . '" data-uploader_button_text="' . esc_attr__( 'Set header image', 'shopstar' ) . '">' . esc_html__( 'Set header image', 'shopstar' ) . '</a></p>';
				$content .= '<input type="hidden" id="upload_header_image" name="term_meta[header_image_id]" value="" />';
		
			}
			
			echo $content;
			?>
			<p class="description"><?php echo __( 'Choose the header image to display when viewing the archive page of this category', 'shopstar' ); ?></p>
			<?php wp_nonce_field ( 'update_term_meta', 'term_meta_nonce' ); ?>
		</td>
	</tr>
			
	<?php
	ob_end_flush();	
}

function shopstar_create_add_taxonomy_header_image_text_field( $term ) {
 	ob_start();
	?>
	
	<div class="form-field" id="header_image_text_container">
		<label for="term_meta[header_image_text]"><?php echo __( 'Header Image Text', 'shopstar' ); ?></label>
		
		<textarea name="term_meta[header_image_text]" id="term_meta[header_image_text]" rows="5" cols="40"></textarea>
		<p class="description"><?php _e( 'Enter a value for this field', 'shopstar' ); ?></p>
		<?php wp_nonce_field ( 'update_term_meta', 'term_meta_nonce' ) ?>
	</div>
	
	<?php
 	ob_end_flush();
}

function shopstar_create_edit_taxonomy_header_image_text_field( $term ) {
	$term_meta = get_option( "taxonomy_$term->term_id" );

 	ob_start();
	?>

	<tr class="form-field" id="header_image_text_container">
		<th scope="row" valign="top"><label for="term_meta[header_image_text]"><?php echo __( 'Header Image Text', 'shopstar' ); ?></label></th>
		<td>	
			<textarea name="term_meta[header_image_text]" id="term_meta[header_image_text]" rows="5" cols="40"><?php echo esc_attr( $term_meta['header_image_text'] ) ? esc_attr( $term_meta['header_image_text'] ) : ''; ?></textarea>
			<p class="description"><?php _e( 'Enter a value for this field', 'shopstar' ); ?></p>
			<?php wp_nonce_field ( 'update_term_meta', 'term_meta_nonce' ) ?>
		</td>
	</tr>
	
	<?php
 	ob_end_flush();
}

function shopstar_save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = wp_kses_post( stripslashes( $_POST['term_meta'][$key] ) );
			}
		}

		update_option( "taxonomy_$t_id", $term_meta );
	}
}  

function shopstar_category_add_form_fields( $term ) {
	if (!did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}

	shopstar_create_add_taxonomy_header_image_field( $term );
	shopstar_create_add_taxonomy_header_image_text_field( $term );
}

function shopstar_category_edit_form_fields( $term ) {
	if (!did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}

	shopstar_create_edit_taxonomy_header_image_field( $term );
	shopstar_create_edit_taxonomy_header_image_text_field( $term );
}

function shopstar_post_tag_add_form_fields( $term ) {
	if (!did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}

	shopstar_create_add_taxonomy_header_image_field( $term );
	shopstar_create_add_taxonomy_header_image_text_field( $term );
}

function shopstar_post_tag_edit_form_fields( $term ) {
	if (!did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}

	shopstar_create_edit_taxonomy_header_image_field( $term );
	shopstar_create_edit_taxonomy_header_image_text_field( $term );
}

add_action( 'category_add_form_fields', 'shopstar_category_add_form_fields', 10, 2 );
add_action( 'category_edit_form_fields', 'shopstar_category_edit_form_fields', 10, 2 );
add_action( 'create_category', 'shopstar_save_taxonomy_custom_meta', 10, 2 );
add_action( 'edited_category', 'shopstar_save_taxonomy_custom_meta', 10, 2 );

add_action( 'post_tag_add_form_fields', 'shopstar_post_tag_add_form_fields', 10, 2 );
add_action( 'post_tag_edit_form_fields', 'shopstar_post_tag_edit_form_fields', 10, 2 );
add_action( 'create_post_tag', 'shopstar_save_taxonomy_custom_meta', 10, 2 );
add_action( 'edited_post_tag', 'shopstar_save_taxonomy_custom_meta', 10, 2 );

function shopstar_save_custom_meta( $post_id ){
  
	if ( isset( $_POST["slider_link_content"] ) ) {
		update_post_meta( $post_id, 'slider_link_content', $_POST["slider_link_content"]);
	}

	if ( isset( $_POST["slider_link_custom"] ) ) {
		update_post_meta( $post_id, 'slider_link_custom', $_POST["slider_link_custom"]);
	}

	if ( isset( $_POST["slider_link_target"] ) ) {
		update_post_meta( $post_id, 'slider_link_target', $_POST["slider_link_target"]);
	}

	if ( isset( $_POST["slider_shortcode"] ) ) {
		update_post_meta( $post_id, 'slider_shortcode', $_POST["slider_shortcode"]);
	}
	
	if ( isset( $_POST["featured_image_text"] ) ) {
		update_post_meta( $post_id, 'featured_image_text', $_POST["featured_image_text"]);
	}
	
	if( isset( $_POST['header_image'] ) ) {
		$image_id = (int) $_POST['header_image'];
		update_post_meta( $post_id, 'header_image_id', $image_id );
	}	
	
	if ( isset( $_POST["header_image_text"] ) ) {
		update_post_meta( $post_id, 'header_image_text', $_POST["header_image_text"]);
	}

}
add_action('save_post', 'shopstar_save_custom_meta');

add_filter( 'manage_posts_columns', 'shopstar_posts_custom_column_head' );
add_action( 'manage_posts_custom_column' , 'shopstar_posts_custom_column', 10, 2 );

// Add the new column
function shopstar_posts_custom_column_head($defaults) {
	//$featured_image_column_head['featured_image'] = 'Featured Image';
	//array_splice( $defaults, 2, 0, $featured_image_column_head); 
	//$defaults['featured_image'] = 'Featured Image';
	$defaults['post_type'] = '';
	return $defaults;
}

// Add the colum content
function shopstar_posts_custom_column($column_name, $post_ID) {
    $slider_categories = get_theme_mod( 'shopstar-slider-categories' );
    $slider_type = get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) );
    
    //if ( $column_name == 'featured_image' && has_post_thumbnail( $post_ID ) ) {
    //	echo get_the_post_thumbnail( $post_ID, 'thumbnail' );
    //}

	if ( $column_name == 'post_type' && $slider_categories && count( $slider_categories ) > 0 && $slider_type == 'shopstar-slider-default' ) {
		if ( in_category( $slider_categories, $post_ID ) ) {
    		echo '<span style="color: red;">';
    		echo __( 'This post is assigned to the same category as your Default Slider category and will not show in your blog.', 'shopstar' );
    		echo '</span>';
		}
	}
}

function shopstar_update_allowed_tags( $tags ) {
	$tags["h1"] = array();
	$tags["h2"] = array();
	$tags["h3"] = array();
	$tags["h4"] = array();
	$tags["h5"] = array();
	$tags["h6"] = array();
	$tags["p"] 	= array();
	$tags["br"] = array();
	
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'shopstar_update_allowed_tags' );

function shopstar_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false
		),
		array(
			'name'      => 'SiteOrigin Widgets Bundle',
			'slug'      => 'so-widgets-bundle',
			'required'  => false
		),
		array(
			'name'      => 'SiteOrigin CSS',
			'slug'      => 'so-css',
			'required'  => false
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false
		),
		array(
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxt',
			'required'  => false
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false
		),
		array(
			'name'      => 'MailChimp for WordPress',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false
		),
		array(
			'name'      => 'Anti-Spam',
			'slug'      => 'anti-spam',
			'required'  => false
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => false
		)
	);

	$config = array(
		'id'           => 'shopstar',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => ''                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'shopstar_register_required_plugins' );


// Create the custom Social Media Links widget
class shopstar_social_media_links_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'shopstar_social_media_links_widget', 

			// Widget name will appear in UI
			__('Shopstar Social Media Links', 'shopstar'), 

			// Widget description
			array( 'description' => __( 'Displays the social media links set at Appearance > Customize > Social Media Links', 'shopstar' ), ) 
		);
	}

	// Creating the widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// This is where you run the code and display the output
		get_template_part( 'library/template-parts/social-links' );
		
		echo $args['after_widget'];
	}
		
	// Widget back-end 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Contact Us', 'shopstar' );
		}
		// Widget admin form
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title:', 'shopstar' ); ?>
			</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}

// Register and load the custom widgets
function shopstar_load_custom_widgets() {
	register_widget( 'shopstar_social_media_links_widget' );
}
add_action( 'widgets_init', 'shopstar_load_custom_widgets' );


require get_template_directory() . '/update.php';
