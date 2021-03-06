<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Video Self-Hosted / Video Embed
---------------------------------------------------------- */

class WPBakeryShortCode_AZ_Video_Container extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
	  $animation_loading_class = null;
	  if ($animation_loading == "yes") {
		$animation_loading_class = 'animated-content';
	  }
	  
	  $animation_effect_class = null;
	  if ($animation_loading == "yes") {
		$animation_effect_class = $animation_loading_effects;
	  }
        
	  $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'video-builder '.$el_class, $this->settings['base']);
	  $output .= '<div class="'.$css_class.' '.$animation_loading_class.' '.$animation_effect_class.'">'. wpb_js_remove_wpautop($content) .'</div>';
	
	  return $output . $this->endBlockComment('az_video_container') . "\n";
  }
}

?>