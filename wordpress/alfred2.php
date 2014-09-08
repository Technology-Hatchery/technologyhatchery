<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
//define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
//Log the attempt to load this page
//require( dirname( __FILE__ ) . '/logger.php' );
//Process the rest of the page
//require( dirname( __FILE__ ) . '/wp-blog-header.php' );

$filepath = "C:/Users/Alfred/Dropbox/slider_settings.xml";
var_dump(is_file($filepath));
$obj = simplexml_load_file($filepath);
