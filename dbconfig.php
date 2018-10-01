<?php

// $host="localhost"; 
$host     = "localhost"; // Host name 
$username = "myKar2016"; // Mysql username 
$password = "myKar@2016"; // Mysql password 
$db_name  = "mykar"; // Database name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("cannot connect");
mysql_select_db("$db_name") or die("cannot select DB");

?>
