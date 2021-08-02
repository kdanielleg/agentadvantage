<?php /**User Pages JS**/ ?>
<script>
	jQuery(document).ready(function($){
		$('div#ar-idx-disclaimer').append($('.IDX-pageContainer + div'));
		$('div#IDX-leadSignupHeader').unwrap().unwrap().unwrap().remove();
		$('div#IDX-leadLoginHeader').unwrap().unwrap().unwrap().remove();
		$('div#IDX-leadLoginForm').unwrap();
		$('div#IDX-leadSignUpFormContainer').removeClass('IDX-panel-body');

		$('.IDX-formContainer').wrap('<div id="ar-UserFormContainer">').wrapInner('<div id="ar-UserFormRow" class="IDX-row"><div id="ar-userForm" class="col-sm-12 col-md-6"><div id="ar-userFormInner"></div></div>');
		$('div#ar-UserFormRow').prepend('<div id="ar-userSocial" class="col-sm-12 col-md-6">');
		$('div#ar-userSocial').append($('div#IDX-social-providers, div#IDX-gotoUserSignup'));
		$('div#IDX-leadSignUpFormContainer div#ar-userSocial').append('<div id="IDX-gotoUserLogin">');
		$('#IDX-gotoUserLogin').append($('div#IDX-signupFormActions + span')).append($('a#IDX-toggleLogIn'));

		//placeholders
		$('input#IDX-signupfirstName').attr('placeholder','First Name*');
		$('input#IDX-signuplastName').attr('placeholder','Last Name*');
		$('input#IDX-signupemail, input#IDX-email').attr('placeholder','Email Address*');
		$('input#IDX-signupphone').attr('placeholder','Phone Number');
		$('input#IDX-passwordpassword').attr('placeholder','Password*');

		//forgot pass
		$('div#IDX-leadLoginForm div#IDX-password-group').append($('span#IDX-leadLoginForgotPass'));

		//cleanup
		$('div#IDX-social-media-logins, div#IDX-signup-instructions, div#IDX-login-instructions').remove();
		$('div#IDX-customRegistrationFields > div#IDX-firstName-group, div#IDX-customRegistrationFields > div#IDX-lastName-group').wrapAll('<div class="col-sm-12"><div class="IDX-row">').addClass('col-md-6');

		//titles
		$('div#IDX-leadSignUpFormContainer div#ar-userForm div#ar-userFormInner').prepend('<div id="arFormTitle"><h1>Register Now!</h1><p>Sign up to get access to our free listing manager.</p></div>');
		$('div#IDX-leadLoginForm div#ar-userForm div#ar-userFormInner').prepend('<div id="arFormTitle"><h1>Login By Email</h1><p>Sign in to access your account features.</p></div>');
		$('div#ar-userSocial').prepend('<div id="arFormTitleSocial"><h3>Choose an Option Below</h3></div>');

		//form buttons
		$('button#IDX-signupFormSubmitBtn i, button#IDX-loginSubmit i').remove();
		$('button#IDX-signupFormSubmitBtn').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fal fa-user-plus"></i></span><span class="fusion-button-text fusion-button-text-left">Create My Account</span>');
		$('button#IDX-loginSubmit').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fal fa-sign-in"></i></span><span class="fusion-button-text fusion-button-text-left">Log Me In</span>');


		$('button#IDX-signupFormSubmitBtn, button#IDX-loginSubmit').removeClass('IDX-btn IDX-btn-default IDX-btn-block').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').wrap('<div class="fusion-button-wrapper fusion-align-block">');


		//social media
		$('#IDX-social-google button span').text('Log In With Google').addClass('fusion-button-text fusion-button-text-left');
		$('#IDX-social-facebook button span').text('Log In With Facebook').addClass('fusion-button-text fusion-button-text-left');
		$('#IDX-social-google button').attr('id','arUserForm-googleBtn').addClass('fusion-button button-flat fusion-button-default-size button-custom fusion-button-span-yes fusion-button-default-type').prepend('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-google fab" aria-hidden="true"></i></span>').wrap('<div class="fusion-button-wrapper fusion-align-block">');
		$('#IDX-social-facebook button').attr('id','arUserForm-facebookBtn').addClass('fusion-button button-flat fusion-button-default-size button-custom fusion-button-span-yes fusion-button-default-type').prepend('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-facebook fab" aria-hidden="true"></i></span>').wrap('<div class="fusion-button-wrapper fusion-align-block">');
		$('#IDX-social-providers .IDX-social-form').removeClass('IDX-social-form').addClass('arUser-socialForm');

		//signup link
		$('div#IDX-gotoUserSignup').html($('div#IDX-gotoUserSignup > a#IDX-userSignupLink'));
		$('a#IDX-userSignupLink').wrap('<div class="fusion-button-wrapper fusion-align-block">').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-paper-plane fal" aria-hidden="true"></i></span><span class="fusion-button-text fusion-button-text-left">Create an Account</span>');
		$('div#IDX-gotoUserLogin > span').remove();
		$('a#IDX-toggleLogIn').wrap('<div class="fusion-button-wrapper fusion-align-block">').addClass('fusion-button button-flat fusion-button-default-size button-default fusion-button-span-yes fusion-button-default-type').html('<span class="fusion-button-icon-divider button-icon-divider-left"><i class="fa-paper-plane fal" aria-hidden="true"></i></span><span class="fusion-button-text fusion-button-text-left">Log in with Email</span>');

		//or
		$('div#ar-UserFormContainer').append('<div id="arUser-or"><span>or</span></div>');

		//inner
		$('div#ar-userSocial').wrapInner('<div id="ar-userSocialInner">');

		//account page
		$('div#idx-mlm-scrollTop').remove();
		$('div#ar-idx-disclaimer').append($('div#idx-mlm-app + div'));
		
	});
