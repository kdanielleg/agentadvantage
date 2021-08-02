<?php //reputation for builder 
$path = get_stylesheet_directory_uri().'/realadvantage/js/previews/img';

?>

<script type="text/template" id="fusion-builder-block-module-reputation-preview-template">
	<# 
	var path = '<?php echo $path; ?>';
	var displayType = 'Online Reviews';
	var image = path + '/reviews-preview.jpg';
	if(params.type == 'feedback') {
		displayType = 'Feedback Form';
		image = path + '/feedback-preview.jpg';
	} else if(params.type == 'testimonials') {
		displayType = 'Internal Testimonials';
		image = path + '/testimonials-preview.jpg';
	}
	#>
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}: {{displayType}} (Sample Preview)</h4>
	<div class="reputation-sample-image"><img src="{{image}}" style="width:100%;height:auto!important;max-width: 1031px;max-height:initial!important" /></div>
</script>