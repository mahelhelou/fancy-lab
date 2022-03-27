<?php // Fancy Lab Functions

require_once get_theme_file_path( '/inc/class-wp-bootstrap-navwalker.php' );
require_once get_theme_file_path( '/inc/customizer.php' );
require_once get_theme_file_path( '/inc/enqueue.php' );
require_once get_theme_file_path( '/inc/features.php' );
require_once get_theme_file_path( '/inc/sidebars.php' );
require_once get_theme_file_path( '/inc/add-to-cart-ajax.php' );

// To submit theme to wordpress.org, you can't create a theme that's totally depending on another plugin
// require get_theme_file_path( 'inc/wc_modifications.php' );
/* if ( class_exists( 'WooCommerce' ) ) {
	require get_theme_file_path( 'inc/wc_modifications.php' );
} */