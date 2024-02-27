<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package shopstar
 */
global $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if ( get_theme_mod( 'shopstar-layout-site', customizer_library_get_default( 'shopstar-layout-site' ) ) == 'shopstar-layout-site-boxed' ) { ?>
	<div class="boxed container">
<?php
}

global $queried_object, $slider_shortcode;

if (!$queried_object) {
	if ( shopstar_is_woocommerce_activated() && is_woocommerce() ) {
		// If Woocommerce is active and it's the shop page set the queried object to the shop page
		if ( is_shop() ) {
			$queried_object = get_post( get_option( 'woocommerce_shop_page_id' ) );
		}
	} else {
		// Otherwise just get the queried object
		$queried_object = get_queried_object();
	}
}

if ($queried_object) {
	if ( ( !is_front_page() && is_page() ) || is_home() || is_singular('post') ) {
		$custom_fields = get_post_custom($queried_object->ID);
		$slider_shortcode = trim($custom_fields["slider_shortcode"][0]);
	}
	
	// If it's a single post get the header image from the custom field
	if ( is_singular('post') ) {
		$header_image_id = trim($custom_fields["header_image_id"][0]);
		
	// Otherwise get it from the term's custom meta
	} else if ( is_category() || is_tag() ) {
		$term_meta = get_option( "taxonomy_$queried_object->term_id" );
		$header_image_id = intval( $term_meta['header_image_id'] ) ? intval( $term_meta['header_image_id'] ) : 0;
	}
}

global $show_slider, $slider_type;
$show_slider = false;

// Check if a slider should display

// If it's the homepage and the default slider is active
if ( is_front_page() && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-slider-default' ) {
	$show_slider = true;
	$slider_type = 'default';
	
// If it's the homepage and the plugin slider is active and there's a shortcode
} else if ( is_front_page() && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-slider-plugin' && get_theme_mod( 'shopstar-slider-plugin-shortcode', customizer_library_get_default( 'shopstar-slider-plugin-shortcode' ) ) != '' ) {
	$show_slider = true;
	$slider_type = 'plugin';
	
// If it's not the homepage or a secondary blog page and the default slider is active and the slider is set to display on all pages and the page's slider shortcode custom field is empty and the featured image field isn't set along with featured images being set to display as header images
} else if ( ( ( !is_front_page() && is_page() ) || ( shopstar_is_woocommerce_activated() && is_shop() ) || is_home() ) && get_theme_mod( 'shopstar-slider-all-pages', customizer_library_get_default( 'shopstar-slider-all-pages' ) ) && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-slider-default' && empty($slider_shortcode) && !( $queried_object && has_post_thumbnail( $queried_object ) && get_theme_mod( 'shopstar-layout-featured-image-page-headers', customizer_library_get_default( 'shopstar-layout-featured-image-page-headers' ) ) ) ) {
	$show_slider = true;
	$slider_type = 'default';

// If it's not the homepage or a secondary blog page and the plugin slider is active and there's a shortcode and the slider is set to display on all pages and the page's slider shortcode custom field is empty and the featured image field isn't set along with featured images being set to display as header images
} else if ( ( ( !is_front_page() && is_page() ) || ( shopstar_is_woocommerce_activated() && is_shop() ) || is_home() ) && get_theme_mod( 'shopstar-slider-all-pages', customizer_library_get_default( 'shopstar-slider-all-pages' ) ) && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-slider-plugin' && get_theme_mod( 'shopstar-slider-plugin-shortcode', customizer_library_get_default( 'shopstar-slider-plugin-shortcode' ) ) != '' && empty($slider_shortcode) && !( $queried_object && has_post_thumbnail( $queried_object ) && get_theme_mod( 'shopstar-layout-featured-image-page-headers', customizer_library_get_default( 'shopstar-layout-featured-image-page-headers' ) ) ) ) {
	$show_slider = true;
	$slider_type = 'plugin';

// If it's a single post and the default slider is active and the slider is set to display on all blog posts and the post's slider shortcode custom field is empty and the header image custom field is empty
} else if ( is_singular('post') && get_theme_mod( 'shopstar-slider-blog-posts', customizer_library_get_default( 'shopstar-slider-blog-posts' ) ) && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-slider-default' && empty($slider_shortcode) && !( $header_image_id && get_post( $header_image_id ) ) ) {
	$show_slider = true;
	$slider_type = 'default';

// If it's a single post and the plugin slider is active and there's a shortcode and the slider is set to display on all blog posts and the post's slider shortcode custom field is empty and the header image custom field is empty
} else if ( is_singular('post') && get_theme_mod( 'shopstar-slider-blog-posts', customizer_library_get_default( 'shopstar-slider-blog-posts' ) ) && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-slider-plugin' && get_theme_mod( 'shopstar-slider-plugin-shortcode', customizer_library_get_default( 'shopstar-slider-plugin-shortcode' ) ) != '' && empty($slider_shortcode) && !( $header_image_id && get_post( $header_image_id ) ) ) {
	$show_slider = true;
	$slider_type = 'plugin';

// If it's not the homepage and the slider shortcode custom field isn't empty
} else if ( !is_front_page() && !empty($slider_shortcode) ) {
	$show_slider = true;
	$slider_type = 'shortcode';
}

