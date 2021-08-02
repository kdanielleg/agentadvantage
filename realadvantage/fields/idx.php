<?php 
if( function_exists('acf_add_local_field_group') && shortcode_exists('idx-omnibar')):

acf_add_local_field_group(array(
	'key' => 'group_5cdbb5ceb7f76',
	'title' => 'Middleware',
	'fields' => array(
		array(
			'key' => 'field_5cdbb5e0c9ec7',
			'label' => '',
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
			'message' => '<div id="ar-middleware-iframe"><iframe src="https://middleware.idxbroker.com/mgmt/login" style="width: 100%;height: 80vh;">https://middleware.idxbroker.com/mgmt/login</iframe></div>',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'realadvantage-idx',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5cdbb4cbdff6f',
	'title' => 'RealAdvantage IDX',
	'fields' => array(
		array(
			'key' => 'field_5cdbb51d9ead5',
			'label' => '',
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
			'message' => '<style>#post-body.columns-2 #postbox-container-1 div#submitdiv {display: none!important;}</style>
<p style="text-align:center;margin:0 auto;"><a href="https://www.agentreputation.net" target="_blank"><img src="/wp-content/themes/RealAdvantage-plus/realadvantage/img/ar-branding-icon-2018.png" alt="Agent Reputation 5 Star Auto Blogging" style="max-width:100%;height:auto;"></a></p>
<p style="text-align:center;"><strong>IDX broker Admin Page</strong></p>
<p style="text-align:center;"><a class="button button-primary" style="font-weight:bold;" href="https://middleware.idxbroker.com" target="_blank">Open in a New Window</a></p>',
			'new_lines' => '',
			'esc_html' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'realadvantage-idx',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


/**IDX CPT Content Placement Field**/
acf_add_local_field_group(array(
	'key' => 'group_5e9543587d959',
	'title' => 'Content Settings',
	'fields' => array(
		array(
			'key' => 'field_5e95436ef4f5f',
			'label' => 'Content Location',
			'name' => 'content_location',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'above' => 'Above',
				'below' => 'Below',
			),
			'allow_null' => 0,
			'default_value' => 'above',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'idx-wrapper',
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

endif;