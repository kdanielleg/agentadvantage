<?php 
//add videos post type
function ar_videos_post_type_func() {
	$labels = array(
		'name'                  => 'Videos',
		'singular_name'         => 'Video',
		'menu_name'             => 'Videos',
		'name_admin_bar'        => 'Video',
		'archives'              => 'Video Archives',
		'attributes'            => 'Video Attributes',
		'parent_item_colon'     => 'Parent Video:',
		'all_items'             => 'All Videos',
		'add_new_item'          => 'Add New Video',
		'add_new'               => 'Add New',
		'new_item'              => 'New Video',
		'edit_item'             => 'Edit Video',
		'update_item'           => 'Update Video',
		'view_item'             => 'View Video',
		'view_items'            => 'View Videos',
		'search_items'          => 'Search Video',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Video',
		'uploaded_to_this_item' => 'Uploaded to this video',
		'items_list'            => 'Videos list',
		'items_list_navigation' => 'Videos list navigation',
		'filter_items_list'     => 'Filter videos list',
	);
	$rewrite = array(
		'slug'                  => 'video',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Video',
		'description'           => 'Video Posts',
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes', 'editor' ),
		'taxonomies'            => array( 'gallery' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'ar_videos', $args );
}
add_action( 'init', 'ar_videos_post_type_func', 0 );

//add category taxonomy
function ar_vid_cat_func() {
	$labels = array(
		'name'                       => 'Galleries',
		'singular_name'              => 'Gallery',
		'menu_name'                  => 'Galleries',
		'all_items'                  => 'All Galleries',
		'parent_item'                => 'Parent Gallery',
		'parent_item_colon'          => 'Parent Gallery:',
		'new_item_name'              => 'New Gallery Name',
		'add_new_item'               => 'Add New Gallery',
		'edit_item'                  => 'Edit Gallery',
		'update_item'                => 'Update Gallery',
		'view_item'                  => 'View Gallery',
		'separate_items_with_commas' => 'Separate galleries with commas',
		'add_or_remove_items'        => 'Add or remove galleries',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Galleries',
		'search_items'               => 'Search Galleries',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No galleries',
		'items_list'                 => 'Galleries list',
		'items_list_navigation'      => 'Galleries list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_in_rest'				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => true,
	);
	register_taxonomy( 'gallery', array( 'ar_videos' ), $args );

}
add_action( 'init', 'ar_vid_cat_func', 0 );
