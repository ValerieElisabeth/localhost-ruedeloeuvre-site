<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<header class="entry-header">
		<?php
		//if ( get_theme_mod( 'shopstar-layout-display-post-titles', customizer_library_get_default( 'shopstar-layout-display-post-titles' ) ) ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		//}
		?>

		<div class="entry-meta">
			<?php shopstar_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
    
    <?php if( has_post_thumbnail() && get_theme_mod( 'shopstar-blog-featured-image', customizer_library_get_default( 'shopstar-blog-featured-image' ) ) ): ?>
        <div class="entry-thumbnail"><?php the_post_thumbnail( 'full' ) ?></div>
    <?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'shopstar' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php shopstar_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    
</article><!-- #post-## -->
