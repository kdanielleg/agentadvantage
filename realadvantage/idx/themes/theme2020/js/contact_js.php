<?php //contact pages js 

if(have_rows('settings_theme2020')) :
	while(have_rows('settings_theme2020')): the_row();
		if(have_rows('contact')) :
			while(have_rows('contact')): the_row();
				if(have_rows('phoneLabel')) :
					while(have_rows('phoneLabel')) : the_row();
						$phone = 'Phone';
						$phoneAlt = 'Alt Phone';
						$phone = get_sub_field('phone').': ';
						$phoneAlt = get_sub_field('phone-alt').': ';
					endwhile;
				endif;
			endwhile;
		endif;
	endwhile;
endif;


$titleSelect = '#mainPageHeading h1';
$subSelect = '#mainPageSubheading h4';
$agentFieldText == 'Working with an Agent?';
$cformTitle = 'Ask Us Anything!';
$cformText = 'Contact us today and get the help you need with your real estate plans.';

$socialShortcode = do_shortcode('[fusion_widget type="Fusion_Widget_Social_Links" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="contactPageSocialLinks" fusion_display_title="yes" fusion_padding_color="" fusion_margin="" fusion_bg_color="" fusion_bg_radius_size="" fusion_border_size="0" fusion_border_style="solid" fusion_border_color="" fusion_divider_color="" fusion_align="" fusion_align_mobile="" fusion_widget_social_links__title="Stay Connected!" fusion_widget_social_links__linktarget="_blank" fusion_widget_social_links__icons_font_size="16px" fusion_widget_social_links__color_type="brand" fusion_widget_social_links__icon_color="" fusion_widget_social_links__boxed_icon="Yes" fusion_widget_social_links__boxed_color="" fusion_widget_social_links__boxed_icon_radius="4px" fusion_widget_social_links__boxed_icon_padding="8px" fusion_widget_social_links__tooltip_pos="Top" fusion_widget_social_links__show_custom="No" fusion_widget_social_links__use_to="Yes" fusion_widget_social_links__blogger_link="" fusion_widget_social_links__deviantart_link="" fusion_widget_social_links__discord_link="" fusion_widget_social_links__digg_link="" fusion_widget_social_links__dribbble_link="" fusion_widget_social_links__dropbox_link="" fusion_widget_social_links__fb_link="" fusion_widget_social_links__flickr_link="" fusion_widget_social_links__forrst_link="" fusion_widget_social_links__instagram_link="" fusion_widget_social_links__linkedin_link="" fusion_widget_social_links__mixer_link="" fusion_widget_social_links__myspace_link="" fusion_widget_social_links__paypal_link="" fusion_widget_social_links__pinterest_link="" fusion_widget_social_links__reddit_link="" fusion_widget_social_links__rss_link="" fusion_widget_social_links__skype_link="" fusion_widget_social_links__soundcloud_link="" fusion_widget_social_links__spotify_link="" fusion_widget_social_links__tiktok_link="" fusion_widget_social_links__tumblr_link="" fusion_widget_social_links__twitter_link="" fusion_widget_social_links__twitch_link="" fusion_widget_social_links__vimeo_link="" fusion_widget_social_links__vk_link="" fusion_widget_social_links__wechat_link="" fusion_widget_social_links__whatsapp_link="" fusion_widget_social_links__xing_link="" fusion_widget_social_links__yahoo_link="" fusion_widget_social_links__yelp_link="" fusion_widget_social_links__youtube_link="" fusion_widget_social_links__email_link="" fusion_widget_social_links__phone_link="" /]');
$social = str_replace('"', "'", $socialShortcode);
$social = preg_replace('~>\\s+<~m', '><', $social);	

$smallIcon = get_home_url().'/wp-content/themes/agentadvantage/realadvantage/img/map-marker-small.jpg';

?>


