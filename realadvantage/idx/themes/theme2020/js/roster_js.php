<?php //results and agent bio page js 

if(have_rows('settings_theme2020')) :
	while(have_rows('settings_theme2020')): the_row();
		if(have_rows('roster')) :
			while(have_rows('roster')): the_row();
				if(have_rows('roster_agent_details')) :
					while(have_rows('roster_agent_details')): the_row();
						$showFields = $showTitle = $showAddress = $showOffice = $showCell = $showEmail = false;
						if(!get_sub_field('none')):
							$showFields = true;
							$showOnlyTitle = true;
							$showTitle = get_sub_field('title');
							$showAddress = get_sub_field('address');
							$showOffice = get_sub_field('office');
							$showCell = get_sub_field('cell');
							$showEmail = get_sub_field('email');
							if(!$showTitle || $showAddress || $showOffice || $showCell || $showEmail):
								$showOnlyTitle = false;
							endif;
						endif;
					endwhile;
				endif;
			endwhile;
		endif;
	endwhile;
endif;




?>
<script>jQuery(document).ready(function($){
	$('link[rel=stylesheet]').each(function(){
		var styleLink = $(this).attr('href');
		if(styleLink.includes('mobileFirst.css')) {
			$(this).remove();
		}
	});
	$('div#ar-idx-disclaimer').append($('div#IDX-main > div:last-child'));
	$('hr#IDX-officeBreak').remove();
<?php if(get_field('ar_client_file','option')=='whitediamond'): ?>
	$('div#IDX-rosterFilterForm').remove();
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
<?php elseif(get_field('ar_client_file','option')=='wpirealestate'): ?>
	$('form#IDX-rosterFilter select#IDX-sort > option:first-child').text('Sort By...');
	$('.IDX-rosterAgentWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arAgentOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterStaffWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arStaffOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterCategoryTitle').removeClass('col-xs-12');
	$('.IDX-rosterCategoryTitle').each(function(){
		$(this).before('<h2 class="'+$(this).attr('class')+'">'+$(this).text().trim()+'</h2>');
		$(this).remove();
	});
	$('h2.IDX-rosterStaffTitle').text('Property Management & Staff').wrap('<div id="rosterStaffSortWrap" class="rosterSortHeaderWrap IDX-row"><div id="rosterStaffSortTitle" class="col-sm-12 col-md-7">');
	$('#rosterStaffSortWrap').append('<div class="col-sm-12 col-md-5" id="rosterStaffSort"></div>');
	$('#rosterStaffSort').append($('div#IDX-rosterFilterForm'));
	$('h2.IDX-rosterAgentTitle').text('Real Estate Brokers').wrap('<div id="rosterAgentSortWrap" class="rosterSortHeaderWrap IDX-row"><div class="col-sm-12 col-md-7" id="rosterAgentSortTitle">');
	$('#rosterAgentSortWrap').append('<div class="col-sm-12 col-md-5" id="rosterAgentSort"></div>');
	$('#rosterAgentSort').append($('div#IDX-rosterFilterForm').clone());
	$('div#IDX-main > .IDX-rosterAgentContent').wrap('<div id="wpiAgentsWrap"><div class="IDX-rosterSectionContentWrap">');
	$('div#IDX-main > .IDX-rosterStaffContent').wrap('<div id="wpiStaffWrap"><div class="IDX-rosterSectionContentWrap">');
<?php else: ?>
	$('div#IDX-rosterFilterForm').remove();
	$('.IDX-rosterAgentWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arAgentOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterStaffWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arStaffOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterCategoryTitle').remove();	
<?php endif; ?>

	$('.IDX-rosterAgentImageWrap, .IDX-rosterStaffImageWrap').removeClass('col-xs-12').unwrap().unwrap().unwrap();
	$('.IDX-rosterAgentInfoWrap, .IDX-rosterStaffInfoWrap').removeClass('col-xs-12 IDX-rosterCategoryRightColumn');
<?php if(!$showFields || $showOnlyTitle): ?>
	$('.IDX-rosterInfo').remove();
	$('address#IDX-rosterAddress').remove();
	$('.IDX-rosterInnerWrap + .IDX-row').unwrap().remove();
<?php else: ?>
	<?php if(!$showTitle): ?>
		$('h5.IDX-rosterUserTitle').remove();
	<?php endif; ?>
	<?php if(!$showAddress): ?>
		$('address#IDX-rosterAddress').remove();
	<?php endif; ?>
	<?php if(!$showOffice): ?>
		$('.IDX-roster-agentOfficePhone').remove();
	<?php endif; ?>
	<?php if(!$showCell): ?>
		$('.IDX-roster-agentCellPhone').remove();
	<?php endif; ?>
	<?php if($showEmail): ?>
		$('li.IDX-rosterAgentEmailLink a i').remove();
		var emailLink;
	<?php endif; ?>
	$('.IDX-rosterAgentInfoWrap').each(function(){
		<?php if($showEmail): ?>
			$(this).find($('.IDX-rosterInfo')).append('<div class="IDX-rosterField IDX-rosterAgentEmailLink"><span class="IDX-rosterLabel">Email:</span><span class="IDX-rosterData">'
					+	$(this).find($('li.IDX-rosterAgentEmailLink')).html()
					+	'</span></div>');
		<?php endif; ?>
		<?php if($showAddress): ?>
			$(this).find($('.IDX-rosterInfo')).append($(this).find($('address#IDX-rosterAddress')));
		<?php endif; ?>
	});
	$('.IDX-rosterInnerWrap + .IDX-row').unwrap().remove();
<?php endif; ?>
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