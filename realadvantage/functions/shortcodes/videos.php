<?php //video posts display

function ar_video_gallery_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'columns' => '3',
			'spacing' => '10',
			'per' => '-1',
			'cats' => '',
			'orderby' => 'date',
			'order' => 'DESC',
			'title' => '0',
			'link' => '0',
			'class' => '',
			'id' => '',
		),
		$atts
	);
	if (strpos($atts['cats'], ',') !== false) {
    	$categories = explode(',', $atts['cats']);;
	}else {
		$categories = $atts['cats'];
	}
	$cols = (int)$atts['columns'];
	$colClass = '';
	switch($cols) {
		case 6:
			$colClass = 'fusion-one-sixth';
			break;
		case 5:
			$colClass = 'fusion-one-fifth';
			break;
		case 4:
			$colClass = 'fusion-one-fourth';
			break;
		case 3:
			$colClass = 'fusion-one-third';
			break;
		case 2:
			$colClass = 'fusion-one-half';
			break;
		default:
			$colClass = 'fusion-one-full';
	}
	$args = array(
		'post_type' => 'ar_videos',
		'order' => $atts['order'],
		'orderby' => $atts['orderby'],
		'posts_per_page' => $atts['per'],
	);
	if($atts['cats']) {
		$args['tax_query'] = array(
        	array(
            	'taxonomy' => 'gallery',
            	'field'    => 'slug',
            	'terms'    => $categories,
        	),
    	);
	}
	$vids = new WP_Query($args);
	ob_start(); 
		if($atts['spacing']) :
			$spacing = (int)$atts['spacing']/2;
			$padding = $spacing.'px';
			$margin = '-'.$spacing.'px';
		else:
			$padding = '0';
			$margin= '0';
		endif; ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-video-gallery <?php echo $atts['class'];?>" style="margin: 0 <?php echo $margin; ?>;">
			<?php if ($vids->have_posts()) :
				$count = 0;
				$max = $cols;
				while ($vids->have_posts()) : $vids->the_post(); 
					$count = $count%$max;
					if($count == 0) : ?>
						<div class="fusion-clearfix">
					<?php endif; ?>
							<div class="<?php echo $colClass; ?> fusion-layout-column ar-videoWrap" style="padding: 0 <?php echo $padding; ?>; padding-bottom: <?php echo $padding; ?>;">
								<div class="ar-video">
									<?php if(get_field('type') == 'youtube') :
										echo do_shortcode('[ar_video_embed type="'.get_field('type').'" vid="'.get_field('youtube_vid').'" autoplay="false" class="" id=""]');
									elseif(get_field('type') == 'vimeo') :
										echo do_shortcode('[ar_video_embed type="'.get_field('type').'" vid="'.get_field('vimeo_vid').'" autoplay="false" class="" id=""]');
									else :
										if(have_rows('self_files')) :
											while(have_rows('self_files')) : the_row();
												$ar_poster = get_sub_field('poster');
												$ar_srcs = array();
												if(get_sub_field('mp4')) :
													$ar_srcs['mp4'] = get_sub_field('mp4');
												endif;
												if(get_sub_field('ogv')):
													$ar_srcs['ogv'] = get_sub_field('ogv');
												endif;
												if(get_sub_field('webm')):
													$ar_srcs['webm'] = get_sub_field('webm');
												endif;
												$ar_src = '';
												if(count($ar_srcs == 1)) :
													$ar_src = 'src="'.$ar_srcs[0].'"';
												else :
													foreach($ar_srcs as $key => $value) {
														$ar_src .= $key.'="'.$value.'" ';
													}
												endif;
											endwhile;
											echo do_shortcode('[video '.$ar_src.' poster="'.$ar_poster.'"]');
										else:
											echo '<p>No Video Found</p>';
										endif;
									endif; ?>
								</div>
								<?php if($atts['title'] == 'true') : ?>
									<div class="ar-video-title">
										<h6>
											<?php if($atts['link'] == 'true'): ?>
												<a href="<?php the_permalink(); ?>">
											<?php endif; ?>
													<?php the_title(); ?>
											<?php if($atts['link']): ?>
												</a>
											<?php endif; ?>
										</h6>
									</div>
								<?php endif; ?>
							</div>
					<?php $count++;
					if($count == $max) : ?>
						</div>
					<?php endif;
				endwhile;
				if($count!= $max) : ?>
						</div>
				<?php endif;
			else :
				echo '<p style="text-align:center;">No Videos Found</p>';
			endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_video_gallery', 'ar_video_gallery_func' );
