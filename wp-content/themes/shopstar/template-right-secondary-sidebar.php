<?php
/**
 * Template Name: Right Secondary Sidebar
 *
 */
get_header(); ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'secondary-sidebar' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">

		    <?php if ( ! is_front_page() ) : ?>
		    
		        <?php if ( function_exists( 'bcn_display' ) ) : ?>
		        <div class="breadcrumbs">
		            <?php bcn_display(); ?>
		        </div>
		        <?php endif; ?>
		        
		    <?php endif; ?>
		    
		    <?php get_template_part( 'library/template-parts/page-title' ); ?>
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'library/template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
			
			<?php
			// Prevent weirdness
			wp_reset_postdata();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('secondary'); ?>
<?php get_footer(); ?>
