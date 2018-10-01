<?php
include 'dbconfig.php';
?>
<?php
$PANNumber = $_GET["panno"];
$Status    = $_GET["status"];
$sql       = mysql_query("update userdetails set returnstatus = '$Status' where panno='$PANNumber'");
if ($sql == 1) {
    echo 'okay';
} else {
    echo 'Something went wrong in Update Return Status.';
}

?>