<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
$name=$_REQUEST['name'];
$status=$_REQUEST['status'];
$rolemaster_id=$_SESSION['rolemaster_id'];

 
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into masters_department(name,status,created_by) values('$name','$status','$rolemaster_id')"); 

  
if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
	
    
}
header("location:/Ticketing_system/index.php");
	
}

?>

