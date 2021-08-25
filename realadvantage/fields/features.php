<?php 

if( function_exists('acf_add_local_field_group') ):

	//features tabs
	$featureFields = array(
		array(
			'key' => 'field_5cda92be3586e',
			'label' => 'MatchHeight',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5cda92c73586f',
			'label' => 'matchHeight CSS Selectors',
			'name' => 'ar_match',
			'type' => 'repeater',
			'instructions' => 'Add CSS Selectors. Example: div.someClass',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5cda92e435870',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Selector',
			'sub_fields' => array(
				array(
					'key' => 'field_5cda92e435870',
					'label' => 'Selector',
					'name' => 'selector',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5ce042ca8fa60',
			'label' => 'Google Autocomplete',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5ce042e28fa61',
			'label' => 'Fields',
			'name' => 'ar_autocomplete',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5ce0433f8fa63',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Selctor',
			'sub_fields' => array(
				array(
					'key' => 'field_5ce043188fa62',
					'label' => 'Type',
					'name' => 'type',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'class' => 'Class',
						'id' => 'ID',
						'name' => 'Name',
					),
					'default_value' => array(
						0 => 'class',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5ce0433f8fa63',
					'label' => 'Selector',
					'name' => 'selector',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '75',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	);

	acf_add_local_field_group(array(
		'key' => 'group_5cda8f3e43754',
		'title' => 'Enable Theme Features',
		'fields' => $featureFields,
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'realadvantage',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

endif;