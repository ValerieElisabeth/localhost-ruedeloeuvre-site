<style type="text/css">
/* Branding */
.site-header .branding {
	padding: <?php echo $site_branding_padding_top; ?>px 0 <?php echo $site_branding_padding_bottom; ?>px 0;
}

<?php
if ( $shopstar_slider_has_min_width ) {
?>

/* Minimum slider width */
.slider-container.default .slider .slide img {
	min-width: <?php echo $shopstar_slider_min_width; ?>px;
}
	
<?php
}

if ( get_theme_mod( 'shopstar-mobile-logo' ) ) {
	echo '/* Mobile logo */';
	echo '@media only screen and (max-width: ' .$mobile_logo_breakpoint. 'px) {';
?>
		/* Display the mobile logo */
		.site-header .branding a.mobile-logo-link {
			display: inline-block;
		}
		
		.site-header .branding img.mobile-logo {
			vertical-align: top;
			margin: 0 auto 0 auto !important;
		}
		
		/* Hide the desktop logo */
		.site-header .branding .custom-logo-link.hide-for-mobile {
			display: none;
		}
		
		/* Hide the title and description */
		.site-header .branding .title.hide-for-mobile,
		.site-header .branding .description.hide-for-mobile {
			display: none;
		}
		
		/*
		.site-header .branding.mobile-logo-with-site-title img.mobile-logo {
			margin: 0 auto 10px auto !important;
		}
	
		.site-header .branding.has-mobile-logo .title_and_tagline {
			display: block;
		}
		
		.site-header .branding.has-mobile-logo .title_and_tagline.hide-for-mobile {
			display: none;
		}
		*/
	}
<?php
}
?>

/* Mobile Menu and other mobile stylings */
<?php
echo '@media only screen and (min-width: ' .$mobile_menu_breakpoint. 'px) {';
?>

	.main-navigation ul ul li:hover > ul,
	.main-navigation ul ul li.focus > ul {
		left: 100%;
		display: block;
	}

	.main-navigation ul ul a {
		color: #939598;
	}	
	
	.main-navigation ul ul a:hover,
	.main-navigation ul ul li.current-menu-item > a,
	.main-navigation ul ul li.current_page_item > a,
	.main-navigation ul ul li.current-menu-parent > a,
	.main-navigation ul ul li.current_page_parent > a,
	.main-navigation ul ul li.current-menu-ancestor > a,
	.main-navigation ul ul li.current_page_ancestor > a {
		color: #4F4F4F;
	}	
	
}

