<?php 


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