<?php //contact pages js 
if(have_rows('settings_theme1')) :
	while(have_rows('settings_theme1')): the_row();
		if(have_rows('contact')) :
			while(have_rows('contact')): the_row();
				if(have_rows('main')) :
					while(have_rows('main')) : the_row();
						if(have_rows('contact_text')):
							while(have_rows('contact_text')): the_row();
								$contactText['title'] = get_sub_field('title');
								$contactText['sub'] = get_sub_field('sub');
								$contactText['text'] = get_sub_field('text');
							endwhile;
						endif;
					endwhile;
				endif;
				if(have_rows('extra')):
					while(have_rows('extra')): the_row();
						if(have_rows('prop_forms')) :
							while(have_rows('prop_forms')) : the_row();
								$showingText = get_sub_field('showing');
								$moreText = get_sub_field('more');
							endwhile;
						endif;
						if(have_rows('hv_form')) :
							while(have_rows('hv_form')): the_row();
								$hvText = get_sub_field('text');
								if(have_rows('icons')):
									while(have_rows('icons')): the_row();
										$hv_icons['condition'] = get_sub_field('condition');
										$hv_icons['beds'] = get_sub_field('beds');
										$hv_icons['baths'] = get_sub_field('baths');
										$hv_icons['types'] = get_sub_field('types');
									endwhile;
								endif;
							endwhile;
						endif;
					endwhile;
				endif;
			endwhile;
		endif;
	endwhile;
endif;

$hvCondition = ar_wc_hvCondition($hv_icons['condition']);
$hvBeds = ar_wc_hvBeds($hv_icons['beds']);
$hvBaths = ar_wc_hvBaths($hv_icons['baths']);
$hvPropTypes = ar_wc_hvPropType($hv_icons['types']);

$contactSide = ar_wc_contactsidebar();

?>

