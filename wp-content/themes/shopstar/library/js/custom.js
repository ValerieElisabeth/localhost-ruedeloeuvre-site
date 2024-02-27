/**
 * Shopstar Theme Custom Functionality
 *
 */
( function( $ ) {
	
	$( document ).ready( function() {
        // Add button to sub-menu item to show nested pages / Only used on mobile
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<span class="submenu-toggle"><i class="fa fa-angle-right"></i></span>' );
        
        // Mobile nav button functionality
        $( '.main-navigation a[href="#"], .submenu-toggle' ).bind( 'click', function(e) {
        	e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).parent().find('.fa:first').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
        });
        
        shopstar_set_slider_height();
        
        // Mobile menu toggle button
        $( '.main-navigation .menu-toggle' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
        });
        $( '.main-navigation .close-button' ).click( function(e){
            $( '.main-navigation .menu-toggle' ).click();
        });
        
        // Search Show / Hide
    	var searchHeight = $(".search-slidedown").height();
    	
        $(".search-button").click(function(e){
        	e.preventDefault();
        	
        	if ( !$(".search-slidedown").hasClass('open') ) {
	        	$(".search-slidedown").addClass('open');
	        	$(".search-slidedown").animate( { opacity: 1 }, 150 );
	            $(".search-slidedown .search-field").focus();
        	} else {
	        	$(".search-slidedown").removeClass('open');
	        	$(".search-slidedown").animate( { opacity: 0 }, 150 );
        	}
        });
        
        // Don't search if no keywords have been entered
        $(".search-submit").bind('click', function(event) {
        	if ( $(this).parents(".search-form").find(".search-field").val() == "") event.preventDefault();
        });
        
        // Back to Top Button Functionality
    	$('#back-to-top').bind('click', function() {
    		$('html, body').animate({scrollTop:0}, 'slow');
    		return false;
    	});
    	
    	var element;
    	
    	if ( $('.slider-container').length > 0) {
    		element = $('.slider-container');
    	} else {
    		element = $('.site-content');
    	}

        try {
        	
        	if ( $('.site-header.sticky').hasClass('no-logo') ) {
        		
		        $('.site-header.sticky .top-bar').waypoint('sticky', {
		            offset: 0,
		            handler: function() {
		            	shopstar_set_sticky_wrapper_heights();		            	
		            }
		        });
		        
		        var mainNavigationStickyOffset;
		        if ( $('.site-header.sticky .top-bar').length > 0 ) {
		        	mainNavigationStickyOffset = $('.site-header.sticky .top-bar').outerHeight(true);
		        } else {
		        	mainNavigationStickyOffset = 0;
		        }
		        
		        $('.site-header.sticky .main-navigation').waypoint('sticky', {
		        	offset: mainNavigationStickyOffset,
		            handler: function() {
		            	shopstar_set_sticky_wrapper_heights();		            	
		            }
		        });
		        
        	} else {
        		
		        $('.site-header.sticky').waypoint('sticky', {
		            offset: 0,
		            handler: function() {
		            	shopstar_set_sticky_wrapper_heights();		            	
		            }
		        });
		        $('.main-navigation.sticky').waypoint('sticky', {
		            offset: 0,
		            handler: function() {
		            	shopstar_set_sticky_wrapper_heights();		            	
		            }
		        });
		        
        	}
        	
        	shopstar_set_sticky_wrapper_heights();        	
        	
        } catch(e) {
        	
		}
	
        try {
        	$('.site-content').fitVids();
        } catch(e) {
        	
        }
        
    });
    
    function shopstar_init_masonry_grid() {
    	
    	if ( $( '.masonry-grid-container' ).length > 0 ) {
    		// Initialize the Masonry plugin
			var grid = $( '.masonry-grid-container' ).masonry({
		        columnWidth: 'article',
		        itemSelector: 'article',
		        horizontalOrder: shopstarMasonryGridHorizontalOrder,
		        percentPosition: true
		    });
    		
			// Once all images within the grid have loaded lay out the grid
			$( '.masonry-grid-container' ).imagesLoaded( function() {
				grid.masonry('layout');
	    	});
	    	
			// Once the layout is complete hide the loader 
	        grid.one( 'layoutComplete', function() {
				$( '.masonry-grid-container' ).removeClass( 'loading' );
				
				// Triggering the window resize event and calling the Masonry layout function again fixes a spacing issue on the grid
				$(window).resize();
				grid.masonry('layout');
	        } );
    		
    	}
    	
    }
	
    function shopstar_set_back_to_top_button_visibility() {
    	if ($(window).scrollTop() > $(window).height() / 2 ) {
    		$("#back-to-top").removeClass('gone');
    		$("#back-to-top").addClass('visible');
    	} else {
    		$("#back-to-top").removeClass('visible');
    		$("#back-to-top").addClass('gone');
    	}
    }
    
    function shopstar_set_search_block_position() {
    	if ( $('.search-button').length > 0 ) {
    		$('.search-slidedown .search-block').css('left', $('.search-button').position().left - ( $('.search-slidedown .search-block').width() - $('.search-button').width() ) );
    	}
    }
    
    $(window).resize(function () {
        shopstar_set_sticky_wrapper_heights();
    	shopstar_set_search_block_position();
    });
    
    $(window).load(function() {
    	shopstar_init_home_slider();
    	shopstar_init_blog_list_carousel();
    	shopstar_set_back_to_top_button_visibility();
    	shopstar_set_search_block_position();
    	shopstar_init_masonry_grid();
    });

    $(window).scroll(function() {
    	if ( $(".search-slidedown").hasClass('open') ) {
    	}
   	
    	shopstar_set_back_to_top_button_visibility();
    });
    
    if ( $(".header-image img").length > 0 ) {
	    var img = $('<img/>');
	    img.attr("src", $(".header-image img").attr("src") ); 
		
	    img.on('load', function() {
	    	$('.header-image').removeClass('loading');
	    	$('.header-image').css('height', 'auto');
		});
    }
    
    function shopstar_set_sticky_wrapper_heights() {
    	// If the logo is included in the sticky header set the sticky wrapper to the height of the entire header
    	
    	if ( $('.site-header.sticky.include-logo').length > 0 ) {
    		var wrapper = $('.sticky-wrapper');
			var wrapperHeight = $('.site-header.sticky.include-logo').outerHeight(true);
			wrapper.height(wrapperHeight);
			
		// If the logo is not included in the sticky header set the first sticky wrapper to the height of the top bar
		// and the second sticky wrapper to the height of the navigation menu
    	} else if ( $('.site-header.sticky.no-logo').length > 0 ) {
    		if ( $('.site-header .top-bar').length > 0 ) {
				var wrapper = $('.sticky-wrapper').eq(0);
				var wrapperHeight = $('.site-header .top-bar').outerHeight(true);
    			$('.sticky-wrapper').eq(0).height(wrapperHeight);
    		}
			
			var wrapper = $('.sticky-wrapper').eq(1);
			var wrapperHeight = $('.site-header .main-navigation').outerHeight(true);
			$('.sticky-wrapper').eq(1).height(wrapperHeight);
    	}
    }
    
    function shopstar_set_slider_height() {
        // Set the height of the slider to the height of the first slide's image
    	var firstSlide  = $(".slider-container.default .slider .slide:eq(0)");
    	var headerImage = $(".header-image img");
    	if ( firstSlide.length > 0 ) {
    		var firstSlideImage = firstSlide.find('img').first();
    		
    		if ( firstSlideImage.length > 0) {
    			
    			if ( firstSlideImage.attr('height') > 0 ) {
    				
    				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
    				var firstSlideImageWidth  = firstSlideImage.attr('width');
    				var firstSlideImageHeight = firstSlideImage.attr('height');
    				var sliderWidth = $('.slider-container').width();
    				var widthPercentage;
    				var widthRatio;
    				
    				widthRatio = sliderWidth / firstSlideImageWidth;
    				
    				$('.slider-container.loading').css('height', Math.round( widthRatio * firstSlideImageHeight ) );
    			}
    		}
    	} else if ( headerImage.length > 0 ) {
    		
    		if ( headerImage.attr('height') > 0 ) {

				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
				var headerImageWidth  = headerImage.attr('width');
				var headerImageHeight = headerImage.attr('height');
				var headerImageContainerWidth = $('.header-image').width();
				var widthPercentage;
				var widthRatio;
				
				widthRatio = headerImageContainerWidth / headerImageWidth;
				
				$('.header-image.loading').css('height', Math.round( widthRatio * headerImageHeight ) );
    		}
    	}
    }
    
    function shopstar_get_viewport() {
        var e = window;
        var a = 'inner';
        
        if ( !('innerWidth' in window ) ) {
            a = 'client';
            e = document.documentElement || document.body;
        }
    	
        return {
        	width: e[ a + 'Width' ],
        	height: e[ a + 'Height' ]
        };
    }
    
    function shopstar_init_blog_list_carousel() {
    	$carousel = $('.post-loop-images-carousel-wrapper').each(function(c) {
            var this_blog_carousel = $(this);
            var this_blog_carousel_id = 'post-loop-images-carousel-id-'+c;
            this_blog_carousel.attr('id', this_blog_carousel_id);
            $('#'+this_blog_carousel_id+' .post-loop-images-carousel').carouFredSel({
                responsive: true,
                circular: false,
                width: 580,
                height: "variable",
                items: {
                    visible: 1,
                    width: 580,
                    height: 'variable'
                },
                onCreate: function(items) {
                    $(window).on('resize', function () {
                    	// TODO: This must be cleaned up and coded better
                    	$carousel.find('.caroufredsel_wrapper').width( $carousel[0].getBoundingClientRect().width );
                    	$carousel.find('.post-loop-images-carousel div').width( $carousel[0].getBoundingClientRect().width );
                    })
                	
                    $('#'+this_blog_carousel_id).removeClass('post-loop-images-carousel-wrapper-remove');
                    $('#'+this_blog_carousel_id+' .post-loop-images-carousel').removeClass('post-loop-images-carousel-remove');
                },
                scroll: 500,
                auto: false,
                prev: '#'+this_blog_carousel_id+' .post-loop-images-prev',
                next: '#'+this_blog_carousel_id+' .post-loop-images-next'
            });
        });
    }
    
    function shopstar_init_home_slider() {
        $(".slider").carouFredSel({
            responsive: true,
            circular: true,
            infinite: false,
            width: 1200,
            height: 'variable',
            items: {
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
            	$('.slider-container').css('height', 'auto');
            	$(".slider-container").removeClass("loading");
            },
            scroll: {
                fx: shopstarSliderTransitionEffect,
                duration: shopstarSliderTransitionSpeed
            },
            auto: shopstarSliderSpeed,
            pagination: '.pagination',
            prev: ".prev",
            next: ".next",
            swipe: {
            	onTouch: true
            }
        });
    }
    
} )( jQuery );