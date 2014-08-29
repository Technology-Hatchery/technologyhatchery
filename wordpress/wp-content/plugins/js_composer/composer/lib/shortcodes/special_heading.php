<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Special Heading
---------------------------------------------------------- */

class WPBakeryShortCode_AZ_Special_Heading extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $heading_type = $heading_style = $heading_align = $heading_color = $custom_heading_color = $padding_bottom_heading = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'heading_type' => '',
		'heading_style' => '',
		'heading_align' => '',
		'heading_color' => '',
		'custom_heading_color' => '',
		'padding_bottom_heading' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
	  if ($heading_color=="custom") { $heading_color = ' style="color: '.$custom_heading_color.';"'; }
	  
	  $padding_bottom_heading = 'style="padding-bottom: '.$padding_bottom_heading.'px;"';
	  
	  $animation_loading_class = null;
	  if ($animation_loading == "yes") {
		$animation_loading_class = 'animated-content';
	  }
	  
	  $animation_effect_class = null;
	  if ($animation_loading == "yes") {
		$animation_effect_class = $animation_loading_effects;
	  }
	  
	  $output .= '<div class="special-heading '.$heading_align. ' ' .$heading_style.$el_class.' '.$animation_loading_class.' '.$animation_effect_class.'" '.$padding_bottom_heading.'>';
	  $output .= '<h'. $heading_type . $heading_color .'>'.wpb_js_remove_wpautop($content).'</h'. $heading_type. '>';
	  $output .= '</div>';
	
	  return $output . $this->endBlockComment('az_special_heading') . "\n";
  }
}

?>