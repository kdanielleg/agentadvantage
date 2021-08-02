<?php //weather for builder 
$path = get_stylesheet_directory_uri().'/realadvantage/js/previews/img';

?>

<script type="text/template" id="fusion-builder-block-module-weather_atlas-preview-template">
	<# 
	var path = '<?php echo $path; ?>';
	var image = path + '/weather-preview.jpg';
	#>
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }} (Sample Preview Only)</h4>
	<div class="walkscore-sample-image"><img src="{{image}}" style="width:100%;height:auto!important;max-width:691px;max-height:initial!important" /></div>
</script>