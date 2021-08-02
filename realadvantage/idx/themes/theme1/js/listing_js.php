<?php //listing pages js 
if(have_rows('settings_theme1')) :
	while(have_rows('settings_theme1')): the_row();
		if(have_rows('listing')) :
			while(have_rows('listing')): the_row();
				if(have_rows('mcalcText')) :
					while(have_rows('mcalcText')) : the_row();
						$mcalcTitle = get_sub_field('title');
						$mcalcSub = get_sub_field('sub');
					endwhile;
				endif;
				if(have_rows('mcalcIcons')) :
					while(have_rows('mcalcIcons')) : the_row();
						$mcalcIcons['beds'] = get_sub_field('beds');
						$mcalcIcons['baths'] = get_sub_field('baths');
						$mcalcIcons['sqft'] = get_sub_field('sqft');
						$mcalcIcons['acres'] = get_sub_field('acres');
					endwhile;
				endif;
			endwhile;
		endif;
	endwhile;
endif;


?>

<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('div.IDX-pageContainer + div'));
		if($('ul.IDX-propertyInfoList').length>0) {
			var theTitleText = $('h2.IDX-pageHeader').text().trim();
			var theTitleArr = theTitleText.split('-');
			$('h2.IDX-pageHeader').text(theTitleArr[0].trim());
			$('.fusion-page-title-captions').append('<h3 data-fontsize="24" data-lineheight="36">'+theTitleArr[1]+'</h3>');
		}
		$('.fusion-page-title-captions h1.entry-title').text($('h2.IDX-pageHeader').text().trim());

		//Page Specific
		if($('div.IDX-type-linkshowcase').length>0) {//link showcase
			$('div#IDX-main> h1, div#IDX-main > small').remove();
			$('.IDX-pageHeaderContainer').remove();
			$('div.IDX-customLinkWrapper').wrap('<div class="IDX-customLinkWrapperCol col-sm-12 col-md-6 col-lg-3">').wrapInner('<div class="arIDX-customLinkTextIconWrap row IDX-row"><div class="arIDX-customLinkTextWrap col-xs-9">');
			$('.arIDX-customLinkTextIconWrap').prepend('<div class="arIDX-customLinkIconWrap col-xs-3"><i class="fal fa-search-dollar"></i></div>');
			$('.arIDX-customLinkTextWrap').append('<div class="arIDX-customLinkHref">');
			$('.arIDX-customLinkTextWrap').each(function(){
				$(this).find($('.arIDX-customLinkHref')).append($(this).find($('a.IDX-customLinkHref')).clone());
			});
			$('.arIDX-customLinkHref a.IDX-customLinkHref').html('<span class="arIDX-customLinkHrefText">View Properties</span> <i class="fal fa-angle-right"></i>');
			var links = $('.IDX-customLinkWrapperCol');
			for(var k=0;k<links.length;k+=4) {
				links.slice(k, k+4).wrapAll('<div class="IDX-row row arCustomLinksRow">');
			}
			$('.IDX-customLinkTitle').wrapInner('<h5>');
			$('.IDX-customLinkDescription').each(function(){
				var descText = $(this).text().trim();
				if(!descText) {
					$(this).html('<p>View these specially currated properties by clicking on the link below.</p>');
				}else {
					$(this).html('<p>'+descText+'</p>');
				}
			});
		}else if($('div#IDX-photoGalleryContainer').length>0) {//photo gallery
			$('div#IDX-main').removeClass('IDX-wrapper-standard');
			$('div#ar-idx-disclaimer').prepend($('div#IDX-photoGalleryContainer > div:last-child'));
			$('.IDX-pageHeaderContainer').html('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" style="font-size:3rem;margin-top:0px;margin-bottom:0px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h3 class="title-heading-center" style="margin:0;font-size:1em;" data-inline-fontsize="1em" data-fontsize="48" data-lineheight="57">' + $('span#IDX-propertyInfoAddress').text().trim() + '</h3><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div><h5>' + $('li#IDX-propertyInfoLocationInfo').text().trim() + '</h5>');
			$('li#IDX-propertyInfoAddress, li#IDX-propertyInfoLocationInfo').remove();
			$('.IDX-pageHeaderContainer').append($('ul.IDX-propertyInfoList'));
			$('ul.IDX-propertyInfoList li#IDX-propertyInfoPrice span.IDX-label, ul.IDX-propertyInfoList li#IDX-propertyInfoStatus span.IDX-label, li#IDX-propertyInfoPartialBaths, li#IDX-propertyInfoFullBaths').remove();
			$('ul.IDX-propertyInfoList').wrapInner('<p id="arIDX-propInfoList">');
			$('p#arIDX-propInfoList').unwrap();
			$('p#arIDX-propInfoList > li.IDX-propertyInfoData').each(function(){
				$(this).wrapInner('<span class="IDX-propertyInfoDataWrap" id="' + $(this).attr('id') + '">');
			});
			$('span.IDX-propertyInfoDataWrap').unwrap();
			$('div#IDX-previousPage a#IDX-returnToPreviousPage').remove();
			$('div#IDX-previousPage').insertAfter($('div#IDX-photoGallery')).addClass('fusion-button-wrapper fusion-aligncenter');
			$('div#IDX-previousPage a#IDX-goToProperty').removeClass('IDX-btn-primary IDX-btn').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-default-span fusion-button-default-type').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-door-open fal" aria-hidden="true"></i></span><span class="fusion-button-text fusion-button-text-left">View Property Information</span>');
			$('div#IDX-previousPage > .fusion-button').attr('id','arIDX-goToProperty');
			$('div#IDX-previousPage').wrapInner('<div id="arIDX-previousPage" class="fusion-button-wrapper fusion-aligncenter">');
			$('div#arIDX-previousPage').unwrap();
			$('.IDX-pageHeaderContainer + hr').remove();
			$('div#IDX-showcaseThumbnails-buttons').remove();
			$('div#IDX-showcaseSlides').removeClass('IDX-row');
			$('div#IDX-showcaseSlides > .IDX-thumbnail').removeClass('IDX-showcaseSlide IDX-active').wrap('<div class="arIDX-galleryCol col-xs-12 col-sm-12 col-md-6 col-lg-3">');
			var pics = $('.arIDX-galleryCol');
			for(var k=0;k<pics.length;k+=4) {
				pics.slice(k, k+4).wrapAll('<div class="IDX-row row arIDX-galleryRow">');
			}
			$('.IDX-detailsPrimaryImg').each(function(){
				var attr = $(this).attr('data-src');
				if (typeof attr === typeof undefined || attr === false) {
					$(this).attr('data-src', $(this).attr('src'));
				}
				$(this).wrap('<a class="arIDX-galleryImgLink" target="lightbox" rel="iLightbox[propGallery]" href="'+$(this).attr('data-src')+'" data-rel="iLightbox[propGallery]"><div class="arIDX-galleryImgLinkImgBg" style="background-image:url('+$(this).attr('data-src')+')">');
        		$(this).addClass('IDX-hide');
			});
		}else if($('div#IDX-mortgageCalculatorContainer').length>0) {//mortgage calculator
			$('div#IDX-main').wrap('<div id="arIDX-mainWrap">').removeClass('IDX-wrapper-standard');
			var mcalcTitle = <?php echo json_encode($mcalcTitle); ?>;
			var mcalcSub = <?php echo json_encode($mcalcSub); ?>;
			$('.IDX-pageHeaderContainer').attr('id','arIDX-mcalcHeaderContainer').html('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" id="arMcalcTitle" style="font-size: 3rem;margin-bottom: 15px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h3 id="arIDX-mcalcHeader" class="title-heading-center" style="margin:0;font-size:1em;" data-inline-fontsize="1em" data-fontsize="48" data-lineheight="57">'+mcalcTitle+'</h3><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div><div id="ar-mcalcSubtitleWrap" class="fusion-title title fusion-sep-none fusion-title-center fusion-title-text fusion-title-size-four fusion-border-below-title" style="margin-top:0px;margin-bottom:10px;font-size:2.2rem"><h4 id="ar-mcalcSubtitle" class="title-heading-center" style="margin:0;font-size:1em;">'+mcalcSub+'</h4></div>');
			$('#arIDX-mainWrap').prepend($('#arIDX-mcalcHeaderContainer'));
			$('div#IDX-mortgageWrap').addClass('IDX-row row');
			$('div#IDX-mortgageCalculationResults').wrap('<div id="arCalc-results" class="col-sm-12 col-md-4 col-lg-3">');
			$('div#IDX-mortgageCalculationContent').wrap('<div id="arCalc-content" class="col-sm-12 col-md-8 col-lg-9">');
			$('div#arCalc-content').append($('div#IDX-showAmortizationContent, a#IDX-showAmortization'));
			$('div#IDX-mortgageCalculatorContainer > hr').remove();
			$('div#IDX-mortgageCalculatorContent + div').remove();
			$('div#IDX-main').wrap('<div id="arIDX-mainMcalcPageWrap" class="row IDX-row"><div id="arIDX-mainMcalcPage" class="col-sm-12">');
			if($('ul.IDX-propertyInfoList').length>0) {
				$('#arIDX-mainMcalcPage').addClass('col-md-8');
				$('#arCalc-results').removeClass('col-lg-3').addClass('col-lg-4');
				$('#arCalc-content').removeClass('col-lg-9').addClass('col-lg-8');
				$('div#IDX-mortgageCalculatorContainer > div.IDX-well:first-child').attr('id','arIDX-propDetails').addClass('col-sm-12 col-md-4').removeClass('IDX-well').append($('div#IDX-previousPage'));
				$('#arIDX-mainMcalcPageWrap').append($('#arIDX-propDetails'));
				$('div#arIDX-propDetails').prepend('<div id="arIDX-propDetailsHeader"><h3 id="ar-propDetailsAddress"></h3><h5 id="ar-propDetailsLocation"></h5></div>');
				$('#ar-propDetailsAddress').text($('li#IDX-propertyInfoAddress span#IDX-propertyInfoAddress').text().trim());
				$('#ar-propDetailsLocation').text($('li#IDX-propertyInfoLocationInfo').text().trim());
				$('li#IDX-propertyInfoAddress, li#IDX-propertyInfoLocationInfo').remove();
				if($('li#IDX-propertyInfoTotalBaths span.IDX-propertyInfoData').text().trim()!='0') {
					$('li#IDX-propertyInfoFullBaths').remove();
					$('li#IDX-propertyInfoPartialBaths').remove();
				}
				$('ul.IDX-propertyInfoList li.IDX-propertyInfoData').wrapInner('<div class="arPropDetails-item"><div class="arPropDetails-itemText">');
				$('li.IDX-propertyInfoData .arPropDetails-item').prepend('<div class="arPropDetails-icon">');
				$('li#IDX-propertyInfoPrice .arPropDetails-icon').append('<i class="fal fa-tag"></i>');
				$('li#IDX-propertyInfoStatus .arPropDetails-icon').append('<i class="fal fa-info-circle"></i>');
				$('li#IDX-propertyInfoBedrooms .arPropDetails-icon').append(<?php echo json_encode($mcalcIcons['beds']); ?>);
				$('li#IDX-propertyInfoTotalBaths .arPropDetails-icon').append(<?php echo json_encode($mcalcIcons['baths']); ?>);
				$('li#IDX-propertyInfoAcres .arPropDetails-icon').append(<?php echo json_encode($mcalcIcons['acres']); ?>);
				$('li#IDX-propertyInfoSqFt .arPropDetails-icon').append(<?php echo json_encode($mcalcIcons['sqft']); ?>);
				$('ul.IDX-propertyInfoList li#IDX-propertyInfoPrice').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoPrice">');
				$('ul.IDX-propertyInfoList li#IDX-propertyInfoStatus').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoStatus">');
				$('ul.IDX-propertyInfoList li#IDX-propertyInfoBedrooms').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoBedrooms">');
				$('ul.IDX-propertyInfoList li#IDX-propertyInfoTotalBaths').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoTotalBaths">');
				$('ul.IDX-propertyInfoList li#IDX-propertyInfoAcres').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoAcres">');
				$('ul.IDX-propertyInfoList li#IDX-propertyInfoSqFt').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoSqFt">');
				$('div.arIDX-propertyInfoData').unwrap().addClass('col-xs-12 col-md-6');
				$('ul.IDX-propertyInfoList').wrapInner('<div class="ar-propDataRow row IDX-row">');
				$('div.ar-propDataRow').unwrap();
				$('.arPropDetails-item').addClass('row IDX-row').wrapInner('<div class="arPropDetails-itemInner">');
				$('.arPropDetails-itemText').wrapInner('<h4 class="arPropDetails-itemTextInner">');

				//go to property
				$('div#IDX-previousPage').removeClass('IDX-row row').addClass('fusion-button-wrapper fusion-align-block');
				$('a#IDX-returnToPreviousPage').unwrap().remove();
				$('a#IDX-goToProperty').unwrap().removeClass('IDX-btn-default IDX-btn-block IDX-btn').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-door-open fal" aria-hidden="true"></i></span><span class="fusion-button-text fusion-button-text-left">View Property</span>');
			}else {
				$('#arIDX-mainMcalcPage').addClass('col-md-offset-1 col-md-10');
			}
			//main form
			$('a#IDX-showAmortization').removeClass('IDX-btn IDX-btn-primary').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fal fa-chevron-up" aria-hidden="true"></i></span><span class="fusion-button-text fusion-button-text-left">Show Amortization</span>').wrap('<div id="IDX-showAmmortWrap" class="fusion-button-wrapper fusion-align-block">');
			$('div#IDX-mortgagePrice + .IDX-row').attr('id','arIDX-mortgageDownPayment');
			$('div#IDX-mortgagePmi .IDX-checkbox').prepend($('input#IDX-includePmi'));
			$('div#IDX-mortgagePmi .IDX-checkbox label').text('Include PMI?');
			$('input#IDX-mortgagePmiField').wrap('<div class="IDX-input-group" id="IDX-mortgagePmiFieldWrap">');
			$('#IDX-mortgagePmiFieldWrap').append('<span class="IDX-input-group-addon">/year</span>');
			$('div#IDX-mortgagePmiUnit').remove();
			$('a#IDX-hideAmortization').removeClass('IDX-btn IDX-btn-primary').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fal fa-chevron-down" aria-hidden="true"></i></span><span class="fusion-button-text fusion-button-text-left">Hide Amortization</span>').wrap('<div id="IDX-hideAmmortWrap" class="fusion-button-wrapper fusion-align-block">');
			$('div#IDX-showAmortizationTabel').after($('div#IDX-showAmortizationPagination'));
		}
	});
</script>