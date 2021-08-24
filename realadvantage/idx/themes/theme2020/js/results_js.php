<?php //results and agent bio page js  ?>
<script>jQuery(document).ready(function($){
	$('div#ar-idx-disclaimer').append($('div#IDX-main > div:last-of-type'));
	$('div#ar-idx-disclaimer').append($('div#IDX-resultsContent > div > div:not(#IDX-resultsHeader, #IDX-resultsPager-data, .IDX-resultsListings)'));
	$('a#scroll-top').after($('nav#IDX-results-pagination'));
	$('form#IDX-refinementSearchForm').wrapInner('<div class="IDX-row">');
	$('div#IDX-ccz-group').wrap('<div class="col-xs-12">');
	$('div#IDX-minPrice-group, div#IDX-maxPrice-group, div#IDX-bd-group, div#IDX-tb-group, div#IDX-sqft-group, div#IDX-add-group, div#IDX-per-group, div#IDX-srt-group').wrap('<div class="col-xs-12 col-sm-6">');
	$('input#IDX-resultsRefineSubmit').wrap('<div id="IDX-resultsRefineSubmit-wrap" class="col-xs-12">');
	$('li.IDX-results--cell.IDX-resultsCell').each(function(){
		$(this).append($(this).find($('.IDX-MLSCourtesy.IDX-results--cell--disclaimer')));
	});
});</script>