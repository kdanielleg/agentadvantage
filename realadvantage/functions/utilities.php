<?php 

//Sitemap pages function
function ar_shortcode_list_pages( $arr, $query_args ) {
	$map_args = array(
		'title' => 'post_title',
		'date' => 'post_date',
		'author' => 'post_author',
		'modified' => 'post_modified'
	);
	// modify the query args for get_pages() if necessary
	$orderby = array_key_exists( $query_args['orderby'], $map_args ) ? $map_args[$query_args['orderby']] : $query_args['orderby'];
	$r = array(
		'depth' => $arr['page_depth'],
		'show_date' => '',
		'date_format' => get_option( 'date_format' ),
		'child_of' => 0,
		'exclude' => $arr['exclude'],
		'echo' => 1,
		'authors' => '',
		'sort_column' => $orderby,
		'sort_order' => $query_args['order'],
		'link_before' => '',
		'link_after' => '',
		'item_spacing' => '',
	);
	$output = '';
	$current_page = 0;
	$r['exclude'] = preg_replace( '/[^0-9,]/', '', $r['exclude'] ); // sanitize, mostly to keep spaces out
	// Query pages.
	$r['hierarchical'] = 0;
	$pages = get_pages( $r );
	if ( ! empty( $pages ) ) {
		global $wp_query;
		if ( is_page() || is_attachment() || $wp_query->is_posts_page ) {
			$current_page = get_queried_object_id();
		} elseif ( is_singular() ) {
			$queried_object = get_queried_object();
			if ( is_post_type_hierarchical( $queried_object->post_type ) ) {
				$current_page = $queried_object->ID;
			}
		}
		$output .= walk_page_tree( $pages, $r['depth'], $current_page, $r );
	}
	// remove links
	if( $arr['links'] != 'true' ) {
		$output = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $output);
	}
	if ( $r['echo'] ) {
		echo $output;
	} else {
		return $output;
	}
}

//generate states arrays
function ar_st_array(){
	$return = array(
		'AL' => 'AL', 'AK' => 'AK', 'AZ' => 'AZ', 'AR' => 'AR', 'CA' => 'CA', 
		'CO' => 'CO', 'CT' => 'CT', 'DE' => 'DE', 'FL' => 'FL', 'GA' => 'GA', 
		'HI' => 'HI', 'ID' => 'ID', 'IL' => 'IL', 'IN' => 'IN', 'IA' => 'IA', 
		'KS' => 'KS', 'KY' => 'KY', 'LA' => 'LA', 'ME' => 'ME', 'MD' => 'MD', 
		'MA' => 'MA', 'MI' => 'MI', 'MN' => 'MN', 'MS' => 'MS', 'MO' => 'MO', 
		'MT' => 'MT', 'NE' => 'NE', 'NV' => 'NV', 'NH' => 'NH', 'NJ' => 'NJ', 
		'NM' => 'NM', 'NY' => 'NY', 'NC' => 'NC', 'ND' => 'ND', 'OH' => 'OH', 
		'OK' => 'OK', 'OR' => 'OR', 'PA' => 'PA', 'RI' => 'RI', 'SC' => 'SC', 
		'SD' => 'SD', 'TN' => 'TN', 'TX' => 'TX', 'UT' => 'UT', 'VT' => 'VT', 
		'VA' => 'VA', 'WA' => 'WA', 'WV' => 'WV', 'WI' => 'WI', 'WY' => 'WY',
	);
	return $return;
}
function ar_state_array(){
	$return = array(
		'Alabama' => 'Alabama', 'Alaska' => 'Alaska', 'Arizona' => 'Arizona', 'Arkansas' => 'Arkansas', 'California' => 'California',
		'Colorado' => 'Colorado', 'Connecticut' => 'Connecticut', 'Delaware' => 'Delaware', 'Florida' => 'Florida', 'Georgia' => 'Georgia',
		'Hawaii' => 'Hawaii', 'Idaho' => 'Idaho', 'Illinois' => 'Illinois', 'Indiana' => 'Indiana', 'Iowa' => 'Iowa',
		'Kansas' => 'Kansas', 'Kentucky' => 'Kentucky', 'Louisiana' => 'Louisiana', 'Maine' => 'Maine', 'Maryland' => 'Maryland',
		'Massachusetts' => 'Massachusetts', 'Michigan' => 'Michigan', 'Minnesota' => 'Minnesota', 'Mississippi' => 'Mississippi', 'Missouri' => 'Missouri',
		'Montana' => 'Montana', 'Nebraska' => 'Nebraska', 'Nevada' => 'Nevada', 'New Hampshire' => 'New Hampshire', 'New Jersey' => 'New Jersey', 
		'New Mexico' => 'New Mexico', 'New York' => 'New York', 'North Carolina' => 'North Carolina', 'North Dakota' => 'North Dakota', 'Ohio' => 'Ohio',
		'Oklahoma' => 'Oklahoma', 'Oregon' => 'Oregon', 'Pennsylvania' => 'Pennsylvania', 'Rhode Island' => 'Rhode Island', 'South Carolina' => 'South Carolina',
		'South Dakota' => 'South Dakota', 'Tennessee' => 'Tennessee', 'Texas' => 'Texas', 'Utah' => 'Utah', 'Vermont' => 'Vermont',
		'Virginia' => 'Virginia', 'Washington' => 'Washington', 'West Virginia' => 'West Virginia', 'Wisconsin' => 'Wisconsin', 'Wyoming' => 'Wyoming',
	);
	return $return;
}

/**convert true/false string atts to numbers**/
function convert_tf_vars($atts, $fields) {
	foreach($fields as $field) {
		if($atts[$field]=='true') {
			$atts[$field] = '1';
		}elseif($atts[$field]=='false') {
			$atts[$field] = '0';
		}
	}
	return $atts;
}