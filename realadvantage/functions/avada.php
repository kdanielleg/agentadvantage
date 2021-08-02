<?php //avada mods

/***********Show Top Bar With v7 Header*********/
if(get_field('ar_header_top','option')) {
	function avada_secondary_header() {
		if ( ! in_array( Avada()->settings->get( 'header_layout' ), array( 'v2', 'v3', 'v4', 'v5','v7' ) ) ) {
			return;
		}
		if ( 'Leave Empty' !== Avada()->settings->get( 'header_left_content' ) || 'Leave Empty' !== Avada()->settings->get( 'header_right_content' ) ) {
			get_template_part( 'templates/header-secondary' );
		}
	}
}

/**Hide Fusion Branding**/
if(get_field('hide_fusion_branding','option')) {
	function ar_branding_page_remove() {
		remove_menu_page('fusion-white-label-branding-admin');
	}
	add_action('admin_menu', 'ar_branding_page_remove');
}

