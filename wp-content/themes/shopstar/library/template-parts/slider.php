<?php
global $slider_type, $slider_shortcode;

if ( $slider_type == 'plugin' ) :
?>
    <div class="slider-container">
		<?php
		if ( get_theme_mod( 'shopstar-slider-plugin-shortcode', customizer_library_get_default( 'shopstar-slider-plugin-shortcode' ) ) != '' ) {
			echo do_shortcode( get_theme_mod( 'shopstar-slider-plugin-shortcode' ) );
		}
		?>
	</div>
<?php
elseif ( $slider_type == 'default' ) :
    
    $slider_categories = '';

    if ( get_theme_mod( 'shopstar-slider-categories' ) != '' ) {
        $slider_categories = get_theme_mod( 'shopstar-slider-categories' );

        $slider_query = new WP_Query( 'cat=' . implode(',', $slider_categories) . '&posts_per_page=-1&orderby=date&order=DESC&id=slider' );
         
        if ( $slider_query->have_posts() ) :
?>
	
			<div class="slider-container default loading <?php echo ( get_theme_mod( 'shopstar-slider-text-shadow', customizer_library_get_default( 'shopstar-slider-text-shadow' ) ) ) ? 'text-shadow' : ''; ?>">
	            <div class="prev"></div>
	            <div class="next"></div>
			            				
				<ul class="slider">
					                    
					<?php 
					while ( $slider_query->have_posts() ) : $slider_query->the_post(); 
					?>
			                    
					<li class="slide">
						<?php
						$custom_fields = get_post_custom();
						$slider_link_content = 0;
						$slider_link_url = '';

					 	if ( isset( $custom_fields["slider_link_content"][0] ) ) {
					 		$slider_link_content = $custom_fields["slider_link_content"][0];
					 	}
						
 						$slider_link_custom = '';
					 	if ( isset( $custom_fields["slider_link_custom"][0] ) ) {
					 		$slider_link_custom = $custom_fields["slider_link_custom"][0];
					 	}

 						$slider_link_target = '_blank';
					 	if ( isset( $custom_fields["slider_link_target"][0] ) ) {
					 		$slider_link_target = $custom_fields["slider_link_target"][0];
					 	}
					 	
						if ( $slider_link_content != 'custom' && intval( $slider_link_content ) > 0 ) {
							$slider_link_content = intval( $slider_link_content );
							$slider_link_url = get_permalink( $slider_link_content );
						} else if ( $slider_link_content == 'custom' ) {
							$slider_link_url = esc_url( $slider_link_custom );
						}
						
						if ( !empty( $slider_link_url ) ) {
							echo '<a href="' .$slider_link_url. '" ';
							
							if ( $slider_link_target == 'new' ) {
								echo 'target="_blank" ';
							}
							
							echo 'class="slide-link">';
						}
					
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'full', array( 'class' => '' ) );
						endif;
						?>
			                        
			            <?php 
			            $content = trim( get_the_content() );
			            
			            if ( !empty( $content ) ) {
			            ?>
						<div class="overlay">
							<?php echo $content; ?>
						</div>
						<?php 
						}

						if ( !empty( $slider_link_url ) ) {
							echo '</a>';
						}
						?>
					</li>
			                    
					<?php
					endwhile;
					?>
			                    
				</ul>
				
				<div class="pagination"></div>
				
			</div>
	
<?php
		endif;
		wp_reset_query();
		
	} else {
?>

		<div class="slider-container default loading <?php echo ( get_theme_mod( 'shopstar-slider-text-shadow', customizer_library_get_default( 'shopstar-slider-text-shadow' ) ) ) ? 'text-shadow' : ''; ?>">
			<div class="prev"></div>
			<div class="next"></div>
                
			<ul class="slider">
				<li class="slide">
					<img src="<?php echo get_template_directory_uri() ?>/library/images/demo/slider-default01.jpg" alt="<?php esc_attr_e('Demo Slide One', 'shopstar') ?>" />
					<div class="overlay">
						<h2><?php _e( 'Minimalist shopping theme', 'shopstar' ); ?></h2>
						<p>
                        	<?php _e( 'Super stylish functionality!', 'shopstar' ); ?>
						</p>
                        
						<a href="#" class="button">Shop Now</a>
                    </div>
                </li>
				<li class="slide">
					<img src="<?php echo get_template_directory_uri() ?>/library/images/demo/slider-default02.jpg" alt="<?php esc_attr_e('Demo Slide Two', 'shopstar') ?>" />
					<div class="overlay">
						<h2><?php _e( 'Beautiful Design', 'shopstar' ); ?></h2>
						<p>
                        	<?php _e( 'Fully responsive online shop', 'shopstar' ); ?>
						</p>
                        
						<a href="#" class="button">Shop Now</a>
					</div>
				</li>
			</ul>
            
			<div class="pagination"></div>
		</div>

<?php
	}
    
else :
?>
	<div class="slider-container">
		<?php	
		echo do_shortcode($slider_shortcode);
		?>
	</div>
<?php
endif;
?>