</script>
<style>
	<?php if(have_rows('settings_theme1')) :
		while(have_rows('settings_theme1')) : the_row();
			$user = get_sub_field('user');
			if($user['bg']) : 
				$pageBg = wp_get_attachment_image_url($user['bg'],'full'); ?>
				div#IDX-main {
					background-image: url('<?php echo $pageBg; ?>');
				}
			<?php endif;
			if($user['buttons']) : 
				$buttons = $user['buttons'];
				if($buttons['font']||$buttons['upper']) :	?>
					#IDX-social-google button, #IDX-social-facebook button, div#IDX-FormActions button#IDX-loginSubmit, div#IDX-signupFormActions #IDX-signupFormSubmitBtn {
						<?php if($buttons['font']): ?>
							font-family: <?php echo $buttons['font']; ?>!important;
						<?php endif;
						if($buttons['upper']) : ?>
							text-transform: uppercase!important;
						<?php endif; ?>
					}
				<?php endif; 
				if($buttons['bg']||$buttons['color']): ?>
					div#IDX-FormActions button#IDX-loginSubmit, div#IDX-signupFormActions #IDX-signupFormSubmitBtn {
						<?php if($buttons['bg']) : ?>
    						background-color: <?php echo $buttons['bg']; ?>!important;
    					<?php endif;
    					if($buttons['color']) : ?>
    						color: <?php echo $buttons['color']; ?>!important;
    					<?php endif; ?>
					}
				<?php endif; 
				if($buttons['bg_hover']||$buttons['color_hover']) : ?>
					div#IDX-FormActions button#IDX-loginSubmit:hover, div#IDX-signupFormActions #IDX-signupFormSubmitBtn:hover,
					div#IDX-FormActions button#IDX-loginSubmit:hover span, div#IDX-signupFormActions #IDX-signupFormSubmitBtn:hover span {
						<?php if($buttons['bg_hover']) : ?>
    						background-color: <?php echo $buttons['bg_hover']; ?>!important;
    					<?php endif;
    					if($buttons['color_hover']) : ?>
    						color: <?php echo $buttons['color_hover']; ?>!important;
    					<?php endif; ?>
					}
				<?php endif;
			endif;
			if($user['or_bg']||$user['or_color']) : ?>
				div#arUser-or {
					<?php if($user['or_color']): ?>
						color: <?php echo $user['or_color']; ?>!important;
					<?php endif;
					if($user['or_bg']): ?>
    					background-color: <?php echo $user['or_bg'];?>!important;
    				<?php endif; ?>
				}
			<?php endif;;
		endwhile;
	endif; ?>
</style>