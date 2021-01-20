<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
$name=$_REQUEST['name'];
$status=$_REQUEST['status'];


 
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into role_master(role_name,status) values('$name','$status')"); 

  
if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
	
    
}
header("location:/Ticketing_system/index.php");
	
}

?>

