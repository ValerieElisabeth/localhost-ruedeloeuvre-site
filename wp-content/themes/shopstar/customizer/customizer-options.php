<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function shopstar_customizer_library_options() {
	// Theme defaults
	$page_content_background_color = '#FFFFFF';
	$primary_color = '#000000';
	$mobile_menu_button_color = '#000000';
	$top_bar_font_color = '#FFFFFF';
	$site_title_font_color = '#000000';
	$nav_menu_font_color = '#000000';
	$nav_menu_rollover_font_color = '#ba2227';
	$slider_font_color = '#FFFFFF';
	$heading_font_color = '#000000';
    $body_font_color = '#4F4F4F';
    $link_font_color = '#939598';
    $link_rollover_font_color = '#4F4F4F';
    $slider_control_button_color = '#000000';
    $button_color = '#000000';
    $footer_color = '#ECEDED';
    $dividing_line_color = '#939598';
    $border_color = '#CCCCCC';
    
    
	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	// Site Identity
	$section = 'title_tagline';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Site Identity', 'shopstar' ),
		'priority' => '25'
	);
	
	if ( ! function_exists( 'has_custom_logo' ) ) {
		$options['shopstar-logo'] = array(
			'id' => 'shopstar-logo',
			'label'   => __( 'Logo', 'shopstar' ),
			'section' => $section,
			'type'    => 'image'
		);
	}
    
    $options['site_branding_padding_top'] = array(
    	'id' => 'site_branding_padding_top',
    	'label'   => __( 'Padding Top', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 50
    );

    $options['site_branding_padding_bottom'] = array(
    	'id' => 'site_branding_padding_bottom',
    	'label'   => __( 'Padding Bottom', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 23
    );
	
	
    // Layout Settings
    $section = 'shopstar-layout';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Layout', 'shopstar' ),
        'priority' => '30'
    );
    
    $choices = array(
        'shopstar-layout-site-full-width' => 'Full Width',
        'shopstar-layout-site-boxed' => 'Boxed'
    );
    $options['shopstar-layout-site'] = array(
        'id' => 'shopstar-layout-site',
        'label'   => __( 'Bound', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'shopstar-layout-site-full-width'
    );
    
    /*
   	TODO: Add a theme setting to toggle the displaying of page titles
    $options['shopstar-layout-display-page-titles'] = array(
    	'id' => 'shopstar-layout-display-page-titles',
    	'label'   => __( 'Display page titles', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    */
    
    $options['shopstar-layout-featured-image-page-headers'] = array(
    	'id' => 'shopstar-layout-featured-image-page-headers',
    	'label'   => __( 'Display Featured Images as header images on pages', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    $options['shopstar-layout-back-to-top'] = array(
    	'id' => 'shopstar-layout-back-to-top',
    	'label'   => __( 'Show the back to top button', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
        
    // Header Settings
    $section = 'shopstar-header';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Header', 'shopstar' ),
    	'priority' => '35'
    );
    $choices = array(
    	'shopstar-header-layout-centered' => 'Centered',
    	'shopstar-header-layout-left-aligned' => 'Left Aligned'
    );
    $options['shopstar-header-layout'] = array(
    	'id' => 'shopstar-header-layout',
    	'label'   => __( 'Layout', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'shopstar-header-layout-centered'
    );
    
    $choices = array(
    	'shopstar-header-bound-boxed' => 'Boxed',
    	'shopstar-header-bound-full-width' => 'Full Width'
    );
    $options['shopstar-header-bound'] = array(
    	'id' => 'shopstar-header-bound',
    	'label'   => __( 'Bound', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'shopstar-header-bound-boxed'
    );
    
    $options['shopstar-header-sticky'] = array(
    	'id' => 'shopstar-header-sticky',
    	'label'   => __( 'Sticky', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    );
    $options['shopstar-header-sticky-logo'] = array(
    	'id' => 'shopstar-header-sticky-logo',
    	'label'   => __( 'Include logo / site title and description in sticky header', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    );
    $options['shopstar-show-header-top-bar'] = array(
    	'id' => 'shopstar-show-header-top-bar',
    	'label'   => __( 'Show Top Bar', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    $options['shopstar-header-info-text'] = array(
    	'id' => 'shopstar-header-info-text',
    	'label'   => __( 'Info Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( '<strong>CALL US:</strong> 555-SHOPSTAR', 'shopstar')
    );
    
    // Social Settings
    $section = 'shopstar-social';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Social Media Links', 'shopstar' ),
    	'priority' => '35'
    );
    
    $choices = array(
    	'shopstar-social-pronoun-individual' => 'Individual',
    	'shopstar-social-pronoun-group' => 'Group'
    );
    $options['shopstar-social-pronoun'] = array(
    	'id' => 'shopstar-social-pronoun',
    	'label'   => __( 'Are you an individual or a group?', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'shopstar-social-pronoun-group'
    );
    
    $options['shopstar-social-email'] = array(
    	'id' => 'shopstar-social-email',
    	'label'   => __( 'Email Address', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-skype'] = array(
    	'id' => 'shopstar-social-skype',
    	'label'   => __( 'Skype Name', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-facebook'] = array(
    	'id' => 'shopstar-social-facebook',
    	'label'   => __( 'Facebook', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-twitter'] = array(
    	'id' => 'shopstar-social-twitter',
    	'label'   => __( 'Twitter', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-google-plus'] = array(
    	'id' => 'shopstar-social-google-plus',
    	'label'   => __( 'Google Plus', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-youtube'] = array(
    	'id' => 'shopstar-social-youtube',
    	'label'   => __( 'YouTube', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-instagram'] = array(
    	'id' => 'shopstar-social-instagram',
    	'label'   => __( 'Instagram', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-pinterest'] = array(
    	'id' => 'shopstar-social-pinterest',
    	'label'   => __( 'Pinterest', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-linkedin'] = array(
    	'id' => 'shopstar-social-linkedin',
    	'label'   => __( 'LinkedIn', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-tumblr'] = array(
    	'id' => 'shopstar-social-tumblr',
    	'label'   => __( 'Tumblr', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-flickr'] = array(
    	'id' => 'shopstar-social-flickr',
    	'label'   => __( 'Flickr', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    );
    $options['shopstar-social-yelp'] = array(
    	'id' => 'shopstar-social-yelp',
    	'label'   => __( 'Yelp', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-vimeo'] = array(
    	'id' => 'shopstar-social-vimeo',
    	'label'   => __( 'Vimeo', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-etsy'] = array(
    	'id' => 'shopstar-social-etsy',
    	'label'   => __( 'Etsy', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-tripadvisor'] = array(
    	'id' => 'shopstar-social-tripadvisor',
    	'label'   => __( 'TripAdvisor', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-yahoo-groups'] = array(
    	'id' => 'shopstar-social-yahoo-groups',
    	'label'   => __( 'Yahoo! Groups', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-snapchat'] = array(
    	'id' => 'shopstar-social-snapchat',
    	'label'   => __( 'Snapchat', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-behance'] = array(
    	'id' => 'shopstar-social-behance',
    	'label'   => __( 'Behance', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-soundcloud'] = array(
    	'id' => 'shopstar-social-soundcloud',
    	'label'   => __( 'SoundCloud', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-xing'] = array(
    	'id' => 'shopstar-social-xing',
    	'label'   => __( 'Xing', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['shopstar-social-custom-icon-code'] = array(
    	'id' => 'shopstar-social-custom-icon-code',
    	'label'   => __( 'Custom Icon Font Awesome Code', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'description' => __( 'Insert the code of the Font Awesome icon you wish to display eg. fa-suitcase. 
    						You can view all available icons <a href="http://fontawesome.io/cheatsheet/" target="_blank">here</a>.', 'shopstar' )
    );
    $options['shopstar-social-custom-icon-url'] = array(
    	'id' => 'shopstar-social-custom-icon-url',
    	'label'   => __( 'Custom Icon URL', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'description' => __( 'Insert the URL that you would like your custom icon to link to', 'shopstar' )
    );
    
    
    // Search Settings
    $section = 'shopstar-search';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Search', 'shopstar' ),
    	'priority' => '35'
    );
    
    $options['shopstar-search-results-full-width'] = array(
    	'id' => 'shopstar-search-results-full-width',
    	'label'   => __( 'Full width search results page', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    $options['shopstar-header-search'] = array(
    	'id' => 'shopstar-header-search',
    	'label'   => __( 'Show Search in the Navigation Menu', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $options['shopstar-navigation-menu-search-button-text'] = array(
    	'id' => 'shopstar-navigation-menu-search-button-text',
    	'label'   => __( 'Navigation Menu Search Button Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Search', 'shopstar' )
    );
    
    $options['shopstar-search-placeholder-text'] = array(
    	'id' => 'shopstar-search-placeholder-text',
    	'label'   => __( 'Default Search Input Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Search...', 'shopstar' )
    );    
    
    $options['shopstar-website-text-no-search-results-heading'] = array(
    	'id' => 'shopstar-website-text-no-search-results-heading',
    	'label'   => __( 'No Search Results Found Heading', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Nothing Found!', 'shopstar')
    );
    $options['shopstar-website-text-no-search-results-text'] = array(
        'id' => 'shopstar-website-text-no-search-results-text',
        'label'   => __( 'No Search Results Found Message', 'shopstar' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shopstar')
    );
    
    
    // Mobile Menu Settings
    $section = 'shopstar-mobile-menu';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Mobile', 'shopstar' ),
    	'priority' => '35'
    );
    
	$options['shopstar-mobile-logo'] = array(
		'id' => 'shopstar-mobile-logo',
		'label'   => __( 'Mobile Logo', 'shopstar' ),
		'section' => $section,
		'type'    => 'image'
	);
	
    $options['shopstar-mobile-logo-breakpoint'] = array(
    	'id' => 'shopstar-mobile-logo-breakpoint',
    	'label'   => __( 'Mobile Logo Activation Width', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 600,
    	'description' => __( 'The screen width in pixels at which the mobile logo will appear', 'shopstar' )
    );
    
	$options['shopstar-mobile-menu-button-color'] = array(
		'id' => 'shopstar-mobile-menu-button-color',
		'label'   => __( 'Mobile Menu Button Color', 'shopstar' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $mobile_menu_button_color
	);
    
    $choices = array(
    	'shopstar-mobile-menu-primary-color-scheme' => 'Primary Color',
    	'shopstar-mobile-menu-footer-color-scheme' => 'Footer Color'
    );
    $options['shopstar-mobile-menu-color-scheme'] = array(
    	'id' => 'shopstar-mobile-menu-color-scheme',
    	'label'   => __( 'Color Scheme', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'shopstar-mobile-menu-primary-color-scheme'
    );    

    $options['shopstar-mobile-menu-breakpoint'] = array(
    	'id' => 'shopstar-mobile-menu-breakpoint',
    	'label'   => __( 'Mobile Menu Breakpoint', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 960,
    	'description' => __( 'The screen width in pixels when the menu will go into mobile mode.', 'shopstar' )
    );

    $options['shopstar-mobile-back-to-top'] = array(
    	'id' => 'shopstar-mobile-back-to-top',
    	'label'   => __( 'Show the back to top button on mobile', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $options['shopstar-mobile-fitvids'] = array(
    	'id' => 'shopstar-mobile-fitvids',
    	'label'   => __( 'Enable FitVids', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    	'description' => __( 'Include FitVids.js for fluid width video embeds', 'shopstar' )
    );
    
    
    // Slider Settings
    $section = 'shopstar-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider', 'shopstar' ),
        'priority' => '35'
    );
    
    $choices = array(
        'shopstar-slider-default' => 'Default Slider',
        'shopstar-slider-plugin' => 'Slider Plugin',
        'shopstar-no-slider' => 'None'
    );
    $options['shopstar-slider-type'] = array(
        'id' => 'shopstar-slider-type',
        'label'   => __( 'Choose a Slider', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices
    );
    
	// Check for the otb_shopstar_dot_org setting to honour the free version of the theme 
    if ( get_theme_mod( 'otb_shopstar_dot_org' ) ) {
    	$options['shopstar-slider-type']['default'] = 'shopstar-no-slider';
    } else {
    	$options['shopstar-slider-type']['default'] = 'shopstar-slider-default';
    }    
    
	$options['shopstar-slider-categories'] = array(
		'id' => 'shopstar-slider-categories',
		'label'   => __( 'Slider Categories', 'shopstar' ),
		'section' => $section,
		'type'    => 'dropdown-categories',
		'description' => __( 'Select the categories of the posts you want to display in the slider. The featured image will be the slide image and the post content will display over it. Hold down the Ctrl (windows) / Command (Mac) button to select multiple categories.', 'shopstar' )
	);
	
    $options['shopstar-slider-all-pages'] = array(
    	'id' => 'shopstar-slider-all-pages',
    	'label'   => __( 'Display the slider on all pages', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    );
    
    $options['shopstar-slider-blog-posts'] = array(
    	'id' => 'shopstar-slider-blog-posts',
    	'label'   => __( 'Display the slider on the blog posts', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    );
    
    $options['shopstar-slider-has-min-width'] = array(
    	'id' => 'shopstar-slider-has-min-width',
    	'label'   => __( 'Slider has a minimum width', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $options['shopstar-slider-min-width'] = array(
    	'id' => 'shopstar-slider-min-width',
    	'label'   => __( 'Minimum Width', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 600
    );
	
    $options['shopstar-slider-transition-speed'] = array(
    	'id' => 'shopstar-slider-transition-speed',
    	'label'   => __( 'Slide Transition Speed', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'milliseconds',
    	'default' => 450,
    	'description' => __( 'The speed it takes to transition between slides in milliseconds. 1000 milliseconds equals 1 second.', 'shopstar' )
    );
    $choices = array(
    	'uncover-fade' => 'Uncover Fade',
    	'uncover' => 'Uncover',
    	'cover-fade' => 'Cover Fade',
    	'cover' => 'Cover',
    	'fade' => 'Fade',
    	'crossfade' => 'Crossfade',
    	'scroll' => 'Scroll',
    	'directscroll' => 'Direct Scroll'
    );
    $options['shopstar-slider-transition-effect'] = array(
    	'id' => 'shopstar-slider-transition-effect',
    	'label'   => __( 'Choose a Transition Effect', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'uncover-fade'
    );
    $options['shopstar-slider-autoscroll'] = array(
    	'id' => 'shopstar-slider-autoscroll',
    	'label'   => __( 'Slideshow', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    	'description' => __( 'Autoscroll the slider to create a slideshow effect.', 'shopstar' )
    );
    $options['shopstar-slider-speed'] = array(
    	'id' => 'shopstar-slider-speed',
    	'label'   => __( 'Slideshow Speed', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'milliseconds',
    	'default' => 2500,
    	'description' => __( 'The speed of the slideshow in milliseconds. 1000 milliseconds equals 1 second.', 'shopstar' )
    );
    
    $options['shopstar-slider-plugin-shortcode'] = array(
    	'id' => 'shopstar-slider-plugin-shortcode',
    	'label'   => __( 'Slider Shortcode', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'description' => __( 'Enter the shortcode given by the slider plugin you\'re using.', 'shopstar' )
    );
    
    
    // Header Image
    $section = 'header_image';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Header Image', 'shopstar' ),
    	'priority' => '35'
    );
    
    $options['shopstar-header-image-text'] = array(
    	'id' => 'shopstar-header-image-text',
    	'label'   => __( 'Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'textarea',
    	'default' => __( '<h2>Minimalist Shopping Theme</h2><p>Super stylish functionality!</p>', 'shopstar' )
    );    

    $options['shopstar-header-image-link-content'] = array(
    	'id' => 'shopstar-header-image-link-content',
    	'label'   => __( 'Content to link to', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'dropdown-pages-posts',
    	'description' => __( 'Select the page or post you would like your Header Image to link to.', 'shopstar' )
    );    


    // WooCommerce
    $section = 'woocommerce';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'WooCommerce', 'shopstar' ),
    	'priority' => '35'
    );

    $options['shopstar-header-shop-links'] = array(
    	'id' => 'shopstar-header-shop-links',
    	'label'   => __( 'Display Shop Links', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
		'description' => __( 'Show the My Account and Checkout links in the Top Bar', 'shopstar' )
    );
    
    $options['shopstar-layout-woocommerce-shop-full-width'] = array(
    	'id' => 'shopstar-layout-woocommerce-shop-full-width',
    	'label'   => __( 'Full width shop page', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    );

    $options['shopstar-woocommerce-breadcrumbs'] = array(
    	'id' => 'shopstar-woocommerce-breadcrumbs',
    	'label'   => __( 'Display breadcrumbs', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $options['shopstar-woocommerce-product-image-zoom'] = array(
    	'id' => 'shopstar-woocommerce-product-image-zoom',
    	'label'   => __( 'Enable zoom on product image', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    // Colors
    $section = 'colors';
    $font_choices = customizer_library_get_font_choices();
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Colors', 'shopstar' ),
    	'priority' => '25'
    );

    $options['shopstar-page-content-background-color'] = array(
    	'id' => 'shopstar-page-content-background-color',
    	'label'   => __( 'Page Content Background Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $page_content_background_color,
    );
    
    /*
	$options['shopstar-top-bar-font-color'] = array(
		'id' => 'shopstar-top-bar-font-color',
		'label'   => __( 'Top Bar Font and Icon Color', 'shopstar' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $top_bar_font_color,
	);
	*/
	
    $options['shopstar-primary-color'] = array(
    	'id' => 'shopstar-primary-color',
    	'label'   => __( 'Primary Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $primary_color,
    );
    
    $options['shopstar-slider-control-button-color'] = array(
    	'id' => 'shopstar-slider-control-button-color',
    	'label'   => __( 'Slider Prev / Next Button Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $slider_control_button_color,
    );
    
    $options['shopstar-button-color'] = array(
    	'id' => 'shopstar-button-color',
    	'label'   => __( 'Button Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $button_color,
    );
    
    $options['shopstar-footer-color'] = array(
    	'id' => 'shopstar-footer-color',
    	'label'   => __( 'Footer Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $footer_color,
    );
	
    /*
    $options['shopstar-dividing-line-color'] = array(
    	'id' => 'shopstar-dividing-line-color',
    	'label'   => __( 'Dividing Line Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $dividing_line_color,
    );
    
    $options['shopstar-border-color'] = array(
    	'id' => 'shopstar-footer-color',
    	'label'   => __( 'Border Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $border_color,
    );
    */
    
	// Font Settings
	$section = 'shopstar-fonts';
    $font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Fonts', 'shopstar' ),
		'priority' => '25'
	);

	$options['shopstar-site-title-font'] = array(
		'id' => 'shopstar-site-title-font',
		'label'   => __( 'Site Title Font', 'shopstar' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Prata'
	);
	
    $choices = array(
    	'thin' => 'Thin',
    	'light' => 'Light',
    	'normal' => 'Normal',
    	'semi-bold' => 'Semi-bold',
    	'bold' => 'Bold',
    	'extra-bold' => 'Extra Bold'
    );
    $options['shopstar-site-title-font-weight'] = array(
    	'id' => 'shopstar-site-title-font-weight',
    	'label'   => __( 'Site Title Font Weight', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'normal'
    );
	
	$options['shopstar-site-title-font-color'] = array(
		'id' => 'shopstar-site-title-font-color',
		'label'   => __( 'Site Title Font Color', 'shopstar' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $site_title_font_color,
	);
	
	$options['shopstar-site-title-font-size'] = array(
		'id' => 'shopstar-site-title-font-size',
		'label'   => __( 'Site Title Font Size', 'shopstar' ),
		'section' => $section,
		'type'    => 'pixels',
		'default' => 55
	);
	
	$options['shopstar-nav-menu-font-color'] = array(
		'id' => 'shopstar-nav-menu-font-color',
		'label'   => __( 'Nav Menu Font Color', 'shopstar' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $nav_menu_font_color,
	);
	$options['shopstar-nav-menu-rollover-font-color'] = array(
		'id' => 'shopstar-nav-menu-rollover-font-color',
		'label'   => __( 'Nav Menu Rollover Font Color', 'shopstar' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $nav_menu_rollover_font_color,
	);
	
	$options['shopstar-slider-font-color'] = array(
		'id' => 'shopstar-slider-font-color',
		'label'   => __( 'Slider Font Color', 'shopstar' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $slider_font_color,
	);
	
	$options['shopstar-slider-text-shadow'] = array(
		'id' => 'shopstar-slider-text-shadow',
		'label'   => __( 'Display a drop shadow on the slider / header image text.', 'shopstar' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0
	);

	$options['shopstar-heading-font'] = array(
		'id' => 'shopstar-heading-font',
		'label'   => __( 'Heading Font', 'shopstar' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Raleway'
	);
	$options['shopstar-heading-font-color'] = array(
		'id' => 'shopstar-heading-font-color',
		'label'   => __( 'Heading Font Color', 'shopstar' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $heading_font_color,
	);
	
    $options['shopstar-body-font'] = array(
        'id' => 'shopstar-body-font',
        'label'   => __( 'Body Font', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Lato'
    );
    
    /*
    $choices = array(
    	'300' => 'Light',
    	'400' => 'Normal'
    );    
    $options['shopstar-body-font-weight'] = array(
    	'id' => 'shopstar-body-font-weight',
    	'label'   => __( 'Body Font Weight', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => '300'
    );
    */
    
    $options['shopstar-body-font-color'] = array(
        'id' => 'shopstar-body-font-color',
        'label'   => __( 'Body Font Color', 'shopstar' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );

    $options['shopstar-link-font-color'] = array(
    	'id' => 'shopstar-link-font-color',
    	'label'   => __( 'Link Font Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $link_font_color,
    );
    $options['shopstar-link-rollover-font-color'] = array(
    	'id' => 'shopstar-link-rollover-font-color',
    	'label'   => __( 'Link Rollover Font Color', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'color',
    	'default' => $link_rollover_font_color,
    );
    

    // Styling Settings
    /*
    $section = 'shopstar-styling';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Styling', 'shopstar' ),
        'priority' => '25'
    );
    
    $choices = array(
		'fashionista' => 'Fashionista',
        'istore' => 'iStore',
        'mmminimal' => 'Mmminimal',
    	'hipster' => 'Hipster',
    	'closet' => 'Out the Closet'
    );
    $options['shopstar-styling-vibe'] = array(
        'id' => 'shopstar-styling-vibe',
        'label'   => __( 'Choose your vibe', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'fashionista',
    	'description' => 'Choose from the list of theme setting configurations below. All of the configurations can be tweaked to your liking using the customizer.'
    );
    */
    
    // Blog Settings
    $section = 'shopstar-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog', 'shopstar' ),
        'priority' => '50'
    );
    
    $choices = array(
        'blog-post-side-layout' => 'Side',
        'blog-post-top-layout' => 'Top',
    	'blog-post-masonry-grid-layout' => 'Masonry Grid'
    );
    $options['shopstar-blog-layout'] = array(
        'id' => 'shopstar-blog-layout',
        'label'   => __( 'Blog Post Layout', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-post-side-layout'
    );
    
    $choices = array(
        '2' => 'Two',
        '3' => 'Three',
    	'4' => 'Four',
    	'5' => 'Five'
    );
    $options['shopstar-blog-masonry-grid-columns'] = array(
        'id' => 'shopstar-blog-masonry-grid-columns',
        'label'   => __( 'Number of columns', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => '3'
    );
    
    $options['shopstar-blog-masonry-grid-horizontal-order'] = array(
    	'id' => 'shopstar-blog-masonry-grid-horizontal-order',
    	'label'   => __( 'Maintain horizontal left-to-right order', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );

    $options['shopstar-blog-masonry-grid-border'] = array(
    	'id' => 'shopstar-blog-masonry-grid-border',
    	'label'   => __( 'Display a border around posts', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    
    $options['shopstar-blog-masonry-grid-gutter'] = array(
    	'id' => 'shopstar-blog-masonry-grid-gutter',
    	'label'   => __( 'Post Gutter', 'shopstar' ),
    	'section' => $section,
		'type'    => 'percentage',
    	'default' => 2.6,
    	'description' => 'This is the spacing between the posts. It can contain decimal values. For best results it should be an even number.'
    );
    
    $choices = array(
		'shopstar-blog-archive-layout-full' => 'Full Post',
		'shopstar-blog-archive-layout-excerpt' => 'Post Excerpt'
    );
    $options['shopstar-blog-archive-layout'] = array(
        'id' => 'shopstar-blog-archive-layout',
        'label'   => __( 'Archive Layout', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'shopstar-blog-archive-layout-full'
    );
    
    $options['shopstar-blog-excerpt-length'] = array(
    	'id' => 'shopstar-blog-excerpt-length',
    	'label'   => __( 'Excerpt Length', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 55
    );
    
    $options['shopstar-blog-read-more-text'] = array(
    	'id' => 'shopstar-blog-read-more-text',
    	'label'   => __( 'Read More Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 'Read More'
    );

    $options['shopstar-blog-featured-image-clickable'] = array(
    	'id' => 'shopstar-blog-featured-image-clickable',
    	'label'   => __( 'Link Featured Image to single post', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    $options['shopstar-blog-crop-featured-image'] = array(
    	'id' => 'shopstar-blog-crop-featured-image',
    	'label'   => __( 'Crop Featured Image', 'shopstar' ),
    	'section' => $section,
		'type'    => 'checkbox',
    	'default' => 1,
    	'description' => __( '<strong>Please note:</strong> This change won\'t affect existing images in your media library. You can use the <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a> plugin to regenerate these.', 'shopstar' ),
    );
    
    $options['shopstar-blog-full-width-archive'] = array(
    	'id' => 'shopstar-blog-full-width-archive',
    	'label'   => __( 'Full width archive page', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox'
    );
    
	// Check for the shopstar-blog-full-width setting and honour it's current value as the default value if it exists
    if ( get_theme_mod( 'shopstar-blog-full-width' ) ) {
    	$options['shopstar-blog-full-width-archive']['default'] = get_theme_mod( 'shopstar-blog-full-width' );
    } else {
    	$options['shopstar-blog-full-width-archive']['default'] = 0;
    }

    $options['shopstar-blog-full-width-single'] = array(
    	'id' => 'shopstar-blog-full-width-single',
    	'label'   => __( 'Full width single post', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
   	
	// Check for the shopstar-blog-full-width setting and honour it's current value as the default value if it exists
    if ( get_theme_mod( 'shopstar-blog-full-width' ) ) {
    	$options['shopstar-blog-full-width-single']['default'] = get_theme_mod( 'shopstar-blog-full-width' );
    } else {
    	$options['shopstar-blog-full-width-single']['default'] = 0;
    }
    
    /*
    TODO: Add a theme setting to toggle the displaying of post titles
    $options['shopstar-layout-display-post-titles'] = array(
    	'id' => 'shopstar-layout-display-post-titles',
    	'label'   => __( 'Display post titles', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    */
    
    $options['shopstar-blog-featured-image'] = array(
    	'id' => 'shopstar-blog-featured-image',
    	'label'   => __( 'Display Featured Image on single post', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    
    /*
    $options['shopstar-blog-display-date'] = array(
    	'id' => 'shopstar-blog-display-date',
    	'label'   => __( 'Display date', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    
    $options['shopstar-blog-display-author'] = array(
    	'id' => 'shopstar-blog-display-author',
    	'label'   => __( 'Display author', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    
    $options['shopstar-blog-display-meta-data'] = array(
    	'id' => 'shopstar-blog-display-meta-data',
    	'label'   => __( 'Display tags and categories', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    
    $options['shopstar-blog-display-comment-count'] = array(
    	'id' => 'shopstar-blog-display-comment-count',
    	'label'   => __( 'Display comment count', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );    
    */
    
    $options['shopstar-blog-display-category-page-title-prefix'] = array(
    	'id' => 'shopstar-blog-display-category-page-title-prefix',
    	'label'   => __( 'Display title prefix on category page', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    
    $options['shopstar-blog-display-tag-page-title-prefix'] = array(
    	'id' => 'shopstar-blog-display-tag-page-title-prefix',
    	'label'   => __( 'Display title prefix on tag page', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );
    
    
    // Site Text Settings
    $section = 'shopstar-website-text';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'shopstar' ),
        'priority' => '50'
    );
    $options['shopstar-website-text-404-page-heading'] = array(
        'id' => 'shopstar-website-text-404-page-heading',
        'label'   => __( '404 Page Heading', 'shopstar' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( '404!', 'shopstar')
    );
    $options['shopstar-website-text-404-page-text'] = array(
        'id' => 'shopstar-website-text-404-page-text',
        'label'   => __( '404 Page Message', 'shopstar' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'The page you were looking for cannot be found!', 'shopstar')
    );

    
    // Footer Settings
    $section = 'shopstar-footer';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Footer', 'shopstar' ),
    	'priority' => '50'
    );
    
    $options['shopstar-layout-display-footer-widgets'] = array(
    	'id' => 'shopstar-layout-display-footer-widgets',
    	'label'   => __( 'Display the footer widgets', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $choices = array(
        'one' => 'One',
    	'two' => 'Two',
    	'three' => 'Three',
    	'four' => 'Four',
    	'five' => 'Five'
    );
    $options['shopstar-footer-widget-amount'] = array(
        'id' => 'shopstar-footer-widget-amount',
        'label'   => __( 'Number of widgets to display per row', 'shopstar' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'four'
    );
    
    $options['shopstar-footer-display-bottom-bar'] = array(
    	'id' => 'shopstar-footer-display-bottom-bar',
    	'label'   => __( 'Display the footer bottom bar', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    );
    
    $choices = array(
    	'shopstar-footer-bottom-bar-layout-standard' => 'Standard',
    	'shopstar-footer-bottom-bar-layout-centered' => 'Centered'
    );
    $options['shopstar-footer-bottom-bar-layout'] = array(
    	'id' => 'shopstar-footer-bottom-bar-layout',
    	'label'   => __( 'Bottom Bar Layout', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'shopstar-footer-bottom-bar-layout-centered'
    );
        
    $options['shopstar-footer-copyright-text'] = array(
    	'id' => 'shopstar-footer-copyright-text',
    	'label'   => __( 'Copyright Text', 'shopstar' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Theme by <a href="http://www.outtheboxthemes.com">Out the Box</a>', 'shopstar' )
    );    
    
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'shopstar_customizer_library_options' );
