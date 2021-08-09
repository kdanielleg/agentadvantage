<?php 
/****
** IDX Shortcodes
**		& Fusion Elements
****/

//only add if IDX plugin is active
if(shortcode_exists('idx-omnibar')):
	//[ar_idx $atts...]
	add_shortcode( 'ar_idx', 'ar_idx_func' );
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_idx' );
	//[ar_impress_showcase $atts...]
	add_shortcode( 'ar_impress_showcase', 'ar_impress_showcase_func' );
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_impress_showcase' );
	//[ar_impress_carousel $atts...]
	add_shortcode( 'ar_impress_carousel', 'ar_impress_carousel_func' );
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_impress_carousel' );
	//[ar_omnibar_search $atts...]
	add_shortcode( 'ar_omnibar_search', 'ar_omnibar_func' );
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_omnibar' );
	//[ar_home_value $atts...]
	add_shortcode( 'ar_home_value', 'ar_home_value_func' );
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_home_value' );
endif;

/****
** [ar_idx $atts...]
****/
function ar_idx_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'widget'	=>	'',
			'class'		=>	'',
			'id'			=>	'',
		),
		$atts
	);
	$idx = get_field('idx_account_id', 'option');
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-idx-widget <?php echo $atts['class']; ?>">
			<?php if($atts['widget']):
				echo do_shortcode('[idx-platinum-widget id="'.$idx.'-'.$atts['widget'].'" ]');
			else : ?>
				<p>No Widget Found</p>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();
}
function ar_fusion_element_idx() {
	$params = array(
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Widget ID', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the Widget ID from your IDXbroker Dashboard', 'fusion-builder' ),
	    'param_name'  => 'widget',
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
	  'name'            => esc_attr__( 'IDX Widget', 'fusion-builder' ),
	  'shortcode'       => 'ar_idx',
	  'icon'            => 'fas fa-home',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/idx-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-idx-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}


/****
** [ar_impress_showcase $atts...]
****/

