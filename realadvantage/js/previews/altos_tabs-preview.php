<?php //author_block for builder ?>


<script type="text/template" id="fusion-builder-block-module-altos_tabs-preview-template">
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<# 
	var num = params.location;
	var type = 'median_price';
	#>
	<p>Single image preview only, full set of charts will be displayed</p>
	<div><a href="https://altos.re/r/{{num}}?data={{type}}&amp;segments=true" target="_blank" rel="noopener noreferrer"><img src="https://altos.re/i/{{num}}?data={{type}}&amp;title=true&amp;size=large&amp;segments=true" /></a></div>
</script>