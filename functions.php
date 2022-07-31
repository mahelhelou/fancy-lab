<?php // Fancy Lab Functions

// If WooCommerce is active, we want to enqueue a file with a couple of template overrides
if ( class_exists( 'WooCommerce' )){
  require_once get_theme_file_path( '/inc/wc-modifications.php' );
}

require_once get_theme_file_path( '/inc/class-wp-bootstrap-navwalker.php' );
require_once get_theme_file_path( '/inc/customizer.php' );
require_once get_theme_file_path( '/inc/enqueue.php' );
require_once get_theme_file_path( '/inc/features.php' );
require_once get_theme_file_path( '/inc/sidebars.php' );
require_once get_theme_file_path( '/inc/add-to-cart-ajax.php' );
require_once get_theme_file_path( '/inc/live-posts-filter.php' );
// require_once get_theme_file_path( '/inc/forgot-password.php' );