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

/****
** [ar_cma_map $atts...]
****/
//CMA Map
function ar_cma_map_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'address' => 'hv-address',
			'height' => '56.25%',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$address = $_GET[$atts['address']];
	
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-cma-map <?php echo $atts['class']; ?>">
			<?php if($address) : ?>
				<div class="ar-gmap ar-responsive-map" style="padding-bottom: <?php echo $atts['height']; ?>;">
					<iframe width="600" height="520" src="//maps.google.com/maps?q=<?php echo $address; ?>&amp;output=embed"></iframe>
				</div>
			<?php else : ?>
				<p>No address found.</p>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_cma_map', 'ar_cma_map_func' );
function ar_fusion_element_cma_map() {
	$params = array(
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Height', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the map height using any valid CSS meausrement (ie px or %)', 'fusion-builder' ),
	    'param_name'  => 'height',
	    'value'				=> '56.25%',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Address Field Name', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the name of the address field used in the CMA form', 'fusion-builder' ),
	    'param_name'  => 'address',
	    'value'		  => 'hv_address',
	  ),
	  array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'  => 'class',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'  => 'id',
		),
	);
	$args = array(
	  'name'            => esc_attr__( 'CMA Map', 'fusion-builder' ),
	  'shortcode'       => 'ar_cma_map',
	  'icon'            => 'fas fa-map',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/cma_map-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-cma_map-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_cma_map' );

//CMA address
function ar_cma_address_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'address' => 'hv-address',
			'height' => '56.25%',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$address = htmlspecialchars($_GET[$atts['address']]);
	
	ob_start(); ?>
		<p id="<?php echo $atts['id']; ?>" class="ar-cma-address <?php echo $atts['class']; ?>">
			<?php if($address) :
				echo $address;
			else : 
				echo 'No address found.';
			endif; ?>
		</p>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_cma_address', 'ar_cma_address_func' );
function ar_fusion_element_cma_address() {
	$params = array(
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Address Field Name', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the name of the address field used in the CMA form', 'fusion-builder' ),
	    'param_name'  => 'address',
	    'value'		  => 'hv_address',
	  ),
	  array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'  => 'class',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'  => 'id',
		),
	);
	$args = array(
	  'name'            => esc_attr__( 'CMA Address', 'fusion-builder' ),
	  'shortcode'       => 'ar_cma_address',
	  'icon'            => 'fas fa-map',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/cma_address-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-cma_address-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_cma_address' );

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
	$now = date("Y");
	$start = get_field('ar_footer_date','option');
	if($now == $start) {
		$date = $now;
	}else {
		$date = $start.'-'.$now;
	}
	ob_start(); 
	$extraLinks;
	if(have_rows('footer_links', 'option')):
		while(have_rows('footer_links','option')): the_row();
			$this_link = '<a href="'.get_sub_field('url').'" target="'.get_sub_field('target').'">'.get_sub_field('text').'</a> | ';
			$extraLinks .= $this_link;
		endwhile;
	endif;


	?>
		<div id="ar-footer-display">
			<?php if(get_field('ar_footer_extra','option') == 'above') : 
				if(get_field('ar_footer_extra','option') != 'none') : ?>
					<div id="ar-footer-extra">
						<?php echo do_shortcode(get_field('ar_footer_content','option')); ?>
					</div>
				<?php endif;
			endif; 
			if(!get_field('ar_footer_format','option')) : ?>
				<p>© <?php echo $date; ?> <?php the_field('ar_footer_company','option'); ?> | All Rights Reserved | <a href="<?php the_field('ar_footer_privacy','option'); ?>" target="_blank">Privacy Policy</a> | <a href="<?php the_field('ar_footer_dmca','option'); ?>" target="_blank">DMCA</a> | <?php echo $extraLinks; ?><a href="<?php the_field('ar_footer_sitemap','option'); ?>" target="_blank">Sitemap</a>
					<?php if(get_field('ar_footer_fhp','option')):
						echo ' | <a href="'.get_field('ar_footer_fhp','option').'" target="_blank">Fair Housing Policy</a>';
					endif; ?>
				</p>
				<?php if(get_field('ar_footer_extra','option') == 'below') :
					if(get_field('ar_footer_extra','option') != 'none') : ?>
						<div id="ar-footer-extra">
							<?php echo do_shortcode(get_field('ar_footer_content','option')); ?>
						</div>
					<?php endif;
				endif;
				if(get_field('ar_footer_kw','option')) : ?>
					<p>Agent Reputation - <a href="https://www.agentreputation.net/website-design-portfolio/" target="_blank" rel="noopener">Keller Williams Website Design</a></p>
				<?php else : ?>
					<p>Agent Reputation – <a href="https://www.agentreputation.net/real-estate-website-design/" target="_blank" rel="noopener">Real Estate Website Design</a></p>
				<?php endif;
			else : ?>
				<p>
					<span>© <?php echo $date; ?> <?php the_field('ar_footer_company','option'); ?> | All Rights Reserved | <a href="<?php the_field('ar_footer_privacy','option'); ?>" target="_blank">Privacy Policy</a> | <a href="<?php the_field('ar_footer_dmca','option'); ?>" target="_blank">DMCA</a> | <?php echo $extraLinks; ?><a href="<?php the_field('ar_footer_sitemap','option'); ?>" target="_blank">Sitemap</a>
						<?php if(get_field('ar_footer_fhp','option')):
							echo ' | <a href="'.get_field('ar_footer_fhp','option').'" target="_blank">Fair Housing Policy</a>';
						endif; ?>
					</span>
					<?php if(get_field('ar_footer_kw','option')) : ?>
						<span>| Agent Reputation - <a href="https://www.agentreputation.net/website-design-portfolio/" target="_blank" rel="noopener">Keller Williams Website Design</a></span>
					<?php else : ?>
						<span>| Agent Reputation – <a href="https://www.agentreputation.net/real-estate-website-design/" target="_blank" rel="noopener">Real Estate Website Design</a></span>
					<?php endif; ?>
				</p>
				<?php if(get_field('ar_footer_extra','option') == 'below') :
					if(get_field('ar_footer_extra','option') != 'none') : ?>
						<div id="ar-footer-extra">
							<?php echo do_shortcode(get_field('ar_footer_content','option')); ?>
						</div>
					<?php endif;
				endif;
			endif; ?>
			<div id="ar-idx-disclaimer"></div>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_footer_display', 'ar_footer_display_func' );


/****
** [ar_search_map $atts...]
****/
//Search Map
function ar_search_map_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'search' => '',
			'height' => '56.25%',
			'zoom'	=> '12',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$search = urlencode($atts['search']);
	
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-search-map <?php echo $atts['class']; ?>">
			<?php if($search) : ?>
				<div class="ar-gmap ar-responsive-map" style="padding-bottom: <?php echo $atts['height']; ?>;">
					<iframe width="600" height="520" frameborder="0" style="border:0" allowfullscreen src="//www.google.com/maps/embed/v1/search?key=<?php the_field('ar_gmap_key', 'option'); ?>&q=<?php echo $search; ?>&zoom=<?php echo $atts['zoom']; ?>"></iframe>
				</div>
			<?php else : ?>
				<p>No search term found.</p>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_search_map', 'ar_search_map_func' );
function ar_fusion_element_search_map() {
	$params = array(
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Height', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the map height using any valid CSS meausrement (ie px or %)', 'fusion-builder' ),
	    'param_name'  => 'height',
	    'value'		  => '56.25%',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Search Term', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the search term to show on the map. Ex: Home Improvement stores near monongalia county wv', 'fusion-builder' ),
	    'param_name'  => 'search',
	    'value'		  => '',
	  ),
	  array(
	    'type'        => 'textfield',
	    'heading'     => esc_attr__( 'Zoom', 'fusion-builder' ),
	    'description' => esc_attr__( 'Enter the map zoom level, default 12', 'fusion-builder' ),
	    'param_name'  => 'zoom',
	    'value'		  => '12',
	  ),
	  array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'  => 'class',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'  => 'id',
		),
	);
	$args = array(
	  'name'            => esc_attr__( 'Search Map', 'fusion-builder' ),
	  'shortcode'       => 'ar_search_map',
	  'icon'            => 'fas fa-map',
	  'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/cma_map-preview.php',
	  'preview_id'      => 'fusion-builder-block-module-cma_map-preview-template',
	  'allow_generator' => true,
	  'params'          => $params,
	);

	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_search_map' );