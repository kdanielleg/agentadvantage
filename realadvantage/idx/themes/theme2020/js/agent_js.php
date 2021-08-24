<?php //results and agent bio page js 

if(have_rows('settings_theme2020')) :
	while(have_rows('settings_theme2020')): the_row();
		if(have_rows('agent')) :
			while(have_rows('agent')): the_row();
				$showTitleSub = get_sub_field('agent_bio_title');
				$moveContact = get_sub_field('agent_contact_left');
				$agentAddress = get_sub_field('agent_address');
				$showEmpty = get_sub_field('agent_empty_details');
				$anchorLink = get_sub_field('agent_results_anchor');
			endwhile;
		endif;
	endwhile;
endif;

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
	$('ul.IDX-actionLinks').prepend($('ul#IDX-agentInfo-group > li'));
	$('ul#IDX-agentInfo-group').remove();
	$('.IDX-bioInfo ul.IDX-actionLinks').append('<li class="IDX-agentInfo IDX-agentAddress"></li>');
	$('.IDX-bioInfo ul.IDX-actionLinks .IDX-agentAddress').append($('address#IDX-rosterAddress'));
	$('address#IDX-rosterAddress').removeClass('IDX-agentInfo__collapse IDX-hidden');
	if($('li.IDX-rosterViewSoldListings').length > 0) {
		var soldLink = $('li.IDX-rosterViewSoldListings > a.IDX-rosterCategoryLink').attr('href') + '#_IDX-resultsRow';
		$('li.IDX-rosterViewSoldListings > a.IDX-rosterCategoryLink').attr('href', soldLink);
	}
	if($('li.IDX-rosteragentViewActiveListings').length > 0) {
		var activeLink = $('li.IDX-rosteragentViewActiveListings > a.IDX-rosterCategoryLink').attr('href') + '#_IDX-resultsRow';
		$('li.IDX-rosteragentViewActiveListings > a.IDX-rosterCategoryLink').attr('href', activeLink);
	}
	$('div#IDX-bio-collapse').remove();
});</script>