<?php 

/****
** Content Shortcodes
**		& Fusion Elements
****/

/****
** [ar_review_stars $atts...]
****/
function ar_home_value_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$count = (int)$atts['count'];
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-idx-hv-form <?php echo $atts['class']; ?>">
			<div id="hvForm">
				<form action="<?php the_field('idx_account_url', 'option'); ?>/idx/homevaluation">
  					<input type="text" id="hv-location" name="address" placeholder="Start Typing the Address...">
  					<button type="submit" value="Submit"><i class="fad fa-location"></i></button>
				</form>
			</div>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_home_value', 'ar_home_value_func' );
function ar_fusion_element_home_value() {
	$params = array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=> 'class',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=> 'id',
		),
	);
	$args = array(
		'name'            => esc_attr__( 'AR Home Value', 'fusion-builder' ),
		'shortcode'       => 'ar_home_value',
		'icon'            => 'far fa-usd',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/home_value-preview.php',
		'preview_id'      => 'fusion-builder-block-module-home_value-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	); 
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_home_value' );


/****
** [ar_review_stars $atts...]
****/
function ar_review_stars_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'count' => '5',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$count = (int)$atts['count'];
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-review-stars <?php echo $atts['class']; ?>">
			<?php for ($i=0; $i<$count; $i++) { ?>
				<i class="fa-star fas"></i>
			<?php } ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_review_stars', 'ar_review_stars_func' );
function ar_fusion_element_review_stars() {
	$params = array(
		array(
			'type'			=> 'range',
			'heading'		=> esc_attr__( 'How Many Stars?', 'fusion-builder' ),
			'param_name'	=> 'count',
			'value'			=> '5',
			'min'			=> '1',
			'max'			=> '5',
			'step'			=> '1',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=> 'class',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=> 'id',
		),
	);
	$args = array(
		'name'            => esc_attr__( 'Review Stars', 'fusion-builder' ),
		'shortcode'       => 'ar_review_stars',
		'icon'            => 'far fa-star',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/review_stars-preview.php',
		'preview_id'      => 'fusion-builder-block-module-review_stars-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	); 
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_review_stars' );

/****
** [ar_video_embed $atts...]
****/
function ar_video_embed_func( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'type' => 'youtube',
			'vid' => '',
			'autoplay' => '0',
			'bg' => 'false',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$autoplay = boolval($atts['autoplay']);
	$bg = boolval($atts['bg']);
	$vidClass = ($atts['bg']=='true') ? 'ar-responsive-video ar-responsive-video-bg bg-'.$bg : 'ar-responsive-video';
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="<?php echo $vidClass; ?> <?php echo $atts['class']; ?>">
			<?php if($atts['type']=='youtube') : ?>
				<?php if($bg): ?>
					<iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $atts['vid']; ?>?autoplay=<?php echo $atts['autoplay']; ?>&amp;loop=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;iv_load_policy=3&amp;mute=1&amp;playlist=<?php echo $atts['vid']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php else: ?>
					<iframe width="600" height="400" src="https://www.youtube.com/embed/<?php echo $atts['vid']; ?>?autoplay=<?php echo $atts['autoplay']; ?>&amp;modestbranding=1&amp;playsinline=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;iv_load_policy=3&amp;playlist=<?php echo $atts['vid']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php endif; ?>
			<?php elseif($atts['type']=='vimeo') : ?>
				<iframe width="600" height="400" src="//player.vimeo.com/video/<?php echo $atts['vid']; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=<?php echo $atts['autoplay']; ?>&amp;dnt=0&amp;muted=0" frameborder="0" allowfullscreen="true"></iframe>
			<?php endif; ?>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_video_embed', 'ar_video_embed_func' );
function ar_fusion_element_video_embed() {
	$params = array(
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Video Type', 'fusion-builder' ),
			'param_name'  => 'type',
			'value'       => array(
				'youtube'   => esc_attr__( 'YouTube', 'fusion-builder' ),
				'vimeo'     => esc_attr__( 'Vimeo', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Video ID', 'fusion-builder' ),
			'description' => esc_attr__( 'Enter the alphanumeric code from your youtube or vimeo url.', 'fusion-builder' ),
			'param_name'  => 'vid',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Autoplay?', 'fusion-builder' ),
			'param_name'  => 'autoplay',
			'value'       => array(
				'true'    => esc_attr__( 'Yes', 'fusion-builder' ),
				'false'    => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Background Video Settings?', 'fusion-builder' ),
			'description' => esc_attr__( 'Make sure autoplay is set to yes above.', 'fusion-builder' ),
			'param_name'  => 'bg',
			'value'       => array(
				'true'    => esc_attr__( 'Yes', 'fusion-builder' ),
				'false'    => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=> 'class',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=> 'id',
		),
	);
	$args = array(
		'name'            => esc_attr__( 'Responsive Video', 'fusion-builder' ),
		'shortcode'       => 'ar_video_embed',
		'icon'            => 'fas fa-video',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/video_embed-preview.php',
		'preview_id'      => 'fusion-builder-block-module-video_embed-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_video_embed' );

/****
** [ar_privacy $atts...]
****/
function ar_privacy_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'website' => get_field('ar_privacy_website','option'),
			'phone' => get_field('ar_privacy_phone','option'),
			'email' => get_field('ar_privacy_email','option'),
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-privacy-policy <?php echo $atts['class']; ?>">
			<p>This privacy notice discloses the privacy practices for <?php echo $atts['website']; ?>. This privacy notice applies solely to information collected by this website. It will notify you of the following:</p>
			<ul>
				<li>What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li>
				<li>What choices are available to you regarding the use of your data.</li>
				<li>The security procedures in place to protect the misuse of your information.</li>
				<li>How you can correct any inaccuracies in the information.</li>
			</ul>
			<h3>Information Collection, Use, and Sharing</h3>
			<p>We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>
			<p>We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.</p>
			<p>Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.</p><h3>Registration</h3><p>In order to use certain features of this website, a user must first complete the registration form. During registration a user is required to give certain information (such as name and email address). This information is used to contact you about the products/services on our site in which you have expressed interest. At your option, you may also provide demographic information (such as gender or age) about yourself, but it is not required.</p>
			<h3>Cookies</h3>
			<p>We use 'cookies' on this site. A cookie is a piece of data stored on a site visitor's hard drive to help us improve your access to our site and identify repeat visitors to our site. For instance, when we use a cookie to identify you, you would not have to log in a password more than once, thereby saving time while on our site. Cookies can also enable us to track and target the interests of our users to enhance the experience on our site. Usage of a cookie is in no way linked to any personally identifiable information on our site.</p>
			<p>Some of our business partners may use cookies on our site (for example, advertisers). However, we have no access to or control over these cookies.</p>
			<h3>Links</h3>
			<p>This website contains links to other sites. Please be aware that we are not responsible for the content or privacy practices of such other sites. We encourage our users to be aware when they leave our site and to read the privacy statements of any other site that collects personally identifiable information.</p>
			<h3>Surveys & Contests</h3>
			<p>From time-to-time our site requests information via surveys or contests. Participation in these surveys or contests is completely voluntary and you may choose whether or not to participate and therefore disclose this information. Information requested may include contact information (such as name and shipping address), and demographic information (such as zip code, age level). Contact information will be used to notify the winners and award prizes. Survey information will be used for purposes of monitoring or improving the use and satisfaction of this site.</p>
			<h3>Your Access to and Control Over Information</h3>
			<p>You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:</p>
			<ul>
				<li>See what data we have about you, if any.</li>
				<li>Change/correct any data we have about you.</li>
				<li>Have us delete any data we have about you.</li>
				<li>Express any concern you have about our use of your data.</li>
			</ul>
			<h3>Security</h3>
			<p>We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.</p>
			<p>Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for 'https' at the beginning of the address of the Web page.</p>
			<p>While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>
			<p>If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at <?php echo $atts['phone']; ?> or via <?php echo $atts['email']; ?>.</p>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_privacy', 'ar_privacy_func' );
function ar_fusion_element_privacy() {
	$params = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Website URL', 'fusion-builder' ),
			'param_name'  => 'website',
			'value'       => get_field('ar_privacy_website','option'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Phone Number', 'fusion-builder' ),
			'param_name'  => 'phone',
			'value'       => get_field('ar_privacy_phone','option'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Email Address', 'fusion-builder' ),
			'param_name'  => 'email',
			'value'       => get_field('ar_privacy_email','option'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=> 'class',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=> 'id',
		),
	);
	$args = array(
		'name'            => esc_attr__( 'Privacy Policy', 'fusion-builder' ),
		'shortcode'       => 'ar_privacy',
		'icon'            => 'fas fa-shield-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/privacy-preview.php',
		'preview_id'      => 'fusion-builder-block-module-privacy-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_privacy' );

/****
** [ar_author $atts...]
****/
function ar_author_block_function($atts) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	ob_start(); 
		if(get_field('ar_author_block_type','option') == 'contact') : ?>
			<div id="<?php echo $atts['id']; ?>" class="ar-author-block <?php echo $atts['class']; ?>">
				<div id="authorBlock">
					<div class="fusion-clearfix">
						<?php if(get_field('ar_author_img','option')): ?>
							<div class="fusion-two-fifth two_fifth fusion-layout-column fusion-spacing-yes">
								<div class="authorImg">
									<?php echo wp_get_attachment_image(get_field('ar_author_img','option'),'large'); ?>
								</div>
							</div>
							<div class="fusion-three-fifth three_fifth fusion-layout-column fusion-spacing-yes fusion-column-last">
						<?php else : ?>
							<div class="fusion-one-full one_full fusion-layout-column fusion-spacing-no">
						<?php endif; ?>
								<div class="authorContact">
									<?php if(have_rows('ar_author_titles','option')) :
										while(have_rows('ar_author_titles','option')) : the_row();
											if(get_sub_field('space')) : ?>
												<<?php the_sub_field('tag'); ?> class="authorSubTitle"><?php the_sub_field('text'); ?></<?php the_sub_field('tag'); ?>>
											<?php else : ?>
												<<?php the_sub_field('tag'); ?> class="authorTitle"><?php the_sub_field('text'); ?></<?php the_sub_field('tag'); ?>>
											<?php endif;
										endwhile;
									endif;
									if( have_rows('ar_author_contacts','option') ): ?>
										<ul class="authorContactList">
		    								<?php while ( have_rows('ar_author_contacts','option') ) : the_row(); ?>
												<li>
													<?php if(get_sub_field('link')) :
														$target= ' target="_blank"';
														if(get_sub_field('target') == 'same') :
															$target = '';
														endif; ?>
														<a href="'.get_sub_field('link').'"<?php echo $target; ?>>
													<?php endif;
															if(get_sub_field('icon')=='custom') :
																$icon = get_sub_field('custom_icon');
															else :
																$icon = get_sub_field('icon');
															endif; ?>
															<i class="fa <?php echo $icon; ?>"></i>
															<span class="arContactList-text"><?php the_sub_field('text'); ?></span>
													<?php if(get_sub_field('link')) : ?>
														</a>
													<?php endif; ?>
												</li>
		    								<?php endwhile; ?>
										</ul>
									<?php endif;
									if(have_rows('ar_author_social','option')):
										while( have_rows('ar_author_social','option') ): the_row(); ?>
											<div class="authorSocial">
												<?php echo do_shortcode('[fusion_social_links icons_boxed="yes" icons_boxed_radius="0" color_type="brand" icon_colors="" box_colors="" tooltip_placement="" blogger="'.get_sub_field('blogger').'" deviantart="" digg="'.get_sub_field('digg').'" dribbble="" dropbox="" facebook="'.get_sub_field('facebook').'" flickr="'.get_sub_field('flickr').'" forrst="" googleplus="'.get_sub_field('googleplus').'" instagram="'.get_sub_field('instagram').'" linkedin="'.get_sub_field('linkedin').'" myspace="'.get_sub_field('myspace').'" paypal="" pinterest="'.get_sub_field('pinterest').'" reddit="" rss="'.get_sub_field('rss').'" skype="'.get_sub_field('skype').'" soundcloud="" spotify="" tumblr="" twitter="'.get_sub_field('twitter').'" vimeo="'.get_sub_field('vimeo').'" vk="" whatsapp="" xing="" yahoo="'.get_sub_field('yahoo').'" yelp="'.get_sub_field('yelp').'" youtube="'.get_sub_field('youtube').'" email="'.get_sub_field('email').'" show_custom="no" alignment="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""][/fusion_social_links]'); ?>
											</div>
										<?php endwhile;
									endif;
									if(get_field('ar_author_btn_show','option')) : ?>
										<div class="authorBtn fusion-button-wrapper">
											<a class="fusion-button button-flat fusion-button-square button-xlarge button-default" href="<?php the_field('ar_author_link','option'); ?>" target="_self">
												<span class="fusion-button-text"><?php the_field('ar_author_btn','option'); ?></span>
											</a>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php //if wrap spacer ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<div id="<?php echo $atts['id']; ?>" class="ar-author-block <?php echo $atts['class']; ?>">
				<div id="authorBlock">
					<div class="fusion-clearfix">
						<?php if(get_field('ar_author_img','option')): ?>
							<div class="<?php the_field('ar_author_col1_class','option'); ?> fusion-layout-column fusion-spacing-yes">
								<div class="authorImg">
									<?php echo wp_get_attachment_image(get_field('ar_author_img','option'),'large'); ?>
								</div>
							</div>
							<div class="<?php the_field('ar_author_col2_class','option'); ?> fusion-layout-column fusion-spacing-yes">
						<?php else : ?>
							<div class="fusion-one-half fusion-layout-column fusion-spacing-yes">
						<?php endif; ?>
								<div class="authorContact">
									<?php if(have_rows('ar_author_titles','option')) :
										while(have_rows('ar_author_titles','option')) : the_row();
											if(get_sub_field('space')) : ?>
												<<?php the_sub_field('tag'); ?> class="authorSubTitle"><?php the_sub_field('text'); ?></<?php the_sub_field('tag'); ?>>
											<?php else : ?>
												<<?php the_sub_field('tag'); ?> class="authorTitle"><?php the_sub_field('text'); ?></<?php the_sub_field('tag'); ?>>
											<?php endif;
										endwhile;
									endif;
									if( have_rows('ar_author_contacts','option') ): ?>
										<ul class="authorContactList">
		    								<?php while ( have_rows('ar_author_contacts','option') ) : the_row(); ?>
												<li>
													<?php if(get_sub_field('link')) :
														$target= ' target="_blank"';
														if(get_sub_field('target') == 'same') :
															$target = '';
														endif; ?>
														<a href="'.get_sub_field('link').'"<?php echo $target; ?>>
													<?php endif;
															if(get_sub_field('icon')=='custom') :
																$icon = get_sub_field('custom_icon');
															else :
																$icon = get_sub_field('icon');
															endif; ?>
															<i class="fa <?php echo $icon; ?>"></i>
															<span class="arContactList-text"><?php the_sub_field('text'); ?></span>
													<?php if(get_sub_field('link')) : ?>
														</a>
													<?php endif; ?>
												</li>
		    								<?php endwhile; ?>
										</ul>
									<?php endif;
									if(have_rows('ar_author_social','option')):
										while( have_rows('ar_author_social','option') ): the_row(); ?>
											<div class="authorSocial">
												<?php echo do_shortcode('[fusion_social_links icons_boxed="yes" icons_boxed_radius="0" color_type="brand" icon_colors="" box_colors="" tooltip_placement="" blogger="'.get_sub_field('blogger').'" deviantart="" digg="'.get_sub_field('digg').'" dribbble="" dropbox="" facebook="'.get_sub_field('facebook').'" flickr="'.get_sub_field('flickr').'" forrst="" googleplus="'.get_sub_field('googleplus').'" instagram="'.get_sub_field('instagram').'" linkedin="'.get_sub_field('linkedin').'" myspace="'.get_sub_field('myspace').'" paypal="" pinterest="'.get_sub_field('pinterest').'" reddit="" rss="'.get_sub_field('rss').'" skype="'.get_sub_field('skype').'" soundcloud="" spotify="" tumblr="" twitter="'.get_sub_field('twitter').'" vimeo="'.get_sub_field('vimeo').'" vk="" whatsapp="" xing="" yahoo="'.get_sub_field('yahoo').'" yelp="'.get_sub_field('yelp').'" youtube="'.get_sub_field('youtube').'" email="'.get_sub_field('email').'" show_custom="no" alignment="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""][/fusion_social_links]'); ?>
											</div>
										<?php endwhile;
									endif; ?>
								</div>
							</div>
						<?php if(get_field('ar_author_img','option')): ?>
							<div class="<?php the_field('ar_author_col3_class','option'); ?> fusion-layout-column fusion-spacing-yes fusion-column-last">
						<?php else: ?>
							<div class="fusion-one-half fusion-layout-column fusion-spacing-yes fusion-column-last">
						<?php endif; ?>
								<div class="authorDescription">
									<?php if(get_field('ar_author_btn_show','option')) : 
										echo do_shortcode(get_field('ar_author_description','option')); 
									else : ?>
										<p>No description found.</p>
									<?php endif; ?>
								</div>
								<?php if(get_field('ar_author_btn_show','option')) : ?>
									<div class="authorBtn fusion-button-wrapper">
										<a class="fusion-button button-flat fusion-button-square button-xlarge button-default" href="<?php the_field('ar_author_link','option'); ?>" target="_self">
											<span class="fusion-button-text"><?php the_field('ar_author_btn','option'); ?></span>
										</a>
									</div>
								<?php endif; ?>
							</div>
						<?php //if wrap spacer ?>
					</div>
				</div>
			</div>
		<?php endif;
	return ob_get_clean();
}
add_shortcode( 'ar_author', 'ar_author_block_function' );
function ar_fusion_element_author_block() {
	$params = array(
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
		'name'            => esc_attr__( 'Author Block', 'fusion-builder' ),
		'shortcode'       => 'ar_author',
		'icon'            => 'far fa-address-card',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/author_block-preview.php',
		'preview_id'      => 'fusion-builder-block-module-author_block-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_author_block' );

//add feedzy shortcode to builder
function ar_fusion_element_feedzy_rss() {
	$params = array(
		array(
			'type'        => 'textarea',
			'heading'     => esc_attr__( 'RSS Feeds', 'fusion-builder' ),
			'description'     => esc_attr__( 'Enter your RSS feed URLs separated by commas', 'fusion-builder' ),
			'param_name'  => 'feeds',
		),
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'How Many Items?', 'fusion-builder' ),
			'param_name'  => 'max',
			'value'       => '20',
			'min'         => '1',
			'max'         => '100',
			'step'        => '1',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show Feed Title?', 'fusion-builder' ),
			'param_name'  => 'feed_title',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'The results should udpate every...', 'fusion-builder' ),
			'param_name'  => 'refresh',
			'value'       => array(
				'12_hours'	=> esc_attr__( '12 Hours', 'fusion-builder' ),
				'1_days'	=> esc_attr__( '1 Day', 'fusion-builder' ),
				'3_days'	=> esc_attr__( '3 Days', 'fusion-builder' ),
				'15_days'	=> esc_attr__( '15 Days', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'select',
			'heading'     => esc_attr__( 'Order By:', 'fusion-builder' ),
			'param_name'  => 'refresh',
			'value'       => array(
				'date_desc'		=> esc_attr__( 'Date Descending', 'fusion-builder' ),
				'date_asc'		=> esc_attr__( 'Date Ascending', 'fusion-builder' ),
				'title_desc'	=> esc_attr__( 'Title Descending', 'fusion-builder' ),
				'title_asc'		=> esc_attr__( 'Title Ascending', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Message to Show When There are No Items to Display', 'fusion-builder' ),
			'param_name'  => 'error_empty',
			'value'		  => 'No Posts Found',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Open links in a new Window/Tab?', 'fusion-builder' ),
			'param_name'  => 'target',
			'value'       => array(
				'_blank' => esc_attr__( 'Yes', 'fusion-builder' ),
				'_self'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show published date and author name?', 'fusion-builder' ),
			'param_name'  => 'meta',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show excerpt?', 'fusion-builder' ),
			'param_name'  => 'summary',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'Excerpt Length (characters)', 'fusion-builder' ),
			'param_name'  => 'summarylength',
			'value'       => '150',
			'min'         => '1',
			'max'         => '500',
			'step'        => '1',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show thumbnail image?', 'fusion-builder' ),
			'param_name'  => 'thumb',
			'value'       => array(
				'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
				'no'  => esc_attr__( 'No', 'fusion-builder' ),
			),
		),
		array(
			'type'        => 'range',
			'heading'     => esc_attr__( 'Thumbnail size (pixels)', 'fusion-builder' ),
			'param_name'  => 'size',
			'value'       => '150',
			'min'         => '1',
			'max'         => '500',
			'step'        => '1',
		),
		array(
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Force https for Images?', 'fusion-builder' ),
			'param_name'  => 'http',
			'value'       => array(
				'force'  => esc_attr__( 'Yes', 'fusion-builder' ),
				'' => esc_attr__( 'No, Allow http', 'fusion-builder' ),
				'default'  => esc_attr__( 'No, Use default image', 'fusion-builder' ),
			),
		),
	);
	$args = array(
		'name'            => esc_attr__( 'RSS Feed', 'fusion-builder' ),
		'shortcode'       => 'feedzy-rss',
		'icon'            => 'fas fa-rss',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/feedzy_rss-preview.php',
		'preview_id'      => 'fusion-builder-block-module-feedzy_rss-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
if(shortcode_exists('feedzy-rss')) :
	add_action( 'fusion_builder_before_init', 'ar_fusion_element_feedzy_rss' );
endif;

//add quote shortcode
function ar_quote_func( $atts) {
	$atts = shortcode_atts(
		array(
			'cite' => '',
			'class' => '',
			'id' => '',
			'quote' => '',
		),
		$atts
	);
	$class = 'ar-quote';
	if($atts['cite']) {
		$class .= ' ar-quote-has-cite';
	}
	if($atts['class']) {
		$class .= ' '.$atts['class'];
	}

	ob_start(); ?>
		<div class="<?php echo $class; ?>" id="<?php echo $atts['id']; ?>">
			<div class="ar-quote-inner fusion-clearfix">
				<span class="ar-quote-content"><?php echo do_shortcode($atts['quote']); ?></span>
				<?php if($atts['cite']) : ?>
					<span class="ar-quote-cite"><?php echo $atts['cite']; ?></span>
				<?php endif; ?>
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
	<?php return ob_get_clean();
}
add_shortcode( 'ar_quote', 'ar_quote_func' );
function ar_fusion_element_quote() {
	$params = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Quote Author', 'fusion-builder' ),
			'param_name'  => 'cite',
		),
		array(
            'type'        => 'tinymce',
            'heading'     => esc_attr__( 'Quote', 'fusion-builder' ),
            'param_name'  => 'quote',
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
		'name'            => esc_attr__( 'Quote', 'fusion-builder' ),
		'shortcode'       => 'ar_quote',
		'icon'            => 'fas fa-quote-right',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/quote-preview.php',
		'preview_id'      => 'fusion-builder-block-module-quote-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_quote' );


/****
** [ar_dmca $atts...]
****/
function ar_dmca_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'name' => '',
			'address' => '',
			'email' => '',
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-dmca <?php echo $atts['class']; ?>">
			<h2>Digital Millennium Copyright Act Notice</h2>
			<h4>Claims of Copyright Infringement & Related Issues (17 USC § 512 et seq.)</h4>
			<p>We respect the intellectual property rights of others. Anyone who believes their work has been reproduced in a way that constitutes copyright infringement may notify our agent by providing the following information:</p>
			<ol>
				<li>Identification of the copyrighted work that you claim has been infringed, or, if multiple copyrighted works at a single online site are covered by a single notification, a representative list of such works at the site;</li>
				<li>Identification of the material that you claim is infringing and needs to be removed, including a description of where it is located so that the copyright agent can locate it;</li>
				<li>Your address, telephone number, and, if available, e-mail address, so that the copyright agent may contact you about your complaint; and</li>
				<li>A signed statement that the above information is accurate; that you have a good faith belief that the identified use of the material is not authorized by the copyright owner, its agent, or the law; and, under penalty of perjury, that you are the copyright owner or are authorized to act on the copyright owner’s behalf in this situation.</li>
			</ol>
			<p>Upon obtaining such knowledge we will act expeditiously to remove, or disable access to, the material. Please be aware that there are substantial penalties for false claims.</p>
			<p>If a notice of copyright infringement has been wrongly filed against you, you may submit a counter notification to our agent. A valid counter notification is a written communication that incorporates the following elements:</p>
			<ol>
				<li>A physical or electronic signature of the poster;</li>
				<li>Identification of the material that has been removed or to which access has been disabled and the location at which the material appeared before it was removed or access to it was disabled;</li>
				<li>A statement under penalty of perjury that you have a good faith belief that the material was removed or disabled as a result of mistake or misidentification;</li>
				<li>Your name, address, and telephone number; a statement that you consent to the jurisdiction of federal district court for the judicial district in which your address is located, or if your address is outside of the U.S., for any judicial district in which the service provider may be found; and that you will accept service of process from the complainant.</li>
			</ol>
			<hr>
			<h3>Notices of the foregoing copyright issues should be sent as follows:</h3>
			<div class="fusion-clearfix">
				<div class="fusion-one-half fusion-layout-column fusion-spacing-yes">
					<h5><strong>BY MAIL:</strong></h5>
					<p><?php echo $atts['name']; ?><br><?php echo $atts['address']; ?><br><strong>Attention:</strong> DMCA Designated Agent</p>
				</div>
				<div class="fusion-one-half fusion-layout-column fusion-spacing-yes fusion-column-last">
					<h5><strong>BY E-MAIL:</strong></h5>
					<p><?php echo $atts['name']; ?><br><?php echo $atts['email']; ?><br><strong>RE:</strong> DMCA Designated Agent</p>
				</div>
			</div>
			<hr>
			<p>If you give notice of copyright infringement by e-mail, an agent may begin investigating the alleged copyright infringement; however, we must receive your signed statement by mail or as an attachment to your e-mail before we are required to take any action.</p>
			<p>This information should not be construed as legal advice. We recommend you seek independent legal counsel before filing a notification or counter-notification. For further information about the DMCA, please visit the website of the United States Copyright Office at: <a href="http://www.copyright.gov/" target="_blank">http://www.copyright.gov/</a>.</p>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_dmca', 'ar_dmca_func' );
function ar_fusion_element_dmca() {
	$params = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Display Name', 'fusion-builder' ),
			'param_name'  => 'name',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Mailing Address', 'fusion-builder' ),
			'param_name'  => 'address',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Email Address', 'fusion-builder' ),
			'param_name'  => 'email',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS Class', 'fusion-builder' ),
			'param_name'	=> 'class',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_attr__( 'Custom CSS ID', 'fusion-builder' ),
			'param_name'	=> 'id',
		),
	);
	$args = array(
		'name'            => esc_attr__( 'DMCA', 'fusion-builder' ),
		'shortcode'       => 'ar_dmca',
		'icon'            => 'fas fa-shield-alt',
		'preview'         => get_stylesheet_directory().'/realadvantage/js/previews/dmca-preview.php',
		'preview_id'      => 'fusion-builder-block-module-dmca-preview-template',
		'allow_generator' => true,
		'params'          => $params,
	);
	fusion_builder_map($args);
}
add_action( 'fusion_builder_before_init', 'ar_fusion_element_dmca' );



/****
** [ar_yelp $atts...]
****/
function ar_yelp_func( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'location' => '',
			'type' => 'Restaurants',
			'sort' => '0', //0->Best Match, 1->Distance, 2->Highest Rated
		),
		$atts
	);

	return '<div class="ar_yelp_widget">'.do_shortcode('[fusion_widget yelp_widget__location="'.$atts['location'].'"  yelp_widget__term="'.$atts['type'].'" type="Yelp_Widget" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" fusion_display_title="no" fusion_padding_color="" fusion_margin="" fusion_bg_color="" fusion_bg_radius_size="" fusion_border_size="0" fusion_border_style="solid" fusion_border_color="" fusion_divider_color="" fusion_align="" fusion_align_mobile="" yelp_widget__title="" yelp_widget__display_option="" yelp_widget__id="" yelp_widget__display_reviews="1" yelp_widget__profile_img_size="100x100" yelp_widget__display_address="1" yelp_widget__display_phone="1" yelp_widget__disable_title_output="1" yelp_widget__target_blank="1" yelp_widget__no_follow="1" yelp_widget__cache="1 Day" yelp_widget__limit="8" yelp_widget__sort="'.$atts['short'].'" ][/fusion_widget]').'</div>';

}
add_shortcode( 'ar_yelp', 'ar_yelp_func' );