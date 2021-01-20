<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
	$department=$_REQUEST['department'];
$name=$_REQUEST['name'];
$status=$_REQUEST['status'];
$rolemaster_id=$_SESSION['rolemaster_id'];

 
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into division(department_id,Designation_name,division_status,created_by) values('$department','$name','$status','$rolemaster_id')"); 

  
if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
	
    
}
header("location:/Ticketing_system/index.php");
	
}

?>