function ar_fusion_element_video_gallery() {
	$test = fusion_builder_shortcodes_categories( 'gallery', true, esc_attr__( 'All', 'fusion-builder' ) );
	$params = array(
		array(
			'type'			=> 'range',
			'heading'		=> esc_attr__( 'Number of Columns', 'fusion-builder' ),
			'param_name'	=> 'columns',
			'value'			=> '3',
			'min'			=> '1',
			'max'			=> '6',
			'step'			=> '1',
		),
		array(
			'type'			=> 'range',
			'heading'		=> esc_attr__( 'Column Spacing', 'fusion-builder' ),
			'param_name'	=> 'spacing',
			'value'			=> '10',
			'min'			=> '0',
			'max'			=> '100',
			'step'			=> '1',
		),
		array(
			'type'			=> 'range',
			'heading'		=> esc_attr__( 'Number of Videos', 'fusion-builder' ),
			'description'	=> esc_attr__( 'Maximum number of videos to display. Set to -1 to display all.', 'fusion-builder' ),
			'param_name'	=> 'per',
			'value'			=> '-1',
			'min'			=> '-1',
			'max'			=> '50',
			'step'			=> '1',
		),
		array(
			//'type'			=> 'multiple_select',
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Categories to Display', 'fusion-builder' ),
			'description'	=> esc_attr__( 'Enter the category slugs separated by commas. Ex: vlog, tours', 'fusion-builder' ),
			'param_name'	=> 'cats',
			//'value'			=> $test,
			'value'			=> '',
		),
		array(
			'type'			=> 'select',
			'heading'		=> esc_attr__( 'Order By', 'fusion-builder' ),
			'param_name'	=> 'orderby',
			'value'			=> array(
				'date'			=> 'Date',
				'title'			=> 'Title',
				'menu_order'	=> 'Videos Order',
				'name'			=> 'Post Slug',
				'modified'		=> 'Last Modified Date',
				'rand'			=> 'Random',
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Order', 'fusion-builder' ),
			'param_name'  => 'order',
			'value'       => array(
				'DESC'    => esc_attr__( 'Descending', 'fusion-builder' ),
				'ASC'    => esc_attr__( 'Ascending', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show Title Below Video?', 'fusion-builder' ),
			'param_name'  => 'title',
			'value'       => array(
				'true'    => esc_attr__( 'Yes', 'fusion-builder' ),
				'false'    => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Link Title to Post?', 'fusion-builder' ),
			'param_name'  => 'link',
			'value'       => array(
				'true'    => esc_attr__( 'Yes', 'fusion-builder' ),
				'false'    => esc_attr__( 'No', 'fusion-builder' ),
			),
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
		'name'            => esc_attr__( 'Video Posts', 'fusion-builder' ),
		'shortcode'       => 'ar_video_gallery',
		'icon'            => 'fa fa-video',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/video_gallery-preview.php',
		'preview_id'      => 'fusion-builder-block-module-video_gallery-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	); 
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_video_gallery' );

function ar_get_video_cats() {
	$terms = get_terms( array(
    	'taxonomy' => 'ar_vid_cat',
    	'hide_empty' => true,
    	'orderby' 	=> 'name',
    	'order'		=> 'ASC',
	));
	$options = array();
	foreach ($terms as $term) {
		$key = $term->slug;
		$value = $term->name;
		$options["$key"] = esc_attr__($value, 'fusion-builder' );
	}
	return $options;
}