<?php 

// register ar_imageblock_widget
// Register and load the widget
function wpb_load_ar_img_widget() {
    register_widget( 'wpb_ar_imgblock_widget' );
}
add_action( 'widgets_init', 'wpb_load_ar_img_widget' );
 
// Creating the widget 
class wpb_ar_imgblock_widget extends WP_Widget {
 
	function __construct() {		
		parent::__construct( 
			// Base ID of your widget
			'wpb_ar_imgblock_widget', 
			// Widget name will appear in UI
			'AR Image Block Widget', 
			// Widget description
			array( 'description' => __( 'Displays Image Block for Menu', 'wpb_widget_domain' ), ) 
		);
	}
 
	// Creating widget front-end
	public function widget( $args, $instance ) {
		$widget_id = $args['widget_id'];
		$image = wp_get_attachment_image_src(get_field('menuBlock_image', 'widget_' . $widget_id), 'fusion-1200', false);
		?>
		<div class="menuImgLink">
			<div class="menuImgLinkBlock" style="background-image: url(<?php echo $image[0]; ?>);"></div>
			<span><?php the_field('menuBlock_text', 'widget_' . $widget_id); ?></span>
			<a class="menuImgLinkBlockLink" href="<?php the_field('menuBlock_link', 'widget_' . $widget_id); ?>"></a>
		</div>
	<?php }
         
	// Widget Backend 
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 

	}
     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

//Add Widget fields
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e0655f5cf5ff',
	'title' => 'Image Box Widget',
	'fields' => array(
		array(
			'key' => 'field_5e0656c387320',
			'label' => 'Text',
			'name' => 'menuBlock_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e0656d587321',
			'label' => 'Link',
			'name' => 'menuBlock_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e0656df87322',
			'label' => 'Image',
			'name' => 'menuBlock_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'widget',
				'operator' => '==',
				'value' => 'wpb_ar_imgblock_widget',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;