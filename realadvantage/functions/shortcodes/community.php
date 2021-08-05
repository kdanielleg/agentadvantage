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
			'st'	=> get_field('ar_state_abv','option'),
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
	$state_abv = $atts['st'];
	if($state_abv == '0') {
		$state_abv = get_field('ar_state_abv','option');
	}
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
	$stDefault = ar_st_array();
	$stDefault['0'] = 'Default ('.get_field('ar_state_abv','option').')';
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
			'type'			=>	'select',
			'heading'		=>	esc_attr__( 'State (2 Letter)', 'fusion-builder' ),
			'description'	=>	esc_attr__( 'Choose 2 letter capital state abreviation or leave default theme value.', 'fusion-builder' ),
			'param_name'	=>	'st',
			'value'			=>	$stDefault,
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

/****
** [ar_walkscore]
****/
$GLOBALS['walkscorecount'] = 1;
function ar_walkscore_func($atts) {
	$atts = shortcode_atts(
		array(
			'option'	=> 'yes',
			'address'	=> '',
			'class'		=> '',
			'id'		=> '',
		),
		$atts
	);
	$blockStart = 'arWalkscore_'.get_the_ID().'-';
	$blockName = $blockStart.(string)$GLOBALS['walkscorecount'];
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class='ar-walkscore <?php echo $atts['class']; ?>'>
			<?php if(get_field('location')||($atts['option']=='no' && $atts['address'])) :
				$ws_location = get_field('location');
				if($atts['option']=='yes') :
					$street = $ws_location['address']; 
				else :
					$street = $atts['address'];
				endif; ?>
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
			<?php else : ?>
				<p>No location found</p>
			<?php endif; ?>
		</div>
		<?php $GLOBALS['walkscorecount']++;
	return ob_get_clean();
}
add_shortcode( 'ar_walkscore', 'ar_walkscore_func' );
function ar_fusion_element_walkscore() {
	$params = array(
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Use Page option for Location', 'fusion-builder' ),
			'param_name'  => 'option',
			'value'		  => array(
				'yes' => 'Yes (default)',
				'no'  => 'No',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Address', 'fusion-builder' ),
			'description' => 'Use only if "Yes" is selected above.',
			'param_name'  => 'address',
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
		'name'            => esc_attr__( 'Walkscore', 'fusion-builder' ),
		'shortcode'       => 'ar_walkscore',
		'icon'            => 'fas fa-walking',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/walkscore-preview.php',
		'preview_id'      => 'fusion-builder-block-module-walkscore-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_walkscore' );

/****
** [ar_schools]
****/
$GLOBALS['schoolscount'] = 1;
function get_lat_long($address){
    $address = str_replace(" ", "+", $address);
    $gmaps = "https://maps.google.com/maps/api/geocode/json?address=".$address."&key=".get_field('ar_gmap_key','option');

    $json = file_get_contents($gmaps);
    $json = json_decode($json);
    $atts = array(
    	'lat' => $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'},
    	'lng' => $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'},
    );
    return $atts;
}
function ar_schools_func($atts) {
	$atts = shortcode_atts(
		array(
			'option'	=> 'yes',
			'address'	=> '',
			'class'		=> '',
			'id'		=> '',
		),
		$atts
	);
	$blockStart = 'arSchools_'.get_the_ID().'-';
	$blockName = $blockStart.(string)$GLOBALS['schoolscount'];
	$jsUnique = '_'.get_the_ID().'_'.(string)$GLOBALS['schoolscount'];
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class='ar-schools-widget <?php echo $atts['class']; ?>'>
			<?php if(get_field('location')||($atts['option']=='no' && $atts['address'])):
				if($atts['option']=='no' && $atts['address']) :
					$location = get_lat_long($atts['address']);
					$address = urlencode($atts['address']);
					$lat = $location['lat'];
					$lng = $location['lng'];
				else :
					$location = get_field('location');
					$address = urlencode($location['address']);
					$lat = $location['lat'];
					$lng = $location['lng']; 
				endif; ?>
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
			<?php else : ?>
				<p>No location found</p>
			<?php endif; ?>
		</div>
	<?php $GLOBALS['schoolscount']++;
	return ob_get_clean();
}
add_shortcode( 'ar_schools', 'ar_schools_func' );
function ar_fusion_element_schools() {
	$params = array(
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Use Page option for Location', 'fusion-builder' ),
			'param_name'  => 'option',
			'value'		  => array(
				'yes' => 'Yes (default)',
				'no'  => 'No',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Address', 'fusion-builder' ),
			'description' => 'Use only if "Yes" is selected above.',
			'param_name'  => 'address',
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
		'name'            => esc_attr__( 'Schools Map', 'fusion-builder' ),
		'shortcode'       => 'ar_schools',
		'icon'            => 'fas fa-graduation-cap',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/schools-preview.php',
		'preview_id'      => 'fusion-builder-block-module-schools-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_schools' );

/**Combined Walkscore and Schools**/
function ar_schools_walkscore_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'option' => 'yes',
			'address' => '',
			'cols' => 'two',
			'first' => 'schools',
			'schools' => '',
			'walkscore' => '',
			'title'		=> 'h4',
			'class'		=> '',
			'id'		=> '',
		),
		$atts
	);
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class='arWalkscoreSchoolsWrap <?php echo $atts['class']; ?>'>
			<?php if(get_field('location')||($atts['option']=='no' && $atts['address'])): 
				$colClass = 'arWalkscoreSchools_column fusion-layout-column fusion-spacing-yes';
				if($atts['cols'] == 'two') {
					$colClass = 'fusion-one-half '.$colClass;
				}else {
					$colClass = 'fusion-one-full '.$colClass;
				}
				$colEndClass = $colClass.' fusion-column-last';
				if($atts['option']=='no' && $atts['address']) :
					$walkscore = '[ar_walkscore option="'.$atts['option'].'" address="'.$atts['address'].'" class="arWalkscoreSchools_walkscore"][/ar_walkscore]';
					$schools = '[ar_schools option="'.$atts['option'].'" address="'.$atts['address'].'" class="arWalkscoreSchools_schools"][/ar_schools]';
				else :
					$walkscore = '[ar_walkscore class="arWalkscoreSchools_walkscore"][/ar_walkscore]';
					$schools = '[ar_schools class="arWalkscoreSchools_schools"][/ar_schools]';
				endif;
				if($atts['walkscore']) {
					$walkscore = '<'.$atts['title'].'>'.$atts['walkscore'].'</'.$atts['title'].'>'.$walkscore;
				}
				if($atts['schools']) {
					$schools = '<'.$atts['title'].'>'.$atts['schools'].'</'.$atts['title'].'>'.$schools;
				}
				?>
				<div class="<?php echo $colClass; ?>">
					<?php if($atts['first']=='schools') :
						echo do_shortcode($schools);
					else :
						echo do_shortcode($walkscore);
					endif; ?>
				</div>
				<div class="<?php echo $colEndClass; ?>">
					<?php if($atts['first']=='walkscore') :
						echo do_shortcode($schools);
					else :
						echo do_shortcode($walkscore);
					endif; ?>
				</div>
			<?php else : ?>
				<p>No location found</p>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();

}
add_shortcode( 'ar_schools_walkscore', 'ar_schools_walkscore_func' );
function ar_fusion_element_schools_walkscore() {
	$params = array(
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Use Page option for Location', 'fusion-builder' ),
			'param_name'  => 'option',
			'value'		  => array(
				'yes' => 'Yes (default)',
				'no'  => 'No',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Address', 'fusion-builder' ),
			'description' => 'Use only if "Yes" is selected above.',
			'param_name'  => 'address',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'How Many Columns?', 'fusion-builder' ),
			'param_name'  => 'cols',
			'value'		  => array(
				'one' => 'One',
				'two'  => 'Two (default)',
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Which First?', 'fusion-builder' ),
			'param_name'  => 'first',
			'value'		  => array(
				'walkscore' => 'Walkscore',
				'schools'  => 'Schools (default)',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Schools Section Title', 'fusion-builder' ),
			'description' => 'Optional. Leave blank to remove',
			'param_name'  => 'schools',
			'value'		  => 'Local Schools',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Walkscore Section Title', 'fusion-builder' ),
			'description' => 'Optional. Leave blank to remove',
			'param_name'  => 'walkscore',
			'value'		  => 'Walkscore',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'What Size Title', 'fusion-builder' ),
			'param_name'  => 'title',
			'value'		  => array(
				'h1'	=> 'H1',
				'h2'	=> 'H2',
				'h3'	=> 'H3',
				'h4'	=> 'H4 (default)',
				'h5'	=> 'H5',
				'h6'	=> 'H6',
			),
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
		'name'            => esc_attr__( 'Schools + Walkscore', 'fusion-builder' ),
		'shortcode'       => 'ar_schools_walkscore',
		'icon'            => 'fas fa-graduation-cap',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/schools_walkscore-preview.php',
		'preview_id'      => 'fusion-builder-block-module-schools_walkscore-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_schools_walkscore' );



/*****
** [shortcode-weather-atlas city_selector="2338454" layout="horizontal" daily="5" background_color="#ffffff" text_color="#000000" style="text-shadow:none"]
*****/
if ( shortcode_exists( 'shortcode-weather-atlas' ) ) {
    function ar_fusion_element_weather_atlas() {
		$params = array(
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'City Selector Code', 'fusion-builder' ),
				'description'	=>	esc_attr__( 'Enter location ID from weather atlas widget.', 'fusion-builder' ),
				'param_name'	=>	'city_selector',
				'value'			=>	esc_attr__( '2338454', 'fusion-builder' ),
			),
			array(
				'type'			=>	'select',
				'heading'		=>	esc_attr__( 'Layout', 'fusion-builder' ),
				'param_name'	=>	'layout',
				'value'			=> array(
					'horizontal'	=>	esc_attr__( 'Horizontal', 'fusion-builder' ),
					'vertical'		=>	esc_attr__( 'Vertical', 'fusion-builder' ),
				),
			),
			array(
				'type'			=> 'range',
				'heading'		=> esc_attr__( 'How Many Days?', 'fusion-builder' ),
				'param_name'	=> 'daily',
				'value'			=> '5',
				'min'			=> '0',
				'max'			=> '5',
				'step'			=> '1',
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Background Color', 'fusion-builder' ),
				'param_name'	=>	'background_color',
				'value'			=>	esc_attr__( '#ffffff', 'fusion-builder' ),
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Text Color', 'fusion-builder' ),
				'param_name'	=>	'text_color',
				'value'			=>	esc_attr__( '#000000', 'fusion-builder' ),
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Style CSS', 'fusion-builder' ),
				'param_name'	=>	'style',
				'value'			=>	esc_attr__( 'text-shadow:none', 'fusion-builder' ),
			),
		);
		$args = array(
			'name'				=>	esc_attr__( 'Weather Widget', 'fusion-builder' ),
			'shortcode'			=>	'shortcode-weather-atlas',
			'icon'				=>	'fal fa-sun-cloud',
			'preview'			=>	get_stylesheet_directory().'/realadvantage/js/previews/weather_atlas-preview.php',
			'preview_id'		=>	'fusion-builder-block-module-weather_atlas-preview-template',
			'allow_generator'	=>	true,
			'params'			=>	$params,
		);

		fusion_builder_map($args);
	}
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_weather_atlas' );
}

/****
** [ar_expand]

[expand title="VIEW MORE FACTS" swaptitle="CLOSE MORE FACTS" trigclass="noarrow" targclass="maptastic" startwrap="<div class='moreFactsExpand'><h3><span>" endwrap="</span><br><i class='fal fa-chevron-down'></i></h3></div>"][/expand]
****/
if(shortcode_exists('expand')) :
	function ar_expand_func($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'title' => 'VIEW MORE FACTS',
				'swaptitle' => 'CLOSE MORE FACTS',
				'class'	=> '',
				'id'	=> '',
			),
			$atts
		);
		$shortContent = do_shortcode($content);
		ob_start(); ?>
			<style>.colomat-close .moreFactsExpand h3 i:before {content: "\f077";}</style>
			<div id="<?php echo $atts['id']; ?>" class='ar-expand-widget <?php echo $atts['class']; ?>'>
				<?php echo do_shortcode('[expand title="'.$atts['title'].'" swaptitle="'.$atts['swaptitle'].'" trigclass="noarrow" targclass="maptastic" startwrap="<div class=\'moreFactsExpand\'><h3><span>" endwrap="</span><br><i class=\'fal fa-chevron-down\'></i></h3></div>"]'.$shortContent.'[/expand]'); ?>
			</div>
		<?php return ob_get_clean();
	}
	add_shortcode( 'ar_expand', 'ar_expand_func' );


	function ar_fusion_element_expand() {
		$params = array(
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Closed Title', 'fusion-builder' ),
				'param_name'	=>	'title',
				'value'			=>	esc_attr__( 'VIEW MORE FACTS', 'fusion-builder' ),
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Open Title', 'fusion-builder' ),
				'param_name'	=>	'swaptitle',
				'value'			=>	esc_attr__( 'CLOSE MORE FACTS', 'fusion-builder' ),
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'CSS Class', 'fusion-builder' ),
				'param_name'	=>	'class',
				'value'			=>	'',
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'CSS ID', 'fusion-builder' ),
				'param_name'	=>	'style',
				'value'			=>	'',
			),
			array(
                'type'        => 'tinymce',
                'heading'     => esc_attr__( 'Content', 'fusion-builder' ),
                'description' => esc_attr__( 'Enter some content for this textblock.', 'fusion-builder' ),
                'param_name'  => 'element_content',
                'value'       => esc_attr__( 'Click edit button to change this text.', 'fusion-builder' ),
            ),
		);
		$args = array(
			'name'				=>	esc_attr__( 'Expand Section', 'fusion-builder' ),
			'shortcode'			=>	'ar_expand',
			'icon'				=>	'fal fa-chevron-down',
			'preview'			=>	get_stylesheet_directory().'/realadvantage/js/previews/expand-preview.php',
			'preview_id'		=>	'fusion-builder-block-module-expand-preview-template',
			'allow_generator'	=>	true,
			'params'			=>	$params,
		);

		fusion_builder_map($args);
	}
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_expand' );


	/**expand with toggles**/
	//parent
	function ar_expand_toggles_func( $atts , $content = null ) {
		$atts = shortcode_atts(
			array(
				'title' => 'VIEW MORE FACTS',
				'swaptitle' => 'CLOSE MORE FACTS',
				'class' => '',
				'id' => '',
			),
			$atts
		);
		$shortContent = do_shortcode('[fusion_accordion type="" boxed_mode="yes" border_size="1" border_color="" background_color="" hover_color="" divider_line="" title_font_size="1.2rem" icon_size="" icon_color="#a8a8a8" icon_boxed_mode="no" icon_box_color="" icon_alignment="right" toggle_hover_accent_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]'.$content.'[/fusion_accordion]');
		ob_start(); ?>
			<style>.colomat-close .moreFactsExpand h3 i:before {content: "\f077";}</style>
			<div id="<?php echo $atts['id']; ?>" class='ar-expand-widget <?php echo $atts['class']; ?>'>
				<?php echo do_shortcode('[expand title="'.$atts['title'].'" swaptitle="'.$atts['swaptitle'].'" trigclass="noarrow" targclass="maptastic" startwrap="<div class=\'moreFactsExpand\'><h3><span>" endwrap="</span><br><i class=\'fal fa-chevron-down\'></i></h3></div>"]'.$shortContent.'[/expand]'); ?>
			</div>
		<?php return ob_get_clean();

	}
	add_shortcode( 'ar_expand_toggles', 'ar_expand_toggles_func' );

	function ar_fusion_element_toggles() {
		$params = array(
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Closed Title', 'fusion-builder' ),
				'param_name'	=>	'title',
				'value'			=>	esc_attr__( 'VIEW MORE FACTS', 'fusion-builder' ),
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Open Title', 'fusion-builder' ),
				'param_name'	=>	'swaptitle',
				'value'			=>	esc_attr__( 'CLOSE MORE FACTS', 'fusion-builder' ),
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'CSS Class', 'fusion-builder' ),
				'param_name'	=>	'class',
				'value'			=>	'',
			),
			array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'CSS ID', 'fusion-builder' ),
				'param_name'	=>	'style',
				'value'			=>	'',
			),
			array(
                'type'        => 'tinymce',
                'heading'     => esc_attr__( 'Content', 'fusion-builder' ),
                'description' => esc_attr__( 'Enter some content for this contentbox.', 'fusion-builder' ),
                'param_name'  => 'element_content',
                'value'       => 'Default value',
            ),
		);
		$args = array(
			'name'				=>	esc_attr__( 'Expand Toggles', 'fusion-builder' ),
			'shortcode'			=>	'ar_expand_toggles',
			'multi'         	=> 'multi_element_parent',
        	'element_child' 	=> 'ar_expand_toggle',
			'icon'				=>	'fal fa-chevron-down',
			'preview'			=>	get_stylesheet_directory().'/realadvantage/js/previews/expand_toggles-preview.php',
			'preview_id'		=>	'fusion-builder-block-module-expand_toggles-preview-template',
			'allow_generator'	=>	true,
			'params'			=>	$params,
		);

		fusion_builder_map($args);
	}
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_toggles' );

	//child
	function ar_expand_toggle_func( $atts , $content = null ) {
		$atts = shortcode_atts(
			array(
				'title' => 'Enter Title Here',
			),
			$atts
		);
		$shortContent = do_shortcode($content);
		ob_start();
			echo do_shortcode('[fusion_toggle title="'.$atts['title'].'" open="no"]'.$shortContent.'[/fusion_toggle]');
		return ob_get_clean();
	}
	add_shortcode( 'ar_expand_toggle', 'ar_expand_toggle_func' );
	function ar_fusion_element_toggle() {
		$params = array(
        	array(
				'type'			=>	'textfield',
				'heading'		=>	esc_attr__( 'Title', 'fusion-builder' ),
				'param_name'	=>	'title',
				'value'			=>	esc_attr__( 'Enter Toggle Title Here', 'fusion-builder' ),
			),
            array(
               	'type'        => 'tinymce',
               	'heading'     => esc_attr__( 'Toggle Item Content', 'fusion-builder' ),
               	'description' => esc_attr__( 'Add toggle item content.', 'fusion-builder' ),
               	'param_name'  => 'element_content',
               	'value'       => 'Default value',
               	'placeholder' => true,
            ),
        );
        $args = array(
        	'name'              => esc_attr__( 'Expand Toggle', 'fusion-builder' ),
        	'shortcode'         => 'ar_expand_toggle',
        	'hide_from_builder' => true,
        	'params'            => $params,
    	);
    	fusion_builder_map($args);
	}
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_toggle' );

endif;


