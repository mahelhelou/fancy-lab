<?php

/**
 * Fancy Lab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fancy Lab
 */

// Require parts/files
require_once get_theme_file_path( '/inc/class-wp-bootstrap-navwalker.php' );
require_once get_theme_file_path( '/inc/customizer.php' );

/**
* Enqueue scripts and styles.
*/
function fancy_lab_scripts(){
	// Load custom fonts
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

	// Load CSS
	wp_enqueue_style( 'flexslider-css', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/inc/flexslider/flexslider.css' ), 'all' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.3.1', 'all' );
	wp_enqueue_style( 'fancy-lab-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );

	// Load JS
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	wp_enqueue_script( 'flexslider-jquery', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array( 'jquery' ), '', true );
 }
 add_action( 'wp_enqueue_scripts', 'fancy_lab_scripts' );

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/

function fancy_lab_config(){
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'fancy_lab_main_menu' 	=> 'Fancy Lab Main Menu',
			'fancy_lab_footer_menu' => 'Fancy Lab Footer Menu',
		)
	);

	// Supporting woocommerce
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 255,
		'single_image_width'	=> 255,
		'product_grid' 			=> array(
			'default_rows'    => 10,
			'min_rows'        => 5,
			'max_rows'        => 10,
			'default_columns' => 1,
			'min_columns'     => 1,
			'max_columns'     => 1,
		)
	) );

	// Adding look and feel for product images
	add_theme_support( 'wc-product-gallery-zoom' ); // Hover zoom
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Adding custom logo in theme customizer (Appearance -> Customize -> Site identity)
	add_theme_support( 'custom-logo', array(
		'height'			=> 85,
		'width'				=> 160,
		'flex_height'	=> true,
		'flex_width'	=> true
	) );

	// Custom image size
	add_image_size( 'fancy-lab-slider', 1920, 800, array('center', 'center') );

	// Set maximum width of images or products
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}
}

add_action( 'after_setup_theme', 'fancy_lab_config', 0 );

// To submit theme to wordpress.org, you can't create a theme that's totally depending on another plugin
// require get_theme_file_path( 'inc/wc_modifications.php' );
if ( class_exists( 'WooCommerce' ) ) {
	require get_theme_file_path( 'inc/wc_modifications.php' );
}

// Update shopping cart using ajax, without need to refresh the page
add_filter( 'woocommerce_add_to_cart_fragments', 'fancy_lab_woocommerce_header_add_to_cart_fragment' );

function fancy_lab_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}