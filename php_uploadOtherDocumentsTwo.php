<?php
include 'dbconfig.php';
?>
<?php
$output_dir = "uploads/";
if (isset($_FILES["myfile"])) {
    $currentPanNumber = $_GET["pan"];
    $moreFileName = '_OtherDocumentsTwo';
    if ($_FILES["myfile"]["error"] > 0) {
        echo "Error: " . $_FILES["myfile"]["error"] . "<br>";
    } else {
        $temp        = explode(".", $_FILES["myfile"]["name"]);
        $newfilename = $currentPanNumber .$moreFileName. '.' . end($temp);
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $newfilename);
        $frmUploadedFileName = $output_dir . $newfilename;
        $sql                 = "UPDATE userdetails SET otherdocumentstwo = '" . $frmUploadedFileName . "' " . "WHERE panno = '" . $currentPanNumber . "'";
        $retval              = mysql_query($sql);
        if (!$retval) {
            die('Could not update data: ' . mysql_error());
        }
        echo "Updated data successfully\n";
    }
}
?>