<?php
/**
 * WPBakery Visual Composer row
 *
 * @package WPBakeryVisualComposer
 *
 */

class WPBakeryShortCode_VC_Row extends WPBakeryShortCode {
    protected $predefined_atts = array(
        'el_class' => '',
		'section_id' => '',
		'section_class' => '',
		'section_mode' => '',
		'bgmode' => '',
		'custombgcolor'	=> '',
		'bgposition' => '',
		'bgrepeat' => '',
		'bgattachment' => '',
		'padding' => '',
		'shadow' => '',
		'image' => ''
    );

    public function content( $atts, $content = null ) {
        $el_class = $section_id = $section_class = $section_mode = $bgcolor = $custombgcolor = $bgpositon = $bgrepeat = $bgattachment = $padding = $shadow = $image = $row_class = '';
        $output = '';
        extract(shortcode_atts(array(
            'el_class' => '',
			'section_id' => '',
			'section_class' => '',
			'section_mode' => 'normal',
			'row_class' => 'row',
			'bgmode' => '',
			'custombgcolor' => '',
			'bgposition' => '',
			'bgrepeat' => '',
			'bgattachment' => '',
			'padding' => '',
			'shadow' => '',
			'image' => $image
        ), $atts));
        wp_enqueue_style( 'js_composer_front' );
        wp_enqueue_script( 'wpb_composer_front_js' );
        wp_enqueue_style('js_composer_custom_css');
		
		if ($section_mode=="normal") { $row_class = 'row'; $section_mode = 'container'; }
		if ($section_mode=="fluid") { $row_class = 'row-fluid'; $section_mode = 'container-fluid'; }
		
        $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $row_class.(!empty($el_class) ? ' '.$el_class : ''), $this->settings['base']);
		
		$section_id_Value = (!empty($section_id) ? ' id="'.$section_id.'" ' : '');
		
		$img_id = preg_replace('/[^\d]/', '', $image);
		$image_string = wp_get_attachment_image_src( $img_id, 'full');
		$image_string = $image_string[0];
		
		$bgposition = str_replace("_", " ", $bgposition);
		$img_bg = null;
		
		if ($bgmode=="custom") { $bgmode = ' style="background-color: '.$custombgcolor.';"'; }
		if ($bgrepeat=="stretch") { $bgrepeat = 'background-repeat: no-repeat; background-size: cover;'; } else { $bgrepeat = 'background-repeat: '.$bgrepeat.';';}
		
		if ($bgmode=="customimagebg") { $bgmode = 'style="background-attachment: '.$bgattachment.'; background-position: '.$bgposition.'; '.$bgrepeat.' background-image: url('.$image_string.');"'; $img_bg = 'image-cont'; }
		
        $output .= '<section '.$section_id_Value.' class="main-content'.' '.$img_bg.' '.$section_class.' '.$padding.' '.$shadow.'" '.$bgmode.'>';
		$output .= '<div class="'.$section_mode.'">';
		$output .= '<div class="'.$css_class.'">';
        $output .= wpb_js_remove_wpautop($content);
        $output .= '</div>';
		$output .= '</div>';
		$output .= '</section>'.$this->endBlockComment('row');
        return $output;
    }

    /* This returs block controls
   ---------------------------------------------------------- */
    public function getColumnControls($controls) {
        global $vc_row_layouts;
        $controls_start = '<div class="controls controls_row">';
        $controls_end = '</div>';

        $right_part_start = '';//'<div class="controls_right">';
        $right_part_end = '';//'</div>';

        //Create columns
        $controls_center_start = '<span>';
        $controls_layout = '';
        foreach($vc_row_layouts as $layout) {
            $controls_layout .= '<a class="set_columns '.$layout['icon_class'].'" data-cells="'.$layout['cells'].'" data-cells-mask="'.$layout['mask'].'" title="'.$layout['title'].'"></a> ';
        }
        $controls_move = ' <a class="column_move" href="#" title="'.__('Drag row to reorder', 'js_composer').'"></a>';
        $controls_delete = '<a class="column_delete" href="#" title="'.__('Delete this row', 'js_composer').'"></a>';
        $controls_edit = ' <a class="column_edit" href="#" title="'.__('Edit this row', 'js_composer').'"></a>';
        $controls_clone = ' <a class="column_clone" href="#" title="'.__('Clone this row', 'js_composer').'"></a>';
        $controls_center_end = '</span>';

        $column_controls_full =  $controls_start. $controls_move . $controls_center_start . $controls_layout . $controls_delete . $controls_clone . $controls_edit . $controls_center_end . $controls_end;

        return $column_controls_full;
    }

    public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));

        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));

        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div'.$this->customAdminBockParams().' data-element_type="'.$this->settings["base"].'" class="wpb_'.$this->settings['base'].' wpb_sortable">';
            $output .= str_replace("%column_size%", 1, $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div class="vc_row-fluid wpb_row_container vc_container_for_children">';
            if($content=='' && !empty($this->settings["default_content_in_template"])) {
                $output .= do_shortcode( shortcode_unautop($this->settings["default_content_in_template"]) );
            } else {
                $output .= do_shortcode( shortcode_unautop($content) );

            }
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = $$param['param_name'];
                    //var_dump($param_value);
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= '</div>';
        }

        return $output;
    }
    public function customAdminBockParams() {
        return '';
    }
}


class WPBakeryShortCode_VC_Row_Inner extends WPBakeryShortCode_VC_Row {
		
		public function content( $atts, $content = null ) {
        $el_class = '';
        $output = '';
        extract(shortcode_atts(array(
            'el_class' => ''
        ), $atts));
        wp_enqueue_style( 'js_composer_front' );
        wp_enqueue_script( 'wpb_composer_front_js' );
        wp_enqueue_style('js_composer_custom_css');
		
        $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'row-fluid' .(!empty($el_class) ? ' '.$el_class : ''), $this->settings['base']);
        $output .= '<div class="'.$css_class.'">';
        $output .= wpb_js_remove_wpautop($content);
        $output .= '</div>'.$this->endBlockComment('row');
        return $output;
	
        return $this->contentAdmin($this->atts);
    }
}



