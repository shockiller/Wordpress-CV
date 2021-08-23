<?php
/*
Plugin Name: Porfo Theme Support
Plugin URI: http://themes.graphichilly.com/Porfo
Description: This plugin is compatible with Porfo Portfolio Theme theme
Author: Ohidul
Author URI: http://ohidul.com
Version: 1.1.2
Text Domain: porfo
*/


add_action( 'init', 'porfo_ts_textdomain' );

function porfo_ts_textdomain() {
  load_plugin_textdomain( 'porfo', false, basename( dirname( __FILE__ ) ) . '/languages' );
}


// Theme Custom Post Types
require_once plugin_dir_path(__FILE__) . 'theme-custom-post-types.php';

// Theme Shortcodes
require_once plugin_dir_path(__FILE__) . '/theme-shortcodes.php';
