<?php 
/****
** Front Page Areas
****/
function aa_front_areas_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = "<p>Element available for home page only</p>";
	$count = '-1';
	$cols = '3';
	if(is_front_page()):
		if(get_field('home_areas_cols')):
			$cols = get_field('home_areas_cols');
		endif;
		if(get_field('home_areas_count')):
			$count = get_field('home_areas_count');
		endif;

		$areasDisplay = '[fusion_portfolio layout="grid" picture_size="auto" text_layout="unboxed" grid_box_color="" grid_element_color="" grid_separator_style_type="" grid_separator_color="" columns="'.$cols.'" column_spacing="0" portfolio_masonry_grid_ratio="" portfolio_masonry_width_double="" one_column_text_position="below" equal_heights="yes" number_posts="'.$count.'" portfolio_title_display="title" portfolio_text_alignment="center" padding_top="" padding_right="" padding_bottom="" padding_left="" filters="no" pull_by="category" cat_slug="" exclude_cats="" tag_slug="" exclude_tags="" pagination_type="none" hide_url_params="on" offset="0" orderby="menu_order" order="ASC" content_length="no_text" excerpt_length="0" strip_html="yes" carousel_layout="title_on_rollover" scroll_items="" autoplay="no" show_nav="yes" mouse_scroll="no" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" /]';
		ob_start(); ?>
			<div id="<?php echo $atts['id']; ?>" class="aa-front-areas <?php echo $atts['class']; ?>">
				<?php echo do_shortcode($areasDisplay); ?>
			</div>
		<?php $return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_front_areas', 'aa_front_areas_func' );
function aa_fusion_element_front_areas() {
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
		'name'            => esc_attr__( 'Template FP Areas (Admin Only)', 'fusion-builder' ),
		'shortcode'       => 'aa_front_areas',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/front_page_areas-preview.php',
		'preview_id'      => 'fusion-builder-block-module-front_page_areas-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_front_areas' );