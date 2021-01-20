<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
	$cmp_id=$_REQUEST['cmp_id'];
	$client=$_REQUEST['client'];
$name=$_REQUEST['name'];
$department=$_REQUEST['department'];
$division=$_REQUEST['division'];
$hod=$_REQUEST['hod'];
//$status=$_REQUEST['status'];
$rolemaster_id=$_SESSION['rolemaster_id'];

 
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into masters_project(`company_id`, `client_id`, `Project_name`, `department_id`, `division_id`, `hod_id`,`created_by`,`created`) values('$cmp_id','$client','$name','$department','$division','$hod','$rolemaster_id',now())"); 
//echo "insert into masters_project(`company_id`, `client_id`, `Project_name`, `department_id`, `division_id`, `hod_id`,`created_by`,`created`) values('$cmp_id','$client','$name','$department','$division','$hod','$rolemaster_id',now())";
  
if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
	
    
}
header("location:/Ticketing_system/index.php");
	
}

?>

