<?php /**browse by city and homes for sale pages**/
$homeSaleIcons = array(
	'none' => array(
		'icon' => '<i class="fal fa-search-location"></i>',
		'label' => false,
	),
);


$titleSelect = '#mainPageHeading h1';
$subSelect = '#mainPageSubheading h4';

$homeSaleIconsCount = sizeof($homeSaleIcons);

$sitemapTabsShortcode = do_shortcode('[fusion_tabs design="classic" layout="horizontal" justified="yes" backgroundcolor="" inactivecolor="" bordercolor="" icon="" icon_position="" icon_size="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="arListings-detailsTabs"][fusion_tab title="Pages" icon=""]<h2>Pages</h2>[ar_sitemap types="page" show_label="false"][/fusion_tab][fusion_tab title="Areas" icon=""]<h2>Market Areas</h2>[ar_sitemap types="avada_portfolio" show_label="false"][/fusion_tab][fusion_tab title="Blog" icon=""]<h2>Blog Posts</h2>[ar_sitemap types="post" show_label="false"][/fusion_tab][fusion_tab title="Search" icon=""]<h2>Real Estate Search</h2>[ar_sitemap types="idx_page" show_label="false"][/fusion_tab][fusion_tab title="Properties" icon=""]<h2>Properties</h2><div id="arSitemap-propsTab"></div>[/fusion_tab][/fusion_tabs]');
$sitemapTabs = str_replace('"', "'", $sitemapTabsShortcode);
$sitemapTabs = preg_replace('~>\\s+<~m', '><', $sitemapTabs);


?>

