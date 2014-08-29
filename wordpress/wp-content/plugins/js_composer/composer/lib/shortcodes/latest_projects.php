<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Latest Projects / Works
---------------------------------------------------------- */

class WPBakeryShortCode_AZ_Latest_Projects extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $project_columns_count = $project_post_number = $project_post_link = $project_categories = $orderby = $order = $el_class = '';
      extract( shortcode_atts( array(
	  	'project_columns_count' => '',
		'project_post_number' => 'all',
		'project_post_link' => '',
		'project_categories' => '',
		'orderby' => NULL,
        'order' => 'DESC',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
	  global $post;
	  
	  // Narrow by categories
	  if($project_categories == 'portfolio')
      	$project_categories = '';
	  
	  // Post teasers count
      if ( $project_post_number != '' && !is_numeric($project_post_number) ) $project_post_number = -1;
      if ( $project_post_number != '' && is_numeric($project_post_number) ) $project_post_number = $project_post_number;
	  
	  if ( $project_columns_count=="2clm") { $project_columns_count = 'span6'; }
	  if ( $project_columns_count=="3clm") { $project_columns_count = 'span4'; }
	  if ( $project_columns_count=="4clm") { $project_columns_count = 'span3'; }
	  
	  $args = array( 
	  		'posts_per_page' => $project_post_number, 
		   	'post_type' => 'portfolio',
			'project-category' => $project_categories,
			'orderby' => $orderby,
			'order' => $order
		);

	  // Run query
	  $my_query = new WP_Query($args);
	  
	  $output .= '<div class="row no-sortable'. $el_class .'">';
	  $output .= '<ul id="latest-work-thumbs">';
	  
	  while($my_query->have_posts()) : $my_query->the_post();
	    
		$post_id = $my_query->post->ID;

		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$img_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-thumb' );
		
		$fancy_video = get_post_meta($post->ID, '_az_fancy_video', true);
		$fancy_gallery = get_post_meta($post->ID, '_az_fancy_gallery', true);
		
		if(!empty($fancy_gallery)) { $fancy_gallery = 'data-fancybox-group="'. strtolower($fancy_gallery) .'"'; }

		$output .= '<li class="item-project '.$project_columns_count.'">';
		
		if($project_post_link == "link_fancybox") {
			
			if( !empty($fancy_video)) {
				
				$output .= '<a class="hover-wrap fancybox-media" href="'. $fancy_video .'" title="'. get_the_title() .'" '. $fancy_gallery .'>
								<img src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" /> 
								<div class="overlay"></div>
								<i class="font-icon-plus-3"></i>
							</a>';
							
			} else {
				
				$output .= '<a class="hover-wrap fancybox" href="'. $img_url[0] .'" title="'. get_the_title() .'" '. $fancy_gallery .'>
								<img src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" /> 
								<div class="overlay"></div>
								<i class="font-icon-plus-3"></i>
							</a>';
			}
			
		} else {
		
		$output .= '<a class="hover-wrap" href="'. get_permalink($post_id) .'" title="'. get_the_title() .'">
                   		<img src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" /> 
                        <div class="overlay"></div>
                        <i class="font-icon-plus-3"></i>
                    </a>';
		}
	  	
		$output .= '<h3><a href="'. get_permalink($post_id) .'">'. get_the_title() .'</a></h3>';
		
		$output .= '</li>';
	
	  endwhile;
	  
	  $output .= '</ul>';
	  $output .= '</div>';
	
	  return $output . $this->endBlockComment('az_latest_projects') . "\n";
  }
}

?>