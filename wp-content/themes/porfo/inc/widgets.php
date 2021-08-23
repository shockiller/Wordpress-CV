<?php


// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Requireing the custom widget

function porfo_theme_sidebar() {

	// globalizing theme options framework
	$porfo = get_option('porfo');

	// Registering widgets for sidebar
	$args = array(
		'id'            => 'porfo_sidebar',
		'name'   		=> esc_html__('Blog Sidebar', 'porfo'),
		'description'   => esc_html__('Add your widgets here to show on blog sidebar', 'porfo'),
	    'class'         => '',
		'before_widget' => '<div class="widget %2$s ">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="wdgt_title"><h2>',
		'after_title'   => '</h2></div>'
	);

	register_sidebar($args);

	//
	// Get footer widget column settings
	//
	$footer_btm_widget_col = isset( $porfo['footer_layout'] ) ?
							$porfo['footer_layout'] :
							'col-md-3';

	// Registering widgets for sidebar
	$args = array(
		'id'            => 'porfo_footer_widget',
		'name'   		=> esc_html__('Footer Widget', 'porfo'),
		'description'   => esc_html__('Add your widgets here to show on footer', 'porfo'),
	    'class'         => '',
		'before_widget' => '<div class="%2$s '. $footer_btm_widget_col .'"><div class="widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="wdgt_title"><h2>',
		'after_title'   => '</h2></div>'
	);

	register_sidebar($args);



}
add_action('widgets_init', 'porfo_theme_sidebar');