<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('div.IDX-contactStandalone + div'));
		
		//placeholders
		$('span.IDX-required').remove();
		$('.IDX-customRegistrationFields div[data-role=fieldcontain]').each(function(){
			var label = $(this).find('label.IDX-control-label').text().trim();
			if($(this).find('input.IDX-form-control[data-fieldrequired=y]').length > 0) {
				label += '*';
			}
			$(this).find('input.IDX-form-control').attr('placeholder',label);
		});

		$('textarea#IDX-message, textarea#IDX-hvMessage').attr('placeholder','Your comments or questions...');
		$('textarea#IDX-hvFeatures').attr('placeholder','Please list additional rooms and describe any special features and recent upgrades. For example: new roof, new carpet, custom kitchen cabinets, etc.');
		
		$('input#IDX-firstDate').attr('placeholder','Preferred Date');
		$('input#IDX-secondDate').attr('placeholder','Alternative Date');
		$('.IDX-showingDates select').prepend('<option value="" selected>Choose Time</option>');
		$('input#IDX-hvAddress').attr('placeholder','Street Address');
		$('input#IDX-hvCityState').attr('placeholder','City & State');
		$('input#IDX-hvZipcode').attr('placeholder','Zip Code');
		$('input#IDX-hvSize').attr('placeholder','Living Space');
		$('input#IDX-hvKitchenAge').attr('placeholder','Kitchen Age (approx)');
		$('input#IDX-hvBathsAge').attr('placeholder','Baths Age (approx)');
		$('div#IDX-firstTime-group label').replaceWith('<label for="IDX-firstDate" class="IDX-control-label">Preferred Time:</label>');
		$('div#IDX-secondTime-group label').replaceWith('<label for="IDX-secondDate" class="IDX-control-label">Alternative Time:</label>');
		$('div#IDX-firstDate-group label.IDX-control-label').text('Preferred Date:');
		$('div#IDX-secondDate-group label.IDX-control-label').text('Alternative Date:');
		$('label.IDX-control-label').addClass('screen-reader-text');

		$('.IDX-form-actions button#IDX-resetBtn').unwrap().remove();
		$('.IDX-form-actions .IDX-form-group').removeClass('col-sm-6').addClass('col-xs-12 col-sm-12');

		if($('ul.IDX-propertyInfoList').length > 0) {
			$('h2.IDX-pageHeader').wrap('<div class="IDX-pageHeaderContainer">');
			var getListingID = $('h2.IDX-pageHeader').text().trim().split('ID');
			var listingID = getListingID[1].trim();

			$('li#IDX-propertyInfoAddress span.IDX-label').remove();
			$('.IDX-pageHeaderContainer').html('<div class="IDX-listingHeader-addressInfoWrap"><div class="IDX-listingHeader-addressWrap"><h2>'+$('li#IDX-propertyInfoAddress').html()+'</h2><h5>'+$('li#IDX-propertyInfoLocationInfo').html()+'</h5></div><div class="IDX-listingHeader-infoWrap"></div></div><div class="IDX-listingHeader-extrasWrap"><div class="IDX-listingHeader-extras-flexRow"><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyInfoPrice"><i class="fal fa-tag"></i>'+$('li#IDX-propertyInfoPrice').html()+'</div><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyInfoStatus"><i class="fal fa-sync"></i>'+$('li#IDX-propertyInfoStatus').html()+'</div><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyInfoListingID"><i class="fal fa-hashtag"></i><span class="IDX-label">Listing ID</span><span class="IDX-propertyInfoData">'+listingID+'</span></div><div class="IDX-listingHeader-extras-flexCol" id="IDX-propertyAction"><a href="'+$('a#IDX-goToProperty').attr('href')+'" id="IDX-goToPropertyAction"><i class="fal fa-home-heart" aria-hidden="true"></i><span class="IDX-goToProperty-text">More Info</span><span class="IDX-goToProperty-label">Click Here</span></a></div></div></div>');
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
			$('ul.IDX-propertyInfoList').unwrap().unwrap().remove();
			$('div#IDX-previousPage, div#IDX-photoGalleryContainer > hr').remove();
			$('div#IDX-propertyInfoBedrooms').prepend('<i class="fal fa-bed-alt"></i>');
			$('div#IDX-propertyInfoTotalBaths, div#IDX-propertyInfoFullBaths, div#IDX-propertyInfoPartialBaths').prepend('<i class="fal fa-toilet-paper"></i>');
			$('div#IDX-propertyInfoAcres').prepend('<i class="fal fa-ruler-combined"></i>');
			$('div#IDX-propertyInfoSqFt').prepend('<i class="fal fa-leaf"></i>');
			$('.IDX-pageHeaderContainer').addClass('IDX-propertyInfoHeaderContainer');
			$('.IDX-pageHeaderContainer + hr').remove();
		}

		if($('.IDX-page-moreinfo').length > 0) {
			$('<?php echo $titleSelect; ?>').text('Request More Information');
			$('div#IDX-moreinfoContent > hr').remove();
			$('div#IDX-moreinfoFormWrap').prepend('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-two"><div class="title-sep-container title-sep-container-left"><div class="title-sep"></div></div><h2 class="title-heading-center">Ask Anything You Want to Know!</h2><div class="title-sep-container title-sep-container-right"><div class="title-sep"></div></div></div>');
		}else if($('.IDX-page-scheduleshowing').length > 0) {
			$('<?php echo $titleSelect; ?>').text('Schedule a Showing');
			$('div#IDX-scheduleshowingContent > hr').remove();
			$('div#IDX-scheduleshowingFormText').removeClass('IDX-well').wrapInner('<p>');
			$('.IDX-row.IDX-customRegistrationFields > div').addClass('col-xs-12 col-md-6 col-lg-3');
			$('.IDX-showingDates > div').addClass('col-xs-12 col-md-6');
			$('.IDX-showingDates').wrapInner('<div class="IDX-row">').addClass('col-xs-12 col-sm-12 col-md-6');
			$('div#IDX-scheduleshowingFormWrap').prepend('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-two"><div class="title-sep-container title-sep-container-left"><div class="title-sep"></div></div><h2 class="title-heading-center">Book Your Showing, In Person or Virtual</h2><div class="title-sep-container title-sep-container-right"><div class="title-sep"></div></div></div>');
		}else if($('.IDX-page-homevaluation').length > 0) {
			$('<?php echo $titleSelect; ?>').text('What\'s Your Home Worth?');
			$('div#IDX-homevaluationContainer > h2, div#IDX-homevaluationContainer > hr').remove();
			$('div#IDX-homevaluationFormWrap').prepend('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-two"><div class="title-sep-container title-sep-container-left"><div class="title-sep"></div></div><h2 class="title-heading-center">Get Your FREE Home Valuation!</h2><div class="title-sep-container title-sep-container-right"><div class="title-sep"></div></div></div>');
			$('div#IDX-hvCondition-group').html('<label class="icon-radio-group-title screen-reader-text">Condition</label><div class="switch-field"><input type="radio" name="hvCondition" value="Poor" id="IDX-hvCondition-radio-5" class="IDX-hvCondition-radio"><label for="IDX-hvCondition-radio-5" id="IDX-hvCondition-4" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-home-heart"></i></span><span class="icon-radio-label">Poor Condition</span></label><input type="radio" name="hvCondition" value="Needs Work" id="IDX-hvCondition-radio-4" class="IDX-hvCondition-radio"><label for="IDX-hvCondition-radio-4" id="IDX-hvCondition-3" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-home-heart"></i></span><span class="icon-radio-label">Okay Condition</span></label><input type="radio" name="hvCondition" value="Fair" id="IDX-hvCondition-radio-3" class="IDX-hvCondition-radio"><label for="IDX-hvCondition-radio-3" id="IDX-hvCondition-2" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-home-heart"></i></span><span class="icon-radio-label">Fair Condition</span></label><input type="radio" name="hvCondition" value="Good" id="IDX-hvCondition-radio-2" class="IDX-hvCondition-radio"><label for="IDX-hvCondition-radio-2" id="IDX-hvCondition-1" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-home-heart"></i></span><span class="icon-radio-label">Good Condition</span></label><input type="radio" name="hvCondition" value="Excellent" id="IDX-hvCondition-radio-1" class="IDX-hvCondition-radio"><label for="IDX-hvCondition-radio-1" id="IDX-hvCondition-0" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-home-heart"></i></span><span class="icon-radio-label">Perfect Condition</span></label></div>');
			$('div#IDX-hvBedrooms-group').html('<label class="icon-radio-group-title screen-reader-text">Bedrooms</label><div class="switch-field"><input type="radio" name="hvBedrooms" value="1" id="IDX-hvBedrooms-radio-1" class="IDX-hvBedrooms-radio"><label for="IDX-hvBedrooms-radio-1" id="IDX-hvBedrooms-0" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-bed-alt"></i></span><span class="icon-radio-label">1 Bed</span></label><input type="radio" name="hvBedrooms" value="2" id="IDX-hvBedrooms-radio-2" class="IDX-hvBedrooms-radio"><label for="IDX-hvBedrooms-radio-2" id="IDX-hvBedrooms-1" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-bed-alt"></i></span><span class="icon-radio-label">2 Beds</span></label><input type="radio" name="hvBedrooms" value="3" id="IDX-hvBedrooms-radio-3" class="IDX-hvBedrooms-radio"><label for="IDX-hvBedrooms-radio-3" id="IDX-hvBedrooms-2" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-bed-alt"></i></span><span class="icon-radio-label">3 Beds</span></label><input type="radio" name="hvBedrooms" value="4" id="IDX-hvBedrooms-radio-4" class="IDX-hvBedrooms-radio"><label for="IDX-hvBedrooms-radio-4" id="IDX-hvBedrooms-3" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-bed-alt"></i></span><span class="icon-radio-label">4 Beds</span></label><input type="radio" name="hvBedrooms" value="5" id="IDX-hvBedrooms-radio-5" class="IDX-hvBedrooms-radio"><label for="IDX-hvBedrooms-radio-5" id="IDX-hvBedrooms-4" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-bed-alt"></i></span><span class="icon-radio-label">5+ Beds</span></label></div>');
			$('div#IDX-hvBathrooms-group').html('<label class="icon-radio-group-title screen-reader-text">Bathrooms</label><div class="switch-field"><input type="radio" name="hvBathrooms" value="1" id="IDX-hvBathrooms-radio-1" class="IDX-hvBathrooms-radio"><label for="IDX-hvBathrooms-radio-1" id="IDX-hvBathrooms-0" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-toilet-paper"></i></span><span class="icon-radio-label">1 Bath</span></label><input type="radio" name="hvBathrooms" value="2" id="IDX-hvBathrooms-radio-2" class="IDX-hvBathrooms-radio"><label for="IDX-hvBathrooms-radio-2" id="IDX-hvBathrooms-1" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-toilet-paper"></i></span><span class="icon-radio-label">2 Baths</span></label><input type="radio" name="hvBathrooms" value="3" id="IDX-hvBathrooms-radio-3" class="IDX-hvBathrooms-radio"><label for="IDX-hvBathrooms-radio-3" id="IDX-hvBathrooms-2" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-toilet-paper"></i></span><span class="icon-radio-label">3 Baths</span></label><input type="radio" name="hvBathrooms" value="4" id="IDX-hvBathrooms-radio-4" class="IDX-hvBedrooms-radio"><label for="IDX-hvBathrooms-radio-4" id="IDX-hvBathrooms-3" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-toilet-paper"></i></span><span class="icon-radio-label">4 Baths</span></label><input type="radio" name="hvBathrooms" value="5" id="IDX-hvBathrooms-radio-5" class="IDX-hvBedrooms-radio"><label for="IDX-hvBathrooms-radio-5" id="IDX-hvBathrooms-4" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-toilet-paper"></i></span><span class="icon-radio-label">5+ Baths</span></label></div>');
			$('div#IDX-hvPropType-group').removeClass('col-sm-6').addClass('col-xs-12').html('<label class="icon-radio-group-title screen-reader-text">Property Type</label><div class="switch-field"><input type="radio" name="hvPropType" value="Single Family Residential" id="IDX-hvPropType-radio-1" class="IDX-hvPropType-radio"><label for="IDX-hvPropType-radio-1" id="IDX-hvPropType-0" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-house"></i></span><span class="icon-radio-label">Single Family</span></label><input type="radio" name="hvPropType" value="Lots and Land" id="IDX-hvPropType-radio-2" class="IDX-hvPropType-radio"><label for="IDX-hvPropType-radio-2" id="IDX-hvPropType-1" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-map-signs"></i></span><span class="icon-radio-label">Lots &amp; Land</span></label><input type="radio" name="hvPropType" value="Multifamily Residential" id="IDX-hvPropType-radio-3" class="IDX-hvPropType-radio"><label for="IDX-hvPropType-radio-3" id="IDX-hvPropType-2" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-warehouse-alt"></i></span><span class="icon-radio-label">Multifamily</span></label><input type="radio" name="hvPropType" value="Rentals" id="IDX-hvPropType-radio-4" class="IDX-hvPropType-radio"><label for="IDX-hvPropType-radio-4" id="IDX-hvPropType-3" class="IDX-radio-inline"><span class="icon-radio-icon" style=" "><i class="fal fa-home-lg"></i></span><span class="icon-radio-label">Rentals</span></label></div>');
			$('div#IDX-hvBathrooms-group + div').attr('id','IDX-hvFeatures-group-wrap').addClass('col-xs-12 col-sm-12 col-md-8');
			$('div#IDX-hvSize-group, div#IDX-hvKitchenAge-group, div#IDX-hvBathsAge-group').removeClass('col-lg-4 col-sm-6').addClass('col-xs-12').wrapAll('<div id="IDX-hvFeatures-items-wrap" class="col-xs-12 col-sm-12 col-md-4"><div class="IDX-row">');
			$('.IDX-customRegistrationFields').removeClass('IDX-row').addClass('col-xs-12 col-sm-12 col-md-5').wrapInner('<div class="IDX-row">').wrap('<div class="IDX-row" id="IDX-messageFields-row">');
			$('.IDX-customRegistrationFields div#IDX-email-group, .IDX-customRegistrationFields div#IDX-phone-group').removeClass('col-sm-6').addClass('col-xs-12 col-sm-12');
			$('div#IDX-hvMessage-group').unwrap();
			$('#IDX-messageFields-row').append($('div#IDX-hvMessage-group'));
			$('div#IDX-hvMessage-group').wrap('<div class="col-xs-12 col-sm-12 col-md-7">');
			$('p#IDX_hvProvide').removeClass('IDX-well');
			$('div#IDX-homevaluationFormActions button#IDX-submitBtn').text('Send My Home Value Report');

			//address
			var getUrlParameter = function getUrlParameter(sParam) {
		    	var sPageURL = window.location.search.substring(1), sURLVariables = sPageURL.split('&'), sParameterName, i;
		    	for (i = 0; i < sURLVariables.length; i++) {
		        	sParameterName = sURLVariables[i].split('=');
		        	if (sParameterName[0] === sParam) {
		            	return sParameterName[1] === false ? true : decodeURIComponent(sParameterName[1]);
		        	}
		    	}
			};
			var hvMapKey = <?php echo json_encode(get_field('ar_gmap_key', 'option')); ?>;
			if(getUrlParameter('address')) {
				var addressParam = getUrlParameter('address');
				var address = addressParam.split('+').join(' ');
				$('form#IDX-homevaluationContactForm').before('<div id="ar-googleHvAddressParamWrap"><p><strong>We Found it!</strong><br>'+address+'</p></div>');
				var hvMapIcon = <?php echo json_encode($smallIcon); ?>;
				$('div#ar-googleHvAddressParamWrap').append('<img width="640" height="300" src="https://maps.googleapis.com/maps/api/staticmap?key='+hvMapKey+'&amp;language=en&amp;center='+addressParam+'&amp;maptype=roadmap&amp;zoom=14&amp;size=640x300&amp;markers=icon:'+hvMapIcon+'|'+addressParam+'&amp;scale=2">');
				$('div#ar-googleHvAddressParamWrap').append('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-two"><div class="title-sep-container title-sep-container-left"><div class="title-sep"></div></div><h2 class="title-heading-center" style="margin-bottom:0!important;">Property Features</h2><div class="title-sep-container title-sep-container-right"><div class="title-sep"></div></div></div><p>Provide as much detail as possible to get the most accurate evaluation.</p>');
				var addressArr = address.split(',');
				var stateZipArr = addressArr[2].trim().split(' ');
				var street = addressArr[0];
				var cityState = addressArr[1] + ', ' + stateZipArr[0];
				var zip = stateZipArr[1];
				$('div#IDX-hvAddress-group input#IDX-hvAddress').val(street);
				$('div#IDX-hvAddress-group input#IDX-hvCityState').val(cityState);
				if(zip) {
					$('div#IDX-hvAddress-group input#IDX-hvZipcode').val(zip);
				}
				

			} else {
				//autocomplete field
				$('form#IDX-homevaluationContactForm').before('<div id="ar-googleHvAddressWrap"><input id="hvAddressAutocomplete" class="IDX-form-control" placeholder="Start Typing Your Address..." onFocus="geolocate()" type="text"/></div>');
			}
			$('form#IDX-homevaluationContactForm').prepend($('div#IDX-hvAddress-group'));
			$('div#IDX-hvAddress-group').removeClass('col-sm-6').addClass('IDX-hide');
			$('div#IDX-hvAddress-group label').remove();
			$('div#IDX-hvAddress-group input#IDX-hvAddress').unwrap().attr('type','hidden').addClass('IDX-hide');
			$('div#IDX-hvAddress-group').append($('input#IDX-hvCityState'));
			$('div#IDX-hvAddress-group input#IDX-hvCityState').attr('type','hidden').addClass('IDX-hide');
			$('div#IDX-hvAddress-group').append($('input#IDX-hvZipcode'));
			$('div#IDX-hvAddress-group input#IDX-hvZipcode').attr('type','hidden').addClass('IDX-hide');
			$('div#IDX-hvCityState-group, div#IDX-hvZipcode-group').remove();
		}else { //Contact Page
			$('h2#IDX-contactHeader + hr').remove();
			$('h2#IDX-contactHeader').remove();
			var contactFormTitle = <?php echo json_encode($cformTitle); ?>;
			var contactFormText = <?php echo json_encode($cformText); ?>;
			$('div#IDX-contactFormWrap').prepend('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-size-two"><div class="title-sep-container title-sep-container-left"><div class="title-sep"></div></div><h2 class="title-heading-center">'+contactFormTitle+'</h2><div class="title-sep-container title-sep-container-right"><div class="title-sep"></div></div></div><div class="fusion-clearfix">'+contactFormText+'</div>');
			$('div#IDX-contactFormWrap').removeClass('col-lg-6 col-md-8').addClass('col-lg-8 col-md-7 col-sm-12 col-xs-12');
			$('div#IDX-contactFormWrap + div').removeClass('col-lg-6 col-md-4').addClass('col-lg-4 col-md-5 col-sm-12 col-xs-12');
			$('h3.IDX-contactAccountHeader').wrapInner('<h4 class="IDX-contactAccountHeader">');
			$('h4.IDX-contactAccountHeader').unwrap();
			$('div#IDX-contactAccountInfo').wrapInner('<ul class="fusion-checklist" style="font-size:20px;line-height:34px;">');
			if($('div#IDX-contactAddress').length > 0) {
				$('div#IDX-contactAddress, div#IDX-contactCityStateZip').wrapAll('<li id="IDX-contactAddressWrap" class="fusion-li-item"><div class="fusion-li-item-content" style="margin-left:48px;">');
				$('#IDX-contactAddressWrap').prepend('<span style="height:34px;width:34px;margin-right:14px;" class="icon-wrapper circle-no"><i class="fusion-li-icon fa-map-marker-alt fal" aria-hidden="true"></i></span>');
			} else if($('div#IDX-contactCityStateZip').length > 0) {
				$('div#IDX-contactCityStateZip').wrap('<li id="IDX-contactAddressWrap" class="fusion-li-item"><div class="fusion-li-item-content" style="margin-left:48px;">');
				$('#IDX-contactAddressWrap').prepend('<span style="height:34px;width:34px;margin-right:14px;" class="icon-wrapper circle-no"><i class="fusion-li-icon fa-map-marker-alt fal" aria-hidden="true"></i></span>');
			}
			if($('div#IDX-contactPhone').length > 0) {
				$('div#IDX-contactPhone').wrap('<li id="IDX-contactPhoneWrap" class="fusion-li-item"><div class="fusion-li-item-content" style="margin-left:48px;">');
				$('#IDX-contactPhoneWrap').prepend('<span style="height:34px;width:34px;margin-right:14px;" class="icon-wrapper circle-no"><i class="fusion-li-icon fa-phone-rotary fal" aria-hidden="true"></i></span>');
			}
			if($('div#IDX-contactPhone2').length > 0) {
				$('div#IDX-contactPhone2').wrap('<li id="IDX-contactPhone2Wrap" class="fusion-li-item"><div class="fusion-li-item-content" style="margin-left:48px;">');
				$('#IDX-contactPhone2Wrap').prepend('<span style="height:34px;width:34px;margin-right:14px;" class="icon-wrapper circle-no"><i class="fusion-li-icon fa-phone-rotary fal" aria-hidden="true"></i></span>');
			}
			if($('div#IDX-contactFax').length > 0) {
				$('div#IDX-contactFax').wrap('<li id="IDX-contactFaxWrap" class="fusion-li-item"><div class="fusion-li-item-content" style="margin-left:48px;">');
				$('#IDX-contactFaxWrap').prepend('<span style="height:34px;width:34px;margin-right:14px;" class="icon-wrapper circle-no"><i class="fusion-li-icon fa-fax fal" aria-hidden="true"></i></span>');
			}
			if($('div#IDX-contactAddl').length > 0) {
				$('div#IDX-contactAddl').wrap('<li id="IDX-contactAddlWrap" class="fusion-li-item"><div class="fusion-li-item-content" style="margin-left:48px;">');
				$('#IDX-contactAddlWrap').prepend('<span style="height:34px;width:34px;margin-right:14px;" class="icon-wrapper circle-no"><i class="fusion-li-icon fa-comment fal" aria-hidden="true"></i></span>');
			}
			if($('li#IDX-contactPhoneWrap').length > 0) {
				$('li#IDX-contactPhoneWrap div#IDX-contactPhone > span').text('<?php echo $phone; ?>');
			}
			if($('li#IDX-contactPhone2Wrap').length > 0) {
				$('li#IDX-contactPhone2Wrap div#IDX-contactPhone2 > span').text('<?php echo $phoneAlt; ?>');
			}
			var social = <?php echo json_encode($social); ?>;
			$('div#IDX-contactInformation').append(social);
			if($('div#IDX-contactAddress').length > 0) {
				var street = $('div#IDX-contactAddress').text().trim().split(' ').join('+');
				var city = $('span#IDX-contactCity').text().trim().split(' ').join('+');
				var state = $('span#IDX-contactState').text().trim();
				var zip = $('span#IDX-contactZip').text().trim();
				var map = street + '+' + city + ',' + state + '+' + zip;
				var mapIcon = <?php echo json_encode($smallIcon); ?>;
				var mapKey = <?php echo json_encode(AA_GOOGLE_API_KEY); ?>;
				$('div#IDX-contactInformation').append('<img width="300" height="200" src="https://maps.googleapis.com/maps/api/staticmap?key='+mapKey+'&language=en&center='+map+'&maptype=roadmap&zoom=14&size=300x200&markers=icon:'+mapIcon+'|'+map+'&amp;scale=2" />');
			}
		}

		//select an agent
		if($('select#IDX-agentOwner').length > 0) {
			$('select#IDX-agentOwner').wrap('<div id="IDX-agentOwner-select-wrap" class="IDX-select-wrap">');
			$('#IDX-agentOwner-select-wrap').append('<div class="IDX-select-arrow"><i class="fal fa-chevron-down" aria-hidden="true"></i></div>');
			$('select#IDX-agentOwner > option:first-of-type').text('<?php echo $agentFieldText; ?>');
			$('form#IDX-homevaluationContactForm div#IDX-agentOwner-group').removeClass('col-sm-6').addClass('col-sm-12');
			$('form#IDX-scheduleshowingContactForm div#IDX-agentOwner-group').removeClass('col-sm-6 col-md-6 col-lg-3').addClass('col-sm-12');
			$('form#IDX-moreinfoContactForm div#IDX-agentOwner-group').removeClass('col-sm-6').addClass('col-sm-12');
			$('form#IDX-contactContactForm div#IDX-agentOwner-group').removeClass('col-sm-6').addClass('col-sm-12');
		}
	});
</script>

