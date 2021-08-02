<?php //results and agent bio page js ?>
<script>jQuery(document).ready(function($){
	$('link[rel=stylesheet]').each(function(){
		var styleLink = $(this).attr('href');
		if(styleLink.includes('mobileFirst.css')) {
			$(this).remove();
		}
	});

	$('div#ar-idx-disclaimer').append($('div#IDX-main > div:last-child'));
	$('nav#IDX-results-pagination').nextAll().wrapAll('<div id="arIDX-mlsDisclaimer">');
	$('div#ar-idx-disclaimer').prepend($('#arIDX-mlsDisclaimer'));
	$('div#IDX-resultsPager-data, nav#IDX-results-pagination').wrapAll('<div id="ar-pagination">');
	$('input#IDX-resultsRefineSubmit').removeClass('IDX-btn IDX-btn-default IDX-btn--results-refinement').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').wrapInner('<span class="fusion-button-text">').wrap('<div class="fusion-button-wrapper fusion-align-block">');
	$('div#IDX-resultsTopActions').removeClass('IDX-box-shadow--bottom');
	$('.IDX-topAction > a').addClass('fusion-button button-flat button-large button-default fusion-button-default-span fusion-button-default-type').wrapInner('<span class="fusion-button-text fusion-button-text-left">').wrap('<div class="fusion-button-wrapper fusion-aligncenter">');
	$('a#IDX-saveSearch').prepend('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-save fal" aria-hidden="true"></i></span>');
	$('a.IDX-newSearch').prepend('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-search fal" aria-hidden="true"></i></span>');
	$('a.IDX-modifySearch').prepend('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-search-plus fal" aria-hidden="true"></i></span>');
	$('a#IDX-refineSearchFormToggle').prepend('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-plus fal" aria-hidden="true"></i></span>');
	$('a#IDX-refineSearchFormToggle span.fusion-button-text').text('More Filters');
	$('div#IDX-resultsHeader').append('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-one" style="margin-top:0px;margin-bottom:10px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h1 class="title-heading-center" style="margin:0;">Search Results</h1><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div>');
	$('div#IDX-resultsHeader').append('<div class="fusion-title title fusion-sep-none fusion-title-center fusion-title-text fusion-title-size-five fusion-border-below-title" style="margin-top:0px;margin-bottom:0px;"><h5 class="title-heading-center" style="margin:0;" data-fontsize="24" data-lineheight="28">'+$('h3.IDX-results-title').text().trim()+'</h5></div>');
	$('h3.IDX-results-title').remove();
	if($('p.IDX-results-title--count')) {
		$('div#IDX-resultsHeader').append('<p class="fusion-aligncenter"><em>' + $('p.IDX-results-title--count').text() + '</em></p>');
		$('p.IDX-results-title--count').remove();
	}
	if($('div#IDX-noResultsMessage')) {
		$('div#IDX-resultsHeader').append('<p class="fusion-aligncenter"><em>' + $('div#IDX-noResultsMessage').text() + '</em></p>');
		$('div#IDX-noResultsMessage').remove();
	}
	$('h4.IDX-results-title').remove();
	$('div#IDX-resultsHeader h1.title-heading-center').text('My Listings');
	$('.IDX-resultsSaveProperty span.fa-lg').html('<i class="fad fa-heart fa-stack-1x" aria-hidden="true"></i>');

	//modal button fix
	$('a#IDX-saveSearch').attr('href','');

	$('div#IDX-resultsContainer').removeClass('col-xs-12');
	$('.IDX-row').addClass('row');
	$('div#IDX-agentbio').wrap('<div id="arAgentBioWrap">').wrap('<div id="arAgentBioOuterWrap">');
	$('div#IDX-agentbio').removeClass('IDX-agentbio__collapse');
	$('div#IDX-agent-bio-wrapper').prepend($('ul.IDX-actionLinks, ul#IDX-agentInfo-group, h5.IDX-bioUserTitle, h3.IDX-bioName'));
	$('h3.IDX-bioName').before('<div class="fusion-title title fusion-title-1 fusion-title-center fusion-title-text fusion-title-size-two" style="margin-top:0px;margin-bottom:15px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-solid" style="border-color:#e0dede;"></div></div><h2 class="title-heading-center" style="margin:0;" data-fontsize="38" data-lineheight="46">'+$('h3.IDX-bioName').text().trim()+'</h2><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-solid" style="border-color:#e0dede;"></div></div></div>');
	$('h3.IDX-bioName').remove();
	$('ul.IDX-actionLinks').prepend($('ul#IDX-agentInfo-group > li'));
	$('ul#IDX-agentInfo-group').remove();
	$('.fusion-page-title-captions h1.entry-title').text('Meet '+$('div#IDX-agent-bio-wrapper h2.title-heading-center').text().trim());
});</script>