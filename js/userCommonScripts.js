jQuery(document).ready(function() {

  //Number validation
  jQuery("#txtContactMobile").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      return false;
    }
  });

    //Number validation
  jQuery("#txtAadharNumber").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      return false;
    }
  });

  //Number validation
  jQuery("#txtMobile").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      return false;
    }
  });

  //Number validation
  jQuery("#txtPincode").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      return false;
    }
  });

  //Number validation
  jQuery("#txtAccountNumber").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      return false;
    }
  });

    //Character validation
    jQuery("#txtFirstName").keypress(function(evt){
      var keyCode = (evt.which) ? evt.which : evt.keyCode
      if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
        return false;
      return true;
    });

    //Character validation
    jQuery("#txtMiddleName").keypress(function(evt){
      var keyCode = (evt.which) ? evt.which : evt.keyCode
      if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
        return false;
      return true;
    });

    //Character validation
    jQuery("#txtLastName").keypress(function(evt){
      var keyCode = (evt.which) ? evt.which : evt.keyCode
      if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
        return false;
      return true;
    });

    //Character validation
    jQuery("#txtFatherName").keypress(function(evt){
      var keyCode = (evt.which) ? evt.which : evt.keyCode
      if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
        return false;
      return true;
    });

    //Character validation
    jQuery("#txtBankName").keypress(function(evt){
      var keyCode = (evt.which) ? evt.which : evt.keyCode
      if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
        return false;
      return true;
    });

  //IFSC Code validation
  jQuery("#txtIFSCCode").blur(function(e) {
    var regIFSCPattern = /[A-Z|a-z]{4}[0][\d]{6}$/g;
    var txtIFSC = jQuery.trim(jQuery("#txtIFSCCode").val());
    if(txtIFSC !== ''){
      var regResultIFSC = regIFSCPattern.test(txtIFSC);
      if (regResultIFSC) {
        return true;
      } else {
        alert('Please enter valid IFSC code.');
        jQuery("#txtIFSCCode").focus();
        return false;
      }
    }
  });

});