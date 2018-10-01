jQuery(document).ready(function($) {

    jQuery('#cnfpassword').blur(function(event) {
      var pass = jQuery('#password').val();
      var confirmPass = jQuery('#cnfpassword').val();
      if (pass !== confirmPass) {
        alert('Please enter same passowrd!');
        jQuery('#cnfpassword').val('');
        jQuery('#cnfpassword').focus();
      }
    });
  //////////////////////////////////////////
  jQuery('#alreadyRegistered').click(function(event) {
    window.location = "login.html";
  });
  //////////////////////////////////////////
  jQuery('#chkTermsAndConditions').click(function() {
    if (jQuery("#chkTermsAndConditions").is(':checked'))
      jQuery("#register").removeAttr('disabled');
    else
      jQuery("#register").attr('disabled', 'disabled');
  });
  //////////////////////////////////////////
  jQuery("#panno").change(function() {
    var panno = jQuery("#panno").val();
    var msgbox = jQuery("#status");
    if (panno !== '') {
      jQuery("#status").html('<img src="img/loading.gif" class="smallIcon" align="absmiddle">&nbsp;Checking availability...');
      jQuery.ajax({
        url: "php_usernameCheck.php",
        type: "POST",
        data: "panno=" + panno,
        success: function(data) {
          if (data == 'OK') {
            console.log('data', data);
            jQuery("#panno").removeClass("red");
            msgbox.html('<img src="img/available.png" class="smallIcon" align="absmiddle">  <strong>' + panno + '</strong> is availabile.');
          } else {
            jQuery("#panno").addClass("red");
            jQuery("#panno").focus();
            jQuery("#status").html('');
            msgbox.html(data);
            jQuery("#register").attr('disabled', 'disabled');
          }
        },
        error: function() {
          jQuery('#info').html('<p>An error has occurred</p>');
        }
      });
      return false;
    }
  });
  //////////////////////////////////////////
  jQuery("#txtContactMobile").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
     return false;
   }
 });

});