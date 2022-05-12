<?php

/**
 * Enqueue Assets
 *
 * @package Fancy Lab
 */

function fancy_lab_assets() {
	// Load fonts
	wp_enqueue_style( 'custom-google-fonts', '//fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

	// Load styles
	wp_enqueue_style( 'fancy-lab-style', get_template_diretory_uri() . '/app/dist/styles.css', array(), '1.0' );

	// Load scripts
	wp_enqueue_script( 'fancy-lab-scripts', get_template_directory_uri() . '/dist/bundled.js', ['jquery'], '1.0', true );

}

add_action( 'wp_enqueue_scripts', 'fancy_lab_assets' );