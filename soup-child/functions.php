<?php 

add_action( 'wp_enqueue_scripts', 'soup_enqueue_styles' );
function soup_enqueue_styles() { 
	
    // enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
	
	// enqueue child styles
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));

}


// Start writing your functions here






















