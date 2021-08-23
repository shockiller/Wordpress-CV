<?php


// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function porfo_theme_options_style() {

	// Globalizing theme options values
	global $porfo;

	//
	// Enqueueing StyleSheet file
	//
	wp_enqueue_style( 'porfo-theme-custom-style', get_template_directory_uri() . '/assets/css/theme_options_style.css'  );

	$css_output = '';

	if( isset($porfo['footer_bottom_border_color'])  ) :

		$css_output .= "
			.footer_btm {
				border-top-color : {$porfo['footer_bottom_border_color']};
			}
		";

	endif;

	wp_add_inline_style( 'porfo-theme-custom-style', $css_output );
}
add_action('wp_enqueue_scripts', 'porfo_theme_options_style');
