<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define the DHRUBOK Folder
if( ! defined( 'JOHNY_TEMPLATE_DIR' ) ) {
	define('JOHNY_TEMPLATE_DIR', get_template_directory_uri() );
}
