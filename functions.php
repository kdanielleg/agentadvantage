<?php
/**scripts and styles**/
function ar_enqueue_styles_scripts() {
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('fusion-dynamic-css'), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script ('matchheight', '//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-ui-autocomplete');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_style('jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array('fusion-dynamic-css'),false, false);
    //wp_enqueue_script('ar-gmaps-autocomplete', get_stylesheet_directory_uri() . '/realadvantage/js/autocomplete.js',array('jquery-core','jquery'),filemtime(get_stylesheet_directory() . '/realadvantage/js/autocomplete.js'),true);
    //wp_enqueue_script('google-maps','https://maps.googleapis.com/maps/api/js?key='.AA_GOOGLE_API_KEY.'&libraries=places',ar_autocomplete_dependency(),'1.0',true);

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

/*********SHORTCODES***************/
ar_require_folder('shortcodes');

/*********ADD Fivestar***************/
require_once( get_stylesheet_directory() . '/realadvantage/plugins/fivestar.php');

/**Add Custom IDX Codes**/
require_once( get_stylesheet_directory() . '/realadvantage/idx/idx.php');


/*********Require Folders Loop*******/
function ar_require_folder($folder) {
    foreach (glob(get_stylesheet_directory().'/realadvantage/'.$folder.'/*.php') as $function) :
        $function = basename($function);
        require get_stylesheet_directory().'/realadvantage/'.$folder.'/'.$function;
    endforeach;
}


/***acf default image value***/
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

/**Disable Yoast on IDX Wrappers**/
//add_action( 'template_redirect', 'ar_remove_wpseo' );
function ar_remove_wpseo() {
    if(is_singular( 'idx-wrapper')):
        $front_end = YoastSEO()->classes->get( Yoast\WP\SEO\Integrations\Front_End_Integration::class );
        remove_action( 'wpseo_head', [ $front_end, 'present_head' ], -9999 );
    endif;
}