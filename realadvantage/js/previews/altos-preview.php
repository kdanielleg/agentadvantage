<?php //author_block for builder ?>


<script type="text/template" id="fusion-builder-block-module-altos-preview-template">
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<# 
	var graph = params.type;
	var num = params.location;
	var type = 'median_price';
	if(graph == 'price'){
		type = 'median_price';
	}else if(graph == 'dom') {
		type = 'mean_dom';
	}else if(graph == 'sqft'{
		type = 'median_per_sqft';
	}else if(graph== 'inc') {
		type = 'median_percent_price_increased';
	}else if(graph == 'dec') {
		type = 'median_percent_price_decreased';
	}else if(graph == 'relist') {
		type = 'median_percent_relisted';
	}else if(graph == 'inventory') {
		type = 'median_inventory';
	}else if(graph == 'market') {
		type = 'market_action';
	}
	#>

	<div><a href="https://altos.re/r/{{num}}?data={{type}}&amp;segments=true" target="_blank" rel="noopener noreferrer"><img src="https://altos.re/i/{{num}}?data={{type}}&amp;title=true&amp;size=large&amp;segments=true" /></a></div>
</script>