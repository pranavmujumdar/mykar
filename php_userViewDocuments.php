<?php
include 'dbconfig.php';
?>
<?php
session_start();
if (!isset($_SESSION['usertype']) || ($_SESSION['usertype'] != 'admin')) {
    header('Location: index.html');
    exit;
}
  $panno=$_GET['panno'];
  $panno = mysql_real_escape_string($panno);
  $userPlan='';
  $sql      = "SELECT plan FROM userdetails WHERE panno='$panno'";
  $result   = mysql_query($sql);
  if ($row = mysql_fetch_array($result)) {
    $userPlan = $row['plan'];
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo strtoupper($panno); ?> : User information</title>
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
  <meta name="keywords" content="Online income tax return filing,E-filing, Form 16, Salary return, Free consultancy, Government authorized, E-return intermediary, Chartered accountants, Chartered financial analyst, Easy tax filing, simple tax return, Tax filing AY 2015-16, Free tax consultance, Tax return for 2014-2015, Form 16 for 2014-15, Online tax return filing, Free income tax consultancy, Online tax consultancy, Online salary return">
  <meta name="description" content="We are Government authorized E-return intermediary. Mykar provides the service of online filing of income tax return economically and efficiently.">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link href="css/adminstyles.css" rel='stylesheet' type='text/css' />
  <script src="js/jquery-1.11.0.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
    });
  </script>
  <script language="javascript" type="text/javascript">
    window.history.forward();
  </script>
  <script type="text/javascript" src="js/adminCommanScripts.js"></script>
  <link rel="stylesheet" type="text/css" href="css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="css/vicons-font.css" />
  <link rel="stylesheet" type="text/css" href="css/base.css" />
  <link rel="stylesheet" type="text/css" href="css/buttons.css" />
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
            <li><a href="adminhome.php" class="active">Admin Home</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="#get" class="scroll">Get In Touch</a></li>
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
      <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <div class="row login-div-margin noBorder">
            <div class="col-md-12">
              <div style="text-align: center; font-size: 24px; margin-bottom: 20px;">Documents of : <?php echo $panno; ?>
                <br>
                [Plan is : <?php echo $userPlan; ?> ]
              </div>
              <section class="content">
                <!-- <h2>Documents of :</h2> -->
                <div class="box bg-1">
                  <?php
                  if ($panno == '') {
                    echo 'Invalid request';
                  }else{
                    $sql   = "select * from userdetails where panno='$panno'";
                    $query=mysql_query($sql);
                    $num_rows = mysql_num_rows($query);

                    if($num_rows > 0){
                      while($row=mysql_fetch_row($query)) 
                      {
                        $lastUpdated = $row[28];
                        $pan = $row[0];
                        $form16 = $row[23];
                        $incomeSalary = $row[24];
                        $incomeHouseProperty = $row[25];
                        $profitGain = $row[26];
                        $capitalGain = $row[27];
                        $otherDocumentOne = $row[30];
                        $otherDocumentTwo = $row[29];
                      }
                      
                      if ($form16 == '') {
                        $tempLink = '#';
                        echo "<a  href='" . $tempLink . "' class='notUploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Form 16</span></a>";
                      } else {
                        $tempLink = $form16;
                        echo "<a target='_blank' href='" . $tempLink . "' class='uploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Form 16</span></a>";
                      }
                      
                      if ($incomeSalary == '') {
                        $tempLink = '#';
                        echo "<a href='" . $tempLink . "' class='notUploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Income Salary</span></a>";
                      } else {
                        $tempLink = $incomeSalary;
                        echo "<a target='_blank' href='" . $tempLink . "' class='uploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Income Salary</span></a>";
                      }
                      
                      if ($incomeHouseProperty == '') {
                        $tempLink = '#';
                        echo "<a href='" . $tempLink . "' class='notUploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Income House Property</span></a>";
                      } else {
                        $tempLink = $incomeHouseProperty;
                        echo "<a target='_blank' href='" . $tempLink . "' class='uploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Income House Property</span></a>";
                      }
                      
                      if ($profitGain == '') {
                        $tempLink = '#';
                        echo "<a href='" . $tempLink . "' class='notUploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Profit Gain</span></a>";
                      } else {
                        $tempLink = $profitGain;
                        echo "<a target='_blank' href='" . $tempLink . "' class='uploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Profit Gain</span></a>";
                      }
                      
                      if ($capitalGain == '') {
                        $tempLink = '#';
                        echo "<a href='" . $tempLink . "' class='notUploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Capital Gain</span></a>";
                      } else {
                        $tempLink = $capitalGain;
                        echo "<a target='_blank' href='" . $tempLink . "' class='uploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Capital Gain</span></a>";
                      }
                      
                      if ($otherDocumentOne == '') {
                        $tempLink = '#';
                        echo "<a href='" . $tempLink . "' class='notUploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Other Document 1</span></a>";
                      } else {
                        $tempLink = $otherDocumentOne;
                        echo "<a target='_blank' href='" . $tempLink . "' class='uploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Other Document 1</span></a>";
                      }
                      
                      if ($otherDocumentTwo == '') {
                        $tempLink = '#';
                        echo "<a href='" . $tempLink . "' class='notUploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Other Document 2</span></a>";
                      } else {
                        $tempLink = $otherDocumentTwo;
                        echo "<a href='" . $tempLink . "' target='_blank' class='uploaded button button--naira button--round-s button--border-thin'><i class='button__icon icon icon-download'></i><span>Other Document 2</span></a>";
                      }
                      ?>
                    </div>
                  </section>
                  <?php
                }else{
                  echo 'No result found for this PAN';
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
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
            <li>
              <span class="msg"> </span>
              <p><a href="mailto:support@mykar.in">support@mykar.in</a></p>
            </li>
          </ul>
        </div>
        <div class="col-md-6 contact-right">
          <form name="frmContactUs" id="frmContactUs" method="post" action="php_sendMailContactUs.php">
            <input type="text" name="txtContactFullName" required placeholder="Your Name"/>
            <input type="email" name="txtContactEmail" required placeholder="Your Email"/>
            <input type="text" name="txtContactMobile" id="txtContactMobile" maxlength="10" placeholder="Your Contact"/>
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
          <center>
            <p style="color:#fff">Copyright © 2015 MyKar.in All rights reserved.</p>
          </center>
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