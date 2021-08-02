<?php //schools for builder 
$path = get_stylesheet_directory_uri().'/realadvantage/js/previews/img';

?>

<script type="text/template" id="fusion-builder-block-module-schools-preview-template">
	<# 
	var path = '<?php echo $path; ?>';
	var image = path + '/schools-preview.jpg';
	#>
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }} (Sample Preview Only)</h4>
	<div class="schools-sample-image"><img src="{{image}}" style="width:100%;height:auto!important;max-width:1106px;max-height:initial!important" /></div>
</script>