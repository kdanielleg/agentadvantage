<?php /**theme1 theme base **/ ?>

<!--Hide #IDX-main until loaded -->
<style>#IDX-main, .avada-page-titlebar-wrapper{visibility:hidden!important;}</style>
<?php echo '<!-- AR IDX Global Styles'.get_field('theme').'-->'; ?> 
<style>
	<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/global.css'; ?>
</style>
<!-- add Wait until exists -->
<?php include get_stylesheet_directory().'/realadvantage/idx/js/wait_js.php'; ?>
<!-- AR IDX Wrapper Start -->
<div id="idxStart" style="display: none;"></div><div id="idxStop" style="display: none;"></div>
<?php if(get_field('page')!='base') : ?>
	<!-- AR IDX Page JS -->
	<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/js/'.get_field('page').'_js.php'; ?>
	<!-- AR IDX Page Styles -->
	<style>
		<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/css/'.get_field('page').'.css'; ?>
	</style>
<?php endif; ?>
<?php /**MODALS**/
if(get_field('ar_wrapcodes_modals','option')!='none') : ?>
	<!-- AR IDX Modals JS -->
	<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals_js.php'; ?>
	<!-- AR IDX Modals CSS -->
	<style>
		<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals.css'; ?>
	</style>
	<!-- AR IDX Modals Dynamic CSS -->
	<?php include get_stylesheet_directory().'/realadvantage/idx/modals/'.get_field('ar_wrapcodes_modals','option').'/modals_dynamic_css.php'; ?>
<?php endif; ?>
<!-- Make #IDX-main Visible -->
<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('div#IDX-thankYouWrapper + div'));
		$('#IDX-main, .avada-page-titlebar-wrapper').attr('style','visibility:visible!important;');
		$('#idxWrapDiv').remove();
	});
</script>