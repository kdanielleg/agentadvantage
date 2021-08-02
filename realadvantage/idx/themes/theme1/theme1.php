<?php 
function ar_listings_layout_theme1(){
	ob_start();
		include get_stylesheet_directory().'/realadvantage/idx/themes/theme1/php/details.php';
	$layout = str_replace('"', "'", ob_get_clean());
	$stripped = preg_replace('~>\\s+<~m', '><', $layout);
	return $stripped;
}

include get_stylesheet_directory().'/realadvantage/idx/themes/theme1/php/contact.php';