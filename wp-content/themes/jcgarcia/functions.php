<?php

/* Control excerpt length */
function control_excerpt_length($length) {
	return 14;
}
add_filter('excerpt_length', 'control_excerpt_length', 999);

/* Remove [...] from excerpt */
function change_excerpt_end($text) { 
	return str_replace('[...]', '...', $text); 
} 
add_filter('the_excerpt', 'change_excerpt_end');

/* Featured Images */
if (function_exists('add_theme_support')) { 
	add_theme_support('post-thumbnails');

	//additional image sizes
	add_image_size('post-thumb', 201, 143, true);
}

?>