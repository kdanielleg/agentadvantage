<?php //impress_carousel for builder ?>

<script type="text/template" id="fusion-builder-block-module-impress_carousel-preview-template">
	<# var displayType = 'Featured Listings';
	if(params.property_type == 'savedlinks') {
		displayType = 'Saved Link | Link ID: '+params.saved_link_id;
	} else if(params.property_type == 'soldpending') {
		displayType = 'Sold/Pending Listings';
	} else if(params.property_type == 'supplemental') {
		displayType = 'Supplemental Listings';
	}
	#>

	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}<br/>Type: {{displayType}}</h4>
</script>