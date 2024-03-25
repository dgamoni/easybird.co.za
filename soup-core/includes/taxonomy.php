<?php 

add_action( 'init', 'exposed_taxonomy', 0 );
function exposed_taxonomy(){
	// Slider category

	$port_c_labels = array(
		'name'                       => _x( 'Slider Categories', 'Taxonomy General Name', 'exposed' ),
		'singular_name'              => _x( 'Slider Category', 'Taxonomy Singular Name', 'exposed' ),
		'menu_name'                  => esc_html__( 'Slider Category', 'exposed' ),
		'all_items'                  => esc_html__( 'All Slider Categories', 'exposed' ),
		'parent_item'                => esc_html__( 'Parent Slider Category', 'exposed' ),
		'parent_item_colon'          => esc_html__( 'Parent Slider Category:', 'exposed' ),
		'new_item_name'              => esc_html__( 'New Slider Category Name', 'exposed' ),
		'add_new_item'               => esc_html__( 'Add New Slider Category', 'exposed' ),
		'edit_item'                  => esc_html__( 'Edit Slider Category', 'exposed' ),
		'update_item'                => esc_html__( 'Update Slider Category', 'exposed' ),
		'view_item'                  => esc_html__( 'View Slider Category', 'exposed' ),
		'separate_items_with_commas' => esc_html__( 'Separate Slider Categories with commas', 'exposed' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove Slider Categories', 'exposed' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'exposed' ),
		'popular_items'              => esc_html__( 'Popular Slider Categories', 'exposed' ),
		'search_items'               => esc_html__( 'Search C', 'exposed' ),
		'not_found'                  => esc_html__( 'Not Found', 'exposed' ),
		'no_terms'                   => esc_html__( 'No V', 'exposed' ),
		'items_list'                 => esc_html__( 'V list', 'exposed' ),
		'items_list_navigation'      => esc_html__( 'V list navigation', 'exposed' ),
	);

	$port_c_args = array(
		'labels'                     => $port_c_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'slider_cat', array( 'sliders' ), $port_c_args );
}