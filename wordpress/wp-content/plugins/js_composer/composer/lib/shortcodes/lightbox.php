<?php
/**
* WPBakery Visual Composer shortcodes
*
* @package WPBakeryVisualComposer
*
*/

// LightBox Image
class WPBakeryShortCode_AZ_Lightbox_Image extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        $animation_loading = $animation_loading_effects = $el_class = $image = $title = $imgmode = $thumb_widht = $gallery_name = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
            'el_class' => '',
			'imgmode' => '',
			'image' => $image,
			'thumb_widht' => '',
			'gallery_name' => '',
			'title' => ''
        ), $atts));

        $output = '';
		$img_id = preg_replace('/[^\d]/', '', $image);
			
        $el_class = $this->getExtraClass($el_class);
		
		$thumb_widht_to = (!empty($thumb_widht) ? ' style="width:'.$thumb_widht.'px; "' : '');
		$thumb_width_img = (!empty($thumb_widht) ? ' width='.$thumb_widht.' ' : '');
		
		$fancy_gallery = (!empty($gallery_name) ? ' data-fancybox-group="'.$gallery_name.'" ' : '');
		
		$image_string = wp_get_attachment_image_src( $img_id, 'full');
		$image_string = $image_string[0];
		
		if ($imgmode=="responsiveimg") { $imgmode = 'responsiveimg'; }
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'lightbox '.$el_class, $this->settings['base']);		
		$output .= '<div class="'.$css_class.' '.$imgmode.' '.$animation_loading_class.' '.$animation_effect_class.'">';
		$output .= '<a class="fancy-wrap fancybox" title="' . $title . '" href="' . $image_string .'" '.$fancy_gallery.$thumb_widht_to.'>';
		$output .= '<img alt="'.$title.'" src="' . $image_string .'" '.$thumb_width_img.' />';
		$output .= '<div class="overlay"></div>';
		$output .= '<i class="font-icon-search"></i>';
		$output .= '</a>';
		$output .= '</div>'.$this->endBlockComment('az_lightbox_image')."\n";

        return $output;
    }
	
	public function singleParamHtmlHolder($param, $value) {
        $output = '';
        // Compatibility fixes
        $old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
        $new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
        $value = str_ireplace($old_names, $new_names, $value);
        //$value = __($value, "js_composer");
        //
        $param_name = isset($param['param_name']) ? $param['param_name'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $class = isset($param['class']) ? $param['class'] : '';

        if ( isset($param['holder']) == false || $param['holder'] == 'hidden' ) {
            $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" />';
            if(($param['type'])=='attach_image') {
                $img = wpb_getImageBySize(array( 'attach_id' => (int)preg_replace('/[^\d]/', '', $value), 'thumb_size' => 'medium' ));
                $output .= ( $img ? $img['medium'] : '<img width="50" height="50" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />') . '<img src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/elements_icons/single_image.png') . '" class="no_image_image' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'js_composer' ) . '</a>';
            }
        }
        else {
            $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
        }
        return $output;
    }
	
}

// LightBox Video
class WPBakeryShortCode_AZ_Lightbox_Video extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        $animation_loading = $animation_loading_effects = $el_class = $image = $title = $imgmode = $thumb_widht = $gallery_name = $link_url = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
            'el_class' => '',
			'imgmode' => '',
			'image' => $image,
			'thumb_widht' => '',
			'link_url' => '',
			'gallery_name' => '',
			'title' => ''
        ), $atts));

        $output = '';
		$img_id = preg_replace('/[^\d]/', '', $image);
			
        $el_class = $this->getExtraClass($el_class);
		
		$thumb_widht_to = (!empty($thumb_widht) ? ' style="width:'.$thumb_widht.'px"; ' : '');
		$thumb_width_img = (!empty($thumb_widht) ? ' width='.$thumb_widht.' ' : '');
		
		$fancy_gallery = (!empty($gallery_name) ? ' data-fancybox-group="'.$gallery_name.'" ' : '');
		
		$image_string = wp_get_attachment_image_src( $img_id, 'full');
		$image_string = $image_string[0];
		
		if ($imgmode=="responsiveimg") { $imgmode = 'responsiveimg'; }
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'lightbox '.$el_class, $this->settings['base']);		
		$output .= '<div class="'.$css_class.' '.$imgmode.' '.$animation_loading_class.' '.$animation_effect_class.'">';
		$output .= '<a class="fancy-wrap fancybox-media" title="' . $title . '" href="' . $link_url .'" '.$fancy_gallery.$thumb_widht_to.'>';
		$output .= '<img alt="'.$title.'" src="' . $image_string .'" '.$thumb_width_img.' />';
		$output .= '<div class="overlay"></div>';
		$output .= '<i class="font-icon-play"></i>';
		$output .= '</a>';
		$output .= '</div>'.$this->endBlockComment('az_lightbox_video')."\n";

        return $output;
    }
	
	public function singleParamHtmlHolder($param, $value) {
        $output = '';
        // Compatibility fixes
        $old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
        $new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
        $value = str_ireplace($old_names, $new_names, $value);
        //$value = __($value, "js_composer");
        //
        $param_name = isset($param['param_name']) ? $param['param_name'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $class = isset($param['class']) ? $param['class'] : '';

        if ( isset($param['holder']) == false || $param['holder'] == 'hidden' ) {
            $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" />';
            if(($param['type'])=='attach_image') {
                $img = wpb_getImageBySize(array( 'attach_id' => (int)preg_replace('/[^\d]/', '', $value), 'thumb_size' => 'medium' ));
                $output .= ( $img ? $img['medium'] : '<img width="50" height="50" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />') . '<img src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/elements_icons/single_image.png') . '" class="no_image_image' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'js_composer' ) . '</a>';
            }
        }
        else {
            $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
        }
        return $output;
    }
	
}

?>