<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('div.IDX-contactStandalone + div'));
		$('div#ar-idx-disclaimer').prepend($('div#IDX-scheduleshowingContent + div, div#IDX-moreinfoContent + div'));
		$('.IDX-form-actions').removeClass('IDX-row');
		$('div.IDX-contactStandalone button#IDX-resetBtn').unwrap().remove();
		$('button#IDX-submitBtn').unwrap().removeClass('IDX-btn IDX-btn-default IDX-btn-block').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-default-span fusion-button-default-type').wrapInner('<span class="fusion-button-text">').wrap('<div class="fusion-button-wrapper fusion-aligncenter">').attr('id','arIDX-submitBtn');
		$('#IDX-main').removeClass('IDX-wrapper-standard');
		$('.IDX-row:not(.row)').addClass('row');

		//placeholders
		$('input#IDX-firstName').attr('placeholder','First Name*');
		$('input#IDX-lastName').attr('placeholder','Last Name*');
		$('input#IDX-email').attr('placeholder','Email Address*');
		$('input#IDX-phone').attr('placeholder','Phone Number');
		$('textarea#IDX-message, textarea#IDX-hvMessage').attr('placeholder','Your comments or questions...');
		$('input#IDX-firstDate').attr('placeholder','Preferred Date');
		$('input#IDX-secondDate').attr('placeholder','Alternative Date');
		$('.IDX-showingDates select').prepend('<option value="" selected>Choose Time</option>');
		$('input#IDX-hvAddress').attr('placeholder','Street Address');
		$('input#IDX-hvCityState').attr('placeholder','City & State');
		$('input#IDX-hvZipcode').attr('placeholder','Zip Code');
		$('textarea#IDX-hvFeatures').attr('placeholder','Please list additional rooms and describe any special features and recent upgrades. For example: new roof, new carpet, custom kitchen cabinets, etc.');
		$('input#IDX-hvSize').attr('placeholder','Living Space');
		$('input#IDX-hvKitchenAge').attr('placeholder','Kitchen Age (approx)');
		$('input#IDX-hvBathsAge').attr('placeholder','Baths Age (approx)');


		/**page specific**/
		if($('div#IDX-scheduleshowingContent').length>0) {//Showing
			var showingTitle = $('h2#IDX-scheduleshowingHeader').text().trim();
			var showingTitleArr = showingTitle.split('-');
			$('.fusion-page-title-captions h1.entry-title').text(showingTitleArr[0].trim());
			$('.fusion-page-title-captions').append('<h3 data-fontsize="24" data-lineheight="36">'+showingTitleArr[1].trim()+'</h3>');
			$('div#IDX-scheduleshowingContent > div.col-xs-12:first-child').attr('id','arIDX-propDetails').addClass('col-sm-12 col-md-4');
			$('div#IDX-scheduleshowingContent').append($('#arIDX-propDetails'));
			$('h2#IDX-scheduleshowingHeader + hr').remove();
			$('h2#IDX-scheduleshowingHeader').text(showingTitleArr[0].trim()).wrap('<div id="arIDX-scheduleshowingFormHeader">');
			$('div#IDX-scheduleshowingFormText').wrapInner('<h5 id="ar-showingFormText" class="aligncenter">');
			$('#arIDX-scheduleshowingFormHeader').append($('#ar-showingFormText'));
			$('div#IDX-scheduleshowingFormText').remove();
			$('div#IDX-scheduleshowingFormWrap').addClass('col-sm-12 col-md-8');
			$('h2#IDX-scheduleshowingHeader').wrapInner('<h3 id="arIDX-scheduleShowingHeader">');
			$('h3#arIDX-scheduleShowingHeader').unwrap().addClass('title-heading-center').attr('style','margin:0;font-size:1em;').wrap('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" id="arShowingTitle" style="font-size: 3rem;">');
			$('#arShowingTitle').prepend('<div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div>').append('<div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div>');
			var showingText = <?php echo json_encode($showingText); ?>;
			if(showingText) {
				$('h5#ar-showingFormText').text(showingText);
			}
			$('button#arIDX-submitBtn span.fusion-button-text').text('Schedule My Showing');

		}else if($('div#IDX-moreinfoContent').length>0) {//More Info
			var moreTitle = $('h2#IDX-moreinfoHeader').text().trim();
			var moreTitleArr = moreTitle.split('-');
			$('.fusion-page-title-captions h1.entry-title').text(moreTitleArr[0].trim());
			$('.fusion-page-title-captions').append('<h3 data-fontsize="24" data-lineheight="36">'+moreTitleArr[1].trim()+'</h3>');
			$('div#IDX-moreinfoContent > div.col-xs-12:first-child').attr('id','arIDX-propDetails').addClass('col-sm-12 col-md-4');
			$('div#IDX-moreinfoContent').append($('#arIDX-propDetails'));
			$('h2#IDX-moreinfoHeader + hr').remove();
			$('h2#IDX-moreinfoHeader').text(moreTitleArr[0].trim()).wrap('<div id="arIDX-moreinfoFormHeader">');
			$('div#IDX-moreinfoFormWrap').addClass('col-sm-12 col-md-8');
			$('h2#IDX-moreinfoHeader').wrapInner('<h3 id="arIDX-moreInfoHeader">');
			$('h3#arIDX-moreInfoHeader').unwrap().addClass('title-heading-center').attr('style','margin:0;font-size:1em;').wrap('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" id="arMoreInfoTitle" style="font-size: 3rem;">');
			$('#arMoreInfoTitle').prepend('<div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div>').append('<div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div>');
			var moreText = <?php echo json_encode($moreText); ?>;
			if(moreText) {
				$('div#arIDX-moreinfoFormHeader').append('<h5 id="ar-moreFormText" class="aligncenter">'+moreText+'</h5>');
			}
			$('button#arIDX-submitBtn span.fusion-button-text').text('Get More Information');

		}else if($('div#IDX-contactContainer').length>0) {//Contact Page
			$('.fusion-page-title-captions').append('<h3 data-fontsize="24" data-lineheight="36">Ready and Waiting to Help!</h3>');
			$('div#IDX-contactContainer div#IDX-contactFormWrap + div').remove();
			$('div#IDX-contactContainer div#IDX-contactFormWrap').removeClass('col-lg-6 col-md-8').unwrap();
			$('h2#IDX-contactHeader + hr').remove();
			$('h2#IDX-contactHeader').wrap('<div id="arIDX-contactHeader">');
			$('h2#IDX-contactHeader').remove();
			var contactTitle = <?php echo json_encode($contactText['title']); ?>;
			var contactSub = <?php echo json_encode($contactText['sub']); ?>;
			var contactText = <?php echo json_encode($contactText['text']); ?>;
			$('#arIDX-contactHeader').append('<h2>'+contactTitle+'</h2><h5>'+contactSub+'</h5><p>'+contactText+'</p>');
			<?php if($contactSide['show']) : ?>
				$('div#IDX-contactContainer').wrapInner('<div id="IDX-contactContainerRow" class="IDX-row row"><div id="ar-contactFormWrap" class="col-sm-12 col-md-8">');
				$('#IDX-contactContainerRow').append('<div id="ar-contactDetailsWrap" class="col-sm-12 col-md-4">');
				$('#ar-contactDetailsWrap').html(<?php echo json_encode($contactSide['code']); ?>);
			<?php else: ?>
				$('div#IDX-contactContainer').wrapInner('<div id="IDX-contactContainerRow" class="IDX-row row"><div id="ar-contactFormWrap" class="col-sm-12>');
			<?php endif; ?>
		}else if($('div#IDX-homevaluationContainer').length>0) {//Home Value
			$('.fusion-page-title-captions h1.entry-title').text("What's Your Home Worth?");
			$('.fusion-page-title-captions').append('<h3 data-fontsize="24" data-lineheight="36">FREE In-Depth Home Valuation</h3>');
			$('div#IDX-hvCondition-group').html(<?php echo json_encode($hvCondition); ?>);
			$('div#IDX-hvBedrooms-group').html(<?php echo json_encode($hvBeds); ?>);
			$('div#IDX-hvBathrooms-group').html(<?php echo json_encode($hvBaths); ?>);
			$('div#IDX-hvPropType-group').html(<?php echo json_encode($hvPropTypes); ?>);
			$('h2#IDX-homevaluationHeader + hr').remove();
			$('h2#IDX-homevaluationHeader').wrap('<div id="arIDX-hvFormHeader">');
			$('h2#IDX-homevaluationHeader').wrapInner('<h3 id="arIDX-hvHeader">');
			$('h3#arIDX-hvHeader').unwrap().addClass('title-heading-center').attr('style','margin:0;font-size:1em;').wrap('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-three" id="arHvTitle" style="font-size: 3rem;">');
			$('#arHvTitle').prepend('<div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div>').append('<div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div>');
			var hvText = <?php echo json_encode($hvText); ?>;
			if(hvText) {
				$('div#arIDX-hvFormHeader').append('<h5 id="ar-hvFormText" class="aligncenter">'+hvText+'</h5>');
			}
			//autocomplete field
			$('div#IDX-homevaluationFormWrap').prepend('<div id="ar-googleHvAddressWrap"><input id="hvAddressAutocomplete" class="IDX-form-control" placeholder="Start Typing Your Address..." onFocus="geolocate()" type="text"/></div>');
			//$('div#IDX-homevaluationFormWrap').prepend('<div id="ar-googleHvAddressWrap"><input id="hvAddressAutocomplete" class="IDX-form-control" placeholder="Start Typing Your Address..." type="text"/></div>');
			$('form#IDX-homevaluationContactForm').prepend($('div#IDX-hvAddress-group'));
			$('div#IDX-hvAddress-group').removeClass('col-sm-6').addClass('IDX-hide');
			$('div#IDX-hvAddress-group label').remove();
			$('div#IDX-hvAddress-group input#IDX-hvAddress').unwrap().attr('type','hidden').addClass('IDX-hide');
			$('div#IDX-hvAddress-group').append($('input#IDX-hvCityState'));
			$('div#IDX-hvAddress-group input#IDX-hvCityState').attr('type','hidden').addClass('IDX-hide');
			$('div#IDX-hvAddress-group').append($('input#IDX-hvZipcode'));
			$('div#IDX-hvAddress-group input#IDX-hvZipcode').attr('type','hidden').addClass('IDX-hide');
			$('div#IDX-hvCityState-group, div#IDX-hvZipcode-group').remove();

			//structure
			$('div#IDX-hvCondition-group, div#IDX-hvPropType-group').wrapAll('<div id="arTypeCondition" class="row IDX-row">').wrap('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">');
			$('div#IDX-hvCondition-group').removeClass('col-xs-12');
			$('div#IDX-hvPropType-group').removeClass('col-xs-12 col-sm-6 IDX-form-group');
			$('div#IDX-hvFeatures-group').unwrap().addClass('col-xs-12').removeClass('IDX-form-group');
			$('div#IDX-hvBathsAge-group + .col-xs-12').attr('id','IDX-hvMessage-group-wrap').removeClass('col-xs-12');
			$('.IDX-customRegistrationFields').after($('div#IDX-hvMessage-group-wrap'));
			$('div#arTypeCondition + .IDX-clearfix').remove();
			$('div#IDX-hvBedrooms-group, div#IDX-hvBathrooms-group').wrapAll('<div id="arBedsBaths" class="row IDX-row">').wrap('<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">').removeClass('col-sm-6');
			$('div#IDX-hvFeatures-group, div#IDX-hvSize-group, div#IDX-hvKitchenAge-group, div#IDX-hvBathsAge-group').wrapAll('<div id="arFeatures" class="row IDX-row">');
			$('div#arTypeCondition').unwrap();
			$('hr.IDX-homevalueLine').remove();
			$('p#IDX_hvProvide').removeClass('IDX-well');
			$('div#arFeatures').wrapInner('<div id="arFeatures-left" class="col-xs-12 col-sm-12 col-md-6 col-lg-5"><div id="arFeatures-leftItems" class="IDX-row row">').append($('div#IDX-hvFeatures-group'));
			$('div#IDX-hvFeatures-group').wrap('<div id="arFeatures-right" class="col-xs-12 col-ms-12 col-md-6 col-lg-7">').removeClass('col-xs-12');
			$('#arFeatures-leftItems > div').removeClass('col-lg-4 col-sm-6').addClass('col-xs-12');
			$('p#IDX_hvProvide').replaceWith('<h5 id="arIDX_hpProvide">'+$('p#IDX_hvProvide').text().trim()+'</h5>');
			if($('.IDX-customRegistrationFields').length>0) {
				$('.IDX-customRegistrationFields').wrap('<div id="ar-regFields-col" class="ar-reg-col col-xs-12 col-sm-12 col-md-6 col-lg-5">');
				$('div#IDX-hvMessage-group-wrap').wrap('<div id="ar-regText-col" class="ar-reg-col col-xs-12 col-sm-12 col-md-6 col-lg-7">');
				$('.ar-reg-col').wrapAll('<div id="ar-regColsWrap" class="IDX-row row">');
				$('div#IDX-email-group, div#IDX-phone-group').removeClass('col-sm-6').addClass('col-sm-12');
			}
			$('button#arIDX-submitBtn span.fusion-button-text').text('Get My Home Value!');
			$('div#arFeatures').prepend('<div id="ar-hvFeaturesTitleWrap" class="col-xs-12"><h4 class="aligncenter">Additional Features</h4></div>');
		}

		if($('div#arIDX-propDetails').length>0) {
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
			$('li#IDX-propertyInfoBedrooms .arPropDetails-icon').append(<?php echo json_encode($hv_icons['beds']); ?>);
			$('li#IDX-propertyInfoTotalBaths .arPropDetails-icon').append(<?php echo json_encode($hv_icons['baths']); ?>);
			$('ul.IDX-propertyInfoList li#IDX-propertyInfoPrice').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoPrice">');
			$('ul.IDX-propertyInfoList li#IDX-propertyInfoStatus').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoStatus">');
			$('ul.IDX-propertyInfoList li#IDX-propertyInfoBedrooms').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoBedrooms">');
			$('ul.IDX-propertyInfoList li#IDX-propertyInfoTotalBaths').wrapInner('<div class="arIDX-propertyInfoData" id="IDX-propertyInfoTotalBaths">');
			$('div.arIDX-propertyInfoData').unwrap().addClass('col-xs-12 col-md-6');
			$('div#IDX-propertyInfoPrice').unwrap();
			$('div#arIDX-propDetailsHeader + .IDX-well').addClass('ar-propDataRow row IDX-row').removeClass('IDX-well');
			$('.arPropDetails-item').addClass('row IDX-row').wrapInner('<div class="arPropDetails-itemInner">');
			$('div#IDX-propertyInfoBedrooms span.IDX-label').text('Beds');
			$('div#IDX-propertyInfoTotalBaths span.IDX-label').text('Baths');
			$('.arPropDetails-itemText').wrapInner('<h4 class="arPropDetails-itemTextInner">');

			$('div#IDX-previousPage').removeClass('IDX-row row').addClass('fusion-button-wrapper fusion-align-block');
			$('a#IDX-returnToPreviousPage').unwrap().remove();
			$('a#IDX-goToProperty').unwrap().removeClass('IDX-btn-default IDX-btn-block IDX-btn').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-door-open fal" aria-hidden="true"></i></span><span class="fusion-button-text fusion-button-text-left">View Property</span>');
			$('div#IDX-previousPage + hr').remove();
		}
	});
</script>
