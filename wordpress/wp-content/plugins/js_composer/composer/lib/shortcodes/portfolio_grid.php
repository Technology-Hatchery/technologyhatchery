<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Portfolio Grid
---------------------------------------------------------- */

class WPBakeryShortCode_AZ_Portfolio_Grid extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $portfolio_layout = $portfolio_columns_count = $animation_loading = $animation_loading_effects = $portfolio_post_number = $portfolio_post_link = $portfolio_sortable_name = $portfolio_sortable_mode = $portfolio_categories = $orderby = $order = $el_class = '';
      extract( shortcode_atts( array(
	  	'portfolio_layout' => '',
		'animation_loading' => '',
		'animation_loading_effects' => '',
	  	'portfolio_columns_count' => '',
		'portfolio_post_number' => 'all',
		'portfolio_post_link' => '',
		'portfolio_sortable_name' => '',
		'portfolio_sortable_mode' => 'yes',
		'portfolio_categories' => '',
		'orderby' => NULL,
        'order' => 'DESC',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
	  global $post;
	  
	  // Narrow by categories
	  if($portfolio_categories == 'portfolio')
      	$portfolio_categories = '';
	  
	  // Post teasers count
      if ( $portfolio_post_number != '' && !is_numeric($portfolio_post_number) ) $portfolio_post_number = -1;
      if ( $portfolio_post_number != '' && is_numeric($portfolio_post_number) ) $portfolio_post_number = $portfolio_post_number;
	  
	  if ( $portfolio_columns_count=="2clm") { $portfolio_columns_count = 'span6'; }
	  if ( $portfolio_columns_count=="3clm") { $portfolio_columns_count = 'span4'; }
	  if ( $portfolio_columns_count=="4clm") { $portfolio_columns_count = 'span3'; }
	  
	  $args = array( 
	  		'posts_per_page' => $portfolio_post_number, 
		   	'post_type' => 'portfolio',
			'project-category' => $portfolio_categories,
			'orderby' => $orderby,
			'order' => $order
		);

	  // Run query
	  $my_query = new WP_Query($args);
	  
	  if($portfolio_sortable_mode == "yes") {
		  $output .= '
					  <div id="portfolio-filter" class="row">
							<div class="span12">
								<div class="dropdown">
									<div class="dropmenu">
										<p class="selected">'. $portfolio_sortable_name . '</p>
										<i class="font-icon-arrow-down-simple-thin-round"></i>
									</div>					
									<div class="dropmenu-active">
										<ul class="option-set" data-option-key="filter">
											<li><a class="selected drop-selected" href="#filter" data-option-value="*">'. $portfolio_sortable_name . '</a></li>';
											 $list_categories = get_categories("taxonomy=project-category");
												foreach ($list_categories as $list_category) : 									
												$output .= '<li><a href="#filter" data-option-value=".' . strtolower(str_replace(" ","-", ($list_category->slug))) . '">' . $list_category->name . '</a></li>';
												endforeach;        										
		$output .= '					</ul>
									</div>
								</div>							
							</div>
						</div>';
	  }
	  
	  $sortable_class = '';
	  if ($portfolio_sortable_mode == "no") {
		$sortable_class = ' no-sortable';
	  }
	  
	  $output .= '<div class="row '. $el_class .'">';
	  $output .= '<div id="portfolio-projects" class="'. $sortable_class .' '. $portfolio_layout .'">';
	  $output .= '<ul id="projects">';
	  
	  
	  
	  while($my_query->have_posts()) : $my_query->the_post();
	  
	    $terms = get_the_terms($post->id,"project-category");
		$list_categories = NULL;
		
			if ( !empty($terms) ){
			 foreach ( $terms as $term ) {
			   $list_categories .= strtolower($term->slug) . ' ';
			 }
		}
		
		$attrs = get_the_terms( $post->ID, 'project-attribute' );
		$attributes_fields = NULL;
		
		if ( !empty($attrs) ){
		 foreach ( $attrs as $attr ) {
		   $attributes_fields[] = $attr->name;
		 }
		 
		 $on_attributes = join( " - ", $attributes_fields );
		}
	    
		$post_id = $my_query->post->ID;

		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$img_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-thumb' );
		
		$fancy_video = get_post_meta($post->ID, '_az_fancy_video', true);
		$fancy_gallery = get_post_meta($post->ID, '_az_fancy_gallery', true);
		
		if(!empty($fancy_gallery)) { $fancy_gallery = 'data-fancybox-group="'. strtolower($fancy_gallery) .'"'; }
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}

		$output .= '<li class="item-project '.$portfolio_columns_count. ' ' . $list_categories .'">
					<div class="item-container '. $animation_loading_class .' '. $animation_effect_class .'">';
		
		if($portfolio_post_link == "link_fancybox") {
			
			if( !empty($fancy_video)) {
				
				$output .= '<a class="hover-wrap fancybox-media" href="'. $fancy_video .'" title="'. get_the_title() .'" '. $fancy_gallery .'>';
				
				if ($portfolio_layout == "masonry-portfolio") {
					$output .= '<img src="'. $img_url[0] .'" width="'.$img_url[1].'" height="'.$img_url[2].'" alt="'. get_the_title() .'" />';
				} else {
					$output .= '<img src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" />';
				}
								 
				$output .= '<div class="overlay"></div>
								<i class="font-icon-plus-3"></i>
							</a>';
							
			} else {
				
				$output .= '<a class="hover-wrap fancybox" href="'. $img_url[0] .'" title="'. get_the_title() .'" '. $fancy_gallery .'>';

				if ($portfolio_layout == "masonry-portfolio") {
					$output .= '<img src="'. $img_url[0] .'" width="'.$img_url[1].'" height="'.$img_url[2].'" alt="'. get_the_title() .'" />';
				} else {
					$output .= '<img src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" />';
				}
				
				$output .= '<div class="overlay"></div>
								<i class="font-icon-plus-3"></i>
							</a>';
			}
			
		} else {
		
		$output .= '<a class="hover-wrap" href="'. get_permalink($post_id) .'" title="'. get_the_title() .'">';
		
		if ($portfolio_layout == "masonry-portfolio") {
			$output .= '<img src="'. $img_url[0] .'" width="'.$img_url[1].'" height="'.$img_url[2].'" alt="'. get_the_title() .'" />';
		} else {
			$output .= '<img src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" />';
		}
        
		$output .= '<div class="overlay"></div>
                        <i class="font-icon-plus-3"></i>
                    </a>';
		}
		
		$output .= '<a class="project-name" href="'. get_permalink($post_id) .'" title="'. get_the_title() .'">
						<h3>'. get_the_title() .'</h3>
						<h4>'. $on_attributes .'</h4>
					</a>';
		
		$output .= '</div>
					</li>';
	
	  endwhile;
	  
	  wp_reset_query();
	  
	  $output .= '</ul>';
	  $output .= '</div>';
	  $output .= '</div>';
	
	  return $output . $this->endBlockComment('az_portfolio_grid') . "\n";
  }
}

?>