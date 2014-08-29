<?php 
/**
	Template Name: Blog with Infinite Scroll
*/
?>
<?php get_header(); ?>
	<div id="primary" class="content-area infinite-scrolled-blog">
			
		<?php if( is_active_sidebar( 'isb-template-hero' ) ) : ?>
		<div class="extra-box">
			<?php dynamic_sidebar('isb-template-hero'); ?>
		</div>
		<?php endif; ?>
			
		<?php if( is_active_sidebar( 'isb-template-carousel' ) ) : ?>
		<div class="extra-box">
			<?php dynamic_sidebar('isb-template-carousel'); ?>
		</div>
		<?php endif; ?>
				
		<div id="content" class="site-content">
			<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 6, 'paged' => get_query_var( 'paged' ) ); ?>
			<?php $wp_query = new WP_Query( $args ); ?>					
			<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<?php /* Include the Post-Format-specific template for the content.*/ 
					get_template_part( 'content', get_post_format() );						
				?>
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>
			
		</div><!-- end of #content .site-content -->
		<?php tuned_content_nav( 'nav-below' ); ?>	
	</div><!-- end of #primary .content-area -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>