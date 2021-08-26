<?php //listing pages js 

$titleSelect = '#mainPageHeading h1';
$subSelect = '#mainPageSubheading h4';
$mcalcTitle = 'Calculate Your Mortgage...';
$mcalcSub = 'Use the form below to estimate your mortgage payment and help determine what you can afford. Remember that this is only an estimate and your actual monthly payments will include other fees such as insurance and utilities.';
$mcalcIcons['beds'] = '<i class="fal fa-bed-alt"></i>';
$mcalcIcons['baths'] = '<i class="fal fa-toilet-paper"></i>';
$mcalcIcons['sqft'] = '<i class="fal fa-ruler-combined"></i>';
$mcalcIcons['acres'] = '<i class="fal fa-leaf"></i>';

?>
<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('div.IDX-pageContainer + div'));
		//Top bar
		if($('ul.IDX-propertyInfoList').length > 0) {
			var title = $('h2.IDX-pageHeader').text().trim().split('ID');
			var listingID = title[1].trim();
			var pageTitleStub = title[0].trim().split('-');
			var pageTitle = pageTitleStub[0].trim();
			$('li#IDX-propertyInfoAddress span.IDX-label').remove();
			$('.IDX-pageHeaderContainer').html('<div class="IDX-listingHeader-addressInfoWrap"><div class="IDX-listingHeader-addressWrap"><h2>'+$('li#IDX-propertyInfoAddress').html()+'</h2><h5>'+$('li#IDX-propertyInfoLocationInfo').html()+'</h5></div><div class="IDX-listingHeader-infoWrap"></div></div><div class="IDX-listingHeader-extrasWrap"><div class="IDX-listingHeader-extras-flexRow"><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyInfoPrice"><i class="fal fa-tag"></i>'+$('li#IDX-propertyInfoPrice').html()+'</div><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyInfoStatus"><i class="fal fa-sync"></i>'+$('li#IDX-propertyInfoStatus').html()+'</div><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyInfoListingID"><i class="fal fa-hashtag"></i><span class="IDX-label">Listing ID</span><span class="IDX-propertyInfoData">'+listingID+'</span></div><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyAction"><a href="'+$('a#IDX-goToProperty').attr('href')+'" id="IDX-goToPropertyAction"><i class="fal fa-home-heart" aria-hidden="true"></i><span class="IDX-goToProperty-text">More Info</span><span class="IDX-goToProperty-label">Click Here</span></a></div></div></div>'
			);
			$('.IDX-listingHeader-extras-flexCol').each(function(){
				$(this).append($(this).find($('span.IDX-label')));
			});
			$('.IDX-listingHeader-extras-flexCol .IDX-propertyInfoData').removeAttr('id');
			$('li#IDX-propertyInfoAddress, li#IDX-propertyInfoLocationInfo, li#IDX-propertyInfoPrice, li#IDX-propertyInfoStatus, a#IDX-goToProperty').remove();
			if($('li#IDX-propertyInfoTotalBaths').length) {
				$('li#IDX-propertyInfoFullBaths').remove();
			}
			$('.IDX-listingHeader-infoWrap').append('<div class="IDX-listingHeader-info-flexRow">');
			$('ul.IDX-propertyInfoList li.IDX-propertyInfoData').each(function(){
				$('.IDX-listingHeader-info-flexRow').append('<div class="IDX-listingHeader-info-flexCol" id="'+$(this).attr('id')+'">'+$(this).html()+'<div>');
			});
			$('ul.IDX-propertyInfoList, div#IDX-previousPage, div#IDX-photoGalleryContainer > hr').remove();
			$('div#IDX-propertyInfoBedrooms').prepend('<i class="fal fa-bed-alt"></i>');
			$('div#IDX-propertyInfoTotalBaths, div#IDX-propertyInfoFullBaths, div#IDX-propertyInfoPartialBaths').prepend('<i class="fal fa-toilet-paper"></i>');
			$('div#IDX-propertyInfoAcres').prepend('<i class="fal fa-ruler-combined"></i>');
			$('div#IDX-propertyInfoSqFt').prepend('<i class="fal fa-leaf"></i>');
			$('.IDX-pageHeaderContainer').addClass('IDX-propertyInfoHeaderContainer');
		}else {
			var pageTitle = $('h2.IDX-pageHeader').text().trim();
			$('.IDX-pageHeaderContainer').remove();
		}


		if($('.IDX-page-mortgage').length) {
			$('<?php echo $titleSelect; ?>').text(pageTitle);
			$('div#IDX-mortgageCalculatorContainer > div.IDX-well, div#IDX-mortgageCalculatorContainer > hr').remove();
			$('div#IDX-mortgageWrap').addClass('IDX-row');
			$('div#IDX-mortgageCalculationResults').wrap('<div id="arCalc-results" class="col-sm-12 col-md-4">');
			$('div#IDX-mortgageCalculationContent').wrap('<div id="arCalc-content" class="col-sm-12 col-md-8">');
			$('div#arCalc-content').append($('div#IDX-showAmortizationContent, a#IDX-showAmortization'));
			$('div#IDX-mortgageCalculatorContainer > hr').remove();
			$('div#IDX-mortgageCalculatorContent + div').remove();
			$('div#IDX-mortgageCalculationFileds').addClass('IDX-row');
			$('div#IDX-mortgagePrice').addClass('col-xs-12 col-sm-12 col-md-4');
			$('div#IDX-mortgagePrice + .IDX-row').wrap('<div id="IDX-downpayment-wrap" class="col-xs-12 col-sm-12 col-md-8">');
			$('div#IDX-mortgageRate, div#IDX-mortgageLength, div#IDX-mortgagePmi').addClass('col-xs-12 col-sm-12 col-md-4');
			$('#IDX-main input#IDX-mortgagePmiField, #IDX-main div#IDX-mortgagePmiUnit').wrapAll('<div class="IDX-mortgagePmi-wrap">');
			$('div#IDX-mortgageWrap').append($('div#arCalc-results'));
			$('div#arCalc-results div#IDX-mortgageCalculationResults .IDX-well').prepend('<h5 class="mcalcResults-title">Your Estimated Payment</h5>');
			$('div#IDX-mortgageCalculatorContent').prepend('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-two"><div class="title-sep-container title-sep-container-left"><div class="title-sep"></div></div><h2 class="title-heading-center"><?php echo $mcalcTitle; ?></h2><div class="title-sep-container title-sep-container-right"><div class="title-sep"></div></div></div><p><?php echo $mcalcSub; ?></p>');
		}else if($('.IDX-page-photogallery').length) {
			$('<?php echo $titleSelect; ?>').text(pageTitle);
			$('div#IDX-photoGallery').removeClass('IDX-container');
			$('div#IDX-showcaseSlides').removeClass('IDX-row');
			$('div#IDX-showcaseSlides > div').attr('class','IDX-gallery-thumb');
			$('.IDX-gallery-thumb').each(function(){
				if($(this).find($('img'))[0].hasAttribute('data-src')) {
					var src = $(this).find($('img')).attr('data-src').trim();
				}else {
					var src = $(this).find($('img')).attr('src').trim();
				}
				if($(this).find($('img'))[0].hasAttribute('data-srcset')) {
					var srcset = $(this).find($('img')).attr('data-srcset').trim();
				}else {
					if($(this).find($('img'))[0].hasAttribute('srcset')) {
						var srcset = $(this).find($('img')).attr('srcset').trim();
					}else {
						var srcset = false;
					}
				}
				var largeSrc = src;
				var largeSrcSize = 1024;
				if(srcset) {
					var srcsetArr = srcset.split(',');
					var test;
					var testArr;
					var srcSize;
					var testSize;
					var size = 0;
					for (var i = 0; i < srcsetArr.length; i++) {
						test = srcsetArr[i].trim();
						testArr = test.split(' ');
						srcSize = testArr[1];
						testSize = parseInt(srcSize);
						if(testSize > size) {
							size = testSize;
							largeSrc = testArr[0];
						}
					}
				}
				var imgSuffixArr = ["jpg","jpeg","png"];
				var largeSrcArr = largeSrc.split('.');
				var fileSuffix = largeSrcArr[largeSrcArr.length-1].toLowerCase();
				var fileSuffixArr = fileSuffix.split('?');
				if(fileSuffixArr.length > 1) {
					fileSuffix = fileSuffixArr[0];
				}
				if(imgSuffixArr.includes(fileSuffix)) {
					$(this).wrapInner('<span class="fusion-imageframe imageframe-none hover-type-zoomin"><a href="'+largeSrc+'" class="fusion-lightbox IDX-gallery-thumb-link" data-rel="iLightbox[propGallery]" style="background-image:url('+src+')">');
				} else {
					$(this).wrapInner('<span class="fusion-imageframe imageframe-none hover-type-zoomin"><a href="'+largeSrc+'" class="IDX-gallery-thumb-link" rel="iLightbox" target="lightbox" style="background-image:url('+src+')">');
				}
			});
			$('div#IDX-showcaseThumbnails-buttons, div#IDX-showcaseSlides .IDX-arrow').remove();
		}else if($('.IDX-page-linkshowcase').length) {
			$('<?php echo $titleSelect; ?>').text($('div#IDX-main > h1').text().trim());
			$('div#IDX-main > h1, div#IDX-main > small, .IDX-pageHeaderContainer').remove();
			$('div#IDX-linkShowcaseContainer').wrapInner('<div class="ar-flex-row">');
			$('.IDX-customLinkWrapper').addClass('ar-flex-col').wrapInner('<div class="IDX-customLink-displayText-Wrap">').prepend('<div class="IDX-customLink-displayIcon-Wrap"><i class="fal fa-search-plus"></i></div>').wrapInner('<div class="IDX-customLink-displayWrap">');
			$('.IDX-customLinkWrapper').each(function(){
				$(this).find($('.IDX-customLinkTitle')).prepend('<h5>'+$(this).find($('.IDX-customLinkTitle .IDX-customLinkHref')).text()+'</h5>');
				$(this).find($('.IDX-customLink-displayWrap')).prepend($(this).find($('.IDX-customLinkHref')));
			});
			$('.IDX-customLinkDescription').each(function(){
				if($(this).text().trim().length > 0){
					$(this).wrapInner('<p>');
				}else {
					$(this).html('<p>Browse Search Results</p>');
				}
			});
			$('#IDX-main.IDX-page-linkshowcase .IDX-customLink-displayWrap').matchHeight();
		}
	});
</script>