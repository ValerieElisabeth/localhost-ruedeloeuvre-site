/**
 * Shopstar Customizer Custom Functionality
 *
 */
( function( $ ) {
	
	function shopstar_set_option( id, value ) {
		var api = wp.customize;
		
		var control = api.control.instance( id );
	    control.setting.set( value );
	    return;
	}	
    
    $( window ).load( function() {
    	
    	// Set the vibe
    	/*
        var vibe = $( '#customize-control-shopstar-styling-vibe select' ).val();
        shopstar_set_the_vibe( vibe );
        
        $( '#customize-control-shopstar-styling-vibe select' ).on( 'change', function() {
        	vibe = $( this ).val();
        	shopstar_set_the_vibe( vibe );
        } );
        
        function shopstar_set_the_vibe( vibe ) {

        	switch( vibe ) {
	            case 'fashionista':
	            	shopstar_set_option( 'shopstar-top-bar-font-color', '#FFFFFF');
	            	shopstar_set_option( 'background_color', '#FFFFFF');
	            	shopstar_set_option( 'shopstar-primary-color', '#000000');
	            	shopstar_set_option( 'shopstar-button-color', '#000000');
	            	shopstar_set_option( 'shopstar-site-title-font', 'Prata' );
	            	shopstar_set_option( 'shopstar-site-title-font-color', '#000000' );
	            	shopstar_set_option( 'shopstar-site-title-font-weight', 'thin' )
	            	shopstar_set_option( 'shopstar-heading-font', 'Raleway' );
	                break;
	            case 'istore':
	            	shopstar_set_option( 'shopstar-top-bar-font-color', '#000000');
	            	shopstar_set_option( 'background_color', '#FFFFFF');
	            	shopstar_set_option( 'shopstar-primary-color', '#FFFFFF');
	            	shopstar_set_option( 'shopstar-button-color', '#000000');
	            	shopstar_set_option( 'shopstar-site-title-font', 'Roboto' );
	            	shopstar_set_option( 'shopstar-site-title-font-color', '#000000' );
	            	shopstar_set_option( 'shopstar-site-title-font-weight', 'thin' )
	            	shopstar_set_option( 'shopstar-heading-font', 'Raleway' );
	                break;
	            case 'hipster':
	            	shopstar_set_option( 'shopstar-top-bar-font-color', '#eae8d7');
	            	shopstar_set_option( 'background_color', '#eae8d7');
	            	shopstar_set_option( 'shopstar-primary-color', '#895f2e');
	            	shopstar_set_option( 'shopstar-button-color', '#895f2e');
	            	shopstar_set_option( 'shopstar-site-title-font', 'Lobster' );
	            	shopstar_set_option( 'shopstar-site-title-font-color', '#000000' );
	            	shopstar_set_option( 'shopstar-heading-font', 'Cabin' );
	                break;
	            case 'closet':
	            	shopstar_set_option( 'shopstar-top-bar-font-color', '#FFFFFF');
	            	shopstar_set_option( 'background_color', '#FFFFFF');
	            	shopstar_set_option( 'shopstar-primary-color', '#f258f4');
	            	shopstar_set_option( 'shopstar-button-color', '#f258f4');
	            	shopstar_set_option( 'shopstar-site-title-font', 'Molle' );
	            	shopstar_set_option( 'shopstar-site-title-font-color', '#f258f4' );
	            	shopstar_set_option( 'shopstar-heading-font', 'Raleway' );
	                break;
        	}
        }
        */
    	
    	// Show / hide site layout options
        var siteLayout = $( '#customize-control-shopstar-layout-site select' ).val();
        shopstar_toggle_site_layout_options( siteLayout );
        
        $( '#customize-control-shopstar-layout-site select' ).on( 'change', function() {
        	siteLayout = $( this ).val();
        	shopstar_toggle_site_layout_options( siteLayout );
        } );
        
        function shopstar_toggle_site_layout_options( siteLayout ) {
            if ( siteLayout == 'shopstar-layout-site-full-width' ) {
                $( '#customize-control-shopstar-page-content-background-color' ).hide();
                
            } else if ( siteLayout == 'shopstar-layout-site-boxed' ) {
                $( '#customize-control-shopstar-page-content-background-color' ).show();
                
            }
        }         
    	
        // Show / hide sticky header options
    	shopstar_toggle_sticky_header_options();
    	
        $( '#customize-control-shopstar-header-sticky input' ).on( 'change', function() {
        	shopstar_toggle_sticky_header_options();
        } );
        
        function shopstar_toggle_sticky_header_options() {
        	if ( $( '#customize-control-shopstar-header-sticky input' ).prop('checked') ) {
        		$( '#customize-control-shopstar-header-sticky-logo' ).show();
        	} else {
        		$( '#customize-control-shopstar-header-sticky-logo' ).hide();
        	}
        }        
        
    	// Show / hide slider options
        var sliderType = $( '#customize-control-shopstar-slider-type select' ).val();
        shopstar_toggle_slider_options( sliderType );
        
        $( '#customize-control-shopstar-slider-type select' ).on( 'change', function() {
        	sliderType = $( this ).val();
        	shopstar_toggle_slider_options( sliderType );
        } );
        
        function shopstar_toggle_slider_options( sliderType ) {
            if ( sliderType == 'shopstar-slider-default' ) {
                $( '#customize-control-shopstar-slider-categories' ).show();
                $( '#customize-control-shopstar-slider-all-pages' ).show();
                $( '#customize-control-shopstar-slider-blog-posts' ).show();
                $( '#customize-control-shopstar-slider-has-min-width' ).show();
                $( '#customize-control-shopstar-slider-min-width' ).show();
                $( '#customize-control-shopstar-slider-transition-speed' ).show();
                $( '#customize-control-shopstar-slider-transition-effect' ).show();
                $( '#customize-control-shopstar-slider-autoscroll' ).show();
                $( '#customize-control-shopstar-slider-speed' ).show();
                $( '#customize-control-shopstar-slider-plugin-shortcode' ).hide();
                
            } else if ( sliderType == 'shopstar-slider-plugin' ) {
                $( '#customize-control-shopstar-slider-categories' ).hide();
                $( '#customize-control-shopstar-slider-all-pages' ).show();
                $( '#customize-control-shopstar-slider-blog-posts' ).show();
                $( '#customize-control-shopstar-slider-has-min-width' ).hide();
                $( '#customize-control-shopstar-slider-min-width' ).hide();
                $( '#customize-control-shopstar-slider-transition-speed' ).hide();
                $( '#customize-control-shopstar-slider-transition-effect' ).hide();
                $( '#customize-control-shopstar-slider-autoscroll' ).hide();
                $( '#customize-control-shopstar-slider-speed' ).hide();
                $( '#customize-control-shopstar-slider-plugin-shortcode' ).show();
                
            } else {
                $( '#customize-control-shopstar-slider-categories' ).hide();
                $( '#customize-control-shopstar-slider-all-pages' ).hide();
                $( '#customize-control-shopstar-slider-blog-posts' ).hide();
                $( '#customize-control-shopstar-slider-has-min-width' ).hide();
                $( '#customize-control-shopstar-slider-min-width' ).hide();
                $( '#customize-control-shopstar-slider-transition-speed' ).hide();
                $( '#customize-control-shopstar-slider-transition-effect' ).hide();
                $( '#customize-control-shopstar-slider-autoscroll' ).hide();
                $( '#customize-control-shopstar-slider-speed' ).hide();
                $( '#customize-control-shopstar-slider-plugin-shortcode' ).hide();
                
            }
        }    	
        
        // Show / hide slider min width
        shopstar_toggle_slider_min_width();
    	
        $( '#customize-control-shopstar-slider-has-min-width input' ).on( 'change', function() {
        	shopstar_toggle_slider_min_width();
        } );
        
        function shopstar_toggle_slider_min_width() {
        	if ( $( '#customize-control-shopstar-slider-has-min-width input' ).prop('checked') && $( '#customize-control-shopstar-slider-has-min-width input' ).is(':visible') ) {
        		$( '#customize-control-shopstar-slider-min-width' ).show();
        	} else {
        		$( '#customize-control-shopstar-slider-min-width' ).hide();
        	}
        }
        
        var blogPostLayout = $( '#customize-control-shopstar-blog-layout select' ).val();
        shopstar_toggle_blog_masonry_grid_options( blogPostLayout );
        
        $( '#customize-control-shopstar-blog-layout select' ).on( 'change', function() {
        	blogPostLayout = $( this ).val();
        	shopstar_toggle_blog_masonry_grid_options( blogPostLayout );
        } );
        
        function shopstar_toggle_blog_masonry_grid_options( blogPostLayout ) {
            if ( blogPostLayout == 'blog-post-masonry-grid-layout' ) {
                $( '#customize-control-shopstar-blog-masonry-grid-columns' ).show();
                $( '#customize-control-shopstar-blog-masonry-grid-horizontal-order' ).show();
                $( '#customize-control-shopstar-blog-masonry-grid-border' ).show();
                $( '#customize-control-shopstar-blog-masonry-grid-gutter' ).show();
                
            } else {
                $( '#customize-control-shopstar-blog-masonry-grid-columns' ).hide();
                $( '#customize-control-shopstar-blog-masonry-grid-horizontal-order' ).hide();
                $( '#customize-control-shopstar-blog-masonry-grid-border' ).hide();
                $( '#customize-control-shopstar-blog-masonry-grid-gutter' ).hide();
            }
        }
        
    	// Show / hide blog archive options
        var blogArchiveLayout = $( '#customize-control-shopstar-blog-archive-layout select' ).val();
        shopstar_toggle_blog_archive_options( blogArchiveLayout );
        
        $( '#customize-control-shopstar-blog-archive-layout select' ).on( 'change', function() {
        	blogArchiveLayout = $( this ).val();
        	shopstar_toggle_blog_archive_options( blogArchiveLayout );
        } );
        
        function shopstar_toggle_blog_archive_options( blogArchiveLayout ) {
            if ( blogArchiveLayout == 'shopstar-blog-archive-layout-full' ) {
                $( '#customize-control-shopstar-blog-excerpt-length' ).hide();
                $( '#customize-control-shopstar-blog-read-more-text' ).hide();
                
            } else if ( blogArchiveLayout == 'shopstar-blog-archive-layout-excerpt' ) {
                $( '#customize-control-shopstar-blog-excerpt-length' ).show();
                $( '#customize-control-shopstar-blog-read-more-text' ).show();
                
            }
        }
        
    } );
    
} )( jQuery );