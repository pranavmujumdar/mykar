<?php 
include('dbconfig.php');
$loadType=$_POST['loadType'];
$loadId=$_POST['loadId'];

if($loadType=="state"){
   $sql="select id,state_name from state where
         country_id='".$loadId."' order by state_name asc";
}else{
   $sql="select id,city_name from city where
         state_id='".$loadId."' order by city_name asc";
}
// $res=mysql_query($sql);
// $check=mysql_num_rows($res);

$result=mysql_query($sql);
if ($result==false)
{
    die(mysql_error());
}
$count=mysql_num_rows($result);
if($count > 0){
   $HTML="";
   while($row=mysql_fetch_array($result)){
      $HTML.="<option value='".$row['id']."'>".$row['1']."</option>";
   }
   echo $HTML;
}

?>