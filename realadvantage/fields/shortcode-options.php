<?php 

if( function_exists('acf_add_local_field_group') ):	
	//Yelp Options
	acf_add_local_field_group(array(
		'key' => 'group_600ed7fdeab22',
		'title' => 'Local Businesses',
		'fields' => array(
			array(
				'key' => 'field_600ed84e0f598',
				'label' => 'Location',
				'name' => 'ar_yelp_biz_location',
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
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'avada_portfolio',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	//location map
	acf_add_local_field_group(array(
		'key' => 'group_5cda671125412',
		'title' => 'Walkscore and Schools',
		'fields' => array(
			array(
				'key' => 'field_5cda671d0a859',
				'label' => 'Map Location',
				'name' => 'location',
				'type' => 'google_map',
				'instructions' => 'This field is REQUIRED to set the location for the walkscore or schools shortcodes.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '150',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'avada_portfolio',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 1,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	//FiveStar
	acf_add_local_field_group(array(
		'key' => 'group_5cda866927ff1',
		'title' => 'Auto Blogging Tool',
		'fields' => array(
			array(
				'key' => 'field_5cda866fafcff',
				'label' => 'Activate Re-Publish?',
				'name' => 'activate_auto_updates',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
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
				'key' => 'field_5cda878d5d739',
				'label' => 'How Often?',
				'name' => 'auto_update_days',
				'type' => 'number',
				'instructions' => 'Recommended lowest value: 7 days (1 week)',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5cda866fafcff',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 30,
				'placeholder' => 'this many',
				'prepend' => 'Every',
				'append' => 'day(s)',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
			array(
				'key' => 'field_5cda881b5d73a',
				'label' => 'Created By',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '<p style="text-align:center;margin:0 auto;"><a href="https://www.agentreputation.net" target="_blank"><img src="/wp-content/themes/realadvantage-plus/realadvantage/img/ar-logo-2018.png" alt="Agent Reputation 5 Star Auto Blogging" style="max-width:100%;height:auto;" /></a></p>',
				'new_lines' => '',
				'esc_html' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 2,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
endif;