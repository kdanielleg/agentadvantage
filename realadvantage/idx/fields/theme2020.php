<?php /** theme 1 fields**/

function wc_fields_theme2020() {
	/**User Pages**/
	$wc_theme2020_user = array(
		array(
			'key' => 'field_5e011eddc7d4b2020',
			'label' => 'Background Image',
			'name' => 'bg',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '34',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	);
	/**Roster Pages**/
	$wc_theme2020_roster = array(
		array(
			'key' => 'field_608f34a158b29',
			'label' => 'Display Agent Details',
			'name' => 'roster_agent_details',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_608f351258b2c',
					'label' => 'None',
					'name' => 'none',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_608f34c758b2a',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_608f351258b2c',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_608f34f858b2b',
					'label' => 'Address',
					'name' => 'address',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_608f351258b2c',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_608f354458b2d',
					'label' => 'Office Phone',
					'name' => 'office',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_608f351258b2c',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_608f355358b2e',
					'label' => 'Cell Phone',
					'name' => 'cell',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_608f351258b2c',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_608f356158b2f',
					'label' => 'Email Address',
					'name' => 'email',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_608f351258b2c',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_608f356158b2flang',
					'label' => 'Languages',
					'name' => 'language',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_608f351258b2c',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
			),
		),
	);
	/**Contact Pages**/
	$wc_theme2020_contact = array(
		array(
			'key' => 'field_5e056c36bf8cc2021phoneLabel',
			'label' => 'Phone Labels',
			'name' => 'phoneLabel',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5e056cb1bf8ce2021phonelabel',
					'label' => 'Phone Label',
					'name' => 'phone',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Phone',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e056cc7bf8cf2021phonelabel',
					'label' => 'Phone Alt Label',
					'name' => 'phone-alt',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Phone Alt',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	);
	

	/**Sections**/
	$wc_theme2020_sections = array(
		'user' => array(
			'key' => 'field_5e013b4ba53ee2020',
			'label' => 'User',
			'fields' => $wc_theme2020_user,
		),
		'contact' => array(
			'key' =>  'field_5e056c20bf8cb2020contact',
			'label' => 'Contact',
			'fields' => $wc_theme2020_contact,
		),
		'roster' => array(
			'key' =>  'field_5e056c20bf8cb2020roster',
			'label' => 'Roster',
			'fields' => $wc_theme2020_roster,
		),
	);
	$wc_theme2020 = array(
		'key' => 'field_5e011defc7d482020',
		'name' => 'Theme 2020',
		'sections' => $wc_theme2020_sections,
	);
	return $wc_theme2020;
}

