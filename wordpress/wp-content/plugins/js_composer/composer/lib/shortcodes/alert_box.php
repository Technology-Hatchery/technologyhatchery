<?php
/**
* WPBakery Visual Composer shortcodes
*
* @package WPBakeryVisualComposer
*
*/
 
$type_arr = array(
				__("Standard", "js_composer") => "alert-standard",
				__("Warning", "js_composer") => "alert-warning",
				__("Error", "js_composer") => "alert-error",
				__("Info", "js_composer") => "alert-info",
				__("Success", "js_composer") => "alert-success"
			);

class WPBakeryShortCode_AZ_Alert_Box extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        $animation_loading = $animation_loading_effects = $el_class = $type = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
            'el_class' => '',
			'type' => ''
        ), $atts));

        $output = '';
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}
	  
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'alert '.$type. ' ' .$el_class, $this->settings['base']);
        $output .= "\n\t".'<div class="'.$css_class.' '.$animation_loading_class.' '.$animation_effect_class.'"><a class="close" href="#" data-dismiss="alert">×</a>';
        $output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
        $output .= "\n\t".'</div>'.$this->endBlockComment('az_alert_box')."\n";

        return $output;
    }
	
}

?>
