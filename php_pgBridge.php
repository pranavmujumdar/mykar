<?php
include 'dbconfig.php';
?>
<?php
session_start();
if (!(isset($_SESSION['mypanno']) && $_SESSION['mypanno'] != '')) {
	header("Location: index.html");
}
$mypanno = $_SESSION['mypanno'];
$sql     = "SELECT * FROM users WHERE panno='$mypanno'";
$result  = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
	$_SESSION['mypanno'] = $row['panno'];
	$_SESSION['myemail'] = $row['email'];
}
/////////////////////////////////////////////
$profileDetailsQuery     = "SELECT * FROM userdetails WHERE panno='$mypanno'";
$profileDetailsQueryResult  = mysql_query($profileDetailsQuery);

if ($resultRow = mysql_fetch_array($profileDetailsQueryResult)) {
	$dbAmount = $resultRow['planamount'];
	$dbFname = $resultRow['fname'];
	$dbMname = $resultRow['mname'];
	$dbLname = $resultRow['lname'];
	$fullName = $dbFname .' '. $dbMname.' '. $dbLname;
	$dbAddress = $resultRow['address'];
	$dbCity = $resultRow['city'];
	$dbState = $resultRow['state'];
	$dbPincode = $resultRow['pincode'];
	$dbCountry = $resultRow['country'];
	$dbContact = $resultRow['mobile'];
	$dbEmail = $resultRow['email'];
}

//fetching country name from db
$countryQuery   = "SELECT country_name FROM country WHERE id='$dbCountry'";
$countryResult  = mysql_query($countryQuery);
if ($countryRow = mysql_fetch_array($countryResult)) {
  $finalCountryName = $countryRow['country_name'];
}

//fetching state name from db
$stateQuery   = "SELECT state_name FROM state WHERE id='$dbState'";
$stateResult  = mysql_query($stateQuery);
if ($stateRow = mysql_fetch_array($stateResult)) {
  $finalStateName = $stateRow['state_name'];
}

//fetching city name from db
$cityQuery   = "SELECT city_name FROM city WHERE id='$dbCity'";
$cityResult  = mysql_query($cityQuery);
if ($cityRow = mysql_fetch_array($cityResult)) {
  $finalCityName = $cityRow['city_name'];
}


?>
<html>
<body>
	<form id="ccavPaymentForm" method="post" name="customerData" action="ccavRequestHandler.php">
		<input type="hidden" name="tid" id="tid" value="<?php echo time();?>" />
		<input type="hidden" name="merchant_id" value="69124"/>
		<input type="hidden" name="order_id" value="<?php echo mt_rand();?>" id="order_id" readonly/>
		<input type="hidden" name="amount" value="<?php echo $dbAmount;?>"/>
		<input type="hidden" name="currency" value="INR"/>
		<input type="hidden" name="redirect_url" value="http://mykar.in/ccavResponseHandler.php"/>
		<input type="hidden" name="cancel_url" value="http://mykar.in/ccavResponseHandler.php"/>
		<input type="hidden" name="language" value="EN"/>
		<input type="hidden" name="billing_name" value="<?php echo $fullName;?>"/>
		<input type="hidden" name="billing_address" value="<?php echo $dbAddress;?>"/></td>
		<input type="hidden" name="billing_city" value="<?php echo $finalCityName;?>"/>
		<input type="hidden" name="billing_state" value="<?php echo $finalStateName;?>"/>
		<input type="hidden" name="billing_zip" value="<?php echo $dbPincode;?>"/>
		<input type="hidden" name="billing_country" value="<?php echo $finalCountryName;?>"/>
		<input type="hidden" name="billing_tel" value="<?php echo $dbContact;?>"/>
		<input type="hidden" name="billing_email" value="<?php echo $dbEmail;?>"/>
		<input type="hidden" name="delivery_name" value="<?php echo $fullName;?>"/>
		<input type="hidden" name="delivery_address" value="<?php echo $dbAddress;?>"/>
		<input type="hidden" name="delivery_city" value="<?php echo $finalCityName;?>"/>
		<input type="hidden" name="delivery_state" value="<?php echo $finalStateName;?>"/>
		<input type="hidden" name="delivery_zip" value="<?php echo $dbPincode;?>"/>
		<input type="hidden" name="delivery_country" value="<?php echo $finalCountryName;?>"/>
		<input type="hidden" name="delivery_tel" value="<?php echo $dbContact;?>"/>
		<input type="hidden" name="merchant_param1" value=""/>
		<input type="hidden" name="merchant_param2" value=""/>
		<input type="hidden" name="merchant_param3" value=""/>
		<input type="hidden" name="merchant_param4" value=""/>
		<input type="hidden" name="merchant_param5" value=""/>
		<input type="hidden" name="promo_code" value=""/>
		<input type="hidden" name="customer_identifier" value=""/>
	</form>
	<script language='javascript'>
	document.getElementById("ccavPaymentForm").submit();
	</script>
</body>
</html>


