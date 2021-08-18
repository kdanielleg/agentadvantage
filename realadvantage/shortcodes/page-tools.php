<?php 

/****
** Page Reviews
****/
function aa_template_reviews_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'acf_field' => '',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = 'Not available.';
	$reviews = get_field($atts['acf_field']);
	if($atts['acf_field'] && $reviews):
		$revStart =  '[fusion_testimonials design="clean" navigation="no" speed="" backgroundcolor="rgba(0,0,0,0)" textcolor="#ffffff" random="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="testimonials-height-fix" id=""]';
		$revEnd = '[/fusion_testimonials]';
		$revBody = '';
		foreach ($reviews as $review):
			$revBody .= '[fusion_testimonial name="'.$review['author'].'" avatar="none" image="" image_id="" image_border_radius="" company="" link="" target="_self"]'.$review['review'].'[/fusion_testimonial]';
		endforeach;
		ob_start(); ?>
			<div id="<?php echo $atts['id']; ?>" class="aa-front-reviews <?php echo $atts['class']; ?>">
				<?php echo do_shortcode($revStart.$revBody.$revEnd); ?>
			</div>
		<?php $return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_template_reviews', 'aa_template_reviews_func' );
function aa_fusion_element_template_reviews() {
	$params = array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Review Toggles Field Name', 'fusion-builder' ),
			'param_name'	=> 'acf_field',
		),
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
		'name'            => esc_attr__( 'Template Reviews (Admin Only)', 'fusion-builder' ),
		'shortcode'       => 'aa_template_reviews',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/template_reviews-preview.php',
		'preview_id'      => 'fusion-builder-block-module-template_reviews-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_template_reviews' );


/****
** Template Listings
****/
function aa_template_listings_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'acf_field' => '',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = 'Not available.';
	$widget = get_field($atts['acf_field']);
	if($atts['acf_field'] && $widget):
		ob_start();
		echo do_shortcode('[ar_idx widget="'.$widget.'" class="'.$atts['class'].'" id="'.$atts['id'].'" /]');
		$return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_template_listings', 'aa_template_listings_func' );
function aa_fusion_element_template_listings() {
	$params = array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Widget Field Name', 'fusion-builder' ),
			'param_name'	=> 'acf_field',
		),
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
		'name'            => esc_attr__( 'Template Listings (Admin Only)', 'fusion-builder' ),
		'shortcode'       => 'aa_template_listings',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/template_listings-preview.php',
		'preview_id'      => 'fusion-builder-block-module-template_listings-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_template_listings' );






