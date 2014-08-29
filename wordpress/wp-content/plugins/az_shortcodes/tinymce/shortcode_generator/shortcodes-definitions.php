<?php

// Get All Revolution Slider
function all_rev_sliders_in_array(){
    if (class_exists('RevSlider')) {
        $theslider     = new RevSlider();
        $arrSliders = $theslider->getArrSliders();
        $arrA     = array();
        $arrT     = array();
        foreach($arrSliders as $slider){
            $arrA[]     = $slider->getAlias();
            $arrT[]     = $slider->getTitle();
        }
        if($arrA && $arrT){
            $result = array_combine($arrA, $arrT);
        }
        else
        {
            $result = false;
        }
        return $result;
    }
}

#-----------------------------------------------------------------
# Elements 
#-----------------------------------------------------------------

// Blank Divider
$az_shortcodes['az_blank_divider_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Blank Divider', 'textdomain' ),
	'attr'=>array(
		'height_value'=>array('type'=>'text', 'title'=>__('Height Value', 'textdomain'), 'desc'=>__('Height Value in pixel. Enter only number value.', 'textdomain')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain'))
	)
);

// Divider
$az_shortcodes['az_divider_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Divider', 'textdomain' ),
	'attr'=>array(
		'div_type'=>array('type'=>'select', 'title'=>__('Divider Style', 'textdomain'), 'values' => array ( "normal" => "normal", "short" => "short"), 'desc'=>__('Choose between the two available divider styles.', 'textdomain')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain'))
	)
);

// Accordion
$az_shortcodes['az_accordion_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Accordion Section', 'textdomain' ), 
	'attr'=>array(
		'accordions'=>array('type'=>'custom')
	)
);

// Toggle
$az_shortcodes['az_toggle_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Toggle Section', 'textdomain' ), 
	'attr'=>array(
		'toggles'=>array('type'=>'custom')
	)
);

// Tabs
$az_shortcodes['az_tab_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Tab Section', 'textdomain' ), 
	'attr'=>array(
		'tabs'=>array('type'=>'custom')
	)
);

// Alert Box
$az_shortcodes['az_alert_box_sh'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Alert Box', 'textdomain'), 
	'attr'=>array(
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain')), 
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Type', 'textdomain'), 
			'opt'=>array(
				'standard'=>'Standard',
				'warning'=>'Warning',
				'error'=>'Error',
				'info'=>'Info',
				'success'=>'Success'
			)
		)
	) 
);

// Tooltip
$az_shortcodes['az_tooltip'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Tooltip', 'textdomain'), 
	'attr'=>array(
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Position', 'textdomain'),
			'desc'=>__('Select the position of the tooltip.', 'textdomain'), 
			'opt'=>array(
				'top'=>'Top',
				'left'=>'Left',
				'right'=>'Right',
				'bottom'=>'Bottom'
			)
		),
		'text'=>array(
			'type'=>'text', 
			'title'=>__('Text', 'textdomain'),
			'desc'=>__('This text appear inside the tooltip.', 'textdomain')
		)
	) 
);

// Highlight
$az_shortcodes['az_highlight'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Highlight', 'textdomain'), 
	'attr'=>array(
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Mode', 'textdomain'), 
			'opt'=>array(
				'color-text'=>'Color Text',
				'highlight-text'=>'Highlight Text'
			)
		)
	) 
);

// Dropcap
$az_shortcodes['az_dropcap'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Dropcap', 'textdomain'), 
	'attr'=>array(
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Mode', 'textdomain'), 
			'opt'=>array(
				'dropcap-normal'=>'Dropcap Normal',
				'dropcap-color'=>'Dropcap Color'
			)
		)
	) 
);

// Lightbox Image
$az_shortcodes['az_lightbox_image_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Lightbox Image', 'textdomain' ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image','textdomain'), 'desc'=>__('Select image from media library.', 'textdomain')),
		'thumb_width'=>array('type'=>'text', 'title'  => __('Thumbnail Width','textdomain'), 'desc'=>__('Choose a width for your thumbnail. It will be automatically cropped and resized.', 'textdomain')),
		'title'=>array('type'=>'text', 'title'=>__('Title', 'textdomain'), 'desc'=>__('Insert a Title of your Image.', 'textdomain')),
		'gallery_name'=>array('type'=>'text', 'title'=>__('Gallery Name', 'textdomain'), 'desc'=>__('If you want can insert a name of your gallery here.', 'textdomain')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain'))
	)
);

