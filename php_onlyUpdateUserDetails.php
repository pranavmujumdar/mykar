<?php
include 'dbconfig.php';
?>
<?php
header('X-Frame-Options: SAMEORIGIN');
if ($_POST) {
session_start();
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $frmFirstName = test_input($_POST['txtFirstName']);
    $frmMiddleName = test_input($_POST['txtMiddleName']);
    $frmLastName = test_input($_POST['txtLastName']);
    $frmSex = test_input($_POST['cmbSex']);
    $frmDOB = test_input($_POST['txtDOB']);
    $frmMobile = test_input($_POST['txtMobile']);
    $frmFatherName = test_input($_POST['txtFatherName']);
    $frmAddress = test_input($_POST['txtAddress']);
    $frmPincode = test_input($_POST['txtPincode']);
    $frmCountry = test_input($_POST['country']);
    $frmState = test_input($_POST['state']);
    $frmCity = test_input($_POST['city']);
    $frmSection5A = test_input($_POST['secion5A']);
    $frmResidentialStatus = test_input($_POST['cmbResidentialStatus']);
    $frmEmployeeCatagory = test_input($_POST['cmbEmployeeCatagory']);
    $frmBankName = test_input($_POST['txtBankName']);
    $frmBankAccountNumber = test_input($_POST['txtAccountNumber']);
    $frmIFSC = test_input($_POST['txtIFSCCode']);
    $frmAccountType = test_input($_POST['cmbAccountType']);
    $updatedDate = date("Y-m-d");

    $userDetailsQuery = "UPDATE userdetails SET fname='$frmFirstName',
    mname='$frmMiddleName',
    lname='$frmLastName',
    fathername='$frmFatherName',
    sex='$frmSex',
    dob='$frmDOB',
    mobile='$frmMobile',
    address='$frmAddress',
    pincode='$frmPincode',
    country='$frmCountry',
    state='$frmState',
    city='$frmCity',
    civilcode='$frmSection5A',
    residentialstatus='$frmResidentialStatus',
    employeecatagory='$frmEmployeeCatagory',
    bankname='$frmBankName',
    bankaccountno='$frmBankAccountNumber',
    typeofaccount='$frmAccountType',
    ifsccode='$frmIFSC',
    dateofdetails='$updatedDate' where panno='".$_SESSION['mypanno']."'" or die(mysql_error());

    mysql_query($userDetailsQuery);

    if(mysql_affected_rows() > 0){
        header('Location: editprofile.php');
        exit;
    }
    else{
       // echo "something went wrong.!";
      //  exit;
	   header('Location: editprofile.php');
        exit;
    }
} else {
    echo "Sorry Invalid Request...!";
}
?>
