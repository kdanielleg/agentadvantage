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
		<div id="<?php echo $atts['id']; ?>" class="aa-market intro <?php echo $atts['class']; ?>">
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
					<p>If you are a <?php echo $area.', '.$st; ?> home buyer, our foremost goal is to provide you with exceptional customer service. Our goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize our <?php echo $area.', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding for you and your family as possible.</p>
					<p>If you're considering selling your <?php echo $area.', '.$state; ?> home, we utilize the latest, cutting-edge, real estate marketing tools to expose your property to the widest range of potential buyers. We are here to get your house aggressively marketed to sell as quickly as possible and for the best price! Our goals are to help you get your <?php echo $area.', '.$st; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
				<?php else: ?>
					<p>You found the right website if you are searching for <strong>homes for sale in <?php echo $area.', '.$st; ?></strong>. My website has EVERY <strong><?php echo $area; ?> home for sale in <?php echo $state; ?></strong> listed with <?php echo $mls; ?>.</p>
					<p>If you are a <?php echo $area.', '.$st; ?> home buyer, my foremost goal is to provide you with exceptional customer service. My goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize my <?php echo $area.', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding for you and your family as possible.</p>
					<p>If you're considering selling your <?php echo $area.', '.$state; ?> home, I utilize the latest, cutting-edge, real estate marketing tools to expose your property to the widest range of potential buyers. I am here to get your house aggressively marketed to sell as quickly as possible and for the best price! My goals are to help you get your <?php echo $area.', '.$st; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
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