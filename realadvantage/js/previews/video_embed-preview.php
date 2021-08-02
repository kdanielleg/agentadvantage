<?php //video_embed for builder ?>

<script type="text/template" id="fusion-builder-block-module-video_embed-preview-template">
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<div class="ar-responsive-video">
		<# if(params.type == 'youtube') { #>
			<iframe width="600" height="400" src="https://www.youtube.com/embed/{{params.vid}}?autohide=1&amp;autoplay=0&amp;mute=0&amp;controls=2&amp;fs=1&amp;loop=0&amp;modestbranding=1&amp;playlist=&amp;rel=0&amp;showinfo=1&amp;theme=dark&amp;wmode=transparent&amp;playsinline=1" frameborder="0" allowfullscreen="true"></iframe>
		<# }else if(params.type == 'vimeo') { #>
			<iframe width="600" height="400" src="//player.vimeo.com/video/{{params.vid}}?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=0&amp;dnt=0&amp;muted=0" frameborder="0" allowfullscreen="true"></iframe>
		<# } #>
	</div>
</script>