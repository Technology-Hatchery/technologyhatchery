<?php

/*-----------------------------------------------------------------------------------*/
/*	TinyMCE Shortcode Button
/*-----------------------------------------------------------------------------------*/

function az_tiny() {
	
	if ( ( current_user_can('edit_posts') || current_user_can('edit_pages') ) && get_user_option('rich_editing') ) {
     	add_filter("mce_external_plugins", "add_js_plugin");
     	add_filter('mce_buttons', 'register_az_tinymce_button');
   }
 
}

add_action('init', 'az_tiny');


function add_js_plugin( $plugin_array ) {
   $plugin_array['az_buttons'] = plugin_dir_url( __FILE__ ) . 'az.tinymce.js';
   return $plugin_array;
}

function register_az_tinymce_button( $buttons ) {
	array_push( $buttons, "shortcodebtns" );
	return $buttons; 
}

?>