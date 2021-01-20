<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
$role=$_REQUEST['role'];
$department=$_REQUEST['department'];
$Designation=$_REQUEST['Designation']; 
$username=$_REQUEST['username'];

$Password=md5($_REQUEST['Password']);
$org_Password=$_REQUEST['Password'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$mobile_number=$_REQUEST['mobile_number'];
$Gender=$_REQUEST['gender'];
$company=$_REQUEST['company'];
$Project=$_REQUEST['Project'];
$reporting=$_REQUEST['reporting'];
$status=$_REQUEST['status'];
$rolemaster_id=$_SESSION['rolemaster_id'];

 
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into user_master(role_master_id,department_id,Designation_id,user_name,password,org_password,full_name,email_id,mobile_no,gender,company_name,Project_name,Reporting,user_status,created_by) values('$role','$department','$Designation','$username','$Password','$org_Password','$name','$email','$mobile_number','$Gender','$company','$Project','$reporting','$status','$rolemaster_id')"); 

  
if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
    
}

	header("location:/Ticketing_system/index.php");
}
?>

