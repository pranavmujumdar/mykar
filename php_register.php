<?php
include 'dbconfig.php';
?>
<?php
header('X-Frame-Options: SAMEORIGIN');
if ($_POST) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $frmPanNumber = test_input($_POST['panno']);
    $frmPassword  = md5(test_input($_POST['password']));
    $frmEmail     = test_input($_POST['emailid']);
    $regDate = date("Y-m-d");
    $usersQuery = "INSERT INTO users (panno,password,email,usertype)
    VALUES ('$frmPanNumber', '$frmPassword', '$frmEmail','normal')" or die(mysql_error());
    mysql_query($usersQuery);

    $userDetailsQuery = "INSERT INTO userdetails (panno,email,dateofdetails,isprofilecomplete) VALUES ('$frmPanNumber','$frmEmail','$regDate','no')" or die(mysql_error());
    mysql_query($userDetailsQuery);

    $to      = $frmEmail;
    $subject = '[MyKar.in] Registration Successful for MyKar.in';
    $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Registration Successful for MyKar.in</title>
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
                            <strong>Registration Successful for MyKar.in</strong>
                        </td>
                    </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                        <strong>Hey '.$frmEmail.',</strong> <br /><br />
                        Thank you for registering with us! Your Password is <strong>'.$_POST['password'].'</strong>
                    </td>
                </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                This is a system generated email. Please do not reply to this email, For any further queries, please contact us at <a href="mailto:support@mykar.in">support@mykar.in</a>
            </td>
        </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
        <a href="https://mykar.in/" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;" target="_blank">Visit our site</a>
    </td>
</tr><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
Thanks for choosing MyKar.
</td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
    <a href="https://mykar.in/privacypolicy.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Privacy policy</a> |
    <a href="https://mykar.in/termsandcondition.html" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Terms</a>
</td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>';
$headers = 'From:support@mykar.in';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: MyKar.in<support@mykar.in>' . "\r\n";
$mailSentResult       = mail($to, $subject, $message, $headers);

header('Location: login.html');
exit;
} else {
    echo "Sorry Invalid Request...!";
}
?>
