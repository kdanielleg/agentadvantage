<?php 

/****
** [ar_privacy $atts...]
****/
function ar_privacy_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'class' => '',
			'id'	=> '',
		),
		$atts
	);
	$website = get_home_url();
	$email = get_option('admin_email');
	$phone = get_option('aa_admin_phone');

	ob_start(); ?>
		<div id="<?php echo $atts['id']; ?>" class="ar-privacy-policy <?php echo $atts['class']; ?>">
			<p>This privacy notice discloses the privacy practices for <?php echo $website; ?>. This privacy notice applies solely to information collected by this website. It will notify you of the following:</p>
			<ul>
				<li>What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li>
				<li>What choices are available to you regarding the use of your data.</li>
				<li>The security procedures in place to protect the misuse of your information.</li>
				<li>How you can correct any inaccuracies in the information.</li>
			</ul>
			<h3>Information Collection, Use, and Sharing</h3>
			<p>We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>
			<p>We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.</p>
			<p>Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.</p>
			<h3>Registration</h3>
			<p>In order to use certain features of this website, a user must first complete the registration form. During registration a user is required to give certain information (such as name and email address). This information is used to contact you about the products/services on our site in which you have expressed interest. At your option, you may also provide demographic information (such as gender or age) about yourself, but it is not required.</p>
			<h3>Comments</h3>
			<p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.</p>
			<p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: <a href="https://automattic.com/privacy/" target="_blank">https://automattic.com/privacy/</a>. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p>
			<h3>Media</h3>
			<p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p>
			<h3>Cookies</h3>
			<p>We use 'cookies' on this site. A cookie is a piece of data stored on a site visitor's hard drive to help us improve your access to our site and identify repeat visitors to our site. For instance, when we use a cookie to identify you, you would not have to log in a password more than once, thereby saving time while on our site. Cookies can also enable us to track and target the interests of our users to enhance the experience on our site. Usage of a cookie is in no way linked to any personally identifiable information on our site.</p>
			<p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p>
			<p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>
			<p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select "Remember Me", your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>
			<p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>
			<p>Some of our business partners may use cookies on our site (for example, advertisers). However, we have no access to or control over these cookies.</p>
			<h3>Links</h3>
			<p>This website contains links to other sites. Please be aware that we are not responsible for the content or privacy practices of such other sites. We encourage our users to be aware when they leave our site and to read the privacy statements of any other site that collects personally identifiable information.</p>
			<h3>Embedded content from other websites</h3>
			<p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p>
			<p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p>
			<h3>Surveys & Contests</h3>
			<p>From time-to-time our site requests information via surveys or contests. Participation in these surveys or contests is completely voluntary and you may choose whether or not to participate and therefore disclose this information. Information requested may include contact information (such as name and shipping address), and demographic information (such as zip code, age level). Contact information will be used to notify the winners and award prizes. Survey information will be used for purposes of monitoring or improving the use and satisfaction of this site.</p>
			<h3>Security</h3>
			<p>We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.</p>
			<p>Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for 'https' at the beginning of the address of the Web page.</p>
			<p>While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>
			<h3>Who we share your data with</h3>
			<p>If you request a password reset, your IP address will be included in the reset email.</p>
			<p>Visitor comments may be checked through an automated spam detection service</p>
			<h3>How long we retain your data</h3>
			<p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>
			<p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>
			<h3>What rights you have over your data</h3>
			<p>You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:</p>
			<ul>
				<li>See what data we have about you, if any.</li>
				<li>Change/correct any data we have about you.</li>
				<li>Have us delete any data we have about you.</li>
				<li>Express any concern you have about our use of your data.</li>
			</ul>
			<p>This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>
			<p>If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at <?php echo $phone; ?> or via <?php echo $email; ?>.</p>
		</div>
	<?php return ob_get_clean();
}
add_shortcode( 'ar_privacy', 'ar_privacy_func' );
function ar_fusion_element_privacy() {
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
** [ar_dmca $atts...]
****/
function ar_dmca_func() {
	$name = get_option('aa_admin_name');
	$email = get_option('admin_email');
	$address = get_option('aa_admin_address');
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
					<p><?php echo $name; ?><br><?php echo $address; ?><br><strong>Attention:</strong> DMCA Designated Agent</p>
				</div>
				<div class="fusion-one-half fusion-layout-column fusion-spacing-yes fusion-column-last">
					<h5><strong>BY E-MAIL:</strong></h5>
					<p><?php echo $name; ?><br><?php echo $email; ?><br><strong>RE:</strong> DMCA Designated Agent</p>
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