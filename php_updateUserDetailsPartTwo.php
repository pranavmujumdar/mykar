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

    $frmFinancialYear = test_input($_POST['cmbFinancialYear']);
    $frmOtherInformation = test_input($_POST['txtOtherInformation']);
    $frmPlans = test_input($_POST['cmbPlans']);
    $frmPlanAmount = test_input($_POST['planAmount']);
    $updatedDate = date("Y-m-d");

    $userDetailsQuery = "UPDATE userdetails SET year='$frmFinancialYear',
    otherinformation='$frmOtherInformation',
    plan='$frmPlans',
    planamount = '$frmPlanAmount',
    dateofdetails='$updatedDate' where panno='".$_SESSION['mypanno']."'" or die(mysql_error());

    if($frmPlans !== 'NotSelected'){
        mysql_query($userDetailsQuery);
        if(mysql_affected_rows() > 0){
            $_SESSION['selectedPlan'] = $frmPlans;
            if($frmPlans === 'Basic'){
                header('Location: plan_basicPlan.php');
                exit;
            }elseif ($frmPlans === 'Professional') {
                header('Location: plan_professionalPlan.php');
                exit;
            }elseif ($frmPlans === 'ProfessionalAdvanced') {
               header('Location: plan_professionalAdvancedPlan.php');
               exit;
           }elseif ($frmPlans === 'Business') {
            header('Location: plan_businessPlan.php');
            exit;
        }elseif ($frmPlans === 'BusinessAdvanced') {
            header('Location: plan_businessAdvancedPlan.php');
            exit;
        }else{
            header('Location: userprofileparttwo.php?message=Please select plan!');
            exit;
        }
    }
    else{
        echo "Something went wrong.!";
        exit;
    }
}else{
    header('Location: userprofileparttwo.php?message=select plan');
}
} else {
    echo "Sorry Invalid Request...!";
}
?>
