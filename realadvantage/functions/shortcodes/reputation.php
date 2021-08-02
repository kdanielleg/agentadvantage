<?php 
/****
** Reputation Shortcodes
**		& Fusion Elements
****/

/****
** [ar_reputation $atts...]
****/
function ar_reputation_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'type'		=> 'reviews',
			'key'		=> '',
			'version'	=> 'v4',
			'class'		=> '',
			'id'		=> '',
		),
		$atts
	);
	$key = $atts['key'];
	$version = 'v4';
	if($atts['version'] && $atts['version']!='' && $atts['version']!='0') {
		$version = $atts['version'];
	}
	ob_start(); ?>
	<div id="<?php echo $atts['id']; ?>" class="ar-reputation <?php echo $atts['class']; ?>">
		<?php switch($atts['type']) {
			case 'feedback':
				if(!$key) :
					$key = get_field('ar_feedback_id','option');
				endif;
				if(is_admin()) : ?>
					<div id="ar-admin-feedback-display">
				<?php endif; 
					switch($version) {
						case 'v1' :
							$remote = 'http://reputationdatabase.com/feedbacks/add_review/'.$key; ?>
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
							<script type="text/javascript" src="http://reputationdatabase.com/public/js/lib/easyXDM.js"></script>
							<div id="embedded" style="width:100%;height:100%; text-align: center;"></div>
							<script type="text/javascript">
								var transport = new easyXDM.Socket({
									remote: "<?php echo $remote; ?>",
									container: "embedded",
									onMessage: function(message, origin){
										this.container.getElementsByTagName("iframe")[0].style.height = message+ "px";
										this.container.getElementsByTagName("iframe")[0].scrolling="no";
										this.container.getElementsByTagName("iframe")[0].frameborder = 0;
									}
								});
							</script>
							<?php break;
						case 'v2':
							$remote = 'http://reputationdatabase.com/feedbacks/add_review/'.$key; ?>
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
							<script type="text/javascript" src="http://reputationdatabase.com/public/js/lib/easyXDM.js"></script>
							<div id="embedded" style="width:100%;height:100%; text-align: center;"></div>
							<script type="text/javascript">
								var transport = new easyXDM.Socket({
									remote: "<?php echo $remote; ?>",
									container: "embedded",
									onMessage: function(message, origin){
										this.container.getElementsByTagName("iframe")[0].style.height = message+ "px";
										this.container.getElementsByTagName("iframe")[0].scrolling="no";
										this.container.getElementsByTagName("iframe")[0].frameborder = 0;
									}
								});
							</script>
							<?php break;
						case 'v3':
							$remote = 'https://reputationdatabase.com/feedback/pages/add_review/'.$key; ?>
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
							<script type="text/javascript" src="//reputationdatabase.com/public/js/lib/easyXDM.js"></script>
							<div id="embedded" style="width:100%;height:100%; text-align: center;"></div>
							<script type="text/javascript">
								var p = navigator.platform;
								if( p === "iPad" || p === "iPhone" || p === "iPod" ){
									window.document.body.style.height = "auto";
								}
								var transport = new easyXDM.Socket({
									remote: "'.$remote.'",
									container: "embedded",
									onMessage: function(message, origin){
										var returnMessage = message.split("|");
										var command = returnMessage[0].split(":")[1];
										var value = returnMessage[1].split(":")[1];
										if(command=="height"){
											this.container.getElementsByTagName("iframe")[0].style.height = value+ "px";
											this.container.getElementsByTagName("iframe")[0].scrolling="no";
											this.container.getElementsByTagName("iframe")[0].frameborder = 0;
										}else if(command=="scrollToTop"){
											window.scroll(0,0);
										}
									}
								});
							</script>
							<?php break;
						default: ?>
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
							<iframe id="rk-page-<?php echo $key; ?>" name="rk-page-<?php echo $key; ?>" width="100%" height="100%" frameborder="0" data-origin="https://reputationdatabase.com" data-url="https://reputationdatabase.com/feedback/pages/add_review/<?php echo $key; ?>" src="" scrolling="no"></iframe>
							<script type="text/javascript" src="//reputationdatabase.com/public/js-new/libs/porthole.min.js"></script>
							<script type="text/javascript">
								var p=navigator.platform;
								var guestDomain;
								if (p==="iPad" || p==="iPhone" || p==="iPod"){
									window.document.body.style.height="auto";
								}
								function onRkMessage(messageEvent){
									if (messageEvent.origin==guestDomain){
										if (messageEvent.data["height"]){
											document.getElementById("rk-page-'.$id.'").style.height=messageEvent.data["height"]+"px";
										}
										if (messageEvent.data["scrollToTop"]){
											window.scroll(0,0);
										}
									}
								}
								var rkWindowProxy; 
								window.onload=function (){
									var iframe=document.getElementById("rk-page-<?php echo $key; ?>");
									var iframeUrl=iframe.dataset.url;
									var currentUrl=document.location.href;
									guestDomain=iframe.dataset.origin;
									var fullUrl=iframeUrl+"?rurl="+encodeURI(currentUrl);
									iframe.setAttribute("src", fullUrl);
									rkWindowProxy=new Porthole.WindowProxy(fullUrl,"rk-page-<?php echo $key; ?>");
									rkWindowProxy.addEventListener(onRkMessage);
								};
							</script>
					<?php }
				if(is_admin()) : ?>
					</div>
					<style>
						#ar-admin-feedback-display iframe {
							min-height: 800px;
						}
					</style>
				<?php endif; 
				break;
			case 'testimonials':
				if(!$key) :
					$key = get_field('ar_testimonials_id','option'); 
				endif; ?>
				<script type='text/javascript'>
					var _rk = '<?php echo $key; ?>'; 
					(function() { 
						var rk = document.createElement('script');
						rk.type = 'text/javascript'; rk.async = true;
						rk.src = '//reputationdatabase.com/website_marketing/widget/'+_rk;
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(rk, s);
					})();
				</script>
				<div class='<?php echo $key; ?>-widget RK-WebWidget'></div>
				<style>.RK-WebWidget .widget-div .widget-right p {margin-bottom: 0px!important;}.RK-WebWidget .mrkt-web-sidebar-preview{padding-left:0!important;padding-right:0!important;}</style>
				<?php break;
			default:
				if(!$key || $key == '') :
					$key = get_field('ar_reviews_id','option');
				endif; ?>
				<script type='text/javascript'>
					var _rk = '<?php echo $key; ?>';
					(function() {
						var rk = document.createElement('script');
						rk.type = 'text/javascript'; rk.async = true;
						rk.src = '//reputationdatabase.com/website_marketing/widget/'+_rk;
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(rk, s);
					})();
				</script>
				<div class='<?php echo $key; ?>-widget RK-WebWidget'></div>
				<style>.RK-WebWidget .widget-div .widget-right p {margin-bottom: 0px!important;}.RK-WebWidget .mrkt-web-sidebar-preview{padding-left:0!important;padding-right:0!important;}</style>
		<?php } ?>
	</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_reputation', 'ar_reputation_func' );
