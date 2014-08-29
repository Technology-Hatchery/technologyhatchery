<?php 
/**
 * The Footer template file. 
 *
 *
 * @package      Tuned
 * @author       Elod Horvath
 * @copyright    2013-... Elod Horvath
 * @since        1.0
 */
?>
	</div><!-- end of .tuned-row -->
	</div><!-- end of #main .site-main -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="tuned-row">
		
			<div class="widget-container">
				<?php if( is_active_sidebar( 'footer-4col-grid' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4col-grid' ); ?>
				<?php endif; ?>
				<div style="clear: both"></div>
			</div>
			
			<div class="site-info">
				<p>
				<?php do_action( 'tuned_credits' ); ?>
					<a href="<?php echo esc_url( 'http://tunedthemes.blogoloc.com' ); ?>" title="<?php esc_attr_e( 'Tuned' ); ?>" target="_blank"><?php _e( 'Tuned', 'tuned' ); ?></a> WordPress theme, Copyright (C) 2013 Elod Horvath
				</p>
				<p>
					Tuned WordPress theme is licensed under the GPL.
				</p>
			</div><!-- end of .site-info -->
		
		</div>
	</footer><!-- end of #colophon .site-footer -->

</div><!-- end of #container .site -->

<?php wp_footer(); ?>
</body>
</html>				