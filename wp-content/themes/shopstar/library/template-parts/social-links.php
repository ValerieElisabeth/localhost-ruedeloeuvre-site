<?php
if ( get_theme_mod( 'shopstar-social-pronoun', customizer_library_get_default( 'shopstar-social-pronoun' ) ) == 'shopstar-social-pronoun-group' ) {
	$pronoun 	= __( 'us', 'shopstar' );
	$determiner = __( 'our', 'shopstar' );
} else {
	$pronoun 	= __( 'me', 'shopstar' );
	$determiner = __( 'my', 'shopstar' );
}
?>

<ul class="social-icons">
<?php
if( get_theme_mod( 'shopstar-social-email', customizer_library_get_default( 'shopstar-social-email' ) ) != '' ) :
    echo '<li><a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'shopstar-social-email' ), 1 ) ) . '" title="';
	printf( __( 'Send %1$s an email', 'shopstar' ), $pronoun);
	echo '" class="email"><i class="fa fa-envelope-o"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-skype', customizer_library_get_default( 'shopstar-social-skype' ) ) != '' ) :
    echo '<li><a href="skype:' . esc_html( get_theme_mod( 'shopstar-social-skype' ) ) . '?userinfo" title="';
	printf( __( 'Contact %1$s on Skype', 'shopstar' ), $pronoun);
	echo '" class="skype"><i class="fa fa-skype"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-facebook', customizer_library_get_default( 'shopstar-social-facebook' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-facebook' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Facebook', 'shopstar' ), $pronoun);
	echo '" class="social-facebook"><i class="fa fa-facebook"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-twitter', customizer_library_get_default( 'shopstar-social-twitter' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-twitter' ) ) . '" target="_blank" title="';
	printf( __( 'Follow %1$s on Twitter', 'shopstar' ), $pronoun);
	echo '" class="social-twitter"><i class="fa fa-twitter"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-google-plus', customizer_library_get_default( 'shopstar-social-google-plus' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-google-plus' ) ) . '" target="_blank" title="';
	printf( __( 'Add %1$s on Google Plus', 'shopstar' ), $pronoun);
	echo '" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-youtube', customizer_library_get_default( 'shopstar-social-youtube' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-youtube' ) ) . '" target="_blank" title="';
	printf( __( 'View %1$s YouTube Channel', 'shopstar' ), $determiner);
	echo '" class="social-youtube"><i class="fa fa-youtube"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-instagram', customizer_library_get_default( 'shopstar-social-instagram' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-instagram' ) ) . '" target="_blank" title="';
	printf( __( 'Follow %1$s on Instagram', 'shopstar' ), $pronoun);
	echo '" class="social-instagram"><i class="fa fa-instagram"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-pinterest', customizer_library_get_default( 'shopstar-social-pinterest' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-pinterest' ) ) . '" target="_blank" title="';
	printf( __( 'Pin %1$s on Pinterest', 'shopstar' ), $pronoun);
	echo '" class="social-pinterest"><i class="fa fa-pinterest"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-linkedin', customizer_library_get_default( 'shopstar-social-linkedin' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-linkedin' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on LinkedIn', 'shopstar' ), $pronoun);
	echo '" class="social-linkedin"><i class="fa fa-linkedin"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-tumblr', customizer_library_get_default( 'shopstar-social-tumblr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-tumblr' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Tumblr', 'shopstar' ), $pronoun);
	echo '" class="social-tumblr"><i class="fa fa-tumblr"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-flickr', customizer_library_get_default( 'shopstar-social-flickr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-flickr' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Flickr', 'shopstar' ), $pronoun);
	echo '" class="social-flickr"><i class="fa fa-flickr"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-yelp', customizer_library_get_default( 'shopstar-social-yelp' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-yelp' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Yelp', 'shopstar' ), $pronoun);
	echo '" class="social-yelp"><i class="fa fa-yelp"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-vimeo', customizer_library_get_default( 'shopstar-social-vimeo' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-vimeo' ) ) . '" target="_blank" title="';
	printf( __( 'Follow %1$s on Vimeo', 'shopstar' ), $pronoun);
	echo '" class="social-vimeo"><i class="fa fa-vimeo"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-etsy', customizer_library_get_default( 'shopstar-social-etsy' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-etsy' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Etsy', 'shopstar' ), $pronoun);
	echo '" class="social-etsy"><i class="fa fa-etsy"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-tripadvisor', customizer_library_get_default( 'shopstar-social-tripadvisor' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-tripadvisor' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on TripAdvisor', 'shopstar' ), $pronoun);
	echo '" class="social-tripadvisor"><i class="fa fa-tripadvisor"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-yahoo-groups', customizer_library_get_default( 'shopstar-social-yahoo-groups' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-yahoo-groups' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Yahoo! Groups', 'shopstar' ), $pronoun);
	echo '" class="social-yahoo-groups"><i class="fa fa-yahoo"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-snapchat', customizer_library_get_default( 'shopstar-social-snapchat' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-snapchat' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Snapchat', 'shopstar' ), $pronoun);
	echo '" class="social-snapchat"><i class="fa fa-snapchat"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-behance', customizer_library_get_default( 'shopstar-social-behance' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-behance' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Behance', 'shopstar' ), $pronoun);
	echo '" class="social-behance"><i class="fa fa-behance"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-soundcloud', customizer_library_get_default( 'shopstar-social-soundcloud' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-soundcloud' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on SoundCloud', 'shopstar' ), $pronoun);
	echo '" class="social-soundcloud"><i class="fa fa-soundcloud"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-xing', customizer_library_get_default( 'shopstar-social-xing' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-xing' ) ) . '" target="_blank" title="';
	printf( __( 'Find %1$s on Xing', 'shopstar' ), $pronoun);
	echo '" class="social-xing"><i class="fa fa-xing"></i></a></li>';
endif;

if( get_theme_mod( 'shopstar-social-custom-icon-code', customizer_library_get_default( 'shopstar-social-custom-icon-code' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'shopstar-social-custom-icon-url' ) ) . '" target="_blank" title="';
	//printf( __( '', 'shopstar' ), $pronoun);
	echo '" class="social-custom"><i class="fa ' . get_theme_mod( 'shopstar-social-custom-icon-code' ) . '"></i></a></li>';
endif;

?>
</ul>