function ar_impress_showcase_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'property_type'	=> 'featured',
			'saved_link_id'	=> '',
			'agent_id'		=> '',
			'show_image'	=> '1',
			'use_rows'		=> '1',
			'num_per_row'	=> '4',
			'max'			=> '12',
			'order'			=> 'default',
			'styles'		=> '1',
			'new_window'	=> '0',
			'class'			=> '',
			'id'			=> '',
		),
		$atts
	);
	$tf_fields = array('show_image','use_rows','styles','new_window');
	$atts = convert_tf_vars($atts, $tf_fields);
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-impress-showcase <?php echo $atts['class'];?>">
			<?php echo do_shortcode('[impress_property_showcase property_type="'.$atts['property_type'].'" saved_link_id="'.$atts['saved_link_id'].'" agent_id="'.$atts['agent_id'].'" show_image="'.$atts['show_image'].'" use_rows="'.$atts['use_rows'].'" num_per_row="'.$atts['num_per_row'].'" max="'.$atts['max'].'" order="'.$atts['order'].'" styles="'.$atts['styles'].'" new_window="'.$atts['new_window'].'"]'); ?>
		</div>
	<?php return ob_get_clean();
}
function ar_fusion_element_impress_showcase() {
	$params = array(
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Property Type', 'fusion-builder' ),
	    'param_name'  => 'property_type',
	    'value'       => array(
	  		'featured'     => esc_attr__( 'Featured', 'fusion-builder' ),
	  		'soldpending'  => esc_attr__( 'Sold/Pending', 'fusion-builder' ),
	  		'supplemental' => esc_attr__( 'Supplemental', 'fusion-builder' ),
	  		'savedlinks'    => esc_attr__( 'Saved Link', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Saved Link ID', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the id of the saved link from the edit page in middleware', 'fusion-builder' ),
	    'param_name'  => 'saved_link_id',
	    'value'				=> '',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( "Show only listings from this Agent", 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the agent ID from middleware', 'fusion-builder' ),
	    'param_name'  => 'agent_id',
	    'value'				=> '',
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Show Images?', 'fusion-builder' ),
	    'param_name'  => 'show_image',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Use Rows?', 'fusion-builder' ),
	    'param_name'  => 'use_rows',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'			=> 'range',
	    'heading'		=> esc_attr__( 'How Many Columns?', 'fusion-builder' ),
	    'param_name'	=> 'num_per_row',
	    'value'			=> '3',
	    'min'			=> '1',
	    'max'			=> '4',
	    'step'			=> '1',
	  ),
	  array(
	    'type'        => 'range',
	    'heading'     => esc_attr__( 'Maximum Number of Listings to Display?', 'fusion-builder' ),
	    'param_name'  => 'max',
	    'value'			=> '12',
	    'min'			=> '1',
	    'max'			=> '50',
	    'step'			=> '1',
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Sort Order?', 'fusion-builder' ),
	    'param_name'  => 'order',
	    'value'       => array(
	  		'default'  => esc_attr__( 'Default', 'fusion-builder' ),
	  		'high-low' => esc_attr__( 'High Price First', 'fusion-builder' ),
	  		'low-high' => esc_attr__( 'Low Price First', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Use Default Styles?', 'fusion-builder' ),
	    'param_name'  => 'styles',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Open Links a New Window?', 'fusion-builder' ),
	    'param_name'  => 'new_window',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
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
	  'name'            => esc_attr__( 'Impress Property Showcase', 'fusion-builder' ),
	  'shortcode'       => 'ar_impress_showcase',
	  'icon'            => 'fas fa-home',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/impress_showcase-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-impress_showcase-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}


/****
** [ar_impress_carousel $atts...]
****/
function ar_impress_carousel_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'property_type'	=> 'featured',
			'saved_link_id'	=> '',
			'agent_id'		=> '',
			'display'		=> '3',
			'max'			=> '12',
			'order'			=> 'default',
			'autoplay'		=> '0',
			'styles'		=> '1',
			'new_window'	=> '0',
			'class'			=> '',
			'id'			=> '',
		),
		$atts
	);
	$tf_fields = array('autoplay','styles','new_window');
	$atts = convert_tf_vars($atts, $tf_fields);
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-impress-carousel <?php echo $atts['class'];?>">
			<?php echo do_shortcode('[impress_property_carousel property_type="'.$atts['property_type'].'" saved_link_id="'.$atts['saved_link_id'].'" agent_id="'.$atts['agent_id'].'" display="'.$atts['display'].'" max="'.$atts['max'].'" order="'.$atts['order'].'" styles="'.$atts['styles'].'" new_window="'.$atts['new_window'].'" autoplay="'.$atts['autoplay'].'"]'); ?>
		</div>
	<?php return ob_get_clean();
}
function ar_fusion_element_impress_carousel() {
	$params = array(
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Property Type', 'fusion-builder' ),
	    'param_name'  => 'property_type',
	    'value'       => array(
	  		'featured'     => esc_attr__( 'Featured', 'fusion-builder' ),
	  		'soldpending'  => esc_attr__( 'Sold/Pending', 'fusion-builder' ),
	  		'supplemental' => esc_attr__( 'Supplemental', 'fusion-builder' ),
	  		'savedlinks'    => esc_attr__( 'Saved Link', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Saved Link ID', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the id of the saved link from the edit page in middleware', 'fusion-builder' ),
	    'param_name'  => 'saved_link_id',
	    'value'				=> '',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Show only listings from this Agent', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the agent ID from middleware', 'fusion-builder' ),
	    'param_name'  => 'agent_id',
	    'value'				=> '',
	  ),
	  array(
	    'type'        => 'range',
	    'heading'     => esc_attr__( 'How Many Columns?', 'fusion-builder' ),
	    'param_name'  => 'display',
	    'value'			=> '3',
	    'min'			=> '1',
	    'max'			=> '6',
	    'step'			=> '1',
	  ),
	  array(
	    'type'        => 'range',
	    'heading'     => esc_attr__( 'Maximum Number of Listings to Display?', 'fusion-builder' ),
	    'param_name'  => 'max',
	    'value'			=> '12',
	    'min'			=> '1',
	    'max'			=> '50',
	    'step'			=> '1',
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Sort Order?', 'fusion-builder' ),
	    'param_name'  => 'order',
	    'value'       => array(
	  		'default'  => esc_attr__( 'Default', 'fusion-builder' ),
	  		'high-low' => esc_attr__( 'High Price First', 'fusion-builder' ),
	  		'low-high' => esc_attr__( 'Low Price First', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Autoplay?', 'fusion-builder' ),
	    'param_name'  => 'autoplay',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Use Default Styles?', 'fusion-builder' ),
	    'param_name'  => 'styles',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Open Links a New Window?', 'fusion-builder' ),
	    'param_name'  => 'new_window',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
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
	  'name'            => esc_attr__( 'Impress Property Carousel', 'fusion-builder' ),
	  'shortcode'       => 'impress_property_carousel',
	  'icon'            => 'fas fa-home',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/impress_carousel-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-impress_carousel-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}


/****
** [ar_omnibar_search $atts...]
****/
function ar_omnibar_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'extra' => '0',
			'min_price' => '0',
			'styles' => '0',
			'class'	=> '',
			'id'	=> '',
		),
		$atts
	);
	$tf_fields = array('extra','min_price','styles');
	$atts = convert_tf_vars($atts, $tf_fields);
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-impress-omnibar <?php echo $atts['class'];?>">
			<?php echo do_shortcode('[idx-omnibar styles="'.$atts['styles'].'" extra="'.$atts['extra'].'" min_price="'.$atts['min_price'].'" ]'); ?>
		</div>
	<?php return ob_get_clean();
}
function ar_fusion_element_omnibar() {
	$params = array(
		array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Show Extra Fields?', 'fusion-builder' ),
	    'description' => esc_attr__( 'Adds Beds, Baths and Max Price Field', 'fusion-builder' ),
	    'param_name'  => 'extra',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Show Min Price with Extra Fields?', 'fusion-builder' ),
	    'param_name'  => 'min_price',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Use Default Styles?', 'fusion-builder' ),
	    'param_name'  => 'styles',
	    'value'       => array(
	  		'true' => esc_attr__( 'Yes', 'fusion-builder' ),
	  		'false' => esc_attr__( 'No', 'fusion-builder' ),
	  	),
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
	  'name'            => esc_attr__( 'IDX Property Search', 'fusion-builder' ),
	  'shortcode'       => 'ar_omnibar_search',
	  'icon'            => 'fas fa-search',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/idx-omnibar-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-idx-omnibar-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}


/****
** [ar_home_value $atts...]
****/
function ar_home_value_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$count = (int)$atts['count'];
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-idx-hv-form <?php echo $atts['class']; ?>">
			<div id="hvForm">
				<form action="<?php the_field('idx_account_url', 'option'); ?>/idx/homevaluation">
  					<input type="text" id="hv-location" name="address" placeholder="Start Typing the Address...">
  					<button type="submit" value="Submit"><i class="fad fa-location"></i></button>
				</form>
			</div>
		</div>
	<?php return ob_get_clean();
}
function ar_fusion_element_home_value() {
	$params = array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=> 'class',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=> 'id',
		),
	);
	$args = array(
		'name'            => esc_attr__( 'AR Home Value', 'fusion-builder' ),
		'shortcode'       => 'ar_home_value',
		'icon'            => 'far fa-usd',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/home_value-preview.php',
		'preview_id'      => 'fusion-builder-block-module-home_value-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	); 
	fusion_builder_map($args);
}