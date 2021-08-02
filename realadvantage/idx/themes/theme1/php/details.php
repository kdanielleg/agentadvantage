<?php 
//define listings layout
$agentImage = false;
if(have_rows('settings_theme1')) :
	while(have_rows('settings_theme1')): the_row();
		if(have_rows('details')) :
			while(have_rows('details')): the_row();
				$imageID = get_sub_field('agent_image');
				$agentImageArr = wp_get_attachment_image_src($imageID, 'fusion-1200', false);
				$agentImage = $agentImageArr[0];
			endwhile;
		endif;
	endwhile;
endif;
?>
<div id='arListings'>
	<div id='arListings-rowOne' class='fusion-clearfix'>
		<div id='arListings-rowOneLeft' class='fusion-two-fifth fusion-layout-column'>
			<div id='arListings-mainImg'></div>
		</div>
		<div id='arListings-rowOneRight' class='fusion-three-fifth fusion-layout-column'>
			<div class="row">
				<div id='arListings-splashOne' class='arListings-splashCol col-sm-12 col-md-4'>
					<div class='arListings-splashInfo'>
						<div class="arListings-splashInfoWrap">
							<div class="splashInfo-count"></div>
							<div class="splashInfo-label">Price</div>
						</div>
					</div>
					<div class='arListings-splashImg'></div>
				</div>
				<div id='arListings-splashTwo' class='arListings-splashCol col-sm-12 col-md-4'>
					<div class='arListings-splashImg'></div>
					<div class='arListings-splashInfo'>
						<div class="arListings-splashInfoWrap">
							<div class="splashInfo-count"></div>
							<div class="splashInfo-label"></div>
						</div>
					</div>
				</div>
				<div id='arListings-splashThree' class='arListings-splashCol col-sm-12 col-md-4'>
					<div class='arListings-splashInfo'>
						<div class="arListings-splashInfoWrap">
							<div class="splashInfo-count"></div>
							<div class="splashInfo-label"></div>
						</div>
					</div>
					<div class='arListings-splashImg'></div>
				</div>
			</div>
		</div>
	</div>
	<div id='arListings-rowTwo' class='fusion-clearfix'>
		<div id='arListings-rowTwoInner' class='arListings-container fusion-clearfix'>
			<div id='arListings-address'>
				<div class='fusion-title title fusion-title-3 fusion-sep-none fusion-title-text fusion-title-size-one fusion-border-below-title fusion-title-center' style='margin-top:0px;margin-bottom:0px;'><h1 class='title-heading-center' style='margin:0;' data-fontsize='40' data-lineheight='48'></h1></div>
				<div class='fusion-title title fusion-title-2 fusion-sep-none fusion-title-text fusion-title-size-five fusion-border-below-title fusion-title-center' style='margin-top:0px;margin-bottom:31px;'><h5 class='title-heading-center' style='margin:0;' data-fontsize='24' data-lineheight='28'></h5></div>
			</div>
			<div id='arListings-rowTwoInnerLeft' class="fusion-two-third fusion-layout-column fusion-spacing-yes">
				<div id='arListings-description'><p></p></div>
				<div id='arListings-share'></div>
			</div>
			<div id='arListings-rowTwoInnerRight' class="fusion-one-third fusion-layout-column fusion-spacing-yes fusion-column-last">
				<div id='arListings-actions'></div>
			</div>
		</div>
	</div>
	<div id='arListings-rowThree' class='fusion-clearfix'>
		<div id='arListings-rowThreeInner' class='fusion-clearfix'>
			<div id='arListings-map'>
				<div id="ar_wc_mapDetails" class="arListings-gmap" data-arwc-remove="arListings-map"></div>
			</div>
		</div>
	</div>
	<div id='arListings-rowFour' class='fusion-clearfix'>
		<div id='arListings-rowFourInner' class='fusion-clearfix'>
			<div id='arListings-gallery' class="fusion-clearfix">
				<div id="arListings-galleryImgGrp" class="fusion-clearfix"></div>
				<div id="arListings-galleryBtnGrp" class="fusion-clearfix">
					<div class="arListings-galleryGroupImg fusion-three-fourth fusion-layout-column"></div>
					<div class="arListings-galleryGroupBtn fusion-one-fourth fusion-layout-column"></div>
				</div>
			</div>
		</div>
	</div>
	<div id='arListings-rowFive' class='fusion-clearfix'>
		<div id='arListings-rowFiveInner' class='arListings-container  fusion-clearfix'>
			<div id='arListings-details'><div class="fusion-title title fusion-title-10 fusion-title-center fusion-title-text fusion-title-size-three" style="font-size:3rem;margin-top:0px;margin-bottom:31px;"><div class="title-sep-container title-sep-container-left"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div><h3 class="title-heading-center" style="margin:0;font-size:1em;" data-inline-fontsize="1em" data-fontsize="48" data-lineheight="57">About This Property</h3><div class="title-sep-container title-sep-container-right"><div class="title-sep sep-single sep-dotted" style="border-color:#333333;"></div></div></div></div>
		</div>
	</div>
	<div id='arListings-rowSix' class='fusion-clearfix'>
		<div id='arListings-rowSixInner' class='arListings-container fusion-clearfix'>
			<?php if($agentImage) : ?>
				<div id='arListings-rowSixInnerLeft' class='fusion-two-third fusion-layout-column fusion-spacing-yes'>
					<div id='arListings-contactForm' class="arListings-contact"></div>
				</div>
				<div id='arListings-rowSixInnerRight' class='fusion-one-third fusion-layout-column fusion-spacing-yes fusion-column-last'>
					<div id='arListings-contactImg' class="arListings-contact"></div>
				</div>
			<?php else: ?>
				<div id='arListings-rowSixInnerLeft' class='fusion-clearfix'>
					<div id='arListings-contactForm' class="arListings-contact"></div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div id='arListings-rowSeven' class='fusion-clearfix'>
		<div id='arListings-rowSevenInner' class='fusion-clearfix'>
			<div id='arListings-props'></div>
			<div id='arListings-nav'></div>
		</div>
	</div>
</div>