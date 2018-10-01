<?php
include 'dbconfig.php';
?>
<?php
header('X-Frame-Options: SAMEORIGIN');
if ($_POST) {
    session_start();
    $updatedDate = date("Y-m-d");

$profileCheck     = "SELECT isprofilecomplete FROM userdetails WHERE panno='".$_SESSION['mypanno']."'";
$profileCheckResult  = mysql_query($profileCheck);
if ($ResultRow = mysql_fetch_array($profileCheckResult)) {
  $profileCheckValue = $ResultRow['isprofilecomplete'];
}
if($profileCheckValue === 'yes'){
    header('Location: php_pgBridge.php');
        exit;
}else{
    $userDetailsQuery = "UPDATE userdetails SET isprofilecomplete='yes',
    dateofdetails='$updatedDate' where panno='".$_SESSION['mypanno']."'" or die(mysql_error());

    mysql_query($userDetailsQuery);
    if(mysql_affected_rows() > 0){
        header('Location: php_pgBridge.php');
        exit;
    }
    else{
        echo "Something went wrong.!";
        exit;
    }
}
} else {
    echo "Sorry Invalid Request...!";
}
?>
