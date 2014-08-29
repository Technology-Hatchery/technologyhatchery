<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Box Icon
---------------------------------------------------------- */

class WPBakeryShortCode_AZ_Box_Icon extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $icon = $title = $position = $link_url = $target = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
	  	'icon' => '',
        'title' => '',
        'position' => '',
        'link_url' => '',
		'target' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
      $el_class = $this->getExtraClass($el_class);
      
	  if ( $target == 'same' || $target == '_self' ) { $target = ''; }
      if ( $target != '' ) { $target = ' target="'.$target.'"'; }
	  
	  if ( $position == 'same' || $position == 'top' ) { $position = ''; }
	  
	  if ( $position=="left" ) { $position = 'listed-left'; }
	  if ( $position=="right" ) { $position = 'listed-right'; }
	  
	  $icon = '<i class="'.$icon.'"></i>';
	  
	  $animation_loading_class = null;
	  if ($animation_loading == "yes") {
		$animation_loading_class = 'animated-content';
	  }
	  
	  $animation_effect_class = null;
	  if ($animation_loading == "yes") {
		$animation_effect_class = $animation_loading_effects;
	  }
	  
	  $output .= '<a class="box '.$position.$el_class.' '.$animation_loading_class.' '.$animation_effect_class.'" href="'.$link_url.'"'.$target.'>';
	  $output .= '<div class="icon"><span class="circle"></span>'.$icon.'</div>';
	  $output .= '<div class="box-text">'; 
	  $output .= '<h4>'.$title.'</h4>';
	  $output .= wpb_js_remove_wpautop($content);
	  $output .= '</div>';
	  $output .= '</a>';
      
      return $output . $this->endBlockComment('az_box_icon') . "\n";
  }
}

?>