    <?php
    include 'dbconfig.php';
    ?>
    <?php
    if ($_POST) {
      function test_input($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      function getRandomString($length)
      {
        $validCharacters = "abcdefghijklmnpqrstuxyvwzABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
        $validCharNumber = strlen($validCharacters);
        $result          = "";
        for ($i = 0; $i < $length; $i++) {
          $index = mt_rand(0, $validCharNumber - 1);
          $result .= $validCharacters[$index];
        }
        return $result;
      }
      $mail             = test_input($_POST['email']);
      $token            = getRandomString(10) . "_" . getRandomString(10) . "_" . getRandomString(10) . "_" . getRandomString(10) . "_" . getRandomString(10) . "_" . getRandomString(10);
      $updateTokenQuery = "update users set token='" . $token . "' where email ='" . $mail . "' ";
      mysql_query($updateTokenQuery);
      
      if ($_POST['email'] != "") {
        $q      = "SELECT * FROM users WHERE email = '$mail'";
        $result = mysql_query($q);
        if (!$result) {
          echo "You entered mail id is not present. <a href='index.php'>Home</a>";
        } else {
          $dbarray = mysql_fetch_array($result);
          $to      = $dbarray['email'];
          $subject = '[MyKar.in] Password Reset';
          $uri     = 'https://' . $_SERVER['HTTP_HOST'];
          $message = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
          <head>
            <meta name="viewport" content="width=device-width" />
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Reset Your MyKar.in Password</title>
          </head>
          <body itemscope style="font-family:verdana; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
            <table class="body-wrap" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
              <td class="container" width="600" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
               <div class="content" style="font-family: verdana; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: verdana; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
                  <tr style="margin: 0;padding: 0;font-family: verdana;">
                    <td style="margin: 0;padding: 0;font-family: verdana;text-align:center;padding:20px;">
                      <img src="https://mykar.in/img/logo.png" height="35px" width="260px" style="margin: 0;padding: 0;font-family: verdana;max-width: 100%;">
                    </td>
                  </tr>
                  <tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: verdana; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #3F4448; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #FED548; margin: 0; padding: 20px;" align="center" bgcolor="#FED548" valign="top">
                   <strong> Reset Your MyKar Password.</strong>
                 </td>
               </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
               <table width="100%" cellpadding="0" cellspacing="0" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                <strong>Hey ' . $dbarray['email'] . ',</strong> <br /><br />
                Someone requested that the password be reset for your account.
                If this was a mistake, just ignore this email and nothing will happen. 
              </td>
            </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
            Changing your password is simple. Please click on the link below and follow the instructions in order to reset your password.
          </td>
        </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
        <a href="' . $uri . '/resetPassword.php?token=' . $token . '" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;" target="_blank">Reset my password</a>
      </td>
    </tr><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
    Thanks for choosing MyKar.
  </td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">For more details visit <a href="https://mykar.in/" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">MyKar.in</a></td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>';
$headers = 'From:support@mykar.in';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: MyKar.in<support@mykar.in>' . "\r\n";
$mailSentResult = mail($to, $subject, $message, $headers);
if ($mailSentResult) {
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Please check your email</title>
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
           <strong>Please check your email</strong>
         </td>
       </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
       <table width="100%" cellpadding="0" cellspacing="0" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
        <strong>Hey '.$dbarray['email'].',</strong> <br /><br />
        We have sent you an email that will allow you to reset your password quickly and easily.
        <br />
        <br />
        <strong>Note:</strong> If you are not getting mails in your Inbox, Please check your SPAM folder and mark MyKar mails as not spam for receiving mails in your inbox directly.
        You can login from below link.
      </td>
    </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
    <a href="login.html" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Login</a>
  </td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">For more details visit <a href="http://mykar.in/" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">MyKar.in</a></td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>';
} else {
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;">
  <head>
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
           <strong>Something went wrong!</strong>
         </td>
       </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
       <table width="100%" cellpadding="0" cellspacing="0" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
        <strong>Hey '.$dbarray['email'].',</strong> <br /><br />
        Something went wrong in resetting your password. Please visit forget password page and try again resetting.
      </td>
    </tr><tr style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: verdana; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
    <a href="forgotpassword.html" class="btn-primary" style="font-family: verdana; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Forget password</a>
  </td>
</tr></table></td>
</tr></table><div class="footer" style="font-family:verdana; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
<table width="100%" style="font-family:verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: verdana; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: verdana; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">For more details visit <a href="http://mykar.in/" style="font-family: verdana; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">MyKar.in</a></td>
</tr></table></div></div>
</td>
<td style="font-family:verdana; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0;" valign="top"></td>
</tr></table></body>
</html>';
}
}
}
} else {
  echo "Sorry Invalid Request...!";
}
?>
