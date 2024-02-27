<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package Shopstar
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function shopstar_premium_admin_menu() {
    global $shopstar_upgrade_page;
    $shopstar_upgrade_page = add_theme_page(
    	__( 'Shopstar! Premium', 'shopstar' ),
    	'<span class="premium-link" style="color: #f18500;">' . __( 'Shopstar! Premium', 'shopstar' ) . '</span>',
    	'edit_theme_options',
    	'premium_upgrade',
    	'shopstar_render_upgrade_page'
	);
}
add_action( 'admin_menu', 'shopstar_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function shopstar_load_upgrade_page_scripts( $hook ) {
    global $shopstar_upgrade_page;
    if ( $hook != $shopstar_upgrade_page )
        return;
    
    wp_enqueue_style( 'shopstar-premium', get_template_directory_uri() . '/premium/library/css/premium.css' );
}
add_action( 'admin_enqueue_scripts', 'shopstar_load_upgrade_page_scripts' );

/**
 * Render the premium upgraded page
 */
function shopstar_render_upgrade_page() {
	get_template_part( 'premium/library/template-parts/content', 'premium' );
}
