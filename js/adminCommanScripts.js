$(window).load(function() {
  $(".loadings").fadeOut("slow");
});

jQuery(document).ready(function($) {

  function showLoading() {
    $(".loadings").fadeIn("slow");
  }

  function clearLoading() {
    $(".loadings").fadeOut("slow");
  }
  
  jQuery(document).on('change', '#status', function(event) {
    var selectedPAN = jQuery(this).parent().parent().attr('data-pan');
    var returnStatus = jQuery(this).val();
    console.log('returnStatus', returnStatus);
    // showLoading();
    $.ajax({
      url: "php_updateReturnStatus.php?panno=" + selectedPAN + "&status=" + returnStatus,
      type: "GET",
      success: function(data) {
        console.log('returnStatus : ', data);
        if (data === 'okay') {
          console.log('okay : ', data);
          jQuery(".returnStatusUpdated").slideDown('slow').delay(4000).slideUp('slow');
        } else {
          console.log('something wrong', data);
        }
      },
      error: function(data) {
        console.log('error', data);
      },
      complete: function(xhr) {
        // clearLoading();
      }
    });
  });

});