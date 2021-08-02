<?php //search page js 

if(have_rows('settings_theme1')) :
	while(have_rows('settings_theme1')): the_row();
		if(have_rows('search')) :
			while(have_rows('search')): the_row();
				if(have_rows('menu')) :
					while(have_rows('menu')) : the_row(); 
						$navMain = get_sub_field('main'); 
						$navHover = get_sub_field('hover'); ?>
					<?php endwhile; ?>
				<?php endif;
			endwhile;
		endif;
	endwhile;
endif; 

$arAdvFields = do_shortcode('[fusion_accordion type="toggles" boxed_mode="no" border_size="1" border_color="#cccccc" background_color="#ffffff" hover_color="#ffffff" divider_line="" title_font_size="20px" icon_size="20" icon_color="#aaaaaa" icon_boxed_mode="no" icon_box_color="" icon_alignment="right" toggle_hover_accent_color="#000000" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="arMoreFiltersWrap"][fusion_toggle title="More Filters" open="no" class="" id=""]<div id="arIDX-moreFilters"></div>[/fusion_toggle][/fusion_accordion]');


?>

<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('div.IDX-pageContainer + div'));
		$('.fusion-page-title-captions h1.entry-title').text($('title').text());
		$('button#IDX-formReset').remove();
		$('button#IDX-formSubmit').text('Find My New Home!').removeClass('IDX-btn IDX-btn-primary').wrap('<div class="fusion-button-wrapper fusion-aligncenter">').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-default-span fusion-button-default-type').wrapInner('<span class="fusion-button-text">').attr('id','arIDX-formSubmit');
		$('div#IDX-action-buttons').attr('id','arIDX-action-buttons');
		$('form#IDX-searchForm').wrap('<div id="arIDX-searchFormContainer"><div id="arIDX-searchFormWrap">');
		if($('.IDX-page-address').length>0) {
			$('input#IDX-address').attr('placeholder','Street Address');
		}
		if($('.IDX-page-listingid').length>0) {
			$('input#IDX-listingID').attr('placeholder','Enter up to 25 MLS numbers separated by commas, e.g., 34555867, 53457954, 54552147').removeClass('IDX-input');
			$('p.IDX-help-block').remove();
		}
		$('div#IDX-coreSearchFields').prepend('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" style="font-size:3rem;margin-top:0px;margin-bottom:31px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h3 class="title-heading-center" style="margin:0;font-size:1em;" data-inline-fontsize="1em" data-fontsize="48" data-lineheight="57">I\'m Looking For...</h3><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div>');
		//standard search pages
		if($('div.IDX-page-advanced').length > 0 || $('div.IDX-page-quick').length > 0) {
			$('div#IDX-search-property-content, div#IDX-search-primary-content, div#IDX-search-additional-content').removeClass('IDX-row-content').addClass('row IDX-row').wrapInner('<div class="col-xs-12">');
			$('div#IDX-pt-group').wrap('<div id="arIDX-searchProperty-row1" class="row IDX-row"><div class="col-xs-12">');
			$('div#IDX-propStatus-group').insertBefore($('div#IDX-propSubType-group'));
			$('div#IDX-propStatus-group, div#IDX-propSubType-group').wrapAll('<div id="arIDX-searchProperty-row2" class="row IDX-row">');
			$('div#IDX-propStatus-group, div#IDX-propSubType-group').wrap('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">');
			$('div#IDX-ccz-group').wrap('<div id="arIDX-searchPrimary-row1" class="row IDX-row"><div class="col-xs-12">');
			$('.IDX-minPrice-maxPrice').wrapAll('<div id="arIDX-searchPrimary-row2" class="row IDX-row">').wrap('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">');
			$('.IDX-bd-tb').wrapAll('<div id="arIDX-searchPrimary-row3" class="row IDX-row">').wrap('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">');
			$('.IDX-sqft-acres').wrapAll('<div id="arIDX-searchPrimary-row4" class="row IDX-row">').wrap('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">');
			$('div#IDX-add-group, div#IDX-per-group, div#IDX-srt-group').wrapAll('<div id="arIDX-searchAdditional-row1" class="row IDX-row">').wrap('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">');
			$('div#IDX-searchRefinement-group').wrap('<div id="arIDX-searchAdditional-row2" class="row IDX-row"><div class="col-xs-12">');
			$('div#arIDX-searchPrimary-row1').before('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" style="font-size:3rem;margin-top:31px;margin-bottom:31px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h3 class="title-heading-center" style="margin:0;font-size:1em;" data-inline-fontsize="1em" data-fontsize="48" data-lineheight="57">Located In...</h3><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div>');
			$('div#arIDX-searchPrimary-row2').before('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" style="font-size:3rem;margin-top:31px;margin-bottom:31px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h3 class="title-heading-center" style="margin:0;font-size:1em;" data-inline-fontsize="1em" data-fontsize="48" data-lineheight="57">That Costs Between...</h3><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div>');
			$('div#arIDX-searchPrimary-row3').before('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" style="font-size:3rem;margin-top:31px;margin-bottom:31px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h3 class="title-heading-center" style="margin:0;font-size:1em;" data-inline-fontsize="1em" data-fontsize="48" data-lineheight="57">With These Features...</h3><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div>');
		}
		if($('div.IDX-page-advanced').length > 0) {
			$('div#IDX-action-buttons-bottom').replaceWith($('div#arIDX-action-buttons'));
			$('div#IDX-advancedSearchFields').before(<?php echo json_encode($arAdvFields); ?>);
			$('#arIDX-moreFilters').append($('div#IDX-advancedSearchFields, div#IDX-loadingScreen'));
			$('div#arIDX-moreFilters').prepend($('div#IDX-search-additional-content'));
		}
		//Nav Bar
		var navTag = <?php echo json_encode($navMain['tag']); ?>;
		$('a.IDX-searchNavLink').wrapInner('<'+navTag+'>');
		//map search
		if($('.IDX-category-map').length>0) {
			$('.IDX-criteriaLeft').prepend($('.IDX-criteriaRight div#IDX-pt-group'));
			$('.IDX-criteriaLeft div#IDX-pt-group select#IDX-pt > option:first-child').text('All Property Types');
			$('div#IDX-criteriaWindowContent button#arIDX-formSubmit').removeClass('IDX-btn-default');
		}
	});
