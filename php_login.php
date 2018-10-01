<?php
include 'dbconfig.php';
?>
<?php
// header('X-Frame-Options: SAMEORIGIN');
if ($_POST) {
    $mypanno       = $_POST['panno'];
    $mypassword    = $_POST['pass'];
    $mypanno       = stripslashes($mypanno);
    $mypassword    = stripslashes($mypassword);
    $mypanno       = mysql_real_escape_string($mypanno);
    $mypassword    = mysql_real_escape_string($mypassword);
    $decryptedPass = md5($mypassword);
    $q             = "SELECT password,usertype FROM users WHERE panno = '$mypanno'";
    $result        = mysql_query($q);
    $dbarray       = mysql_fetch_array($result);
    
    if (!$result || (session_start() < 1)) {
        echo "Wrong user name <a href='index.html'>Home</a>";
    }
    
    if ($decryptedPass == $dbarray['password']) {
        if ($dbarray['usertype'] == 'normal') {
            $_SESSION["mypanno"] = $mypanno;
            header("location:userprofile.php");
        } elseif ($dbarray['usertype'] == 'admin') {
            $_SESSION["usertype"] = 'admin';
            $_SESSION["username"] = 'admin';
            header("location:adminhome.php");
        }
    } else {
            header("location:login.html");
        // echo "Wrong password <a href='index.html'>Home</a>";
    }
} else {
    echo "Sorry Invalid Request...! <a href='index.html'>Home</a>";
}
?>
