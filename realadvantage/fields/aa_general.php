<?php //options added to WP general settings page

//add options to general settings
add_action('admin_init', 'aa_general_section');  
function aa_general_section() {  
    add_settings_section(  
        'aa_settings_section', // Section ID 
        'Agent Advantage Settings', // Section Title
        'aa_settings_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );
    add_settings_field( // Admin Name
        'aa_admin_name', // Option ID
        'Company/Agent Display Name', // Label
        'aa_admin_name_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'aa_settings_section', // Name of our section
        array( // The $args
            'aa_admin_name' // Should match Option ID
        )  
    );
    add_settings_field( // Admin License
        'aa_admin_license', // Option ID
        'State License', // Label
        'aa_admin_license_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'aa_settings_section', // Name of our section
        array( // The $args
            'aa_admin_license' // Should match Option ID
        )  
    ); 
    add_settings_field( // Admin Phone
        'aa_admin_phone', // Option ID
        'Administrative Phone Number', // Label
        'aa_admin_phone_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'aa_settings_section', // Name of our section
        array( // The $args
            'aa_admin_phone' // Should match Option ID
        )  
    ); 
    add_settings_field( // Admin Address
        'aa_admin_address', // Option ID
        'Administrative Address', // Label
        'aa_admin_address_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'aa_settings_section', // Name of our section
        array( // The $args
            'aa_admin_address' // Should match Option ID
        )  
    ); 
    add_settings_field( // Admin IDX AID
        'aa_idx_aid', // Option ID
        'IDX Account ID', // Label
        'aa_idx_aid_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'aa_settings_section', // Name of our section
        array( // The $args
            'aa_idx_aid' // Should match Option ID
        )  
    ); 
    add_settings_field( // Admin IDX URL
        'aa_idx_url', // Option ID
        'IDX Account URL', // Label
        'aa_idx_url_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'aa_settings_section', // Name of our section
        array( // The $args
            'aa_idx_url' // Should match Option ID
        )  
    ); 
    add_settings_field( // Admin IDX URL
        'aa_admin_kw', // Option ID
        'Keller Williams Website?', // Label
        'aa_admin_kw_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'aa_settings_section', // Name of our section
        array( // The $args
            'aa_admin_kw' // Should match Option ID
        )  
    ); 
    register_setting('general','aa_admin_name', 'esc_attr');
    register_setting('general','aa_admin_license', 'esc_attr');
    register_setting('general','aa_admin_phone', 'esc_attr');
    register_setting('general','aa_admin_address', 'esc_attr');
    register_setting('general','aa_idx_aid', 'esc_attr');
    register_setting('general','aa_idx_url', 'esc_attr');
    register_setting('general','aa_admin_kw', 'esc_attr');
}
function aa_settings_section_options_callback() { // Section Callback
    echo '';  
}
function aa_admin_name_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" class="regular-text ltr" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
    echo '<p>Main Company Name to Display</p>';
}
function aa_admin_license_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" class="regular-text ltr" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
    echo '<p>License and Title to Display</p>';
}
function aa_admin_phone_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" class="regular-text ltr" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
    echo '<p>Phone number to display</p>';
}
function aa_admin_address_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" class="regular-text ltr" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
    echo '<p>Address to display</p>';
}
function aa_idx_aid_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" class="regular-text ltr" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
    echo '<p>IDXbroker Account ID</p>';
}
function aa_idx_url_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" class="regular-text ltr" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
    echo '<p>Do not include trailing slash.<Br>EX: https://mydomain.idxbroker.com<br>EX: https://search.mydomain.com</p>';
}
function aa_admin_kw_callback($args) { // Radio TF Callback
    $option = get_option($args[0]);
    ?>
        <input type="radio" id="<?php echo $args[0]; ?>" name="<?php echo $args[0]; ?>" value="true" <?php checked("true", $option, true); ?>>Yes
        <input type="radio" id="<?php echo $args[0]; ?>" name="<?php echo $args[0]; ?>" value="false" <?php checked("false", $option, true); ?>>No
   <?php
}