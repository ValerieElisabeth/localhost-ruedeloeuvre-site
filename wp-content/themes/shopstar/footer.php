<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package shopstar
 */

?>

				</div><!-- .container -->
			</div><!-- .padder -->
		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			
			<div class="widgets <?php echo get_theme_mod( 'shopstar-footer-widget-amount', customizer_library_get_default( 'shopstar-footer-widget-amount' ) ); ?> <?php echo ( get_theme_mod( 'shopstar-layout-display-footer-widgets', customizer_library_get_default( 'shopstar-layout-display-footer-widgets' ) ) ) ? '' : 'hidden'; ?>">
		        <div class="container">
		        	<div class="padder">
		        	
			            <?php if ( is_active_sidebar( 'footer' ) ) : ?>
			            <ul>
			                <?php dynamic_sidebar( 'footer' ); ?>
			            </ul>
			    		<?php endif; ?>
			            
			            <div class="clearboth"></div>
					
					</div>
		        </div>
		    </div>
			
			<div class="bottom-bar <?php echo get_theme_mod( 'shopstar-footer-bottom-bar-layout', customizer_library_get_default( 'shopstar-footer-bottom-bar-layout' ) ) == 'shopstar-footer-bottom-bar-layout-centered' ? 'centered' : ''; ?> <?php echo ( get_theme_mod( 'shopstar-footer-display-bottom-bar', customizer_library_get_default( 'shopstar-footer-display-bottom-bar' ) ) ) ? '' : 'hidden'; ?>">
			
				<div class="container">
					<div class="padder">
						<?php
						$copyright_text = trim( get_theme_mod( 'shopstar-footer-copyright-text', customizer_library_get_default( 'shopstar-footer-copyright-text' ) ) ); 
						
						if ( !empty( $copyright_text ) ) {
						?>
						
						<div class="left">
			
			             	<?php echo wp_kses_post( $copyright_text ); ?> 
			                
						</div>
						
						<?php
						}
						?>
						
			            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container_class' => 'right', 'fallback_cb' => false, 'depth'  => 1 ) ); ?>
					</div>		
				</div>
				
		        <div class="clearboth"></div>
			</div>
			
		</footer><!-- #colophon -->

		<?php
		if ( get_theme_mod( 'shopstar-layout-site', customizer_library_get_default( 'shopstar-layout-site' ) ) == 'shopstar-layout-site-boxed' ) { ?>
			</div>
		<?php
		}
		?>

		<?php wp_footer(); ?>
	
		<?php
		if ( get_theme_mod( 'shopstar-layout-back-to-top', customizer_library_get_default( 'shopstar-layout-back-to-top' ) ) ) {
		?>
		<div id="back-to-top" class="<?php echo get_theme_mod( 'shopstar-mobile-back-to-top', customizer_library_get_default( 'shopstar-mobile-back-to-top' ) ) ? '' : 'hide-for-mobile'; ?>">
			<i class="fa fa-angle-up"></i>
			<div class="hover"></div>
		</div>
		<?php
		}
		?>
		
	</body>
</html>
