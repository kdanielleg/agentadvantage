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

/**gmaps autocomplete dependencies**/
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

//FUNCTIONS
ar_require_folder('functions');

//CUSTOM FIELDS
ar_require_folder('fields');

//SHORTCODES
ar_require_folder('shortcodes');

//ADD Fivestar
require_once( get_stylesheet_directory() . '/realadvantage/plugins/fivestar.php');

//Add Custom IDX Codes
require_once( get_stylesheet_directory() . '/realadvantage/idx/idx.php');

//Require Folders Loop
function ar_require_folder($folder) {
    foreach (glob(get_stylesheet_directory().'/realadvantage/'.$folder.'/*.php') as $function) :
        $function = basename($function);
        require_once get_stylesheet_directory().'/realadvantage/'.$folder.'/'.$function;
    endforeach;
}