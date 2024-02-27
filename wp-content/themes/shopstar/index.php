<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstar
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">
		
		    <?php if ( ! is_front_page() ) : ?>
		        
		        <?php if ( function_exists( 'bcn_display' ) ) : ?>
		        <div class="breadcrumbs">
		            <?php bcn_display(); ?>
		        </div>
		        <?php endif; ?>
		    
		    <?php endif; ?>
        
        	<?php get_template_part( 'library/template-parts/page-title' ); ?>
        
        	<div class="archive-container">

				<?php if ( have_posts() ) : ?>
		
					<?php
					$shopstar_blog_layout 				 = get_theme_mod( 'shopstar-blog-layout', customizer_library_get_default( 'shopstar-blog-layout' ) );
					$shopstar_blog_masonry_grid_columns = get_theme_mod( 'shopstar-blog-masonry-grid-border', customizer_library_get_default( 'shopstar-blog-masonry-grid-border' ) );
					
					if ( $shopstar_blog_layout == 'blog-post-masonry-grid-layout' ) {
					?>
					<div class="masonry-grid-container loading <?php echo $shopstar_blog_masonry_grid_columns ? 'bordered' : ''; ?>">
					<?php
					}
					?>
		
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'library/template-parts/content', get_post_format() );
						?>
		
					<?php endwhile; ?>
					
					<?php
					if ( $shopstar_blog_layout == 'blog-post-masonry-grid-layout' ) {
					?>
					</div>
					<?php
					}
					?>
					
					<?php
					// Prevent weirdness
					wp_reset_postdata();
					?>
		
					<?php shopstar_paging_nav(); ?>
		
				<?php else : ?>
		
					<?php get_template_part( 'library/template-parts/content', 'none' ); ?>
		
				<?php endif; ?>
				
			</div><!-- .archive-container -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
<?php get_footer(); ?>
