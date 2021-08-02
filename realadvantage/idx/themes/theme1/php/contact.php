<?php 

function ar_wc_hvCondition($icon) {
	ob_start(); ?>
		<h4 class="icon-radio-group-title">Condition</h4>
		<div class="switch-field">
			<input type="radio" name="hvCondition" value="Poor" id="IDX-hvCondition-radio-5" class="IDX-hvCondition-radio">
			<label for="IDX-hvCondition-radio-5" id="IDX-hvCondition-4" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">Poor</span>
			</label>
			<input type="radio" name="hvCondition" value="Needs Work" id="IDX-hvCondition-radio-4" class="IDX-hvCondition-radio">
			<label for="IDX-hvCondition-radio-4" id="IDX-hvCondition-3" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">Okay</span>
			</label>
			<input type="radio" name="hvCondition" value="Fair" id="IDX-hvCondition-radio-3" class="IDX-hvCondition-radio">
			<label for="IDX-hvCondition-radio-3" id="IDX-hvCondition-2" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">Fair</span>
			</label>
			<input type="radio" name="hvCondition" value="Good" id="IDX-hvCondition-radio-2" class="IDX-hvCondition-radio">
			<label for="IDX-hvCondition-radio-2" id="IDX-hvCondition-1" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">Good</span>
			</label>
			<input type="radio" name="hvCondition" value="Excellent" id="IDX-hvCondition-radio-1" class="IDX-hvCondition-radio">
			<label for="IDX-hvCondition-radio-1" id="IDX-hvCondition-0" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">Perfect</span>
			</label>
		</div>
	<?php $layout = str_replace('"', "'", ob_get_clean());
	$stripped = preg_replace('~>\\s+<~m', '><', $layout);
	return $stripped;
}
function ar_wc_hvBeds($icon) {
	ob_start(); ?>
		<h4 class="icon-radio-group-title">Bedrooms</h4>
		<div class="switch-field">
			<input type="radio" name="hvBedrooms" value="1" id="IDX-hvBedrooms-radio-1" class="IDX-hvBedrooms-radio">
			<label for="IDX-hvBedrooms-radio-1" id="IDX-hvBedrooms-0" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">1</span>
			</label>
			<input type="radio" name="hvBedrooms" value="2" id="IDX-hvBedrooms-radio-2" class="IDX-hvBedrooms-radio">
			<label for="IDX-hvBedrooms-radio-2" id="IDX-hvBedrooms-1" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">2</span>
			</label>
			<input type="radio" name="hvBedrooms" value="3" id="IDX-hvBedrooms-radio-3" class="IDX-hvBedrooms-radio">
			<label for="IDX-hvBedrooms-radio-3" id="IDX-hvBedrooms-2" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">3</span>
			</label>
			<input type="radio" name="hvBedrooms" value="4" id="IDX-hvBedrooms-radio-4" class="IDX-hvBedrooms-radio">
			<label for="IDX-hvBedrooms-radio-4" id="IDX-hvBedrooms-3" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">4</span>
			</label>
			<input type="radio" name="hvBedrooms" value="5" id="IDX-hvBedrooms-radio-5" class="IDX-hvBedrooms-radio">
			<label for="IDX-hvBedrooms-radio-5" id="IDX-hvBedrooms-4" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">5+</span>
			</label>
		</div>
	<?php $layout = str_replace('"', "'", ob_get_clean());
	$stripped = preg_replace('~>\\s+<~m', '><', $layout);
	return $stripped;
}
function ar_wc_hvBaths($icon) {
	ob_start(); ?>
		<h4 class="icon-radio-group-title">Bathrooms</h4>
		<div class="switch-field">
			<input type="radio" name="hvBathrooms" value="1" id="IDX-hvBathrooms-radio-1" class="IDX-hvBathrooms-radio">
			<label for="IDX-hvBathrooms-radio-1" id="IDX-hvBathrooms-0" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">1</span>
			</label>
			<input type="radio" name="hvBathrooms" value="2" id="IDX-hvBathrooms-radio-2" class="IDX-hvBathrooms-radio">
			<label for="IDX-hvBathrooms-radio-2" id="IDX-hvBathrooms-1" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">2</span>
			</label>
			<input type="radio" name="hvBathrooms" value="3" id="IDX-hvBathrooms-radio-3" class="IDX-hvBathrooms-radio">
			<label for="IDX-hvBathrooms-radio-3" id="IDX-hvBathrooms-2" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">3</span>
			</label>
			<input type="radio" name="hvBathrooms" value="4" id="IDX-hvBathrooms-radio-4" class="IDX-hvBedrooms-radio">
			<label for="IDX-hvBathrooms-radio-4" id="IDX-hvBathrooms-3" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">4</span>
			</label>
			<input type="radio" name="hvBathrooms" value="5" id="IDX-hvBathrooms-radio-5" class="IDX-hvBedrooms-radio">
			<label for="IDX-hvBathrooms-radio-5" id="IDX-hvBathrooms-4" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icon; ?>
				</span>
				<span class="icon-radio-label">5+</span>
			</label>
		</div>
	<?php $layout = str_replace('"', "'", ob_get_clean());
	$stripped = preg_replace('~>\\s+<~m', '><', $layout);
	return $stripped;
}
function ar_wc_hvPropType($icons) {
	ob_start(); ?>
		<h4 class="icon-radio-group-title">Property Type</h4>
		<div class="switch-field">
			<input type="radio" name="hvPropType" value="Single Family Residential" id="IDX-hvPropType-radio-1" class="IDX-hvPropType-radio">
			<label for="IDX-hvPropType-radio-1" id="IDX-hvPropType-0" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icons['single']; ?>
				</span>
				<span class="icon-radio-label">Single Family</span>
			</label>
			<input type="radio" name="hvPropType" value="Lots and Land" id="IDX-hvPropType-radio-2" class="IDX-hvPropType-radio">
			<label for="IDX-hvPropType-radio-2" id="IDX-hvPropType-1" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icons['land']; ?>
				</span>
				<span class="icon-radio-label">Lots &amp; Land</span>
			</label>
			<input type="radio" name="hvPropType" value="Multifamily Residential" id="IDX-hvPropType-radio-3" class="IDX-hvPropType-radio">
			<label for="IDX-hvPropType-radio-3" id="IDX-hvPropType-2" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icons['multi']; ?>
				</span>
				<span class="icon-radio-label">Multifamily</span>
			</label>
			<input type="radio" name="hvPropType" value="Rentals" id="IDX-hvPropType-radio-4" class="IDX-hvPropType-radio">
			<label for="IDX-hvPropType-radio-4" id="IDX-hvPropType-3" class="IDX-radio-inline">
				<span class="icon-radio-icon" style=" ">
					<?php echo $icons['rental']; ?>
				</span>
				<span class="icon-radio-label">Rentals</span>
			</label>
		</div>
	<?php $layout = str_replace('"', "'", ob_get_clean());
	$stripped = preg_replace('~>\\s+<~m', '><', $layout);
	return $stripped;
}
function ar_wc_contactsidebar() {
	ob_start(); 
	$showSide = false;
	if(have_rows('settings_theme1')) :
		while(have_rows('settings_theme1')): the_row();
			if(have_rows('contact')) :
				while(have_rows('contact')): the_row();
					if(have_rows('main')):
						while(have_rows('main')): the_row();
							if(have_rows('sidebar')||have_rows('contacts')||have_rows('locations')): 
								$showSide = true; ?>
								<div id="ar-idxContactSidebar">
									<?php if(have_rows('sidebar')): ?>
										<div id="ar-idxContactSidebarHeader">
											<?php while(have_rows('sidebar')): the_row(); 
												echo '<'.get_sub_field('tag').'>'.get_sub_field('text').'</'.get_sub_field('tag').'>';
											endwhile; ?>
										</div>
									<?php endif;
									if(have_rows('contacts')): 
										$contactDetails = '[fusion_checklist icon="" iconcolor="#000000" circle="no" circlecolor="" size="20px" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';
										while(have_rows('contacts')): the_row();
											if(get_sub_field('check')) :
												$link = get_sub_field('link');
												$link_url = $link['url'];
    											$link_title = $link['title'];
    											$link_target = $link['target'] ? $link['target'] : '_self';
												$contactDetails .= '[fusion_li_item icon="'.get_sub_field('icon').'"]<a href="'.$link_url.'" target="'.$link_target.'">'.$link_title.'</a>[/fusion_li_item]';
											else :
												$contactDetails .= '[fusion_li_item icon="'.get_sub_field('icon').'"]'.get_sub_field('text').'[/fusion_li_item]';
											endif;
										endwhile; 
										$contactDetails .= '[/fusion_checklist]'; ?>
										<div id="ar-idxContactSidebarDetails">
											<?php echo do_shortcode($contactDetails); ?>
										</div>
									<?php endif;
									if(have_rows('locations')): 
										$mapCount = 1; ?>
										<div id="ar-idxContactSidebarMaps">
											<?php while(have_rows('locations')): the_row();
												echo do_shortcode('[fusion_checklist icon="" iconcolor="#000000" circle="no" circlecolor="" size="20px" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""][fusion_li_item icon="'.get_sub_field('icon').'"]'.get_sub_field('address').'[/fusion_li_item][/fusion_checklist]');
												if(get_sub_field('map')) : ?>
													<div class="ar-contactSidebarMap" id="ar_wc_map<?php echo $mapCount; ?>_wrap">
														<div class="ar-contactSidebarGmap">
															<div id="ar_wc_map<?php echo $mapCount; ?>" class="ar_wc_map" data-arwc="<?php echo get_sub_field('address'); ?>" data-arwc-remove="ar_wc_map<?php echo $mapCount; ?>_wrap"></div>
														</div>
													</div>
													<?php $mapCount ++;
												endif;
											endwhile; ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endif;
						endwhile;
					endif;
				endwhile;
			endif;
		endwhile;
	endif;
	$layout = str_replace('"', "'", ob_get_clean());
	$stripped = preg_replace('~>\\s+<~m', '><', $layout);
	return array(
		'show'=>$showSide, 
		'code' => $stripped,
	);
}
