<?php //search display functions

function arwc_search_intro_div() {
	$ptIcons = '';
	$navStyles = '';
	$titleStyles = '';
	if(have_rows('settings_idxCustom')) :
		while(have_rows('settings_idxCustom')): the_row();
			if(have_rows('search')):
				while(have_rows('search')): the_row(); ?>
					<?php if(have_rows('pt_icons')):
						while(have_rows('pt_icons')): the_row();
							$ptIcons .= 'arwc-pt-'.get_sub_field('id').'="'.get_sub_field('icon').'" ';
						endwhile;
					endif;
					$navFields = get_sub_field('menu');
					$navStyles = 'arwc-nav-bg="'.$navFields['bg'].'" arwc-nav-bgh="'.$navFields['hover_bg'].'" arwc-nav-col="'.$navFields['color'].'" arwc-nav-hcol="'.$navFields['hover_color'].'" arwc-nav-tag="'.$navFields['tag'].'" ';
					$titleFields = get_sub_field('title');
					$titleStyles = 'arwc-title-tag="'.$titleFields['tag'].'" arwc-title-line-style="'.$titleFields['line_style'].'" arwc-title-line-type="'.$titleFields['line_type'].'" arwc-title-line-color="'.$titleFields['line_color'].'" ';
				endwhile;
			endif;
		endwhile;
	endif; ?>
	<div id="arIDX-main" class="arIDXmainSearch" <?php echo $ptIcons; ?> <?php echo $navStyles; ?> <?php echo $titleStyles; ?>>
<?php }