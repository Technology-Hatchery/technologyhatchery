jQuery(window).load(function(){

	jQuery('.menu-toggle').click(function($){
		jQuery('.menu').slideToggle('slow', function(){
			jQuery('.menu-toggle').toggleClass('menu-toggled');
		});
	});
	
	
	//Add equal height for floated elements
	var maxHeight = 0;
	function setHeight(column) {	
	
		jQuery(column).each(function(){
			if(jQuery(this).height() > maxHeight) {
				maxHeight = jQuery(this).height();
			}
		});
	
		jQuery(column).height(maxHeight);
	
	}
	
	setHeight('#grid3 .category-posts');	

});

// Flex slider
jQuery(document).ready(function(){
	jQuery('.flexslider').flexslider({
		animation: flex_slider_vars.animation,
		slideshowSpeed: parseInt(flex_slider_vars.slideshow_speed),
		animationSpeed: parseInt(flex_slider_vars.animation_speed)
	});
});