<?php
/***Activate PUC***/
if(get_field('realadvantage_updates_token','option')) {
    ar_add_puc(get_field('realadvantage_dev_mode', 'option'));
}


//Add and remove menu pages
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'RealAdvantage Settings',
		'menu_title'	=> 'RealAdvantage',
		'menu_slug' 	=> 'realadvantage',
		'capability'	=> 'edit_posts',
		'position'		=>  '2.1',
		/**'icon_url' 		=> 'dashicons-star-filled',**/
		'icon_url'		=> '/wp-content/themes/realadvantage-plus/realadvantage/img/ar-branding-menu-2018.png',
		'redirect'		=> true,
		'update_button'		=> __('Save Settings', 'acf'),
		'updated_message'	=> __('Your settings have been updated successfully.', 'acf'),
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Agent Reputation Settings',
		'menu_title'	=> 'Agent Reputation',
		'menu_slug' 	=> 'shortcodes',
		'parent_slug'	=> 'realadvantage',
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
		'page_title' 	=> 'Privacy Policy',
		'menu_title'	=> 'Privacy Policy',
		'menu_slug' 	=> 'privacy',
		'parent_slug'	=> 'realadvantage',
		'update_button'		=> __('Save Settings', 'acf'),
		'updated_message'	=> __('Your settings have been updated successfully.', 'acf'),
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog Settings',
		'menu_title'	=> 'Blog Settings',
		'menu_slug' 	=> 'author',
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
	if(shortcode_exists('idx-omnibar')):
		acf_add_options_page(array(
			'page_title' 	=> 'IDX Broker Admin',
			'menu_title'	=> 'IDX Admin',
			'menu_slug' 	=> 'realadvantage-idx',
			'capability'	=> 'edit_posts',
			'position'		=>  '2.2',
			'icon_url' 		=> 'dashicons-admin-multisite',
			'redirect'		=> true,
			'update_button'		=> __('Save Settings', 'acf'),
			'updated_message'	=> __('Your settings have been updated successfully.', 'acf'),
		));
	endif;
}

/**MENU CLEANUP**/
function ar_community_page_removing() {
    remove_submenu_page('edit.php?post_type=avada_portfolio','edit-tags.php?taxonomy=portfolio_skills&amp;post_type=avada_portfolio');
	remove_submenu_page('edit.php?post_type=avada_portfolio','edit-tags.php?taxonomy=portfolio_tags&amp;post_type=avada_portfolio');
}
add_action( 'admin_menu', 'ar_community_page_removing' );

//add google maps api key
function my_acf_google_map_api( $api ){
	$api['key'] = get_field('ar_gmap_key','option');
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*********ADD IMAGE SIZES***************/
function ar_plus_theme_image_size() {
	add_image_size('gallery-thumb','650','550', true);
}
add_action( 'after_setup_theme', 'ar_plus_theme_image_size' );
// Register the image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'ar_custom_sizes' );
function ar_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'gallery-thumb' => __( 'Gallery Thumb' ),
    ) );
}

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