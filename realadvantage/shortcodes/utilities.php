<?php 
/****
** Utility Shortcodes
**		& Fusion Elements
****/


/**
* [ar_dev_code $atts...][/ar_dev_code]
*/
function ar_dev_code_func( $atts , $content = null ) {
	$atts = shortcode_atts(
		array(
			'label' => '',
		),
		$atts
	);
	$content = fusion_decode_if_needed( $content );
	$content = apply_filters( 'fusion_shortcode_content', $content, 'fusion_code', $args );
	return do_shortcode( html_entity_decode( $content, ENT_QUOTES ) );
}
add_shortcode( 'ar_dev_code', 'ar_dev_code_func' );


function ar_fusion_element_dev_code() {
	$params = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Code Box Label', 'fusion-builder' ),
			'param_name'  => 'label',
		),
		array(
			'type'        => 'code',
			'heading'     => esc_attr__( 'Code', 'fusion-builder' ),
			'description' => esc_attr__( 'Paste Code to Display', 'fusion-builder' ),
			'param_name'  => 'element_content',
	  		'value'		  => '',
		),
	);
	$args = array(
	  'name'            => esc_attr__( 'Labeled Code', 'fusion-builder' ),
	  'shortcode'       => 'ar_dev_code',
	  'icon'            => 'fas fa-code',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/dev_code-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-dev_code-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_dev_code' );

//Sitemap Shortcode
function ar_sitemap_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'types' => 'page',
			'show_label' => 'true',
			'show_excerpt' => 'false',
			'container_tag' => 'ul',
			'title_tag' => '',
			'post_type_tag' => 'h2',
			'excerpt_tag' => 'div',
			'links' => 'true',
			'page_depth' => 0,
			'order' => 'asc',
			'orderby' => 'title',
			'exclude' => ''
		),
		$atts
	);
	// Setup more readable attribute vars
	$post_types = esc_attr( $atts['types'] );
	$show_label = esc_attr( $atts['show_label'] );
	$show_excerpt = esc_attr( $atts['show_excerpt'] );
	$container_tag = tag_escape( $atts['container_tag'] );
	$title_tag = tag_escape( $atts['title_tag'] );
	$post_type_tag = tag_escape( $atts['post_type_tag'] );
	$excerpt_tag = tag_escape( $atts['excerpt_tag'] );
	$links = esc_attr( $atts['links'] );
	$page_depth = esc_attr( intval( $atts['page_depth'] ) );
	$order = esc_attr( $atts['order'] );
	$orderby = esc_attr( $atts['orderby'] );
	$exclude = esc_attr( $atts['exclude'] );
	// force 'ul' or 'ol' to be used as the container tag
	$allowed_container_tags = array('ul', 'ol');
	if(!in_array($container_tag, $allowed_container_tags)) {
		$container_tag = 'ul';
	}
	// convert comma separated strings to arrays
	$post_types = array_map( 'trim', explode( ',', $post_types ) );
	$exclude = array_map( 'trim', explode( ',', $exclude) );
	// get all public registered post types
	$args = array(
		'public'   => true
	);
	$registered_post_types = get_post_types($args);
	// Start output caching (so that existing content in the [simple-sitemap] post doesn't get shoved to the bottom of the post
	ob_start();
	foreach( $post_types as $post_type ) :
		// generate sitemap container element class
		$container_class = 'simple-sitemap-' . $post_type;
		// bail if post type isn't valid
		if( !array_key_exists( $post_type, $registered_post_types ) ) {
			break;
		}
		// set opening and closing title tag
		if( !empty($title_tag) ) {
			$title_open = '<' . $title_tag . '>';
			$title_close = '</' . $title_tag . '>';
		}
		else {
			$title_open = $title_close = '';
		}
		// conditionally show label for each post type
		if( $show_label == 'true' ) {
			$post_type_obj  = get_post_type_object( $post_type );
			$post_type_name = $post_type_obj->labels->name;
			echo '<' . $post_type_tag . '>' . esc_html($post_type_name) . '</' . $post_type_tag . '>';
		}
		$query_args = array(
			'posts_per_page' => -1,
			'post_type' => $post_type,
			'order' => $order,
			'orderby' => $orderby,
			'post__not_in' => $exclude
		);
		// use custom rendering for 'page' post type to properly render sub pages
		if( $post_type == 'page' ) {
			$arr = array(
				'title_tag' => $title_tag,
				'links' => $links,
				'title_open' => $title_open,
				'title_close' => $title_close,
				'page_depth' => $page_depth,
				'exclude' => $exclude
			);
			echo '<' . $container_tag . ' class="' . esc_attr($container_class) . '">';
			ar_shortcode_list_pages($arr, $query_args);
			echo '</' . $container_tag . '>';
			continue;
		}
		//post query
		$sitemap_query = new WP_Query( $query_args );
		if ( $sitemap_query->have_posts() ) :
			echo '<' . $container_tag . ' class="' . esc_attr($container_class) . '">';
			// start of the loop
			while ( $sitemap_query->have_posts() ) : $sitemap_query->the_post();
				// title
				$title_text = get_the_title();
				if( !empty( $title_text ) ) {
					if ( $links == 'true' ) {
						$title = $title_open . '<a href="' . esc_url(get_permalink()) . '">' . esc_html($title_text) . '</a>' . $title_close;
					} else {
						$title = $title_open . esc_html($title_text) . $title_close;
					}
				}
				else {
					if ( $links == 'true' ) {
						$title = $title_open . '<a href="' . esc_url(get_permalink()) . '">' . '(no title)' . '</a>' . $title_close;
					} else {
						$title = $title_open . '(no title)' . $title_close;
					}
				}
				// excerpt
				$excerpt = $show_excerpt == 'true' ? '<' . $excerpt_tag . '>' . esc_html(get_the_excerpt()) . '</' . $excerpt_tag . '>' : '';
				// render list item
				echo '<li>'.$title.$excerpt.'</li>';
			endwhile; // end of post loop -->
			echo '</' . $container_tag . '>';

			wp_reset_postdata();
		else:
			echo '<p>' . __( 'Sorry, no posts matched your criteria.', 'wpgo-simple-sitemap-pro' ) . '</p>';
		endif;
	endforeach;
	$sitemap = ob_get_contents();
	ob_end_clean();
	return wp_kses_post($sitemap);
}
add_shortcode( 'ar_sitemap', 'ar_sitemap_func' );

