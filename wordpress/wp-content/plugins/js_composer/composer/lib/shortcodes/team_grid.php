<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Team Grid
---------------------------------------------------------- */

class WPBakeryShortCode_AZ_Team_Grid extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $team_columns_count = $team_post_number = $team_categories = $team_sortable_mode = $team_sortable_name = $orderby = $order = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
	  	'team_columns_count' => '',
		'team_post_number' => 'all',
		'team_sortable_mode' => 'yes',
		'team_sortable_name' => '',
		'team_categories' => '',
		'orderby' => NULL,
		'order' => 'DESC',
		'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
	  global $post;
	  
	  // Post teasers count
      if ( $team_post_number != '' && !is_numeric($team_post_number) ) $team_post_number = -1;
      if ( $team_post_number != '' && is_numeric($team_post_number) ) $team_post_number = $team_post_number;
	  
	  if ( $team_columns_count=="2clm") { $team_columns_count = 'span6'; }
	  if ( $team_columns_count=="3clm") { $team_columns_count = 'span4'; }
	  if ( $team_columns_count=="4clm") { $team_columns_count = 'span3'; }
	  
	  $args = array( 
	  		'posts_per_page' => $team_post_number, 
		   	'post_type' => 'team',
			'disciplines' => $team_categories,
			'orderby' => $orderby,
			'order' => $order
		);

	  // Run query
	  $my_query = new WP_Query($args);
	  
	  if($team_sortable_mode == "yes") {
		  $output .= '
					  <div id="team-filter" class="row">
							<div class="span12">
								<div class="dropdown">
									<div class="dropmenu">
										<p class="selected">'. $team_sortable_name .'</p>
										<i class="font-icon-arrow-down-simple-thin-round"></i>
									</div>					
									<div class="dropmenu-active">
										<ul class="option-set" data-option-key="filter">
											<li><a class="selected drop-selected" href="#filter" data-option-value="*">'. $team_sortable_name .'</a></li>';
											 $list_categories = get_categories("taxonomy=disciplines");
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
	  if ($team_sortable_mode == "no") {
		$sortable_class = ' no-sortable';
	  }
	  
	  $output .= '<div class="row '. $el_class .'">';
	  $output .= '<div id="team-people" class="'. $sortable_class .'">';
	  $output .= '<ul id="people">';
	  
	  
	  
	  while($my_query->have_posts()) : $my_query->the_post();
	  
	    $terms = get_the_terms($post->id,"disciplines");
		$discipline_cats = NULL;
		
		if ( !empty($terms) ){
		 foreach ( $terms as $term ) {
		   $discipline_cats .= strtolower($term->slug) . ' ';
		 }
		}
		   
		
		$attrs = get_the_terms( $post->ID, 'attributes' );
		$attributes_fields = NULL;
		
		if ( !empty($attrs) ){
		 foreach ( $attrs as $attr ) {
		   $attributes_fields[] = $attr->name;
		 }
		 
		 $on_attributes = join( " - ", $attributes_fields );
		}
	    
		$post_id = $my_query->post->ID;

		$img_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'team-thumb' );
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}

		$output .= '<li class="single-people '.$team_columns_count. ' ' . $discipline_cats .'">
					<div class="item-container '. $animation_loading_class .' '. $animation_effect_class .'">';
		
		$output .= '<a class="hover-wrap" href="'. get_permalink($post_id) .'" title="'. get_the_title() .'">
							<img src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" /> 
							<div class="overlay"></div>
							<i class="font-icon-group"></i>
                    </a>';
		$output .= '<a class="team-name" href="'. get_permalink($post_id) .'" title="'. get_the_title() .'">
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
	
	  return $output . $this->endBlockComment('az_team_grid') . "\n";
  }
}

?>