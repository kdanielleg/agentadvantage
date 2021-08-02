<?php //community text preview for builder 
$team = get_field('ar_default_team','option'); 
$state = get_field('ar_state','option');
$state_abv = get_field('ar_state_abv','option');
$mls = get_field('ar_mls','option');

	?>

<script type="text/template" id="fusion-builder-block-module-community-text-preview-template">
	<# 
	var displayType = 'Introduction';
	if(params.type == 'buy') {
		displayType = 'Buyers';
	} else if(params.type == 'buy-short') {
		displayType = 'Buyers Alt';
	} else if(params.type == 'sell') {
		displayType = 'Sellers';
	} else if(params.type == 'sell-short') {
		displayType = 'Sellers Alt';
	} #>
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}: {{displayType}}</h4>
	<# 
	var area = params.area;
	var team = '0';
	if(params.team=='') {
		team = '<?php echo esc_attr($team); ?>';
	}else {
		team = params.team;
	}
	var state = params.state;
	if(params.state == '0') {
		state = '<?php echo esc_attr($state); ?>';
	}
	var state_abv = params.st;
	if(params.state == '0') {
		state_abv = '<?php echo esc_attr($state_abv); ?>';
	}
	var mls = params.mls;
	if(params.mls == '') {
		//mls = '<?php echo esc_attr($mls); ?>';
		mls = '<?php echo $mls; ?>';
	}
	#>

	<#
	if(team == '1') {
		if(params.type == 'buy') { #>
			<p>If you are a {{area}}, {{state_abv}} home buyer, our foremost goal is to provide you with exceptional customer service. Our goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize our {{area}}, {{state}} real estate expertise to make your home search and buying experience as stress free and rewarding for you and your family as possible.</p>
		<# } else if(params.type == 'buy-short') { #>
			<p>Our goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize our {{area}}, {{state}} real estate expertise to make your home search and buying experience as stress free and rewarding as possible.</p>
		<# } else if(params.type == 'sell') { #>
			<p>If you're considering selling your {{area}}, {{state}} home, we utilize the latest, cutting-edge, real estate marketing tools to expose your property to the widest range of potential buyers. We are here to get your house aggressively marketed to sell as quickly as possible and for the best price! Our goals are to help you get your {{area}}, {{state_abv}} home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
		<# } else if(params.type == 'sell-short') { #>
			<p>We are here to get your house aggressively marketed to sell as quickly as possible and for the best price! Our goals are to help you get your {{area}}, {{state_abv}} home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
		<# } else { #>
			<p>You found the right website if you are searching for <strong>homes for sale in {{area}}, {{state_abv}}</strong>. Our website has EVERY <strong>{{area}} home for sale in {{state}}</strong> listed with {{mls}}.</p>
		<# }
	} else {
		if(params.type == 'buy') { #>
			<p>If you are a {{area}}, {{state_abv}} home buyer, my foremost goal is to provide you with exceptional customer service. My goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize my {{area}}, {{state}} real estate expertise to make your home search and buying experience as stress free and rewarding for you and your family as possible.</p>
		<# } else if(params.type == 'buy-short') { #>
			<p>My goals are to help you purchase the right home, make sure you don’t miss out on any homes that meet your needs, and make sure you don’t pay too much for your next home. Please utilize my {{area}}, {{state}} real estate expertise to make your home search and buying experience as stress free and rewarding as possible.</p>
		<# } else if(params.type == 'sell') { #>
			<p>If you're considering selling your {{area}}, {{state}} home, I utilize the latest, cutting-edge, real estate marketing tools to expose your property to the widest range of potential buyers. I am here to get your house aggressively marketed to sell as quickly as possible and for the best price! My goals are to help you get your {{area}}, {{state_abv}} home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
		<# } else if(params.type == 'sell-short') { #>
			<p>I am here to get your house aggressively marketed to sell as quickly as possible and for the best price! My goals are to help you get your {{area}}, {{state_abv}} home sold, put you in the strongest negotiating position as possible, and to make it easier for you and reduce surprises.</p>
		<# } else { #>
			<p>You found the right website if you are searching for <strong>homes for sale in {{area}}, {{state_abv}}</strong>. My website has EVERY <strong>{{area}} home for sale in {{state}}</strong> listed with {{mls}}.</p>
		<# }
	} #>
</script>
