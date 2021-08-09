<?php 
/****
** Community Shortcodes
**		& Fusion Elements
****/


/**yelp**/ 

function ar_yelp_businesses_func( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'term' => '',
			'option' => '1',
			'location' => '',
			'limit' => '8',
			'sort' => '0',
			'address' => '1',
			'phone' => '1',
			'cols' => '4',
			'class' => '',
			'id' => '',
		),
		$atts
	);

	if($atts['option'] == '1' || $atts['option'] == 1) :
		$atts['location'] = get_field('ar_yelp_biz_location');
	endif;

	return '<div id="'.$atts['id'].'" class="ar_yelp ar_yelp_cols'.$atts['cols'].'">'.do_shortcode('[fusion_widget type="Yelp_Widget" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" fusion_display_title="no" fusion_padding_color="0" fusion_margin="0" fusion_bg_color="rgba(0,0,0,0)" fusion_bg_radius_size="" fusion_border_size="0" fusion_border_style="solid" fusion_border_color="" fusion_divider_color="" fusion_align="" fusion_align_mobile="" yelp_widget__title="" yelp_widget__display_option="" yelp_widget__term="'.$atts['term'].'" yelp_widget__location="'.$atts['location'].'" yelp_widget__limit="'.$atts['limit'].'" yelp_widget__sort="'.$atts['sort'].'" yelp_widget__id="" yelp_widget__display_reviews="1" yelp_widget__profile_img_size="100x100" yelp_widget__display_address="'.$atts['address'].'" yelp_widget__display_phone="'.$atts['phone'].'" yelp_widget__disable_title_output="1" yelp_widget__target_blank="1" yelp_widget__no_follow="1" yelp_widget__cache="1 Day" /]').'</div>';

}
add_shortcode( 'ar_yelp_businesses', 'ar_yelp_businesses_func' );

function ar_fusion_element_yelp_businesses() {
	$params = array(
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'Search Term', 'fusion-builder' ),
			'description'	=>	esc_attr__( 'Enter search term. Ex: Restaurant', 'fusion-builder' ),
			'param_name'	=>	'term',
			'value'			=>	'',
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'Use Page Option for Location', 'fusion-builder' ),
			'param_name'	=>	'option',
			'value'			=>	array(
				'1'			=>	esc_attr__( 'Yes (default)', 'fusion-builder' ),
				'0'			=>	esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'Location', 'fusion-builder' ),
			'description'	=>	esc_attr__( 'Enter location if "no" is selected above. Ex: New York City', 'fusion-builder' ),
			'param_name'	=>	'location',
			'value'			=>	'',
		),
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'Number of Items', 'fusion-builder' ),
			'description' => esc_attr__( 'Max number of items to display', 'fusion-builder' ),
			'param_name'  => 'limit',
			'value'       => '8',
			'min'         => '1',
			'max'         => '10',
			'step'        => '1',
		),
		array(
			'type'			=>	'select',
			'heading'		=>	esc_attr__( 'Sort By', 'fusion-builder' ),
			'param_name'	=>	'sort',
			'value'			=>	array(
				'0'			=>	esc_attr__( 'Best Match (default)', 'fusion-builder' ),
				'1'			=>	esc_attr__( 'Distance', 'fusion-builder' ),
				'2'			=>	esc_attr__( 'Highest Rated', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'Display Address?', 'fusion-builder' ),
			'param_name'	=>	'address',
			'value'			=>	array(
				'1'			=>	esc_attr__( 'Yes (default)', 'fusion-builder' ),
				'0'			=>	esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'Display Phone?', 'fusion-builder' ),
			'param_name'	=>	'phone',
			'value'			=>	array(
				'1'			=>	esc_attr__( 'Yes (default)', 'fusion-builder' ),
				'0'			=>	esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'How Many Columns?', 'fusion-builder' ),
			'param_name'	=>	'cols',
			'value'			=>	array(
				'1'			=>	esc_attr__( '1', 'fusion-builder' ),
				'2'			=>	esc_attr__( '2', 'fusion-builder' ),
				'3'			=>	esc_attr__( '3', 'fusion-builder' ),
				'4'			=>	esc_attr__( '4 (default)', 'fusion-builder' ),
				'5'			=>	esc_attr__( '5', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=>	'class',
			'value'			=>	'',
		),
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=>	'id',
			'value'			=>	'',
		),

	);
	$args = array(
		'name'				=>	esc_attr__( 'Local Businesses', 'fusion-builder' ),
		'shortcode'			=>	'ar_yelp_businesses',
		'icon'				=>	'fa-yelp fab',
		'preview'			=>	get_stylesheet_directory().'/realadvantage/js/previews/yelp_businesses-preview.php',
		'preview_id'		=>	'fusion-builder-block-module-yelp_businesses-preview-template',
		'allow_generator'	=>	true,
		'params'			=>	$params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_yelp_businesses' );