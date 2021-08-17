<?php

//Add and remove menu pages
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Agent Advantage Settings',
		'menu_title'	=> 'Advantage Setup',
		'menu_slug' 	=> 'realadvantage',
		'capability'	=> 'edit_posts',
		'position'		=>  '2.1',
		'icon_url'		=> '/wp-content/themes/agentadvantage/realadvantage/img/ar-menu-icon.png',
		'redirect'		=> true,
		'update_button'		=> __('Save Settings', 'acf'),
		'updated_message'	=> __('Your settings have been updated successfully.', 'acf'),
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Community Settings',
		'menu_title'	=> 'Community Settings',
		'menu_slug' 	=> 'community',
		'parent_slug'	=> 'realadvantage',
		'update_button'		=> __('Save Settings', 'acf'),
		'updated_message'	=> __('Your settings have been updated successfully.', 'acf'),
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Shortcode Settings',
		'menu_title'	=> 'Footer Settings',
		'menu_slug' 	=> 'footer',
		'parent_slug'	=> 'realadvantage',
		'update_button'		=> __('Save Settings', 'acf'),
		'updated_message'	=> __('Your settings have been updated successfully.', 'acf'),
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Feature Setup',
		'menu_title'	=> 'Feature Setup',
		'menu_slug' 	=> 'features',
		'parent_slug'	=> 'realadvantage',
		'update_button'		=> __('Save Settings', 'acf'),
		'updated_message'	=> __('Your settings have been updated successfully.', 'acf'),
	));
}

/**MENU CLEANUP**/
function ar_community_page_removing() {
    remove_submenu_page('edit.php?post_type=avada_portfolio','edit-tags.php?taxonomy=portfolio_skills&amp;post_type=avada_portfolio');
	remove_submenu_page('edit.php?post_type=avada_portfolio','edit-tags.php?taxonomy=portfolio_tags&amp;post_type=avada_portfolio');
}
add_action( 'admin_menu', 'ar_community_page_removing' );

//add acf google maps api key
function my_acf_google_map_api( $api ){
	$api['key'] = AA_GOOGLE_API_KEY;
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*****MATCH HEIGHT********/
function ar_match_height() {
	if( have_rows('ar_match','option') ): ?>
		<script>jQuery(document).ready(function($){
			<?php while ( have_rows('ar_match','option') ) : the_row(); ?>
				$('<?php the_sub_field('selector'); ?>').matchHeight();
			<?php endwhile; ?>
    	});</script>
	<?php endif;
}
add_action('wp_footer', 'ar_match_height');

/**Remove format Box**/
add_action('after_setup_theme', 'ar_remove_formats', 100);
function ar_remove_formats() {
   remove_theme_support('post-formats');
}

/*******Hide ACF in admin*********/
//add_filter('acf/settings/show_admin', 'ar_acf_show_admin');
function ar_acf_show_admin( $show ) {
    $user = wp_get_current_user();
    if($user && isset($user->user_login) && 'arallaccess' == $user->user_login) :
    	return true;
    else :
    	return false;
    endif;
}

/****Replace Gravatar***/
add_filter( 'get_avatar', 'ar_get_avatar', 10, 5 );
function ar_get_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    //If is email, try and find user ID
    if( ! is_numeric( $id_or_email ) && is_email( $id_or_email ) ){
        $user  =  get_user_by( 'email', $id_or_email );
        if( $user ){
            $id_or_email = $user->ID;
        }
    }

    //if not user ID, return
    if( ! is_numeric( $id_or_email ) ){
        return $avatar;
    }

    //Find ID of attachment saved user meta
    $acf_user = 'user_'.$id_or_email;
    if(get_field('ar_wp_author_img', $acf_user)) {
    	$saved = get_field('ar_wp_author_img', $acf_user);
        return wp_get_attachment_image( $saved, [ $size, $size ], false, ['alt' => $alt] );
    }
    //return normal
    return $avatar;
}

/**Autocomplete Settings**/
function ar_set_google_autocomplete(){
    $search_fields = array();
    if(have_rows('ar_autocomplete','option')) :
        while(have_rows('ar_autocomplete','option')) : the_row();
            $type = get_sub_field('type');
            $key = get_sub_field('selector');
            if($type == 'name') :
                $search_fields[] = ' [name="'.trim($key).'"]';
            elseif($type == 'id') :
                if(!empty($key)) :
                    $findhash = '#';
                    if(strpos($key, $findhash) === false) :
                        $search_fields[] = ' #'.trim($key);
                    else :
                        $search_fields[] = ' '.trim($key);
                    endif;
                endif;
            elseif($type == 'class') :
                if(!empty($key)) :
                    $finddot = '.';
                    if(strpos($key, $finddot) === false) :
                        $search_fields[] = ' .'.trim($key);
                    else :
                        $search_fields[] = ' '.trim($key);
                    endif;
                endif;
            endif;
        endwhile;
    else :
        $search_fields[] =' .google_autocomplete';
    endif; 
    ?>
    <script>
        var input_fields = '<?php echo implode(',' , $search_fields);?>';
    </script>
<?php
}
add_action('wp_head', 'ar_set_google_autocomplete');



// New allowed mime types.
function ar_custom_mime_types( $mime_types=array() ) {
	$mime_types['svg'] = 'image/svg+xml';
	$mime_types['svgz'] = 'image/svg+xml';
	$mime_types['doc'] = 'application/msword';
	$mime_types['mp4'] = 'video/mp4';
    $mime_types['vcf'] = 'text/vcard';
    $mime_types['vcard'] = 'text/vcard';
	return $mime_types;
}
add_filter( 'upload_mimes', 'ar_custom_mime_types' );

//add phone to general settings
add_action('admin_init', 'aa_admin_phone_func');
function aa_admin_phone_func(){
    add_settings_field(
        'aa_admin-phone',
        'Phone Number',
        'aa_admin_phone_callback_function',
        'general',
        'default',
        array( 'label_for' => 'aa_admin-phone' ),
    );
}
 
function aa_admin_phone_callback_function($args){
	$value = get_option( 'aa_admin-phone', '' );
	echo "<input type='text' id='aa_admin-phone' value='".$value."' placeholder='Phone Number' />";
	echo "<p>This will display on your privacy policy and DMCA pages as the main phone number for your site.</p>";
}