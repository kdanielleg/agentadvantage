<?php 

/****
** [ar_cma_map $atts...]
****/
//CMA Map
function ar_cma_map_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'address' => 'hv-address',
			'height' => '56.25%',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$address = $_GET[$atts['address']];
	
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-cma-map <?php echo $atts['class']; ?>">
			<?php if($address) : ?>
				<div class="ar-gmap ar-responsive-map" style="padding-bottom: <?php echo $atts['height']; ?>;">
					<iframe width="600" height="520" src="//maps.google.com/maps?q=<?php echo $address; ?>&amp;output=embed"></iframe>
				</div>
			<?php else : ?>
				<p>No address found.</p>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_cma_map', 'ar_cma_map_func' );
function ar_fusion_element_cma_map() {
	$params = array(
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Height', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the map height using any valid CSS meausrement (ie px or %)', 'fusion-builder' ),
	    'param_name'  => 'height',
	    'value'				=> '56.25%',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Address Field Name', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the name of the address field used in the CMA form', 'fusion-builder' ),
	    'param_name'  => 'address',
	    'value'		  => 'hv_address',
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
	  'name'            => esc_attr__( 'CMA Map', 'fusion-builder' ),
	  'shortcode'       => 'ar_cma_map',
	  'icon'            => 'fas fa-map',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/cma_map-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-cma_map-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_cma_map' );

//CMA address
function ar_cma_address_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'address' => 'hv-address',
			'height' => '56.25%',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$address = htmlspecialchars($_GET[$atts['address']]);
	
	ob_start(); ?>
		<p id="<?php echo $atts['id']; ?>" class="ar-cma-address <?php echo $atts['class']; ?>">
			<?php if($address) :
				echo $address;
			else : 
				echo 'No address found.';
			endif; ?>
		</p>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_cma_address', 'ar_cma_address_func' );
function ar_fusion_element_cma_address() {
	$params = array(
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Address Field Name', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the name of the address field used in the CMA form', 'fusion-builder' ),
	    'param_name'  => 'address',
	    'value'		  => 'hv_address',
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
	  'name'            => esc_attr__( 'CMA Address', 'fusion-builder' ),
	  'shortcode'       => 'ar_cma_address',
	  'icon'            => 'fas fa-map',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/cma_address-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-cma_address-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_cma_address' );