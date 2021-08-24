<?php //results and agent bio page js 

$titleSelect = '#mainPageHeading h1';
$subSelect = '#mainPageSubheading h4';

?>
<script>jQuery(document).ready(function($){
	$('link[rel=stylesheet]').each(function(){
		var styleLink = $(this).attr('href');
		if(styleLink.includes('mobileFirst.css')) {
			$(this).remove();
		}
	});

	//Title
	$('<?php echo $titleSelect; ?>').text('Meet '+$('div#IDX-bioPanelWrapper .IDX-bioName').text().trim());
	$('<?php echo $subSelect; ?>').text($('div#IDX-bioPanelWrapper .IDX-bioUserTitle').text().trim());

	//Results Page
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
	$('div#IDX-resultsHeader').after('<h2 class="title-heading-center">My Listings</h2>');


	//Bio Section
	$('.IDX-row:not(.row)').addClass('row');
	$('div#IDX-agentbio').wrap('<div id="arAgentBioWrap">').wrap('<div id="arAgentBioOuterWrap" class="container">');
	$('div#IDX-agentbio').removeClass('IDX-agentbio__collapse');
	$('ul#IDX-agentInfo-group').append($('li.IDX-rosterresultsEmailLink').clone());
	if($('address#IDX-rosterAddress').length > 0) {
		$('.IDX-bioInfo ul#IDX-agentInfo-group').append('<li class="IDX-agentInfo IDX-agentAddress"></li>');
		$('.IDX-bioInfo ul#IDX-agentInfo-group .IDX-agentAddress').append($('address#IDX-rosterAddress'));
		$('address#IDX-rosterAddress').removeClass('IDX-agentInfo__collapse IDX-hidden');
	}
	if($('li.IDX-rosterViewSoldListings').length > 0) {
		var soldLink = $('li.IDX-rosterViewSoldListings > a.IDX-rosterCategoryLink').attr('href') + '#_IDX-resultsRow';
		$('li.IDX-rosterViewSoldListings > a.IDX-rosterCategoryLink').attr('href', soldLink);
	}
	if($('li.IDX-rosteragentViewActiveListings').length > 0) {
		var activeLink = $('li.IDX-rosteragentViewActiveListings > a.IDX-rosterCategoryLink').attr('href') + '#_IDX-resultsRow';
		$('li.IDX-rosteragentViewActiveListings > a.IDX-rosterCategoryLink').attr('href', activeLink);
	}
	$('div#IDX-bio-collapse').remove();
	$('div#IDX-agent-bio-wrapper').append($('ul.IDX-actionLinks'));
	$('ul.IDX-actionLinks').attr('id','ar-IDX-user-actions').removeClass('IDX-list-unstyled IDX-actionLinks');
	$('ul#ar-IDX-user-actions a').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').wrapInner('<span class="fusion-button-text">');
	$('ul#ar-IDX-user-actions li.IDX-rosterresultsEmailLink .fusion-button-text').html('<i class="fa fa-envelope-o" aria-hidden="true"></i> Get in Touch');
	$('span.IDX-bioDetails__inner').before('<h2>Why Choose Me?</h2>');

	//Contact Details
	$('ul#IDX-agentInfo-group').attr("id","ar-agentInfo-list").removeClass('IDX-agentInfo-group IDX-list-unstyled').addClass('fusion-checklist').attr('style','font-size:20px;line-height:34px;');
	$('ul#ar-agentInfo-list li').addClass('fusion-li-item').wrapInner('<div class="fusion-li-item-content" style="margin-left:48px;">').prepend('<span style="height:34px;width:34px;margin-right:14px;" class="icon-wrapper circle-no">');
	$('ul#ar-agentInfo-list li.IDX-agentOfficePhone .icon-wrapper, ul#ar-agentInfo-list li.IDX-agentHomePhone .icon-wrapper').prepend('<i class="fusion-li-icon fa-phone-rotary fal" aria-hidden="true"></i>');
	$('ul#ar-agentInfo-list li.IDX-agentCellPhone .icon-wrapper').prepend('<i class="fusion-li-icon fa-mobile-android fal" aria-hidden="true"></i>');
	$('ul#ar-agentInfo-list li.IDX-agentOfficeFax .icon-wrapper, ul#ar-agentInfo-list li.IDX-agentHomeFax .icon-wrapper').prepend('<i class="fusion-li-icon fa-fax fal" aria-hidden="true"></i>');
	$('ul#ar-agentInfo-list li.IDX-rosterresultsEmailLink .icon-wrapper').prepend('<i class="fusion-li-icon fa-envelope-open-text fal" aria-hidden="true"></i>');
	$('ul#ar-agentInfo-list li.IDX-rosterresultsEmailLink .fusion-li-item-content i').remove();
	$('ul#ar-agentInfo-list li.IDX-agentAddress .icon-wrapper').prepend('<i class="fusion-li-icon fa-map-marker-alt fal" aria-hidden="true"></i>');
});</script>