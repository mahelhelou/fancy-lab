<?php

/**
 * Fancy Lab Features
 *
 * @package Fancy Lab
 */

function fancy_lab_features() {
	// 1. Register menus
	register_nav_menus(
		array(
			'fancy_lab_main_menu' 	=> esc_html__( 'Fancy Lab Main Menu', 'fancy-lab' ),
			'fancy_lab_footer_menu' => esc_html__( 'Fancy Lab Footer Menu', 'fancy-lab' ),
		)
	);

	// 2. Make theme available for translation
	$textdomain = 'fancy-lab';
	load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' ); // for child theme
	load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' ); // for parent theme

	// 3. Declare WooCommerce support
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

	// 4. Change look and feel of product images
	add_theme_support( 'wc-product-gallery-zoom' ); // zoom on hover
	add_theme_support( 'wc-product-gallery-lightbox' ); // open in lightbox
	add_theme_support( 'wc-product-gallery-slider' ); // show product gallery

	// 5. Adding custom logo in theme customizer
	// Appears in: Appearance -> Customize -> Site identity
	add_theme_support( 'custom-logo', array(
		'height'			=> 85,
		'width'				=> 160,
		'flex_height'	=> true,
		'flex_width'	=> true
	) );

	// 6. Add post thumbnail feature
	add_theme_support( 'post-thumbnails' );

	// 7. Title tag support
	add_theme_support( 'title-tag' );

	// 8. Custom image sizes
	add_image_size( 'fancy-lab-slider', 1920, 800, array('center', 'center') );
	add_image_size( 'fancy-lab-blog', 960, 640, array('center', 'center') );

	// Set maximum width of images or products
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}
}

add_action( 'after_setup_theme', 'fancy_lab_features', 0 );