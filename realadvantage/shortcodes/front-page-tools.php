<?php 

/****
** [ar_privacy $atts...]
****/
function aa_front_reviews_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = "<p>Element available for home page only</p>";
	$reviews = get_field('home_reviews');
	if(is_front_page() && $reviews):
		$revStart =  '[fusion_testimonials design="clean" navigation="no" speed="" backgroundcolor="rgba(0,0,0,0)" textcolor="#ffffff" random="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="testimonials-height-fix" id=""]';
		$revEnd = '[/fusion_testimonials]';
		$revBody = '';
		foreach ($reviews as $review):
			$revBody .= '[fusion_testimonial name="'.$reviews['author'].'" avatar="none" image="" image_id="" image_border_radius="" company="" link="" target="_self"]'.$review['review'].'[/fusion_testimonial]';
		endforeach;
		ob_start(); ?>
			<div id="<?php echo $atts['id']; ?>" class="aa-front-reviews <?php echo $atts['class']; ?>">
				<?php echo do_shortcode($revStart.$revBody.$revEnd); ?>
			</div>
		<?php $return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_front_reviews', 'aa_front_reviews_func' );
function aa_fusion_element_front_reviews() {
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
		'name'            => esc_attr__( 'Front Page Reviews', 'fusion-builder' ),
		'shortcode'       => 'aa_front_reviews',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/front_page_reviews-preview.php',
		'preview_id'      => 'fusion-builder-block-module-front_page_reviews-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_front_reviews' );