//footer display shortcode
function ar_footer_display_func() {
	$date = date("Y");
	$start = "2020";
	if($date != $start) {
		$date = $start.'-'.$date;
	}
	ob_start(); ?>
	<div id="ar-footer-display">
		<p><?php echo '© '.$date.' '.get_option('aa_admin_name').' | '.get_option('aa_admin_license').' | '.get_option('aa_admin_address').' | All Rights Reserved | <a href="'.get_home_url().'/privacy" target="_blank">Privacy Policy</a> | <a href="'.get_home_url().'/dmca" target="_blank">DMCA</a> | <a href="'.get_option('aa_idx_url').'/idx/sitemap" target="_blank">Sitemap</a>'; ?> | <a href="<?php echo wp_login_url(); ?>">Log In</a></p>
		<?php if(get_option('aa_admin_flink') == "kw") : ?>
			<p>Agent Reputation - <a href="https://www.agentreputation.net/website-design-portfolio/" target="_blank" rel="noopener">Keller Williams Website Design</a></p>
		<?php elseif(get_option('aa_admin_flink') == "exp") : ?>
			<p>Agent Reputation - <a href="https://www.agentreputation.net/exp-real-estate-website-design/" target="_blank" rel="noopener">EXP Real Estate Website Design</a></p>
		<?php else : ?>
			<p>Agent Reputation – <a href="https://www.agentreputation.net/real-estate-website-design/" target="_blank" rel="noopener">Real Estate Website Design</a></p>
		<?php endif; ?>
		<div id="ar-idx-disclaimer"></div>
	</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_footer_display', 'ar_footer_display_func' );

