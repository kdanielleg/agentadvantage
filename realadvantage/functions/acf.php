<?php //ACF Admin Settings

//acf default image value
add_filter('acf/load_value/type=image', 'reset_default_image', 10, 3);
function reset_default_image($value, $post_id, $field) {
  if (!$value) {
    $value = $field['default_value'];
  }
  return $value;
}
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
        'label'         => 'Default Image',
        'instructions'      => 'Appears when creating a new post',
        'type'          => 'image',
        'name'          => 'default_value',
    ));
}

//add acf google maps api key
function aa_acf_google_map_api( $api ){
	$api['key'] = AA_GOOGLE_API_KEY;
	return $api;
}
add_filter('acf/fields/google_map/api', 'aa_acf_google_map_api');

//Hide ACF in admin
//add_filter('acf/settings/show_admin', 'ar_acf_show_admin');
function ar_acf_show_admin( $show ) {
    $user = wp_get_current_user();
    if($user && isset($user->user_login) && 'arallaccess' == $user->user_login) :
    	return true;
    else :
    	return false;
    endif;
}

//Add and remove menu pages
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Agent Advantage Settings',
        'menu_title'    => 'Advantage Setup',
        'menu_slug'     => 'realadvantage',
        'capability'    => 'edit_posts',
        'position'      =>  '2.1',
        'icon_url'      => '/wp-content/themes/agentadvantage/realadvantage/img/ar-menu-icon.png',
        'redirect'      => false,
        'update_button'     => __('Save Settings', 'acf'),
        'updated_message'   => __('Your settings have been updated successfully.', 'acf'),
    ));
}