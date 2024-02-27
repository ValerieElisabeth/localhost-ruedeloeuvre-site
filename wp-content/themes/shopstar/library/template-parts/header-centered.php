<?php
global $show_slider, $show_header_image;
?>

<header id="masthead" class="site-header centered <?php echo ( get_theme_mod( 'shopstar-show-header-top-bar', customizer_library_get_default( 'shopstar-show-header-top-bar' ) ) ) ? 'has-top-bar' : ''; ?> <?php echo ( get_theme_mod( 'shopstar-header-sticky', customizer_library_get_default( 'shopstar-header-sticky' ) ) ) ? 'sticky' : ''; ?> <?php echo ( get_theme_mod( 'shopstar-header-sticky-logo', customizer_library_get_default( 'shopstar-header-sticky-logo' ) ) ) ? 'include-logo' : 'no-logo'; ?>" role="banner">

	<?php
	if( get_theme_mod( 'shopstar-show-header-top-bar', customizer_library_get_default( 'shopstar-show-header-top-bar' ) ) ) :
		get_template_part( 'library/template-parts/top-bar' );
	endif;
	
	$logo = '';
	$mobile_logo = '';
	
	if ( function_exists( 'has_custom_logo' ) ) {
		if ( has_custom_logo() ) {
			$logo = get_custom_logo();
		}
	} else if ( get_theme_mod( 'shopstar-logo' ) ) {
		$logo = "<a href=\"". esc_url( home_url( '/' ) ) ."\" title=\"". esc_attr( get_bloginfo( 'name', 'display' ) ) ."\"><img src=\"". esc_url( get_theme_mod( 'shopstar-logo' ) ) ."\" alt=\"". esc_attr( get_bloginfo( 'name' ) ) ."\" /></a>";
	}

	if ( get_theme_mod( 'shopstar-mobile-logo' ) ) {
		$mobile_logo = "<a href=\"". esc_url( $logo_link_content ) ."\" title=\"". esc_attr( get_bloginfo( 'name', 'display' ) ) ."\" class=\"mobile-logo-link\"><img src=\"". esc_url( get_theme_mod( 'shopstar-mobile-logo' ) ) ."\" alt=\"". esc_attr( get_bloginfo( 'name' ) ) ."\" class=\"mobile-logo\" /></a>";
	}	
	?>

	<div class="container">
	    <div class="padder">

		    <div class="branding <?php echo $mobile_logo ? 'has-mobile-logo' : ''; ?>">
		        <?php
		        if( $logo ) {
					echo $logo;
		        
			        if ( $mobile_logo ) {
						echo $mobile_logo;
					}
		        
		        } else {

			        if ( $mobile_logo ) {
						echo $mobile_logo;
					}
		        ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="title <?php echo $mobile_logo ? 'hide-for-mobile' : ''; ?> <?php echo get_theme_mod( 'shopstar-site-title-font-weight', customizer_library_get_default( 'shopstar-site-title-font-weight' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		            <div class="description <?php echo $mobile_logo ? 'hide-for-mobile' : ''; ?>"><?php bloginfo( 'description' ); ?></div>
		        <?php
	        	}
	        	?>
		    </div>
	    
	    </div>
	</div>
	
	<nav id="site-navigation" class="main-navigation <?php echo ( !$show_slider && !$show_header_image ) ? 'bottom-border mobile' : 'bottom-border'; ?>" role="navigation">
		<span class="menu-toggle">
			<i class="fa fa-bars"></i>
		</span>
		
		<div id="main-menu" class="container <?php echo get_theme_mod( 'shopstar-mobile-menu-color-scheme', customizer_library_get_default( 'shopstar-mobile-menu-color-scheme' ) ); ?> <?php echo ( !$show_slider && !$show_header_image ) ? 'bottom-border' : ''; ?>">
		    <div class="padder">
		
				<div class="close-button"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></div>
				<div class="main-navigation-inner">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
		        <?php if( get_theme_mod( 'shopstar-header-search', customizer_library_get_default( 'shopstar-header-search' ) ) ) : ?>
		        <span class="search-button">
		        	<a href=""><?php echo get_theme_mod( 'shopstar-navigation-menu-search-button-text', customizer_library_get_default( 'shopstar-navigation-menu-search-button-text' ) ); ?> <i class="fa fa-search search-btn"></i></a>
		        </span>
		        <?php endif; ?>
		
				<div class="search-slidedown">
					<div class="container">
						<div class="padder">
							<div class="search-block">
							<?php if( get_theme_mod( 'shopstar-header-search', customizer_library_get_default( 'shopstar-header-search' ) ) ) : ?>
								<?php get_search_form(); ?>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			
			</div>	        
		</div>
	</nav><!-- #site-navigation -->
      
</header><!-- #masthead -->
 