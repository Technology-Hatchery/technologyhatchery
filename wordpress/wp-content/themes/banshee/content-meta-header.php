<div class="entry-meta entry-header">
	<span class="published"><?php the_time( get_option('date_format') ); ?></span>
	<span class="meta-sep"> / </span>
	<span class="comment-count"><?php comments_popup_link(__('No Comments', AZ_THEME_NAME), __('1 Comment', AZ_THEME_NAME), __('% Comments', AZ_THEME_NAME)); ?></span>

	<?php if( !is_single() ) { ?>
        <span class="meta-sep"> / </span>
        <span class="entry-categories"><?php _e('Posted in: ', AZ_THEME_NAME) ?> <?php the_category(', ') ?></span>
    <?php } ?>
    <?php edit_post_link( __('Edit', AZ_THEME_NAME), ' / <span class="edit-post">', '</span>' ); ?>
</div>