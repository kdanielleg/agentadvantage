<?php
/**
 * Listings except content template
 *
 * @package BDP/Themes/Default/Templates/Excerpt Content
 */

// phpcs:disable

if(get_field('ar_client_directory_tpl','option') == 'ballesterosgroup') : ?>
	<div class="fusion-clearfix agentrep-vendor" id="arVendor-<?php echo $listing_id; ?>">
		<div class="arVendor-wrap fusion-clearfix">
			<div class="fusion-one-fourth one_fourth fusion-layout-column fusion-spacing-yes">
				<?php if ( $images->thumbnail ): ?>
					<?php echo $images->main->html; ?>
				<?php endif; ?>
				<div class="arVendor-type"><span><?php echo $fields->business_genre->value; ?></span></div>
			</div>
			<div class="fusion-three-fourth three_fourth fusion-layout-column fusion-spacing-yes fusion-column-last">
				<h4 class="arVendor-title"><?php echo $title; ?></h4>
				<?php if($fields->id12){ ?>
					<h5 class="arVendor-companyName"><?php echo $fields->id12->value; ?></h5>
				<?php } ?>
				<?php if($fields->id13){ ?>
					<h6 class="arVendor-company"><?php echo $fields->id13->value; ?></h6>
				<?php } ?>
				<div class="arVendor-contact fusion-clearfix">
					<div class="fusion-one-half fusion-layout-column fusion-spacing-yes">
						<?php if($fields->id6->value){ ?>
							<div class="arVendor-phones arVendor-officePhone"><i class="fal fa-phone-alt"></i><span><?php echo $fields->id6->value; ?></span></div>
						<?php } ?>
						<?php if($fields->id8->value){ ?>
							<div class="arVendor-contact arVendor-contactEmail"><i class="fal fa-envelope-open-text"></i><span><a href="mailto:<?php echo $fields->id8->value; ?>" target="_blank"><?php echo $fields->id8->value; ?></a></span></div>
						<?php } ?>
					</div>
					<div class="fusion-one-half fusion-layout-column fusion-spacing-yes fusion-column-last">
						<?php if($fields->id5->value){ ?>
							<div class="arVendor-contact arVendor-contactWeb"><i class="fal fa-link"></i><span><?php echo $fields->id5->value; ?></span></div>
						<?php } ?>
						<?php if($fields->id14->value){ ?>
							<div class="arVendor-contact arVendor-contactAddress"><i class="fa-map-marker-alt fas"></i><span><?php echo $fields->id14->value; ?></span></div>
						<?php } ?>
					</div>
				</div>
				<div class="arVendor-button fusion-clearfix">
					<div class="fusion-button-wrapper fusion-alignright">
						<a class="fusion-modal-text-link fusion-button button-flat fusion-button-pill button-large button-default" data-toggle="modal" data-target=".fusion-modal.arVendor_<?php echo $listing_id; ?>_modal" href="#" style="color: #ffffff;">
							<span class="fusion-button-text">Learn More</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="arVendor-modal">
			<?php echo do_shortcode('[fusion_modal name="arVendor_'.$listing_id.'_modal" title="'.$title.'" size="large" background="#ffffff" border_color="" show_footer="yes" class="" id=""]'.get_the_content().'[/fusion_modal]'); ?>
		</div>
	</div>
<?php else : ?>
	<div class="fusion-clearfix agentrep-vendor" id="arVendor-<?php echo $listing_id; ?>">
		<div class="arVendor-wrap fusion-clearfix">
			<div class="fusion-one-fourth one_fourth fusion-layout-column fusion-spacing-yes">
				<?php if ( $images->thumbnail ): ?>
					<?php echo $images->main->html; ?>
				<?php endif; ?>
				<div class="arVendor-type"><span><?php echo $fields->business_genre->value; ?></span></div>
			</div>
			<div class="fusion-three-fourth three_fourth fusion-layout-column fusion-spacing-yes fusion-column-last">
				<h4 class="arVendor-title"><?php echo $title; ?></h4>
				<?php if($fields->id13){ ?>
					<h6 class="arVendor-company"><?php echo $fields->id13->value; ?></h6>
				<?php } ?>
				<div class="arVendor-contact fusion-clearfix">
					<div class="fusion-one-third one_third fusion-layout-column fusion-spacing-yes">
						<?php if($fields->id6->value){ ?>
							<div class="arVendor-phones arVendor-officePhone"><i class="fa-building far"></i><span><?php echo $fields->id6->value; ?></span></div>
						<?php } ?>
						<?php if($fields->id12->value){ ?>
							<div class="arVendor-phones arVendor-mobilePhone"><i class="fa-mobile-alt fas"></i><span><?php echo $fields->id12->value; ?></span></div>
						<?php } ?>
						<?php if($fields->id7->value){ ?>
							<div class="arVendor-phones arVendor-faxPhone"><i class="fa-fax fas"></i><span><?php echo $fields->id7->value; ?></span></div>
						<?php } ?>
					</div>
					<div class="fusion-two-third two_third fusion-layout-column fusion-spacing-yes fusion-column-last">
						<?php if($fields->id8->value){ ?>
							<div class="arVendor-contact arVendor-contactEmail"><i class="fa-envelope-open-text fas"></i><span><a href="mailto:<?php echo $fields->id8->value; ?>" target="_blank"><?php echo $fields->id8->value; ?></a></span></div>
						<?php } ?>
						<?php if($fields->id5->value){ ?>
							<div class="arVendor-contact arVendor-contactWeb"><i class="fa-link fas"></i><span><?php echo $fields->id5->value; ?></span></div>
						<?php } ?>
						<?php if($fields->id10->value){ ?>
							<div class="arVendor-contact arVendor-contactAddress"><i class="fa-map-marker-alt fas"></i><span><?php echo $fields->id10->value; ?></span></div>
						<?php } ?>
					</div>
				</div>
				<div class="arVendor-button fusion-clearfix">
					<div class="fusion-button-wrapper fusion-alignright">
						<a class="fusion-modal-text-link fusion-button button-flat fusion-button-pill button-large button-default" data-toggle="modal" data-target=".fusion-modal.arVendor_<?php echo $listing_id; ?>_modal" href="#" style="color: #ffffff;">
							<span class="fusion-button-text">Learn More</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="arVendor-modal">
			<?php echo do_shortcode('[fusion_modal name="arVendor_'.$listing_id.'_modal" title="'.$title.'" size="large" background="#ffffff" border_color="" show_footer="yes" class="" id=""]'.get_the_content().'[/fusion_modal]'); ?>
		</div>
	</div>
<?php endif; ?>