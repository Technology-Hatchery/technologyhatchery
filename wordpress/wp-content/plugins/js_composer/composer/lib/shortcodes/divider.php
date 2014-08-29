<?php
/**
* WPBakery Visual Composer shortcodes
*
* @package WPBakeryVisualComposer
*
*/

class WPBakeryShortCode_AZ_Divider extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $animation_loading = $animation_loading_effects = $div_type = $el_class = '';
        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
			'div_type' => '',
            'el_class' => ''
        ), $atts));

        $output = '';
		
		if ( $div_type=="short") { $div_type = ' short'; }
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'divider '.$el_class, $this->settings['base']);		
		$output .= '<div class="'.$css_class.$div_type.' '.$animation_loading_class.' '.$animation_effect_class.'"></div>'.$this->endBlockComment('az_divider')."\n";

        return $output;
    }
	
	public function outputTitle($title) {
        return '';
    }
	
}

class WPBakeryShortCode_AZ_Blank_Divider extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $height_value = $el_class = '';
        extract(shortcode_atts(array(
			'height_value' => '',
            'el_class' => ''
        ), $atts));

        $output = '';
		
		$height_value = ' style="height: '.$height_value.'px;"';
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'blank_divider '.$el_class, $this->settings['base']);		
		$output .= '<div class="'.$css_class.'"'.$height_value.'></div>'.$this->endBlockComment('az_blank_divider')."\n";

        return $output;
    }
	
	public function outputTitle($title) {
        return '';
    }
	
}

?>