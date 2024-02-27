<?php
global $queried_object, $header_image_type;
?>

<div class="header-image loading <?php echo ( get_theme_mod( 'shopstar-slider-text-shadow', customizer_library_get_default( 'shopstar-slider-text-shadow' ) ) ) ? 'text-shadow' : ''; ?>">

<?php
if ( $header_image_type == 'theme_settings' ) :
	if ( is_random_header_image() && $header_url = get_header_image() ) {
		// For a random header search for a match against all headers.
		foreach ( get_uploaded_header_images() as $header ) {
			if ( $header['url'] == $header_url ) {
				$attachment_id = $header['attachment_id'];
				break;
			}
		}

	} elseif ( $data = get_custom_header() ) {
		// For static headers
		$attachment_id = $data->attachment_id;
    }

	$alt_text = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
	
	$header_image_link_content = get_theme_mod( 'shopstar-header-image-link-content', customizer_library_get_default( 'shopstar-header-image-link-content' ) );

	if ( $header_image_link_content != "" ) {
		echo '<a href="' .esc_url( get_permalink( $header_image_link_content ) ). '" class="content-link">';
	}
?>

	<img src="<?php esc_url( header_image() ); ?>" alt="<?php echo $alt_text; ?>" height="<?php echo get_custom_header()->height ?>" width="<?php echo get_custom_header()->width ?>" />
	
	<?php
	if ( trim( get_theme_mod( 'shopstar-header-image-text', customizer_library_get_default( 'shopstar-header-image-text' ) ) ) != "" ) {
	?>
	<div class="overlay">
		<?php echo wp_kses_post( get_theme_mod( 'shopstar-header-image-text', customizer_library_get_default( 'shopstar-header-image-text' ) ) ); ?>
	</div>	
	<?php 
	}
	
	if ( $header_image_link_content != "" ) {
		echo '</a>';
	}
	?>
	
<?php
elseif ( $header_image_type == 'featured_image' || $header_image_type == 'custom_field' ) :

	if ( $header_image_type == 'featured_image' ) {
		$thumbnail_id = get_post_thumbnail_id( $queried_object->ID );
		$header_image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		$alt_text 	  = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
	
		$custom_fields = get_post_custom($queried_object->ID);
		$header_image_text = trim($custom_fields["featured_image_text"][0]);
		
	} else if ( $header_image_type == 'custom_field' ) {
		if ( !is_category() && !is_tag() ) {
			$header_image_id = get_post_meta( $queried_object->ID, 'header_image_id', true );
		} else {
			$term_meta = get_option( "taxonomy_$queried_object->term_id" );
			$header_image_id = intval( $term_meta['header_image_id'] ) ? intval( $term_meta['header_image_id'] ) : 0;
		}
		
		$header_image  = wp_get_attachment_image_src( $header_image_id, 'full' );
		$alt_text 	   = get_post_meta( $header_image_id, '_wp_attachment_image_alt', true);
		$custom_fields = get_post_custom($queried_object->ID);
		
		if ( !is_category() && !is_tag() ) {
			$header_image_text = trim($custom_fields["header_image_text"][0]);
		} else {
			$header_image_text = trim($term_meta['header_image_text']) ? trim($term_meta['header_image_text']) : '';
		}
		
	}
?>
	<img src="<?php echo esc_url( $header_image[0] ); ?>" alt="<?php echo $alt_text; ?>" width="<?php echo $header_image[1]; ?>" height="<?php echo $header_image[2]; ?>" />
	
	<?php
	if ( $header_image_text != "" ) {
	?>
	<div class="overlay">
		<?php echo wp_kses_post( $header_image_text ); ?>
	</div>	
	<?php 
	}
	?>
<?php
endif;
?>	
	
</div>