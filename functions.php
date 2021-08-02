<?php
/**scripts and styles**/
function ar_enqueue_styles_scripts() {
    //child theme styles
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'fusion-dynamic-css' ), filemtime(get_stylesheet_directory() . '/style.css') );
    //match height
    wp_enqueue_script ( 'matchheight' , '//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js', array( 'jquery' ), '', true );
    //jquery ui
    wp_enqueue_script( 'jquery-ui-autocomplete' );
    wp_enqueue_script( 'jquery-ui-slider' );

    //jquery css
    wp_enqueue_style('jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array( 'fusion-dynamic-css' ),false, false);

    //google maps autocomplete
    $google_api_key = get_field('ar_gmap_key','option');
    wp_enqueue_script('ar-gmaps-autocomplete', get_stylesheet_directory_uri() . '/realadvantage/js/autocomplete.js',array('jquery-core','jquery'),filemtime(get_stylesheet_directory() . '/realadvantage/js/autocomplete.js'),true);
    wp_enqueue_script('google-maps','https://maps.googleapis.com/maps/api/js?key='.(!empty($google_api_key) ? $google_api_key : 'AIzaSyB16sGmIekuGIvYOfNoW9T44377IU2d2Es').'&libraries=places',ar_autocomplete_dependency(),'1.0',true);

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

/*********Add Automatic Updates*********/
require get_stylesheet_directory() . '/realadvantage/plugins/plugin-update-checker/plugin-update-checker.php';
$repo = 'agentadvantage';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/kdanielleg/'.$repo.'/',
    __FILE__,
    $repo
);
$myUpdateChecker->setAuthentication('91a07e079dce797741d5ef7cc73fa038cbda2d96');
$myUpdateChecker->setBranch('live-release');

/********Font Awesome Pro**************/
if (! function_exists('fa_custom_setup_kit') ) {
  function fa_custom_setup_kit($kit_url = '') {
    foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
      add_action(
        $action,
        function () use ( $kit_url ) {
          wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
        }
      );
    }
  }
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


/*********Require Fields Loop*******/
function ar_require_folder($folder) {
    foreach (glob(get_stylesheet_directory().'/realadvantage/'.$folder.'/*.php') as $function) {
        $function = basename($function);
        require get_stylesheet_directory().'/realadvantage/'.$folder.'/'.$function;
    }
}


/**Replace email icon with url**/
function ar_mail_to_contact() { ?>
    <script>jQuery(document).ready(function($){
        var email_link = '';
        var email_test = '';
        $('a.fusion-social-network-icon.fusion-icon-mail').each(function(){
            email_link = $(this).attr('href');
            email_test = email_link.substring(0, 11);
            if(email_test == 'mailto:http') {
                $(this).attr('href', email_link.substring(7));
            }
        })
    });</script>
<?php }
if(get_field('ar_replace_social_email')) {
    add_action( 'wp_footer', 'ar_mail_to_contact' );
}

/**fix label placement in IDX form**/
function ar_fix_awesomeplete() { ?>
    <script>jQuery(document).ready(function($){
        $('form.idx-omnibar-extra-form > .awesomplete').prepend($('form.idx-omnibar-extra-form > label'));
    });</script>
<?php }
add_action( 'wp_footer', 'ar_fix_awesomeplete' );

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


if ( ! function_exists( 'avada_logo' ) ) {
    /**
     * Gets the logo template if needed.
     */
    function avada_logo() {
        // No need to proceed any further if no logo is set.
        if ( '' !== Avada()->settings->get( 'logo' ) || '' !== Avada()->settings->get( 'logo_retina' ) || get_field('ar_use_text_logo','option') ) {
            get_template_part( 'templates/logo' );
        }
    }
}

/**Add Custom IDX Codes**/
if(get_field('ar_wrapcodes_active','option')) :
    require_once( get_stylesheet_directory() . '/realadvantage/idx/idx.php');
endif;


/**
 * Filters the next, previous and submit buttons.
 * Replaces the forms <input> buttons with <button> while maintaining attributes from original <input>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
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
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );
 
    return $dom->saveHtml( $new_button );
}

/**Gravity forms EID fix**/
function avada_gravity_form_merge_tags( $args = array() ) {
    Avada_Gravity_Forms_Tags_Merger::get_instance( array( 'auto_append_eid' => false ) );
}