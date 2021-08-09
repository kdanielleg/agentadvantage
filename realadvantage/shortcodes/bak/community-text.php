<?php 
/****
** Community Shortcodes
**		& Fusion Elements
****/

/****
** [ar_community_text $atts...]
****/
function ar_community_text_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'type'	=> 'buy',
			'area'	=> 'Location',
			'state'	=> get_field('ar_state','option'),
			'mls'	=> get_field('ar_mls','option'),
			'team'	=> get_field('ar_default_team','option'),
			'class'	=> '',
			'id'	=> '',
			'align'	=> 'default',
		),
		$atts,
		'Community Text Blocks'
	);
	$type = $atts['type'];
	$area = $atts['area'];
	$state = $atts['state'];
	if($state == '0') {
		$state = get_field('ar_state','option');
	}
	$all_states = ar_state_to_st_array();
	$state_abv = $all_states[$state];
	$mls = $atts['mls'];
	if($mls == '0') {
		$mls = get_field('ar_mls','option');
	}
	if($atts['team']=='') :
		$team = get_field('ar_default_team','option');
	else :
		$team = $atts['team'];
	endif;
	$style = '';
	if($atts['align']=='1') {
		$style = 'text-align: left;';
	}elseif($atts['align']=='2') {
		$style = 'text-align: center;';
	}elseif($atts['align']=='3') {
		$style = 'text-align: right;';
	}
	ob_start(); ?>
		<div id="<?php echo $atts['id'];?>" class="ar-text-blurb <?php echo $atts['class'];?>" style="<?php echo $style; ?>">
			<?php if($team) :
				switch($atts['type']) {
					case 'buy': ?>
						<p>If you are a <?php echo $atts['area'].', '.$state_abv; ?> home buyer, our foremost goal is to provide you with exceptional customer service. Our goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize our <?php echo $atts['area'].', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding for you and your family as possible.</p>
						<?php break;
					case 'buy-short': ?>
						<p>Our goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize our <?php echo $atts['area'].', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding as possible.</p>
						<?php break;
					case 'sell': ?>
						<p>If you're considering selling your <?php echo $atts['area'].', '.$state; ?> home, we utilize the latest, cutting-edge, real estate marketing tools to expose your property to the widest range of potential buyers. We are here to get your house aggressively marketed to sell as quickly as possible and for the best price! Our goals are to help you get your <?php echo $atts['area'].', '.$state_abv; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
						<?php break;
					case 'sell-short': ?>
						<p>We utilize the latest, cutting-edge, real estate marketing tools to get your house aggressively marketed to sell as quickly as possible and for the best price! Our goals are to help you get your <?php echo $atts['area'].', '.$state_abv; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
						<?php break;
					default: ?>
						<p>You found the right website if you are searching for <strong>homes for sale in <?php echo $atts['area'].', '.$state_abv; ?></strong>. Our website has EVERY <strong><?php echo $atts['area']; ?> home for sale in <?php echo $state; ?></strong> listed with <?php echo $mls; ?>.</p>
				<?php }
			else:
				switch($atts['type']) {
					case 'buy': ?>
						<p>If you are a <?php echo $atts['area'].', '.$state_abv; ?> home buyer, my foremost goal is to provide you with exceptional customer service. My goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize my <?php echo $atts['area'].', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding for you and your family as possible.</p>
						<?php break;
					case 'buy-short': ?>
						<p>My goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize my <?php echo $atts['area'].', '.$state; ?> real estate expertise to make your home search and buying experience as stress free and rewarding as possible.</p>
						<?php break;
					case 'sell': ?>
						<p>If you're considering selling your <?php echo $atts['area'].', '.$state; ?> home, I utilize the latest, cutting-edge, real estate marketing tools to expose your property to the widest range of potential buyers. I am here to get your house aggressively marketed to sell as quickly as possible and for the best price! My goals are to help you get your <?php echo $atts['area'].', '.$state_abv; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
						<?php break;
					case 'sell-short': ?>
						<p>I utilize the latest, cutting-edge, real estate marketing tools to get your house aggressively marketed to sell as quickly as possible and for the best price! My goals are to help you get your <?php echo $atts['area'].', '.$state_abv; ?> home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
						<?php break;
					default: ?>
						<p>You found the right website if you are searching for <strong>homes for sale in <?php echo $atts['area'].', '.$state_abv; ?></strong>. My website has EVERY <strong><?php echo $atts['area']; ?> home for sale in <?php echo $state; ?></strong> listed with <?php echo $mls; ?>.</p>
				<?php }
			endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_community_text', 'ar_community_text_func' );
