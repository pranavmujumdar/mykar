<?php 
session_start(); //Start the current session
unset($_SESSION['mypanno']);
session_destroy(); //Destroy it! So we are logged out now
header("location:index.html?msg=Successfully Logged out");
exit;
?>