<?php 

/****
** [ar_video_embed $atts...]
****/
function ar_video_embed_func( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'type' => 'youtube',
			'vid' => '',
			'autoplay' => '0',
			'bg' => 'false',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$autoplay = boolval($atts['autoplay']);
	$bg = boolval($atts['bg']);
	$vidClass = ($atts['bg']=='true') ? 'ar-responsive-video ar-responsive-video-bg bg-'.$bg : 'ar-responsive-video';
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="<?php echo $vidClass; ?> <?php echo $atts['class']; ?>">
			<?php if($atts['type']=='youtube') : ?>
				<?php if($bg): ?>
					<iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $atts['vid']; ?>?autoplay=<?php echo $atts['autoplay']; ?>&amp;loop=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;iv_load_policy=3&amp;mute=1&amp;playlist=<?php echo $atts['vid']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php else: ?>
					<iframe width="600" height="400" src="https://www.youtube.com/embed/<?php echo $atts['vid']; ?>?autoplay=<?php echo $atts['autoplay']; ?>&amp;modestbranding=1&amp;playsinline=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;iv_load_policy=3&amp;playlist=<?php echo $atts['vid']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php endif; ?>
			<?php elseif($atts['type']=='vimeo') : ?>
				<iframe width="600" height="400" src="//player.vimeo.com/video/<?php echo $atts['vid']; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=<?php echo $atts['autoplay']; ?>&amp;dnt=0&amp;muted=0" frameborder="0" allowfullscreen="true"></iframe>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_video_embed', 'ar_video_embed_func' );
function ar_fusion_element_video_embed() {
	$params = array(
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Video Type', 'fusion-builder' ),
			'param_name'  => 'type',
			'value'       => array(
				'youtube'   => esc_attr__( 'YouTube', 'fusion-builder' ),
				'vimeo'     => esc_attr__( 'Vimeo', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Video ID', 'fusion-builder' ),
			'description' => esc_attr__( 'Enter the alphanumeric code from your youtube or vimeo url.', 'fusion-builder' ),
			'param_name'  => 'vid',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Autoplay?', 'fusion-builder' ),
			'param_name'  => 'autoplay',
			'value'       => array(
				'true'    => esc_attr__( 'Yes', 'fusion-builder' ),
				'false'    => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Background Video Settings?', 'fusion-builder' ),
			'description' => esc_attr__( 'Make sure autoplay is set to yes above.', 'fusion-builder' ),
			'param_name'  => 'bg',
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
		'name'            => esc_attr__( 'Responsive Video', 'fusion-builder' ),
		'shortcode'       => 'ar_video_embed',
		'icon'            => 'fas fa-video',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/video_embed-preview.php',
		'preview_id'      => 'fusion-builder-block-module-video_embed-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_video_embed' );