<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Button
---------------------------------------------------------- */

class WPBakeryShortCode_AZ_Buttons extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $buttonlabel = $buttonlink = $target = $buttonsize = $inverted = $checkicon = $icon = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
	  	'buttonlabel' => '',
        'buttonlink' => '',
        'target' => '',
        'buttonsize' => '',
		'checkicon' => '',
		'icon' => '',
		'inverted' => false,
        'el_class' => ''
      ), $atts ) );
      $output = '';
      $el_class = $this->getExtraClass($el_class);
      
	  if ( $target == 'same' || $target == '_self' ) { $target = ''; }
      if ( $target != '' ) { $target = ' target="'.$target.'"'; }
	  
	  if ($checkicon=="custom_icon") { $icon = '<i class="'.$icon.'"></i>'; } else { $icon = ""; }
	  
	  $inverted_to = '';
	  if ($inverted==true) {
		$inverted_to = ' inverted';
	  }
	  
	  $animation_loading_class = null;
	  if ($animation_loading == "yes") {
		$animation_loading_class = 'animated-content';
	  }
	  
	  $animation_effect_class = null;
	  if ($animation_loading == "yes") {
		$animation_effect_class = $animation_loading_effects;
	  }
	  
	  $output .= '<a class="button-main '.$buttonsize.$inverted_to.$el_class.' '.$animation_loading_class.' '.$animation_effect_class.'" href="'.$buttonlink.'"'.$target.'>'.$icon.$buttonlabel.'</a>';
      
      return $output . $this->endBlockComment('az_buttons') . "\n";
  }
}

?>