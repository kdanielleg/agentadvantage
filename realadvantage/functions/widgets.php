<?php 

/**START AR WIDGETS**/
//START REVIEWS WIDGET
class ar_reviews_widget extends WP_Widget {
	function __construct() {
		parent::__construct('ar_reviews_widget', __('Agent Reputation: Online Reviews', 'ar_widget_domain'), array( 'description' => __( 'Display your online reviews', 'ar_widget_domain' ),));
	} //end constructor
	// Widget front end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		//show title
		if (!empty($title)) {echo $args['before_title'].$title.$args['after_title'];}
		// display widget content
		$reviews_side_css = '<style>div#ar_reviews_sidebar .RK-WebWidget .widget-div .widget-right h5#web-widget-review-count-target + p + p{font-size: 9px!important;}div#ar_reviews_sidebar .RK-WebWidget .widget-div .widget-right .widget-star{margin-top:0px!important;}div#ar_reviews_sidebar .RK-WebWidget .widget-div .widget-right{padding-top:0px!important;}</style>';
		$reviews = '<div id="ar_reviews_sidebar">'.do_shortcode('[ar_reviews]').$reviews_side_css.'</div>';
		echo __( $reviews, 'ar_widget_domain' );
		echo $args['after_widget'];
	} //end front end
	// Widget Backend 
	public function form( $instance ) {
		//show saved title
		if (isset($instance['title'])) {$title = $instance[ 'title' ];} 
		//set and show default title
		else {$title = __( 'Online Reviews', 'ar_widget_domain' );}
		// Widget admin form ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
	<?php } //end widget backend
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} //end widget class
// Register and load the widget
function ar_reviews_load_widget() {register_widget( 'ar_reviews_widget' );}
add_action( 'widgets_init', 'ar_reviews_load_widget' );
//END REVIEWS WIDGET
//START TESTIMONIALS WIDGET
class ar_testimonials_widget extends WP_Widget {
	function __construct() {
		parent::__construct('ar_testimonials_widget', __('Agent Reputation: Internal Testimonials', 'ar_widget_domain'), array('description' => __('Display your internal testimonials', 'ar_widget_domain'),));
	} //end construct
	// widget front-end
	public function widget($args, $instance) {
		$title = apply_filters('widget_title',$instance['title']);
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		//show title
		if (!empty($title)) {echo $args['before_title'].$title.$args['after_title'];}
		// display widget content
		$testimonials_side_css = '<style>div#ar_testimonials_sidebar h5#web-widget-review-count-target {display:none!important;}div#ar_testimonials_sidebar .RK-WebWidget .widget-div .widget-right .widget-star{margin-top:0px!important;}div#ar_testimonials_sidebar .RK-WebWidget .widget-div .widget-right{padding-top:3px!important;}</style>';
		$testimonials = '<div id="ar_testimonials_sidebar">'.do_shortcode('[ar_testimonials]').$testimonials_side_css.'</div>';
		echo __( $testimonials, 'ar_widget_domain');
		echo $args['after_widget'];
	} //end front end
	// Widget Backend 
	public function form($instance) {
		//show saved title
		if (isset($instance['title'])) {$title = $instance[ 'title' ];}
		//set and show default title
		else {$title = __('Testimonials', 'ar_widget_domain');}
		// Widget admin form ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
	<?php  } //end backend
	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}
} // end widget class
// Register and load the widget
function ar_testimonials_load_widget() {register_widget( 'ar_testimonials_widget' );}
add_action( 'widgets_init', 'ar_testimonials_load_widget' );
//END TESTIMONIALS WIDGET
//START FEEDBACK WIDGET
class ar_feedback_widget extends WP_Widget {
	function __construct() {
		parent::__construct('ar_feedback_widget', __('Agent Reputation: Feedback Form', 'ar_widget_domain'), array('description' => __('Display your feedback form', 'ar_widget_domain'),));
	} //end constructor
	// Creating widget front-end
	public function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title']);
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		//show title
		if (!empty($title)) {echo $args['before_title'].$title.$args['after_title'];}
		// display widget content
		$feedback = do_shortcode('[ar_feedback num="2"]');
		echo __($feedback, 'ar_widget_domain');
		echo $args['after_widget'];
	} //end front end
	// Widget Backend 
	public function form($instance) {
		//show saved title
		if (isset( $instance['title'])) { $title = $instance['title'];}
		//set and show default title
		else { $title = __('Leave a Review', 'ar_widget_domain');}
		// Widget admin form ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
	<?php } //end backend
	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}
} // end widget class
// Register and load the widget
function ar_feedback_load_widget() { register_widget('ar_feedback_widget');}
add_action('widgets_init', 'ar_feedback_load_widget');
//END FEEDBACK WIDGET
/**END AR WIDGETS**/