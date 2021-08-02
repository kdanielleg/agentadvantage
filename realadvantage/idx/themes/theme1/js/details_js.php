<?php 

$layout = ar_listings_layout_theme1();

$tabsShortcode = do_shortcode('[fusion_tabs design="classic" layout="horizontal" justified="yes" backgroundcolor="" inactivecolor="" bordercolor="" icon="" icon_position="" icon_size="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="arListings-detailsTabs"][fusion_tab title="Schools" icon=""]<div id="arListing-schools"></div>[/fusion_tab][fusion_tab title="Walkscore" icon=""]<div id="arListing-walkscore"></div>[/fusion_tab][fusion_tab title="Overview" icon=""]<div id="arListing-overview"></div>[/fusion_tab][/fusion_tabs]');


$agentImage = false;
if(have_rows('settings_theme1')) :
	while(have_rows('settings_theme1')): the_row();
		if(have_rows('details')) :
			while(have_rows('details')): the_row();
				$imageID = get_sub_field('agent_image');
				$agentImageArr = wp_get_attachment_image_src($imageID, 'fusion-1200', false);
				$agentImage = $agentImageArr[0];
				$hideSchools = get_sub_field('hide_schools');
				$mlsCleanup = get_sub_field('extra_disclaimer_rule');
			endwhile;
		endif;
	endwhile;
endif;
if($hideSchools):
	$tabsShortcode = do_shortcode('[fusion_tabs design="classic" layout="horizontal" justified="yes" backgroundcolor="" inactivecolor="" bordercolor="" icon="" icon_position="" icon_size="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="arListings-detailsTabs"][fusion_tab title="Walkscore" icon=""]<div id="arListing-walkscore"></div>[/fusion_tab][fusion_tab title="Overview" icon=""]<div id="arListing-overview"></div>[/fusion_tab][/fusion_tabs]');
