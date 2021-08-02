<?php /**theme2020 theme base **/ ?>

<?php $page = get_field('page');
$titleTemplates = array('reports','listing','other','contact');
$customTemplates = array('search','details','map');


if(in_array($page, $titleTemplates)) : ?>
	<style>.avada-page-titlebar-wrapper{visibility:hidden!important;}</style>
<?php endif;

if(!in_array($page, $customTemplates)) : ?>
	<style>#IDX-main{visibility:hidden!important;}</style>
<?php endif; ?>

<!-- AR IDX Global Styles <?php the_field('theme'); ?>-->
<?php include get_stylesheet_directory().'/realadvantage/idx/themes/'.get_field('theme').'/global-css.php'; ?>

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
<script>
	jQuery(document).ready(function($){
		<?php if(in_array($page, $titleTemplates)) : ?>
			if($('.IDX-page-market-reports.IDX-type-landing').length || $('.IDX-page-photogallery').length || $('.IDX-page-mortgage').length){
				$('.avada-page-titlebar-wrapper').attr('style','display:none!important;');
			}else {
				$('.avada-page-titlebar-wrapper').attr('style','visibility:visible!important;');
			}
		<?php endif; ?>
		<?php if(!in_array($page, $customTemplates)) : ?>
			$('#IDX-main').attr('style','visibility:visible!important;');
		<?php endif; ?>
	});
</script>

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