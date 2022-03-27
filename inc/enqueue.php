<?php

/**
 * Enqueue Assets
 *
 * @package Fancy Lab
 */

function fancy_lab_assets() {
	// Load fonts
	wp_enqueue_style( 'custom-google-fonts', '//fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

	// Load CSS
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/src/css/bootstrap.min.css', array(), '4.3.1', 'all' );
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/src/css/flexslider.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'fancy-lab-style', get_stylesheet_uri(), array(), microtime(), 'all' );

	// Load JS
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/src/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	wp_enqueue_script( 'flexslider-jquery', get_template_directory_uri() . '/src/js/flexslider/jquery.flexslider-min.js', array( 'jquery' ), NULL, true );
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/src/js/flexslider/flexslider.js', array( 'jquery' ), NULL, true );
}

add_action( 'wp_enqueue_scripts', 'fancy_lab_assets' );