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

// Enqueue Fancy Lab Assets
function fancy_lab_assets() {
	// Load custom fonts
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

	// Load CSS
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.3.1', 'all' );
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'fancy-lab-style', get_stylesheet_uri(), array(), microtime(), 'all' );

	// Load JS
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	wp_enqueue_script( 'flexslider-jquery', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array( 'jquery' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'fancy_lab_assets' );

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/

function fancy_lab_features() {
	// Register menus
	register_nav_menus(
		array(
			'fancy_lab_main_menu' 	=> __( 'Fancy Lab Main Menu', 'fancy-lab' ),
			'fancy_lab_footer_menu' => __( 'Fancy Lab Footer Menu', 'fancy-lab' ),
		)
	);

	// Make theme available for translation
	$textdomain = 'fancy-lab';
	load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' ); // for child theme
	load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' ); // for parent theme

	// Declare woocommerce support
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 255,
		'single_image_width'		=> 255,
		'product_grid' 					=> array(
			'default_rows'    => 10,
			'min_rows'        => 5,
			'max_rows'        => 10,
			'default_columns' => 1,
			'min_columns'     => 1,
			'max_columns'     => 1,
		)
	) );

	// Adding look and feel for product images
	add_theme_support( 'wc-product-gallery-zoom' ); // zoom on hover
	add_theme_support( 'wc-product-gallery-lightbox' ); // open in lightbox
	add_theme_support( 'wc-product-gallery-slider' ); // show product gallery

	// Adding custom logo in theme customizer
	// Appears in: Appearance -> Customize -> Site identity
	add_theme_support( 'custom-logo', array(
		'height'			=> 85,
		'width'				=> 160,
		'flex_height'	=> true,
		'flex_width'	=> true
	) );

	// Add post thumbnail feature
	add_theme_support( 'post-thumbnails' );

	// Title tag support
	add_theme_support( 'title-tag' );

	// Custom image sizes
	add_image_size( 'fancy-lab-slider', 1920, 800, array('center', 'center') );
	add_image_size( 'fancy-lab-blog', 960, 640, array('center', 'center') );

	// Set maximum width of images or products
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}
}

add_action( 'after_setup_theme', 'fancy_lab_features', 0 );

// To submit theme to wordpress.org, you can't create a theme that's totally depending on another plugin
// require get_theme_file_path( 'inc/wc_modifications.php' );
if ( class_exists( 'WooCommerce' ) ) {
	require get_theme_file_path( 'inc/wc_modifications.php' );
}

// Update shopping cart using ajax, without need to refresh the page
// This function cames from WooCommerce documentation
function fancy_lab_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	add_filter( 'woocommerce_add_to_cart_fragments', 'fancy_lab_woocommerce_header_add_to_cart_fragment' );

	ob_start(); ?>

	<!-- The HTML tag we specified for shopping cart item -->
	<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

// Regiser sidebars
add_action( 'widgets_init', 'fancy_lab_sidebars' );

function fancy_lab_sidebars(){
	register_sidebar( array(
		'name'					=> __( 'Fancy Lab Main Sidebar', 'fancy-lab' ),
		'id'						=> 'fancy-lab-sidebar-1',
		'description'		=> __( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'		=> '</h4>'
	) );

	register_sidebar( array(
		'name'			=> __( 'Sidebar Shop', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-shop',
		'description'	=> __( 'Drag and drop your WooCommerce widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer Sidebar 1', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer1',
		'description'	=> __( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer Sidebar 2', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer2',
		'description'	=> __( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer Sidebar 3', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer3',
		'description'	=> __( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
}