// Lightbox Video
$az_shortcodes['az_lightbox_video_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Lightbox Video', 'textdomain' ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image','textdomain'), 'desc'=>__('Select image from media library.', 'textdomain')),
		'thumb_width'=>array('type'=>'text', 'title'  => __('Thumbnail Width','textdomain'), 'desc'=>__('Choose a width for your thumbnail. It will be automatically cropped and resized.', 'textdomain')),
		'link_url'=>array('type'=>'text', 'title'=>__('Link URL', 'textdomain'), 'desc'=>__('Insert the URL for video (https://vimeo.com/18439821).', 'textdomain')),
		'title'=>array('type'=>'text', 'title'=>__('Title', 'textdomain'), 'desc'=>__('Insert a Title of your Image.', 'textdomain')),
		'gallery_name'=>array('type'=>'text', 'title'=>__('Gallery Name', 'textdomain'), 'desc'=>__('If you want can insert a name of your gallery here.', 'textdomain')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain'))
	)
);

// Button
$az_shortcodes['az_button_sh'] = array( 
	'type'=>'radios', 
	'title'=>__('Button', 'textdomain'), 
	'attr'=>array(
		'buttonlabel'=>array('type'=>'text', 'title'=>__('Button Label', 'textdomain'), 'desc'=>__('This is the text that appears on your button.', 'textdomain')),
		'buttonlink'=>array('type'=>'text', 'title'=>__('Button Link', 'textdomain'), 'desc'=>__('Where should your button link to?', 'textdomain')),
		'target'=>array(
			'type'=>'select', 
				'title'=>__('Button Link Target', 'textdomain'), 
				'values'=>array(
					'same'=>'_self',
					'new'=>'_blank'
			)
		),
		'buttonsize'=>array(
			'type'=>'select', 
			'title'=>__('Button Size', 'textdomain'), 
			'values'=>array(
				'mini'=>'button-mini',
				'small'=>'button-small',
				'medium'=>'button-medium',
				'large'=>'button-large'
			)
		),
		'inverted'=>array(
			'type'=>'checkbox', 
			'title'=>__('Inverted Color?', 'textdomain')
		),
		'icons' => array(
			'type'=>'icons', 
			'title'=>'Icon', 
			'values'=> array(
			  	'font-icon-phone' 		=> 'font-icon-phone',
				'font-icon-mobile' 		=> 'font-icon-mobile',
				'font-icon-mouse'		=> 'font-icon-mouse',
				'font-icon-directions'	=> 'font-icon-directions', 
				'font-icon-mail'		=> 'font-icon-mail', 
				'font-icon-paperplane'	=> 'font-icon-paperplane',
				'font-icon-pencil'		=> 'font-icon-pencil', 
				'font-icon-feather'		=> 'font-icon-feather', 
				'font-icon-paperclip'	=> 'font-icon-paperclip', 
				'font-icon-drawer'		=> 'font-icon-drawer', 
				'font-icon-reply'		=> 'font-icon-reply', 
				'font-icon-reply-all'	=> 'font-icon-reply-all',
				'font-icon-forward'		=> 'font-icon-forward', 
				'font-icon-user'		=> 'font-icon-user', 
				'font-icon-users'		=> 'font-icon-users', 
				'font-icon-user-add'	=> 'font-icon-user-add', 
				'font-icon-vcard'		=> 'font-icon-vcard', 
				'font-icon-export'		=> 'font-icon-export', 
				'font-icon-location'	=> 'font-icon-location', 
				'font-icon-map'			=> 'font-icon-map', 
				'font-icon-compass'		=> 'font-icon-compass', 
				'font-icon-location-2'	=> 'font-icon-location-2', 
				'font-icon-target'		=> 'font-icon-target', 
				'font-icon-share' 		=> 'font-icon-share', 
				'font-icon-sharable'	=> 'font-icon-sharable',
				'font-icon-heart'		=> 'font-icon-heart', 
				'font-icon-heart-2' 	=> 'font-icon-heart-2', 
				'font-icon-star'		=> 'font-icon-star', 
				'font-icon-star-2'		=> 'font-icon-star-2', 
				'font-icon-thumbs-up'	=> 'font-icon-thumbs-up', 
				'font-icon-thumbs-down'	=> 'font-icon-thumbs-down', 
				'font-icon-chat'		=> 'font-icon-chat', 
				'font-icon-comment'		=> 'font-icon-comment', 
				'font-icon-quote'		=> 'font-icon-quote', 
				'font-icon-house' 		=> 'font-icon-house',
				'font-icon-popup'		=> 'font-icon-popup',
				'font-icon-search' 		=> 'font-icon-search',
				'font-icon-signal' 		=> 'font-icon-signal',
				'font-icon-flashlight'	=> 'font-icon-flashlight', 
				'font-icon-printer' 	=> 'font-icon-printer',
				'font-icon-bell' 		=> 'font-icon-bell',
				'font-icon-link' 		=> 'font-icon-link',
				'font-icon-flag'		=> 'font-icon-flag',
				'font-icon-cog'			=> 'font-icon-cog' ,
				'font-icon-tools' 		=> 'font-icon-tools',
				'font-icon-trophy' 		=> 'font-icon-trophy',
				'font-icon-tag' 		=> 'font-icon-tag',
				'font-icon-camera' 		=> 'font-icon-camera',
				'font-icon-megaphone' 	=> 'font-icon-megaphone',
				'font-icon-moon' 		=> 'font-icon-moon',
				'font-icon-palette'		=> 'font-icon-palette',
				'font-icon-leaf' 		=> 'font-icon-leaf',
				'font-icon-music' 		=> 'font-icon-music',
				'font-icon-music-2'		=> 'font-icon-music-2', 
				'font-icon-new' 		=> 'font-icon-new',
				'font-icon-graduation'	=> 'font-icon-graduation',
				'font-icon-book' 		=> 'font-icon-book',
				'font-icon-newspaper'	=> 'font-icon-newspaper', 
				'font-icon-bag' 		=> 'font-icon-bag',
				'font-icon-airplane'	=> 'font-icon-airplane', 
				'font-icon-lifebuoy'	=> 'font-icon-lifebuoy',
				'font-icon-eye' 		=> 'font-icon-eye',
				'font-icon-clock'		=> 'font-icon-clock', 
				'font-icon-microphone' 	=> 'font-icon-microphone',
				'font-icon-calendar' 	=> 'font-icon-calendar',
				'font-icon-bolt'		=> 'font-icon-bolt',
				'font-icon-thunder'		=> 'font-icon-thunder', 
				'font-icon-droplet' 	=> 'font-icon-droplet',
				'font-icon-cd' 			=> 'font-icon-cd',
				'font-icon-briefcase' 	=> 'font-icon-briefcase',
				'font-icon-air'			=> 'font-icon-air', 
				'font-icon-hourglass' 	=> 'font-icon-hourglass',
				'font-icon-gauge'		=> 'font-icon-gauge', 
				'font-icon-language' 	=> 'font-icon-language',
				'font-icon-network' 	=> 'font-icon-network',
				'font-icon-key' 		=> 'font-icon-key',
				'font-icon-battery'		=> 'font-icon-battery',
				'font-icon-bucket'		=> 'font-icon-bucket',
				'font-icon-magnet' 		=> 'font-icon-magnet', 
				'font-icon-drive' 		=> 'font-icon-drive',
				'font-icon-cup' 		=> 'font-icon-cup',
				'font-icon-rocket' 		=> 'font-icon-rocket',
				'font-icon-brush' 		=> 'font-icon-brush',
				'font-icon-suitcase'	=> 'font-icon-suitcase',
				'font-icon-cone' 		=> 'font-icon-cone',
				'font-icon-earth' 		=> 'font-icon-earth',
				'font-icon-keyboard' 	=> 'font-icon-keyboard',
				'font-icon-browser' 	=> 'font-icon-browser',
				'font-icon-publish' 	=> 'font-icon-publish',
				'font-icon-progress-3'	=> 'font-icon-progress-3',
				'font-icon-progress-2' 	=> 'font-icon-progress-2',
				'font-icon-brogress-1' 	=> 'font-icon-brogress-1',
				'font-icon-progress-0' 	=> 'font-icon-progress-0',
				'font-icon-sun'			=> 'font-icon-sun', 
				'font-icon-sun-2' 		=> 'font-icon-sun-2',
				'font-icon-adjust' 		=> 'font-icon-adjust',
				'font-icon-code'		=> 'font-icon-code', 
				'font-icon-screen' 		=> 'font-icon-screen',
				'font-icon-light-bulb' 	=> 'font-icon-light-bulb',
				'font-icon-credit-card'	=> 'font-icon-credit-card', 
				'font-icon-database' 	=> 'font-icon-database',
				'font-icon-voicemail'	=> 'font-icon-voicemail', 
				'font-icon-clipboard' 	=> 'font-icon-clipboard',
				'font-icon-cart' 		=> 'font-icon-cart',
				'font-icon-box' 		=> 'font-icon-box',
				'font-icon-ticket' 		=> 'font-icon-ticket',
				'font-icon-rss'			=> 'font-icon-rss',
				'font-icon-signal'		=> 'font-icon-signal', 
				'font-icon-thermometer' => 'font-icon-thermometer',
				'font-icon-droplets' 	=> 'font-icon-droplets',
				'font-icon-layout-3' 	=> 'font-icon-layout-3',
				'font-icon-statistics' 	=> 'font-icon-statistics',
				'font-icon-pie' 		=> 'font-icon-pie',
				'font-icon-bars' 		=> 'font-icon-bars',
				'font-icon-graph'		=> 'font-icon-graph', 
				'font-icon-lock' 		=> 'font-icon-lock',
				'font-icon-lock-open' 	=> 'font-icon-lock-open',
				'font-icon-logout' 		=> 'font-icon-logout',
				'font-icon-login'		=> 'font-icon-login',
				'font-icon-checkmark' 	=> 'font-icon-checkmark',
				'font-icon-cross'		=> 'font-icon-cross', 
				'font-icon-minus' 		=> 'font-icon-minus',
				'font-icon-plus' 		=> 'font-icon-plus',
				'font-icon-cross-2' 	=> 'font-icon-cross-2',
				'font-icon-minus-2'		=> 'font-icon-minus-2',
				'font-icon-plus-2'		=> 'font-icon-plus-2', 
				'font-icon-cross-3' 	=> 'font-icon-cross-3',
				'font-icon-minus-3' 	=> 'font-icon-minus-3',
				'font-icon-plus-3' 		=> 'font-icon-plus-3',
				'font-icon-erase' 		=> 'font-icon-erase',
				'font-icon-blocked' 	=> 'font-icon-blocked',
				'font-icon-info' 		=> 'font-icon-info',
				'font-icon-info-2' 		=> 'font-icon-info-2',
				'font-icon-question' 	=> 'font-icon-question',
				'font-icon-help' 		=> 'font-icon-help',
				'font-icon-warning'		=> 'font-icon-warning',
				'font-icon-cycle' 		=> 'font-icon-cycle',
				'font-icon-cw' 			=> 'font-icon-cw',
				'font-icon-ccw' 		=> 'font-icon-ccw',
				'font-icon-shuffle' 	=> 'font-icon-shuffle',
				'font-icon-arrow' 		=> 'font-icon-arrow',
				'font-icon-arrow-2'		=> 'font-icon-arrow-2',
				'font-icon-retweet'	 	=> 'font-icon-retweet',
				'font-icon-loop'		=> 'font-icon-loop', 
				'font-icon-history'		=> 'font-icon-history',
				'font-icon-back'		=> 'font-icon-back', 
				'font-icon-switch' 		=> 'font-icon-switch',
				'font-icon-list'		=> 'font-icon-list',
				'font-icon-add-to-list' => 'font-icon-add-to-list',
				'font-icon-layout' 		=> 'font-icon-layout',
				'font-icon-list-2'		=> 'font-icon-list-2',
				'font-icon-text' 		=> 'font-icon-text',
				'font-icon-text-2'	 	=> 'font-icon-text-2', 
				'font-icon-document' 	=> 'font-icon-document',
				'font-icon-docs' 		=> 'font-icon-docs',
				'font-icon-landscape' 	=> 'font-icon-landscape',
				'font-icon-pictures' 	=> 'font-icon-pictures',
				'font-icon-video' 		=> 'font-icon-video',
				'font-icon-music-3' 	=> 'font-icon-music-3',
				'font-icon-folder'	 	=> 'font-icon-folder',
				'font-icon-archive' 	=> 'font-icon-archive',
				'font-icon-trash'	 	=> 'font-icon-trash',
				'font-icon-upload' 		=> 'font-icon-upload', 
				'font-icon-download' 	=> 'font-icon-download',
				'font-icon-disk' 		=> 'font-icon-disk',
				'font-icon-install'		=> 'font-icon-install',
				'font-icon-cloud' 		=> 'font-icon-cloud',
				'font-icon-upload-2' 	=> 'font-icon-upload-2',
				'font-icon-bookmark' 	=> 'font-icon-bookmark',
				'font-icon-bookmarks' 	=> 'font-icon-bookmarks',
				'font-icon-book-2'	 	=> 'font-icon-book-2',
				'font-icon-play'	 	=> 'font-icon-play',
				'font-icon-pause' 		=> 'font-icon-pause',
				'font-icon-record' 		=> 'font-icon-record',
				'font-icon-stop' 		=> 'font-icon-stop',
				'font-icon-next' 		=> 'font-icon-next',
				'font-icon-previous'	=> 'font-icon-previous',
				'font-icon-first'	 	=> 'font-icon-first',
				'font-icon-last' 		=> 'font-icon-last',
				'font-icon-resize-enlarge' 	=> 'font-icon-resize-enlarge',
				'font-icon-resize-shrink'	=> 'font-icon-resize-shrink',
				'font-icon-volume' 		=> 'font-icon-volume',
				'font-icon-sound'		=> 'font-icon-sound',
				'font-icon-mute'	 	=> 'font-icon-mute',
				'font-icon-flow-cascade'=> 'font-icon-flow-cascade',
				'font-icon-flow-branch' => 'font-icon-flow-branch',
				'font-icon-flow-tree'	=> 'font-icon-flow-tree',
				'font-icon-flow-line' 	=> 'font-icon-flow-line',
				'font-icon-flow-parallel'	=> 'font-icon-flow-parallel',	
				'font-icon-arrow-left-big-flat' 	=> 'font-icon-arrow-left-big-flat' , 
				'font-icon-arrow-down-big-flat'		=> 'font-icon-arrow-down-big-flat',
				'font-icon-arrow-up-big-flat' 		=> 'font-icon-arrow-up-big-flat',
				'font-icon-arrow-right-big-flat'	=> 'font-icon-arrow-right-big-flat', 
				'font-icon-arrow-left-small-flat'	=> 'font-icon-arrow-left-small-flat',
				'font-icon-arrow-down-small-flat' 	=> 'font-icon-arrow-down-small-flat',
				'font-icon-arrow-up-small-flat' 	=> 'font-icon-arrow-up-small-flat',
				'font-icon-arrow-right-small-flat' 	=> 'font-icon-arrow-right-small-flat', 
				'font-icon-arrow-left-circle'	=> 'font-icon-arrow-left-circle',
				'font-icon-arrow-down-circle' 	=> 'font-icon-arrow-down-circle', 
				'font-icon-arrow-up-circle' 	=> 'font-icon-arrow-up-circle',
				'font-icon-arrow-right-circle' 	=> 'font-icon-arrow-right-circle', 
				'font-icon-arrow-left-triangle'		=> 'font-icon-arrow-left-triangle',
				'font-icon-arrow-down-triangle' 	=> 'font-icon-arrow-down-triangle', 
				'font-icon-arrow-up-triangle' 		=> 'font-icon-arrow-up-triangle',
				'font-icon-arrow-right-triangle' 	=> 'font-icon-arrow-right-triangle', 
				'font-icon-arrow-left-simple-round'		=> 'font-icon-arrow-left-simple-round',
				'font-icon-arrow-down-simple-round' 	=> 'font-icon-arrow-down-simple-round', 
				'font-icon-arrow-up-simple-round' 		=> 'font-icon-arrow-up-simple-round', 
				'font-icon-arrow-right-simple-round' 	=> 'font-icon-arrow-right-simple-round',
				'font-icon-arrow-left-simple-thin-round' 	=> 'font-icon-arrow-left-simple-thin-round', 
				'font-icon-arrow-down-simple-thin-round'	=> 'font-icon-arrow-down-simple-thin-round',
				'font-icon-arrow-up-simple-thin-round' 		=> 'font-icon-arrow-up-simple-thin-round', 
				'font-icon-arrow-right-simple-thin-round' 	=> 'font-icon-arrow-right-simple-thin-round',
				'font-icon-arrow-left-simple-thin' 	=> 'font-icon-arrow-left-simple-thin',
				'font-icon-arrow-down-simple-thin' 	=> 'font-icon-arrow-down-simple-thin',
				'font-icon-arrow-up-simple-thin' 	=> 'font-icon-arrow-up-simple-thin',
				'font-icon-arrow-right-simple-thin' => 'font-icon-arrow-right-simple-thin',
				'font-icon-arrow-left-big' 	=> 'font-icon-arrow-left-big',
				'font-icon-arrow-down-big' 	=> 'font-icon-arrow-down-big',
				'font-icon-arrow-up-big' 	=> 'font-icon-arrow-up-big',
				'font-icon-arrow-right-big' => 'font-icon-arrow-right-big',
				'font-icon-arrow-menu' 		=> 'font-icon-arrow-menu',
				'font-icon-ellipsis' 		=> 'font-icon-ellipsis',
				'font-icon-dots' 			=> 'font-icon-dots',
				'font-icon-dot' 			=> 'font-icon-dot',
				'font-icon-align-right' 	=> 'font-icon-align-right',
				'font-icon-align-left' 		=> 'font-icon-align-left',
				'font-icon-align-justify' 	=> 'font-icon-align-justify',
				'font-icon-align-center' 	=> 'font-icon-align-center',
				'font-icon-group' 			=> 'font-icon-group',
				'font-icon-grid' 			=> 'font-icon-grid',
				'font-icon-grid-large' 		=> 'font-icon-grid-large',
				'font-icon-social-zerply' 			=> 'font-icon-social-zerply', 
				'font-icon-social-youtube'  		=> 'font-icon-social-youtube',
				'font-icon-social-yelp' 			=> 'font-icon-social-yelp',
				'font-icon-social-yahoo'			=> 'font-icon-social-yahoo',
				'font-icon-social-wordpress' 		=> 'font-icon-social-wordpress',
				'font-icon-social-virb' 			=> 'font-icon-social-virb',
				'font-icon-social-vimeo' 			=> 'font-icon-social-vimeo',
				'font-icon-social-viddler' 			=> 'font-icon-social-viddler',
				'font-icon-social-twitter' 			=> 'font-icon-social-twitter',
				'font-icon-social-tumblr' 			=> 'font-icon-social-tumblr',
				'font-icon-social-stumbleupon'		=> 'font-icon-social-stumbleupon',
				'font-icon-social-soundcloud' 		=> 'font-icon-social-soundcloud',
				'font-icon-social-skype' 			=> 'font-icon-social-skype',
				'font-icon-social-share-this'		=> 'font-icon-social-share-this',
				'font-icon-social-quora' 			=> 'font-icon-social-quora',
				'font-icon-social-pinterest'		=> 'font-icon-social-pinterest',
				'font-icon-social-photobucket'		=> 'font-icon-social-photobucket',
				'font-icon-social-paypal' 			=> 'font-icon-social-paypal',
				'font-icon-social-myspace' 			=> 'font-icon-social-myspace',
				'font-icon-social-linkedin' 		=> 'font-icon-social-linkedin',
				'font-icon-social-last-fm' 			=> 'font-icon-social-last-fm',
				'font-icon-social-instagram'		=> 'font-icon-social-instagram',
				'font-icon-social-grooveshark' 		=> 'font-icon-social-grooveshark',
				'font-icon-social-google-plus' 		=> 'font-icon-social-google-plus',
				'font-icon-social-github' 			=> 'font-icon-social-github',
				'font-icon-social-forrst' 			=> 'font-icon-social-forrst',
				'font-icon-social-flickr' 			=> 'font-icon-social-flickr',
				'font-icon-social-facebook' 		=> 'font-icon-social-facebook',
				'font-icon-social-evernote' 		=> 'font-icon-social-evernote',
				'font-icon-social-envato' 			=> 'font-icon-social-envato',
				'font-icon-social-email' 			=> 'font-icon-social-email', 
				'font-icon-social-dribbble'			=> 'font-icon-social-dribbble',
				'font-icon-social-digg' 			=> 'font-icon-social-digg',
				'font-icon-social-deviant-art' 		=> 'font-icon-social-deviant-art',
				'font-icon-social-blogger' 			=> 'font-icon-social-blogger',
				'font-icon-social-behance'			=> 'font-icon-social-behance',
				'font-icon-social-bebo' 			=> 'font-icon-social-bebo',
				'font-icon-social-addthis'			=> 'font-icon-social-addthis',
				'font-icon-social-500px' 			=> 'font-icon-social-500px'
			)
		),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain'))
	) 
);

