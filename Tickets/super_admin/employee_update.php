<?php
require '../../connect.php';
include("../../user.php");


//echo "<pre>";print_r($candidate_id);exit();
 $id=$_REQUEST['get_id'];
 $role=$_REQUEST['role'];
 $department=$_REQUEST['department'];
 $Designation=$_REQUEST['Designation'];
 $username=$_REQUEST['username'];
$Password=md5($_REQUEST['Password']);
$org_Password=$_REQUEST['Password'];
 
 $name=$_REQUEST['name'];
 $email=$_REQUEST['email'];
  $mobile_number=$_REQUEST['mobile_number'];
   $Gender=$_REQUEST['Gender'];
   $company=$_REQUEST['company'];
   $Project=$_REQUEST['Project'];
    $reporting=$_REQUEST['reporting'];
	$Status=$_REQUEST['Status'];
	$rolemaster_id=$_SESSION['rolemaster_id'];

	$sql2= $con->query("Update user_master set role_master_id='$role',department_id='$department',Designation_id='$Designation',user_name='$username',password='$Password',org_password='$org_Password',full_name='$name',email_id='$email',mobile_no='$mobile_number',gender='$Gender',company_name='$company',Project_name='$Project',Reporting='$reporting',user_status='$Status',modified_by='$rolemaster_id',modified_on=NOW() where user_id='$id'");
	
	?>