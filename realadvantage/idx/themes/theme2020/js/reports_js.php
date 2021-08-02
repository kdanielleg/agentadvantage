<?php /**repots pages js **/ 

if(have_rows('settings_theme2020')) :
	while(have_rows('settings_theme2020')): the_row();
		if(have_rows('reports')) :
			while(have_rows('reports')): the_row();
				if(have_rows('reportsTitle')) :
					while(have_rows('reportsTitle')) : the_row();
						$titleSelect = '.fusion-page-title-captions h1';
						$subSelect = '.fusion-page-title-captions h3';
						$titleSelect = get_sub_field('title');
						$subSelect = get_sub_field('sub');
					endwhile;
				endif;
			endwhile;
		endif;
	endwhile;
endif;


?>

<script>
	jQuery(document).ready(function($){
		$('h2.idx-mk-report-landing-page__title').addClass('title-heading-center').wrap('<div class="fusion-title title fusion-title-center fusion-title-text fusion-title-site-two idx-mk-report-landing-page__title-wrap">').text('Real Estate Market Reports');
		$('.idx-mk-report-landing-page__title-wrap').prepend('<div class="title-sep-container title-sep-container-left"><div class="title-sep"></div></div>').append('<div class="title-sep-container title-sep-container-right"><div class="title-sep"></div></div>');
		$('.idx-mk-report-landing-page__subheader').wrapInner('<h5 class="idx-mk-report-landing-page__subheader-h5">');

		if($('.IDX-page-market-report.IDX-type-market-report').length){
			$('<?php echo $titleSelect; ?>').text($('h2.idx-mk-location-title').text());
		}
	});
</script>