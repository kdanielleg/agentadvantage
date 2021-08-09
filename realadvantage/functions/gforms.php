<?php
/**
 * Form-related methods.
 */

add_filter( 'gform_confirmation_anchor', '__return_true' );

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