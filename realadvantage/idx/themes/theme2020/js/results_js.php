<?php //results and agent bio page js 

if(have_rows('settings_theme2020')) :
	while(have_rows('settings_theme2020')): the_row();
		if(have_rows('results')) :
			while(have_rows('results')): the_row();
				$showEmpty = get_sub_field('results_empty_details');
			endwhile;
		endif;
	endwhile;
endif;

?>
<script>jQuery(document).ready(function($){
	//$('div#ar-idx-disclaimer').append($('div#IDX-resultsDisclaimer, nav#IDX-results-pagination + div, div#IDX-main > div:last-of-type'));
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
<?php if($showEmpty): ?>
	var bedsLabel = $('.IDX-resultsAddress p.IDX-results--details-field-bedrooms:first span.IDX-label').text().trim();
	var bathsLabel = $('.IDX-resultsAddress p.IDX-results--details-field-totalBaths:first span.IDX-label').text().trim();
	var sqftLabel = $('.IDX-resultsAddress .IDX-field-sqFt.IDX-results--details-field:first span.IDX-label').text().trim();
	var acresLabel = $('.IDX-resultsAddress .IDX-field-acres.IDX-results--details-field:first span.IDX-label').text().trim();

	$('.IDX-resultsAddress').each(function(){
		if($(this).find($('p.IDX-results--details-field-bedrooms')).length == 0) {
			$(this).find($('h4.IDX-results--details-field:first-of-type + h4.IDX-results--details-field')).after('<p class="IDX-results--details-field-bedrooms IDX-results--details-field "><span class="IDX-text">N/A&nbsp;</span><span class="IDX-label">'+bedsLabel+'</span></p>');
		}
		if($(this).find($('p.IDX-results--details-field-totalBaths')).length == 0) {
			$(this).find($('p.IDX-results--details-field-bedrooms')).after('<p class="IDX-results--details-field-totalBaths IDX-results--details-field "><span class="IDX-text">N/A&nbsp;</span><span class="IDX-label">'+bathsLabel+'</span></p>');
		}
		if($(this).find($('.IDX-field-sqFt')).length == 0) {
			$(this).find($('p.IDX-results--details-field-totalBaths')).after('<div class="IDX-field-sqFt IDX-results--details-field"><span class="IDX-text">N/A&nbsp;</span><span class="IDX-label">'+sqftLabel+'</span></div>');
		}
		if($(this).find($('.IDX-field-acres')).length == 0) {
			$(this).find($('.IDX-field-sqFt')).after('<div class="IDX-field-acres IDX-results--details-field"><span class="IDX-text">N/A&nbsp;</span><span class="IDX-label">'+acresLabel+'</span></div>');
		}
	});
<?php endif; ?>
});</script>