<?php
echo '@media only screen and (max-width: ' .$mobile_menu_breakpoint. 'px) {';
?>
	#main-menu.shopstar-mobile-menu-primary-color-scheme {
		background-color: #000000;
	}

	
	#main-menu.shopstar-mobile-menu-footer-color-scheme .main-navigation ul ul a {
		color: #000000;
	}	
	
	
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul ul a:hover,
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul li.current-menu-ancestor > a,
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul ul li.current-menu-item > a,
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul ul > a,
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul ul > a,
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul ul > a,
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul ul > a,
	#main-menu.shopstar-mobile-menu-footer-color-scheme ul ul > a {
		color: #ba2227;
	}	
	
	#main-menu.shopstar-mobile-menu-footer-color-scheme {
		background-color: #ECEDED;
	}	
	
	.main-navigation .padder {
		margin: 0;
	}	
	
	.submenu-toggle {
    	display: block;
    }
    
	/* Mobile Menu */
	.site-header .main-navigation .container {
		border-bottom: none !important;
	}
	
	.site-header .main-navigation.bottom-border.mobile {
		border-bottom-width: 5px;
	}

	.main-navigation .main-navigation-inner {
		display: block;	
	}
	
	.site-header .search-button {
	    display: block;
	    padding: 8px 22px 0 26px;
	    text-align: left;
	}	
	.main-navigation .search-slidedown {
		margin: 0;
		top: 0;
		position: relative;
	}
	.main-navigation .search-slidedown .container {
		padding: 0;
		width: 100%;
	}
	.main-navigation .search-slidedown .padder {
		margin: 0px;
		width: 100%;
		display: inline-block;
	}
	.main-navigation .search-slidedown .search-block {
		margin: 0 !important;
		float: left;
		width: 254px;
		left: 26px !important;
	}
	.main-navigation .search-slidedown .search-block label {
		width: 80%;
		float: left;
		display: inline-block;
	}
	.main-navigation .search-slidedown .search-block .search-field {
		border: 0;
		padding: 4px 0 4px 0;
		width: 100%;
	}
    .main-navigation .menu-toggle {
	    display: block;
		margin: 0 auto 0 auto;
	    padding: 16px 18px;
	    color: #FFF;
	    text-transform: uppercase;
    	text-align: center;
	    cursor: pointer;
	}
	.main-navigation .menu-toggle .fa.fa-bars {
    	font-size: 28px;
	}
    .main-navigation .nav-menu {
		display: block !important;
    	display: inline-block;
    }
    #main-menu {
        color: #8C8C8C;
        box-shadow: 1px 0 1px rgba(255, 255, 255, 0.04) inset;
        position: fixed;
        top: 0;
        right: -280px;
        width: 280px;
        max-width: 100%;
        -ms-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 74px 0 30px 0;
        z-index: 100000;
        height: 100%;
        overflow: auto;
        -webkit-transition: right 0.4s ease 0s;
        -moz-transition: right 0.4s ease 0s;
        -ms-transition: right 0.4s ease 0s;
        -o-transition: right 0.4s ease 0s;
        transition: right 0.4s ease 0s;
    }
    .main-navigation ul {
        display: block;
    }
    .main-navigation li {
        display: block;
        float: none;
        position: relative;
    	margin: 0;
    	padding: 0;
    }
    .main-navigation li a {
    	white-space: normal !important;
		display: block;
        float: none;
        padding: 8px 22px 8px 26px;
        font-size: 14px;
        text-align: left;
  	}
  	
    .main-navigation ul ul {
        position: relative !important;
        top: 0 !important;
        left: 0 !important;
        float: none !important;
    	background-color: transparent;
    	background-image: none;
    	box-shadow: none;
    	border: none;
        padding: 0;
        margin: 0;
        display: none;
    }
    .main-navigation ul ul li:last-child a,
    .main-navigation ul ul li a {
        box-shadow: none;
        padding: 6px 30px;
        width: auto;
    }
    
	.main-navigation ul ul ul {
		margin: 0;
		left: 0 !important;
	}    

    .main-navigation ul ul ul li a {
        padding: 6px 39px !important;
    }
    .main-navigation ul ul ul ul li a {
        padding: 6px 47px !important;
    }

    .main-navigation .close-button {
        display: block;
    	border-radius: 100%;
        position: absolute;
        top: 23px;
        left: 22px;
        font-size: 26px;
    	font-weight: 400;
        color: #FFFFFF;
        text-align: center;
        padding: 0 6px 0 10px;
        height: 36px;
    	width: 36px;
        line-height: 33px;
        cursor: pointer;
    	
	    -webkit-transition: all 0.2s ease 0s;
	     -moz-transition: all 0.2s ease 0s;
	      -ms-transition: all 0.2s ease 0s;
	       -o-transition: all 0.2s ease 0s;
	          transition: all 0.2s ease 0s;

    }
    
    .main-navigation .close-button .fa {
	    -webkit-transition: all 0.2s ease 0s;
	     -moz-transition: all 0.2s ease 0s;
	      -ms-transition: all 0.2s ease 0s;
	       -o-transition: all 0.2s ease 0s;
	          transition: all 0.2s ease 0s;
	}

	.main-navigation .close-button .fa-angle-left {
        position: relative;
        left: -4px;
    }
	
	#main-menu.shopstar-mobile-menu-primary-color-scheme a,
	#main-menu.shopstar-mobile-menu-primary-color-scheme .submenu-toggle {
    	color: #FFFFFF;
	}
	
	#main-menu.shopstar-mobile-menu-primary-color-scheme li.current-menu-item > a,
	#main-menu.shopstar-mobile-menu-primary-color-scheme li.current_page_item > a,
	#main-menu.shopstar-mobile-menu-primary-color-scheme li.current-menu-parent > a,
	#main-menu.shopstar-mobile-menu-primary-color-scheme li.current_page_parent > a,
	#main-menu.shopstar-mobile-menu-primary-color-scheme li.current-menu-ancestor > a,
	#main-menu.shopstar-mobile-menu-primary-color-scheme li.current_page_ancestor > a {
		color: rgba(255, 255, 255, 0.6);
	}
	
	#main-menu.shopstar-mobile-menu-primary-color-scheme .close-button:hover .fa,	
	#main-menu.shopstar-mobile-menu-primary-color-scheme li > a:hover,
	#main-menu.shopstar-mobile-menu-primary-color-scheme .search-button a:hover {
		color: rgba(255, 255, 255, 0.6);
	}
    
    .open-page-item > ul.children,
    .open-page-item > ul.sub-menu {
    	display: block !important;
    }

}
    	
    
.masonry-grid-container {
    margin-left: -<?php echo floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ) / 2; ?>%;
	margin-right: -<?php echo floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ) / 2; ?>%;
}

<?php
$masonry_grid_columns = intval( get_theme_mod( 'shopstar-blog-masonry-grid-columns', customizer_library_get_default( 'shopstar-blog-masonry-grid-columns' ) ) );
?>

.masonry-grid-container article {
	width: 47.4%; /* 2 col: Looks right at 47.44 */
	width: 30.73%; /* 3 col: Looks right at 30.76 */
	width: 22.4%; /* 4 col: Looks right at 22.48 */
	width: <?php echo (100 / $masonry_grid_columns ) - floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ) ?>%;
	
    margin-left: <?php echo floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ) / 2; ?>% !important;
	margin-right: <?php echo floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ) / 2; ?>%  !important;
	margin-bottom: <?php echo floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ); ?>% !important;
}

@media screen and (max-width: 980px) {
	.masonry-grid-container article {
	    width: <?php echo 50 - floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ); ?>%;
	}
}

@media only screen and (max-width: 782px) {
	.masonry-grid-container article {
	    width: <?php echo 100 - floatVal( get_theme_mod( 'shopstar-blog-masonry-grid-gutter', customizer_library_get_default( 'shopstar-blog-masonry-grid-gutter' ) ) ); ?>%;
	}
}
    
</style>