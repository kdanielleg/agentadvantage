<?php //results and agent bio page js ?>
<script>jQuery(document).ready(function($){
	$('link[rel=stylesheet]').each(function(){
		var styleLink = $(this).attr('href');
		if(styleLink.includes('mobileFirst.css')) {
			$(this).remove();
		}
	});
	$('div#IDX-rosterFilterForm').remove();
	$('div#ar-idx-disclaimer').append($('div#IDX-main > div:last-child'));
	$('hr#IDX-officeBreak').remove();
<?php if(get_field('ar_client_file','option')=='whitediamond'): ?>
	$('.IDX-rosterAgentWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arAgentOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterStaffWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arStaffOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterCategoryTitle').removeClass('col-xs-12');
	$('.IDX-rosterCategoryTitle').each(function(){
		$(this).before('<h2 class="'+$(this).attr('class')+'">'+$(this).text().trim()+'</h2>');
		$(this).remove();
	});
	$('h2.IDX-rosterStaffTitle').text('Support Staff');
	$('h2.IDX-rosterAgentTitle').text('Our Agents');
	$('div#IDX-main > .IDX-rosterAgentContent').wrap('<div id="wdrAgentsWrap"><div class="IDX-rosterSectionContentWrap">');
	$('div#IDX-main > .IDX-rosterStaffContent').wrap('<div id="wdrStaffWrap"><div class="IDX-rosterSectionContentWrap">');
	$('#wdrAgentsWrap').prepend('<div class="fusion-menu-anchor anchorFix" id="wdrAgents"></div>');
	$('#wdrStaffWrap').prepend('<div class="fusion-menu-anchor anchorFix" id="wdrStaff"></div>');
<?php else: ?>
	$('.IDX-rosterAgentWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arAgentOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterStaffWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arStaffOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterCategoryTitle').remove();	
<?php endif; ?>

	$('.IDX-rosterAgentImageWrap, .IDX-rosterStaffImageWrap').removeClass('col-xs-12').unwrap().unwrap().unwrap();
	$('.IDX-rosterAgentInfoWrap, .IDX-rosterStaffInfoWrap').removeClass('col-xs-12 IDX-rosterCategoryRightColumn');
	$('.IDX-rosterInfo').remove();
	$('.IDX-rosterInnerWrap + .IDX-row').unwrap().remove();
	$('.IDX-row').addClass('row');
<?php if(get_field('ar_client_file','option')=='whitediamond'): ?>
	$('.arAgentOuterWrap').wrapAll('<div class="IDX-row agents-row row">');
	$('.arStaffOuterWrap').wrapAll('<div class="IDX-row staff-row row">');
<?php else: ?>
	var agents = $('.arAgentOuterWrap');
	for(var k=0;k<agents.length;k+=4) {
		agents.slice(k, k+4).wrapAll('<div class="IDX-row agents-row row">');
	}
	var staff = $('.arStaffOuterWrap');
	for(var s=0;s<staff.length;s+=4) {
		staff.slice(s, s+4).wrapAll('<div class="IDX-row staff-row row">');
	}
<?php endif; ?>
	$('.IDX-rosterContent').removeClass('IDX-row').removeClass('row');
});</script>