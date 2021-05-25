<?php // Fancy Lab Sidebars & Widgets

function fancy_lab_sidebars(){
	register_sidebar( array(
		'name'					=> esc_html__( 'Fancy Lab Main Sidebar', 'fancy-lab' ),
		'id'						=> 'fancy-lab-sidebar-1',
		'description'		=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'		=> '</h4>'
	) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Shop', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-shop',
		'description'	=> esc_html__( 'Drag and drop your WooCommerce widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 1', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer1',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 2', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer2',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 3', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer3',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
}

add_action( 'widgets_init', 'fancy_lab_sidebars' );