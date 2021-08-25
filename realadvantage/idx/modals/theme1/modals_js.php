<?php /**modal scripts**/ 
$idxLink = get_option('aa_idx_url');
$siteHome = get_site_url();
$agentFieldText == 'Working with an Agent?';

?>

<script>jQuery(document).ready(function($){
  $('.IDX-registrationModal').each(function(){
    $(this).find($('div#IDX-firstName-group input')).attr('placeholder','First Name');
    $(this).find($('div#IDX-lastName-group input')).attr('placeholder','Last Name');
    $(this).find($('div#IDX-email-group input')).attr('placeholder','Email Address');
    $(this).find($('div#IDX-phone-group input')).attr('placeholder','Phone Number');
    $(this).find($('div#IDX-password-group input')).attr('placeholder','Password');
    $(this).find($('#IDX-social-facebook button')).html('<i class="fab fa-facebook"></i> <span>Log in with Facebook</span>');
    $(this).find($('#IDX-social-google button')).html('<i class="fab fa-google"></i> <span>Log in with Google</span>');
    /**Registration**/
    $(this).find($('div#IDX-registrationContent div#IDX-registrationSignup')).prepend($(this).find($('div#IDX-registrationContent div#IDX-registrationMessage')));
    $(this).find($('div#IDX-registrationSignup')).wrapInner('<div id="registrationSignup-inner" class="fusion-clearfix"><div class="fusion-one-half fusion-layout-column regModal-col" id="regModal-left"><div id="regModal-left-inner">');
    $(this).find($('#registrationSignup-inner')).append('<div class="fusion-one-half fusion-layout-column fusion-column-last regModal-col" id="regModal-right"><div id="regModal-right-inner"></div></div>');
    $(this).find($('.regModal-col')).matchHeight();
    $(this).find($('#regModal-right-inner')).append($(this).find($('#regModal-left div#IDX-social-media-logins')));
    $(this).find($('div#registrationSignup-inner')).append('<div id="regModal-closeLink"><a href="#" class="close psudolink" data-dismiss="dialog" onclick="idx(\'div#IDX-registration\').dialog(\'close\');"><i class="fad fa-window-close"></i></a></div>');
    
    $(this).find($('div#registrationSignup-inner')).append('<div id="regModal-or"><span>or</span></div>');
    $(this).find($('#regModal-right-inner')).append($(this).find($('div#IDX-leadSignUpLogin')));
    $(this).find($('#regModal-left p#IDX-signup-instructions')).remove();
    $(this).find($('div#regModal-left-inner')).prepend('<p id="regModal-leftText">Sign up to get access to our free listing manager. You can save properties and searches, get email updates and we can provide the best customer service.</p>');
    $(this).find($('div#regModal-left-inner')).prepend('<h2 id="regModal-leftTitle">Register Now!</h2>');
    $(this).find($('div#regModal-right-inner')).prepend('<p id="regModal-rightText">Choose an Option Below</p>');
    $(this).find($('div#regModal-right-inner')).prepend('<h2 id="regModal-rightTitle">Log In</h2>');
    $(this).find($('div#regModal-right-inner a#IDX-toggleLogIn')).html('<i class="fal fa-envelope-open"></i> <span>Log in with Email</span>');
    $(this).find($('div#regModal-right-inner')).wrapInner('<div id="regModal-right-innerWrap">');
    /**Log In**/
    $(this).find($('div#IDX-registrationLogin')).wrapInner('<div id="registrationLogin-inner" class="fusion-clearfix"><div class="fusion-one-half fusion-layout-column logModal-col" id="logModal-left"><div id="logModal-left-inner">');
    $(this).find($('#registrationLogin-inner')).append('<div class="fusion-one-half fusion-layout-column fusion-column-last logModal-col" id="logModal-right"><div id="logModal-right-inner"></div></div>');
    $(this).find($('.logModal-col')).matchHeight();
    $(this).find($('#logModal-right-inner')).append($(this).find($('#logModal-left div#IDX-social-media-logins')));
    $(this).find($('div#registrationLogin-inner')).append('<div id="logModal-closeLink"><a href="#" class="close psudolink" data-dismiss="dialog" onclick="idx(\'div#IDX-registration\').dialog(\'close\');"><i class="fad fa-window-close"></i></a></div>');
    $(this).find($('div#registrationLogin-inner')).append('<div id="logModal-or"><span>or</span></div>');
    $(this).find($('#logModal-left p#IDX-login-instructions')).remove();
    $(this).find($('div#logModal-left-inner > p')).remove();
    $(this).find($('div#logModal-left-inner')).prepend('<p id="logModal-leftText">Sign in to access your account features.</p>');
    $(this).find($('div#logModal-left-inner')).prepend('<h2 id="logModal-leftTitle">Log In Using Email</h2>');
    $(this).find($('div#logModal-right-inner')).prepend('<h2 id="logModal-rightTitle">Log In Using Social Network</h2>');
    $(this).find($('div#logModal-right-inner')).wrapInner('<div id="logModal-right-innerWrap">');
  });
  $('.IDX-registrationModal.IDX-registration-force p#regModal-leftText').html('<b>You must register or log in to view this page!</b> In order to continue, we ask that you register a name and valid email address so that we may provide you with outstanding customer service.');
  $('.IDX-registrationModal.IDX-registration-force p#logModal-leftText').html('<b>You must register or log in to view this page!</b> In order to continue, we ask that you log in with a valid account so that we may provide you with outstanding customer service.');

  $('.IDX-registrationModal.IDX-registration-requestNonRecurring p#regModal-leftText').html('Sign up to get access to our free listing manager. You can save properties and searches, get email updates and we can provide the best customer service. To skip registration, either close this modal window or click this <a href="#" class="psudolink" data-dismiss="dialog" onclick="idx(\'div#IDX-registration\').dialog(\'close\');">link</a>.');
  $('.IDX-registrationModal.IDX-registration-requestNonRecurring p#logModal-leftText').html('Sign up to get access to our free listing manager. You can save properties and searches, get email updates and we can provide the best customer service. To skip registration, either close this modal window or click this <a href="#" class="psudolink" data-dismiss="dialog" onclick="idx(\'div#IDX-registration\').dialog(\'close\');">link</a>.');

  $('.IDX-registrationModal.IDX-registration-requestRecurring p#regModal-leftText').html('Sign up to get access to our free listing manager. You can save properties and searches, get email updates and we can provide the best customer service. To skip registration, either close this modal window or click this <a href="#" class="psudolink" data-dismiss="dialog" onclick="idx(\'div#IDX-registration\').dialog(\'close\');">link</a>.');
  $('.IDX-registrationModal.IDX-registration-requestRecurring p#logModal-leftText').html('Sign up to get access to our free listing manager. You can save properties and searches, get email updates and we can provide the best customer service. To skip registration, either close this modal window or click this <a href="#" class="psudolink" data-dismiss="dialog" onclick="idx(\'div#IDX-registration\').dialog(\'close\');">link</a>.');

  //force registration close link
  if($('#IDX-main.IDX-category-results').length > 0) {
    if($('a.IDX-modifySearch.IDX-resultsAction').length > 0) {
      var modifyLink = $('a.IDX-modifySearch.IDX-resultsAction').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+modifyLink+'")');
    }else if($('a.IDX-newSearch.IDX-resultsAction').length > 0) {
      var newSearchLink = $('a.IDX-newSearch.IDX-resultsAction').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+newSearchLink+'")');
    }else {
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("<?php echo $siteHome; ?>")');
    } 
  }else if($('#IDX-main.IDX-category-details').length > 0) {
    if($('a#IDX-backToResults').length > 0) { //MF back
      var detailsBackLink = $('a#IDX-backToResults').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+detailsBackLink+'")');
    }else if($('a#idx-back-to-results').length > 0) { //pro back
      var detailsBackLink2 = $('a#idx-back-to-results').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+detailsBackLink2+'")');
    }else if($('a#IDX-modifySearch').length > 0) { //MF Modify
      var detailsModifyLink = $('a#IDX-modifySearch').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+detailsModifyLink+'")');
    }else if($('a#idx-back-to-results + a#idx-new-search + a#idx-new-search').length > 0) { //Pro Modify
      var detailsModifyLink2 = $('a#idx-back-to-results + a#idx-new-search').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+detailsModifyLink2+'")');
    }else if($('a#IDX-newSearch').length > 0) { //MF New
      var detailsSearchLink = $('a#IDX-newSearch').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+detailsSearchLink+'")');
    }else if($('a#idx-new-search').length > 0) { //Pro New
      var detailsSearchLink2 = $('a#idx-new-search').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+detailsSearchLink2+'")');
    }else {
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("<?php echo $siteHome; ?>")');
    }
  }else if($('#IDX-main.IDX-category-listing').length > 0) {
    if($('a#IDX-returnToPreviousPage').length > 0) {
      var prevPageLink = $('a#IDX-returnToPreviousPage').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+prevPageLink+'")');
    }else if($('a#IDX-goToProperty').length > 0) {
      var goPropLink = $('a#IDX-goToProperty').attr('href');
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("'+goPropLink+'")');
    }else {
      $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("<?php echo $siteHome; ?>")');
    }
  }else {
    $('div#IDX-registration.IDX-registration-force a.close.psudolink').attr('onclick', 'window.location.assign("<?php echo $siteHome; ?>")');
  }

  $('div#regModal-left .IDX-customRegistrationFields div#IDX-agentOwner-group select#IDX-agentOwner > option:first-of-type').text('<?php echo $agentFieldText; ?>');
});</script>