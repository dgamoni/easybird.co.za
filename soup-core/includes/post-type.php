<?php 

add_action( 'init', 'exposed_post_type', 0 );
function exposed_post_type(){

	// Slider post type
	$port_p_labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'exposed' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'exposed' ),
		'menu_name'             => esc_html__( 'Sliders', 'exposed' ),
		'name_admin_bar'        => esc_html__( 'Slider', 'exposed' ),
		'archives'              => esc_html__( 'Sliders Archives', 'exposed' ),
		'parent_item_colon'     => esc_html__( 'Parent Slider:', 'exposed' ),
		'all_items'             => esc_html__( 'All Sliders', 'exposed' ),
		'add_new_item'          => esc_html__( 'Add New Slider', 'exposed' ),
		'add_new'               => esc_html__( 'Add New', 'exposed' ),
		'new_item'              => esc_html__( 'New Slider', 'exposed' ),
		'edit_item'             => esc_html__( 'Edit Slider', 'exposed' ),
		'update_item'           => esc_html__( 'Update Slider', 'exposed' ),
		'view_item'             => esc_html__( 'View Slider', 'exposed' ),
		'search_items'          => esc_html__( 'Search Slider', 'exposed' ),
		'not_found'             => esc_html__( 'Not found', 'exposed' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'exposed' ),
		'featured_image'        => esc_html__( 'Featured Image', 'exposed' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'exposed' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'exposed' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'exposed' ),
		'insert_into_item'      => esc_html__( 'Insert into Slider', 'exposed' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this Slider', 'exposed' ),
		'items_list'            => esc_html__( 'Sliders list', 'exposed' ),
		'items_list_navigation' => esc_html__( 'Sliders list navigation', 'exposed' ),
		'filter_items_list'     => esc_html__( 'Filter Sliders list', 'exposed' ),
	);

	$port_p_args = array(
		'label'                 => esc_html__( 'Slider', 'exposed' ),
		'description'           => esc_html__( 'Sliders Description', 'exposed' ),
		'labels'                => $port_p_labels,
		'supports'              => array( 'title', 'author', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-grid-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'sliders', $port_p_args );

	// Review post type
	$port_p_labels = array(
		'name'                  => _x( 'Reviews', 'Post Type General Name', 'exposed' ),
		'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'exposed' ),
		'menu_name'             => esc_html__( 'Reviews', 'exposed' ),
		'name_admin_bar'        => esc_html__( 'Review', 'exposed' ),
		'archives'              => esc_html__( 'Reviews Archives', 'exposed' ),
		'parent_item_colon'     => esc_html__( 'Parent Review:', 'exposed' ),
		'all_items'             => esc_html__( 'All Reviews', 'exposed' ),
		'add_new_item'          => esc_html__( 'Add New Review', 'exposed' ),
		'add_new'               => esc_html__( 'Add New', 'exposed' ),
		'new_item'              => esc_html__( 'New Review', 'exposed' ),
		'edit_item'             => esc_html__( 'Edit Review', 'exposed' ),
		'update_item'           => esc_html__( 'Update Review', 'exposed' ),
		'view_item'             => esc_html__( 'View Review', 'exposed' ),
		'search_items'          => esc_html__( 'Search Review', 'exposed' ),
		'not_found'             => esc_html__( 'Not found', 'exposed' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'exposed' ),
		'featured_image'        => esc_html__( 'Featured Image', 'exposed' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'exposed' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'exposed' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'exposed' ),
		'insert_into_item'      => esc_html__( 'Insert into Review', 'exposed' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this Review', 'exposed' ),
		'items_list'            => esc_html__( 'Reviews list', 'exposed' ),
		'items_list_navigation' => esc_html__( 'Reviews list navigation', 'exposed' ),
		'filter_items_list'     => esc_html__( 'Filter Reviews list', 'exposed' ),
	);

	$port_p_args = array(
		'label'                 => esc_html__( 'Review', 'exposed' ),
		'description'           => esc_html__( 'Reviews Description', 'exposed' ),
		'labels'                => $port_p_labels,
		'supports'              => array( 'title', 'author', 'editor', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-status',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'reviews', $port_p_args );

	// Review post type
	$port_p_labels = array(
		'name'                  => _x( 'Offers', 'Post Type General Name', 'exposed' ),
		'singular_name'         => _x( 'Offer', 'Post Type Singular Name', 'exposed' ),
		'menu_name'             => esc_html__( 'Offers', 'exposed' ),
		'name_admin_bar'        => esc_html__( 'Offer', 'exposed' ),
		'archives'              => esc_html__( 'Offers Archives', 'exposed' ),
		'parent_item_colon'     => esc_html__( 'Parent Offer:', 'exposed' ),
		'all_items'             => esc_html__( 'All Offers', 'exposed' ),
		'add_new_item'          => esc_html__( 'Add New Offer', 'exposed' ),
		'add_new'               => esc_html__( 'Add New', 'exposed' ),
		'new_item'              => esc_html__( 'New Offer', 'exposed' ),
		'edit_item'             => esc_html__( 'Edit Offer', 'exposed' ),
		'update_item'           => esc_html__( 'Update Offer', 'exposed' ),
		'view_item'             => esc_html__( 'View Offer', 'exposed' ),
		'search_items'          => esc_html__( 'Search Offer', 'exposed' ),
		'not_found'             => esc_html__( 'Not found', 'exposed' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'exposed' ),
		'featured_image'        => esc_html__( 'Featured Image', 'exposed' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'exposed' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'exposed' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'exposed' ),
		'insert_into_item'      => esc_html__( 'Insert into Offer', 'exposed' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this Offer', 'exposed' ),
		'items_list'            => esc_html__( 'Offers list', 'exposed' ),
		'items_list_navigation' => esc_html__( 'Offers list navigation', 'exposed' ),
		'filter_items_list'     => esc_html__( 'Filter Offers list', 'exposed' ),
	);

	$port_p_args = array(
		'label'                 => esc_html__( 'Offer', 'exposed' ),
		'description'           => esc_html__( 'Offers Description', 'exposed' ),
		'labels'                => $port_p_labels,
		'supports'              => array( 'title', 'editor','author', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-smiley',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'offers', $port_p_args );



}