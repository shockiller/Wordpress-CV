<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Enqueue style and scripts
 *
 */
function porfo_style_scripts() {


	//
	// Enqueueing  Stylesheet files
	//
	wp_enqueue_style( 'porfo-google-fonts', porfo_google_fonts_url(), array(), '1.0.0' );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'themify-icons-css', get_template_directory_uri() . '/assets/css/themify-icons.css' );

	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css' );

	wp_enqueue_style( 'porfo-elements', get_template_directory_uri() . '/assets/css/elements.css' );

	wp_enqueue_style( 'porfo-style', get_template_directory_uri() . '/assets/css/style.css' );

	wp_enqueue_style( 'porfo-blog', get_template_directory_uri() . '/assets/css/blog.css' );

	wp_enqueue_style( 'porfo-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

	wp_enqueue_style( 'porfo-stylesheet', get_stylesheet_uri() );


	//
	// Enqueueing JavaScript files
	//

	wp_enqueue_script('jquery-ui-core');

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'pretty-social', get_template_directory_uri() . '/assets/js/pretty-social.js', array('jquery'), null, true );

	wp_enqueue_script( 'jquery-masonry' );

	wp_enqueue_script( 'masonry' );

	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), null, true );

	wp_enqueue_script( 'jquery-venobox', get_template_directory_uri() . '/assets/js/jquery-venobox.js', array('jquery'), null, true );

	wp_enqueue_script( 'animated-headline', get_template_directory_uri() . '/assets/js/animated-headline.js', array('jquery'), null, true );

	wp_enqueue_script( 'bootstrap-autohide-nav', get_template_directory_uri() . '/assets/js/bootstrap-autohide-nav.js', array('jquery'), null, true );

	wp_enqueue_script( 'particles-js', get_template_directory_uri() . '/assets/js/particles.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'particle-ground', get_template_directory_uri() . '/assets/js/particleground.js', array('jquery'), null, true );

	wp_register_script( 'particles-package-3', get_template_directory_uri() . '/assets/js/particles-package-3.js', array('jquery'), null, true );

	wp_register_script( 'bParticles', get_template_directory_uri() . '/assets/js/bParticles.js', array('jquery'), null, true );
	
	wp_register_script( 'bParticles-config', get_template_directory_uri() . '/assets/js/bParticles-config.js', array('jquery'), null, true );

	wp_register_script( 'porfo-particle-style1', get_template_directory_uri() . '/assets/js/porfo_particles_style1.js', array('jquery'), null, true );

	wp_register_script( 'porfo-particle-style2', get_template_directory_uri() . '/assets/js/porfo_particles_style2.js', array('jquery'), null, true );

	wp_register_script( 'porfo-particle-style3', get_template_directory_uri() . '/assets/js/porfo_particles_style3.js', array('jquery'), null, true );

	wp_register_script( 'porfo-particle-style4', get_template_directory_uri() . '/assets/js/porfo_particles_style4.js', array('jquery'), null, true );

	wp_enqueue_script( 'porfo-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true );

	porfo_google_maps_js_script();


	if( is_singular() && comments_open() && get_option( 'thread_comment' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'porfo_style_scripts' );




/**
 *
 * Admin Enqueue styles and scripts
 *
 */

function porfo_admin_scripts() {

	wp_enqueue_style( 'porfo-admin-style', get_template_directory_uri() . '/assets/css/porfo_admin.css');


	wp_enqueue_script( 'porfo-admin-script', get_template_directory_uri() . '/assets/js/porfo_admin.js', array('jquery'), null, true );

}
add_action( 'admin_enqueue_scripts', 'porfo_admin_scripts' );
