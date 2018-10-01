<?php include('Crypto.php')?>
<?php

error_reporting(0);

	$workingKey='F37A2DBE25D30CE7A8C2B03E377F793C';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$customerName="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
		if($i==18) $customerName=$information[1];
	}
// echo $order_status;
	if($order_status==="Success")
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
 <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Payment successful!</title>
</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family:verdana; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
	<table class="body-wrap" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: verdana; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
					<tr style="margin: 0;padding: 0;font-family: verdana;">
						<td style="margin: 0;padding: 0;font-family: verdana;text-align:center;padding:20px;">
							<img src="http://mykar.in/img/logo.png" height="35px" width="260px" style="margin: 0;padding: 0;font-family: verdana;max-width: 100%;">
						</td>
					</tr>
					<tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: verdana; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #3F4448; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #FED548; margin: 0; padding: 20px;" align="center" bgcolor="#FED548" valign="top">
						<strong>Successfully payment has been done!</strong>
					</td>
				</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
				<table width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
					<strong>Hey '.$customerName.',</strong> <br /><br />
					Payment process has been done successfully.
				</td>
			</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
			This is a system generated message. For any further queries, please contact us at <a href="mailto:support@mykar.in">support@mykar.in</a>
		</td>
	</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
	<a href="userprofile.php" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Visit your profile page</a>
</td>
</tr><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
Thanks for choosing MyKar.
</td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;text-align:center;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;text-align:center;" align="center" valign="top">
	<a href="http://mykar.in/privacypolicy.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Privacy policy</a> |
	<a href="http://mykar.in/termsandcondition.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Terms</a>
</td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>';

//updating payment details at our end
    $updatedDate = date("Y-m-d");
$paymentDetailUpdateQuery = "UPDATE userdetails SET ispaymentmade='yes',
    dateofdetails='$updatedDate' where panno='".$_SESSION['mypanno']."'" or die(mysql_error());
    mysql_query($paymentDetailUpdateQuery);
	}
	else if($order_status==="Aborted")
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
 <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Transaction aborted!</title>
</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family:verdana; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
	<table class="body-wrap" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: verdana; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
					<tr style="margin: 0;padding: 0;font-family: verdana;">
						<td style="margin: 0;padding: 0;font-family: verdana;text-align:center;padding:20px;">
							<img src="http://mykar.in/img/logo.png" height="35px" width="260px" style="margin: 0;padding: 0;font-family: verdana;max-width: 100%;">
						</td>
					</tr>
					<tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: verdana; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #3F4448; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #FED548; margin: 0; padding: 20px;" align="center" bgcolor="#FED548" valign="top">
						<strong>Payment aborted by User.</strong>
					</td>
				</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
				<table width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
					<strong>Hey '.$customerName.',</strong> <br /><br />
					We think you are aborted or cancelled the transaction, contact us for more information.
				</td>
			</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
			This is a system generated message. For any further queries, please contact us at <a href="mailto:support@mykar.in">support@mykar.in</a>
		</td>
	</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
	<a href="userprofile.php" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Visit your profile page</a>
</td>
</tr><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
Thanks for choosing MyKar.
</td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;text-align:center;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;text-align:center;" align="center" valign="top">
	<a href="http://mykar.in/privacypolicy.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Privacy policy</a> |
	<a href="http://mykar.in/termsandcondition.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Terms</a>
</td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>';
	}
	else if($order_status==="Failure")
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
 <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Transaction failed!</title>
</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family:verdana; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
	<table class="body-wrap" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: verdana; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
					<tr style="margin: 0;padding: 0;font-family: verdana;">
						<td style="margin: 0;padding: 0;font-family: verdana;text-align:center;padding:20px;">
							<img src="http://mykar.in/img/logo.png" height="35px" width="260px" style="margin: 0;padding: 0;font-family: verdana;max-width: 100%;">
						</td>
					</tr>
					<tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: verdana; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #3F4448; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #FED548; margin: 0; padding: 20px;" align="center" bgcolor="#FED548" valign="top">
						<strong>Transaction failed :(</strong>
					</td>
				</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
				<table width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
					<strong>Hey '.$customerName.',</strong> <br /><br />
					Payment process failed, stay calm please logout from your account and login back again.
				</td>
			</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
			This is a system generated message. For any further queries, please contact us at <a href="mailto:support@mykar.in">support@mykar.in</a>
		</td>
	</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
	<a href="userprofile.php" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Visit your profile page</a>
</td>
</tr><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
Thanks for choosing MyKar.
</td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;text-align:center;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;text-align:center;" align="center" valign="top">
	<a href="http://mykar.in/privacypolicy.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Privacy policy</a> |
	<a href="http://mykar.in/termsandcondition.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Terms</a>
</td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>
';
	}
	else
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
 <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Something went wrong!</title>
</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family:verdana; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
	<table class="body-wrap" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: verdana; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
					<tr style="margin: 0;padding: 0;font-family: verdana;">
						<td style="margin: 0;padding: 0;font-family: verdana;text-align:center;padding:20px;">
							<img src="http://mykar.in/img/logo.png" height="35px" width="260px" style="margin: 0;padding: 0;font-family: verdana;max-width: 100%;">
						</td>
					</tr>
					<tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: verdana; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #3F4448; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #FED548; margin: 0; padding: 20px;" align="center" bgcolor="#FED548" valign="top">
						<strong>Something went wrong :(</strong>
					</td>
				</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
				<table width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
					<strong>Hey '.$customerName.',</strong> <br /><br />
					Something went wrong with the payment process, stay calm please logout from your account and login back again.
				</td>
			</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
			This is a system generated message. For any further queries, please contact us at <a href="mailto:support@mykar.in">support@mykar.in</a>
		</td>
	</tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
	<a href="userprofile.php" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Visit your profile page</a>
</td>
</tr><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
Thanks for choosing MyKar.
</td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;text-align:center;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;text-align:center;" align="center" valign="top">
	<a href="http://mykar.in/privacypolicy.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Privacy policy</a> |
	<a href="http://mykar.in/termsandcondition.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Terms</a>
</td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>';
		// echo "<br>Security Error. Illegal access detected";
	}
	// echo "<br><br>";
	// echo "<table cellspacing=4 cellpadding=4>";
	// for($i = 0; $i < $dataSize; $i++) 
	// {
	// 	$information=explode('=',$decryptValues[$i]);
	// 	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	// }
	// echo "</table><br>";
	echo "</center>";
	?>
