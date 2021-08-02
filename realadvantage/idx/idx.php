<?php /**IDX Codes**/
//ADD FIELDS
require_once( get_stylesheet_directory() . '/realadvantage/idx/fields.php');

function ar_idx_wrapcodes_func(){ 
	ob_start();
	$theme = get_field('theme');
	if($theme != 'theme1' && $theme != 'idxCustom'): ?>
		<?php echo '<!-- AR IDX Global Styles'.$theme.'-->'; ?> 
		<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/global-css.php'; ?>
		<!-- AR IDX Global Theme Styles -->
		<style><?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/css/global.css'; ?></style>
		<!-- AR IDX Wrapper Start -->
		<div id="idxStart" style="display: none;"></div><div id="idxStop" style="display: none;"></div>
		<?php /**check for base page**/
		if(get_field('page')!='base') : ?>
			<!-- AR IDX Page JS -->
			<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/js/'.get_field('page').'_js.php'; ?>
			<!-- AR IDX Page Styles -->
			<style>
				<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/css/'.get_field('page').'.css'; ?>
			</style>
		<?php endif; ?>
		<?php /**MODALS**/
		if(get_field('ar_wrapcodes_modals','option')!='none') : ?>
			<!-- AR IDX Modals JS -->
			<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals_js.php'; ?>
			<!-- AR IDX Modals CSS -->
			<style>
				<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals.css'; ?>
			</style>
			<!-- AR IDX Modals Dynamic CSS -->
			<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals_dynamic_css.php'; ?>
		<?php endif; ?>
	<?php elseif($theme!='idxCustom') : ?>
		<!--Hide #IDX-main until loaded -->
		<style>#IDX-main, .avada-page-titlebar-wrapper{visibility:hidden!important;}</style>
		<?php echo '<!-- AR IDX Global Styles'.$theme.'-->'; ?> 
		<style>
			<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/global.css'; ?>
		</style>
		<!-- AR IDX Global Theme Styles -->
		<style>
			<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/css/global.css'; ?>
		</style>
		<!-- add Wait until exists -->
		<?php include get_stylesheet_directory().'/realadvantage/idx/js/wait_js.php'; ?>
		<!-- AR IDX Wrapper Start -->
		<div id="idxStart" style="display: none;"></div><div id="idxStop" style="display: none;"></div>
		<?php /**check for base page**/
		if(get_field('page')!='base') : ?>
			<!-- AR IDX Page JS -->
			<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/js/'.get_field('page').'_js.php'; ?>
			<!-- AR IDX Page Styles -->
			<style>
				<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/css/'.get_field('page').'.css'; ?>
			</style>
		<?php endif; ?>

		<?php /**MODALS**/
		if(get_field('ar_wrapcodes_modals','option')!='none') : ?>
			<!-- AR IDX Modals JS -->
			<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals_js.php'; ?>
			<!-- AR IDX Modals CSS -->
			<style>
				<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals.css'; ?>
			</style>
			<!-- AR IDX Modals Dynamic CSS -->
			<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals_dynamic_css.php'; ?>
		<?php endif; ?>
		<!-- Make #IDX-main Visible -->
		<script>
			jQuery(document).ready(function($){
				$('div#ar-idx-disclaimer').append($('div#IDX-thankYouWrapper + div'));
				$('#IDX-main, .avada-page-titlebar-wrapper').attr('style','visibility:visible!important;');
				$('#idxWrapDiv').remove();
			});
		</script>
	<?php else: 
		if(get_field('page')=='search') :
			arwc_search_intro_div();
		else: ?>
			<div id="arIDX-main">
		<?php endif; ?>
			<div id="idxStart" style="display: none;"></div><div id="idxStop" style="display: none;"></div>
		</div>
	<?php endif;
	$return = ob_get_clean();
	return;
}
add_shortcode( 'ar_idx_wrapcodes', 'ar_idx_wrapcodes_func' );

function ar_fusion_element_idx_wrapcodes() {
	$params = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Code Box Label', 'fusion-builder' ),
			'param_name'  => 'label',
		),
	);
	$args = array(
	  'name'            => esc_attr__( 'IDX Code', 'fusion-builder' ),
	  'shortcode'       => 'ar_idx_wrapcodes',
	  'icon'            => 'fas fa-code',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/idx_wrapcodes-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-idx_wrapcodes-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_idx_wrapcodes' );


//ADD THEMES
require_once( get_stylesheet_directory() . '/realadvantage/idx/themes/theme1/theme1.php');
require_once( get_stylesheet_directory() . '/realadvantage/idx/themes/idxCustom/idxCustom.php');

//theme fields function
function ar_wc_theme_fields($themes, $pageField, $themeField) {
	$groups = array();
	foreach($themes as $theme => $info) :
		$group = array(
			'key' => $info['key'],
			'label' => $info['name'].' Settings',
			'name' => 'settings_'.$theme,
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => $pageField,
						'operator' => '!=',
						'value' => 'none',
					),
					array(
						'field' => $pageField,
						'operator' => '!=',
						'value' => 'base',
					),
					array(
						'field' => $themeField,
						'operator' => '==',
						'value' => $theme,
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
		);
		$subArr = $info['sections'];
		$subs = array();
		foreach($subArr as $section => $fields):
			$subs[] = array(
				'key' => $fields['key'],
				'label' => $fields['label'].' Page(s) Settings',
				'name' => $section,
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => $pageField,
							'operator' => '==',
							'value' => $section,
						),
						array(
							'field' => $themeField,
							'operator' => '==',
							'value' => $theme,
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => $fields['fields'],
			);
		endforeach;
		$group['sub_fields'] = $subs;
		$groups[] = $group;
	endforeach;
	return $groups;
}

//disable yoast SEO entirely
//add_action('wp_head', 'ar_wc_remove_seo', 1);
function ar_wc_remove_seo() {
  if (is_singular('idx-wrapper')) {;
    remove_all_actions('wpseo_head');
  }
}

/**add HV autocomplete**/
add_action('wp_head','arwc_set_google_autocomplete');
function arwc_set_google_autocomplete(){
	$arwc_search_fields = array(
		'input#hvAddressAutocomplete',
	);
	?>
	<script>
		var arwc_ac_fields = '<?php echo implode(',' , $arwc_search_fields);?>';
	</script>
<?php }

/**add gmaps Icons**/
add_action('wp_head','arwc_set_gmaps_icon');
function arwc_set_gmaps_icon(){
	$arwc_map_icons = get_field('map_icons','option');
	?>
	<script>
		var arwc_maps_small_icon = "<?php echo $arwc_map_icons['small']; ?>";
		var arwc_maps_large_icon = "<?php echo $arwc_map_icons['large']; ?>";
	</script>
<?php }