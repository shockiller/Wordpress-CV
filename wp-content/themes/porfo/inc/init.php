<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Theme Constants
require_once trailingslashit( get_template_directory() ) . 'inc/constants.php' ;

// Theme Setup
require_once PORFO_CLASSES_DIR . '/PorfoMain.php';

// Theme Setup
require_once PORFO_INC_DIR . '/theme-setup.php';

// Theme Setup
require_once PORFO_INC_DIR . '/acf-fields.php';

// Theme Style and Scripts Enqueye
require_once PORFO_INC_DIR . '/theme-style-and-scripts.php';

// Theme Shortcodes
require_once PORFO_INC_DIR . '/nav-menu-walker.php';

// Theme Widgets
require_once PORFO_INC_DIR . '/widgets.php';

// WooCommerce Menu Cart
require_once PORFO_INC_DIR . '/woocommerce-menu-cart.php';

// Custom Theme Options Css
require_once PORFO_INC_DIR . '/custom_theme_options_style.php';

// Plugin Install
require_once PORFO_INC_PLUGINS_DIR . '/install-plugin.php';



//
// CS Framework Init
//

// Options Framework
require_once PORFO_FRAMEWORK_DIR . '/theme-options.php';
