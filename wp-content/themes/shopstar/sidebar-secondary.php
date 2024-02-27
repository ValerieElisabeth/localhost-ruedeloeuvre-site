<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package shopstar
 */

if ( ! is_active_sidebar( 'secondary-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'secondary-sidebar' ); ?>
</div><!-- #secondary -->
