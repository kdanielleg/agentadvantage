<?php //idx-omnibar for builder ?>

<script type="text/template" id="fusion-builder-block-module-idx-omnibar-preview-template">
	<# var displayType = 'Omnibar Search';
	if(params.extra == '1') {
		displayType = 'Omnibar Search with Extra Fields';
	}
	#>

	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}<br/>Type: {{displayType}}</h4>
</script>