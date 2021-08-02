<?php //quote for builder ?>


<script type="text/template" id="fusion-builder-block-module-quote-preview-template">
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<div class="ar-quote ar-quote-has-cite {{params.class}}" id="{{params.id}}">
		<div class="ar-quote-inner fusion-clearfix">
			<span class="ar-quote-content">{{params.quote}}</span>
			<span class="ar-quote-cite">{{params.cite}}</span>
		</div>
	</div>
	<style>
		span.ar-quote-content {
		    font-size: 22px;
		    color: #5a5d62;
		    font-weight: 500;
		}
		.ar-quote {
		    position: relative;
		    margin-bottom: 1.5em;
		    padding: 0.5em 3em;
		    font-style: italic;
		    quotes: "“" "”" "‘" "’";
		}
		span.ar-quote-cite {
		    display: block;
		    text-align: right;
		    font-style: normal;
		}
		.ar-quote:before {
		    content: open-quote;
		    top: 0;
		    left: 0;
		}
		.ar-quote:after {
		    content: close-quote;
		    bottom: 0;
		    right: 0;
		}
		.ar-quote:before, .ar-quote:after {
		    position: absolute;
		    display: block;
		    width: 20px;
		    height: 20px;
		    font-size: 4rem;
		    font-weight: 900;
		    font-family: 'sans-serif';
		    color: #cccccc;
		    line-height: 1em;
		}
		.ar-quote .ar-quote-cite:before {
		    content: '\2014';
			display: inline-block;
			padding-right: 5px;
		}
	</style>
</script>