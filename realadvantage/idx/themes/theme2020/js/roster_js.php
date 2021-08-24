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
	$('div#IDX-rosterFilterForm').remove();
	$('.IDX-rosterAgentWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arAgentOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterStaffWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arStaffOuterWrap col-sm-12 col-md-6 col-lg-3">');
	$('.IDX-rosterManagementWrap').removeClass('col-sm-6 col-md-3 IDX-roster-category').wrap('<div class="arMgmtOuterWrap col-sm-12 col-md-6 col-lg-3">');
	
	

	if($('.IDX-rosterCategoryTitle').length > 1 || $('.IDX-rosterOfficeWrap').length > 0) {
		$('.IDX-rosterCategoryTitle .IDX-well').wrapInner('<h2>');
		$('.IDX-rosterCategoryTitle h2').unwrap();
	}else {
		$('.IDX-rosterCategoryTitle').remove();
	}


	$('.IDX-rosterAgentImageWrap, .IDX-rosterStaffImageWrap').removeClass('col-xs-12').unwrap().unwrap().unwrap();
	$('.IDX-rosterAgentInfoWrap, .IDX-rosterStaffInfoWrap').removeClass('col-xs-12 IDX-rosterCategoryRightColumn');

	$('.IDX-row').addClass('row');

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

	var agents = $('.arAgentOuterWrap');
	for(var k=0;k<agents.length;k+=4) {
		agents.slice(k, k+4).wrapAll('<div class="IDX-row agents-row row">');
	}
	var staff = $('.arStaffOuterWrap');
	for(var s=0;s<staff.length;s+=4) {
		staff.slice(s, s+4).wrapAll('<div class="IDX-row staff-row row">');
	}
	var staff = $('.arMgmtOuterWrap');
	for(var s=0;s<staff.length;s+=4) {
		staff.slice(s, s+4).wrapAll('<div class="IDX-row mgmt-row row">');
	}
	$('.IDX-rosterContent').removeClass('IDX-row').removeClass('row');
	$('.IDX-rosterCategoryTitle').removeClass('col-xs-12');
});</script>