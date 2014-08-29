<?php get_header(); 

$options = get_option('banshee');

?>

<?php az_page_header_portfolio($post->ID); ?>

<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php //edit_post_link( __('Edit', 'textdomain'), '<span class="edit-post">[', ']</span>' ); ?>
        <?php the_content(); ?>
        
        
        <?php if( !empty($options['enable-comment-portfolio-area']) && $options['enable-comment-portfolio-area'] == 1) { ?>
        <!-- Comments Template Area -->
        <section class="comment-area">
			<div class="container">
            	<div class="row-fluid">
                	<div class="span12">
						<?php comments_template('', true); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Comments Template Area -->
        <?php } ?>
        
    <?php endwhile; endif; ?>
    
    
    <div class="navigation-projects">
        <div class="prev"><?php previous_post_link(('%link'), '<i class="font-icon-arrow-left-simple-round"></i>') ?></div>
        <div class="next"><?php next_post_link(('%link'), '<i class="font-icon-arrow-right-simple-round"></i>') ?></div>
    </div>
    
</div>
            
<?php get_footer(); ?>