<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('div#IDX-searchByCityContainer + div, div#IDX-homesForSaleContainer + div, div#IDX-sitemapContainer + div'));
		
		if($('div#IDX-searchByCityContainer').length > 0) { //Browse by City Page
			$('div#IDX-searchByCityContainer > ul:first-child').attr('id','IDX-searchByCityNavList');
			if($('#IDX-searchByCityNavList > li').length<2) {
				$('#IDX-searchByCityNavList + a').remove();
				$('#IDX-searchByCityNavList').remove();
				<?php if($subSelect == '.fusion-page-title-captions h3'): ?>
					$('.fusion-page-title-captions').append('<h3 data-fontsize="24" data-lineheight="36">' + $('div#IDX-searchByCityContainer > h2:first-child').text().trim() + '</h3>');
				<?php else: ?>
					$('<?php echo $subSelect; ?>').html($('div#IDX-searchByCityContainer > h2:first-child').text().trim());
				<?php endif; ?>
				$('div#IDX-searchByCityContainer > h2:first-child').remove();
			}
			$('ul.IDX-searchByCityList').each(function(){
				$(this).wrapInner('<div id="'+$(this).attr('id')+'" class="IDX-row row IDX-searchByCityListDiv">');
			});
			$('.IDX-searchByCityListDiv').unwrap();
			$('.IDX-searchByCityListDiv > li >  a').unwrap().wrap('<div class="IDX-searchByCityListDivCol col-sm-12 col-md-6 col-lg-3"><div class="IDX-searchByCityListItem fusion-button-wrapper fusion-align-block">').wrapInner('<span class="fusion-button-text fusion-button-text-left">').prepend('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fal fa-map-marker-plus"></i></span>').addClass('fusion-button button-flat button-large button-default fusion-button-span-yes fusion-button-default-type');
			var cols = $('.IDX-searchByCityListDiv > .IDX-searchByCityListDivCol');
			for ( var i = 0; i < cols.length; i+=4 ) {
  				cols.slice(i, i + 4).wrapAll('<div class="IDX-searchByCityListDivRow row">');
			}

		}else if($('div#IDX-homesForSaleContainer').length > 0){ //homes for sale page
			$('<?php echo $titleSelect; ?>').text($('div#IDX-homesForSaleContainer > h1').text().trim());
			$('div#IDX-homesForSaleContainer > h1').remove();
			$('ul#IDX-homesForSale').wrapInner('<div id="IDX-homesForSale">');
			$('div#IDX-homesForSale').unwrap();
			$('div#IDX-homesForSale > h2').each(function(){
				$(this).nextUntil($('h2')).addBack().wrapAll('<div class="arHomes-propsGroup">');
			});
			$('.arHomes-propsGroup').each(function(){
				$(this).find($('li')).wrapAll('<div class="arHomes-propsGroupList IDX-row row">');
				var typeIDString = $(this).find($('h2.IDX-homesForSalePropType')).attr('id');
				var typeID = typeIDString.split('-').pop();
				$(this).attr('id', typeIDString +'_group').attr('data-arwc-typeid', typeID);
			});
			$('div.arHomes-propsGroupList li').each(function(){
				$(this).wrapInner('<div id="' + $(this).attr('class') + '" class="arHomes-propsGroupListItem col-sm-12 col-md-6 col-lg-4">');
			});
			$('.arHomes-propsGroupListItem').unwrap();
			$('.arHomes-propsGroup').wrap('<div class="arHomes-propsGroupContainer">');
			
			var homeSaleIcons = <?php echo json_encode($homeSaleIcons); ?>;
			var homeSaleIconsCount = <?php echo $homeSaleIconsCount; ?>;
			if(homeSaleIconsCount > 1) {
				$('.arHomes-propsGroup').each(function(){
					var groupTypeID = $(this).attr('data-arwc-typeid');
					if(groupTypeID in homeSaleIcons) {
						var groupTypeIcon = homeSaleIcons[groupTypeID].icon;
					}else {
						var groupTypeIcon = homeSaleIcons.none.icon;
					}
					$(this).find($('a')).each(function(){
						var iconTypeText = $(this).text().trim();
						$(this).html('<div class="arHomes-linkBox row IDX-row"><div class="arHomes-linkIcon col-xs-4">' + groupTypeIcon + '</div><div class="arHomes-linkContent col-xs-8"><h4 class="arHomes-linkHeading">' + iconTypeText + '</h4><p class="arHomes-linkTextMore">View Properties <i class="fal fa-angle-right"></i></p></div></div>').wrap('<div id="arHomes-link">');
					});
				});
			} else {
				var homeIconDefault = homeSaleIcons.none.icon;
				$('.arHomes-propsGroup a').each(function(){
					var iconTypeText = $(this).text().trim();
					$(this).html('<div class="arHomes-linkBox row IDX-row"><div class="arHomes-linkIcon col-xs-4">' + homeIconDefault + '</div><div class="arHomes-linkContent col-xs-8"><h4 class="arHomes-linkHeading">' + iconTypeText + '</h4><p class="arHomes-linkTextMore">View Properties <i class="fal fa-angle-right"></i></p></div></div>').wrap('<div id="arHomes-link">');
				});
			}
			$('div#IDX-homesForSaleContainer .arHomes-propsGroupContainer div#arHomes-link a').matchHeight();
		}else if($('div#IDX-sitemapContainer').length > 0) {//sitemap page
			$('<?php echo $titleSelect; ?>').text('Sitemap');
			$('div#IDX-sitemapContainer').wrapInner('<div id="arSitemap-propsWrap">');
			var sitemapTabs = <?php echo json_encode($sitemapTabs); ?>;
			$('div#IDX-sitemapContainer').prepend(sitemapTabs);
			$('#arSitemap-propsTab').append($('#arSitemap-propsWrap'));

			$('div#arSitemap-propsWrap > a').each(function(){
				$(this).nextUntil($('a')).addBack().wrapAll('<div class="arSitemap-propsGroup">');
			});

			$('div#arSitemap-propsWrap > h2, div#arSitemap-propsWrap > ul').remove();
			$('.arSitemap-propsGroup').each(function(){
				var sitemapSectionTitle = $(this).find($('h2')).text().trim();
				var sitemapSectionSub = $(this).find($('h4')).text().trim();
				$(this).find($('ul.IDX-sitemapList')).before('<h3>'+sitemapSectionTitle+'</h3><p>'+sitemapSectionSub+'</p>');
				$(this).find($('h2')).remove();
				$(this).find($('h4')).remove();
			});
			$('div#arListings-detailsTabs.fusion-tabs .tab-pane > h2').remove();
		}

		$('.avada-page-titlebar-wrapper, section.fusion-page-title-bar.fusion-tb-page-title-bar').attr('style','visibility:visible!important;');
	});
</script>


