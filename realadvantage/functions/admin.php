<?php

/**MENU CLEANUP**/
function ar_community_page_removing() {
    remove_submenu_page('edit.php?post_type=avada_portfolio','edit-tags.php?taxonomy=portfolio_skills&amp;post_type=avada_portfolio');
	remove_submenu_page('edit.php?post_type=avada_portfolio','edit-tags.php?taxonomy=portfolio_tags&amp;post_type=avada_portfolio');
}
add_action( 'admin_menu', 'ar_community_page_removing' );

/**Remove format Box**/
add_action('after_setup_theme', 'ar_remove_formats', 100);
function ar_remove_formats() {
   remove_theme_support('post-formats');
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

//Font Awesome Pro
function fa_custom_setup_kit($kit_url = '') {
    foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ):
        add_action($action, function () use ( $kit_url ) {
            wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
        });
    endforeach;
}
fa_custom_setup_kit('https://kit.fontawesome.com/ee7e9124da.js');

//Automatic Update Notifications
require get_stylesheet_directory() . '/realadvantage/plugins/plugin-update-checker/plugin-update-checker.php';
$repo = 'agentadvantage';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker('https://github.com/kdanielleg/'.$repo.'/', __FILE__, $repo);
$myUpdateChecker->setAuthentication(AA_THEME_API_KEY);
$myUpdateChecker->setBranch('live-release');