function ar_fusion_element_community_text() {
	$team = get_field('ar_default_team','option');
	if($team) {
		$teamDefault = 'Plural';
	}else {
		$teamDeafult = 'Singular';
	}
	$stateDefault = ar_state_array();
	$stateDefault['0'] = 'Default ('.get_field('ar_state','option').')';
	$params = array(
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'Location Name', 'fusion-builder' ),
			'description'	=>	esc_attr__( 'Enter location name to use in the text.', 'fusion-builder' ),
			'param_name'	=>	'area',
			'value'			=>	esc_attr__( 'Some Area', 'fusion-builder' ),
		),
		array(
			'type'			=>	'select',
			'heading'		=>	esc_attr__( 'Select Type', 'fusion-builder' ),
			'description'	=>	esc_attr__( 'Choose the type of text to display', 'fusion-builder' ),
			'param_name'	=>	'type',
			'value'			=> array(
				'intro'			=>	esc_attr__( 'Introduction', 'fusion-builder' ),
				'buy'			=>	esc_attr__( 'Buyers Text', 'fusion-builder' ),
				'buy-short'		=>	esc_attr__( 'Buyers Text Alt (short)', 'fusion-builder' ),
				'sell'			=>	esc_attr__( 'Sellers Text', 'fusion-builder' ),
				'sell-short'	=>	esc_attr__( 'Sellers Text Alt (short)', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'select',
			'heading'		=>	esc_attr__( 'State (Full)', 'fusion-builder' ),
			'description'	=>	esc_attr__( 'Choose full state name or leave default theme value.', 'fusion-builder' ),
			'param_name'	=>	'state',
			'value'			=>	$stateDefault,
		),
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'MLS', 'fusion-builder' ),
			'description'	=>	esc_attr__( 'Enter full mls name or leave default theme value.', 'fusion-builder' ),
			'param_name'	=>	'mls',
			'value'			=>	esc_attr__( get_field('ar_mls','option'), 'fusion-builder' ),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'Plural or Singular Pronouns?', 'fusion-builder' ),
			'param_name'	=>	'team',
			'value'			=>	array(
				''	=>	esc_attr__( 'Default ('.$teamDefault.')', 'fusion-builder' ),
				'1'	=>	esc_attr__( 'Plural', 'fusion-builder' ),
				'0'	=>	esc_attr__( 'Singualr', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'Text Alignment', 'fusion-builder' ),
			'param_name'	=>	'align',
			'value'			=>	array(
				'0'	=>	esc_attr__( 'Default (Text Flow)', 'fusion-builder' ),
				'1'		=>	esc_attr__( 'Left', 'fusion-builder' ),
				'2'	=>	esc_attr__( 'Center', 'fusion-builder' ),
				'3'		=>	esc_attr__( 'Right', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=>	'class',
			'value'			=>	'',
		),
		array(
			'type'			=>	'textfield',
			'heading'		=>	esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=>	'id',
			'value'			=>	'',
		),

	);
	$args = array(
		'name'						=>	esc_attr__( 'Community Text Blurb', 'fusion-builder' ),
		'shortcode'				=>	'ar_community_text',
		'icon'						=>	'fusiona-font',
		'preview'					=>	get_stylesheet_directory().'/realadvantage/js/previews/community-text-preview.php',
		'preview_id'			=>	'fusion-builder-block-module-community-text-preview-template',
		'allow_generator'	=>	true,
		'params'					=>	$params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_community_text' );

