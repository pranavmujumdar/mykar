<?php
include 'dbconfig.php';
?>
<?php
session_start();
if (!(isset($_SESSION['mypanno']) && $_SESSION['mypanno'] != '')) {
  header("Location: index.html");
}
/////////////////////////////////////////////
$mypanno = $_SESSION['mypanno'];
$sql     = "SELECT * FROM users WHERE panno='$mypanno'";
$result  = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
  $_SESSION['mypanno'] = $row['panno'];
  $_SESSION['myemail'] = $row['email'];
}
/////////////////////////////////////////////
$isProfileCompleteQuery     = "SELECT isprofilecomplete FROM userdetails WHERE panno='$mypanno'";
$isProfileCompleteResult  = mysql_query($isProfileCompleteQuery);
if ($resultRow = mysql_fetch_array($isProfileCompleteResult)) {
  $isProfileComplete = $resultRow['isprofilecomplete'];
}
if($isProfileComplete === 'no'){
// echo 'no';
}else{
  header("Location:editprofile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile : <?php echo strtoupper($_SESSION['mypanno']);?></title>
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
  <script type="text/javascript" src="js/userCommonScripts.js"></script>
  <script type="text/javascript" src="js/locationSelector.js"></script>
</head>
<body>
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
            <!--li><a href="userdownloads.php">Downloads</a></li-->
            <li><a href="userreturnstatus.php">Return status</a></li>
            <!-- <li><a href="userinstructions.php">Instructions</a></li> -->
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
      <form method="post" action="php_updateUserDetails.php" id="frmUserProfile">
        <div class="row  login-div-margin">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="row login-div-margin">
                  <div class="col-md-12">
                  </div>
                  <br><br>
                  <div class="col-md-3">
                    Pan number:
                  </div>
                  <div class="col-md-9">
                    <input type="text" required id="pannumber" class="form-control" name="pannumber" readonly value="<?php echo strtoupper($_SESSION['mypanno']);?>" />
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>Aadhar number:
                  </div>
                  <div class="col-md-9">
                    <input type="text" id="txtAadharNumber" class="form-control" maxlength="12" name="txtAadharNumber" />
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 ">
                <div class="row login-div-margin">
                  <div class="col-md-12">
                    <h3>Personal details</h3>
                  </div>
                  <br><br>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    First name:
                  </div>
                  <div class="col-md-9">
                    <input type="text" required id="txtFirstName" name="txtFirstName" class="form-control" maxlength="20"/>
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Middle name:
                  </div>
                  <div class="col-md-9">
                    <input type="text" required id="txtMiddleName" class="form-control" name="txtMiddleName" maxlength="20"/>
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Last name:
                  </div>
                  <div class="col-md-9">
                    <input type="text" required id="txtLastName" class="form-control" name="txtLastName" maxlength="20"/>
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Sex:
                  </div>
                  <div class="col-md-9">
                    <select name="cmbSex" required class="form-control" id="sex">
                      <option value="">Select Sex</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    DOB:
                  </div>
                  <div class="col-md-9">
                    <input type="date" required class="form-control" id="txtDOB" name="txtDOB"  maxlength="10"/>
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Mobile no. :
                  </div>
                  <div class="col-md-9">
                    <input type="text" title="Please enter valid Mobile number." required id="txtMobile" class="form-control" name="txtMobile" pattern="[0-9]{10}" maxlength="10" />
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Father's name :
                  </div>
                  <div class="col-md-9">
                    <input type="text" required id="txtFatherName" class="form-control" name="txtFatherName" maxlength="20"/>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 ">
                <div class="row login-div-margin">
                  <div class="col-md-12">
                    <h3>Contact details</h3>
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Address:
                  </div>
                  <div class="col-md-9">
                    <textarea required class="form-control" cols="30" rows="4" id="txtAddress" name="txtAddress"></textarea>
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Pincode:
                  </div>
                  <div class="col-md-9">
                    <input type="text" pattern="[0-6]{6}" title="Please enter valid Pincode."  required id="txtPincode" class="form-control" maxlength="6" name="txtPincode" />
                    <br>
                  </div>
                  <div class="col-md-3">
                    <span class="red">*</span>
                    Country:
                  </div>
                  <div class="col-md-9">
                    <?php
                    $sqlCountry   = "select id,country_name from country
                    order by country_name asc ";
                    $resCountry   = mysql_query($sqlCountry);
                    $checkCountry = mysql_num_rows($resCountry);

                    ?>
                    <select name="country" id="country_dropdown" required class="form-control" onchange="selectCity(this.options[this.selectedIndex].value)">
                      <option value="">Select country</option>
                      <?php
                      while ($rowCountry = mysql_fetch_array($resCountry)) {
                        ?>
                        <option title="<?php echo $rowCountry['id'];?>" value="<?php echo $rowCountry['id'];?>">
                        <?php echo $rowCountry['country_name'];?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                  <br>
                </div>
                <div class="col-md-3">
                  <span class="red">*</span>
                  State:
                </div>
                <div class="col-md-9">
                  <select name="state" required  class="form-control" id="state_dropdown"
                  onchange="selectState(this.options[this.selectedIndex].value)">
                  <option value="">Select state</option>
                </select>
                <span id="state_loader"></span>
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                City :
              </div>
              <div class="col-md-9">
                <select name="city" required class="form-control" id="city_dropdown">
                  <option value="">Select city</option>
                </select>
                <span id="city_loader"></span>
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                Whether person govrned by Pourtugese civil code under section 5A:
                <img src="img/help.png" title="The Portuguese Civil Code in India is applicable only to the State of Goa and Union Territories of Dadra &amp; Nagar Haveli and Daman &amp; Diu." style="height:15px;width:15px;" id="helpSec5A">
              </div>
              <div class="col-md-9">
                Yes <input type="radio" required name="secion5A" value="Yes">
                No <input type="radio" required name="secion5A" value="No">
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="row login-div-margin">
              <div class="col-md-12">
                <h3>Other mandatory details</h3>
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                Residential status:
              </div>
              <div class="col-md-9">
                <select name="cmbResidentialStatus" required class="form-control" id="cmbResidentialStatus">
                  <option value="">Select Residential Status</option>
                  <option value="Resident">Resident</option>
                  <option value="Non Resident">Non Resident</option>
                  <option value="Resident-Not Ordinary Resident">Resident-Not Ordinary Resident</option>
                </select>
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                Employee category:
              </div>
              <div class="col-md-9">
                <select name="cmbEmployeeCatagory" required class="form-control" id="cmbEmployeeCatagory">
                  <option value="">Select Employee Catagory</option>
                  <option value="Goverment">Goverment</option>
                  <option value="Other">Other</option>
                  <option value="PSU">PSU</option>
                  <option value="NA">NA</option>
                </select>
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                Account number:
              </div>
              <div class="col-md-9">
                <input type="text" required class="form-control" id="txtAccountNumber" name="txtAccountNumber" maxlength="16">
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                Bank name :
              </div>
              <div class="col-md-9">
                <input type="text" required id="txtBankName" class="form-control" name="txtBankName" maxlength="200"/>
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                IFSC code :
              </div>
              <div class="col-md-9">
                <input type="text" required id="txtIFSCCode" class="form-control" name="txtIFSCCode" maxlength="11"/>
                <br>
              </div>
              <div class="col-md-3">
                <span class="red">*</span>
                Type of A/C :
              </div>
              <div class="col-md-9">
                <select name="cmbAccountType" required id="cmbAccountType" class="form-control">
                  <option value="">Select Account Type</option>
                  <option value="Savings">Savings</option>
                  <option value="Current">Current</option>
                </select>
                <br>
              </div>
              <div class="col-md-6">
                <input type="reset" id="cancel" name="cancel" value="Cancel" class="btn btn-primary form-control" />
              </div>
              <div class="col-md-6">
                <input type="submit" id="save" name="save" value="Save &amp; Next" class="btn btn-success form-control" />
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
              <p>+91 9881193750 Harshal Pendurkar (Co-founder)</p> <br>
              <span class="phone" style="background: none;"></span>
              <p>+91 9960477711 Soumitra Poman    (Co-founder)</p><br>
              <span class="phone" style="background: none;"></span>
              <p>+91 9049079066 Swapnil Wagh      (Co-founder and Business development)</p><br>
              <span class="phone" style="background: none;"></span>
              <p>+91 8275583114 Yash Bedekar      (Growth and Marketing)</p>
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