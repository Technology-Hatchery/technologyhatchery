<?php 
	
function az_option_element( $name, $attr_option, $type, $shortcode ){
	
	$option_element = null;
	
	(isset($attr_option['desc']) && !empty($attr_option['desc'])) ? $desc = '<p class="description">'.$attr_option['desc'].'</p>' : $desc = '';
		
	switch( $attr_option['type'] ){
		
	case 'radio':
	    
		$option_element .= '<div class="label"><strong>'.$attr_option['title'].': </strong></div><div class="content">';
	    foreach( $attr_option['opt'] as $val => $title ){
	    
		(isset($attr_option['def']) && !empty($attr_option['def'])) ? $def = $attr_option['def'] : $def = '';
		
		 $option_element .= '
			<label for="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'">'.$title.'</label>
		    <input class="attr" type="radio" data-attrname="'.$name.'" name="'.$shortcode.'-'.$name.'" value="'.$val.'" id="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'"'. ( $val == $def ? ' checked="checked"':'').'>';
	    }
		
		$option_element .= $desc . '</div>';
		
	    break;
		
	case 'checkbox':
		
		$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div><div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />'. $desc. '</div> ';
		
		break;	
	
	case 'select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'" class="az-select">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
	
	case 'select_slider':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'" class="az-select">';
			$values = $attr_option['options'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
		
	case 'icons':
		
		$option_element .= '

		<div class="icon-option">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<i class="'.$value.'"></i>';
			}
		$option_element .= $desc . '</div>';
		
		break;
		
	case 'custom':
 
		if( $name == 'accordions' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Accordion Title: ', 'textdomain').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Accordion Content: ', 'textdomain').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Accordion', 'textdomain' ). '</a> <a href="#" class="btn orange add-list-item">'.__('Add Accordion', 'textdomain' ).'</a>';
			
		}
		
		if( $name == 'toggles' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Toggle Title: ', 'textdomain').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Toggle Content: ', 'textdomain').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Toggle', 'textdomain' ). '</a> <a href="#" class="btn orange add-list-item">'.__('Add Toggle', 'textdomain' ).'</a>';
			
		}
		
		if( $name == 'tabs' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Tab Title: ', 'textdomain').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Tab Content: ', 'textdomain').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Tab', 'textdomain' ). '</a> <a href="#" class="btn orange add-list-item">'.__('Add Tab', 'textdomain' ).'</a>';
			
		}
		
		elseif( $name == 'image'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		elseif( $name == 'm4v_url'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="file-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="m4v_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		elseif( $name == 'ogv_url'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="file-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="ogv_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		elseif( $name == 'mp3_url'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="file-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="mp3_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		elseif( $type == 'checkbox' ){
			$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />' . $desc . '</div> ';
		} 
		
		
		break;
		
	case 'textarea':
		$option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><textarea data-attrname="'.$name.'"></textarea> ' . $desc . '</div>';
		break;
			
	case 'text':
	default:
	    $option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><input class="attr" type="text" data-attrname="'.$name.'" value="" />' . $desc . '</div>';
	    break;

    }
	
	
	$option_element .= '<div class="clear"></div>';
    
    return $option_element;
}

?>