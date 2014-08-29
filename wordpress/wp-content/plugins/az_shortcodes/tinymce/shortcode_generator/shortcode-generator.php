<?php
/*-----------------------------------------------------------------------------------*/
/*	Shortcode Generator
/*-----------------------------------------------------------------------------------*/

require_once( 'access-wp.php' );
require_once( 'shortcodes-definitions.php' );
require_once( 'option-element.php' );

$html_options = null;

$shortcode_html = '

<div id="shortcode-generator">
    					
	<div class="shortcode-content">		
		<div class="label"><strong>'. __("AZ Shortcode", 'textdomain') .'</strong></div>			
		<div class="content"><select id="az-shortcodes">
		<option value="0" selected="selected">'. __("Choose your Shortcode...", 'textdomain') .'</option>';
		
		foreach( $az_shortcodes as $shortcode => $options ){
			
			if(strpos($shortcode,'header') !== false) {
				$shortcode_html .= '<optgroup label="'.$options['title'].'">';
			}
			else {
				$shortcode_html .= '<option value="'.$shortcode.'">'.$options['title'].'</option>';
				$html_options .= '<div class="shortcode-options" id="options-'.$shortcode.'" data-name="'.$shortcode.'" data-type="'.$options['type'].'">';
				
				if( !empty($options['attr']) ){
					 foreach( $options['attr'] as $name => $attr_option ){
						$html_options .= az_option_element( $name, $attr_option, $options['type'], $shortcode );
					 }
				}

				$html_options .= '</div>'; 
			}
			
		} 

$shortcode_html .= '</select></div> <div class="hr"></div>'; ?>

<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" href="<?php echo AZ_TINYMCE_URI; ?>/shortcode_generator/css/tinymce.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_include/css/fonts.css" />

<script src="<?php echo AZ_TINYMCE_URI; ?>/shortcode_generator/js/popup.js"></script>

</head>

<body>	
<?php echo $shortcode_html . $html_options;  ?>

	<div id="shortcode-content">
		
		<div class="label"><label id="option-label" for="shortcode-content"><?php _e( 'Content: ', 'textdomain' ); ?> </label></div>
		<div class="content"><textarea id="content"></textarea></div>
	
	    <div class="hr"></div>
	    
	</div>

	<code class="shortcode_storage"><span id="shortcode-storage-o" style=""></span><span id="shortcode-storage-d"></span><span id="shortcode-storage-c" style=""></span></code>
	<a class="btn" id="add-shortcode"><?php _e( 'Add Shortcode', 'textdomain' ); ?></a>
	
</div>

</div>
</body>
</html>