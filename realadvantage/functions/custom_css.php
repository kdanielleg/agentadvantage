<?php /* Add Custom CSS to Header */

if (get_field('ar_custom_css_on', 'option')) :
	add_action('wp_head', 'ar_custom_css_fields');
endif;

function ar_custom_css_fields(){
	$cssFields = array(
		'main' => array(
			'field' => 'main_ar_css',
			'title' => 'Main',
		),
		'utils' => array(
			'field' => 'utilities_ar_css',
			'title' => 'Utilities',
		),
		'idx' => array(
			'field' => 'idx_widgets_ar_css',
			'title' => 'IDX Widget',
		),
		'coms' => array(
			'field' => 'coms_ar_css',
			'title' => 'Communities',
		),
		'blog' => array(
			'field' => 'blog_ar_css',
			'title' => 'Blog',
		),
	); ?>

	<style>
		/**AR ADMIN CSS**/
		<?php foreach($cssFields as $item):
			if(get_field($item['field'],'option')): ?>
		/**AR <?php echo $item['title']; ?> CSS Start**/
				<?php the_field($item['field'],'option'); ?>
		/**AR <?php echo $item['title']; ?> CSS End**/

			<?php endif;
		endforeach; ?>
	</style>

	<?php 
}