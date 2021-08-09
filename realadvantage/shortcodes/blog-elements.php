<?php 

/****
** [ar_search_map $atts...]
****/
//Search Map
function ar_search_map_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'search' => '',
			'height' => '56.25%',
			'zoom'	=> '12',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$search = urlencode($atts['search']);
	
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-search-map <?php echo $atts['class']; ?>">
			<?php if($search) : ?>
				<div class="ar-gmap ar-responsive-map" style="padding-bottom: <?php echo $atts['height']; ?>;">
					<iframe width="600" height="520" frameborder="0" style="border:0" allowfullscreen src="//www.google.com/maps/embed/v1/search?key=<?php echo AA_GOOGLE_API_KEY; ?>&q=<?php echo $search; ?>&zoom=<?php echo $atts['zoom']; ?>"></iframe>
				</div>
			<?php else : ?>
				<p>No search term found.</p>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_search_map', 'ar_search_map_func' );
function ar_fusion_element_search_map() {
	$params = array(
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Height', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the map height using any valid CSS meausrement (ie px or %)', 'fusion-builder' ),
	    'param_name'  => 'height',
	    'value'		  => '56.25%',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Search Term', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the search term to show on the map. Ex: Home Improvement stores near monongalia county wv', 'fusion-builder' ),
	    'param_name'  => 'search',
	    'value'		  => '',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Zoom', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the map zoom level, default 12', 'fusion-builder' ),
	    'param_name'  => 'zoom',
	    'value'		  => '12',
	  ),
	  array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'  => 'class',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'  => 'id',
		),
	);
	$args = array(
	  'name'            => esc_attr__( 'Search Map', 'fusion-builder' ),
	  'shortcode'       => 'ar_search_map',
	  'icon'            => 'fas fa-map',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/cma_map-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-cma_map-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_search_map' );

//add feedzy shortcode to builder
function ar_fusion_element_feedzy_rss() {
	$params = array(
		array(
			'type'        => 'textarea',
			'heading'     => esc_attr__( 'RSS Feeds', 'fusion-builder' ),
			'description'     => esc_attr__( 'Enter your RSS feed URLs separated by commas', 'fusion-builder' ),
			'param_name'  => 'feeds',
		),
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'How Many Items?', 'fusion-builder' ),
			'param_name'  => 'max',
			'value'       => '20',
			'min'         => '1',
			'max'         => '100',
			'step'        => '1',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show Feed Title?', 'fusion-builder' ),
			'param_name'  => 'feed_title',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'The results should udpate every...', 'fusion-builder' ),
			'param_name'  => 'refresh',
			'value'       => array(
				'12_hours'	=> esc_attr__( '12 Hours', 'fusion-builder' ),
				'1_days'	=> esc_attr__( '1 Day', 'fusion-builder' ),
				'3_days'	=> esc_attr__( '3 Days', 'fusion-builder' ),
				'15_days'	=> esc_attr__( '15 Days', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'select',
			'heading'     => esc_attr__( 'Order By:', 'fusion-builder' ),
			'param_name'  => 'refresh',
			'value'       => array(
				'date_desc'		=> esc_attr__( 'Date Descending', 'fusion-builder' ),
				'date_asc'		=> esc_attr__( 'Date Ascending', 'fusion-builder' ),
				'title_desc'	=> esc_attr__( 'Title Descending', 'fusion-builder' ),
				'title_asc'		=> esc_attr__( 'Title Ascending', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Message to Show When There are No Items to Display', 'fusion-builder' ),
			'param_name'  => 'error_empty',
			'value'		  => 'No Posts Found',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Open links in a new Window/Tab?', 'fusion-builder' ),
			'param_name'  => 'target',
			'value'       => array(
				'_blank' => esc_attr__( 'Yes', 'fusion-builder' ),
				'_self'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show published date and author name?', 'fusion-builder' ),
			'param_name'  => 'meta',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show excerpt?', 'fusion-builder' ),
			'param_name'  => 'summary',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'Excerpt Length (characters)', 'fusion-builder' ),
			'param_name'  => 'summarylength',
			'value'       => '150',
			'min'         => '1',
			'max'         => '500',
			'step'        => '1',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show thumbnail image?', 'fusion-builder' ),
			'param_name'  => 'thumb',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'Thumbnail size (pixels)', 'fusion-builder' ),
			'param_name'  => 'size',
			'value'       => '150',
			'min'         => '1',
			'max'         => '500',
			'step'        => '1',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Force https for Images?', 'fusion-builder' ),
			'param_name'  => 'http',
			'value'       => array(
				'force'  => esc_attr__( 'Yes', 'fusion-builder' ),
				'' => esc_attr__( 'No, Allow http', 'fusion-builder' ),
				'default'  => esc_attr__( 'No, Use default image', 'fusion-builder' ),
			),
		),
	);
	$args = array(
		'name'            => esc_attr__( 'RSS Feed', 'fusion-builder' ),
		'shortcode'       => 'feedzy-rss',
		'icon'            => 'fas fa-rss',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/feedzy_rss-preview.php',
		'preview_id'      => 'fusion-builder-block-module-feedzy_rss-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
if(shortcode_exists('feedzy-rss')) :
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_feedzy_rss' );
endif;