// Revolution Slider
  global $wpdb;
  $rs = $wpdb->get_results( 
  	"
  	SELECT id, title, alias
  	FROM ".$wpdb->prefix."revslider_sliders
  	ORDER BY id ASC LIMIT 100
  	"
  );
  $revsliders = array();
  if ($rs) {
    foreach ( $rs as $slider ) {
      $revsliders[$slider->alias] = $slider->alias;
    }
  } else {
    $revsliders[0] = 'No Slider Found';
  }
  
$az_shortcodes['az_slider'] = array(  
	'type'=>'regular', 
	'title'=>__('Revolution Slider', 'textdomain' ),
	'attr'=>array(
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain')),
		'alias'=>array('type'=>'select_slider', 'title'=>__('Revolution Slider Alias', 'textdomain'), 'options' => $revsliders, 'desc'=>__('Select your Revolution Slider.', 'textdomain')) 
	)
);

// Video Embed Code
$az_shortcodes['az_video_embed'] = array(  
	'type'=>'regular', 
	'title'=>__('Video Embed', 'textdomain' ),
	'attr'=>array(
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain')),
		'link' => array('type'=>'text', 'title'=>__('URL', 'textdomain'),
										'desc'=>__('Working examples, in case you want to use an external service (Video Embed Shortcode):<br/><br/>https://vimeo.com/charlex/shapeshifter <br/>http://www.youtube.com/watch?v=CZIt20emgLY', 'textdomain'))
	)
);

// Video
$az_shortcodes['az_video'] = array( 
	'type'=>'regular', 
	'title'=>__('Video Self Hosted', 'textdomain' ), 
	'attr'=>array( 
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain')),
		'm4v_url'=>array('type'=>'custom', 'title'=>__('M4V File URL', 'textdomain'), 'desc'=>__('Upload a M4V File.', 'textdomain')),
		'ogv_url'=>array('type'=>'custom', 'title'=>__('OGV File URL', 'textdomain'), 'desc'=>__('Upload a OGV File.', 'textdomain')),
		'image'=>array('type'=>'custom', 'title'=> __('Preview Image','textdomain'), 'desc'=>__('If you wish can upload a poster image.', 'textdomain'))
	)
);

// Audio
$az_shortcodes['az_audio'] = array( 
	'type'=>'regular', 
	'title'=>__('Audio Self Hosted', 'textdomain' ), 
	'attr'=>array( 
		'class'=>array('type'=>'text', 'title'=>__('Class', 'textdomain'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'textdomain')),
		'mp3_url'=>array('type'=>'custom', 'title'=>__('MP3 File URL', 'textdomain'), 'desc'=>__('Upload a MP3 File.', 'textdomain'))
	)
);


?>