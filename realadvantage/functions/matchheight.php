<?php //match Height Options

/*****MATCH HEIGHT********/
function ar_match_height() {
	if( have_rows('ar_match','option') ): ?>
		<script>jQuery(document).ready(function($){
			<?php while ( have_rows('ar_match','option') ) : the_row(); ?>
				$('<?php the_sub_field('selector'); ?>').matchHeight();
			<?php endwhile; ?>
    	});</script>
	<?php endif;
}
add_action('wp_footer', 'ar_match_height');