<?php
/*
Plugin Name: AZ Shortcodes
Plugin URI: http://www.alessioatzeni.com/
Description: Custom Shortcodes for <strong>Bashee Theme</strong> Only.
Author: Alessio Atzeni
Author URI: http://www.alessioatzeni.com
Version: 1.0
*/


// TRANSLATION
load_plugin_textdomain( 'textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes
/*-----------------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) .'tinymce/tinymce-class.php' );
require_once( plugin_dir_path( __FILE__ ) .'tinymce/shortcode-processing.php' );
define('AZ_TINYMCE_URI', plugin_dir_url( __FILE__ ) .'tinymce');
define('AZ_TINYMCE_DIR', plugin_dir_path( __FILE__ ) .'tinymce');


?>