<?php
/**
 * Form-related methods.
 */

add_filter( 'gform_confirmation_anchor', '__return_true' );

//add_filter( 'gform_get_form_filter', 'ar_gravity_mods', 10, 2 );
function ar_gravity_mods($form_string, $form) {
	$dom = new domDocument();
	// Load the form's html into the object.
	$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $form_string );
	// Discard white space.
	$dom->preserveWhiteSpace = false;
	// Get the main form Element by ID.
	$gform = $dom->getElementById( 'gform_' . $form_id );
	// Use DomXPath to find elements by regular expressions (classname and id).
	$xpath = new DomXPath( $dom );
	// Get the form's body and footer contents and store them in variables.
	$gform_ul             = $xpath->query( '//ul[@id="gform_fields_' . $form_id . '"]/*' );
	$gform_footer_content = $xpath->query( '//div[contains(@class, "gform_footer")]/*' );
	// Get the form's body and footer nodes in order to modify them.
	$gform_body   = $xpath->query( '//div[contains(@class, "gform_body")]' )->item( 0 );
	$gform_footer = $xpath->query( '//div[contains(@class, "gform_footer")]' )->item( 0 );
	// Remove the body container and append the contents that we saved earlier.
	$gform->removeChild( $gform_body );
	foreach ( $gform_ul as $node ) {
    	$gform->appendChild( $node );
	}
	// Remove the footer container.
	$gform->removeChild( $gform_footer );
	foreach ( $gform_footer_content as $node ) {
	  $gform->appendChild( $node );
	}
	return highlight_string($dom->saveHTML());
}