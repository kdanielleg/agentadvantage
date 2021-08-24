<?php /**IDX Codes**/
//ADD FIELDS
require_once( get_stylesheet_directory() . '/realadvantage/idx/fields.php');

//theme fields function
function ar_wc_theme_fields($themes, $pageField, $themeField) {
	$groups = array();
	foreach($themes as $theme => $info) :
		$group = array(
			'key' => $info['key'],
			'label' => $info['name'].' Settings',
			'name' => 'settings_'.$theme,
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => $pageField,
						'operator' => '!=',
						'value' => 'none',
					),
					array(
						'field' => $pageField,
						'operator' => '!=',
						'value' => 'base',
					),
					array(
						'field' => $themeField,
						'operator' => '==',
						'value' => $theme,
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
		);
		$subArr = $info['sections'];
		$subs = array();
		foreach($subArr as $section => $fields):
			$subs[] = array(
				'key' => $fields['key'],
				'label' => $fields['label'].' Page(s) Settings',
				'name' => $section,
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => $pageField,
							'operator' => '==',
							'value' => $section,
						),
						array(
							'field' => $themeField,
							'operator' => '==',
							'value' => $theme,
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => $fields['fields'],
			);
		endforeach;
		$group['sub_fields'] = $subs;
		$groups[] = $group;
	endforeach;
	return $groups;
}

/**add HV autocomplete**/
add_action('wp_head','arwc_set_google_autocomplete');
function arwc_set_google_autocomplete(){
	$arwc_search_fields = array(
		'input#hvAddressAutocomplete',
	);
	?>
	<script>
		var arwc_ac_fields = '<?php echo implode(',' , $arwc_search_fields);?>';
	</script>
<?php }

/**add gmaps Icons**/
add_action('wp_head','arwc_set_gmaps_icon');
function arwc_set_gmaps_icon(){ ?>
	<script>
		var arwc_maps_small_icon = "<?php echo get_home_url(); ?>/wp-content/themes/agentadvantage/realadvantage/img/map-marker-small.jpg";
		var arwc_maps_large_icon = "<?php echo get_home_url(); ?>/wp-content/themes/agentadvantage/realadvantage/img/map-marker-large.jpg";
	</script>
<?php }