<?php /**Dynamic CSS**/ ?>
<style>
	<?php 
	if( have_rows('ar_wc_modals_theme1_styles', 'option') ):
		while( have_rows('ar_wc_modals_theme1_styles', 'option') ): the_row();
			//Fonts
			if( have_rows('fonts') ):
				while( have_rows('fonts') ): the_row();
					if(get_sub_field('input')) : ?>
					 	div#regModal-left .IDX-customRegistrationFields input,
					 	div#regModal-left .IDX-customRegistrationFields select,
						div#logModal-left div#IDX-email-group input,
						div#logModal-left div#IDX-password-group input {
    						font-family: <?php the_sub_field('input'); ?>;
						}
				 	<?php endif;
					if(get_sub_field('title')) : ?>
				 		div#registrationSignup-inner div#regModal-or,
						div#registrationLogin-inner div#logModal-or,
						h2#regModal-leftTitle, h2#logModal-leftTitle,
						h2#regModal-rightTitle, h2#logModal-rightTitle,
						div#regModal-right #IDX-social-facebook button,
						div#regModal-right #IDX-social-google button,
						div#logModal-right #IDX-social-facebook button,
						div#logModal-right #IDX-social-google button {
							font-family: <?php the_sub_field('title'); ?>;
						}
					<?php endif;
					if(get_sub_field('button')) : ?>
						div#regModal-left button#IDX-submitBtn,
						div#logModal-left button#IDX-loginSubmit,
						div#regModal-right a#IDX-toggleLogIn {
    						font-family: <?php the_sub_field('button'); ?>;
    					}
    				<?php endif;
    			endwhile;
    		endif;
    		//Button Colors
    		if(have_rows('button_colors')) :
    			while(have_rows('button_colors')): the_row();
    				//standard colors
    				$std = get_sub_field('std');
    				if($std['bg']||$std['border']||$std['text']) : ?>
    					div#regModal-left button#IDX-submitBtn, div#logModal-left button#IDX-loginSubmit {
    						<?php if($std['bg']) : ?>
    							background-color: <?php echo $std['bg']; ?>;
    						<?php endif;
    						if($std['border']) : ?>
    							border-color: <?php echo $std['border']; ?>;
    						<?php endif;
    						if($std['text']) : ?>
    							color: <?php echo $std['text']; ?>;
    						<?php endif;?>
    					}
    				<?php endif;
					//hover colors
    				$hover = get_sub_field('hover');
    				if($hover['bg']||$hover['border']||$hover['text']): ?>
    					div#regModal-left button#IDX-submitBtn:hover, div#logModal-left button#IDX-loginSubmit:hover {
    						<?php if($hover['bg']) :?>
    							background-color: <?php echo $hover['bg'];?>!important;
    						<?php endif;
    						if($hover['border']): ?>
    							border-color: <?php echo $hover['border']; ?>!important;
    						<?php endif;
    						if($hover['text']): ?>
    							color: <?php echo $hover['text']; ?>!important;
    						<?php endif; ?>
    					}
    				<?php endif;
					//secondary button
					if(get_sub_field('secondary')) : ?>
						div#regModal-right a#IDX-toggleLogIn {
							background-color: <?php the_sub_field('secondary'); ?>;
						}
					<?php endif;
				endwhile;
			endif;
			//button styes
			if(have_rows('button_styles')) : 
				while(have_rows('button_styles')): the_row();
					if(get_sub_field('weight')||get_sub_field('border')||get_sub_field('uppercase')) : ?>
						div#regModal-left button#IDX-submitBtn,
						div#logModal-left button#IDX-loginSubmit {
							<?php if(get_sub_field('weight')) : ?>
								font-weight: <?php the_sub_field('weight'); ?>;
							<?php endif;
							if(get_sub_field('border')): ?>
								border-width: <?php the_sub_field('border'); ?>px;
							<?php endif;
							if(get_sub_field('uppercase')): ?>
								text-transform: uppercase!important;
							<?php endif; ?>
						}
					<?php endif;
					if(get_sub_field('weight')||get_sub_field('uppercase')) : ?>
						div#regModal-right a#IDX-toggleLogIn,
						div#regModal-right #IDX-social-facebook button span, 
						div#regModal-right #IDX-social-google button span, 
						div#logModal-right #IDX-social-facebook button span, 
						div#logModal-right #IDX-social-google button span {
							<?php if(get_sub_field('weight')): ?>
								font-weight: <?php the_sub_field('weight'); ?>;
							<?php endif;
							if(get_sub_field('uppercase')) : ?>
								text-transform: uppercase!important;
							<?php endif; ?>
						}
					<?php endif;
				endwhile;
			endif;
			//extra colors
			if(have_rows('extra')) :
				while(have_rows('extra')): the_row();
					if(get_sub_field('input_border')): ?>
						div#regModal-left .IDX-customRegistrationFields input,
						div#regModal-left .IDX-customRegistrationFields select,
						div#logModal-left div#IDX-email-group input,
						div#logModal-left div#IDX-password-group input {
    						border-bottom-color: <?php the_sub_field('input_border'); ?>!important;
						}
					<?php endif;
					if(get_sub_field('or_color')): ?>
						div#registrationSignup-inner div#regModal-or,
						div#registrationLogin-inner div#logModal-or {
    						background-color: <?php the_sub_field('or_color'); ?>!important;
						}
					<?php endif;
					if(get_sub_field('link_color')) : ?>
						div#regModal-closeLink a:hover,
						div#logModal-closeLink a:hover {
							color: <?php the_sub_field('link_color'); ?>!important;
						}
						p#regModal-leftText a,
						p#logModal-leftText a{
    						color: <?php the_sub_field('link_color'); ?>!important;
						}
					<?php endif;
				endwhile;
			endif;
		endwhile;
	endif; ?>
</style>