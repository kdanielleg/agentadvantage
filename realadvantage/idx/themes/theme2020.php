<?php /**theme2020 theme base **/ ?>

<?php $page = get_field('page');
$titleTemplates = array('reports','listing','other','contact','agent');
$customTemplates = array('search','details','map');


if(in_array($page, $titleTemplates)) : ?>
	<style>.avada-page-titlebar-wrapper, section.fusion-page-title-bar.fusion-tb-page-title-bar{visibility:hidden!important;}</style>
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
			$('.avada-page-titlebar-wrapper, section.fusion-page-title-bar.fusion-tb-page-title-bar').attr('style','visibility:visible!important;');
		<?php endif; ?>
		<?php if(!in_array($page, $customTemplates)) : ?>
			$('#IDX-main').attr('style','visibility:visible!important;');
		<?php endif; ?>
	});
</script>

<?php /**MODALS**/ ?>
<!-- AR IDX Modals JS -->
<?php include get_stylesheet_directory().'/realadvantage/idx/modals/theme1/modals_js.php'; ?>
<!-- AR IDX Modals CSS -->
<style>
	<?php include get_stylesheet_directory().'/realadvantage/idx/modals/theme1/modals.css'; ?>
</style>