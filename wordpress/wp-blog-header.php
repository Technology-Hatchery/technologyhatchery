<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( !isset($wp_did_header) ) {

    $wp_did_header = true;

    //print('<br/><br/>');
    //print('/wp-load.php');
    //print('<br/><br/>');
    require_once( dirname(__FILE__) . '/wp-load.php' );

    //print('<br/><br/>');
    //print('wp()');
    //print('<br/><br/>');
    wp();

    //print('<br/><br/>');
    //print('/template-loader.php');
    //print('<br/><br/>');
    require_once( ABSPATH . WPINC . '/template-loader.php' );

}
