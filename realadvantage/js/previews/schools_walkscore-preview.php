<?php //schools for builder 
$path = get_stylesheet_directory_uri().'/realadvantage/js/previews/img';

?>

<script type="text/template" id="fusion-builder-block-module-schools_walkscore-preview-template">
	<# 
	var path = '<?php echo $path; ?>';
	var schools = path + '/schools-preview.jpg';
	var schoolsSmall = path + '/schools-small-preview.jpg';
	var walkscore = path + '/walkscore-preview.jpg';
	#>
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }} (Sample Preview Only)</h4>
	<div class="arWalkscoreSchools" style="overflow: auto;">
		<div style="width:48%;float:left;">
			<div class="schools-sample-image">
				<# if(params.schools) { #>
					<p><strong>{{params.schools}}</strong></p>
				<# } #>
				<img src="{{schoolsSmall}}" style="width:100%;height:auto!important;max-width:682px;max-height:initial!important" />
			</div>
		</div>
		<div style="width:48%;float:right;">
			<div class="walkscore-sample-image">
				<# if(params.walkscore) { #>
					<p><strong>{{params.walkscore}}</strong></p>
				<# } #>
				<img src="{{walkscore}}" style="width:100%;height:auto!important;max-width:725px;max-height:initial!important" />
			</div>
		</div>
	</div>			
</script>