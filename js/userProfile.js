jQuery(document).ready(function() {
	
	jQuery('#chkIncomeSalay').click(function() {
		if (jQuery("#chkIncomeSalay").is(':checked')){
			jQuery("#fileIncomeFromSalary").siblings('.ajax-upload-dragdrop').find('input').removeAttr('disabled');
		}
		else{
			jQuery("#fileIncomeFromSalary").siblings('.ajax-upload-dragdrop').find('input').attr('disabled', 'disabled');
		}
	});

	jQuery('#chkIncomeHouseProperties').click(function() {
		if (jQuery("#chkIncomeHouseProperties").is(':checked')){
			jQuery("#fileIncomeHouseProperties").siblings('.ajax-upload-dragdrop').find('input').removeAttr('disabled');
		}
		else{
			jQuery("#fileIncomeHouseProperties").siblings('.ajax-upload-dragdrop').find('input').attr('disabled', 'disabled');
		}
	});

	jQuery('#chkProfitGain').click(function() {
		if (jQuery("#chkProfitGain").is(':checked')){
			jQuery("#fileProfitGain").siblings('.ajax-upload-dragdrop').find('input').removeAttr('disabled');
		}
		else{
			jQuery("#fileProfitGain").siblings('.ajax-upload-dragdrop').find('input').attr('disabled', 'disabled');
		}
	});

	jQuery('#chkCapitalGain').click(function() {
		if (jQuery("#chkCapitalGain").is(':checked')){
			jQuery("#fileCapitalGain").siblings('.ajax-upload-dragdrop').find('input').removeAttr('disabled');
		}
		else{
			jQuery("#fileCapitalGain").siblings('.ajax-upload-dragdrop').find('input').attr('disabled', 'disabled');
		}
	});

	jQuery('#chkOtherIncome').click(function() {
		if (jQuery("#chkOtherIncome").is(':checked')){
			jQuery("#fileOtherIncome").siblings('.ajax-upload-dragdrop').find('input').removeAttr('disabled');
		}
		else{
			jQuery("#fileOtherIncome").siblings('.ajax-upload-dragdrop').find('input').attr('disabled', 'disabled');
		}
	});

	jQuery('#chkOtherDocumentsOne').click(function() {
		if (jQuery("#chkOtherDocumentsOne").is(':checked')){
			jQuery("#fileOtherDocumentsOne").siblings('.ajax-upload-dragdrop').find('input').removeAttr('disabled');
		}
		else{
			jQuery("#fileOtherDocumentsOne").siblings('.ajax-upload-dragdrop').find('input').attr('disabled', 'disabled');
		}
	});

	jQuery('#chkOtherDocumentsTwo').click(function() {
		if (jQuery("#chkOtherDocumentsTwo").is(':checked')){
			jQuery("#fileOtherDocumentsTwo").siblings('.ajax-upload-dragdrop').find('input').removeAttr('disabled');
		}
		else{
			jQuery("#fileOtherDocumentsTwo").siblings('.ajax-upload-dragdrop').find('input').attr('disabled', 'disabled');
		}
	});
	
});