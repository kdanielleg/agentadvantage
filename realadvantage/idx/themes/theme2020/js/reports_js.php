<?php /**repots pages js **/ 

$titleSelect = '#mainPageHeading h1';
$subSelect = '#mainPageSubheading h4';


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