global $show_header_image, $header_image_type;
$show_header_image = false;

// Check if a header image should display

// If it's the homepage and a header image has been set and the slider is disabled
if ( is_front_page() && get_header_image() && get_theme_mod( 'shopstar-slider-type', customizer_library_get_default( 'shopstar-slider-type' ) ) == 'shopstar-no-slider' ) {
	$show_header_image = true;
	$header_image_type = 'theme_settings';

// If it's not the homepage or a secondary blog page and it has a featured image and featured images are set to display as header images
} else if ( ( ( !is_front_page() && is_page() ) || ( shopstar_is_woocommerce_activated() && is_shop() ) || is_home() ) && $queried_object && has_post_thumbnail( $queried_object ) && get_theme_mod( 'shopstar-layout-featured-image-page-headers', customizer_library_get_default( 'shopstar-layout-featured-image-page-headers' ) ) ) {
	$show_header_image = true;
	$header_image_type = 'featured_image';

// If there's a header image ID and an image with that ID exists - this will only be true on posts, categories and tags
} else if ( $header_image_id && get_post( $header_image_id ) ) {
	$show_header_image = true;
	$header_image_type = 'custom_field';
}
?>

    <?php
    if ( get_theme_mod( 'shopstar-header-layout', customizer_library_get_default( 'shopstar-header-layout' ) ) == 'shopstar-header-layout-centered' ) :
		get_template_part( 'library/template-parts/header', 'centered' );
	else :
		get_template_part( 'library/template-parts/header', 'left-aligned' );
	endif;
	?>
	
	<script>
    var shopstarSliderTransitionSpeed = parseInt(<?php echo intval( get_theme_mod( 'shopstar-slider-transition-speed', customizer_library_get_default( 'shopstar-slider-transition-speed' ) ) ); ?>);
    var shopstarSliderTransitionEffect = '<?php echo get_theme_mod( 'shopstar-slider-transition-effect', customizer_library_get_default( 'shopstar-slider-transition-effect' ) ); ?>';
    
    <?php if ( get_theme_mod( 'shopstar-slider-autoscroll', customizer_library_get_default( 'shopstar-slider-autoscroll' ) ) ) : ?>
    	var shopstarSliderSpeed = parseInt(<?php echo intval( get_theme_mod( 'shopstar-slider-speed', customizer_library_get_default( 'shopstar-slider-speed' ) ) ); ?>);
    <?php else : ?>
    	var shopstarSliderSpeed = false;
    <?php endif; ?>

    var shopstarMasonryGridHorizontalOrder = <?php echo get_theme_mod( 'shopstar-blog-masonry-grid-horizontal-order', customizer_library_get_default( 'shopstar-blog-masonry-grid-horizontal-order' ) ); ?>;
	</script>
	
	<?php
	if ( $show_slider ) :
		get_template_part( 'library/template-parts/slider' );
	elseif ( $show_header_image ) :
		get_template_part( 'library/template-parts/header-image' );
	endif;
	?>
		
	<div id="content" class="site-content">
		<div class="container">
			<div class="padder">