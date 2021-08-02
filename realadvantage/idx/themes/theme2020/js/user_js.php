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
		$('div#IDX-leadSignUpFormContainer div#ar-userForm div#ar-userFormInner').prepend('<div id="arFormTitle"><h1>Register Now!</h1><p>Sign up to get access to our free Listing Manager.</p></div>');
		$('div#IDX-leadLoginForm div#ar-userForm div#ar-userFormInner').prepend('<div id="arFormTitle"><h1>Login By Email</h1><p>Sign in to access your Listing Manager account features.</p></div>');
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

		//select an agent
		if($('select#IDX-agentOwner').length > 0) {
			$('select#IDX-agentOwner').wrap('<div id="IDX-agentOwner-select-wrap" class="IDX-select-wrap">');
			$('#IDX-agentOwner-select-wrap').append('<div class="IDX-select-arrow"><i class="fal fa-chevron-down" aria-hidden="true"></i></div>');
			$('select#IDX-agentOwner > option:first-of-type').text('Working with an Agent?');
			$('div#IDX-customRegistrationFields div#IDX-agentOwner-group').removeClass('col-sm-6').addClass('col-sm-12');
		}
		
	});
</script>
<style>
	<?php if(have_rows('settings_theme2020')) :
		while(have_rows('settings_theme2020')) : the_row();
			$user = get_sub_field('user');
			if($user['bg']) : 
				$pageBg = wp_get_attachment_image_url($user['bg'],'full'); ?>
				div#IDX-main {
					background-image: url('<?php echo $pageBg; ?>');
				}
			<?php endif;
		endwhile;
	endif; ?>
</style>