<?php

add_action( 'admin_menu', 'tuned_options_page' );
add_action( 'admin_init', 'tuned_register_settings' );
add_action( 'admin_print_scripts-appearance_page_theme_options', 'tuned_admin_scripts' );



/**
* Add options page
*/
function tuned_options_page() {
	// This page will be under "Settings"
	add_theme_page(
		__( 'Theme Options', 'tuned' ), 
		__( 'Theme Options', 'tuned' ), 
		'edit_theme_options', 
		'theme_options', 
		'tuned_theme_options_do_page'
	);
}


/**
* Register settings
*/
function tuned_register_settings() {

	register_setting( 'tuned_theme_options', 'tuned_theme_options', 'tuned_theme_options_validate' );		
	
}


/**
* Add scripts
*/
function tuned_admin_scripts() {
	wp_enqueue_style('jquery-ui-css','http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');	
	
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script( 'tuned_options_page', get_template_directory_uri() .'/js/tuned_options_page_nav.js' );
}
	

/**
* Options page callback
*/
function tuned_theme_options_do_page() {		
	
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php _e('Tuned Theme Options', 'tuned'); ?></h2> 
		
		<form method="post" action="options.php" enctype="multipart/form-data">
		
		<?php			
			$options = get_option( 'tuned_theme_options' );
			settings_fields( 'tuned_theme_options' );
			do_settings_sections( 'tuned_theme_options' );			
		?>
		<div id="tuned_option_page_tabs">
		
			<ul>
				<li><a href="#tuned_option_page-1"><?php _e( 'Main Settings', 'tuned' ); ?></a></li>
			</ul>
			
			<div id="tuned_option_page-1" class="tuned_option_page">
				<div id="tuned_section_1" class="tuned_section">			
					<h3><?php _e( 'Change Logo', 'tuned' ); ?></h3>
					<div>
						<table class="form-table">
							<tr valign="top">
								<th scope="row"><?php _e( 'Custom header', 'tuned' ); ?></th>
								<td><?php _e( 'Replace or remove default logo', 'tuned' ); ?> - <a href="?page=custom-header"><?php _e( 'Click here', 'tuned' ); ?></a></td>
							</tr>										
						</table>
					</div>
				</div>				
				<div id="tuned_section_2" class="tuned_section">
					<h3><?php _e( 'Slider Settings', 'tuned' ); ?></h3>
					<div>
						<table class="form-table">
							<tr valign="top">
								<th scope="row"><?php _e( 'Animation', 'tuned' ); ?></th>
								<td>									
									<select name="tuned_theme_options[animation]">
										<option value="fade" <?php if( $options['animation'] == 'fade' ){ ?> selected="selected" <?php } ?>><?php _e( 'Fade', 'tuned' ); ?>
										<option value="slide" <?php if( $options['animation'] == 'slide' ){ ?> selected="selected" <?php } ?>><?php _e( 'Slide', 'tuned' ); ?>
									</select>
								</td>								
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e( 'Speed of the Slideshow(default 7000)', 'tuned' ); ?></th>
								<td><input type="text" name="tuned_theme_options[slideshow_speed]" value="<?php echo esc_attr( $options['slideshow_speed'] ); ?>" /></td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e( 'Speed of the Animation(default 600)', 'tuned' ); ?></th>
								<td><input type="text" name="tuned_theme_options[animation_speed]" value="<?php echo esc_attr( $options['animation_speed'] ); ?>" /></td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e( 'Full width Slider on the Front Page Template', 'tuned' ); ?></th>
								<td>									
									<select name="tuned_theme_options[full_width_slider]">										
										<option value="no" <?php if( $options['full_width_slider'] == 'no' ){ ?> selected="selected" <?php } ?>><?php _e( 'No', 'tuned' ); ?>
										<option value="yes" <?php if( $options['full_width_slider'] == 'yes' ){ ?> selected="selected" <?php } ?>><?php _e( 'Yes', 'tuned' ); ?>
									</select>
								</td>								
							</tr>
							<tr valign="top">
								<td colspan="2"><?php submit_button(); ?></td>
							</tr>
						</table>
					</div>
				</div>	
				<div id="tuned_section_3" class="tuned_section">
					<h3><?php _e( 'Hero Settings', 'tuned' ); ?></h3>
					<div>
						<table class="form-table">							
							<tr valign="top">
								<th scope="row"><?php _e( 'Full width Hero on the Front Page Template', 'tuned' ); ?></th>
								<td>									
									<select name="tuned_theme_options[full_width_hero]">										
										<option value="no" <?php if( $options['full_width_hero'] == 'no' ){ ?> selected="selected" <?php } ?>><?php _e( 'No', 'tuned' ); ?>
										<option value="yes" <?php if( $options['full_width_hero'] == 'yes' ){ ?> selected="selected" <?php } ?>><?php _e( 'Yes', 'tuned' ); ?>
									</select>
								</td>								
							</tr>
							<tr valign="top">
								<td colspan="2"><?php submit_button(); ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
			
		</div>
		</form>
	</div>	
	<?php
	
}

function tuned_theme_options_validate( $input ) {

	 if( !is_numeric( $input['slideshow_speed'] ) )
            $input['slideshow_speed'] = '';
		
	if( !is_numeric( $input['animation_speed'] ) )
            $input['animation_speed'] = '';
			
	return $input;


} 
?>