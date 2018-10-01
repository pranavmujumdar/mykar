<?php
if ($_POST) {
    $frmFullName  = $_POST['txtContactFullName'];
    $frmEmail    = $_POST['txtContactEmail'];
    $frmMobile    = $_POST['txtContactMobile'];
    $frmMessage    = $_POST['txtContctMessage'];

    $to      = 'support@mykar.in';
    $subject = '[MyKar.in] Message from User';
    $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Message from MyKar.in</title>
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
                            <strong>Message from MyKar.in</strong>
                        </td>
                    </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                        <strong>Hey I am '.$frmFullName.',</strong> <br /><br />
                        <strong>My Detials as follows: </strong><br />
                        <strong>Email : </strong> '.$frmEmail.' <br />
                        <strong>Contact : </strong> '.$frmMobile.' <br />
                    </td>
                </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                <strong>I wanted to tell you : </strong> <br />
                '.$frmMessage.'
            </td>
        </tr>

        <tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
            <br />
            This message is sent by user from contact us.
        </td>
    </tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;text-align:center;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;text-align:center;" align="center" valign="top">
    <a href="http://mykar.in/" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">MyKar.in</a>
</td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>
';
$headers = 'From:'.$frmEmail;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: '.strtoupper($frmFullName).'<'.$frmEmail.'>'. "\r\n";
$mailSentResult       = mail($to, $subject, $message, $headers);
?>
<script>
alert('Feedback/Query noted');
window.location.href="http://mykar.in/";
</script>
<?php
//header( 'Location: http://mykar.in/' ) ;
} else {
    echo "Sorry Invalid Request...! <a href='index.html'>Home</a>";
}
?>
