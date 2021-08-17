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

/****
** Market Areas WS + Schools 
****/
$GLOBALS['marketschoolscount'] = 1;
function aa_display_schools($locationField = 'market_location') {
	$location = get_field($locationField);
	$address = urlencode($location['address']);
	$lat = $location['lat'];
	$lng = $location['lng'];
	$blockStart = 'aaSchools_'.get_the_ID().'-';
	$blockName = $blockStart.(string)$GLOBALS['marketschoolscount'];
	$jsUnique = '_'.get_the_ID().'_'.(string)$GLOBALS['marketschoolscount'];
	ob_start(); ?>
	<div class='aa-schools-widget'>
		<div id='<?php echo $blockName;?>'></div>
		<script type="text/javascript">var _gsreq = new XMLHttpRequest();var _gsid = new Date().getTime();_gsreq.open("GET", "https://www.google-analytics.com/collect?v=1&tid=UA-54676320-1&cid="+_gsid+"&t=event&ec=widget&ea=loaded&el="+window.location.hostname+"&cs=widget&cm=web&cn=widget&cm1=1&ni=1");_gsreq.send();</script>
		<script>jQuery(document).ready(function($){
			var s_lat<?php echo $jsUnique; ?> = '<?php echo $lat; ?>';
			var s_lng<?php echo $jsUnique; ?> = '<?php echo $lng; ?>';
			var s_normAddress<?php echo $jsUnique; ?> = '<?php echo $address; ?>';
			var s_schoolsWidth<?php echo $jsUnique; ?> = $('#<?php echo $blockName;?>').width();
			var s_schoolsFrame<?php echo $jsUnique; ?> = '<iframe className="greatschools" src="//www.greatschools.org/widget/map?textColor=0066B8&borderColor=FFCC66&lat='+s_lat<?php echo $jsUnique; ?>+'&lon='+s_lng<?php echo $jsUnique; ?>+'&normalizedAddress='+s_normAddress<?php echo $jsUnique; ?>+'&height=500&zoom=13&width='+s_schoolsWidth<?php echo $jsUnique; ?>+'" style="width:100%" height="500" marginHeight="0" marginWidth="0" frameBorder="0" scrolling="no"></iframe>';
			$('#<?php echo $blockName;?>').html(s_schoolsFrame<?php echo $jsUnique; ?>);
			
			$( window ).resize(function() {
				var lat<?php echo $jsUnique; ?> = '<?php echo $lat; ?>';
				var lng<?php echo $jsUnique; ?> = '<?php echo $lng; ?>';
				var normAddress<?php echo $jsUnique; ?> = '<?php echo $address; ?>';
				var schoolsWidth<?php echo $jsUnique; ?> = $('#<?php echo $blockName;?>').width();
				var schoolsFrame<?php echo $jsUnique; ?> = '<iframe className="greatschools" src="//www.greatschools.org/widget/map?textColor=0066B8&borderColor=FFCC66&lat='+lat<?php echo $jsUnique; ?>+'&lon='+lng<?php echo $jsUnique; ?>+'&normalizedAddress='+normAddress<?php echo $jsUnique; ?>+'&height=500&zoom=13&width='+schoolsWidth<?php echo $jsUnique; ?>+'" style="width:100%" height="500" marginHeight="0" marginWidth="0" frameBorder="0" scrolling="no"></iframe>';
				$('#<?php echo $blockName;?>').html(schoolsFrame<?php echo $jsUnique; ?>);
			});
		});</script>
	</div>
	<?php $GLOBALS['marketschoolscount']++;
	return ob_get_clean();
}
$GLOBALS['marketwalkscorecount'] = 1;
function aa_display_walkscore($locationField = 'market_location') {
	$blockStart = 'arWalkscore_'.get_the_ID().'-';
	$blockName = $blockStart.(string)$GLOBALS['marketwalkscorecount'];
	$ws_location = get_field($locationField);
	$street = $ws_location['address']; 
	ob_start(); ?>
	<div class="aa-walkscore-widget">
		<script type='text/javascript'>
			var ws_wsid = '<?php echo AA_WALKSCORE_API_KEY; ?>';
			var ws_address = '<?php echo $street; ?>';
			var ws_format = 'wide';
			var ws_width = '100%';
			var ws_height = '620';
			var ws_div_id = '<?php echo $blockName; ?>';
		</script>
		<style type='text/css'>#<?php echo $blockName; ?>{position:relative;text-align:left}#<?php echo $blockName; ?> *{float:none;}</style>
		<div id='<?php echo $blockName; ?>'></div>
		<script type='text/javascript' src='https://www.walkscore.com/tile/show-walkscore-tile.php'></script>
	</div>
	<?php $GLOBALS['marketwalkscorecount']++;
	return ob_get_clean();
}
function aa_market_ws_schools_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'type' => 'both',
			'cols' => 'two',
			'first' => 'schools',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$return = "<p>Element available for market area template only</p>";
	if(is_singular('avada_portfolio')):
		ob_start(); 
		$colClass = 'col-sm-12';
		if($atts['cols'] == 'two') :
			$colClass .= ' col-md-6';
		endif; ?>
		<div id="<?php echo $atts['id']; ?>" class="aa-market-ws-schools <?php echo $atts['class']; ?>">
			<div class="row">
				<?php if($atts['type'] == 'both'):
					if($atts['first'] == 'schools'): ?>
						<div class="aa-market-schools <?php echo $colClass; ?>" >
							<h4><?php echo get_the_title(); ?> Schools</h4>
							<?php echo aa_display_schools('market_location'); ?>
						</div>
						<div class="aa-market-walkscore <?php echo $colClass; ?>" >
							<?php echo aa_display_walkscore('market_location'); ?>
						</div>
					<?php elseif($atts['first'] == 'walkscore'): ?>
						<div class="aa-market-walkscore <?php echo $colClass; ?>" >
							<?php echo aa_display_walkscore('market_location'); ?>
						</div>
						<div class="aa-market-schools <?php echo $colClass; ?>" >
							<h4><?php echo get_the_title(); ?>Local Schools</h4>
							<?php echo aa_display_schools('market_location'); ?>
						</div>
					<?php endif;
				elseif($atts['type'] == 'schools'): ?>
					<div class="aa-market-schools <?php echo $colClass; ?>" >
						<?php echo aa_display_schools('market_location'); ?>
					</div>
				<?php elseif($atts['type'] == 'walkscore'): ?>
					<div class="aa-market-walkscore <?php echo $colClass; ?>" >
						<?php echo aa_display_walkscore('market_location'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php $return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_market_ws_schools', 'aa_market_ws_schools_func' );
function aa_fusion_element_market_ws_schools() {
	$params = array(
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'Walkscore or Schools?', 'fusion-builder' ),
			'param_name'	=>	'type',
			'value'			=>	array(
				'both'		=>	esc_attr__( 'Both (default)', 'fusion-builder' ),
				'schools'	=>	esc_attr__( 'Schools', 'fusion-builder' ),
				'walkscore'	=>	esc_attr__( 'Walkscore', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'How Many Columns?', 'fusion-builder' ),
			'param_name'	=>	'cols',
			'value'			=>	array(
				'two'		=>	esc_attr__( 'Two (default)', 'fusion-builder' ),
				'one'		=>	esc_attr__( 'One', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'If both, which first?', 'fusion-builder' ),
			'param_name'	=>	'first',
			'value'			=>	array(
				'schools'	=>	esc_attr__( 'Schools (default)', 'fusion-builder' ),
				'walkscore'	=>	esc_attr__( 'Walkscore', 'fusion-builder' ),
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
		'name'            => esc_attr__( 'Market WS + Schools', 'fusion-builder' ),
		'shortcode'       => 'aa_market_ws_schools',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/market_ws_schools-preview.php',
		'preview_id'      => 'fusion-builder-block-module-market_ws_schools-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_market_ws_schools' );

/****
** Market Areas Businesses
****/
function aa_yelp_display($cols = '4', $locationField = 'market_yelp', $limit = '8', $sort = '0', $term) {
	$location = get_field($locationField);
	return '<div class="ar_yelp ar_yelp_cols'.$cols.'">'.do_shortcode('[fusion_widget type="Yelp_Widget" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" fusion_display_title="no" fusion_padding_color="0" fusion_margin="0" fusion_bg_color="rgba(0,0,0,0)" fusion_bg_radius_size="" fusion_border_size="0" fusion_border_style="solid" fusion_border_color="" fusion_divider_color="" fusion_align="" fusion_align_mobile="" yelp_widget__title="" yelp_widget__display_option="" yelp_widget__term="'.$term.'" yelp_widget__location="'.$location.'" yelp_widget__limit="'.$limit.'" yelp_widget__sort="'.$sort.'" yelp_widget__id="" yelp_widget__display_reviews="1" yelp_widget__profile_img_size="100x100" yelp_widget__display_address="1" yelp_widget__display_phone="1" yelp_widget__disable_title_output="1" yelp_widget__target_blank="1" yelp_widget__no_follow="1" yelp_widget__cache="1 Day" /]').'</div>';
}
function aa_market_yelp_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'cols' => '4',
			'limit' => '8',
			'sort' => '0',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$locationField = 'market_yelp';
	$tabs = array(
		array(
			'title' => 'Dining',
			'icon' => 'fa-taco fas',
			'term' => 'Restaurant',
		),
		array(
			'title' => 'Nightlife',
			'icon' => 'fa-glass-whiskey-rocks fal',
			'term' => 'Bar',
		),
		array(
			'title' => "Groceries",
			'icon' => "fa-shopping-basket fal",
			'term' => 'Groceries',
		),
		array(
			'title' => "Coffee",
			'icon' => "fa-coffee-togo fal",
			'term' => 'Coffee Shop',
		),
		array(
			'title' => "Gym",
			'icon' => "fa-dumbbell fal",
			'term' => 'Gym',
		),
		array(
			'title' => "Pet",
			'icon' => "fa-paw-alt fal",
			'term' => 'Pet',
		),
	);
	$return = "<p>Element available for market area template only</p>";
	if(is_singular('avada_portfolio')):
		ob_start(); 
		$tabsStart = '[fusion_tabs design="clean" layout="horizontal" justified="yes" backgroundcolor="" inactivecolor="" bordercolor="" icon="" icon_position="" icon_size="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';
		$tabsEnd = '[/fusion_tabs]';
		$tabsBody = '';
		foreach ($tabs as $tab):
			$tabsBody .= '[fusion_tab title="'.$tab['title'].'" icon="'.$tab['icon'].'"]'.aa_yelp_display($atts['cols'], $locationField, $atts['limit'], $atts['sort'], $tab['term']).'[/fusion_tab]';
		endforeach; ?>
		<div id="<?php echo $atts['id']; ?>" class="aa-market-yelp <?php echo $atts['class']; ?>">
			<?php echo do_shortcode($tabsStart.$tabsBody.$tabsEnd); ?>
		</div>
		<?php $return = ob_get_clean();
	endif;
	return $return;
}
add_shortcode( 'aa_market_yelp', 'aa_market_yelp_func' );
function aa_fusion_element_market_yelp() {
	$params = array(
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'Number of Items', 'fusion-builder' ),
			'description' => esc_attr__( 'Max number of items to display', 'fusion-builder' ),
			'param_name'  => 'limit',
			'value'       => '8',
			'min'         => '1',
			'max'         => '10',
			'step'        => '1',
		),
		array(
			'type'			=>	'select',
			'heading'		=>	esc_attr__( 'Sort By', 'fusion-builder' ),
			'param_name'	=>	'sort',
			'value'			=>	array(
				'0'			=>	esc_attr__( 'Best Match (default)', 'fusion-builder' ),
				'1'			=>	esc_attr__( 'Distance', 'fusion-builder' ),
				'2'			=>	esc_attr__( 'Highest Rated', 'fusion-builder' ),
			),
		),
		array(
			'type'			=>	'radio_button_set',
			'heading'		=>	esc_attr__( 'How Many Columns?', 'fusion-builder' ),
			'param_name'	=>	'cols',
			'value'			=>	array(
				'1'			=>	esc_attr__( '1', 'fusion-builder' ),
				'2'			=>	esc_attr__( '2', 'fusion-builder' ),
				'3'			=>	esc_attr__( '3', 'fusion-builder' ),
				'4'			=>	esc_attr__( '4 (default)', 'fusion-builder' ),
				'5'			=>	esc_attr__( '5', 'fusion-builder' ),
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
		'name'            => esc_attr__( 'Market Area Businesses', 'fusion-builder' ),
		'shortcode'       => 'aa_market_yelp',
		'icon'            => 'far fa-radiation-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/market_yelp-preview.php',
		'preview_id'      => 'fusion-builder-block-module-market_yelp-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'aa_fusion_element_market_yelp' );

