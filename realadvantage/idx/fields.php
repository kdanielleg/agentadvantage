<?php /**fields**/

/* page: 'key' => 'field_5dfdd645dd3a8'  * 
* theme: 'key' => 'field_5dfdd662dd3a9' */

$wc_general = array(
	array(
		'key' => 'field_5dfdd645dd3a8',
		'label' => 'Page',
		'name' => 'page',
		'type' => 'select',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => '',
		'wrapper' => array(
			'width' => '50',
			'class' => '',
			'id' => '',
		),
		'choices' => array(
			'none' => 'None',
			'base' => 'Global',
			'reports' => 'Market Reports Pages',
			'search' => 'Search Pages',
			'map' => 'Map Search Pages',
			'results' => 'Results Pages',
			'details' => 'Details Pages',
			'listing' => 'Listing Pages',
			'contact' => 'Contact Pages',
			'user'	=> 'User Pages',
			'other' => 'Other Pages',
			'roster' => 'Roster Page',
			'agent' => 'Agent Bio Pages',
		),
		'default_value' => '',
		'allow_null' => 0,
		'multiple' => 0,
		'ui' => 0,
		'return_format' => 'value',
		'ajax' => 0,
		'placeholder' => '',
	),
	array(
		'key' => 'field_5dfdd662dd3a9',
		'label' => 'Theme',
		'name' => 'theme',
		'type' => 'select',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => array(
			array(
				array(
					'field' => 'field_5dfdd645dd3a8',
					'operator' => '!=',
					'value' => 'none',
				),
			),
		),
		'wrapper' => array(
			'width' => '50',
			'class' => '',
			'id' => '',
		),
		'choices' => array(
			'theme1' => 'RoseLV.com',
			'idxCustom' => 'IDX Custom',
			'theme2020' => 'IDX 2020',
		),
		'default_value' => '',
		'allow_null' => 0,
		'multiple' => 0,
		'ui' => 0,
		'return_format' => 'value',
		'ajax' => 0,
		'placeholder' => '',
	),
);

$pageField = 'field_5dfdd645dd3a8';
$themeField = 'field_5dfdd662dd3a9';

ar_require_folder('idx/fields');

$theme_fields = array(
	'theme1' => wc_fields_theme1(),
	'idxCustom' => wc_fields_idxCustom(),
	'theme2020' => wc_fields_theme2020(),
);

$wc_themes = ar_wc_theme_fields($theme_fields, $pageField, $themeField);

$wc_fields = array_merge($wc_general, $wc_themes);

if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => 'group_5dfdd648803e2',
		'title' => 'RealAdvantage Wrapper Settings',
		'fields' => $wc_fields,
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'idx-wrapper',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'plus_idx',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
endif;