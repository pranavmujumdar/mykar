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
$planQuery     = "SELECT plan,isprofilecomplete FROM userdetails WHERE panno='$mypanno'";
$planResult  = mysql_query($planQuery);
if ($resultRow = mysql_fetch_array($planResult)) {
  $plan = $resultRow['plan'];
  $isProfileComplete = $resultRow['isprofilecomplete'];
}
if($isProfileComplete === 'yes'){
  header("Location:editprofile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Your Plan: <?php echo strtoupper($plan);?></title>
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
  <meta name="theme-color" content="#f0eaea">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <script src="js/jquery-1.11.0.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <link href="css/uploadfile.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <script src="js/jquery.uploadfile.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
  <script type="text/javascript">
    $(window).load(function() {
      $(".loadings").fadeOut("slow");
    });

    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });

      var u = '<?php
      echo $_SESSION['mypanno'];
      ?>' ;

      jQuery("#fileOtherDocumentOne").uploadFile({
       url:"php_uploadOtherDocuments.php?pan="+u,
       allowedTypes:"pdf,jpeg,png,jpg",
       fileName:"myfile",
       maxFileSize:5000000
     });

    });
</script>
<script language="javascript" type="text/javascript">
  window.history.forward();
</script> 
<script type="text/javascript" src="js/userCommonScripts.js"></script>
<script type="text/javascript" src="js/userProfile.js"></script>
</head>
<body>
  <div class="loadings"></div>
  <!--start-header-->
  <div class="header" id="home">
    <div class="container">
      <div class="head">
        <div class="logo">
          <a href="index.html"><img src="img/logo.png" alt="" /></a>
        </div>
        <div class="navigation">
          <span class="menu"></span> 
          <ul class="navig">
            <li><a href="#">Hi <?php echo strtoupper($_SESSION['mypanno']);?></a></li>
            <li><a href="userprofile.php" class="active">Profile</a></li>
            <li><a href="userdownloads.php">Downloads</a></li>
            <li><a href="userreturnstatus.php">Return status</a></li>
            <li><a href="userinstructions.php">Instructions</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="#get" class="scroll">Get in touch</a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>  
  <!-- script-for-menu -->
  <!-- script-for-menu -->
  <script>
    $("span.menu").click(function(){
      $(" ul.navig").slideToggle("slow" , function(){
      });
    });
  </script>
  <!-- script-for-menu -->
  <!--services-starts-->
  <div class="services" id="services">
    <div class="container">
      <form method="post" action="php_redirectToPayment.php" id="frmBasicPlan">
        <div class="row  login-div-margin">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="row login-div-margin">
                <div class="col-md-12">
                    <h3>You are selected Business Advanced plan you will be charged <strong>INR 1500.</strong></h3>
                    <br>
                    <h4>For more information or more documents do you want to send you can drop a mail on this email : support@mykar.in</h4>
                    <br>
                  </div>
                  <div class="col-md-12">
                    <h3>Upload documents</h3>
                    <br>
                  </div>
                  <div class="col-md-3">
                    Any one document
                  </div>
                  <div class="col-md-9">
                    <div id="fileOtherDocumentOne">Upload</div>
                    <br>
                  </div>
                  <div class="col-md-6">
                    <!-- <input type="reset" id="cancel" name="cancel" value="Cancel" class="btn btn-primary form-control" /> -->
                  </div>
                  <div class="col-md-6">
                    <input type="submit" id="save" name="save" value="Save &amp; make payment" class="btn btn-success form-control" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--services-ends-->
  <script type="text/javascript" src="js/modernizr.custom.53451.js"></script>  
  <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
  <!--contact-starts-->
  <div class="contact" id="get">
    <div class="container">
      <div class="contact-top">
        <h3>Contact</h3>
        <span> </span>
      </div>
      <div class="contact-bottom">
        <div class="col-md-6 contact-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.0703718136056!2d73.8288476!3d18.5257218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf82a7ef5447%3A0xc65e1d6930120d4f!2sSenapati+Bapat+Rd%2C+Mangalwadi+Co-operative+Society%2C+Rajasthan+Society%2C+Gokhalenagar%2C+Pune%2C+Maharashtra+411016!5e0!3m2!1sen!2sin!4v1434785050495" width="400" height="300" frameborder="0" style="border:0"></iframe>
          <ul>
            <li>
              <span class="address"> </span>
              <p>C-1 Chhatrapati Hsg Society, <label>Off Senapati Bapat Road,</label> Gokhale Nagar , Pune 411016</p>
            </li>
            <li>
              <span class="phone"> </span>
              <p>+91 8275583114 |</p>
              <p>+91 9049079066 |</p>
              <p>+91 9960477711 |</p>
              <p>+91 9881193750</p>
            </li>
            <li><span class="msg"> </span>
              <p><a href="mailto:support@mykar.in">support@mykar.in</a></p>
            </li>
          </ul>
        </div>
        <div class="col-md-6 contact-right">
          <form name="frmContactUs" id="frmContactUs" method="post" action="php_sendMailContactUs.php">
            <input type="text" name="txtContactFullName" required placeholder="Your Name"/>
            <input type="email" name="txtContactEmail" required placeholder="Your Email"/>
            <input type="text" name="txtContactMobile" maxlength="10" placeholder="Your Contact"/>
            <textarea name="txtContctMessage" required id="txtContctMessage" placeholder="Message"></textarea>
            <div class="s-btn">
              <input type="submit" value="Send">
            </div>
          </form>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!--contact-end-->
  <!--footer-starts-->
   <div class="footer">
      <div class="container">
        <div class="footer-text">
          <div class="col-md-6 footer-left">
            <ul>
              <li><a href="https://www.facebook.com/mykar.tax/?ref=aymt_homepage_panel" target="_blank"><span class="fb"> </span></a></li>
              <li><a href="https://twitter.com/" target="_blank"><span class="t"> </span></a></li>
              <!--li><a href="https://plus.google.com/" target="_blank"><span class="g"> </span></a></li-->
              <li><a href="https://in.linkedin.com/nhome/" target="_blank"><span class="in"> </span></a></li>
            </ul>
          </div>
          <div class="col-md-6 footer-left">
            <p class="text-muted credit">
              <a href="privacypolicy.html" target="_blank" style="color:#fff;">Privacy policy</a>&nbsp; | &nbsp;
              <a href="termsandcondition.html" target="_blank" style="color:#fff;">Terms &amp; conditions</a>
            </p>
          </div>
           <!--div class="col-md-12 ">
           <center><p style="color:#fff">Copyright © 2015 MyKar.in All rights reserved.</p></center>
          </div-->
          <div class="clearfix"></div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          $().UItoTop({ easingType: 'easeOutQuart' });
        });
      </script>
      <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
    <!--footer-end-->        
  </body>
</html>