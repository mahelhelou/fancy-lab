<?php

/**
 * Fancy Lab Theme Customizer
 *
 * @package Fancy Lab
 */

function fancy_lab_customizer( $wp_customize ) { // $wp_customize is built-in object to add features to

  // Add copyright section
  $wp_customize->add_section(
    'sec_copyright', array(
      'title'       => 'Copyright Settings',
      'description' => 'Copyright Section'
    )
  );

  // Field 1, copyright text box
  $wp_customize->add_setting(
    'set_copyright', array(
      'title'             => 'theme_mod',
      'default'           => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'set_copyright', array(
      'label'       => 'Copyright information',
      'description' => 'Please, add your copyright information here',
      'section'     => 'sec_copyright', // The section to add control to
      'type'        => 'text' // type of field (text, radio, ...)
    )
  );

  // Slider Section
	$wp_customize->add_section(
		'sec_slider', array(
			'title'       => 'Slider Settings',
			'description' => 'Slider Section'
		)
	);

  // Field 1 - Slider Page Number 1
  $wp_customize->add_setting(
    'set_slider_page_1', array(
      'type'					      => 'theme_mod',
      'default'			      	=> '',
      'sanitize_callback'   => 'absint'
    )
  );

  $wp_customize->add_control(
    'set_slider_page_1', array(
      'label'			  => 'Set slider page 1',
      'description'	=> 'Set slider page 1',
      'section'		  => 'sec_slider',
      'type'			  => 'dropdown-pages'
    )
  );

  // Field 2 - Slider Button Text Number 1
  $wp_customize->add_setting(
    'set_slider_button_text_1', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'set_slider_button_text_1', array(
      'label'			  => 'Button Text for Page 1',
      'description'	=> 'Button Text for Page 1',
      'section'		  => 'sec_slider',
      'type'			  => 'text'
    )
  );

  // Field 3 - Slider Button URL Number 1
  $wp_customize->add_setting(
    'set_slider_button_url_1', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'esc_url_raw'
    )
  );

  $wp_customize->add_control(
    'set_slider_button_url_1', array(
      'label'			  => 'URL for Page 1',
      'description'	=> 'URL for Page 1',
      'section'		  => 'sec_slider',
      'type'			  => 'url'
    )
  );

  // Field 4 - Slider Page Number 2
  $wp_customize->add_setting(
    'set_slider_page_2', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'absint'
    )
  );

  $wp_customize->add_control(
    'set_slider_page_2', array(
      'label'			  => 'Set slider page 2',
      'description'	=> 'Set slider page 2',
      'section'		  => 'sec_slider',
      'type'			  => 'dropdown-pages'
    )
  );

  // Field 5 - Slider Button Text Number 2
  $wp_customize->add_setting(
    'set_slider_button_text_2', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'set_slider_button_text_2', array(
      'label'			  => 'Button Text for Page 2',
      'description'	=> 'Button Text for Page 2',
      'section'		  => 'sec_slider',
      'type'			  => 'text'
    )
  );

  // Field 6 - Slider Button URL Number 2
  $wp_customize->add_setting(
    'set_slider_button_url_2', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'esc_url_raw'
    )
  );

  $wp_customize->add_control(
    'set_slider_button_url_2', array(
      'label'			  => 'URL for Page 2',
      'description'	=> 'URL for Page 2',
      'section'		  => 'sec_slider',
      'type'			  => 'url'
    )
  );

  // Field 7 - Slider Page Number 3
  $wp_customize->add_setting(
    'set_slider_page_3', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'absint'
    )
  );

  $wp_customize->add_control(
    'set_slider_page_3', array(
      'label'			  => 'Set slider page 3',
      'description'	=> 'Set slider page 3',
      'section'		  => 'sec_slider',
      'type'			  => 'dropdown-pages'
    )
  );

  // Field 8 - Slider Button Text Number 3
  $wp_customize->add_setting(
    'set_slider_button_text_3', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'set_slider_button_text_3', array(
      'label'			  => 'Button Text for Page 3',
      'description'	=> 'Button Text for Page 3',
      'section'		  => 'sec_slider',
      'type'			  => 'text'
    )
  );

  // Field 9 - Slider Button URL Number 3
  $wp_customize->add_setting(
    'set_slider_button_url_3', array(
      'type'					      => 'theme_mod',
      'default'				      => '',
      'sanitize_callback'		=> 'esc_url_raw'
    )
  );

  $wp_customize->add_control(
    'set_slider_button_url_3', array(
      'label'			  => 'URL for Page 3',
      'description'	=> 'URL for Page 3',
      'section'		  => 'sec_slider',
      'type'			  => 'url'
    )
  );
}

add_action( 'customize_register', 'fancy_lab_customizer' );