function ar_fusion_element_new_reputation() {
	$params = array(
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'What Should Display?', 'fusion-builder' ),
	    'param_name'  => 'type',
	    'value'       => array(
	  		'reviews'      => esc_attr__( 'Reviews', 'fusion-builder' ),
	  		'testimonials' => esc_attr__( 'Testimonials', 'fusion-builder' ),
	  		'feedback'     => esc_attr__( 'Feedback', 'fusion-builder' ),
	  	),
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Custom Key', 'fusion-builder' ),
	    'param_name'  => 'key',
	  ),
	  array(
	    'type'        => 'radio_button_set',
	    'heading'     => esc_attr__( 'Change version if needed', 'fusion-builder' ),
	    'param_name'  => 'version',
	    'value'       => array(
	    	'v4' => esc_attr__( 'Version 4 (default)', 'fusion-builder' ),
	  		'v3' => esc_attr__( 'Version 3', 'fusion-builder' ),
	  		'v2' => esc_attr__( 'Version 2', 'fusion-builder' ),
	  		'v1' => esc_attr__( 'Version 1', 'fusion-builder' ),
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
	  'name'            => esc_attr__( 'Agent Reputation', 'fusion-builder' ),
	  'shortcode'       => 'ar_reputation',
	  'icon'            => 'fas fa-comment-dots',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/reputation-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-reputation-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_new_reputation' );