endif;
$tabs = str_replace('"', "'", $tabsShortcode);
$tabs = preg_replace('~>\\s+<~m', '><', $tabs);	
?>
<script>
	jQuery(document).ready(function($){
		//hide schools
		<?php if($hideSchools): ?>
			var hideSchools = true;
		<?php else: ?>
			var hideSchools = false;
		<?php endif; ?>;
		//disclaimer and courtesy
		$('div#ar-idx-disclaimer').append($('div#IDX-main > div:last-child'));
		$('div#ar-idx-disclaimer').prepend($('div#IDX-detailsWrapper + div'));
		$('div#IDX-detailsWrapper + hr').remove();

		//add layout html
		var layout = <?php echo json_encode($layout); ?>;
		$('div#IDX-detailsWrapper').prepend(layout);

		//main image
		var noImages = 0;
		var imageCount="";
		if($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-1').length>0 && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-1 img').attr('data-src') != 'https://s3.amazonaws.com/mlsphotos.idxbroker.com/defaultNoPhoto/noPhotoFull.png'){
			$('#arListings-mainImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-1').clone());
  		}else {
  			$('#arListings-mainImg').append($('div#IDX-primaryPhoto a.IDX-thumbnail').clone());
  			$('#arListings-mainImg').addClass('ar-noImages');
  			noImages = true;
  		}
  		if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-8').length>0) {
  			imageCount = 8;
  		}else if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-7').length>0) {
  			imageCount = 7;
  		}else if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-6').length>0) {
  			imageCount = 6;
  		}else if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-5').length>0) {
  			imageCount = 5;
  		}else if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-4').length>0) {
  			imageCount = 4;
  		}else if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-3').length>0){
  			imageCount = 3;
  		}else if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-2').length>0){
  			imageCount = 2;
  		}else if(!noImages && $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-1').length>0){
  			imageCount = 1;
  		}
  		var imageType = 'file';
  		if(!noImages) {
  			var imageFileCheck = $('div#IDX-detailsShowcaseSlides .IDX-detailsImage-1 img').attr('data-src').match(/(.+)\.(.+)/);
			var extension = imageFileCheck[2];
			if(extension) {
				switch(extension) {
        			case 'jpg':
        			case 'png':
        			case 'gif':
        			case 'jpeg':
            			imageType = 'img';
        			break;
        			default:
            			imageType = 'file';
    			}
    		}
    	}

  		var splashStatus = $('.IDX-field-propStatus span.IDX-text').text().trim();
  		var statusCheck = splashStatus.split('-');
  		if (statusCheck[0].trim() == 'Under Contract') {
  			splashStatus = statusCheck[0];
  		}
		$('#arListings-mainImg').append('<div id="arListing-splashStatus">'+splashStatus+'</div>');

		//splash boxes
		var price = $('.IDX-field-price .IDX-text').text().trim();
		$('#arListings-splashOne .splashInfo-count').text(price);
		var splashTwo="";
		var splashTwoLabel="";
		var splashThree="";
		var splashThreeLabel="";
		var splashOneIcon='<i class="fal fa-tag"></i>';
		var splashTwoIcon="";
		var splashThreeIcon="";
		if($('div#IDX-detailsMainInfo .IDX-field-bedrooms').length) {
			splashTwo = $('div#IDX-detailsMainInfo .IDX-field-bedrooms span.IDX-text').text().trim();
			splashTwoLabel = "Beds";
			splashTwoIcon = '<i class="fal fa-bed-alt"></i>';
			splashThree = $('div#IDX-detailsMainInfo .IDX-field-totalBaths span.IDX-text').text().trim();
			splashThreeLabel = "Baths";
			splashThreeIcon = '<i class="fal fa-toilet-paper"></i>';
		} else if($('div#IDX-detailsMainInfo .IDX-field-sqft').length && $('div#IDX-detailsMainInfo .IDX-field-acres').length) {
			splashTwo = $('div#IDX-detailsMainInfo .IDX-field-sqft span.IDX-text').text().trim();
			splashTwoLabel = "Sq Ft";
			splashTwoIcon = '<i class="fal fa-ruler-combined"></i>';
			splashThree = $('div#IDX-detailsMainInfo .IDX-field-acres span.IDX-text').text().trim();
			splashThreeLabel = "Acres";
			splashThreeIcon = '<i class="fal fa-leaf"></i>';
		} else if($('div#IDX-detailsMainInfo .IDX-field-acres').length) {
			splashTwo = $('div#IDX-detailsMainInfo .IDX-field-acres span.IDX-text').text().trim();
			splashTwoLabel = "Acres";
			splashTwoIcon = '<i class="fal fa-leaf"></i>';
			splashThree = $('div#IDX-detailsMainInfo .IDX-field-listingID span.IDX-text').text().trim();
			splashThreeLabel = "Listing ID";
			splashThreeIcon = '<i class="fal fa-home-alt"></i>';
		} else {
			splashTwo = $('div#IDX-detailsMainInfo .IDX-field-listingID span.IDX-text').text().trim();
			splashTwoLabel = "Listing ID";
			splashTwoIcon = '<i class="fal fa-home-alt"></i>';
			splashThree = $('div#IDX-detailsMainInfo .IDX-field-propType span.IDX-text').text().trim();
			splashThreeLabel = "Type";
			splashThreeIcon = '<i class="fal fa-mailbox"></i>';
		}
		$('#arListings-splashTwo .splashInfo-count').text(splashTwo);
		$('#arListings-splashTwo .splashInfo-label').text(splashTwoLabel);
		$('#arListings-splashThree .splashInfo-count').text(splashThree);
		$('#arListings-splashThree .splashInfo-label').text(splashThreeLabel);
		
		//splash box images
		if(!noImages && imageCount>3) {
			$('#arListings-splashOne .arListings-splashImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-2').clone());
			$('#arListings-splashTwo .arListings-splashImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-3').clone());
			$('#arListings-splashThree .arListings-splashImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-4').clone());	
  		} else if(!noImages && imageCount===3) {
			$('#arListings-splashOne .arListings-splashImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-2').clone());
			$('#arListings-splashTwo .arListings-splashImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-3').clone());
			$('#arListings-splashThree .arListings-splashImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-1').clone());	
  		} else {
  			$('#arListings-splashOne .arListings-splashImg').append(splashOneIcon);
			$('#arListings-splashTwo .arListings-splashImg').append(splashTwoIcon);
			$('#arListings-splashThree .arListings-splashImg').append(splashThreeIcon);
  		}
  		$('#arListings-rowOne img').unwrap().removeAttr('style');
		$('.arListings-splashImg, div#arListings-mainImg:not(.ar-noImages)').each(function(){
			var splashImgsrc = $(this).find($('img')).attr('src');
			$(this).attr('style','background-image:url('+splashImgsrc+');');
			$(this).find($('img')).remove();
		});		
		//description panel
		$('#arListings-address h1').append($('.IDX-detailsAddressInfo').html());
		$('#arListings-address h5').append($('.IDX-detailsAddressLocationInfo').html());
		$('div#arListings-address span.IDX-detailsAddressState').text($('div#arListings-address span.IDX-detailsAddressStateAbrv').text()+' ');
		$('div#arListings-address span.IDX-detailsAddressStateAbrv').remove();
		$('div#arListings-address span.IDX-detailsEndAddressComma').remove();
		//white diamond description fix
		var desc = $('div#IDX-description').text().trim();
		$('#arListings-description p').append(desc);
		$('div#IDX-description').remove();
		if($('div#IDX-detailsCourtesyOffice').length>0) {
			$('#arListings-description').append('<p>'+$('div#IDX-detailsCourtesyOffice').html()+'</p>');
		}
		if($('div#IDX-openHouses').length>0) {
			$('div#arListings-rowTwo').after('<div id="arListingsRow-openHouse" class="fusion-clearfix"><div id="arListings-openHouse" class="fusion-clearfix"></div></div>');
			$('#arListings-openHouse').append($('div#IDX-openHouses'));
			$('h3#IDX-openHouseHeader').wrap('<div id="ar-openHouseTitleWrap">');
			$('a#IDX-ohMoreInfo').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-default-span fusion-button-default-type').wrapInner('<span class="fusion-button-text">');
		}
		$('#arListings-share').append($('div#IDX-sharethis'));
		$('#arListings-actions').append($('.IDX-detailsHotAction, div#IDX-detailsActionSave'));
		$('div#IDX-detailsHotAction-contact').remove();
		$('a#IDX-scheduleShowing').attr('ID','arIDX-scheduleShowing').attr('href','#arListings-rowSix');
		$('.IDX-detailsHotAction > a, div#IDX-detailsActionSave > a, div#IDX-detailsActionSave > span').removeClass('IDX-btn IDX-btn-default').addClass('fusion-button button-flat button-large button-default fusion-button-span-yes fusion-button-default-type').wrapInner('<span class="fusion-button-text">');
		$('div#arListings-actions > div').removeClass('IDX-detailsHotAction').removeClass('IDX-topAction');
		$('a#IDX-saveProperty').removeAttr('href');
		$('a#arIDX-scheduleShowing').addClass('fusion-one-page-text-link');

		
		

		//gallerypanel
		if(noImages) {
			$('div#arListings-gallery').html('<!--No Images Available -->');
		}else if(imageCount==1) {
			$('div#arListings-gallery').html('<!--No Gallery Available -->');
		}else {
			if(imageCount<7){
				$('#arListings-galleryImgGrp').remove();
				if(imageCount==2){
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-2, div#IDX-detailsShowcaseSlides .IDX-detailsImage-1').clone());
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg > a').wrap('<div class="fusion-layout-column fusion-one-half">');
				}else if(imageCount==3){
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-2, div#IDX-detailsShowcaseSlides .IDX-detailsImage-3').clone());
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg > a').wrap('<div class="fusion-layout-column fusion-one-third">');
				}else {
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-2, div#IDX-detailsShowcaseSlides .IDX-detailsImage-3, div#IDX-detailsShowcaseSlides .IDX-detailsImage-4').clone());
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg > a').wrap('<div class="fusion-layout-column fusion-one-third">');
				}
				$('#arListings-galleryBtnGrp .arListings-galleryGroupBtn').append($('div#IDX-detailsGalleryAction'));
			}else {
				if(imageCount==7) {
					$('#arListings-galleryImgGrp').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-1, div#IDX-detailsShowcaseSlides .IDX-detailsImage-2, div#IDX-detailsShowcaseSlides .IDX-detailsImage-3, div#IDX-detailsShowcaseSlides .IDX-detailsImage-4').clone());
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-5, div#IDX-detailsShowcaseSlides .IDX-detailsImage-6, div#IDX-detailsShowcaseSlides .IDX-detailsImage-7').clone());
				}else {
					$('#arListings-galleryImgGrp').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-2, div#IDX-detailsShowcaseSlides .IDX-detailsImage-3, div#IDX-detailsShowcaseSlides .IDX-detailsImage-4, div#IDX-detailsShowcaseSlides .IDX-detailsImage-5').clone());
					$('#arListings-galleryBtnGrp .arListings-galleryGroupImg').append($('div#IDX-detailsShowcaseSlides .IDX-detailsImage-6, div#IDX-detailsShowcaseSlides .IDX-detailsImage-7, div#IDX-detailsShowcaseSlides .IDX-detailsImage-8').clone());
				}
				$('#arListings-galleryBtnGrp .arListings-galleryGroupImg > a').wrap('<div class="fusion-layout-column fusion-one-third">');
				$('#arListings-galleryImgGrp > a').wrap('<div class="fusion-layout-column fusion-one-fourth">');
				$('#arListings-galleryBtnGrp .arListings-galleryGroupBtn').append($('div#IDX-detailsGalleryAction'));
			}
			$('#arListings-gallery img').unwrap().removeAttr('style');
			if(imageType == 'img') {
				$('#arListings-gallery img').each(function(){
					$(this).wrap('<a href="'+$(this).attr('data-src')+'" class="fusion-lightbox arListings-galleryImg" data-rel="iLightbox[propGallery]">');
				});
			}else {
				$('#arListings-gallery img').each(function(){
					$(this).wrap('<a href="'+$(this).attr('data-src')+'" class="arListings-galleryImg" target="lightbox" rel="iLightbox[propGallery]" data-rel="iLightbox[propGallery]">');
				});
			}
			$('#arListings-gallery img').each(function(){
				$(this).wrap('<div class="arListings-galleryImgBox" style="background-image:url('+$(this).attr('data-src')+')">');
				$(this).remove();

			});
		}
		$('div#IDX-detailsMedia + hr, div#IDX-detailsMedia').remove();
		$('a#IDX-photoGalleryLink').removeClass('IDX-btn IDX-btn-default').wrapInner('<div id="ar-galleryLink"><span id="ar-galleryLink-text">')
		$('#ar-galleryLink').prepend('<span id="ar-galleryLinkIcon"><i class="fal fa-camera-retro"></i></span>');

		//map
		$('div#IDX-detailsAddress span.IDX-detailsAddressState').text($('div#IDX-detailsAddress span.IDX-detailsAddressStateAbrv').text()+' ');
		$('div#IDX-detailsAddress span.IDX-detailsAddressStateAbrv').remove();
		$('div#IDX-detailsAddress span.IDX-detailsAddressCity').text($('div#IDX-detailsAddress span.IDX-detailsAddressCity').text().trim()+', ');
		$('div#IDX-detailsAddress .IDX-detailsAddressInfo span.IDX-detailsEndAddressComma').remove();
		$('div#IDX-detailsAddress .IDX-detailsAddressLocationInfo > span').wrapAll('<div id="arIDX-detailsAddressLocationInfoClean">');
		var map_city = $('div#arListings-address h1.title-heading-center').text().trim();
		var map_location = $('div#IDX-detailsAddress #arIDX-detailsAddressLocationInfoClean').text().trim();
		var map_address = map_city+' '+map_location;
		$('#arListings-map #ar_wc_mapDetails').attr('data-arwc', map_address);
		$('div#IDX-detailsMap').remove();
		
		//details tabs
		$('.IDX-fieldOneColumn.IDX-hopoZoning').remove();
		var tabs = <?php echo json_encode($tabs); ?>;
		$('#arListings-details').append(tabs);
		$('#arListing-overview').html($('div#IDX-detailsMainInfo'));
		//schools and walkscore
		$('#arListing-walkscore').append($('div#IDX-walkscoreContainer'));
		if(!hideSchools) {
			$('#arListing-schools').append($('div#IDX-detailsContainer-greatSchools'));
			$('div#IDX-detailsContainer-greatSchools').removeClass('IDX-panel IDX-panel-default');
			$('div#IDX-detailsContainer-greatSchools > div.IDX-panel-heading').remove();
			$('div#IDX-detailsContainer-greatSchools > div.IDX-panel-body > br.IDX-clear').remove();
			$('div#IDX-panel-body-greatSchools').unwrap().removeClass('IDX-panel-collapse IDX-collapse IDX-in').removeAttr('data-role');
			$('div#IDX-detailsContainer-body-greatSchools').removeClass('IDX-fieldTwoColumn');
		}


		$('div#IDX-fieldsWrapper > .IDX-fieldContainer').each(function(){
			var tabID = $(this).attr('ID');
			var tabTitle = $(this).find($('h4.IDX-panel-title')).text().trim();
			var sectionTitle = $(this).find($('h4.IDX-panel-title')).text().trim();
			var tabTitleArray = tabTitle.split(' ');
			var tabTitleEnd = tabTitleArray.pop();
			switch(tabTitleEnd) {
        		case 'Features':
        		case 'features':
        		case 'Information':
        		case 'information':
        		case 'Info':
        		case 'info':
        		case 'Details':
        		case 'details':
            		tabTitle = tabTitleArray.join(' ');
        		break;
        		default:
            		tabTitle = tabTitle;
    		}
			var tabBody = $(this).find($('.IDX-panel-body'));
			$('div#arListings-detailsTabs div.nav:not(.fusion-mobile-tab-nav) ul.nav-tabs').append('<li><a class="tab-link" data-toggle="tab" id="fusion-tab-' + tabID + '" href="#tab-' + tabID + '"><h4 class="fusion-tab-heading" data-fontsize="24" data-lineheight="28">' + tabTitle + '</h4></a></li>');
			$('div#arListings-detailsTabs .tab-content').append('<div class="nav fusion-mobile-tab-nav"><ul class="nav-tabs nav-justified"><li><a class="tab-link" data-toggle="tab" id="mobile-fusion-tab-' + tabID + '" href="#tab-' + tabID + '"><h4 class="fusion-tab-heading" data-fontsize="24" data-lineheight="28">' + tabTitle + '</h4></a></li></ul></div>');
			$('div#arListings-detailsTabs .tab-content').append('<div class="tab-pane fade fusion-clearfix" id="tab-' + tabID + '"></div>');
			$(this).find($('.IDX-panel-heading h4.IDX-panel-title')).text(sectionTitle);
			$(this).find($('.IDX-panel-heading')).removeAttr('role');
			$(this).find($('.IDX-panel-body')).unwrap();

			$('div#arListings-detailsTabs .tab-content #tab-' + tabID).append($(this));
		});

		$('div#IDX-detailsMainInfo .IDX-field-propStatus.IDX-field').after($('div#IDX-detailsMainInfo .IDX-field-listingID.IDX-field'));
		$('div#IDX-detailsMainInfo .IDX-panel-heading').append('<h4 class="IDX-panel-title" data-fontsize="16" data-lineheight="19">Property Overview</h4>');
		$('div#IDX-detailsMainInfo .IDX-field-propType.IDX-field').unwrap();

		var overview = $('div#IDX-detailsMainInfo .IDX-panel-body > div');
		overview.slice(overview.length/2+1,overview.length).wrapAll('<div class="IDX-fieldContainerList IDX-fieldContainerListRight">');
		$('div#IDX-detailsMainInfo .IDX-panel-body > div:not(.IDX-fieldContainerList)').wrapAll('<div class="IDX-fieldContainerList IDX-fieldContainerListLeft">');

		//contact form
		$('#arListings-contactForm').append($('div#IDX-detailsContactForm'));
		$('div#IDX-detailsContactForm .IDX-leadFormText').removeClass('IDX-well');
		$('div#IDX-detailsContactForm .IDX-leadFormText').html('<p>' + $('div#IDX-detailsContactForm .IDX-leadFormText').text().trim() + '</p>');
		$('div#IDX-detailsContactForm button#IDX-resetBtn').unwrap().remove();
		$('div#IDX-detailsContactForm button#IDX-submitBtn').unwrap().removeClass('IDX-btn IDX-btn-default IDX-btn-block').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-default-span fusion-button-default-type').wrapInner('<span class="fusion-button-text">');
		$('div#IDX-detailsContactForm .IDX-form-actions').removeClass('IDX-row');
		//placeholders
		$('div#IDX-detailsContactForm input#IDX-firstName').attr('placeholder','First Name*');
		$('div#IDX-detailsContactForm input#IDX-lastName').attr('placeholder','Last Name*');
		$('div#IDX-detailsContactForm input#IDX-email').attr('placeholder','Email Address*');
		$('div#IDX-detailsContactForm input#IDX-phone').attr('placeholder','Phone Number');
		$('div#IDX-detailsContactForm input#IDX-firstDate').attr('placeholder','Preferred Date');
		$('div#IDX-detailsContactForm input#IDX-secondDate').attr('placeholder','Alternate Date');
		$('div#IDX-detailsContactForm select#IDX-firstTime').prepend('<option selected>Time</option>');
		$('div#IDX-detailsContactForm select#IDX-secondTime').prepend('<option selected>Time</option>');
		$('div#IDX-detailsContactForm textarea#IDX-message').attr('placeholder','Your comments or questions...');

		//structure
		$('div#IDX-detailsContactForm div#IDX-firstName-group, div#IDX-detailsContactForm div#IDX-lastName-group, div#IDX-detailsContactForm div#IDX-phone-group').wrapAll('<div class="col-sm-12"><div class="IDX-row">');
		$('div#IDX-detailsContactForm div#IDX-firstName-group, div#IDX-detailsContactForm div#IDX-lastName-group').wrapAll('<div class="col-sm-12 col-md-6"><div class="IDX-row">');
		$('div#IDX-detailsContactForm div#IDX-email-group').removeClass('col-sm-6').addClass('col-sm-12');
		$('.IDX-showingDates').addClass('IDX-row').wrap('<div class="col-sm-12 col-md-6">');

		//add nav
		if($('div#IDX-detailsActionBack').length>0) {
			$('#arListings-nav').append($('div#IDX-detailsActionBack'));
		}else {
			$('#arListings-nav').append($('div#IDX-detailsActionNew'));
		}
		$('div#IDX-detailsTopNav').remove();

		//similar listings
		$('div#IDX-similar-listings-data, h2#IDX-similar-listings-title, div#IDX-similar-listings-result').wrapAll('<div id="arIDX-similar-listings">');
		$('#arListings-props').append($('#arIDX-similar-listings'));
		$('h2#IDX-similar-listings-title').wrap('<div id="ar-similarListings-title">');

		//cleanup
		$('div#arListings + div#IDX-details-row-content, div#IDX-fieldsWrapper').remove();
		$('div#arListings-nav a').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-default-span fusion-button-default-type').removeClass('IDX-btn IDX-btn-default').wrapInner('<span class="fusion-button-text">').wrap('<div class="fusion-button-wrapper">');
		$('a#IDX-newSearch').attr('ID','arIDX-newSearch');
		$('a#arIDX-newSearch span.fusion-button-text').text('Search More Properties');

		//fix courtesy text
		if($('div#IDX-detailsCourtesy').length > 0) {
			$('div#arListings-description').append('<p id="arIDX-detailsCourtesy">' + $('div#IDX-detailsWrapper div#IDX-detailsCourtesy').text().trim() + '</p>');
			$('div#IDX-detailsWrapper div#IDX-detailsCourtesy').remove();
		}
		$('.IDX-mlsSelectorRulesCourtesy + hr').remove();
		//clean up similar listings
		$('.IDX-similar-listings--item').waitUntilExists(function(){
			$(this).find($('span.IDX-text.IDX-similar-listings--address-city')).before('<br>');
		});
	});
</script>

<?php if($agentImage) : ?>
	<style>
		#arListings-contactImg {
			background-image: url(<?php echo $agentImage; ?>);
		}
	</style>
<?php endif;
if($mlsCleanup) : ?>
	<script>jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').prepend($('<?php echo $mlsCleanup; ?>'));
	});</script>
<?php endif;