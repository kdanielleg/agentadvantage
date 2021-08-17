<?php 

/****
** Market Areas Intro
****/
function aa_market_intro_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'plural' => '1',
			'mls' => 'Our MLS Board',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = "<p>Element available for market area template only</p>";
	if(is_singular('avada_portfolio')) :
		ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="aa-market-intro <?php echo $atts['class']; ?>">
			<?php if(get_field('market_intro_type') == 'custom') :
				echo do_shortcode(get_field('market_intro_custom'));
			else:
				$mls = $atts['mls'];
				$area  = get_the_title();
				$stateArr = get_field('market_state');
				$state = $stateArr['value'];
				$st = $stateArr['label'];
				if($atts['plural'] == '1')  :	?>
					<p>You found the right website if you are searching for <strong>homes for sale in <?php echo $area.', '.$st; ?></strong>. Our website has EVERY <strong><?php echo $area; ?> home for sale in <?php echo $state; ?></strong> listed with <?php echo $mls; ?>.</p>
					<p>Our goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize our <?php echo $area.', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding as possible.</p>
					<p>We utilize the latest, cutting-edge, real estate marketing tools to get your house aggressively marketed to sell as quickly as possible and for the best price! Our goals are to help you get your <?php echo $area.', '.$st; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
				<?php else: ?>
					<p>You found the right website if you are searching for <strong>homes for sale in <?php echo $area.', '.$st; ?></strong>. My website has EVERY <strong><?php echo $area; ?> home for sale in <?php echo $state; ?></strong> listed with <?php echo $mls; ?>.</p>
					<p>My goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize my <?php echo $area.', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding as possible.</p>
					<p>I utilize the latest, cutting-edge, real estate marketing tools to get your house aggressively marketed to sell as quickly as possible and for the best price! My goals are to help you get your <?php echo $area.', '.$st; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
				<?php endif;
			endif; ?>
		</div>
		<?php $return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_market_intro', 'aa_market_intro_func' );
function aa_fusion_element_market_intro() {
	$params = array(
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'Plural or Singular Pronouns?', 'fusion-builder' ),
			'param_name'	=>	'plural',
			'value'			=>	array(
				'1'	=>	esc_attr__( 'Plural (default)', 'fusion-builder' ),
				'0'	=>	esc_attr__( 'Singular', 'fusion-builder' ),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'MLS Board', 'fusion-builder' ),
			'param_name'	=> 'mls',
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
		'name'            => esc_attr__( 'Market Area Intro', 'fusion-builder' ),
		'shortcode'       => 'aa_market_intro',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/market_intro-preview.php',
		'preview_id'      => 'fusion-builder-block-module-market_intro-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_market_intro' );

/****
** Market Areas Listings
****/
function aa_market_listings_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = "<p>Element available for market area template only</p>";
	if(is_singular('avada_portfolio')):
		ob_start();
		echo do_shortcode('[ar_idx widget="'.get_field('market_widget').'" class="'.$atts['class'].'" id="'.$atts['id'].'" /]');
		$return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_market_listings', 'aa_market_listings_func' );
function aa_fusion_element_market_listings() {
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
		'name'            => esc_attr__( 'Market Area Listings', 'fusion-builder' ),
		'shortcode'       => 'aa_market_listings',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/market_listings-preview.php',
		'preview_id'      => 'fusion-builder-block-module-market_listings-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_market_listings' );


/****
** Market Areas Content
****/
function aa_market_content_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = "<p>Element available for market area template only</p>";
	if(is_singular('avada_portfolio')):
		ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="aa-market-content <?php echo $atts['class']; ?>">
			<?php if(get_field('market_content_type') == 'text'): ?>
				<div class="aa-market-content_text">
					<?php echo do_shortcode(get_field('market_content_text')); ?>
				</div>
			<?php elseif(get_field('market_content_type') == 'toggles'):
				$toggles = get_field('market_content_toggles');
				if($toggles):
					$accStart =  '[fusion_accordion type="" boxed_mode="" border_size="" border_color="" background_color="" hover_color="" divider_line="" title_font_size="" icon_size="" icon_color="" icon_boxed_mode="" icon_box_color="" icon_alignment="" toggle_hover_accent_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="aa-market-content_toggles" id=""]';
					$accEnd = '[/fusion_accordion]';
					$accBody = '';
					foreach ($toggles as $toggle):
						$accBody .= '[fusion_toggle title="'.$toggle['title'].'" open="no" class="" id=""]'.do_shortcode($toggle['content']).'[/fusion_toggle]';
					endforeach;
					echo do_shortcode($accStart.$accBody.$accEnd); 
				endif;
			endif; ?>
		</div>
		<?php $return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_market_content', 'aa_market_content_func' );
function aa_fusion_element_market_content() {
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
		'name'            => esc_attr__( 'Market Area Content', 'fusion-builder' ),
		'shortcode'       => 'aa_market_content',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/market_content-preview.php',
		'preview_id'      => 'fusion-builder-block-module-market_content-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_market_content' );

/****
** Market Areas Wikipedia Link
****/
function aa_market_wiki_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = "<p>Element available for market area template only</p>";
	if(is_singular('avada_portfolio') && get_field('market_wiki')):
		ob_start();
		echo do_shortcode('[fusion_button link="'.get_field('market_wiki').'" text_transform="none" title="" target="_self" link_attributes="" alignment_medium="" alignment_small="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" sticky_display="normal,sticky" class="'.$atts['class'].'" id="'.$atts['id'].'" color="custom" button_gradient_top_color="rgba(0,0,0,0)" button_gradient_bottom_color="rgba(0,0,0,0)" button_gradient_top_color_hover="rgba(0,0,0,0)" button_gradient_bottom_color_hover="rgba(0,0,0,0)" accent_color="#000000" accent_hover_color="#f37b20" type="flat" bevel_color="" border_width="0" border_radius="" border_color="rgba(0,0,0,0)" border_hover_color="rgba(0,0,0,0)" size="medium" stretch="no" margin_top="" margin_right="" margin_bottom="" margin_left="" icon="fa-link fal" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]Content Courtesy of Wikipedia.org[/fusion_button]');
		$return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_market_wiki', 'aa_market_wiki_func' );
function aa_fusion_element_market_wiki() {
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
		'name'            => esc_attr__( 'Market Area Wiki Link', 'fusion-builder' ),
		'shortcode'       => 'aa_market_wiki',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/market_wiki-preview.php',
		'preview_id'      => 'fusion-builder-block-module-market_wiki-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_market_wiki' );