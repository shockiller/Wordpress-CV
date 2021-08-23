<?php 

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

// Define the DHRUBOK Folder
if( ! defined( 'PORFO_DIR' ) ) {
	define('PORFO_DIR', get_template_directory() );
}

// Define the DHRUBOK Partials Folder
if( ! defined( 'PORFO_PARTIALS_DIR' ) ) {
	define('PORFO_PARTIALS_DIR', trailingslashit( PORFO_DIR ) . 'partials' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_ASSETS_DIR' ) ) {
	define('PORFO_ASSETS_DIR', trailingslashit( PORFO_DIR ) . 'assets' );
}


// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_INC_DIR' ) ) {
	define('PORFO_INC_DIR', trailingslashit( PORFO_DIR ) . 'inc' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_FRAMEWORK_DIR' ) ) {
	define('PORFO_FRAMEWORK_DIR', trailingslashit( PORFO_INC_DIR ) . 'framework' );
}

// Define the Libs Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_LIBS_DIR' ) ) {
	define('PORFO_LIBS_DIR', trailingslashit( PORFO_DIR ) . 'libs' );
}

// Define the Shortcodes Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_SHORTCODES_DIR' ) ) {
	define('PORFO_SHORTCODES_DIR', trailingslashit( PORFO_INC_DIR ) . 'shortcodes' );
}

// Define the Classes Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_CLASSES_DIR' ) ) {
	define('PORFO_CLASSES_DIR', trailingslashit( PORFO_INC_DIR ) . 'classes' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_WIDGETS_DIR' ) ) {
	define('PORFO_WIDGETS_DIR', trailingslashit( PORFO_INC_DIR ) . 'widgets' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_INC_VC_DIR' ) ) {
	define('PORFO_INC_VC_DIR', trailingslashit( PORFO_INC_DIR ) . 'visual_composer' );
}

// Define the PLUGINS Folder of the DHRUBOK Directory
if( ! defined( 'PORFO_INC_PLUGINS_DIR' ) ) {
	define('PORFO_INC_PLUGINS_DIR', trailingslashit( PORFO_INC_DIR ) . 'plugins' );
}