</script>

<style>
	<?php if(have_rows('settings_theme1')) :
		while(have_rows('settings_theme1')): the_row();
			if(have_rows('search')) :
				while(have_rows('search')): the_row();
					if(have_rows('advFields')) : ?>
						<?php while(have_rows('advFields')) : the_row(); ?>
							.IDX-wrapper-standard.IDX-category-search div#<?php the_sub_field('id'); ?> .IDX-advancedWrap label.IDX-advancedText {
						    	height: auto!important;
						    	line-height: 1.5em!important;
						    	padding-left: 0!important;
						    	margin-bottom: 5px!important;
						    	color: #000000;
							}
						<?php endwhile; ?>
					<?php endif;
				endwhile;
			endif;
		endwhile;
	endif; ?>
	#IDX-main.IDX-wrapper-standard .IDX-mobileFirst--neutral .IDX-navbar-default .IDX-navbar-collapse {
    	background-color: <?php echo $navMain['bg']; ?>!important;
	}
	#IDX-main.IDX-wrapper-standard .IDX-mobileFirst--neutral .IDX-navbar-default .IDX-navbar-nav > li > a {
		color: <?php echo $navMain['color']; ?>!important;
	}
	#IDX-main.IDX-wrapper-standard .IDX-mobileFirst--neutral .IDX-navbar-default .IDX-navbar-nav > li > a:hover, 
	#IDX-main.IDX-wrapper-standard .IDX-mobileFirst--neutral .IDX-navbar-default .IDX-navbar-nav > li > a:focus, 
	#IDX-main.IDX-wrapper-standard .IDX-mobileFirst--neutral .IDX-navbar-default .IDX-navbar-nav > li.IDX-active > a, 
	#IDX-main.IDX-wrapper-standard .IDX-mobileFirst--neutral .IDX-navbar-default .IDX-navbar-nav > li.IDX-active > a:focus {
		color: <?php echo $navHover['color']; ?>!important;
		background-color: <?php echo $navHover['bg']; ?>!important;
	}
</style>