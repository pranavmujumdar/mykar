<?php
include('dbconfig.php');

	$_POST['username'];
	$_POST['panno'];
	
	if (isset($_POST['panno'])) {
		$enteredPan = $_POST['panno'];
		$sql = mysql_query("select panno from userdetails where panno='$enteredPan'");
		if (mysql_num_rows($sql)) {
			echo '<strong style="color:#d9534f;">' . $enteredPan . '</strong> is already in use.';
		} else {
			echo 'OK';
		}
	}
	
	if (isset($_POST['username'])) {
		$enteredUsername = $_POST['username'];
		$enteredUsername;
		$sql   = mysql_query("select email from login where username='$enteredUsername'");
		if (mysql_num_rows($sql)) {
			echo '<strong style="color:#d9534f;">' . $enteredUsername . '</strong> is already in use.';
		} else {
			echo 'OK';
		}
	}
?>