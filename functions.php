<?php
/**scripts and styles**/
function ar_enqueue_styles_scripts() {
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('fusion-dynamic-css'), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script ('matchheight', '//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-ui-autocomplete');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_style('jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array('fusion-dynamic-css'),false, false);
    wp_enqueue_script('ar-gmaps-autocomplete', get_stylesheet_directory_uri() . '/realadvantage/js/autocomplete.js',array('jquery-core','jquery'),filemtime(get_stylesheet_directory() . '/realadvantage/js/autocomplete.js'),true);
    wp_enqueue_script('google-maps','https://maps.googleapis.com/maps/api/js?key='.AA_GOOGLE_API_KEY.'&libraries=places',ar_autocomplete_dependency(),'1.0',true);

}
add_action( 'wp_enqueue_scripts', 'ar_enqueue_styles_scripts');

/**list of gmaps autocomplete dependency files**/
function ar_autocomplete_dependency() {
    $options = array(
        'jquery-core',
        'jquery',
        'ar-gmaps-autocomplete',
    );
    return $options;
}

//avada language setup
function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

/********Automatic Update Notifications*************/
require get_stylesheet_directory() . '/realadvantage/plugins/plugin-update-checker/plugin-update-checker.php';
$repo = 'agentadvantage';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker('https://github.com/kdanielleg/'.$repo.'/', __FILE__, $repo);
$myUpdateChecker->setAuthentication(AA_THEME_API_KEY);
$myUpdateChecker->setBranch('live-release');

/********Font Awesome Pro**************/
function fa_custom_setup_kit($kit_url = '') {
    foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ):
        add_action($action, function () use ( $kit_url ) {
            wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
        });
    endforeach;
}
fa_custom_setup_kit('https://kit.fontawesome.com/ee7e9124da.js');

/*********FUNCTIONS*******************/
ar_require_folder('functions');

/*********CUSTOM FIELDS***************/
ar_require_folder('fields');

/*********WIDGETS***************/
ar_require_folder('widgets');

/*********ADD Fivestar***************/
if(get_field('ar_activate_fivestar','option')) {
	require_once( get_stylesheet_directory() . '/realadvantage/plugins/fivestar.php');
}

/*********Require Folders Loop*******/
function ar_require_folder($folder) {
    foreach (glob(get_stylesheet_directory().'/realadvantage/'.$folder.'/*.php') as $function) :
        $function = basename($function);
        require get_stylesheet_directory().'/realadvantage/'.$folder.'/'.$function;
    endforeach;
}

/**Client Specific files**/
function ar_client_files(){
    $choices = array(
        'none' => 'None',
    );
    return $choices;
}

if(get_field('ar_client_file','option') && get_field('ar_client_file','option') != 'none') {
    require_once( get_stylesheet_directory() . '/realadvantage/client/'.get_field('ar_client_file','option').'.php');
}

function ar_custom_mime_types( $mime_types=array() ) {
	// New allowed mime types.
	$mime_types['svg'] = 'image/svg+xml';
	$mime_types['svgz'] = 'image/svg+xml';
	$mime_types['doc'] = 'application/msword';
	$mime_types['mp4'] = 'video/mp4';
    $mime_types['vcf'] = 'text/vcard';
    $mime_types['vcard'] = 'text/vcard';
	return $mime_types;
}
add_filter( 'upload_mimes', 'ar_custom_mime_types' );

/**Add Custom IDX Codes**/
if(get_field('ar_wrapcodes_active','option')) :
    require_once( get_stylesheet_directory() . '/realadvantage/idx/idx.php');
endif;


/**
 * Change Gravity forms  inputs to buttons
 */
add_filter( 'gform_next_button', 'ar_input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'ar_input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'ar_input_to_button', 10, 2 );
function ar_input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) :
        $new_button->setAttribute( $attribute->name, $attribute->value );
    endforeach;
    $input->parentNode->replaceChild( $new_button, $input );
    return $dom->saveHtml( $new_button );
}

/**Gravity forms EID fix**/
function avada_gravity_form_merge_tags( $args = array() ) {
    Avada_Gravity_Forms_Tags_Merger::get_instance( array( 'auto_append_eid' => false ) );
}